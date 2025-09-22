<?php

namespace App\Models;

use App\Filters\VehicleFilters;
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

class Vehicle extends Model
{
    use Filterable;
    use HasFactory;
    use HasHashId;
    use HasHashIdRouting;
    use SoftDeletes;

    protected string $default_filters = VehicleFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
     protected $guarded = [];

    /**
     * Get the brand of this vehicle
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the vehicle model this vehicle belongs to
     */
    public function vehicleModel(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class);
    }

    /**
     * Get the vehicle state of this vehicle
     */
    public function vehicleState(): BelongsTo
    {
        return $this->belongsTo(VehicleState::class);
    }

    /**
     * Get the color of this vehicle
     */
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * Get the bodywork of this vehicle
     */
    public function bodywork(): BelongsTo
    {
        return $this->belongsTo(Bodywork::class);
    }

    /**
     * Get the vehicle genre of this vehicle
     */
    public function vehicleGenre(): BelongsTo
    {
        return $this->belongsTo(VehicleGenre::class);
    }

    /**
     * Get the vehicle energy of this vehicle
     */
    public function vehicleEnergy(): BelongsTo
    {
        return $this->belongsTo(VehicleEnergy::class);
    }

    /**
     * Get all assignments for this vehicle
     */
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * Get the status of this vehicle
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the user who created this vehicle
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this vehicle
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted this vehicle
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
