<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    const CACHING_TIME_IN_SECONDS = 60*60*24;

    public function put(string $shortUrl, string $longUrl): void
    {
        Cache::put($shortUrl, $longUrl , self::CACHING_TIME_IN_SECONDS);
    }

    public function get(string $shortUrl): ?string
    {
        return Cache::get($shortUrl);
    }
}
