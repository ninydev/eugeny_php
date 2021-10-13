<?php

// Get JSON as a string
$json_str = file_get_contents('php://input');
// Get as an object
$json_obj = json_decode($json_str);

// var_dump($json_obj);


// 1 - подготовить строку запроса
$sql = "INSERT INTO `areas` (`Ref`, `AreasCenter`, `DescriptionRu`, `Description`) VALUES \n";

for($i = 0; $i < sizeof($json_obj); $i++) {
    $sql.= "('".$json_obj[$i]->Ref."', '".$json_obj[$i]->AreasCenter."', '".$json_obj[$i]->DescriptionRu."', '".$json_obj[$i]->Description."')";
    if ($i != sizeof($json_obj) - 1)
        $sql.= ", ";
    $sql.="\n";
}
// echo $sql;

// 2 - соедениться с базой данных
$mySql = new mysqli("localhost", "root", "", "taganov_np");

// 3 - отправить запрос
$result = $mySql->query($sql);

require_once ("npGetCitiesJs.php");

