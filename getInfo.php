<?php

$access_token = 'Ns2HTJkXtLxaV0E52ZI409E6oG/NVwN7ZKXTaHZSs/KS4LenNVh6VpCiz+AwRpTHqlUH9fw+iJRxWULG7LHdeIEmoNT67iR3AswlFGJJO6W7et3YixhBF5gCQDgtG/Idq08FdSHYS9OMOBQwdqOQxQdB04t89/1O/w1cDnyilFU=';
/*
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '084e9260baa38004fc2eb2b599fc5157']);
$response = $bot->getProfile('U583bfafb13ea45d23ab1bb4c545b2d0a');
*/

  $bot = new LINEBot(new DummyHttpClient($this, $mock), ['channelSecret' => 084e9260baa38004fc2eb2b599fc5157]);

$res = $bot->getProfile('U583bfafb13ea45d23ab1bb4c545b2d0a');
        $this->assertEquals(200, $res->getHTTPStatus());
        $this->assertTrue($res->isSucceeded());

        $data = $res->getJSONDecodedBody();
        $this->assertEquals('BOT API', $data['displayName']);
        $this->assertEquals('userId', $data['userId']);
        $this->assertEquals('https://example.com/abcdefghijklmn', $data['pictureUrl']);
        $this->assertEquals('Hello, LINE!', $data['statusMessage']);

echo "OK1";
/*if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo $profile['displayName'];
    echo $profile['pictureUrl'];
    echo $profile['statusMessage'];
}
*/

echo "OK";

