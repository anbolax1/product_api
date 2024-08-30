<h2>Как запустить приложение</h2>
<ol>
    <li>Клонировать проект: <span style="font-style: italic">git clone https://github.com/anbolax1/product_api.git</span></li>
    <li>Зайти в папку с проектом: <span style="font-style: italic">cd product_api</span></li>
    <li>Cобрать и запустить контейнеры: <span style="font-style: italic">run_prod.sh</span></li>
    <li>Зайди в контейнер бэка: <span style="font-style: italic">docker exec -it back bash</span></li>
    <li>Накатить миграции: <span style="font-style: italic">php artisan migrate</span></li>
    <li>Заполнить базу тестовыми данными: <span style="font-style: italic">php artisan db:seed</span></li>
    <li>Наслаждаться простотой развёртывания и шедевральным кодом</li>
</ol>

<h2>Как работать с приложением</h2>
<ul>
    <li>api для получение продуктов: <span style="font-style: italic">http://localhost/api/products</span></li>
Параметры: properties[color][], properties[brand][] <br>
Пример запроса: <pre >http://localhost/api/products?properties[color][]=black&properties[brand][]=Brand 1&properties[color][]=red</pre>
    <li>PMA: <span style="font-style: italic">http://localhost:8080/</span></li>
</ul>
