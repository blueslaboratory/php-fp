-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 17-03-2022 a las 15:22:00
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lab`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aficiones`
--

DROP TABLE IF EXISTS `aficiones`;
CREATE TABLE IF NOT EXISTS `aficiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aficion` varchar(33) COLLATE utf32_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_aficion` (`aficion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `aficiones`
--

INSERT INTO `aficiones` (`id`, `aficion`) VALUES
(2, 'Electrónica'),
(3, 'Física'),
(4, 'Matemáticas'),
(1, 'Química');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aficionesdeusuario`
--

DROP TABLE IF EXISTS `aficionesdeusuario`;
CREATE TABLE IF NOT EXISTS `aficionesdeusuario` (
  `idUsuarios` int(11) NOT NULL,
  `idAficiones` int(11) NOT NULL,
  PRIMARY KEY (`idUsuarios`,`idAficiones`),
  KEY `fk_aficion` (`idAficiones`),
  KEY `ix_usuario` (`idUsuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `aficionesdeusuario`
--

INSERT INTO `aficionesdeusuario` (`idUsuarios`, `idAficiones`) VALUES
(2, 1),
(3, 2),
(1, 3),
(1, 4),
(8, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `helpers`
--

DROP TABLE IF EXISTS `helpers`;
CREATE TABLE IF NOT EXISTS `helpers` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'A_I (autoincremento)',
  `name` varchar(30) CHARACTER SET ucs2 COLLATE ucs2_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET ucs2 COLLATE ucs2_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf32_spanish_ci NOT NULL,
  `labnumber` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `helpers`
--

INSERT INTO `helpers` (`id`, `name`, `email`, `password`, `labnumber`) VALUES
(1, 'Perry', 'perry@platypus.com', '1234', 14),
(2, 'Phineas', 'phineas@lab.com', '1234', 14),
(3, 'Ferb', 'ferb@lab.com', '1234', 14),
(5, 'Candace', 'candas@lab.com', '1234', 13),
(6, 'red', 'red@lab.com', '1234', 14),
(8, 'Fernando', 'fernando@lab.com', '4321', 12),
(16, 'green', 'green@lab.com', '1234', 137),
(19, 'blue', 'blue@lab.com', '1234', 14),
(20, 'orange', 'orange@lab.com', '1234', 14),
(21, 'yellow', 'yellow@lab.com', '1234', 12);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aficionesdeusuario`
--
ALTER TABLE `aficionesdeusuario`
  ADD CONSTRAINT `fk_aficion` FOREIGN KEY (`idAficiones`) REFERENCES `aficiones` (`id`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`idUsuarios`) REFERENCES `helpers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
