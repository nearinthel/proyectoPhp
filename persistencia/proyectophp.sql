-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2020 a las 17:25:01
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
  `idAnuncio` int(11) NOT NULL,
  `descripcion` varchar(140) COLLATE utf8_bin NOT NULL,
  `justificacion` varchar(140) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `anuncio`
--

INSERT INTO `anuncio` (`nroAnuncio`, `idAnuncio`, `descripcion`, `justificacion`) VALUES
(0, 0, '0', ''),
(1, 0, 'Hora extra descanso', ''),
(2, 0, 'Hora extra común', ''),
(3, 0, 'LLegada tarde', ''),
(4, 0, 'Salida antes', ''),
(5, 0, 'Licencia', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `registro` int(11) NOT NULL,
  `hora` datetime NOT NULL,
  `descripcion` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`registro`, `hora`, `descripcion`) VALUES
(44853435, '2020-07-12 00:00:00', 'hhghghgffg'),
(44853435, '2020-07-12 00:00:00', 'dgfgdfgdfgf'),
(44853435, '2020-07-12 00:00:00', 'hfghfghfggh'),
(44853435, '2020-07-12 00:00:00', 'ddghfdfggdfgdf'),
(44853435, '2020-07-12 00:00:00', 'jgjhjggjhjgjgh'),
(44853435, '2020-07-12 00:00:00', 'ertreterteter'),
(44853435, '2020-06-04 00:00:00', 'llegue porque se me salio la cadena'),
(44853435, '2020-06-05 00:00:00', 'llegue tarde porque se me quemo el arroz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `registro` int(11) NOT NULL,
  `pass` varchar(140) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(25) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(25) COLLATE utf8_bin NOT NULL,
  `mail` varchar(25) COLLATE utf8_bin NOT NULL,
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

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`registro`, `pass`, `nombre`, `apellido`, `mail`, `fnac`, `fing`, `cargo`, `sueldo`, `entrada`, `salida`, `esSubordinado`, `esSupervisor`, `esJefe`) VALUES
(12102282, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'Susana', 'Merello', 'phprecibos@gmail.com', '1950-02-15', '1985-03-07', 'encargado', 20000, '02:30:00', '02:30:00', '0', '1', '0'),
(12345678, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'Mariana', 'Damelles', 'phprecibos@gmail.com', '1977-02-15', '1985-03-07', 'vendedor', 20000, '02:30:00', '02:30:00', '0', '0', '1'),
(44151643, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'Lucia', 'Figueredo', 'phprecibos@gmail.com', '1987-02-14', '1985-03-07', 'cajero', 20000, '02:30:00', '02:30:00', '1', '0', '0'),
(44853435, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'Hugo', 'Damelles', 'phprecibos@gmail.com', '1985-03-07', '1985-03-07', 'gerente', 20000, '02:30:00', '02:30:00', '0', '0', '1'),
(2147483647, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'lemon', 'pedro', 'juan@juan.com', '2020-07-01', '2020-07-13', 'cajero', 500000, '02:30:00', '02:30:00', '1', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justifica`
--

CREATE TABLE `justifica` (
  `nroAnuncio` int(11) NOT NULL,
  `idAnuncio` int(11) NOT NULL,
  `entrada` time NOT NULL,
  `salida` time NOT NULL,
  `registro` int(11) NOT NULL,
  `tipoMarca` varchar(25) COLLATE utf8_bin NOT NULL,
  `inconsistencia` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `justifica`
--

INSERT INTO `justifica` (`nroAnuncio`, `idAnuncio`, `entrada`, `salida`, `registro`, `tipoMarca`, `inconsistencia`) VALUES
(1, 0, '22:29:00', '22:29:00', 44853435, '', '1'),
(1, 0, '22:29:00', '22:29:00', 44853435, '', '1'),
(2, 0, '22:37:00', '00:00:00', 12102282, '', '1'),
(1, 0, '22:55:00', '22:55:00', 12345678, '', '1'),
(0, 0, '00:00:00', '00:00:00', 44853435, '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `hora` datetime NOT NULL,
  `registro` int(11) NOT NULL,
  `tipoMarca` varchar(25) COLLATE utf8_bin NOT NULL,
  `dia` varchar(2) COLLATE utf8_bin NOT NULL,
  `mes` varchar(2) COLLATE utf8_bin NOT NULL,
  `anio` varchar(4) COLLATE utf8_bin NOT NULL,
  `inconsistencia` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`hora`, `registro`, `tipoMarca`, `dia`, `mes`, `anio`, `inconsistencia`) VALUES
('2020-06-01 08:00:00', 44853435, '0', '01', '06', '2020', ''),
('2020-06-02 07:34:34', 44853435, '0', '02', '06', '2020', ''),
('2020-06-03 07:56:04', 44853435, '0', '03', '06', '2020', ''),
('2020-06-04 08:03:44', 44853435, '0', '04', '06', '2020', '1'),
('2020-06-05 08:04:33', 44853435, '0', '05', '06', '2020', '1'),
('2020-06-06 07:59:00', 44853435, '0', '06', '06', '2020', ''),
('2020-06-01 16:02:33', 44853435, '1', '01', '06', '2020', ''),
('2020-06-02 16:00:00', 44853435, '1', '02', '06', '2020', ''),
('2020-06-03 15:55:34', 44853435, '1', '03', '06', '2020', '1'),
('2020-06-04 16:23:33', 44853435, '1', '04', '06', '2020', ''),
('2020-06-05 15:23:45', 44853435, '1', '05', '06', '2020', '1'),
('2020-06-06 16:00:00', 44853435, '1', '06', '06', '2020', ''),
('2020-07-12 22:30:42', 44853435, '0', '12', '07', '2020', '1'),
('2020-07-13 01:54:49', 12102282, '0', '13', '07', '2020', '1'),
('2020-07-13 01:58:45', 12102282, '1', '13', '07', '2020', '1'),
('2020-07-13 02:45:15', 44853435, '1', '13', '07', '2020', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE `tiene` (
  `regSub` int(11) NOT NULL,
  `regSup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`regSub`, `regSup`) VALUES
(12102282, 12345678),
(44853435, 12345678),
(44151643, 12102282),
(44151643, 12345678),
(44151643, 44853435),
(2147483647, 12102282),
(2147483647, 12345678),
(2147483647, 44853435);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acepta`
--
ALTER TABLE `acepta`
  ADD PRIMARY KEY (`regSup`,`nroAnuncio`),
  ADD KEY `acepta_ibfk_2` (`nroAnuncio`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
