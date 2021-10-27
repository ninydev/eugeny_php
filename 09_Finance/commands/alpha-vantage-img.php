<?php
header ('Content-Type: image/png');
$img = @imagecreatetruecolor(800, 600)
or die('Невозможно инициализировать GD поток');

require_once (__DIR__ . "/../lib/mySql.php");
//$mySql = new mysqli($host, $user, "", $db_name);

$result = $mySql->query("SELECT * FROM `vantage` ORDER BY `dt_inspect`");

$trans_colour = imagecolorallocatealpha($img, 150, 150, 150, 127);
//imagerectangle($img, 0, 0, 0, 0, $trans_colour);

$pink = imagecolorallocate($img, 255, 105, 180);
$white = imagecolorallocate($img, 255, 255, 255);
$green = imagecolorallocate($img, 132, 135, 28);

$xStart = 0;
$xStep = 2;
foreach ($result as $row){
    imagerectangle($img,
        $xStart ,( $row["money"] - 299) * 10,
        $xStart+$xStep, $row["money"], $pink );
    $xStart+= $xStep;
    //echo $xStart ." ". $row["money"] . "<br>";
}





imagepng($img);
imagedestroy($img);
