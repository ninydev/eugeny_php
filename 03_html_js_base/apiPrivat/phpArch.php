<?php

$json_from_privat = file_get_contents("https://api.privatbank.ua/p24api/exchange_rates?json&date=01.12.2014");

var_dump($json_from_privat);
echo "<hr>";
