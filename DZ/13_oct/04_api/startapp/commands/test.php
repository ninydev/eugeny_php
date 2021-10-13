<?php
$host = 'localhost';  // Хост, у нас все локально
$user = 'root';    // Имя созданного вами пользователя
$pass = ''; // Установленный вами пароль пользователю
$db_name = 'taganov_np';   // Имя базы данных
$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
if ($link){
    //echo "Hello";
}
// Ругаемся, если соединение установить не удалось
if (!$link) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
}

for ($i = 0; $i < 26; $i++) {
    $sql = mysqli_query($link, "SELECT `Ref` FROM `taganov_np`.`areas` WHERE `id`=$i ");
    while ($result = mysqli_fetch_array($sql)) {
        echo "{$result['Ref']}";
        /*Ref: methodProperties: {
            "{$result['Ref']}";
        }*/
    }
}
?>