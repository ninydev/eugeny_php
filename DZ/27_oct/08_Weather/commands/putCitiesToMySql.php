<?php
/*
 *     {
        "id": 833,
        "name": "Ḩeşār-e Sefīd",
        "state": "",
        "country": "IR",
        "coord": {
            "lon": 47.159401,
            "lat": 34.330502
        }
    },
 */

var_dump($_FILES["citiesJson"]["tmp_name"]);
echo " Work: <hr>";

$jsonStr = file_get_contents($_FILES["citiesJson"]["tmp_name"]);

$cities = json_decode($jsonStr);

require_once ("lib/mySql.php");


echo "<p> Start: ";
foreach ($cities as $city){
    $sqlStr = "INSERT INTO `cities_weather` (`id`, `name`, `country`, `lon`, `lat`, `state`) VALUES (";

    $sqlStr.="'" . $city->id . "', ";
    $sqlStr.="'" . $city->name . "', ";
    $sqlStr.="'" . $city->country . "', ";
    $sqlStr.="'" . $city->coord->lon . "', ";
    $sqlStr.="'" . $city->coord->lat . "', ";
    $sqlStr.="'" . $city->state . "'";

    $sqlStr.=")";

        // var_dump($city);
    // echo"<br>" . $sqlStr . "<br>";

    $mySql->query($sqlStr);
    echo ".";
}
echo "</p><p> End </p>";
//echo $jsonStr;
