<?php

namespace Tests\Unit\Services;

use App\Services\CacheService;
use Tests\TestCase;

class CacheServiceTest extends TestCase
{
    public function testPut()
    {
        $shortUrl = 'http://example.com/1q2w3e4';
        $longUrl = 'http://some-very-long-url-need-to-be-shortened.com/some-query-params';
        $service = new CacheService();
        $res = $service->put($shortUrl, $longUrl);
        $this->assertNull($res);
    }

    /**
     * @dataProvider getDataProvider
     * @return void
     */
    public function testGet(array $expected, array $assertions)
    {
        $service = new CacheService();
        $result = $service->get($assertions['shortUrl']);
        $this->assertEquals($expected['result'], $result);
    }

    public function getDataProvider()
    {
        return [
            'null-result' => [
                'expected' => [
                    'result' => null,
                ],
                'assertions' => [
                    'shortUrl' => 'http://example.com/1q2w3e4'
                ],
            ],
            'correct-result' => [
                'expected' => [
                    'result' => null,
                ],
                'assertions' => [
                    'shortUrl' => 'http://some-very-long-url-need-to-be-shortened.com/some-query-params'
                ],
            ],
        ];
    }
}
