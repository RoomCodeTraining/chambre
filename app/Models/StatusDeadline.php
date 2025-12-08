<?php

namespace App\Models;

use App\Filters\StatusDeadlineFilters;
use Essa\APIToolKit\Filters\Filterable;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class StatusDeadline extends Model
{
    use HasFactory, Filterable, HasHashId, HasHashIdRouting, SoftDeletes;

    protected string $default_filters = StatusDeadlineFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the entity of this status deadline
     */
    public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class);
    }

    /**
     * Get the status of this status deadline
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the user who created this status deadline
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this status deadline
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted this status deadline
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    /**
     * Get the general status deadline of this status deadline
     */
    public function generalStatusDeadline(): BelongsTo
    {
        return $this->belongsTo(GeneralStatusDeadline::class, 'general_status_deadline_id');
    }

}
