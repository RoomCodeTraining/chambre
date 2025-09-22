<?php

namespace App\Models;

use App\Filters\RepairInvoiceTypeFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RepairInvoiceType extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = RepairInvoiceTypeFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        
    ];


}
