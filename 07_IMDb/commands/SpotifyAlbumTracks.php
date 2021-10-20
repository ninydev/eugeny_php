<?php
if (!isset($_GET["album_id"])) die(" Get Error");


$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://unsa-unofficial-spotify-api.p.rapidapi.com/album?id=" . $_GET["album_id"],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: unsa-unofficial-spotify-api.p.rapidapi.com",
        "x-rapidapi-key: 7e2afce0b1msh7f5c23d92a82e63p15d2e7jsn1fb4d1a13ff8"
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
    $tracks = $response->Data->data->album->tracks->items;
    //var_dump($response);

//* ---------------------------------------------------------------------------------------------------------
// Вывод в html страницу
//
    echo '<ul class="row">';
    foreach ($tracks as $t){
        $tId = explode(":", $t->track->uri);
        echo '<li class="col-6">';
        echo '
            <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">' . $t->track->name .  '</h5>
                    <p class="card-text"></p>
                    <a href="https://open.spotify.com/track/' . $tId[2] . '" class="btn btn-primary" target="_blank">Go spotify</a>
                  </div>
                </div>
            ';

        echo '</li>';
    }
    echo '</ul>';



} // IF окончание работы с правильным ответом