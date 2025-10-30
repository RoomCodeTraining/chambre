<?php

namespace App\Models;

use Carbon\Carbon;
use App\Enums\RoleEnum;
use App\Concerns\HasPhoto;
use Illuminate\Support\Str;
use App\Filters\UserFilters;
use OwenIt\Auditing\Auditable;
use App\Helpers\DateTimeHelper;
use App\Models\Traits\HasOffices;
use Laravel\Sanctum\HasApiTokens;
use App\Builders\User\UserBuilder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\OtpAuthenticatable;
use App\Notifications\WelcomeNotification;
use Illuminate\Notifications\Notification;
use Spatie\Permission\Traits\HasPermissions;
use App\Models\Traits\AuthenticationLoggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\HasSchemalessAttributes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;
use App\Notifications\Auth\QueuedVerifyEmailNotification;
use App\Notifications\Auth\QueuedResetPasswordNotification;
use Spatie\WelcomeNotification\ReceivesWelcomeNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    //    use Auditable;
    use AuthenticationLoggable;
    use Filterable;
    use HasApiTokens;
    use HasFactory;
    use HasHashId;
    use HasHashIdRouting;
    // use HasOffices;
    use HasPermissions;
    use HasPhoto;
    use HasRoles;
    use HasSchemalessAttributes;
    use Notifiable;
    use OtpAuthenticatable;
    use QueryCacheable;
    use ReceivesWelcomeNotification;
    use SoftDeletes;

    protected string $default_filters = UserFilters::class;

    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * @Library
     * Requirement by Spatie Laravel Permissions when setting multiple auth guards
     *
     * @see https://spatie.be/docs/laravel-permission/v5/basic-usage/multiple-guards
     */
    public string $guard_name = 'sanctum';

    /**
     * The attributes that are guarded.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'deleted_at' => 'datetime',
        'disabled_at' => 'datetime',
    ];

    /**
     * The attributes that should be eager-loaded
     *
     * @var array<int, string>
     */
    protected $with = [
        'roles',
    ];

    protected $appends = ['name', 'photo_url'];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (User $user) {
            if (! $user->username) {
                $user->username = Str::ulid();
            }
        });

        /**
         * Release unique fields so that a new user can be created with the same information.
         */
        static::deleting(function (User $user) {
            $user->email = DateTimeHelper::appendTimestamp($user->email, '::deleted_');
            $user->username = DateTimeHelper::appendTimestamp($user->username, '::deleted_');
            $user->saveQuietly();
        });
    }

    /**
     * Get the formatted user name to show on the administration panel.
     */
    public function name(): Attribute
    {
        return Attribute::get(fn () => "{$this->first_name} {$this->last_name}");
    }

    /**
     * @Attribute
     * Hash the password if it's not already hashed whenever it is changed
     */
    public function password(): Attribute
    {
        return Attribute::set(fn ($value) => Hash::info($value)['algo'] ? $value : Hash::make($value));
    }

    /**
     * Set username to uppercase
     */
    public function username(): Attribute
    {
        return Attribute::set(fn ($value) => strtoupper($value));
    }

    /**
     * Set email to lowercase
     */
    public function email(): Attribute
    {
        return Attribute::set(fn ($value) => strtolower($value));
    }

    public function shouldNotVerifyAccount(): bool
    {
        return in_array($this->email, config('eatci.system_admin_emails'));
    }

    public function sendWelcomeNotification(Carbon $validUntil)
    {
        if ($this->shouldNotVerifyAccount()) {
            return;
        }

        $this->notify(new WelcomeNotification($validUntil));
    }

    public function welcomeNotificationKeyValue()
    {
        return $this->hashId;
    }

    public function sendEmailVerificationNotification()
    {
        if ($this->shouldNotVerifyAccount()) {
            return;
        }

        $this->notify(new QueuedVerifyEmailNotification($this));
    }

    public function sendPasswordResetNotification($token): void
    {
        if ($this->shouldNotVerifyAccount()) {
            return;
        }

        $this->notify(new QueuedResetPasswordNotification($token));
    }

    /**
     * @SlackIntegration
     * Route notifications for the Slack channel.
     */
    public function routeNotificationForSlack(Notification $notification): string
    {
        return config('services.slack.webhooks.dev-alerts');
    }

    /**
     * Check if the user is disabled.
     */
    public function isDisabled(): bool
    {
        return (bool) $this->disabled_at;
    }

    /**
     * Check if the user is enabled.
     */
    public function isEnabled(): bool
    {
        return ! $this->isDisabled();
    }

    /**
     * Check if the user has verified his account.
     */
    public function isVerified()
    {
        return (bool) $this->email_verified_at && (bool) $this->welcome_valid_until;
    }

    /**
     * Check if the user is a super admin.
     */
    public function isSuperAdmin(): bool
    {
        return $this->currentRole->name == RoleEnum::SYSTEM_ADMIN->value;
    }

    /**
     * Check if the user is an admin.
     */
    public function isAdmin(): bool
    {
        return $this->currentRole->name == RoleEnum::ADMIN->value;
    }

    /**
     * Check if the user is an expert admin.
     */
    public function isAdminExpert(): bool
    {
        return $this->currentRole->name == RoleEnum::EXPERT_ADMIN->value;
    }

    /**
     * Check if the user is an insurer admin.
     */
    public function isInsurerAdmin(): bool
    {
        return $this->currentRole->name == RoleEnum::INSURER_ADMIN->value;
    }

    /**
     * Check if the user is an insurer standard user.
     */
    public function isInsurerStandardUser(): bool
    {
        return $this->currentRole->name == RoleEnum::INSURER_STANDARD_USER->value;
    }

    /**
     * Check if the user is a repairer admin.
     */
    public function isRepairerAdmin(): bool
    {
        return $this->currentRole->name == RoleEnum::REPAIRER_ADMIN->value;
    }

    /**
     * Check if the user is a repairer standard user.
     */
    public function isRepairerStandardUser(): bool
    {
        return $this->currentRole->name == RoleEnum::REPAIRER_STANDARD_USER->value;
    }

    /**
     * Check if the user is a client.
     */
    public function isClient(): bool
    {
        return $this->currentRole->name == RoleEnum::CLIENT->value;
    }

    public function passwordHistories()
    {
        return $this->morphMany(PasswordHistory::class, 'model');
    }

    public function newEloquentBuilder($query): UserBuilder
    {
        return new UserBuilder($query);
    }

    /**
     * Get the current user's role
     * @return string
     */
    public function role(): string
    {
        return $this->roles->first()->name;
    }

    /**
     * Get the current role of the user
     * @return BelongsTo
     */
    public function currentRole(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'current_role_id');
    }

    public function entity() : BelongsTo
    {
        return $this->belongsTo(Entity::class);
    }

    public function status() : BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
