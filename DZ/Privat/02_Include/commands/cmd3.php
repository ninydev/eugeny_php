<?php

//Начинаем работать с приватом
//склеиваем ссылку
$path = "https://api.privatbank.ua/p24api/exchange_rates?json&date=" . $date;
echo "<hr>";
echo $path;




$json_from_privat = file_get_contents("$path");

/*
array(5) {  ["date"]=> string(10) "01.12.2014" ["bank"]=> string(2) "PB" ["baseCurrency"]=> int(980)
            ["baseCurrencyLit"]=> string(3) "UAH" ["exchangeRate"]=> array(20) { [0]
array(4) { ["baseCurrency"]=> string(3) "UAH" ["currency"]=> string(3) "AUD" ["saleRateNB"]=> float(12.831925)
            ["purchaseRateNB"]=> float(12.831925) } [1]
*/

//var_dump($json_from_privat);
//---------------------------------------------------------------------------------------------------


echo "<hr>";

$data = json_decode($json_from_privat, true);
//echo " Data (true) <hr>";

//var_dump ($data);

//echo "Data () <hr>";

$keys = array_keys($data);
foreach ($keys as $key){
    if ($key == 'exchangeRate') continue;
    echo "$key: {$data[$key]}<br><br>";
}


echo "<table>";
//for($i = 0; $i < sizeof($data); $i++){
$keys = array_keys($data['exchangeRate']);
foreach ($data['exchangeRate'] as $row) {

    echo '<tr>';
    foreach ($row as $cell){
        echo "<td>" . $cell . "</td>";
    }
    //echo "<td>" . $data['exchangeRate'][$key] . "</td>";
    echo "</tr>";
}
