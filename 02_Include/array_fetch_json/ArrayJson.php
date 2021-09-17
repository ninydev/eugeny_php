<?php
$userModel = [];

$userModel["name"] = "Oleksandr Nykytin";
$userModel["email"] = "nika_web@ukr.net";
$userModel["year"] = 1977;
$userModel["skill"] = ["c#", "c++", "php","js"];

echo "<ul>";
foreach ($userModel as $key => $value) {

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

// var_dump($userModel);

echo json_encode($userModel);

$arr = json_decode(json_encode($userModel));


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





<?php
