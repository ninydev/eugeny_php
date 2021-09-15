<form action="<?=$_SERVER["PHP_SELF"]?>?cmd=2" method="post">
    <input type="number" value="5" name="count">
    <input type="submit" value="Send">
</form>


<?php

if(isset($_POST["count"])){ // Если пользователь что то прислал
    echo "<p> Пользователь прислал " .  $_POST['count'] . "</p>";
    if(is_numeric($_POST["count"])){ // Если он прислал число
        echo "<ul>";
        for ($i = 0; $i <$_POST["count"]; $i++ ) {
            //echo "<li>" .
                echo $i;
            // . "</li>";
        }
        echo "</ul>";
    } else {
        echo " Это не число ";
    }
}
