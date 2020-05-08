-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2020 a las 21:58:23
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lockers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `direccion`, `telefono`) VALUES
(27, '123', '123@gmail.com', '$2y$10$/mvXGC0yjHxefSjsSBFMm.PeLhFBJz5Yq7eK3ads9eYK5Y8SF9naq', '', 0),
(28, 'AngelEscudero', 'test23@mail.com', '$2y$10$8fJC5Zy4ek1EvZcGpoQxxuRpX1ll96WMKy9Njur8OYcqKiSivCvKS', 'Bahia de kino #1840', 2147483647),
(29, 'AngelEscudero', 'test23@mail.com', '$2y$10$0HI.EjEV3U/Ati/nu/ezqOifxlAByXjN.2ZjQLvajvfSLFNOaona.', 'Bahia de kino #1840', 2147483647),
(30, 'AngelEscudero', 'test23@mail.com', '$2y$10$RJEQvhwQNc6FPebUyrhMO.qj/9vw.ZPqU/vVDuuhvrRSRlFnh7YLG', 'Bahia de kino #1840', 2147483647);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
