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
    //Проверка есть ли получаемые данные, если есть, то добавление в бд и перенаправление в личный кабинет
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $user = $_SESSION['id'];
    $product = $_POST['product_id'];
    $comment = $_POST['comment'];
    $value = $_POST['rating'];

    echo "{$_POST['product_id']}";
    //Добавление рейтинга и отзыва в бд
    $sql_select =  "INSERT INTO rating (rating_user_id,rating_product_id,rating_value,rating_comment) VALUES ('$user','$product','$value','$comment')";
    $result = mysqli_query($link, $sql_select);

    // Проверяем, есть ли ошибки
    if ($result == 'TRUE') {
        header('Location: ../personalArea.php');
    } else {
        echo "Ошибка! Вы не зарегистрированы.";
    }
}
