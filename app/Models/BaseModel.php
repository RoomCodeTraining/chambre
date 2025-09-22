<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BaseModel extends Model
{

    use SoftDeletes;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * [boot Model boot event]
     *
     * @return [type]  [return description]
     */
    static function boot()
    {
        // static::creating(
        //     function ($model) {
        //         $model->uuid = (string) Str::uuid();
        //     }
        // );

        parent::boot();
    }
}
