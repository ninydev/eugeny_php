<?php

if (!isset($_GET["id"])) {die ("Мне не сказали, с какой областью работать");}
$id = $_GET["id"];

require_once ("../lib/GetResponse.php");
require_once ("../lib/mySql.php");

// require_once ("../lib/GetResponse.php");
// require_once ("../lib/mySql.php");


//1 получить из базы городов по id Ref города
// SELECT FROM cities WHERE id = id
// если нет записей - то напечатать финиш и выйти
$sql = "SELECT `Ref` FROM `cities` WHERE `id`=$id";



//2 получить с новой почты по этому  Ref все отделения



// 3 внести в базу полученные отделения
