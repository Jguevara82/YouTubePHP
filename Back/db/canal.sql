-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2023 a las 21:36:59
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `youtube2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canal`
--

CREATE TABLE `canal` (
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contra` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `subs` int(11) NOT NULL DEFAULT 0,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Sin descripción'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `canal`
--

INSERT INTO `canal` (`correo`, `usuario`, `contra`, `subs`, `fecha`, `descripcion`) VALUES
('123@456', 'Pablo4', 'blabla', 0, '2022-11-25 02:32:25', 'Mi descripción'),
('456@789', 'hola@mundo4', 'contra', 0, '2022-11-25 00:00:42', 'Sin descripción'),
('asdasd@sadasd', 'hola@mundo4', 'contra', 0, '2022-11-01 21:26:36', 'Sin descripción'),
('ejemplo2@mail.com', 'Usuario1', 'pass123', 1, '2022-09-25 03:41:47', 'Sin descripción'),
('hola@mundo', 'Mi canal', 'contra', 0, '2022-10-26 01:13:54', 'Mi descripción'),
('hola@mundo2', 'hola', '1234567', 0, '2022-10-26 01:54:37', 'descripcion'),
('hola@mundo3', '123@456', 'contra', 0, '2022-11-01 02:42:59', 'Sin descripción'),
('juanjose.guevararozo@gmail.com', 'Juan Guevara', '12345', 1, '2022-09-25 01:01:45', 'Mi descripción');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canal`
--
ALTER TABLE `canal`
  ADD PRIMARY KEY (`correo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
