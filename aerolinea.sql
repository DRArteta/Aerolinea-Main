-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-12-2021 a las 17:46:06
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aerolinea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritodecompras`
--

CREATE TABLE `carritodecompras` (
  `id` int(15) NOT NULL,
  `Login_Usuario` varchar(20) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `limite_de_pago` date NOT NULL,
  `id_tarjeta` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carritodecompras`
--

INSERT INTO `carritodecompras` (`id`, `Login_Usuario`, `estado`, `limite_de_pago`, `id_tarjeta`) VALUES
(8, 'Ana', 'pago', '2021-11-18', NULL),
(9, 'Ana', 'pago', '2021-11-25', NULL),
(10, 'Ana', 'pago', '2021-12-07', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `check-ins`
--

CREATE TABLE `check-ins` (
  `id` int(15) NOT NULL,
  `id_ticket` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `Login_Usuario` varchar(20) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `Login_Usuario`, `titulo`, `texto`) VALUES
(9, 'Ana', 'publicacion ana', 'holii'),
(11, 'Ana', 'g', 'como vas'),
(13, 'sofia', 'publicacion sofia', 'holllllaaa'),
(14, 'Ana', 'pregunta', 'si puedo hacer esa compra?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_comentarios`
--

CREATE TABLE `respuesta_comentarios` (
  `id` int(11) NOT NULL,
  `Login_Usuario` varchar(20) DEFAULT NULL,
  `id_comentario` int(11) DEFAULT NULL,
  `respuesta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuesta_comentarios`
--

INSERT INTO `respuesta_comentarios` (`id`, `Login_Usuario`, `id_comentario`, `respuesta`) VALUES
(11, 'sebastianmora', 11, 'holaaa'),
(12, 'sebastianmora', 9, 'que mas'),
(13, 'sebastianmora', 11, 'jejejje'),
(14, 'sebastianmora', 11, 'jejejje'),
(15, 'sebastianmora', 13, 'q mas'),
(16, 'sebastianmora', 14, 'si si se puedde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldo_usuarios`
--

CREATE TABLE `saldo_usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `id_tarjeta` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `saldo_usuarios`
--

INSERT INTO `saldo_usuarios` (`id`, `login`, `id_tarjeta`) VALUES
(11, 'sofia', 28),
(12, 'sofia', 29),
(14, 'Ana', 31),
(15, 'Ana', 32),
(16, 'Ana', 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `id` int(15) NOT NULL,
  `saldo` int(50) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  `numero` int(40) NOT NULL,
  `banco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id`, `saldo`, `tipo`, `numero`, `banco`) VALUES
(28, 10000, 'Debito', 1, 'el mejor'),
(29, 20000, 'Debito', 2, 'el mejor'),
(31, 10000, 'Debito', 3, 'el mejor'),
(32, 140000, 'Debito', 4, 'Bancolombia'),
(33, 400000, 'none', 0, 'none');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketes`
--

CREATE TABLE `ticketes` (
  `id` int(15) NOT NULL,
  `id_carrito` int(15) DEFAULT NULL,
  `id_vuelo` int(15) DEFAULT NULL,
  `creador` varchar(20) NOT NULL,
  `tipo_id` text DEFAULT NULL,
  `documento` int(12) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `genero` text NOT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `nombre_de_contacto` text NOT NULL,
  `telefono_de_contacto` varchar(30) NOT NULL,
  `tiene_promocion` tinyint(1) NOT NULL DEFAULT 0,
  `precio` int(10) NOT NULL,
  `tipo_clase` text NOT NULL,
  `numero_silla` int(4) NOT NULL,
  `confirmacion` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ticketes`
--

INSERT INTO `ticketes` (`id`, `id_carrito`, `id_vuelo`, `creador`, `tipo_id`, `documento`, `nombre`, `apellido`, `fecha_de_nacimiento`, `genero`, `telefono`, `correo_electronico`, `nombre_de_contacto`, `telefono_de_contacto`, `tiene_promocion`, `precio`, `tipo_clase`, `numero_silla`, `confirmacion`, `fecha_creacion`) VALUES
(79, 8, 3, 'Ana', 'TI', 1004716847, 'Sofia', 'Beltran', '1999-06-15', 'Otro', '3202607', 'sofia@hotmail.com', 'Ana', '3202607', 0, 2000, 'Claseeconomica', 59, 1, '2021-11-23'),
(80, 9, 3, 'Ana', 'TI', 1004716847, 'ana', 'beltran', '2021-11-17', 'Mujer', '314', 'anasobeltran@gmail.com', 'ana beltran', '23', 0, 6000, 'primeraClase', 25, 1, '2021-11-25'),
(81, 10, 13, 'Ana', 'CC', 1004716847, 'Ana Sofia', 'Beltran Rios', '2021-11-17', 'Mujer', '3159273187', 'anasobeltran@gmail.com', 'ana beltran', '3159273187', 0, 40000, 'primeraClase', 23, 0, '2021-12-07'),
(82, 10, 13, 'Ana', 'TI', 42010734, 'lina maria', 'Rios millan', '2000-01-04', 'Mujer', '3202607', 'anasobeltran@gmail.com', 'ana beltran', '3202607', 0, 20000, 'Claseeconomica', 67, 1, '2021-12-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Login_Usuario` varchar(20) NOT NULL,
  `Contrasena` int(20) NOT NULL,
  `Documento` int(12) NOT NULL,
  `Nombres` text NOT NULL,
  `Apellidos` text NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `Genero` text NOT NULL,
  `Correo_electrónico` varchar(50) NOT NULL,
  `rol` int(5) NOT NULL,
  `id_carrito` int(15) DEFAULT NULL,
  `id_tarjeta` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Login_Usuario`, `Contrasena`, `Documento`, `Nombres`, `Apellidos`, `Fecha_nacimiento`, `Genero`, `Correo_electrónico`, `rol`, `id_carrito`, `id_tarjeta`) VALUES
('root', 1234, 1234, 'root', 'root', '2011-12-01', '', 'ejemplo', 3, NULL, NULL),
('daniel', 1234, 42077058, 'daniel', 'sepulveda', '1995-06-13', 'Hombre', 'anasobeltran@gmail.com', 1, NULL, NULL),
('sofia', 123456789, 100471684, 'sofia', 'beltran', '2000-06-06', 'Mujer', 'sofia@gmail.com', 1, NULL, NULL),
('alonso', 1234, 106736251, 'Alonso', 'Piedrahita', '2000-04-19', 'Hombre', 'alonso@gmail.com', 1, NULL, NULL),
('lina', 1234, 420770589, 'lina maria', 'Rios millan', '1999-02-13', 'Mujer', 'anasobeltran@gmail.com', 2, NULL, NULL),
('cami', 1234, 1004516847, 'ana', 'beltran', '2000-02-07', 'Mujer', 'anasobeltran@gmail.com', 1, NULL, NULL),
('Diana', 1234, 1004637284, 'Diana', 'Martinez', '1869-05-05', 'Mujer', 'anasobeltran@gmail.com', 1, NULL, NULL),
('Ana', 1234, 1004716847, 'Ana Sofia', 'Beltran Rios ', '2021-10-13', 'femenino', 'anasobeltran@gmail.com', 1, NULL, NULL),
('isabela', 1234, 1004751998, 'Isabela', 'Osorio', '2000-04-19', 'Mujer', 'isabela0419@gmail.com', 2, NULL, NULL),
('sebastianmora', 1234, 1085721693, 'Sebastian', 'Mora Carmona', '2000-09-15', 'Masculino', 'moracarmonasebastian2@gmail.com', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `lugar_de_salida` varchar(50) NOT NULL,
  `lugar_de_llegada` varchar(50) NOT NULL,
  `fecha_de_salida` date NOT NULL,
  `fecha_de_llegada` date NOT NULL,
  `hora_de_salida` time NOT NULL,
  `hora_de_llegada` time NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `precio` int(11) DEFAULT 0,
  `precioP` int(11) NOT NULL DEFAULT 0,
  `num_pasajeros_turista` int(11) NOT NULL DEFAULT 0,
  `num_pasajeros_pre` int(11) NOT NULL DEFAULT 0,
  `promocion` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id`, `id_admin`, `lugar_de_salida`, `lugar_de_llegada`, `fecha_de_salida`, `fecha_de_llegada`, `hora_de_salida`, `hora_de_llegada`, `tipo`, `precio`, `precioP`, `num_pasajeros_turista`, `num_pasajeros_pre`, `promocion`) VALUES
(1, NULL, 'cali', 'pereira', '2022-01-19', '2022-01-19', '00:00:00', '00:00:00', 'Nacional', 10000, 20000, 20, 30, 0),
(2, NULL, 'bogota', 'pereira', '2022-02-09', '2022-02-09', '00:00:00', '00:00:00', 'local', 201000, 223000, 50, 50, 1),
(3, NULL, 'medellin', 'pereira', '2021-12-24', '2021-12-24', '00:00:00', '00:00:00', 'n', 2000, 6000, 50, 50, 5),
(11, NULL, 'pereira', 'medellin', '2021-12-29', '2021-12-29', '18:29:00', '19:29:00', 'Nacional', 2000, 4000, 50, 50, 0),
(13, NULL, 'medellin', 'londres', '2021-12-30', '2021-12-30', '11:16:00', '12:16:00', 'Internacional', 20000, 40000, 58, 68, 0),
(14, NULL, 'medellin', 'pereira', '2021-12-09', '2021-12-10', '12:30:00', '16:30:00', 'Nacional', 2003, 2998, 67, 62, 5),
(15, NULL, 'cali', 'medellin', '2021-12-14', '2021-12-14', '13:37:00', '14:37:00', 'Nacional', 2000, 5000, 48, 68, 0),
(17, NULL, 'cali', 'londres', '2021-12-31', '2021-12-31', '15:42:00', '16:42:00', 'Internacional', 60000, 70000, 48, 48, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carritodecompras`
--
ALTER TABLE `carritodecompras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_tarjeta` (`id_tarjeta`),
  ADD KEY `fk_Login_Usuario` (`Login_Usuario`);

--
-- Indices de la tabla `check-ins`
--
ALTER TABLE `check-ins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_ticket` (`id_ticket`) USING BTREE;

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Login_Usuario` (`Login_Usuario`);

--
-- Indices de la tabla `respuesta_comentarios`
--
ALTER TABLE `respuesta_comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Login_Usuario` (`Login_Usuario`),
  ADD KEY `fk_comentario` (`id_comentario`);

--
-- Indices de la tabla `saldo_usuarios`
--
ALTER TABLE `saldo_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_login` (`login`),
  ADD KEY `fk_id_tarjeta` (`id_tarjeta`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticketes`
--
ALTER TABLE `ticketes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_carrito` (`id_carrito`),
  ADD KEY `fk_id_vuelo` (`id_vuelo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Documento`),
  ADD UNIQUE KEY `Login_Usuario` (`Login_Usuario`),
  ADD KEY `fk_id_carrito` (`id_carrito`),
  ADD KEY `fk_id_tarjeta` (`id_tarjeta`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_admin` (`id_admin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carritodecompras`
--
ALTER TABLE `carritodecompras`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `respuesta_comentarios`
--
ALTER TABLE `respuesta_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `saldo_usuarios`
--
ALTER TABLE `saldo_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `ticketes`
--
ALTER TABLE `ticketes`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritodecompras`
--
ALTER TABLE `carritodecompras`
  ADD CONSTRAINT `carritodecompras_ibfk_1` FOREIGN KEY (`id_tarjeta`) REFERENCES `tarjetas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `check-ins`
--
ALTER TABLE `check-ins`
  ADD CONSTRAINT `check-ins_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `ticketes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`Login_Usuario`) REFERENCES `usuarios` (`Login_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta_comentarios`
--
ALTER TABLE `respuesta_comentarios`
  ADD CONSTRAINT `respuesta_comentarios_ibfk_1` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_comentarios_ibfk_2` FOREIGN KEY (`Login_Usuario`) REFERENCES `usuarios` (`Login_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `saldo_usuarios`
--
ALTER TABLE `saldo_usuarios`
  ADD CONSTRAINT `saldo_usuarios_ibfk_1` FOREIGN KEY (`login`) REFERENCES `usuarios` (`Login_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saldo_usuarios_ibfk_2` FOREIGN KEY (`id_tarjeta`) REFERENCES `tarjetas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ticketes`
--
ALTER TABLE `ticketes`
  ADD CONSTRAINT `ticketes_ibfk_3` FOREIGN KEY (`id_carrito`) REFERENCES `carritodecompras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticketes_ibfk_4` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
