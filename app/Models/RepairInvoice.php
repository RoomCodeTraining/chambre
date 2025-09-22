<?php

namespace App\Models;

use App\Filters\RepairInvoiceFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RepairInvoice extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = RepairInvoiceFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        
    ];


}
