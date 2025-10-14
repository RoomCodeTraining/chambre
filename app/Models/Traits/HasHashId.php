<?php

namespace App\Models\Traits;

use Vinkla\Hashids\Facades\Hashids;

trait HasHashId
{
    public function getHashidAttribute()
    {
        return Hashids::encode($this->getKey());
    }

    public static function findByHashid($hashid)
    {
        $decoded = Hashids::decode($hashid);
        return static::find($decoded[0] ?? null);
    }
}
