<?php
//разлогинивает пользователя
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
   if (session_id() == "") {
      session_start();
   }
   unset($_SESSION['email']);
   unset($_SESSION['id']);
   header('Location: ../index.php');
   exit;
}
