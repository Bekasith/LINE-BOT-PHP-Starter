<?php

// URL-Xray 
/*	$ch = curl_init('https://urlxray.expeditedaddons.com/?api_key=' . getenv('URLXRAY_API_KEY') . '&fetch_content=true&url=http%3A%2F%2F180.183.251.233:4444/');
	$response = curl_exec($ch);
	curl_close($ch);
	var_dump($response);
	*/
// URL-Xray 
  // echo file_get_contents('http://180.183.251.233:4444/search.asp?id='.urlencode($encode));
// echo $test;

$access_token = '**************';

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
			$mid = $event['source']['userId'];
			
			//$a = file_get_contents('http://180.183.251.233:4444/search.asp?id='.$text);
			$a = file_get_contents('http://180.183.251.233:4444/search.asp?id='.urlencode($text).'&mid='.urlencode($mid));
		//	var_dump($text);
			list($gdtype , $code, $bal, $reserve, $info) = split("#", $a, 5);
	
//	$res = 'ม่านปรับแสง'.' รหัส'.$code.' คงเหลือ'.$bal.' จอง['.$reserve.'] เมื่อ '.$update   // every text return from myHost
		switch ($gdtype) {
			case "-1" :
			     $res = 'กรุณา ลงทะเบียน ทาง PG@kaceebest.com ด้วย ข้อความนี้ id=['.$mid.'],[ ชื่อ ],[ ลค/พนง ]' ; break;
			case "0" :
				$splittedstring=explode("~",$code);
				foreach ($splittedstring as $key => $value) {
				  echo "splittedstring[".$key."] = ".$value."<br>";
				  $res = $res.$value."\n";
				} 
					break;
					
			case "1" :
				$splittedstring=explode("~",$info);
				foreach ($splittedstring as $key => $value) {
				  echo "splittedstring[".$key."] = ".$value."<br>";
				  $detail = $detail.$value."\n";
				} 
				$res = $code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$detail; break;
					break;
			
			case "2" :
				$splittedstring=explode("~",$code);
				foreach ($splittedstring as $key => $value) {
				  echo "splittedstring[".$key."] = ".$value."<br>";
				  $res = $res.$value."\n";
				} 
					break;
			case "3" :
				$splittedstring=explode("~",$code);
				foreach ($splittedstring as $key => $value) {
				  echo "splittedstring[".$key."] = ".$value."<br>";
				  $res = $res.$value."\n";
				} 
					break;
			default:
			     $res = "การทำงาน พบ ปัญหาบางอย่าง ";
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
