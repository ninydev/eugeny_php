
<button type="button" onclick="npStart(); return false;"> Start </button>

<section id="npMain">
</section>

<section>
    <ul id="npLog"></ul>
</section>

<script>
    let apiUrl = "/eugeny_php/04_api/startapp/commands/more30/cmdMore30.php";
    let areasList = {};
    let cityList = {};

    function buildAreas(json) {
        areasList = json;
        console.log("Start get Cities");
        console.log(areasList);
        getCities(0);
    }

    function getCities(pos){
        console.log("Start at pos" + pos);
        if (areasList.length == pos) {
            console.log(" Список окончен - выхожу");
        } else {
            console.log (apiUrl + "?modelName=Address&calledMethod=getCities&AreaRef=" + areasList[pos].Ref);
        }
        fetch(apiUrl + "?modelName=Address&calledMethod=getCities&AreaRef=" + areasList[pos].Ref)
            .then(res=>res.json())
            .then(json=>{
                cityList[pos] = json;
                console.log("Go to next" + pos);
                json = "";
                console.log(cityList[pos]);
                getCities(pos+1);}
            )
            .catch(err=>{console.log(err)})
    }

    function npStart() {
        fetch(apiUrl + "?modelName=Address&calledMethod=getAreas")
        .then(res=>res.json())
        .then(json=>{buildAreas(json);})
        .catch(err=>{console.log(err)})
    }


</script>

<?php

