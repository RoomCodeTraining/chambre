<?php

namespace App\Models;

use App\Filters\WorkFeeFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class WorkFee extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = WorkFeeFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
