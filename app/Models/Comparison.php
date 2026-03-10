<?php

namespace App\Models;

use App\Builders\Comparison\ComparisonBuilder;
use App\Filters\ComparisonFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;

class Comparison extends Model
{
    use HasFactory, Filterable, SoftDeletes, HasHashId, HasHashIdRouting;

    protected string $default_filters = ComparisonFilters::class;

    protected $guarded = [];

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }

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

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function newEloquentBuilder($query): ComparisonBuilder
    {
        return new ComparisonBuilder($query);
    }
}
