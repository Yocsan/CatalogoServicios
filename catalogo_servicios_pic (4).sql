-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2017 a las 21:51:15
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
(1, '23', 'CSIOA.SIBP0000.CSIORM01.INTERLAN', 1, 'N/A', '', '333', 4, 1, 0),
(2, '34', 'Internet.Lantotal.CSIOAM31_ddmmyyy.txt', 1, 'N/A', 'N/A', '100', 4, 1, 0),
(3, '39', 'ITFMDGPBP_OND_ITFMDDFB_Cdd_aaaamm_hhmmss_Z1.txt.jrn', 1, 'Variable', '', '365', 1, 2, 0),
(4, '48', '', 1, 'Variable', 'N/A', '367', 1, 2, 0),
(5, '55', 'DM631CrearCasoBuzonAGL.', 1, 'N/A', 'N/A', '144', 1, 1, 0),
(6, '50', 'SP_ActDatosInternet', 1, 'N/A', 'N/A', '144', 1, 1, 0),
(7, '', '', 1, '', '', '', 1, 1, 0),
(8, '', '', 1, '', '', '', 1, 1, 0),
(9, '', '', 1, '', '', '', 1, 1, 0),
(10, '', '', 1, '', '', '', 1, 1, 0);

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
(1, 3, 'http:/wsactualizacion_inf_empleados_IE_RMCA.cantv.com', 3),
(2, 3, 'NO TIENE', 2),
(3, 3, 'NO TIENE', 1),
(4, 5, 'DEVINSTSQL\\DEVINSTSQL', 3),
(5, 5, 'DEVINSTSQL\\DEVINSTSQL', 2),
(6, 5, 'DEVINSTSQL\\DEVINSTSQL', 1),
(7, 6, ' http://picqa04:8814/mule/services/DM623ConsultaSegmentoDeUsuario?wsdl', 3),
(8, 6, 'http://picqa05:8814/mule/services/DM623ConsultaSegmentoDeUsuario?wsdl', 2),
(9, 6, 'http://picprod01:8801/mule/services/DM623ConsultaSegmentoDeUsuario?wsdl', 1);

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
(2, 'CRM', 'Atención al cliente', 0),
(3, 'CTC', 'Banca/Recaudación', 1),
(4, 'SACAS', '45g', 0),
(5, 'MULE 3.N', 'Versión de la mula, gestor de servicios actualizados', 1),
(6, 'RR', NULL, 0),
(7, '43545', 'ggg', 0),
(8, '45G45', 'tg', 0),
(9, 'GT', 'gestion ', 0),
(10, 'SACAS', 'gestión de averías', 0),
(11, 'SACAS', 'Gestión de averías', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estructuras_datos_f1`
--

CREATE TABLE `estructuras_datos_f1` (
  `Id_F1` int(5) NOT NULL,
  `Esquema` varchar(100) DEFAULT NULL,
  `sistemas_id_sistema` varchar(100) DEFAULT NULL,
  `Obligatoriedad` varchar(10) DEFAULT NULL,
  `Campo` varchar(100) DEFAULT NULL,
  `Tipo_campo` varchar(20) DEFAULT NULL,
  `Posicion` int(5) DEFAULT NULL,
  `Longitud` int(3) DEFAULT NULL,
  `Estructura` varchar(100) DEFAULT NULL,
  `Valor_ejemplo` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Sentidos_Id_sentido` int(11) NOT NULL,
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
(1, 'DM510', 'Generación de archivos de internet total', 2, 1),
(2, '22600', 'Se requiere automatizar el proceso para el envío de SMS informativo de su facturación Telco a los cl', 2, 1),
(3, 'DC500', 'Enviar Actualización Información Empleados Internos y Externos', 1, 1),
(4, 'DC400', 'Crear Caso Buzon para Portal AGL', 2, 1),
(5, 'DC21000', 'Para realizar la Creacion de Casos, la capa de integración proveerá un servicio web mediante el cual', 1, 1),
(6, 'DM623', 'Se expondrá un servicio, para el cual se cuenta con la función GETCLTCLASSNAMEBYCONTRACT que recibe ', 2, 1),
(8, 'DM6234', 'Una vez que el usuario se valide en el aplicativo de PAF este debe enviar cierta información la cual', 2, 1),
(9, 'tert', 'ertert', 1, 1),
(10, '', '', 1, 1),
(11, 'ty', 'rty', 1, 1),
(13, 'tghfghfgh', 'fghfghf', 1, 1),
(14, 'hjt', 'yut', 1, 1),
(15, 'xfg', 'dfg', 1, 1);

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
(1, 'La plataforma PIC, se encargara de garantizar la entrega y preservar la integridad de los datos, asi como de su completitud', 1, 1),
(2, 'La plataforma de integración PIC, queda exenta de responsabilidad por las fallas en el transporte de los archivos, asociados a problemas de conectividad entre los servidores involucrados en el siguiente intercambio o a falla en la correspondencia por tratarse de un servicio que entrega a cuentas de correos, por este motivo los archivos estaran comprimidos', 1, 1),
(3, 'Este intercambio no requiere de trasformacion alguna, por lo que el PIC, es ajeno al contenido en los datos de los archivos a trasportar.', 1, 1),
(4, 'Servicio PIC de correo enviando un mensaje a los dos promotores del requerimiento.', 2, 1),
(5, 'Servicio PIC para mover los archivos generados a las carpetas output/done de Core/Kenan', 2, 1),
(6, 'El alcance de este documento abarca el caso de uso “Enviar Actualización Información Empleados Internos y Externos” y las diferentes interfaces entre los sistemas RMCA y CRM para la extracción y transporte de datos referente a las Actualizaciones de la información de los empleados internos y externos.', 3, 1),
(7, 'Los archivos generados por el sistema Origen no requieren ningún tipo de transformación por parte de PIC.', 3, 1),
(8, '•	Las consultas desde el Portal a la capa de integración se realizarán mediante la utilización servicios web expuestos por la capa de integración. Las consultas desde la capa de integración a la Base de BUZON se realizarán mediante la utilización de servicios Store Procedure expuestos por Portal de AGL. ', 4, 1),
(9, 'Las consultas desde el Portal a la capa de integración se realizarán mediante la utilización servicios web expuestos por la capa de integración. Las consultas desde la capa de integración a la Base de BUZON se realizarán mediante la utilización de servicios Store Procedure expuestos por Portal de AGL. ', 5, 1),
(10, 'El alcance de este documento cubre el caso de uso “Consultar Segmento de un Usuario” el cual será de consumo público dentro de la corporación', 6, 1),
(11, 'Los métodos implementados por el servicio, descrito en este documento, son Síncronos.', 6, 1),
(12, '', 7, 1),
(13, 'ery', 8, 1),
(14, 'tu', 9, 1);

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
(1, 'generacionArchivoClientesInternetTotal', 'No se definio ningun evento a nivel funcional para este intercambio.', 'Servicio PIC que genera archivos de clientes de internet total', 'Una adaptación de consumo hacia MAINFRAME, encargada de de la busqueda del archivo en el directorio origen y su  trasporte a la capa de integración.\r\nUna adaptación de provisión para la entrega del archivo a un email\r\n', 'Este requerimiento consta de 1 servicio FTP desde MISII a el servidor de SMTP', 'Ninguna', '', 2, 1, 1, 2, 2, 3, 1, 1),
(2, 'Diseñar proceso para envió de mensajes informativo sobre la emisión de la factura.', 'No especificados', 'En la actualidad se generan archivos con información que hasta la presente habían satisfecho las necesidades de Aseguramiento de Ingresos. Actualmente la gerencia de mercados masivos esta recibiendo manualmente archivo ITFMDGPBP_OND_ITFMDDFB_Cdd_aaaamm_hhmmss_Z1.txt.jrn proveniente de la plataforma de DOC1 donde están contemplados  todos los clientes a quienes se le genera la facturación de la corporación', 'No contiene', '-	Servicio PIC SFTP que copiara el archivo DOC1 al servidor de Core/Kenan.\r\n-	Nueva interfase que tomara la información del archivo DOC1 y buscara en CRM información del cliente, específicamente el celular de contacto de la dirección primaria. Esta interfase creara mensajes para: Movilnet, MoviStar y Digitel. Los registros inválidos serán grabados en un archivo de rechazo con el mismo formato de registro que DOC1. Emitirá un reporte de balanceo de su procesamiento.\r\n', 'Ninguna', '', 1, 2, 1, 1, 3, 1, 1, 1),
(3, 'enviarArchivosActualizaciónDatosEmpleados', 'El evento de inicio del transporte es la llegada al repositorio origen del archivo en RMCA, por medio de un cron preprogramado existente en la capa de integración. Este se ejecuta diariamente, transportando los datos hasta el sistema CRM.', 'El presente documento tiene como objetivo plasmar las especificaciones técnicas de la Capa de Integración (CI) para el Caso de Uso “Enviar Actualización Información Empleados Internos y Externos” donde intervienen los sistemas RMCA y CRM para la extracción y transporte de datos necesarios en las distintas frecuencias establecidas.', 'Una adaptación de origen, encargada de efectuar la búsqueda del archivo desde el esquema RMCA. \r\nUna adaptación de destino, encargada de efectuar la entrega del archivo al esquema de CRM. \r\n', 'Desde RMCA se generarán los archivos batch con la información de: posiciones, ubicaciones, departamentos, empleados y usuarios, generando los archivos una vez al día\r\n\r\nLa capa de integración realizara la búsqueda del archivo en RMCA para proceder con el transporte del mismo hacia CRM \r\n', 'No especificada', '', 1, 3, 1, 1, 2, 1, 2, 1),
(4, 'DM632CrearCasoBuzonAGL', 'Este Caso de Uso permite que desde el Portal de AGL se cree un Caso en la base de datos de BUZON.  El mismo genera un Numero de Solicitud. ', 'El presente documento tiene como objetivo plasmar las especificaciones técnicas del PIC para los Casos de Uso involucrados en la Crear Caso Buzon para Portal AGL.\r\nEl diseño presentado a continuación fue elaborado en función a las premisas listadas a continuación.\r\n', 'No contiene', 'A través del Portal de AGL permite Crear un Caso en la base de datos de BUZON.  El mismo genera un Numero de Solicitud. ', 'No contiene', '', 1, 4, 1, 1, 2, 1, 1, 1),
(5, 'Autogestion en Linea', 'Las consultas desde el Portal a la capa de integración se realizarán mediante la utilización servicios web expuestos por la capa de integración. Las consultas desde la capa de integración a la Base de BUZON se realizarán mediante la utilización de servicios Store Procedure expuestos por Portal de AGL. ', 'Este Caso de Uso será provisto por la capa de integración a través del servicio corporativo “DM632CrearCasoBuzonAGL” permitirá la Creacion de un Caso mediante el Portal de AGL.   El servicio pertenece al componente funcional Data Maestra, el proveedor es BUZON y el cliente es el Portal de AGL.', 'Las consultas desde el Portal a la capa de integración se realizarán mediante la utilización servicios web expuestos por la capa de integración. Las consultas desde la capa de integración a la Base de BUZON se realizarán mediante la utilización de servicios Store Procedure expuestos por Portal de AGL. ', 'La capa de integración garantizará la entrega correcta de los mensajes XML desde el origen al destino. Sin embargo, la capa de integración no será responsable de la gestión de errores relativos a las consultas y envío de Informacion desde BUZON a Portal de AGL. ', 'Ninguna', '', 2, 5, 3, 2, 3, 2, 2, 1),
(6, 'DM623ConsultaSegmentoDeUsuario', 'El evento de inicio del servicio es la solicitud por parte del usuario que consume el servicio, esto es través de la cuenta contrato al cual está asociado el cliente. Y adicionalmente es un webservices que sirve para que cualquier otro cliente corporativo que lo requiera, pueda consumirlo', 'El presente documento tiene como objetivo plasmar las especificaciones técnicas para la interfaz de integración del servicio web, que permite consultar el segmento al cual pertenece el usuario de CantvNet que ingrese una cuenta al Portal de autogestión de factura.', 'Este servicio tomara los datos del identificador del cliente suministrado por el usuario que lo solicite y así utilizara la función que se requiere para consultar el segmento al cual pertenece.', 'A través del parámetro en BOSS se invocara la función enviando la cuenta contrato del cliente a fin de validar su existencia en las bases de datos de BOSS.', 'En la Matriz de Arquitectura de Sistemas Corporativos se encuentran las especificaciones técnicas de las plataformas involucradas para el presente Caso de Uso. En la misma se podrán identificar aspectos como los tipos de campos nativos, la sintaxis o nomenclaturas de campos, si maneja excepciones, o códigos de errores, entre otros.', '', 2, 8, 3, 3, 21, 3, 2, 1),
(7, '', '', '', '', '', '', '', 1, 10, 1, 1, 2, 1, 1, 0),
(8, 'ery', 'ety', 'ery', 'ety', 'ey', 'ety', '', 1, 13, 1, 1, 2, 1, 2, 1),
(9, 'jti', 'tyi', 'ti', 'tyi', 'ti', 'tyi', '', 1, 14, 1, 1, 2, 1, 1, 0);

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
(1, 1, 1, 1),
(1, 3, 2, 2),
(2, 1, 2, 4),
(2, 3, 1, 3),
(3, 1, 1, 0),
(3, 3, 2, 0),
(4, 1, 2, 6),
(4, 3, 1, 5),
(5, 1, 1, 0),
(5, 3, 2, 0),
(6, 14, 1, 0),
(6, 15, 2, 0),
(7, 1, 1, 7),
(7, 1, 2, 8),
(9, 1, 1, 9),
(9, 1, 2, 10);

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
(1, 'KENAN BP', 'Sistema de facturación - Billing process', 1),
(2, 'KENAN444', 'sistema de facturacion444', 0),
(3, 'SACAS', 'Sistema administrativo de control de averías de servicio', 1),
(4, 'SACASS', 'sistema de facturacion', 0),
(5, 'KENANN', 'facturacion', 0),
(6, 'LASSSS', 'skjafkl', 0),
(7, 'JHJKHjk', 'hjkh', 0),
(8, 'KLJLKJERT', 'kjklj', 0),
(9, 'JHJ8899', 'hj999', 0),
(10, 'ASDDF', 'sadfsd', 0),
(11, 'TTTT', 'tertert', 0),
(12, '555G', 'grg4', 0),
(13, 'DEF', 'wefwefwef', 0),
(14, 'PAF', 'Portal de autogestión de factura', 1),
(15, 'BOSS', 'Sistema de soporte de operaciones de negocios', 1),
(16, 'ASAP', 'Sistema de aprovisionamiento y ordenes de servicios', 1),
(17, 'RMCA', 'Sistema de recaudación y reclamos', 1),
(18, 'CRM', 'Gestión de relaciones con el cliente', 1);

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
(1, 'root', 'root', 'Luis', 'Mata', '1462525', '17632980', '4166338936', 1, 1),
(2, 'mvegas', '123', 'Maria Fernanda', 'Vegas', '12345', '24272522', '04123750000', 1, 1),
(3, 'lgoncalves', '123', 'Luis', 'Goncalves', '330112', '24367200', '02125007865', 1, 3),
(4, 'kbrito', '123', 'Keyla', 'Brito', '23254', '24255597', '02125004355', 1, 2),
(5, 'Jmontilla', '123456', 'Juan ', 'Montilla', '454445', '7090876', '02126543245', 1, 2),
(6, 'Agonzales', '123456', 'Albert', 'Gonzales', '09090', '16562390', '02125009870', 1, 3);

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
(3, 'FT', 'Facturacion', 1),
(16, 'GT', 'tgtg4g', 0),
(17, 'GI', 'Gestión de incidencias', 1),
(18, 'PD', 'Productividad', 1),
(19, 'PG', 'Pagos', 1),
(20, 'RA', 'Reclamos y ajustes', 1),
(21, 'DM', 'Data maestra', 1);

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
  MODIFY `id_conf_ftp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `conf_web`
--
ALTER TABLE `conf_web`
  MODIFY `id_conf_web` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `esquemas`
--
ALTER TABLE `esquemas`
  MODIFY `id_esquema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  MODIFY `id_necesidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `premisas`
--
ALTER TABLE `premisas`
  MODIFY `id_premisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `sistemas`
--
ALTER TABLE `sistemas`
  MODIFY `id_sistema` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `verticales`
--
ALTER TABLE `verticales`
  MODIFY `id_vertical` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
