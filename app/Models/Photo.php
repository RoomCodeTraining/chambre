<?php

namespace App\Models;

use App\Filters\PhotoFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Photo extends Model
{
    use Filterable;
    use HasFactory;
    use HasHashId;
    use HasHashIdRouting;
    use SoftDeletes;

    protected string $default_filters = PhotoFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
     protected $guarded = [];

    /**
     * Get the assignment report this photo belongs to
     */
    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * Get the assignment request this photo belongs to
     */
    public function assignmentRequest(): BelongsTo
    {
        return $this->belongsTo(AssignmentRequest::class);
    }

    /**
     * Get the photo type of this photo
     */
    public function photoType(): BelongsTo
    {
        return $this->belongsTo(PhotoType::class);
    }

    /** 
     * Get the status of this photo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /** 
     * Get the user who created this photo
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this photo
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted this photo
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
