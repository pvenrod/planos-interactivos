-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-03-2021 a las 10:47:51
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `planos_interactivos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_14_130823_create_parcelas_table', 1),
(5, '2021_01_22_084844_zonas_table', 1),
(6, '2021_02_02_113848_create_multimedia_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

DROP TABLE IF EXISTS `multimedia`;
CREATE TABLE IF NOT EXISTS `multimedia` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` enum('audio','video','imagen') COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parcela_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `multimedia`
--

INSERT INTO `multimedia` (`id`, `tipo`, `url`, `parcela_id`, `created_at`, `updated_at`) VALUES
(1, 'imagen', '1.jpg', 19, '2021-02-26 09:08:50', '2021-02-26 09:08:50'),
(2, 'imagen', '2.jpg', 19, '2021-02-26 09:08:56', '2021-02-26 10:44:14'),
(3, 'video', NULL, 20, '2021-02-26 09:10:23', '2021-02-26 09:10:23'),
(4, 'imagen', '4.jpg', 19, '2021-02-26 10:44:51', '2021-02-26 10:44:51'),
(5, 'audio', '5.mp3', 19, '2021-03-02 09:24:21', '2021-03-02 09:24:21'),
(6, 'audio', '6.mp3', 19, '2021-03-02 09:25:14', '2021-03-02 09:25:14'),
(7, 'imagen', '7.jpg', 32, '2021-03-19 10:51:28', '2021-03-19 10:51:28'),
(8, 'imagen', '8.jpg', 36, '2021-03-19 10:51:53', '2021-03-19 10:51:53'),
(9, 'imagen', '9.jpg', 36, '2021-03-19 10:51:59', '2021-03-19 10:51:59'),
(10, 'imagen', '10.jpg', 36, '2021-03-19 10:52:03', '2021-03-19 10:52:03'),
(11, 'imagen', '11.jpg', 36, '2021-03-19 10:52:08', '2021-03-19 10:52:08'),
(12, 'imagen', '12.jpg', 36, '2021-03-19 10:52:34', '2021-03-19 10:52:34'),
(13, 'imagen', '13.jpg', 36, '2021-03-19 10:52:41', '2021-03-19 10:52:41'),
(15, 'imagen', '15.jpg', 29, '2021-03-19 10:53:03', '2021-03-19 10:53:03'),
(16, 'imagen', '16.jpg', 29, '2021-03-19 10:53:10', '2021-03-19 10:53:10'),
(17, 'imagen', '17.png', 14, '2021-03-19 12:25:38', '2021-03-19 12:25:38'),
(18, 'imagen', '18.jpg', 34, '2021-03-21 09:11:24', '2021-03-21 09:11:24'),
(19, 'imagen', '19.jpg', 32, '2021-03-21 09:12:00', '2021-03-21 09:12:00'),
(20, 'imagen', '20.jpg', 36, '2021-03-21 09:13:03', '2021-03-21 09:13:03'),
(22, 'audio', '22.mp3', 37, '2021-03-21 09:14:32', '2021-03-21 09:14:32'),
(23, 'audio', '23.mp3', 37, '2021-03-21 09:17:17', '2021-03-21 09:17:17'),
(24, 'video', '24.mp4', 37, '2021-03-21 09:17:23', '2021-03-21 09:17:23'),
(25, 'audio', '25.mp3', 37, '2021-03-21 09:31:04', '2021-03-21 09:31:04'),
(26, 'audio', '26.mp3', 36, '2021-03-21 09:34:09', '2021-03-21 09:34:09'),
(27, 'audio', '27.mp3', 34, '2021-03-21 09:39:18', '2021-03-21 09:39:18'),
(30, 'audio', '30.mp3', 34, '2021-03-21 18:20:38', '2021-03-21 18:20:38'),
(53, 'video', '53.mp4', 37, '2021-03-22 09:39:47', '2021-03-22 09:39:47'),
(54, 'video', '54.mp4', 34, '2021-03-22 09:43:13', '2021-03-22 09:43:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcelas`
--

DROP TABLE IF EXISTS `parcelas`;
CREATE TABLE IF NOT EXISTS `parcelas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `anyo_inicio` int(11) NOT NULL,
  `anyo_fin` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zona_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `parcelas`
--

INSERT INTO `parcelas` (`id`, `anyo_inicio`, `anyo_fin`, `imagen`, `zona_id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(14, 1800, 1900, '14.png', 3, 'Herrería', 'Herrería prinicipal de Almería', '2021-02-20 11:40:32', '2021-02-20 11:40:32'),
(15, 1800, 1920, '15.png', 3, 'Restaurante Purchena', 'Restaurante Purchena. El más antiguo de la ciudad. Su plato estrella eran las migas en los días de lluvia.', '2021-02-20 11:42:34', '2021-02-26 09:53:22'),
(16, 1800, 1980, '16.png', 3, 'Bloque', 'Bloque de pisos', '2021-02-20 11:43:17', '2021-02-20 11:43:17'),
(17, 1800, 1920, '17.png', 3, 'Bloque 2', 'Bloque de pisos 2', '2021-02-20 11:43:37', '2021-02-20 11:43:37'),
(18, 1800, 2021, '18.png', 3, 'Refugios de Almería', 'Refugios de Almería', '2021-02-20 11:44:09', '2021-02-20 11:44:09'),
(19, 1850, 2021, '19.png', 3, 'Edificio de las Mariposas', 'El emblemático edificio de las mariposas de Almería. Gracias a su decoración, atrae a cientos de turistas al año.', '2021-02-20 11:45:21', '2021-02-26 09:54:00'),
(20, 1800, 2021, '20.png', 3, 'Farmacia', 'Farmacia', '2021-02-20 11:46:29', '2021-02-20 11:49:22'),
(21, 1900, 2021, '21.png', 3, 'Tienda del Sastre Hernández', 'Tienda del Sastre Hernández', '2021-02-20 11:47:28', '2021-02-20 11:49:18'),
(22, 1905, 2021, '22.png', 3, 'Bloque 1', 'Bloque de pisos 1', '2021-02-20 11:48:01', '2021-02-20 11:48:01'),
(23, 1905, 2021, '23.png', 3, 'Bloque 2', 'Bloque de pisos 2', '2021-02-20 11:48:18', '2021-02-20 11:49:29'),
(24, 1910, 2021, '24.png', 3, 'Restaurante Da Vinci', 'Restaurante Da Vinci. Actualmente está en obras. Se prevé que en un futuro será uno de los puntos más emblemáticos de la ciudad, debido a su antigüedad.', '2021-02-20 11:48:48', '2021-02-26 09:54:38'),
(25, 1925, 2021, '25.png', 3, 'Bloque 3', 'Bloque 3', '2021-02-20 11:49:12', '2021-02-20 11:49:12'),
(26, 1985, 2021, '26.png', 3, 'Bloque moderno', 'Bloque moderno', '2021-02-20 11:49:52', '2021-02-20 11:49:52'),
(27, 2005, 2021, '27.png', 3, 'Hotel Torreluz', 'Hotel Torreluz', '2021-02-20 11:50:08', '2021-02-20 11:50:08'),
(28, 1841, 2021, '28.png', 2, 'Edificios de alrededor', 'Los edificios que hay alrededor de la Plaza Vieja.', '2021-03-19 10:41:41', '2021-03-19 10:41:41'),
(29, 1870, 1990, '29.png', 2, 'Zona sur', 'Zona sur de la Plaza Vieja, desde 1870 hasta 1990', '2021-03-19 10:42:28', '2021-03-19 10:42:28'),
(30, 1841, 1870, '30.png', 2, 'Zona sur', 'Zona sur de la Plaza Vieja, desde 1841 hasta 1870', '2021-03-19 10:42:51', '2021-03-19 10:42:51'),
(31, 1841, 1920, '31.png', 2, 'Zona este', 'Zona este de la Plaza Vieja, desde 1841 hasta 1920', '2021-03-19 10:43:13', '2021-03-19 10:43:13'),
(32, 1920, 2021, '32.png', 2, 'Zona este', 'Zona este de la Plaza Vieja, desde 1920 hasta 2021', '2021-03-19 10:43:32', '2021-03-19 10:43:32'),
(33, 1890, 1990, '33.png', 2, 'Zona norte', 'Zona norte de la Plaza VIeja, desde 1890 hasta 1990', '2021-03-19 10:44:07', '2021-03-19 10:44:07'),
(34, 1990, 2010, '34.png', 2, 'Zona norte', 'Zona norte de la Plaza Vieja, desde 1990 hasta 2010', '2021-03-19 10:44:46', '2021-03-19 10:44:46'),
(35, 1861, 1910, '35.png', 2, 'Zona oeste', 'Zona oeste de la Plaza Vieja, desde 1861 hasta 1910', '2021-03-19 10:45:40', '2021-03-19 10:57:19'),
(36, 1920, 2021, '36.png', 2, 'Zona oeste', 'Zona oeste de la Plaza Vieja, desde 1920 hasta 2021', '2021-03-19 10:46:07', '2021-03-19 10:46:07'),
(37, 1930, 2021, '37.png', 2, 'Zona central', 'Zona central de la Plaza Vieja, desde 1900 hasta 2021', '2021-03-19 10:46:32', '2021-03-19 10:47:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ruben', 'ruben@iescelia.edu', NULL, '32252792b9dccf239f5a5bd8e778dbc2', NULL, NULL, '2021-03-19 12:25:13'),
(2, 'Paolo', 'paolo@iescelia.edu', NULL, '969044ea4df948fb0392308cfff9cdce', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

DROP TABLE IF EXISTS `zonas`;
CREATE TABLE IF NOT EXISTS `zonas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_fondo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `zonas_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `nombre`, `descripcion`, `imagen`, `imagen_fondo`, `created_at`, `updated_at`) VALUES
(2, 'Plaza Vieja', 'Plaza situada en casco histórico de Almería.', '2.png', 'fondo2.png', NULL, '2021-03-21 09:06:00'),
(3, 'Puerta de Purchena', NULL, '3.png', '', '2021-02-13 13:01:01', '2021-02-13 13:01:01'),
(4, 'Zapillo', NULL, '4.png', '', '2021-02-13 13:01:48', '2021-02-13 13:01:48'),
(5, 'Nueva Almería', NULL, '5.png', '', '2021-02-13 13:02:21', '2021-02-13 13:02:21'),
(6, 'Chanca', NULL, '6.png', '', '2021-02-13 13:03:11', '2021-02-13 13:03:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
