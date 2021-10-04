<?php
// JSON - строка
$user["name"] = "Alex";

// SQL - строка

// 1 - подготовить строку запроса
$sql = "INSERT INTO `students`(`name`) VALUES (' " . $user["name"]  .  "')";

// 2 - соедениться с базой данных
$mySql = new mysqli("localhost", "root", "", "taganov_1");

// 3 - отправить запрос
$result = $mySql->query($sql);

// 4 - проанализировать ответ (если он есть)
