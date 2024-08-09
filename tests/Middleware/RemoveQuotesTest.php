<?php

namespace ArafatIslam\LaravelPageSpeed\Test\Middleware;

use ArafatIslam\LaravelPageSpeed\Middleware\RemoveQuotes;
use ArafatIslam\LaravelPageSpeed\Test\TestCase;

class RemoveQuotesTest extends TestCase
{
    protected function getMiddleware()
    {
        $this->middleware = new RemoveQuotes();
    }

    public function testRemoveQuotes()
    {
        $response = $this->middleware->handle($this->request, $this->getNext());

        $this->assertContains('<link rel="apple-touch-icon" href="icon.png">', $response->getContent());
        $this->assertContains('<meta charset=utf-8>', $response->getContent());
        $this->assertContains('<meta name=viewport content="width=device-width, initial-scale=1">', $response->getContent());
        $this->assertContains('<img src=http://emblemsbf.com/img/18346.jpg width=250 style="height:300px; padding:10px" >', $response->getContent());
        $this->assertContains('<img src=/images/1000coin.png>', $response->getContent());
        $this->assertContains('<vue-component :src="\'src\'" :type="\'type\'" :width="200"></vue-component>', $response->getContent());
        $this->assertContains('<img src="tile whitespace.png" width=250 style="height:300px; padding:10px">', $response->getContent());
        $this->assertContains('<input type=text name="name with spaces" value="name with spaces" width=100%>', $response->getContent());
    }
}
