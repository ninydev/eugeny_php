<?php
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?q=London&units=metric&appid=d55d7e3b16ffa113b7d67bc7244c5148",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    die ("cURL Error #:" . $err);
}

//var_dump($response);
$weather = json_decode($response);
echo "<h3>" . $weather->name . "</h3>";
echo "<p> city_id: " . $weather->id . "<br>";
echo "temp: " . $weather->main->temp . "</p>";

require_once ("lib/mySql.php");

$sql = "INSERT INTO `weather` ( `name`, `temp`, `city_id`) VALUES ( '$weather->name', '" . $weather->main->temp . "', '$weather->id')";

$mySql->query($sql);
