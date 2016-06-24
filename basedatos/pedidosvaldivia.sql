-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2015 a las 03:13:45
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pedidosvaldivia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
`ID_Comentario` tinyint(5) NOT NULL,
  `ID_Usuario` tinyint(5) NOT NULL,
  `ID_Restaurante` tinyint(5) NOT NULL,
  `Comentario` text NOT NULL,
  `Valoracion` tinyint(5) NOT NULL,
  `Likes` tinyint(5) NOT NULL,
  `Dislikes` tinyint(5) NOT NULL,
  `Estado` tinyint(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`ID_Comentario`, `ID_Usuario`, `ID_Restaurante`, `Comentario`, `Valoracion`, `Likes`, `Dislikes`, `Estado`) VALUES
(1, 4, 1, 'Esta weno', 2, 1, 0, 1),
(2, 17, 1, 'fuuuuuuuuuuu', 2, 3, 3, 1),
(3, 4, 1, '...', 5, 2, 2, 1),
(4, 18, 1, 'asdasdasd', 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `geolocalizaciones`
--

CREATE TABLE IF NOT EXISTS `geolocalizaciones` (
`ID_Geo` tinyint(5) NOT NULL,
  `ID_Usuario` tinyint(5) NOT NULL,
  `ID_Restaurante` tinyint(5) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Coordenadas` text NOT NULL,
  `Estado` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_restaurantes`
--

CREATE TABLE IF NOT EXISTS `horarios_restaurantes` (
`ID_Horario` tinyint(5) NOT NULL,
  `ID_Restaurante` tinyint(5) NOT NULL,
  `primer_horario` varchar(100) NOT NULL,
  `segundo_horario` varchar(100) NOT NULL,
  `Dias` varchar(100) NOT NULL,
  `Estado` tinyint(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `horarios_restaurantes`
--

INSERT INTO `horarios_restaurantes` (`ID_Horario`, `ID_Restaurante`, `primer_horario`, `segundo_horario`, `Dias`, `Estado`) VALUES
(1, 1, '13:00/15:30', '18:00/23:30', 'Lunes/Viernes', 1),
(2, 1, '13:00–16:00', '19:00–23:30', 'Sabado', 1),
(3, 1, '13:00–16:00', 'null', 'Domingo', 1),
(4, 2, '13:00/24:00', '', 'Lunes/Viernes', 1),
(5, 3, '', '18:00/18:45', 'Lunes/Viernes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`ID_Menu` tinyint(5) NOT NULL,
  `ID_Restaurante` tinyint(5) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Valorizacion` tinyint(5) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Estado` tinyint(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`ID_Menu`, `ID_Restaurante`, `Descripcion`, `Valorizacion`, `Categoria`, `Estado`) VALUES
(1, 1, 'Pizzas Italianas', 3, 'Pizzas', 1),
(7, 2, 'Guisados AMA', 4, 'Guisos', 1),
(8, 1, 'pichangas', 4, 'Pastas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE IF NOT EXISTS `parametros` (
`ID_Parametro` tinyint(5) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Estado` tinyint(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`ID_Parametro`, `Nombre`, `Tipo`, `Estado`) VALUES
(1, 'Inicio de sesion', 'Sesion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
`ID_Pedido` tinyint(5) NOT NULL,
  `ID_Venta` tinyint(5) NOT NULL,
  `ID_Restaurante` tinyint(5) NOT NULL,
  `ID_Menu` tinyint(5) NOT NULL,
  `ID_Oferta` tinyint(5) NOT NULL,
  `ID_Platillo` tinyint(5) NOT NULL,
  `Distancia` varchar(50) NOT NULL,
  `Tiempo_entrega` varchar(50) NOT NULL,
  `Costo_envio` double NOT NULL,
  `Costo_minimo` double NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
`ID_Perfil` tinyint(5) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Estado` tinyint(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`ID_Perfil`, `Nombre`, `Tipo`, `Estado`) VALUES
(1, 'Usuario', 'Usuario', 1),
(2, 'Admin', 'Administrador', 1),
(3, 'Root', 'SuperAdministrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillos`
--

CREATE TABLE IF NOT EXISTS `platillos` (
`ID_Platillo` tinyint(5) NOT NULL,
  `ID_Menu` tinyint(5) NOT NULL,
  `ID_Restaurante` tinyint(5) NOT NULL,
  `ID_Combo` tinyint(5) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Componentes` varchar(50) NOT NULL,
  `Valorizacion` tinyint(5) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  `Costo` int(11) NOT NULL,
  `Estado` tinyint(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `platillos`
--

INSERT INTO `platillos` (`ID_Platillo`, `ID_Menu`, `ID_Restaurante`, `ID_Combo`, `Descripcion`, `Componentes`, `Valorizacion`, `Categoria`, `Imagen`, `Costo`, `Estado`) VALUES
(1, 1, 1, 0, 'Pizza 1', 'nada', 5, 'Pizzas', 'recursos/restaurantes/menus/platillo1.jpg', 2000, 1),
(2, 1, 1, 0, 'Pizza 2', 'nada', 5, 'Pizzas', 'recursos/restaurantes/menus/platillo2.jpg', 4000, 1),
(3, 1, 1, 0, 'Pizza 3', 'nada', 3, 'Pizzas', 'recursos/restaurantes/menus/platillo3.jpg', 6000, 1),
(4, 8, 2, 0, 'pichanguilla', 'sdasdsadasddsadsadasdasda', 4, 'Sopas', '../../recursos/restaurantes/menus/platillo2.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE IF NOT EXISTS `restaurantes` (
`ID_Restaurante` tinyint(5) NOT NULL,
  `ID_Sector` tinyint(5) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Hubicacion` varchar(50) NOT NULL,
  `Ciudad` varchar(50) NOT NULL,
  `Imagen` varchar(150) NOT NULL,
  `Rating` tinyint(5) NOT NULL,
  `Costo_envio` double NOT NULL,
  `Pedido_minimo` double NOT NULL,
  `Maps` text,
  `Coordenadas` text NOT NULL,
  `Tipo_comida` varchar(50) NOT NULL,
  `Estado` tinyint(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`ID_Restaurante`, `ID_Sector`, `Nombre`, `Hubicacion`, `Ciudad`, `Imagen`, `Rating`, `Costo_envio`, `Pedido_minimo`, `Maps`, `Coordenadas`, `Tipo_comida`, `Estado`) VALUES
(1, 1, 'La Pizzeria de Renzo', 'German Saelzer #40', 'Valdivia', 'recursos/restaurantes/renzo.png', 5, 2000, 5000, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1532.4341609298087!2d-73.2547194!3d-39.8099454!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x7ff7aff0697e9667!2sLa+Pizzeria+de+Renzo!5e0!3m2!1ses!2scl!4v1443541071100', '-39.810255, -73.254119', 'Pizzas', 1),
(2, 1, 'AMA Cocina Vegetariana', 'German Saelzer #40', 'Valdivia', 'recursos/restaurantes/ama.png', 3, 1000, 3500, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1532.4341609298087!2d-73.2547194!3d-39.8099454!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xc4356a5708ecd752!2sAMA%2CCafe+%26+Resto+Vegetariano!5e0!3m2!1ses!2scl!4v1443547076035', '-39.810294, -73.255036', 'Vegetariana, Vegana.', 1),
(3, 1, 'Restaurante Lomo de Toro', 'German Saelzer #40', 'Valdivia', 'recursos/restaurantes/toro.png', 2, 1500, 4500, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1532.4139516602515!2d-73.25336220223848!3d-39.81085196955558!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x3a24a90fb40d8b20!2sRestaurante+Lomo+de+Toro!5e0!3m2!1ses!2scl!4v1443547178681', '', 'Azados, parrillas, carnes.', 1),
(13, 3, 'Sushileno Valdivia', 'Valle Hondo 2790', 'Valdivia', 'recursos/restaurantes/sushileno.png', 5, 0, 0, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1821.6688648412635!2d-73.21507682577348!3d-39.836824063490866!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x28f60c596a54e60f!2ssushileno+valdivia!5e0!3m2!1ses!2scl!4v1443739242622', '', 'Sushi', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE IF NOT EXISTS `sectores` (
`ID_Sector` tinyint(5) NOT NULL,
  `Descripcion` text NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Map` text NOT NULL,
  `Estado` tinyint(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `sectores`
--

INSERT INTO `sectores` (`ID_Sector`, `Descripcion`, `Tipo`, `Map`, `Estado`) VALUES
(1, 'Los Alerces,\r\nIsla Teja,\r\nGerman Saelzer,\r\nLos robles\r\n', 'Sector', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1532.423842515735!2d-73.25360639990426!3d-39.81040827687394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9615ede082000809%3A0xc8ffb0b0dff07ce5!2sLos+Robles+102%2C+Valdivia%2C+Regi%C3%B3n+de+los+R%C3%ADos!5e0!3m2!1ses!2scl!4v1444004233932', 1),
(2, 'Camilo Henriquez\r\nCostanera A. Prat\r\nO''Higgins\r\nCarlos Anwandter', 'Sector', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1532.4264052521814!2d-73.244841088791!3d-39.810293314719345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9615edd858e8715f%3A0x9766b972cb3b1d84!2sCamilo+Henr%C3%ADquez+52%2C+Valdivia%2C+Regi%C3%B3n+de+los+R%C3%ADos!5e0!3m2!1ses!2scl!4v1443743321610', 1),
(3, 'Valle Hondo 2790,\r\nTeniente Merino.', 'Sector', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1288.112805136505!2d-73.21659664376318!3d-39.836909492011294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9615eeefc145b7ef%3A0x28f60c596a54e60f!2ssushileno+valdivia!5e0!3m2!1ses!2scl!4v1443743894519', 1),
(4, 'Irlanda,\r\nBerna,\r\nAvenida Francia,\r\nDinamarca.', 'Sector', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d455.41998438807167!2d-73.24001527304988!3d-39.83640660944943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9615ee5ca3dfc14f%3A0xde8c89ea78de36c2!2sKatana+Roll+Sushi+Delivery!5e0!3m2!1ses!2scl!4v1443744039302', 1),
(5, 'Esmeralda,\r\nBeauchef,\r\nArauco,\r\nCaupolican.\r\n', 'Sector', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d766.1431705264416!2d-73.24414647077748!3d-39.81657606861459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9615ee772ffd9067%3A0xa5eae3a068a61429!2sEsmeralda+466%2C+Valdivia%2C+Regi%C3%B3n+de+los+R%C3%ADos!5e0!3m2!1ses!2scl!4v1443744312996', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE IF NOT EXISTS `sesiones` (
`ID_Sesion` tinyint(5) NOT NULL,
  `ID_Usuario` tinyint(5) NOT NULL,
  `ID_Perfil` tinyint(5) NOT NULL,
  `fecha` date DEFAULT NULL,
  `estado` tinyint(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`ID_Sesion`, `ID_Usuario`, `ID_Perfil`, `fecha`, `estado`) VALUES
(1, 4, 1, '0000-00-00', 0),
(67, 17, 2, '0000-00-00', 0),
(68, 18, 2, NULL, 0),
(69, 19, 1, '0000-00-00', 0),
(70, 20, 1, '0000-00-00', 0),
(71, 22, 1, NULL, 0),
(72, 23, 1, NULL, 0),
(73, 24, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`ID_Usuario` tinyint(5) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Clave` varchar(150) NOT NULL,
  `Domicilio` varchar(100) NOT NULL,
  `Avatar` text NOT NULL,
  `Estado` tinyint(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre`, `Apellido`, `Email`, `Clave`, `Domicilio`, `Avatar`, `Estado`) VALUES
(4, 'Gustavo', 'Diaz', 'kain_6990@hotmail.com', 'wendyteamo', 'Isla Guacamayo #2510', 'recursos/usuarios/255373.jpg', 1),
(17, 'Administrador', 'admin', 'contacto@pedidosvaldivia.com', '123456q', '', '', 1),
(23, 'Patricio', 'Alvarez', 'palvarez@hotmail.com', '123456q', 'Los Robles 302', '', 1),
(24, 'asdasdasd', 'sdasdasdasd', 'test@pedidosval.cl', '123456q', '-39.8278353, -73.24703699999999', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
`ID_Venta` tinyint(5) NOT NULL,
  `ID_Pedido` tinyint(5) NOT NULL,
  `ID_Platillo` tinyint(5) NOT NULL,
  `ID_Menu` tinyint(5) NOT NULL,
  `ID_Restaurante` tinyint(5) NOT NULL,
  `ID_Cliente` tinyint(5) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Tipo_pago` varchar(50) NOT NULL,
  `Fecha_pago` date DEFAULT NULL,
  `Fecha_entrega` date DEFAULT NULL,
  `Precio` double NOT NULL,
  `Cantidad` tinyint(5) NOT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  `Subtotal` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID_Venta`, `ID_Pedido`, `ID_Platillo`, `ID_Menu`, `ID_Restaurante`, `ID_Cliente`, `Descripcion`, `Tipo_pago`, `Fecha_pago`, `Fecha_entrega`, `Precio`, `Cantidad`, `Imagen`, `Subtotal`) VALUES
(38, 1, 0, 0, 0, 4, 'Pizza 3', '', NULL, NULL, 6000, 1, 'recursos/restaurantes/menus/platillo3.jpg', 6000),
(39, 1, 0, 0, 0, 4, 'Pizza 2', '', NULL, NULL, 4000, 1, 'recursos/restaurantes/menus/platillo2.jpg', 4000),
(40, 1, 0, 0, 0, 4, 'Pizza 1', '', NULL, NULL, 2000, 1, 'recursos/restaurantes/menus/platillo1.jpg', 2000),
(41, 2, 0, 0, 0, 4, 'Pizza 1', '', NULL, NULL, 2000, 1, 'recursos/restaurantes/menus/platillo1.jpg', 2000),
(42, 2, 0, 0, 0, 4, 'Pizza 2', '', NULL, NULL, 4000, 1, 'recursos/restaurantes/menus/platillo2.jpg', 4000),
(43, 3, 0, 0, 0, 4, 'Pizza 2', '', NULL, NULL, 4000, 1, 'recursos/restaurantes/menus/platillo2.jpg', 4000),
(44, 3, 0, 0, 0, 4, 'Pizza 3', '', NULL, NULL, 6000, 2, 'recursos/restaurantes/menus/platillo3.jpg', 12000),
(45, 3, 0, 0, 0, 4, 'Pizza 1', '', NULL, NULL, 2000, 1, 'recursos/restaurantes/menus/platillo1.jpg', 2000),
(46, 4, 0, 0, 0, 4, 'Pizza 3', '', NULL, NULL, 6000, 1, 'recursos/restaurantes/menus/platillo3.jpg', 6000),
(47, 4, 0, 0, 0, 4, 'Pizza 2', '', NULL, NULL, 4000, 1, 'recursos/restaurantes/menus/platillo2.jpg', 4000),
(48, 5, 0, 0, 0, 17, 'Pizza 1', '', NULL, NULL, 2000, 1, 'recursos/restaurantes/menus/platillo1.jpg', 2000),
(49, 5, 0, 0, 0, 17, 'Pizza 2', '', NULL, NULL, 4000, 1, 'recursos/restaurantes/menus/platillo2.jpg', 4000),
(50, 6, 0, 0, 0, 19, 'Pizza 2', '', NULL, NULL, 4000, 1, 'recursos/restaurantes/menus/platillo2.jpg', 4000),
(51, 6, 0, 0, 0, 19, 'Pizza 3', '', NULL, NULL, 6000, 1, 'recursos/restaurantes/menus/platillo3.jpg', 6000),
(52, 6, 0, 0, 0, 19, 'Pizza 1', '', NULL, NULL, 2000, 1, 'recursos/restaurantes/menus/platillo1.jpg', 2000),
(53, 7, 0, 0, 0, 17, 'Pizza 3', '', NULL, NULL, 6000, 1, 'recursos/restaurantes/menus/platillo3.jpg', 6000),
(54, 7, 0, 0, 0, 17, 'Pizza 2', '', NULL, NULL, 4000, 1, 'recursos/restaurantes/menus/platillo2.jpg', 4000),
(55, 7, 0, 0, 0, 17, 'Pizza 1', '', NULL, NULL, 2000, 1, 'recursos/restaurantes/menus/platillo1.jpg', 2000),
(56, 8, 0, 0, 0, 4, 'Pizza 1', '', NULL, NULL, 2000, 1, 'recursos/restaurantes/menus/platillo1.jpg', 2000),
(57, 8, 0, 0, 0, 4, 'Pizza 2', '', NULL, NULL, 4000, 1, 'recursos/restaurantes/menus/platillo2.jpg', 4000),
(58, 8, 0, 0, 0, 4, 'Pizza 3', '', NULL, NULL, 6000, 1, 'recursos/restaurantes/menus/platillo3.jpg', 6000),
(59, 9, 0, 0, 0, 4, 'Pizza 2', '', NULL, NULL, 4000, 2, 'recursos/restaurantes/menus/platillo2.jpg', 8000),
(60, 9, 0, 0, 0, 4, 'Pizza 1', '', NULL, NULL, 2000, 1, 'recursos/restaurantes/menus/platillo1.jpg', 2000),
(61, 9, 0, 0, 0, 4, 'Pizza 3', '', NULL, NULL, 6000, 2, 'recursos/restaurantes/menus/platillo3.jpg', 12000),
(62, 10, 0, 0, 0, 4, 'Pizza 3', '', NULL, NULL, 6000, 1, 'recursos/restaurantes/menus/platillo3.jpg', 6000),
(63, 10, 0, 0, 0, 4, 'Pizza 2', '', NULL, NULL, 4000, 1, 'recursos/restaurantes/menus/platillo2.jpg', 4000),
(64, 10, 0, 0, 0, 4, 'Pizza 1', '', NULL, NULL, 2000, 1, 'recursos/restaurantes/menus/platillo1.jpg', 2000),
(65, 11, 0, 0, 0, 4, 'Pizza 2', '', NULL, NULL, 4000, 1, 'recursos/restaurantes/menus/platillo2.jpg', 4000),
(66, 11, 0, 0, 0, 4, 'Pizza 1', '', NULL, NULL, 2000, 1, 'recursos/restaurantes/menus/platillo1.jpg', 2000),
(67, 12, 0, 0, 0, 17, 'Pizza 3', '', NULL, NULL, 6000, 1, 'recursos/restaurantes/menus/platillo3.jpg', 6000),
(68, 12, 0, 0, 0, 17, 'Pizza 2', '', NULL, NULL, 4000, 1, 'recursos/restaurantes/menus/platillo2.jpg', 4000),
(69, 12, 0, 0, 0, 17, 'Pizza 1', '', NULL, NULL, 2000, 1, 'recursos/restaurantes/menus/platillo1.jpg', 2000),
(70, 13, 0, 0, 0, 17, 'Pizza 1', '', NULL, NULL, 2000, 1, 'recursos/restaurantes/menus/platillo1.jpg', 2000),
(71, 13, 0, 0, 0, 17, 'Pizza 2', '', NULL, NULL, 4000, 1, 'recursos/restaurantes/menus/platillo2.jpg', 4000),
(72, 13, 0, 0, 0, 17, 'Pizza 3', '', NULL, NULL, 6000, 1, 'recursos/restaurantes/menus/platillo3.jpg', 6000),
(73, 14, 0, 0, 0, 17, 'Pizza 3', '', NULL, NULL, 6000, 1, 'recursos/restaurantes/menus/platillo3.jpg', 6000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
 ADD PRIMARY KEY (`ID_Comentario`);

--
-- Indices de la tabla `geolocalizaciones`
--
ALTER TABLE `geolocalizaciones`
 ADD PRIMARY KEY (`ID_Geo`);

--
-- Indices de la tabla `horarios_restaurantes`
--
ALTER TABLE `horarios_restaurantes`
 ADD PRIMARY KEY (`ID_Horario`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`ID_Menu`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
 ADD PRIMARY KEY (`ID_Parametro`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
 ADD PRIMARY KEY (`ID_Pedido`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
 ADD PRIMARY KEY (`ID_Perfil`);

--
-- Indices de la tabla `platillos`
--
ALTER TABLE `platillos`
 ADD PRIMARY KEY (`ID_Platillo`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
 ADD PRIMARY KEY (`ID_Restaurante`);

--
-- Indices de la tabla `sectores`
--
ALTER TABLE `sectores`
 ADD PRIMARY KEY (`ID_Sector`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
 ADD PRIMARY KEY (`ID_Sesion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`ID_Usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
 ADD PRIMARY KEY (`ID_Venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
MODIFY `ID_Comentario` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `geolocalizaciones`
--
ALTER TABLE `geolocalizaciones`
MODIFY `ID_Geo` tinyint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horarios_restaurantes`
--
ALTER TABLE `horarios_restaurantes`
MODIFY `ID_Horario` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
MODIFY `ID_Menu` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `parametros`
--
ALTER TABLE `parametros`
MODIFY `ID_Parametro` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
MODIFY `ID_Pedido` tinyint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
MODIFY `ID_Perfil` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `platillos`
--
ALTER TABLE `platillos`
MODIFY `ID_Platillo` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
MODIFY `ID_Restaurante` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `sectores`
--
ALTER TABLE `sectores`
MODIFY `ID_Sector` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
MODIFY `ID_Sesion` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `ID_Usuario` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
MODIFY `ID_Venta` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
