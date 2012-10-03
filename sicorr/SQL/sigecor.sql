-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-01-2012 a las 10:39:54
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.2-1ubuntu4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sigecor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organismos`
--

CREATE TABLE IF NOT EXISTS `organismos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `siglas` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Volcar la base de datos para la tabla `organismos`
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
(39, 'PDVSA', 'PDVSA'),
(42, 'CIRCUNCRIPCION MILITAR', 'CM'),
(43, 'SINDICATOS', 'S');

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
-- Volcar la base de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`session_id`, `last_activity`, `data`) VALUES
('ghoth1rppcjbg43d43s17egl66', 1325601398, 'c2Vzc2lvbl9pZHxzOjI2OiJnaG90aDFycHBjamJnNDNkNDNzMTdlZ2w2NiI7dG90YWxfaGl0c3xpOjE2O19rZl9mbGFzaF98YTowOnt9dXNlcl9hZ2VudHxzOjEwMzoiTW96aWxsYS81LjAgKFgxMTsgVTsgTGludXggaTY4NjsgZXMtRVM7IHJ2OjEuOS4yLjIzKSBHZWNrby8yMDExMDkyMSBVYnVudHUvMTAuMDQgKGx1Y2lkKSBGaXJlZm94LzMuNi4yMyI7aXBfYWRkcmVzc3xzOjc6IjAuMC4wLjAiO2xhc3RfYWN0aXZpdHl8aToxMzI1NjAxMzk4O3VzZXJfaWR8aToyO2dydXBvX2lkfGk6MTs=');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `cedula`, `nombres`, `apellidos`, `grupo_id`) VALUES
(2, 'operador', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 123, 'Operador', 'Operador', 1);
