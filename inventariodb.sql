-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-11-2017 a las 21:22:46
-- Versión del servidor: 5.6.36
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventariodb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `precio_venta` double NOT NULL,
  `disponibles` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `nombre`, `precio_venta`, `disponibles`) VALUES
(1, 'Pan', 4, 4),
(2, 'Botella de agua', 10, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id_pais` char(4) NOT NULL,
  `id_estado` char(4) NOT NULL,
  `id_ciudad` char(4) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de ciudes';

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id_pais`, `id_estado`, `id_ciudad`, `nombre`) VALUES
('1', '1', '1', 'Saltillo'),
('2', '1', '1', 'Houston'),
('1', '2', '1', 'Monterrey');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(10) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `paterno` varchar(40) NOT NULL,
  `materno` varchar(40) DEFAULT NULL,
  `genero` enum('M','F') NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `id_direccion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `paterno`, `materno`, `genero`, `telefono`, `id_direccion`) VALUES
(1, 'Juan', 'Perez', 'Rodriguez', 'M', '8442861111', 1),
(2, 'Maria', 'Lopez', 'Hernandez', 'F', '8441232134', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonias`
--

CREATE TABLE `colonias` (
  `id_pais` char(4) NOT NULL,
  `id_estado` char(4) NOT NULL,
  `id_ciudad` char(4) NOT NULL,
  `id_colonia` char(4) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de colonias';

--
-- Volcado de datos para la tabla `colonias`
--

INSERT INTO `colonias` (`id_pais`, `id_estado`, `id_ciudad`, `id_colonia`, `nombre`) VALUES
('1', '1', '1', '1', 'Zona Centro'),
('2', '1', '1', '1', 'Pasadena'),
('1', '2', '1', '1', 'Guadalupe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` double NOT NULL,
  `iva` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_proveedor`, `id_empleado`, `fecha`, `importe`, `iva`) VALUES
(1, 1, 1, '2017-10-25', 20, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprasarticulos`
--

CREATE TABLE `comprasarticulos` (
  `id_compraArticulo` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `precio_compra` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comprasarticulos`
--

INSERT INTO `comprasarticulos` (`id_compraArticulo`, `id_articulo`, `id_compra`, `precio_compra`) VALUES
(1, 2, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `id_pais` char(4) NOT NULL,
  `id_estado` char(4) NOT NULL,
  `id_ciudad` char(4) NOT NULL,
  `id_colonia` char(4) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `interior` varchar(2) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de direcciones';

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `id_pais`, `id_estado`, `id_ciudad`, `id_colonia`, `calle`, `numero`, `interior`) VALUES
(1, '1', '1', '1', '1', 'Chile', '11', NULL),
(2, '1', '1', '1', '1', 'Metropolitano', '190', NULL),
(3, '1', '2', '1', '1', 'Benito Juarez', '24', '1'),
(4, '1', '2', '1', '1', '25', '140', ''),
(5, '1', '1', '1', '1', 'Sauce', '100', ''),
(6, '1', '2', '1', '1', 'Alamo', '123', NULL),
(7, '2', '1', '1', '1', 'abc', '14', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(10) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `paterno` varchar(40) NOT NULL,
  `materno` varchar(40) DEFAULT NULL,
  `genero` enum('M','F') NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `id_direccion` int(10) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `paterno`, `materno`, `genero`, `telefono`, `id_direccion`, `usuario`, `contrasena`) VALUES
(1, 'Diego', 'Padilla', 'Bernal', 'M', '8442831681', 7, 'dbernal', '$2y$10$P1XFvSVAe/hriRqxQ5lQJe.g2flkUpuFDAMF6kXC6Psafh8hfhPAC'),
(2, 'Pedro', 'Palacios', 'Martinez', 'M', '844123123', 1, '', ''),
(3, 'Alicia', 'Salas', 'Bustos', 'F', '8441234567', 1, 'usuario', '$2y$10$1wCWtKc0q9aUd/gDidDhI.41CEAM/WQZKxQOgK3YdJ/xTaKl3peHK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_pais` char(4) NOT NULL,
  `id_estado` char(4) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de estados';

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_pais`, `id_estado`, `nombre`) VALUES
('1', '1', 'Coahuila'),
('2', '1', 'Texas'),
('1', '2', 'Nuevo León');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pais` char(4) NOT NULL,
  `codigo` varchar(2) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de paises';

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `codigo`, `nombre`) VALUES
('1', '', 'México'),
('2', '', 'Estados Unidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `id_direccion`, `nombre`, `telefono`) VALUES
(1, 1, 'Magna', '123123213'),
(2, 5, 'Gamesa', '12312344'),
(3, 6, 'Sabritas', '4441231');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` double DEFAULT NULL,
  `iva` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_empleado`, `id_cliente`, `fecha`, `importe`, `iva`) VALUES
(1, 1, 1, '2017-10-11', 100, 20.5),
(2, 1, 1, '2017-10-18', 12, 1.44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasarticulos`
--

CREATE TABLE `ventasarticulos` (
  `id_ventaArticulo` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de articulos comprados a proveedores';

--
-- Volcado de datos para la tabla `ventasarticulos`
--

INSERT INTO `ventasarticulos` (`id_ventaArticulo`, `id_articulo`, `id_venta`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 2),
(4, 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id_ciudad`,`id_estado`,`id_pais`) USING BTREE,
  ADD KEY `ciudadesEstadosFK` (`id_pais`,`id_estado`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `clientesDireccionesFK` (`id_direccion`);

--
-- Indices de la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD PRIMARY KEY (`id_colonia`,`id_ciudad`,`id_estado`,`id_pais`) USING BTREE,
  ADD KEY `coloniasCiudadesFK` (`id_pais`,`id_estado`,`id_ciudad`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `comprasEmpleadosFK` (`id_empleado`),
  ADD KEY `comprasProveedoresFK` (`id_proveedor`);

--
-- Indices de la tabla `comprasarticulos`
--
ALTER TABLE `comprasarticulos`
  ADD PRIMARY KEY (`id_compraArticulo`),
  ADD KEY `comprasArticulosArticulosFK` (`id_articulo`),
  ADD KEY `comprasarticulosCompra` (`id_compra`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `direccionColoniasFK` (`id_pais`,`id_estado`,`id_ciudad`,`id_colonia`) USING BTREE;

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `empleadosDireccionesFK` (`id_direccion`) USING BTREE;

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`,`id_pais`) USING BTREE,
  ADD KEY `id_pais` (`id_pais`) USING BTREE;

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `proveedoresDireccionesFK` (`id_direccion`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `ventasClientesFK` (`id_cliente`),
  ADD KEY `ventasEmpleadosFK` (`id_empleado`) USING BTREE;

--
-- Indices de la tabla `ventasarticulos`
--
ALTER TABLE `ventasarticulos`
  ADD PRIMARY KEY (`id_ventaArticulo`),
  ADD KEY `ventasarticulosArticuloFK` (`id_articulo`),
  ADD KEY `ventasarticulosVenta` (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `comprasarticulos`
--
ALTER TABLE `comprasarticulos`
  MODIFY `id_compraArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ventasarticulos`
--
ALTER TABLE `ventasarticulos`
  MODIFY `id_ventaArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudadesEstadosFK` FOREIGN KEY (`id_pais`,`id_estado`) REFERENCES `estados` (`id_pais`, `id_estado`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientesDireccionesFK` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`);

--
-- Filtros para la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD CONSTRAINT `coloniasCiudadesFK` FOREIGN KEY (`id_pais`,`id_estado`,`id_ciudad`) REFERENCES `ciudades` (`id_pais`, `id_estado`, `id_ciudad`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `comprasEmpleadosFK` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`),
  ADD CONSTRAINT `comprasProveedoresFK` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `comprasarticulos`
--
ALTER TABLE `comprasarticulos`
  ADD CONSTRAINT `comprasArticulosArticulosFK` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`),
  ADD CONSTRAINT `comprasarticulosCompra` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`);

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direccionColoniasFK` FOREIGN KEY (`id_pais`,`id_estado`,`id_ciudad`,`id_colonia`) REFERENCES `colonias` (`id_pais`, `id_estado`, `id_ciudad`, `id_colonia`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleadosDireccionesFK` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`);

--
-- Filtros para la tabla `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `estadosPaisesFK` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedoresDireccionesFK` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventasClientesFK` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `ventasEmpleadosFK` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`);

--
-- Filtros para la tabla `ventasarticulos`
--
ALTER TABLE `ventasarticulos`
  ADD CONSTRAINT `ventasarticulosArticuloFK` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`),
  ADD CONSTRAINT `ventasarticulosVenta` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
