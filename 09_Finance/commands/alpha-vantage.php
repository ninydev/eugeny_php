<?php
$symbol = "MSFT";
if(isset($_GET["symbol"])){
    $symbol =     $_GET["symbol"];
}

$interval = "5min";
if(isset($_GET["interval"])){
    $interval =     $_GET["interval"];
}
?>

<form method="get" action="<?=$_SERVER['PHP_SELF']?>">
    <input type="hidden" name="cmd" value="1"> <!-- передача номера комадны серверу -->
    <input type="text" name="symbol" value="<?=$symbol?>"><br>
    <select name="interval">
        <option value="1min" <?=($interval == "1min") ? "selected" : ""?> > 1 min </option>
        <option value="5min" <?=($interval == "5min") ? "selected" : ""?>> 5 min </option>
        <option value="15min" <?=($interval == "15min") ? "selected" : ""?>> 15 min </option>
        <option value="30min" <?=($interval == "30min") ? "selected" : ""?>> 30 min </option>
        <option value="60min" <?=($interval == "60min") ? "selected" : ""?>> 60 min </option>
    </select>
    <input type="submit" value="Submit" name="Submit">
</form>

<?php

if(isset($_GET["Submit"])){
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://alpha-vantage.p.rapidapi.com/query?interval=" . $interval
            . "&function=TIME_SERIES_INTRADAY&symbol=" . $symbol . "&datatype=json&output_size=compact",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: alpha-vantage.p.rapidapi.com",
            "x-rapidapi-key: 7e2afce0b1msh7f5c23d92a82e63p15d2e7jsn1fb4d1a13ff8"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        die ("cURL Error #:" . $err);
    }

    $response = json_decode($response, true);
    // Второй параметр - true - вернет Array, false - объекты
    //print("<pre>".print_r($response,true)."</pre>");
    // var_dump($response);
    $dataRowName = "Time Series (" . $response["Meta Data"]["4. Interval"] . ")";
    // var_dump($dataRowName);

    echo "<table>";

    $len = sizeof($response[$dataRowName]);
    $sql = "INSERT INTO `vantage` (`dt_inspect`, `symbol`, `money`) VALUES \n";
    foreach ($response[$dataRowName] as $key => $value){
        /*
        echo "<tr>";
        echo "<td>" . $key . "<td>";
        echo "<td>" . $symbol . "<td>";
        echo "<td>" . $value["1. open"] . "<td>";
        echo "</tr>";
        */
        $sql.= "('".$key."','".$symbol."','".$value["1. open"]."')";
        if(($len--) > 1) $sql.=",\n";
    }

    $sql .="\n";

    echo "</table>";

    echo "<pre> $sql </pre>";

    require_once (__DIR__ . "/../lib/mySql.php");

    $mySql->query($sql);

}
/*
INSERT INTO `vantage` (`id`, `dt_inspect`, `simbol`, `money`) VALUES (NULL, '2021-10-01 12:54:59', '', '')
*/