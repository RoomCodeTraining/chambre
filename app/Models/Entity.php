<?php

namespace App\Models;

use App\Models\Status;
use App\Filters\EntityFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Entity extends Model
{
    use Filterable;
    use HasFactory;
    use HasHashId;
    use HasHashIdRouting;
    use QueryCacheable;
    use SoftDeletes;

    protected string $default_filters = EntityFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    
     protected $guarded = [];

    /**
     * Get the entity type this entity belongs to
     */
    public function entityType(): BelongsTo
    {
        return $this->belongsTo(EntityType::class);
    }

    /**
     * Get all users belonging to this entity
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get all assignments where this entity is the insurer
     */
    public function insurers(): HasMany
    {
        return $this->hasMany(Assignment::class, 'insurer_id');
    }

    /**
     * Get all assignments where this entity is the repairer
     */
    public function repairers(): HasMany
    {
        return $this->hasMany(Assignment::class, 'repairer_id');
    }

    /**
     * Get the status of this entity
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the user who created this entity
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this entity
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted this entity
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
