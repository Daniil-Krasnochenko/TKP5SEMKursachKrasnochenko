-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 11 2023 г., 11:40
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cinema_feel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `cart_product_id` int(11) NOT NULL,
  `cart_weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_user_id`, `cart_product_id`, `cart_weight`) VALUES
(24, 2, 2, 1),
(25, 2, 3, 1),
(26, 2, 5, 0.75),
(32, 3, 5, 0),
(33, 3, 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_release` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_release`, `product_description`, `product_date`) VALUES
(1, 'Звёздные войны: Эпизод 3 – Месть ситхов', 2005, 'Эпическая космическая опера, снятая режиссёром и сценаристом Джорджем Лукасом, его шестой полнометражный фильм.', '2023-11-27 00:00:00'),
(2, 'V — значит вендетта', 2006, 'Англо-германо-американский фильм в жанре антиутопии, экранизация одноимённого графического романа Алана Мура, осуществлённая Дж. Мактигом по сценарию братьев Вачовски, которые также выступили продюсерами.', '2023-11-27 02:36:19'),
(3, 'Лицо со шрамом', 1983, 'Вместе со своими политическими противниками Фидель Кастро изгнал с Кубы преступников и наркоманов, которые прибыли в США. В центре сюжета — амбициозный уголовник Тони Монтана, осевший в Майами и позже сделавший карьеру торговлей наркотиками.', '2023-11-27 02:38:47'),
(4, 'Декстер', 2006, 'Американский телесериал канала Showtime, основанный на романе Джеффри Линдсея «Дремлющий демон Декстера». События сериала рассказывают о Декстере Моргане, вымышленном серийном убийце, работающем судебным экспертом в полиции Майами.', '2023-11-27 02:39:48'),
(5, 'Дэдпул', 2016, 'Американский комедийный супергеройский фильм с Райаном Рейнольдсом в главной роли, снятый режиссёром Тимом Миллером на основе комиксов издательства Marvel Comics о персонаже Дэдпуле. Восьмой фильм киносерии «Люди Икс».', '2023-11-27 02:41:36');

-- --------------------------------------------------------

--
-- Структура таблицы `producttag`
--

CREATE TABLE `producttag` (
  `producttag_id` int(11) NOT NULL,
  `producttag_product_id` int(11) NOT NULL,
  `producttag_tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `producttag`
--

INSERT INTO `producttag` (`producttag_id`, `producttag_product_id`, `producttag_tag_id`) VALUES
(13, 1, 5),
(14, 1, 1),
(15, 1, 3),
(16, 5, 1),
(17, 5, 2),
(18, 4, 4),
(19, 2, 1),
(20, 2, 3),
(21, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating_user_id` int(11) NOT NULL,
  `rating_product_id` int(11) NOT NULL,
  `rating_value` float NOT NULL,
  `rating_comment` text NOT NULL,
  `rating_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`rating_id`, `rating_user_id`, `rating_product_id`, `rating_value`, `rating_comment`, `rating_date`) VALUES
(1, 2, 5, 5, 'Прекрасный американский комедийный фантастический боевик с Райаном Рейнольдсом в главной роли.\r\nУэйд Уилсон — бывший солдат спецназа, подрабатывающий наёмником в Нью-Йорке. В местном баре своего друга Хорька Уэйд встречает проститутку Ванессу Карлайл, с которой у него впоследствии завязываются романтические отношения. Спустя год Уэйд делает Ванессе предложение, и она соглашается. Внезапно Уэйд падает в обморок и на следующий день ему диагностируют рак в последней стадии. Ванесса просит Уэйда остаться с ней, но Уэйд не хочет, чтобы она видела его смерть.', '2023-12-11 02:59:18'),
(2, 3, 5, 3, 'Пошлости, Сортирный Юмор, Расчлененка.', '2023-12-11 02:59:52'),
(3, 3, 4, 4, 'Редкий детективный сериал героем которого является не полицейский, а серийный убица, частично основан на романе Джеффри Линдсея «Дремлющий демон Декстера» 2004 года по мотива романа 1927 года \"Случай Чарльза Декстера Варда\" Говарда Лавкрафта и таких известных в США историях, как \"Тела в бочках\" найденные в 1985 году в Алеснстауне, для 5-ого сезона по мотивам преступлений Терри Расмусена, чья настоящая личность была установлена только в 2017 году уже после его смерти, он получил широкую известность, не только благодаря использованию множества личностей, но и различным способам убийства, включавших удары тупым предметом, расчленение, утопление и удушение, возможны и другие варианты ★', '2023-12-11 03:41:55'),
(4, 3, 3, 5, 'Аль Пачино, сюжет, криминальный быт Америки 80-х, виды солнечного Майами, мораль, о которой говорится в картине', '2023-12-11 03:42:39'),
(5, 3, 2, 3, 'Смысла мало, нестыковки, пафос.', '2023-12-11 03:43:02'),
(6, 3, 1, 4, '«Звёздные войны: Эпизод 3 Месть Ситхов» (Star Wars: Episode III - Revenge of the Sith) — самый драматичный эпизод, а также самый зрелищный и динамично-экшеновый из первых трёх. Он снова сделан «для всей семьи», но самую капельку стал темнее или жёстче.', '2023-12-11 03:43:39'),
(7, 2, 1, 5, 'Я буквально несколько лет назад впервые посмотрела полностью всю сагу о Звездных войнах режиссера Джорджа Лукаса. Снимал он эти 6 фильмов на протяжении почти 20 лет! Что примечательно, снимал не по порядку. Первым фильмом, например, был 4 эпизод: \"Звездные войны: новая надежда\" и вышел он еще в 1977 году! И далее эпизоды выходили не по хронологической последовательности. Дело в том, что Джордж Лукас оставил самые зрелищные эпизоды, требующие мощных спецэффектов, напоследок. Одним из таких эпизодов, саым ярким фильмов эпопеи и стали \"Звездные войны: месть ситхов\".', '2023-12-11 03:44:47'),
(8, 2, 2, 4, 'сюжет до конца непонятен', '2023-12-11 03:45:18');

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`) VALUES
(1, 'Боевик'),
(2, 'Комедия'),
(3, 'Фантастика'),
(4, 'Детектив'),
(5, 'Приключения');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `user_name`, `user_phone`) VALUES
(2, 'hleb@mail.ru', 'hlebov123', 'Хлебов Артур Венедиктович', 89999999999),
(3, 'vladovich@mail.ru', 'vladV123', 'Васильев Антон Владленович', 87777777777);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_product_id` (`cart_product_id`),
  ADD KEY `cart_user_id` (`cart_user_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `producttag`
--
ALTER TABLE `producttag`
  ADD PRIMARY KEY (`producttag_id`),
  ADD KEY `producttag_product_id` (`producttag_product_id`),
  ADD KEY `producttag_tag_id` (`producttag_tag_id`);

--
-- Индексы таблицы `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `rating_product_id` (`rating_product_id`),
  ADD KEY `rating_user_id` (`rating_user_id`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `producttag`
--
ALTER TABLE `producttag`
  MODIFY `producttag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cart_product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cart_user_id`) REFERENCES `user` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `producttag`
--
ALTER TABLE `producttag`
  ADD CONSTRAINT `producttag_ibfk_1` FOREIGN KEY (`producttag_product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `producttag_ibfk_2` FOREIGN KEY (`producttag_tag_id`) REFERENCES `tag` (`tag_id`);

--
-- Ограничения внешнего ключа таблицы `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`rating_product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`rating_user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
