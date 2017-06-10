-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 10 2017 г., 16:23
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mikrotik`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actionlist`
--

CREATE TABLE `actionlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(500) NOT NULL,
  `parameters` varchar(500) NOT NULL,
  `route` varchar(500) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actionlist`
--

INSERT INTO `actionlist` (`id`, `user_id`, `action`, `parameters`, `route`, `date`) VALUES
(23, 1, 'Добавление', '8', 'admin/pays/create', '2017-06-06 16:41:55'),
(24, 1, 'Обновление', '8', 'admin/pays/update', '2017-06-06 16:42:25'),
(25, 1, 'Удаление', '8', 'admin/pays/delete', '2017-06-06 16:42:35'),
(26, 1, 'Добавление', '13', 'admin/request/create', '2017-06-06 16:43:53'),
(27, 1, 'Обновление', '13', 'admin/request/update', '2017-06-06 16:43:59'),
(28, 1, 'Удаление', '13', 'admin/request/delete', '2017-06-06 16:44:08'),
(29, 1, 'Добавление', '13', 'admin/requesttarif/create', '2017-06-06 16:51:38'),
(30, 1, 'Обновление', '13', 'admin/requesttarif/update', '2017-06-06 16:51:47'),
(31, 1, 'Добавление', '11', 'admin/stations/create', '2017-06-06 16:54:42'),
(32, 1, 'Обновление', '11', 'admin/stations/update', '2017-06-06 16:54:49'),
(33, 1, 'Elfktybt', '11', 'admin/stations/delete', '2017-06-06 16:54:56'),
(34, 1, 'Добавление', '10', 'admin/tariffs/create', '2017-06-06 16:59:07'),
(35, 1, 'Обновление', '10', 'admin/tariffs/update', '2017-06-06 16:59:14'),
(36, 1, 'Удаление', '10', 'admin/tariffs/delete', '2017-06-06 16:59:23'),
(37, 1, 'Добавление', '15', 'admin/pays/create', '2017-06-06 20:45:28'),
(38, 1, 'Добавление', '16', 'admin/pays/create', '2017-06-06 20:45:51');

-- --------------------------------------------------------

--
-- Структура таблицы `blacklist`
--

CREATE TABLE `blacklist` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blacklist`
--

INSERT INTO `blacklist` (`id`, `url`, `reason`, `employee_id`) VALUES
(1, 'https://mail.ru', 'надоел', 2),
(2, 'https://vk.com/feed', 'тоже надоел', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `changedevices`
--

CREATE TABLE `changedevices` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `olddevice_id` int(11) NOT NULL,
  `newdevice_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `changedevices`
--

INSERT INTO `changedevices` (`id`, `user_id`, `olddevice_id`, `newdevice_id`, `date`) VALUES
(8, 133, 101, 101, '2017-06-08');

-- --------------------------------------------------------

--
-- Структура таблицы `connection`
--

CREATE TABLE `connection` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameconnection` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `connection`
--

INSERT INTO `connection` (`id`, `nameconnection`) VALUES
(1, 'pppoe'),
(2, 'async'),
(3, 'l2tp'),
(4, 'ovpn'),
(5, 'pptp'),
(6, 'sstp');

-- --------------------------------------------------------

--
-- Структура таблицы `devices`
--

CREATE TABLE `devices` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `station_id` int(11) NOT NULL,
  `serialnumber` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `regnumber` varchar(255) NOT NULL,
  `devicesstatus` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `devices`
--

INSERT INTO `devices` (`id`, `name`, `station_id`, `serialnumber`, `serial`, `regnumber`, `devicesstatus`) VALUES
(1, 'фывйй', 1, '132132131', 'фывфвфыв', '321', 1),
(2, 'asdad', 2, 'sdad', 'asdad', 'asddad', 1),
(3, '123', 1, '123', '123', '123', 1),
(4, 'daasdadasd', 1, 'adasdasd', 'adasdsadas', 'dasdasdad', 1),
(5, 'asadasdad', 1, 'asdsadsad', 'asdasdsadsad', 'asdasdad', 1),
(6, 'asdasdsadsa', 1, 'dasdasdsads', 'dsadasdsadad', 'adadasdad', 1),
(7, 'asadasdasd', 1, 'asdadasd', 'asdasdsada', 'asdadsd', 1),
(8, 'asdadasdsad', 1, 'asdasdsadas', 'adasdsadasd', 'adsadd', 1),
(9, 'asdadsdsad', 1, 'dsadasdasdas', 'asdsdsdsdsd', 'adasda', 1),
(10, 'asdsadadadda', 1, 'addadadadadada', 'adsdaczc', 'zczccxc', 1),
(11, 'AirGrid M5', 1, 'ccwn87958cnp', '5567', '347cn8273c834c', 1),
(12, 'AirGrid M5', 2, 'cl9w384clwio3v', '7458', 'vb394857c349c5', 1),
(13, 'AirGrid M5', 1, 'c837cbw9837', '3874', 'cni8475ow3984', 1),
(14, 'AirGrid M5', 1, 'dkm09839732', '2345', '905849583m', 1),
(15, 'AirGrid M5', 4, 'a84c57a87dfj', '2344', '2387428cb938', 1),
(16, 'AirGrid M5', 4, 'dv456sdb456g', '34577', '4v5f34f5w4b4n', 1),
(17, 'AirGrid M5', 7, 'bhe456456vw456', '4563', 'sr5nd457m567', 1),
(18, 'AirGrid M5', 5, '456wb456b456', '3456', 'vw345bs456nsr5m76', 1),
(19, 'AirGrid M5', 6, 'sm349058vn49', '2349', '5g45cwebgy', 1),
(20, 'AirGrid M5', 4, 'w3v4werbfm6', '9786', '2345wb456nrt', 1),
(21, 'AirGrid M5', 8, 'w3cwvdrtn6u', '34578', 'dtxr56bs4b64', 1),
(22, 'AirGrid M5', 7, 'xe4o587snei', '1232', 'sv3no57v9', 1),
(23, 'AirGrid M5', 1, '01001', '1234', 'co38947qc938475', 1),
(24, 'AirGrid M5', 6, '01002', '9870', 'v3845v3op4c', 1),
(25, 'AirGrid M5', 9, '01003', '9872', 'cn3i587v398457', 1),
(26, 'AirGrid M5', 4, '01004', '34579', '2389749238dfetr', 1),
(27, 'AirGrid M5', 7, '01005', '9023', '394857vn3049', 1),
(28, 'AirGrid M5', 5, '01006', '2346', 'ine487bv58owe', 1),
(29, 'AirGrid M5', 7, '01007', '923857', 'af48b57v357', 1),
(30, 'AirGrid M5', 5, '01008', '3456', '498wf5h7o', 1),
(31, 'AirGrid M5', 7, '01009', '034987', 'as89457bvo9', 1),
(32, 'AirGrid M5', 7, '01010', '3571', 'alc475lnai84', 1),
(33, 'AirGrid M5', 8, '01011', '3687', 'skl34857l849', 1),
(34, 'AirGrid M5', 8, '01012', '58738', 'sk35f8457ef', 1),
(35, 'AirGrid M5', 10, '01013', '4536', 'k3bi5w', 1),
(36, 'AirGrid M5', 7, '01014', '304579', '56iq347uert', 1),
(37, 'AirGrid M5', 9, '01015', '349857', 'as57cba357', 1),
(38, 'AirGrid M5', 8, '01016', '394857', 'evni578wvl5', 1),
(39, 'AirGrid M5', 9, '01017', '456908', 'wei48t7askb5', 1),
(40, 'AirGrid M5', 1, '01018', '283746', 'w98934875c', 1),
(41, 'AirGrid M5', 8, '01019', '92387', 'c478b5348', 1),
(42, 'AirGrid M5', 7, '01020', '92834', 'acbw37al378', 1),
(43, 'AirGrid M5', 8, '01021', '2398457', 'caq3487c', 1),
(44, 'AirGrid M5', 7, '01022', '394857', 'kcerui5bv478', 1),
(45, 'AirGrid M5', 9, '01023', '45645', 'i5blc5784jt', 1),
(46, 'AirGrid M5', 4, '01024', '39485', 'aon34857ow3f857', 1),
(47, 'AirGrid M5', 4, '01025', '28937', 'akcnw5748', 1),
(48, 'AirGrid M5', 4, '01026', '3478956', 'e4857b957', 1),
(49, 'AirGrid M5', 3, '01027', '2346', 'wck347584', 1),
(50, 'AirGrid M5', 2, '01028', '234786', 'naci3475c834', 1),
(51, 'AirGrid M5', 2, '01029', '245', 'ef5783845u7', 1),
(52, 'AirGrid M5', 5, '01030', '587538', 'w34756ki48', 1),
(53, 'AirGrid M5', 7, '01031', '230948', 'w34857bl348', 1),
(54, 'AirGrid M5', 10, '01032', '2938', '376rtuw4957', 1),
(55, 'AirGrid M5', 9, '01033', '293856238', 'wei4587w394857', 1),
(56, 'AirGrid M5', 8, '01034', '485739', '83cq3489u554i', 1),
(57, 'AirGrid M5', 7, '01035', '389475', 'awic5b4785', 1),
(58, 'AirGrid M5', 3, '01036', '923846', 'nx93847b59384', 1),
(59, 'AirGrid M5', 8, '01037', '289347', 'cw983457v', 1),
(60, 'AirGrid M5', 5, '01038', '23947856', 'bvqi57dfgh', 1),
(61, 'AirGrid M5', 6, '01039', '9357', 'ncq923857bv834', 1),
(62, 'AirGrid M5', 5, '01040', '2983456', 'nawi57drt4', 1),
(63, 'AirGrid M5', 2, '01041', '394857', 'cne435689', 1),
(64, 'AirGrid M5', 5, '01042', '384756', 'akwue45y7q3894', 1),
(65, 'AirGrid M5', 6, '01043', '2345632456', 'v45toxn83457', 1),
(66, 'AirGrid M5', 7, '01044', '38749', 'weruse8r7', 1),
(67, 'AirGrid M5', 3, '01045', '23045789', 'ase578b8w3o4', 1),
(68, 'AirGrid M5', 5, '01046', '2390874', 'c348957b93845', 1),
(69, 'AirGrid M5', 6, '01047', '293487', 'scnl34857vl', 1),
(70, 'AirGrid M5', 7, '01048', '28957', 'w3ib57w45', 1),
(71, 'AirGrid M5', 9, '01049', '2938', 'wp3948579p34', 1),
(72, 'AirGrid M5', 1, '01050', '92385', 'l3489b57ceo', 1),
(73, 'AirGrid M5', 3, '01051', '348957', '93857cn3489c7m', 1),
(74, 'AirGrid M5', 2, '01052', '298347', 'cwn34897bv54', 1),
(75, 'AirGrid M5', 1, '01053', '34857', '384b5yqcn8', 1),
(76, 'AirGrid M5', 1, '01054', '2983465', 'acn3489b57avo', 1),
(77, 'AirGrid M5', 1, '01055', '9283457', 'cnq3b57vq3le', 1),
(78, 'AirGrid M5', 1, '01056', '2903856', 'awl48ob574', 1),
(79, 'AirGrid M5', 1, '01057', 'w938457', 'al3489cb574', 1),
(80, 'AirGrid M5', 4, '01058', '2394857', 'seo857f49', 1),
(81, 'AirGrid M5', 1, '01059', '239857', 'acnw48957', 1),
(82, 'AirGrid M5', 1, '01060', '394857', 'wnl934876v', 1),
(83, 'AirGrid M5', 1, '01061', '023597', 'asnle48957', 1),
(84, 'AirGrid M5', 1, '01062', '34857', 'eiotvun4564b', 1),
(85, 'AirGrid M5', 1, '01063', '2359789', 'wn93847v5n0', 1),
(86, 'AirGrid M5', 1, '01064', '34905703', 'c3n47895v394', 1),
(87, 'AirGrid M5', 1, '01065', '923845', 'oc34750v94', 1),
(88, 'AirGrid M5', 1, '01066', '3945789', 'vwn389457b49', 1),
(89, 'AirGrid M5', 1, '01067', '3948570', 'wcnl489vb', 1),
(90, 'AirGrid M5', 2, '01068', '2394857', 'cqn3l489bv57', 1),
(91, 'AirGrid M5', 2, '01069', '32456892', 'eo4i8g5v4', 1),
(92, 'AirGrid M5', 2, '01070', '349582', 'fw390489', 1),
(93, 'AirGrid M5', 5, '01071', '3948', 'cn34897bvg53', 1),
(94, 'AirGrid M5', 3, '01072', '29385', 'c3894bvg579348', 1),
(95, 'AirGrid M5', 3, '01073', '92385734', 'q394857bv3094', 1),
(96, 'AirGrid M5', 4, '01074', '2983570', 'wo4v583n049', 1),
(97, 'AirGrid M5', 5, '01075', '2398452893', '3nc847bv5o348', 1),
(98, 'AirGrid M5', 5, '01076', '928375', '3cnoe48bv5o4', 1),
(99, 'AirGrid M5', 6, '01077', '234599', 'c3i485vh', 1),
(100, 'AirGrid M5', 7, '01078', '3984', 'eno8476vo94', 1),
(101, 'AirGrid M5', 9, '01079', '3984570', 'iwev3b948', 0),
(102, 'AirGrid M5', 6, '01080', '658768', 'o7896o8uhu', 0),
(103, 'AirGrid M5', 5, '01081', '3948573049', 'cn34895nveo4', 1),
(104, 'AirGrid M5', 7, '01082', '453874', 'nwe94857c48', 1),
(105, 'admin', 1, 'admin', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(1, 'News/News1/14b497.jpg', 1, 1, 'News', '9dd845752c-1', ''),
(2, 'News/News2/a0159e.jpg', 2, 1, 'News', '9a38161684-1', ''),
(3, 'News/News3/ea382d.jpg', 3, 0, 'News', '951d1b55b1-2', ''),
(4, 'News/News4/8410ea.jpg', 4, 1, 'News', 'f9579a4cc7-1', ''),
(5, 'News/News5/33d04a.jpg', 5, 1, 'News', '0bb525a18b-1', ''),
(6, 'News/News3/d62df7.jpg', 3, 1, 'News', 'dcd0d5210b-1', '');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1495772743),
('m140622_111540_create_image_table', 1495903321),
('m140622_111545_add_name_to_image_table', 1495903321),
('m170526_041557_create_user_table', 1495772746);

-- --------------------------------------------------------

--
-- Структура таблицы `mikrotiks`
--

CREATE TABLE `mikrotiks` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(255) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `basestation_id` int(10) UNSIGNED NOT NULL,
  `mikrotik_model` varchar(255) NOT NULL,
  `version_os` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mikrotiks`
--

INSERT INTO `mikrotiks` (`id`, `city`, `ip`, `login`, `password`, `basestation_id`, `mikrotik_model`, `version_os`) VALUES
(1, 'Павловск', '172.045.036.012', 'pavl_1Qwe2W', 'qweqweqwe', 4, 'rg450', 'RouterOs 6.37.5'),
(2, 'Павловск', '123.124.124.157', 'asjdlajl;lk', 'sdsldfkjsf;dkjf', 1, 'rg450', 'RouterOs 6.2 openwrt'),
(3, 'выв', '132.132.132.131', 'выв', 'вы32в1в', 0, 'в3ы21в32', 'в32132в3');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `employee_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `content`, `date`, `employee_id`) VALUES
(3, 'Роскомнадзор навсегда заблокировал еще пять \"пиратских\" интернет-ресурсов', 'МОСКВА, 30 мая — РИА Новости. Роскомнадзор навсегда заблокировал еще пять \"пиратских\" интернет-ресурсов по решению Мосгорсуда после заявления ООО \"Централ Партнершип Сейлз Хаус\", сообщил Роскомнадзор во вторник.', '<p><strong>МОСКВА, 30 мая&nbsp;&mdash; РИА Новости.</strong>&nbsp;Роскомнадзор навсегда заблокировал еще пять &quot;пиратских&quot; интернет-ресурсов по&nbsp;решению Мосгорсуда после заявления ООО &quot;Централ Партнершип Сейлз Хаус&quot;, сообщил Роскомнадзор во&nbsp;вторник.</p>\r\n\r\n<div class=\"b-inject b-inject__type-article\" id=\"inject_1493083552\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; vertical-align: baseline; position: relative; clear: both;\">\r\n<div class=\"b-inject__article m-right-align\" style=\"max-height: 1e+06px; margin: 0px 0px 1em 1em; padding: 0.5em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; width: 304px; max-width: 19em; position: relative; background: rgb(244, 244, 244); float: right;\">\r\n<div class=\"b-inject__article-photo\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; position: relative; background: rgb(40, 40, 40); overflow: hidden; float: none; width: auto;\"><a href=\"https://ria.ru/society/20170425/1493083552.html\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; cursor: pointer; color: rgb(98, 167, 217);\" target=\"_blank\"><img alt=\"На радиорынке. Архивное фото\" src=\"https://cdn4.img.ria.ru/images/149099/25/1490992549.jpg\" style=\"border:0px; display:block; font-family:inherit; font-stretch:inherit; font-style:inherit; font-variant:inherit; font-weight:inherit; line-height:inherit; margin:0px; max-height:1e+06px; opacity:1; padding:0px; position:relative; vertical-align:middle; width:304px\" title=\"На радиорынке. Архивное фото\" /></a></div>\r\n\r\n<div class=\"b-inject__article-desc\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px 0.5em 0.5em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; overflow: visible;\">\r\n<div class=\"b-media-copyright \" style=\"max-height: 1e+06px; margin: 0px -1em; padding: 0.5em 0px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: 1.1; font-family: inherit; vertical-align: baseline; color: rgb(124, 124, 124); display: flex; justify-content: space-between; flex-wrap: wrap;\">\r\n<div class=\"b-media-copyright__copy\" style=\"max-height: 1e+06px; margin: 0px 1em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; display: inline-block;\"><span style=\"font-family:inherit; font-size:0.687em\"><a href=\"http://www.rian.ru/docs/about/copyright.html\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 10.992px; vertical-align: baseline; text-decoration-line: none; cursor: pointer; color: rgb(124, 124, 124);\">&copy; РИА Новости / Павел Горшков</a></span></div>\r\n\r\n<div class=\"b-media-copyright__buy\" style=\"max-height: 1e+06px; margin: 0px 1em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; display: inline-block;\"><span style=\"font-family:inherit; font-size:0.687em\"><a href=\"http://visualrian.ru/images/item/542839\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 10.992px; vertical-align: baseline; text-decoration-line: none; cursor: pointer; color: rgb(124, 124, 124);\" target=\"_blank\">Перейти в фотобанк</a></span></div>\r\n</div>\r\n\r\n<div class=\"b-inject__article-title\" style=\"max-height: 1e+06px; margin: 0px; padding: 0.5em 0px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: 1.35; font-family: inherit; vertical-align: baseline;\"><a href=\"https://ria.ru/society/20170425/1493083552.html\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 1em; vertical-align: baseline; cursor: pointer; color: rgb(98, 167, 217);\" target=\"_blank\">Эксперт прокомментировал идею о штрафах за пользование пиратскими сайтами</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;В Роскомнадзор поступили решения Мосгорсуда о&nbsp;постоянной блокировке еще пяти информационных ресурсов, распространяющих мультимедийный контент с&nbsp;нарушением авторских и (или) смежных прав. Решения приняты на&nbsp;основании заявления правообладателя ООО &quot;Централ Партнершип Сейлз Хаус&quot;,&nbsp;&mdash; отмечается в&nbsp;сообщении.</p>\r\n\r\n<p>На прошлой неделе Роскомнадзор сообщал о&nbsp;постоянной блокировке семи &quot;пиратских&quot; ресурсов по&nbsp;решению Мосгорсуда после заявления ТНТ.</p>\r\n\r\n<p>Согласно приводимой в&nbsp;нем статистике, в&nbsp;первом квартале 2017 года в&nbsp;Роскомнадзор поступили 39 решений Мосгорсуда о&nbsp;постоянной блокировке в&nbsp;отношении 77 сайтов. При этом ведомство отмечало, что около&nbsp;95% интернет-ресурсов самостоятельно ограничивают доступ к&nbsp;информации, которая нарушает авторские и (или) смежные права, не&nbsp;дожидаясь блокировки.</p>\r\n', '2017-05-31 13:00:09', 0),
(4, 'В Интернет-ассоциации Украины раскритиковали решение запретить \"ВКонтакте\"', 'КИЕВ, 31 мая — РИА Новости. Глава комитета по вопросам защиты права человека и свободы слова Интернет-ассоциации Украины Максим Тульев назвал провальным решение властей закрыть доступ к российской соцсети \"ВКонтакте\", так как менее 10% украинской аудитори', '<p><strong>КИЕВ, 31 мая&nbsp;&mdash; РИА Новости.</strong>&nbsp;Глава комитета по&nbsp;вопросам защиты права человека и&nbsp;свободы слова Интернет-ассоциации Украины Максим Тульев назвал провальным решение властей закрыть доступ к&nbsp;российской соцсети &quot;ВКонтакте&quot;, так как&nbsp;менее 10% украинской аудитории перестали пользоваться этой сетью.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"b-inject b-inject__type-article\" id=\"inject_1494793404\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; vertical-align: baseline; position: relative; clear: both;\">\r\n<div class=\"b-inject__article m-right-align\" style=\"max-height: 1e+06px; margin: 0px 0px 1em 1em; padding: 0.5em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; width: 304px; max-width: 19em; position: relative; background: rgb(244, 244, 244); float: right;\">\r\n<div class=\"b-inject__article-photo\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; position: relative; background: rgb(40, 40, 40); overflow: hidden; float: none; width: auto;\"><a href=\"https://ria.ru/world/20170522/1494793404.html\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; cursor: pointer; color: rgb(98, 167, 217);\" target=\"_blank\"><img alt=\"Страница социальной сети Вконтакте на экране смартфона. Архивное фото\" src=\"https://cdn3.img.ria.ru/images/149448/08/1494480858.jpg\" style=\"border:0px; display:block; font-family:inherit; font-stretch:inherit; font-style:inherit; font-variant:inherit; font-weight:inherit; line-height:inherit; margin:0px; max-height:1e+06px; opacity:1; padding:0px; position:relative; vertical-align:middle; width:304px\" title=\"Страница социальной сети Вконтакте на экране смартфона. Архивное фото\" /></a></div>\r\n\r\n<div class=\"b-inject__article-desc\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px 0.5em 0.5em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; overflow: visible;\">\r\n<div class=\"b-media-copyright \" style=\"max-height: 1e+06px; margin: 0px -1em; padding: 0.5em 0px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: 1.1; font-family: inherit; vertical-align: baseline; color: rgb(124, 124, 124); display: flex; justify-content: space-between; flex-wrap: wrap;\">\r\n<div class=\"b-media-copyright__copy\" style=\"max-height: 1e+06px; margin: 0px 1em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; display: inline-block;\"><span style=\"font-family:inherit; font-size:0.687em\"><a href=\"http://www.rian.ru/docs/about/copyright.html\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 10.992px; vertical-align: baseline; text-decoration-line: none; cursor: pointer; color: rgb(124, 124, 124);\">&copy; РИА Новости / Наталья Селиверстова</a></span></div>\r\n\r\n<div class=\"b-media-copyright__buy\" style=\"max-height: 1e+06px; margin: 0px 1em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; display: inline-block;\"><span style=\"font-family:inherit; font-size:0.687em\"><a href=\"http://visualrian.ru/images/item/3032938\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 10.992px; vertical-align: baseline; text-decoration-line: none; cursor: pointer; color: rgb(124, 124, 124);\" target=\"_blank\">Перейти в фотобанк</a></span></div>\r\n</div>\r\n\r\n<div class=\"b-inject__article-title\" style=\"max-height: 1e+06px; margin: 0px; padding: 0.5em 0px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 600; font-stretch: inherit; line-height: 1.35; font-family: inherit; vertical-align: baseline;\"><a href=\"https://ria.ru/world/20170522/1494793404.html\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 1em; vertical-align: baseline; cursor: pointer; color: rgb(98, 167, 217);\" target=\"_blank\">СМИ уличили украинских депутатов в использовании российских соцсетей</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p><span style=\"font-family:open sans,arial,sans-serif; font-size:16px\">Ранее президент Украины Петр Порошенко утвердил решение СНБО о&nbsp;продлении и&nbsp;расширении списка физических и&nbsp;юридических лиц РФ, в&nbsp;отношении которых введены санкции. В частности на&nbsp;Украине запрещается доступ к&nbsp;соцсетям &quot;ВКонтакте&quot;, &quot;Одноклассники&quot; и&nbsp;ресурсам &quot;Яндекса&quot; и&nbsp;Mail.ru. Указ вступил в&nbsp;силу 17 мая. Специалисты не&nbsp;раз заявляли, что решение о&nbsp;блокировании можно легко обойти с&nbsp;помощью vpn-сервисов и&nbsp;других технических способов.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>По словам Тульева, аудитория &quot;ВКонтакте&quot; оценивалась в&nbsp;20 миллионов абонентов.</p>\r\n\r\n<p>&quot;На вчерашний день прирост аудитории в&nbsp;Facebook составил 1,5 миллиона абонентов. При этом отток аудитории, которая считается украинской &quot;ВКонтакте&quot;, составил примерно 15 миллионов абонентов. Я не&nbsp;верю, что эти 15 миллионов просто перестали пользоваться социальной сетью. Скорее всего, они ушли в&nbsp;vpn-сервисы и&nbsp;получают доступ &quot;ВКонтакте&quot;, как&nbsp;и раньше, но&nbsp;уже не&nbsp;относятся к&nbsp;украинской аудитории, как&nbsp;раньше, потому что у&nbsp;них поменялись сетевые реквизиты. Полтора миллиона из&nbsp;20 миллионов, я считаю, это полный провал, нежели удача&quot;,&nbsp;&mdash; сказал он в&nbsp;среду на&nbsp;пресс-конференции.</p>\r\n\r\n<div class=\"b-inject b-inject__type-mega-article\" id=\"inject_1494391148\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 16px; vertical-align: baseline; position: relative; clear: both;\">\r\n<div class=\"b-inject__mega m-link\" style=\"max-height: 1e+06px; margin: 0px 0px 1em; padding: 0.5em 0.5em 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; position: relative; background: rgb(244, 244, 244);\">\r\n<div class=\"b-share-media__default b-share-media__inited\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; position: relative;\"><a class=\"b-inject__mega-img\" href=\"https://ria.ru/caricature/20170516/1494391148.html\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; cursor: pointer; color: rgb(98, 167, 217); display: block; position: relative; background: rgb(40, 40, 40); overflow: hidden;\"><img alt=\"Потеряли контакт\" src=\"https://cdn4.img.ria.ru/images/149439/09/1494390959.jpg\" style=\"border-style:initial; border-width:0px; display:block; font-family:inherit; font-stretch:inherit; font-style:inherit; font-variant:inherit; font-weight:inherit; line-height:inherit; margin:0px; max-height:1e+06px; opacity:1; padding:0px; position:relative; vertical-align:middle; width:624px\" title=\"Потеряли контакт\" /></a>\r\n\r\n<div class=\"b-share-media__main-position\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; position: absolute; top: 0px; right: 0px; background: rgba(0, 0, 0, 0.5);\">&nbsp;</div>\r\n</div>\r\n\r\n<div class=\"b-inject__mega-desc\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px 2em; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">\r\n<div class=\"b-media-copyright \" style=\"max-height: 1e+06px; margin: 0px -1em; padding: 0.5em 0px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: 1.1; font-family: inherit; vertical-align: baseline; color: rgb(124, 124, 124); display: flex; justify-content: space-between; flex-wrap: wrap;\">\r\n<div class=\"b-media-copyright__copy\" style=\"max-height: 1e+06px; margin: 0px 1em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; display: inline-block;\"><span style=\"font-family:inherit; font-size:0.687em\"><a href=\"http://www.rian.ru/docs/about/copyright.html\" style=\"max-height: 1e+06px; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-size: 10.992px; vertical-align: baseline; text-decoration-line: none; cursor: pointer; color: rgb(124, 124, 124);\">&copy; РИА Новости . Виталий Подвицкий</a></span></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '2017-05-31 13:01:45', 0),
(5, 'Качай легко: 10 фактов о мобильном интернете', 'Есть ли жизнь после того, как закончится трафик? Что значит символ «H+» на экране телефона? Как не разориться на круглосуточном доступе к Сети? Разобраться в этих и других важных вопросах мы решили вместе с экспертами МТС/Медиа.', '<div class=\"di3-skeleton__content-row\" style=\"box-sizing: border-box; margin-left: -15px; margin-right: -15px; font-family: Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 14px;\">\r\n<div class=\"di3-header\" style=\"box-sizing: border-box; min-height: 1px; padding-left: 15px; padding-right: 15px; position: relative; float: left; width: 967px; margin-bottom: 20px;\">\r\n<div class=\"di3-header__inner\" style=\"box-sizing: border-box; margin-left: 234.25px;\">\r\n<p>Лайфхаки для любителей &laquo;посерфить&raquo; в Сети</p>\r\n\r\n<div class=\"di3-body__vvodka hidden-xs hidden-sm\" style=\"box-sizing: border-box; margin: 0px; font-family: &quot;PT Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; line-height: 1.4em; font-weight: 700; padding-top: 20px;\">Есть&nbsp;ли жизнь после того, как закончится трафик? Что значит символ &laquo;H+&raquo; на&nbsp;экране телефона? Как не&nbsp;разориться на&nbsp;круглосуточном доступе к&nbsp;Сети? Разобраться в&nbsp;этих и&nbsp;других важных вопросах мы&nbsp;решили вместе с&nbsp;экспертами МТС/Медиа.</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"di3-skeleton__content-row\" style=\"box-sizing: border-box; margin-left: -15px; margin-right: -15px; font-family: Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 14px;\">\r\n<div class=\"di3-body\" style=\"box-sizing: border-box; min-height: 1px; padding-left: 15px; padding-right: 15px; position: relative; float: left; width: 967px;\">\r\n<div class=\"di3-meta\" style=\"box-sizing: border-box; width: 241.75px; position: absolute; top: 0px; left: 0px; z-index: 100; padding-left: 15px; padding-right: 15px;\">\r\n<div class=\"di3-meta__author\" style=\"box-sizing: border-box; padding: 12px 0px; border-top: 1px dotted rgb(223, 223, 223);\">&nbsp;</div>\r\n<br />\r\n<div class=\"di3-meta__share\" style=\"box-sizing: border-box; padding: 12px 0px; border-top: 1px dotted rgb(223, 223, 223);\">\r\n<div class=\"sharing-list-air\" style=\"box-sizing: border-box;\">\r\n<div class=\"sharing-list-air__items\" style=\"box-sizing: border-box;\">\r\n<div class=\"sharing-item\" style=\"box-sizing: border-box; display: inline-block; position: relative; margin-right: 8px;\">&nbsp;</div>\r\n&nbsp;\r\n\r\n<div class=\"sharing-item\" style=\"box-sizing: border-box; display: inline-block; position: relative; margin-right: 8px;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"js-mediator-article di3-body__result\" style=\"box-sizing: border-box; margin-left: 0px;\">\r\n<div class=\"di2-incut\" style=\"box-sizing: border-box; clear: both; margin-bottom: 1em; margin-left: 234.25px;\">\r\n<div class=\"di2-incut__image\" style=\"box-sizing: border-box; overflow: hidden;\">\r\n<div class=\"di2-incut__image__pic\" style=\"box-sizing: border-box;\"><img src=\"http://newslab.ru/images/2017/may/29/twitter-292994_960_720.jpg\" style=\"border:0px; box-sizing:border-box; max-width:100%; vertical-align:middle\" /></div>\r\n</div>\r\n</div>\r\n\r\n<h2 style=\"margin-left:234.25px\">Что такое мобильный интернет?</h2>\r\n\r\n<p>Это технология подключения к&nbsp;всемирной сети практически из&nbsp;любой обитаемой точки земного шара. На&nbsp;заре этой технологии плату брали за&nbsp;время соединения, доступ с&nbsp;телефона был экзотикой и&nbsp;стоил космически дорого. А&nbsp;теперь? Вызвать такси, закинуть на&nbsp;счет, купить билет, погуглить киноафишу, перекинуться фоточками. Даже работать можно, не&nbsp;вставая с&nbsp;кровати. Разве что для чистки зубов еще нет мобильного приложения.</p>\r\n\r\n<h2 style=\"margin-left:234.25px\">У&nbsp;меня гифки с&nbsp;котиками долго грузятся. Почему скорость бывает низкая?</h2>\r\n\r\n<p>На&nbsp;скорость движения заветной полосы загрузки влияет сразу множество факторов. Начиная от&nbsp;того, какое расстояние до&nbsp;базовой станции, какой рельеф местности, какие стены у&nbsp;зданий, и&nbsp;заканчивая тем, какой у&nbsp;вас гаджет&nbsp;&mdash; состояние его радиомодуля, чипов, операционной системы. И&nbsp;не&nbsp;надо забывать, что сайты и&nbsp;приложения тоже бывают разные, не&nbsp;все из&nbsp;них хорошо оптимизированы для мобильных устройств. А&nbsp;бывало так, что на&nbsp;концерте или в&nbsp;пробке у&nbsp;вас &laquo;тупил&raquo; интернет? Это потом, что скопление людей на&nbsp;небольшой площади нагружает базовую станцию и&nbsp;также сказывается на&nbsp;скорости.</p>\r\n\r\n<p><iframe class=\"giphy-embed\" frameborder=\"0\" height=\"261\" src=\"https://giphy.com/embed/RtdmpPz0lCbio\" style=\"box-sizing: border-box; border-width: 0px; border-style: initial; margin: 0px auto; width: 702.75px; max-width: 100%;\" width=\"480\"></iframe></p>\r\n\r\n<h2 style=\"margin-left:234.25px\">Что значат буквы G, Е, Н, Н+, 4G,&nbsp;LTE&nbsp;на&nbsp;экране?</h2>\r\n\r\n<p>Это индикатор того, какая технологии передачи данных сейчас активна на&nbsp;вашем устройстве. G&nbsp;(GPRS ) &mdash; самый древний стандарт мобильного интернета. Относится к&nbsp;связи &laquo;второго поколения&raquo; и&nbsp;имеет довольно медленную скорость&nbsp;&mdash; до&nbsp;171,2 килобита в&nbsp;секунду. Хватит, чтобы проверить почту, перекинуться в&nbsp;чатике парой фраз, глянуть прогноз погоды. Как правило такая связь доступна за&nbsp;городом, в&nbsp;малонаселенной местности. Е&nbsp;&mdash; значит работает стандарт EDGE (&laquo;эдж&raquo;), также относится ко&nbsp;&laquo;второму поколению&raquo;. Но&nbsp;имеет больше преимуществ, в&nbsp;том числе более высокую скорость&nbsp;&mdash; до&nbsp;474&nbsp;кбит/с.</p>\r\n\r\n<div class=\"di2-incut\" style=\"box-sizing: border-box; clear: both; margin-bottom: 1em; margin-left: 234.25px;\">\r\n<div class=\"di2-incut__image\" style=\"box-sizing: border-box; overflow: hidden;\">\r\n<div class=\"di2-incut__image__pic\" style=\"box-sizing: border-box;\"><img src=\"http://newslab.ru/images/2017/may/29/office-620823_960_720.jpg\" style=\"border:0px; box-sizing:border-box; max-width:100%; vertical-align:middle\" /></div>\r\n\r\n<div class=\"di2-incut__image__meta\" style=\"box-sizing: border-box; font-family: &quot;PT Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.3em; padding-top: 10px; margin-bottom: 1em;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<p>H и H+ относится к&nbsp;3G&nbsp;&mdash; &laquo;третьему поколению&raquo; сотовой связи, буква&nbsp;Н от&nbsp;&laquo;high&nbsp;speed&raquo; в&nbsp;названии этих стандартов, потолок скорости здесь&nbsp;&mdash; 42&nbsp;мегабита в&nbsp;секунду, то&nbsp;есть на&nbsp;порядок больше, чем в&nbsp;2G. Instagram уже летает, а&nbsp;если повезёт, то&nbsp;и&nbsp;музыка с&nbsp;видео тормозить не&nbsp;будут.</p>\r\n\r\n<p><span style=\"background-color:rgb(244, 244, 244); font-size:20px\">Значки 4G&nbsp;или LTE сигнализируют о&nbsp;том, что вы&nbsp;находитесь в&nbsp;зоне покрытия связи четвертого поколения и&nbsp;держите в&nbsp;руках современный гаджет. Сегодня это последнее слово техники позволяет без проблем смотреть HD-видео в&nbsp;реальном времени, теоретическая пиковая скорость&nbsp;&mdash; до&nbsp;300&nbsp;мбит/с.</span></p>\r\n\r\n<div class=\"di2-incut\" style=\"box-sizing: border-box; clear: both; margin-bottom: 1em; margin-left: 234.25px;\">\r\n<div class=\"di2-incut__image\" style=\"box-sizing: border-box; overflow: hidden;\">\r\n<div class=\"di2-incut__image__pic\" style=\"box-sizing: border-box;\"><img src=\"http://newslab.ru/images/2017/may/29/earphones-1834824_960_720.jpg\" style=\"border:0px; box-sizing:border-box; max-width:100%; vertical-align:middle\" /></div>\r\n</div>\r\n</div>\r\n\r\n<h2 style=\"margin-left:234.25px\">Что такое 5G?</h2>\r\n\r\n<p>Пятое поколение будет ещё быстрее, выше, сильнее. Прогнозируют разгон скорости до&nbsp;25&nbsp;гигабит в&nbsp;секунду, что превышает возможности 4G&nbsp;в&nbsp;сотню раз. Сейчас разные разработчики трудятся над &laquo;железом&raquo;, архитектурой и&nbsp;программной частью новой технологии, договариваются о&nbsp;приведении разработок к&nbsp;единому стандарту. Бурный рост сетей 5G&nbsp;ожидается в&nbsp;начале следующего десятилетия. Тем временем отдельные проекты уже внедряются телеком-компаниями. Например, МТС &laquo;прокачивает&raquo; свои сети и&nbsp;совместно с&nbsp;Ericsson тестирует новые решения. Возможности новой технологии планируют продемонстрировать уже в&nbsp;2018 году на&nbsp;Чемпионате мира по&nbsp;футболу.</p>\r\n\r\n<h2 style=\"margin-left:234.25px\">Как сэкономить на&nbsp;мобильном интернете? Я&nbsp;и&nbsp;так плачу несколько сотен в&nbsp;месяц за&nbsp;СМС и&nbsp;звонки</h2>\r\n\r\n<p>Мобильный интернет как отдельная опция уходит в&nbsp;прошлое. Операторы всё чаще предлагают пакетную услугу, куда сразу входят и&nbsp;звонки, и&nbsp;СМС, и&nbsp;мобильный трафик. Брать пакетом выгоднее.</p>\r\n\r\n<p><span style=\"background-color:rgb(244, 244, 244); font-size:20px\">Например на&nbsp;тарифе Smart за&nbsp;какие-то 300 рублей в&nbsp;месяц вы&nbsp;получаете 5&nbsp;гигабайт мобильного интернета в&nbsp;месяц плюс 500&nbsp;СМС и&nbsp;500 минут разговоров с&nbsp;абонентами всех операторов в&nbsp;крае и&nbsp;МТС по&nbsp;России. Согласитесь, это интересно? Тем более, что общаясь через соцсети и&nbsp;мессенджеры вы&nbsp;экономите свои минуты и&nbsp;СМС. А&nbsp;звонки по&nbsp;России на&nbsp;МТС так и&nbsp;вовсе бесплатны.</span></p>\r\n\r\n<div class=\"di2-incut\" style=\"box-sizing: border-box; clear: both; margin-bottom: 1em; margin-left: 234.25px;\">\r\n<div class=\"di2-incut__image\" style=\"box-sizing: border-box; overflow: hidden;\">\r\n<div class=\"di2-incut__image__pic\" style=\"box-sizing: border-box;\"><img src=\"http://newslab.ru/images/2017/may/29/woman-638384_960_720.jpg\" style=\"border:0px; box-sizing:border-box; max-width:100%; vertical-align:middle\" /></div>\r\n</div>\r\n</div>\r\n\r\n<h2 style=\"margin-left:234.25px\">Как понять, сколько трафика у&nbsp;меня осталось?</h2>\r\n\r\n<p>Информацию об&nbsp;остатках можно получить разными способами. Для абонентов МТС есть три основных. Первый&nbsp;&mdash; зайдя со&nbsp;своего устройства на&nbsp;<a href=\"http://internet.mts.ru/\" style=\"box-sizing: border-box; color: rgb(242, 54, 0); background: 0px 0px; text-decoration-line: none;\" target=\"_blank\">сайт</a>, сразу увидите, сколько мегабайт и&nbsp;до&nbsp;какого дня осталось. Другой вариант&nbsp;&mdash; короткая команда *100*1#. Нажимаете вызов&nbsp;&mdash; получаете уведомление на&nbsp;экране об&nbsp;остатках подключенных пакетов услуг. Естественно, это бесплатно.</p>\r\n\r\n<p>Но&nbsp;самый простой и&nbsp;технологичный способ&nbsp;&mdash; через бесплатное приложение &laquo;Мой МТС&raquo;, которое доступно пользователям любых платформ. Одно нажатие, и&nbsp;перед вами вся информация об&nbsp;остатках пакетов, сроках действия, балансе счёта и&nbsp;много-много других возможностей.</p>\r\n\r\n<h2 style=\"margin-left:234.25px\">А&nbsp;если вдруг закончатся мегабайты? Я&nbsp;останусь без связи с&nbsp;миром?</h2>\r\n\r\n<p>Ни&nbsp;в&nbsp;коем случае.&nbsp;<span style=\"background-color:rgb(255, 187, 125)\">Если вы&nbsp;не&nbsp;рассчитали аппетиты и&nbsp;выкачали весь трафик, автоматически подключится дополнительный мини-пакет</span>. Его размер и&nbsp;стоимость зависят от&nbsp;конкретного тарифа. Только важно помнить, что подключаются они автоматически, и&nbsp;если вы&nbsp;планируете сесть на&nbsp;интернет-диету, то&nbsp;лучше позаботиться заранее и&nbsp;отказаться от&nbsp;автоподключения. Это также легко сделать через приложение &laquo;Мой МТС&raquo;.</p>\r\n\r\n<div class=\"di2-incut\" style=\"box-sizing: border-box; clear: both; margin-bottom: 1em; margin-left: 234.25px;\">\r\n<div class=\"di2-incut__image\" style=\"box-sizing: border-box; overflow: hidden;\">\r\n<div class=\"di2-incut__image__pic\" style=\"box-sizing: border-box;\"><img src=\"http://newslab.ru/images/2017/may/29/mobile-605422_960_720.jpg\" style=\"border:0px; box-sizing:border-box; max-width:100%; vertical-align:middle\" /></div>\r\n</div>\r\n</div>\r\n\r\n<h2 style=\"margin-left:234.25px\">А&nbsp;если я&nbsp;все за&nbsp;месяц не&nbsp;потрачу?</h2>\r\n\r\n<p>Неиспользованные остатки трафика, а&nbsp;также минут и&nbsp;СМС не&nbsp;сгорают. Они переносятся на&nbsp;следующий месяц и&nbsp;увеличивают ваш стандартный пакет. Такая опция доступна владельцам тарифов &laquo;Smart&raquo;, &laquo;Smart Безлимитище&raquo; и&nbsp;&laquo;Smart+&raquo;.</p>\r\n\r\n<h2 style=\"margin-left:234.25px\">Тариф можно поменять в&nbsp;любой момент?</h2>\r\n\r\n<p>Да,&nbsp;<span style=\"background-color:rgb(255, 187, 125)\">смена тарифа&nbsp;&mdash; очень простая процедура, причем раз в&nbsp;30&nbsp;дней это можно делать бесплатно</span>. Однако при переходе на&nbsp;тариф с&nbsp;помесячной оплатой на&nbsp;счету должна быть сумма за&nbsp;месяц&nbsp;&mdash; она списывается сразу&nbsp;же, поэтому советуем переходить на&nbsp;новый тариф в&nbsp;последний день действия старого.</p>\r\n\r\n<p><span style=\"background-color:rgb(244, 244, 244); font-size:20px\">Поменять тариф проще всего через приложение &laquo;Мой МТС&raquo;. Жмете кнопку &laquo;Тариф&raquo;, затем вкладка &laquo;Все&raquo;, выбираете нужный&nbsp;&mdash; всё просто.</span>Описание тарифов можно посмотреть прямо в&nbsp;приложении. Там&nbsp;же можно настроить &laquo;Автоплатеж&raquo;, привязав ко&nbsp;счету банковскую карту, и&nbsp;быть на&nbsp;связи всегда и&nbsp;без дополнительных усилий.</p>\r\n\r\n<p><strong>Теперь вы&nbsp;знаете всё, что нужно о&nbsp;мобильном интернете. Удачного сёрфинга, качайте легко вместе с&nbsp;МТС!</strong></p>\r\n\r\n<p>P.S. Больше лайфхаков и&nbsp;полезных советов о&nbsp;том, как сэкономить при помощи смартфона, читайте на&nbsp;<a href=\"http://www.media.mts.ru/\" style=\"box-sizing: border-box; color: rgb(242, 54, 0); background: 0px 0px; text-decoration-line: none;\">МТС/Медиа</a>.</p>\r\n</div>\r\n</div>\r\n</div>\r\n', '2017-05-31 13:03:18', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pays`
--

CREATE TABLE `pays` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `sum` double NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pays`
--

INSERT INTO `pays` (`id`, `type`, `sum`, `username`, `date`) VALUES
(1, 'Списание', 600.1, 'kasdq', '2017-06-21'),
(2, 'Зачисление', 10.1, '79763148597', '2017-06-11'),
(3, 'Зачисление', 10.1, 'azaza', '2017-06-11'),
(4, 'Зачисление', 10.1, 'azaza', '2017-06-11'),
(5, 'Зачисление', 10.1, 'azaza', '2017-06-11'),
(6, 'Списание', 100, '78795241254', '2017-06-04'),
(7, 'Списание', 0, 'K2iejqk', '2017-06-16'),
(9, 'Зачисление', 300, 'K2iejqk', '2017-06-15'),
(10, 'Зачисление', 300, 'K2iejqk', '2017-06-15'),
(11, 'Зачисление', 300, 'K2iejqk', '2017-06-15'),
(12, 'Зачисление', 300, 'K2iejqk', '2017-06-15'),
(13, 'Зачисление', 300, 'K2iejqk', '2017-06-15'),
(14, 'Зачисление', 300, 'K2iejqk', '2017-06-15'),
(15, 'Зачисление', 300, 'K2iejqk', '2017-06-15'),
(16, 'Зачисление', 300, 'K2iejqk', '2017-06-15');

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id` int(10) UNSIGNED NOT NULL,
  `surname` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `tariff_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id`, `surname`, `first_name`, `second_name`, `address`, `phone`, `tariff_id`, `date`, `status`) VALUES
(1, 'Ленёв', 'Сергей', 'Андреевич', 'Советская д.59', '9619976531', 1, '2017-05-27 15:43:05', 1),
(2, 'Герцен', 'Святослав', 'Мирославович', 'пер. Почтовый 44', '9876543214', 1, '2017-05-31 15:54:47', 1),
(3, 'Бушуев', 'Вадим', 'Леонидович', 'ул. Калинина 112', '9543214567', 2, '2017-05-31 15:58:22', 1),
(9, 'Петляев', 'Евгений', 'Борисович', 'Лесная 7', '9876544567', 2, '2017-05-31 16:14:49', 1),
(10, 'Краснова', 'Светлана', 'Васильевна', 'Советская 111', '9063214564', 1, '2017-05-31 16:18:02', 1),
(11, 'Кулаева', 'Ольга', 'Викторовна', 'ул. Черемная 4', '9153452131', 1, '2017-05-31 16:18:28', 1),
(12, 'Лешев', 'Алексей', 'Иванович', 'пер. Южный 44', '9036541234', 1, '2017-05-31 16:18:49', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `requesttarif`
--

CREATE TABLE `requesttarif` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `old_tarif` int(11) NOT NULL,
  `new_tarif` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `requesttarif`
--

INSERT INTO `requesttarif` (`id`, `user_id`, `old_tarif`, `new_tarif`, `status`, `date`) VALUES
(1, 1, 1, 3, 1, '2017-06-02 12:38:00'),
(2, 1, 1, 3, 0, '2017-06-02 12:41:00'),
(3, 1, 1, 3, 0, '2017-06-02 12:41:00'),
(4, 1, 1, 3, 0, '2017-06-02 12:53:00'),
(5, 1, 1, 4, 0, '2017-06-02 12:54:00'),
(6, 1, 1, 5, 0, '2017-06-02 12:54:00'),
(7, 1, 1, 1, 0, '2017-06-02 12:54:00'),
(8, 44, 1, 1, 1, '2017-06-30 00:00:00'),
(9, 1, 1, 3, 0, '2017-06-02 03:22:00'),
(10, 1, 1, 5, 0, '2017-06-02 03:38:00'),
(11, 1, 1, 2, 0, '2017-06-04 10:06:00'),
(12, 1, 1, 6, 0, '2017-06-15 00:00:00'),
(13, 1, 1, 6, 0, '2017-06-15 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `stations`
--

CREATE TABLE `stations` (
  `id` int(10) UNSIGNED NOT NULL,
  `namestation` varchar(500) NOT NULL,
  `mikrotiks_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stations`
--

INSERT INTO `stations` (`id`, `namestation`, `mikrotiks_id`, `comment`) VALUES
(1, 'base_1', 1, 'установлена на вышке мегафона на въезде в павловск'),
(2, 'base_2', 1, 'Базовая станция номер 2'),
(3, 'base_3', 1, 'Базовая станция номер 3'),
(4, 'base_4', 1, 'Базовая станция номер 4'),
(5, 'base_5', 1, 'Базовая станция номер 5'),
(6, 'base_6', 1, 'Базовая станция номер 6'),
(7, 'base_7', 1, 'Базовая станция номер 7'),
(8, 'base_8', 1, 'Базовая станция номер 8'),
(9, 'base_9', 1, 'Базовая станция номер 9'),
(10, 'base_10', 2, 'Базовая станция номер 10');

-- --------------------------------------------------------

--
-- Структура таблицы `tariffs`
--

CREATE TABLE `tariffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cost` int(11) NOT NULL,
  `speed` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tariffs`
--

INSERT INTO `tariffs` (`id`, `name`, `description`, `cost`, `speed`, `type`) VALUES
(1, '3M ФИЗ', '3M', 450, 'до 3 Mb', 0),
(2, '4M ФИЗ', '4M', 500, 'до 4 Mb', 0),
(3, '5M ФИЗ', '5M', 700, 'до 5 Mb', 0),
(4, '6M ФИЗ', '6M', 800, 'до 6 Mb', 0),
(5, '8M ФИЗ', '8M', 1000, 'до 8 Mb', 0),
(6, '10M ФИЗ', '10M', 1200, 'до 10 Mb', 0),
(7, '3М ЮР', '3М', 1500, 'до 3 Mb', 0),
(8, '4М ЮР', '4М', 2000, 'до 4 Мb', 0),
(9, '5М ЮР', '5М', 2400, 'до 5 Mb', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `task_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `action`, `username`, `password`, `service`, `profile`, `status`, `date`, `task_status`) VALUES
(1, '', 'дл', 'од', 'лд', 'лдд', 1, '0000-00-00 00:00:00', 1),
(2, '', '4', '465', '465', '645', 646, '0000-00-00 00:00:00', 1),
(3, '', '1', '1', '1', '2', 1, '2017-06-01 22:25:00', 1),
(4, 'create', 'QWEQWE77777', 'QWEQWE77777', 'pppoe', '3M', 0, '2017-06-02 02:32:00', 0),
(5, 'create', 'LLLKJLKJLKJLKJ', 'LLLKJLKJLKJLKJ', 'pppoe', '3M', 0, '2017-06-02 02:36:00', 0),
(6, 'create', 'PPPPPPPLLLLL', 'PPPPPPPLLLLL', 'pppoe', '3M', 0, '2017-06-02 02:40:00', 0),
(7, 'delete', 'PPPPPPPLLLLL', '', '', '', 0, '2017-06-02 02:51:00', 0),
(8, 'delete', 'KRASAVCHEG', '', '', '', 0, '2017-06-02 02:54:00', 0),
(10, 'delete', 'LIZOLLIZOL', '', '', '', 0, '2017-06-02 03:42:00', 0),
(11, 'delete', 'LLLKJLKJLKJLKJ', '', '', '', 0, '2017-06-04 06:58:00', 0),
(12, 'delete', 'QWEQWE77777', '', '', '', 0, '2017-06-04 06:59:00', 0),
(13, 'delete', '79054218704', '', '', '', 0, '2017-06-04 08:14:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `secondname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_contract` date NOT NULL,
  `balance` double NOT NULL,
  `tariffs_id` int(11) NOT NULL DEFAULT '0',
  `connection_id` int(11) NOT NULL,
  `number_contract` int(11) NOT NULL,
  `activity` int(11) NOT NULL,
  `devices_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `role` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'abonent',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `surname`, `firstname`, `secondname`, `address`, `phone`, `date_contract`, `balance`, `tariffs_id`, `connection_id`, `number_contract`, `activity`, `devices_id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Чураков', 'Михаил', 'Андреевич', 'г. Барнаул, ул. Ленина 144, 44/2', '+79095016083', '2017-05-01', 0, 1, 0, 1, 0, 105, 'admin', 'WgVM5IS4uK988HIUyZEUaR9vJPP3jrJN', '$2y$13$1Di5hfWtrk5ULLIwE7IQ2u06M/OxEBHl32m.pfKogKvxkgBs6204i', NULL, 'churakovmike@mail.ru', 10, 'admin', 1495772926, 1496775076),
(11, 'Шпиндель', 'Андрей', 'Сергеевич', 'Лесная 123Г', '+7(976) 432-1326', '2017-05-28', 600, 1, 1, 0, 1, 1, 'K2iejqk', '1pU3aZvZr8LpwR40r0CfWKJYa7PE-W2o', '$2y$13$D0vld02bJbnxwhgwI4B2YeYmy6dyXHSb9OrEL/K4tTvR5nwgvBqXS', NULL, 'lizashurupa94@mail.ru', 10, 'abonent', 1496041865, 1496771151),
(15, '6546546541', '3213213s', 'asda21', '6fs3fa16', '+7(413) 213-1635', '2017-01-01', 0, 1, 20170, 0, 0, 20170, 'jaasdjj4D5', 'mjdKC-FYCbm2RzYcKDOvX8Xal8XrRH0j', '$2y$13$HXTQWqooOKRrtuyeK.efUuyw8bzFSrwSc0pohrgQsQxM0MpLveyCC', '1', '54ASDJHK@MAIL.RU', 10, 'operator', 1496069836, 1496069836),
(16, 'new', 'new', 'new', 'new', '+7(545) 133-3313', '2017-01-01', 0, 1, 20170, 0, 0, 20170, 'new', 'mamD86YXXZ5XSb_yxmSLLX9QCnGQvNR3', '$2y$13$w8GAEuzBRJtccqJy8NvBH.4CYTx37ybJWBR5q/S3qyWWV3Tz9oPB6', 'lLURvDRgWtgKcmfb417LGbHKHkziWMnN', 'asdad3125@mai.ru', 10, 'operator', 1496069908, 1496069908),
(17, '56sd4fsdfs65fd54', 'sd65assdfsd65sdfsdf654', 'sdfsd6f54s6fs5d4f', 's6d5f4sa65fsfsd6f54', '+7(654) 654-1532', '2017-01-01', 0, 1, 20170, 0, 0, 20170, '654fsdfsf64fsdfqsdawe', 'IZvo70Jz-ly_cjiAs4P8fmMxWVy2N2po', '$2y$13$zyezzAQhqbRDmEZ0lQWU0.5Tf5sBpNSCybkgt9moXvgs3h3AkzbPu', 'z_c-4VpeAKTKfHNDz8Mgwn2saeg8o4qd', 'ds5ds54s5s@mail.ru', 10, 'operator', 1496070113, 1496070113),
(18, 'asdad4646', '6546', '565', '46456', '+7(456) 546-4654', '2017-01-01', 0, 1, 1, 0, 0, 1, '4iBH837', 'kejBVhT4euixs_YzirQkHmtKGx7RGlCN', '$2y$13$RIQE25GSy2lyMu0fr/yYvuS4p08yYutHrEMAoyoff8p4HEjT55ZK.', 'Qbagt_c04spqX8h4JecbPRRWzF1qFCZA', 'skjdf@mail.ru', 10, 'operator', 1496070232, 1496070314),
(19, '6546фв46ы5в4ф6в', '6546ф5в46ф5ы4в65', '6в6ыф6в546в466фыф', 'ы6в5фы4ыв6', '+7(654) 611-3213', '2017-01-01', 0, 1, 20170, 0, 1, 20170, '12dfaf3sdf45', '0QS1XNmqvEoPYuDViqonpMsN9OSMPKwb', '$2y$13$83JUDKusOh9LfMnV8t3Oa.fUVHo8cVtN8owiCdB07lbimIe7xIkhO', 'tlIx67L9cILdB0J01FeMZkXMLbZtKzdf', 'asdas@mail.ru', 10, 'operator', 1496070440, 1496070440),
(38, '6a5s5ds6a54d6', '4as35da65d4', '65d4s654ad6d54as65d46', '5465d46sa54d65', '+7(469) 465-6513', '2017-05-18', 0, 1, 1, 6, 1, 3, '11111111111', 'rF5wPLEHwmfiyMn2TW4JDzR_qokyIL7k', '$2y$13$GncKz1D73d9//sluEcA3WOAuYStcbqQDdvuUIPCofQCwLd.mBHb1S', NULL, '11111111111@mail.ru', 10, 'abonent', 1496157943, 1496775077),
(39, 'asda35s1d3a1d3', '2da3s21d32as3d1', 'd3s21ad32d32d3d21', '3d13sd21as32d13', '+7(213) 213-2132', '2017-05-06', -450, 1, 1, 354654, 1, 1, '2222222', 'UhMNBv-eXxUIsIe0R6nb2UiiR8OwIltt', '$2y$13$qJqqju1GjhYsOm/CFyf4OeCvUY/ffmz.iVBuwRib.lpvFjyD73GT.', NULL, '2222222@mail.ru', 10, 'abonent', 1496158033, 1496775077),
(40, '333333333', '333333333', '333333333', '333333333', '+7(333) 333-3333', '2017-05-18', 0, 1, 1, 333333333, 1, 2, '333333333', 'ACUos7EBnL7j49UxngmpgOv4VIHZAE8M', '$2y$13$sjqZD0f6Tb2eU30PMGSD3ORplbjGcG.cMwp1jU1nZj2X71B9IccTG', NULL, '333333333@mail.ru', 10, 'abonent', 1496158059, 1496775077),
(41, '444444444', '444444444', '444444444', '444444444', '+7(444) 444-4444', '2017-05-25', 0, 1, 1, 444444444, 1, 4, '444444444', 'PEsY1P4bbseowHA7o-uJx3h0cVcDYcTK', '$2y$13$Zcjm8YdjH2L8soOdEc5Bc.LNlOXaspswyDw7auiqnejU5GriuMdhi', NULL, '444444444@mail.ru', 10, 'abonent', 1496158188, 1496775077),
(42, '5555555555', '5555555555', '5555555555', '5555555555', '+7(555) 555-5555', '2017-05-25', 0, 1, 1, 2147483647, 1, 5, '5555555555', 'poGx3hJoYDOFwj2eoGx3l0UAepi9DtCG', '$2y$13$VIOpX26tKPrqiMbTFa372O6erAzsXNi7zv7dl9kkeVybIsxtxVSFi', NULL, '5555555555@mail.ru', 10, 'abonent', 1496158249, 1496775077),
(44, '7777777777', '7777777777', '7777777777', '7777777777', '+7(777) 777-7777', '2017-05-10', 0, 1, 1, 2147483647, 1, 7, '7777777777', 'ao2ttIw8wMl-w_g1r53TnC2G4rZ4uB30', '$2y$13$WwgG63pIKHp43rJFTwNnQ.vKQ497vZFwqwD8nKYwrknLXEePBmEdi', NULL, '7777777777@mail.ru', 10, 'abonent', 1496158294, 1496775077),
(45, '888888888', '888888888', '888888888', '888888888', '+7(888) 888-8888', '2017-05-18', 0, 1, 1, 2147483647, 1, 8, '888888888', '08w0TAq08_lZcqzmdLRCzyG7nsXY6giH', '$2y$13$9sagE5zc3k4cImt/mTfTcuJllsUKK3FfMNsL4K1X/vXccEgkX4Z9K', NULL, '888888888@mail.ru', 10, 'abonent', 1496158322, 1496775077),
(46, '9999999999', '9999999999', '9999999999', '9999999999', '+7(999) 999-9999', '2017-05-18', 0, 1, 1, 2147483647, 1, 97, '9999999999', 'fZw2Oon7wa58ImjkI_0sD1bO0rpYTKGw', '$2y$13$AA.bwot2m2jPGRyPzGYGL.TuvZGdc0eYWpiTPF0DRj6JevcO5evPy', NULL, '9999999999@mail.ru', 10, 'abonent', 1496158424, 1496775077),
(47, 'Иванов', 'Аркадий', 'Николаевич', 'с.Павловск, Ленина 67', '+7(236) 546-3545', '2017-05-11', 0, 3, 1, 123456, 1, 10, 'ivanov', 'BLrqQSMj6nVoBUtgR_fRyPJE4ruWV0AC', '$2y$13$K9opvsYv5wz2e5RF4ctr7ezdlICoFpenBf3REidgzroqjF5SVPMd6', NULL, 'ivanov@mail.ru', 10, 'abonent', 1496160525, 1496775077),
(48, 'Кроткова', 'Наталья', 'Владимировна', 'с.Боровиково, ул.Новая, 10', '+7(913) 270-5825', '2015-03-02', 0, 2, 1, 45, 1, 6, 'krotkovan', '1fU0NoSPyIo3XXZKShrySByaNTfoADLl', '$2y$13$phnoryeXeDNATeex2re8ue.mb6DjePlbJrNJEUg4qWidtJckgMr8e', NULL, 'krotkovan@mail.ru', 10, 'abonent', 1496165140, 1496775077),
(49, 'Азарина', 'Нина', 'Николаевна', 'с.Боровиково, ул. Советская, 9', '+7(913) 021-2075', '2015-03-02', 0, 2, 1, 46, 1, 104, 'azarinan', 'uF92GchxYf3z5p9fZdAtrOn8puJqFNWW', '$2y$13$zkwKkaSPido81u8n9oocC.jygZUC.KNAyygKZLhU7432NlV9rvu1y', NULL, 'azarinan@mail.ru', 10, 'abonent', 1496165488, 1496775077),
(50, 'Блинов', 'Александр', 'Вениаминович', 'с.Боровиково, ул.Молодежная,12', '+7(913) 229-8738', '2015-03-02', 0, 2, 1, 47, 1, 12, 'blinova', 'GapQ7STB-5b3t3s4F7YQsdy25VXd_P9f', '$2y$13$XTRmQxncoLa6X5ihB69Pu.m3KLG54YDZE.w4Yzqn9svtGz/hjPpPa', NULL, 'blinova@mail.ru', 10, 'abonent', 1496165587, 1496775077),
(51, 'Гуляев', 'Виктор', 'Георгиевич', 'с.Боровиково, ул.Молодежная, 16', '+7(325) 467-8454', '2015-03-02', 0, 2, 1, 48, 1, 13, 'gulyaevv', 'ZEvnayh7z3qsDS6n7ZRMF450biKLjq8-', '$2y$13$1VxMKRj9at0FgOtqLFRhiOKdCfF8TZGq6gW2mw.WrEZipiNvWnrGm', NULL, 'gulyaevv@mail.ru', 10, 'abonent', 1496165703, 1496775077),
(52, 'Шульгин', 'Алексей', 'Алексеевич', 'с.Боровиково, ул.Советская, 28А', '+7(354) 357-3514', '2015-03-02', 0, 2, 1, 49, 1, 14, '+7(354) 357-3514', '0G15B3jztVznk4a1oav9hkj_H0_GcxPB', '$2y$13$0vMlTxdPj0TMoUVWNxETUO4i68nDyHgidPnGYZlHUMX2L6Ivf6BbC', NULL, 'shulgin@mail.ru', 10, 'abonent', 1496165780, 1496775077),
(53, 'Попов', 'Андрей', 'Николаевич', 'с.Боровиково, ул.Колядко,2', '+7(913) 565-4587', '2015-03-08', 0, 2, 1, 50, 1, 15, '+7(913) 565-4587', 'cohUDfJm6FIQzUSac1S0BZXjkmRJzRG1', '$2y$13$meVrDe8Uc606j0ZymHMyWefmu2MuI2Uycqh0l80fw2AppkfsA3j8i', NULL, 'popov@mail.ru', 10, 'abonent', 1496165991, 1496775077),
(54, 'Гусева', 'Светлана', 'Владимировна', 'с.Павловск, ул.М.Горького', '+7(965) 478-5244', '2016-10-19', 0, 2, 1, 51, 1, 16, '+7(965) 478-5244', 'GBUwubyjnUiffp0EfMGYscxH95lsIuNq', '$2y$13$jadcILv6irhpwfvzMiX96eEgo3.sukU7efe8QdB/0Y9/q7/AY36HO', NULL, 'guseva@mail.ru', 10, 'abonent', 1496166448, 1496775077),
(55, 'Сабуров', 'Владимир', 'Павлович', 'с.Боровиково, ул.Нагорная, 1/2', '+7(354) 654-7615', '2016-12-07', 0, 2, 1, 52, 1, 17, '+7(354) 654-7615', 'gGoyQBHld6Xhuf6INM5dGFO7jg0Ser2p', '$2y$13$l6Bd.kbxILF/RZB3.9CT4uMCg82PkMbFG6irZbUoR1e9/BVnbInla', NULL, 'saburov@mail.ru', 10, 'abonent', 1496166522, 1496775077),
(56, 'Стяжкина', 'Галина', 'Ивановна', 'с.Боровиково, ул.Нагорная 1/1', '+7(432) 546-5465', '2016-12-24', 0, 2, 1, 53, 1, 18, '+7(432) 546-5465', '7rlAdCzL1ksYHJ3Myv-K5OH6Ou1YQ41D', '$2y$13$4YoGu43olrvUFpURhzf08.eatpqiK9ZZIFfqL7ztSzFodflKdjBR.', NULL, 'styazkina@mail.ru', 10, 'abonent', 1496166679, 1496775077),
(57, 'Ваулин', 'Антон', 'Александрович', 'с.Боровиково, ул.Молодежная, 21', '+7(654) 565-8787', '2016-09-15', 0, 2, 1, 54, 1, 19, '76545658787', 'fLPtwC7k3XWJrhaKCiFAc4mcF0z5vUWb', '$2y$13$W0MAXKY7GRSfD/VwpaRB.eBEvkOSHTbt3kdzOAZbE2kR/wvHuMWjG', NULL, '76545658787@mail.ru', 10, 'abonent', 1496166941, 1496775077),
(58, 'Хлыстова', 'Галина', 'Николаевна', 'с.Боровиково, ул.Молодежная, 11/2', '+7(913) 658-9545', '2016-11-16', 0, 2, 1, 55, 1, 21, '79136589545', 'q7xOEvZ_Tg_hCawm1lAm6NR6g3KigrsG', '$2y$13$YCvltw30.9nJJvhCbwpTxOCSFTOeC36ezdvKTnUPLhXHbgmbt8pLO', NULL, '79136589545@mail.ru', 10, 'abonent', 1496167301, 1496775077),
(59, 'Кузнецова', 'Ольга', 'Александровна', 'с.Боровиково, ул.Советская,11', '+7(961) 998-4653', '2016-10-09', 0, 1, 1, 56, 1, 21, '79619984653', 'IxAGeoag6beKoYRxANLu5gForfPnW02K', '$2y$13$EmRiZlOZlON1cyFF6vVlQOxNfbdfoOv4GHqHUB1FkppHQOB4yKHuK', NULL, '79619984653@mail.ru', 10, 'abonent', 1496167431, 1496775077),
(60, 'Плесовских', 'Роман', 'Александрович', 'с.Боровиково, ул.Партизанская, 3/1', '+7(909) 563-2178', '2016-12-25', 0, 2, 1, 57, 1, 22, '79095632178', 'j1bStHftSYGIHI4GjHIjuzEjwLLzUJrw', '$2y$13$dv3wndIaBM/YJAoA3LI1Tec9n7FDg7Kupp2yloP7WV6xmCyAJQlRe', NULL, '79095632178@mail.ru', 10, 'abonent', 1496167568, 1496775077),
(61, 'Лиханова', 'Дина', 'Анатольевна', 'с.Боровиково, ул.Советская, 19/1', '+7(913) 568-9787', '2016-09-19', 0, 2, 1, 58, 1, 23, '79135689787', '2DkzAiBrIb41QHeGqMPaK_jRdDRPYn4T', '$2y$13$8g96136hdmXOWF8ZCcjoauZdaelOlWLJSkLq885pZBpFNHaCM/CIe', NULL, '79135689787@mail.ru', 10, 'abonent', 1496168039, 1496775077),
(62, 'Славянский', 'Дмитрий', 'Васильевич', 'с.Павловск, ул.Панфилова, 48', '+7(964) 554-5454', '2016-11-10', 0, 2, 1, 59, 1, 24, '79645545454', 'BHlh0MDJvJDIOyVXVGP_9BQT-IsP76TW', '$2y$13$hfGA.KQHbu/Z74564H32..07DwhUCRANnApdAbzCHMttGh323MVPy', NULL, '79645545454@mail.ru', 10, 'abonent', 1496168502, 1496775077),
(63, 'Гребеньщикова', 'Елена', 'Сергеевна', 'с.Павловск, ул.Энтузиастов, 14/1', '+7(916) 547-8964', '2016-11-08', 0, 2, 1, 60, 1, 25, '79165478964', '-lPbQ6ZTdB4ueuQqWQN_OJKbuvBvhCGk', '$2y$13$0mfaPKCW2LPtUFHhHcP5ieg/zZ3RidrkMj26MigfJlO2K6dnqSILG', NULL, '79165478964@mail.ru', 10, 'abonent', 1496168611, 1496775077),
(64, 'Плотникова', 'Татьяна', 'Феногеновна', 'с.Павловск, ул.Линейная, 14/2 ', '+7(654) 697-6568', '2016-09-23', 0, 2, 1, 62, 1, 26, '76546976568', 'xRU0znaprA_bw29onhy3udufj7yDvI2o', '$2y$13$Ja3mkYDylvqEB/3OY7f77uqGWGjaKKPVhHU7O2RZ0pI7s/Qy2JCcK', NULL, '76546976568@mail.ru', 10, 'abonent', 1496168705, 1496775077),
(65, 'Плотникова', 'Галина', 'Владимировна', 'с.Павловск, ул.Радужная, 15', '+7(896) 532-1355', '2016-10-12', 0, 2, 1, 61, 1, 27, '78965321355', 'kCPiN2l3z9uoF0DJ28A64JCteEzugx40', '$2y$13$sm8n9zPpjVjTHHjLe1rPCO27OcuTwHyvI8Ea8wym.Go1S7eydqZ7m', NULL, '78965321355@mail.ru', 10, 'abonent', 1496168771, 1496775077),
(66, 'Веронов', 'Николай', 'Викторович', 'с.Павловск, пер.Ядринцева, 39Б', '+7(342) 432-5894', '2016-10-24', 0, 3, 1, 63, 1, 28, '73424325894', 'JXg_ZP5EaQ82tHInOJlFzb1MSVXrlk9z', '$2y$13$Z/d/Q7HU.OBOe/mBwM19fe91XZbOkp73wc7T/qdERx/t/5EqUg9Y2', NULL, '73424325894@mail.ru', 10, 'abonent', 1496168892, 1496775077),
(67, 'Кузнецов', 'Владимир', 'Сергеевич', 'с.Павловск, ул.Сосновая Поляна, 2В', '+7(567) 368-1876', '2016-09-19', 0, 2, 1, 64, 1, 29, '75673681876', 'GmwPlNQoQVWIgAXgI6cj0IMIHo4NX3C4', '$2y$13$lwq6JZlsdzWK6UviXQ4WXuRFlizs0WJoG3OlexNOAVcHBECtR2jRW', NULL, '75673681876@mail.ri', 10, 'abonent', 1496169369, 1496775077),
(68, 'Гридунова', 'Татьяна', 'Владимировна', 'с.Павловск, ул.Суворова, 49', '+7(162) 574-6284', '2017-02-15', 0, 2, 1, 65, 1, 30, '71625746284', 'Ta9yllndigfVZX6fR2nuW0lYkGrkLGHn', '$2y$13$JsIHXSGA4kU6T43tXM.JBuyupxX5Z9jsy419hqAK9J1lq57d2ti2u', NULL, '71625746284@mail.ru', 10, 'abonent', 1496169438, 1496775077),
(69, 'Коновалов', 'Виктор', 'Иванович', 'с.Павловск, ул.Михайлова, 33', '+7(534) 687-6468', '2017-03-15', 0, 2, 1, 66, 1, 31, '75346876468', 'd6eVDZX90IZJifziH0ciMaHd-gws2rBd', '$2y$13$LS9ReJ950BR2NQCb0ztK7OFFYbyxxJxtHyk7P445mU7Nu5FOVUdFW', NULL, '75346876468@mail.ru', 10, 'abonent', 1496169606, 1496775077),
(70, 'Сорокина', 'Галина', 'Юрьевна', 'с.Павловск, ул.Луговая, 14', '+7(931) 546-5587', '2017-01-08', 0, 2, 1, 67, 1, 32, '79315465587', 'j65kCm_7C-j5sjhN0TQKZRJQlFXO8CKj', '$2y$13$ul/gZlecoYXCqFD3NGDGHOYJiYhcY/355o0/Nzd2UwAv7VBHiv9.W', NULL, '79315465587@mail.ru', 10, 'abonent', 1496169675, 1496775077),
(71, 'Шумкова', 'Ольга', 'Семеновна', 'с.Павловск, ул.Новая, 5/2', '+7(964) 578-9931', '2016-12-22', 0, 2, 1, 68, 1, 33, '79645789931', 'qbHxV-TtzbRm6DAQqveLtrXOBCC_W5Eb', '$2y$13$nlU8urA3I6Bvz9tr/JO18.hwiuoDKglSaxN.AuNpxbbO65wPDrZf.', NULL, '79645789931@mail.ru', 10, 'abonent', 1496169766, 1496775077),
(72, 'Раицкая', 'Светлана', 'Ильнична', 'с.Павловск, ул.Советская, 144', '+7(984) 756-9132', '2017-03-17', 0, 2, 1, 69, 1, 34, '79847569132', 'BnPQsieIwc60tGgYuwjAR7bF2OUvgbPX', '$2y$13$1SPNBbiwIiUgGFtFiOhwEOM3BJkXY2CjBLOMxBNOs/Xovk6/3mMDS', NULL, '79847569132@mail.ru', 10, 'abonent', 1496169834, 1496775077),
(73, 'Сайденцаль', 'Виктор', 'Александрович', 'с.Павловск, ул.Каменский тракт, 7/4', '+7(963) 145-4879', '2017-01-20', 0, 2, 1, 70, 1, 35, '79631454879', '5G6Kx0-vyAg-pYvXidPagr5B5rYSENS7', '$2y$13$Uc0Z.A079L2DiqVpLbyywOOTaXwAkzFBtngsY1PsB8ER/TG3zIWAG', NULL, '79631454879@mail.ru', 10, 'abonent', 1496170098, 1496775077),
(74, 'Фролов', 'Сергей', 'Александрович', 'с.Боровиково, ул.Советская, 27', '+7(986) 457-7912', '2016-12-19', 0, 1, 1, 72, 1, 36, '79864577912', 'oo7mUngLYDHmBNSDNbqx07VWfBvLPBD_', '$2y$13$JeiwA0RA0VTqp4ToqV8.6.mqBQyMBMR3dMvcPJvlh6PYVEeNcCLUi', NULL, '79864577912@mail.ru', 10, 'abonent', 1496170172, 1496775077),
(75, 'Патыковская', 'Елена', 'Михайловна', 'с.Павловск, ул.Прудская, 42,2', '+7(965) 478-9321', '2016-09-25', 0, 3, 1, 73, 1, 37, '79654789321', 'tJ4MXMCgYFqUcrpfJ1iebRXHsHdFuDIW', '$2y$13$LMwYIJH6eynWjCjBdPI2neZDgQZK7h3hPtBvDUgf1rQem1o84Fwxm', NULL, '79654789321@mail.ru', 10, 'abonent', 1496170231, 1496775077),
(76, 'Неяскин', 'Сергей', 'Иванович', 'с.Павловск, ул.Михайлова, 31', '+7(985) 321-6575', '2016-10-13', 0, 2, 1, 74, 1, 38, '79853216575', 'iOAA_7N1TAh4Wf6vL7HKCYXL3T48rg3k', '$2y$13$1RXbyZc3PvlKPR5wKhjspesdvX5NMdMHV2PPGKqOIPOS4A.TumqRC', NULL, '79853216575@mail.ru', 10, 'abonent', 1496170334, 1496775077),
(77, 'Косьяненко', 'Анатолий', 'Андреевич', 'с.Павловск, ул.Советская, 128', '+7(975) 632-2178', '2016-10-29', 0, 2, 1, 75, 1, 39, '79756322178', 'CwR7-Z6TYjqkGAYSCs6f177H9rE2gZN7', '$2y$13$YNFEb3jObBCdEIO8zUrFeuFmK3jvnCjfda7XkfDzESsVARx1c3nQa', NULL, '79756322178@mail.ru', 10, 'abonent', 1496170396, 1496775077),
(78, 'Семенов', 'Николай', 'Леонидович', 'с.Павловск, Береговая,3', '+7(942) 846-2468', '2016-11-29', 0, 2, 1, 76, 1, 40, '79428462468', 'LsAdH2y_euXj0hEFNkOPJ16u_11bRdEZ', '$2y$13$4V8tYSp8clcApV8Hb9kGNOZOxJOEFE/wnBpQj8Me2OtL04G4.67nq', NULL, '79428462468@mail.ru', 10, 'abonent', 1496170456, 1496775077),
(79, 'Бричук', 'Ольга', 'Алексеевна', 'с.Павловск, Красный Алтай, 12', '+7(965) 546-7875', '2017-04-13', 0, 2, 1, 77, 1, 41, '79655467875', 'hMPvbbziAkdyBUcxsNYI9CAyh1ETeSD5', '$2y$13$sYh4jkRUupAoF0hhUoNef.e3ZrnSnZuLshVj/HzMpea.7wE6Isxhi', NULL, '79655467875@mail.ru', 10, 'abonent', 1496171021, 1496775077),
(80, 'Барнашева', 'Светлана', 'Александровна', 'с.Павловск, ул.Советская, 76', '+7(966) 487-1687', '2016-10-13', 0, 1, 1, 79, 1, 42, '79664871687', '4adCxHBhqn4opP-vi16SuY-jTVUZuzCj', '$2y$13$MDGqcndJ.7w9qU6NN8ReleM9.DMo6bSmNmjLDI.y859ZU5WxmfISe', NULL, '79664871687@mail.ru', 10, 'abonent', 1496171199, 1496775077),
(81, 'Горшкова', 'Татьяна', 'Александровна', 'с.Павлвоск, пер, Колыванский, 67', '+7(495) 849-5384', '2016-09-23', 0, 2, 1, 80, 1, 43, '74958495384', 'LB6xD_NyYcsMy5JzrfICaZQWEzPnmxpl', '$2y$13$CqWlnD7HMy5Aohpz33T4y.fp76QfLrclXqBNV/QutDpBozMY184c6', NULL, '74958495384@mail.ru', 10, 'abonent', 1496171271, 1496775077),
(82, 'Баева', 'Ирина', 'Ивановна', 'с.Павловск, ул.Ленина, 12', '+7(965) 516-8765', '2017-01-11', 0, 2, 1, 81, 1, 44, '79655168765', 'S7No1o4Bznt8t3GYUf9Bwdar9toLPm0e', '$2y$13$Bn7rYlaRSAnPQAqL0RI9feT2qQfuo8zUZnLdSMV/tHJelSErk51MO', NULL, '79655168765@mail.ru', 10, 'abonent', 1496171335, 1496775077),
(83, 'Попов', 'Василий', 'Сргеевиче', 'с.Павловск, пер.Жукова,55', '+7(925) 657-6514', '2017-02-13', 0, 2, 1, 82, 1, 45, '79256576514', 'qq1ExvSiU0cNbBomKg61ScqDFqvmvxu1', '$2y$13$42lrfgeM5bzxOBsaxudeB.lmtqIr2J7TujF8RwyvLfa.OLKhuobSG', NULL, '79256576514@mail.ru', 10, 'abonent', 1496171392, 1496775077),
(84, 'Морева', 'Валентина', 'Петрова', 'с.Павловск, ул.Георгиева 8', '+7(964) 587-7158', '2016-12-24', 0, 2, 1, 83, 1, 46, '79645877158', '7sIH6d0huCfY3CiKsdCylqsXKht-c3n_', '$2y$13$kxkcwC8IvjRNgK7Bqi.CzetOgP1nqx5q2VgjRlP5iMNkm3tXmChMS', NULL, '79645877158@mail.ru', 10, 'abonent', 1496171460, 1496775077),
(85, 'Плесовских', 'Олеся', 'Сергеевна', 'с.Павловск, ул. Советская, 9', '+7(625) 748-5795', '2017-01-16', 0, 2, 1, 84, 1, 47, '76257485795', 'ZHET4sZp4yg6WRISKz5QD_pYbDmL86EZ', '$2y$13$dh0yuYFcVO/AT8BxqfptLeo4EREkq.vWQhFzLsSxDfkzdcnYnc99G', NULL, '76257485795@mail.ru', 10, 'abonent', 1496171605, 1496775077),
(86, 'Шутов', 'Владимир', 'Иванович', 'с.Павловск, Димитрова,23', '+7(975) 657-5878', '2017-02-06', 0, 2, 1, 85, 1, 48, '79756575878', '2IGBULMFlYovLsdKTL_QGGY8a_VGDeDi', '$2y$13$jxYteVLYeHa8yzpFkJs/fO2qYpPjU/SLaXlfXu1WsschCxSgVYw.6', NULL, '79756575878@mail.ru', 10, 'abonent', 1496171863, 1496775077),
(87, 'Фаткина', 'Евгения', 'Алексеевна', 'с.ПАвловск, Ленина,45', '+7(234) 273-8457', '2017-02-18', 0, 2, 1, 86, 1, 49, '72342738457', 'RTQB8DB7JgWkaGPmRlhDhQhSVclDVtg8', '$2y$13$m5YAHLzri3fcQGTbHylaB.c1FfTmhIao4ahClSJZB4ActOTUZ3DJK', NULL, '72342738457@mail.ru', 10, 'abonent', 1496171918, 1496775077),
(88, 'Новрузов', 'Вугар', 'Алекбер Оглы', 'с.Павловск, пер.Колыванский 14', '+7(657) 465-1687', '2017-02-13', 0, 2, 1, 87, 1, 50, '76574651687', '96bNLBeKz6w_KmcWti184V-F_YoBatmW', '$2y$13$TZ3ZZOxeMNlWLm.ICkAZj.QfvqgVjdvP1/HUyCqkGo//TLTYYQwM6', NULL, '76574651687@mail.ru', 10, 'abonent', 1496172015, 1496775077),
(89, 'Ильиных ', 'Ирина', 'Александровна', 'с.Павловск, ул.Новая,6', '+7(987) 456-1235', '2016-12-14', 0, 2, 1, 88, 1, 51, '79874561235', 'nHcd1tCs5RagLB9IcJ2CWWNLVTqb8bah', '$2y$13$VuFqs85GQTTRxicn3XT5CeaimPgSa7ZRLNUhyqxtqZiCxq.ifb2kW', NULL, '79874561235@mail.ru', 10, 'abonent', 1496206072, 1496775077),
(90, 'Николаева', 'Галина', 'Николаевна', 'с.Павловск, пр.Никитина,98', '+7(956) 546-5278', '2017-02-13', 0, 1, 1, 89, 1, 52, '79565465278', 'MhULR7GkHabtUAt9_V130MhuRsz6sYYB', '$2y$13$XOh65GLqnyqhSvzhHJBNV.JVVcjIEQ3qBl8fZDM3dUm/Ev8q5H5ea', NULL, '79565465278@mail.ru', 10, 'abonent', 1496206193, 1496775077),
(91, 'Ситниманов', 'Юрий', 'Рустемович', 'с.Павловск, Ленина12', '+7(879) 524-1254', '2016-12-18', 0, 2, 1, 90, 1, 53, '78795241254', 'ctPKCuqLHd7BS1k66vBdncBQzhicP8V2', '$2y$13$OPlQgOi7GAgZx7BgOtH2geihg7Unns73rZbpcsMXEN2zhV19o/0IC', NULL, '78795241254@mail.ru', 10, 'abonent', 1496206314, 1496775077),
(92, 'Иляскин', 'Алексей', 'Владимирович', 'с.Павловск, пер.Некрасова,34', '+7(985) 564-8785', '2017-02-01', 0, 2, 1, 91, 1, 54, '79855648785', 'iu0nZEVr3YrJ0Tk5QsQ_9WHNJL6Rrg94', '$2y$13$nMOWLOY2y6vhfts6MD8ReuD5vmcnAuNigkfiPoOMQz7wUNXkEvlWC', NULL, '79855648785@mail.ru', 10, 'abonent', 1496206391, 1496775077),
(93, 'Меликян', 'Вахтанг', 'Вараздович', 'с.Павловск, ул Молодежная,11/6', '+7(899) 545-7515', '2017-03-03', 0, 2, 1, 92, 1, 55, '78995457515', 'k-oGuL1ywir5c1JUGRZ97ZYZVRNXFTGr', '$2y$13$iNfkWP8wA2XtnoWcpjXn7eBNSv6k3pl57yD9Uy7jyy6iv9nPOBMO2', NULL, '78995457515@mail.ru', 10, 'abonent', 1496206490, 1496775077),
(94, 'Овчаренко', 'Сергей', 'Викторович', 'с.Павловск, Береговая 6', '+7(931) 468-7454', '2016-12-15', 0, 2, 1, 93, 1, 56, '79314687454', 'ks_NYt0gj1uD46NqnYz28pc_WI2D-tVV', '$2y$13$fL2Re4GvEdACxv5M22daaOL2nzEuvTXgPqZchaANyRfKfwvk0DQy2', NULL, '79314687454@mail.ru', 10, 'abonent', 1496206573, 1496775077),
(95, 'Решетова', 'Алена', 'Александровна', 'с.Павловск, Димитрова 81', '+7(913) 645-8795', '2017-03-20', 0, 2, 1, 94, 1, 57, '79136458795', 'UDSr7yUG00qbVmVRaCzHftc0s0zmsHO-', '$2y$13$E01rC5JXWdSOR73RrpBr7eUdJwfTkZRpYoHvEcnwpmSgjT.7tfb4y', NULL, '79136458795@mail.ru', 10, 'abonent', 1496206663, 1496775077),
(96, 'Писменко', 'Марина', 'Николаевна', 'с.Боровиково, ул.Набережная 2', '+7(964) 578-9312', '2017-01-10', 0, 2, 1, 95, 1, 58, '79645789312', '62yjxJvA_sT8EoB33UjvcVwWwkXjGP-9', '$2y$13$xIf6DeEZcPVFbeUzau0vk.nQA4iTsulgLS2WB1cvFmZe/ajNAcNXa', NULL, '79645789312@mail.ru', 10, 'abonent', 1496206933, 1496775077),
(97, 'Воронов', 'Юрий', 'Геннадьевич', 'с.Павловск, ул. Водная 45', '+7(987) 456-3218', '2017-02-23', 0, 2, 1, 96, 1, 59, '79874563218', '_0ovY41IfwMXOjuHir_bEz2CFLwphMxt', '$2y$13$oS3pnYBIiVHHwqTJUZywpOJmjPOVzIYDhxxkgVnhDWnEYExNPfH62', NULL, '79874563218@mail.ru', 10, 'abonent', 1496207089, 1496775077),
(98, 'Дилицкая', 'Елена', 'Владимировна', 'с.Павловск, ул.Лесная 14/1', '+7(961) 458-7321', '2016-12-17', 0, 2, 1, 97, 1, 61, '79614587321', 'LBIfCX9CXhtOU9r0aDY_OrONI3P8sowB', '$2y$13$gn/xa.6Gr3Tqwp2EtpMNo.jGfCfuS8O9vzRf.HAZahaIHFOSnmWzy', NULL, '79614587321@mail.ru', 10, 'abonent', 1496207180, 1496775077),
(99, 'Сонин', 'Владимир', 'Николаевич', 'с.Павловск, ул.Лесная, 15', '+7(965) 487-5165', '2017-01-12', 0, 2, 1, 98, 1, 61, '79654875165', 'aQGbTbNsRJ1NJGzWcmsudEZiU4yOnom-', '$2y$13$0r59fQDzNDZ.GM4Ccwhh/uPvF6VN5yjIE2SPv8eF5UKyMs8J8WXhC', NULL, '79654875165@mail.ru', 10, 'abonent', 1496207427, 1496775077),
(100, 'Бойков', 'Геннадий', 'Иванович', 'с.Павловск, пер. Колыванский, 17', '+7(987) 456-2315', '2017-01-05', 0, 2, 1, 99, 1, 62, '79874562315', 'VJJhMPJtXZ5Kmj_vnF6P6klzWK-eNi2U', '$2y$13$gmy9yTDv290Um/tDmPRVLeX.g/6rky394IoU5ZSVEKuKGwdxYH5nm', NULL, '79874562315@mail.ru', 10, 'abonent', 1496207551, 1496775077),
(101, 'Глумов', 'Валерий', 'Валентинович', 'с.Павловск, Красный Алтай, 11', '+7(934) 657-8155', '2016-12-21', 0, 2, 1, 100, 1, 63, '79346578155', 'Q3O4x-dC1R4DQeMnxikNRmavJySRkZVK', '$2y$13$ZF/bscJNkwmh0rFW5cs4..WhXuoNfQCfczrw5QXMGEojmhfdIDGki', NULL, '79346578155@mail.ru', 10, 'abonent', 1496207641, 1496775077),
(102, 'Иванина', 'Наталья', 'Николаевна', 'с.Павловск, Димитрова,2', '+7(976) 314-8597', '2016-11-17', 0, 2, 1, 101, 1, 64, '79763148597', 'fjP6V1m2efp0WqLyq_FWBL3wI_nrb_T3', '$2y$13$5KPRAq1OMH4TjT04yVhyLu/ud5HZBbiq1SqHBO6LGdmicFMcPbgpC', NULL, '79763148597@mail.ru', 10, 'abonent', 1496207761, 1496775077),
(103, 'Платковская', 'Татьяна', 'Александровна', 'с.Павловск, ул.Панфилова, 22', '+7(922) 547-8826', '2016-12-08', 0, 2, 1, 102, 1, 65, '79225478826', '_7HCEMTKyMV1sNJ8S0S2F9W1Kjpby-rZ', '$2y$13$LFDa4cx81OAz1UKd7VcgpeBRGunzn78sLuL.SeNHLcolYDBcfMC1C', NULL, '79225478826@mail.ru', 10, 'abonent', 1496207832, 1496775077),
(104, 'Куликов', 'Вячеслав', 'Ильич', 'с.Павловск, ул.Красная поляна, 33', '+7(955) 486-3287', '2017-02-23', 0, 1, 1, 103, 1, 66, '79554863287', 'wI3dzAhpmJhUn3r00oLo0WQANS7dOgHy', '$2y$13$af7rJ0j5j1/LLukEymCvSeq0vm7XMtqr6dHDIkann8zUeZF3BCpfi', NULL, '79554863287@mail.ru', 10, 'abonent', 1496207944, 1496775077),
(105, 'Бажина', 'Дарья', 'Андреевна', 'с.Павловск, ул.Суворора, 1/1', '+7(965) 557-8947', '2017-01-28', 0, 2, 1, 104, 1, 67, '79655578947', 'lJ438cOVYeiILNlHd3_xK0ITMbmWeWKI', '$2y$13$jxFKpQnGvHf/IwPSirgu2ud9u2g9Vfbc7r.pA4237FtvVz4TvIX2S', NULL, '79655578947@mail.ru', 10, 'abonent', 1496208003, 1496775077),
(106, 'Ушакова', 'Мария', 'Сергееван', 'с.Боровиково, ул. Молодежная, 24', '+7(964) 786-5464', '2017-01-29', 0, 1, 1, 105, 1, 68, '79647865464', 'x59_S1KqM5HrvpejXVA6d0C1TFAx9Q5d', '$2y$13$uNtp50bXY/zlAidfpxf5DuLo5BcPOYvmhWPi.bo9WwJ45rnDq9xve', NULL, '79647865464@mail.ru', 10, 'abonent', 1496208390, 1496775077),
(107, 'Чупрова', 'Марина', 'Валерьевна', 'с.Павловск, ул.Нагорная, 14', '+7(988) 876-4654', '2017-03-30', 0, 2, 1, 106, 1, 69, '79888764654', 'QkRu650NgVpthOtm9DwfwPA3-ipR10vA', '$2y$13$BIAtQDZQT4uKMCYq0aXRo.lI0sO11Us1uRwTvisgtaBSAIPvaYiW.', NULL, '79888764654@mail.ru', 10, 'abonent', 1496208526, 1496775077),
(108, 'Люкова', 'Татьяна', 'Анатольевна', 'с.Павловск, ул.Молодежная, 29А', '+7(996) 565-5773', '2017-01-31', 0, 2, 1, 107, 1, 70, '79965655773', 'NfUGFGfu4Y3p-WCXLjRxKznIQx1NtJrK', '$2y$13$eNrdTbzpb8r1E.jMapDuROO1XQ3xFdZg2p8a8UW3wVjFwNmScT5aK', NULL, '79965655773@mail.ru', 10, 'abonent', 1496208644, 1496775077),
(109, 'Клещев', 'Сергей', 'Петрович', 'с.Павловск, ул.Михайлова, 11/1', '+7(965) 456-7351', '2017-01-09', 0, 2, 1, 108, 1, 71, '79654567351', 'P9_ZRcdquXmTd_z1B5p3q4bLqVGlJ1nG', '$2y$13$mRtEpI4J0.p9OquvUKhizO0.QOcMt2DK0ptKQxCK0L14lT41n2YRm', NULL, '79654567351@mail.ru', 10, 'abonent', 1496208716, 1496775077),
(110, 'Будкеева', 'Людмила', 'Борисован', 'с.Павловск, ул.Суворова, 66', '+7(966) 502-1540', '2016-12-30', 0, 2, 1, 109, 1, 72, '79665021540', 'v_fpeA_eViYOelAWN0koNAGkp_n4sCZ5', '$2y$13$l4wmr4Xy.PELPJ5RWOkRiujkh9JGLOPWSjPT7WJi7aSFjvOv3iJvW', NULL, '79665021540@mail.ru', 10, 'abonent', 1496208860, 1496775077),
(111, 'Сафиулин', 'Габдула', 'Мусаевич', 'с.Павловск, ул.Матросова, 9Б', '+7(905) 301-5605', '2017-01-11', 0, 2, 1, 109, 1, 73, '79053015605', 'fOx-dhgDG1qLbP99HRU5ZuL-L_pnDIyU', '$2y$13$IqIsmM84WhUeXrAl3eLmH.SSqtV1QNOn5YUrJQPcQpGsa1UzryHJ6', NULL, '79053015605@mail.ru', 10, 'abonent', 1496208962, 1496775077),
(112, 'Вальвач', 'Дмитрий', 'Сергеевич', 'с.Павловск, пер.Луговой, 17', '+7(906) 163-5735', '2016-11-16', 0, 2, 1, 110, 1, 74, '79061635735', 'DeCkKlSF93muBjScU7soys9KUfPNDWVp', '$2y$13$4zrkJ9kXT0KG.gVThISvieYhFXL59Xf4Npm1L1fNy/dJmHwaYBV3q', NULL, '79061635735@mail.ru', 10, 'abonent', 1496209095, 1496775077),
(113, 'Москвичева', 'Светлана', 'Владимировна', 'с.ПАвловск, ул.Лесная, 23', '+7(905) 448-7456', '2017-01-23', 0, 2, 1, 111, 1, 75, '79054487456', 'Kbmjt5jlJkbo-cfScjCN8KsokVRSVbsI', '$2y$13$JzYLPxl79eFFHDdWkZf9eO3n7K428VACKEugtZph4hm778Ffak6Hq', NULL, '79054487456@mail.ru', 10, 'abonent', 1496209272, 1496775077),
(114, 'Завьялов', 'Олег', 'Александрович', 'с.Павловск, ул.Луговая,99', '+7(904) 513-6879', '2016-12-29', 0, 2, 1, 112, 1, 76, '79045136879', 'uI74oQ7lwQChdI8kTaZ5Z_mczoUtsjEh', '$2y$13$YgIzNvAj.Tmzryj5c2aNJOs3J7Ow4NC8.Gj7HT9gHbFPo9xDBuk5W', NULL, '79045136879@mail.ru', 10, 'abonent', 1496209330, 1496775077),
(115, 'Фризоргер', 'Эдуард', 'Владимирович', 'с.Павловск, ул.Пушкина', '+7(902) 654-3654', '2017-03-15', 0, 2, 1, 113, 1, 77, '79026543654', 'aJD77sxebN-vmhYi_6AH3Yj9vEQIKVip', '$2y$13$.lO9jRuK0MEXFTJGcZSgWe2e4M2/SmDMRQlHxGcI4/v8dW5VWYeum', NULL, '79026543654@mail.ru', 10, 'abonent', 1496209463, 1496775077),
(116, 'Шутов', 'Леонид', 'Иванович', 'с.Павловск, пер.Пушкина, 23/1', '+7(901) 454-6576', '2017-03-30', 0, 2, 1, 114, 1, 78, '79014546576', 'BDyj1qt7Vs-yZL4m9KzTo7IvDZcQ5UJQ', '$2y$13$J4V3DoRXrIh0cyyBxA2SW.63gTYitAF7UGVUSVuJnOsfRzGSzX6OS', NULL, '79014546576@mail.ru', 10, 'abonent', 1496209594, 1496775077),
(117, 'Матяшова', 'Оксана', 'Владимировна', 'с.Павловск, ул.Лесная, 45', '+7(903) 168-7651', '2017-02-22', 0, 1, 1, 115, 1, 79, '79031687651', 'BqIvBHMvxRfUtDIKTyJots6pceM6lZr9', '$2y$13$VSF6gbqRBZA70KJvIIrxvO8EgkeT8uuHgC3bp/fQHAdaqCzEWUTZu', NULL, '79031687651@mail.ru', 10, 'abonent', 1496209646, 1496775077),
(118, 'Морозова', 'Евгения', 'Федоровна', 'с.Павловск, пер.Димитрова, 32', '+7(980) 564-6570', '2017-02-27', 0, 2, 1, 116, 1, 80, '79805646570', '14c08bIDU4yCy4jb1lsXpQ-u5hSDRJi7', '$2y$13$uKSUf0YysFO1NUMallIYMeXRGoTnCShqhFsynnjMjnZp5y95xsoR6', NULL, '79805646570@mail.ru', 10, 'abonent', 1496210002, 1496775077),
(119, 'Пересыпкина', 'Лариса', 'Викторовна', 'с.Павловск, ул.Прудская, 8/1', '+7(901) 657-4687', '2017-01-26', 0, 2, 1, 117, 1, 81, '79016574687', 'NDFSOie0vmW1NpZQ-D1O0CN36yLYmy2n', '$2y$13$xrCi8d/VaHtVVJbQP9oQAu/kkClx3nE.2OWDEKDS/DOHqAwk8MIOq', NULL, '79016574687@mail.ru', 10, 'abonent', 1496210109, 1496775077),
(120, 'Баранов', 'Алексей', 'Николаевич', 'с.Павловск, ул.Красная поляна, 21', '+7(966) 055-6415', '2016-12-07', 0, 1, 1, 118, 1, 82, '79660556415', 'KpER16FLdX-jl_NF_f7D3aoxW6ZYbTiH', '$2y$13$nkZTDpRE3N6BHXbxi5Uhcuaiq3aIJsAWMNufIGfD/aVW6KLDNRBUO', NULL, '79660556415@mail.ru', 10, 'abonent', 1496210248, 1496775077),
(121, 'Буров', 'Игорь', 'Вадимович', 'с.Павловск, ул.Нагорная,21А', '+7(981) 654-0684', '2017-02-21', 0, 2, 1, 119, 1, 83, '79816540684', 'BuiCuFDX7bsufsPirIc0RKs-9jwgafyX', '$2y$13$AMuytlWJUDZLRpKfQizkoeQmspNjevw/NFGuFOIGQi1PpkFaFiEtm', NULL, '79816540684@mail.ru', 10, 'abonent', 1496210377, 1496775077),
(122, 'Миженный', 'Алексей', 'Николаевич', 'с.Павловск, пер.Никитина, 66', '+7(687) 068-7065', '2017-02-21', 0, 2, 1, 120, 1, 84, '76870687065', '0BNM_ePUBbiWdex6E8AgXUr-HuveAeMj', '$2y$13$l3Aza5DWKBUFjPpDaM8sE.tMpOUlBUviLGbablNrwzmCsWAkKX3qu', NULL, '76870687065@mail.ru', 10, 'abonent', 1496210447, 1496775077),
(123, 'Дик', 'Роман', 'Александрович', 'с.Павловск, пер.Никитина 15', '+7(061) 406-0845', '2017-01-09', 0, 2, 1, 121, 1, 85, '70614060845', 'YOZaCJCGoxArfmjoL2Ji9GfsYJgkRlBk', '$2y$13$6B1DGSbjBQ7nObHxCFs1CeOMqxPtZA7.jeR5/ZEF8Ih5ScnKxakJm', NULL, '70614060845@mail.ru', 10, 'abonent', 1496210623, 1496775077),
(124, 'Ковылин', 'Дмитрий', 'Евгеньевич', 'с.Павловск, пер.Некрасова 45/1', '+7(068) 607-1718', '2017-01-11', 0, 2, 1, 122, 1, 86, '70686071718', 'QJ4j0yp20nCC7z3tM0Ee_V6oLbS6bnm6', '$2y$13$.vH9IZ7LH16G/oB659ARR.x/N5OWoAUdI2z3rKY4hMxuua.PdMh.S', NULL, '70686071718@mail.ru', 10, 'abonent', 1496210704, 1496775077),
(125, 'Перевалов', 'Виктор', 'Петрович', 'с.Павловск, ул.Пушкина,34', '+7(906) 215-4787', '2017-03-28', 0, 2, 1, 123, 1, 87, '79062154787', 'aeHDNxl-eGzNbra0Kg25I3XFCvTMuG0L', '$2y$13$fAnQi1NAd9.kjuKe1V6x1uOS8gpTL14gra8roJeFHtZU1J9spM5JC', NULL, '79062154787@mail.ru', 10, 'abonent', 1496210753, 1496775077),
(126, 'Завьялов', 'Владимир', 'Сергеевич', 'с.Павловск, ул.Ленина 44', '+7(904) 502-1897', '2017-02-24', 0, 2, 1, 124, 1, 88, '79045021897', '6DjWT883JMr5ZgGBWOntPcdmltzurky4', '$2y$13$KW3qVjt9DAiL1f6qJMX.XOSSotDvmdIYcmuZAsvSLlPuH45jmjWMW', NULL, '79045021897@mail.ru', 10, 'abonent', 1496210820, 1496775077),
(127, 'Грязнов', 'Павел', 'Сергеевич', 'с.Павловск, ул.Советская, 12', '+7(901) 546-8755', '2016-12-19', 0, 2, 1, 125, 1, 89, '79015468755', 'JY1FZDMb_PL3mnDzMoed462aditk-JCW', '$2y$13$oY9WbKMfPf4FaRjcdz/8UOgDVslIO6cDGZG9P/GrOCrqnAd6MKfja', NULL, '79015468755@mail.ru', 10, 'abonent', 1496210870, 1496775077),
(128, 'Булгакова', 'Юлия', 'Игревна', 'с.Павловск, пер.Колыванский 22Б', '+7(901) 521-3575', '2017-01-03', 0, 2, 1, 126, 1, 90, '79015213575', '4N173g_O-JltGNr3trpgZvhMaY0MeESA', '$2y$13$OEuRobI3UfNfi06SY19w5eq3Z9S24nwP2hfQH0npQkn860rx5xR9W', NULL, '79015213575@mail.ru', 10, 'abonent', 1496211008, 1496775077),
(129, 'Максимов', 'Максим', 'Андреевич', 'с.Павлвоск, ул.Гербера, 9', '+7(534) 684-0687', '2017-01-11', 0, 2, 1, 127, 1, 91, '75346840687', 'Zi4wswLoWvJl-E_y1cxaq92aOUsP3j6d', '$2y$13$uQQsRsRuRsIdiu/KQsESTu9cNIpCy9OQG76wcbgK7Ne/6g3U.taLO', NULL, '75346840687@mail.ru', 10, 'abonent', 1496211153, 1496775077),
(130, 'Мажаева', 'Наталья', 'Викторовна', 'с.Павловск, ул.Панфилова 75', '+7(544) 087-0547', '2017-01-18', 0, 2, 1, 128, 1, 92, '75440870547', 'iZRgaTivmye2IDIpUFkwoA8Ixz06npyF', '$2y$13$WAWlDlBpWde/XLtgydbww.HBm9qjb4pxVfOpxh6RixmRfX/KnzblC', NULL, '75440870547@mail.ru', 10, 'abonent', 1496211286, 1496775077),
(131, 'Валяева', 'Олеся', 'Николаевна', 'с.Павловск, ул.Новая 12', '+7(801) 569-8745', '2017-02-13', 0, 2, 1, 129, 1, 93, '78015698745', 'g_8cKqpZZTFT1UwaryJMyE8zixdnjO1q', '$2y$13$rDQi.ooy85mRBIPxWOF9JOE1TYIS4Qqne39LOJIBPHta/Utj5JsXS', NULL, '78015698745@mail.ru', 10, 'abonent', 1496211623, 1496775077),
(132, 'Петухова', 'Анастасия', 'Евгеньевна', 'с.Павлвоск, пер.Горького 1/1', '+7(654) 609-8768', '2017-01-02', 0, 2, 1, 130, 1, 94, '76546098768', 'LiHFu6UPJ9RNFgHNqqLmifhAEqeI7-uk', '$2y$13$t9dUcLPj3nzsiOBvhcW5.eAWE/xfzwGmsywwHGxXuieEEBiq5kB7e', NULL, '76546098768@mail.ru', 10, 'abonent', 1496211676, 1496775077),
(133, 'Дягтеренко', 'Вадим', 'Олегович', 'с.Павловск, ул.Пастухова 1', '+7(654) 548-0547', '2016-12-27', 0, 2, 1, 131, 1, 95, '76545480547', 'BbiJqjLLq0vIld-EdUVcgPqECahZlI92', '$2y$13$GEKEOGjLqIfbGYrjBIWmBegwJuIIfFrChnMInpdswbAyZsxyico1i', NULL, '76545480547@mail.ru', 10, 'abonent', 1496211730, 1496775077);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actionlist`
--
ALTER TABLE `actionlist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `changedevices`
--
ALTER TABLE `changedevices`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `mikrotiks`
--
ALTER TABLE `mikrotiks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `requesttarif`
--
ALTER TABLE `requesttarif`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tariffs`
--
ALTER TABLE `tariffs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actionlist`
--
ALTER TABLE `actionlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT для таблицы `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `changedevices`
--
ALTER TABLE `changedevices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `connection`
--
ALTER TABLE `connection`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `mikrotiks`
--
ALTER TABLE `mikrotiks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `requesttarif`
--
ALTER TABLE `requesttarif`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `tariffs`
--
ALTER TABLE `tariffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
