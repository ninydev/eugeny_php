<?php
$cityName = "";
if(isset($_GET["cityName"])){
    $cityName =     $_GET["cityName"];
}



?>
<form method="get" action="<?=$_SERVER['PHP_SELF']?>">
    <input type="hidden" name="cmd" value="5"> <!-- передача номера комадны серверу -->
    <input type="text" name="cityName" value="<?=$cityName?>">
    <input type="submit">
</form>

<?php

if(isset($_GET["cityName"])){
    require_once("lib/mySql.php");

    $response = $mySql->query("SELECT * FROM `cities_weather` WHERE `name` LIKE('%" . $_GET["cityName"]  . "%')");

    //var_dump($response);

    echo "<ul>";
    foreach ($response as $row){
        //var_dump($row);
        echo "<li><a href='" . $_SERVER['PHP_SELF'] . "?cmd=6&city_id=" . $row["id"] . "'>" . $row["id"] . " => " . $row["name"] . "</a></li>";

    }
    echo "</ul>";



}


?>

