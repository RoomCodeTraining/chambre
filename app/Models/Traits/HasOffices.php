<?php

namespace App\Models\Traits;

use App\Models\Membership;
use App\Models\Office;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;

trait HasOffices
{
    /**
     * Determine if the given office is the current office.
     *
     * @param  mixed  $office
     * @return bool
     */
    public function isCurrentOffice($office)
    {
        return $office->id === $this->currentOffice->id;
    }

    /**
     * Get the current office of the user's context.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentOffice()
    {
        return $this->belongsTo(Office::class, 'current_office_id');
    }

    /**
     * Switch the user's context to the given office.
     *
     * @param  mixed  $office
     * @return bool
     */
    public function switchOffice($office)
    {
        if (! $this->belongsToOffice($office)) {
            return false;
        }

        $this->forceFill([
            'current_office_id' => $office->id,
        ])->save();

        $this->setRelation('currentOffice', $office);

        return true;
    }

    /**
     * Get all the offices the user owns or belongs to.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allOffices()
    {
        return $this->ownedOffices->merge($this->offices)->sortBy('name');
    }

    /**
     * Get all the offices the user owns.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ownedOffices()
    {
        return $this->hasMany(Office::class);
    }

    /**
     * Get all the offices the user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function offices()
    // {
    //     return $this->belongsToMany(Office::class, Membership::class)
    //         ->withPivot('role')
    //         ->withTimestamps()
    //         ->as('membership');
    // }

    /**
     * Determine if the user owns the given office.
     *
     * @param  mixed  $office
     */
    public function ownsOffice($office): bool
    {
        if (is_null($office)) {
            return false;
        }

        return $this->id == $office->{$this->getForeignKey()};
    }

    /**
     * Get the user's "master" office.
     *
     * @return \App\Models\Office
     */
    public function masterOffice(): bool
    {
        return $this->offices()->where('is_master_office', true)->get()->isNotEmpty();
    }

    /**
     * Determine if the user belongs to the given office.
     *
     * @param  mixed  $office
     * @return bool
     */
    public function belongsToOffice($office)
    {
        if (is_null($office)) {
            return false;
        }

        return $this->ownsOffice($office) || $this->offices->contains(function ($o) use ($office) {
            return $o->id === $office->id;
        });
    }

    /**
     * Get the role that the user has on the office.
     *
     * @param  mixed  $office
     * @return \App\Models\Role|null
     */
    public function officeRole($office)
    {
        if (! $this->belongsToOffice($office)) {
            return null;
        }

        if ($this->ownsOffice($office)) {
            return Role::firstWhere('name', \App\Enums\RoleEnum::OFFICE_ADMIN->value);
        }

        // $role = Membership::firstWhere(['office_id' => $office->id, 'user_id' => $this->id])->role;

        return $role ? Role::firstWhere('name', $role) : null;
    }

    public function currentOfficeRole()
    {
        return $this->officeRole($this->currentOffice);
    }

    /**
     * Determine if the user has the given role on the given office.
     *
     * @param  mixed  $office
     * @return bool
     */
    public function hasOfficeRole($office, string $role)
    {
        if ($this->ownsOffice($office)) {
            return true;
        }

        return $this->belongsToOffice($office) && optional(Role::firstWhere('name', $office->users->where(
            'id',
            $this->id
        )->first()->membership->role))->key === $role;
    }

    /**
     * Get the user's permissions for the given office.
     *
     * @param  mixed  $office
     * @return array
     */
    public function officePermissions($office)
    {
        if ($this->ownsOffice($office)) {
            return ['*'];
        }

        if (! $this->belongsToOffice($office)) {
            return [];
        }

        return (array) optional($this->officeRole($office))->permissions;
    }

    /**
     * Determine if the user has the given permission on the given office.
     *
     * @param  mixed  $office
     * @return bool
     */
    public function hasOfficePermission($office, string $permission)
    {
        if ($this->ownsOffice($office)) {
            return true;
        }

        if (! $this->belongsToOffice($office)) {
            return false;
        }

        if (in_array(HasApiTokens::class, \class_uses_recursive($this)) &&
            ! $this->tokenCan($permission) &&
            $this->currentAccessToken() !== null) {
            return false;
        }

        $permissions = $this->officePermissions($office);

        return in_array($permission, $permissions) ||
               in_array('*', $permissions) ||
               (Str::endsWith($permission, ':create') && in_array('*:create', $permissions)) ||
               (Str::endsWith($permission, ':update') && in_array('*:update', $permissions));
    }
}
