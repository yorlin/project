-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2014 a las 04:13:40
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Telefono` text NOT NULL,
  `Nombre` text NOT NULL,
  `Cedula` text NOT NULL,
  `Correo` text NOT NULL,
  `Apellido` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`Id`, `Telefono`, `Nombre`, `Cedula`, `Correo`, `Apellido`) VALUES
(1, 'h@hotmail.com', 'fatima', '206950658', '6902730', 'duran'),
(2, 'h@hotmail.com', 'fatima', '206950658', '6902730', 'duran'),
(3, '', '', '', '', ''),
(4, 'h@hotmail.com', 'yorlin', '8', '6902730', 'Solis');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
