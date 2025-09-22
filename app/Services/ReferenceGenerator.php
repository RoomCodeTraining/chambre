<?php

namespace App\Services;

use Illuminate\Support\Str;
use Random\RandomException;

class ReferenceGenerator
{
    /**
     * @throws RandomException
     */
    public static function random(string $prefix = 'REF', int $length = 16): string
    {
        $bytes = random_bytes(ceil($length / 2));
        $randomPart = bin2hex($bytes);

        return Str::upper($prefix.'-'.$randomPart);
    }

    public static function monthBased(string $prefix = 'REF', int $length = 10): string
    {
        $year = now()->year;
        $month = now()->format('m');

        $bytes = random_bytes(ceil($length / 2));
        $randomPart = Str::substr(bin2hex($bytes), 0, $length);

        return Str::upper($prefix.'-'.$month.$year.'-'.$randomPart);
    }
}
