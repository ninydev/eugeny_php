<?php
// https://www.php.net/manual/ru/curl.examples-basic.php

$url = "https://api.novaposhta.ua/v2.0/json/";
// echo "URL: " . $url . "<hr>";

// Составление запроса для сервера - формирование строки
// Новая почта не поняла метод автоматического построения
// https://www.php.net/manual/ru/function.http-build-query.php
$postString = "{\r\n";
$postString.= "\"apiKey\": \"3c81d19dc6c4375bc278f4c329fb03cb\",\r\n";
$postString.= "\"modelName\": \"Address\",\r\n";
$postString.= "\"calledMethod\": \"getAreas\",\r\n";
$postString.= "\"methodProperties\": {}";
$postString.= "\r\n}";


// Вариант составления запроса из набора объектов
$methodProperties = [
    "AreaRef" => "71508135-9b87-11de-822f-000c2965ae0e"
];

$postArray = [
    "apiKey" => "3c81d19dc6c4375bc278f4c329fb03cb",
    "modelName" => "Address",
    "calledMethod" => "getCities",
    "methodProperties" => $methodProperties
];

echo json_encode($postArray);
// Возможные дополнительные параметры соединения
$options = array();

// Настроим соединение для запроса
$defaults = array(
    CURLOPT_URL => "https://api.novaposhta.ua/v2.0/json/",
    CURLOPT_RETURNTRANSFER => True,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    // CURLOPT_POSTFIELDS => $postString,
    CURLOPT_POSTFIELDS => json_encode($postArray),
    CURLOPT_HTTPHEADER => array("content-type: application/json",)
);

// инициировали открытие запроса
$ch = curl_init();

// отправили запрос
curl_setopt_array($ch, ($options + $defaults));

// если в ответе пустота - выводим состояние ошибки
if( ! $response = curl_exec($ch)) { trigger_error(curl_error($ch)); }


// Второй вариант проверки на ошибку
$curl_errno = curl_errno($ch);
$curl_error = curl_error($ch);
if ($curl_errno > 0) { echo "cURL Error ($curl_errno): $curl_error\n"; }

// закрываем соденинение с сервером
curl_close($ch);

// Обрабатываем результат
// echo $result;
// echo "<pre>";
// var_dump($result);
// echo "</pre>";

$json = json_decode($response);
//echo $resultJson->data;

echo "<ul>";
foreach ($json->data as $row) {
    echo "<li>" . $row->DescriptionRu . "</li>";
}
echo "</ul>";
