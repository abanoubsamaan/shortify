<?php

namespace Tests\Unit\Services;

use App\Services\BaseConversionService;
use Tests\TestCase;

class BaseConversionServiceTest extends TestCase
{
    public function testBase10ToBase62()
    {
        $base10Value = '1000000000000';
        $expectedBase62Value = 'hBxM5A4';
        $service = new BaseConversionService();
        $result = $service->base10toBase62($base10Value);
        $this->assertEquals($expectedBase62Value, $result);
    }

    public function testBase62ToBase10()
    {
        $base62Value = 'hBxM5A4';
        $expectedBase10Value = '1000000000000';
        $service = new BaseConversionService();
        $result = $service->base62toBase10($base62Value);
        $this->assertEquals($expectedBase10Value, $result);
    }
}
