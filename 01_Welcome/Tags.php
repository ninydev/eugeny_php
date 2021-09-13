<?php

$varStr = "Hello";
$varBool = true;
$varInt = 10;
$varDouble = 20.2;

$a = 2;
$b = 2;
$c = $a + $b; // Арифметика
$d = $a . $b; // Сложение (Сцепление) как строки

echo "a + b = " . $c . "<br>";
echo "a . b = " . $d . "<br>";

if (is_string($d)){
    echo " Yes d - is String <br>";
}
if( is_numeric($d)){
    echo " Yes d - is Numeric <br>";
}
if (is_integer($d)) {
    echo " + ";
} else echo  " - ";
if (is_double($d)) {
    echo " + ";
} else echo  " - ";

$d = $d + 10;

if (is_integer($d)) {
    echo " + ";
} else echo  " - ";
if (is_double($d)) {
    echo " + ";
} else echo  " - ";

$d = $d . " uah";


/*
 * Набор функций is_тип отвечает, какой тип информации
 * содержится в данной переменной
 */
if(is_double($varDouble)){
    echo $varDouble . " => Double <br>";
}
if ( is_numeric($c) ) {
    echo " Yes ";
    // true
} else {
    // false
    echo " No ";
}


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
// Можно вставлять прямо в HTML
// Но расширение (тип файла с точки зрения сервера) - .php
?>

</body>
</html>

<?php
// Если файл содержит только PHP код, или код расположен в конце
// Закрывающий тег не нужен, и даже негативен




