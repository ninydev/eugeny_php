<?php
$query = ""; // поиск по умолчанию
if (isset($_POST["query"])) $query = $_POST["query"];
if (isset($_GET["query"])) $query = $_GET["query"];

var_dump($query);
?>


<form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
    <input type="hidden" name="cmd" value="3">
    <input type="text" name="query" value="<?=$query?>">
    <input type="submit" name="doSearch">
</form>

<?php

if( isset($_POST["doSearch"]) || isset($_GET["doSearch"]) ) {
    echo "<h3> Start search</h3>";


    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://unsa-unofficial-spotify-api.p.rapidapi.com/search?query=" . $query .  "&count=20&type=albums",
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
        //var_dump($response);

//* ---------------------------------------------------------------------------------------------------------
// Вывод в html страницу
//
        echo '<ul class="row">';
        foreach ($response->Results as $r){
            echo '<li class="col-6">';
            echo '
            <div class="card" style="width: 18rem;">
                  <img src="' . $r->images[0]->url . '" class="card-img-top" alt=" ">
                  <div class="card-body">
                    <h5 class="card-title">' . $r->name .  '</h5>
                    <p class="card-text"></p>
                    <a href="' . $r->external_urls->spotify . '" class="btn btn-primary" target="_blank">Go spotify</a>
                  </div>
                </div>
            ';

            echo '</li>';
        }
        echo '</ul>';



//* ---------------------------------------------------------------------------------------------------------
// Запись в базу данных
//
        // echo __DIR__; // Магическая переменная, которая сообщает в какой папке я работаю
        // __FILE__  и  __LINE__
        require_once (__DIR__ . "/../lib/mySql.php");
        $len = sizeof($response->Results);
        $sql = "INSERT INTO `spotify` (`album_id`, `name`, `img`, `link`) VALUES \n";
        //(NULL, 'q', 'w', 'e')
        foreach ($response->Results as $r) {
            $sql.= "('".$r->id."', '".$r->name."', '".$r->images[0]->url ."', '".$r->external_urls->spotify."' )";

            if (($len--) > 1 ) $sql.=",\n";
        }

        $sqlResult = $mySql->query($sql);
        if(!$sqlResult) die("Ошибка внесения в базу данных");

//* ---------------------------------------------------------------------------------------------------------

    } // IF окончание работы с правильным ответом

}

