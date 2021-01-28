-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2019 a las 18:34:12
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `nombre` varchar(256) NOT NULL,
  `apellido` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `usuario` varchar(256) NOT NULL,
  `contraseña` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`nombre`, `apellido`, `email`, `usuario`, `contraseña`) VALUES
('Julian', 'Strada', 'stradajulian@gmail.com', 'admin', 'root'),
('Julian', 'Strada', 'stradajulian@gmail.com', 'julian', 'easydomo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `user` varchar(256) NOT NULL,
  `module_name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `porcentage` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `list`
--

INSERT INTO `list` (`id`, `user`, `module_name`, `description`, `porcentage`) VALUES
(1, 'Julian', 'Luces Habitacion', 'luz', 100),
(2, 'Julian', 'Cafetera', 'on', 100),
(3, 'Julian', 'Pava', 'on', 100),
(4, 'Lucio', 'Luces Habitacion', 'luz', 100),
(5, 'Lucio', 'Cafetera', 'on', 100),
(6, 'Lucio', 'Pava', 'on', 100),
(7, 'Pipo', 'Luces Habitacion', 'luz', 100),
(8, 'Pipo', 'Cafetera', 'on', 100);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `nombre` (`nombre`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
