-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2021 a las 16:42:25
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCat` int(11) NOT NULL,
  `NomCat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCat`, `NomCat`) VALUES
(1, 'Pizzas'),
(2, 'Camperos'),
(3, 'Hamburguesas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `IdPla` int(11) NOT NULL,
  `NomPla` varchar(255) NOT NULL,
  `DesPla` varchar(255) NOT NULL,
  `PrecPla` double NOT NULL,
  `IdCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`IdPla`, `NomPla`, `DesPla`, `PrecPla`, `IdCat`) VALUES
(1, 'Pizza Margarita', 'salsa de tomate, mozzarella, albahaca, orégano y aceite de oliva.', 6, 1),
(3, 'Campero de pollo', 'pan, mayonesa, lechuga, tomate, carne de pollo, jamón york y queso.', 3.5, 2),
(4, 'Campero serrano', 'pan, mayonesa, filete de cerdo, jamón serrano y pimientos.', 3.5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puede_ver`
--

CREATE TABLE `puede_ver` (
  `IdPla` int(11) NOT NULL,
  `IdUsu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsu` int(11) NOT NULL,
  `NomUsu` varchar(255) NOT NULL,
  `ApeUsu` varchar(255) NOT NULL,
  `FechNac` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `ContrUsu` varchar(255) NOT NULL,
  `Direc` varchar(255) DEFAULT NULL,
  `UsuAdmin` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsu`, `NomUsu`, `ApeUsu`, `FechNac`, `email`, `ContrUsu`, `Direc`, `UsuAdmin`) VALUES
(1, 'César Julio', 'Martín González', '1999-08-18', 'cesar.loky19@gmail.com', '286f6ff9be8cca78598a17b402839909', NULL, '1'),
(58, 'cesar', 'martin', '2021-12-16', 'cesarjulio.martin@iescampanillas.com', 'b28cbdb51d552dc1eda79833b98c8f80', 'c/xxx nº11', '0'),
(60, 'manolo', 'martin', '2021-12-12', 'manolo@gmail.com', '2a589dc0e2e7f17dfbd7723600edb394', '', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCat`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`IdPla`),
  ADD KEY `IdCat` (`IdCat`);

--
-- Indices de la tabla `puede_ver`
--
ALTER TABLE `puede_ver`
  ADD KEY `IdPla` (`IdPla`),
  ADD KEY `IdUsu` (`IdUsu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `IdPla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `platos_ibfk_1` FOREIGN KEY (`IdCat`) REFERENCES `categoria` (`IdCat`);

--
-- Filtros para la tabla `puede_ver`
--
ALTER TABLE `puede_ver`
  ADD CONSTRAINT `puede_ver_ibfk_1` FOREIGN KEY (`IdPla`) REFERENCES `platos` (`IdPla`),
  ADD CONSTRAINT `puede_ver_ibfk_2` FOREIGN KEY (`IdUsu`) REFERENCES `usuario` (`IdUsu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
