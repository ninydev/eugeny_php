<?php
// https://www.php.net/manual/ru/curl.examples-basic.php

$url = "http://localhost:63342/eugeny_php/04_api/startapp/test.php";
echo "URL: " . $url . "<hr>";
$postVar = ["var1" => 1];
$options = [];
$defaults = array(
    CURLOPT_POST => 1,
    CURLOPT_HEADER => 0,
    CURLOPT_URL => $url,
    CURLOPT_FRESH_CONNECT => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_FORBID_REUSE => 1,
    CURLOPT_TIMEOUT => 40,
    CURLOPT_POSTFIELDS => http_build_query($postVar)
);

$ch = curl_init();
curl_setopt_array($ch, ($options + $defaults));
if( ! $result = curl_exec($ch))
{
    trigger_error(curl_error($ch));
}

$curl_errno = curl_errno($ch);
$curl_error = curl_error($ch);

if ($curl_errno > 0) {
    echo "cURL Error ($curl_errno): $curl_error\n";
}

curl_close($ch);

echo $result;
echo "<pre>";
var_dump($result);
echo "</pre>";
/*
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"/eugeny_php/04_api/startapp/"); // пошлем к себе
//curl_setopt($ch, CURLOPT_URL,"https://api.novaposhta.ua/v2.0/json/");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
    "postvar1=value1&postvar2=value2&postvar3=value3");

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS,
//    http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

echo "<pre>";
var_dump($server_output);
echo "</pre>";

curl_close ($ch);

*/