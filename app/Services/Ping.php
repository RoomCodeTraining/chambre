<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Ping
{
    public static function successful(string $url, string $method = 'GET'): bool
    {
        try {
            $response = match ($method) {
                'GET' => Http::get($url),
                'POST' => Http::post($url),
                'PUT' => Http::put($url),
                'DELETE' => Http::delete($url),
                'PATCH' => Http::patch($url),
                default => throw new \InvalidArgumentException('Method not supported'),
            };

            return $response->successful();
        } catch (\Throwable $th) {
            return false;
        }
    }
}
