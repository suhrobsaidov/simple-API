1. git clone https://github.com/suhrobsaidov/simple-API .
2. cd phone .
3. Запустите composer install.
4. Пропишите данные доступа к Базе данных в файле .env.
5. php artisan key:generate.
6. Запускаем php artisan serve .
   После установки вы можете получить доступ к http: // localhost: 8000 в своем браузере.
7. Доступ до API  прописаны в разделе  routes/api.php
   Можно получить доступ и по браузеру http://localhost:8000/api/phone
8. Реализованные методы :Index (get), Store(put) ,Update(put) ,Destroy(delete) принципом KISS
9. Как отправлять запросы :
10. **Метод Index**
    по ссылки 127.0.0.1:8000/api/phone
    получим ответ с кодом 200
    {
    "id": 2,
    "brand": "Huaway",
    "model": "Honor 10",
    "price": 8812,
    "produced_date": "2011-12-20 21:00:00",
    "color": "blue",
    "memory_limit": "128GB",
    "created_at": "2021-09-17T08:37:54.000000Z",
    "updated_at": "2021-09-17T08:37:54.000000Z"
    },
11. **Метод DELETE(delete)**
    пример запроса
    127.0.0.1:8000/api/phone/delete/1
    при успешном запросе будет ответ в виде сообщения:
    {
    "message": "Запись успешна удалена"
    }
    с кодом 202
    при повторном запросе будет ответ в виде сообщения:
    {
    "message": "Запись была удалена , или не существует"
    }
    с кодом 404
12.      **Метод Update(put)**
    пример запроса 127.0.0.1:8000/api/phone/update/1?brand=MI
    можно редактировать все поля либо по отдельности:
    127.0.0.1:8000/api/phone/update/1?brand=apple&model=Iphone 11&price=8812&produced_date=11.12.2021&color=blue&memory_limit=128GB
    после успешного запроса вы получите ответа в виде сообщения:
    {
    "message": "Запись успешно обновлена"
    }
    с кодом 200
   
