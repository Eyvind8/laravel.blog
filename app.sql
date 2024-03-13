-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Мар 12 2024 г., 18:13
-- Версия сервера: 8.0.32
-- Версия PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `app`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'agnar', 'agnar@i.ua', '$2y$10$0vvyzD1MPy1yfEDuJBUKlOuYquup6ROw4huAC4FB813waB.1bmDuW', NULL, '2024-01-20 21:06:55', '2024-01-20 21:06:55');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int NOT NULL,
  `item_id` int UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` tinyint UNSIGNED NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `item_id`, `user_id`, `text`, `active`, `created`, `updated`) VALUES
(1, 20, NULL, 'Хоть бы спасибо дала', 1, '2023-03-03 20:38:18', '2024-01-13 07:17:23'),
(2, 20, 0, 'asdasdasd', 1, '2024-01-11 15:14:10', '2024-01-13 07:17:25'),
(3, 20, 0, 'sdaslasd asd asd asd a sd', 1, '2024-01-13 18:44:32', '2024-01-13 18:44:58'),
(4, 20, 0, 'asdasdasd', 0, '2024-01-13 19:11:07', '2024-01-13 19:11:07'),
(5, 20, 0, 'фыв фывфыв фыв', 1, '2024-01-13 19:15:21', '2024-01-13 19:17:46'),
(6, 20, 0, 'фыв фывфыв фыв', 1, '2024-01-13 19:15:46', '2024-01-13 19:17:48'),
(7, 20, 0, 'фыв фывфыв фыв ы', 1, '2024-01-13 19:17:25', '2024-01-13 19:17:50'),
(8, 20, 0, 'фы фыв фы вф ыв фыв фы в', 0, '2024-01-13 19:19:56', '2024-01-13 19:19:56'),
(9, 20, 0, 'іііііі', 0, '2024-01-13 19:23:51', '2024-01-13 19:23:51'),
(10, 20, 0, 'фвфівфів 123', 1, '2024-01-13 19:29:21', '2024-01-13 19:33:06'),
(11, 20, 0, 'ssssss', 0, '2024-01-13 19:32:45', '2024-01-13 19:32:45'),
(12, 11, 0, 'wefwefwe wefwe wef', 1, '2024-01-14 07:20:26', '2024-01-14 07:20:50'),
(13, 49, 0, 'фыв', 0, '2024-02-25 08:08:17', '2024-02-25 08:08:17');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `likes` smallint UNSIGNED NOT NULL DEFAULT '0',
  `views` int UNSIGNED DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id`, `status`, `title`, `content`, `likes`, `views`, `created`, `updated`, `type`) VALUES
(1, 1, NULL, 'Хоч би дякую дала', 0, 6, '2023-03-03 20:38:00', '2024-02-13 15:34:06', NULL),
(2, 1, NULL, 'Легше дать, ніж пояснять', 0, 6, '2023-03-04 11:05:00', '2024-02-13 15:34:06', NULL),
(3, 1, NULL, 'Краше дати і радіти ніж не дати і жаліти', 0, 6, '2023-03-04 11:06:00', '2024-02-13 15:34:06', NULL),
(4, 1, NULL, 'Херзантеми', 4, 4, '2023-03-04 11:07:00', '2024-02-13 11:08:35', NULL),
(5, 1, NULL, 'Ніколи не їж огірки з холодильника самотньої жінки', 1, 32, '2023-03-11 20:14:00', '2024-03-12 18:11:10', NULL),
(6, 1, NULL, 'Вона: не так глибоко, в мене э хлопець', 0, 4, '2023-03-11 20:14:00', '2024-02-13 11:08:12', NULL),
(7, 1, NULL, 'А ви ніколи не замислювалися, чому підковдра називають підковдрою, якщо він насправді навколоковдра, а підковдра - це ти?', 0, 4, '2023-03-11 20:25:00', '2024-02-13 11:08:03', NULL),
(8, 1, NULL, 'Я знаю що порожнечу моєї душі не заповнити олів\'є, але я намагатимусь знову і знову', 0, 34, '2023-03-11 20:27:00', '2024-03-12 18:11:10', NULL),
(9, 1, NULL, 'Маша мала такі гарні губи, що через них не могла завагітніти', 0, 5, '2023-03-11 20:28:00', '2024-02-14 15:24:00', NULL),
(10, 1, NULL, 'Як хочеться колись покласти лимон не в чай, а в швейцарський банк', 1, 10, '2023-03-11 20:29:00', '2024-03-12 18:11:10', NULL),
(11, 1, NULL, 'Подаруй людині рибу - і він буде ситий весь день. \nПодаруй людині вудку - і можеш шпилити його дружину всі вихідні', 6, 46, '2023-03-11 20:32:00', '2024-03-12 18:11:10', NULL),
(12, 1, NULL, 'Настрій. Хочеться рожеве шампанське та біляш', 2, 12, '2023-03-11 20:33:00', '2024-03-12 18:11:10', NULL),
(13, 1, NULL, 'у дівчини наявність хлопця залежить від запитуючого', 3, 8, '2023-03-11 20:34:58', '2024-02-10 15:46:34', NULL),
(14, 1, NULL, 'Алкоголь створений для того, щоб негарні дівчата могли потрахатись', 0, 46, '2023-03-11 20:36:00', '2024-02-13 11:06:00', NULL),
(15, 1, NULL, 'Якщо в тебе немає мужика, то швидше за все ти дox@я вумная', 0, 44, '2023-03-11 20:38:00', '2024-02-17 19:12:59', NULL),
(16, 1, NULL, 'Біле сухе – це моє обличчя взимку', 0, 46, '2023-03-11 20:38:00', '2024-02-25 08:09:06', NULL),
(17, 1, NULL, 'Ти ж мій пончик\nБо товста?\nНі тому що солодка і з дирочкою)', 0, 56, '2023-03-26 18:31:00', '2024-03-12 18:11:10', NULL),
(18, 1, NULL, 'Як кажуть справжні чоловіки - побачимо', 0, 50, '2023-03-26 18:32:00', '2024-02-17 19:12:27', NULL),
(19, 1, NULL, 'Альфа салец', 3, 51, '2023-03-26 18:34:00', '2024-02-17 19:12:27', NULL),
(20, 1, NULL, 'Як казав Джейсон Стетхем - одна помилка і ти помилився', 0, 51, '2023-03-26 18:34:00', '2024-02-17 19:12:27', NULL),
(21, 1, NULL, 'Там де темно там приємно', 0, 52, '2023-03-26 18:35:00', '2024-02-17 19:12:27', NULL),
(22, 1, NULL, 'Арівідрочіі', 2, 54, '2023-03-26 18:35:00', '2024-02-17 19:12:27', NULL),
(23, 0, NULL, 'Усе стабільно але дебільно', 8, 56, '2023-03-26 18:35:00', '2024-02-13 11:03:27', NULL),
(33, 1, NULL, 'Навіщо самураю меч, якщо він не в крові', 0, 22, '2024-02-10 20:05:00', '2024-02-17 19:12:27', 1),
(34, 1, NULL, 'Якщо ви зустріли класну бабу яка слухає рок, читає книги та розуміє сарказм, то зараз продзвенить будильник', 1, 36, '2024-02-11 15:49:39', '2024-02-17 19:12:27', 1),
(35, 1, NULL, 'Ти все?\nніжно запитала самка богомола', 1, 26, '2024-02-11 15:55:00', '2024-02-17 19:12:27', 1),
(36, 1, NULL, 'Боксера може образити кожен, але не кожен встигне вибачитись', 0, 19, '2024-02-11 18:24:51', '2024-02-17 19:12:46', 1),
(37, 1, NULL, 'Знаєш як москалі називають наше шалене кохання - близость', 0, 38, '2024-02-11 18:26:14', '2024-03-12 18:11:06', 1),
(38, 1, NULL, 'У мене два недоліки: погана пам\'ять і ще щось...', 0, 42, '2024-02-11 18:31:13', '2024-03-12 18:11:06', 1),
(39, 1, NULL, 'Як краса може врятувати світ, якщо вона постійно потребує жертв?', 0, 44, '2024-02-11 18:37:11', '2024-03-12 18:11:06', 1),
(40, 1, NULL, '- Рабіновичу, у вас є гроші?\n- Ну якісь є... Якихось немає...', 1, 43, '2024-02-11 18:39:00', '2024-03-12 18:11:06', 1),
(41, 1, NULL, '-Ти обіцяв на мені одружитися!\n-Та мало що я на тобі обіцяв.', 1, 40, '2024-02-11 19:03:00', '2024-03-12 18:11:06', 1),
(43, 1, NULL, 'Завдавати добро і наносити користь', 0, 40, '2024-02-12 17:50:13', '2024-03-12 18:11:06', 1),
(44, 1, NULL, 'Хорошого бухгалтера знайти важко, тому Віра Павлівна вже двадцять років перебуває в розшуку', 0, 30, '2024-02-13 06:37:40', '2024-03-12 18:11:06', 1),
(45, 1, NULL, 'У мене немає ні сорому, ні совісті… Нічого зайвого', 0, 30, '2024-02-13 06:48:00', '2024-03-12 18:11:06', 1),
(46, 1, NULL, 'Скупий платить двічі... Влаштуюсь-ка я на роботу до скупого!', 0, 29, '2024-02-13 06:50:40', '2024-03-12 18:11:06', 1),
(49, 1, NULL, 'Хочеться простого людського зіпсувати комусь життя', 0, 31, '2024-02-13 10:52:45', '2024-03-12 18:11:06', 1),
(50, 0, NULL, 'Давай губи накачаємо, я втомилася розвиватися', 0, 7, '2024-02-13 11:34:00', '2024-02-14 15:04:25', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `item_tag`
--

DROP TABLE IF EXISTS `item_tag`;
CREATE TABLE `item_tag` (
  `id` int NOT NULL,
  `item_id` int DEFAULT NULL,
  `tag_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `item_tag`
--

INSERT INTO `item_tag` (`id`, `item_id`, `tag_id`) VALUES
(7, 13, 11),
(21, 34, 21),
(22, 34, 22),
(23, 34, 23),
(24, 34, 24),
(25, 34, 25),
(26, 34, 26),
(30, 36, 30),
(31, 36, 31),
(32, 36, 32),
(33, 37, 33),
(34, 37, 34),
(35, 38, 35),
(36, 38, 36),
(37, 39, 37),
(38, 39, 38),
(39, 39, 39),
(46, 43, 46),
(47, 43, 47),
(48, 43, 48),
(49, 44, 49),
(50, 46, 50),
(51, 46, 51),
(52, 49, 52),
(53, 49, 53),
(55, 45, 55),
(56, 45, 56),
(57, 41, 57),
(58, 41, 58),
(59, 23, 59),
(60, 23, 60),
(61, 22, 61),
(62, 21, 62),
(63, 21, 63),
(64, 20, 64),
(65, 20, 65),
(67, 18, 67),
(68, 19, 68),
(69, 17, 69),
(70, 17, 70),
(71, 16, 71),
(72, 16, 72),
(73, 16, 73),
(74, 15, 74),
(75, 15, 75),
(76, 14, 76),
(77, 14, 77),
(78, 14, 78),
(85, 8, 84),
(86, 8, 85),
(87, 9, 86),
(88, 9, 87),
(89, 10, 88),
(90, 10, 89),
(91, 10, 90),
(92, 11, 91),
(93, 11, 11),
(94, 11, 92),
(95, 11, 93),
(96, 11, 94),
(97, 12, 95),
(98, 12, 96),
(99, 12, 97),
(104, 5, 102),
(105, 5, 103),
(106, 5, 26),
(107, 6, 104),
(108, 6, 105),
(109, 7, 106),
(113, 1, 110),
(114, 1, 111),
(120, 4, 115),
(121, 35, 116),
(122, 35, 117),
(123, 35, 26),
(124, 33, 118),
(125, 33, 119),
(126, 33, 120),
(127, 33, 121),
(128, 33, 118),
(129, 40, 122),
(130, 40, 123),
(131, 40, 124),
(134, 3, 126),
(135, 3, 127),
(136, 3, 110),
(137, 2, 128),
(138, 2, 110),
(139, 50, 86),
(140, 50, 129);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_20_144802_create_administrators_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int NOT NULL,
  `display_title` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `display_date_created` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `display_likes` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `display_comments` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `display_share` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `display_tags` tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `display_title`, `display_date_created`, `display_likes`, `display_comments`, `display_share`, `display_tags`) VALUES
(1, 0, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tag`
--

INSERT INTO `tag` (`id`, `parent_id`, `name`, `active`, `created`, `updated`) VALUES
(2, 102, 'вареник', 1, '2023-03-03 21:04:45', '2024-02-25 08:12:35'),
(11, 0, 'дівчина', 1, '2024-01-06 18:37:15', '2024-01-14 08:50:41'),
(21, NULL, 'рок', 1, '2024-02-11 15:50:35', '2024-02-11 15:50:35'),
(22, NULL, 'книги', 1, '2024-02-11 15:50:35', '2024-02-11 15:50:35'),
(23, NULL, 'сарказм', 1, '2024-02-11 15:50:35', '2024-02-11 15:50:35'),
(24, NULL, 'будильник', 1, '2024-02-11 15:50:35', '2024-02-11 15:50:35'),
(25, NULL, 'баба', 1, '2024-02-11 15:50:35', '2024-02-11 15:50:35'),
(26, NULL, 'жінка', 1, '2024-02-11 15:50:35', '2024-02-11 15:50:35'),
(30, NULL, 'боксер', 1, '2024-02-11 18:26:14', '2024-02-11 18:53:56'),
(31, NULL, 'вибач', 1, '2024-02-11 18:26:14', '2024-02-11 18:26:14'),
(32, NULL, 'образа', 1, '2024-02-11 18:26:14', '2024-02-11 18:26:14'),
(33, NULL, 'москалі', 1, '2024-02-11 18:31:12', '2024-02-11 18:31:12'),
(34, NULL, 'кохання', 1, '2024-02-11 18:31:12', '2024-02-11 18:53:45'),
(35, NULL, 'пам\'ять', 1, '2024-02-11 18:37:11', '2024-02-11 18:37:11'),
(36, NULL, 'недоліки', 1, '2024-02-11 18:37:11', '2024-02-11 18:37:11'),
(37, NULL, 'світ', 1, '2024-02-11 18:39:06', '2024-02-11 18:39:06'),
(38, NULL, 'краса', 1, '2024-02-11 18:39:06', '2024-02-11 18:39:06'),
(39, NULL, 'жертва', 1, '2024-02-11 18:39:06', '2024-02-25 08:13:01'),
(46, NULL, 'добро', 1, '2024-02-12 17:53:36', '2024-02-12 17:53:36'),
(47, NULL, 'користь', 1, '2024-02-12 17:53:36', '2024-02-12 17:53:36'),
(48, NULL, 'гра слів', 1, '2024-02-12 17:53:36', '2024-02-12 17:53:36'),
(49, NULL, 'розшук', 1, '2024-02-13 06:37:52', '2024-02-13 06:37:52'),
(50, NULL, 'скупий', 1, '2024-02-13 06:51:56', '2024-02-13 06:51:56'),
(51, NULL, 'робота', 1, '2024-02-13 06:51:56', '2024-02-13 06:51:56'),
(52, NULL, 'життя', 1, '2024-02-13 10:55:42', '2024-02-13 10:55:42'),
(53, NULL, 'зіпсувати', 1, '2024-02-13 10:55:42', '2024-02-13 10:55:42'),
(55, NULL, 'сором', 1, '2024-02-13 11:02:16', '2024-02-13 11:02:16'),
(56, NULL, 'совість', 1, '2024-02-13 11:02:16', '2024-02-13 11:02:16'),
(57, NULL, 'весілля', 1, '2024-02-13 11:02:47', '2024-02-13 11:02:47'),
(58, NULL, 'обіцянка', 1, '2024-02-13 11:02:47', '2024-02-13 11:02:47'),
(59, NULL, 'стабільно', 1, '2024-02-13 11:03:27', '2024-02-13 11:03:27'),
(60, NULL, 'дебільно', 1, '2024-02-13 11:03:27', '2024-02-13 11:03:27'),
(61, NULL, 'допобачення', 1, '2024-02-13 11:03:28', '2024-02-13 11:03:28'),
(62, NULL, 'темно', 1, '2024-02-13 11:03:36', '2024-02-13 11:03:36'),
(63, NULL, 'приємно', 1, '2024-02-13 11:03:36', '2024-02-13 11:03:36'),
(64, NULL, 'помилка', 1, '2024-02-13 11:03:49', '2024-02-13 11:03:49'),
(65, NULL, 'стетхем', 1, '2024-02-13 11:03:50', '2024-02-13 11:03:50'),
(67, NULL, 'чоловіки', 1, '2024-02-13 11:04:11', '2024-02-13 11:04:11'),
(68, NULL, 'самец', 1, '2024-02-13 11:04:13', '2024-02-13 11:04:13'),
(69, 102, 'пончик', 1, '2024-02-13 11:04:29', '2024-02-25 08:13:17'),
(70, NULL, 'дирочка', 1, '2024-02-13 11:04:29', '2024-02-13 11:04:29'),
(71, 78, 'вино', 1, '2024-02-13 11:04:44', '2024-02-25 08:13:31'),
(72, NULL, 'зима', 1, '2024-02-13 11:04:44', '2024-02-13 11:04:44'),
(73, NULL, 'обличчя', 1, '2024-02-13 11:04:44', '2024-02-13 11:04:44'),
(74, NULL, 'мужик', 1, '2024-02-13 11:05:30', '2024-02-13 11:05:30'),
(75, NULL, 'горе від розуму', 1, '2024-02-13 11:05:30', '2024-02-13 11:05:30'),
(76, NULL, 'дівчата', 1, '2024-02-13 11:06:00', '2024-02-13 11:06:00'),
(77, NULL, 'трахатись', 1, '2024-02-13 11:06:00', '2024-02-13 11:06:00'),
(78, NULL, 'алкоголь', 1, '2024-02-13 11:06:00', '2024-02-13 11:06:00'),
(84, 102, 'олівье', 1, '2024-02-13 11:07:20', '2024-02-25 08:13:37'),
(85, NULL, 'душа', 1, '2024-02-13 11:07:20', '2024-02-13 11:07:20'),
(86, NULL, 'губи', 1, '2024-02-13 11:07:22', '2024-02-13 11:07:22'),
(87, NULL, 'вагітність', 1, '2024-02-13 11:07:22', '2024-02-13 11:07:22'),
(88, 102, 'лимон', 1, '2024-02-13 11:07:23', '2024-02-25 08:13:45'),
(89, NULL, 'чай', 1, '2024-02-13 11:07:23', '2024-02-13 11:07:23'),
(90, NULL, 'банк', 1, '2024-02-13 11:07:23', '2024-02-13 11:07:23'),
(91, NULL, 'вудочка', 1, '2024-02-13 11:07:25', '2024-02-13 11:07:25'),
(92, NULL, 'дружина', 1, '2024-02-13 11:07:25', '2024-02-13 11:07:25'),
(93, NULL, 'подарунок', 1, '2024-02-13 11:07:25', '2024-02-13 11:07:25'),
(94, 102, 'риба', 1, '2024-02-13 11:07:25', '2024-02-25 08:13:53'),
(95, 102, 'біляш', 1, '2024-02-13 11:07:27', '2024-02-25 08:13:58'),
(96, NULL, 'настрій', 1, '2024-02-13 11:07:27', '2024-02-13 11:07:27'),
(97, NULL, 'шампанське', 1, '2024-02-13 11:07:27', '2024-02-13 11:07:27'),
(102, NULL, 'їдло', 1, '2024-02-13 11:08:36', '2024-02-13 11:08:36'),
(103, 102, 'огірки', 1, '2024-02-13 11:08:36', '2024-02-25 08:14:12'),
(104, NULL, 'хлопець', 1, '2024-02-13 11:08:37', '2024-02-13 11:08:37'),
(105, NULL, 'глибоко', 1, '2024-02-13 11:08:37', '2024-02-13 11:08:37'),
(106, NULL, 'підковдра', 1, '2024-02-13 11:08:44', '2024-02-13 11:08:44'),
(110, NULL, 'дала', 1, '2024-02-13 11:09:24', '2024-02-13 11:09:24'),
(111, NULL, 'дякую', 1, '2024-02-13 11:09:24', '2024-02-13 11:09:24'),
(115, NULL, 'хрезантеми', 1, '2024-02-13 11:09:29', '2024-02-13 11:09:29'),
(116, NULL, 'богомол', 1, '2024-02-13 11:10:27', '2024-02-13 11:10:27'),
(117, NULL, 'самка', 1, '2024-02-13 11:10:27', '2024-02-13 11:10:27'),
(118, NULL, 'кров', 1, '2024-02-13 11:11:53', '2024-02-13 11:11:53'),
(119, NULL, 'місячні', 1, '2024-02-13 11:11:53', '2024-02-13 11:11:53'),
(120, NULL, 'меч', 1, '2024-02-13 11:11:53', '2024-02-13 11:11:53'),
(121, NULL, 'самурай', 1, '2024-02-13 11:11:53', '2024-02-13 11:11:53'),
(122, NULL, 'гроші', 1, '2024-02-13 11:12:36', '2024-02-13 11:12:36'),
(123, NULL, 'рабінович', 1, '2024-02-13 11:12:36', '2024-02-13 11:12:36'),
(124, NULL, 'евреї', 1, '2024-02-13 11:12:36', '2024-02-13 11:12:36'),
(126, NULL, 'жаліти', 1, '2024-02-13 15:33:45', '2024-02-13 15:33:45'),
(127, NULL, 'радіти', 1, '2024-02-13 15:33:45', '2024-02-13 15:33:45'),
(128, NULL, 'пояснять', 1, '2024-02-13 15:33:49', '2024-02-13 15:33:49'),
(129, NULL, 'саморозвиток', 1, '2024-02-14 14:04:41', '2024-02-14 14:04:41');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sort` int UNSIGNED NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`, `sort`, `created`, `updated`) VALUES
(1, 'Короткі', 0, '2023-03-03 20:38:18', '2023-03-03 21:03:28'),
(2, 'Історії', 0, '2023-03-03 21:04:45', '2023-03-03 21:04:45'),
(3, 'Цитати', 0, '2023-03-03 21:05:20', '2023-03-03 21:05:20'),
(4, 'Анекдоти', 0, '2023-03-03 21:05:28', '2023-03-03 21:05:28');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`) USING BTREE,
  ADD KEY `status` (`status`),
  ADD KEY `created` (`created`);
ALTER TABLE `item` ADD FULLTEXT KEY `idx_content` (`content`);

--
-- Индексы таблицы `item_tag`
--
ALTER TABLE `item_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `item`
--
ALTER TABLE `item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `item_tag`
--
ALTER TABLE `item_tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
