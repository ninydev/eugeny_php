<?php
require_once ("template/header.php");

// Проанализируем, что хочет пользователь, по номеру команды
$cmd = 0; // Назначим нулевую команду
if (isset($_GET["cmd"])) { // Если пользователь передал команду
    $cmd = $_GET["cmd"]; // Назначим команду
}
if (isset($_POST["cmd"])) { // Если пользователь передал команду
    $cmd = $_POST["cmd"]; // Назначим команду
}

switch ($cmd){ // Оператор ветвления - загрузит нужный файл на основе выбора пользователя
    case 0:
        require_once ("commands/dashboard.php");
        break;
    case 1:
        require_once ("commands/alpha-vantage.php");
        break;
    case 2:
        require_once ("commands/alpha-vantage-show.php");
        break;
    default:
        require_once ("errors/cmdErr.php");


}

require_once ("template/footer.php");

