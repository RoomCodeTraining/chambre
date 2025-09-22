<?php

namespace App\Models;

use App\Filters\UserActionFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserAction extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = UserActionFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];

    public function userActionType(): BelongsTo
    {
        return $this->belongsTo(UserActionType::class);
    }

    public function createdBy(): BelongsTo
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

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
