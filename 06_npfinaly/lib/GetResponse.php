<?php
// https://www.php.net/manual/ru/book.funchand.php

function GetResponse($modelName, $calledMethod, $methodProperties){

    $postArray = [
        "apiKey" => "3c81d19dc6c4375bc278f4c329fb03cb",
        "modelName" => $modelName,
        "calledMethod" => $calledMethod,
        "methodProperties" => $methodProperties
    ];

    // Настроим соединение для запроса
    $defaults = array(
        CURLOPT_URL => "https://api.novaposhta.ua/v2.0/json/",
        CURLOPT_RETURNTRANSFER => True,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($postArray),
        CURLOPT_HTTPHEADER => array("content-type: application/json",)
    );

    // инициировали открытие запроса
    $ch = curl_init();

    // отправили запрос
    curl_setopt_array($ch, $defaults);

    // если в ответе пустота - выводим состояние ошибки
    if( ! $response = curl_exec($ch)) { trigger_error(curl_error($ch)); }

    // Второй вариант проверки на ошибку
    $curl_errno = curl_errno($ch);
    $curl_error = curl_error($ch);
    if ($curl_errno > 0) { echo "cURL Error ($curl_errno): $curl_error\n"; die();  }

    $json = json_decode($response);

    if (!$json->success){
        var_dump($json);
        die ("Stop");
    }

    // var_dump($json);

//    if (isset($methodProperties["AreaRef"])) {
//        echo "<pre>";
//        var_dump($defaults);
//        echo "</pre><hr>";
//        var_dump($json);
//        die();
//    }

    return $json->data;
}