
<!-- созам элемент для работы с проектом -->
<div id="npMain">

</div>
<button type="button" onclick="doSendToMyServer()"> Send to Server </button>

<script>

    let data;// Объявляю переменные для хранения данных

    // Этим методом я отправлю данные к себе на сервер
    function doSendToMyServer() {
        let objToSend = {
          test: "Test"
        };
        console.log(objToSend);
        fetch( // Отправка запроса
            "http://localhost:63342/eugeny_php/05_novaposhta/api/saveAreas.php?test=1111", // url куда
            { // данные по запросу ( если GET можно опустить)
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                // mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                    'Content-Type': 'application/json'
                    // 'Content-Type': 'application/x-www-form-urlencoded',
                },
                redirect: 'follow', // manual, *follow, error
                referrerPolicy: 'no-referrer', // no-referrer, *client
                body: JSON.stringify(data) // body data type must match "Content-Type" header
                //body: JSON.stringify( objToSend)
            }
        )
            .then(response => response.text()) // получение ответа от сервера и нужное преобразовать в json
            .then(textFromServer=> console.log(textFromServer)) // обработать полученный json
            .catch(err=> console.log(err)); //  получить ошибку и обработать ее
    }



    // Этим методом я обработаю данные, полученные от сервера
    function doOperation(json) {
        console.log(json);
        if(json.success){ // Если ответ удачен
            data = json.data; // сохранить данные для дальнейшей обработки

            // Вараинт вывода на экран через список
            let ul = document.createElement("ul");
            for (let i = 0; i < json.data.length; i++) {
                let li = document.createElement("li");
                li.innerText = json.data[i].DescriptionRu;
                ul.appendChild(li);
            }
            document.getElementById("npMain").appendChild(ul);




            /*
            let textArea = document.createElement("textarea"); // Создать новый тег TextArea
            textArea.value = json.data; // вывести полученные данные в тег
            document.getElementById("npMain").appendChild(textArea); // вывести новый тег на экран
             */
        } else {
            document.getElementById("npMain").innerText = "Error"; // вывести сообщение о неудачном запросе
        }

    }

    // console.log - вывод информации на консоль броузера

    fetch( // Отправка запроса
        "https://api.novaposhta.ua/v2.0/json/", // url куда
        { // данные по запросу ( если GET можно опустить)
            method: "POST", // Метод запроса
            body: JSON.stringify( // данные (тело), которые я передаю сайту
                {
                        apiKey: "3c81d19dc6c4375bc278f4c329fb03cb",
                        modelName: "Address",
                        calledMethod: "getAreas",
                        methodProperties: {}
                }
            )
        }
    )
    .then(response => response.json()) // получение ответа от сервера и нужное преобразовать в json
    .then(json=> doOperation(json)) // обработать полученный json
    .catch(err=> console.log(err)); //  получить ошибку и обработать ее
</script>
<?php
