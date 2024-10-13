-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-10-2024 a las 22:39:29
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `secretos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GRUPO`
--

CREATE TABLE `GRUPO` (
  `gru_id` int(11) NOT NULL,
  `gru_nombre` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HOST`
--

CREATE TABLE `HOST` (
  `hos_id` int(11) NOT NULL,
  `hos_nombre` varchar(999) NOT NULL,
  `hos_host` varchar(999) NOT NULL,
  `hos_idGrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SECRETO`
--

CREATE TABLE `SECRETO` (
  `sec_id` int(11) NOT NULL,
  `sec_clave` varchar(999) NOT NULL,
  `sec_valor` varchar(999) NOT NULL,
  `sec_idGrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `GRUPO`
--
ALTER TABLE `GRUPO`
  ADD PRIMARY KEY (`gru_id`);

--
-- Indices de la tabla `HOST`
--
ALTER TABLE `HOST`
  ADD PRIMARY KEY (`hos_id`),
  ADD KEY `gru_hos_fk` (`hos_idGrupo`);

--
-- Indices de la tabla `SECRETO`
--
ALTER TABLE `SECRETO`
  ADD PRIMARY KEY (`sec_id`),
  ADD KEY `gru_sec_fk` (`sec_idGrupo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `GRUPO`
--
ALTER TABLE `GRUPO`
  MODIFY `gru_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `HOST`
--
ALTER TABLE `HOST`
  MODIFY `hos_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `SECRETO`
--
ALTER TABLE `SECRETO`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `HOST`
--
ALTER TABLE `HOST`
  ADD CONSTRAINT `gru_hos_fk` FOREIGN KEY (`hos_idGrupo`) REFERENCES `GRUPO` (`gru_id`);

--
-- Filtros para la tabla `SECRETO`
--
ALTER TABLE `SECRETO`
  ADD CONSTRAINT `gru_sec_fk` FOREIGN KEY (`sec_idGrupo`) REFERENCES `GRUPO` (`gru_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
