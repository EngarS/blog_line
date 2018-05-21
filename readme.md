<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Prototype blog "Blog line" #

Тестовое задание 1. Прототип блога на Laravel

## About project "Blog line"

Реализованные функции:
1. Регистрация пользователей (с подтверждением регистрации по e-mail.)
2. Авторизация
3. Восстановление пароля(с кодом на почту)
4. Создание/редактирование/удаление/просмотр статей

## Install (Установка)
1. Клонируем репозиторий
    ~~~
    git clone git@github.com:EngarS/blog_line.git
    ~~~
2. Делаем копию файла _.env.example_
    ~~~
    cp .env.example .env
    ~~~
3. Настраиваем в файле _.env_ подключение к БД
    ~~~
    DB_HOST=localhost
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
    ~~~
4. Запускаем миграцию
    ~~~
    php artisan migrate
    ~~~


## License

Licensed under the  [MIT license](https://opensource.org/licenses/MIT).
