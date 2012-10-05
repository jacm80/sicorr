-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-10-2012 a las 09:29:33
-- Versión del servidor: 5.1.63
-- Versión de PHP: 5.3.6-13ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sicorr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adjuntos`
--

CREATE TABLE IF NOT EXISTS `adjuntos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `archivo` text NOT NULL,
  `correspondencia_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` datetime NOT NULL,
  `estatus_adjunto_id` int(20) NOT NULL,
  `respuesta` text NOT NULL,
  `ultima_respuesta` datetime NOT NULL,
  `ultima_revision` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `adjuntos`
--

INSERT INTO `adjuntos` (`id`, `archivo`, `correspondencia_id`, `usuario_id`, `mensaje`, `fecha`, `estatus_adjunto_id`, `respuesta`, `ultima_respuesta`, `ultima_revision`) VALUES
(6, '4fedbb74688cb.txt', 22, 5, 'disculpe no volvera a suceder', '0000-00-00 00:00:00', 3, 'mas te vale', '2012-10-02 08:01:55', '2012-10-03 14:56:47'),
(10, '4fee027eac024.txt', 22, 5, 'sfdfdfsf', '0000-00-00 00:00:00', 0, 'no me gusto muy pajuo', '0000-00-00 00:00:00', '2012-10-03 14:56:47'),
(11, '4fee02950b9d9.php', 22, 5, 'me lo mama', '0000-00-00 00:00:00', 2, '', '0000-00-00 00:00:00', '2012-10-03 14:56:47'),
(12, '4ff20c50587da.pdf', 22, 5, 'plan de sigesp', '0000-00-00 00:00:00', 0, '8-O que maloooooooooo', '0000-00-00 00:00:00', '2012-10-03 14:56:47'),
(16, '5058bd8eeab00.JPG', 38, 5, 'asdada', '0000-00-00 00:00:00', 3, '', '0000-00-00 00:00:00', '2012-10-03 14:56:42'),
(17, '5064575e00047.JPG', 41, 5, 'buenos dias contralora aqui esta el archivo que me pidio', '0000-00-00 00:00:00', 0, 'hay que mejorarlo', '2012-09-27 10:35:18', '2012-10-03 14:55:09'),
(18, '5065c7c414465.txt', 43, 6, 'yeahhhhh', '0000-00-00 00:00:00', 3, 'hector fumate un porro', '2012-10-01 13:27:16', '2012-10-03 14:21:09'),
(20, '506c89adc4a80.jpg', 45, 6, 'la ayudaita', '0000-00-00 00:00:00', 3, 'cambiale tal cosa', '2012-10-03 14:31:54', '2012-10-03 14:33:16'),
(21, '506c8ede99432.jpg', 45, 5, 'este si es', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00', '2012-10-03 14:56:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `fechahora` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre_usuario` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=418 ;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `descripcion`, `fechahora`, `usuario_id`, `nombre_usuario`) VALUES
(1, 'Vaciar la tabla bitacora', '2012-10-02 15:13:34', 3, 'Richard Jimenez'),
(2, 'bitacora', '2012-10-02 15:13:34', 3, 'Richard Jimenez'),
(3, 'bitacora', '2012-10-02 15:39:28', 3, 'Richard Jimenez'),
(4, 'organismo', '2012-10-02 15:39:33', 3, 'Richard Jimenez'),
(5, 'buzon', '2012-10-02 15:39:34', 3, 'Richard Jimenez'),
(6, 'Login del Sistema', '2012-10-03 07:54:01', 3, 'Richard Jimenez'),
(7, 'buzon', '2012-10-03 07:54:02', 3, 'Richard Jimenez'),
(8, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 07:54:06', 3, 'Richard Jimenez'),
(9, 'bitacora', '2012-10-03 08:04:12', 3, 'Richard Jimenez'),
(10, 'buzon', '2012-10-03 08:04:20', 3, 'Richard Jimenez'),
(11, 'denegado', '2012-10-03 08:04:23', 3, 'Richard Jimenez'),
(12, 'buzon', '2012-10-03 08:04:26', 3, 'Richard Jimenez'),
(13, 'buzon', '2012-10-03 08:04:33', 3, 'Richard Jimenez'),
(14, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 08:04:39', 3, 'Richard Jimenez'),
(15, 'buzon (show_msg_admin)', '2012-10-03 08:04:42', 3, 'Richard Jimenez'),
(16, 'correspondencia (nuevo)', '2012-10-03 08:05:03', 3, 'Richard Jimenez'),
(17, 'bitacora', '2012-10-03 08:05:06', 3, 'Richard Jimenez'),
(18, 'buzon', '2012-10-03 08:16:51', 3, 'Richard Jimenez'),
(19, 'organismo', '2012-10-03 08:16:53', 3, 'Richard Jimenez'),
(20, 'dependencia', '2012-10-03 08:16:55', 3, 'Richard Jimenez'),
(21, 'contacto', '2012-10-03 08:16:56', 3, 'Richard Jimenez'),
(22, 'contacto (nuevo)', '2012-10-03 08:16:59', 3, 'Richard Jimenez'),
(23, 'dependencia', '2012-10-03 08:17:02', 3, 'Richard Jimenez'),
(24, 'contacto', '2012-10-03 08:17:05', 3, 'Richard Jimenez'),
(25, 'correspondencia (nuevo)', '2012-10-03 08:17:07', 3, 'Richard Jimenez'),
(26, 'reporte', '2012-10-03 08:17:09', 3, 'Richard Jimenez'),
(27, 'reporte', '2012-10-03 08:17:11', 3, 'Richard Jimenez'),
(28, 'usuario', '2012-10-03 08:17:16', 3, 'Richard Jimenez'),
(29, 'bitacora', '2012-10-03 08:17:19', 3, 'Richard Jimenez'),
(30, 'bitacora', '2012-10-03 08:23:35', 3, 'Richard Jimenez'),
(31, 'bitacora', '2012-10-03 08:24:42', 3, 'Richard Jimenez'),
(32, 'bitacora', '2012-10-03 08:25:08', 3, 'Richard Jimenez'),
(33, 'bitacora', '2012-10-03 08:25:25', 3, 'Richard Jimenez'),
(34, 'dependencia', '2012-10-03 08:25:40', 3, 'Richard Jimenez'),
(35, 'buzon', '2012-10-03 08:25:43', 3, 'Richard Jimenez'),
(36, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 08:25:47', 3, 'Richard Jimenez'),
(37, 'buzon', '2012-10-03 08:25:51', 3, 'Richard Jimenez'),
(38, 'correspondencia (editar)', '2012-10-03 08:25:52', 3, 'Richard Jimenez'),
(39, 'buzon', '2012-10-03 08:26:04', 3, 'Richard Jimenez'),
(40, 'consulta', '2012-10-03 08:26:14', 3, 'Richard Jimenez'),
(41, 'consulta (llenar_grid)', '2012-10-03 08:26:14', 3, 'Richard Jimenez'),
(42, 'consulta', '2012-10-03 09:35:41', 3, 'Richard Jimenez'),
(43, 'consulta (llenar_grid)', '2012-10-03 09:35:42', 3, 'Richard Jimenez'),
(44, 'bitacora', '2012-10-03 09:35:44', 3, 'Richard Jimenez'),
(45, 'reporte', '2012-10-03 09:36:21', 3, 'Richard Jimenez'),
(46, 'buzon', '2012-10-03 09:36:32', 3, 'Richard Jimenez'),
(47, 'buzon', '2012-10-03 09:40:16', 3, 'Richard Jimenez'),
(48, 'buzon', '2012-10-03 09:40:50', 3, 'Richard Jimenez'),
(49, 'buzon', '2012-10-03 09:40:54', 3, 'Richard Jimenez'),
(50, 'buzon', '2012-10-03 09:40:58', 3, 'Richard Jimenez'),
(51, 'buzon', '2012-10-03 09:41:22', 3, 'Richard Jimenez'),
(52, 'buzon', '2012-10-03 09:41:26', 3, 'Richard Jimenez'),
(53, 'buzon', '2012-10-03 09:41:42', 3, 'Richard Jimenez'),
(54, 'buzon', '2012-10-03 09:41:54', 3, 'Richard Jimenez'),
(55, 'buzon', '2012-10-03 09:42:00', 3, 'Richard Jimenez'),
(56, 'buzon', '2012-10-03 09:42:25', 3, 'Richard Jimenez'),
(57, 'buzon', '2012-10-03 09:42:31', 3, 'Richard Jimenez'),
(58, 'buzon', '2012-10-03 09:42:34', 3, 'Richard Jimenez'),
(59, 'Salida del Sistema', '2012-10-03 09:42:48', 3, 'Richard Jimenez'),
(60, 'Login del Sistema', '2012-10-03 09:42:56', 4, 'Jackson  Florez'),
(61, 'correspondencia (nuevo)', '2012-10-03 09:42:56', 4, 'Jackson  Florez'),
(62, 'Salida del Sistema', '2012-10-03 09:42:59', 4, 'Jackson  Florez'),
(63, 'Login del Sistema', '2012-10-03 09:43:06', 3, 'Richard Jimenez'),
(64, 'buzon', '2012-10-03 09:43:06', 3, 'Richard Jimenez'),
(65, 'buzon', '2012-10-03 09:43:15', 3, 'Richard Jimenez'),
(66, 'buzon', '2012-10-03 09:43:41', 3, 'Richard Jimenez'),
(67, 'buzon', '2012-10-03 09:43:52', 3, 'Richard Jimenez'),
(68, 'buzon', '2012-10-03 09:44:03', 3, 'Richard Jimenez'),
(69, 'bitacora', '2012-10-03 09:45:59', 3, 'Richard Jimenez'),
(70, 'bitacora', '2012-10-03 09:46:13', 3, 'Richard Jimenez'),
(71, 'bitacora', '2012-10-03 09:46:16', 3, 'Richard Jimenez'),
(72, 'bitacora', '2012-10-03 09:46:47', 3, 'Richard Jimenez'),
(73, '', '2012-10-03 09:47:05', 3, 'Richard Jimenez'),
(74, '', '2012-10-03 09:47:23', 3, 'Richard Jimenez'),
(75, 'organismo', '2012-10-03 09:47:26', 3, 'Richard Jimenez'),
(76, 'consulta', '2012-10-03 09:47:27', 3, 'Richard Jimenez'),
(77, 'consulta (llenar_grid)', '2012-10-03 09:47:28', 3, 'Richard Jimenez'),
(78, 'bitacora', '2012-10-03 09:47:30', 3, 'Richard Jimenez'),
(79, 'Salida del Sistema', '2012-10-03 09:47:32', 3, 'Richard Jimenez'),
(80, 'Login del Sistema', '2012-10-03 12:42:14', 3, 'Richard Jimenez'),
(81, 'buzon', '2012-10-03 12:42:15', 3, 'Richard Jimenez'),
(82, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 12:43:20', 3, 'Richard Jimenez'),
(83, 'buzon (show_msg_admin)', '2012-10-03 12:43:22', 3, 'Richard Jimenez'),
(84, 'bitacora', '2012-10-03 12:45:34', 3, 'Richard Jimenez'),
(85, 'bitacora', '2012-10-03 12:45:43', 3, 'Richard Jimenez'),
(86, 'usuario', '2012-10-03 12:45:45', 3, 'Richard Jimenez'),
(87, 'usuario', '2012-10-03 12:45:52', 3, 'Richard Jimenez'),
(88, 'bitacora', '2012-10-03 12:45:55', 3, 'Richard Jimenez'),
(89, 'bitacora', '2012-10-03 12:46:14', 3, 'Richard Jimenez'),
(90, 'bitacora', '2012-10-03 12:48:20', 3, 'Richard Jimenez'),
(91, 'bitacora', '2012-10-03 12:48:28', 3, 'Richard Jimenez'),
(92, 'bitacora', '2012-10-03 12:48:33', 3, 'Richard Jimenez'),
(93, 'bitacora', '2012-10-03 12:48:36', 3, 'Richard Jimenez'),
(94, 'bitacora', '2012-10-03 12:51:00', 3, 'Richard Jimenez'),
(95, 'Login del Sistema', '2012-10-03 13:29:36', 4, 'Jackson  Florez'),
(96, 'correspondencia (nuevo)', '2012-10-03 13:29:36', 4, 'Jackson  Florez'),
(97, 'Salida del Sistema', '2012-10-03 13:30:44', 3, 'Richard Jimenez'),
(98, 'Login del Sistema', '2012-10-03 13:31:12', 4, 'Jackson  Florez'),
(99, 'correspondencia (nuevo)', '2012-10-03 13:31:12', 4, 'Jackson  Florez'),
(100, 'correspondencia (llenar_contactos)', '2012-10-03 13:32:10', 4, 'Jackson  Florez'),
(101, 'correspondencia (llenar_contactos)', '2012-10-03 13:32:15', 4, 'Jackson  Florez'),
(102, 'correspondencia (llenar_contactos)', '2012-10-03 13:32:20', 4, 'Jackson  Florez'),
(103, 'correspondencia', '2012-10-03 13:32:23', 4, 'Jackson  Florez'),
(104, 'correspondencia (editar)', '2012-10-03 13:32:36', 4, 'Jackson  Florez'),
(105, 'correspondencia (editar_info)', '2012-10-03 13:32:45', 4, 'Jackson  Florez'),
(106, 'Salida del Sistema', '2012-10-03 13:32:50', 4, 'Jackson  Florez'),
(107, 'Login del Sistema', '2012-10-03 13:33:04', 3, 'Richard Jimenez'),
(108, 'buzon', '2012-10-03 13:33:04', 3, 'Richard Jimenez'),
(109, 'correspondencia (editar)', '2012-10-03 13:33:28', 3, 'Richard Jimenez'),
(110, 'correspondencia (add_instruccion)', '2012-10-03 13:33:37', 3, 'Richard Jimenez'),
(111, 'correspondencia (guardar_instruccion)', '2012-10-03 13:34:48', 3, 'Richard Jimenez'),
(112, 'buzon', '2012-10-03 13:35:02', 3, 'Richard Jimenez'),
(113, 'Salida del Sistema', '2012-10-03 13:35:52', 3, 'Richard Jimenez'),
(114, 'Login del Sistema', '2012-10-03 13:36:04', 5, 'Yelinet Ramos'),
(115, 'buzon', '2012-10-03 13:36:04', 5, 'Yelinet Ramos'),
(116, 'correspondencia (editar)', '2012-10-03 13:36:16', 5, 'Yelinet Ramos'),
(117, 'buzon', '2012-10-03 13:36:21', 5, 'Yelinet Ramos'),
(118, 'correspondencia (editar)', '2012-10-03 13:36:29', 5, 'Yelinet Ramos'),
(119, 'buzon', '2012-10-03 13:36:44', 5, 'Yelinet Ramos'),
(120, 'correspondencia (editar)', '2012-10-03 13:37:04', 5, 'Yelinet Ramos'),
(121, 'correspondencia (editar_info)', '2012-10-03 13:37:07', 5, 'Yelinet Ramos'),
(122, 'correspondencia (editar)', '2012-10-03 13:37:30', 5, 'Yelinet Ramos'),
(123, 'correspondencia (adjuntar)', '2012-10-03 13:37:35', 5, 'Yelinet Ramos'),
(124, 'correspondencia (editar)', '2012-10-03 13:38:00', 5, 'Yelinet Ramos'),
(125, 'correspondencia (adjuntar)', '2012-10-03 13:38:04', 5, 'Yelinet Ramos'),
(126, 'correspondencia (editar)', '2012-10-03 13:40:12', 5, 'Yelinet Ramos'),
(127, 'correspondencia (adjuntar)', '2012-10-03 13:40:17', 5, 'Yelinet Ramos'),
(128, 'correspondencia (editar)', '2012-10-03 13:40:22', 5, 'Yelinet Ramos'),
(129, 'Salida del Sistema', '2012-10-03 13:40:55', 5, 'Yelinet Ramos'),
(130, 'Login del Sistema', '2012-10-03 13:41:05', 3, 'Richard Jimenez'),
(131, 'buzon', '2012-10-03 13:41:05', 3, 'Richard Jimenez'),
(132, 'correspondencia (editar)', '2012-10-03 13:42:00', 3, 'Richard Jimenez'),
(133, 'buzon', '2012-10-03 13:42:51', 3, 'Richard Jimenez'),
(134, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 13:42:55', 3, 'Richard Jimenez'),
(135, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 13:43:13', 3, 'Richard Jimenez'),
(136, 'buzon', '2012-10-03 13:43:18', 3, 'Richard Jimenez'),
(137, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 13:43:20', 3, 'Richard Jimenez'),
(138, 'buzon', '2012-10-03 13:43:27', 3, 'Richard Jimenez'),
(139, 'correspondencia (editar)', '2012-10-03 13:43:31', 3, 'Richard Jimenez'),
(140, 'Login del Sistema', '2012-10-03 13:45:59', 3, 'Richard Jimenez'),
(141, 'buzon', '2012-10-03 13:45:59', 3, 'Richard Jimenez'),
(142, 'correspondencia (editar)', '2012-10-03 13:46:09', 3, 'Richard Jimenez'),
(143, 'correspondencia (editar)', '2012-10-03 13:47:43', 3, 'Richard Jimenez'),
(144, 'correspondencia (editar)', '2012-10-03 13:51:00', 3, 'Richard Jimenez'),
(145, 'correspondencia (editar)', '2012-10-03 13:52:27', 3, 'Richard Jimenez'),
(146, 'buzon', '2012-10-03 13:52:46', 3, 'Richard Jimenez'),
(147, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 13:52:50', 3, 'Richard Jimenez'),
(148, 'buzon', '2012-10-03 13:54:25', 3, 'Richard Jimenez'),
(149, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 13:54:28', 3, 'Richard Jimenez'),
(150, 'buzon', '2012-10-03 13:54:32', 3, 'Richard Jimenez'),
(151, 'correspondencia (editar)', '2012-10-03 13:54:34', 3, 'Richard Jimenez'),
(152, 'correspondencia (editar)', '2012-10-03 13:56:14', 3, 'Richard Jimenez'),
(153, 'correspondencia (editar)', '2012-10-03 13:56:53', 3, 'Richard Jimenez'),
(154, 'correspondencia (editar)', '2012-10-03 13:57:36', 3, 'Richard Jimenez'),
(155, 'correspondencia (editar)', '2012-10-03 13:57:41', 3, 'Richard Jimenez'),
(156, 'correspondencia (editar)', '2012-10-03 13:58:24', 3, 'Richard Jimenez'),
(157, 'correspondencia (editar)', '2012-10-03 13:59:01', 3, 'Richard Jimenez'),
(158, 'correspondencia (editar)', '2012-10-03 14:00:02', 3, 'Richard Jimenez'),
(159, 'correspondencia (editar)', '2012-10-03 14:00:41', 3, 'Richard Jimenez'),
(160, 'correspondencia (editar)', '2012-10-03 14:03:49', 3, 'Richard Jimenez'),
(161, 'correspondencia (editar)', '2012-10-03 14:03:52', 3, 'Richard Jimenez'),
(162, 'correspondencia (editar)', '2012-10-03 14:04:41', 3, 'Richard Jimenez'),
(163, 'correspondencia (editar)', '2012-10-03 14:09:17', 3, 'Richard Jimenez'),
(164, 'correspondencia (editar)', '2012-10-03 14:09:34', 3, 'Richard Jimenez'),
(165, 'buzon', '2012-10-03 14:09:48', 3, 'Richard Jimenez'),
(166, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:09:51', 3, 'Richard Jimenez'),
(167, 'Salida del Sistema', '2012-10-03 14:10:07', 3, 'Richard Jimenez'),
(168, 'Login del Sistema', '2012-10-03 14:10:12', 5, 'Yelinet Ramos'),
(169, 'buzon', '2012-10-03 14:10:12', 5, 'Yelinet Ramos'),
(170, 'correspondencia (editar)', '2012-10-03 14:10:22', 5, 'Yelinet Ramos'),
(171, 'correspondencia (editar)', '2012-10-03 14:16:05', 5, 'Yelinet Ramos'),
(172, 'correspondencia (editar)', '2012-10-03 14:16:52', 5, 'Yelinet Ramos'),
(173, 'Salida del Sistema', '2012-10-03 14:17:02', 5, 'Yelinet Ramos'),
(174, 'Login del Sistema', '2012-10-03 14:17:10', 3, 'Richard Jimenez'),
(175, 'buzon', '2012-10-03 14:17:10', 3, 'Richard Jimenez'),
(176, 'correspondencia (editar)', '2012-10-03 14:17:16', 3, 'Richard Jimenez'),
(177, 'correspondencia (editar)', '2012-10-03 14:17:26', 3, 'Richard Jimenez'),
(178, 'Salida del Sistema', '2012-10-03 14:17:59', 3, 'Richard Jimenez'),
(179, 'Login del Sistema', '2012-10-03 14:18:07', 6, 'Hector Colmenares'),
(180, 'buzon', '2012-10-03 14:18:07', 6, 'Hector Colmenares'),
(181, 'correspondencia (editar)', '2012-10-03 14:18:13', 6, 'Hector Colmenares'),
(182, 'correspondencia (editar)', '2012-10-03 14:20:38', 6, 'Hector Colmenares'),
(183, 'buzon', '2012-10-03 14:20:57', 6, 'Hector Colmenares'),
(184, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:21:09', 6, 'Hector Colmenares'),
(185, 'dependencia', '2012-10-03 14:22:54', 6, 'Hector Colmenares'),
(186, 'buzon', '2012-10-03 14:23:02', 6, 'Hector Colmenares'),
(187, 'Salida del Sistema', '2012-10-03 14:23:07', 6, 'Hector Colmenares'),
(188, 'Login del Sistema', '2012-10-03 14:23:13', 6, 'Hector Colmenares'),
(189, 'buzon', '2012-10-03 14:23:13', 6, 'Hector Colmenares'),
(190, 'correspondencia (editar)', '2012-10-03 14:23:19', 6, 'Hector Colmenares'),
(191, 'correspondencia (adjuntar)', '2012-10-03 14:23:22', 6, 'Hector Colmenares'),
(192, 'correspondencia (editar)', '2012-10-03 14:23:33', 6, 'Hector Colmenares'),
(193, 'correspondencia (editar)', '2012-10-03 14:23:41', 6, 'Hector Colmenares'),
(194, 'buzon', '2012-10-03 14:23:51', 6, 'Hector Colmenares'),
(195, 'correspondencia (editar)', '2012-10-03 14:23:55', 6, 'Hector Colmenares'),
(196, 'buzon', '2012-10-03 14:24:03', 6, 'Hector Colmenares'),
(197, 'correspondencia (editar)', '2012-10-03 14:24:10', 6, 'Hector Colmenares'),
(198, 'Salida del Sistema', '2012-10-03 14:24:19', 6, 'Hector Colmenares'),
(199, 'Login del Sistema', '2012-10-03 14:24:26', 3, 'Richard Jimenez'),
(200, 'buzon', '2012-10-03 14:24:26', 3, 'Richard Jimenez'),
(201, 'correspondencia (editar)', '2012-10-03 14:24:32', 3, 'Richard Jimenez'),
(202, 'Salida del Sistema', '2012-10-03 14:30:40', 4, 'Jackson  Florez'),
(203, 'Login del Sistema', '2012-10-03 14:30:51', 3, 'Richard Jimenez'),
(204, 'buzon', '2012-10-03 14:30:51', 3, 'Richard Jimenez'),
(205, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:31:07', 3, 'Richard Jimenez'),
(206, 'buzon (cambiar_estatus_adjunto)', '2012-10-03 14:31:31', 3, 'Richard Jimenez'),
(207, 'buzon (cambiar_estatus_adjunto)', '2012-10-03 14:31:38', 3, 'Richard Jimenez'),
(208, 'buzon (show_msg_admin)', '2012-10-03 14:31:44', 3, 'Richard Jimenez'),
(209, 'buzon (guardar_respuesta_adjunto)', '2012-10-03 14:31:54', 3, 'Richard Jimenez'),
(210, 'Salida del Sistema', '2012-10-03 14:32:01', 3, 'Richard Jimenez'),
(211, 'Login del Sistema', '2012-10-03 14:32:10', 6, 'Hector Colmenares'),
(212, 'buzon', '2012-10-03 14:32:11', 6, 'Hector Colmenares'),
(213, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:32:33', 6, 'Hector Colmenares'),
(214, 'buzon', '2012-10-03 14:32:52', 6, 'Hector Colmenares'),
(215, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:32:55', 6, 'Hector Colmenares'),
(216, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:33:16', 6, 'Hector Colmenares'),
(217, 'correspondencia (editar)', '2012-10-03 14:33:24', 6, 'Hector Colmenares'),
(218, 'consulta', '2012-10-03 14:34:31', 6, 'Hector Colmenares'),
(219, 'consulta (llenar_grid)', '2012-10-03 14:34:32', 6, 'Hector Colmenares'),
(220, 'Salida del Sistema', '2012-10-03 14:34:43', 6, 'Hector Colmenares'),
(221, 'Login del Sistema', '2012-10-03 14:34:54', 3, 'Richard Jimenez'),
(222, 'buzon', '2012-10-03 14:34:54', 3, 'Richard Jimenez'),
(223, 'bitacora', '2012-10-03 14:35:07', 3, 'Richard Jimenez'),
(224, 'buzon', '2012-10-03 14:36:13', 3, 'Richard Jimenez'),
(225, 'buzon', '2012-10-03 14:36:44', 3, 'Richard Jimenez'),
(226, 'buzon', '2012-10-03 14:36:58', 3, 'Richard Jimenez'),
(227, 'Salida del Sistema', '2012-10-03 14:39:29', 3, 'Richard Jimenez'),
(228, 'Login del Sistema', '2012-10-03 14:39:35', 5, 'Yelinet Ramos'),
(229, 'buzon', '2012-10-03 14:39:35', 5, 'Yelinet Ramos'),
(230, 'correspondencia (editar)', '2012-10-03 14:39:45', 5, 'Yelinet Ramos'),
(231, 'correspondencia (editar)', '2012-10-03 14:40:23', 5, 'Yelinet Ramos'),
(232, 'correspondencia (editar)', '2012-10-03 14:40:41', 5, 'Yelinet Ramos'),
(233, 'correspondencia (editar)', '2012-10-03 14:41:50', 5, 'Yelinet Ramos'),
(234, 'correspondencia (editar)', '2012-10-03 14:42:18', 5, 'Yelinet Ramos'),
(235, 'correspondencia (editar)', '2012-10-03 14:42:27', 5, 'Yelinet Ramos'),
(236, 'correspondencia (editar)', '2012-10-03 14:42:50', 5, 'Yelinet Ramos'),
(237, 'correspondencia (editar)', '2012-10-03 14:43:23', 5, 'Yelinet Ramos'),
(238, 'correspondencia (editar)', '2012-10-03 14:43:45', 5, 'Yelinet Ramos'),
(239, 'correspondencia (editar)', '2012-10-03 14:44:09', 5, 'Yelinet Ramos'),
(240, 'correspondencia (editar)', '2012-10-03 14:44:30', 5, 'Yelinet Ramos'),
(241, 'correspondencia (editar)', '2012-10-03 14:44:44', 5, 'Yelinet Ramos'),
(242, 'correspondencia (eliminar_adjunto)', '2012-10-03 14:45:33', 5, 'Yelinet Ramos'),
(243, 'correspondencia (adjuntar)', '2012-10-03 14:45:34', 5, 'Yelinet Ramos'),
(244, 'correspondencia (editar)', '2012-10-03 14:45:42', 5, 'Yelinet Ramos'),
(245, 'Salida del Sistema', '2012-10-03 14:45:49', 5, 'Yelinet Ramos'),
(246, 'Login del Sistema', '2012-10-03 14:45:55', 3, 'Richard Jimenez'),
(247, 'buzon', '2012-10-03 14:45:55', 3, 'Richard Jimenez'),
(248, 'correspondencia (editar)', '2012-10-03 14:46:01', 3, 'Richard Jimenez'),
(249, 'Salida del Sistema', '2012-10-03 14:47:26', 3, 'Richard Jimenez'),
(250, 'Login del Sistema', '2012-10-03 14:47:31', 5, 'Yelinet Ramos'),
(251, 'buzon', '2012-10-03 14:47:31', 5, 'Yelinet Ramos'),
(252, 'correspondencia (editar)', '2012-10-03 14:47:36', 5, 'Yelinet Ramos'),
(253, 'correspondencia (editar)', '2012-10-03 14:49:31', 5, 'Yelinet Ramos'),
(254, 'buzon', '2012-10-03 14:50:50', 5, 'Yelinet Ramos'),
(255, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:50:56', 5, 'Yelinet Ramos'),
(256, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:50:59', 5, 'Yelinet Ramos'),
(257, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:51:06', 5, 'Yelinet Ramos'),
(258, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:51:10', 5, 'Yelinet Ramos'),
(259, 'buzon', '2012-10-03 14:52:04', 5, 'Yelinet Ramos'),
(260, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:52:07', 5, 'Yelinet Ramos'),
(261, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:52:09', 5, 'Yelinet Ramos'),
(262, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:52:13', 5, 'Yelinet Ramos'),
(263, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:52:16', 5, 'Yelinet Ramos'),
(264, 'buzon', '2012-10-03 14:52:33', 5, 'Yelinet Ramos'),
(265, 'buzon', '2012-10-03 14:52:58', 5, 'Yelinet Ramos'),
(266, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:53:01', 5, 'Yelinet Ramos'),
(267, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:53:05', 5, 'Yelinet Ramos'),
(268, 'buzon', '2012-10-03 14:53:43', 5, 'Yelinet Ramos'),
(269, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:53:47', 5, 'Yelinet Ramos'),
(270, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:53:53', 5, 'Yelinet Ramos'),
(271, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:53:56', 5, 'Yelinet Ramos'),
(272, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:53:59', 5, 'Yelinet Ramos'),
(273, 'dependencia', '2012-10-03 14:54:54', 5, 'Yelinet Ramos'),
(274, 'contacto', '2012-10-03 14:54:56', 5, 'Yelinet Ramos'),
(275, 'buzon', '2012-10-03 14:54:57', 5, 'Yelinet Ramos'),
(276, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:55:01', 5, 'Yelinet Ramos'),
(277, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:55:09', 5, 'Yelinet Ramos'),
(278, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:55:13', 5, 'Yelinet Ramos'),
(279, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:56:38', 5, 'Yelinet Ramos'),
(280, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:56:43', 5, 'Yelinet Ramos'),
(281, 'buzon (cambiar_estatus_adjuntos)', '2012-10-03 14:56:47', 5, 'Yelinet Ramos'),
(282, 'buzon', '2012-10-03 14:56:54', 5, 'Yelinet Ramos'),
(283, 'Salida del Sistema', '2012-10-03 14:59:36', 5, 'Yelinet Ramos'),
(284, 'Login del Sistema', '2012-10-03 14:59:43', 3, 'Richard Jimenez'),
(285, 'buzon', '2012-10-03 14:59:43', 3, 'Richard Jimenez'),
(286, 'bitacora', '2012-10-03 14:59:48', 3, 'Richard Jimenez'),
(287, 'organismo', '2012-10-03 15:02:12', 3, 'Richard Jimenez'),
(288, 'dependencia', '2012-10-03 15:02:13', 3, 'Richard Jimenez'),
(289, 'contacto', '2012-10-03 15:02:15', 3, 'Richard Jimenez'),
(290, 'contacto (nuevo)', '2012-10-03 15:02:20', 3, 'Richard Jimenez'),
(291, 'dependencia', '2012-10-03 15:02:28', 3, 'Richard Jimenez'),
(292, 'dependencia (nuevo)', '2012-10-03 15:02:29', 3, 'Richard Jimenez'),
(293, 'bitacora', '2012-10-03 15:08:41', 3, 'Richard Jimenez'),
(294, 'bitacora', '2012-10-03 15:08:50', 3, 'Richard Jimenez'),
(295, 'bitacora', '2012-10-03 15:09:00', 3, 'Richard Jimenez'),
(296, 'bitacora', '2012-10-03 15:09:34', 3, 'Richard Jimenez'),
(297, 'bitacora', '2012-10-03 15:09:35', 3, 'Richard Jimenez'),
(298, 'bitacora', '2012-10-03 15:09:35', 3, 'Richard Jimenez'),
(299, 'bitacora', '2012-10-03 15:09:35', 3, 'Richard Jimenez'),
(300, 'bitacora', '2012-10-03 15:10:30', 3, 'Richard Jimenez'),
(301, 'bitacora', '2012-10-03 15:10:53', 3, 'Richard Jimenez'),
(302, 'bitacora', '2012-10-03 15:12:16', 3, 'Richard Jimenez'),
(303, 'bitacora', '2012-10-03 15:12:42', 3, 'Richard Jimenez'),
(304, 'bitacora', '2012-10-03 15:13:07', 3, 'Richard Jimenez'),
(305, 'bitacora', '2012-10-03 15:13:14', 3, 'Richard Jimenez'),
(306, 'bitacora', '2012-10-03 15:13:41', 3, 'Richard Jimenez'),
(307, 'bitacora', '2012-10-03 15:13:48', 3, 'Richard Jimenez'),
(308, 'bitacora', '2012-10-03 15:13:57', 3, 'Richard Jimenez'),
(309, 'bitacora', '2012-10-03 15:14:09', 3, 'Richard Jimenez'),
(310, 'bitacora', '2012-10-03 15:14:41', 3, 'Richard Jimenez'),
(311, 'bitacora', '2012-10-03 15:14:56', 3, 'Richard Jimenez'),
(312, 'bitacora', '2012-10-03 15:15:20', 3, 'Richard Jimenez'),
(313, 'bitacora', '2012-10-03 15:15:45', 3, 'Richard Jimenez'),
(314, 'bitacora', '2012-10-03 15:15:52', 3, 'Richard Jimenez'),
(315, 'bitacora', '2012-10-03 15:16:18', 3, 'Richard Jimenez'),
(316, 'bitacora', '2012-10-03 15:17:14', 3, 'Richard Jimenez'),
(317, 'bitacora', '2012-10-03 15:17:58', 3, 'Richard Jimenez'),
(318, 'bitacora', '2012-10-03 15:18:45', 3, 'Richard Jimenez'),
(319, 'bitacora', '2012-10-03 15:18:59', 3, 'Richard Jimenez'),
(320, 'bitacora', '2012-10-03 15:19:44', 3, 'Richard Jimenez'),
(321, 'bitacora', '2012-10-03 15:20:06', 3, 'Richard Jimenez'),
(322, 'bitacora', '2012-10-03 15:20:13', 3, 'Richard Jimenez'),
(323, 'bitacora', '2012-10-03 15:20:32', 3, 'Richard Jimenez'),
(324, 'bitacora', '2012-10-03 15:20:45', 3, 'Richard Jimenez'),
(325, 'bitacora', '2012-10-03 15:20:53', 3, 'Richard Jimenez'),
(326, 'bitacora', '2012-10-03 15:22:10', 3, 'Richard Jimenez'),
(327, 'bitacora', '2012-10-03 15:26:31', 3, 'Richard Jimenez'),
(328, 'bitacora', '2012-10-03 15:26:50', 3, 'Richard Jimenez'),
(329, 'bitacora', '2012-10-03 15:27:12', 3, 'Richard Jimenez'),
(330, 'bitacora', '2012-10-03 15:27:34', 3, 'Richard Jimenez'),
(331, 'bitacora', '2012-10-03 15:28:36', 3, 'Richard Jimenez'),
(332, 'bitacora', '2012-10-03 15:28:50', 3, 'Richard Jimenez'),
(333, 'bitacora', '2012-10-03 15:29:14', 3, 'Richard Jimenez'),
(334, 'bitacora', '2012-10-03 15:30:13', 3, 'Richard Jimenez'),
(335, 'reporte', '2012-10-03 15:30:42', 3, 'Richard Jimenez'),
(336, 'reporte', '2012-10-03 15:30:45', 3, 'Richard Jimenez'),
(337, 'bitacora', '2012-10-03 15:33:01', 3, 'Richard Jimenez'),
(338, 'bitacora', '2012-10-03 15:33:26', 3, 'Richard Jimenez'),
(339, 'bitacora', '2012-10-03 15:35:29', 3, 'Richard Jimenez'),
(340, 'bitacora', '2012-10-03 15:58:23', 3, 'Richard Jimenez'),
(341, 'bitacora', '2012-10-03 15:59:55', 3, 'Richard Jimenez'),
(342, 'Login del Sistema', '2012-10-04 08:08:22', 3, 'Richard Jimenez'),
(343, 'buzon', '2012-10-04 08:08:23', 3, 'Richard Jimenez'),
(344, 'bitacora', '2012-10-04 08:08:33', 3, 'Richard Jimenez'),
(345, 'bitacora', '2012-10-04 08:08:43', 3, 'Richard Jimenez'),
(346, 'bitacora', '2012-10-04 08:09:02', 3, 'Richard Jimenez'),
(347, 'bitacora', '2012-10-04 08:13:06', 3, 'Richard Jimenez'),
(348, 'usuario', '2012-10-04 08:13:16', 3, 'Richard Jimenez'),
(349, 'bitacora', '2012-10-04 08:13:20', 3, 'Richard Jimenez'),
(350, 'bitacora', '2012-10-04 08:13:47', 3, 'Richard Jimenez'),
(351, 'bitacora', '2012-10-04 08:15:49', 3, 'Richard Jimenez'),
(352, 'bitacora', '2012-10-04 08:16:02', 3, 'Richard Jimenez'),
(353, 'bitacora', '2012-10-04 08:17:14', 3, 'Richard Jimenez'),
(354, 'bitacora', '2012-10-04 08:18:23', 3, 'Richard Jimenez'),
(355, 'denegado', '2012-10-04 08:18:41', 3, 'Richard Jimenez'),
(356, 'bitacora', '2012-10-04 08:19:23', 3, 'Richard Jimenez'),
(357, 'bitacora', '2012-10-04 08:20:22', 3, 'Richard Jimenez'),
(358, 'bitacora', '2012-10-04 08:21:41', 3, 'Richard Jimenez'),
(359, 'bitacora', '2012-10-04 08:25:23', 3, 'Richard Jimenez'),
(360, 'bitacora', '2012-10-04 08:26:13', 3, 'Richard Jimenez'),
(361, 'bitacora', '2012-10-04 08:35:03', 3, 'Richard Jimenez'),
(362, 'bitacora', '2012-10-04 08:35:55', 3, 'Richard Jimenez'),
(363, 'bitacora (filtrar)', '2012-10-04 08:35:58', 3, 'Richard Jimenez'),
(364, 'bitacora', '2012-10-04 08:38:05', 3, 'Richard Jimenez'),
(365, 'bitacora (filtrar)', '2012-10-04 08:38:07', 3, 'Richard Jimenez'),
(366, 'bitacora', '2012-10-04 08:38:24', 3, 'Richard Jimenez'),
(367, 'bitacora (filtrar)', '2012-10-04 08:38:26', 3, 'Richard Jimenez'),
(368, 'bitacora (filtrar)', '2012-10-04 08:38:32', 3, 'Richard Jimenez'),
(369, 'bitacora (filtrar)', '2012-10-04 08:38:43', 3, 'Richard Jimenez'),
(370, 'bitacora (filtrar)', '2012-10-04 08:38:58', 3, 'Richard Jimenez'),
(371, 'bitacora', '2012-10-04 08:39:33', 3, 'Richard Jimenez'),
(372, 'bitacora', '2012-10-04 08:44:31', 3, 'Richard Jimenez'),
(373, 'bitacora (filtrar)', '2012-10-04 08:44:35', 3, 'Richard Jimenez'),
(374, 'bitacora (filtrar)', '2012-10-04 08:44:39', 3, 'Richard Jimenez'),
(375, 'bitacora (filtrar)', '2012-10-04 08:44:45', 3, 'Richard Jimenez'),
(376, 'bitacora (filtrar)', '2012-10-04 08:44:48', 3, 'Richard Jimenez'),
(377, 'bitacora', '2012-10-04 08:46:28', 3, 'Richard Jimenez'),
(378, 'bitacora (filtrar)', '2012-10-04 08:46:30', 3, 'Richard Jimenez'),
(379, 'bitacora', '2012-10-04 08:47:55', 3, 'Richard Jimenez'),
(380, 'bitacora (filtrar)', '2012-10-04 08:48:02', 3, 'Richard Jimenez'),
(381, 'bitacora (filtrar)', '2012-10-04 08:48:04', 3, 'Richard Jimenez'),
(382, 'bitacora (filtrar)', '2012-10-04 08:48:10', 3, 'Richard Jimenez'),
(383, 'bitacora', '2012-10-04 08:48:49', 3, 'Richard Jimenez'),
(384, 'bitacora', '2012-10-04 08:49:23', 3, 'Richard Jimenez'),
(385, 'bitacora (filtrar)', '2012-10-04 08:49:30', 3, 'Richard Jimenez'),
(386, 'bitacora (filtrar)', '2012-10-04 08:49:33', 3, 'Richard Jimenez'),
(387, 'bitacora', '2012-10-04 08:49:40', 3, 'Richard Jimenez'),
(388, 'bitacora (filtrar)', '2012-10-04 08:49:45', 3, 'Richard Jimenez'),
(389, 'bitacora (filtrar)', '2012-10-04 08:49:52', 3, 'Richard Jimenez'),
(390, 'bitacora (filtrar)', '2012-10-04 08:49:59', 3, 'Richard Jimenez'),
(391, 'bitacora (filtrar)', '2012-10-04 08:50:02', 3, 'Richard Jimenez'),
(392, 'bitacora (filtrar)', '2012-10-04 08:50:15', 3, 'Richard Jimenez'),
(393, 'bitacora', '2012-10-04 08:52:22', 3, 'Richard Jimenez'),
(394, 'bitacora (filtrar)', '2012-10-04 08:52:42', 3, 'Richard Jimenez'),
(395, 'bitacora (filtrar)', '2012-10-04 08:52:47', 3, 'Richard Jimenez'),
(396, 'bitacora', '2012-10-04 08:53:19', 3, 'Richard Jimenez'),
(397, 'bitacora', '2012-10-04 08:55:45', 3, 'Richard Jimenez'),
(398, 'buzon', '2012-10-04 08:57:35', 3, 'Richard Jimenez'),
(399, 'buzon (cambiar_estatus_adjuntos)', '2012-10-04 08:58:09', 3, 'Richard Jimenez'),
(400, 'bitacora', '2012-10-04 09:13:26', 3, 'Richard Jimenez'),
(401, 'buzon', '2012-10-04 09:22:11', 3, 'Richard Jimenez'),
(402, 'organismo', '2012-10-04 09:22:17', 3, 'Richard Jimenez'),
(403, 'dependencia', '2012-10-04 09:22:20', 3, 'Richard Jimenez'),
(404, 'contacto', '2012-10-04 09:22:22', 3, 'Richard Jimenez'),
(405, 'correspondencia (nuevo)', '2012-10-04 09:22:32', 3, 'Richard Jimenez'),
(406, 'reporte', '2012-10-04 09:22:37', 3, 'Richard Jimenez'),
(407, 'correspondencia (nuevo)', '2012-10-04 09:22:39', 3, 'Richard Jimenez'),
(408, 'usuario', '2012-10-04 09:22:42', 3, 'Richard Jimenez'),
(409, 'bitacora', '2012-10-04 09:22:43', 3, 'Richard Jimenez'),
(410, 'buzon', '2012-10-04 09:22:50', 3, 'Richard Jimenez'),
(411, 'bitacora', '2012-10-04 09:26:00', 3, 'Richard Jimenez'),
(412, 'bitacora (filtrar)', '2012-10-04 09:27:46', 3, 'Richard Jimenez'),
(413, 'bitacora', '2012-10-04 09:28:16', 3, 'Richard Jimenez'),
(414, 'bitacora (filtrar)', '2012-10-04 09:28:17', 3, 'Richard Jimenez'),
(415, 'bitacora (filtrar)', '2012-10-04 09:28:19', 3, 'Richard Jimenez'),
(416, 'dependencia', '2012-10-04 09:28:34', 3, 'Richard Jimenez'),
(417, 'buzon', '2012-10-04 09:28:36', 3, 'Richard Jimenez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE IF NOT EXISTS `contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `organismo_id` int(11) NOT NULL,
  `cargo` text NOT NULL,
  `representante` text NOT NULL,
  `telefono_oficina` text NOT NULL,
  `telefono_celular` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `descripcion`, `organismo_id`, `cargo`, `representante`, `telefono_oficina`, `telefono_celular`, `email`) VALUES
(31, 'GOBERNACION BARINAS', 1, 'GOBERNADOR ', 'ADAN ADAN', '454444444', 'TE55646656456', 'MDFGKMFLGFG'),
(30, 'ALCALDIA DE BARINAS', 7, 'A49ALDE', 'ABUNDIO', '38447328832', '03874739373', 'REJO_06@HOTMAIL.COM'),
(29, 'ALCALDIA DE MUÑOZ', 17, 'PRESIDENTE', 'JOSE JOSE', '302384820038', '01010101010', 'papiricki_29@hotmail.com'),
(32, 'SEGURO HORIZONTE', 15, 'PRESIDENTE', 'PINO ALZATE', '0273-5329403', '04167292732', 'REJO_06@HOTMAIL.COM'),
(33, 'consejo comunal los marques', 4, 'tesorero', 'RICHARD JIMENEZ', '3847476367764', '047857834', 'MDFGKMFLGFG'),
(34, 'CONTRALORIA MUNICIPAL DE BARINAS', 9, 'CONTRALOR', 'SANCHEZ SANCHEZ', '0981235768', '04246783245', 'REJO_06@HOTMAIL.COM'),
(35, 'TRIBUNAL DEL ESTADO BARINAS', 11, 'JUEZ RECTOR', 'PEDRO MORA', '04167891234', '02734567890', 'REJO_06@HOTMAIL.COM'),
(36, 'CONSEJO DE BARINAS', 6, 'PRESIDENTE', 'PRESIDENTE', '65665657676', '4665,65655', 'REJO_06@HOTMAIL.COM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correspondencias`
--

CREATE TABLE IF NOT EXISTS `correspondencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_recibido` date NOT NULL,
  `fecha_oficio` date NOT NULL,
  `nro_oficio` varchar(50) NOT NULL,
  `contacto_id` int(11) NOT NULL,
  `asunto` varchar(250) NOT NULL,
  `suscrito` text NOT NULL,
  `archivo` text NOT NULL,
  `inactivo` tinyint(4) NOT NULL DEFAULT '0',
  `fechahora` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `correspondencias`
--

INSERT INTO `correspondencias` (`id`, `fecha_recibido`, `fecha_oficio`, `nro_oficio`, `contacto_id`, `asunto`, `suscrito`, `archivo`, `inactivo`, `fechahora`) VALUES
(22, '2012-02-01', '2012-02-14', 'CMB', 29, 'ACLARATORIO', 'DIRECTOR', 'instrucciones_contralor.jpg', 0, '0000-00-00 00:00:00'),
(31, '0000-00-00', '0000-00-00', 'nro_oficio', 35, 'asunto', 'suscrito', '0', 0, '0000-00-00 00:00:00'),
(32, '2012-04-04', '2012-04-04', '1223', 30, 'Prueba de un registro procesado', 'por el mocho', 'falcon.jpg', 1, '0000-00-00 00:00:00'),
(33, '2012-04-04', '2012-04-04', '31211', 31, 'NOSE UNA PRUEBA', 'por el morronguero', 'aaaa/aa/aa', 0, '0000-00-00 00:00:00'),
(34, '2012-04-10', '2012-04-10', '1123123', 31, 'prueba', 'Cheo Man', '4f8489b465183.pdf', 0, '0000-00-00 00:00:00'),
(35, '2012-04-10', '2012-04-10', '43324', 30, 'adsd', 'dda', '4f8491bd91bbe.pdf', 0, '0000-00-00 00:00:00'),
(36, '2012-09-14', '2012-09-13', '00000123', 0, 'servidores', 'Carlos Nuñes', '50534486b2d76.JPG', 0, '0000-00-00 00:00:00'),
(37, '2012-09-14', '2012-09-13', '00004', 31, 'prueba', 'carlos quintana', '505345d3be373.JPG', 0, '0000-00-00 00:00:00'),
(38, '2012-09-18', '2012-09-18', '564', 31, 'una prueba de correspondencia', 'jose lopez', '50586ad117703.jpeg', 0, '0000-00-00 00:00:00'),
(39, '2012-09-26', '2012-09-26', '112123', 31, '::::::::::: :::::::::: :::::::::::: :::::::::::: ::::::::: ::::::::: :::::::::: ::::::::: ::::::::;', 'FULANO DE TAL', '5063227ff365b.SQL', 0, '0000-00-00 00:00:00'),
(40, '2012-09-26', '2012-09-26', '322', 31, 'dssdfsd', 'CHEEITO', '5063445563e90.jpg', 0, '0000-00-00 00:00:00'),
(41, '2012-09-27', '2012-09-26', '000032', 30, 'curso', 'abundio sanchez', '5064562d28c39.JPG', 0, '0000-00-00 00:00:00'),
(42, '2012-09-28', '2012-09-28', '122132', 31, 'nose nose nose', 'Juan Binba', '50659ed4b703b.txt', 0, '2012-09-28 08:27:56'),
(43, '2012-09-26', '2012-09-28', '312343', 31, 'Narcotrafico', 'Pablo Emilio Escobar Gaviria', '5065b208bc01c.txt', 0, '2012-09-28 09:49:52'),
(44, '2012-10-02', '2012-10-02', '32234', 29, 'otra prueba mas', 'Perencejo Ramon', '506b046a06312.txt', 0, '2012-10-02 10:42:42'),
(45, '2012-10-03', '2012-10-02', '000123', 31, 'echame una ayudadita', 'maria bolivar', '506c7dafca654.pdf', 0, '2012-10-03 13:32:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corrinstruccion`
--

CREATE TABLE IF NOT EXISTS `corrinstruccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instruccion_id` int(11) NOT NULL,
  `correspondencia_id` int(11) NOT NULL,
  `dependencia_id` int(11) NOT NULL,
  `observaciones` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `corrinstruccion`
--

INSERT INTO `corrinstruccion` (`id`, `instruccion_id`, `correspondencia_id`, `dependencia_id`, `observaciones`) VALUES
(1, 2, 22, 2, 'asdasdasdsad'),
(2, 3, 22, 1, ''),
(3, 2, 33, 5, 'esto es una prueba de lo que puede ser las observaciones'),
(4, 2, 33, 2, 'esto es una prueba de lo que puede ser las observaciones'),
(5, 2, 33, 1, 'esto es una prueba de lo que puede ser las observaciones'),
(6, 3, 33, 5, 'esto es una prueba de lo que puede ser las observaciones'),
(9, 8, 31, 1, 'gaaaaaaaaaaqqqqq'),
(10, 8, 31, 7, 'gaaaaaaaaaaqqqqq'),
(11, 7, 32, 1, 'asdasdasd'),
(12, 7, 32, 2, 'asdasdasd'),
(13, 9, 32, 5, 'asdadsad'),
(14, 9, 32, 7, 'asdadsad'),
(19, 14, 32, 2, 'sasddsa'),
(20, 14, 32, 6, 'sasddsa'),
(21, 18, 34, 5, 'bvfxnd'),
(22, 18, 34, 6, 'bvfxnd'),
(23, 1, 38, 1, 'adad'),
(24, 2, 41, 1, ''),
(25, 13, 42, 1, 'por favor a la mayo brevedad posible'),
(26, 17, 43, 5, 'hagame pasar el Sr. '),
(27, 16, 45, 1, 'preparame el oficios echame una ayudadita'),
(28, 16, 45, 5, 'preparame el oficios echame una ayudadita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE IF NOT EXISTS `dependencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` text NOT NULL,
  `siglas` varchar(20) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `color` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id`, `direccion`, `siglas`, `usuario_id`, `color`) VALUES
(2, 'DIRECCION DE CONTROL CENTRAL Y OTRO PODER', 'DCCOP', 7, 'E6A1FF'),
(1, 'DIRECCION TECNICA, PLANIFICACION Y CONTROL DE GESTION', 'DTPCG', 5, 'C1D5F7'),
(5, 'OFICIA DE ATENCION AL CIUDADANO', 'OAC', 6, 'F5D0E4'),
(6, 'DIRECCION DE CONTROL DE LA ADMINISTRACION DESCENTRALIZADA', 'DCAD', 0, 'EFD4F9'),
(7, 'OFICINA DE SEGURIDAD, TRANSPORTE Y SERVICIOS GENERALES', 'OSTSG', 0, 'F7E89C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_adjuntos`
--

CREATE TABLE IF NOT EXISTS `estatus_adjuntos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estatus_adjuntos`
--

INSERT INTO `estatus_adjuntos` (`id`, `descripcion`) VALUES
(0, 'Sin Revision'),
(1, 'Aprobado'),
(2, 'Para Correcion'),
(3, 'Para Discusion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Director/Jefe'),
(3, 'Operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrucciones`
--

CREATE TABLE IF NOT EXISTS `instrucciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `instrucciones`
--

INSERT INTO `instrucciones` (`id`, `descripcion`) VALUES
(1, 'Por Procesar'),
(2, 'Informarme por escrito'),
(3, 'Investigar e informar verbalmente'),
(4, 'Preparar contestacion para mi firma'),
(5, 'Preparar contestación para mi firma'),
(6, 'Para conocer su opinión'),
(7, 'Hablar conmigo al respecto'),
(8, 'Tramitarlo hasta su conclusión'),
(9, 'Tramitarlo en caso de proceder'),
(10, 'Coordinar'),
(11, 'Distribuir'),
(12, 'Registro'),
(13, 'Preparar memorandum'),
(14, 'Para su conocimiento y fines pertinentes'),
(15, 'Preparar oficio'),
(16, 'Preparar informacion para la CGR'),
(17, 'Sostener entrevista'),
(18, 'Atender audiencia'),
(19, 'Ordenar actuación'),
(20, 'Preparar proyecto de consulta'),
(21, 'Remitir copia a todos los directores'),
(22, 'Archivar'),
(23, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organismos`
--

CREATE TABLE IF NOT EXISTS `organismos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `siglas` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `organismos`
--

INSERT INTO `organismos` (`id`, `descripcion`, `siglas`) VALUES
(1, 'Ejecutivo Nacional', 'EN'),
(2, 'Ejecutivo Regional', 'ER'),
(3, 'Guarnición', 'G'),
(4, 'Consejos Comunales', 'CC'),
(5, 'Concejo Municipal', 'CM'),
(6, 'Consejo Legislativo', 'CL'),
(7, 'Alcaldí­as', 'A'),
(8, 'Universidades', 'U'),
(9, 'Contralorías Municipales', 'CM'),
(10, 'Contraloría General de la República', 'CGR'),
(11, 'TRIBUNALES', 'T'),
(12, 'Organismos Nacionales a Nivel Regional', 'ONNR'),
(13, 'MINISTERIOS', 'M'),
(14, 'Contralorías de Estado', 'CE'),
(15, 'SEGUROS', 'S'),
(16, 'Otros Organismos Regionales', 'OOR'),
(17, 'Hoteles', 'H'),
(18, 'Empresas', ''),
(19, 'Particulares', ''),
(20, 'Funcionarios', ''),
(21, 'Prensa', ''),
(22, 'Juez Rector', ''),
(23, 'Fundaciones', ''),
(24, 'Bancos', ''),
(25, 'Gobernacion del Estado Barinas', ''),
(26, 'Policia del Estado Barinas', ''),
(27, 'SENIAT', ''),
(28, 'MINISTERIO PUBLICO', ''),
(29, 'COLEGIOS DE PROFESIONALES', 'CP'),
(30, 'CANTV', 'CANTV'),
(36, 'FISCALIAS', 'F'),
(37, 'HOSPITALES', 'H'),
(44, 'Petroleos de Venezuela', 'PDVSA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(127) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`session_id`, `last_activity`, `data`) VALUES
('vgibr78ofgjtu56jl7ocl26dg6', 1349359116, 'c2Vzc2lvbl9pZHxzOjI2OiJ2Z2licjc4b2ZnanR1NTZqbDdvY2wyNmRnNiI7dG90YWxfaGl0c3xpOjg4O19rZl9mbGFzaF98YTowOnt9dXNlcl9hZ2VudHxzOjc4OiJNb3ppbGxhLzUuMCAoWDExOyBVYnVudHU7IExpbnV4IHg4Nl82NDsgcnY6MTUuMCkgR2Vja28vMjAxMDAxMDEgRmlyZWZveC8xNS4wLjEiO2lwX2FkZHJlc3N8czo3OiIwLjAuMC4wIjtsYXN0X2FjdGl2aXR5fGk6MTM0OTM1OTExNjt1c2VyX2lkfGk6Mzt1c2VyX25hbWV8czoxNToiUmljaGFyZCBKaW1lbmV6IjtncnVwb19pZHxpOjE7dXNlcl9ncnVwb3xzOjEzOiJBZG1pbmlzdHJhZG9yIjs=');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `grupo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula` (`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `cedula`, `nombres`, `apellidos`, `grupo_id`) VALUES
(3, 'administrador', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 17987716, 'Richard', 'Jimenez', 1),
(4, 'operador', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 16637380, 'Jackson ', 'Florez', 3),
(5, 'yelinet', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 888, 'Yelinet', 'Ramos', 2),
(6, 'amigo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 123, 'Hector', 'Colmenares', 2),
(7, 'delia', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 111, 'Delia', 'Cardenas', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
