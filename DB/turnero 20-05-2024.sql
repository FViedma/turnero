-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2024 a las 22:02:24
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turnero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion`
--

CREATE TABLE `atencion` (
  `id` int(11) NOT NULL,
  `turno` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `idCaja` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `atendido` int(11) NOT NULL,
  `fechaAtencion` datetime NOT NULL,
  `idTurno` int(11) NOT NULL,
  `tipoAtencion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha_de_registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `nombre`, `idUsuario`, `fecha_de_registro`) VALUES
(1, 'Caja 1', 8, '0000-00-00 00:00:00'),
(2, 'Caja 2', 9, '0000-00-00 00:00:00'),
(3, 'Caja 3', 10, '0000-00-00 00:00:00'),
(4, 'Caja 4', 11, '0000-00-00 00:00:00'),
(5, 'Caja 5', 12, '2020-02-14 17:27:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_empresa`
--

CREATE TABLE `info_empresa` (
  `id` int(11) NOT NULL,
  `logo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `info_empresa`
--

INSERT INTO `info_empresa` (`id`, `logo`, `nombre`, `direccion`, `telefono`, `correo`, `fecha_actualizacion`) VALUES
(1, 'img/descarga.jpg', 'Hospital Clínico Viedma', 'Calle Venezuela', '12-34-56-78', 'desarrollo.hcv@gmail.com', '2023-02-28 15:27:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `noticia` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `fecha_permiso` date NOT NULL,
  `fecha_retorno` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(12) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `fecha_creacion`) VALUES
(1, 'Administrado', '2023-03-04 15:04:19'),
(2, 'Cajero', '2023-03-04 15:02:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `turno` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `atendido` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `turno`, `atendido`, `fechaRegistro`, `tipo`) VALUES
(1, '000', 0, '2024-05-20 22:02:16', 'fichas'),
(2, '000', 0, '2024-05-20 22:02:16', 'general'),
(3, '000', 0, '2024-05-20 22:02:16', 'ädultos'),
(4, '000', 0, '2024-05-20 22:02:16', 'discapacidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `idCaja` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `idCaja`, `id_rol`, `fecha_alta`, `fecha_actualizacion`) VALUES
(9, 'laura', '680e89809965ec41e64dc7e447f175ab', 2, 2, '2018-01-11 03:04:27', '0000-00-00 00:00:00'),
(8, 'oscar', 'f156e7995d521f30e6c59a3d6c75e1e5', 1, 2, '2018-01-11 03:04:16', '0000-00-00 00:00:00'),
(10, 'rocio', '325daa03a34823cef2fc367c779561ba', 3, 2, '2018-01-11 03:04:58', '0000-00-00 00:00:00'),
(11, 'patricio', '295299b687749528c9a9e551d11e17ea', 4, 2, '2018-01-11 03:05:07', '0000-00-00 00:00:00'),
(12, 'Alberto', '177dacb14b34103960ec27ba29bd686b', 5, 2, '2020-02-14 17:27:56', '0000-00-00 00:00:00'),
(1, 'admin', '81fccaf9f00a8441b77b18fa2c8010f4', 0, 1, '2023-03-04 10:55:31', '2023-03-04 13:53:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `extension` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `nombre`, `extension`) VALUES
(1, 'video1', '.mp4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `info_empresa`
--
ALTER TABLE `info_empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atencion`
--
ALTER TABLE `atencion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `info_empresa`
--
ALTER TABLE `info_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
