<?php

namespace App\Models;

use App\Filters\AssignmentDocumentFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AssignmentDocument extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = AssignmentDocumentFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        
    ];


}
