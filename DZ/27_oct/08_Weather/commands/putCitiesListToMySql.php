<form method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
    <input type="hidden" name="cmd" value="4"> <!-- передача номера комадны серверу -->
    <input type="file" name="citiesJson">
    <input type="submit">
</form>
