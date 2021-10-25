<?php


?>

<script>
    let weather = {};
    function getWeather() {
        fetch('https://api.openweathermap.org/data/2.5/weather?q=London&units=metric&appid=d55d7e3b16ffa113b7d67bc7244c5148')
        .then(response=>response.json())
        .then(json=> {
            weather = json;
            console.log(weather);
            sendWeatherToMySql();
        })
        .catch(err=> console.log(err));
    }

    function sendWeatherToMySql() {
        let url = 'http://localhost:63342/eugeny_php/08_Weather/commands/putWeatherToMySql.php?';
        url += 'name=' + weather.name;
        url += '&city_id=' + weather.id;
        url += '&temp=' + weather.main.temp;
        console.log(url);
        fetch(url)
            .then(response=>response.text())
            .then(txt=> {
                console.log(txt);
            })
            .catch(err=> console.log(err));

    }

    getWeather();

</script>
