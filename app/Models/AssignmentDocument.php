<?php

namespace App\Models;

use App\Filters\AssignmentDocumentFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;


class AssignmentDocument extends Model
{
    use HasFactory, Filterable, HasHashId, HasHashIdRouting;

    protected string $default_filters = AssignmentDocumentFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        
    ];


}
