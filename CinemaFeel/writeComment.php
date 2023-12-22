<body class="bg-secondary bg-gradient">
    <?php require 'functions/loginblock.php'; ?>
    <?php require 'header.php'; ?>
    <main>
        <div class="container d-flex ">
            <form class="bg-dark shadow rounded p-3 mt-5 mx-auto" action="functions/addRating.php" method="post">
                <div class="d-flex mx-1">
                    <a class="text-danger fs-3 text-nowrap text-decoration-none mx-auto fw-bold ">Оставить комментарий и оценку</a>
                </div>
                <div class="mx-1">
                    <div class="rating-area">
                        <input type="radio" id="star-5" name="rating" value="5">
                        <label for="star-5" title="Оценка «5»"></label>
                        <input type="radio" id="star-4" name="rating" value="4">
                        <label for="star-4" title="Оценка «4»"></label>
                        <input type="radio" id="star-3" name="rating" value="3">
                        <label for="star-3" title="Оценка «3»"></label>
                        <input type="radio" id="star-2" name="rating" value="2">
                        <label for="star-2" title="Оценка «2»"></label>
                        <input type="radio" id="star-1" name="rating" value="1">
                        <label for="star-1" title="Оценка «1»"></label>
                    </div>
                    <?php
                    if (isset($_GET['product_id'])) {
                        echo "<input type='hidden' name='product_id' value='{$_GET['product_id']}'>";
                    }
                    ?>
                    <div class="mb-3">
                        <label for="" class="form-label"></label>
                        <textarea class="form-control" name="comment" id="" rows="6"></textarea>
                    </div>
                </div>
                <div class="mx-1">
                    <button type="submit" class="btn btn-danger w-100">Оставить отзыв</button>
                </div>
            </form>
        </div>
    </main>
    <?php require 'footer.php'; ?>
</body>

</html>