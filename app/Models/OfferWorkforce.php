<?php

namespace App\Models;

use App\Filters\OfferWorkforceFilters;
use App\Builders\OfferWorkforce\OfferWorkforceBuilder;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;

class OfferWorkforce extends Model
{
    use HasFactory, Filterable, SoftDeletes, HasHashId, HasHashIdRouting;

    protected string $default_filters = OfferWorkforceFilters::class;

    protected $guarded = [];

    public function offerShock(): BelongsTo
    {
        return $this->belongsTo(OfferShock::class);
    }

    public function workforceType(): BelongsTo
    {
        return $this->belongsTo(WorkforceType::class);
    }

    public function oldWorkforceType(): BelongsTo
    {
        return $this->belongsTo(WorkforceType::class, 'old_workforce_type_id');
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

    public function newEloquentBuilder($query): OfferWorkforceBuilder
    {
        return new OfferWorkforceBuilder($query);
    }
}
