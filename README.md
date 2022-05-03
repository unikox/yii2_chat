# libro_teka
Описание:
        Чат на базе фреймворка Yii2 Advanced с использованием Ajax, Jquery, Bootstrap
Демо:
        Рабочая версия чата доступна по адрессу: http://chat.car-p.ru/index.php?r=messages%2Findex
        Рабочая версия админки доступна по адрессу: http://chat-adm.car-p.ru
        Username:admin
        Password:12345678
-------------------
```
Установка
    Для установки и запуска вам потребуется Docker и docker-compose
    Скачиваем проект:
    git clone https://github.com/unikox/libro_teka.git  libro_teka 

Запуск
    для запуска нужно выполнить команду:
    cd ./libro_teka/local
    sh start.sh

Использование
    Спустя некоторое время, в зависимости от мощности вашего пк, запустятся 3 контейнера. 
    
    Внешний https порт 4499 контейнера, используется nginx с само подписными сетификатами.
    Так что предупреждение можно смело пропускать.
        swager доступен по ссылке: https://127.0.0.1:4499/api/doc

    Контейнер php-fpm с версией PHP 8.0.12

    Внешний mysql порт 5306 контейнера, используется mysql:8.0
        для подключения к бд 
                user:root 
                password:secret

Тестирование
    Заходим в контейнер
        docker exec -it php_fpm_lib /bin/sh
    Запускаем тестирование
        php bin/phpunit

Отладка
    Данный проект сконфигурирован на использование Xdebug и VSCode
        в VScode используется расширение PHP Debug v1.26.0
        сам Xdebug 3.x который подключается к порту 9003 хоста докера
        в данном случае ip хоста 192.168.32.1 если у вас другой,
        то можно перенастроить в файле ./libro_teka/local/xdebug.ini 
        xdebug.client_host = адрес вашего хоста
        xdebug.client_port = порт для входящих соединений отладчика
        xdebug.idekey =  для указания среды разработки VSCODE или PHPSHTORM 


Остановка
    Для остановки проекта выполните: 
        sh start.sh 
        в директории local текущего проекта
```
