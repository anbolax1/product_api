<h2>Как запустить приложение</h2>
<ol>
    <li>Клонировать проект: <span style="font-style: italic">git clone https://github.com/anbolax1/product_api.git</span></li>
    <li>Зайти в папку с проектом: <span style="font-style: italic">cd product_api</span></li>
    <li>Cобрать и запустить контейнеры: <span style="font-style: italic">run_prod.sh</span></li>
    <li>Зайди в контейнер бэка: <span style="font-style: italic">docker exec -it back bash</span></li>
    <li>Накатить миграции: <span style="font-style: italic">php artisan migrate</span></li>
    <li style="text-decoration: line-through">Заполнить базу тестовыми данными: <span style="font-style: italic">php artisan db:seed</span></li>
    <li>Наслаждаться простотой развёртывания и шедевральным кодом</li>
</ol>

<h2>Как работать с приложением</h2>
<ul>
<li>api для получение продуктов: <span style="font-style: italic">GET http://localhost/api/products</span></li>
Параметры: properties[color][], properties[brand][] <br>
Пример запроса: <pre>http://localhost/api/products?properties[color][]=black&properties[brand][]=Brand 1&properties[color][]=red</pre>

<li>api для создания продукта: <span style="font-style: italic">POST http://localhost/api/product</span></li>
Параметры: name, price, quantity, properties (необязательное поле) <br>
Пример запроса: <pre>curl --location 'http://localhost/api/product' \
--header 'Content-Type: application/json' \
--data '{
    "name": "Автомобиль",
    "price": 500000.50,
    "quantity": "3",
    "properties": [3,5,10]
}'</pre>
Для указания properties нужно знать их ID <br><br>

<li>api для создания свойства (property): <span style="font-style: italic">POST http://localhost/api/property</span></li>
Примеры запроса: 
<pre>curl --location 'http://localhost/api/property' \
--header 'Content-Type: application/json' \
--data '{
    "data": {
        "name": "Model",
        "value": "Model 1"
    }
}'</pre>
<pre>curl --location 'http://localhost/api/property' \
--header 'Content-Type: application/json' \
--data '{
    "data": [
        { 
            "name": "Color",
            "value": "Green"
        },
         { 
            "name": "Color",
            "value": "Blue"
        }
    ]

}'</pre>

<li>api для получения свойств: <span style="font-style: italic">GET http://localhost/api/properties</span></li>
Параметры: name (необязательное поле) <br>
Примеры запроса: 
<pre>http://localhost/api/properties</pre>
<pre>http://localhost/api/properties?name=brand</pre>

Продукты могут быть без свойств, как и свойства без связанных с ними продуктов.

<li>PMA: <span style="font-style: italic">http://localhost:8080/</span></li>

</ul>
