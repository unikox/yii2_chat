Чат
-------------------
```
Описание:
        Чат на базе фреймворка Yii2 Advanced с использованием Ajax, Jquery, Bootstrap
Демо:
        Рабочая версия чата доступна по адрессу: http://chat.car-p.ru/index.php?r=messages%2Findex
        Рабочая версия админки доступна по адрессу: http://chat-adm.car-p.ru
        Username:admin
        Password:12345678

Установка:
        Используя консоль наберите следующие комманды
        git clone https://github.com/unikox/chat.git <Имя проекта>
        cd <Имя проекта>
        composer install
        init (ответ 0)

        затем создайте базу данных и 
        пропишите название базы данных в файле:
        <Имя проекта>\common\config\main-local.php

        затем создаем таблицы, для этого снова в консоль 
        cd <Имя проекта>
        yii migrate (ответ yes)
        
```