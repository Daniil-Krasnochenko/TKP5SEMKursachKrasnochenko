<body class="bg-secondary bg-gradient ">
    <?php require 'functions/loginblock.php'; ?>
    <?php require 'header.php'; ?>
    <main>
        <div class="container">
            <div class="g-2 mt-3 w-100 equal-cols fs-5">
                <div class="col-12">
                    <div class="bg-dark bg-gradient  rounded shadow text-light fw-bold fs-4 p-3 justify-content-center g-2 m-2 row">
                        <div class="text-center col"><img src="images/products/<?php echo "{$_GET['product_id']}" ?>.jpg" alt="" class="img-fluid rounded shadow img-thumbnail" style="height: 200px; object-fit:cover;"></div>
                        <div class="text-center col">
                            <p class="">
                                <?php
                                $sql = mysqli_query($link, "SELECT * FROM `product` WHERE `product_id`={$_GET['product_id']}");
                                $result = mysqli_fetch_array($sql);
                                echo "{$result['product_name']}<br>" .
                                    "{$result['product_release']}<br>" .
                                    "<p class='fs-6 fw-normal' style='text-align: justify;'>{$result['product_description']}</p>";
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="m-2 fs-5"><b>Оценки:</b></p>
            <?php
            //Вывод всех оценок и отзывов для фильма из базы данных
            $sql = mysqli_query($link, "SELECT * FROM `rating` LEFT OUTER JOIN `user` ON `rating_user_id`=`user_id` WHERE `rating_product_id`={$_GET['product_id']}");
            while ($result = mysqli_fetch_array($sql)) {
                echo
                "<div class='row justify-content-center align-items-center g-2 flex-nowrap my-3'>" .
                    "<div class='col-3'><img src='images/avatar.jpg' alt='' class='img-fluid rounded-circle img-thumbnail'></div> " .
                    "<div class='col-3'>" .
                    "<p><b>{$result['user_name']}<br>" .
                    "{$result['user_email']}<br>" .
                    "Оценка: {$result['rating_value']}</b></p>" .
                    "</div> " .
                    "<div class='col text-end' style='min-width: 170px;'>" .
                    "<div class='d-flex fw-bold '> " .
                    "<p class='mx-auto' style='text-align: justify;'>{$result['rating_comment']}</p> " .
                    "</div> " .
                    "</div>" .
                    "</div>";
            }
            ?>
        </div>
    </main>
    <?php require 'footer.php'; ?>
</body>

</html>