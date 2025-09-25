<?php

namespace App\Models;

use App\Filters\ShockFilters;
use App\Builders\Shock\ShockBuilder;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Shock extends Model
{
    use Filterable;
    use HasFactory;
    use HasHashId;
    use HasHashIdRouting;
    use SoftDeletes;

    protected string $default_filters = ShockFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
     protected $guarded = [];

    /**
     * Get the assignment report this shock belongs to
     */
    public function assignmentReport(): BelongsTo
    {
        return $this->belongsTo(AssignmentReport::class);
    }

    /**
     * Get the assignment this shock belongs to
     */
    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * Get the paint type this shock belongs to
     */
    public function paintType(): BelongsTo
    {
        return $this->belongsTo(PaintType::class);
    }

    /**
     * Get the hourly rate this shock belongs to
     */
    public function hourlyRate(): BelongsTo
    {
        return $this->belongsTo(HourlyRate::class);
    }

    /**
     * Get the shock point this shock belongs to
     */
    public function shockPoint(): BelongsTo
    {
        return $this->belongsTo(ShockPoint::class);
    }

    /**
     * Get all workforces for this shock
     */
    public function workforces(): HasMany
    {
        return $this->hasMany(Workforce::class);
    }

    /**
     * Get all shock works for this shock
     */
    public function shockWorks(): HasMany
    {
        return $this->hasMany(ShockWork::class);
    }

    /**
     * Get the status of this shock
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the user who created this shock
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this shock
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted this shock
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function newEloquentBuilder($query): ShockBuilder
    {
        return new ShockBuilder($query);
    }
}
