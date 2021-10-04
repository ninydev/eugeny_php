<?php
require_once ("startIoForm.php");

// Если есть что то в запросе
if (isset($_POST["partner"])) {
    $url = "https://api.startapp.com/pub/report/1.0?";
    $url.= "partner=" . $_POST["partner"] . "&";
    $url.= "token=" . $_POST["token"] . "&";

        // https://www.php.net/manual/ru/function.explode.php
    $date = explode(" - ", $_POST["daterange"]);

    $startDate = explode("/", $date[0]);
    $endDate = explode("/", $date[1]);

    // echo "<pre>";
    // var_dump($date);
    // echo "</pre>";

    $url.= "startDate=". $startDate[2]. $startDate[0] . $startDate[1] . "&";
    $url.= "endDate=". $endDate[2]. $endDate[0] . $endDate[1] . "&";

        // https://www.php.net/manual/ru/function.implode.php
    if(isset($_POST["dimension"])) {
        $url .= "dimension=" . implode(",", $_POST["dimension"]);
    }
    // echo "<pre>";
    // echo $url;
    // echo "\n";
    // echo "https://api.startapp.com/pub/report/1.0?partner=174388014&token=5c9e4f73481dc072bfb662ca2133cffc&startDate=20210910&endDate=20210910&dimension=prod,segId,adType,country";
    // echo "</pre>";

    $response = file_get_contents($url);

    // echo $response;
    $data = json_decode($response, true)["data"];

    //var_dump($data);

    /*
    echo "<table>";
    foreach ($data as $row){
        echo "<tr><td>" . $row["country"] . "</td></tr>";
    }
    echo "</table>";
    */


    $mySql = new mysqli("localhost", "root", "", "taganov");

    /*
    $result = $mySql->query("SELECT * FROM `myfirsttable`");

    foreach ($result as $row) {
        echo " id = " . $row['id'] . "\n";
        echo " title = " . $row['title'] . "\n";
    }
*/



}