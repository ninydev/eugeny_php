<?php
$arr = [];

for ($i = 0; $i < 5; $i++){
    $arr[$i] = $i + 1;
}

$arr["key"] = "val";
// $_GET, $_POST
?>

    <ul>
        <?php
        for ($i = 0; $i < sizeof($arr); $i++){
            echo '<li>' . $arr[$i] . '</li>';
        }?>
    </ul>


<?php

