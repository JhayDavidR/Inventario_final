-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2022 a las 20:18:51
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario_cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategoria`
--

CREATE TABLE `tblcategoria` (
  `CatId` int(11) NOT NULL,
  `CatNombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CatDescripcion` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblcategoria`
--

INSERT INTO `tblcategoria` (`CatId`, `CatNombre`, `CatDescripcion`) VALUES
(1, 'Tecnologia', 'Relacionado con todos los articulos de tecnologia'),
(2, 'Alimentos', 'Relacionado con todos los articulos comestibles'),
(3, 'Gimnasio', 'Se caracteriza por articulos deportivos\r\n'),
(4, 'Jugueteria', 'Se caracteriza por topo tipo de jugueteria para niños'),
(5, 'Medicamentos', 'Relacionado con todos los medicamentos preinscritos en farmacias y hospitales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestado`
--

CREATE TABLE `tblestado` (
  `id_estado` int(11) NOT NULL,
  `estado_colaborador` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblestado`
--

INSERT INTO `tblestado` (`id_estado`, `estado_colaborador`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblperfil`
--

CREATE TABLE `tblperfil` (
  `PerId` int(11) NOT NULL,
  `PerNombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PerDescripcion` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblperfil`
--

INSERT INTO `tblperfil` (`PerId`, `PerNombre`, `PerDescripcion`) VALUES
(1, 'Administrador', 'Se encarga administrar el sistema en general'),
(2, 'Vendedor', 'Este perfil permite gestionar los referente a los productos (su inventario y ventas)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproducto`
--

CREATE TABLE `tblproducto` (
  `ProId` int(11) NOT NULL,
  `tblproducto_userRegistra` int(11) NOT NULL,
  `tblproducto_NombreProducto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tblproducto_referencia` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `tblproducto_precio` int(11) NOT NULL,
  `tblproducto_peso` int(11) NOT NULL,
  `tblproducto_categoria` int(50) NOT NULL,
  `tblproducto_stock` int(11) NOT NULL,
  `tblproducto_fechaRegistro` date DEFAULT NULL,
  `tblproducto_fechaModifica` date DEFAULT NULL,
  `tblproducto_userModifica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblproducto`
--

INSERT INTO `tblproducto` (`ProId`, `tblproducto_userRegistra`, `tblproducto_NombreProducto`, `tblproducto_referencia`, `tblproducto_precio`, `tblproducto_peso`, `tblproducto_categoria`, `tblproducto_stock`, `tblproducto_fechaRegistro`, `tblproducto_fechaModifica`, `tblproducto_userModifica`) VALUES
(3, 1, 'Cafe', 'Colcafe', 12000, 500, 2, 4, '2022-09-10', '2022-09-12', 1),
(4, 1, 'Chocolate', 'Corona', 10000, 1000, 2, 2, '2022-09-10', '2022-09-12', 1),
(5, 1, 'Harina', 'Promasa', 3500, 1, 2, 2, '2022-09-10', NULL, NULL),
(6, 1, 'Leche', 'Colan ta', 3500, 1000, 2, 3, '2022-09-10', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipodocumento`
--

CREATE TABLE `tbltipodocumento` (
  `TipDocId` int(11) NOT NULL,
  `TipDocNombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbltipodocumento`
--

INSERT INTO `tbltipodocumento` (`TipDocId`, `TipDocNombre`) VALUES
(1, 'Cedula'),
(2, 'Pasaporte'),
(3, 'Tarjeta de Identidad'),
(4, 'RUC'),
(5, 'Registro Civil'),
(6, 'Carnet'),
(7, 'Acta de Nacimiento'),
(8, 'Fe de Vida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE `tblusuario` (
  `TerId` int(11) NOT NULL,
  `tblusuario_nombreUsuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tbl_usuario_fechaCreacion` date NOT NULL,
  `tbl_usuario_horaCreacion` time NOT NULL,
  `Fk_tbl_usuario_userCrea` int(11) NOT NULL,
  `FK_tbl_usuario_TipDoc` int(45) NOT NULL,
  `tbl_usuario_NumDoc` bigint(20) NOT NULL,
  `tbl_usuario_Nit` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tbl_usuario_Nombres` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tbl_usuario_Apellidos` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tbl_usuario_Direccion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tbl_usuario_Telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tbl_usuario_Clave` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `FK_tbl_usuario_tblperfil` int(11) NOT NULL,
  `FK_tbl_usuario_tblestado` int(11) NOT NULL DEFAULT 1,
  `tbl_usuario_fechaModificacion` date DEFAULT NULL,
  `tbl_usuario_horaModificacion` time DEFAULT NULL,
  `Fk_tbl_usuario_userModifica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`TerId`, `tblusuario_nombreUsuario`, `tbl_usuario_fechaCreacion`, `tbl_usuario_horaCreacion`, `Fk_tbl_usuario_userCrea`, `FK_tbl_usuario_TipDoc`, `tbl_usuario_NumDoc`, `tbl_usuario_Nit`, `tbl_usuario_Nombres`, `tbl_usuario_Apellidos`, `tbl_usuario_Direccion`, `tbl_usuario_Telefono`, `tbl_usuario_Clave`, `FK_tbl_usuario_tblperfil`, `FK_tbl_usuario_tblestado`, `tbl_usuario_fechaModificacion`, `tbl_usuario_horaModificacion`, `Fk_tbl_usuario_userModifica`) VALUES
(1, 'julianrm', '2022-09-10', '15:37:06', 1, 1, 1000120395, '516513-4', 'Julian David', 'Rodriguez Medina', 'calle 2b No. 31d - 16', '3122699330', '5cedb8b35e43e9b6c5eeb9323fcba823', 1, 1, NULL, '00:00:00', 0),
(2, 'konecta', '2022-09-12', '13:15:50', 1, 1, 5151515151, '9011279893', 'Konecta', 'Prueba', 'Av. Pepe Sierra #71D - 46 · (601) 3431920', '6013431920', 'e4a345dea5239bebca4cdc3eb7e12cfb', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventa`
--

CREATE TABLE `tblventa` (
  `tblventa_id_registro` int(11) NOT NULL,
  `tblventa_userRegistra` int(11) NOT NULL,
  `tblventa_fechaVenta` date DEFAULT NULL,
  `tblventa_valorVenta` bigint(11) NOT NULL,
  `tblventa_productoVendido` int(11) NOT NULL,
  `tbl_venta_cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblventa`
--

INSERT INTO `tblventa` (`tblventa_id_registro`, `tblventa_userRegistra`, `tblventa_fechaVenta`, `tblventa_valorVenta`, `tblventa_productoVendido`, `tbl_venta_cantidad`) VALUES
(1, 1, '2022-09-12', 20000, 4, 2),
(2, 1, '2022-09-12', 50000, 4, 5),
(3, 1, '2022-09-12', 24000, 3, 2),
(4, 1, '2022-09-12', 30000, 4, 3),
(5, 1, '2022-09-12', 10500, 5, 3),
(6, 1, '2022-09-12', 10500, 6, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
  ADD PRIMARY KEY (`CatId`);

--
-- Indices de la tabla `tblestado`
--
ALTER TABLE `tblestado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `tblperfil`
--
ALTER TABLE `tblperfil`
  ADD PRIMARY KEY (`PerId`);

--
-- Indices de la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
  ADD PRIMARY KEY (`ProId`),
  ADD KEY `tblproducto_categoria` (`tblproducto_categoria`),
  ADD KEY `tblproducto_userRegistra` (`tblproducto_userRegistra`),
  ADD KEY `tblproducto_userModifica` (`tblproducto_userModifica`);

--
-- Indices de la tabla `tbltipodocumento`
--
ALTER TABLE `tbltipodocumento`
  ADD PRIMARY KEY (`TipDocId`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`TerId`),
  ADD KEY `FK_tbl_usuario_TipDoc` (`FK_tbl_usuario_TipDoc`),
  ADD KEY `FK_tbl_usuario_tblperfil` (`FK_tbl_usuario_tblperfil`),
  ADD KEY `FK_tbl_usuario_tblestado` (`FK_tbl_usuario_tblestado`),
  ADD KEY `Fk_tbl_usuario_userCrea` (`Fk_tbl_usuario_userCrea`),
  ADD KEY `Fk_tbl_usuario_userModifica` (`Fk_tbl_usuario_userModifica`);

--
-- Indices de la tabla `tblventa`
--
ALTER TABLE `tblventa`
  ADD PRIMARY KEY (`tblventa_id_registro`),
  ADD KEY `tblventa_productoVendido` (`tblventa_productoVendido`),
  ADD KEY `tblventa_userRegistra` (`tblventa_userRegistra`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
  MODIFY `CatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblestado`
--
ALTER TABLE `tblestado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tblperfil`
--
ALTER TABLE `tblperfil`
  MODIFY `PerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
  MODIFY `ProId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbltipodocumento`
--
ALTER TABLE `tbltipodocumento`
  MODIFY `TipDocId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `TerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblventa`
--
ALTER TABLE `tblventa`
  MODIFY `tblventa_id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
  ADD CONSTRAINT `FK_tblproducto_categoria` FOREIGN KEY (`tblproducto_categoria`) REFERENCES `tblcategoria` (`CatId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tblproducto_userModifica` FOREIGN KEY (`tblproducto_userModifica`) REFERENCES `tblusuario` (`TerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tblproducto_userRegistra` FOREIGN KEY (`tblproducto_userRegistra`) REFERENCES `tblusuario` (`TerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD CONSTRAINT `FK_perfil_tbl_usuario` FOREIGN KEY (`FK_tbl_usuario_tblperfil`) REFERENCES `tblperfil` (`PerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tipoDocumento_tblusuario` FOREIGN KEY (`FK_tbl_usuario_TipDoc`) REFERENCES `tblusuario` (`TerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_estado_tbl_usuario` FOREIGN KEY (`FK_tbl_usuario_tblestado`) REFERENCES `tblestado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblventa`
--
ALTER TABLE `tblventa`
  ADD CONSTRAINT `FK_tblventa_tblproducto` FOREIGN KEY (`tblventa_productoVendido`) REFERENCES `tblproducto` (`ProId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tblventa_userRegistra` FOREIGN KEY (`tblventa_userRegistra`) REFERENCES `tblusuario` (`TerId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
