-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2023 a las 19:52:07
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
('hola@mundo4', 'Pablo4', 'Contrasenia', 0, '2022-11-01 21:26:59', 'hola mundo'),
('juanjose.guevararozo@gmail.com', 'Juan Guevara', '12345', 1, '2022-09-25 01:01:45', 'Mi descripción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` bigint(20) NOT NULL,
  `correo_inicio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_video` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `texto` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `correo_inicio`, `id_video`, `texto`, `fecha`) VALUES
(4, '456@789', '6422f709147335.37711685', 'Excelente video!', '2023-03-28 10:33:04'),
(5, 'juanjose.guevararozo@gmail.com', '6422f709147335.37711685', 'No me funcionó! Ayuda!!!', '2023-03-28 10:36:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `correo_inicio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo_fin` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`correo_inicio`, `correo_fin`, `fecha`) VALUES
('123@456', 'juanjose.guevararozo@gmail.com', '2023-03-27 14:25:40'),
('asdasd@sadasd', 'ejemplo2@mail.com', '2023-03-28 12:37:37');

--
-- Disparadores `suscripcion`
--
DELIMITER $$
CREATE TRIGGER `act_subs` AFTER INSERT ON `suscripcion` FOR EACH ROW BEGIN 
SELECT COUNT(*) INTO @counter FROM suscripcion WHERE correo_fin = NEW.correo_fin;
UPDATE canal SET subs = @counter WHERE correo = NEW.correo_fin;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `act_subs_del` AFTER DELETE ON `suscripcion` FOR EACH ROW BEGIN 
SELECT COUNT(*) INTO @counter FROM suscripcion WHERE correo_fin = OLD.correo_fin;
UPDATE canal SET subs = @counter WHERE correo = OLD.correo_fin;
END
$$
DELIMITER ;

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
  `categoria` enum('Ciencia y tecnología','Cine y animación','Comedia','Consejos y estilo','Deportes','Educación','Entretenimiento','Gente y blogs','Mascotas y animales','Motor','Música','Noticias y política','ONGs y activismo','Viajes y eventos','Videojuegos') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Gente y blogs',
  `visibilidad` enum('Publico','Privado','Oculto') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Publico'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id`, `canal`, `archivo`, `titulo`, `descripcion`, `visitas`, `fecha_subido`, `categoria`, `visibilidad`) VALUES
('6422f709147335.37711685', '123@456', '6422f709147335.37711685.mp4', 'Mi video 5.0', 'Sin descripción', 0, '2023-03-28 09:17:47', 'Cine y animación', 'Publico');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canal`
--
ALTER TABLE `canal`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_correo` (`correo_inicio`),
  ADD KEY `fk_video` (`id_video`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`correo_inicio`,`correo_fin`),
  ADD KEY `correo_fin` (`correo_fin`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `canal` (`canal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_correo` FOREIGN KEY (`correo_inicio`) REFERENCES `canal` (`correo`),
  ADD CONSTRAINT `fk_video` FOREIGN KEY (`id_video`) REFERENCES `video` (`id`);

--
-- Filtros para la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD CONSTRAINT `correo_fin` FOREIGN KEY (`correo_fin`) REFERENCES `canal` (`correo`),
  ADD CONSTRAINT `correo_inicio` FOREIGN KEY (`correo_inicio`) REFERENCES `canal` (`correo`);

--
-- Filtros para la tabla `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `canal` FOREIGN KEY (`canal`) REFERENCES `canal` (`correo`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
