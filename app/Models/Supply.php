<?php

namespace App\Models;

use App\Filters\SupplyFilters;
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

class Supply extends Model
{
    use Filterable;
    use HasFactory;
    use HasHashId;
    use HasHashIdRouting;
    use SoftDeletes;

    protected string $default_filters = SupplyFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
     protected $guarded = [];

    /**
     * Get all shock works using this supply
     */
    public function shockWorks(): HasMany
    {
        return $this->hasMany(ShockWork::class);
    }

    /**
     * Get the status of this supply
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the user who created this supply
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this supply
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted this supply
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
