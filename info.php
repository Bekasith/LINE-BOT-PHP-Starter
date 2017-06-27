<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-02.php

include ('php/line-bot.php');

$bot = new BOT_API($channelSecret, $access_token);

//$msg = $msg.""."\n";
$msg = "Poko ไง จะใครหล่ะ"."\n";
$msg = $msg."เราจะมาบอกว่า ลองถามเราแบบนี้ หรือยัง"."\n";
$msg = $msg." 'Roma-' ลองดูสิ  !! "."\n";


$bot->sendMessageNew('Uf1a74f917aa3ed3ed98e417fcc209fee', $msg);

if ($bot->isSuccess()) {
	echo 'Succeeded!';
	exit();
}

// Failed
echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
exit();
