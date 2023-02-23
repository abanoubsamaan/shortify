<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShortifyTest extends TestCase
{

    public function testHomePageCanBeRendered()
    {
        $response = $this->get('/');
        $response->assertSee('Please enter the long URL');
        $response->assertStatus(200);
    }
    public function testShortenerForm()
    {
        $response = $this->post('/', [
            'url' => 'http://some-long-url-need-to-be-shortened.com/some-query-params',
        ]);
        $response->assertStatus(200);
        $response->assertSee('http://shortify.test/');
        $this->assertArrayHasKey( 'shortenerResult', $response);
    }

    public function testShortUrlRedirection()
    {
        $url = 'http://some-long-url-need-to-be-shortened.com/some-query-params';
        $response = $this->post('/', [
            'url' => 'http://some-long-url-need-to-be-shortened.com/some-query-params',
        ]);
        $showUrl = $this->get($response['shortenerResult']);
        $showUrl->assertRedirect($url);
    }

}
