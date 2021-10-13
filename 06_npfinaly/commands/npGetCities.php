<?php

if (!isset($_GET["AreaRef"])) {die ("Мне не сказали, с какой областью работать");}
$AreaRef = $_GET["AreaRef"];

require_once ("../lib/GetResponse.php");
require_once ("../lib/mySql.php");

// require_once ("../lib/GetResponse.php");
// require_once ("../lib/mySql.php");


$cities = GetResponse("Address", "getCities", [ "AreaRef" => $AreaRef]);

/*
echo "<ul style='display: block; width: 100%; height: 150px; overflow: scroll;'>";
foreach ($cities as $row) {
    echo "<li>" . $row->DescriptionRu . "</li>";
}
echo "</ul>";
*/

// очистить таблицу - не имеем права
// $sql = "TRUNCATE `cities`";
// $result = $mySql->query($sql);
// if(!$result) die("Ошибка очистки таблицы");

// Построение запроса в базу данных
$sql = "INSERT INTO `cities` (`Ref`, `AreaRef`, `DescriptionRu`) VALUES \n";
$len = sizeof($cities);
foreach ($cities as $row) {
    $sql.= "('$row->Ref','$AreaRef','$row->DescriptionRu')";
    // $sql.= "('$row->Ref','$AreaRef','$row->DescriptionRu','" . htmlspecialchars($row->Description) . "')";
    if (($len--) > 1 ) $sql.=",\n";
}

echo "<pre> $sql </pre>";

$result = $mySql->query($sql);
if(!$result) die("Ошибка внесения в базу данных");
