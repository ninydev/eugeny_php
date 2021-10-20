<?php
$dob = date("Y-m-d"); // поиск по умолчанию
if (isset($_POST["dob"])) $dob = $_POST["dob"];
if (isset($_GET["dob"])) $dob = $_GET["dob"];

var_dump( $dob);
?>


<form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
    <input type="hidden" name="cmd" value="2">
    <input type="date" name="dob" value="<?=$dob?>">
    <input type="submit">
</form>


<?php

$curl = curl_init();
//https://imdb8.p.rapidapi.com/actors/list-born-today?month=7&day=27"
$d = explode("-", $dob);
$q = "month=" . $d[1] . "&day=" . $d[2];

curl_setopt_array($curl, [
    CURLOPT_URL => "https://imdb8.p.rapidapi.com/actors/list-born-today?" . $q,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: imdb8.p.rapidapi.com",
        "x-rapidapi-key: 7e2afce0b1msh7f5c23d92a82e63p15d2e7jsn1fb4d1a13ff8"
    ],
]);

$response = json_decode(curl_exec($curl));
$err = curl_error($curl);



if ($err) {
    die ("cURL Error #:" . $err);
}

// var_dump($response);
foreach ($response as $r){
    //https://imdb8.p.rapidapi.com/actors/get-bio?nconst=nm0001667
    $nameId = explode("/", $r);
    $nameId = $nameId[2];

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://imdb8.p.rapidapi.com/actors/get-bio?nconst=" . $nameId,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: imdb8.p.rapidapi.com",
            "x-rapidapi-key: 7e2afce0b1msh7f5c23d92a82e63p15d2e7jsn1fb4d1a13ff8"
        ],
    ]);

    $response = json_decode(curl_exec($curl));
    $err = curl_error($curl);

    if ($err) {
        die ("cURL Error #:" . $err);
    }
    echo "<h4>" . $response->name . "</h4>";

    //var_dump($response);

}




curl_close($curl);