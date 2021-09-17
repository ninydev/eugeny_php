
<script>
    let main = document.getElementById("main");// получаю тег main

    fetch('/eugeny_php/02_Include/array_fetch_json/api/get.php')
        .then(response => // разбор ответа от сервера и преобразование его в json
            { /*console.log(response);*/ return response.json();})
        .then(data => // получаю данные и что то с ними делаю
            {
                console.log(data); // Контроль полученных данных

                // Если я знаю имена полей

                let ul = document.createElement("ul"); // корень списка
                    let li = document.createElement("li"); // элемент списка
                    li.innerText // текст внутри элемента списка
                        = data.name; // к ключу полученной информации
                    ul.appendChild(li); // внедрить элемент в список
                main.appendChild(ul); // внедрить список в страницу

                // -----------------------

                let ulFull = document.createElement("ul"); // корень списка
                for (const dataKey in data) {
                    let li = document.createElement("li");
                    let label = document.createElement("label"); // Метка
                    label.innerText = dataKey + " => ";
                    li.appendChild(label);
                    if (Array.isArray(data[dataKey])) { // проверяю, не массив ли
                        let div = document.createElement("div");
                        for (let i = 0; i < data[dataKey].length; i++) {
                            let check = document.createElement("input");
                            check.type = "checkbox";
                            check.checked = true;
                            check.value = data[dataKey][i];
                            check.id = data[dataKey][i];
                            div.appendChild(check);
                            let label = document.createElement("label");
                            label.htmlFor = check.id;
                            label.innerText = data[dataKey][i];
                            div.appendChild(label);
                        }
                        li.appendChild(div);
                    } else {
                        let input = document.createElement("input");
                        input.disabled = true;
                        input.value = data[dataKey];
                        li.appendChild(input);
                    }
                    ulFull.appendChild(li);
                }

                main.appendChild(ulFull); // внедрить список в страницу

            })
        .catch(err => // Если ошибка
            {if(err) console.log(err);});




</script>


<?php
