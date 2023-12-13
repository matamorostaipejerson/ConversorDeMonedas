-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2023 a las 03:28:36
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `conversion_monedas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_conversion`
--

CREATE TABLE `historial_conversion` (
  `id_historial` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `importe` float NOT NULL,
  `moneda_de` varchar(100) NOT NULL,
  `moneda_a` varchar(100) NOT NULL,
  `conversion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial_conversion`
--

INSERT INTO `historial_conversion` (`id_historial`, `id_usuario`, `importe`, `moneda_de`, `moneda_a`, `conversion`) VALUES
(1, 1, 78, 'soles', 'euros', 17.94),
(2, 1, 45, 'dolares', 'dolares', 45),
(3, 1, 78, 'dolares', 'bitcoin', 0.00231111),
(4, 1, 78, 'euros', 'euros', 78),
(5, 1, 74, 'soles', 'dolares', 19.98),
(6, 1, 74, 'soles', 'dolares', 19.98),
(7, 1, 74, 'soles', 'dolares', 19.98),
(8, 1, 74, 'soles', 'dolares', 19.98),
(9, 1, 24, 'USD', 'PEN', 88.1496),
(10, 1, 45, 'USD', 'EUR', 41.958),
(11, 1, 78, 'EUR', 'PEN', 308.217),
(12, 1, 78, 'EUR', 'USD', 83.655);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contrasena` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contrasena`) VALUES
(1, 'PRUEBA_1', 'eso');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial_conversion`
--
ALTER TABLE `historial_conversion`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial_conversion`
--
ALTER TABLE `historial_conversion`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_conversion`
--
ALTER TABLE `historial_conversion`
  ADD CONSTRAINT `historial_conversion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
