-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2020 a las 23:27:41
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acepta`
--

CREATE TABLE `acepta` (
  `regSup` int(11) NOT NULL,
  `nroAnuncio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio`
--

CREATE TABLE `anuncio` (
  `nroAnuncio` int(11) NOT NULL,
  `descripcion` varchar(140) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `registro` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(25) COLLATE utf8_bin NOT NULL,
  `fnac` date NOT NULL,
  `fing` date NOT NULL,
  `cargo` varchar(25) COLLATE utf8_bin NOT NULL,
  `sueldo` float NOT NULL,
  `entrada` time NOT NULL,
  `salida` time NOT NULL,
  `esSubordinado` char(1) COLLATE utf8_bin NOT NULL,
  `esSupervisor` char(1) COLLATE utf8_bin NOT NULL,
  `esJefe` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justifica`
--

CREATE TABLE `justifica` (
  `nroAnuncio` int(11) NOT NULL,
  `hora` time NOT NULL,
  `registro` int(11) NOT NULL,
  `tipoMarca` varchar(25) COLLATE utf8_bin NOT NULL,
  `inconsistencia` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `hora` time NOT NULL,
  `registro` int(11) NOT NULL,
  `tipoMarca` varchar(25) COLLATE utf8_bin NOT NULL,
  `inconsistencia` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE `tiene` (
  `regSub` int(11) NOT NULL,
  `regSup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acepta`
--
ALTER TABLE `acepta`
  ADD PRIMARY KEY (`regSup`,`nroAnuncio`),
  ADD KEY `nroAnuncio` (`nroAnuncio`);

--
-- Indices de la tabla `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`nroAnuncio`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`registro`);

--
-- Indices de la tabla `justifica`
--
ALTER TABLE `justifica`
  ADD PRIMARY KEY (`nroAnuncio`,`hora`,`registro`,`tipoMarca`),
  ADD KEY `registro` (`registro`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`hora`,`registro`,`tipoMarca`),
  ADD KEY `registro` (`registro`);

--
-- Indices de la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD PRIMARY KEY (`regSub`,`regSup`),
  ADD KEY `regSup` (`regSup`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acepta`
--
ALTER TABLE `acepta`
  ADD CONSTRAINT `acepta_ibfk_1` FOREIGN KEY (`regSup`) REFERENCES `funcionario` (`registro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acepta_ibfk_2` FOREIGN KEY (`nroAnuncio`) REFERENCES `justifica` (`nroAnuncio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `justifica`
--
ALTER TABLE `justifica`
  ADD CONSTRAINT `justifica_ibfk_1` FOREIGN KEY (`registro`) REFERENCES `funcionario` (`registro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `justifica_ibfk_2` FOREIGN KEY (`nroAnuncio`) REFERENCES `anuncio` (`nroAnuncio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD CONSTRAINT `marcas_ibfk_1` FOREIGN KEY (`registro`) REFERENCES `funcionario` (`registro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tiene`
--
ALTER TABLE `tiene`
  ADD CONSTRAINT `tiene_ibfk_1` FOREIGN KEY (`regSub`) REFERENCES `funcionario` (`registro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiene_ibfk_2` FOREIGN KEY (`regSup`) REFERENCES `funcionario` (`registro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
