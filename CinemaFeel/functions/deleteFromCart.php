<?php
//Подключение к бд
require 'connection.php';
//Запуск сессии
if (session_id() == "") {
    session_start();
}
//Проверка есть ли данные в сессии (авторизован ли пользователь, если нет, то перенаправление на авторизацию)
if (empty($_SESSION['email']) or empty($_SESSION['id'])) {
    header('Location: ../authorization.php');
    //Проверка есть ли получаемые данные, если есть, то добавление в бд и перенаправление в избранное
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cart_id'])) {
    $cart_id = $_POST['cart_id'];
    echo "{$_POST['cart_id']}";
    //Удаление избранного из бд
    $sql_select =  "DELETE FROM cart  WHERE cart_id = '$cart_id'";
    $result = mysqli_query($link, $sql_select);

    // Проверяем, есть ли ошибки
    if ($result == 'TRUE') {
        header('Location: ../cart.php');
    } else {
        echo "Ошибка!";
    }
}
