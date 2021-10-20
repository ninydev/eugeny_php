<?php
require_once (__DIR__ . "/../lib/mySql.php");

$sql = "SELECT * FROM `spotify`";
$sqlResult = $mySql->query($sql);

foreach ($sqlResult as $r){

    echo '
            <div class="card" style="width: 18rem;">
                  <img src="' . $r["img"] . '" class="card-img-top" alt=" ">
                  <div class="card-body">
                    <h5 class="card-title">' . $r["name"] .  '</h5>
                    <p class="card-text"></p>
                    <a href="' . $_SERVER['PHP_SELF'] . '/?cmd=5&album_id=' . $r["album_id"] .'" class="btn btn-primary" target="_blank">Get Tracks</a>
                  </div>
                </div>
            ';
}