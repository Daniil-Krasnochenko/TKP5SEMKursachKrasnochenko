<body class="bg-secondary bg-gradient">
    <?php require 'header.php'; ?>
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center align-items-center g-2 col-12">
                <div class="col-4"><img src="images/banner2.jpg" class="img-fluid rounded " alt=""></div>
                <div class="col-4"><img src="images/banner3.jpg" class="img-fluid rounded " alt=""></div>
                <div class="col-4"><img src="images/banner1.jpg" class="img-fluid rounded " alt=""></div>
            </div>
            <p class="mt-3 fs-1 fw-bold text-center ">Новинки</p>
            <div class="row equal-cols g-2 mt-1">
                <?php
                //Получение 4х последних добавленных фильмов в базу данных
                $sql = mysqli_query($link, "SELECT * FROM `product` ORDER BY `product_date` DESC LIMIT 4");
                //Вывод их с помощью цикла
                while ($result = mysqli_fetch_array($sql)) {
                    //Вычисление среднего рейтинга фильма по данным из базы данных
                    $result_sum = mysqli_query($link, "SELECT AVG(rating_value) AS product_rating FROM `rating` WHERE `rating_product_id`={$result['product_id']}");
                    $row = mysqli_fetch_assoc($result_sum);
                    $product_rating = $row['product_rating'];
                    //Вывод данных о фильме
                    echo
                    "<div class='col-lg-3 col-sm-6 col-12'>" .
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
            <p class="mt-5 mb-4 fw-bold fs-1 text-center"> Ответы на часто задаваемые вопросы</p>
            <p>
                <a class="btn btn-danger text-dark  w-100 fw-bold fs-4" data-bs-toggle="collapse" href="#contentId1" aria-expanded="false" aria-controls="contentId">
                    Можете ли вы подобрать фильмы на основе моих предпочтений?
                </a>
            </p>
            <div class="collapse bg-dark text-light shadow rounded fs-5" id="contentId1" style="text-align: justify;">
                <p class="m-2 p-3">
                    Конечно! Здесь мы гордимся нашей способностью подбирать фильмы на основе ваших предпочтений. Расскажите нам о жанрах,
                    актерах или режиссерах, которые вам нравятся, а мы с удовольствием подберем для вас немало интересных вариантов. Наша
                    команда стремится угодить каждому пользователю, даря увлекательные и запоминающиеся кинематографические впечатления.
                </p>
            </div>

            <p>
                <a class="btn btn-danger text-dark w-100 fw-bold fs-4" data-bs-toggle="collapse" href="#contentId2" aria-expanded="false" aria-controls="contentId2">
                    Какие фильмы могут поднять настроение после тяжелого дня?
                </a>
            </p>
            <div class="collapse bg-dark shadow rounded fs-5 text-light" id="contentId2" style="text-align: justify;">
                <p class="m-2 p-3">
                    Если вы ищете фильмы, которые могут поднять вам настроение после тяжелого дня, то у нас есть множество рекомендаций!
                    Легкое и комедийное кино всегда помогает расслабиться и отвлечься от повседневных забот. Романтические комедии, фэнтези
                    или анимационные фильмы часто вызывают положительные эмоции и веселые смех. Также стоит обратить внимание на
                    классические комедийные фильмы или фильмы-комедии с известными актерами, которые гарантированно развеселят вас. Не
                    забывайте, что каждый человек имеет свои предпочтения, поэтому рекомендуем вам выбрать фильмы, которые подходят именно
                    вам и отвечают вашему чувству юмора.
                </p>
            </div>
            <p>
                <a class="btn btn-danger text-dark w-100 fw-bold fs-4" data-bs-toggle="collapse" href="#contentId3" aria-expanded="false" aria-controls="contentId3">
                    Какие фильмы лучше всего подойдут для вечеринки с друзьями?
                </a>
            </p>
            <div class="collapse bg-dark shadow rounded fs-5 text-light" id="contentId3" style="text-align: justify;">
                <p class="m-2 p-3">
                    Если вы планируете организовать вечеринку с друзьями и ищете фильмы, которые создадут непринужденную и веселую
                    атмосферу, у нас есть несколько рекомендаций!
                    <br>
                    1. Комедийные фильмы: Вы можете выбрать из обширного списка комедийных фильмов, в зависимости от вкусов ваших
                    друзей.
                    Это может быть классическая комедия, новый комедийный блокбастер или даже культовая комедия.
                    <br>
                    2. Фильмы о приключениях: Эти фильмы способны поднять настроение и создать атмосферу волнения и позитивных эмоций.
                    Вы
                    можете выбрать такие фильмы, как "Индиана Джонс", "Назад в будущее" или "Звездные войны".
                    <br>
                    3. Фильмы про спорт: Если у вас и ваших друзей есть интерес к спорту, то фильмы о спорте могут стать отличным
                    выбором.
                    Это можно быть такие фильмы, как "Рокки", "Волейболистка", "Drive".
                    <br>
                    4. Классические фильмы: Классические фильмы всегда хорошо подходят для вечеринок. Вы можете выбрать такие культовые
                    фильмы, как "Заводной апельсин", "Звуки музыки" или "Золотое кольцо".
                    <br>
                    5. Фильмы о приключениях и фэнтези: Если вы и ваши друзья любите фильмы о фантастике и магии, то фильмы вроде "Гарри
                    Поттера", "Властелина колец" или "Хоббита" могут стать идеальным выбором для вашей вечеринки.
                    <br>
                    Не забывайте, что самое главное - учесть интересы ваших друзей и выбрать фильмы, которые подходят всем. Удачи вам и
                    приятного просмотра!
                </p>
            </div>
            <p>
                <a class="btn btn-danger text-dark w-100 fw-bold fs-4" data-bs-toggle="collapse" href="#contentId4" aria-expanded="false" aria-controls="contentId4">
                    Какие новинки киношного мира вы порекомендуете?
                </a>
            </p>
            <div class="collapse bg-dark shadow rounded fs-5 text-light" id="contentId4" style="text-align: justify;">
                <p class="m-2 p-3">
                    Вот несколько из последних новинок кинематографического мира, которые мы порекомендуем вам:
                    <br>
                    1. "Охотник на демонов": Это фэнтезийный боевик, основанный на популярной японской манге. Фильм рассказывает историю
                    юного охотника на демонов, который стремится спасти свою семью и вернуть им прежнюю жизнь. Великолепная визуализация
                    и
                    энергичные боевые сцены сделали этот фильм популярным среди зрителей.
                    <br>
                    2. "Круэлла": Этот фильм является предысторией знаменитой Диснеевской злодейки Круэллы Де Виль. Он рассказывает
                    историю
                    происхождения и трансформации героини, маньякльной юной модельерши во впечатляющую и стильную фигуру мира моды.
                    Отличный
                    актерский состав и прекрасная визуализация сделали этот фильм одним из самых ожидаемых.
                    <br>
                    3. "Не время умирать": Это новый фильм о Джеймсе Бонде, седьмой в серии фильмов о агенте 007 с Дэниэлом Крэйгом в
                    главной роли. Бонд возвращается, чтобы спасти мир от новой угрозы и разоблачить тайны своего собственного прошлого.
                    Действие, энергия и стиль франшизы 007 присутствуют в полном объеме.
                    <br>
                    4. "Крючок на луну": Это приключенческая комедия о группе друзей, которые отправляются в дальнее плавание по морю,
                    чтобы
                    найти таинственный клад. Фильм наполнен юмором, смешными ситуациями и непредсказуемыми поворотами событий. Он
                    предлагает
                    легкую и веселую атмосферу для всех зрителей.
                    <br>
                    5. "Караван сердца": Это фильм о жизни и дружбе, который рассказывает историю девочки, чья сердечная операция
                    оказывается неудачной, и она находит поддержку и вдохновение от группы незнакомцев. Фильм теплый, трогательный и
                    дает
                    много пищи для размышлений.
                    <br>
                    Помните, что вкусы в фильмах могут различаться, поэтому выбирайте фильмы, которые соответствуют вашим предпочтениям
                    и
                    интересам.
                </p>
            </div>
        </div>
    </main>
    <?php require 'footer.php'; ?>
</body>