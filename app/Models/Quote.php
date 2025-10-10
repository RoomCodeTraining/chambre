<?php

namespace App\Models;

use App\Filters\QuoteFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Quote extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = QuoteFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        
    ];


}
