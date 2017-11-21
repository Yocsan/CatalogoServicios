-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2017 a las 02:24:39
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catalogo_servicios_pic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambientes`
--

CREATE TABLE `ambientes` (
  `id_ambiente` int(11) NOT NULL,
  `nombre_ambiente` varchar(45) DEFAULT NULL,
  `status_ambiente` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ambientes`
--

INSERT INTO `ambientes` (`id_ambiente`, `nombre_ambiente`, `status_ambiente`) VALUES
(1, 'Produccion', 1),
(2, 'Calidad', 1),
(3, 'Desarrollo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conf_ftp`
--

CREATE TABLE `conf_ftp` (
  `id_conf_ftp` int(11) NOT NULL,
  `directorio` varchar(200) DEFAULT NULL,
  `nombre_archivo` varchar(100) DEFAULT NULL,
  `modelo_datos_id_modelo_dato` int(11) NOT NULL,
  `regla_transformacion` varchar(100) DEFAULT NULL,
  `condicion_control_m` varchar(50) DEFAULT NULL,
  `volumen` varchar(50) DEFAULT NULL,
  `frecuencias_ftp_id_frecuencia_ftp` int(2) NOT NULL,
  `reglas_transporte_id_regla_transporte` int(2) NOT NULL,
  `split` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conf_ftp`
--

INSERT INTO `conf_ftp` (`id_conf_ftp`, `directorio`, `nombre_archivo`, `modelo_datos_id_modelo_dato`, `regla_transformacion`, `condicion_control_m`, `volumen`, `frecuencias_ftp_id_frecuencia_ftp`, `reglas_transporte_id_regla_transporte`, `split`) VALUES
(1, '', 'ejemplo', 1, '', '', '', 1, 1, 0),
(2, '', 'ejemplo', 1, '', '', '', 1, 1, 0),
(3, '', 'ejemplo', 1, 'ejemplo', '', '', 1, 1, 0),
(4, '', 'ejemplo', 1, '', '', '', 1, 1, 0),
(5, '', 'ejemplo', 1, '', '', '', 1, 1, 0),
(6, '', '', 1, '', '', '', 1, 1, 0),
(7, '', '', 1, '', '', '', 1, 1, 0),
(8, 'ryu', 'ruy', 2, '', 'yut', 'tyu', 3, 1, 1),
(9, 'tyu', 'tyu', 1, 'tyu', 'tyu', 'tyu', 1, 1, 0),
(10, '', '', 1, '', '', '', 1, 1, 0),
(11, '', '', 1, '', '', '', 1, 1, 0),
(12, '', '', 1, '', '', '', 1, 1, 0),
(13, '', '', 1, '', '', '', 1, 1, 0),
(14, '', '', 1, '', '', '', 1, 1, 0),
(15, '', '', 1, '', '', '', 1, 1, 0),
(16, '', '', 1, '', '', '', 1, 1, 0),
(17, '', '', 1, '', '', '', 1, 1, 0),
(18, '', '', 1, '', '', '', 1, 1, 0),
(19, '', '', 1, '', '', '', 1, 1, 0),
(20, '', '', 1, '', '', '', 1, 1, 0),
(21, '', '', 1, '', '', '', 1, 1, 0),
(22, '', '', 1, '', '', '', 1, 1, 0),
(23, '', '', 1, '', '', '', 1, 1, 0),
(24, '', 'upu', 1, '', '', '', 1, 1, 0),
(25, NULL, '', 1, '', '', '', 1, 1, 0),
(26, 'eg', 'rg', 1, 'ger', 'ergeeeeeeeee', 'egrg', 1, 1, 0),
(27, 'erg', 'g', 1, 'erg', 'eg', 'erg', 1, 1, 0),
(28, '5y', '56y', 1, '5t45t', '45t', 't54t', 1, 1, 0),
(29, '56y', '', 1, '45t', 'y56y', 'rg', 1, 1, 0),
(30, '', '', 1, 'tyh', 'thty', 'thh', 1, 1, 0),
(31, 'thyh', '', 1, 'thyth', 'ythty', 'tyh', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conf_web`
--

CREATE TABLE `conf_web` (
  `id_conf_web` int(11) NOT NULL,
  `servicios_id_servicio` int(11) NOT NULL,
  `url_wsdl` varchar(300) DEFAULT NULL,
  `ambientes_id_ambiente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conf_web`
--

INSERT INTO `conf_web` (`id_conf_web`, `servicios_id_servicio`, `url_wsdl`, `ambientes_id_ambiente`) VALUES
(1, 5, '', 3),
(2, 5, '', 2),
(3, 5, '', 1),
(4, 36, 'kkj', 3),
(5, 36, '5g5', 2),
(6, 36, '45g', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esquemas`
--

CREATE TABLE `esquemas` (
  `id_esquema` int(11) NOT NULL,
  `nombre_esquema` varchar(100) DEFAULT NULL,
  `descripcion_esquema` varchar(200) DEFAULT NULL,
  `status_esquema` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `esquemas`
--

INSERT INTO `esquemas` (`id_esquema`, `nombre_esquema`, `descripcion_esquema`, `status_esquema`) VALUES
(1, 'AT', 'Atención Total', 1),
(2, 'CRM', 'Atención al cliente', 1),
(3, 'CTC', 'Banca', 1),
(4, 'SACAS', NULL, 1),
(5, 'MULE 3.N', 'Mula', 1),
(6, 'RR', NULL, 0),
(7, '43545', 'ggg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estructuras_datos_f1`
--

CREATE TABLE `estructuras_datos_f1` (
  `Id_F1` int(5) NOT NULL,
  `Esquema` varchar(100) DEFAULT NULL,
  `Sistema` varchar(100) DEFAULT NULL,
  `Obligatoriedad` varchar(10) DEFAULT NULL,
  `Campo` varchar(100) DEFAULT NULL,
  `Tipo_campo` varchar(20) DEFAULT NULL,
  `Posicion` int(5) DEFAULT NULL,
  `Longitud` int(3) DEFAULT NULL,
  `Estructura` varchar(100) DEFAULT NULL,
  `Valor_ejemplo` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Id_sentido` int(11) NOT NULL,
  `Transformacion` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frecuencias`
--

CREATE TABLE `frecuencias` (
  `id_frecuencia` int(5) NOT NULL,
  `nombre_frecuencia` varchar(45) NOT NULL,
  `status_frecuencia` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `frecuencias`
--

INSERT INTO `frecuencias` (`id_frecuencia`, `nombre_frecuencia`, `status_frecuencia`) VALUES
(1, 'Bajo demanda', 1),
(2, 'Alta demanda', 1),
(3, 'Aleatoria', 1),
(4, 'Diario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frecuencias_ftp`
--

CREATE TABLE `frecuencias_ftp` (
  `id_frecuencia_ftp` int(2) NOT NULL,
  `nombre_frecuencia_ftp` varchar(100) NOT NULL,
  `status_frecuencia_ftp` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `frecuencias_ftp`
--

INSERT INTO `frecuencias_ftp` (`id_frecuencia_ftp`, `nombre_frecuencia_ftp`, `status_frecuencia_ftp`) VALUES
(1, 'N/A', 1),
(2, 'C/HORA', 1),
(3, 'DIARIO', 1),
(4, 'SEMANAL', 1),
(5, 'MENSUAL', 1),
(6, 'ANUAL', 1),
(7, 'ELIMINAR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `usuarios_idusuarios` int(11) NOT NULL,
  `fecha_elaboracion` date DEFAULT NULL,
  `version` varchar(10) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id_menu` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `id_menu_superior` varchar(45) DEFAULT NULL,
  `vista` varchar(45) DEFAULT NULL,
  `descripcion` varchar(300) NOT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id_menu`, `nombre`, `id_menu_superior`, `vista`, `descripcion`, `status`) VALUES
(1, 'Administración', '0', 'administracion', 'Módulo que expone las funcionalidades de agregar, consultar, editar y eliminar los datos que interactuan en los intercambios de información', '1'),
(2, 'Servicios', '0', 'servicios', '', '0'),
(3, 'Utilidades', '0', 'utilidades', '', '0'),
(4, 'Consultas', '0', 'consultas', 'Consulta de todos los servicios asociados a la Plataforma de Integración Corporativa (PIC)', '1'),
(5, 'Reportes', '0', 'reportes', '', '0'),
(6, 'Usuarios', '1', 'usuarios', '', '1'),
(7, 'Verticales', '1', 'verticales', '', '1'),
(8, 'Esquemas', '1', 'esquemas', '', '1'),
(9, 'Sistemas/Aplicaciones', '1', 'sistemas_aplicaciones', '', '1'),
(10, 'Dominios', '1', 'dominios', '', '0'),
(11, 'Transformaciones', '1', 'transformaciones', '', '0'),
(12, 'Tipos de datos', '2', 'tipos_datos', '', '1'),
(13, 'Servicios', '1', 'servicios', '', '1'),
(14, 'Documentos', '0', 'documentos', 'Módulo que expone las funcionalidades de imprimir documentos (ETF y F1)', '1'),
(15, 'Documentos ETF', '14', 'documentos_etf', '', '0'),
(16, 'Documentos F1', '14', 'documentos_f1', '', '0'),
(17, 'Errores', '1', 'errores', '', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus_has_roles`
--

CREATE TABLE `menus_has_roles` (
  `menus_id_menu` int(11) NOT NULL,
  `roles_id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menus_has_roles`
--

INSERT INTO `menus_has_roles` (`menus_id_menu`, `roles_id_rol`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 3),
(5, 1),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_datos`
--

CREATE TABLE `modelo_datos` (
  `id_modelo_dato` int(11) NOT NULL,
  `nombre_modelo_dato` varchar(45) DEFAULT NULL,
  `status_modelo_dato` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelo_datos`
--

INSERT INTO `modelo_datos` (`id_modelo_dato`, `nombre_modelo_dato`, `status_modelo_dato`) VALUES
(1, 'ASCII', 1),
(2, 'ABCD', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `necesidades`
--

CREATE TABLE `necesidades` (
  `id_necesidad` int(11) NOT NULL,
  `num_necesidad` varchar(45) DEFAULT NULL,
  `descripcion_necesidad` varchar(100) DEFAULT NULL,
  `tipos_necesidad_id_tipo_necesidad` int(11) NOT NULL,
  `status_necesidad` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `necesidades`
--

INSERT INTO `necesidades` (`id_necesidad`, `num_necesidad`, `descripcion_necesidad`, `tipos_necesidad_id_tipo_necesidad`, `status_necesidad`) VALUES
(1, '', '', 1, 1),
(2, 'prueba1', 'asdfsd', 1, 1),
(3, 'asdfsdaf', 'adfsdfdf', 2, 1),
(4, 'prueba23', 'prueba23', 2, 1),
(5, 'prueba3', 'prueba3', 2, 1),
(7, 'asdfsdfdf', 'asdfdfdfsd', 2, 1),
(9, 'pruebaaaaa', 'asdsdfaf', 2, 1),
(10, 'sadfdf', 'bbbbbbbbb', 2, 1),
(15, 'gfh', 'sdfdf', 1, 1),
(16, 'sadfdfdf', 'asdsdf', 1, 1),
(17, 'aaaa', 'asdff', 1, 1),
(18, 'asdf', '', 1, 1),
(19, 'dm6590', 'servicio de prueba', 1, 1),
(20, 'dm629', 'servicio de prueba', 1, 1),
(22, 'DC55', 'Requerimiento de cliente unico', 1, 1),
(25, 'ytu', 'tyut', 2, 1),
(26, 'ety', 'ryrty', 1, 1),
(27, 'iuo', 'uio', 2, 1),
(29, 'jjjj', 'kjlkjlkjl', 1, 1),
(30, 'mm', 'oj', 1, 1),
(31, '  nkj', 'kljjlkkj', 1, 1),
(32, 'wer', 'wer', 1, 1),
(34, 'werwe', 'werwe', 1, 1),
(35, 'yu', 'yu', 1, 1),
(36, 'juj', 'jjjj', 1, 1),
(37, 'sdasd', 'aasda', 1, 1),
(38, 'tju', '6j', 1, 1),
(39, 'sda', 'asd', 1, 1),
(40, 'rg', 'rg', 1, 1),
(41, 'rgg', 'g', 1, 1),
(42, 'erg', 'rg', 1, 1),
(43, 'asd', 'sd', 1, 1),
(44, 'ghf', 'fgh', 1, 1),
(45, 'sdfs', 'fsdf', 1, 1),
(46, 'fw', 'efe', 1, 1),
(47, 'sadasascdac', 'sd', 1, 1),
(48, 'mnmnkj', 'mnmn', 1, 1),
(49, 'nnnmmm', 'jkkj', 1, 1),
(51, 'adadad', 'adadad', 2, 1),
(52, 'a', 'a', 1, 1),
(53, 'qew', 'weqw', 1, 1),
(54, 'ttyrtyr', 'tyrtyrt', 1, 1),
(55, 'erte', 'rtert', 1, 1),
(56, 'eterte', 'erterter', 1, 1),
(57, 'erwe', 'rwer', 1, 1),
(58, 'dsfsdfsdf', 'sdfsdf', 1, 1),
(59, 'g4g', '4g', 1, 1),
(60, 'g4', '5g45', 1, 1),
(61, 'ert', 'ete', 1, 1),
(62, 'tyh', 'yh', 2, 1),
(63, '45t', '45t', 1, 1),
(64, 'jmmm', 'jhg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premisas`
--

CREATE TABLE `premisas` (
  `id_premisa` int(11) NOT NULL,
  `descripcion_premisa` varchar(500) DEFAULT NULL,
  `servicios_id_servicio` int(11) NOT NULL,
  `status_premisa` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `premisas`
--

INSERT INTO `premisas` (`id_premisa`, `descripcion_premisa`, `servicios_id_servicio`, `status_premisa`) VALUES
(1, 'sdfadf', 2, 1),
(2, 'asdf', 3, 1),
(3, 'ejemplo', 4, 1),
(4, 'ejemplo', 4, 1),
(5, 'dfgdfg', 5, 1),
(6, 'fgdfg', 5, 1),
(7, '', 6, 1),
(8, 'fyu', 8, 1),
(9, '', 9, 1),
(10, 'lkj', 10, 1),
(11, '', 12, 1),
(12, '', 13, 1),
(13, 'hkj', 14, 1),
(14, 'as', 15, 1),
(15, '', 16, 1),
(16, 'asd', 17, 1),
(17, 'g4', 18, 1),
(18, 'bbb', 19, 1),
(19, 'v', 20, 1),
(20, 'asd', 21, 1),
(21, 'hh', 22, 1),
(22, 'dsf', 23, 1),
(23, 'sf', 24, 1),
(24, '', 25, 1),
(25, 'sc', 27, 1),
(26, 'd', 28, 1),
(27, 'weq', 29, 1),
(28, 'tyrty', 30, 1),
(29, 'et', 31, 1),
(30, 'ertert', 32, 1),
(31, 'wer', 33, 1),
(32, 'xcv', 34, 1),
(33, '45g', 36, 1),
(34, '45g', 36, 1),
(35, 'hg', 37, 1),
(36, '56y6y', 38, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridades`
--

CREATE TABLE `prioridades` (
  `id_prioridad` int(11) NOT NULL,
  `nombre_prioridad` varchar(45) DEFAULT NULL,
  `status_prioridad` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='					';

--
-- Volcado de datos para la tabla `prioridades`
--

INSERT INTO `prioridades` (`id_prioridad`, `nombre_prioridad`, `status_prioridad`) VALUES
(1, 'Baja', 1),
(2, 'Media', 1),
(3, 'Alta', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesamientos`
--

CREATE TABLE `procesamientos` (
  `id_procesamiento` int(11) NOT NULL,
  `nombre_procesamiento` varchar(45) DEFAULT NULL,
  `status_procesamiento` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='			';

--
-- Volcado de datos para la tabla `procesamientos`
--

INSERT INTO `procesamientos` (`id_procesamiento`, `nombre_procesamiento`, `status_procesamiento`) VALUES
(1, 'Asincrono', 1),
(2, 'Sincrono', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reglas_transporte`
--

CREATE TABLE `reglas_transporte` (
  `id_regla_transporte` int(2) NOT NULL,
  `nombre_regla_transporte` varchar(100) NOT NULL,
  `status_regla_transporte` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reglas_transporte`
--

INSERT INTO `reglas_transporte` (`id_regla_transporte`, `nombre_regla_transporte`, `status_regla_transporte`) VALUES
(1, 'N/A', 1),
(2, 'Mover', 1),
(3, 'Eliminar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(45) DEFAULT NULL,
  `vista` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `vista`) VALUES
(1, 'Administrador', 'default_administrador'),
(2, 'Arquitecto', 'default_arquitecto'),
(3, 'Visitante', 'default_visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sentidos`
--

CREATE TABLE `sentidos` (
  `id_sentido` int(11) NOT NULL,
  `nombre_sentido` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sentidos`
--

INSERT INTO `sentidos` (`id_sentido`, `nombre_sentido`) VALUES
(1, 'Origen'),
(2, 'Destino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `evento_disparador` varchar(800) DEFAULT NULL,
  `introduccion` varchar(500) DEFAULT NULL,
  `adaptador` varchar(800) DEFAULT NULL,
  `descripcion_proceso` varchar(500) DEFAULT NULL,
  `arquitectura_sistema_conexion` varchar(500) DEFAULT NULL,
  `url_imagen` varchar(200) DEFAULT NULL,
  `procesamientos_id_procesamiento` int(11) NOT NULL,
  `necesidades_id_necesidad` int(11) NOT NULL,
  `esquemas_id_esquema` int(11) NOT NULL,
  `prioridades_id_prioridad` int(11) NOT NULL,
  `verticales_id_vertical` int(11) NOT NULL,
  `frecuencias_id_frecuencia` int(5) NOT NULL,
  `tipos_servicios_id_tipo_servicio` int(5) NOT NULL,
  `status_servicio` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre`, `evento_disparador`, `introduccion`, `adaptador`, `descripcion_proceso`, `arquitectura_sistema_conexion`, `url_imagen`, `procesamientos_id_procesamiento`, `necesidades_id_necesidad`, `esquemas_id_esquema`, `prioridades_id_prioridad`, `verticales_id_vertical`, `frecuencias_id_frecuencia`, `tipos_servicios_id_tipo_servicio`, `status_servicio`) VALUES
(1, 'movilnetConsulta de saldo', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, 1, 1, 1, 1, 1),
(2, 'sadf', 'asdfsd', 'asdfdf', 'fdfsdafdfsdfa', 'asdfdf', 'asdfsdf', 'C:/xampp/htdocs/CatalogoServicios/uploads/diagramas_uml/diagrama_uml_sadf.png', 1, 16, 2, 1, 3, 1, 2, 1),
(3, 'aaaa', 'aaa', 'aa', 'aa', 'aa', 'aaa', 'C:/xampp/htdocs/CatalogoServicios/uploads/diagramas_uml/diagrama_uml_aaaa.png', 1, 17, 1, 1, 3, 1, 2, 0),
(4, 'dm628Movilnet', 'ejemplo', 'introduccion', 'ejemplo', 'ejemplo', 'ejemplo', 'C:/xampp/htdocs/CatalogoServicios/uploads/diagramas_uml/diagrama_uml_dm628Movilnet.png', 1, 20, 1, 1, 3, 1, 1, 1),
(5, 'DC_ClienteUnico_movilnet', 'sgsdg', 'dsg', '', 'sdg', 'fgdfg', '', 2, 22, 2, 2, 15, 3, 2, 1),
(6, '', '', '', '', '', '', '', 1, 25, 1, 1, 3, 1, 1, 0),
(8, 'iuouio', '', 'uio', '', '', '', '', 1, 27, 1, 1, 3, 1, 1, 1),
(9, 'aaa', ',mn', 'kjhk', 'hjgjh', ',mnm', 'jhj', '', 1, 30, 1, 1, 3, 1, 1, 1),
(10, 'lll', 'kjhk', 'kjhk', ',kjh', 'jkhj', 'jh', '', 1, 31, 1, 1, 3, 1, 1, 1),
(12, 'we', 'wer', 'wer', 'we', 'wer', 'rew', '', 1, 34, 1, 1, 3, 1, 1, 1),
(13, '45y', '45y', '45y', '45y', '45y', '45y', '', 1, 35, 1, 1, 3, 1, 1, 1),
(14, 'ghj', '', '', '', '', 'mhjm', '', 1, 36, 1, 1, 3, 1, 1, 1),
(15, 'adsas', 'asd', 'sda', 'asd', 'asd', 'sd', '', 1, 37, 1, 1, 3, 1, 1, 1),
(16, 'jj', '', '', '', '', '', '', 1, 38, 1, 1, 3, 1, 1, 1),
(17, 'da', '', 'asd', '', '', '', '', 1, 39, 1, 1, 3, 1, 1, 1),
(18, '4rg', '4g4g', 'g4', '', '', '4g', '', 1, 40, 1, 1, 3, 1, 1, 1),
(19, 'fb', 'fgb', 'fb', 'fgb', 'gb', 'gfb', '', 1, 41, 1, 1, 3, 1, 1, 1),
(20, 'vvv', 'v', 'vfv', 'v', '', 'v', '', 1, 42, 1, 1, 3, 1, 1, 1),
(21, 'asdasd', 'asd', 'asdas', 'asd', 'asd', 'asd', '', 1, 43, 1, 1, 3, 1, 1, 1),
(22, 'hhhh', 'h', 'hgh', 'h', 'h', 'h', '', 1, 44, 1, 1, 3, 1, 1, 1),
(23, 'dsf', 'dsf', 'sdf', 'sdf', 'df', 'df', '', 1, 45, 1, 1, 3, 1, 1, 1),
(24, 'ef', 'ssdf', 'ef', 'fd', 'ef', 'dsf', '', 1, 46, 1, 1, 3, 1, 1, 1),
(25, 'efer33', 'erf4knjkj', 'fer2', 'dwe44', 'er44f34r4', 'we444', '', 1, 47, 1, 3, 3, 2, 1, 1),
(27, 'sadaaa', 'sd', '', '', '', '', '', 2, 51, 5, 2, 12, 3, 1, 1),
(28, 'aaaaaaaaa', 'a', 'a', 'd', 'sad', 'd', '', 1, 52, 1, 1, 3, 1, 1, 1),
(29, 'Eeqwe', 'wewqe', 'we', 'qwe', 'we', 'qwe', '', 1, 53, 1, 1, 3, 1, 1, 1),
(30, 'tyrty', 'ty', 'try', 'rty', 'ty', 'rty', '', 1, 54, 1, 1, 3, 1, 1, 1),
(31, 'drtert', 'rt', 'ert', 'ert', 'ert', 'ert', '', 1, 55, 1, 1, 3, 1, 1, 1),
(32, 'ert', 'ert', 'ert', 'ert', 'ert', 'ertert', '', 1, 56, 1, 1, 3, 1, 2, 1),
(33, 'wer', 'wer', 'wer', 'wer', 'wer', 'wer', '', 1, 57, 1, 1, 3, 1, 2, 1),
(34, 'cxv', 'cxvxcv', 'cv', 'xcv', 'xcv', 'xcv', '', 1, 58, 1, 1, 3, 1, 2, 1),
(36, '4g45', 'g4', '45g45g', '5g', '54g45', '4g45g', '', 1, 60, 1, 1, 3, 1, 2, 0),
(37, 'etert', 'erte', 'erter', 'rte', 'ert', 'rt', '', 1, 61, 1, 1, 3, 1, 1, 1),
(38, '45t45t', '5y', '45t', '45t', '45t', '5t', '', 1, 63, 1, 1, 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_has_sistemas`
--

CREATE TABLE `servicios_has_sistemas` (
  `servicios_id_servicio` int(11) NOT NULL,
  `sistemas_id_sistema` int(5) NOT NULL,
  `sentidos_id_sentido` int(11) NOT NULL,
  `conf_ftp_id_conf_ftp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios_has_sistemas`
--

INSERT INTO `servicios_has_sistemas` (`servicios_id_servicio`, `sistemas_id_sistema`, `sentidos_id_sentido`, `conf_ftp_id_conf_ftp`) VALUES
(4, 1, 1, 1),
(4, 1, 2, 3),
(4, 1, 2, 4),
(4, 1, 2, 5),
(4, 3, 1, 2),
(5, 1, 2, 0),
(5, 3, 1, 0),
(6, 1, 1, 6),
(6, 1, 2, 7),
(8, 1, 1, 8),
(8, 4, 2, 9),
(10, 1, 1, 10),
(10, 1, 1, 11),
(10, 1, 1, 12),
(10, 1, 1, 13),
(10, 1, 1, 14),
(10, 1, 1, 15),
(10, 1, 2, 16),
(10, 1, 2, 17),
(10, 1, 2, 18),
(10, 1, 2, 19),
(10, 1, 2, 20),
(10, 1, 2, 21),
(12, 1, 1, 22),
(12, 1, 2, 23),
(21, 1, 1, 24),
(21, 1, 2, 25),
(30, 1, 1, 26),
(30, 1, 2, 27),
(36, 1, 1, 0),
(36, 1, 2, 0),
(37, 1, 1, 28),
(37, 1, 2, 29),
(38, 1, 1, 30),
(38, 1, 2, 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistemas`
--

CREATE TABLE `sistemas` (
  `id_sistema` int(5) NOT NULL,
  `nombre_sistema` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `status_sistema` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sistemas`
--

INSERT INTO `sistemas` (`id_sistema`, `nombre_sistema`, `descripcion`, `status_sistema`) VALUES
(1, 'KENAN', 'sistema de facturacion', 1),
(2, 'KENAN444', 'sistema de facturacion444', 0),
(3, 'SACAS', 'sistema de averias', 1),
(4, 'SACASS', 'sistema de facturacion', 1),
(5, 'KENANN', 'facturacion', 1),
(6, 'LASSSS', 'skjafkl', 0),
(7, 'JHJKHjk', 'hjkh', 0),
(8, 'KLJLKJERT', 'kjklj', 1),
(9, 'JHJ8899', 'hj999', 0),
(10, 'ASDDF', 'sadfsd', 1),
(11, 'TTTT', 'tertert', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_necesidad`
--

CREATE TABLE `tipos_necesidad` (
  `id_tipo_necesidad` int(11) NOT NULL,
  `nombre_necesidad` varchar(45) NOT NULL,
  `status_tipo_necesidad` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_necesidad`
--

INSERT INTO `tipos_necesidad` (`id_tipo_necesidad`, `nombre_necesidad`, `status_tipo_necesidad`) VALUES
(1, 'SPL', 1),
(2, 'Requerimiento', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_servicios`
--

CREATE TABLE `tipos_servicios` (
  `id_tipo_servicio` int(5) NOT NULL,
  `nombre_tipo_servicio` varchar(45) DEFAULT NULL,
  `status_tipo_servicio` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_servicios`
--

INSERT INTO `tipos_servicios` (`id_tipo_servicio`, `nombre_tipo_servicio`, `status_tipo_servicio`) VALUES
(1, 'FTP', 1),
(2, 'WEB', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `p00` varchar(45) DEFAULT NULL,
  `cedula` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `status_usuario` int(1) DEFAULT NULL,
  `roles_id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `nombre`, `apellido`, `p00`, `cedula`, `telefono`, `status_usuario`, `roles_id_rol`) VALUES
(1, 'root', 'root', 'root', 'root', '146252', '24896880', '4166338936', 1, 1),
(2, 'yburgo02', '123456', 'Yocsan', 'burgos', '146252', '24896880', '4166338936', 0, 1),
(3, 'mfrv', '123', 'Maria', 'Vegas', '146252', '24272522', '0212-5555555', 0, 1),
(4, 'mvegas', '123', 'Maria Fernanda', 'Vegas', '12345', '24272522', '04123750000', 1, 1),
(5, 'mvegasd', '123', 'Maria Fernanda', 'rrr', 'ggdf', '44444', '4234', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verticales`
--

CREATE TABLE `verticales` (
  `id_vertical` int(11) NOT NULL,
  `identificador_vertical` varchar(10) NOT NULL,
  `nombre_vertical` varchar(100) DEFAULT NULL,
  `status_vertical` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Procesos de negocios de la corporacion asociados a funcionalidades.';

--
-- Volcado de datos para la tabla `verticales`
--

INSERT INTO `verticales` (`id_vertical`, `identificador_vertical`, `nombre_vertical`, `status_vertical`) VALUES
(1, 'AT', 'Atencion Total', 0),
(2, 'AP', 'Aprovisionamiento', 1),
(3, 'FT', 'Facturacion', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambientes`
--
ALTER TABLE `ambientes`
  ADD PRIMARY KEY (`id_ambiente`);

--
-- Indices de la tabla `conf_ftp`
--
ALTER TABLE `conf_ftp`
  ADD PRIMARY KEY (`id_conf_ftp`,`modelo_datos_id_modelo_dato`);

--
-- Indices de la tabla `conf_web`
--
ALTER TABLE `conf_web`
  ADD PRIMARY KEY (`id_conf_web`,`servicios_id_servicio`,`ambientes_id_ambiente`);

--
-- Indices de la tabla `esquemas`
--
ALTER TABLE `esquemas`
  ADD PRIMARY KEY (`id_esquema`);

--
-- Indices de la tabla `estructuras_datos_f1`
--
ALTER TABLE `estructuras_datos_f1`
  ADD PRIMARY KEY (`Id_F1`);

--
-- Indices de la tabla `frecuencias`
--
ALTER TABLE `frecuencias`
  ADD PRIMARY KEY (`id_frecuencia`);

--
-- Indices de la tabla `frecuencias_ftp`
--
ALTER TABLE `frecuencias_ftp`
  ADD PRIMARY KEY (`id_frecuencia_ftp`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`,`usuarios_idusuarios`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `menus_has_roles`
--
ALTER TABLE `menus_has_roles`
  ADD PRIMARY KEY (`menus_id_menu`,`roles_id_rol`);

--
-- Indices de la tabla `modelo_datos`
--
ALTER TABLE `modelo_datos`
  ADD PRIMARY KEY (`id_modelo_dato`);

--
-- Indices de la tabla `necesidades`
--
ALTER TABLE `necesidades`
  ADD PRIMARY KEY (`id_necesidad`,`tipos_necesidad_id_tipo_necesidad`),
  ADD UNIQUE KEY `num_necesidaded_UNIQUE` (`num_necesidad`);

--
-- Indices de la tabla `premisas`
--
ALTER TABLE `premisas`
  ADD PRIMARY KEY (`id_premisa`,`servicios_id_servicio`);

--
-- Indices de la tabla `prioridades`
--
ALTER TABLE `prioridades`
  ADD PRIMARY KEY (`id_prioridad`);

--
-- Indices de la tabla `procesamientos`
--
ALTER TABLE `procesamientos`
  ADD PRIMARY KEY (`id_procesamiento`);

--
-- Indices de la tabla `reglas_transporte`
--
ALTER TABLE `reglas_transporte`
  ADD PRIMARY KEY (`id_regla_transporte`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sentidos`
--
ALTER TABLE `sentidos`
  ADD PRIMARY KEY (`id_sentido`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`,`procesamientos_id_procesamiento`,`necesidades_id_necesidad`,`esquemas_id_esquema`,`prioridades_id_prioridad`,`verticales_id_vertical`,`frecuencias_id_frecuencia`,`tipos_servicios_id_tipo_servicio`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `servicios_has_sistemas`
--
ALTER TABLE `servicios_has_sistemas`
  ADD PRIMARY KEY (`servicios_id_servicio`,`sistemas_id_sistema`,`sentidos_id_sentido`,`conf_ftp_id_conf_ftp`);

--
-- Indices de la tabla `sistemas`
--
ALTER TABLE `sistemas`
  ADD PRIMARY KEY (`id_sistema`);

--
-- Indices de la tabla `tipos_necesidad`
--
ALTER TABLE `tipos_necesidad`
  ADD PRIMARY KEY (`id_tipo_necesidad`);

--
-- Indices de la tabla `tipos_servicios`
--
ALTER TABLE `tipos_servicios`
  ADD PRIMARY KEY (`id_tipo_servicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`,`roles_id_rol`);

--
-- Indices de la tabla `verticales`
--
ALTER TABLE `verticales`
  ADD PRIMARY KEY (`id_vertical`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambientes`
--
ALTER TABLE `ambientes`
  MODIFY `id_ambiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `conf_ftp`
--
ALTER TABLE `conf_ftp`
  MODIFY `id_conf_ftp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `conf_web`
--
ALTER TABLE `conf_web`
  MODIFY `id_conf_web` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `esquemas`
--
ALTER TABLE `esquemas`
  MODIFY `id_esquema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `estructuras_datos_f1`
--
ALTER TABLE `estructuras_datos_f1`
  MODIFY `Id_F1` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `frecuencias`
--
ALTER TABLE `frecuencias`
  MODIFY `id_frecuencia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `frecuencias_ftp`
--
ALTER TABLE `frecuencias_ftp`
  MODIFY `id_frecuencia_ftp` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `modelo_datos`
--
ALTER TABLE `modelo_datos`
  MODIFY `id_modelo_dato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `necesidades`
--
ALTER TABLE `necesidades`
  MODIFY `id_necesidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de la tabla `premisas`
--
ALTER TABLE `premisas`
  MODIFY `id_premisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `prioridades`
--
ALTER TABLE `prioridades`
  MODIFY `id_prioridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `procesamientos`
--
ALTER TABLE `procesamientos`
  MODIFY `id_procesamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `reglas_transporte`
--
ALTER TABLE `reglas_transporte`
  MODIFY `id_regla_transporte` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `sentidos`
--
ALTER TABLE `sentidos`
  MODIFY `id_sentido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `sistemas`
--
ALTER TABLE `sistemas`
  MODIFY `id_sistema` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tipos_necesidad`
--
ALTER TABLE `tipos_necesidad`
  MODIFY `id_tipo_necesidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipos_servicios`
--
ALTER TABLE `tipos_servicios`
  MODIFY `id_tipo_servicio` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `verticales`
--
ALTER TABLE `verticales`
  MODIFY `id_vertical` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
