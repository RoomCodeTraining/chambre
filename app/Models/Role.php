<?php

namespace App\Models;

use Essa\APIToolKit\Filters\Filterable;
use App\Filters\RoleFilters;
use App\Builders\Role\RoleBuilder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory, Filterable, HasHashId, HasHashIdRouting;

    protected string $default_filters = RoleFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    
     protected $guarded = [];

    // public function users() : HasMany
    // {
    //     return $this->hasMany(User::class);
    // }

    // public function permissions() : BelongsToMany
    // {
    //     return $this->belongsToMany(Permission::class);
    // }

    public function newEloquentBuilder($query): RoleBuilder
    {
        return new RoleBuilder($query);
    }

}
