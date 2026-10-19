-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2023 a las 17:26:57
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quantum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_password_hash` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `intereses` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `logo_url` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `user`, `email`, `user_password_hash`, `password`, `nombre`, `apellido1`, `apellido2`, `descripcion`, `intereses`, `fecha_nacimiento`, `logo_url`) VALUES
(27, 'albertoinstantaneo', 'einstein@gmail.com', '$2y$10$7bevug7pXZ8qt6f53KjYD.aWkNx.eWH/sek7KNFG10/4l7el5MkS6', 'relatividad', 'Albert', 'Hans', 'Einstein', 'El mismísimo Alberto Instántaneo.', 'Relatividad General', '1879-03-14', 'uploads/xd.jpg'),
(35, 'pabloo', 'jcamposdinarte@gmail.com', '$2y$10$DuBrkxtdFmYiB.wYp8AuQuyb5yqE88Rp/ePT9nh2gDo9DuKcPEAhO', '123', 'Jose Pablo', 'Campos', 'Dinarte', 'El creador de este sitio', 'Astrofísica', '2006-05-24', 'uploads/jcamposdinarte@gmail.com_1698942301.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`,`user`,`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
