-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 21-02-2024 a las 00:24:38
-- Versión del servidor: 5.7.39
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phishing_simulator`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Campañas`
--

CREATE TABLE `Campañas` (
  `IDCampaña` int(6) UNSIGNED NOT NULL,
  `IDUsuario` int(6) UNSIGNED DEFAULT NULL,
  `IDPlantilla` int(6) UNSIGNED DEFAULT NULL,
  `IDPlantillaPersonalizada` int(6) UNSIGNED DEFAULT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripción` text,
  `FechaInicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaFin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Campañas`
--

INSERT INTO `Campañas` (`IDCampaña`, `IDUsuario`, `IDPlantilla`, `IDPlantillaPersonalizada`, `Nombre`, `Descripción`, `FechaInicio`, `FechaFin`) VALUES
(1, 1, 3, NULL, 'Campaña INGDirect Confirmación de Transacción', 'Campaña de phishing educativa para simular una alerta de transacción de INGDirect.', '2024-02-19 01:20:40', '2024-02-26 01:20:40'),
(3, 1, NULL, NULL, 'INGDirect Confirmación de Transacción', 'Prueba', '2024-02-19 02:00:56', NULL),
(4, 1, NULL, NULL, 'CaixaBank Aviso Importante', 'Prueba 2', '2024-02-19 02:06:21', NULL),
(6, 1, NULL, NULL, 'INGDirect Confirmación de Transacción', 'Prueba', '2024-02-19 14:53:44', NULL),
(7, 1, 3, NULL, 'INGDirect Confirmación de Transacción', 'Prueba', '2024-02-19 15:44:38', NULL),
(8, 1, 3, NULL, 'INGDirect Confirmación de Transacción', 'Prueba ', '2024-02-19 16:08:06', NULL),
(9, 1, 2, NULL, 'Santander Actualización Necesaria', 'Prueba', '2024-02-19 16:11:10', NULL),
(10, 1, 3, NULL, 'INGDirect Confirmación de Transacción', 'Prueba Definitiva', '2024-02-19 16:21:12', NULL),
(11, 1, 2, NULL, 'Santander Actualización Necesaria', 'Prueba', '2024-02-19 16:28:47', NULL),
(12, 1, NULL, NULL, 'Prueba', 'Prueba', '2024-02-19 16:29:38', NULL),
(13, 1, NULL, NULL, 'Prueba', 'Prueba', '2024-02-19 16:47:22', NULL),
(14, 1, NULL, NULL, 'Prueba con Logo', 'Prueba', '2024-02-19 17:04:04', NULL),
(15, 1, NULL, NULL, 'Prueba con Logo', 'Prueba', '2024-02-19 17:08:36', NULL),
(16, 1, NULL, NULL, 'Prueba con Logo', 'Prueba', '2024-02-19 17:11:06', NULL),
(17, 1, NULL, NULL, 'Prueba con Logo', 'Prueba', '2024-02-19 17:21:37', NULL),
(18, 1, NULL, NULL, 'Prueba con Logo', 'Prueba', '2024-02-19 17:23:13', NULL),
(19, 1, NULL, NULL, 'Prueba con Logo', 'Prueba', '2024-02-19 17:24:15', NULL),
(20, 1, NULL, NULL, 'Prueba con Logo', 'Prueba', '2024-02-19 17:28:37', NULL),
(21, 1, NULL, NULL, 'Prueba con Logo', 'Prueba', '2024-02-19 17:46:23', NULL),
(22, 1, NULL, NULL, 'Prueba con Logo', 'Prueba', '2024-02-19 17:47:10', NULL),
(23, 1, 2, NULL, 'Santander Actualización Necesaria', 'Campaña para simular phishing a mis empleados', '2024-02-19 17:56:24', NULL),
(24, 1, NULL, NULL, 'Prueba con Enlace', 'Prueba', '2024-02-19 19:54:12', NULL),
(25, 1, 5, NULL, 'Correos Notificación de Envío', 'Prueba', '2024-02-19 20:03:18', NULL),
(26, 1, 5, NULL, 'Correos Notificación de Envío', 'Prueba con Registro de Enlaces', '2024-02-19 23:46:26', NULL),
(27, 1, 4, NULL, 'CaixaBank Aviso Importante', 'Prueba', '2024-02-19 23:56:27', NULL),
(28, 1, 5, NULL, 'Correos Notificación de Envío', 'Prueba', '2024-02-20 00:00:20', NULL),
(29, 1, 4, NULL, 'CaixaBank Aviso Importante', 'Prueba', '2024-02-20 00:08:04', NULL),
(30, 1, 5, NULL, 'Correos Notificación de Envío', 'Prueba', '2024-02-20 00:10:38', NULL),
(31, 1, 4, NULL, 'CaixaBank Aviso Importante', 'Prueba', '2024-02-20 00:14:43', NULL),
(32, 2, 5, NULL, 'Correos Notificación de Envío', 'Prueba', '2024-02-20 00:40:12', NULL),
(33, 3, 2, NULL, 'Santander Actualización Necesaria', 'Prueba', '2024-02-20 01:13:28', NULL),
(34, 3, 4, NULL, 'CaixaBank Aviso Importante', 'Prueba', '2024-02-20 01:15:05', NULL),
(35, 4, 3, NULL, 'INGDirect Confirmación de Transacción', 'Campaña de prevención sobre phishing', '2024-02-20 12:08:34', NULL),
(36, 4, NULL, NULL, 'CaixaBank Aviso Importante', 'Campaña de prueba con ingreso manual de correos', '2024-02-20 15:25:35', NULL),
(38, 4, NULL, NULL, 'INGDirect Confirmación de Transacción', 'Campaña de Prueba con subida de CSV', '2024-02-20 15:46:29', NULL),
(39, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba de campaña con subida CSV', '2024-02-20 15:48:10', NULL),
(40, 4, NULL, NULL, 'Correos Notificación de Envío', 'Campaña Prueba', '2024-02-20 15:58:31', NULL),
(41, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba de Campaña con subida de CSV', '2024-02-20 16:23:01', NULL),
(42, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba', '2024-02-20 16:25:10', NULL),
(43, 4, NULL, NULL, 'Correos Notificación de Envío', 'PRUEBA', '2024-02-20 16:30:03', NULL),
(44, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba', '2024-02-20 16:40:11', NULL),
(45, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba con enlace', '2024-02-20 16:40:43', NULL),
(46, 4, NULL, NULL, 'Correos Notificación de Envío', 'prueba', '2024-02-20 16:42:04', NULL),
(47, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba rápida', '2024-02-20 17:24:05', NULL),
(48, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba con enlace', '2024-02-20 17:24:52', NULL),
(49, 4, NULL, NULL, 'Correos Notificación de Envío', 'PRUEBA', '2024-02-20 18:34:25', NULL),
(50, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba', '2024-02-20 18:39:46', NULL),
(51, 4, NULL, NULL, 'Correos Notificación de Envío', 'prueba', '2024-02-20 18:48:38', NULL),
(52, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba', '2024-02-20 18:55:02', NULL),
(53, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba', '2024-02-20 19:29:29', NULL),
(54, 4, NULL, NULL, 'Correos Notificación de Envío', 'prueba', '2024-02-20 19:48:37', NULL),
(55, 4, NULL, NULL, 'Correos Notificación de Envío', 'prueba', '2024-02-20 19:56:23', NULL),
(57, 4, NULL, NULL, 'Correos Notificación de Envío', 'prueba', '2024-02-20 23:28:44', NULL),
(58, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba', '2024-02-20 23:34:51', NULL),
(59, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba', '2024-02-20 23:35:59', NULL),
(60, 4, NULL, NULL, 'Correos Notificación de Envío', 'PRUEBA', '2024-02-20 23:53:38', NULL),
(61, 4, NULL, NULL, 'Correos Notificación de Envío', 'Prueba', '2024-02-20 23:59:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clicks`
--

CREATE TABLE `Clicks` (
  `IDClick` int(6) UNSIGNED NOT NULL,
  `IDEnvío` int(6) UNSIGNED DEFAULT NULL,
  `IDDestinatario` int(6) UNSIGNED DEFAULT NULL,
  `FechaHoraClick` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Clicks`
--

INSERT INTO `Clicks` (`IDClick`, `IDEnvío`, `IDDestinatario`, `FechaHoraClick`) VALUES
(1, 1, 1, '2024-02-19 01:21:11'),
(2, 1, 2, '2024-02-19 01:21:11'),
(3, 1, 3, '2024-02-19 01:21:11'),
(4, 1, 4, '2024-02-19 01:21:11'),
(5, 1, 5, '2024-02-19 01:21:11'),
(6, 1, 6, '2024-02-19 01:21:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DestinatariosCampaña`
--

CREATE TABLE `DestinatariosCampaña` (
  `IDDestinatario` int(6) UNSIGNED NOT NULL,
  `IDCampaña` int(6) UNSIGNED DEFAULT NULL,
  `EmailDestinatario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `DestinatariosCampaña`
--

INSERT INTO `DestinatariosCampaña` (`IDDestinatario`, `IDCampaña`, `EmailDestinatario`) VALUES
(1, 1, 'destinatario1@example.com'),
(2, 1, 'destinatario2@example.com'),
(3, 1, 'destinatario3@example.com'),
(4, 1, 'destinatario4@example.com'),
(5, 1, 'destinatario5@example.com'),
(6, 1, 'destinatario6@example.com'),
(7, 1, 'destinatario7@example.com'),
(8, 1, 'destinatario8@example.com'),
(9, 1, 'destinatario9@example.com'),
(10, 1, 'destinatario10@example.com'),
(12, 3, 'bmsjale@gmail.com'),
(13, 4, 'bmsjale@gmail.com'),
(15, 48, 'user1@example.com'),
(16, 48, 'user2@example.com'),
(17, 48, 'user3@example.com'),
(18, 48, 'user4@example.com'),
(19, 48, 'user5@example.com'),
(20, 48, 'bmsjale@gmail.com'),
(21, 48, 'user7@example.com'),
(22, 48, 'user8@example.com'),
(23, 48, 'user9@example.com'),
(24, 48, 'user10@example.com'),
(25, 49, 'user1@example.com'),
(26, 49, 'user2@example.com'),
(27, 49, 'user3@example.com'),
(28, 49, 'user4@example.com'),
(29, 49, 'user5@example.com'),
(30, 49, 'bmsjale@gmail.com'),
(31, 49, 'user7@example.com'),
(32, 49, 'user8@example.com'),
(33, 49, 'user9@example.com'),
(34, 49, 'user10@example.com'),
(35, 50, 'user1@example.com'),
(36, 50, 'user2@example.com'),
(37, 50, 'user3@example.com'),
(38, 50, 'user4@example.com'),
(39, 50, 'user5@example.com'),
(40, 50, 'bmsjale@gmail.com'),
(41, 50, 'user7@example.com'),
(42, 50, 'user8@example.com'),
(43, 50, 'user9@example.com'),
(44, 50, 'user10@example.com'),
(45, 51, 'user1@example.com'),
(46, 51, 'user2@example.com'),
(47, 51, 'user3@example.com'),
(48, 51, 'user4@example.com'),
(49, 51, 'user5@example.com'),
(50, 51, 'bmsjale@gmail.com'),
(51, 51, 'user7@example.com'),
(52, 51, 'user8@example.com'),
(53, 51, 'user9@example.com'),
(54, 51, 'user10@example.com'),
(55, 52, 'prueba1@gmail.com'),
(56, 52, 'prueba2@gmail.com'),
(57, 52, 'prueba3@gmail.com'),
(58, 52, 'prueba4@gmail.com'),
(59, 52, 'bmsjale@gmail.com'),
(60, 52, 'prueba5@gmail.com'),
(61, 52, 'prueba6@gmail.com'),
(62, 52, 'prueba7@gmail.com'),
(63, 52, 'prueba8@gmail.com'),
(64, 52, 'prueba9@gmail.com'),
(65, 53, 'prueba1@gmail.com'),
(66, 53, 'prueba2@gmail.com'),
(67, 53, 'prueba3@gmail.com'),
(68, 53, 'prueba4@gmail.com'),
(69, 53, 'bmsjale@gmail.com'),
(70, 53, 'prueba5@gmail.com'),
(71, 53, 'prueba6@gmail.com'),
(72, 53, 'prueba7@gmail.com'),
(73, 53, 'prueba8@gmail.com'),
(74, 53, 'prueba9@gmail.com'),
(75, 54, 'prueba1@gmail.com'),
(76, 54, 'prueba2@gmail.com'),
(77, 54, 'prueba3@gmail.com'),
(78, 54, 'prueba4@gmail.com'),
(79, 54, 'bmsjale@gmail.com'),
(80, 54, 'prueba5@gmail.com'),
(81, 54, 'prueba6@gmail.com'),
(82, 54, 'prueba7@gmail.com'),
(83, 54, 'prueba8@gmail.com'),
(84, 54, 'prueba9@gmail.com'),
(85, 55, 'prueba1@gmail.com'),
(86, 55, 'prueba2@gmail.com'),
(87, 55, 'prueba3@gmail.com'),
(88, 55, 'prueba4@gmail.com'),
(89, 55, 'bmsjale@gmail.com'),
(90, 55, 'prueba5@gmail.com'),
(91, 55, 'prueba6@gmail.com'),
(92, 55, 'prueba7@gmail.com'),
(93, 55, 'prueba8@gmail.com'),
(94, 55, 'prueba9@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DetallesEnvíos`
--

CREATE TABLE `DetallesEnvíos` (
  `IDDetalle` int(6) UNSIGNED NOT NULL,
  `IDEnvío` int(6) UNSIGNED DEFAULT NULL,
  `EmailDestinatario` varchar(50) NOT NULL,
  `Estado` enum('entregado','fallido') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `DetallesEnvíos`
--

INSERT INTO `DetallesEnvíos` (`IDDetalle`, `IDEnvío`, `EmailDestinatario`, `Estado`) VALUES
(1, 1, 'destinatario1@example.com', 'entregado'),
(2, 1, 'destinatario2@example.com', 'entregado'),
(3, 1, 'destinatario3@example.com', 'entregado'),
(4, 1, 'destinatario4@example.com', 'entregado'),
(5, 1, 'destinatario5@example.com', 'entregado'),
(6, 1, 'destinatario6@example.com', 'entregado'),
(7, 1, 'destinatario7@example.com', 'entregado'),
(8, 1, 'destinatario8@example.com', 'entregado'),
(9, 1, 'destinatario9@example.com', 'entregado'),
(10, 1, 'destinatario10@example.com', 'entregado'),
(11, 2, 'bmsjale@gmail.com', 'entregado'),
(12, 3, 'bmsjale@gmail.com', 'entregado'),
(13, 4, 'bmsjale@gmail.com', 'fallido'),
(14, 5, 'bmsjale@gmail.com', 'fallido'),
(15, 6, 'bmsjale@gmail.com', 'fallido'),
(16, 7, 'bmsjale@gmail.com', 'entregado'),
(17, 8, 'bmsjale@gmail.com', 'fallido'),
(18, 9, 'bmsjale@gmail.com', 'entregado'),
(19, 10, 'bmsjale@gmail.com', 'entregado'),
(20, 11, 'bmsjale@gmail.com', 'entregado'),
(21, 12, 'bmsjale@gmail.com', 'entregado'),
(22, 13, 'bmsjale@gmail.com', 'entregado'),
(23, 14, 'bmsjale@gmail.com', 'entregado'),
(24, 15, 'bmsjale@gmail.com', 'entregado'),
(25, 16, 'bmsjale@gmail.com', 'entregado'),
(26, 17, 'bmsjale@gmail.com', 'entregado'),
(27, 18, 'bmsjale@gmail.com', 'entregado'),
(28, 19, 'bmsjale@gmail.com', 'entregado'),
(29, 20, 'bmsjale@gmail.com', 'entregado'),
(30, 21, 'bmsjale@gmail.com', 'entregado'),
(31, 22, 'bmsjale@gmail.com', 'entregado'),
(32, 23, 'bmsjale@gmail.com', 'entregado'),
(33, 24, 'bmsjale@gmail.com', 'entregado'),
(34, 25, 'bmsjale@gmail.com', 'entregado'),
(35, 26, 'bmsjale@gmail.com', 'entregado'),
(36, 27, 'bmsjale@gmail.com', 'entregado'),
(37, 28, 'bmsjale@gmail.com', 'entregado'),
(38, 28, 'alexraicesmunto@gmail.com', 'entregado'),
(39, 29, 'bmsjale@gmail.com', 'entregado'),
(40, 30, 'alexraicesmunto@gmail.com', 'entregado'),
(41, 31, 'bmsjale@gmail.com', 'entregado'),
(42, 31, 'alexraicesmunto@gmail.com', 'entregado'),
(43, 32, 'bmsjale@gmail.com', 'entregado'),
(44, 36, 'bmsjale@gmail.com', 'entregado'),
(45, 45, 'bmsjale@gmail.com', 'entregado'),
(46, 45, 'prueba1@gmail.com', 'entregado'),
(47, 45, 'prueba2@gmail.com', 'entregado'),
(48, 45, 'prueba3@gmail.com', 'entregado'),
(49, 45, 'prueba4@gmail.com', 'entregado'),
(50, 45, 'bmsjale@gmail.com', 'entregado'),
(51, 45, 'prueba5@gmail.com', 'entregado'),
(52, 45, 'prueba6@gmail.com', 'entregado'),
(53, 45, 'prueba7@gmail.com', 'entregado'),
(54, 45, 'prueba8@gmail.com', 'entregado'),
(55, 45, 'prueba9@gmail.com', 'entregado'),
(56, 46, 'user1@example.com', 'entregado'),
(57, 46, 'user2@example.com', 'entregado'),
(58, 46, 'user3@example.com', 'entregado'),
(59, 46, 'user4@example.com', 'entregado'),
(60, 46, 'user5@example.com', 'entregado'),
(61, 46, 'bmsjale@gmail.com', 'entregado'),
(62, 46, 'user7@example.com', 'entregado'),
(63, 46, 'user8@example.com', 'entregado'),
(64, 46, 'user9@example.com', 'entregado'),
(65, 46, 'user10@example.com', 'entregado'),
(66, 47, 'bmsjale@gmail.com', 'entregado'),
(67, 48, 'user1@example.com', 'fallido'),
(68, 48, 'user2@example.com', 'fallido'),
(69, 48, 'user3@example.com', 'fallido'),
(70, 48, 'user4@example.com', 'fallido'),
(71, 48, 'user5@example.com', 'fallido'),
(72, 48, 'bmsjale@gmail.com', 'fallido'),
(73, 48, 'user7@example.com', 'fallido'),
(74, 48, 'user8@example.com', 'fallido'),
(75, 48, 'user9@example.com', 'fallido'),
(76, 48, 'user10@example.com', 'fallido'),
(77, 49, 'user1@example.com', 'entregado'),
(78, 49, 'user2@example.com', 'entregado'),
(79, 49, 'user3@example.com', 'entregado'),
(80, 49, 'user4@example.com', 'entregado'),
(81, 49, 'user5@example.com', 'entregado'),
(82, 49, 'bmsjale@gmail.com', 'entregado'),
(83, 49, 'user7@example.com', 'entregado'),
(84, 49, 'user8@example.com', 'entregado'),
(85, 49, 'user9@example.com', 'entregado'),
(86, 49, 'user10@example.com', 'entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Envíos`
--

CREATE TABLE `Envíos` (
  `IDEnvío` int(6) UNSIGNED NOT NULL,
  `IDCampaña` int(6) UNSIGNED DEFAULT NULL,
  `FechaEnvío` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TipoEnvío` enum('único','masivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Envíos`
--

INSERT INTO `Envíos` (`IDEnvío`, `IDCampaña`, `FechaEnvío`, `TipoEnvío`) VALUES
(1, 1, '2024-02-19 01:20:48', 'único'),
(2, 6, '2024-02-19 14:53:44', 'único'),
(3, 7, '2024-02-19 15:44:38', 'único'),
(4, 8, '2024-02-19 16:08:06', 'único'),
(5, 9, '2024-02-19 16:11:10', 'único'),
(6, 10, '2024-02-19 16:21:12', 'único'),
(7, 11, '2024-02-19 16:28:47', 'único'),
(8, 12, '2024-02-19 16:29:38', 'único'),
(9, 13, '2024-02-19 16:47:22', 'único'),
(10, 14, '2024-02-19 17:04:04', 'único'),
(11, 15, '2024-02-19 17:08:36', 'único'),
(12, 16, '2024-02-19 17:11:06', 'único'),
(13, 17, '2024-02-19 17:21:37', 'único'),
(14, 18, '2024-02-19 17:23:13', 'único'),
(15, 19, '2024-02-19 17:24:15', 'único'),
(16, 20, '2024-02-19 17:28:37', 'único'),
(17, 21, '2024-02-19 17:46:23', 'único'),
(18, 22, '2024-02-19 17:47:10', 'único'),
(19, 23, '2024-02-19 17:56:24', 'único'),
(20, 24, '2024-02-19 19:54:12', 'único'),
(21, 25, '2024-02-19 20:03:18', 'único'),
(22, 26, '2024-02-19 23:46:26', 'único'),
(23, 27, '2024-02-19 23:56:27', 'único'),
(24, 28, '2024-02-20 00:00:20', 'único'),
(25, 29, '2024-02-20 00:08:04', 'único'),
(26, 30, '2024-02-20 00:10:38', 'único'),
(27, 31, '2024-02-20 00:14:43', 'único'),
(28, 32, '2024-02-20 00:40:12', 'único'),
(29, 33, '2024-02-20 01:13:28', 'único'),
(30, 34, '2024-02-20 01:15:05', 'único'),
(31, 35, '2024-02-20 12:08:34', 'único'),
(32, 36, '2024-02-20 15:25:35', 'único'),
(33, 44, '2024-02-20 16:40:11', 'único'),
(34, 45, '2024-02-20 16:40:43', 'único'),
(35, 46, '2024-02-20 16:42:04', 'único'),
(36, 47, '2024-02-20 17:24:05', 'único'),
(37, 48, '2024-02-20 17:24:52', 'único'),
(38, 49, '2024-02-20 18:34:25', 'único'),
(39, 50, '2024-02-20 18:39:46', 'único'),
(40, 51, '2024-02-20 18:48:38', 'único'),
(41, 52, '2024-02-20 18:55:02', 'único'),
(42, 53, '2024-02-20 19:29:29', 'único'),
(43, 54, '2024-02-20 19:48:37', 'único'),
(44, 55, '2024-02-20 19:56:23', 'único'),
(45, 57, '2024-02-20 23:28:44', 'único'),
(46, 58, '2024-02-20 23:34:51', 'único'),
(47, 59, '2024-02-20 23:35:59', 'único'),
(48, 60, '2024-02-20 23:53:38', 'único'),
(49, 61, '2024-02-20 23:59:54', 'único');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PlantillasCorreo`
--

CREATE TABLE `PlantillasCorreo` (
  `IDPlantilla` int(6) UNSIGNED NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Asunto` varchar(255) NOT NULL,
  `Cuerpo` text NOT NULL,
  `LogoURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `PlantillasCorreo`
--

INSERT INTO `PlantillasCorreo` (`IDPlantilla`, `Nombre`, `Asunto`, `Cuerpo`, `LogoURL`) VALUES
(1, 'Vodafone Alerta de Seguridad', 'Alerta de Seguridad: Verificación Requerida Inmediatamente', '<p>Hemos detectado una actividad inusual en tu cuenta que requiere verificación inmediata. Por tu seguridad, es necesario que confirmes tu identidad.</p>', 'http://localhost/simulacion-phishing/assets/img/empresas/vodafone.png'),
(2, 'Santander Actualización Necesaria', 'Acción Requerida: Actualiza tus Datos Personales', '<p>Estimado cliente, para continuar ofreciéndote el mejor servicio, es necesario que actualices tus datos personales. Este proceso es rápido y asegura la protección de tu cuenta.</p>', 'http://localhost/simulacion-phishing/assets/img/empresas/santander.png'),
(3, 'INGDirect Confirmación de Transacción', 'Confirmación Urgente de Nueva Transacción', '<p>Se ha registrado una nueva transacción en tu cuenta que no coincide con tu patrón habitual de gastos. Por favor, confirma si has autorizado esta transacción.</p>', 'http://localhost/simulacion-phishing/assets/img/empresas/ingdirect.png'),
(4, 'CaixaBank Aviso Importante', 'Importante: Actualización de Nuestra Política de Seguridad', '<p>Como parte de nuestras continuas mejoras en seguridad, necesitamos que nuestros clientes verifiquen su información de contacto. Este proceso es crucial para evitar accesos no autorizados a tus cuentas.</p>', 'http://localhost/simulacion-phishing/assets/img/empresas/caixabank.png'),
(5, 'Correos Notificación de Envío', 'Notificación Urgente: Paquete Pendiente de Recogida', '<p>Hemos intentado entregar un paquete en tu dirección, pero no se ha podido completar la entrega. Necesitamos que confirmes tus datos de envío para programar una nueva entrega.</p>', 'http://localhost/simulacion-phishing/assets/img/empresas/correos.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PlantillasPersonalizadas`
--

CREATE TABLE `PlantillasPersonalizadas` (
  `IDPlantillaPersonalizada` int(6) UNSIGNED NOT NULL,
  `IDUsuario` int(6) UNSIGNED DEFAULT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Asunto` varchar(255) NOT NULL,
  `Cuerpo` text NOT NULL,
  `LogoURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `ID` int(6) UNSIGNED NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Ciudad` varchar(50) DEFAULT NULL,
  `Pais` varchar(50) DEFAULT NULL,
  `CodigoPostal` varchar(20) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `TipoUsuario` enum('cliente','empleado') NOT NULL,
  `FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`ID`, `Nombre`, `Email`, `Password`, `Direccion`, `Ciudad`, `Pais`, `CodigoPostal`, `Telefono`, `TipoUsuario`, `FechaRegistro`) VALUES
(1, 'Alejandro Delgado', 'prueba1@gmail.com', '$2y$10$iYlL4GHoAfe1a8Gr/FyfXOGkkMs9UndTVZPe9DDKIgSGqeDn3Ktja', 'Calle Prueba, 12345', 'Sevilla', 'España', '66666', '666666666', 'cliente', '2024-02-19 01:05:22'),
(2, 'Alejandro Delgado', 'prueba2@gmail.com', '$2y$10$FW0Si5Ta7naeZ2Gp4sHgEuZgiiLutmStSplZjHhGl04F4Jr3pAUsm', 'Calle falsa, 123', 'Sevilla', 'España', '66666', '666666666', 'cliente', '2024-02-20 01:01:27'),
(3, 'Alejandro', 'prueba3@gmail.com', '$2y$10$W6qHQFIWmyhklHUEIQgdpe.zhPTquM7XOhXVP2C6vaJYB5bxyuqca', 'Calle Falsa, 123', 'Sevilla', 'España', '66666', '666666666', 'cliente', '2024-02-20 01:13:10'),
(4, 'Alejandro', 'prueba4@gmail.com', '$2y$10$GP0pZnWlDcZJoGxWrUJCXuXJ.DQONEiMhjH5/E8dkmNE0svP0BIDu', 'Calle Falsa, 123', 'Sevilla', 'España', '66666', '666666666', 'cliente', '2024-02-20 12:06:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UsuariosRiesgoPhishing`
--

CREATE TABLE `UsuariosRiesgoPhishing` (
  `ID` int(6) UNSIGNED NOT NULL,
  `Token` varchar(255) NOT NULL,
  `IDCampaña` int(6) UNSIGNED DEFAULT NULL,
  `IDEnvío` int(6) UNSIGNED DEFAULT NULL,
  `EmailDestinatario` varchar(255) NOT NULL,
  `FechaHoraClick` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `UsuariosRiesgoPhishing`
--

INSERT INTO `UsuariosRiesgoPhishing` (`ID`, `Token`, `IDCampaña`, `IDEnvío`, `EmailDestinatario`, `FechaHoraClick`) VALUES
(1, '03a9407ce6f3b3af92b79d0f8fe8c34f', 28, 24, 'bmsjale@gmail.com', '2024-02-20 00:00:36'),
(2, '9796a30192c9f4dd627d6cc44fcc98f1', 29, 25, 'bmsjale@gmail.com', '2024-02-20 00:08:15'),
(4, '95ab92ae755e7385a52f605f9d7e3676', 30, 26, 'bmsjale@gmail.com', '2024-02-20 00:11:17'),
(5, 'd557233d5bbe5b72a685fa4b4c9618a9', 31, 27, 'bmsjale@gmail.com', '2024-02-20 00:14:51'),
(6, '445e689defa65bd4e77fed0d69cd1833', 32, 28, 'bmsjale@gmail.com', '2024-02-20 00:40:37'),
(8, '3abdcd31cab1ad417da629f14fd2dfa8', 32, 28, 'alexraicesmunto@gmail.com', '2024-02-20 00:47:25'),
(9, '4c404ada648ffcf71e173e3566282a3f', 33, 29, 'bmsjale@gmail.com', '2024-02-20 01:13:53'),
(10, '55951222e254e0acedd2795d90cd9274', 35, 31, 'bmsjale@gmail.com', '2024-02-20 12:09:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Campañas`
--
ALTER TABLE `Campañas`
  ADD PRIMARY KEY (`IDCampaña`),
  ADD KEY `IDUsuario` (`IDUsuario`),
  ADD KEY `IDPlantilla` (`IDPlantilla`),
  ADD KEY `IDPlantillaPersonalizada` (`IDPlantillaPersonalizada`);

--
-- Indices de la tabla `Clicks`
--
ALTER TABLE `Clicks`
  ADD PRIMARY KEY (`IDClick`),
  ADD KEY `IDEnvío` (`IDEnvío`),
  ADD KEY `IDDestinatario` (`IDDestinatario`);

--
-- Indices de la tabla `DestinatariosCampaña`
--
ALTER TABLE `DestinatariosCampaña`
  ADD PRIMARY KEY (`IDDestinatario`),
  ADD KEY `IDCampaña` (`IDCampaña`);

--
-- Indices de la tabla `DetallesEnvíos`
--
ALTER TABLE `DetallesEnvíos`
  ADD PRIMARY KEY (`IDDetalle`),
  ADD KEY `IDEnvío` (`IDEnvío`);

--
-- Indices de la tabla `Envíos`
--
ALTER TABLE `Envíos`
  ADD PRIMARY KEY (`IDEnvío`),
  ADD KEY `IDCampaña` (`IDCampaña`);

--
-- Indices de la tabla `PlantillasCorreo`
--
ALTER TABLE `PlantillasCorreo`
  ADD PRIMARY KEY (`IDPlantilla`);

--
-- Indices de la tabla `PlantillasPersonalizadas`
--
ALTER TABLE `PlantillasPersonalizadas`
  ADD PRIMARY KEY (`IDPlantillaPersonalizada`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indices de la tabla `UsuariosRiesgoPhishing`
--
ALTER TABLE `UsuariosRiesgoPhishing`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Token` (`Token`),
  ADD KEY `IDCampaña` (`IDCampaña`),
  ADD KEY `IDEnvío` (`IDEnvío`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Campañas`
--
ALTER TABLE `Campañas`
  MODIFY `IDCampaña` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `Clicks`
--
ALTER TABLE `Clicks`
  MODIFY `IDClick` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `DestinatariosCampaña`
--
ALTER TABLE `DestinatariosCampaña`
  MODIFY `IDDestinatario` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `DetallesEnvíos`
--
ALTER TABLE `DetallesEnvíos`
  MODIFY `IDDetalle` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `Envíos`
--
ALTER TABLE `Envíos`
  MODIFY `IDEnvío` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `PlantillasCorreo`
--
ALTER TABLE `PlantillasCorreo`
  MODIFY `IDPlantilla` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `PlantillasPersonalizadas`
--
ALTER TABLE `PlantillasPersonalizadas`
  MODIFY `IDPlantillaPersonalizada` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `UsuariosRiesgoPhishing`
--
ALTER TABLE `UsuariosRiesgoPhishing`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Campañas`
--
ALTER TABLE `Campañas`
  ADD CONSTRAINT `campañas_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `Usuarios` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `campañas_ibfk_2` FOREIGN KEY (`IDPlantilla`) REFERENCES `PlantillasCorreo` (`IDPlantilla`) ON DELETE SET NULL,
  ADD CONSTRAINT `campañas_ibfk_3` FOREIGN KEY (`IDPlantillaPersonalizada`) REFERENCES `PlantillasPersonalizadas` (`IDPlantillaPersonalizada`) ON DELETE SET NULL;

--
-- Filtros para la tabla `Clicks`
--
ALTER TABLE `Clicks`
  ADD CONSTRAINT `clicks_ibfk_1` FOREIGN KEY (`IDEnvío`) REFERENCES `Envíos` (`IDEnvío`) ON DELETE CASCADE,
  ADD CONSTRAINT `clicks_ibfk_2` FOREIGN KEY (`IDDestinatario`) REFERENCES `DestinatariosCampaña` (`IDDestinatario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `DestinatariosCampaña`
--
ALTER TABLE `DestinatariosCampaña`
  ADD CONSTRAINT `destinatarioscampaña_ibfk_1` FOREIGN KEY (`IDCampaña`) REFERENCES `Campañas` (`IDCampaña`) ON DELETE CASCADE;

--
-- Filtros para la tabla `DetallesEnvíos`
--
ALTER TABLE `DetallesEnvíos`
  ADD CONSTRAINT `detallesenvíos_ibfk_1` FOREIGN KEY (`IDEnvío`) REFERENCES `Envíos` (`IDEnvío`) ON DELETE CASCADE;

--
-- Filtros para la tabla `Envíos`
--
ALTER TABLE `Envíos`
  ADD CONSTRAINT `envíos_ibfk_1` FOREIGN KEY (`IDCampaña`) REFERENCES `Campañas` (`IDCampaña`) ON DELETE CASCADE;

--
-- Filtros para la tabla `PlantillasPersonalizadas`
--
ALTER TABLE `PlantillasPersonalizadas`
  ADD CONSTRAINT `plantillaspersonalizadas_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `Usuarios` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `UsuariosRiesgoPhishing`
--
ALTER TABLE `UsuariosRiesgoPhishing`
  ADD CONSTRAINT `usuariosriesgophishing_ibfk_1` FOREIGN KEY (`IDCampaña`) REFERENCES `Campañas` (`IDCampaña`),
  ADD CONSTRAINT `usuariosriesgophishing_ibfk_2` FOREIGN KEY (`IDEnvío`) REFERENCES `Envíos` (`IDEnvío`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
