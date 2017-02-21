<?php

$access_token = 'Ns2HTJkXtLxaV0E52ZI409E6oG/NVwN7ZKXTaHZSs/KS4LenNVh6VpCiz+AwRpTHqlUH9fw+iJRxWULG7LHdeIEmoNT67iR3AswlFGJJO6W7et3YixhBF5gCQDgtG/Idq08FdSHYS9OMOBQwdqOQxQdB04t89/1O/w1cDnyilFU=';

/* 
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '084e9260baa38004fc2eb2b599fc5157']);
$response = $bot->getProfile('U583bfafb13ea45d23ab1bb4c545b2d0a');

*/ 

 $mock = function ($testRunner, $httpMethod, $url, $data) {
            /** @var \PHPUnit_Framework_TestCase $testRunner */
            $testRunner->assertEquals('GET', $httpMethod);
            $testRunner->assertEquals('https://api.line.me/v2/bot/profile/USER_ID', $url);
            return [
                'displayName' => 'BOT API',
                'userId' => 'userId',
                'pictureUrl' => 'https://example.com/abcdefghijklmn',
                'statusMessage' => 'Hello, LINE!',
            ];
        };
        $bot = new LINEBot(new DummyHttpClient($this, $mock), ['channelSecret' => 'CHANNEL-SECRET']);
        $res = $bot->getProfile('USER_ID');
        $this->assertEquals(200, $res->getHTTPStatus());
        $this->assertTrue($res->isSucceeded());
        $data = $res->getJSONDecodedBody();
        $this->assertEquals('BOT API', $data['displayName']);
        $this->assertEquals('userId', $data['userId']);
        $this->assertEquals('https://example.com/abcdefghijklmn', $data['pictureUrl']);
        $this->assertEquals('Hello, LINE!', $data['statusMessage']);

?> 
