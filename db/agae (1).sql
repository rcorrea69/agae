-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2021 a las 13:54:34
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agae`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padron`
--

CREATE TABLE `padron` (
  `id_abogado` int(11) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `dni` varchar(12) NOT NULL,
  `T` int(10) NOT NULL,
  `F` int(10) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `referente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `padron`
--

INSERT INTO `padron` (`id_abogado`, `apellidos`, `nombres`, `dni`, `T`, `F`, `celular`, `referente`) VALUES
(1, 'RODRIGUEZ', 'FACUNDO', '32.848.498', 0, 0, '', 'MARCELA Peña'),
(2, 'CASTRO CORCOS', 'ELIZABETH', '33.004.371', 111, 683, '', 'Acénto'),
(3, 'ROMERO', 'MARIA JOSE', '25.184.326', 85, 859, '', 'MARCELA CEVA'),
(4, 'CLAPS', 'ENRIQUE', '25.020.194', 89, 967, '', 'MARCELA CEVA'),
(5, 'ZACUR', 'CLAUDIA SUSANA', '14.596.065', 43, 421, '', 'MARCELA CEVA'),
(6, 'DOMINGUEZ', 'SILVIA BEATRIZ', '24.984.871', 84, 110, '', 'MARCELA CEVA'),
(7, 'BOSCHIASO ', 'FERNANDA', '25.340.045', 78, 786, '', 'MARCELA CEVA'),
(8, 'LENZA', 'MARIELA GRISELDA', '24.665.644', 73, 968, '', 'MARCELA CEVA'),
(9, 'DECUNDO', 'DIEGO', '28.988.161', 109, 962, '', 'MARCELA CEVA'),
(10, 'SIGNORIS', 'INES', '25.094.438', 88, 120, '', 'MARCELA CEVA'),
(11, 'ECKERT', 'MONICA', '16.339.268', 45, 656, '', 'MARCELA CEVA'),
(12, 'Nanini', 'Gisella', '25.258.972', 75, 98, '', 'MARCELA CEVA'),
(13, 'Piquin', 'Jimena', '26.158.046', 82, 702, '', 'MARCELA CEVA'),
(14, 'Delgado', 'Jose Luis', '22.637.614', 92, 916, '', 'MARCELA CEVA'),
(15, 'Gonzales', 'Myryam', '', 0, 0, '', 'MARCELA CEVA'),
(16, 'Malaguer', 'Maria Sol', '', 0, 0, '', 'MARCELA CEVA'),
(17, 'Spagnoleti', 'Patricia', '', 0, 0, '', 'MARCELA CEVA'),
(18, 'Degastaldi', 'Maria Cecilia', '', 0, 0, '', 'MARCELA CEVA'),
(19, 'Nogales', 'Luis', '', 0, 0, '', 'MARCELA CEVA'),
(20, 'SPAGNOLETI', 'PATRICIA', '20.021.921', 41, 590, '', 'MARCELA CEVA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padron2`
--

CREATE TABLE `padron2` (
  `id_abogado` int(11) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `dni` varchar(12) NOT NULL,
  `T` int(10) NOT NULL,
  `F` int(10) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `referente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `padron2`
--

INSERT INTO `padron2` (`id_abogado`, `apellidos`, `nombres`, `dni`, `T`, `F`, `celular`, `referente`) VALUES
(1, 'RODRIGUEZ', 'FACUNDO', '32.848.498', 0, 0, '', 'MARCELA Peña'),
(2, 'CASTRO CORCOS', 'ELIZABETH', '33.004.371', 111, 683, '', 'Acénto'),
(3, 'ROMERO', 'MARIA JOSE', '25.184.326', 85, 859, '', 'MARCELA CEVA'),
(4, 'CLAPS', 'ENRIQUE', '25.020.194', 89, 967, '', 'MARCELA CEVA'),
(5, 'ZACUR', 'CLAUDIA SUSANA', '14.596.065', 43, 421, '', 'MARCELA CEVA'),
(6, 'DOMINGUEZ', 'SILVIA BEATRIZ', '24.984.871', 84, 110, '', 'MARCELA CEVA'),
(7, 'BOSCHIASO ', 'FERNANDA', '25.340.045', 78, 786, '', 'MARCELA CEVA'),
(8, 'LENZA', 'MARIELA GRISELDA', '24.665.644', 73, 968, '', 'MARCELA CEVA'),
(9, 'DECUNDO', 'DIEGO', '28.988.161', 109, 962, '', 'MARCELA CEVA'),
(10, 'SIGNORIS', 'INES', '25.094.438', 88, 120, '', 'MARCELA CEVA'),
(11, 'ECKERT', 'MONICA', '16.339.268', 45, 656, '', 'MARCELA CEVA'),
(12, 'Nanini', 'Gisella', '25.258.972', 75, 98, '', 'MARCELA CEVA'),
(13, 'Piquin', 'Jimena', '26.158.046', 82, 702, '', 'MARCELA CEVA'),
(14, 'Delgado', 'Jose Luis', '22.637.614', 92, 916, '', 'MARCELA CEVA'),
(15, 'Gonzales', 'Myryam', '', 0, 0, '', 'MARCELA CEVA'),
(16, 'Malaguer', 'Maria Sol', '', 0, 0, '', 'MARCELA CEVA'),
(17, 'Spagnoleti', 'Patricia', '', 0, 0, '', 'MARCELA CEVA'),
(18, 'Degastaldi', 'Maria Cecilia', '', 0, 0, '', 'MARCELA CEVA'),
(19, 'Nogales', 'Luis', '', 0, 0, '', 'MARCELA CEVA'),
(20, 'SPAGNOLETI', 'PATRICIA', '20.021.921', 41, 590, '', 'MARCELA CEVA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(4) NOT NULL,
  `usu_usuario` varchar(20) NOT NULL,
  `usu_clave` varchar(15) NOT NULL,
  `usu_nombre` varchar(30) NOT NULL,
  `usu_nivel` int(2) NOT NULL,
  `usu_fecha_alta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usu_usuario`, `usu_clave`, `usu_nombre`, `usu_nivel`, `usu_fecha_alta`) VALUES
(1, 'javier', '1234444', 'Javier Peña', 2, '2016-12-21'),
(2, 'ruben', 'Rcorrea', 'Ruben Correa ', 2, '2016-12-21'),
(3, 'miguel', 'miguel', 'Miguel', 1, '2016-12-21'),
(4, 'cande', 'cande123', 'candela correa', 2, '2019-12-05'),
(5, 'agu co', 'agus', 'agustin ', 1, '2019-12-05'),
(6, 'cande', 'cande', 'Cane', 1, '2019-12-10'),
(7, 'claudio', 'claudio', 'Claudio Cracco', 2, '2019-12-10'),
(8, 'ruben', 'ruben123', 'Rubén Ramos', 1, '2021-10-31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `padron`
--
ALTER TABLE `padron`
  ADD PRIMARY KEY (`id_abogado`);

--
-- Indices de la tabla `padron2`
--
ALTER TABLE `padron2`
  ADD PRIMARY KEY (`id_abogado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `padron`
--
ALTER TABLE `padron`
  MODIFY `id_abogado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `padron2`
--
ALTER TABLE `padron2`
  MODIFY `id_abogado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
