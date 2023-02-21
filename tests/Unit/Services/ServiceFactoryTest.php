<?php

namespace Tests\Unit\Services;

use App\Services\BaseConversionService;
use App\Services\CacheService;
use App\Services\CounterService;
use App\Services\RetrieveLongUrlService;
use App\Services\ServiceFactory;
use App\Services\UrlGeneratorService;
use Tests\TestCase;

class ServiceFactoryTest extends TestCase
{
    public function testServiceFactoryReturnsCorrectInstances()
    {
        $serviceFactory = new ServiceFactory();

        $this->assertInstanceOf(BaseConversionService::class, $serviceFactory->createBaseConversionService());
        $this->assertInstanceOf(CounterService::class, $serviceFactory->createCounterService());
        $this->assertInstanceOf(UrlGeneratorService::class, $serviceFactory->createUrlGeneratorService());
        $this->assertInstanceOf(CacheService::class, $serviceFactory->createCacheService());
        $this->assertInstanceOf(RetrieveLongUrlService::class, $serviceFactory->createRetrieveLongUrlService());
    }
}
