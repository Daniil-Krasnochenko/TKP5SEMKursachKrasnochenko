<body class="bg-secondary bg-gradient ">
    <?php require 'header.php'; ?>
    <main>
        <div class="container mt-3">
            <div class="row justify-content-center ">
                <div class="col-12 col-md-3">
                    <div class="bg-dark bg-gradient rounded shadow text-danger m-2 p-2">
                        <p class="fs-5 fw-bold text-center"> Фильтры по жанрам</p>
                        <nav class="nav flex-column">
                            <a class="nav-link text-danger fw-bold text-center" href="catalog.php">Все</a>
                            <?php
                            $sql = mysqli_query($link, "SELECT * FROM `tag` ORDER BY `tag_name`");
                            while ($result = mysqli_fetch_array($sql)) {
                                echo
                                "<a class='nav-link text-danger fw-bold text-center' href='catalog.php?tag_id={$result['tag_id']}'>{$result['tag_name']}</a>";
                            }
                            ?>
                        </nav>
                    </div>
                </div>
                <div class="row equal-cols col mt-1">
                    <?php
                    //Если передан фильтр, то получение фильмов из базы данных по фильтру
                    if (isset($_GET['tag_id'])) {
                        $sql = mysqli_query($link, "SELECT * FROM `product` LEFT OUTER JOIN `producttag` ON `product_id` = `producttag_product_id` WHERE `producttag_tag_id`={$_GET['tag_id']} ORDER BY `product_name`");
                        //Если не передан фильтр, то получение всех фильмов из базы данных
                    } else
                        $sql = mysqli_query($link, "SELECT * FROM `product` ORDER BY `product_name`");
                    //Вывод всех фильмов с помощью цикла
                    while ($result = mysqli_fetch_array($sql)) {
                        //Получение средней оценки фильма из базы данных
                        $result_sum = mysqli_query($link, "SELECT AVG(rating_value) AS product_rating FROM `rating` WHERE `rating_product_id`={$result['product_id']}");
                        $row = mysqli_fetch_assoc($result_sum);
                        $product_rating = $row['product_rating'];
                        //Вывод данных о фильме
                        echo
                        "<div class='col-lg-4 col-sm-6 col-12'>" .
                            "<div class='m-1 rounded shadow bg-dark bg-gradient text-danger'>" .
                            "<div class='mx-2 py-2 flex-column d-flex h-100'>" .
                            "<img src='images/products/{$result['product_id']}.jpg' class='img-fluid rounded m-2' alt=''>" .
                            "<div class='mx-2 h-100 d-flex flex-column'>" .
                            "<p class=''>{$result['product_name']}</p>" .
                            "<p class='text-light  mt-auto'>{$result['product_description']}</p>" .
                            "<p class='fw-bold'>{$product_rating} оценка / {$result['product_release']} год</p>" .
                            "</div>" .
                            "<div class='row'>" .
                            "<form method='post' action='writeComment.php?product_id={$result['product_id']}' class='m-0 col'>" .
                            "<input type='hidden' name='product_id' value='{$result['product_id']}'>" .
                            "<button name='' id='' class='btn btn-danger w-100 fw-bold my-1 text-nowrap'><i class='bi bi-pen-fill'></i> Оставить
                            отзыв</button>" .
                            "</form>" .
                            "<form method='post' action='rating.php?product_id={$result['product_id']}' class='m-0 col'>" .
                            "<input type='hidden' name='product_id' value='{$result['product_id']}'>" .
                            "<button name='' id='' class='btn btn-danger w-100 fw-bold my-1 text-nowrap'><i class='bi bi-star-fill'></i> Оценки</button>" .
                            "</form>" .
                            "<form method='post' action='functions/addToCart.php' class='m-0 col'>" .
                            "<input type='hidden' name='product_id' value='{$result['product_id']}'>" .
                            "<button name='' id='' class='btn btn-danger w-100 fw-bold my-1 text-nowrap'><i class='bi bi-suit-heart-fill'></i> В избранное</button>" .
                            "</form>" .
                            "</div>" .
                            "</div>" .
                            "</div>" .
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