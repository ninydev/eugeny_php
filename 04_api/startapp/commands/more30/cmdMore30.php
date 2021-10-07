<?php
require_once ("../npFun.php");

//$modelName, $calledMethod, $methodProperties

if(!isset($_GET["modelName"])) {
    die ("modelName");
}
$modelName = $_GET["modelName"];
$calledMethod = $_GET["calledMethod"];

// echo "<pre>";
// var_dump($_GET);
// echo "</pre><hr>";

if(isset($_GET["AreaRef"])) {
    $methodProperties = [ "AreaRef" => $_GET["AreaRef"] ];
} else if (isset($_GET["CityRef"])) {
    $methodProperties = [ "CityRef" => $_GET["CityRef"] ];
} else {
    $methodProperties = [ "" => "" ];
}



$data = GetResponse($modelName, $calledMethod, $methodProperties);

//var_dump( $data);
$str = json_encode($data, 0, 99999999999);
echo json_encode($data, 0, 99999999999);;



