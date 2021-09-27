<?php
/*
$userModel = [];

$userModel["name"] = "Oleksandr Nykytin";
$userModel["email"] = "nika_web@ukr.net";
$userModel["year"] = 1977;
$userModel["skill"] = ["c#", "c++", "php","js"];
*/

//ввод данных

$emails[0]["type"] = "home";
$emails[0]["value"] = "nika_web@ukr.net";
$emails[1]["type"] = "work";
$emails[1]["value"] = "nikitin_a@itstep.academy";

$tels[0]["type"] = "main";
$tels[0]["value"] = "+380965747708";

$contact ["name"] = "Oleksandr Nykytin";
$contact ["emails"] = $emails;
$contact ["phones"] = $tels;
//конец ввода данных
echo "<ul>";
foreach ($contact as $key => $value) {

    echo "<li>" . $key . " => ";
    if (is_array($value)) {
        echo "<ul>";
        foreach ($value as $key1 => $value1 ){
            echo "<li>" . $key1 . " => " . $value1 . "</li>";
        }
        echo "</ul>";
    } else {
        echo $value . "</li>";
    }
}
echo "</ul>";

// var_dump($contact);

echo json_encode($contact);

$arr = json_decode(json_encode($contact));


echo "<ul>";
foreach ($arr as $key => $value) {
    echo "<li>" . $key . " => ";
    if (is_array($value)) {
        echo "<ul>";
        foreach ($value as $key1 => $value1 ){
            echo "<li>" . $key1 . " => " . $value1 . "</li>";
        }
        echo "</ul>";
    } else {
        echo $value . "</li>";
    }
}
echo "</ul>";

?>


