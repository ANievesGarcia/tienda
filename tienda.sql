-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2014 a las 00:57:59
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_entidad`
--

CREATE TABLE IF NOT EXISTS `cat_entidad` (
  `cv_entidad` smallint(5) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_entidad`
--

INSERT INTO `cat_entidad` (`cv_entidad`, `nombre`) VALUES
(9, 'DISTRITO FEDERAL'),
(15, 'MEXICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_municipio`
--

CREATE TABLE IF NOT EXISTS `cat_municipio` (
  `cv_municipio` smallint(5) DEFAULT NULL,
  `cv_entidad` smallint(5) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_municipio`
--

INSERT INTO `cat_municipio` (`cv_municipio`, `cv_entidad`, `nombre`) VALUES
(256, 9, 'Alvaro Obregon'),
(257, 9, 'Azcapotzalco'),
(258, 9, 'Benito Juarez'),
(259, 9, 'Coyoacan'),
(260, 9, 'Cuajimalpa De Morelos'),
(261, 9, 'Cuauhtemoc'),
(262, 9, 'Gustavo A Madero'),
(263, 9, 'Iztacalco'),
(264, 9, 'Iztapalapa'),
(265, 9, 'La Magdalena Contreras'),
(266, 9, 'Miguel Hidalgo'),
(267, 9, 'Milpa Alta'),
(268, 9, 'Tlahuac'),
(269, 9, 'Tlalpan'),
(270, 9, 'Venustiano Carranza'),
(271, 9, 'Xochimilco'),
(640, 15, 'Acambay'),
(641, 15, 'Acolman'),
(642, 15, 'Aculco'),
(643, 15, 'Almoloya De Alquisiras'),
(644, 15, 'Almoloya De Juarez'),
(645, 15, 'Almoloya Del Rio'),
(646, 15, 'Amanalco'),
(647, 15, 'Amatepec'),
(648, 15, 'Amecameca'),
(649, 15, 'Apaxco'),
(650, 15, 'Atenco'),
(651, 15, 'Atizapan'),
(652, 15, 'Atizapan De Zaragoza'),
(653, 15, 'Atlacomulco'),
(654, 15, 'Atlautla'),
(655, 15, 'Axapusco'),
(656, 15, 'Ayapango'),
(657, 15, 'Calimaya'),
(658, 15, 'Capulhuac'),
(659, 15, 'Chalco'),
(660, 15, 'Chapa De Mota'),
(661, 15, 'Chapultepec'),
(662, 15, 'Chiautla'),
(663, 15, 'Chicoloapan De Juarez'),
(664, 15, 'Chiconcuac'),
(665, 15, 'Chimalhuacan'),
(666, 15, 'Coacalco'),
(667, 15, 'Coatepec Harinas'),
(668, 15, 'Cocotitlan'),
(669, 15, 'Coyotepec'),
(670, 15, 'Cuautitlan'),
(671, 15, 'Cuautitlan Izcalli'),
(672, 15, 'Donato Guerra'),
(673, 15, 'Ecatepec'),
(674, 15, 'Ecatzingo'),
(675, 15, 'El Oro'),
(676, 15, 'Huehuetoca'),
(677, 15, 'Hueypoxtla'),
(678, 15, 'Huixquilucan'),
(679, 15, 'Isidro Fabela'),
(680, 15, 'Ixtapaluca'),
(681, 15, 'Ixtapan De La Sal'),
(682, 15, 'Ixtapan Del Oro'),
(683, 15, 'Ixtlahuaca'),
(684, 15, 'Jalatlaco'),
(685, 15, 'Jaltenco'),
(686, 15, 'Jilotepec'),
(687, 15, 'Jilotzingo'),
(688, 15, 'Jiquipilco'),
(689, 15, 'Jocotitlan'),
(690, 15, 'Joquicingo'),
(691, 15, 'Juchitepec'),
(692, 15, 'La Paz'),
(693, 15, 'Lerma'),
(694, 15, 'Malinalco'),
(695, 15, 'Melchor Ocampo'),
(696, 15, 'Metepec'),
(697, 15, 'Mexicaltzingo'),
(698, 15, 'Morelos'),
(699, 15, 'Naucalpan'),
(700, 15, 'Nextlalpan'),
(701, 15, 'Nezahualcoyotl'),
(702, 15, 'Nicolas Romero'),
(703, 15, 'Nopaltepec'),
(704, 15, 'Ocoyoacac'),
(705, 15, 'Ocuilan'),
(706, 15, 'Otumba'),
(707, 15, 'Otzoloapan'),
(708, 15, 'Otzolotepec'),
(709, 15, 'Ozumba'),
(710, 15, 'Papalotla'),
(711, 15, 'Polotitlan'),
(712, 15, 'Rayon'),
(713, 15, 'San Antonio La Isla'),
(714, 15, 'San Felipe Del Progreso'),
(715, 15, 'San Martin De Las Piramides'),
(716, 15, 'San Mateo Atenco'),
(717, 15, 'San Simon De Guerrero'),
(718, 15, 'Santo Tomas'),
(719, 15, 'Soyaniquilpan De Juarez'),
(720, 15, 'Sultepec'),
(721, 15, 'Tecamac'),
(722, 15, 'Tejupilco'),
(723, 15, 'Temamatla'),
(724, 15, 'Temascalapa'),
(725, 15, 'Temascalcingo'),
(726, 15, 'Temascaltepec'),
(727, 15, 'Temoaya'),
(728, 15, 'Tenancingo'),
(729, 15, 'Tenango Del Aire'),
(730, 15, 'Tenango Del Valle'),
(731, 15, 'Teoloyucan'),
(732, 15, 'Teotihuacan'),
(733, 15, 'Tepetlaoxtoc'),
(734, 15, 'Tepetlixpa'),
(735, 15, 'Tepotzotlan'),
(736, 15, 'Tequixquiac'),
(737, 15, 'Texcaltitlan'),
(738, 15, 'Texcalyacac'),
(739, 15, 'Texcoco'),
(740, 15, 'Tezoyuca'),
(741, 15, 'Tianguistenco'),
(742, 15, 'Timilpan'),
(743, 15, 'Tlalmanalco'),
(744, 15, 'Tlalnepantla'),
(745, 15, 'Tlatlaya'),
(746, 15, 'Toluca'),
(747, 15, 'Tonatico'),
(748, 15, 'Tultepec'),
(749, 15, 'Tultitlan'),
(750, 15, 'Valle De Bravo'),
(751, 15, 'Valle De Chalco Solidaridad'),
(752, 15, 'Villa De Allende'),
(753, 15, 'Villa Del Carbon'),
(754, 15, 'Villa Guerrero'),
(755, 15, 'Villa Victoria'),
(756, 15, 'Xonacatlan'),
(757, 15, 'Zacazonapan'),
(758, 15, 'Zacualpan'),
(759, 15, 'Zinacantepec'),
(760, 15, 'Zumpahuacan'),
(761, 15, 'Zumpango'),
(999, 10, 'fortin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` tinyint(1) DEFAULT '1',
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `reset_pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `estatus` tinyint(1) NOT NULL DEFAULT '0',
  `activate_pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `estado` smallint(5) DEFAULT '9',
  `municipio` smallint(5) DEFAULT '271',
  PRIMARY KEY (`email`),
  KEY `cliente_estado_idx` (`estado`),
  KEY `cliente_municipio_idx` (`municipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`email`, `tipo_usuario`, `nombre`, `apellidos`, `direccion`, `password`, `reset_pass`, `estatus`, `activate_pass`, `estado`, `municipio`) VALUES
('alfonso-king@hotmail.com', 1, 'Alfonso', 'Nieves Garcia', 'Miguel Aleman 25', '81dc9bdb52d04dc20036dbd8313ed055', 'a6b819ac267f68fe17191d4ab30e015e', 1, '0', 9, 271),
('alfonsonieves2009@hotmail.com', 0, 'Alfonso', 'Nieves', 'asdd', 'c62d929e7b7e7b6165923a5dfc60cb56', '0', 1, '16975f2dbbb5193e866f9ad5a76d654b', 9, 256);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_producto`
--

CREATE TABLE IF NOT EXISTS `compra_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` smallint(6) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compra_producto_pedido` (`pedido_id`),
  KEY `fk_compra_producto_producto` (`producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`, `descripcion`) VALUES
(1, 'hombres', 'Departamento dedicado a las playeras de hombre'),
(2, 'Mujeres', 'Departamento de Mujeres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE IF NOT EXISTS `detalle_pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` smallint(6) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `Pedidos_id` int(11) NOT NULL,
  `Productos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalle_pedidos_Pedidos1` (`Pedidos_id`),
  KEY `fk_detalle_pedidos_Productos1` (`Productos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id`, `cantidad`, `precio`, `Pedidos_id`, `Productos_id`) VALUES
(46, 1, 130, 11, 11),
(47, 1, 150, 11, 4),
(48, 1, 150, 12, 2),
(49, 1, 140.5, 12, 3),
(50, 1, 140.5, 13, 3),
(51, 1, 140.5, 14, 3),
(52, 1, 140.5, 15, 3),
(53, 1, 130, 16, 11),
(54, 1, 130, 17, 11),
(55, 5, 130, 18, 11),
(56, 1, 150, 18, 2),
(57, 1, 150, 18, 7),
(58, 3, 130, 19, 10),
(59, 4, 130, 19, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titular` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `no_tarjeta` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_vencimiento` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ano_vencimiento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `card_cvv` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cliente` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente-pedido_idx` (`cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `titular`, `fecha`, `total`, `no_tarjeta`, `fecha_vencimiento`, `ano_vencimiento`, `card_cvv`, `cliente`) VALUES
(11, 'Alfonso Nieves', '2013-12-05', 280, '1221212121211212', 'Enero', '2013', '121', 'alfonso-king@hotmail.com'),
(12, 'Alfonso Nieves', '2013-12-05', 290.5, '1212121221211212', 'Enero', '2013', '121', 'alfonso-king@hotmail.com'),
(13, 'Alfonso Nieves', '2013-12-05', 140.5, '1211212112121121', 'Enero', '2013', '121', 'alfonso-king@hotmail.com'),
(14, 'Alfonso Nieves', '2013-12-05', 140.5, '1212212112122121', 'Enero', '2013', '121', 'alfonso-king@hotmail.com'),
(15, 'Alfonso Nieves', '2013-12-05', 140.5, '1212212112122121', 'Enero', '2013', '121', 'alfonso-king@hotmail.com'),
(16, 'asdasd asd', '2013-12-05', 130, '1212212121212121', 'Enero', '2013', '212', 'alfonso-king@hotmail.com'),
(17, 'Alfonso Nieves', '2013-12-05', 130, '1212212121211212', 'Enero', '2013', '121', 'alfonso-king@hotmail.com'),
(18, 'Alfonso Nieves', '2013-12-05', 950, '1212121212122121', 'Enero', '2013', '121', 'alfonso-king@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `precio` double DEFAULT NULL,
  `imagen` varchar(45) COLLATE utf8_spanish_ci DEFAULT 'desconocido.jpg',
  `Categorias_id` int(11) NOT NULL,
  `costoEnvio` double NOT NULL DEFAULT '0',
  `FechaRegistro` date NOT NULL DEFAULT '2014-11-03',
  PRIMARY KEY (`id`),
  KEY `fk_Productos_Categorias` (`Categorias_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `cantidad`, `nombre`, `descripcion`, `precio`, `imagen`, `Categorias_id`, `costoEnvio`, `FechaRegistro`) VALUES
(33, 400, 'American Jump', 'Varias Tallas CH, M, L, XL', 200, 'h2.jpg', 1, 23, '2014-11-04'),
(35, 400, 'Asian Lamp', 'Varias Tallas CH, M, L, XL', 350, 'h4.jpg', 1, 34, '2014-11-04'),
(36, 300, 'American pierre', 'Varias Tallas CH, M, L, XL', 250, 'h5.jpg', 1, 30, '2014-11-04'),
(37, 250, 'American pierre 2', 'Varias Tallas CH, M, L, XL', 250, 'h6.jpg', 1, 30, '2014-11-04'),
(38, 400, 'American Eagle Original', 'Varias Tallas CH, M, L, XL', 250, 'h7.jpg', 1, 30, '2014-11-04'),
(39, 500, 'American Eagle 2', 'Varias Tallas CH, M, L, XL', 250, 'h8.jpg', 1, 30, '2014-11-04'),
(40, 500, 'American Eagle 3', 'Varias Tallas CH, M, L, XL', 300, 'h9.jpg', 1, 0, '2014-11-04'),
(41, 300, 'American Original', 'Varias Tallas CH, M, L, XL', 250, 'h10.jpg', 1, 30, '2014-11-04'),
(42, 300, 'American tie', 'Varias Tallas CH, M, L, XL', 200, 'h12.jpg', 1, 0, '2014-11-04'),
(43, 300, 'Aero 1', 'Varias Tallas CH, M, L, XL', 300, 'm1.jpg', 2, 250, '2014-11-04'),
(44, 300, 'Aero 2', 'Varias Tallas CH, M, L, XL', 200, 'm2.jpg', 2, 0, '2014-11-04'),
(45, 300, 'Aero jump', 'Varias Tallas CH, M, L, XL', 200, 'm3.jpg', 2, 0, '2014-11-04'),
(46, 300, 'Aero lady', 'Varias Tallas CH, M, L, XL', 240, 'm5.jpg', 2, 30, '2014-11-04'),
(47, 300, 'Aero tumb', 'Varias Tallas CH, M, L, XL', 250, 'm4.jpg', 2, 20, '2014-11-04'),
(48, 300, 'Aero Pink', 'Varias Tallas CH, M, L', 200, 'm6.jpg', 2, 30, '2014-11-04'),
(49, 300, 'Aero black', 'Varias Tallas CH, M, L', 200, 'm5.jpg', 2, 0, '2014-11-04'),
(50, 30, 'Aero sweaters', 'Varias Tallas CH, M', 200, 'm8.jpg', 2, 30, '2014-11-04'),
(51, 200, 'Aero red', 'Talllas M y CH', 250, 'm9.jpg', 2, 30, '2014-11-04'),
(54, 200, 'Aero Wthite', 'Talllas M y CH', 150, 'm12.jpg', 2, 30, '2014-11-04'),
(56, 200, 'Aero Blusa', 'Talllas M y CH', 150, 'm9.jpg', 2, 20, '2014-11-04');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra_producto`
--
ALTER TABLE `compra_producto`
  ADD CONSTRAINT `fk_compra_producto_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compra_producto_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `cliente-pedido` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Productos_Categorias` FOREIGN KEY (`Categorias_id`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
