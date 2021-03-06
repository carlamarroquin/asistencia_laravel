-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2017 a las 06:53:34
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencia`
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

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_docente`, `id_usuario`, `id_depto`, `nombre`, `apellidos`, `email`, `estado`, `tipo_docente`) VALUES
(3, 17, 1, 'Carla', 'Marroquin', 'carla@gmail.com', 1, 0),
(4, 14, 1, 'Steven', 'Mena', 'carla.marroquin@gmail.com', 1, 0),
(5, 18, 1, 'Carlos', 'Lopez', 'smena@gmail.com', 1, 0),
(6, 19, 1, 'Alejandro', 'Henriquez', 'carla.marroquin@gmail.com', 1, 0),
(7, 20, 1, 'Carlos', 'Juarez', 'carla.marroquin@gmail.com', 1, 0),
(8, 21, 2, 'Arnold', 'F.', 'carla.marroquin@gmail.com', 1, 1),
(9, 22, 1, 'Alejandro', 'Lopez', 'carla.marroquin1@gmail.com', 1, 0),
(10, 23, 1, 'caarlos', 'alvar', 'carla.marroquin@gmail.com', 1, 0);

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

--
-- Volcado de datos para la tabla `marcacion`
--

INSERT INTO `marcacion` (`idMarcacion`, `idDocente`, `fecha`, `marcacion`, `tipo`, `created_at`, `updated_at`) VALUES
(3, 3, '2017-04-26', '20:23:10', 0, '2017-04-27 02:30:12', '2017-04-27 02:30:12'),
(5, 3, '2017-04-26', '20:35:22', 1, '2017-04-27 02:35:38', '2017-04-27 02:35:38'),
(6, 3, '2017-06-10', '19:02:19', 0, '2017-06-11 01:02:24', '2017-06-11 01:02:24'),
(7, 4, '2017-07-08', '20:13:53', 0, '2017-07-09 02:13:56', '2017-07-09 02:13:56'),
(8, 4, '2017-07-08', '20:13:57', 1, '2017-07-09 02:20:21', '2017-07-09 02:20:21'),
(9, 4, '2017-07-08', '20:20:21', 0, '2017-07-09 02:25:53', '2017-07-09 02:25:53'),
(10, 4, '2017-07-08', '20:26:39', 1, '2017-07-09 02:26:42', '2017-07-09 02:26:42'),
(11, 5, '2017-07-09', '16:35:01', 0, '2017-07-09 22:37:15', '2017-07-09 22:37:15'),
(12, 5, '2017-07-09', '16:38:53', 1, '2017-07-09 22:38:55', '2017-07-09 22:38:55'),
(13, 5, '2017-07-09', '16:47:20', 1, '2017-07-09 22:47:27', '2017-07-09 22:47:27'),
(14, 4, '2017-08-02', '10:14:51', 0, '2017-08-02 16:14:57', '2017-08-02 16:14:57'),
(15, 4, '2017-08-02', '11:20:58', 1, '2017-08-02 16:15:20', '2017-08-02 16:15:20'),
(16, 4, '2017-08-02', '11:21:20', 0, '2017-08-02 16:27:47', '2017-08-02 16:27:47'),
(17, 4, '2017-08-02', '12:27:47', 1, '2017-08-02 16:27:51', '2017-08-02 16:27:51'),
(18, 4, '2017-08-05', '19:18:39', 0, '2017-08-06 01:18:46', '2017-08-06 01:18:46'),
(19, 4, '2017-08-05', '19:25:47', 1, '2017-08-06 01:18:54', '2017-08-06 01:18:54'),
(20, 6, '2017-08-05', '19:55:42', 0, '2017-08-06 01:55:47', '2017-08-06 01:55:47'),
(21, 6, '2017-08-05', '19:55:47', 1, '2017-08-06 01:55:51', '2017-08-06 01:55:51'),
(22, 6, '2017-08-05', '19:55:52', 0, '2017-08-06 01:55:56', '2017-08-06 01:55:56'),
(23, 6, '2017-08-05', '19:55:56', 1, '2017-08-06 01:56:00', '2017-08-06 01:56:00');

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

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `tipo`, `email`, `estado`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`) VALUES
(14, 'smena', '$2y$10$LnnIFJVlGbmgnK3lMjNRGOKeL5coesF0L9bPwA5SZ3hutKGWacHT.', 1, 'stevenmena29@gmail.com', 1, 'system', '2017-04-18 15:35:12', 'null', '2017-04-18 15:35:12'),
(17, 'carla.marroquin', '$2y$10$/rM4hEWozFuvxchIu.eNYuiVEWVh51H6YP.DVi/pwKrxwy08gTyL2', 2, 'carla@gmail.com', 1, NULL, '2017-04-18 15:41:32', 'null', '2017-06-11 01:49:32'),
(18, 'smena1', '$2y$10$NZoLdvyVr01tyhCmIeaPBellVAWgYX6l8UJlf7TtMrLW0bMZQ0Jf6', 1, 'n/a', 1, NULL, '2017-06-11 01:53:46', 'null', '2017-06-11 01:53:46'),
(19, 'ahenriquez', '$2y$10$3O2eCiTkRnaGvBpwMHi94O49ra/OG1c.6INS1zRVhsSbtrca7VQgq', 2, 'n/a', 1, NULL, '2017-08-04 19:41:14', 'null', '2017-08-04 19:55:34'),
(20, 'cjuarez', '$2y$10$UO2d3kSmRO8Y.nPkOqmT0ODD9cYsyNhV6YJg3wqqbzA0FebCW2XE2', 1, 'n/a', 1, NULL, '2017-08-06 03:51:24', 'null', '2017-08-06 03:51:24'),
(21, 'af', '$2y$10$Wb/xXlPHVb5POecXZyaz/.HlUtwK9LdsgbG1hZzcPdarOgAQdYTFG', 1, NULL, 1, NULL, '2017-08-06 04:13:15', 'null', '2017-08-06 04:13:15'),
(22, 'ah', '$2y$10$4h5nwPpJRrwEENX59iFzxu3XcpjVfjusTjVehi19u6bf9Qh7/Y25a', 1, 'carla.marroquin1@gmail.com', 1, NULL, '2017-08-06 04:14:34', 'null', '2017-08-06 04:33:39'),
(23, 'agaf', '$2y$10$uTWw3x0OYLX4dDGq/3m/weTPYBW22gLLHAo78CDbRBi36VvGNB5M6', 1, 'carla.marroquin@gmail.com', 1, NULL, '2017-08-06 04:16:19', 'null', '2017-08-06 04:16:19');

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
  MODIFY `idMarcacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
