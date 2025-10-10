<?php

namespace App\Models;

use App\Filters\OtherCostFilters;
use App\Builders\OtherCost\OtherCostBuilder;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OtherCost extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = OtherCostFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];

    public function otherCostType()
    {
        return $this->belongsTo(OtherCostType::class);
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

    public function newEloquentBuilder($query): OtherCostBuilder
    {
        return new OtherCostBuilder($query);
    }

}
