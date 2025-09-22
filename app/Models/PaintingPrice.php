<?php

namespace App\Models;

use App\Filters\PaintingPriceFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PaintingPrice extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = PaintingPriceFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];

    public function hourlyRate()
    {
        return $this->belongsTo(HourlyRate::class);
    }

    public function paintType()
    {
        return $this->belongsTo(PaintType::class);
    }

    public function numberPaintElement()
    {
        return $this->belongsTo(NumberPaintElement::class);
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

}
