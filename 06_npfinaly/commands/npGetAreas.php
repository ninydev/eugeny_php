<?php
require_once ("lib/GetResponse.php");
require_once ("lib/mySql.php");

echo " <p> Получаю области с сервера </p>";

$areas = GetResponse("Address", "getAreas", [ "" => "" ]);

echo "<p> Я получил ответ от новой почты - и вношу их в базу </p>";

// var_dump($areas);


// очистить таблицу
$sql = "TRUNCATE `areas`";
$result = $mySql->query($sql);
if(!$result) die("Ошибка очистки таблицы областей");
$sql = "TRUNCATE `cities`";
$result = $mySql->query($sql);
if(!$result) die("Ошибка очистки таблицы городов");
// Построение запроса в базу данных
$sql = "INSERT INTO `areas` (`Ref`, `AreasCenter`, `DescriptionRu`, `Description`) VALUES \n";
$len = sizeof($areas);
foreach ($areas as $row) {
    $sql.= "('$row->Ref','$row->AreasCenter','$row->DescriptionRu','$row->Description')";
    if (($len--) > 1 ) $sql.=",\n";
}

// Подготовленный запрос
// echo "<pre> $sql </pre>";

// отсылаем в базу данных
$result = $mySql->query($sql);

// Анализируем ответ
if($result) {
    // Вывод на экран
    echo "<ul style='display: block; width: 100%; height: 150px; overflow: scroll;'>";
    foreach ($areas as $row) {
        echo "<li>" . $row->DescriptionRu . "</li>";
        //echo "<li><a href='npGetCities.php?AreaRef=". $row->Ref ."' >" . $row->DescriptionRu . "</a></li>";
    }
    echo "</ul>";
} else {
    echo "Что то пошло не так";
}

?>
<script>
    let areasRef = [
        <?php
        foreach ($areas as $row) {
            echo "{ref:'" . $row->Ref . "'},\n";
        }
        ?>
    ]

    function getDepartament(id) {
        //if (num == areasRef.length) return;
        console.log("Get for " + id);
        fetch("http://localhost:63342/eugeny_php/06_npfinaly/commands/npGetDepartament.php?id="+id)
            .then(response=> response.text())
            .then(text=> {
                // console.log(text);
                if (text === "finish") return;
                getDepartament(id+1);
            })
            .catch(err=> {console.log(err)});

    }

    function getCities(num) {
        if (num == areasRef.length) getDepartament(1);
        console.log("Get for " + num + " " + areasRef[num].ref);
        fetch("http://localhost:63342/eugeny_php/06_npfinaly/commands/npGetCities.php?AreaRef="+areasRef[num].ref)
        .then(response=> response.text())
        .then(text=> {
                // console.log(text);
                getCities(num+1);
        })
        .catch(err=> {console.log(err)});
    }

    getCities(0);
</script>

<?php
