-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2022 a las 22:56:58
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsem2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativos`
--

CREATE TABLE `administrativos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `documento` double DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `contra` varchar(20) DEFAULT NULL,
  `opinion` varchar(150) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrativos`
--

INSERT INTO `administrativos` (`codigo`, `nombre`, `apellido`, `cargo`, `documento`, `correo`, `contra`, `opinion`, `rol`) VALUES
(15, 'bramdo', 'Cadena', 'secretario', 12345, 'nicolascaden@gmail.com', '12345', NULL, 'administrativos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesoresest`
--

CREATE TABLE `asesoresest` (
  `identificacion` int(50) NOT NULL,
  `tipo` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ase` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nomp` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `identest` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `rol` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id` int(11) NOT NULL,
  `idautor` int(15) NOT NULL,
  `docum` int(20) NOT NULL,
  `nota` int(11) NOT NULL,
  `rol` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idcomentario` int(11) NOT NULL,
  `idautor` int(11) DEFAULT NULL,
  `idproyecto` int(11) DEFAULT NULL,
  `comentario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cometariodoc`
--

CREATE TABLE `cometariodoc` (
  `identificacion` int(50) NOT NULL,
  `proyecto` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `comentario` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `rol` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `codigo` int(15) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `programa` varchar(100) DEFAULT NULL,
  `facultad` varchar(100) DEFAULT NULL,
  `documento` double DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contra` varchar(20) DEFAULT NULL,
  `opinion` varchar(250) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`codigo`, `nombre`, `apellido`, `programa`, `facultad`, `documento`, `correo`, `contra`, `opinion`, `rol`) VALUES
(19, 'Nicolas', 'Cadena', 'Ingenieria de sistemas', 'Ingenieria', 12345, 'nicolascadena08@gmail.com', '12345', NULL, 'estudiante'),
(22, 'maria', 'perez', 'ingenieria de sistemas', 'ingenieria', 5678, 'maria@gmail.com', '5678', NULL, 'estudiante'),
(23, 'Juan Carlos', 'Hernandes', 'Ingenieria Sistemas', 'Ingenieria', 1088219264, 'jjjj@gmail.com', '1088219264', NULL, 'estudiante'),
(24, 'Tatiana', 'Acosta', 'Artes visuales', 'Artes', 100000, 'tat@udenar.edu.co', '100000', NULL, 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `facultad` varchar(100) DEFAULT NULL,
  `documento` double DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `contra` varchar(20) DEFAULT NULL,
  `opinion` varchar(100) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `idProyecto` int(15) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`codigo`, `nombre`, `apellido`, `facultad`, `documento`, `correo`, `contra`, `opinion`, `rol`, `idProyecto`) VALUES
(15, 'Lety', 'Ramirez', 'Sociologia', 123123, 'lll@gmail.com', '123123', NULL, 'docente', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitestud`
--

CREATE TABLE `solicitestud` (
  `codigo` int(11) NOT NULL,
  `identificacion` int(50) NOT NULL,
  `jurado` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `asesor` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `aprobado` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `rol` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `idsolicitud` int(20) NOT NULL,
  `nombredoc` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `asunto` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `solicitud` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `calificacion` int(15) DEFAULT NULL,
  `comentarios` varchar(1000) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `url` varchar(1000) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `solicitante` int(15) DEFAULT NULL,
  `idDocente` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `name` varchar(300) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `asesoresest`
--
ALTER TABLE `asesoresest`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcomentario`);

--
-- Indices de la tabla `cometariodoc`
--
ALTER TABLE `cometariodoc`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `solicitestud`
--
ALTER TABLE `solicitestud`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`idsolicitud`),
  ADD KEY `solicitante` (`solicitante`),
  ADD KEY `idDocente` (`idDocente`);

--
-- Indices de la tabla `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `asesoresest`
--
ALTER TABLE `asesoresest`
  MODIFY `identificacion` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cometariodoc`
--
ALTER TABLE `cometariodoc`
  MODIFY `identificacion` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23124;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `codigo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `solicitestud`
--
ALTER TABLE `solicitestud`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `idsolicitud` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1085943813;

--
-- AUTO_INCREMENT de la tabla `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `profesores` (`codigo`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`solicitante`) REFERENCES `estudiante` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
