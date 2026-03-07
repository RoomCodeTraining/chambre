<?php

namespace App\Models;

use App\Builders\OfferShockWork\OfferShockWorkBuilder;
use App\Filters\OfferShockWorkFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfferShockWork extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = OfferShockWorkFilters::class;

    protected $guarded = [];

    public function offerShock(): BelongsTo
    {
        return $this->belongsTo(OfferShock::class);
    }

    public function supply(): BelongsTo
    {
        return $this->belongsTo(Supply::class);
    }

    public function oldSupply(): BelongsTo
    {
        return $this->belongsTo(Supply::class, 'old_supply_id');
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

    public function newEloquentBuilder($query): OfferShockWorkBuilder
    {
        return new OfferShockWorkBuilder($query);
    }
}
