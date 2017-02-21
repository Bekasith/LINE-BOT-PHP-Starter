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
			$mid = $event['source']['userId'];
			
			//$a = file_get_contents('http://180.183.251.233:4444/search.asp?id='.$text);
			$a = file_get_contents('http://180.183.251.233:4444/search.asp?id='.urlencode($text).'&mid='.urlencode($mid));
		//	var_dump($text);
			list($gdtype , $code, $bal, $reserve, $info) = split("#", $a, 5);
	
//	$res = 'ม่านปรับแสง'.' รหัส'.$code.' คงเหลือ'.$bal.' จอง['.$reserve.'] เมื่อ '.$update   // every text return from myHost
		switch ($gdtype) {
			case "-1" :
			     $res = 'กรุณา ลงทะเบียน ทาง PG@kaceebest.com ด้วย ข้อความนี้ " ( ID=[ '.$mid.' ],[ แจ้ง ชื่อ สาขา หรือ เขตการขาย ] ) " ' ; break;
			case "0" :
				 
				$splittedstring=explode("@",$code);
				foreach ($splittedstring as $key => $value) {
				  echo "splittedstring[".$key."] = ".$value."<br>";
				  $res = $res.$value."\n";
				} 
					break;
				//$res =  $code; break;
					
			case "5":  
			     $res = 'ม่านม้วน'.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "6":
			     $res = 'ม่านปรับแสง'.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "15":  
			     $res = 'เมจิกสกรีน'.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "16":  
			     $res = 'แชงกรีล่า'.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "17":  
			     $res = 'ไม้ไผ่'.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "40" :
			     $res = 'วอลล์ '.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "50" :
			     $res = 'สายรวบ '.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "51" :
			     $res = 'ชายครุย '.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "52" :
			     $res = '?? '.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "53" :
			     $res = '?? '.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "54" :
			     $res = 'ตะขอ '.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "55" :
			     $res = '?? '.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "58" :
			     $res = '?? '.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "59" :
			     $res = '?? '.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "72" :
			     $res = 'ผ้าโปร่ง'.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "73" :
			     $res = 'ผ้า Italy '.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "74" :
			     $res = 'ผ้า Blckout '.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "75" :
			     $res = 'ผ้าไหม'.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "76" : 
			     $res = 'ผ้าโซฟา'.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "77" : 
			     $res = 'ผ้า รพ.'.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case "78": 
			     $res = 'ผ้าม่าน'.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
			case"79":
			     $res = 'ผ้าม่าน'.' รหัส '.$code.' คงเหลือ ['.$bal.'] จอง['.$reserve.']  '.$info; break;
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
