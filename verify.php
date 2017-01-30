<?php 
   $access_token = 'Ns2HTJkXtLxaV0E52ZI409E6oG/NVwN7ZKXTaHZSs/KS4LenNVh6VpCiz+AwRpTHqlUH9fw+iJRxWULG7LHdeIEmoNT67iR3AswlFGJJO6W7et3YixhBF5gCQDgtG/Idq08FdSHYS9OMOBQwdqOQxQdB04t89/1O/w1cDnyilFU=';
   
   $url = 'https://api.line.me/v1/oauth/verify';
   
   $headers = array(Authorization: Bearer ' . $access_token);
   
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
   curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
   $result = curl_exec($ch); 
   curl_close($ch); 
   
   echo $result;
   
   
