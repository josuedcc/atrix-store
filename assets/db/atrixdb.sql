-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-08-2022 a las 17:06:45
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `atrixdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactados`
--

CREATE TABLE `contactados` (
  `id` int(11) NOT NULL,
  `nombre_apellido` varchar(150) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `departamento` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `distrito` varchar(45) NOT NULL,
  `comentario` text NOT NULL,
  `activo` varchar(45) NOT NULL DEFAULT '1',
  `eliminado` varchar(45) NOT NULL DEFAULT '0',
  `fecha_creacion` datetime NOT NULL,
  `cod_prd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contactados`
--

INSERT INTO `contactados` (`id`, `nombre_apellido`, `email`, `telefono`, `direccion`, `departamento`, `provincia`, `distrito`, `comentario`, `activo`, `eliminado`, `fecha_creacion`, `cod_prd`) VALUES
(1, 'Josue Daniel Contreras Cucchi', 'josuedcc@test.com', '123456789', 'Calle San Marino', 'Lima', 'Lima', 'San Miguel', 'Prueba comentario', '1', '0', '2022-08-17 05:39:32', 1),
(2, 'Josue Daniel Contreras Cucchi', 'josuedcc@test.com', '123456789', 'Calle San Marino', 'Lima', 'Lima', 'San Miguel', 'Prueba comentario', '1', '0', '2022-08-17 05:41:17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idgenero` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1',
  `eliminado` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idgenero`, `nombre`, `activo`, `eliminado`) VALUES
(1, 'Hombre', b'1', b'0'),
(2, 'Mujer', b'1', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1',
  `eliminado` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idmarca`, `nombre`, `activo`, `eliminado`) VALUES
(1, 'Nike', b'1', b'0'),
(2, 'Adidas', b'1', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idpais` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `cod_pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idpais`, `nombre`, `cod_pais`) VALUES
(1, 'China', NULL),
(2, 'Estados Unidos', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `costo` decimal(4,0) NOT NULL,
  `url_foto` varchar(45) NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1',
  `eliminado` bit(1) NOT NULL DEFAULT b'0',
  `cod_pais` int(11) NOT NULL,
  `contador_ventas` int(11) NOT NULL,
  `activa_promo` bit(1) NOT NULL DEFAULT b'0',
  `idgenero` int(11) NOT NULL,
  `idmarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre`, `costo`, `url_foto`, `activo`, `eliminado`, `cod_pais`, `contador_ventas`, `activa_promo`, `idgenero`, `idmarca`) VALUES
(1, 'Falcon shoes', '484', 'adidasFALCON.png', b'1', b'0', 1, 1, b'1', 2, 2),
(2, 'Air Max 270', '540', 'Nike-Air270-black.png', b'1', b'0', 1, 1, b'1', 1, 1),
(3, 'M2K Tekno', '484', 'Nike_M2K_Tekno.png', b'1', b'0', 2, 1, b'0', 1, 1),
(4, 'Y-3 Tekno', '492', 'adidas-y-3-2_f.png', b'1', b'0', 2, 1, b'1', 1, 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `V_PRODUCTOS_POPULARES`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `V_PRODUCTOS_POPULARES` (
`ID` int(11)
,`NOMBRE` varchar(45)
,`FOTO` varchar(45)
,`PAIS` varchar(45)
,`GENERO` varchar(45)
,`MARCA` varchar(45)
,`COSTO` decimal(4,0)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `V_PRODUCTOS_PROMO`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `V_PRODUCTOS_PROMO` (
`ID` int(11)
,`NOMBRE` varchar(45)
,`FOTO` varchar(45)
,`PAIS` varchar(45)
,`GENERO` varchar(45)
,`MARCA` varchar(45)
,`COSTO` decimal(4,0)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `V_PRODUCTOS_TODOS`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `V_PRODUCTOS_TODOS` (
`ID` int(11)
,`NOMBRE` varchar(45)
,`FOTO` varchar(45)
,`PAIS` varchar(45)
,`GENERO` varchar(45)
,`MARCA` varchar(45)
,`COSTO` decimal(4,0)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `V_PRODUCTOS_POPULARES`
--
DROP TABLE IF EXISTS `V_PRODUCTOS_POPULARES`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `V_PRODUCTOS_POPULARES`  AS SELECT `p`.`idproducto` AS `ID`, `p`.`nombre` AS `NOMBRE`, `p`.`url_foto` AS `FOTO`, `pa`.`nombre` AS `PAIS`, `g`.`nombre` AS `GENERO`, `m`.`nombre` AS `MARCA`, `p`.`costo` AS `COSTO` FROM (((`productos` `p` join `marca` `m` on(`m`.`idmarca` = `p`.`idmarca`)) join `genero` `g` on(`g`.`idgenero` = `p`.`idgenero`)) join `pais` `pa` on(`pa`.`idpais` = `p`.`cod_pais`)) ORDER BY `p`.`contador_ventas` ASC LIMIT 0, 3 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `V_PRODUCTOS_PROMO`
--
DROP TABLE IF EXISTS `V_PRODUCTOS_PROMO`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `V_PRODUCTOS_PROMO`  AS SELECT `p`.`idproducto` AS `ID`, `p`.`nombre` AS `NOMBRE`, `p`.`url_foto` AS `FOTO`, `pa`.`nombre` AS `PAIS`, `g`.`nombre` AS `GENERO`, `m`.`nombre` AS `MARCA`, `p`.`costo` AS `COSTO` FROM (((`productos` `p` join `marca` `m` on(`m`.`idmarca` = `p`.`idmarca`)) join `genero` `g` on(`g`.`idgenero` = `p`.`idgenero`)) join `pais` `pa` on(`pa`.`idpais` = `p`.`cod_pais`)) WHERE `p`.`activa_promo` = 1 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `V_PRODUCTOS_TODOS`
--
DROP TABLE IF EXISTS `V_PRODUCTOS_TODOS`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `V_PRODUCTOS_TODOS`  AS SELECT `p`.`idproducto` AS `ID`, `p`.`nombre` AS `NOMBRE`, `p`.`url_foto` AS `FOTO`, `pa`.`nombre` AS `PAIS`, `g`.`nombre` AS `GENERO`, `m`.`nombre` AS `MARCA`, `p`.`costo` AS `COSTO` FROM (((`productos` `p` join `marca` `m` on(`m`.`idmarca` = `p`.`idmarca`)) join `genero` `g` on(`g`.`idgenero` = `p`.`idgenero`)) join `pais` `pa` on(`pa`.`idpais` = `p`.`cod_pais`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactados`
--
ALTER TABLE `contactados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idgenero`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idpais`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `productogenero` (`idgenero`),
  ADD KEY `productomarca` (`idmarca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactados`
--
ALTER TABLE `contactados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idgenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idpais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productogenero` FOREIGN KEY (`idgenero`) REFERENCES `genero` (`idgenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `productomarca` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
