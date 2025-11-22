<?php

namespace App\Models;

use Essa\APIToolKit\Filters\Filterable;
use App\Filters\PermissionFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory, Filterable, HasHashId, HasHashIdRouting;

    protected string $default_filters = PermissionFilters::class;

    public function team()
    {
        return $this->belongsTo(Office::class);
    }

}
