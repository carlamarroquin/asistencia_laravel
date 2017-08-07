-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2017 a las 07:18:04
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portal_asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_depto` int(11) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_depto`, `departamento`, `estado`) VALUES
(1, 'Teoría e\nHistoria.', 1),
(2, 'Comunicación\nArquitectónica.', 1),
(3, 'Urbanismo.', 1),
(4, 'Tecnología de\r\nla Construcción.', 1),
(5, 'Proyectacion\r\nArquitectónica.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_depto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `tipo_docente` int(11) NOT NULL COMMENT '0=tiempo completo, 1=medio tiempo, 2=hora clase'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `horas_trab`
--
CREATE TABLE `horas_trab` (
`id_docente` int(11)
,`nombre` varchar(100)
,`marcacion` time
,`fecha` date
,`HORAS` time
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `horas_trabajadas`
--
CREATE TABLE `horas_trabajadas` (
`marcacion` time
,`fecha` date
,`horas` time
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcacion`
--

CREATE TABLE `marcacion` (
  `idMarcacion` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `marcacion` time NOT NULL,
  `tipo` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipousuario` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipousuario`, `tipo`, `estado`) VALUES
(1, 'Administrador', 1),
(2, 'Docente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `usuario_creacion` varchar(50) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_modificacion` varchar(50) DEFAULT 'null',
  `fecha_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura para la vista `horas_trab`
--
DROP TABLE IF EXISTS `horas_trab`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `horas_trab`  AS  select `d`.`id_docente` AS `id_docente`,`d`.`nombre` AS `nombre`,`m`.`marcacion` AS `marcacion`,`m`.`fecha` AS `fecha`,timediff(`m1`.`marcacion`,`m`.`marcacion`) AS `HORAS` from ((`marcacion` `m` join `docente` `d` on((`m`.`idDocente` = `d`.`id_docente`))) left join `marcacion` `m1` on((`m1`.`idMarcacion` > `m`.`idMarcacion`))) where ((`m`.`tipo` = 0) and (`m1`.`tipo` = 1) and (`m`.`fecha` = `m1`.`fecha`)) group by `m`.`marcacion` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `horas_trabajadas`
--
DROP TABLE IF EXISTS `horas_trabajadas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `horas_trabajadas`  AS  select `m`.`marcacion` AS `marcacion`,`m`.`fecha` AS `fecha`,sec_to_time(sum(time_to_sec(timediff(`m1`.`marcacion`,`m`.`marcacion`)))) AS `horas` from (`marcacion` `m` left join `marcacion` `m1` on((`m1`.`idMarcacion` > `m`.`idMarcacion`))) where ((`m`.`tipo` = 0) and (`m1`.`tipo` = 1) and (`m`.`fecha` = `m1`.`fecha`)) group by `m`.`marcacion` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_depto`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `fk_depto` (`id_depto`),
  ADD KEY `fk_usuario_idx` (`id_usuario`);

--
-- Indices de la tabla `marcacion`
--
ALTER TABLE `marcacion`
  ADD PRIMARY KEY (`idMarcacion`),
  ADD KEY `fk_usuario_marcacion_idx` (`idDocente`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipousuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_usuario` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_depto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `marcacion`
--
ALTER TABLE `marcacion`
  MODIFY `idMarcacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_depto` FOREIGN KEY (`id_depto`) REFERENCES `departamento` (`id_depto`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `marcacion`
--
ALTER TABLE `marcacion`
  ADD CONSTRAINT `fk_usuario_marcacion` FOREIGN KEY (`idDocente`) REFERENCES `docente` (`id_docente`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_tipo_usuario` FOREIGN KEY (`tipo`) REFERENCES `tipo_usuario` (`id_tipousuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
