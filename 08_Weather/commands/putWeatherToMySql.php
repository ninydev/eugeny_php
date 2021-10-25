<?php

if(!isset($_GET["name"])){
    die(" Error Vars");
}


require_once ("../lib/mySql.php");
$name=$_GET["name"];
$temp=$_GET["temp"];
$city_id=$_GET["city_id"];

$sql = "INSERT INTO `weather` ( `name`, `temp`, `city_id`) VALUES ( '$name', '$temp', '$city_id')";

$mySql->query($sql);







