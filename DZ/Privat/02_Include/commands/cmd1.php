<form action="<?=$_SERVER["PHP_SELF"]?>?cmd=1" method="post">

    <p>
        <label for="date"> </label>
        <input type="date" id="date" name="date"/>
    </p>
    <p>
        <button type="submit">Отправить</button>
    </p>
</form>
<?php

if (array_key_exists('date', $_POST)) {
    var_dump ($_POST["date"]);
    if (isset($_POST["date"])) {
        $date = [];
        $d = date_create_from_format('Y-m-d', $_POST["date"]);
        $date = $d->format("d.m.Y"); //приводим дату к нужному формату
        //   echo $date;
        require_once("cmd3.php");
    } else {
        echo "<p> Введите дату </p>";

    }
} else echo "<p> Введите дату </p>";

