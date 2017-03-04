<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-02.php

include ('line-bot-api/php/line-bot.php');

$channelSecret = '084e9260baa38004fc2eb2b599fc5157';
$access_token  = 'Ns2HTJkXtLxaV0E52ZI409E6oG/NVwN7ZKXTaHZSs/KS4LenNVh6VpCiz+AwRpTHqlUH9fw+iJRxWULG7LHdeIEmoNT67iR3AswlFGJJO6W7et3YixhBF5gCQDgtG/Idq08FdSHYS9OMOBQwdqOQxQdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
$bot->sendMessageNew('Uf1a74f917aa3ed3ed98e417fcc209fee', 'Test Say Hi !! ');

if ($bot->isSuccess()) {
	echo 'Succeeded!';
	exit();
}

// Failed
echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
exit();
