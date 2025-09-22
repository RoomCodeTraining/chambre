<?php

namespace App\Models;

use App\Filters\StatusFilters;
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

class Status extends BaseModel
{
    use Filterable;
    use HasFactory;
    use HasHashId;
    use HasHashIdRouting;
    use SoftDeletes;

    protected string $default_filters = StatusFilters::class;

    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all assignments with this status
     */
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * Get all assignment reports with this status
     */
    public function assignmentReports(): HasMany
    {
        return $this->hasMany(AssignmentReport::class);
    }

    /**
     * Get all shocks with this status
     */
    public function shocks(): HasMany
    {
        return $this->hasMany(Shock::class);
    }

    /**
     * Get all shock works with this status
     */
    public function shockWorks(): HasMany
    {
        return $this->hasMany(ShockWork::class);
    }

    /**
     * Get all shock points with this status
     */
    public function shockPoints(): HasMany
    {
        return $this->hasMany(ShockPoint::class);
    }

    /**
     * Get all vehicles with this status
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    /**
     * Get all vehicle models with this status
     */
    public function vehicleModels(): HasMany
    {
        return $this->hasMany(VehicleModel::class);
    }

    /**
     * Get all vehicle states with this status
     */
    public function vehicleStates(): HasMany
    {
        return $this->hasMany(VehicleState::class);
    }

    /**
     * Get all brands with this status
     */
    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }

    /**
     * Get all colors with this status
     */
    public function colors(): HasMany
    {
        return $this->hasMany(Color::class);
    }

    /**
     * Get all entities with this status
     */
    public function entities(): HasMany
    {
        return $this->hasMany(Entity::class);
    }

    /**
     * Get all entity types with this status
     */
    public function entityTypes(): HasMany
    {
        return $this->hasMany(EntityType::class);
    }

    /**
     * Get all supplies with this status
     */
    public function supplies(): HasMany
    {
        return $this->hasMany(Supply::class);
    }

    /**
     * Get all photos with this status
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    /**
     * Get all QR codes with this status
     */
    public function qrCodes(): HasMany
    {
        return $this->hasMany(QrCode::class);
    }

    /**
     * Get all workforces with this status
     */
    public function workforces(): HasMany
    {
        return $this->hasMany(Workforce::class);
    }

    /**
     * Get all workforce types with this status
     */
    public function workforceTypes(): HasMany
    {
        return $this->hasMany(WorkforceType::class);
    }

    /**
     * Get the user who created this status
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this status
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted this status
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
