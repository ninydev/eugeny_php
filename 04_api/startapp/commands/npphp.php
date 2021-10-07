<?php
require_once ("npFun.php");


//1. Запросить список областей
$areasList = GetResponse("Address", "getAreas", ["" => ""]);

foreach ($areasList as $a){
    echo "<h3> Получение данных по области " . $a->DescriptionRu . "</h3>";

    // 2. Запросить список городов в области
    $methodProperties = [ "AreaRef" => $a->Ref ];
    $citiesList[$a->Ref] = GetResponse("Address", "getCities", $methodProperties);

    echo "<ul>";
    foreach ($citiesList[$a->Ref] as $c){
        echo "<li>" . $c->DescriptionRu . "</li>";

        //3. Запросить список отделений в городе
//        $methodProperties = [ "CityRef" => $c->Ref ];
//        $wareHouses[$a->Ref][$c->Ref] = GetResponse("AddressGeneral", "getWarehouses", $methodProperties);
//        echo "<ul>";
//        foreach ($wareHouses[$a->Ref][$c->Ref] as $w){
//            echo "<li>" . $w->ShortAddressRu . "</li>";
//        }
//        echo "</ul>";

    }
    echo "</ul>";

}

/*
$methodProperties = [
    "AreaRef" => "71508135-9b87-11de-822f-000c2965ae0e"
];

$json = GetResponse("Address", "getCities", $methodProperties);
*/

/*
echo "<ul>";
foreach ($json as $row) {
    echo "<li>" . $row->DescriptionRu . "</li>";
}
echo "</ul>";

*/
