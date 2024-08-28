-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-08-2023 a las 12:29:43
-- Versión del servidor: 10.6.14-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u363143461_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE `tbl_empleados` (
  `id` int(11) NOT NULL,
  `primernombre` varchar(255) NOT NULL,
  `segundonombre` varchar(255) NOT NULL,
  `primerapellido` varchar(255) NOT NULL,
  `segundoapellido` varchar(255) NOT NULL,
  `identificacion` int(255) NOT NULL,
  `idtrabajo` int(11) NOT NULL,
  `grado` varchar(255) NOT NULL,
  `horas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`id`, `primernombre`, `segundonombre`, `primerapellido`, `segundoapellido`, `identificacion`, `idtrabajo`, `grado`, `horas`) VALUES
(30, 'Julian', 'Mauricio', 'Bastidas', 'Perez', 1007190294, 14, 'Once', 50),
(31, 'Claudia', 'Marcela', 'Mejia', 'Mora', 81456456, 13, 'Decimo', 50),
(32, 'Mauricio ', 'Camilo', 'Bastidas', 'Rodriguez', 87715012, 14, 'once', 45),
(33, 'Magaly', 'Cristina', 'Perez', 'Tovar', 27082206, 14, 'Decimo', 40),
(37, 'Alysson', '', 'Gutierrez', 'Castilo', 1004751717, 13, 'once', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_trabajo`
--

CREATE TABLE `tbl_trabajo` (
  `id` int(11) NOT NULL,
  `nombredeltrabajo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_trabajo`
--

INSERT INTO `tbl_trabajo` (`id`, `nombredeltrabajo`) VALUES
(13, 'Bomberos'),
(14, 'Policia'),
(17, 'Cruz Roja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `correo`) VALUES
(4, 'julian', '12345', 'juliabastidas.mp@academia.umb.edu.co'),
(6, 'admin', 'admin', 'julilito09@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtrabajo` (`idtrabajo`);

--
-- Indices de la tabla `tbl_trabajo`
--
ALTER TABLE `tbl_trabajo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tbl_trabajo`
--
ALTER TABLE `tbl_trabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD CONSTRAINT `tbl_empleados_ibfk_1` FOREIGN KEY (`idtrabajo`) REFERENCES `tbl_trabajo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
