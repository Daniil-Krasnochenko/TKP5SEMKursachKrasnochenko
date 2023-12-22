<body class="bg-secondary bg-gradient ">
    <?php require 'header.php'; ?>
    <main>
        <div class="container d-flex ">
            <form class="bg-dark shadow rounded p-3 mt-5 mx-auto" action="functions/login.php" method="post">
                <div class="d-flex mx-1">
                    <a class="text-danger fs-3 text-nowrap text-decoration-none mx-auto fw-bold ">Авторизация</a>
                    <a class="mx-2 text-decoration-none fs-3 text-white fw-bold">/</a>
                    <a class="text-white fs-3 text-decoration-none mx-auto fw-bold " href="registration.php">Регистрация</a>
                </div>
                <div class="mx-1">
                    <input type="email" name="email" id="" class="form-control mt-2" placeholder="Email" required>
                    <?php
                    if (isset($_GET['email'])) {
                        echo
                        "<small class='form-text text-danger mx-2'>Пользователя с таким Email не существует</small>";
                    }
                    ?>
                    <input type="password" name="password" id="" class="form-control my-2" pattern="{8,}" required title="Минимум 8 символов" placeholder="Пароль">
                    <?php
                    if (isset($_GET['password'])) {
                        echo
                        "<small class='form-text text-danger mx-2 '>Неверный пароль<br></small>";
                    }
                    ?>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-danger w-100">Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php require 'footer.php'; ?>
</body>

</html>