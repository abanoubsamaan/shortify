<?php

namespace App\Services;

class UrlGeneratorService
{
    public function __construct(private ServiceFactory $serviceFactory)
    {
    }

    public function generateShortUrl(): string
    {
        $baseUrl =  env('APP_URL');
        $counterService = $this->serviceFactory->createCounterService();
        $uniqueId = $counterService->getUniqueID();

        return $baseUrl.$uniqueId;
    }

    public function getShortUrl(string $uniqueId): string
    {
        $baseUrl =  env('APP_URL');
        return $baseUrl.$uniqueId;
    }
}
