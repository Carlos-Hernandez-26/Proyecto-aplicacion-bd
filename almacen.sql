-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2024 a las 02:32:57
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(30) NOT NULL,
  `nombrec` varchar(50) NOT NULL,
  `apellidoc` varchar(50) NOT NULL,
  `telefonoc` varchar(10) NOT NULL,
  `direccionc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nombrec`, `apellidoc`, `telefonoc`, `direccionc`) VALUES
(1, 'jose', 'enrique perez', '9132458679', 'calle morelos, ciudad del carmen'),
(3, 'manuela', 'rosales', '9135768970', 'calle margaritas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `idmaterial` int(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `existencia` int(20) NOT NULL,
  `stockmin` int(20) NOT NULL,
  `stockmax` int(20) NOT NULL,
  `peso` varchar(20) NOT NULL,
  `preciocom` varchar(20) NOT NULL,
  `precioven` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`idmaterial`, `nombre`, `color`, `existencia`, `stockmin`, `stockmax`, `peso`, `preciocom`, `precioven`) VALUES
(2, 'kit de herramientas', 'negro con rojo', 10, 5, 15, '2', '300', '500'),
(3, 'taladro percutor', 'amarillo-rojo', 17, 10, 25, '100 gramos', '500', '800'),
(4, 'Brida de globo', 'azul', 15, 5, 20, '100 gramos', '200', '350');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedor` int(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `nombre`, `apellido`, `telefono`, `correo`, `direccion`) VALUES
(1, 'julian', 'flores jimenez', '9132345456', 'juli@gmail.com', 'calle los pinos, ciudad del carmen'),
(3, 'jose', 'juan', '1234567898', 'jose@gmai.com', 'bogota colombia'),
(4, 'jeremy', 'hernandez', '9134578579', 'jeremy@gmail.com', 'calle hidalgo, ciudad del carmen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventa` int(30) NOT NULL,
  `idcliente` int(30) NOT NULL,
  `idmaterial` int(30) NOT NULL,
  `fechacompra` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventa`, `idcliente`, `idmaterial`, `fechacompra`) VALUES
(8, 3, 3, '2024-04-01'),
(9, 3, 3, '2024-04-09'),
(10, 3, 3, '2024-04-01'),
(11, 3, 3, '2024-04-09'),
(12, 3, 4, '2024-04-02'),
(13, 3, 4, '2024-04-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idmaterial`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idmaterial` (`idmaterial`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `idmaterial` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedor` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`idmaterial`) REFERENCES `material` (`idmaterial`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
