<?php

namespace App\Models;

use App\Filters\OfferShockFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OfferShock extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = OfferShockFilters::class;

    protected $guarded = [];

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }

    public function shockPoint(): BelongsTo
    {
        return $this->belongsTo(ShockPoint::class);
    }

    public function paintType(): BelongsTo
    {
        return $this->belongsTo(PaintType::class);
    }

    public function hourlyRate(): BelongsTo
    {
        return $this->belongsTo(HourlyRate::class);
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

    public function offerShockWorks(): HasMany
    {
        return $this->hasMany(OfferShockWork::class);
    }

    public function offerWorkforces(): HasMany
    {
        return $this->hasMany(OfferWorkforce::class);
    }
}
