<?php


// 1 - подготовить строку запроса
//$sql = "INSERT INTO `students`(`name`) VALUES (' " . $user["name"]  .  "')";

// $sql = "SELECT * FROM boards";

$sql = "
SELECT 
	boards.board_name AS board_name,
    columns.id AS column_id,
	columns.column_name AS column_name,
    cards.column_id AS card_column_id,
    cards.id AS card_id,
	cards.card_name AS card_name
FROM boards 
	LEFT JOIN columns ON boards.id = columns.board_id
	LEFT JOIN cards ON columns.id = cards.column_id
WHERE boards.id = 1
ORDER BY columns.id
";

// 2 - соедениться с базой данных
$mySql = new mysqli("localhost", "root", "", "taganov_1");

// 3 - отправить запрос
$result = $mySql->query($sql);

// 4 - проанализировать ответ (если он есть)
$table = [];
while ($row = mysqli_fetch_assoc($result)){
    $table[] = $row;
}


// echo "<h1> Подготовленный массив для работы </h1><pre>";
// var_dump($table);
// echo "</pre><br>";

 // https://www.php.net/manual/ru/language.types.array.php
// https://www.php.net/manual/ru/ref.array.php


$BoardCols = [];


for($r = 0; $r < sizeof($table); $r++) {
    if(!isset($BoardCols [$table[$r]["column_id"]]["id"])) {
        $BoardCols
            [$table[$r]["column_id"]]
            ["id"]
                = $table[$r]["column_id"];
        $BoardCols [$table[$r]["column_id"]]
            ["column_name"]
                = $table[$r]["column_name"];
        $BoardCols [$table[$r]["column_id"]]
        ["cards"] =[];
    }

    $BoardCols
        [$table[$r]["column_id"]]
        ["cards"]
        [$table[$r]["card_id"]] =  $table[$r]["card_name"];
}

foreach ($BoardCols as $col) {
    echo "<div>";
    echo "<h3>" . $col["column_name"] . "</h3>";
    echo "<ul>";
    foreach ($col["cards"] as $card){
        echo "<li>" . $card . "</li>";
        // var_dump($card);
    }
    echo "</ul>";
    echo "</div>";
}

echo "<h1> Подготовленная коллекция для работы </h1><pre>";
var_dump($BoardCols);
echo "</pre><br>";


/*
for($r = 0; $r < sizeof($table); $r++) {
    $isNewColumn = true;
    for ($c = 0; $c < $col_count; $c++) {
        if ( $col[$c]['id'] == $table[$r]["column_id"]) {
            $isNewColumn = false;
            break;
        }
    }

    if ($isNewColumn) {
        $col[$col_count]['id'] = $table[$r]["column_id"];
        $col[$col_count]['column_name'] = $table[$r]["column_name"];
        $col_count++;
    }

}


for($r = 0; $r < sizeof($table); $r++) {
    $cards = [];

    for ($c = 0; $c < $col_count; $c++) {
        if ($col[$c]['id'])
    }


}

/*
for ($c = 0; $c < $col_count; $c++) {
      echo "<div>";
      echo "<h3>" . $col[$c]["column_name"] . "</h3>";
      echo "</div>";
}
*/
/*

foreach ($result as $row){
    // echo "<pre>";
    var_dump($row);
    // echo "</pre><br>";
}
*/


/*
 *
 Удобен, если у меня нет вложенности в ответе
foreach ($result as $row_columns){
    echo "<div class='col-3'>";
    echo "<h3>" . $row_columns["column_name"] . "</h3>";
    echo "<ul>";
        foreach ($result as $row_cards){
            if ($row_cards["card_column_id"] == $row_columns["column_id"])
                echo "<li>" . $row_cards["card_name"] . "</li>";
            else
                echo " - ";
        }
    echo "</ul>";
    echo "</div>";
}
*/

/*
 * Варианты подготовки данных для дальнейшей обработки

$result = $mySql->query($sql);
echo "<h3>assoc</h3>";
while ($row_columns  = mysqli_fetch_assoc($result)){
    var_dump($row_columns);
    echo "<br><hr>";
}

$result = $mySql->query($sql);
echo "<h3>object</h3>";
while ($row_columns  = mysqli_fetch_object($result)){
    var_dump($row_columns);
    echo "<br><hr>";
}

$result = $mySql->query($sql);
echo "<h3>array</h3>";
while ($row_columns  = mysqli_fetch_array($result)){
    var_dump($row_columns);
    echo "<br><hr>";
}

$result = $mySql->query($sql);
echo "<h3>all</h3>";
while ($row_columns  = mysqli_fetch_all($result)){
    echo "<pre>";
    var_dump($row_columns);
    echo "</pre><br><hr>";
}

*/