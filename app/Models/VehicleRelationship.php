<?php

namespace App\Models;

use App\Filters\VehicleRelationshipFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;

class VehicleRelationship extends Model
{
    use HasFactory, Filterable, HasHashId, HasHashIdRouting;

    protected string $default_filters = VehicleRelationshipFilters::class;

     /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the vehicle for this vehicle relationship
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Get the expert firm for this vehicle relationship
     */
    public function expertFirm(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'expert_firm_id');
    }

    /**
     * Get the insurer for this vehicle relationship
     */
    public function insurer(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'insurer_id');
    }

    /**
     * Get the repairer for this vehicle relationship
     */
    public function repairer(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'repairer_id');
    }

    /**
     * Get the status for this vehicle relationship
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
    /**
     * Get the created by for this vehicle relationship
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the updated by for this vehicle relationship
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }    

    /**
     * Get the deleted by for this vehicle relationship
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }


}
