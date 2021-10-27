<?php
$season = ""; // поиск по умолчанию
if (isset($_POST["season"])) $season = $_POST["season"];
if (isset($_GET["season"])) $season = $_GET["season"];

// var_dump( $season);
?>


<form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
    <input type="hidden" name="cmd" value="6">
    <input type="text" name="season" value="<?=$season?>">
    <input type="submit" name="doSearch">
</form>

<?php

if( isset($_POST["doSearch"]) || isset($_GET["doSearch"]) ) {
    echo "<h1> Start search </h1>";

//ВСТАВИТЬ CURL
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api-football-beta.p.rapidapi.com/teams?season=" . $season . "&league=39",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: api-football-beta.p.rapidapi.com",
            "x-rapidapi-key: eaaa8b97b2msh49619543a5c8ae4p118786jsnabcd43621012"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);



    if ($err) {
        echo '<div class="alert alert-danger" role="alert">' . $err . '</div>';
    } else {
        echo '<h3> Запрос прошел начинаю разбор что с ним делать</h3>';

        $response = json_decode($response);
        // var_dump($response);
        // print("<pre>".print_r($response,true)."</pre>");

    }
}

if(!isset($response->response)) {
    echo '<div class="alert alert-danger" role="alert"> Ответ пришел пустой </div>';
} else {
    echo '<ul class="row">';
    foreach ($response->response as $r) {

    echo '<li class="col-6">';
    echo '
            <div class="card" style="width: 18rem;">
                  <img src="' . $r->team->logo . '" class="card-img-top" alt=" ">
                  <div class="card-body">
                    <h5 class="card-title">' . $r->team->name .  '</h5>
                    <p class="card-text"></p>
                    <img src="' . $r->venue->image . '" />
                  </div>
                </div>
            ';

    echo '</li>';

    echo "<hr>";
    }
echo '</ul>';
}
