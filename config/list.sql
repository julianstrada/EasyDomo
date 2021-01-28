-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2019 a las 14:06:58
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `easydomo_modules`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `user` varchar(256) NOT NULL,
  `module_name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `porcentaje` int(255) NOT NULL,
  `state` int(2) DEFAULT '0',
  `hr_encendido` int(26) NOT NULL DEFAULT '25',
  `min_encendido` int(60) NOT NULL DEFAULT '0',
  `hr_apagado` int(26) NOT NULL DEFAULT '25',
  `min_apagado` int(60) NOT NULL DEFAULT '0',
  `flag_update_module` int(2) DEFAULT '0',
  `flag_update_hr` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `list`
--

INSERT INTO `list` (`id`, `user`, `module_name`, `description`, `porcentaje`, `state`, `hr_encendido`, `min_encendido`, `hr_apagado`, `min_apagado`, `flag_update_module`, `flag_update_hr`) VALUES
(1, 'Julian', 'Luces Habitación', 'Iluminacion', 24, 1, 0, 0, 0, 0, 0, 0),
(2, 'Julian', 'Cafetera', 'On/Off', 100, 0, 25, 0, 25, 0, 0, 0),
(3, 'Julian', 'Pava', 'On/Off', 100, 0, 25, 0, 25, 0, 0, 0),
(4, 'Lucio', 'Luces Habitacion', 'Iluminacion', 100, 0, 25, 0, 25, 0, 0, 0),
(5, 'Lucio', 'Cafetera', 'On/Off', 100, 0, 25, 0, 25, 0, 0, 0),
(6, 'Lucio', 'Pava', 'On/Off', 100, 0, 25, 0, 25, 0, 0, 0),
(7, 'Pipo', 'Luces Habitacion', 'Iluminacion', 100, 0, 25, 0, 25, 0, 0, 0),
(8, 'Pipo', 'Cafetera', 'On/Off', 100, 0, 25, 0, 25, 0, 0, 0),
(13, 'julian', 'Perciana', 'Motor', 100, 1, 25, 0, 25, 0, 0, 0),
(14, 'Pipo', 'Cafetera', 'On/Off', 100, 0, 25, 0, 25, 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
