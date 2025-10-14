<?php

namespace App\Models;

use App\Filters\AssignmentRequestFilters;
use App\Builders\AssignmentRequest\AssignmentRequestBuilder;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;


class AssignmentRequest extends Model
{
    use HasFactory, Filterable, HasHashId, HasHashIdRouting;

    protected string $default_filters = AssignmentRequestFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the assignment type for this assignment request
     */
    public function assignmentType(): BelongsTo
    {
        return $this->belongsTo(AssignmentType::class);
    }

    /**
     * Get the expertise type for this assignment request
     */
    public function expertiseType(): BelongsTo
    {
        return $this->belongsTo(ExpertiseType::class);
    }

    /**
     * Get the assignments for this assignment request
     */
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * Get the user who created this assignment request
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this assignment request
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted this assignment request
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    /**
     * Get the status of this assignment request
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the expert firm for this assignment request
     */
    public function expertFirm(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'expert_firm_id');
    }

    /**
     * Get the insurer for this assignment request
     */
    public function insurer(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'insurer_id');
    }

    /**
     * Get the repairer for this assignment request
     */
    public function repairer(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'repairer_id');
    }

    /**
     * Get the client for this assignment request
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the vehicle for this assignment request
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function newEloquentBuilder($query): AssignmentRequestBuilder
    {
        return new AssignmentRequestBuilder($query);
    }

}
