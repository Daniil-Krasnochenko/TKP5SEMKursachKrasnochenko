<?php
//Запуск сессии
if (session_id() == "") {
    session_start();
}
//Проверка есть ли данные в сессии (авторизован ли пользователь, если нет, то перенаправление на авторизацию)
if (empty($_SESSION['email']) or empty($_SESSION['id'])) {
    header('Location: authorization.php');
}
