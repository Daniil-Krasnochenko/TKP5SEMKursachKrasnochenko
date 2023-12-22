<!doctype html>
<html lang="en">

<head>
    <title>Cursovaya</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/fixes.css">
</head>

<?php
require 'functions/connection.php';
?>

<body>
    <header>
        <nav class="navbar navbar-expand-md  navbar-light bg-dark text-light  ">
            <div class="container">
                <div class="row  w-100" id="collapsibleNavId">
                    <div class="col text-start">
                        <a class="text-decoration-none fs-1 text-danger font-monospace" href="index.php"><img src="images/logo.png" alt="logo" style="height: 100px;"><b class="text-nowrap">Cinema Feel</b></a>
                    </div>
                    <div class="flex-column text-center col" style="max-width: 200px;">
                        <?php
                        //Запуск сессии
                        if (session_id() == "") {
                            session_start();
                        }
                        //Если не авторизован, то написать об этом в шапке
                        if (empty($_SESSION['email']) or empty($_SESSION['id'])) {
                            echo
                            "<p class='my-0 '>Вы не вошли на сайт</p>";
                            //Если авторизован, то написать об этом в шапке и указать по какой почте
                        } else {
                            echo
                            "<p class='my-0 '>Вы вошли как</p>" .
                                "<div><a class='fw-bold my-0 text-decoration-none text-light' href='personalArea.php'>{$_SESSION['email']}</a></div>";
                        }
                        ?>
                        <div class="d-flex justify-content-center ">
                            <a name="" id="" class="btn btn-danger my-2 text-nowrap" href="cart.php" role="button"><i class="bi bi-suit-heart-fill"></i> Избранное</a>
                            <form method="post" action="functions/logout.php" class="my-2  ms-2">
                                <?php
                                //Вывод кнопки Войти/Выйти в зависимости от авторизации
                                if (empty($_SESSION['email']) or empty($_SESSION['id'])) {
                                    echo "<a name='logout' class='btn btn-danger ' href='authorization.php' role='button'>Войти</a>";
                                } else {
                                    echo "<button name='logout' class='btn btn-danger' href='authorization.php' role='button'>Выйти</button>";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand navbar-dark bg-danger fs-5 fw-bold ">
            <div class="container">
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav col-12 justify-content-around">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="index.php">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="catalog.php">Каталог</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="personalArea.php">Личный кабинет</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


    </header>
    <main>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>