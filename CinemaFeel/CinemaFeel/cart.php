<body class="bg-secondary bg-gradient">
    <?php require 'functions/loginblock.php'; ?>
    <?php require 'header.php'; ?>
    <main>
        <div class="container">
            <div class="row mt-2 ">
                <div class="m-2 bg-dark bg-gradient  text-light rounded shadow p-3">
                    <h3>Избранное</h3>
                    <?php
                    //Запрос избранного из базы данных для авторизованного пользователя
                    $sql = mysqli_query($link, "SELECT * FROM `cart` LEFT OUTER JOIN `product` ON `cart_product_id` = `product_id` WHERE `cart_user_id`={$_SESSION['id']}");
                    //Вывод циклом всех данных
                    while ($result = mysqli_fetch_array($sql)) {
                        echo
                        "<div class='row justify-content-center align-items-center g-2 flex-nowrap my-3'>" .
                            "<div class='col-3'><img src='images/products/{$result['product_id']}.jpg' alt='' class='img-fluid rounded'></div> " .
                            "<div class='col-3'>" .
                            "<p><b>{$result['product_name']}<br><br></b>" .
                            "Рейтинг: 4.8<br>" .
                            "Год выхода: {$result['product_release']}</p>" .
                            "</div> " .
                            "<div class='col text-end' style='min-width: 170px;'>" .
                            "<div class='d-flex fw-bold '> " .
                            "<p class='mx-auto' style='text-align: justify;'>{$result['product_description']}</p> " .
                            "</div> " .
                            "</div>" .
                            "<form method='post' action='functions/deleteFromCart.php' style='width: 24px;'>" .
                            "<input type='hidden' name='cart_id' value='{$result['cart_id']}' />" .
                            "<button id='' class='btn btn-close btn-close-white  my-3' role='button'></button> " .
                            "</form>" .
                            "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php require 'footer.php'; ?>
</body>

</html>