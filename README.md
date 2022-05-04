Чат на базе фреймворка Yii2 Advanced с использованием Ajax, Jquery, Bootstrap
-------------------
```


Демо:
        Рабочая версия чата доступна по адрессу: http://chat.car-p.ru/index.php?r=messages%2Findex
        Рабочая версия админки доступна по адрессу: http://chat-adm.car-p.ru
        Username:admin
        Password:12345678
        
Установка
    Для установки и запуска вам потребуется Docker и docker-compose
    Скачиваем проект:
    git clone https://github.com/unikox/yii2_chat.git  chat 

Запуск
    для запуска нужно выполнить команду:
    cd ./chat/local
    sh start.sh

Использование
    Спустя некоторое время, в зависимости от мощности вашего пк, запустятся 3 контейнера. 
    
    Внешний https порт 4488 контейнера, используется nginx с само подписными сетификатами.
    Так что предупреждение можно смело пропускать.
        https://127.0.0.1:4488
        Контейнер php-fpm с версией PHP 8.0.12

    Внешний mysql порт 1306 контейнера, используется mysql:8.0
        для подключения к бд 
                user:root 
                password:secret

Отладка
    Данный проект сконфигурирован на использование Xdebug и VSCode
        в VScode используется расширение PHP Debug v1.26.0
        сам Xdebug 3.x который подключается к порту 9003 хоста докера
        в данном случае ip хоста 192.168.114.1 если у вас другой,
        то можно перенастроить в файле ./chat/local/xdebug.ini 
        xdebug.client_host = адрес вашего хоста
        xdebug.client_port = порт для входящих соединений отладчика
        xdebug.idekey =  для указания среды разработки VSCODE или PHPSHTORM 

        для корректной работы отладчика необходимо так же внести изменения в файл launch.json :
            {папка с проектом}/.vscode/launch.json
            нужно указать полный локальный путь до дириктории с yii2-advanced
                        "pathMappings": {
                    "/var/www": "/полный/путь/src",

                }


Остановка
    Для остановки проекта выполните: 
        sh stop.sh 
        в директории local текущего проекта
```
