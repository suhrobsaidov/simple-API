1. git clone https://github.com/suhrobsaidov/simple-API .
2. cd simple-API .
3. Пропишите данные доступа к Базе данных в файле .env.
4. Запустите composer install.
5. php artisan key:generate.
6. Запускаем php artisan serve .
   После установки вы можете получить доступ к http: // localhost: 8000 в своем браузере.
7. Доступ до API  прописаны в разделе  routes/api.php
   Можно получить доступ и по браузеру http://localhost:8000/api/phone
8. Реализованные методы :Index (get), Store(put) ,Update(put) ,Destroy(delete) принципом KISS
9. Как отправлять запросы :
10. `Метод Store (put)`
    пример запроса: <br>
    127.0.0.1:8001/api/phone/store/?brand=Huaway&model=Honor 10&price=8812&produced_date=11.12.2021&color=blue&memory_limit=128GB <br>
    нужно следовать правилам заполнерия,<br>
    'brand' => 'required|min:1|max:50',<br>
    'model' => 'required|min:1|max:100',<br>
    'price' => 'required|min:1|max:9999',<br>
    'produced_date' => 'required',<br>
    'color' =>'required',<br>
    'memory_limit' =>'required'<br>
11. **`**Метод Index**`**<br>
    по ссылки 127.0.0.1:8000/api/phone
    получим ответ с кодом 200 <br>
    {<br>
    "id": 2,<br>
    "brand": "Huaway",<br>
    "model": "Honor 10",<br>
    "price": 8812,<br>
    "produced_date": "2011-12-20 21:00:00",<br>
    "color": "blue",<br>
    "memory_limit": "128GB",<br>
    "created_at": "2021-09-17T08:37:54.000000Z",<br>
    "updated_at": "2021-09-17T08:37:54.000000Z"<br>
    },<br>
12.      **Метод Update(put)**
    пример запроса <br>127.0.0.1:8000/api/phone/update/1?brand=MI<br>
    можно редактировать все поля либо по отдельности:<br>
    127.0.0.1:8000/api/phone/update/1?brand=apple&model=Iphone 11&price=8812&produced_date=11.12.2021&color=blue&memory_limit=128GB<br><br>
    после успешного запроса вы получите ответа в виде сообщения:<br>
    {<br>
    "message": "Запись успешно обновлена"<br>
    }<br>
    с кодом 200<br>
13. `**Метод DELETE(delete)**`<br>
    пример запроса<br>
    127.0.0.1:8000/api/phone/delete/1  <br>
    при успешном запросе будет ответ в виде сообщения:<br>
    {<br>
    "message": "Запись успешна удалена"<br>
    }<br>
    с кодом 202<br>
    при повторном запросе будет ответ в виде сообщения:<br>
    {<br>
    "message": "Запись была удалена , или не существует"<br>
    }<br>
    с кодом 404<br>
14. `Фильтры(get)`<br>
    пример запроса<br>
    127.0.0.1:8000/api/phone/filter?brand=(Название бренда)<br>
    ответ с кодом 200 ОК <br>
    при неправильном вводе названии бредна<br>
    будет следующая запись:<br>
    {<br>
    "message": "Record was deleted or missing"<br>
    }<br>
    c кодом 404 (Not found)<br>
    

   

