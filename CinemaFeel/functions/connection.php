<?php
// подсоединение к серверу

//название сервера
$host = 'localhost';
//пользователь
$user = 'root';
//пароль
$pass = '';
//название бд
$db_name = 'cinema_feel';
//подключение
$link = mysqli_connect($host, $user, $pass, $db_name);
mysqli_set_charset($link, 'utf8');
//ошибка если не вышло
if (!$link) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
}
