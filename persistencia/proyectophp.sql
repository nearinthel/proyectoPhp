-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2020 a las 04:43:14
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
  `pass` varchar(150) COLLATE utf8_bin NOT NULL,
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
(777, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'lemon', 'pedro', 'juan@juan.com', '2020-07-02', '2020-07-03', 'cajero', 1234, '02:30:00', '02:30:00', '0', '1', '0'),
(3333, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'helado', 'pedro', 'juan@juan.com', '2020-06-30', '2020-07-03', 'cajero', 300000, '02:30:00', '02:30:00', '1', '0', '0'),
(33333, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'helado', 'pedro', 'juan@juan.com', '2020-07-01', '2020-07-03', 'cajero', 170000, '02:30:00', '02:30:00', '0', '1', '0'),
(55555, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'space', 'pedro', 'juan@juan.com', '2020-06-30', '2020-07-03', 'cajero', 1234, '02:30:00', '02:30:00', '1', '0', '0'),
(56789, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'lemon', 'pedro', 'juan@juan.com', '2020-07-10', '2020-07-03', 'cajero', 17000, '02:30:00', '02:30:00', '', '', ''),
(66666, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'helado', 'pedro', 'tecnologo@tecnologo.com', '2020-07-07', '2020-07-03', 'cajero', 12345, '02:30:00', '02:30:00', '1', '0', '0'),
(111111, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'lemon', 'pedro', 'juan@juan.com', '2020-07-09', '2020-07-03', 'cajero', 17000, '02:30:00', '02:30:00', '1', '0', '0'),
(123456, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'space', 'pedro', 'tecnologo@tecnologo.com', '2020-06-30', '2020-07-03', 'cajero', 50000, '02:30:00', '02:30:00', '0', '1', '0'),
(333333, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'lemon', 'pedro', 'juan@juan.com', '2020-07-01', '2020-07-03', 'cajero', 15000, '02:30:00', '02:30:00', '1', '0', '0'),
(444444, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'helado', 'pedro', 'juan@juan.com', '2020-07-02', '2020-07-03', 'cajero', 170000, '02:30:00', '02:30:00', '1', '0', '0'),
(1111111, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'lemon', 'pedro', 'juan@juan.com', '2020-07-01', '2020-07-03', 'cajero', 150000, '02:30:00', '02:30:00', '1', '0', '0'),
(7895645, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'lemon', 'pedro', 'juan@juan.com', '2020-07-07', '2020-07-03', 'cajero', 15000, '02:30:00', '02:30:00', '1', '0', '0'),
(12102282, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'Susana', 'Merello', 'phprecibos@gmail.com', '1950-02-15', '1985-03-07', 'encargado', 20000, '02:30:00', '02:30:00', '0', '1', '0'),
(12345678, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'Mariana', 'Damelles', 'phprecibos@gmail.com', '1977-02-15', '1985-03-07', 'vendedor', 20000, '02:30:00', '02:30:00', '1', '0', '0'),
(22222222, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'helado', 'pedro', 'tecnologo@tecnologo.com', '2020-07-08', '2020-07-03', 'cajero', 22222200, '02:30:00', '02:30:00', '0', '0', '1'),
(44151643, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'Lucia', 'Figueredo', 'phprecibos@gmail.com', '1987-02-14', '1985-03-07', 'cajero', 20000, '02:30:00', '02:30:00', '1', '0', '0'),
(44853435, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'Hugo', 'Damelles', 'phprecibos@gmail.com', '1985-03-07', '1985-03-07', 'gerente', 20000, '02:30:00', '02:30:00', '0', '0', '1'),
(987654321, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'lemon', 'pedro', 'tecnologo@tecnologo.com', '2020-06-29', '2020-07-03', 'cajero', 150000, '02:30:00', '02:30:00', '0', '1', '0'),
(2147483647, '495a2134a5ef8e33bb30e71f038e3c81f350d08f2ed35c36eef07d953bbd35ab72978de16d3999faf467cb83afe3b37cb4d4f52289f69eacc1e3d6d37ab154c5', 'supergirl', 'pedro', 'juan@juan.com', '2020-06-29', '2020-07-03', 'cajero', 850000, '02:30:00', '02:30:00', '0', '0', '1');

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
  `dia` varchar(5) COLLATE utf8_bin NOT NULL,
  `mes` varchar(5) COLLATE utf8_bin NOT NULL,
  `anio` varchar(5) COLLATE utf8_bin NOT NULL,
  `inconsistencia` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`hora`, `registro`, `tipoMarca`, `dia`, `mes`, `anio`, `inconsistencia`) VALUES
('07:34:34', 44853435, '0', '02', '06', '2020', ''),
('07:56:04', 44853435, '0', '03', '06', '2020', ''),
('07:59:00', 44853435, '0', '06', '06', '2020', ''),
('08:00:00', 44853435, '0', '01', '06', '2020', ''),
('08:03:44', 44853435, '0', '04', '06', '2020', '1'),
('08:04:33', 44853435, '0', '05', '06', '2020', '1'),
('15:23:45', 44853435, '1', '05', '06', '2020', '1'),
('15:55:34', 44853435, '1', '03', '06', '2020', '1'),
('16:00:00', 44853435, '1', '02', '06', '2020', ''),
('16:02:33', 44853435, '1', '01', '06', '2020', ''),
('16:23:33', 44853435, '1', '04', '06', '2020', ''),
('23:20:12', 44853435, '0', '03', '07', '2020', '1'),
('23:24:29', 44853435, '1', '03', '07', '2020', ''),
('23:25:00', 44853435, '0', '03', '07', '2020', '1');

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
(3333, 777),
(3333, 33333),
(3333, 444444),
(3333, 12102282),
(3333, 22222222),
(3333, 987654321),
(3333, 2147483647),
(33333, 111111),
(55555, 33333),
(55555, 55555),
(55555, 56789),
(55555, 111111),
(55555, 123456),
(55555, 444444),
(55555, 12102282),
(55555, 22222222),
(55555, 44853435),
(55555, 987654321),
(55555, 2147483647),
(56789, 777),
(56789, 33333),
(56789, 12102282),
(56789, 987654321),
(66666, 33333),
(66666, 55555),
(66666, 444444),
(66666, 12102282),
(66666, 22222222),
(66666, 987654321),
(66666, 2147483647),
(111111, 444444),
(333333, 33333),
(333333, 55555),
(333333, 444444),
(333333, 12102282),
(333333, 22222222),
(333333, 987654321),
(333333, 2147483647),
(444444, 777),
(444444, 33333),
(444444, 123456),
(444444, 12102282),
(444444, 22222222),
(444444, 44853435),
(444444, 987654321),
(444444, 2147483647),
(1111111, 55555),
(1111111, 444444),
(1111111, 22222222),
(1111111, 2147483647),
(7895645, 55555),
(7895645, 444444),
(7895645, 12102282),
(7895645, 22222222),
(7895645, 987654321),
(7895645, 2147483647),
(12102282, 56789),
(12102282, 111111),
(12102282, 44853435),
(12345678, 55555),
(12345678, 444444),
(12345678, 12102282),
(12345678, 22222222),
(12345678, 44853435),
(12345678, 2147483647),
(22222222, 56789),
(22222222, 111111),
(22222222, 123456),
(22222222, 444444),
(22222222, 12102282),
(22222222, 22222222),
(22222222, 44853435),
(22222222, 987654321),
(22222222, 2147483647),
(44151643, 55555),
(44151643, 444444),
(44151643, 12102282),
(44151643, 22222222),
(44151643, 44853435),
(44151643, 2147483647),
(987654321, 56789),
(987654321, 111111),
(2147483647, 56789),
(2147483647, 111111),
(2147483647, 123456),
(2147483647, 444444),
(2147483647, 22222222),
(2147483647, 44853435),
(2147483647, 2147483647);

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
  ADD CONSTRAINT `acepta_ibfk_2` FOREIGN KEY (`nroAnuncio`) REFERENCES `anuncio` (`nroAnuncio`) ON DELETE CASCADE ON UPDATE CASCADE;

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
