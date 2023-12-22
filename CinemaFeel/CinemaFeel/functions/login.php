<?php
//проверка зарегистрирован ли пользователь

//проверка подключения
require 'connection.php';

session_start(); //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if ($email == '') {
        unset($email);
    }
} //заносим введенный пользователем логин в переменную $email, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == '') {
        unset($password);
    }
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($email) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$email = stripslashes($email);
$email = htmlspecialchars($email);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$email = trim($email);
$password = trim($password);
// подключаемся к базе

$sql_select = ("SELECT * FROM user WHERE user_email='$email'");
$result = mysqli_query($link, $sql_select);
$row = mysqli_fetch_array($result);
if (empty($row['user_email'])) {
    //если пользователя с введенным email не существует
    header('Location: ../authorization.php?email');
} else {
    //если существует, то сверяем пароли
    if ($row['user_password'] == $password) {
        //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
        $_SESSION['email'] = $row['user_email'];
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['name'] = $row['user_name'];
        $_SESSION['phone'] = $row['user_phone'];
        //эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
        header('Location: ../index.php');
    } else {
        header('Location: ../authorization.php?password');
    }
}
