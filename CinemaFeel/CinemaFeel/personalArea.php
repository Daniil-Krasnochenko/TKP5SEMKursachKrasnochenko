<body class="bg-secondary bg-gradient ">
    <?php require 'functions/loginblock.php'; ?>
    <?php require 'header.php'; ?>
    <main>
        <div class="container">
            <div class="row g-2 mt-3 w-100 equal-cols fs-5">
                <div class="col-12 col-lg-6">
                    <div class="bg-dark bg-gradient  rounded shadow text-warning p-3 justify-content-center g-2 m-2">
                        <div class="text-center"><img src="images/avatar.jpg" alt="" class="img-fluid rounded-circle shadow img-thumbnail" style="height: 200px; object-fit:cover;"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="bg-dark bg-gradient rounded shadow text-light p-3 flex-column d-flex g-2 m-2 fs-4 fw-bold">
                        <div class="text-center " style="height: 200px;">
                            <p class="my-5">
                                <?php echo "{$_SESSION['name']}" ?> <br>
                                email:
                                <?php echo "{$_SESSION['email']}" ?> <br>
                                Телефон:
                                <?php echo "{$_SESSION['phone']}" ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="m-2 fs-5"><b>Ваши оценки:</b></p>
            <?php
            //Вывод оценок и комментариев оставленные пользователем из базы данных
            $sql = mysqli_query($link, "SELECT * FROM `rating` LEFT OUTER JOIN `product` ON `rating_product_id`=`product_id` WHERE `rating_user_id`={$_SESSION['id']}");
            while ($result = mysqli_fetch_array($sql)) {
                echo
                "<div class='row justify-content-center align-items-center g-2 flex-nowrap my-3'>" .
                    "<div class='col-3'><img src='images/products/{$result['product_id']}.jpg' alt='' class='img-fluid rounded'></div> " .
                    "<div class='col-3'>" .
                    "<p><b>{$result['product_name']}<br><br></b>" .
                    "Год выхода: {$result['product_release']}</p>" .
                    "Ваша оценка: {$result['rating_value']}<br>" .
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