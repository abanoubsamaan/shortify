<?php

namespace App\Services;

use App\Models\ShortUrl;

class RetrieveLongUrlService
{

    public function __construct(private ServiceFactory $serviceFactory)
    {
    }

    public function execute(string $uniqueId)
    {
        $urlService = $this->serviceFactory->createUrlGeneratorService();
        $cacheService = $this->serviceFactory->createCacheService();
        $shortUrl = $urlService->getShortUrl(uniqueId: $uniqueId);

        $cachedUrl = $cacheService->get(shortUrl: $shortUrl);
        if ($cachedUrl)
        {
            return $cachedUrl;
        }
        $urlFromDB = ShortUrl::where('short_url', $shortUrl)->firstOrFail();
        $cacheService->put(shortUrl: $uniqueId, longUrl: $urlFromDB->long_url);

        return $urlFromDB->long_url;
    }
}
