<?php

namespace App\Models;

use App\Filters\PaymentHistoricFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PaymentHistoric extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = PaymentHistoricFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * Get the payment of this payment historic
     */
    public function payment(): HasOne
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * Get the user who created this payment historic
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who updated this payment historic
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted this payment historic
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    /**
     * Get the status of this payment historic
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

}
