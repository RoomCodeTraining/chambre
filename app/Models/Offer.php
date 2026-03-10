<?php

namespace App\Models;

use App\Builders\Offer\OfferBuilder;
use App\Filters\OfferFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;

class Offer extends Model
{
    use HasFactory, Filterable, SoftDeletes, HasHashId, HasHashIdRouting;

    protected string $default_filters = OfferFilters::class;

    protected $guarded = [];

    public function comparison(): BelongsTo
    {
        return $this->belongsTo(Comparison::class);
    }

    public function repairer(): BelongsTo
    {
        return $this->belongsTo(Entity::class);
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

    public function offerShocks(): HasMany
    {
        return $this->hasMany(OfferShock::class);
    }

    public function newEloquentBuilder($query): OfferBuilder
    {
        return new OfferBuilder($query);
    }
}
