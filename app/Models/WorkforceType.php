<?php

namespace App\Models;

use App\Filters\WorkforceTypeFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WorkforceType extends Model
{
    use Filterable;
    use HasFactory;
    use HasHashId;
    use HasHashIdRouting;
    use SoftDeletes;

    protected string $default_filters = WorkforceTypeFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all workforces of this type
     */
    public function workforces(): HasMany
    {
        return $this->hasMany(Workforce::class);
    }

    /**
     * Get the status of this workforce type
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the user who created this workforce type
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this workforce type
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted this workforce type
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
