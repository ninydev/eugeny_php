<style>
    .filmList img {width: 100px; border: 1px solid gray; border-radius: 25%;}
</style>
<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://imdb8.p.rapidapi.com/auto-complete?q=game%20of%20thr",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: imdb8.p.rapidapi.com",
        "x-rapidapi-key: 7e2afce0b1msh7f5c23d92a82e63p15d2e7jsn1fb4d1a13ff8"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    die ("cURL Error #:" . $err);
}

$object = json_decode($response);
$data = $object->d;

echo "<ul class='filmList'>";
for($i = 0; $i < sizeof($data); $i++) {
    // echo "<p>$i</p>";
    echo "<li id='" . $data[$i]->id . "'>";
    echo "<img src='" . $data[$i]->i->imageUrl .  "' >";
    echo "<h1>" . $data[$i]->l . "</h1>";
    echo "</li>";
}
echo "</ul>";
//echo "<pre>";
//var_dump($object);
//echo "</pre>";
