<?php

namespace App\Models;

use App\Filters\ReceiptFilters;
use App\Builders\Receipt\ReceiptBuilder;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Receipt extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = ReceiptFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];

    public function receiptType()
    {
        return $this->belongsTo(ReceiptType::class);
    }

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function newEloquentBuilder($query): ReceiptBuilder
    {
        return new ReceiptBuilder($query);
    }   

}
