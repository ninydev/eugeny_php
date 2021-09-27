<?php

$json_from_privat = file_get_contents("https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5");

var_dump($json_from_privat);
echo "<hr>";

$data = json_decode($json_from_privat, true);
echo " Data (true) <hr>";
var_dump($data);
echo "Data () <hr>";


echo "<table>";
for($i = 0; $i < sizeof($data); $i++){
    echo "<tr>";

    echo "<td>" . $data[$i]["ccy"] . " </td>";
    echo "<td>" . $data[$i]["base_ccy"] . " </td>";
    echo "<td>" . $data[$i]["buy"] . " </td>";
    echo "<td>" . $data[$i]["sale"] . " </td>";

    echo "</tr>";
}
echo "</table>";


$data1 = json_decode($json_from_privat);
var_dump($data1);

echo "<table>";
for($i = 0; $i < sizeof($data); $i++){
    $obj = (object) $data[$i];
    echo "<tr>";

    echo "<td>" . $obj->ccy . " </td>";
    echo "<td>" . $obj->base_ccy . " </td>";
    echo "<td>" . $obj->buy . " </td>";
    echo "<td>" . $obj->sale . " </td>";

    echo "</tr>";
}
echo "</table>";
