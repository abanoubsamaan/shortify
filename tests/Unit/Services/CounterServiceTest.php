<?php

namespace Tests\Unit\Services;

use App\Services\BaseConversionService;
use App\Services\CounterService;
use App\Services\ServiceFactory;
use Mockery;
use Tests\TestCase;

class CounterServiceTest extends TestCase
{
    public function testGetUniqueID(){
        $serviceFactory = Mockery::mock(ServiceFactory::class);
        $baseConversionService = Mockery::mock(BaseConversionService::class);
        $baseConversionService->allows(['base10toBase62' => 'hBxM5A4']);
        $serviceFactory->allows([
            'createBaseConversionService' => $baseConversionService
        ]);
        $service = new CounterService($serviceFactory);
        $this->assertEquals('hBxM5A4', $service->getUniqueID());
    }
}
