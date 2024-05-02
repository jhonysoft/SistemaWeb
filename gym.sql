-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2022 a las 02:08:32
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellido_paterno` varchar(50) DEFAULT NULL,
  `apellido_materno` varchar(50) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `contacto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nombres`, `apellido_paterno`, `apellido_materno`, `dni`, `fecha_nacimiento`, `direccion`, `celular`, `email`, `sexo`, `facebook`, `contacto`) VALUES
(20, 'Edwin', 'Flores', '', 0, '0000-00-00', '', 0, '', 'Seleccione tipo de sexo', '', 'Seleccione como nos contacto'),
(21, 'Cristian', 'Fernandez', '', 0, '0000-00-00', '', 0, '', 'Seleccione tipo de sexo', '', 'Seleccione como nos contacto'),
(22, 'Lilian', 'Rodriguez', '', 0, '0000-00-00', '', 0, '', 'Seleccione tipo de sexo', '', 'Seleccione como nos contacto'),
(23, 'Ronald', 'Florez', '', 0, '0000-00-00', '', 0, '', 'Seleccione tipo de sexo', '', 'Seleccione como nos contacto'),
(24, 'Adriana', 'Espinoza', '', 0, '0000-00-00', '', 0, '', 'Seleccione tipo de sexo', '', 'Seleccione como nos contacto'),
(25, 'Eduardo', 'Rios', '', 0, '0000-00-00', '', 0, '', 'Seleccione tipo de sexo', '', 'Seleccione como nos contacto'),
(26, 'Lia', 'Unoc', '', 0, '0000-00-00', '', 0, '', 'Seleccione tipo de sexo', '', 'Seleccione como nos contacto'),
(27, 'Joseph', 'Mozombite', '', 0, '0000-00-00', '', 0, '', 'Seleccione tipo de sexo', '', 'Seleccione como nos contacto'),
(28, 'Alfredo', 'Cordova', '', 0, '0000-00-00', '', 0, '', 'Seleccione tipo de sexo', '', 'Seleccione como nos contacto'),
(29, 'Hilda', 'Ramirez', '', 0, '0000-00-00', '', 0, '', 'Seleccione tipo de sexo', '', 'Seleccione como nos contacto'),
(30, 'Juan', 'Lukas', '', 0, '0000-00-00', '', 0, '', 'Seleccione tipo de sexo', '', 'Seleccione como nos contacto'),
(31, '', 'Rojas', '', 0, '0000-00-00', '', 0, '', '', '', ''),
(32, '', 'Paucar', '', 0, '0000-00-00', '', 0, '', '', '', ''),
(33, '', 'lo', '', 0, '0000-00-00', '', 0, '', '', '', ''),
(34, '', 'as', '', 0, '0000-00-00', '', 0, '', '', '', ''),
(35, '', 'meza', '', 0, '0000-00-00', '', 0, '', '', '', ''),
(36, '', 'luna', '', 0, '0000-00-00', '', 0, '', '', '', ''),
(37, 'alberto', 'del rio', '', 0, '0000-00-00', '', 0, '', '', '', ''),
(38, 'pepe', 'lucho', '', 0, '0000-00-00', '', 0, '', '', '', ''),
(39, 'as', 'sasa', '', 0, '0000-00-00', '', 0, '', '', '', ''),
(40, '', '', '', 0, '0000-00-00', '', 0, '', '', '', ''),
(41, '', '', '', 0, '0000-00-00', '', 0, '', '', '', ''),
(42, 'pepe', 'diaz', '', 0, '0000-00-00', '', 0, '', '', '', ''),
(43, 'aasasa', 'sasa', 'sasasa', 0, '0000-00-00', '', 0, '', '', '', ''),
(44, 'nami', 'one piece', 'luffy', 0, '0000-00-00', '', 0, '', '', '', ''),
(45, 'sas', 'assa', 'sa', 0, '0000-00-00', '', 0, '', '', '', ''),
(46, '', '', '', 0, '0000-00-00', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_asistencias`
--

CREATE TABLE `control_asistencias` (
  `id_control_asistencias` int(11) NOT NULL,
  `id_matricula` int(11) DEFAULT NULL,
  `id_clientes` int(11) DEFAULT NULL,
  `id_plan` int(11) DEFAULT NULL,
  `id_pago` int(11) DEFAULT NULL,
  `fecha_asistencia` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_asistencias`
--

INSERT INTO `control_asistencias` (`id_control_asistencias`, `id_matricula`, `id_clientes`, `id_plan`, `id_pago`, `fecha_asistencia`, `estado`) VALUES
(112, NULL, 20, NULL, NULL, '2021-09-20 12:38:02', 'ASISTIO'),
(113, NULL, 21, NULL, NULL, '2021-09-20 12:38:07', 'ASISTIO'),
(114, NULL, 22, NULL, NULL, '2021-09-20 12:38:13', 'ASISTIO'),
(115, NULL, 23, NULL, NULL, '2021-09-20 12:38:21', 'ASISTIO'),
(116, NULL, 24, NULL, NULL, '2021-09-20 12:38:29', 'ASISTIO'),
(117, NULL, 25, NULL, NULL, '2021-09-20 12:38:36', 'ASISTIO'),
(118, NULL, 26, NULL, NULL, '2021-09-20 12:38:47', 'ASISTIO'),
(119, NULL, 27, NULL, NULL, '2021-09-20 12:38:53', 'ASISTIO'),
(120, NULL, 28, NULL, NULL, '2021-09-20 12:38:59', 'ASISTIO'),
(121, NULL, 29, NULL, NULL, '2021-09-20 12:39:03', 'ASISTIO'),
(122, NULL, 20, NULL, NULL, '2021-09-21 09:00:06', 'ASISTIO'),
(123, NULL, 21, NULL, NULL, '2021-09-21 09:01:44', 'ASISTIO'),
(124, NULL, 22, NULL, NULL, '2021-09-21 09:01:50', 'ASISTIO'),
(125, NULL, 23, NULL, NULL, '2021-09-21 09:06:00', 'ASISTIO'),
(126, NULL, 24, NULL, NULL, '2021-09-21 09:06:09', 'ASISTIO'),
(127, NULL, 25, NULL, NULL, '2021-09-21 09:06:35', 'ASISTIO'),
(128, NULL, 26, NULL, NULL, '2021-09-21 09:06:43', 'ASISTIO'),
(129, NULL, 27, NULL, NULL, '2021-09-21 09:06:50', 'ASISTIO'),
(130, NULL, 28, NULL, NULL, '2021-09-21 09:06:58', 'ASISTIO'),
(131, NULL, 29, NULL, NULL, '2021-09-21 09:07:05', 'ASISTIO'),
(132, NULL, 20, NULL, NULL, '2021-09-22 18:27:04', 'ASISTIO'),
(133, NULL, 21, NULL, NULL, '2021-09-22 18:27:06', 'ASISTIO'),
(134, NULL, 22, NULL, NULL, '2021-09-22 18:27:09', 'ASISTIO'),
(135, NULL, 23, NULL, NULL, '2021-09-22 18:27:13', 'ASISTIO'),
(136, NULL, 24, NULL, NULL, '2021-09-22 18:27:16', 'ASISTIO'),
(137, NULL, 25, NULL, NULL, '2021-09-22 18:27:22', 'ASISTIO'),
(138, NULL, 26, NULL, NULL, '2021-09-22 18:27:26', 'ASISTIO'),
(139, NULL, 27, NULL, NULL, '2021-09-22 18:27:32', 'ASISTIO'),
(140, NULL, 28, NULL, NULL, '2021-09-22 18:27:36', 'ASISTIO'),
(141, NULL, 29, NULL, NULL, '2021-09-22 18:27:41', 'ASISTIO'),
(142, NULL, 20, NULL, NULL, '2021-09-23 10:12:58', 'ASISTIO'),
(143, NULL, 21, NULL, NULL, '2021-09-23 10:13:00', 'ASISTIO'),
(144, NULL, 22, NULL, NULL, '2021-09-23 10:13:02', 'ASISTIO'),
(145, NULL, 23, NULL, NULL, '2021-09-23 10:13:07', 'ASISTIO'),
(146, NULL, 25, NULL, NULL, '2021-09-23 10:13:11', 'ASISTIO'),
(147, NULL, 27, NULL, NULL, '2021-09-23 10:13:15', 'ASISTIO'),
(148, NULL, 28, NULL, NULL, '2021-09-23 10:13:19', 'ASISTIO'),
(149, NULL, 29, NULL, NULL, '2021-09-23 10:13:29', 'ASISTIO'),
(150, NULL, 26, NULL, NULL, '2021-09-23 10:13:41', 'ASISTIO'),
(151, NULL, 24, NULL, NULL, '2021-09-23 10:14:08', 'ASISTIO'),
(152, NULL, 29, NULL, NULL, '2021-09-23 19:32:40', 'ASISTIO'),
(153, NULL, 20, NULL, NULL, '2021-09-24 19:58:20', 'ASISTIO'),
(154, NULL, 26, NULL, NULL, '2021-09-25 21:03:57', 'ASISTIO'),
(155, NULL, 26, NULL, NULL, '2021-09-25 21:04:07', 'ASISTIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libre`
--

CREATE TABLE `libre` (
  `id_libre` int(11) NOT NULL,
  `fecha_pago` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombres` varchar(50) NOT NULL,
  `abono` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libre`
--

INSERT INTO `libre` (`id_libre`, `fecha_pago`, `nombres`, `abono`) VALUES
(37, '2021-09-20 18:06:25', 'Jhony', '7.00'),
(38, '2021-09-20 18:06:32', 'Juan', '5.00'),
(39, '2021-09-20 18:06:41', 'Pedro', '0.00'),
(40, '2021-09-20 18:06:50', 'Pedro', '3.00'),
(41, '2021-09-21 16:47:25', 'Manuel', '3.00'),
(42, '2021-09-21 16:48:57', 'Franco', '7.00'),
(43, '2021-09-23 15:14:28', 'Mateo', '3.00'),
(44, '2021-09-23 15:14:36', 'Lucas', '5.00'),
(45, '2021-09-23 15:14:45', 'Fernando', '7.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL,
  `id_clientes` int(11) DEFAULT NULL,
  `id_plan` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado_matricula` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id_matricula`, `id_clientes`, `id_plan`, `fecha_inicio`, `fecha_fin`, `estado_matricula`) VALUES
(19, 20, 3, '2021-08-10', '2021-09-10', 'activo'),
(20, 21, 2, '2021-08-10', '2021-09-10', 'activo'),
(21, 22, 2, '2021-08-10', '2021-09-10', 'activo'),
(22, 23, 2, '2021-08-10', '2021-09-10', 'activo'),
(23, 24, 3, '2021-08-11', '2021-09-11', 'activo'),
(24, 25, 3, '2021-08-11', '2021-09-11', 'activo'),
(25, 26, 2, '2021-08-11', '2021-09-11', 'inactivo'),
(26, 27, 2, '2021-08-11', '2021-09-11', 'activo'),
(27, 28, 4, '2021-08-13', '2021-09-13', 'activo'),
(28, 29, 3, '2021-08-12', '2021-09-12', 'activo'),
(29, 26, 4, '2021-09-25', '2021-11-25', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `id_clientes` int(11) DEFAULT NULL,
  `abono` decimal(18,2) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `fecha_pago` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `n_boleta` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `id_clientes`, `abono`, `observacion`, `fecha_pago`, `n_boleta`) VALUES
(16, 29, '100.00', 'Cancelo todo. ', '2021-09-20 17:49:33', '1591256321'),
(17, 28, '20.00', 'Resta 30 soles cancela la otra semana', '2021-09-20 17:50:10', '1478523691'),
(18, 27, '70.00', 'Cancelo todo.', '2021-09-20 17:50:45', '3692581471'),
(19, 26, '70.00', 'Cancelo todo. ', '2021-09-20 17:51:09', '2587419874'),
(20, 25, '110.00', 'Cancelo todo. Ahí diferencia de 10 soles a la', '2021-09-20 17:52:17', '1596324875'),
(21, 24, '100.00', 'Cancelo todo. Pago por Yape.', '2021-09-20 17:52:51', '1452639852'),
(22, 23, '70.00', 'Cancelo todo. ', '2021-09-20 17:54:53', '7894561231'),
(23, 22, '30.00', 'Resta 40 paga la otra semana. ', '2021-09-20 17:55:39', '4561234561'),
(24, 21, '70.00', 'Cancelo todo. ', '2021-09-20 17:56:07', '3216549877'),
(25, 20, '100.00', 'Cancelo todo. ', '2021-09-20 17:56:22', '5462135896'),
(26, 28, '30.00', 'Debía 30. Cancelo todo. ', '2021-09-21 14:26:29', '1478523691'),
(27, 22, '40.00', 'Cancelo todo. ', '2021-09-23 15:19:28', '1542632592');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nombre`, `descripcion`) VALUES
(1, 'Administador', NULL),
(2, 'Recepcionista', NULL),
(7, 'secretaria', 'Encargada de oficina'),
(8, 'secretaria', 'sasa'),
(9, 'secretaria', 'assas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `id_plan` int(11) NOT NULL,
  `nombre_plan` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `precio` decimal(18,2) DEFAULT NULL,
  `secuencia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`id_plan`, `nombre_plan`, `descripcion`, `precio`, `secuencia`) VALUES
(2, 'plan 1 mes interdiario', 'plan 1 mes x 70 soles', '70.00', 'interdiario'),
(3, 'plan 1 mes diario', 'plan 1 mes x 100 soles', '100.00', 'diario'),
(4, 'plan 1 mes interdiario', 'plan 1 mes x 50 soles', '50.00', 'interdiario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `clave`, `id_perfil`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 1),
(2, 'oscar', 'oscar@gmail.com', 'oscar', 2),
(3, 'juan', 'juan@gmail.com', 'juan', 2),
(4, 'jessica', 'jessica@gmail.com', 'jessica', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`);

--
-- Indices de la tabla `control_asistencias`
--
ALTER TABLE `control_asistencias`
  ADD PRIMARY KEY (`id_control_asistencias`);

--
-- Indices de la tabla `libre`
--
ALTER TABLE `libre`
  ADD PRIMARY KEY (`id_libre`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `control_asistencias`
--
ALTER TABLE `control_asistencias`
  MODIFY `id_control_asistencias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `libre`
--
ALTER TABLE `libre`
  MODIFY `id_libre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
