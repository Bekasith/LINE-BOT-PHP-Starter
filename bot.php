<?php

// URL-Xray 
/*	$ch = curl_init('https://urlxray.expeditedaddons.com/?api_key=' . getenv('URLXRAY_API_KEY') . '&fetch_content=true&url=http%3A%2F%2F180.183.251.233:4444/');
	$response = curl_exec($ch);
	curl_close($ch);
	var_dump($response);
	*/
// URL-Xray 
   echo file_get_contents('http://180.183.251.233:4444/search.asp?id=F7403');
// echo $test;

$access_token = 'Ns2HTJkXtLxaV0E52ZI409E6oG/NVwN7ZKXTaHZSs/KS4LenNVh6VpCiz+AwRpTHqlUH9fw+iJRxWULG7LHdeIEmoNT67iR3AswlFGJJO6W7et3YixhBF5gCQDgtG/Idq08FdSHYS9OMOBQwdqOQxQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			$a = file_get_contents('http://180.183.251.233:4444/search.asp?id="'.$text.'"');
			list($gdtype , $code, $bal, $reserve, $update) = split("#", $a, 5);
/*
	Fabric	72	72 ผ้าโปร่ง	72		
	Fabric	73	73 ผ้า Italy	73		
	Fabric	74	74 ผ้า Blackout	74		
	Fabric	75	75 ผ้าไหม	75		
	Fabric	76	76 ผ้าโซฟา	76		
	Fabric	77	77 ผ้า รพ.	77		
	Fabric	78	78 ผ้าม่าน	78		
	Fabric	79	79 ผ้าอื่น ๆ 	79		
*/		
//	$res = 'ม่านปรับแสง'.' รหัส'.$code.' คงเหลือ'.$bal.' จอง['.$reserve.'] เมื่อ '.$update   // every text return from myHost
			switch ($gdtype) {
			    case "6":
			     $res = 'ม่านปรับแสง'.' รหัส'.$code.' คงเหลือ'.$bal.' จอง['.$reserve.'] เมื่อ '.$update; break;
			    case "72","73","74","75","76","77","78","79":
				 $res = 'ผ้าม่าน'.' รหัส'.$code.' คงเหลือ'.$bal.' จอง['.$reserve.'] เมื่อ '.$update; break;
			    case "5":  
				$res = 'ม่านม้วน'.' รหัส'.$code.' คงเหลือ'.$bal.' จอง['.$reserve.'] เมื่อ '.$update; break;
			    default:
				$res = "สินค้านี้ ยังไม่พร้อมให้ ข้อมูล";
			}			
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' =>  $res
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json; charset=UTF-8', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
