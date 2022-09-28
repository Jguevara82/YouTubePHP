-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2022 a las 03:20:08
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
('correo2@hotmail.com', 'PabloBlogs', '12345678', 0, '2022-09-26 04:08:38', 'Este es un canal de blogs'),
('ejemplo2@mail.com', 'Usuario1', 'hola123', 0, '2022-09-25 03:41:47', 'Sin descripción'),
('juanjose.guevararozo@gmail.com', 'Juan Guevara', '12345', 0, '2022-09-25 01:01:45', 'Sin descripción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drive_files`
--

CREATE TABLE `drive_files` (
  `id` int(11) NOT NULL,
  `canal_correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_drive_file_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `visibility` enum('public','private','hidden') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'public',
  `description` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canal`
--
ALTER TABLE `canal`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `drive_files`
--
ALTER TABLE `drive_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `canal_correo` (`canal_correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `drive_files`
--
ALTER TABLE `drive_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `drive_files`
--
ALTER TABLE `drive_files`
  ADD CONSTRAINT `drive_files_ibfk_1` FOREIGN KEY (`canal_correo`) REFERENCES `canal` (`correo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
