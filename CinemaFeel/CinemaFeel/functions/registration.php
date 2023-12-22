<?php

require 'connection.php';

if (isset($_POST['name'])) {
  $name = $_POST['name'];
  if ($name == '') {
    unset($name);
  }
}
//заносим введенный пользователем почту в переменную $email, если он пустой, то уничтожаем переменную
$password = $_POST['password'];
$email = $_POST['email'];
if (isset($_POST['password'])) {
  $password = $_POST['password'];
  if ($password == '') {
    unset($password);
  }
}
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($email) or empty($password)) //если пользователь не ввел почту или пароль, то выдаем ошибку и останавливаем скрипт
{
  exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
$phone = $_POST['phone'];
//если почту и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$name = stripslashes($name);
$name = htmlspecialchars($name);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$name = trim($name);
$password = trim($password);
$email = trim($email);
$phone = trim($phone);
// проверка на существование пользователя с такой же почтой
$sql_select = ("SELECT user_id FROM user WHERE user_email='$email'");
$result = mysqli_query($link, $sql_select);
$row = mysqli_fetch_array($result);
if (!empty($row['user_id'])) {
  header('Location: ../registration.php?email');
}
// если такого нет, то сохраняем данные
$sql_select =  ("INSERT INTO user (user_email,user_name,user_password,user_phone) 
                          VALUES ('$email','$name','$password','$phone')");
$result = mysqli_query($link, $sql_select);
// Проверяем, есть ли ошибки
if ($result == 'TRUE') {
  header('Location: ../authorization.php');
} else {
  echo "Ошибка! Вы не зарегистрированы.";
}
