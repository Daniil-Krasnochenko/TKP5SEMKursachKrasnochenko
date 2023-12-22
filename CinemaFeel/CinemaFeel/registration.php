<body class="bg-secondary bg-gradient">
    <?php require 'header.php'; ?>
    <main>
        <div class="container d-flex ">
            <form class="bg-dark shadow rounded p-3 mt-5 mx-auto" action="functions/registration.php" method="post">
                <div class="d-flex mx-1">
                    <a class="text-white fs-3 text-decoration-none mx-auto fw-bold" href="authorization.php">Авторизация</a>
                    <a class="mx-2 text-decoration-none fs-3 text-white fw-bold">/</a>
                    <a class="text-danger fs-3 text-nowrap text-decoration-none mx-auto fw-bold ">Регистрация</a>
                </div>
                <div class="mx-1">
                    <input type="text" name="name" id="" class="form-control my-2" placeholder="ФИО" required>
                    <input type="email" name="email" id="" class="form-control my-2" placeholder="Email" required>
                    <?php
                    if (isset($_GET['email'])) {
                        echo
                        "<small class='form-text text-danger mx-2'>Пользователь с таким Email уже существует</small>";
                    }
                    ?>
                    <input type="tel" name="phone" id="" class="form-control my-2" placeholder="Номер телефона" pattern="[0-9]*" inputmode="numeric" required title="Допустимы только числа">
                    <input type="password" name="password" id="" class="form-control my-2" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*" required title="Минимум 8 символов, одна цифра, одна буква в верхнем регистре и одна в нижнем" placeholder="Пароль">
                </div>
                <div class="mx-1">
                    <button type="submit" class="btn btn-danger w-100">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </main>
    <?php require 'footer.php'; ?>
</body>

</html>