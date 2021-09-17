<form action="<?=$_SERVER["PHP_SELF"]?>?cmd=1" method="post">
    <input type="text" name="userName"
           value="<?=(isset($_POST["userName"]))?$_POST["userName"]:"" ?>" >
    <input type="submit" value="Send">
</form>
<?php

if (isset($_POST["userName"])){
    echo "<p>Hello: " . $_POST["userName"] . "</p>";
} else {
    echo "<p> Я тебя не знаю </p>";
}

