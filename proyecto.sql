-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2019 a las 06:36:45
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Registro` int(10) UNSIGNED NOT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Registro`, `Correo`, `Password`) VALUES
(1, 'mariana914ram@gmail.com', '$2y$10$Knium9HBKYpYXBNq7oRe0.kVEPCNBBLE/HRogHVFsrQbqmxXfoZTm'),
(2, 'administrador@gmail.com', '$2y$10$Wg9r3syN51uZaMFcQpjBXe94rrgzO55Gy.KpkDK8T3Ph06he5wNP2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `Registro` int(11) NOT NULL,
  `Consultorio` int(10) UNSIGNED NOT NULL,
  `promedio` decimal(8,2) NOT NULL,
  `C_limpieza` decimal(8,2) NOT NULL,
  `C_puntualidad` decimal(8,2) NOT NULL,
  `C_trato` decimal(8,2) NOT NULL,
  `C_precio` decimal(8,2) NOT NULL,
  `mes` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CantidadPersonas` int(11) NOT NULL,
  `num_mes` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `Registro` bigint(20) UNSIGNED NOT NULL,
  `DoctorConsultorio` bigint(20) UNSIGNED NOT NULL,
  `Usuario` int(10) UNSIGNED DEFAULT NULL,
  `Horarios` bigint(20) UNSIGNED NOT NULL,
  `Fecha` date NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Concepto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Asistir` tinyint(1) NOT NULL,
  `Google` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosconsultorios`
--

CREATE TABLE `comentariosconsultorios` (
  `Registro` bigint(20) UNSIGNED NOT NULL,
  `Consultorio` int(10) UNSIGNED DEFAULT NULL,
  `Usuario` int(10) UNSIGNED DEFAULT NULL,
  `Comentario` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `Hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosprincipal`
--

CREATE TABLE `comentariosprincipal` (
  `Registro` bigint(20) UNSIGNED NOT NULL,
  `Usuario` int(10) UNSIGNED NOT NULL,
  `Comentario` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `Hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `comentariosprincipales`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `comentariosprincipales` (
`Registro` bigint(20) unsigned
,`Comentario` varchar(191)
,`Hora` datetime
,`Correo` varchar(50)
,`Nombre` varchar(50)
,`Apellidos` varchar(60)
,`Imagen` varchar(256)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorios`
--

CREATE TABLE `consultorios` (
  `Registro` int(10) UNSIGNED NOT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(10) UNSIGNED NOT NULL,
  `Municipio` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Password` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `Ubicacion` text COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Puntos` decimal(8,2) NOT NULL,
  `C_precio` decimal(8,2) NOT NULL,
  `C_limpieza` decimal(8,2) NOT NULL,
  `C_puntualidad` decimal(8,2) NOT NULL,
  `C_trato` decimal(8,2) NOT NULL,
  `CorreoRecuperacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `mes` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CantidadPersonas` int(11) NOT NULL,
  `Aviso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consultorios`
--

INSERT INTO `consultorios` (`Registro`, `Correo`, `Estado`, `Municipio`, `Nombre`, `Telefono`, `Password`, `Ubicacion`, `Descripcion`, `Puntos`, `C_precio`, `C_limpieza`, `C_puntualidad`, `C_trato`, `CorreoRecuperacion`, `Imagen`, `mes`, `CantidadPersonas`, `Aviso`) VALUES
(29, 'consultorio1@gmail.com', 9, 403, 'Consultorio 1', 1234567890, '$2y$10$tE2M0jln5uYGqfY1fw9steAVAHCKyymexpH.acIYgoDewgeHNx1Iq', 'Intersección de López Mateos con Mariano Otero #3314', 'El mejor consultorio', '10.00', '10.00', '10.00', '10.00', '10.00', 'consultorio1r@gmail.com', '1564192662rocas.jpeg', 'julio 2019', 10, 0),
(30, 'consultorio.ejemplo.8@gmail.com', 14, 1, 'Consultorio 8', 1234567890, '$2y$10$3zPGGU1BNwzj.tTn3W.o0uE9u.tt44XHixD6faGV/AWHvzWShy.M.', 'En algún lugar', 'Un buen consultorio', '10.00', '10.00', '10.00', '10.00', '10.00', 'consultorio8r@gmail.com', '1564192831agua.jpg', 'julio 2019', 10, 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consultorios_especialidades`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consultorios_especialidades` (
`Especialidad_Nom` varchar(40)
,`Especialidad` int(10) unsigned
,`Doctor` int(10) unsigned
,`Consultorio` int(10) unsigned
,`Nombre` varchar(30)
,`Correo` varchar(50)
,`Telefono` bigint(20)
,`Ubicacion` text
,`Imagen` varchar(256)
,`C_precio` decimal(8,2)
,`C_limpieza` decimal(8,2)
,`C_puntualidad` decimal(8,2)
,`C_trato` decimal(8,2)
,`Puntos` decimal(8,2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `Registro` int(10) UNSIGNED NOT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Experiencia` tinyint(4) NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Sexo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `CorreoRecuperacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `CorreoAsistente` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`Registro`, `Correo`, `Nombre`, `Apellidos`, `Experiencia`, `Telefono`, `Sexo`, `Password`, `CorreoRecuperacion`, `FechaNacimiento`, `CorreoAsistente`, `Imagen`) VALUES
(31, 'paciente.generico.02@gmail.com', 'Doctor', 'Holitas', 3, 1234567890, 'm', '$2y$10$u3VKsDn05w3kPqt/DhF72.glb75Q3u/2eyCpxCw.RlYNWuXv.97ii', 'paciente.generico.02.recuperacion@gmail.com', '2019-07-02', 'paciente.generico.03@gmail.com', 'hombre.jpg'),
(32, 'paciente.generico.02@gmail.com', 'Doctor', 'Holitas', 3, 1234567890, 'm', '$2y$10$u3VKsDn05w3kPqt/DhF72.glb75Q3u/2eyCpxCw.RlYNWuXv.97ii', 'paciente.generico.02.recuperacion@gmail.com', '2019-07-02', 'paciente.generico.03@gmail.com', 'hombre.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor_consultorio`
--

CREATE TABLE `doctor_consultorio` (
  `Registro` bigint(20) UNSIGNED NOT NULL,
  `Consultorio` int(10) UNSIGNED NOT NULL,
  `Doctor` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `doctor_consultorio`
--

INSERT INTO `doctor_consultorio` (`Registro`, `Consultorio`, `Doctor`) VALUES
(25, 29, 31),
(26, 30, 32);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `doctor_especialidad`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `doctor_especialidad` (
`Nombre` varchar(40)
,`Registro` int(10) unsigned
,`Correo` varchar(50)
,`Doctor` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `elegirconsultorio`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `elegirconsultorio` (
`id_doctor` int(10) unsigned
,`Correo` varchar(50)
,`id_consultorio` int(10) unsigned
,`Telefono` bigint(20)
,`Imagen` varchar(256)
,`Ubicacion` text
,`Nombre` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `Registro` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Revision` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`Registro`, `Nombre`, `Revision`) VALUES
(1, 'Neurocirugía', 0),
(2, 'Ginecología', 0),
(3, 'Terapia Ocupacional', 0),
(4, 'Traumatología', 0),
(5, 'Cirugía general', 0),
(6, 'Psiquiatría', 0),
(7, 'Medicina Familiar', 0),
(8, 'Neurología', 0),
(9, 'Pediatría', 0),
(10, 'Cirugía Cardiovascular', 0),
(11, 'Pantología', 0),
(12, 'Urología', 0),
(13, 'Psicología', 0),
(14, 'Cardiología', 0),
(15, 'Radiología', 0),
(16, 'Medicina interna', 0),
(17, 'Rehabilitación', 0),
(18, 'Otorrinolaringología', 0),
(19, 'Gastroenterología', 0),
(20, 'Medicina Deportiva', 0),
(21, 'Medicina Prehospitalaria', 0),
(22, 'Sexología', 0),
(23, 'Medicina Forense', 0),
(24, 'Farmacología Clínica', 0),
(25, 'Medicina del Trabajo', 0),
(26, 'Medicina Psicosomática', 0),
(27, 'Ortopedia', 0),
(28, 'Odontología', 0),
(29, 'Oncología', 0),
(30, 'Podología', 0),
(31, 'Anestesiología', 0),
(32, 'Cirugía Plástica', 0),
(33, 'Genética', 0),
(34, 'Neumología', 0),
(35, 'Dermatología', 0),
(36, 'Obstetricia', 0),
(37, 'Psicosexología', 0),
(38, 'Nefrología', 0),
(39, 'Estomatología', 0),
(40, 'Cirugía Oral', 0),
(41, 'Oftalmología', 0),
(42, 'Neonatología', 0),
(43, 'Infectología', 0),
(44, 'Endocrinología', 0),
(45, 'Inmunología', 0),
(46, 'Angiología', 1),
(47, 'Alergología', 0),
(48, 'Dietética', 1),
(49, 'Hematología', 0),
(50, 'Embriología', 0),
(51, 'Neurofisiología', 0),
(52, 'Reumatología', 0),
(53, 'Toxicología', 0),
(54, 'Laringología', 0),
(55, 'Otología', 0),
(56, 'Hepatología', 0),
(57, 'Nutriología', 0),
(58, 'Coloproctologia', 0),
(59, 'Geriatría', 0),
(60, 'Kinesiología', 0),
(61, 'Epidemiología', 0),
(62, 'Rinología', 0),
(63, 'Análisis Clínicos', 0),
(64, 'Cirugía Bariátrica', 0),
(65, 'Biomecánica', 0),
(66, 'Microbiología', 0),
(67, 'Patológica', 0),
(68, 'Semiología', 0),
(69, 'Proctología', 0),
(70, 'Glaucomatología', 0),
(71, 'Broncología', 0),
(72, 'Odontología', 0),
(73, 'Cirugía Torácica', 0),
(74, 'Mastología', 0),
(75, 'Implantología', 0),
(76, 'Medicina intensiva', 0),
(77, 'Parasitología', 0),
(78, 'Andrología', 0),
(79, 'Flebología', 0),
(80, 'Optometría', 0),
(81, 'Linfología', 0),
(82, 'Uroginecología', 0),
(83, 'Fisioterapia', 0),
(84, 'Hebiatría', 0),
(85, 'Tricología', 0),
(86, 'Fitoterapia', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Registro` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Registro`, `Nombre`) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Chiapas'),
(6, 'Chihuahua'),
(7, 'Ciudad de México'),
(8, 'Coahuila de Zaragoza'),
(9, 'Colima'),
(10, 'Durango'),
(11, 'Guanajuato'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jalisco'),
(15, 'México'),
(16, 'Michoacán de Ocampo'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo León'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Querétaro'),
(23, 'Quintana Roo'),
(24, 'San Luis Potosí'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz'),
(31, 'Yucatán'),
(32, 'Zacatecas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `Registro` bigint(20) UNSIGNED NOT NULL,
  `Especialidad` int(10) UNSIGNED NOT NULL,
  `Doctor` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudios`
--

INSERT INTO `estudios` (`Registro`, `Especialidad`, `Doctor`) VALUES
(1, 46, 31),
(2, 48, 31),
(3, 48, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `Registro` bigint(20) UNSIGNED NOT NULL,
  `DoctorConsultorio` bigint(20) UNSIGNED NOT NULL,
  `Hora_inicio` time NOT NULL,
  `Hora_termino` time NOT NULL,
  `Dia` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`Registro`, `DoctorConsultorio`, `Hora_inicio`, `Hora_termino`, `Dia`) VALUES
(58, 25, '09:00:00', '10:00:00', 'L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `Registro` bigint(20) UNSIGNED NOT NULL,
  `Consultorio` int(10) UNSIGNED NOT NULL,
  `Imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_07_000002_create_Doctores_table', 1),
(4, '2019_04_07_000003_create_Especialidad_table', 1),
(5, '2019_04_07_000004_create_Administrador_table', 1),
(6, '2019_04_07_000005_create_Usuarios_table', 1),
(7, '2019_04_07_000006_create_Estado_table', 1),
(8, '2019_04_07_000007_create_Notificaciones_table', 1),
(9, '2019_04_07_000008_create_ComentariosPrincipal_table', 1),
(10, '2019_04_07_000009_create_Sugerencias_table', 1),
(11, '2019_04_07_000010_create_Municipio_table', 1),
(12, '2019_04_07_000011_create_Estudios_table', 1),
(13, '2019_04_07_000012_create_Consultorios_table', 1),
(14, '2019_04_07_000013_create_Slide_table', 1),
(15, '2019_04_07_000014_create_Doctor_Consultorio_table', 1),
(16, '2019_04_07_000015_create_Imagen_table', 1),
(17, '2019_04_07_000016_create_ComentariosConsultorios_table', 1),
(18, '2019_04_07_000017_create_Horario_table', 1),
(19, '2019_04_07_000018_create_Precios_table', 1),
(20, '2019_04_07_000019_create_FechasFestivas_table', 1),
(21, '2019_04_07_000020_create_Citas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `Registro` int(10) UNSIGNED NOT NULL,
  `Estado` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Numero` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`Registro`, `Estado`, `Nombre`, `Numero`) VALUES
(1, 14, 'Acatic', 1),
(2, 14, 'Acatlán de Juárez', 2),
(3, 14, 'Ahuahulco de Mercado', 3),
(4, 14, 'Amacueca', 4),
(5, 14, 'Amatitán', 5),
(6, 14, 'Ameca', 6),
(7, 14, 'San Juanito de Escobedo', 7),
(8, 14, 'Arandas', 8),
(9, 14, 'El Arenal', 9),
(10, 14, 'Atemajac de Brizuela', 10),
(11, 14, 'Atengo', 11),
(12, 14, 'Atenguillo', 12),
(13, 14, 'Atotonilco el Alto', 13),
(14, 14, 'Atoyac', 14),
(15, 14, 'Autlán de Navarro', 15),
(16, 14, 'Ayotlán', 16),
(17, 14, 'Ayutla', 17),
(18, 14, 'La Barca', 18),
(19, 14, 'Bolaños', 19),
(20, 14, 'Cabo Corrientes', 20),
(21, 14, 'Casimiro Castillo', 21),
(22, 14, 'Cihuatlán', 22),
(23, 14, 'Zapotlán el Grande', 23),
(24, 14, 'Cocula', 24),
(25, 14, 'Colotlán', 25),
(26, 14, 'Concepción de buenos aires', 26),
(27, 14, 'Cuautitlán de García Barragán', 27),
(28, 14, 'Cuautla', 28),
(29, 14, 'Cuquío', 29),
(30, 14, 'Chapala', 30),
(31, 14, 'Chimalitán', 31),
(32, 14, 'Chiquilistán', 32),
(33, 14, 'Degollado', 33),
(34, 14, 'Ejutla', 34),
(35, 14, 'Encarnación de Díaz', 35),
(36, 14, 'Etzatlán', 36),
(37, 14, 'El Grullo', 37),
(38, 14, 'Guachinango', 38),
(39, 14, 'Guadalajara', 39),
(40, 14, 'Hostotipaquillo', 40),
(41, 14, 'Huejucar', 41),
(42, 14, 'Huejuquilla el Alto', 42),
(43, 14, 'La Huerta', 43),
(44, 14, 'Ixtlahuacán de los Membrillos', 44),
(45, 14, 'Ixtlahuacán del Río', 45),
(46, 14, 'Jalostitlán', 46),
(47, 14, 'Jamay', 47),
(48, 14, 'Jesus Maria', 48),
(49, 14, 'Jilotlán de los Dolores', 49),
(50, 14, 'Jocotepec', 50),
(51, 14, 'Juanacatlán', 51),
(52, 14, 'Juchitlán', 52),
(53, 14, 'Lagos de Moreno', 53),
(54, 14, 'El Limón', 54),
(55, 14, 'Madgdalena', 55),
(56, 14, 'Santa Maria del Oro', 56),
(57, 14, 'La Manzanilla de la Paz', 57),
(58, 14, 'Mascota', 58),
(59, 14, 'Mazamitla', 59),
(60, 14, 'Mexticacán', 60),
(61, 14, 'Mezquitic', 61),
(62, 14, 'Mixtlán', 62),
(63, 14, 'Ocotlán', 63),
(64, 14, 'Ojuelos de Jalisco', 64),
(65, 14, 'Pihuamo', 65),
(66, 14, 'Poncitlán', 66),
(67, 14, 'Puerto Vallarta', 67),
(68, 14, 'Villa Purificación', 68),
(69, 14, 'Quitupan', 69),
(70, 14, 'El Salto', 70),
(71, 14, 'San Cristóbal de la Barranca', 71),
(72, 14, 'San Diego de Alejandría', 72),
(73, 14, 'San Juan De Los Lagos', 73),
(74, 14, 'San Julián', 74),
(75, 14, 'San Marcos', 75),
(76, 14, 'San Martin', 76),
(77, 14, 'San Martin Hidalgo', 77),
(78, 14, 'San Miguel el Alto', 78),
(79, 14, 'Gomez Farias', 79),
(80, 14, 'San Sebastian del Oeste', 80),
(81, 14, 'Santa Maria de los Angeles', 81),
(82, 14, 'Sayula', 82),
(83, 14, 'Tala', 83),
(84, 14, 'Talpa de Ayende', 84),
(85, 14, 'Tamazula de Gordiano', 85),
(86, 14, 'Tapalpa', 86),
(87, 14, 'Tecalitlan', 87),
(88, 14, 'Techaluta de Montenegro', 88),
(89, 14, 'Tecolotlán', 89),
(90, 14, 'Tenamaxtlán', 90),
(91, 14, 'Teocaltiche', 91),
(92, 14, 'Teocuitatlán de Corona', 92),
(93, 14, 'Tepatitlán de Morelos', 93),
(94, 14, 'Tequila', 94),
(95, 14, 'Teuchitlán', 95),
(96, 14, 'Tizapán el Alto', 96),
(97, 14, 'Tlajomulco de Zúñiga', 97),
(98, 14, 'Tlaquepaque', 98),
(99, 14, 'Tolimán', 99),
(100, 14, 'Tomatlán', 100),
(101, 14, 'Tonalá', 101),
(102, 14, 'Tonaya', 102),
(103, 14, 'Tonila', 103),
(104, 14, 'Totatiche', 104),
(105, 14, 'Tototlán', 105),
(106, 14, 'Tuxcacuesco', 106),
(107, 14, 'Tuxcueca', 107),
(108, 14, 'Tuxpan', 108),
(109, 14, 'Unión de San Antonio', 109),
(110, 14, 'Unión de Tula', 110),
(111, 14, 'Valle de Guadalupe', 111),
(112, 14, 'Valle de Juárez', 112),
(113, 14, 'San Gabriel', 113),
(114, 14, 'Villa Corona', 114),
(115, 14, 'Villa Guerrero', 115),
(116, 14, 'Villa Hidalgo', 116),
(117, 14, 'Cañadas de Obregón', 117),
(118, 14, 'Yahualica de González Gallo', 118),
(119, 14, 'Zacoalco de Torres', 119),
(120, 14, 'Zapopan', 120),
(121, 14, 'Zapotiltic', 121),
(122, 14, 'Zapotitlán de Vadillo', 122),
(123, 14, 'Zapotlán del Rey', 123),
(124, 14, 'Zapotlanejo', 124),
(125, 14, 'San Ignacio Cerro Gordo', 125),
(126, 1, 'Aguascalientes', 1),
(127, 1, 'Asientos', 2),
(128, 1, 'Calvillo', 3),
(129, 1, 'Cosío', 4),
(130, 1, 'Jesús María', 5),
(131, 1, 'Pabellón de Arteaga', 6),
(132, 1, 'Rincón de Romos', 7),
(133, 1, 'San José de Gracia', 8),
(134, 1, 'Tepezalá', 9),
(135, 1, 'El Llano', 10),
(136, 1, 'San Francisco de los Romo', 11),
(137, 2, 'Ensenada', 1),
(138, 2, 'Mexicali', 2),
(139, 2, 'Tecate', 3),
(140, 2, 'Tijuana', 4),
(141, 2, 'Playas de Rosarito', 5),
(142, 3, 'Comondú', 1),
(143, 3, 'Mulegé', 2),
(144, 3, 'La Paz', 3),
(145, 3, 'Los Cabos', 8),
(146, 3, 'Loreto', 9),
(147, 4, 'Calkiní', 1),
(148, 4, 'Campeche', 2),
(149, 4, 'Carmen', 3),
(150, 4, 'Champotón', 4),
(151, 4, 'Hecelchakán', 5),
(152, 4, 'Hopelchén', 6),
(153, 4, 'Palizada', 7),
(154, 4, 'Tenabo', 8),
(155, 4, 'Escárcega', 9),
(156, 4, 'Calakmul', 10),
(157, 4, 'Candelaria', 11),
(158, 5, 'Acacoyagua', 1),
(159, 5, 'Acala', 2),
(160, 5, 'Acapetahua', 3),
(161, 5, 'Altamirano', 4),
(162, 5, 'Amatán', 5),
(163, 5, 'Amatenango de la Frontera', 6),
(164, 5, 'Amatenango del Valle', 7),
(165, 5, 'Ángel Albino Corzo', 8),
(166, 5, 'Arriaga', 9),
(167, 5, 'Bejucal de Ocampo', 10),
(168, 5, 'Bella Vista', 11),
(169, 5, 'Berriozábal', 12),
(170, 5, 'Bochil', 13),
(171, 5, 'El Bosque', 14),
(172, 5, 'Cacahoatán', 15),
(173, 5, 'Catazajá', 16),
(174, 5, 'Cintalapa', 17),
(175, 5, 'Coapilla', 18),
(176, 5, 'Comitán de Domínguez', 19),
(177, 5, 'La Concordia', 20),
(178, 5, 'Copainalá', 21),
(179, 5, 'Chalchihuitán', 22),
(180, 5, 'Chamula', 23),
(181, 5, 'Chanal', 24),
(182, 5, 'Chapultenango', 25),
(183, 5, 'Chenalhó', 26),
(184, 5, 'Chiapa de Corzo', 27),
(185, 5, 'Chiapilla', 28),
(186, 5, 'Chicoasén', 29),
(187, 5, 'Chicomuselo', 30),
(188, 5, 'Chillón', 31),
(189, 5, 'Escuintla', 32),
(190, 5, 'Francisco León', 33),
(191, 5, 'Frontera Comalapa', 34),
(192, 5, 'Frontera Hidalgo', 35),
(193, 5, 'La Grandeza', 36),
(194, 5, 'Huehuetán', 37),
(195, 5, 'Huixtán', 38),
(196, 5, 'Huitiupán', 39),
(197, 5, 'Huixtla', 40),
(198, 5, 'La Independencia', 41),
(199, 5, 'Ixhuatán', 42),
(200, 5, 'Ixtacomitán', 43),
(201, 5, 'Ixtapa', 44),
(202, 5, 'Ixtapangajoya', 45),
(203, 5, 'Jiquipilas', 46),
(204, 5, 'Jitotol', 47),
(205, 5, 'Juárez', 48),
(206, 5, 'Larráinzar', 49),
(207, 5, 'La Libertad', 50),
(208, 5, 'Mapastepec', 51),
(209, 5, 'La Margaritas', 52),
(210, 5, 'Mazapa de Madero', 53),
(211, 5, 'Mazatlán', 54),
(212, 5, 'Metapa', 55),
(213, 5, 'Mitontic', 56),
(214, 5, 'Motozintla', 57),
(215, 5, 'Nicolás Ruíz', 58),
(216, 5, 'Ocosingo', 59),
(217, 5, 'Ocotepec', 60),
(218, 5, 'Ocozocoautla de Espinosa', 61),
(219, 5, 'Ostuacán', 62),
(220, 5, 'Osumacinta', 63),
(221, 5, 'Oxchuc', 64),
(222, 5, 'Palenque', 65),
(223, 5, 'Pantelhó', 66),
(224, 5, 'Pantepec', 67),
(225, 5, 'Pichucalco', 68),
(226, 5, 'Pijijiapan', 69),
(227, 5, 'El Porvenir', 70),
(228, 5, 'Villa Comaltitlán', 71),
(229, 5, 'Pueblo Nuevo Solistahuacán', 72),
(230, 5, 'Rayón', 73),
(231, 5, 'Reforma', 74),
(232, 5, 'Las Rosas', 75),
(233, 5, 'Sabanilla', 76),
(234, 5, 'Salto de Agua', 77),
(235, 5, 'San Cristóbal de las Casas', 78),
(236, 5, 'San Fernando', 79),
(237, 5, 'Siltepec', 80),
(238, 5, 'Simojovel', 81),
(239, 5, 'Sitalá', 82),
(240, 5, 'Socoltenango', 83),
(241, 5, 'Solosuchiapa', 84),
(242, 5, 'Soyaló', 85),
(243, 5, 'Suchiapa', 86),
(244, 5, 'Suchiate', 87),
(245, 5, 'Sunuapa', 88),
(246, 5, 'Tapachula', 89),
(247, 5, 'Tapalapa', 90),
(248, 5, 'Tapilula', 91),
(249, 5, 'Tecpatán', 92),
(250, 5, 'Tenejapa', 93),
(251, 5, 'Teopisca', 94),
(252, 5, 'Tila', 96),
(253, 5, 'Tonalá', 97),
(254, 5, 'Totolapa', 98),
(255, 5, 'La Trinitaria', 99),
(256, 5, 'Tumbalá', 100),
(257, 5, 'Tuxtla Gutiérrez', 101),
(258, 5, 'Tuxtla Chico', 102),
(259, 5, 'Tuzantán', 103),
(260, 5, 'Tzimol', 104),
(261, 5, 'Unión Juárez', 105),
(262, 5, 'Venustiano Carranza', 106),
(263, 5, 'Villa Corzo', 107),
(264, 5, 'Villaflores', 108),
(265, 5, 'Yajalón', 109),
(266, 5, 'San Lucas', 110),
(267, 5, 'Zinacantlán', 111),
(268, 5, 'San Juan Cancuc', 112),
(269, 5, 'Aldama', 113),
(270, 5, 'Benemérito de las Américas', 114),
(271, 5, 'Maravilla Tenejapa', 115),
(272, 5, 'Marqués de Comillas', 116),
(273, 5, 'Montecristo de Guerrero', 117),
(274, 5, 'San Andrés Duraznal', 118),
(275, 5, 'Santiago el Pinar', 119),
(276, 5, 'El Parral', 120),
(277, 5, 'Emiliano Zapata', 121),
(278, 5, 'Mezcalapa', 122),
(279, 5, 'Belisario Dominguez', 123),
(280, 5, 'Capitán Luis Ángel Vidal', 124),
(281, 5, 'Rincón Chamula San Pedro', 125),
(282, 6, 'Ahumada', 1),
(283, 6, 'Aldama', 2),
(284, 6, 'Allende', 3),
(285, 6, 'Aquiles Serdán', 4),
(286, 6, 'Ascensión', 5),
(287, 6, 'Bachíniva', 6),
(288, 6, 'Balleza', 7),
(289, 6, 'Batopilas de Manuel Gómez Morín', 8),
(290, 6, 'Bocoyna', 9),
(291, 6, 'Buenaventura', 10),
(292, 6, 'Camargo', 11),
(293, 6, 'Carichí', 12),
(294, 6, 'Casas Grandes', 13),
(295, 6, 'Coronado', 14),
(296, 6, 'Coyame del Sotol', 15),
(297, 6, 'La Cruz', 16),
(298, 6, 'Cuauhtémoc', 17),
(299, 6, 'Cusihuiriachi', 18),
(300, 6, 'Chihuahua', 19),
(301, 6, 'Chínipas', 20),
(302, 6, 'Delicias', 21),
(303, 6, 'Dr. Belisario Domínguez', 22),
(304, 6, 'Galeana', 23),
(305, 6, 'Santa Isabel', 24),
(306, 6, 'Gómez Farías', 25),
(307, 6, 'Gran Morelos', 26),
(308, 6, 'Guachochi', 27),
(309, 6, 'Guadalupe', 28),
(310, 6, 'Guadalupe y Calvo', 29),
(311, 6, 'Guazapares', 30),
(312, 6, 'Guerrero', 31),
(313, 6, 'Hidalgo del Parral', 32),
(314, 6, 'Huejotitán', 33),
(315, 6, 'Ignacio Zaragoza', 34),
(316, 6, 'Janos', 35),
(317, 6, 'Jiménez', 36),
(318, 6, 'Juárez', 37),
(319, 6, 'Julimes', 38),
(320, 6, 'López', 39),
(321, 6, 'Madera', 40),
(322, 6, 'Maguarichi', 41),
(323, 6, 'Manuel Benavides', 42),
(324, 6, 'Matachí', 43),
(325, 6, 'Matamoros', 44),
(326, 6, 'Meoqui', 45),
(327, 6, 'Morelos', 46),
(328, 6, 'Moris', 47),
(329, 6, 'Namiquipa', 48),
(330, 6, 'Nonoava', 49),
(331, 6, 'Nuevo Casas Grandes', 50),
(332, 6, 'Ocampo', 51),
(333, 6, 'Ojinaga', 52),
(334, 6, 'Práxedis G. Guerrero', 53),
(335, 6, 'Riva Palacio', 54),
(336, 6, 'Rosales', 55),
(337, 6, 'Rosario', 56),
(338, 6, 'San Francisco de Borja', 57),
(339, 6, 'San Francisco de Conchos', 58),
(340, 6, 'San Francisco del Oro', 59),
(341, 6, 'Santa Bárbara', 60),
(342, 6, 'Satevó', 61),
(343, 6, 'Saucillo', 62),
(344, 6, 'Temósachic', 63),
(345, 6, 'El Tule', 64),
(346, 6, 'Urique', 65),
(347, 6, 'Uruachi', 66),
(348, 6, 'Valle de Zaragoza', 67),
(349, 7, 'Álvaro Obregón', 1),
(350, 7, 'Azcapotzalco', 2),
(351, 7, 'Benito Juárez', 3),
(352, 7, 'Coyoacán', 4),
(353, 7, 'Cuajimalpa de Morelos', 5),
(354, 7, 'Cuauhtémoc', 6),
(355, 7, 'Gustavo A. Madero', 7),
(356, 7, 'Iztacalco', 8),
(357, 7, 'Iztapalapa', 9),
(358, 7, 'Magdalena Contreras', 10),
(359, 7, 'Miguel Hidalgo', 11),
(360, 7, 'Milpa Alta', 12),
(361, 7, 'Tláhuac', 13),
(362, 7, 'Tlalpan', 14),
(363, 7, 'Venustiano Carranza', 15),
(364, 7, 'Xochimilco', 16),
(365, 8, 'Abasolo', 1),
(366, 8, 'Acuña', 2),
(367, 8, 'Allende', 3),
(368, 8, 'Arteaga', 4),
(369, 8, 'Candela', 5),
(370, 8, 'Castaños', 6),
(371, 8, 'Cuatro Ciénegas', 7),
(372, 8, 'Escobedo', 8),
(373, 8, 'Francisco I. Madero', 9),
(374, 8, 'Frontera', 10),
(375, 8, 'General Cepeda', 11),
(376, 8, 'Guerrero', 12),
(377, 8, 'Hidalgo', 13),
(378, 8, 'Jiménez', 14),
(379, 8, 'Juárez', 15),
(380, 8, 'Lamadrid', 16),
(381, 8, 'Matamoros', 17),
(382, 8, 'Monclova', 18),
(383, 8, 'Morelos', 19),
(384, 8, 'Múzquiz', 20),
(385, 8, 'Nadadores', 21),
(386, 8, 'Nava', 22),
(387, 8, 'Ocampo', 23),
(388, 8, 'Parras', 24),
(389, 8, 'Piedras Negras', 25),
(390, 8, 'Progreso', 26),
(391, 8, 'Ramos Arizpe', 27),
(392, 8, 'Sabinas', 28),
(393, 8, 'Sacramento', 29),
(394, 8, 'Saltillo', 30),
(395, 8, 'San Buenaventura', 31),
(396, 8, 'San Juan de Sabinas', 32),
(397, 8, 'San Pedro', 33),
(398, 8, 'Sierra Mojada', 34),
(399, 8, 'Torreón', 35),
(400, 8, 'Viesca', 36),
(401, 8, 'Villa Unión', 37),
(402, 8, 'Zaragoza', 38),
(403, 9, 'Armería', 1),
(404, 9, 'Colima', 2),
(405, 9, 'Comala', 3),
(406, 9, 'Coquimatlán', 4),
(407, 9, 'Cuauhtémoc', 5),
(408, 9, 'Ixtlahuacán', 6),
(409, 9, 'Manzanillo', 7),
(410, 9, 'Minatitlán', 8),
(411, 9, 'Tecomán', 9),
(412, 9, 'Villa de Álvarez', 10),
(413, 10, 'Canatlán', 1),
(414, 10, 'Canelas', 2),
(415, 10, 'Coneto de Comonfort', 3),
(416, 10, 'Cuencamé', 4),
(417, 10, 'Durango', 5),
(418, 10, 'General Simón Bolívar', 6),
(419, 10, 'Gómez Palacio', 7),
(420, 10, 'Guadalupe Victoria', 8),
(421, 10, 'Guanaceví', 9),
(422, 10, 'Hidalgo', 10),
(423, 10, 'Indé', 11),
(424, 10, 'Lerdo', 12),
(425, 10, 'Mapimí', 13),
(426, 10, 'Mezquital', 14),
(427, 10, 'Nazas', 15),
(428, 10, 'Nombre de Dios', 16),
(429, 10, 'Ocampo', 17),
(430, 10, 'El Oro', 18),
(431, 10, 'Otáez', 19),
(432, 10, 'Pánuco de Coronado', 20),
(433, 10, 'Peñón Blanco', 21),
(434, 10, 'Poanas', 22),
(435, 10, 'Pueblo Nuevo', 23),
(436, 10, 'Rodeo', 24),
(437, 10, 'San Bernardo', 25),
(438, 10, 'San Dimas', 26),
(439, 10, 'San Juan de Guadalupe', 27),
(440, 10, 'San Juan del Río', 28),
(441, 10, 'San Luis del Cordero', 29),
(442, 10, 'San Pedro del Gallo', 30),
(443, 10, 'Santa Clara', 31),
(444, 10, 'Santiago Papasquiaro', 32),
(445, 10, 'Súchil', 33),
(446, 10, 'Tamazula', 34),
(447, 10, 'Tepehuanes', 35),
(448, 10, 'Tlahualilo', 36),
(449, 10, 'Topia', 37),
(450, 10, 'Vicente Guerrero', 38),
(451, 10, 'Nuevo Ideal', 39),
(452, 11, 'Abasolo', 1),
(453, 11, 'Acámbaro', 2),
(454, 11, 'San Miguel de Allende', 3),
(455, 11, 'Apaseo el Alto', 4),
(456, 11, 'Apaseo el Grande', 5),
(457, 11, 'Atarjea', 6),
(458, 11, 'Celaya', 7),
(459, 11, 'Manuel Doblado', 8),
(460, 11, 'Comonfort', 9),
(461, 11, 'Coroneo', 10),
(462, 11, 'Cortazar', 11),
(463, 11, 'Cuerámaro', 12),
(464, 11, 'Doctor Mora', 13),
(465, 11, 'Dolores Hidalgo Cuna de la Independencia Nacional', 14),
(466, 11, 'Guanajuato', 15),
(467, 11, 'Huanímaro', 16),
(468, 11, 'Irapuato', 17),
(469, 11, 'Jaral del Progreso', 18),
(470, 11, 'Jerécuaro', 19),
(471, 11, 'León', 20),
(472, 11, 'Moroleón', 21),
(473, 11, 'Ocampo', 22),
(474, 11, 'Pénjamo', 23),
(475, 11, 'Pueblo Nuevo', 24),
(476, 11, 'Purísima del Rincón', 25),
(477, 11, 'Romita', 26),
(478, 11, 'Salamanca', 27),
(479, 11, 'Salvatierra', 28),
(480, 11, 'San Diego de la Unión', 29),
(481, 11, 'San Felipe', 30),
(482, 11, 'San Francisco del Rincón', 31),
(483, 11, 'San José Iturbide', 32),
(484, 11, 'San Luis de la Paz', 33),
(485, 11, 'Santa Catarina', 34),
(486, 11, 'Santa Cruz de Juventino Rosas', 35),
(487, 11, 'Santiago Maravatío', 36),
(488, 11, 'Silao de la Victoria', 37),
(489, 11, 'Tarandacuao', 38),
(490, 11, 'Tarimoro', 39),
(491, 11, 'Tierra Blanca', 40),
(492, 11, 'Uriangato', 41),
(493, 11, 'Valle de Santiago', 42),
(494, 11, 'Victoria', 43),
(495, 11, 'Villagrán', 44),
(496, 11, 'Xichú', 45),
(497, 11, 'Yuriria', 46),
(498, 12, 'Acapulco de Juárez', 1),
(499, 12, 'Ahuacuotzingo', 2),
(500, 12, 'Ajuchitlán del Progreso', 3),
(501, 12, 'Alcozauca de Guerrero', 4),
(502, 12, 'Alpoyeca', 5),
(503, 12, 'Apaxtla', 6),
(504, 12, 'Arcelia', 7),
(505, 12, 'Atenango del Río', 8),
(506, 12, 'Atlamajalcingo del Monte', 9),
(507, 12, 'Atlixtac', 10),
(508, 12, 'Atoyac de Álvarez', 11),
(509, 12, 'Ayutla de los Libres', 12),
(510, 12, 'Azoyú', 13),
(511, 12, 'Benito Juárez', 14),
(512, 12, 'Buenavista de Cuéllar', 15),
(513, 12, 'Coahuayutla de José María Izazaga', 16),
(514, 12, 'Cocula', 17),
(515, 12, 'Copala', 18),
(516, 12, 'Copalillo', 19),
(517, 12, 'Copanatoyac', 20),
(518, 12, 'Coyuca de Benítez', 21),
(519, 12, 'Coyuca de Catalán', 22),
(520, 12, 'Cuajinicuilapa', 23),
(521, 12, 'Cualác', 24),
(522, 12, 'Cuautepec', 25),
(523, 12, 'Cuetzala del Progreso', 26),
(524, 12, 'Cutzamala de Pinzón', 27),
(525, 12, 'Chilapa de Álvarez', 28),
(526, 12, 'Chilpancingo de los Bravo', 29),
(527, 12, 'Florencio Villarreal', 30),
(528, 12, 'General Canuto A. Neri', 31),
(529, 12, 'General Heliodoro Castillo', 32),
(530, 12, 'Huamuxtitlán', 33),
(531, 12, 'Huitzuco de los Figueroa', 34),
(532, 12, 'Iguala de la Independencia', 35),
(533, 12, 'Igualapa', 36),
(534, 12, 'Ixcateopan de Cuauhtémoc', 37),
(535, 12, 'Zihuatanejo de Azueta', 38),
(536, 12, 'Juan R. Escudero', 39),
(537, 12, 'Leonardo Bravo', 40),
(538, 12, 'Malinaltepec', 41),
(539, 12, 'Mártir de Cuilapan', 42),
(540, 12, 'Metlatónoc', 43),
(541, 12, 'Mochitlán', 44),
(542, 12, 'Olinalá', 45),
(543, 12, 'Ometepec', 46),
(544, 12, 'Pedro Ascencio Alquisiras', 47),
(545, 12, 'Petatlán', 48),
(546, 12, 'Pilcaya', 49),
(547, 12, 'Pungarabato', 50),
(548, 12, 'Quechultenango', 51),
(549, 12, 'San Luis Acatlán', 52),
(550, 12, 'San Marcos', 53),
(551, 12, 'San Miguel Totolapan', 54),
(552, 12, 'Taxco de Alarcón', 55),
(553, 12, 'Tecoanapa', 56),
(554, 12, 'Técpan de Galeana', 57),
(555, 12, 'Teloloapan', 58),
(556, 12, 'Tepecoacuilco de Trujano', 59),
(557, 12, 'Tetipac', 60),
(558, 12, 'Tixtla de Guerrero', 61),
(559, 12, 'Tlacoachistlahuaca', 62),
(560, 12, 'Tlacoapa', 63),
(561, 12, 'Tlalchapa', 64),
(562, 12, 'Tlalixtaquilla de Maldonado', 65),
(563, 12, 'Tlapa de Comonfort', 66),
(564, 12, 'Tlapehuala', 67),
(565, 12, 'La Unión de Isidoro Montes de Oca', 68),
(566, 12, 'Xalpatláhuac', 69),
(567, 12, 'Xochihuehuetlán', 70),
(568, 12, 'Xochistlahuaca', 71),
(569, 12, 'Zapotitlán Tablas', 72),
(570, 12, 'Zirándaro', 73),
(571, 12, 'Zitlala', 74),
(572, 12, 'Eduardo Neri', 75),
(573, 12, 'Acatepec', 76),
(574, 12, 'Marquelia', 77),
(575, 12, 'Cochoapa el Grande', 78),
(576, 12, 'José Joaquín de Herrera', 79),
(577, 12, 'Juchitán', 80),
(578, 12, 'Iliatenco', 81),
(579, 13, 'Acatlán', 1),
(580, 13, 'Acaxochitlán', 2),
(581, 13, 'Actopan', 3),
(582, 13, 'Agua Blanca de Iturbide', 4),
(583, 13, 'Ajacuba', 5),
(584, 13, 'Alfajayucan', 6),
(585, 13, 'Almoloya', 7),
(586, 13, 'Apan', 8),
(587, 13, 'El Arenal', 9),
(588, 13, 'Atitalaquia', 10),
(589, 13, 'Atlapexco', 11),
(590, 13, 'Atotonilco el Grande', 12),
(591, 13, 'Atotonilco de Tula', 13),
(592, 13, 'Calnali', 14),
(593, 13, 'Cardonal', 15),
(594, 13, 'Cuautepec de Hinojosa', 16),
(595, 13, 'Chapantongo', 17),
(596, 13, 'Chapulhuacán', 18),
(597, 13, 'Chilcuautla', 19),
(598, 13, 'Eloxochitlán', 20),
(599, 13, 'Emiliano Zapata', 21),
(600, 13, 'Epazoyucan', 22),
(601, 13, 'Franciso I. Madero', 23),
(602, 13, 'Huasca de Ocampo', 24),
(603, 13, 'Huautla', 25),
(604, 13, 'Huazalingo', 26),
(605, 13, 'Huehuetla', 27),
(606, 13, 'Huejutla de Reyes', 28),
(607, 13, 'Huichapan', 29),
(608, 13, 'Ixmiquilpan', 30),
(609, 13, 'Jacala de Ledezma', 31),
(610, 13, 'Jaltocán', 32),
(611, 13, 'Juárez Hidalgo', 33),
(612, 13, 'Lolotla', 34),
(613, 13, 'Metepec', 35),
(614, 13, 'San Agustín Metzquititlán', 36),
(615, 13, 'Metztitlán', 37),
(616, 13, 'Mineral del Chico', 38),
(617, 13, 'Mineral del Monte', 39),
(618, 13, 'La Misión', 40),
(619, 13, 'Mixquiahuala de Juárez', 41),
(620, 13, 'Molango de Escamilla', 42),
(621, 13, 'Nicolás Flores', 43),
(622, 13, 'Nopala de Villagrán', 44),
(623, 13, 'Omitlán de Juárez', 45),
(624, 13, 'San Felipe Orizatlán', 46),
(625, 13, 'Pacula', 47),
(626, 13, 'Pachuca de Soto', 48),
(627, 13, 'Pisaflores', 49),
(628, 13, 'Progreso de Obregón', 50),
(629, 13, 'Mineral de la Reforma', 51),
(630, 13, 'San Agustín Tlaxiaca', 52),
(631, 13, 'San Bartolo Tutotepec', 53),
(632, 13, 'San Salvador', 54),
(633, 13, 'Santiago de Anaya', 55),
(634, 13, 'Santiago Tulantepec de Lugo Guerrero', 56),
(635, 13, 'Singuilucan', 57),
(636, 13, 'Tasquillo', 58),
(637, 13, 'Tecozautla', 59),
(638, 13, 'Tenango de Doria', 60),
(639, 13, 'Tepeapulco', 61),
(640, 13, 'Tepehuacán de Guerrero', 62),
(641, 13, 'Tepeji del Río de Ocampo', 63),
(642, 13, 'Tepetitlán', 64),
(643, 13, 'Tetepango', 65),
(644, 13, 'Villa de Tezontepec', 66),
(645, 13, 'Tezontepec de Aldama', 67),
(646, 13, 'Tianguistengo', 68),
(647, 13, 'Tizayuca', 69),
(648, 13, 'Tlahuelilpan', 70),
(649, 13, 'Tlahuiltepa', 71),
(650, 13, 'Tlanalapa', 72),
(651, 13, 'Tlanchinol', 73),
(652, 13, 'Tlaxcoapan', 74),
(653, 13, 'Tolcayuca', 75),
(654, 13, 'Tula de Allende', 76),
(655, 13, 'Tulancingo de Bravo', 77),
(656, 13, 'Xochiatipan', 78),
(657, 13, 'Xochicoatlán', 79),
(658, 13, 'Yahualica', 80),
(659, 13, 'Zacualtipán de Ángeles', 81),
(660, 13, 'Zapotlán de Juárez', 82),
(661, 13, 'Zempoala', 83),
(662, 13, 'Zimapán', 84),
(664, 15, 'Acolman', 2),
(665, 15, 'Aculco', 3),
(666, 15, 'Almoloya de Alquisiras', 4),
(667, 15, 'Almoloya de Juárez', 5),
(668, 15, 'Almoloya del Río', 6),
(669, 15, 'Amanalco', 7),
(670, 15, 'Amatepec', 8),
(671, 15, 'Amecameca', 9),
(672, 15, 'Apaxco', 10),
(673, 15, 'Atenco', 11),
(674, 15, 'Atizapán', 12),
(675, 15, 'Atizapán de Zaragoza', 13),
(676, 15, 'Atlacomulco', 14),
(677, 15, 'Atlautla', 15),
(678, 15, 'Axapusco', 16),
(679, 15, 'Ayapango', 17),
(680, 15, 'Calimaya', 18),
(681, 15, 'Capulhuac', 19),
(682, 15, 'Coacalco de Berriozábal', 20),
(683, 15, 'Coatepec Harinas', 21),
(684, 15, 'Cocotitlán', 22),
(685, 15, 'Coyotepec', 23),
(686, 15, 'Cuautitlán', 24),
(687, 15, 'Chalco', 25),
(688, 15, 'Chapa de Mota', 26),
(689, 15, 'Chapultepec', 27),
(690, 15, 'Chiautla', 28),
(691, 15, 'Chicoloapan', 29),
(692, 15, 'Chiconcuac', 30),
(693, 15, 'Chimalhuacán', 31),
(694, 15, 'Donato Guerra', 32),
(695, 15, 'Ecatepec de Morelos', 33),
(696, 15, 'Ecatzingo', 34),
(697, 15, 'Huehuetoca', 35),
(698, 15, 'Hueypoxtla', 36),
(699, 15, 'Huixquilucan', 37),
(700, 15, 'Isidro Fabela', 38),
(701, 15, 'Ixtapaluca', 39),
(702, 15, 'Ixtapan de la Sal', 40),
(703, 15, 'Ixtapan del Oro', 41),
(704, 15, 'Ixtlahuaca', 42),
(705, 15, 'Xalatlaco', 43),
(706, 15, 'Jaltenco', 44),
(707, 15, 'Jilotepec', 45),
(708, 15, 'Jilotzingo', 46),
(709, 15, 'Jiquipilco', 47),
(710, 15, 'Jocotitlán', 48),
(711, 15, 'Joquicingo', 49),
(712, 15, 'Juchitepec', 50),
(713, 15, 'Lerma', 51),
(714, 15, 'Malinalco', 52),
(715, 15, 'Melchor Ocampo', 53),
(716, 15, 'Metepec', 54),
(717, 15, 'Mexicaltzingo', 55),
(718, 15, 'Morelos', 56),
(719, 15, 'Naucalpan de Juárez', 57),
(720, 15, 'Nezahualcóyotl', 58),
(721, 15, 'Nextlalpan', 59),
(722, 15, 'Nicolás Romero', 60),
(723, 15, 'Nopaltepec', 61),
(724, 15, 'Ocoyoacac', 62),
(725, 15, 'Ocuilan', 63),
(726, 15, 'El Oro', 64),
(727, 15, 'Otumba', 65),
(728, 15, 'Otzoloapan', 66),
(729, 15, 'Otzolotepec', 67),
(730, 15, 'Ozumba', 68),
(731, 15, 'Papalotla', 69),
(732, 15, 'La Paz', 70),
(733, 15, 'Polotitlán', 71),
(734, 15, 'Rayón', 72),
(735, 15, 'San Antonio la Isla', 73),
(736, 15, 'San Felipe del Progreso', 74),
(737, 15, 'San Martín de las Pirámides', 75),
(738, 15, 'San Mateo Atenco', 76),
(739, 15, 'San Simón de Guerrero', 77),
(740, 15, 'Santo Tomás', 78),
(741, 15, 'Soyaniquilpan de Juárez', 79),
(742, 15, 'Sultepec', 80),
(743, 15, 'Tecámac', 81),
(744, 15, 'Tejupilco', 82),
(745, 15, 'Temamatla', 83),
(746, 15, 'Temascalapa', 84),
(747, 15, 'Temascalcingo', 85),
(748, 15, 'Temascaltepec', 86),
(749, 15, 'Temoaya', 87),
(750, 15, 'Tenancingo', 88),
(751, 15, 'Tenango del Aire', 89),
(752, 15, 'Tenango del Valle', 90),
(753, 15, 'Teoloyucan', 91),
(754, 15, 'Teotihuacán', 92),
(755, 15, 'Tepetlaoxtoc', 93),
(756, 15, 'Tepetlixpa', 94),
(757, 15, 'Tepotzotlán', 95),
(758, 15, 'Tequixquiac', 96),
(759, 15, 'Texcaltitlán', 97),
(760, 15, 'Texcalyacac', 98),
(761, 15, 'Texcoco', 99),
(762, 15, 'Tezoyuca', 100),
(763, 15, 'Tianguistenco', 101),
(764, 15, 'Timilpan', 102),
(765, 15, 'Tlalmanalco', 103),
(766, 15, 'Tlalnepantla de Baz', 104),
(767, 15, 'Tlatlaya', 105),
(768, 15, 'Toluca', 106),
(769, 15, 'Tonatico', 107),
(770, 15, 'Tultepec', 108),
(771, 15, 'Tultitlán', 109),
(772, 15, 'Valle de Bravo', 110),
(773, 15, 'Villa de Allende', 111),
(774, 15, 'Villa del Carbón', 112),
(775, 15, 'Villa Guerrero', 113),
(776, 15, 'Villa Victoria', 114),
(777, 15, 'Xonacatlán', 115),
(778, 15, 'Zacazonapan', 116),
(779, 15, 'Zacualpan', 117),
(780, 15, 'Zinacantepec', 118),
(781, 15, 'Zumpahuacán', 119),
(782, 15, 'Zumpango', 120),
(783, 15, 'Cuautitlán Izcalli', 121),
(784, 15, 'Valle de Chalco Solidaridad', 122),
(785, 15, 'Luvianos', 123),
(786, 15, 'San José del Rincón', 124),
(787, 15, 'Tonanitla', 125),
(788, 16, 'Acuitzio', 1),
(789, 16, 'Aguililla', 2),
(790, 16, 'Álvaro Obregón', 3),
(791, 16, 'Angamacutiro', 4),
(792, 16, 'Angangueo', 5),
(793, 16, 'Apatzingán', 6),
(794, 16, 'Aporo', 7),
(795, 16, 'Aquila', 8),
(796, 16, 'Ario', 9),
(797, 16, 'Arteaga', 10),
(798, 16, 'Briseñas', 11),
(799, 16, 'Buenavista', 12),
(800, 16, 'Carácuaro', 13),
(801, 16, 'Coahuayana', 14),
(802, 16, 'Coalcomán de Vázquez Pallares', 15),
(803, 16, 'Coeneo', 16),
(804, 16, 'Contepec', 17),
(805, 16, 'Copándaro', 18),
(806, 16, 'Cotija', 19),
(807, 16, 'Cuitzeo', 20),
(808, 16, 'Charapan', 21),
(809, 16, 'Charo', 22),
(810, 16, 'Chavinda', 23),
(811, 16, 'Cherán', 24),
(812, 16, 'Chilchota', 25),
(813, 16, 'Chinicuila', 26),
(814, 16, 'Chucándiro', 27),
(815, 16, 'Churintzio', 28),
(816, 16, 'Churumuco', 29),
(817, 16, 'Ecuandureo', 30),
(818, 16, 'Epitacio Huerta', 31),
(819, 16, 'Erongarícuaro', 32),
(820, 16, 'Gabriel Zamora', 33),
(821, 16, 'Hidalgo', 34),
(822, 16, 'La Huacana', 35),
(823, 16, 'Huandacareo', 36),
(824, 16, 'Huaniqueo', 37),
(825, 16, 'Huetamo', 38),
(826, 16, 'Huiramba', 39),
(827, 16, 'Indaparapeo', 40),
(828, 16, 'Irimbo', 41),
(829, 16, 'Ixtlán', 42),
(830, 16, 'Jacona', 43),
(831, 16, 'Jiménez', 44),
(832, 16, 'Jiquilpan', 45),
(833, 16, 'Juárez', 46),
(834, 16, 'Jungapeo', 47),
(835, 16, 'Lagunillas', 48),
(836, 16, 'Madero', 49),
(837, 16, 'Maravatío', 50),
(838, 16, 'Marcos Castellanos', 51),
(839, 16, 'Lázaro Cárdenas', 52),
(840, 16, 'Morelia', 53),
(841, 16, 'Morelos', 54),
(842, 16, 'Múgica', 55),
(843, 16, 'Nahuatzen', 56),
(844, 16, 'Nocupétaro', 57),
(845, 16, 'Nuevo Parangaricutiro', 58),
(846, 16, 'Nuevo Urecho', 59),
(847, 16, 'Numarán', 60),
(848, 16, 'Ocampo', 61),
(849, 16, 'Pajacuarán', 62),
(850, 16, 'Panindícuaro', 63),
(851, 16, 'Parácuaro', 64),
(852, 16, 'Paracho', 65),
(853, 16, 'Pátzcuaro', 66),
(854, 16, 'Penjamillo', 67),
(855, 16, 'Peribán', 68),
(856, 16, 'La Piedad', 69),
(857, 16, 'Purépero', 70),
(858, 16, 'Puruándiro', 71),
(859, 16, 'Queréndaro', 72),
(860, 16, 'Quiroga', 73),
(861, 16, 'Cojumatlán de Régules', 74),
(862, 16, 'Los Reyes', 75),
(863, 16, 'Sahuayo', 76),
(864, 16, 'San Lucas', 77),
(865, 16, 'Santa Ana Maya', 78),
(866, 16, 'Salvador Escalante', 79),
(867, 16, 'Senguio', 80),
(868, 16, 'Susupuato', 81),
(869, 16, 'Tacámbaro', 82),
(870, 16, 'Tancítaro', 83),
(871, 16, 'Tangamandapio', 84),
(872, 16, 'Tangancícuaro', 85),
(873, 16, 'Tanhuato', 86),
(874, 16, 'Taretan', 87),
(875, 16, 'Tarímbaro', 88),
(876, 16, 'Tepalcatepec', 89),
(877, 16, 'Tingambato', 90),
(878, 16, 'Tingüindín', 91),
(879, 16, 'Tiquicheo de Nicolás Romero', 92),
(880, 16, 'Tlalpujahua', 93),
(881, 16, 'Tlazazalca', 94),
(882, 16, 'Tocumbo', 95),
(883, 16, 'Tumbiscatío', 96),
(884, 16, 'Turicato', 97),
(885, 16, 'Tuxpan', 98),
(886, 16, 'Tuzantla', 99),
(887, 16, 'Tzintzuntzan', 100),
(888, 16, 'Tzitzio', 101),
(889, 16, 'Uruapan', 102),
(890, 16, 'Venustiano Carranza', 103),
(891, 16, 'Villamar', 104),
(892, 16, 'Vista Hermosa', 105),
(893, 16, 'Yurécuaro', 106),
(894, 16, 'Zacapu', 107),
(895, 16, 'Zamora', 108),
(896, 16, 'Zináparo', 109),
(897, 16, 'Zinapécuaro', 110),
(898, 16, 'Ziracueretiro', 111),
(899, 16, 'Zitácuaro', 112),
(900, 16, 'José Sixto Verduzco', 113),
(901, 17, 'Amacuzac', 1),
(902, 17, 'Atlatlahucan', 2),
(903, 17, 'Axochiapan', 3),
(904, 17, 'Ayala', 4),
(905, 17, 'Coatlán del Río (municipio)', 5),
(906, 17, 'Cuautla (municipio)', 6),
(907, 17, 'Cuernavaca', 7),
(908, 17, 'Emiliano Zapata', 8),
(909, 17, 'Huitzilac', 9),
(910, 17, 'Jantetelco', 10),
(911, 17, 'Jiutepec', 11),
(912, 17, 'Jojutla', 12),
(913, 17, 'Jonacatepec', 13),
(914, 17, 'Mazatepec', 14),
(915, 17, 'Miacatlán', 15),
(916, 17, 'Ocuituco', 16),
(917, 17, 'Puente de Ixtla', 17),
(918, 17, 'Temixco', 18),
(919, 17, 'Tepalcingo', 19),
(920, 17, 'Tepoztlán', 20),
(921, 17, 'Tetecala', 21),
(922, 17, 'Tetela del Volcán', 22),
(923, 17, 'Tlalnepantla', 23),
(924, 17, 'Tlaltizapán', 24),
(925, 17, 'Tlaquiltenango', 25),
(926, 17, 'Tlayacapan', 26),
(927, 17, 'Totolapan', 27),
(928, 17, 'Xochitepec', 28),
(929, 17, 'Yautepec', 29),
(930, 17, 'Yecapixtla', 30),
(931, 17, 'Zacatepec', 31),
(932, 17, 'Zacualpan', 32),
(933, 17, 'Temoac', 33),
(934, 17, 'Coatetelco', 34),
(935, 17, 'Tetelcingo', 35),
(936, 17, 'Hueyapan', 36),
(937, 17, 'Xoxocotla', 37),
(938, 18, 'Acaponeta', 1),
(939, 18, 'Ahuacatlán', 2),
(940, 18, 'Amatlán de Cañas', 3),
(941, 18, 'Compostela', 4),
(942, 18, 'Huajicori', 5),
(943, 18, 'Ixtlán del Río', 6),
(944, 18, 'Jala', 7),
(945, 18, 'Xalisco', 8),
(946, 18, 'El Nayar', 9),
(947, 18, 'Rosamorada', 10),
(948, 18, 'Ruiz', 11),
(949, 18, 'San Blas', 12),
(950, 18, 'San Pedro Lagunillas', 13),
(951, 18, 'Santa María del Oro', 14),
(952, 18, 'Santiago Ixcuintla', 15),
(953, 18, 'Tecuala', 16),
(954, 18, 'Tepic', 17),
(955, 18, 'Tuxpan', 18),
(956, 18, 'La Yesca', 19),
(957, 18, 'Bahía de Banderas', 20),
(958, 19, 'Abasolo', 1),
(959, 19, 'Agualeguas', 2),
(960, 19, 'Los Aldamas', 3),
(961, 19, 'Allende', 4),
(962, 19, 'Anáhuac', 5),
(963, 19, 'Apodaca', 6),
(964, 19, 'Aramberri', 7),
(965, 19, 'Bustamante', 8),
(966, 19, 'Cadereyta Jiménez', 9),
(967, 19, 'Carmen', 10),
(968, 19, 'Cerralvo', 11),
(969, 19, 'Ciénega de Flores', 12),
(970, 19, 'China', 13),
(971, 19, 'Doctor Arroyo', 14),
(972, 19, 'Doctor Coss', 15),
(973, 19, 'Doctor González', 16),
(974, 19, 'Galeana', 17),
(975, 19, 'García', 18),
(976, 19, 'San Pedro Garza García', 19),
(977, 19, 'General Bravo', 20),
(978, 19, 'General Escobedo', 21),
(979, 19, 'General Terán', 22),
(980, 19, 'General Treviño', 23),
(981, 19, 'General Zaragoza', 24),
(982, 19, 'General Zuazua', 25),
(983, 19, 'Guadalupe', 26),
(984, 19, 'Los Herreras', 27),
(985, 19, 'Higueras', 28),
(986, 19, 'Hualahuises', 29),
(987, 19, 'Iturbide', 30),
(988, 19, 'Juárez', 31),
(989, 19, 'Lampazos de Naranjo', 32),
(990, 19, 'Linares', 33),
(991, 19, 'Marín', 34),
(992, 19, 'Melchor Ocampo', 35),
(993, 19, 'Mier y Noriega', 36),
(994, 19, 'Mina', 37),
(995, 19, 'Montemorelos', 38),
(996, 19, 'Monterrey ', 39),
(997, 19, 'Parás', 40),
(998, 19, 'Pesquería', 41),
(999, 19, 'Los Ramones', 42),
(1000, 19, 'Rayones', 43),
(1001, 19, 'Sabinas Hidalgo', 44),
(1002, 19, 'Salinas Victoria', 45),
(1003, 19, 'San Nicolás de los Garza', 46),
(1004, 19, 'Hidalgo', 47),
(1005, 19, 'Santa Catarina', 48),
(1006, 19, 'Santiago', 49),
(1007, 19, 'Vallecillo', 50),
(1008, 19, 'Villaldama', 51),
(1009, 20, 'Abejones', 1),
(1010, 20, 'Acatlán de Pérez Figueroa', 2),
(1011, 20, 'Asunción Cacalotepec', 3),
(1012, 20, 'Asunción Cuyotepeji', 4),
(1013, 20, 'Asunción Ixtaltepec', 5),
(1014, 20, 'Asunción Nochixtlán', 6),
(1015, 20, 'Asunción Ocotlán', 7),
(1016, 20, 'Asunción Tlacolulita', 8),
(1017, 20, 'Ayotzintepec', 9),
(1018, 20, 'El Barrio de la Soledad', 10),
(1019, 20, 'Calihualá', 11),
(1020, 20, 'Candelaria Loxicha', 12),
(1021, 20, 'Ciénega de Zimatlán', 13),
(1022, 20, 'Ciudad Ixtepec', 14),
(1023, 20, 'Coatecas Altas', 15),
(1024, 20, 'Coicoyán de las Flores', 16),
(1025, 20, 'La Compañía', 17),
(1026, 20, 'Concepción Buenavista', 18),
(1027, 20, 'Concepción Pápalo', 19),
(1028, 20, 'Constancia del Rosario', 20),
(1029, 20, 'Cosolapa', 21),
(1030, 20, 'Cosoltepec', 22),
(1031, 20, 'Cuilápam de Guerrero', 23),
(1032, 20, 'Cuyamecalco Villa de Zaragoza', 24),
(1033, 20, 'Chahuites', 25),
(1034, 20, 'Chalcatongo de Hidalgo', 26),
(1035, 20, 'Chiquihuitlán de Benito Juárez', 27),
(1036, 20, 'Heroica Ciudad de Ejutla de Crespo', 28),
(1037, 20, 'Eloxochitlán de Flores Magón', 29),
(1038, 20, 'El Espinal', 30),
(1039, 20, 'Tamazulápam del Espíritu Santo', 31),
(1040, 20, 'Fresnillo de Trujano', 32),
(1041, 20, 'Guadalupe Etla', 33),
(1042, 20, 'Guadalupe de Ramírez', 34),
(1043, 20, 'Guelatao de Juárez', 35),
(1044, 20, 'Guevea de Humboldt', 36),
(1045, 20, 'Mesones Hidalgo', 37),
(1046, 20, 'Villa Hidalgo', 38),
(1047, 20, 'Heroica Ciudad de Huajuapan de León', 39),
(1048, 20, 'Huautepec', 40),
(1049, 20, 'Huautla de Jiménez', 41),
(1050, 20, 'Ixtlán de Juárez', 42),
(1051, 20, 'Heroica Ciudad de Juchitán de Zaragoza', 43),
(1052, 20, 'Loma Bonita', 44),
(1053, 20, 'Magdalena Apasco', 45),
(1054, 20, 'Magdalena Jaltepec', 46),
(1055, 20, 'Santa Magdalena Jicotlán', 47),
(1056, 20, 'Magdalena Mixtepec', 48),
(1057, 20, 'Magdalena Ocotlán', 49),
(1058, 20, 'Magdalena Peñasco', 50),
(1059, 20, 'Magdalena Teitipac', 51),
(1060, 20, 'Magdalena Tequisistlán', 52),
(1061, 20, 'Magdalena Tlacotepec', 53),
(1062, 20, 'Magdalena Zahuatlán', 54),
(1063, 20, 'Mariscala de Juárez', 55),
(1064, 20, 'Mártires de Tacubaya', 56),
(1065, 20, 'Matías Romero Avendaño', 57),
(1066, 20, 'Mazatlán Villa de Flores', 58),
(1067, 20, 'Miahuatlán de Porfirio Díaz', 59),
(1068, 20, 'Mixistlán de la Reforma', 60),
(1069, 20, 'Monjas', 61),
(1070, 20, 'Natividad', 62),
(1071, 20, 'Nazareno Etla', 63),
(1072, 20, 'Nejapa de Madero', 64),
(1073, 20, 'Ixpantepec Nieves', 65),
(1074, 20, 'Santiago Niltepec', 66),
(1075, 20, 'Oaxaca de Juárez', 67),
(1076, 20, 'Ocotlán de Morelos', 68),
(1077, 20, 'La Pe', 69),
(1078, 20, 'Pinotepa de Don Luis', 70),
(1079, 20, 'Pluma Hidalgo', 71),
(1080, 20, 'San José del Progreso', 72),
(1081, 20, 'Putla Villa de Guerrero', 73),
(1082, 20, 'Santa Catarina Quioquitani', 74),
(1083, 20, 'Reforma de Pineda', 75),
(1084, 20, 'La Reforma', 76),
(1085, 20, 'Reyes Etla', 77),
(1086, 20, 'Rojas de Cuauhtémoc', 78),
(1087, 20, 'Salina Cruz', 79),
(1088, 20, 'San Agustín Amatengo', 80),
(1089, 20, 'San Agustín Atenango', 81),
(1090, 20, 'San Agustín Chayuco', 82),
(1091, 20, 'San Agustín de las Juntas', 83),
(1092, 20, 'San Agustín Etla', 84),
(1093, 20, 'San Agustín Loxicha', 85),
(1094, 20, 'San Agustín Tlacotepec', 86),
(1095, 20, 'San Agustín Yatareni', 87),
(1096, 20, 'San Andrés Cabecera Nueva', 88),
(1097, 20, 'San Andrés Dinicuiti', 89),
(1098, 20, 'San Andrés Huaxpaltepec', 90),
(1099, 20, 'San Andrés Huayapam', 91),
(1100, 20, 'San Andrés Ixtlahuaca', 92),
(1101, 20, 'San Andrés Lagunas', 93),
(1102, 20, 'San Andrés Nuxiño', 94),
(1103, 20, 'San Andrés Paxtlán', 95),
(1104, 20, 'San Andrés Sinaxtla', 96),
(1105, 20, 'San Andrés Solaga', 97),
(1106, 20, 'San Andrés Teotilálpam', 98),
(1107, 20, 'San Andrés Tepetlapa', 99),
(1108, 20, 'San Andrés Yaá', 100),
(1109, 20, 'San Andrés Zabache', 101),
(1110, 20, 'San Andrés Zautla', 102),
(1111, 20, 'San Antonino Castillo Velasco', 103),
(1112, 20, 'San Antonino el Alto', 104),
(1113, 20, 'San Antonino Monte Verde', 105),
(1114, 20, 'San Antonio Acutla', 106),
(1115, 20, 'San Antonio de la Cal', 107),
(1116, 20, 'San Antonio Huitepec', 108),
(1117, 20, 'San Antonio Nanahuatipam', 109),
(1118, 20, 'San Antonio Sinicahua', 110),
(1119, 20, 'San Antonio Tepetlapa', 111),
(1120, 20, 'San Baltazar Chichicapam', 112),
(1121, 20, 'San Baltazar Loxicha', 113),
(1122, 20, 'San Baltazar Yatzachi el Bajo', 114),
(1123, 20, 'San Bartolo Coyotepec', 115),
(1124, 20, 'San Bartolomé Ayautla', 116),
(1125, 20, 'San Bartolomé Loxicha', 117),
(1126, 20, 'San Bartolomé Quialana', 118),
(1127, 20, 'San Bartolomé Yucuañe', 119),
(1128, 20, 'San Bartolomé Zoogocho', 120),
(1129, 20, 'San Bartolo Soyaltepec', 121),
(1130, 20, 'San Bartolo Yautepec', 122),
(1131, 20, 'San Bernardo Mixtepec', 123),
(1132, 20, 'San Blas Atempa', 124),
(1133, 20, 'San Carlos Yautepec', 125),
(1134, 20, 'San Cristóbal Amatlán', 126),
(1135, 20, 'San Cristóbal Amoltepec', 127),
(1136, 20, 'San Cristóbal Lachirioag', 128),
(1137, 20, 'San Cristóbal Suchixtlahuaca', 129),
(1138, 20, 'San Dionisio del Mar', 130),
(1139, 20, 'San Dionisio Ocotepec', 131),
(1140, 20, 'San Dionisio Ocotlán', 132),
(1141, 20, 'San Esteban Atatlahuca', 133),
(1142, 20, 'San Felipe Jalapa de Díaz', 134),
(1143, 20, 'San Felipe Tejalapam', 135),
(1144, 20, 'San Felipe Usila', 136),
(1145, 20, 'San Francisco Cahuacúa', 137),
(1146, 20, 'San Francisco Cajonos', 138),
(1147, 20, 'San Francisco Chapulapa', 139),
(1148, 20, 'San Francisco Chindúa', 140),
(1149, 20, 'San Francisco del Mar', 141),
(1150, 20, 'San Francisco Huehuetlán', 142),
(1151, 20, 'San Francisco Ixhuatán', 143),
(1152, 20, 'San Francisco Jaltepetongo', 144),
(1153, 20, 'San Francisco Lachigoló', 145),
(1154, 20, 'San Francisco Logueche', 146),
(1155, 20, 'San Francisco Nuxaño', 147),
(1156, 20, 'San Francisco Ozolotepec', 148),
(1157, 20, 'San Francisco Sola', 149),
(1158, 20, 'San Francisco Telixtlahuaca', 150),
(1159, 20, 'San Francisco Teopan', 151),
(1160, 20, 'San Francisco Tlapancingo', 152),
(1161, 20, 'San Gabriel Mixtepec', 153),
(1162, 20, 'San Ildefonso Amatlán', 154),
(1163, 20, 'San Ildefonso Sola', 155),
(1164, 20, 'San Ildefonso Villa Alta', 156),
(1165, 20, 'San Jacinto Amilpas', 157),
(1166, 20, 'San Jacinto Tlacotepec', 158),
(1167, 20, 'San Jerónimo Coatlán', 159),
(1168, 20, 'San Jerónimo Silacayoapilla', 160),
(1169, 20, 'San Jerónimo Sosola', 161),
(1170, 20, 'San Jerónimo Taviche', 162),
(1171, 20, 'San Jerónimo Tecoatl', 163),
(1172, 20, 'San Jorge Nuchita', 164),
(1173, 20, 'San José Ayuquila', 165),
(1174, 20, 'San José Chiltepec', 166),
(1175, 20, 'San José del Peñasco', 167),
(1176, 20, 'San José Estancia Grande', 168),
(1177, 20, 'San José Independencia', 169),
(1178, 20, 'San José Lachiguirí', 170),
(1179, 20, 'San José Tenango', 171),
(1180, 20, 'San Juan Achiutla', 172),
(1181, 20, 'San Juan Atepec', 173),
(1182, 20, 'Ánimas Trujano', 174),
(1183, 20, 'San Juan Bautista Atatlahuca', 175),
(1184, 20, 'San Juan Bautista Coixtlahuaca', 176),
(1185, 20, 'San Juan Bautista Cuicatlán', 177),
(1186, 20, 'San Juan Bautista Guelache', 178),
(1187, 20, 'San Juan Bautista Jayacatlán', 179),
(1188, 20, 'San Juan Bautista Lo de Soto', 180),
(1189, 20, 'San Juan Bautista Suchitepec', 181),
(1190, 20, 'San Juan Bautista Tlacoatzintepec', 182),
(1191, 20, 'San Juan Bautista Tlachichilco', 183),
(1192, 20, 'San Juan Bautista Tuxtepec', 184),
(1193, 20, 'San Juan Cacahuatepec', 185),
(1194, 20, 'San Juan Cieneguilla', 186),
(1195, 20, 'San Juan Coatzospam', 187),
(1196, 20, 'San Juan Colorado', 188),
(1197, 20, 'San Juan Comaltepec', 189),
(1198, 20, 'San Juan Cotzocón', 190),
(1199, 20, 'San Juan Chicomezúchil', 191),
(1200, 20, 'San Juan Chilateca', 192),
(1201, 20, 'San Juan del Estado', 193),
(1202, 20, 'San Juan del Río', 194),
(1203, 20, 'San Juan Diuxi', 195),
(1204, 20, 'San Juan Evangelista Analco', 196),
(1205, 20, 'San Juan Guelavía', 197),
(1206, 20, 'San Juan Guichicovi', 198),
(1207, 20, 'San Juan Ihualtepec', 199),
(1208, 20, 'San Juan Juquila Mixes', 200),
(1209, 20, 'San Juan Juquila Vijanos', 201),
(1210, 20, 'San Juan Lachao', 202),
(1211, 20, 'San Juan Lachigalla', 203),
(1212, 20, 'San Juan Lajarcia', 204),
(1213, 20, 'San Juan Lalana', 205),
(1214, 20, 'San Juan de los Cués', 206),
(1215, 20, 'San Juan Mazatlán', 207),
(1216, 20, 'San Juan Mixtepec -Distrito 08-', 208),
(1217, 20, 'San Juan Mixtepec -Distrito 26-', 209),
(1218, 20, 'San Juan Ñumí', 210),
(1219, 20, 'San Juan Ozolotepec', 211),
(1220, 20, 'San Juan Petlapa', 212),
(1221, 20, 'San Juan Quiahije', 213),
(1222, 20, 'San Juan Quiotepec', 214),
(1223, 20, 'San Juan Sayultepec', 215),
(1224, 20, 'San Juan Tabaá', 216),
(1225, 20, 'San Juan Tamazola', 217),
(1226, 20, 'San Juan Teita', 218),
(1227, 20, 'San Juan Teitipac', 219),
(1228, 20, 'San Juan Tepeuxila', 220),
(1229, 20, 'San Juan Teposcolula', 221),
(1230, 20, 'San Juan Yaeé', 222),
(1231, 20, 'San Juan Yatzona', 223),
(1232, 20, 'San Juan Yucuita', 224),
(1233, 20, 'San Lorenzo', 225),
(1234, 20, 'San Lorenzo Albarradas', 226),
(1235, 20, 'San Lorenzo Cacaotepec', 227),
(1236, 20, 'San Lorenzo Cuaunecuiltitla', 228),
(1237, 20, 'San Lorenzo Texmelucan', 229),
(1238, 20, 'San Lorenzo Victoria', 230),
(1239, 20, 'San Lucas Camotlán', 231),
(1240, 20, 'San Lucas Ojitlán', 232),
(1241, 20, 'San Lucas Quiaviní', 233),
(1242, 20, 'San Lucas Zoquiápam', 234),
(1243, 20, 'San Luis Amatlán', 235),
(1244, 20, 'San Marcial Ozolotepec', 236),
(1245, 20, 'San Marcos Arteaga', 237),
(1246, 20, 'San Martín de los Cansecos', 238),
(1247, 20, 'San Martín Huamelúlpam', 239),
(1248, 20, 'San Martín Itunyoso', 240),
(1249, 20, 'San Martín Lachilá', 241),
(1250, 20, 'San Martín Peras', 242),
(1251, 20, 'San Martín Tilcajete', 243),
(1252, 20, 'San Martín Toxpalan', 244),
(1253, 20, 'San Martín Zacatepec', 245),
(1254, 20, 'San Mateo Cajonos', 246),
(1255, 20, 'Capulálpam de Méndez', 247),
(1256, 20, 'San Mateo del Mar', 248),
(1257, 20, 'San Mateo Yoloxochitlán', 249),
(1258, 20, 'San Mateo Etlatongo', 250),
(1259, 20, 'San Mateo Nejapam', 251),
(1260, 20, 'San Mateo Peñasco', 252),
(1261, 20, 'San Mateo Piñas', 253),
(1262, 20, 'San Mateo Río Hondo', 254),
(1263, 20, 'San Mateo Sindihui', 255),
(1264, 20, 'San Mateo Tlapiltepec', 256),
(1265, 20, 'San Melchor Betaza', 257),
(1266, 20, 'San Miguel Achiutla', 258),
(1267, 20, 'San Miguel Ahuehuetitlán', 259),
(1268, 20, 'San Miguel Aloápam', 260),
(1269, 20, 'San Miguel Amatitlán', 261),
(1270, 20, 'San Miguel Amatlán', 262),
(1271, 20, 'San Miguel Coatlán', 263),
(1272, 20, 'San Miguel Chicahua', 264),
(1273, 20, 'San Miguel Chimalapa', 265),
(1274, 20, 'San Miguel del Puerto', 266),
(1275, 20, 'San Miguel del Río', 267),
(1276, 20, 'San Miguel Ejutla', 268),
(1277, 20, 'San Miguel el Grande', 269),
(1278, 20, 'San Miguel Huautla', 270),
(1279, 20, 'San Miguel Mixtepec', 271),
(1280, 20, 'San Miguel Panixtlahuaca', 272),
(1281, 20, 'San Miguel Peras', 273),
(1282, 20, 'San Miguel Piedras', 274),
(1283, 20, 'San Miguel Quetzaltepec', 275),
(1284, 20, 'San Miguel Santa Flor', 276),
(1285, 20, 'Villa Sola de Vega', 277),
(1286, 20, 'San Miguel Soyaltepec', 278),
(1287, 20, 'San Miguel Suchixtepec', 279),
(1288, 20, 'Villa Talea de Castro', 280),
(1289, 20, 'San Miguel Tecomatlán', 281),
(1290, 20, 'San Miguel Tenango', 282),
(1291, 20, 'San Miguel Tequixtepec', 283),
(1292, 20, 'San Miguel Tilquiápam', 284),
(1293, 20, 'San Miguel Tlacamama', 285),
(1294, 20, 'San Miguel Tlacotepec', 286),
(1295, 20, 'San Miguel Tulancingo', 287),
(1296, 20, 'San Miguel Yotao', 288),
(1297, 20, 'San Nicolás', 289),
(1298, 20, 'San Nicolás Hidalgo', 290),
(1299, 20, 'San Pablo Coatlán', 291),
(1300, 20, 'San Pablo Cuatro Venados', 292),
(1301, 20, 'San Pablo Etla', 293),
(1302, 20, 'San Pablo Huitzo', 294),
(1303, 20, 'San Pablo Huixtepec', 295),
(1304, 20, 'San Pablo Macuiltianguis', 296),
(1305, 20, 'San Pablo Tijaltepec', 297),
(1306, 20, 'San Pablo Villa de Mitla', 298),
(1307, 20, 'San Pablo Yaganiza', 299),
(1308, 20, 'San Pedro Amuzgos', 300),
(1309, 20, 'San Pedro Apóstol', 301),
(1310, 20, 'San Pedro Atoyac', 302),
(1311, 20, 'San Pedro Cajonos', 303),
(1312, 20, 'San Pedro Coxcaltepec Cántaros', 304),
(1313, 20, 'San Pedro Comitancillo', 305),
(1314, 20, 'San Pedro El Alto', 306),
(1315, 20, 'San Pedro Huamelula', 307),
(1316, 20, 'San Pedro Huilotepec', 308),
(1317, 20, 'San Pedro Ixcatlán', 309),
(1318, 20, 'San Pedro Ixtlahuaca', 310),
(1319, 20, 'San Pedro Jaltepetongo', 311),
(1320, 20, 'San Pedro Jicayán', 312),
(1321, 20, 'San Pedro Jocotipac', 313),
(1322, 20, 'San Pedro Juchatengo', 314),
(1323, 20, 'San Pedro Mártir', 315),
(1324, 20, 'San Pedro Mártir Quiechapa', 316),
(1325, 20, 'San Pedro Mártir Yucuxaco', 317),
(1326, 20, 'San Pedro Mixtepec -Distrito 22-', 318),
(1327, 20, 'San Pedro Mixtepec -Distrito 26-', 319),
(1328, 20, 'San Pedro Molinos', 320),
(1329, 20, 'San Pedro Nopala', 321),
(1330, 20, 'San Pedro Ocopetatillo', 322),
(1331, 20, 'San Pedro Ocotepec', 323),
(1332, 20, 'San Pedro Pochutla', 324),
(1333, 20, 'San Pedro Quiatoni', 325),
(1334, 20, 'San Pedro Sochiapam', 326),
(1335, 20, 'San Pedro Tapanatepec', 327),
(1336, 20, 'San Pedro Taviche', 328),
(1337, 20, 'San Pedro Teozacoalco', 329),
(1338, 20, 'San Pedro Teutila', 330),
(1339, 20, 'San Pedro Tidaá', 331),
(1340, 20, 'San Pedro Topiltepec', 332),
(1341, 20, 'San Pedro Totolapa', 333),
(1342, 20, 'Villa de Tututepec de Melchor Ocampo', 334),
(1343, 20, 'San Pedro Yaneri', 335),
(1344, 20, 'San Pedro Yólox', 336),
(1345, 20, 'San Pedro y San Pablo Ayutla', 337),
(1346, 20, 'Villa de Etla', 338),
(1347, 20, 'San Pedro y San Pablo Teposcolula', 339),
(1348, 20, 'San Pedro y San Pablo Tequixtepec', 340),
(1349, 20, 'San Pedro Yucunama', 341),
(1350, 20, 'San Raymundo Jalpan', 342),
(1351, 20, 'San Sebastián Abasolo', 343),
(1352, 20, 'San Sebastián Coatlán', 344),
(1353, 20, 'San Sebastián Ixcapa', 345),
(1354, 20, 'San Sebastián Nicananduta', 346),
(1355, 20, 'San Sebastián Río Hondo', 347),
(1356, 20, 'San Sebastián Tecomaxtlahuaca', 348),
(1357, 20, 'San Sebastián Teitipac', 349),
(1358, 20, 'San Sebastián Tutla', 350),
(1359, 20, 'San Simón Almolongas', 351),
(1360, 20, 'San Simón Zahuatlán', 352),
(1361, 20, 'Santa Ana', 353),
(1362, 20, 'Santa Ana Ateixtlahuaca', 354),
(1363, 20, 'Santa Ana Cuauhtémoc', 355),
(1364, 20, 'Santa Ana del Valle', 356),
(1365, 20, 'Santa Ana Tavela', 357),
(1366, 20, 'Santa Ana Tlapacoyan', 358),
(1367, 20, 'Santa Ana Yareni', 359),
(1368, 20, 'Santa Ana Zegache', 360),
(1369, 20, 'Santa Catalina Quieri', 361),
(1370, 20, 'Santa Catarina Cuixtla', 362),
(1371, 20, 'Santa Catarina Ixtepeji', 363),
(1372, 20, 'Santa Catarina Juquila', 364),
(1373, 20, 'Santa Catarina Lachatao', 365),
(1374, 20, 'Santa Catarina Loxicha', 366),
(1375, 20, 'Santa Catarina Mechoacán', 367),
(1376, 20, 'Santa Catarina Minas', 368),
(1377, 20, 'Santa Catarina Quiané', 369),
(1378, 20, 'Santa Catarina Tayata', 370),
(1379, 20, 'Santa Catarina Ticuá', 371),
(1380, 20, 'Santa Catarina Yosonotú', 372),
(1381, 20, 'Santa Catarina Zapoquila', 373),
(1382, 20, 'Santa Cruz Acatepec', 374),
(1383, 20, 'Santa Cruz Amilpas', 375),
(1384, 20, 'Santa Cruz de Bravo', 376),
(1385, 20, 'Santa Cruz Itundujia', 377),
(1386, 20, 'Santa Cruz Mixtepec', 378),
(1387, 20, 'Santa Cruz Nundaco', 379),
(1388, 20, 'Santa Cruz Papalutla', 380),
(1389, 20, 'Santa Cruz Tacache de Mina', 381),
(1390, 20, 'Santa Cruz Tacahua', 382),
(1391, 20, 'Santa Cruz Tayata', 383),
(1392, 20, 'Santa Cruz Xitla', 384),
(1393, 20, 'Santa Cruz Xoxocotlán', 385),
(1394, 20, 'Santa Cruz Zenzontepec', 386),
(1395, 20, 'Santa Gertrudis', 387),
(1396, 20, 'Santa Inés del Monte', 388),
(1397, 20, 'Santa Inés Yatzeche', 389),
(1398, 20, 'Santa Lucía del Camino', 390),
(1399, 20, 'Santa Lucía Miahuatlán', 391),
(1400, 20, 'Santa Lucía Monteverde', 392),
(1401, 20, 'Santa Lucía Ocotlán', 393),
(1402, 20, 'Santa María Alotepec', 394),
(1403, 20, 'Santa María Apazco', 395),
(1404, 20, 'Santa María la Asunción', 396),
(1405, 20, 'Heroica Ciudad de Tlaxiaco', 397),
(1406, 20, 'Ayoquezco de Aldama', 398),
(1407, 20, 'Santa María Atzompa', 399),
(1408, 20, 'Santa María Camotlán', 400),
(1409, 20, 'Santa María Colotepec', 401),
(1410, 20, 'Santa María Cortijo', 402),
(1411, 20, 'Santa María Coyotepec', 403),
(1412, 20, 'Santa María Chachoapam', 404),
(1413, 20, 'Villa de Chilapa de Díaz', 405),
(1414, 20, 'Santa María Chilchotla', 406),
(1415, 20, 'Santa María Chimalapa', 407),
(1416, 20, 'Santa María del Rosario', 408),
(1417, 20, 'Santa María del Tule', 409),
(1418, 20, 'Santa María Ecatepec', 410),
(1419, 20, 'Santa María Guelacé', 411),
(1420, 20, 'Santa María Guienagati', 412),
(1421, 20, 'Santa María Huatulco', 413),
(1422, 20, 'Santa María Huazolotitlán', 414),
(1423, 20, 'Santa María Ipalapa', 415),
(1424, 20, 'Santa María Ixcatlán', 416),
(1425, 20, 'Santa María Jacatepec', 417),
(1426, 20, 'Santa María Jalapa del Marqués', 418),
(1427, 20, 'Santa María Jaltianguis', 419),
(1428, 20, 'Santa María Lachixío', 420),
(1429, 20, 'Santa María Mixtequilla', 421),
(1430, 20, 'Santa María Nativitas', 422),
(1431, 20, 'Santa María Nduayaco', 423),
(1432, 20, 'Santa María Ozolotepec', 424),
(1433, 20, 'Santa María Pápalo', 425),
(1434, 20, 'Santa María Peñoles', 426),
(1435, 20, 'Santa María Petapa', 427),
(1436, 20, 'Santa María Quiegolani', 428),
(1437, 20, 'Santa María Sola', 429),
(1438, 20, 'Santa María Tataltepec', 430),
(1439, 20, 'Santa María Tecomavaca', 431),
(1440, 20, 'Santa María Temaxcalapa', 432),
(1441, 20, 'Santa María Temaxcaltepec', 433),
(1442, 20, 'Santa María Teopoxco', 434),
(1443, 20, 'Santa María Tepantlali', 435),
(1444, 20, 'Santa María Texcatitlán', 436),
(1445, 20, 'Santa María Tlahuitoltepec', 437),
(1446, 20, 'Santa María Tlalixtac', 438),
(1447, 20, 'Santa María Tonameca', 439),
(1448, 20, 'Santa María Totolapilla', 440),
(1449, 20, 'Santa María Xadani', 441),
(1450, 20, 'Santa María Yalina', 442),
(1451, 20, 'Santa María Yavesía', 443),
(1452, 20, 'Santa María Yolotepec', 444),
(1453, 20, 'Santa María Yosoyúa', 445),
(1454, 20, 'Santa María Yucuhiti', 446),
(1455, 20, 'Santa María Zacatepec', 447),
(1456, 20, 'Santa María Zaniza', 448),
(1457, 20, 'Santa María Zoquitlán', 449),
(1458, 20, 'Santiago Amoltepec', 450),
(1459, 20, 'Santiago Apoala', 451),
(1460, 20, 'Santiago Apóstol', 452),
(1461, 20, 'Santiago Astata', 453),
(1462, 20, 'Santiago Atitlán', 454),
(1463, 20, 'Santiago Ayuquililla', 455),
(1464, 20, 'Santiago Cacaloxtepec', 456),
(1465, 20, 'Santiago Camotlán', 457),
(1466, 20, 'Santiago Comaltepec', 458),
(1467, 20, 'Santiago Chazumba', 459),
(1468, 20, 'Santiago Choápam', 460),
(1469, 20, 'Santiago del Río', 461),
(1470, 20, 'Santiago Huajolotitlán', 462),
(1471, 20, 'Santiago Huauclilla', 463),
(1472, 20, 'Santiago Ihuitlán Plumas', 464),
(1473, 20, 'Santiago Ixcuintepec', 465),
(1474, 20, 'Santiago Ixtayutla', 466),
(1475, 20, 'Santiago Jamiltepec', 467),
(1476, 20, 'Santiago Jocotepec', 468),
(1477, 20, 'Santiago Juxtlahuaca', 469),
(1478, 20, 'Santiago Lachiguiri', 470),
(1479, 20, 'Santiago Lalopa', 471),
(1480, 20, 'Santiago Laollaga', 472),
(1481, 20, 'Santiago Laxopa', 473),
(1482, 20, 'Santiago Llano Grande', 474),
(1483, 20, 'Santiago Matatlán', 475),
(1484, 20, 'Santiago Miltepec', 476),
(1485, 20, 'Santiago Minas', 477),
(1486, 20, 'Santiago Nacaltepec', 478),
(1487, 20, 'Santiago Nejapilla', 479),
(1488, 20, 'Santiago Nundiche', 480),
(1489, 20, 'Santiago Nuyoó', 481),
(1490, 20, 'Santiago Pinotepa Nacional', 482),
(1491, 20, 'Santiago Suchilquitongo', 483),
(1492, 20, 'Santiago Tamazola', 484),
(1493, 20, 'Santiago Tapextla', 485),
(1494, 20, 'Villa Tejúpam de la Unión', 486),
(1495, 20, 'Santiago Tenango', 487),
(1496, 20, 'Santiago Tepetlapa', 488),
(1497, 20, 'Santiago Tetepec', 489),
(1498, 20, 'Santiago Texcalcingo', 490),
(1499, 20, 'Santiago Textitlán', 491),
(1500, 20, 'Santiago Tilantongo', 492),
(1501, 20, 'Santiago Tillo', 493),
(1502, 20, 'Santiago Tlazoyaltepec', 494),
(1503, 20, 'Santiago Xanica', 495),
(1504, 20, 'Santiago Xiacuí', 496),
(1505, 20, 'Santiago Yaitepec', 497),
(1506, 20, 'Santiago Yaveo', 498),
(1507, 20, 'Santiago Yolomécatl', 499),
(1508, 20, 'Santiago Yosondúa', 500),
(1509, 20, 'Santiago Yucuyachi', 501),
(1510, 20, 'Santiago Zacatepec', 502),
(1511, 20, 'Santiago Zoochila', 503),
(1512, 20, 'Nuevo Zoquiapam', 504),
(1513, 20, 'Santo Domingo Ingenio', 505),
(1514, 20, 'Santo Domingo Albarradas', 506),
(1515, 20, 'Santo Domingo Armenta', 507),
(1516, 20, 'Santo Domingo Chihuitán', 508),
(1517, 20, 'Santo Domingo de Morelos', 509),
(1518, 20, 'Santo Domingo Ixcatlán', 510),
(1519, 20, 'Santo Domingo Nuxaá', 511),
(1520, 20, 'Santo Domingo Ozolotepec', 512),
(1521, 20, 'Santo Domingo Petapa', 513),
(1522, 20, 'Santo Domingo Roayaga', 514),
(1523, 20, 'Santo Domingo Tehuantepec', 515),
(1524, 20, 'Santo Domingo Teojomulco', 516),
(1525, 20, 'Santo Domingo Tepuxtepec', 517),
(1526, 20, 'Santo Domingo Tlatayapam', 518),
(1527, 20, 'Santo Domingo Tomaltepec', 519),
(1528, 20, 'Santo Domingo Tonalá', 520),
(1529, 20, 'Santo Domingo Tonaltepec', 521),
(1530, 20, 'Santo Domingo Xagacía', 522),
(1531, 20, 'Santo Domingo Yanhuitlán', 523),
(1532, 20, 'Santo Domingo Yodohino', 524),
(1533, 20, 'Santo Domingo Zanatepec', 525),
(1534, 20, 'Santos Reyes Nopala', 526),
(1535, 20, 'Santos Reyes Pápalo', 527),
(1536, 20, 'Santos Reyes Tepejillo', 528),
(1537, 20, 'Santos Reyes Yucuná', 529),
(1538, 20, 'Santo Tomás Jalieza', 530),
(1539, 20, 'Santo Tomás Mazaltepec', 531),
(1540, 20, 'Santo Tomás Ocotepec', 532),
(1541, 20, 'Santo Tomás Tamazulapan', 533),
(1542, 20, 'San Vicente Coatlán', 534),
(1543, 20, 'San Vicente Lachixío', 535),
(1544, 20, 'San Vicente Nuñú', 536),
(1545, 20, 'Silacayoápam', 537),
(1546, 20, 'Sitio de Xitlapehua', 538),
(1547, 20, 'Soledad Etla', 539),
(1548, 20, 'Villa de Tamazulapam del Progreso', 540),
(1549, 20, 'Tanetze de Zaragoza', 541),
(1550, 20, 'Taniche', 542),
(1551, 20, 'Tataltepec de Valdés', 543),
(1552, 20, 'Teococuilco de Marcos Pérez', 544),
(1553, 20, 'Teotitlán de Flores Magón', 545),
(1554, 20, 'Teotitlán del Valle', 546),
(1555, 20, 'Teotongo', 547),
(1556, 20, 'Tepelmeme Villa de Morelos', 548),
(1557, 20, 'Tezoatlán de Segura y Luna', 549),
(1558, 20, 'San Jerónimo Tlacochahuaya', 550),
(1559, 20, 'Tlacolula de Matamoros', 551),
(1560, 20, 'Tlacotepec Plumas', 552),
(1561, 20, 'Tlalixtac de Cabrera', 553),
(1562, 20, 'Totontepec Villa de Morelos', 554),
(1563, 20, 'Trinidad Zaachila', 555),
(1564, 20, 'La Trinidad Vista Hermosa', 556),
(1565, 20, 'Unión Hidalgo', 557),
(1566, 20, 'Valerio Trujano', 558);
INSERT INTO `municipio` (`Registro`, `Estado`, `Nombre`, `Numero`) VALUES
(1567, 20, 'San Juan Bautista Valle Nacional', 559),
(1568, 20, 'Villa Díaz Ordaz', 560),
(1569, 20, 'Yaxe', 561),
(1570, 20, 'Magdalena Yodocono de Porfirio Díaz', 562),
(1571, 20, 'Yogana', 563),
(1572, 20, 'Yutanduchi de Guerrero', 564),
(1573, 20, 'Villa de Zaachila', 565),
(1574, 20, 'San Mateo Yacutindoo', 566),
(1575, 20, 'Zapotitlán Lagunas', 567),
(1576, 20, 'Zapotitlán Palmas', 568),
(1577, 20, 'Santa Inés de Zaragoza', 569),
(1578, 20, 'Zimatlán de Álvarez', 570),
(1579, 21, 'Acajete', 1),
(1580, 21, 'Acateno', 2),
(1581, 21, 'Acatlán', 3),
(1582, 21, 'Acatzingo', 4),
(1583, 21, 'Acteopan', 5),
(1584, 21, 'Ahuacatlán', 6),
(1585, 21, 'Ahuatlán', 7),
(1586, 21, 'Ahuazotepec', 8),
(1587, 21, 'Ahuehuetitla', 9),
(1588, 21, 'Ajalpan', 10),
(1589, 21, 'Albino Zertuche', 11),
(1590, 21, 'Aljojuca', 12),
(1591, 21, 'Altepexi', 13),
(1592, 21, 'Amixtlán', 14),
(1593, 21, 'Amozoc', 15),
(1594, 21, 'Aquixtla', 16),
(1595, 21, 'Atempan', 17),
(1596, 21, 'Atexcal', 18),
(1597, 21, 'Atlixco', 19),
(1598, 21, 'Atoyatempan', 20),
(1599, 21, 'Atzala', 21),
(1600, 21, 'Atzitzihuacán', 22),
(1601, 21, 'Atzitzintla', 23),
(1602, 21, 'Axutla', 24),
(1603, 21, 'Ayotoxco de Guerrero', 25),
(1604, 21, 'Calpan', 26),
(1605, 21, 'Caltepec', 27),
(1606, 21, 'Camocuautla', 28),
(1607, 21, 'Caxhuacán', 29),
(1608, 21, 'Coatepec', 30),
(1609, 21, 'Coatzingo', 31),
(1610, 21, 'Cohetzala', 32),
(1611, 21, 'Cohuecan', 33),
(1612, 21, 'Coronango', 34),
(1613, 21, 'Coxcatlán', 35),
(1614, 21, 'Coyomeapan', 36),
(1615, 21, 'Coyotepec', 37),
(1616, 21, 'Cuapiaxtla de Madero', 38),
(1617, 21, 'Cuautempan', 39),
(1618, 21, 'Cuautinchán', 40),
(1619, 21, 'Cuautlancingo', 41),
(1620, 21, 'Cuayuca de Andrade', 42),
(1621, 21, 'Cuetzalan del Progreso', 43),
(1622, 21, 'Cuyoaco', 44),
(1623, 21, 'Chalchicomula de Sesma', 45),
(1624, 21, 'Chapulco', 46),
(1625, 21, 'Chiautla', 47),
(1626, 21, 'Chiautzingo', 48),
(1627, 21, 'Chiconcuautla', 49),
(1628, 21, 'Chichiquila', 50),
(1629, 21, 'Chietla', 51),
(1630, 21, 'Chigmecatitlán', 52),
(1631, 21, 'Chignahuapan', 53),
(1632, 21, 'Chignautla', 54),
(1633, 21, 'Chila', 55),
(1634, 21, 'Chila de la Sal', 56),
(1635, 21, 'Honey', 57),
(1636, 21, 'Chilchotla', 58),
(1637, 21, 'Chinantla', 59),
(1638, 21, 'Domingo Arenas', 60),
(1639, 21, 'Eloxochitlán', 61),
(1640, 21, 'Epatlán', 62),
(1641, 21, 'Esperanza', 63),
(1642, 21, 'Francisco Z. Mena', 64),
(1643, 21, 'General Felipe Ángeles', 65),
(1644, 21, 'Guadalupe', 66),
(1645, 21, 'Guadalupe Victoria', 67),
(1646, 21, 'Hermenegildo Galeana', 68),
(1647, 21, 'Huaquechula', 69),
(1648, 21, 'Huatlatlauca', 70),
(1649, 21, 'Huauchinango', 71),
(1650, 21, 'Huehuetla', 72),
(1651, 21, 'Huehuetlán el Chico', 73),
(1652, 21, 'Huejotzingo', 74),
(1653, 21, 'Hueyapan', 75),
(1654, 21, 'Hueytamalco', 76),
(1655, 21, 'Hueytlalpan', 77),
(1656, 21, 'Huitzilan de Serdán', 78),
(1657, 21, 'Huitziltepec', 79),
(1658, 21, 'Atlequizayan', 80),
(1659, 21, 'Ixcamilpa de Guerrero', 81),
(1660, 21, 'Ixcaquixtla', 82),
(1661, 21, 'Ixtacamaxtitlán', 83),
(1662, 21, 'Ixtepec', 84),
(1663, 21, 'Izúcar de Matamoros', 85),
(1664, 21, 'Jalpan', 86),
(1665, 21, 'Jolalpan', 87),
(1666, 21, 'Jonotla', 88),
(1667, 21, 'Jopala', 89),
(1668, 21, 'Juan C. Bonilla', 90),
(1669, 21, 'Juan Galindo', 91),
(1670, 21, 'Juan N. Méndez', 92),
(1671, 21, 'Lafragua', 93),
(1672, 21, 'Libres', 94),
(1673, 21, 'La Magdalena Tlatlauquitepec', 95),
(1674, 21, 'Mazapiltepec de Juárez', 96),
(1675, 21, 'Mixtla', 97),
(1676, 21, 'Molcaxac', 98),
(1677, 21, 'Cañada Morelos', 99),
(1678, 21, 'Naupan', 100),
(1679, 21, 'Nauzontla', 101),
(1680, 21, 'Nealtican', 102),
(1681, 21, 'Nicolás Bravo', 103),
(1682, 21, 'Nopalucan', 104),
(1683, 21, 'Ocotepec', 105),
(1684, 21, 'Ocoyucan', 106),
(1685, 21, 'Olintla', 107),
(1686, 21, 'Oriental', 108),
(1687, 21, 'Pahuatlán', 109),
(1688, 21, 'Palmar de Bravo', 110),
(1689, 21, 'Pantepec', 111),
(1690, 21, 'Petlalcingo', 112),
(1691, 21, 'Piaxtla', 113),
(1692, 21, 'Puebla', 114),
(1693, 21, 'Quecholac', 115),
(1694, 21, 'Quimixtlán', 116),
(1695, 21, 'Rafael Lara Grajales', 117),
(1696, 21, 'Los Reyes de Juárez', 118),
(1697, 21, 'San Andrés Cholula', 119),
(1698, 21, 'San Antonio Cañada', 120),
(1699, 21, 'San Diego La Mesa Tochimiltzingo', 121),
(1700, 21, 'San Felipe Teotlalcingo', 122),
(1701, 21, 'San Felipe Tepatlán', 123),
(1702, 21, 'San Gabriel Chilac', 124),
(1703, 21, 'San Gregorio Atzompa', 125),
(1704, 21, 'San Jerónimo Tecuanipan', 126),
(1705, 21, 'San Jerónimo Xayacatlán', 127),
(1706, 21, 'San José Chiapa', 128),
(1707, 21, 'San José Miahuatlán', 129),
(1708, 21, 'San Juan Atenco', 130),
(1709, 21, 'San Juan Atzompa', 131),
(1710, 21, 'San Martín Texmelucan', 132),
(1711, 21, 'San Martín Totoltepec', 133),
(1712, 21, 'San Matías Tlalancaleca', 134),
(1713, 21, 'San Miguel Ixitlán', 135),
(1714, 21, 'San Miguel Xoxtla', 136),
(1715, 21, 'San Nicolás Buenos Aires', 137),
(1716, 21, 'San Nicolás de los Ranchos', 138),
(1717, 21, 'San Pablo Anicano', 139),
(1718, 21, 'San Pedro Cholula', 140),
(1719, 21, 'San Pedro Yeloixtlahuaca', 141),
(1720, 21, 'San Salvador el Seco', 142),
(1721, 21, 'San Salvador el Verde', 143),
(1722, 21, 'San Salvador Huixcolotla', 144),
(1723, 21, 'San Sebastián Tlacotepec', 145),
(1724, 21, 'Santa Catarina Tlaltempan', 146),
(1725, 21, 'Santa Inés Ahuatempan', 147),
(1726, 21, 'Santa Isabel Cholula', 148),
(1727, 21, 'Santiago Miahuatlán', 149),
(1728, 21, 'Huehuetlán el Grande', 150),
(1729, 21, 'Santo Tomás Hueyotlipan', 151),
(1730, 21, 'Soltepec', 152),
(1731, 21, 'Tecali de Herrera', 153),
(1732, 21, 'Tecamachalco', 154),
(1733, 21, 'Tecomatlán', 155),
(1734, 21, 'Tehuacán', 156),
(1735, 21, 'Tehuitzingo', 157),
(1736, 21, 'Tenampulco', 158),
(1737, 21, 'Teopantlán', 159),
(1738, 21, 'Teotlalco', 160),
(1739, 21, 'Tepanco de López', 161),
(1740, 21, 'Tepango de Rodríguez', 162),
(1741, 21, 'Tepatlaxco de Hidalgo', 163),
(1742, 21, 'Tepeaca', 164),
(1743, 21, 'Tepemaxalco', 165),
(1744, 21, 'Tepeojuma', 166),
(1745, 21, 'Tepetzintla', 167),
(1746, 21, 'Tepexco', 168),
(1747, 21, 'Tepexi de Rodríguez', 169),
(1748, 21, 'Tepeyahualco', 170),
(1749, 21, 'Tepeyahualco de Cuauhtémoc', 171),
(1750, 21, 'Tetela de Ocampo', 172),
(1751, 21, 'Teteles de Ávila Castillo', 173),
(1752, 21, 'Teziutlán', 174),
(1753, 21, 'Tianguismanalco', 175),
(1754, 21, 'Tilapa', 176),
(1755, 21, 'Tlacotepec de Benito Juárez', 177),
(1756, 21, 'Tlacuilotepec', 178),
(1757, 21, 'Tlachichuca', 179),
(1758, 21, 'Tlahuapan', 180),
(1759, 21, 'Tlaltenango', 181),
(1760, 21, 'Tlanepantla', 182),
(1761, 21, 'Tlaola', 183),
(1762, 21, 'Tlapacoya', 184),
(1763, 21, 'Tlapanalá', 185),
(1764, 21, 'Tlatlauquitepec', 186),
(1765, 21, 'Tlaxco', 187),
(1766, 21, 'Tochimilco', 188),
(1767, 21, 'Tochtepec', 189),
(1768, 21, 'Totoltepec de Guerrero', 190),
(1769, 21, 'Tulcingo', 191),
(1770, 21, 'Tuzamapan de Galeana', 192),
(1771, 21, 'Tzicatlacoyan', 193),
(1772, 21, 'Venustiano Carranza', 194),
(1773, 21, 'Vicente Guerrero', 195),
(1774, 21, 'Xayacatlán de Bravo', 196),
(1775, 21, 'Xicotepec', 197),
(1776, 21, 'Xicotlán', 198),
(1777, 21, 'Xiutetelco', 199),
(1778, 21, 'Xochiapulco', 200),
(1779, 21, 'Xochiltepec', 201),
(1780, 21, 'Xochitlán de Vicente Suárez', 202),
(1781, 21, 'Xochitlán Todos Santos', 203),
(1782, 21, 'Yaonáhuac', 204),
(1783, 21, 'Yehualtepec', 205),
(1784, 21, 'Zacapala', 206),
(1785, 21, 'Zacapoaxtla', 207),
(1786, 21, 'Zacatlán', 208),
(1787, 21, 'Zapotitlán', 209),
(1788, 21, 'Zapotitlán de Méndez', 210),
(1789, 21, 'Zaragoza', 211),
(1790, 21, 'Zautla', 212),
(1791, 21, 'Zihuateutla', 213),
(1792, 21, 'Zinacatepec', 214),
(1793, 21, 'Zongozotla', 215),
(1794, 21, 'Zoquiapan', 216),
(1795, 21, 'Zoquitlán', 217),
(1796, 22, 'Amealco de Bonfil', 1),
(1797, 22, 'Pinal de Amoles', 2),
(1798, 22, 'Arroyo Seco', 3),
(1799, 22, 'Cadereyta de Montes', 4),
(1800, 22, 'Colón', 5),
(1801, 22, 'Corregidora', 6),
(1802, 22, 'Ezequiel Montes', 7),
(1803, 22, 'Huimilpan', 8),
(1804, 22, 'Jalpan de Serra', 9),
(1805, 22, 'Landa de Matamoros', 10),
(1806, 22, 'El Marqués', 11),
(1807, 22, 'Pedro Escobedo', 12),
(1808, 22, 'Peñamiller', 13),
(1809, 22, 'Querétaro', 14),
(1810, 22, 'San Joaquín', 15),
(1811, 22, 'San Juan del Río', 16),
(1812, 22, 'Tequisquiapan', 17),
(1813, 22, 'Tolimán', 18),
(1814, 23, 'Cozumel', 1),
(1815, 23, 'Felipe Carrillo Puerto', 2),
(1816, 23, 'Isla Mujeres', 3),
(1817, 23, 'Othón P. Blanco', 4),
(1818, 23, 'Benito Juárez', 5),
(1819, 23, 'José María Morelos', 6),
(1820, 23, 'Lázaro Cárdenas', 7),
(1821, 23, 'Solidaridad', 8),
(1822, 23, 'Tulum', 9),
(1823, 23, 'Bacalar', 10),
(1824, 23, 'Puerto Morelos', 11),
(1825, 24, 'Ahualulco', 1),
(1826, 24, 'Alaquines', 2),
(1827, 24, 'Aquismón', 3),
(1828, 24, 'Armadillo de los Infante', 4),
(1829, 24, 'Cárdenas', 5),
(1830, 24, 'Catorce', 6),
(1831, 24, 'Cedral', 7),
(1832, 24, 'Cerritos', 8),
(1833, 24, 'Cerro de San Pedro', 9),
(1834, 24, 'Ciudad del Maíz', 10),
(1835, 24, 'Ciudad Fernández', 11),
(1836, 24, 'Tancanhuitz', 12),
(1837, 24, 'Ciudad Valles', 13),
(1838, 24, 'Coxcatlán', 14),
(1839, 24, 'Charcas', 15),
(1840, 24, 'Ébano', 16),
(1841, 24, 'Guadalcázar', 17),
(1842, 24, 'Huehuetlán', 18),
(1843, 24, 'Lagunillas', 19),
(1844, 24, 'Matehuala', 20),
(1845, 24, 'Mexquitic de Carmona', 21),
(1846, 24, 'Moctezuma', 22),
(1847, 24, 'Rayón', 23),
(1848, 24, 'Rioverde', 24),
(1849, 24, 'Salinas', 25),
(1850, 24, 'San Antonio', 26),
(1851, 24, 'San Ciro de Acosta', 27),
(1852, 24, 'San Luis Potosí', 28),
(1853, 24, 'San Martín Chalchicuautla', 29),
(1854, 24, 'San Nicolás Tolentino', 30),
(1855, 24, 'Santa Catarina', 31),
(1856, 24, 'Santa María del Río', 32),
(1857, 24, 'Santo Domingo', 33),
(1858, 24, 'San Vicente Tancuayalab', 34),
(1859, 24, 'Soledad de Graciano Sánchez', 35),
(1860, 24, 'Tamasopo', 36),
(1861, 24, 'Tamazunchale', 37),
(1862, 24, 'Tampacán', 38),
(1863, 24, 'Tampamolón Corona', 39),
(1864, 24, 'Tamuín', 40),
(1865, 24, 'Tanlajás', 41),
(1866, 24, 'Tanquián de Escobedo', 42),
(1867, 24, 'Tierra Nueva', 43),
(1868, 24, 'Vanegas', 44),
(1869, 24, 'Venado', 45),
(1870, 24, 'Villa de Arriaga', 46),
(1871, 24, 'Villa de Guadalupe', 47),
(1872, 24, 'Villa de la Paz', 48),
(1873, 24, 'Villa de Ramos', 49),
(1874, 24, 'Villa de Reyes', 50),
(1875, 24, 'Villa Hidalgo', 51),
(1876, 24, 'Villa Juárez', 52),
(1877, 24, 'Axtla de Terrazas', 53),
(1878, 24, 'Xilitla', 54),
(1879, 24, 'Zaragoza', 55),
(1880, 24, 'Villa de Arista', 56),
(1881, 24, 'Matlapa', 57),
(1882, 24, 'El Naranjo', 58),
(1883, 25, 'Ahome', 1),
(1884, 25, 'Angostura', 2),
(1885, 25, 'Badiraguato', 3),
(1886, 25, 'Concordia', 4),
(1887, 25, 'Cosalá', 5),
(1888, 25, 'Culiacán', 6),
(1889, 25, 'Choix', 7),
(1890, 25, 'Elota', 8),
(1891, 25, 'Escuinapa', 9),
(1892, 25, 'El Fuerte', 10),
(1893, 25, 'Guasave', 11),
(1894, 25, 'Mazatlán', 12),
(1895, 25, 'Mocorito', 13),
(1896, 25, 'El Rosario', 14),
(1897, 25, 'Salvador Alvarado', 15),
(1898, 25, 'San Ignacio', 16),
(1899, 25, 'Sinaloa', 17),
(1900, 25, 'Navolato', 18),
(1901, 26, 'Aconchi', 1),
(1902, 26, 'Agua Prieta', 2),
(1903, 26, 'Álamos', 3),
(1904, 26, 'Altar', 4),
(1905, 26, 'Arivechi', 5),
(1906, 26, 'Arizpe', 6),
(1907, 26, 'Átil', 7),
(1908, 26, 'Bacadéhuachi', 8),
(1909, 26, 'Bacanora', 9),
(1910, 26, 'Bacerac', 10),
(1911, 26, 'Bacoachi', 11),
(1912, 26, 'Bácum', 12),
(1913, 26, 'Banámichi', 13),
(1914, 26, 'Baviácora', 14),
(1915, 26, 'Bavispe', 15),
(1916, 26, 'Benjamín Hill', 16),
(1917, 26, 'Caborca', 17),
(1918, 26, 'Cajeme', 18),
(1919, 26, 'Cananea', 19),
(1920, 26, 'Carbó', 20),
(1921, 26, 'La Colorada', 21),
(1922, 26, 'Cucurpe', 22),
(1923, 26, 'Cumpas', 23),
(1924, 26, 'Divisaderos', 24),
(1925, 26, 'Empalme', 25),
(1926, 26, 'Etchojoa', 26),
(1927, 26, 'Fronteras', 27),
(1928, 26, 'Granados', 28),
(1929, 26, 'Guaymas', 29),
(1930, 26, 'Hermosillo', 30),
(1931, 26, 'Huachinera', 31),
(1932, 26, 'Huásabas', 32),
(1933, 26, 'Huatabampo', 33),
(1934, 26, 'Huépac', 34),
(1935, 26, 'Ímuris', 35),
(1936, 26, 'Magdalena', 36),
(1937, 26, 'Mazatán', 37),
(1938, 26, 'Moctezuma', 38),
(1939, 26, 'Naco', 39),
(1940, 26, 'Nácori Chico', 40),
(1941, 26, 'Nacozari de García', 41),
(1942, 26, 'Navojoa', 42),
(1943, 26, 'Nogales', 43),
(1944, 26, 'Ónavas', 44),
(1945, 26, 'Opodepe', 45),
(1946, 26, 'Oquitoa', 46),
(1947, 26, 'Pitiquito', 47),
(1948, 26, 'Puerto Peñasco', 48),
(1949, 26, 'Quiriego', 49),
(1950, 26, 'Rayón', 50),
(1951, 26, 'Rosario', 51),
(1952, 26, 'Sahuaripa', 52),
(1953, 26, 'San Felipe de Jesús', 53),
(1954, 26, 'San Javier', 54),
(1955, 26, 'San Luis Río Colorado', 55),
(1956, 26, 'San Miguel de Horcasitas', 56),
(1957, 26, 'San Pedro de la Cueva', 57),
(1958, 26, 'Santa Ana', 58),
(1959, 26, 'Santa Cruz', 59),
(1960, 26, 'Sáric', 60),
(1961, 26, 'Soyopa', 61),
(1962, 26, 'Suaqui Grande', 62),
(1963, 26, 'Tepache', 63),
(1964, 26, 'Trincheras', 64),
(1965, 26, 'Tubutama', 65),
(1966, 26, 'Ures', 66),
(1967, 26, 'Villa Hidalgo', 67),
(1968, 26, 'Villa Pesqueira', 68),
(1969, 26, 'Yécora', 69),
(1970, 26, 'General Plutarco Elías Calles', 70),
(1971, 26, 'Benito Juárez', 71),
(1972, 26, 'San Ignacio Río Muerto', 72),
(1973, 27, 'Balancán', 1),
(1974, 27, 'Cárdenas', 2),
(1975, 27, 'Centla', 3),
(1976, 27, 'Centro', 4),
(1977, 27, 'Comalcalco', 5),
(1978, 27, 'Cunduacán', 6),
(1979, 27, 'Emiliano Zapata', 7),
(1980, 27, 'Huimanguillo', 8),
(1981, 27, 'Jalapa', 9),
(1982, 27, 'Jalpa de Méndez', 10),
(1983, 27, 'Jonuta', 11),
(1984, 27, 'Macuspana', 12),
(1985, 27, 'Nacajuca', 13),
(1986, 27, 'Paraíso', 14),
(1987, 27, 'Tacotalpa', 15),
(1988, 27, 'Teapa', 16),
(1989, 27, 'Tenosique', 17),
(1990, 28, 'Abasolo', 1),
(1991, 28, 'Aldama', 2),
(1992, 28, 'Altamira', 3),
(1993, 28, 'Antiguo Morelos', 4),
(1994, 28, 'Burgos', 5),
(1995, 28, 'Bustamante', 6),
(1996, 28, 'Camargo', 7),
(1997, 28, 'Casas', 8),
(1998, 28, 'Ciudad Madero', 9),
(1999, 28, 'Cruillas', 10),
(2000, 28, 'Gomez Farías', 11),
(2001, 28, 'González', 12),
(2002, 28, 'Güémez', 13),
(2003, 28, 'Guerrero', 14),
(2004, 28, 'Gustavo Díaz Ordaz', 15),
(2005, 28, 'Hidalgo', 16),
(2006, 28, 'Jaumave', 17),
(2007, 28, 'Jiménez', 18),
(2008, 28, 'Llera', 19),
(2009, 28, 'Mainero', 20),
(2010, 28, 'El Mante', 21),
(2011, 28, 'Matamoros', 22),
(2012, 28, 'Méndez', 23),
(2013, 28, 'Mier', 24),
(2014, 28, 'Miguel Alemán', 25),
(2015, 28, 'Miquihuana', 26),
(2016, 28, 'Nuevo Laredo', 27),
(2017, 28, 'Nuevo Morelos', 28),
(2018, 28, 'Ocampo', 29),
(2019, 28, 'Padilla', 30),
(2020, 28, 'Palmillas', 31),
(2021, 28, 'Reynosa', 32),
(2022, 28, 'Río Bravo', 33),
(2023, 28, 'San Carlos', 34),
(2024, 28, 'San Fernando', 35),
(2025, 28, 'San Nicolás', 36),
(2026, 28, 'Soto la Marina', 37),
(2027, 28, 'Tampico', 38),
(2028, 28, 'Tula', 39),
(2029, 28, 'Valle Hermoso', 40),
(2030, 28, 'Victoria', 41),
(2031, 28, 'Villagrán', 42),
(2032, 28, 'Xicoténcatl', 43),
(2033, 29, 'Amaxac de Guerrero', 1),
(2034, 29, 'Apetatitlán de Antonio Carvajal', 2),
(2035, 29, 'Atlangatepec', 3),
(2036, 29, 'Altzayanca', 4),
(2037, 29, 'Apizaco', 5),
(2038, 29, 'Calpulalpan', 6),
(2039, 29, 'El Carmen Tequexquitla', 7),
(2040, 29, 'Cuapiaxtla', 8),
(2041, 29, 'Cuaxomulco', 9),
(2042, 29, 'Chiautempan', 10),
(2043, 29, 'Muñoz de Domingo Arenas', 11),
(2044, 29, 'Españita', 12),
(2045, 29, 'Huamantla', 13),
(2046, 29, 'Hueyotlipan', 14),
(2047, 29, 'Ixtacuixtla de Mariano Matamoros', 15),
(2048, 29, 'Ixtenco', 16),
(2049, 29, 'Mazatecochco de José María Morelos', 17),
(2050, 29, 'Contla de Juan Cuamatzi', 18),
(2051, 29, 'Tepetitla de Lardizábal', 19),
(2052, 29, 'Sanctórum de Lázaro Cárdenas', 20),
(2053, 29, 'Nanacamilpa de Mariano Arista', 21),
(2054, 29, 'Acuamanala de Miguel Hidalgo', 22),
(2055, 29, 'Natívitas', 23),
(2056, 29, 'Panotla', 24),
(2057, 29, 'San Pablo del Monte', 25),
(2058, 29, 'Santa Cruz Tlaxcala', 26),
(2059, 29, 'Tenancingo', 27),
(2060, 29, 'Teolocholco', 28),
(2061, 29, 'Tepeyanco', 29),
(2062, 29, 'Terrenate', 30),
(2063, 29, 'Tetla de la Solidaridad', 31),
(2064, 29, 'Tetlatlahuca', 32),
(2065, 29, 'Tlaxcala', 33),
(2066, 29, 'Tlaxco', 34),
(2067, 29, 'Tocatlán', 35),
(2068, 29, 'Totolac', 36),
(2069, 29, 'Zitlaltepec de Trinidad Sánchez Santos', 37),
(2070, 29, 'Tzompantepec', 38),
(2071, 29, 'Xaloztoc', 39),
(2072, 29, 'Xaltocan', 40),
(2073, 29, 'Papalotla de Xicohténcatl', 41),
(2074, 29, 'Xicohtzinco', 42),
(2075, 29, 'Yauhquemecan', 43),
(2076, 29, 'Zacatelco', 44),
(2077, 29, 'Benito Juárez', 45),
(2078, 29, 'Emiliano Zapata', 46),
(2079, 29, 'Lázaro Cárdenas', 47),
(2080, 29, 'La Magdalena Tlaltelulco', 48),
(2081, 29, 'San Damián Texoloc', 49),
(2082, 29, 'San Francisco Tetlanohcan', 50),
(2083, 29, 'San Jerónimo Zacualpan', 51),
(2084, 29, 'San José Teacalco', 52),
(2085, 29, 'San Juan Huactzinco', 53),
(2086, 29, 'San Lorenzo Axocomanitla', 54),
(2087, 29, 'San Lucas Tecopilco', 55),
(2088, 29, 'Santa Ana Nopalucan', 56),
(2089, 29, 'Santa Apolonia Teacalco', 57),
(2090, 29, 'Santa Catarina Ayometla', 58),
(2091, 29, 'Santa Cruz Quilehtla', 59),
(2092, 29, 'Santa Isabel Xiloxoxtla', 60),
(2093, 30, 'Acajete', 1),
(2094, 30, 'Acatlán', 2),
(2095, 30, 'Acayucan', 3),
(2096, 30, 'Actopan', 4),
(2097, 30, 'Acula', 5),
(2098, 30, 'Acultzingo', 6),
(2099, 30, 'Camarón de Tejeda', 7),
(2100, 30, 'Alpatláhuac', 8),
(2101, 30, 'Alto Lucero de Gutiérrez Barrios', 9),
(2102, 30, 'Altotonga', 10),
(2103, 30, 'Alvarado', 11),
(2104, 30, 'Amatitlán', 12),
(2105, 30, 'Naranjos Amatlán', 13),
(2106, 30, 'Amatlán de los Reyes', 14),
(2107, 30, 'Ángel R. Cabada', 15),
(2108, 30, 'La Antigua', 16),
(2109, 30, 'Apazapan', 17),
(2110, 30, 'Aquila', 18),
(2111, 30, 'Astacinga', 19),
(2112, 30, 'Atlahuilco', 20),
(2113, 30, 'Atoyac', 21),
(2114, 30, 'Atzacan', 22),
(2115, 30, 'Atzalan', 23),
(2116, 30, 'Tlaltetela', 24),
(2117, 30, 'Ayahualulco', 25),
(2118, 30, 'Banderilla', 26),
(2119, 30, 'Benito Juárez', 27),
(2120, 30, 'Boca del Río', 28),
(2121, 30, 'Calcahualco', 29),
(2122, 30, 'Camerino Z. Mendoza', 30),
(2123, 30, 'Carrillo Puerto', 31),
(2124, 30, 'Catemaco', 32),
(2125, 30, 'Cazones de Herrera', 33),
(2126, 30, 'Cerro Azul', 34),
(2127, 30, 'Citlaltépetl', 35),
(2128, 30, 'Coacoatzintla', 36),
(2129, 30, 'Coahuitlán', 37),
(2130, 30, 'Coatepec', 38),
(2131, 30, 'Coatzacoalcos', 39),
(2132, 30, 'Coatzintla', 40),
(2133, 30, 'Coetzala', 41),
(2134, 30, 'Colipa', 42),
(2135, 30, 'Comapa', 43),
(2136, 30, 'Córdoba', 44),
(2137, 30, 'Cosamaloapan de Carpio', 45),
(2138, 30, 'Cosautlán de Carvajal', 46),
(2139, 30, 'Coscomatepec', 47),
(2140, 30, 'Cosoleacaque', 48),
(2141, 30, 'Cotaxtla', 49),
(2142, 30, 'Coxquihui', 50),
(2143, 30, 'Coyutla', 51),
(2144, 30, 'Cuichapa', 52),
(2145, 30, 'Cuitláhuac', 53),
(2146, 30, 'Chacaltianguis', 54),
(2147, 30, 'Chalma', 55),
(2148, 30, 'Chiconamel', 56),
(2149, 30, 'Chiconquiaco', 57),
(2150, 30, 'Chicontepec', 58),
(2151, 30, 'Chinameca', 59),
(2152, 30, 'Chinampa de Gorostiza', 60),
(2153, 30, 'Las Choapas', 61),
(2154, 30, 'Chocamán', 62),
(2155, 30, 'Chontla', 63),
(2156, 30, 'Chumatlán', 64),
(2157, 30, 'Emiliano Zapata', 65),
(2158, 30, 'Espinal', 66),
(2159, 30, 'Filomeno Mata', 67),
(2160, 30, 'Fortín', 68),
(2161, 30, 'Gutiérrez Zamora', 69),
(2162, 30, 'Hidalgotitlán', 70),
(2163, 30, 'Huatusco', 71),
(2164, 30, 'Huayacocotla', 72),
(2165, 30, 'Hueyapan de Ocampo', 73),
(2166, 30, 'Huiloapan de Cuauhtémoc', 74),
(2167, 30, 'Ignacio de la Llave', 75),
(2168, 30, 'Ilamatlán', 76),
(2169, 30, 'Isla', 77),
(2170, 30, 'Ixcatepec', 78),
(2171, 30, 'Ixhuacán de los Reyes', 79),
(2172, 30, 'Ixhuatlán del Café', 80),
(2173, 30, 'Ixhuatlancillo', 81),
(2174, 30, 'Ixhuatlán del Sureste', 82),
(2175, 30, 'Ixhuatlán de Madero', 83),
(2176, 30, 'Ixmatlahuacan', 84),
(2177, 30, 'Ixtaczoquitlán', 85),
(2178, 30, 'Jalacingo', 86),
(2179, 30, 'Xalapa', 87),
(2180, 30, 'Jalcomulco', 88),
(2181, 30, 'Jáltipan', 89),
(2182, 30, 'Jamapa', 90),
(2183, 30, 'Jesús Carranza', 91),
(2184, 30, 'Xico', 92),
(2185, 30, 'Jilotepec', 93),
(2186, 30, 'Juan Rodríguez Clara', 94),
(2187, 30, 'Juchique de Ferrer', 95),
(2188, 30, 'Landero y Coss', 96),
(2189, 30, 'Lerdo de Tejada', 97),
(2190, 30, 'Magdalena', 98),
(2191, 30, 'Maltrata', 99),
(2192, 30, 'Manlio Fabio Altamirano', 100),
(2193, 30, 'Mariano Escobedo', 101),
(2194, 30, 'Martínez de la Torre', 102),
(2195, 30, 'Mecatlán', 103),
(2196, 30, 'Mecayapan', 104),
(2197, 30, 'Medellín', 105),
(2198, 30, 'Miahuatlán', 106),
(2199, 30, 'Las Minas', 107),
(2200, 30, 'Minatitlán', 108),
(2201, 30, 'Misantla', 109),
(2202, 30, 'Mixtla de Altamirano', 110),
(2203, 30, 'Moloacán', 111),
(2204, 30, 'Naolinco', 112),
(2205, 30, 'Naranjal', 113),
(2206, 30, 'Nautla', 114),
(2207, 30, 'Nogales', 115),
(2208, 30, 'Oluta', 116),
(2209, 30, 'Omealca', 117),
(2210, 30, 'Orizaba', 118),
(2211, 30, 'Otatitlán', 119),
(2212, 30, 'Oteapan', 120),
(2213, 30, 'Ozuluama de Mascareñas', 121),
(2214, 30, 'Pajapan', 122),
(2215, 30, 'Pánuco', 123),
(2216, 30, 'Papantla', 124),
(2217, 30, 'Paso del Macho', 125),
(2218, 30, 'Paso de Ovejas', 126),
(2219, 30, 'La Perla', 127),
(2220, 30, 'Perote', 128),
(2221, 30, 'Platón Sánchez', 129),
(2222, 30, 'Playa Vicente', 130),
(2223, 30, 'Poza Rica de Hidalgo', 131),
(2224, 30, 'Las Vigas de Ramírez', 132),
(2225, 30, 'Pueblo Viejo', 133),
(2226, 30, 'Puente Nacional', 134),
(2227, 30, 'Rafael Delgado', 135),
(2228, 30, 'Rafael Lucio', 136),
(2229, 30, 'Los Reyes', 137),
(2230, 30, 'Río Blanco', 138),
(2231, 30, 'Saltabarranca', 139),
(2232, 30, 'San Andrés Tenejapan', 140),
(2233, 30, 'San Andrés Tuxtla', 141),
(2234, 30, 'San Juan Evangelista', 142),
(2235, 30, 'Santiago Tuxtla', 143),
(2236, 30, 'Sayula de Alemán', 144),
(2237, 30, 'Soconusco', 145),
(2238, 30, 'Sochiapa', 146),
(2239, 30, 'Soledad Atzompa', 147),
(2240, 30, 'Soledad de Doblado', 148),
(2241, 30, 'Soteapan', 149),
(2242, 30, 'Tamalín', 150),
(2243, 30, 'Tamiahua', 151),
(2244, 30, 'Tampico Alto', 152),
(2245, 30, 'Tancoco', 153),
(2246, 30, 'Tantima', 154),
(2247, 30, 'Tantoyuca', 155),
(2248, 30, 'Tatatila', 156),
(2249, 30, 'Castillo de Teayo', 157),
(2250, 30, 'Tecolutla', 158),
(2251, 30, 'Tehuipango', 159),
(2252, 30, 'Álamo Temapache', 160),
(2253, 30, 'Tempoal', 161),
(2254, 30, 'Tenampa', 162),
(2255, 30, 'Tenochtitlán', 163),
(2256, 30, 'Teocelo', 164),
(2257, 30, 'Tepatlaxco', 165),
(2258, 30, 'Tepetlán', 166),
(2259, 30, 'Tepetzintla', 167),
(2260, 30, 'Tequila', 168),
(2261, 30, 'José Azueta', 169),
(2262, 30, 'Texcatepec', 170),
(2263, 30, 'Texhuacán', 171),
(2264, 30, 'Texistepec', 172),
(2265, 30, 'Tezonapa', 173),
(2266, 30, 'Tierra Blanca', 174),
(2267, 30, 'Tihuatlán', 175),
(2268, 30, 'Tlacojalpan', 176),
(2269, 30, 'Tlacolulan', 177),
(2270, 30, 'Tlacotalpan', 178),
(2271, 30, 'Tlacotepec de Mejía', 179),
(2272, 30, 'Tlachichilco', 180),
(2273, 30, 'Tlalixcoyan', 181),
(2274, 30, 'Tlalnelhuayocan', 182),
(2275, 30, 'Tlapacoyan', 183),
(2276, 30, 'Tlaquilpa', 184),
(2277, 30, 'Tlilapan', 185),
(2278, 30, 'Tomatlán', 186),
(2279, 30, 'Tonayán', 187),
(2280, 30, 'Totutla', 188),
(2281, 30, 'Tuxpan', 189),
(2282, 30, 'Tuxtilla', 190),
(2283, 30, 'Úrsulo Galván', 191),
(2284, 30, 'Vega de Alatorre', 192),
(2285, 30, 'Veracruz', 193),
(2286, 30, 'Villa Aldama', 194),
(2287, 30, 'Xoxocotla', 195),
(2288, 30, 'Yanga', 196),
(2289, 30, 'Yecuatla', 197),
(2290, 30, 'Zacualpan', 198),
(2291, 30, 'Zaragoza', 199),
(2292, 30, 'Zentla', 200),
(2293, 30, 'Zongolica', 201),
(2294, 30, 'Zontecomatlán de López y Fuentes', 202),
(2295, 30, 'Zozocolco de Hidalgo', 203),
(2296, 30, 'Agua Dulce', 204),
(2297, 30, 'El Higo', 205),
(2298, 30, 'Nanchital de Lázaro Cárdenas del Río', 206),
(2299, 30, 'Tres Valles', 207),
(2300, 30, 'Carlos A. Carrillo', 208),
(2301, 30, 'Tatahuicapan de Juárez', 209),
(2302, 30, 'Uxpanapa', 210),
(2303, 30, 'San Rafael', 211),
(2304, 30, 'Santiago Sochiapan', 212),
(2305, 31, 'Abalá', 1),
(2306, 31, 'Acanceh', 2),
(2307, 31, 'Akil', 3),
(2308, 31, 'Baca', 4),
(2309, 31, 'Bokobá', 5),
(2310, 31, 'Buctzotz', 6),
(2311, 31, 'Cacalchén', 7),
(2312, 31, 'Calotmul', 8),
(2313, 31, 'Cansahcab', 9),
(2314, 31, 'Cantamayec', 10),
(2315, 31, 'Celestún', 11),
(2316, 31, 'Cenotillo', 12),
(2317, 31, 'Conkal', 13),
(2318, 31, 'Cuncunul', 14),
(2319, 31, 'Cuzamá', 15),
(2320, 31, 'Chacsinkín', 16),
(2321, 31, 'Chankom', 17),
(2322, 31, 'Chapab', 18),
(2323, 31, 'Chemax', 19),
(2324, 31, 'Chicxulub Pueblo', 20),
(2325, 31, 'Chichimilá', 21),
(2326, 31, 'Chikindzonot', 22),
(2327, 31, 'Chocholá', 23),
(2328, 31, 'Chumayel', 24),
(2329, 31, 'Dzan', 25),
(2330, 31, 'Dzemul', 26),
(2331, 31, 'Dzidzantún', 27),
(2332, 31, 'Dzilam de Bravo', 28),
(2333, 31, 'Dzilam González', 29),
(2334, 31, 'Dzitás', 30),
(2335, 31, 'Dzoncauich', 31),
(2336, 31, 'Espita', 32),
(2337, 31, 'Halachó', 33),
(2338, 31, 'Hocabá', 34),
(2339, 31, 'Hoctún', 35),
(2340, 31, 'Homún', 36),
(2341, 31, 'Huhí', 37),
(2342, 31, 'Hunucmá', 38),
(2343, 31, 'Ixil', 39),
(2344, 31, 'Izamal', 40),
(2345, 31, 'Kanasín', 41),
(2346, 31, 'Kantunil', 42),
(2347, 31, 'Kaua', 43),
(2348, 31, 'Kinchil', 44),
(2349, 31, 'Kopomá', 45),
(2350, 31, 'Mama', 46),
(2351, 31, 'Maní', 47),
(2352, 31, 'Maxcanú', 48),
(2353, 31, 'Mayapán', 49),
(2354, 31, 'Mérida', 50),
(2355, 31, 'Mocochá', 51),
(2356, 31, 'Motul', 52),
(2357, 31, 'Muna', 53),
(2358, 31, 'Muxupip', 54),
(2359, 31, 'Opichén', 55),
(2360, 31, 'Oxkutzcab', 56),
(2361, 31, 'Panabá', 57),
(2362, 31, 'Peto', 58),
(2363, 31, 'Progreso', 59),
(2364, 31, 'Quintana Roo', 60),
(2365, 31, 'Río Lagartos', 61),
(2366, 31, 'Sacalum', 62),
(2367, 31, 'Samahil', 63),
(2368, 31, 'Sanahcat', 64),
(2369, 31, 'San Felipe', 65),
(2370, 31, 'Santa Elena', 66),
(2371, 31, 'Seyé', 67),
(2372, 31, 'Sinanché', 68),
(2373, 31, 'Sotuta', 69),
(2374, 31, 'Sucilá', 70),
(2375, 31, 'Sudzal', 71),
(2376, 31, 'Suma', 72),
(2377, 31, 'Tahdziú', 73),
(2378, 31, 'Tahmek', 74),
(2379, 31, 'Teabo', 75),
(2380, 31, 'Tecoh', 76),
(2381, 31, 'Tekal de Venegas', 77),
(2382, 31, 'Tekantó', 78),
(2383, 31, 'Tekax', 79),
(2384, 31, 'Tekit', 80),
(2385, 31, 'Tekom', 81),
(2386, 31, 'Telchac Pueblo', 82),
(2387, 31, 'Telchac Puerto', 83),
(2388, 31, 'Temax', 84),
(2389, 31, 'Temozón', 85),
(2390, 31, 'Tepakán', 86),
(2391, 31, 'Tetiz', 87),
(2392, 31, 'Teya', 88),
(2393, 31, 'Ticul', 89),
(2394, 31, 'Timucuy', 90),
(2395, 31, 'Tinum', 91),
(2396, 31, 'Tixcacalcupul', 92),
(2397, 31, 'Tixkokob', 93),
(2398, 31, 'Tixméhuac', 94),
(2399, 31, 'Tixpéhual', 95),
(2400, 31, 'Tizimín', 96),
(2401, 31, 'Tunkás', 97),
(2402, 31, 'Tzucacab', 98),
(2403, 31, 'Uayma', 99),
(2404, 31, 'Ucú', 100),
(2405, 31, 'Umán', 101),
(2406, 31, 'Valladolid', 102),
(2407, 31, 'Xocchel', 103),
(2408, 31, 'Yaxcabá', 104),
(2409, 31, 'Yaxkukul', 105),
(2410, 31, 'Yobaín', 106),
(2411, 32, 'Apozol', 1),
(2412, 32, 'Apulco', 2),
(2413, 32, 'Atolinga', 3),
(2414, 32, 'Benito Juárez', 4),
(2415, 32, 'Calera', 5),
(2416, 32, 'Cañitas de Felipe Pescador', 6),
(2417, 32, 'Concepción del Oro', 7),
(2418, 32, 'Cuauhtémoc', 8),
(2419, 32, 'Chalchihuites', 9),
(2420, 32, 'Fresnillo', 10),
(2421, 32, 'Trinidad García de la Cadena', 11),
(2422, 32, 'Genaro Codina', 12),
(2423, 32, 'General Enrique Estrada', 13),
(2424, 32, 'General Francisco R. Murguía', 14),
(2425, 32, 'El Plateado de Joaquín Amaro', 15),
(2426, 32, 'General Pánfilo Natera', 16),
(2427, 32, 'Guadalupe', 17),
(2428, 32, 'Huanusco', 18),
(2429, 32, 'Jalpa', 19),
(2430, 32, 'Jerez', 20),
(2431, 32, 'Jiménez del Teul', 21),
(2432, 32, 'Juan Aldama', 22),
(2433, 32, 'Juchipila', 23),
(2434, 32, 'Loreto', 24),
(2435, 32, 'Luis Moya', 25),
(2436, 32, 'Mazapil', 26),
(2437, 32, 'Melchor Ocampo', 27),
(2438, 32, 'Mezquital del Oro', 28),
(2439, 32, 'Miguel Auza', 29),
(2440, 32, 'Momax', 30),
(2441, 32, 'Monte Escobedo', 31),
(2442, 32, 'Morelos', 32),
(2443, 32, 'Moyahua de Estrada', 33),
(2444, 32, 'Nochistlán de Mejía', 34),
(2445, 32, 'Noria de Ángeles', 35),
(2446, 32, 'Ojocaliente', 36),
(2447, 32, 'Pánuco', 37),
(2448, 32, 'Pinos', 38),
(2449, 32, 'Río Grande', 39),
(2450, 32, 'Saín Alto', 40),
(2451, 32, 'El Salvador', 41),
(2452, 32, 'Sombrerete', 42),
(2453, 32, 'Susticacán', 43),
(2454, 32, 'Tabasco', 44),
(2455, 32, 'Tepechitlán', 45),
(2456, 32, 'Tepetongo', 46),
(2457, 32, 'Teúl de González Ortega', 47),
(2458, 32, 'Tlaltenango de Sánchez Román', 48),
(2459, 32, 'Valparaíso', 49),
(2460, 32, 'Vetagrande', 50),
(2461, 32, 'Villa de Cos', 51),
(2462, 32, 'Villa García', 52),
(2463, 32, 'Villa González Ortega', 53),
(2464, 32, 'Villa Hidalgo', 54),
(2465, 32, 'Villanueva', 55),
(2466, 32, 'Zacatecas', 56),
(2467, 32, 'Trancoso', 57),
(2468, 32, 'Santa María de la Paz', 58);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `Registro` bigint(20) UNSIGNED NOT NULL,
  `Receptor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Emisor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Notificacion` text COLLATE utf8_spanish_ci NOT NULL,
  `Hora` datetime NOT NULL,
  `Visto` tinyint(1) NOT NULL,
  `UsuarioEmisor` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `Registro` bigint(20) UNSIGNED NOT NULL,
  `Descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Precio` float NOT NULL,
  `DoctorConsultorio` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`Registro`, `Descripcion`, `Precio`, `DoctorConsultorio`) VALUES
(1, 'Consulta general', 123, 25);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `relacioncitaconsultorio`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `relacioncitaconsultorio` (
`Registro` int(10) unsigned
,`Consultorio` varchar(30)
,`Correo` varchar(50)
,`IdRegistro` int(10) unsigned
,`DoctorNombre` varchar(50)
,`Apellidos` varchar(60)
,`Hora_inicio` time
,`Hora_termino` time
,`Dia` char(1)
,`Fecha` date
,`NombreUsuario` varchar(255)
,`Telefono` bigint(20)
,`Concepto` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `Registro` int(10) UNSIGNED NOT NULL,
  `Consultorio` int(10) UNSIGNED NOT NULL,
  `Imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `FechaFinal` date DEFAULT NULL,
  `Aceptado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencias`
--

CREATE TABLE `sugerencias` (
  `Registro` bigint(20) UNSIGNED NOT NULL,
  `Usuario` int(10) UNSIGNED NOT NULL,
  `Sugerencia` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_spanish_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Registro` int(10) UNSIGNED NOT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Sexo` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Password` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `CorreoRecuperacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Registro`, `Correo`, `Nombre`, `Apellidos`, `Telefono`, `Sexo`, `Password`, `CorreoRecuperacion`, `FechaNacimiento`, `Imagen`) VALUES
(19, 'mariana@gmail.com', 'Mariana', 'Ramírez', 1234567890, 'f', '$2y$10$Z6cw2WA/J7ECGiM1ClS4cOz/xVLhYqpE9C2XcPo8c3VS6C7sOInNG', 'mariana2@gmail.com', '1999-12-02', 'mujer.png'),
(20, 'lola@gmail.com', 'Lola', 'Ramírez', 1234567890, 'f', '$2y$10$ZOXO.oDf7osjiaow.8RYyeBHoCbeUjHP6HccWaabIj3G/TJYytrUC', 'lola2@gmail.com', '2006-09-10', 'mujer.png'),
(21, 'jorge@gmail.com', 'Jorge', 'Ramírez', 1234567890, 'm', '$2y$10$j5BjFASQtXVt6KrSkBgEB.QzyZBvsV8P9CbZSQS.2Kvra4NKDX7H6', 'jorge2@gmail.com', '2004-01-09', 'hombre.jpg'),
(22, 'jona@gmail.com', 'Jona', 'Vázquez', 1234567890, 'm', '$2y$10$IUg5uq2vyB2xXzDN/mUgrurY09CiMxpuyuGIdvTekN3iM6wZMA.tO', 'jona2@gmail.com', '1999-02-10', 'hombre.jpg'),
(23, 'nestor@gmail.com', 'Néstor', 'Martínez', 1234567890, 'm', '$2y$10$ELdY3nRMj2ts9B5DwhS.9OTwZHN9oqaLM.cZvSybLeyufsCxjCWWS', 'nestor2@gmail.com', '2000-02-18', 'hombre.jpg'),
(24, 'paciente.generico.01@gmail.com', 'Paciente', 'Holitas', 1234567890, 'm', '$2y$10$kaaKZFzpHrZDpAj4QAr5pOVQUXLklV9Z4VZMQzuh/Ok9xDgQHxghu', 'paciente.generico.01.recuperacion@gmail.com', '2019-07-01', 'hombre.jpg'),
(25, 'paciente.generico.02@gmail.com', 'Doctor', 'Holitas', 1234567890, 'm', '$2y$10$u3VKsDn05w3kPqt/DhF72.glb75Q3u/2eyCpxCw.RlYNWuXv.97ii', 'paciente.generico.02.recuperacion@gmail.com', '2019-07-02', 'hombre.jpg'),
(26, 'paciente.generico.03@gmail.com', 'Asistente', 'Holitas', 1234567890, 'f', '$2y$10$fTvpLCwqDkgJpIC/lkXseOiCUQZjmCwXRYwcocaXrHZH/x7K/r8Xm', 'paciente.generico.03.recuperacion@gmail.com', '2019-07-03', 'mujer.png');

-- --------------------------------------------------------

--
-- Estructura para la vista `comentariosprincipales`
--
DROP TABLE IF EXISTS `comentariosprincipales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comentariosprincipales`  AS  select `comentariosprincipal`.`Registro` AS `Registro`,`comentariosprincipal`.`Comentario` AS `Comentario`,`comentariosprincipal`.`Hora` AS `Hora`,`usuarios`.`Correo` AS `Correo`,`usuarios`.`Nombre` AS `Nombre`,`usuarios`.`Apellidos` AS `Apellidos`,`usuarios`.`Imagen` AS `Imagen` from (`comentariosprincipal` join `usuarios`) where (`comentariosprincipal`.`Usuario` = `usuarios`.`Registro`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consultorios_especialidades`
--
DROP TABLE IF EXISTS `consultorios_especialidades`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultorios_especialidades`  AS  select `especialidad`.`Nombre` AS `Especialidad_Nom`,`estudios`.`Especialidad` AS `Especialidad`,`doctores`.`Registro` AS `Doctor`,`doctor_consultorio`.`Consultorio` AS `Consultorio`,`consultorios`.`Nombre` AS `Nombre`,`consultorios`.`Correo` AS `Correo`,`consultorios`.`Telefono` AS `Telefono`,`consultorios`.`Ubicacion` AS `Ubicacion`,`consultorios`.`Imagen` AS `Imagen`,`consultorios`.`C_precio` AS `C_precio`,`consultorios`.`C_limpieza` AS `C_limpieza`,`consultorios`.`C_puntualidad` AS `C_puntualidad`,`consultorios`.`C_trato` AS `C_trato`,`consultorios`.`Puntos` AS `Puntos` from ((((`estudios` join `doctores`) join `doctor_consultorio`) join `consultorios`) join `especialidad`) where ((`estudios`.`Doctor` = `doctores`.`Registro`) and (`doctores`.`Registro` = `doctor_consultorio`.`Doctor`) and (`doctor_consultorio`.`Consultorio` = `consultorios`.`Registro`) and (`especialidad`.`Registro` = `estudios`.`Especialidad`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `doctor_especialidad`
--
DROP TABLE IF EXISTS `doctor_especialidad`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctor_especialidad`  AS  select `especialidad`.`Nombre` AS `Nombre`,`especialidad`.`Registro` AS `Registro`,`doctores`.`Correo` AS `Correo`,`doctores`.`Registro` AS `Doctor` from ((`estudios` join `especialidad`) join `doctores`) where ((`estudios`.`Especialidad` = `especialidad`.`Registro`) and (`estudios`.`Doctor` = `doctores`.`Registro`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `elegirconsultorio`
--
DROP TABLE IF EXISTS `elegirconsultorio`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `elegirconsultorio`  AS  select `doctores`.`Registro` AS `id_doctor`,`doctores`.`Correo` AS `Correo`,`consultorios`.`Registro` AS `id_consultorio`,`consultorios`.`Telefono` AS `Telefono`,`consultorios`.`Imagen` AS `Imagen`,`consultorios`.`Ubicacion` AS `Ubicacion`,`consultorios`.`Nombre` AS `Nombre` from ((`consultorios` join `doctores`) join `doctor_consultorio`) where ((`doctor_consultorio`.`Doctor` = `doctores`.`Registro`) and (`doctor_consultorio`.`Consultorio` = `consultorios`.`Registro`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `relacioncitaconsultorio`
--
DROP TABLE IF EXISTS `relacioncitaconsultorio`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `relacioncitaconsultorio`  AS  select `consultorios`.`Registro` AS `Registro`,`consultorios`.`Nombre` AS `Consultorio`,`consultorios`.`Correo` AS `Correo`,`doctores`.`Registro` AS `IdRegistro`,`doctores`.`Nombre` AS `DoctorNombre`,`doctores`.`Apellidos` AS `Apellidos`,`horario`.`Hora_inicio` AS `Hora_inicio`,`horario`.`Hora_termino` AS `Hora_termino`,`horario`.`Dia` AS `Dia`,`citas`.`Fecha` AS `Fecha`,`citas`.`Nombre` AS `NombreUsuario`,`citas`.`Telefono` AS `Telefono`,`citas`.`Concepto` AS `Concepto` from ((((`consultorios` join `doctores`) join `horario`) join `citas`) join `doctor_consultorio`) where ((`consultorios`.`Registro` = `doctor_consultorio`.`Consultorio`) and (`doctores`.`Registro` = `doctor_consultorio`.`Doctor`) and (`horario`.`DoctorConsultorio` = `doctor_consultorio`.`Registro`) and (`citas`.`DoctorConsultorio` = `doctor_consultorio`.`Registro`) and (`horario`.`Registro` = `citas`.`Horarios`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Registro`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `Consultorio` (`Consultorio`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `fk_Citas_Usuario_idx` (`Usuario`),
  ADD KEY `fk_Citas_Horario_idx` (`Horarios`),
  ADD KEY `fk_Citas_Doctor_Consultorio_idx` (`DoctorConsultorio`);

--
-- Indices de la tabla `comentariosconsultorios`
--
ALTER TABLE `comentariosconsultorios`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `fk_ComentariosCon_Consultorio_idx` (`Consultorio`),
  ADD KEY `fk_ComentariosCon_Usuario_idx` (`Usuario`);

--
-- Indices de la tabla `comentariosprincipal`
--
ALTER TABLE `comentariosprincipal`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `fk_ComentariosPrin_Usuario_idx` (`Usuario`);

--
-- Indices de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `fk_Consultorios_Municipios_idx` (`Municipio`),
  ADD KEY `fk_Consultorios_Estados_idx` (`Estado`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`Registro`);

--
-- Indices de la tabla `doctor_consultorio`
--
ALTER TABLE `doctor_consultorio`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `DoctorConsultorio_idx` (`Consultorio`),
  ADD KEY `DoctorConsultorio_Doctor_idx` (`Doctor`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`Registro`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`Registro`);

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `fk_Estudios_Especialidad_idx` (`Especialidad`),
  ADD KEY `fk_Estudios_Doctores_idx` (`Doctor`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `fk_Horario_DoctorConsultorio_idx` (`DoctorConsultorio`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `fk_Imagen_Consultorio_idx` (`Consultorio`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `fk_Municipio_Estado_idx` (`Estado`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`Registro`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `fk_Precios_Doctor_Consultorio_idx` (`DoctorConsultorio`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `fk_Slide_Consultorios_idx` (`Consultorio`);

--
-- Indices de la tabla `sugerencias`
--
ALTER TABLE `sugerencias`
  ADD PRIMARY KEY (`Registro`),
  ADD KEY `fk_Sugerencias_Usuario_idx` (`Usuario`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Registro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `Registro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `Registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `Registro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comentariosconsultorios`
--
ALTER TABLE `comentariosconsultorios`
  MODIFY `Registro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentariosprincipal`
--
ALTER TABLE `comentariosprincipal`
  MODIFY `Registro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  MODIFY `Registro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `Registro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `doctor_consultorio`
--
ALTER TABLE `doctor_consultorio`
  MODIFY `Registro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `Registro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `Registro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `Registro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `Registro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `Registro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `Registro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2469;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `Registro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `Registro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `Registro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sugerencias`
--
ALTER TABLE `sugerencias`
  MODIFY `Registro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Registro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`Consultorio`) REFERENCES `consultorios` (`Registro`);

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_Citas_Doctor_Consultorio_idx` FOREIGN KEY (`DoctorConsultorio`) REFERENCES `doctor_consultorio` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Citas_Horario_idx` FOREIGN KEY (`Horarios`) REFERENCES `horario` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Citas_Usuario_idx` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentariosconsultorios`
--
ALTER TABLE `comentariosconsultorios`
  ADD CONSTRAINT `fk_ComentariosCon_Consultorio_idx` FOREIGN KEY (`Consultorio`) REFERENCES `consultorios` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ComentariosCon_Usuario_idx` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentariosprincipal`
--
ALTER TABLE `comentariosprincipal`
  ADD CONSTRAINT `fk_ComentariosPrin_Usuario_idx` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `consultorios`
--
ALTER TABLE `consultorios`
  ADD CONSTRAINT `fk_Consultorios_Estados_idx` FOREIGN KEY (`Estado`) REFERENCES `estado` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Consultorios_Municipios_idx` FOREIGN KEY (`Municipio`) REFERENCES `municipio` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `doctor_consultorio`
--
ALTER TABLE `doctor_consultorio`
  ADD CONSTRAINT `DoctorConsultorio_Doctor_idx` FOREIGN KEY (`Doctor`) REFERENCES `doctores` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `DoctorConsultorio_idx` FOREIGN KEY (`Consultorio`) REFERENCES `consultorios` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD CONSTRAINT `fk_Estudios_Doctores_idx` FOREIGN KEY (`Doctor`) REFERENCES `doctores` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudios_Especialidad_idx` FOREIGN KEY (`Especialidad`) REFERENCES `especialidad` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_Horario_DoctorConsultorio_idx` FOREIGN KEY (`DoctorConsultorio`) REFERENCES `doctor_consultorio` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `fk_Imagen_Consultorio_idx` FOREIGN KEY (`Consultorio`) REFERENCES `consultorios` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_Municipio_Estado_idx` FOREIGN KEY (`Estado`) REFERENCES `estado` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `precios`
--
ALTER TABLE `precios`
  ADD CONSTRAINT `fk_Precios_Doctor_Consultorio_idx` FOREIGN KEY (`DoctorConsultorio`) REFERENCES `doctor_consultorio` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `slide`
--
ALTER TABLE `slide`
  ADD CONSTRAINT `fk_Slide_Consultorios_idx` FOREIGN KEY (`Consultorio`) REFERENCES `consultorios` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sugerencias`
--
ALTER TABLE `sugerencias`
  ADD CONSTRAINT `fk_Sugerencias_Usuario_idx` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
