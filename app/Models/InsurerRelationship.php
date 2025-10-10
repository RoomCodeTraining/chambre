<?php

namespace App\Models;

use App\Filters\InsurerRelationshipFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class InsurerRelationship extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = InsurerRelationshipFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the insurer for this insurer relationship
     */
    public function insurer(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'insurer_id');
    }

    /**
     * Get the expert firm for this insurer relationship
     */
    public function expertFirm(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'expert_firm_id');
    }

    /**
     * Get the status for this insurer relationship
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the created by for this insurer relationship
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the updated by for this insurer relationship
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the enabled by for this insurer relationship
     */
    public function enabledBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'enabled_by');
    }

    /**
     * Get the disabled by for this insurer relationship
     */
    public function disabledBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'disabled_by');
    }

    /**
     * Get the deleted by for this insurer relationship
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

}
