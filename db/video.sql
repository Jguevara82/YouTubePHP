-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2022 a las 23:24:22
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
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `id` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `canal` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `archivo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT current_timestamp(),
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Sin descripcion',
  `visitas` int(11) NOT NULL DEFAULT 0,
  `fecha_subido` datetime NOT NULL DEFAULT current_timestamp(),
  `categoria` enum('Ciencia y tecnología','Cine y animación','Comedia','Consejos y estilo','Deportes','Educación','Entretenimiento','Gente y blogs','Mascotas y animales','Motor','Música','Noticias y política','ONGs y activismo','Viajes y eventos','Videojuegos') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Gente y blogs'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id`, `canal`, `archivo`, `titulo`, `descripcion`, `visitas`, `fecha_subido`, `categoria`) VALUES
('6348736905f6a9.92260678', '123@456', '6348736905f6a9.92260678.mp4', 'Mi video 1.0', 'Intento de subir mi primer video desde mi canal a YouTuube', 0, '2022-10-13 15:22:01', 'Cine y animación'),
('63487a56d4ff59.83099188', '123@456', '63487a56d4ff59.83099188.mp4', 'Pablo', 'hola mundo', 0, '2022-10-13 15:51:34', 'Gente y blogs');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `canal` (`canal`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `canal` FOREIGN KEY (`canal`) REFERENCES `canal` (`correo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
