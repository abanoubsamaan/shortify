<?php

namespace App\Services;

class ServiceFactory
{
    public function createBaseConversionService(): BaseConversionService
    {
        return new BaseConversionService();
    }

    public function createCounterService()
    {
        return new CounterService($this);
    }

    public function createUrlGeneratorService(): UrlGeneratorService
    {
        return new UrlGeneratorService($this);
    }

    public function createCacheService(): CacheService
    {
        return new CacheService();
    }

    public function createRetrieveLongUrlService(): RetrieveLongUrlService
    {
        return new RetrieveLongUrlService($this);
    }

}
