-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.27-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para db_centro_medico
CREATE DATABASE IF NOT EXISTS `db_centro_medico` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `db_centro_medico`;

-- Volcando estructura para tabla db_centro_medico.tbl_abonos_empleados
CREATE TABLE IF NOT EXISTS `tbl_abonos_empleados` (
  `idAbono` int(11) NOT NULL AUTO_INCREMENT,
  `idEmpleadoDescuento` int(11) NOT NULL,
  `montoAbono` decimal(9,2) NOT NULL,
  `idPlanilla` int(11) NOT NULL,
  `fechaAbono` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idAbono`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_abonos_empleados: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_abonos_hoja
CREATE TABLE IF NOT EXISTS `tbl_abonos_hoja` (
  `idAbono` int(11) NOT NULL AUTO_INCREMENT,
  `idHoja` int(11) NOT NULL,
  `montoAbono` decimal(9,2) NOT NULL,
  `fechaAbono` date NOT NULL,
  `paqueteAbono` int(11) NOT NULL DEFAULT 0,
  `realizadoAbono` timestamp NOT NULL DEFAULT current_timestamp(),
  `seLiquido` int(11) NOT NULL DEFAULT 0,
  `fechaLiquidado` date DEFAULT NULL,
  `liquidacion` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idAbono`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_abonos_hoja: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_accesos
CREATE TABLE IF NOT EXISTS `tbl_accesos` (
  `idAcceso` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAcceso` varchar(50) NOT NULL,
  `descripcionAcceso` text NOT NULL,
  `estadoAcceso` int(11) NOT NULL,
  `fechaAcceso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idAcceso`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_accesos: ~8 rows (aproximadamente)
INSERT INTO `tbl_accesos` (`idAcceso`, `nombreAcceso`, `descripcionAcceso`, `estadoAcceso`, `fechaAcceso`) VALUES
	(1, 'Administrador', 'Acceso total al sistema.', 1, '2021-04-29 21:43:54'),
	(2, 'Cajera', 'Usuario que se encargara de cobros.', 1, '2021-06-15 22:29:29'),
	(3, 'Botiquin', 'Empleado del area de botiquin.', 1, '2021-05-04 00:17:17'),
	(4, 'Cuentas', 'Persona encargada de efectuar cuentas.', 1, '2021-06-15 22:29:53'),
	(5, 'Contabilidad', 'Encargado de llevar la contabilidad.', 1, '2021-06-15 22:30:32'),
	(6, 'Gerente', 'Encargado de la administracion del hospital.', 1, '2021-06-15 22:31:20'),
	(7, 'Laboratorio', 'Para los empleados de Laboratorio Clinico', 1, '2021-07-30 20:07:57'),
	(8, 'Medico', 'Para los usuarios que sean médicos', 1, '2024-03-23 14:52:33');

-- Volcando estructura para tabla db_centro_medico.tbl_animations
CREATE TABLE IF NOT EXISTS `tbl_animations` (
  `idAnimation` int(11) NOT NULL AUTO_INCREMENT,
  `linkAnimation` text NOT NULL,
  `fechaAnimation` date NOT NULL,
  `estadoAnimation` int(11) NOT NULL,
  `publicadoAnimation` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idAnimation`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_animations: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_antigeno_prostatico
CREATE TABLE IF NOT EXISTS `tbl_antigeno_prostatico` (
  `idAntigenoProstatico` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `muestraAntigenoProstatico` text NOT NULL,
  `resultadoAntigenoProstatico` text NOT NULL,
  `observacionAntigenoProstatico` text NOT NULL,
  `fechaAntigenoProstatico` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idAntigenoProstatico`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_antigeno_prostatico: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_anuncios
CREATE TABLE IF NOT EXISTS `tbl_anuncios` (
  `idAnuncio` int(11) NOT NULL AUTO_INCREMENT,
  `tituloAnuncio` text NOT NULL,
  `detalleAnuncio` text NOT NULL,
  `estadoAnuncio` int(11) NOT NULL,
  `fechaAnuncio` date NOT NULL,
  `fechaProgramacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idAnuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_anuncios: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_areas_hospital
CREATE TABLE IF NOT EXISTS `tbl_areas_hospital` (
  `idArea` int(11) NOT NULL AUTO_INCREMENT,
  `nombreArea` text NOT NULL,
  `precioExtraArea` decimal(9,2) DEFAULT 0.00,
  PRIMARY KEY (`idArea`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_areas_hospital: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_bacteriologia
CREATE TABLE IF NOT EXISTS `tbl_bacteriologia` (
  `idBacteriologia` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `resultadoDirecto` text NOT NULL,
  `procedenciaCultivo` text NOT NULL,
  `resultadoCultivo` text NOT NULL,
  `cefixime` varchar(10) NOT NULL,
  `amikacina` varchar(10) NOT NULL,
  `levofloxacina` varchar(10) NOT NULL,
  `ceftriaxona` varchar(10) NOT NULL,
  `azitromicina` varchar(10) NOT NULL,
  `imipenem` varchar(10) NOT NULL,
  `meropenem` varchar(10) NOT NULL,
  `fosfocil` varchar(10) NOT NULL,
  `ciprofloxacina` varchar(10) NOT NULL,
  `penicilina` varchar(10) NOT NULL,
  `vancomicina` varchar(10) NOT NULL,
  `acidoNalidixico` varchar(10) NOT NULL,
  `gentamicina` varchar(10) NOT NULL,
  `nitrofurantoina` varchar(10) NOT NULL,
  `ceftazimide` varchar(10) NOT NULL,
  `cefotaxime` varchar(10) NOT NULL,
  `clindamicina` varchar(10) NOT NULL,
  `trimetropimSulfa` varchar(10) NOT NULL,
  `ampicilina` varchar(10) NOT NULL,
  `piperacilina` varchar(10) NOT NULL,
  `amoxicilina` varchar(10) NOT NULL,
  `claritromicina` varchar(25) NOT NULL,
  `cefuroxime` varchar(25) NOT NULL,
  `observacionesCultivo` text NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idBacteriologia`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_bacteriologia: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_bitacora
CREATE TABLE IF NOT EXISTS `tbl_bitacora` (
  `idBitacora` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `descripcionBitacora` text NOT NULL,
  `fechaBitacora` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idBitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=1012 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_bitacora: ~50 rows (aproximadamente)
INSERT INTO `tbl_bitacora` (`idBitacora`, `idUsuario`, `descripcionBitacora`, `fechaBitacora`) VALUES
	(954, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-13 22:11:12'),
	(955, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-13 22:11:36'),
	(956, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-13 22:56:32'),
	(957, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-13 23:24:01'),
	(958, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-16 20:36:16'),
	(959, 1, 'El usuario: Informatica agrego la compra con Id = 18', '2024-01-16 21:02:58'),
	(960, 1, 'El usuario: Informatica agrego la compra con Id = 19', '2024-01-16 21:12:51'),
	(961, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-17 21:04:40'),
	(962, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-20 00:44:48'),
	(963, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-20 00:57:41'),
	(964, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-25 20:21:10'),
	(965, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-25 23:31:46'),
	(966, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-27 23:23:19'),
	(967, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-28 14:48:46'),
	(968, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-28 20:02:14'),
	(969, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-30 01:22:36'),
	(970, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-30 01:31:43'),
	(971, 1, 'El usuario: Informatica agrego la compra con Id = 20', '2024-01-31 17:19:57'),
	(972, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-01-31 20:26:09'),
	(973, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-02-04 19:53:50'),
	(974, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-02-19 20:11:59'),
	(975, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-02-20 20:08:56'),
	(976, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-02-23 16:57:01'),
	(977, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-02 14:44:57'),
	(978, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-04 14:25:38'),
	(979, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-05 14:48:07'),
	(980, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-05 21:02:42'),
	(981, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-07 15:03:44'),
	(982, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-07 15:08:53'),
	(983, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-07 15:33:19'),
	(984, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-07 15:52:02'),
	(985, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-07 15:52:12'),
	(986, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-13 21:59:55'),
	(987, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-16 14:22:35'),
	(988, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-16 22:48:20'),
	(989, 13, 'El usuario: JUAN CARCAMO Ha iniciado sesión', '2024-03-16 22:57:22'),
	(990, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-16 22:57:31'),
	(991, 13, 'El usuario: JUAN CARCAMO Ha iniciado sesión', '2024-03-16 23:00:01'),
	(992, 13, 'El usuario: JUAN CARCAMO Ha iniciado sesión', '2024-03-16 23:06:53'),
	(993, 13, 'El usuario: JUAN CARCAMO Ha iniciado sesión', '2024-03-16 23:07:09'),
	(994, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-16 23:07:15'),
	(995, 13, 'El usuario: JUAN CARCAMO Ha iniciado sesión', '2024-03-16 23:07:21'),
	(996, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-16 23:07:58'),
	(997, 13, 'El usuario: JUAN CARCAMO Ha iniciado sesión', '2024-03-16 23:08:32'),
	(998, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-16 23:15:12'),
	(999, 1, 'El usuario: Informatica agrego la compra con Id = 21', '2024-03-16 23:55:35'),
	(1000, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-19 21:26:30'),
	(1001, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-22 14:23:00'),
	(1002, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-23 15:02:40'),
	(1003, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-23 21:19:23'),
	(1004, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-26 01:00:21'),
	(1005, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-29 20:48:29'),
	(1006, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-30 14:19:20'),
	(1007, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-03-30 22:21:31'),
	(1008, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-04-06 21:27:39'),
	(1009, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-04-06 23:35:39'),
	(1010, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-04-09 00:57:05'),
	(1011, 1, 'El usuario: Informatica Ha iniciado sesión', '2024-04-10 01:02:34');

-- Volcando estructura para tabla db_centro_medico.tbl_cargos
CREATE TABLE IF NOT EXISTS `tbl_cargos` (
  `idCargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCargo` varchar(50) NOT NULL,
  PRIMARY KEY (`idCargo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_cargos: ~13 rows (aproximadamente)
INSERT INTO `tbl_cargos` (`idCargo`, `nombreCargo`) VALUES
	(1, 'Ingeniero de Sistemas Informáticos'),
	(2, 'Médico'),
	(3, 'Lic. en Enfermería'),
	(4, 'Auxiliar de Enfermería'),
	(5, 'Enfermera'),
	(6, 'Contabilidad'),
	(7, 'Auxiliar de Limpieza'),
	(8, 'Gerente'),
	(9, 'Botiquín '),
	(10, 'Administrador de cuentas'),
	(11, 'Cajera'),
	(12, 'Laboratorio'),
	(13, 'Rayos X');

-- Volcando estructura para tabla db_centro_medico.tbl_citas_hemodialisis
CREATE TABLE IF NOT EXISTS `tbl_citas_hemodialisis` (
  `idCita` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `pacienteCita` varchar(50) NOT NULL,
  `turnoCita` int(11) NOT NULL,
  `fechaCita` varchar(10) NOT NULL,
  `responsablePaciente` varchar(50) NOT NULL,
  `telRespPaciente` varchar(10) NOT NULL,
  `estadoCita` int(11) NOT NULL,
  `hojaCobro` int(11) NOT NULL,
  `valeGenerado` int(11) NOT NULL DEFAULT 0,
  `creacionCita` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCita`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_citas_hemodialisis: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_clasificacion_cg
CREATE TABLE IF NOT EXISTS `tbl_clasificacion_cg` (
  `idClasificacionCG` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCG` varchar(30) NOT NULL,
  PRIMARY KEY (`idClasificacionCG`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_clasificacion_cg: ~5 rows (aproximadamente)
INSERT INTO `tbl_clasificacion_cg` (`idClasificacionCG`, `nombreCG`) VALUES
	(1, 'Compras'),
	(2, 'Gastos de administración'),
	(3, 'Gastos de ventas'),
	(4, 'Gastos financieros'),
	(5, 'Otros gastos');

-- Volcando estructura para tabla db_centro_medico.tbl_clasificacion_medicamentos
CREATE TABLE IF NOT EXISTS `tbl_clasificacion_medicamentos` (
  `idClasificacionMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreClasificacionMedicamento` varchar(50) NOT NULL,
  PRIMARY KEY (`idClasificacionMedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_clasificacion_medicamentos: ~27 rows (aproximadamente)
INSERT INTO `tbl_clasificacion_medicamentos` (`idClasificacionMedicamento`, `nombreClasificacionMedicamento`) VALUES
	(1, 'Analgésicos'),
	(2, 'Anestésico'),
	(3, 'Antialérgicos'),
	(4, 'Anticoagulantes '),
	(5, 'Antiácidos '),
	(6, 'Antibióticos '),
	(7, 'Atropínicos '),
	(8, 'Cardiovascular '),
	(9, 'Controlados '),
	(10, 'Diuréticos '),
	(11, 'Esteroides '),
	(12, 'Gastrointestinal '),
	(13, 'Gíneco-obstétrico '),
	(14, 'Hematológico '),
	(15, 'Insumos médicos '),
	(16, 'Medicamentos de usos varios '),
	(17, 'Muestras médicas '),
	(18, 'Neumológicos '),
	(19, 'Neurológicos '),
	(20, 'Relajante muscular '),
	(21, 'Endocrinológicos '),
	(22, 'Servicios externos '),
	(23, 'Soluciones intravenosa '),
	(24, 'Respiratorios '),
	(25, 'Urológico '),
	(26, 'Vitaminas '),
	(27, 'Otros');

-- Volcando estructura para tabla db_centro_medico.tbl_clasificacion_ri
CREATE TABLE IF NOT EXISTS `tbl_clasificacion_ri` (
  `idClasificacionRI` int(11) NOT NULL AUTO_INCREMENT,
  `nombreClasificacionRI` varchar(30) NOT NULL,
  PRIMARY KEY (`idClasificacionRI`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_clasificacion_ri: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_coagulacion
CREATE TABLE IF NOT EXISTS `tbl_coagulacion` (
  `idCoagulacion` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `tiempoProtombina` varchar(25) NOT NULL,
  `tiempoTromboplastina` varchar(25) NOT NULL,
  `fibrinogeno` varchar(25) NOT NULL,
  `inr` varchar(25) NOT NULL,
  `tiempoSangramiento` varchar(25) NOT NULL,
  `tiempoCoagulacion` varchar(25) NOT NULL,
  `observacion` varchar(25) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCoagulacion`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_coagulacion: ~1 rows (aproximadamente)
INSERT INTO `tbl_coagulacion` (`idCoagulacion`, `examenSolicitado`, `tiempoProtombina`, `tiempoTromboplastina`, `fibrinogeno`, `inr`, `tiempoSangramiento`, `tiempoCoagulacion`, `observacion`, `fechaCreacion`) VALUES
	(16, 0, 'a', 'b', 'c', 'd', 'e', 'f', 'Editado', '2024-04-10 01:48:24');

-- Volcando estructura para tabla db_centro_medico.tbl_cola_laboratorio
CREATE TABLE IF NOT EXISTS `tbl_cola_laboratorio` (
  `idCola` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `idHoja` int(11) NOT NULL,
  `consultaGenerada` int(11) NOT NULL DEFAULT 0,
  `fechaCola` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCola`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_cola_laboratorio: ~22 rows (aproximadamente)
INSERT INTO `tbl_cola_laboratorio` (`idCola`, `idPaciente`, `idHoja`, `consultaGenerada`, `fechaCola`) VALUES
	(1, 3, 3, 0, '2024-02-22 21:35:49'),
	(2, 2, 4, 0, '2024-03-02 15:53:41'),
	(3, 2, 5, 0, '2024-03-07 15:59:19'),
	(4, 1, 6, 0, '2024-03-16 23:08:23'),
	(5, 3, 7, 0, '2024-03-22 14:51:15'),
	(6, 2, 8, 0, '2024-03-29 22:36:31'),
	(7, 2, 9, 0, '2024-03-29 22:36:42'),
	(8, 2, 10, 0, '2024-03-29 22:36:43'),
	(9, 2, 11, 0, '2024-03-29 22:36:43'),
	(10, 2, 12, 0, '2024-03-29 22:36:44'),
	(11, 2, 13, 0, '2024-03-29 22:51:11'),
	(12, 2, 14, 0, '2024-03-29 22:51:12'),
	(13, 2, 15, 0, '2024-03-29 22:51:13'),
	(14, 2, 16, 0, '2024-03-29 22:52:43'),
	(15, 2, 17, 0, '2024-03-29 22:55:03'),
	(16, 2, 18, 0, '2024-03-30 14:21:12'),
	(17, 2, 19, 0, '2024-03-30 16:55:22'),
	(18, 2, 20, 0, '2024-03-30 17:00:20'),
	(19, 3, 21, 0, '2024-03-30 17:27:26'),
	(20, 4, 22, 0, '2024-03-30 17:30:01'),
	(21, 1, 23, 0, '2024-03-30 22:45:43'),
	(22, 1, 24, 0, '2024-03-30 22:50:07');

-- Volcando estructura para tabla db_centro_medico.tbl_compras_hemo
CREATE TABLE IF NOT EXISTS `tbl_compras_hemo` (
  `idCompraHemo` int(11) NOT NULL AUTO_INCREMENT,
  `tipoCompraHemo` varchar(25) NOT NULL,
  `documentoCompraHemo` varchar(25) NOT NULL,
  `numeroCompraHemo` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL DEFAULT 0,
  `fechaCompraHemo` date NOT NULL,
  `plazoCompraHemo` int(11) NOT NULL,
  `descripcionCompraHemo` text NOT NULL,
  `totalCompraHemo` decimal(9,2) NOT NULL,
  `fechaIngreso` timestamp NOT NULL DEFAULT current_timestamp(),
  `estadoCompraHemo` int(11) NOT NULL DEFAULT 1,
  `ivaPercibido` decimal(9,2) NOT NULL,
  `descuentoCompraHemo` decimal(9,2) NOT NULL,
  `otrosCompraHemo` decimal(9,2) NOT NULL,
  PRIMARY KEY (`idCompraHemo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_compras_hemo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_compras_lab
CREATE TABLE IF NOT EXISTS `tbl_compras_lab` (
  `idCompraLab` int(11) NOT NULL AUTO_INCREMENT,
  `tipoCompraLab` varchar(25) NOT NULL,
  `documentoCompraLab` varchar(25) NOT NULL,
  `numeroCompraLab` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `fechaCompraLab` date NOT NULL,
  `plazoCompraLab` int(11) NOT NULL,
  `descripcionCompraLab` text NOT NULL,
  `totalCompraLab` decimal(9,2) NOT NULL,
  `fechaIngreso` timestamp NOT NULL DEFAULT current_timestamp(),
  `estadoCompraLab` int(11) NOT NULL,
  `ivaPercibido` decimal(9,2) NOT NULL,
  `descuentoCompraLab` decimal(9,2) NOT NULL,
  PRIMARY KEY (`idCompraLab`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_compras_lab: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_compras_limpieza
CREATE TABLE IF NOT EXISTS `tbl_compras_limpieza` (
  `idCompraLimpieza` int(11) NOT NULL AUTO_INCREMENT,
  `tipoCompraLimpieza` varchar(25) NOT NULL,
  `documentoCompraLimpieza` varchar(25) NOT NULL,
  `numeroCompraLimpieza` int(11) NOT NULL,
  `nombreProveedor` varchar(50) NOT NULL,
  `fechaCompraLimpieza` date NOT NULL,
  `plazoCompraLimpieza` int(11) NOT NULL,
  `descripcionCompraLimpieza` text NOT NULL,
  `totalCompraLimpieza` decimal(9,2) NOT NULL,
  `fechaIngreso` timestamp NOT NULL DEFAULT current_timestamp(),
  `estadoCompraLimpieza` int(11) NOT NULL,
  `ivaPercibido` decimal(9,2) NOT NULL,
  `descuentoCompraLimpieza` decimal(9,2) NOT NULL,
  `otrosCompraLimpieza` decimal(9,2) NOT NULL,
  PRIMARY KEY (`idCompraLimpieza`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_compras_limpieza: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_constancia
CREATE TABLE IF NOT EXISTS `tbl_constancia` (
  `idConstancia` int(11) NOT NULL AUTO_INCREMENT,
  `pacienteConstancia` varchar(75) NOT NULL,
  `sexoConstancia` varchar(5) NOT NULL,
  `edadConstancia` int(11) NOT NULL,
  `diaConstancia` int(11) NOT NULL,
  `mesConstancia` varchar(15) NOT NULL,
  `encargadoConstancia` varchar(50) NOT NULL,
  `fechaConstancia` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idConstancia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_constancia: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_consultas
CREATE TABLE IF NOT EXISTS `tbl_consultas` (
  `idConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `nombrePaciente` text NOT NULL,
  `peso` decimal(9,2) NOT NULL DEFAULT 0.00,
  `altura` decimal(9,2) NOT NULL DEFAULT 0.00,
  `imc` decimal(9,2) NOT NULL DEFAULT 0.00,
  `temperaturaPaciente` text NOT NULL DEFAULT '0',
  `presionPaciente` text NOT NULL DEFAULT '0',
  `fechaConsulta` date NOT NULL,
  `hojaCobro` int(11) NOT NULL DEFAULT 0,
  `estadoConsulta` int(11) NOT NULL DEFAULT 1,
  `creadaConsulta` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idConsulta`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_consultas: ~8 rows (aproximadamente)
INSERT INTO `tbl_consultas` (`idConsulta`, `idPaciente`, `idMedico`, `nombrePaciente`, `peso`, `altura`, `imc`, `temperaturaPaciente`, `presionPaciente`, `fechaConsulta`, `hojaCobro`, `estadoConsulta`, `creadaConsulta`) VALUES
	(1, 1, 1, 'Juan Antonio Campos', 72.70, 1.50, 32.31, '0', '0', '2024-01-28', 1, 1, '2024-01-28 15:42:20'),
	(2, 3, 1, 'Adela Maria Romero Cruz', 50.00, 1.50, 22.22, '0', '0', '2024-02-22', 3, 1, '2024-02-22 21:35:49'),
	(3, 2, 1, 'Maria del Carmen Alfaro', 50.00, 1.50, 22.22, '0', '0', '2024-03-02', 4, 1, '2024-03-02 15:53:41'),
	(4, 2, 1, 'Maria del Carmen Alfaro', 60.00, 1.50, 26.67, '0', '0', '2024-03-07', 5, 1, '2024-03-07 15:59:19'),
	(5, 1, 1, 'Juan Antonio Campos', 50.00, 1.50, 22.22, '0', '0', '2024-03-16', 6, 1, '2024-03-16 23:08:24'),
	(9, 2, 2, 'Maria del Carmen Alfaro', 90.00, 180.00, 0.00, '0', '0', '2024-03-30', 18, 1, '2024-03-30 15:38:22'),
	(10, 2, 1, 'Maria del Carmen Alfaro', 80.00, 200.00, 0.00, '0', '0', '2024-03-30', 19, 1, '2024-03-30 16:59:27'),
	(11, 3, 1, 'Adela Maria Romero Cruz', 90.00, 180.00, 0.00, '0', '0', '2024-03-30', 21, 1, '2024-03-30 17:27:44'),
	(12, 4, 2, 'Adela Matilde Romero Cruz', 90.00, 170.00, 0.00, '0', '0', '2024-03-30', 22, 1, '2024-03-30 17:30:15'),
	(13, 1, 1, 'Juan Antonio Campos', 90.00, 180.00, 0.00, '34', '95', '2024-03-30', 24, 0, '2024-03-30 22:59:11');

-- Volcando estructura para tabla db_centro_medico.tbl_consulta_laboratorio
CREATE TABLE IF NOT EXISTS `tbl_consulta_laboratorio` (
  `idConsultaLaboratorio` int(11) NOT NULL AUTO_INCREMENT,
  `codigoConsulta` int(11) NOT NULL,
  `idHoja` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `fechaConsulta` date NOT NULL,
  `idCola` int(11) NOT NULL DEFAULT 0,
  `fechaConsultaLaboratorio` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idConsultaLaboratorio`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_consulta_laboratorio: ~4 rows (aproximadamente)
INSERT INTO `tbl_consulta_laboratorio` (`idConsultaLaboratorio`, `codigoConsulta`, `idHoja`, `idPaciente`, `idMedico`, `fechaConsulta`, `idCola`, `fechaConsultaLaboratorio`) VALUES
	(13, 1, 3, 3, 1, '2024-02-23', 0, '2024-02-23 20:21:47'),
	(14, 2, 4, 2, 1, '2024-03-02', 0, '2024-03-02 15:53:54'),
	(15, 3, 3, 3, 2, '2024-03-16', 1, '2024-03-17 00:11:24'),
	(16, 4, 3, 2, 2, '2024-03-19', 2, '2024-03-19 21:11:51'),
	(17, 5, 22, 2, 2, '2024-04-06', 2, '2024-04-06 22:29:34');

-- Volcando estructura para tabla db_centro_medico.tbl_contancia_incapacidad
CREATE TABLE IF NOT EXISTS `tbl_contancia_incapacidad` (
  `idConstancia` int(11) NOT NULL AUTO_INCREMENT,
  `pacienteConstancia` varchar(75) NOT NULL,
  `sexoConstancia` varchar(15) NOT NULL,
  `edadConstancia` int(11) NOT NULL,
  `diaConstancia` int(11) NOT NULL,
  `mesConstancia` varchar(20) NOT NULL,
  `cirugiaConstancia` text NOT NULL,
  `duracionConstancia` int(11) NOT NULL,
  `encargadoConstancia` varchar(50) NOT NULL,
  `puestoEConstancia` varchar(50) NOT NULL,
  `fechaConstancia` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idConstancia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_contancia_incapacidad: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_control_cajeras
CREATE TABLE IF NOT EXISTS `tbl_control_cajeras` (
  `idControl` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL DEFAULT 0,
  `idHoja` int(11) NOT NULL,
  `correlativoHoja` int(11) NOT NULL,
  `fechaGenerado` date NOT NULL,
  `fechaLiquidado` date NOT NULL,
  `estadoControl` int(11) NOT NULL DEFAULT 1,
  `turnoCorte` varchar(10) NOT NULL,
  `pivoteCorte` int(11) NOT NULL DEFAULT 0,
  `creadoControl` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idControl`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_control_cajeras: ~12 rows (aproximadamente)
INSERT INTO `tbl_control_cajeras` (`idControl`, `idUsuario`, `idHoja`, `correlativoHoja`, `fechaGenerado`, `fechaLiquidado`, `estadoControl`, `turnoCorte`, `pivoteCorte`, `creadoControl`) VALUES
	(30, 1, 179, 1, '2024-01-16', '0000-00-00', 1, '', 0, '2024-01-16 22:19:23'),
	(31, 1, 2, 1, '2024-02-19', '0000-00-00', 1, '', 0, '2024-02-19 21:59:00'),
	(32, 1, 6, 2, '2024-03-16', '0000-00-00', 1, '', 0, '2024-03-16 23:54:42'),
	(33, 1, 7, 3, '2024-03-23', '0000-00-00', 1, '', 0, '2024-03-23 16:20:01'),
	(34, 1, 5, 4, '2024-03-23', '0000-00-00', 1, '', 0, '2024-03-23 21:54:40'),
	(35, 1, 18, 5, '2024-03-30', '0000-00-00', 1, '', 0, '2024-03-30 16:50:50'),
	(36, 1, 19, 6, '2024-03-30', '0000-00-00', 1, '', 0, '2024-03-30 17:00:04'),
	(37, 1, 20, 7, '2024-03-30', '0000-00-00', 1, '', 0, '2024-03-30 17:00:36'),
	(38, 1, 21, 8, '2024-03-30', '0000-00-00', 1, '', 0, '2024-03-30 17:28:11'),
	(39, 1, 22, 9, '2024-03-30', '0000-00-00', 1, '', 0, '2024-03-30 17:30:44'),
	(40, 1, 23, 10, '2024-03-30', '0000-00-00', 1, '', 0, '2024-03-30 22:46:17'),
	(41, 1, 24, 11, '2024-03-30', '0000-00-00', 1, '', 0, '2024-03-30 23:05:28');

-- Volcando estructura para tabla db_centro_medico.tbl_control_descuentos
CREATE TABLE IF NOT EXISTS `tbl_control_descuentos` (
  `idControlD` int(11) NOT NULL AUTO_INCREMENT,
  `idEmDes` int(11) NOT NULL,
  `cantidadControlD` decimal(9,2) NOT NULL,
  `creadoControlD` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idControlD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_control_descuentos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_control_reactivos
CREATE TABLE IF NOT EXISTS `tbl_control_reactivos` (
  `idControlR` int(11) NOT NULL AUTO_INCREMENT,
  `idIReactivo` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` text NOT NULL,
  `cuentaUso` int(11) NOT NULL,
  `estadoControlR` int(11) NOT NULL,
  `conteoExamenes` int(11) NOT NULL DEFAULT 0,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idControlR`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_control_reactivos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_corte_cajera
CREATE TABLE IF NOT EXISTS `tbl_corte_cajera` (
  `idCorteCaja` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `turnoCorte` varchar(10) NOT NULL,
  `fechaCorte` date NOT NULL,
  `creadoCorte` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCorteCaja`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_corte_cajera: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_cropologia
CREATE TABLE IF NOT EXISTS `tbl_cropologia` (
  `idCropologia` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `colorCropologia` varchar(25) NOT NULL,
  `consistenciaCropologia` varchar(25) NOT NULL,
  `mucusCropologia` varchar(25) NOT NULL,
  `hematiesCropologia` varchar(25) NOT NULL,
  `leucocitosCropologia` varchar(25) NOT NULL,
  `ascarisCropologia` varchar(25) NOT NULL,
  `hymenolepisCropologia` varchar(25) NOT NULL,
  `uncinariasCropologia` varchar(25) NOT NULL,
  `tricocefalosCropologia` varchar(25) NOT NULL,
  `larvaStrongyloides` varchar(25) NOT NULL,
  `histolyticaQuistes` varchar(25) NOT NULL,
  `histolyticaTrofozoitos` varchar(25) NOT NULL,
  `coliQuistes` varchar(25) NOT NULL,
  `coliTrofozoitos` varchar(25) NOT NULL,
  `giardiaQuistes` varchar(25) NOT NULL,
  `giardiaTrofozoitos` varchar(25) NOT NULL,
  `blastocystisQuistes` varchar(25) NOT NULL,
  `blastocystisTrofozoitos` varchar(25) NOT NULL,
  `tricomonasQuistes` varchar(25) NOT NULL,
  `tricomonasTrofozoitos` varchar(25) NOT NULL,
  `mesnilliQuistes` varchar(25) NOT NULL,
  `mesnilliTrofozoitos` varchar(25) NOT NULL,
  `nanaQuistes` varchar(25) NOT NULL,
  `nanaTrofozoitos` varchar(25) NOT NULL,
  `restosMacroscopicos` varchar(25) NOT NULL,
  `restosMicroscopicos` varchar(25) NOT NULL,
  `observacionesCropologia` text NOT NULL,
  `tablaExamen` text NOT NULL,
  `fechaCropologia` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCropologia`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_cropologia: ~0 rows (aproximadamente)
INSERT INTO `tbl_cropologia` (`idCropologia`, `examenSolicitado`, `colorCropologia`, `consistenciaCropologia`, `mucusCropologia`, `hematiesCropologia`, `leucocitosCropologia`, `ascarisCropologia`, `hymenolepisCropologia`, `uncinariasCropologia`, `tricocefalosCropologia`, `larvaStrongyloides`, `histolyticaQuistes`, `histolyticaTrofozoitos`, `coliQuistes`, `coliTrofozoitos`, `giardiaQuistes`, `giardiaTrofozoitos`, `blastocystisQuistes`, `blastocystisTrofozoitos`, `tricomonasQuistes`, `tricomonasTrofozoitos`, `mesnilliQuistes`, `mesnilliTrofozoitos`, `nanaQuistes`, `nanaTrofozoitos`, `restosMacroscopicos`, `restosMicroscopicos`, `observacionesCropologia`, `tablaExamen`, `fechaCropologia`) VALUES
	(13, 0, 'Amarillo', 'Pastosa', 'Negativo', 'no se observan', 'no se observan', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'NO SE OBSERVAN', 'escasos', 'escasos', 'Ninguna', '', '2024-04-06 22:46:22');

-- Volcando estructura para tabla db_centro_medico.tbl_cuentas_gastos
CREATE TABLE IF NOT EXISTS `tbl_cuentas_gastos` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCuenta` varchar(75) NOT NULL,
  `clasificacionCuenta` int(11) NOT NULL,
  `descripcionCuenta` text NOT NULL,
  PRIMARY KEY (`idCuenta`),
  KEY `clasificacionCuenta` (`clasificacionCuenta`),
  CONSTRAINT `tbl_cuentas_gastos_ibfk_1` FOREIGN KEY (`clasificacionCuenta`) REFERENCES `tbl_clasificacion_cg` (`idClasificacionCG`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_cuentas_gastos: ~2 rows (aproximadamente)
INSERT INTO `tbl_cuentas_gastos` (`idCuenta`, `nombreCuenta`, `clasificacionCuenta`, `descripcionCuenta`) VALUES
	(83, 'ANDA', 2, 'Para pagos de servicio de agua potable.'),
	(84, 'Honorarios medicos', 3, 'Para el pago de honorarios.');

-- Volcando estructura para tabla db_centro_medico.tbl_cuentas_gestion_insumos
CREATE TABLE IF NOT EXISTS `tbl_cuentas_gestion_insumos` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCuenta` date NOT NULL,
  `estadoCuenta` int(11) NOT NULL DEFAULT 1,
  `cuentaCreada` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_cuentas_gestion_insumos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_cuentas_pagar
CREATE TABLE IF NOT EXISTS `tbl_cuentas_pagar` (
  `idCuentaPagar` int(11) NOT NULL AUTO_INCREMENT,
  `idProveedor` int(11) NOT NULL,
  `fechaCuentaPagar` date NOT NULL,
  `nrcCuentaPagar` varchar(15) NOT NULL,
  `facturaCuentaPagar` varchar(15) NOT NULL,
  `plazoCuentaPagar` int(11) NOT NULL,
  `subtotalCuentaPagar` decimal(9,2) NOT NULL,
  `ivaCuentaPagar` decimal(9,2) NOT NULL,
  `perivaCuentaPagar` decimal(9,2) NOT NULL,
  `totalCuentaPagar` decimal(9,2) NOT NULL,
  `estadoCuentaPagar` int(11) NOT NULL,
  `pivote` int(11) NOT NULL,
  `idGasto` int(11) NOT NULL,
  PRIMARY KEY (`idCuentaPagar`),
  KEY `idProveedor` (`idProveedor`),
  CONSTRAINT `tbl_cuentas_pagar_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `tbl_proveedores` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_cuentas_pagar: ~2 rows (aproximadamente)
INSERT INTO `tbl_cuentas_pagar` (`idCuentaPagar`, `idProveedor`, `fechaCuentaPagar`, `nrcCuentaPagar`, `facturaCuentaPagar`, `plazoCuentaPagar`, `subtotalCuentaPagar`, `ivaCuentaPagar`, `perivaCuentaPagar`, `totalCuentaPagar`, `estadoCuentaPagar`, `pivote`, `idGasto`) VALUES
	(29, 14, '2024-02-19', '123546', '---', 30, 25.00, 0.00, 0.00, 25.00, 1, 0, 0),
	(30, 14, '2024-02-20', '123546', '---', 30, 50.00, 0.00, 0.00, 50.00, 1, 0, 0);

-- Volcando estructura para tabla db_centro_medico.tbl_cuenta_botiquin
CREATE TABLE IF NOT EXISTS `tbl_cuenta_botiquin` (
  `idCuentaBotiquin` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `idHoja` int(11) NOT NULL,
  `tipoHoja` varchar(15) NOT NULL,
  `estadoCuentaBotiquin` int(11) NOT NULL,
  `fechaCuenta` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCuentaBotiquin`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_cuenta_botiquin: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_cuenta_descargos_bm
CREATE TABLE IF NOT EXISTS `tbl_cuenta_descargos_bm` (
  `idDescargosBM` int(11) NOT NULL AUTO_INCREMENT,
  `codigoCuenta` int(11) NOT NULL DEFAULT 0,
  `fechaDescargosBM` date NOT NULL,
  `turnoDescargosBM` varchar(10) NOT NULL DEFAULT '',
  `areaDescargosBM` varchar(2) NOT NULL DEFAULT '',
  `estadoDescargosBM` int(11) NOT NULL DEFAULT 0,
  `creacionDescargosBM` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDescargosBM`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_cuenta_descargos_bm: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_cuenta_isbm
CREATE TABLE IF NOT EXISTS `tbl_cuenta_isbm` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `codigoCuenta` int(11) NOT NULL DEFAULT 0,
  `fechaCuenta` varchar(12) NOT NULL,
  `estadoCuenta` int(11) NOT NULL DEFAULT 0,
  `creacionCuenta` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_cuenta_isbm: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_cuenta_medicamentos
CREATE TABLE IF NOT EXISTS `tbl_cuenta_medicamentos` (
  `idCuentaMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `idCuentaBotiquin` int(11) NOT NULL,
  `idMedicamento` int(11) NOT NULL,
  `cantidadMedicamento` int(11) NOT NULL,
  `fechaUso` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCuentaMedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_cuenta_medicamentos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_dcompra_hemo
CREATE TABLE IF NOT EXISTS `tbl_dcompra_hemo` (
  `idDCompraHemo` int(11) NOT NULL AUTO_INCREMENT,
  `idCompra` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(9,5) NOT NULL,
  `vencimiento` varchar(15) NOT NULL,
  PRIMARY KEY (`idDCompraHemo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_dcompra_hemo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_dcompra_limpieza
CREATE TABLE IF NOT EXISTS `tbl_dcompra_limpieza` (
  `idDCompraLimpieza` int(11) NOT NULL AUTO_INCREMENT,
  `idCompra` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(9,5) NOT NULL,
  `vencimiento` varchar(15) NOT NULL,
  PRIMARY KEY (`idDCompraLimpieza`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_dcompra_limpieza: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_dcuenta_descargosbm
CREATE TABLE IF NOT EXISTS `tbl_dcuenta_descargosbm` (
  `idDescargosBM` int(11) NOT NULL AUTO_INCREMENT,
  `idCuentaDescargo` int(11) NOT NULL,
  `idMedicamento` int(11) NOT NULL,
  `cantidadMedicamento` int(11) NOT NULL,
  `por` int(11) NOT NULL,
  `pivote` varchar(50) NOT NULL DEFAULT '',
  `fechaDecargo` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDescargosBM`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_dcuenta_descargosbm: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_dcuenta_descargoslab
CREATE TABLE IF NOT EXISTS `tbl_dcuenta_descargoslab` (
  `idDescargosLab` int(11) NOT NULL AUTO_INCREMENT,
  `idCuentaDescargo` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL,
  `por` int(11) NOT NULL,
  `fechaDescargo` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDescargosLab`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_dcuenta_descargoslab: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_dcuenta_isbm
CREATE TABLE IF NOT EXISTS `tbl_dcuenta_isbm` (
  `idDetalleCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `idCuenta` int(11) NOT NULL,
  `idMedicamento` int(11) NOT NULL,
  `cantidadMedicamento` int(11) NOT NULL,
  `fechaUso` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDetalleCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_dcuenta_isbm: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_departamentos_sv
CREATE TABLE IF NOT EXISTS `tbl_departamentos_sv` (
  `idDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDepartamento` varchar(30) NOT NULL,
  `isoDepartamento` char(5) NOT NULL,
  `idZona` int(11) NOT NULL,
  PRIMARY KEY (`idDepartamento`),
  KEY `idZona` (`idZona`),
  CONSTRAINT `tbl_departamentos_sv_ibfk_1` FOREIGN KEY (`idZona`) REFERENCES `tbl_zonas_sv` (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_departamentos_sv: ~14 rows (aproximadamente)
INSERT INTO `tbl_departamentos_sv` (`idDepartamento`, `nombreDepartamento`, `isoDepartamento`, `idZona`) VALUES
	(1, 'Ahuachapán', 'SV-AH', 1),
	(2, 'Santa Ana', 'SV-SA', 1),
	(3, 'Sonsonate', 'SV-SO', 1),
	(4, 'La Libertad', 'SV-LI', 2),
	(5, 'Chalatenango', 'SV-CH', 2),
	(6, 'San Salvador', 'SV-SS', 2),
	(7, 'Cuscatlán', 'SV-CU', 3),
	(8, 'La Paz', 'SV-PA', 3),
	(9, 'Cabañas', 'SV-CA', 3),
	(10, 'San Vicente', 'SV-SV', 3),
	(11, 'Usulután', 'SV-US', 4),
	(12, 'Morazán', 'SV-MO', 4),
	(13, 'San Miguel', 'SV-SM', 4),
	(14, 'La Unión', 'SV-UN', 4);

-- Volcando estructura para tabla db_centro_medico.tbl_depuracion_creatinina
CREATE TABLE IF NOT EXISTS `tbl_depuracion_creatinina` (
  `idDepuracion` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `sexoDepuracion` varchar(1) NOT NULL DEFAULT '',
  `edadDepuracion` int(11) NOT NULL DEFAULT 0,
  `volumenDepuracion` decimal(9,2) NOT NULL,
  `tiempoDepuracion` int(11) NOT NULL,
  `csDepuracion` decimal(9,2) NOT NULL,
  `coDepuracion` decimal(9,2) NOT NULL,
  `dcDepuracion` decimal(9,2) NOT NULL,
  `valorNormal` varchar(50) NOT NULL DEFAULT '',
  `proteinasDepuracion` text NOT NULL,
  `observacionesDepuracion` varchar(50) NOT NULL,
  `fechaDepuracion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDepuracion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_depuracion_creatinina: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_descargos_donantes
CREATE TABLE IF NOT EXISTS `tbl_descargos_donantes` (
  `idDescargosDonante` int(11) NOT NULL AUTO_INCREMENT,
  `idCuentaDescargo` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL,
  `por` int(11) NOT NULL,
  `pivote` int(11) NOT NULL,
  `examenPivote` int(11) NOT NULL,
  `fechaDescargo` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDescargosDonante`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_descargos_donantes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_descuentos_planilla
CREATE TABLE IF NOT EXISTS `tbl_descuentos_planilla` (
  `idDP` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDP` text NOT NULL,
  `creadaDP` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDP`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_descuentos_planilla: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_detalle_compra_lab
CREATE TABLE IF NOT EXISTS `tbl_detalle_compra_lab` (
  `idDetalleCL` int(11) NOT NULL AUTO_INCREMENT,
  `idInsumoLab` int(11) NOT NULL,
  `idCompraIL` int(11) NOT NULL,
  `cantidadDetalleCL` decimal(9,2) NOT NULL,
  `precioDetalleCL` decimal(9,2) NOT NULL,
  `vencimientoDetalleCL` date NOT NULL,
  `medidaDetalleCL` varchar(10) NOT NULL,
  `descuentoDetalleCL` decimal(9,2) NOT NULL,
  `ingresoDetalleCL` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDetalleCL`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_detalle_compra_lab: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_detalle_consulta
CREATE TABLE IF NOT EXISTS `tbl_detalle_consulta` (
  `idDetalleConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `idConsultaLaboratorio` int(11) NOT NULL,
  `idExamen` int(11) NOT NULL,
  `tipoExamen` int(11) NOT NULL,
  `nombreExamen` text NOT NULL,
  `examenSolicitado` int(11) NOT NULL,
  `fechaDetalleConsulta` timestamp NOT NULL DEFAULT current_timestamp(),
  `horaDetalleConsulta` text NOT NULL,
  `examenes` text NOT NULL,
  `tablaExamen` text NOT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDetalleConsulta`)
) ENGINE=InnoDB AUTO_INCREMENT=324 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_detalle_consulta: ~14 rows (aproximadamente)
INSERT INTO `tbl_detalle_consulta` (`idDetalleConsulta`, `idConsultaLaboratorio`, `idExamen`, `tipoExamen`, `nombreExamen`, `examenSolicitado`, `fechaDetalleConsulta`, `horaDetalleConsulta`, `examenes`, `tablaExamen`, `creado`) VALUES
	(300, 13, 37, 6, 'Quimica sanguinea', 0, '2024-03-04 14:32:13', '08:32:13 am', '', '', '2024-04-06 22:45:22'),
	(302, 13, 19, 13, 'Orina', 0, '2024-03-04 15:41:50', '09:41:50 am', '', '', '2024-04-06 22:45:22'),
	(305, 13, 15, 12, 'Hematologia', 0, '2024-03-04 16:45:15', '10:45:15 am', '', '', '2024-04-06 22:45:22'),
	(310, 14, 139, 10, 'Testing', 0, '2024-03-05 16:11:06', '10:11:06 am', '', '', '2024-04-06 22:45:22'),
	(313, 14, 22, 13, 'Orina', 0, '2024-03-07 15:53:56', '09:53:56 am', '', '', '2024-04-06 22:45:22'),
	(315, 16, 13, 7, 'Coprologia', 0, '2024-04-06 22:46:22', '04:46:22 pm', '', '<table class="table">\r\n                                    <thead></thead>\r\n                                    <tbody class="text-left"><tr>\r\n                                <td colspan="2"><strong class="">Color</strong></td>\r\n                                <td colspan="2" style="text-align: center;">Amarillo</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Consistencia</strong></td>\r\n                                <td colspan="2" style="text-align: center;">Pastosa</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Mucus</strong></td>\r\n                                <td colspan="2" style="text-align: center;">Negativo</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Hematíes</strong></td>\r\n                                <td colspan="2" style="text-align: center;">no se observan x campo</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Leucocitos</strong></td>\r\n                                <td colspan="2" style="text-align: center;">no se observan x campo</td>\r\n                            </tr><tr>\r\n                            <th colspan="4" style="color: #075480; text-align: center; font-size: 12px; background: rgba(7, 84, 128, 0.1); height: 25px" ><strong>METAZOARIOS</strong></th>\r\n                        </tr><tr>\r\n                                <td colspan="2"><strong class="">Ascaris lumbricoides</strong></td>\r\n                                <td colspan="2" style="text-align: center;">NO SE OBSERVAN</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Hymenolepis</strong></td>\r\n                                <td colspan="2" style="text-align: center;">NO SE OBSERVAN</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Uncinarias</strong></td>\r\n                                <td colspan="2" style="text-align: center;">NO SE OBSERVAN</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Trichuris trichiura</strong></td>\r\n                                <td colspan="2" style="text-align: center;">NO SE OBSERVAN</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Larva strongyloides stercoralis </strong></td>\r\n                                <td colspan="2" style="text-align: center;">NO SE OBSERVAN</td>\r\n                            </tr><tr>\r\n                            <th colspan="4" style="color: #075480; color: #075480; text-align: center; font-size: 12px; background: rgba(7, 84, 128, 0.1); height: 25px"><strong>PROTOZOARIOS</strong></th>\r\n                        </tr><tr>\r\n                            <td></td>\r\n                            <td></td>\r\n                            <td style="text-align: center; color: #075480;"><strong>Quistes</strong></td>\r\n                            <td style="text-align: center; color: #075480;"><strong>Trofozoitos</strong></td>\r\n                        </tr><tr>\r\n                                <td colspan="2"><strong class="">Entamoeba histolytica</strong></td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Entamoeba coli</strong></td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Giardia lamblia</strong></td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Blastocystis hominis</strong></td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Tricomonas hominis</strong></td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Chilomastix mesnilli</strong></td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                            </tr><tr>\r\n                                <td colspan="2"><strong class="">Endolimax nana</strong></td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                                <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                            </tr><tr>\r\n                            <th colspan="4" style="color: #075480; color: #075480; color: #075480; text-align: center; font-size: 12px; background: rgba(7, 84, 128, 0.1); height: 25px"><strong>RESTOS ALIMENTICIOS</strong></th>\r\n                        </tr><tr>\r\n                                    <td colspan="2"><strong class="borderAzul">Restos Alimenticios Macroscópicos</strong></td>\r\n                                    <td colspan="2" style="text-align: center;">escasos</td>\r\n                                </tr><tr>\r\n                                    <td colspan="2"><strong class="borderAzul">Restos Alimenticios Microscópicos</strong></td>\r\n                                    <td colspan="2" style="text-align: center;">escasos</td>\r\n                                </tr></tbody><table>', '2024-04-06 22:46:22'),
	(316, 16, 23, 13, 'Orina', 0, '2024-04-09 01:05:29', '07:05:29 pm', '', '<table class="table">\r\n                                    <thead></thead>\r\n                                    <tbody class="text-left"><tr>\r\n                                                <td style="text-align: center; background: rgba(7, 84, 128, 0.1);" colspan=4><strong>Análisis Fisico-Quimico </strong></td>\r\n                                            </tr><tr>\r\n                                        <td><strong class="">Color</strong></td>\r\n                                        <td style="text-align: center;">Verde</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Aspecto</strong></td>\r\n                                        <td style="text-align: center;">Rojizo</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Reacción</strong></td>\r\n                                        <td style="text-align: center;">Loca</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Densidad</strong></td>\r\n                                        <td style="text-align: center;">Fuerte</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">pH</strong></td>\r\n                                        <td style="text-align: center;">5</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Proteínas</strong></td>\r\n                                        <td style="text-align: center;">NEGATIVO</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Glucosa</strong></td>\r\n                                        <td style="text-align: center;">NEGATIVO</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Pigmentos biliares</strong></td>\r\n                                        <td style="text-align: center;">NEGATIVO</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Sangre oculta</strong></td>\r\n                                        <td style="text-align: center;">NEGATIVO</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Nitrito</strong></td>\r\n                                        <td style="text-align: center;">NEGATIVO</td>\r\n                                        <td style="text-align: center;"></td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Cuerpos cetónicos</strong></td>\r\n                                        <td style="text-align: center;">NEGATIVO</td>\r\n                                        <td style="text-align: center;"></td>\r\n                                    </tr><tr>\r\n                                    <td style="text-align: center; background: rgba(7, 84, 128, 0.1);" colspan=4><strong>Análisis Microscopico </strong></td>\r\n                                </tr><tr>\r\n                                        <td><strong class="">Granulosos</strong></td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Cilindros luicocitarios</strong></td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Cilindros</strong></td>\r\n                                        <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Otros cilindros</strong></td>\r\n                                        <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Leucocitos</strong></td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Hematíes</strong></td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Células epiteliales</strong></td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                        <td style="text-align: center;"></td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Elementos minerales</strong></td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                        <td style="text-align: center;"></td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Levadura</strong></td>\r\n                                        <td style="text-align: center;">NEGATIVO</td>\r\n                                        <td style="text-align: center;">-</td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Otros</strong></td>\r\n                                        <td style="text-align: center;">NO SE OBSERVAN</td>\r\n                                        <td style="text-align: center;"></td>\r\n                                    </tr><tr>\r\n                                        <td><strong class="">Observaciones</strong></td>\r\n                                        <td style="text-align: center;">Esta todo bien verde</td>\r\n                                        <td></td>\r\n                                    </tr></tbody><table>', '2024-04-09 01:05:29'),
	(317, 16, 16, 12, 'Hematologia', 0, '2024-04-10 01:16:08', '07:16:08 pm', '', '<table class="table">\r\n                        <thead></thead>\r\n                        <tbody class="text-left"><tr>\r\n                                <td><strong class="">Eritrocitos</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">4-6 millones</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Hematócrito</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold">36-50%</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Hemoglobina</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold"> 12-16.2 g/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">VCM</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold"> 82-96 fl</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">HCM</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold">27-32 pg</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">CHCM</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold"> 30-35 g/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Leucocitos</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold">5-10 mil</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Neutrofilos segmentados</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">11</td>\r\n                                <td style="text-align: center;  font-weight: bold">50-70%</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Neutrofilos en banda</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold">0-5%</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Linfocitos</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold">20-40%</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Eosinófilos</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold">0-5%</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Monocitos</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold">2-8%</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Basófilos</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold">0-1%</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Blastos</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold">%</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Reticulocitos</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold">0.5-2.0%</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Eritrosedimentación</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold">0-20 mm/hr</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Plaquetas</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold">150,000-450,000 xmmc</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Gota gruesa</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold">1</td>\r\n                                <td style="text-align: center;  font-weight: bold"></td>\r\n                            </tr><tr>\r\n                                <td colspan=3 style="text-align: center; background: rgba(7, 84, 128, 0.1);"><strong class="">Frotis de sangre periferica</strong></td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Linea roja</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold" colspan=2>1</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Linea blanca</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold" colspan=2>1</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Linea plaquetaria</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold" colspan=2>1</td>\r\n                            </tr><tr>\r\n                                <td><strong class="">Observaciones</strong></td>\r\n                                <td style="text-align: center;  font-weight: bold" colspan=2>Alguna 2 que 3</td>\r\n                            </tr></tbody><table>', '2024-04-10 01:16:08'),
	(318, 17, 39, 6, 'Quimica sanguinea', 0, '2024-04-10 01:34:41', '07:34:41 pm', '', '<table class="table">\r\n                                    <thead></thead>\r\n                                    <tbody class="text-left"><tr>\r\n                                <td><strong>Glucosa</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">55-110 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Glucosa postprandial</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">140 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Colesterol</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">Menor de 200 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Colesterol HDL</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">35-65 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Colesterol LDL</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">Menor de 150 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Triglicéridos</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">Menor de 150 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Ácido úrico</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">2.5-7.0 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Urea</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">10.0 a 48.1 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Nitrógeno Ureico</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">4.7-22.5 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Creatinina</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">0.7-1.4 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Amilasa</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">U/L</td>\r\n                                <td style="text-align: center; font-weight: bold">Menor de 90 U/L</td>\r\n                            </tr><tr>\r\n                                <td><strong>Lipasa</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">U/L</td>\r\n                                <td style="text-align: center; font-weight: bold">Menor de 38 U/L</td>\r\n                            </tr><tr>\r\n                                <td><strong>Fosfatasa alcalina</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">11</td>\r\n                                <td style="text-align: center; font-weight: bold">U/L</td>\r\n                                <td style="text-align: center; font-weight: bold">98-279 U/L</td>\r\n                            </tr><tr>\r\n                                <td><strong>TGP</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">U/L</td>\r\n                                <td style="text-align: center; font-weight: bold">1-40 U/L</td>\r\n                            </tr><tr>\r\n                                <td><strong>TGO</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">U/L</td>\r\n                                <td style="text-align: center; font-weight: bold">1-38 U/L</td>\r\n                            </tr><tr>\r\n                                <td><strong>Hemoglobina glicosilada</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">%</td>\r\n                                <td style="text-align: center; font-weight: bold">4.5-6.5%</td>\r\n                            </tr><tr>\r\n                                <td><strong>Proteína total</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">g/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">6.7-8.7 d/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Albúmina</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">g/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">3.5-5.0 g/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Globulina</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">g/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">2.3-3.4 g/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Relación A/G</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold"></td>\r\n                                <td style="text-align: center; font-weight: bold">1.2-2.2</td>\r\n                            </tr><tr>\r\n                                <td><strong>Bilirrubina total</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">Hasta 1.1 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Bilirrubina directa</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">11</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">Hasta 0.25 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Bilirrubina indirecta</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold"></td>\r\n                            </tr><tr>\r\n                                <td><strong>Sodio</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mmol/L</td>\r\n                                <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>\r\n                            </tr><tr>\r\n                                <td><strong>Potasio</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mmol/L</td>\r\n                                <td style="text-align: center; font-weight: bold">3.6-5.5 mmol/L</td>\r\n                            </tr><tr>\r\n                                <td><strong>Cloro</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mmol/L</td>\r\n                                <td style="text-align: center; font-weight: bold">95-115 mmol/L</td>\r\n                            </tr><tr>\r\n                                <td><strong>Magnesio</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">1.6-2.5 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Calcio</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">8.1-10.4 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Fosforo</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">2.5-5.0 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>CPK Total</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">U/L</td>\r\n                                <td style="text-align: center; font-weight: bold">0-195 U/L</td>\r\n                            </tr><tr>\r\n                                <td><strong>CPK MB</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">U/L</td>\r\n                                <td style="text-align: center; font-weight: bold">Menor a 24 U/L</td>\r\n                            </tr><tr>\r\n                                <td><strong>LDH</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">11</td>\r\n                                <td style="text-align: center; font-weight: bold">U/L</td>\r\n                                <td style="text-align: center; font-weight: bold">230-460 U/L</td>\r\n                            </tr><tr>\r\n                                <td><strong>Troponina I</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">ng/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">VN: menor a 0.30 ng/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Observaciones</strong></td>\r\n                                <td style="text-align: center; font-weight: bold" colspan=3>1</td>\r\n                            </tr></tbody><table>', '2024-04-10 01:34:41'),
	(319, 16, 40, 6, 'Quimica sanguinea', 0, '2024-04-10 01:35:19', '07:35:19 pm', '', '<table class="table">\r\n                                    <thead></thead>\r\n                                    <tbody class="text-left"><tr>\r\n                                <td><strong>Glucosa</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">55-110 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Glucosa postprandial</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">140 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Potasio</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">1</td>\r\n                                <td style="text-align: center; font-weight: bold">mmol/L</td>\r\n                                <td style="text-align: center; font-weight: bold">3.6-5.5 mmol/L</td>\r\n                            </tr><tr>\r\n                                <td><strong>Fosforo</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">11</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">2.5-5.0 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>Observaciones</strong></td>\r\n                                <td style="text-align: center; font-weight: bold" colspan=3>Editado</td>\r\n                            </tr></tbody><table>', '2024-04-10 01:35:19'),
	(320, 16, 16, 4, 'Tipeo sanguineo', 0, '2024-04-10 01:42:53', '07:42:53 pm', '', '<table class="table">\r\n                                    <thead></thead>\r\n                                    <tbody class="text-left"><tr>\r\n                                <td style="padding-left: 50px"><strong class="">Muestra</strong></td>\r\n                                <td style="text-align: center; font-weight: bold; font-size: 12px">Sangre</td>\r\n                            </tr><tr>\r\n                                <td style="padding-left: 50px"><strong class="">Grupo sanguíneo</strong></td>\r\n                                <td style="text-align: center; font-weight: bold; font-size: 12px">A</td>\r\n                            </tr><tr>\r\n                                <td style="padding-left: 50px"><strong class="">Factor RH</strong></td>\r\n                                <td style="text-align: center; font-weight: bold; font-size: 12px">Positivo</td>\r\n                            </tr><tr>\r\n                                <td style="padding-left: 50px"><strong class="">Du</strong></td>\r\n                                <td style="text-align: center; font-weight: bold; font-size: 12px">N/A</td>\r\n                            </tr></tbody><table>', '2024-04-10 01:42:53'),
	(321, 16, 16, 3, 'Coagulación', 0, '2024-04-10 01:48:24', '07:48:24 pm', '', '<table class="table">\r\n                                    <thead></thead>\r\n                                    <tbody class="text-left"><tr>\r\n                                <td><strong>Tiempo de Protombina</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">a</td>\r\n                                <td style="text-align: center; font-weight: bold">Segundos</td>\r\n                                <td style="text-align: center; font-weight: bold">10-14</td>\r\n                            </tr><tr>\r\n                                <td><strong>Tiempo Parcial de Tromboplastina</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">b</td>\r\n                                <td style="text-align: center; font-weight: bold">Segundos</td>\r\n                                <td style="text-align: center; font-weight: bold">20-33</td>\r\n                            </tr><tr>\r\n                                <td><strong>Fibrinógeno</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">c</td>\r\n                                <td style="text-align: center; font-weight: bold">mg/dl</td>\r\n                                <td style="text-align: center; font-weight: bold">200-400 mg/dl</td>\r\n                            </tr><tr>\r\n                                <td><strong>INR</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">d</td>\r\n                                <td style="text-align: center; font-weight: bold">-</td>\r\n                                <td style="text-align: center; font-weight: bold">-</td>\r\n                            </tr><tr>\r\n                                <td><strong>Tiempo de sangramiento</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">e</td>\r\n                                <td style="text-align: center; font-weight: bold">Minutos</td>\r\n                                <td style="text-align: center; font-weight: bold">1-4</td>\r\n                            </tr><tr>\r\n                                <td><strong>Tiempo de coagulación</strong></td>\r\n                                <td style="text-align: center; font-weight: bold">f</td>\r\n                                <td style="text-align: center; font-weight: bold">Minutos</td>\r\n                                <td style="text-align: center; font-weight: bold">4-9</td>\r\n                            </tr><tr>\r\n                                <td><strong>Observación</strong></td>\r\n                                <td style="text-align: center; font-weight: bold" colspan=3>Editado</td>\r\n                            </tr></tbody><table>', '2024-04-10 01:48:24'),
	(322, 17, 141, 10, 'CEA', 0, '2024-04-10 01:55:46', '07:55:46 pm', '', '<table class="table">\r\n                                    <thead></thead>\r\n                                    <tbody class="text-left"><tr>\r\n                                <td style="text-align: center; font-size: 12px; background: rgba(7, 84, 128, 0.1); height: 30px" colspan="3"><strong class="borderAzul">Examen realizado: </strong>CEA</td>\r\n                            </tr><tr>\r\n                                <td style="text-align: center;"><strong class="borderAzul">Muestra</strong></td>\r\n                                <td style="text-align: center;">5</td>\r\n                                <td style="text-align: center;"></td>\r\n                            </tr><tr>\r\n                                    <td style="text-align: center;"><strong class="borderAzul">Resultado</strong></td>\r\n                                    <td style="text-align: center;">5</td>\r\n                                    <td style="text-align: center;">5</td>\r\n                                </tr><tr>\r\n                                <td style="text-align: center;"><strong class="borderAzul">Observaciones</strong></td>\r\n                                <td style="text-align: center;">5</td>\r\n                                <td style="text-align: center;"></td>\r\n                            </tr></tbody><table>', '2024-04-10 01:55:46'),
	(323, 16, 142, 10, 'CEA', 0, '2024-04-10 01:56:27', '07:56:27 pm', '', '<table class="table">\r\n                                    <thead></thead>\r\n                                    <tbody class="text-left"><tr>\r\n                                <td style="text-align: center; font-size: 12px; background: rgba(7, 84, 128, 0.1); height: 30px" colspan="3"><strong class="borderAzul">Examen realizado: </strong></td>\r\n                            </tr><tr>\r\n                                <td style="text-align: center;"><strong class="borderAzul">Muestra</strong></td>\r\n                                <td style="text-align: center;">Test</td>\r\n                                <td style="text-align: center;"></td>\r\n                            </tr><tr>\r\n                                    <td style="text-align: center;"><strong class="borderAzul">Resultado</strong></td>\r\n                                    <td style="text-align: center;">Bueno</td>\r\n                                    <td style="text-align: center;">2.5 mg/dl</td>\r\n                                </tr><tr>\r\n                                <td style="text-align: center;"><strong class="borderAzul">Observaciones</strong></td>\r\n                                <td style="text-align: center;">Testing</td>\r\n                                <td style="text-align: center;"></td>\r\n                            </tr></tbody><table>', '2024-04-10 01:56:27');

-- Volcando estructura para tabla db_centro_medico.tbl_detalle_planilla
CREATE TABLE IF NOT EXISTS `tbl_detalle_planilla` (
  `idDetallePlanilla` int(11) NOT NULL AUTO_INCREMENT,
  `idEmpleado` int(11) NOT NULL,
  `salarioEmpleado` decimal(9,2) NOT NULL,
  `precioHoraExtra` decimal(9,2) NOT NULL,
  `bonoEmpleado` decimal(9,2) NOT NULL,
  `otrosDetallePlanilla` decimal(9,2) NOT NULL,
  `horasExtras` int(11) NOT NULL,
  `totalHorasExtras` decimal(9,2) NOT NULL,
  `isssDetallePlanilla` decimal(9,2) NOT NULL,
  `afpDetallePlanilla` decimal(9,2) NOT NULL,
  `rentaDetallePlanilla` decimal(9,2) NOT NULL,
  `despuesRetenciones` decimal(9,2) NOT NULL,
  `totalVacaciones` decimal(9,2) NOT NULL,
  `liquidoDetallePlanilla` decimal(9,2) NOT NULL,
  `idPlanilla` int(11) NOT NULL,
  `editadoDetallePlanilla` int(11) NOT NULL DEFAULT 0,
  `descuentosPlanilla` int(11) NOT NULL DEFAULT 0,
  `detalleDescuentos` text NOT NULL DEFAULT ' ',
  `fechaDetallePlanilla` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDetallePlanilla`)
) ENGINE=InnoDB AUTO_INCREMENT=572 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_detalle_planilla: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_detalle_procedimientos
CREATE TABLE IF NOT EXISTS `tbl_detalle_procedimientos` (
  `idDetalleProcedimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idProcedimiento` int(11) NOT NULL,
  `idHoja` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `precioInsumo` decimal(9,3) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL,
  `por` int(11) NOT NULL DEFAULT 0,
  `eliminado` int(11) NOT NULL DEFAULT 0,
  `motivoEliminado` text NOT NULL,
  `reintegro` int(11) NOT NULL DEFAULT 0,
  `fechaAgregado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDetalleProcedimiento`),
  KEY `idDetalleProcedimiento` (`idHoja`),
  KEY `idInsumo` (`idInsumo`),
  CONSTRAINT `tbl_detalle_procedimientos_ibfk_3` FOREIGN KEY (`idHoja`) REFERENCES `tbl_hoja_cobro` (`idHoja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_detalle_procedimientos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_donantes
CREATE TABLE IF NOT EXISTS `tbl_donantes` (
  `idDonante` int(11) NOT NULL AUTO_INCREMENT,
  `codigoDonante` varchar(15) NOT NULL,
  `nombreDonante` varchar(50) NOT NULL,
  `edadDonante` int(11) NOT NULL DEFAULT 0,
  `duiDonante` varchar(10) NOT NULL,
  `ultimaFecha` date NOT NULL,
  `fechaDonante` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idDonante`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_donantes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_donantes_insumo
CREATE TABLE IF NOT EXISTS `tbl_donantes_insumo` (
  `idDonanteInsumo` int(11) NOT NULL AUTO_INCREMENT,
  `idDonante` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL DEFAULT 1,
  `precioInsumo` decimal(9,2) NOT NULL,
  `codigoDonanteInsumo` int(11) NOT NULL DEFAULT 0,
  `fechaDonanteInsumo` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDonanteInsumo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_donantes_insumo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_donantes_salidas
CREATE TABLE IF NOT EXISTS `tbl_donantes_salidas` (
  `idDonanteSalida` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePaciente` varchar(50) NOT NULL,
  `edadPaciente` int(11) NOT NULL,
  `areaDonanteSalida` varchar(25) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL,
  `precioInsumo` int(11) NOT NULL,
  `medicoDonanteSalida` int(11) NOT NULL,
  `codigoDonanteSalida` int(11) NOT NULL,
  `fechaDonanteSalida` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDonanteSalida`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_donantes_salidas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_dsalidas_hemo
CREATE TABLE IF NOT EXISTS `tbl_dsalidas_hemo` (
  `idDescargosHemo` int(11) NOT NULL AUTO_INCREMENT,
  `idCuentaDescargo` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL,
  `por` int(11) NOT NULL,
  `entregadoA` text NOT NULL,
  `fechaDescargo` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDescargosHemo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_dsalidas_hemo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_dsalidas_limpieza
CREATE TABLE IF NOT EXISTS `tbl_dsalidas_limpieza` (
  `idDescargosLimpieza` int(11) NOT NULL AUTO_INCREMENT,
  `idCuentaDescargo` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL,
  `por` int(11) NOT NULL,
  `entregadoA` text NOT NULL,
  `fechaDescargo` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDescargosLimpieza`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_dsalidas_limpieza: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_empleados
CREATE TABLE IF NOT EXISTS `tbl_empleados` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEmpleado` varchar(50) NOT NULL,
  `apellidoEmpleado` varchar(50) NOT NULL,
  `edadEmpleado` int(11) NOT NULL,
  `telefonoEmpleado` varchar(10) NOT NULL,
  `cargoEmpleado` int(11) NOT NULL,
  `sexoEmpleado` varchar(10) NOT NULL,
  `duiEmpleado` varchar(10) NOT NULL,
  `nitEmpleado` varchar(25) NOT NULL,
  `estadoEmpleado` varchar(15) NOT NULL,
  `nacimientoEmpleado` date NOT NULL,
  `departamentoEmpleado` int(11) DEFAULT NULL,
  `municipioEmpleado` int(11) DEFAULT NULL,
  `direccionEmpleado` text NOT NULL,
  `tipoEmpleado` int(11) NOT NULL DEFAULT 0,
  `ingresoEmpleado` date NOT NULL,
  PRIMARY KEY (`idEmpleado`),
  KEY `departamentoEmpleado` (`departamentoEmpleado`),
  KEY `municipioEmpleado` (`municipioEmpleado`),
  KEY `cargoEmpleado` (`cargoEmpleado`),
  CONSTRAINT `tbl_empleados_ibfk_1` FOREIGN KEY (`municipioEmpleado`) REFERENCES `tbl_municipios_sv` (`idMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_empleados_ibfk_2` FOREIGN KEY (`cargoEmpleado`) REFERENCES `tbl_cargos` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_empleados: ~0 rows (aproximadamente)
INSERT INTO `tbl_empleados` (`idEmpleado`, `nombreEmpleado`, `apellidoEmpleado`, `edadEmpleado`, `telefonoEmpleado`, `cargoEmpleado`, `sexoEmpleado`, `duiEmpleado`, `nitEmpleado`, `estadoEmpleado`, `nacimientoEmpleado`, `departamentoEmpleado`, `municipioEmpleado`, `direccionEmpleado`, `tipoEmpleado`, `ingresoEmpleado`) VALUES
	(1, 'Edwin Alexander', 'Cortez Orantes', 29, '0000-0000', 1, 'Masculino', '00000000-0', '0000-000000-000-0', 'Casado/a', '1992-01-03', 11, 42, 'Usulután', 0, '2021-01-04');

-- Volcando estructura para tabla db_centro_medico.tbl_empleado_x_descuentos
CREATE TABLE IF NOT EXISTS `tbl_empleado_x_descuentos` (
  `idEmDes` int(11) NOT NULL AUTO_INCREMENT,
  `idEmpleado` int(11) NOT NULL,
  `idDescuento` int(11) NOT NULL,
  `montoEmDes` decimal(9,2) NOT NULL,
  `cuotaDescuento` decimal(9,2) NOT NULL,
  `totalAbonado` decimal(9,2) NOT NULL DEFAULT 0.00,
  `estadoDescuento` int(11) NOT NULL DEFAULT 1,
  `creadoEmDes` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idEmDes`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_empleado_x_descuentos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_espermograma
CREATE TABLE IF NOT EXISTS `tbl_espermograma` (
  `idEspermograma` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `colorEspermograma` varchar(25) NOT NULL,
  `phEspermograma` varchar(25) NOT NULL,
  `volumenEspermograma` varchar(25) NOT NULL,
  `licuefaccionEspermograma` varchar(25) NOT NULL,
  `viscocidadEspermograma` varchar(25) NOT NULL,
  `abstinenciaEspermograma` varchar(25) NOT NULL,
  `hematiesEspermograma` varchar(25) NOT NULL,
  `leucocitosEspermograma` varchar(25) NOT NULL,
  `epitelialesEspermograma` varchar(25) NOT NULL,
  `bacteriasEspermograma` varchar(25) NOT NULL,
  `mprEspermograma` varchar(25) NOT NULL,
  `mplEspermograma` varchar(25) NOT NULL,
  `mnpEspermograma` varchar(25) NOT NULL,
  `inmovilesEspermograma` varchar(25) NOT NULL,
  `recuentoEspermograma` varchar(25) NOT NULL,
  `normalesEspermograma` varchar(25) NOT NULL,
  `anormalCbEspermograma` varchar(25) NOT NULL,
  `anormalClEspermograma` varchar(25) NOT NULL,
  `vivosEspermograma` varchar(25) NOT NULL,
  `muertosEspermograma` varchar(25) NOT NULL,
  `observacionesEspermograma` varchar(25) NOT NULL,
  `fechaEspermograma` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idEspermograma`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_espermograma: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_examenes_realizados
CREATE TABLE IF NOT EXISTS `tbl_examenes_realizados` (
  `idExamenRealizado` int(11) NOT NULL AUTO_INCREMENT,
  `idExamen` int(11) NOT NULL,
  `idConsulta` int(11) NOT NULL,
  `fechaExamenRealizado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idExamenRealizado`)
) ENGINE=InnoDB AUTO_INCREMENT=441 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_examenes_realizados: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_externos
CREATE TABLE IF NOT EXISTS `tbl_externos` (
  `idExterno` int(11) NOT NULL AUTO_INCREMENT,
  `nombreExterno` varchar(100) NOT NULL,
  `tipoEntidad` int(11) NOT NULL,
  `idEntidad` int(11) NOT NULL,
  `descripcionExterno` text NOT NULL,
  `pivoteExterno` int(11) NOT NULL,
  `separacionMedico` int(11) DEFAULT 0,
  PRIMARY KEY (`idExterno`),
  KEY `idProveedor` (`idEntidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_externos: ~4 rows (aproximadamente)
INSERT INTO `tbl_externos` (`idExterno`, `nombreExterno`, `tipoEntidad`, `idEntidad`, `descripcionExterno`, `pivoteExterno`, `separacionMedico`) VALUES
	(1, 'Dr. Marcos Alonso(Honorarios)', 1, 1, 'Para pago de honorarios', 0, 0),
	(2, 'Farmalab', 2, 12, 'Para pago de cuentas', 0, 0),
	(3, 'Texaco', 2, 14, 'Para pago de honorarios', 0, 0),
	(4, 'Juan Antonio Carcamo Flores(Honorarios)', 1, 2, 'Para pago de honorarios', 0, 0);

-- Volcando estructura para tabla db_centro_medico.tbl_externos_generados
CREATE TABLE IF NOT EXISTS `tbl_externos_generados` (
  `idExternoGenerado` int(11) NOT NULL AUTO_INCREMENT,
  `inicioExternoGenerado` int(11) NOT NULL,
  `finExternoGenerado` int(11) NOT NULL,
  `fechaGenerado` date NOT NULL,
  `fechaExternoGenerado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idExternoGenerado`),
  KEY `inicioExternoGenerado` (`inicioExternoGenerado`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_externos_generados: ~0 rows (aproximadamente)
INSERT INTO `tbl_externos_generados` (`idExternoGenerado`, `inicioExternoGenerado`, `finExternoGenerado`, `fechaGenerado`, `fechaExternoGenerado`) VALUES
	(27, 1, 3, '2024-03-23', '2024-03-23 16:27:28');

-- Volcando estructura para tabla db_centro_medico.tbl_fabricantes
CREATE TABLE IF NOT EXISTS `tbl_fabricantes` (
  `idFabricante` int(11) NOT NULL AUTO_INCREMENT,
  `nombreFabricante` varchar(50) NOT NULL,
  `tiempoFabricante` int(11) NOT NULL,
  `estadoFabricante` int(11) NOT NULL DEFAULT 1,
  `creadoFabricante` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idFabricante`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_fabricantes: ~0 rows (aproximadamente)
INSERT INTO `tbl_fabricantes` (`idFabricante`, `nombreFabricante`, `tiempoFabricante`, `estadoFabricante`, `creadoFabricante`) VALUES
	(1, 'Fabricante 1', 30, 1, '2024-02-04 00:00:52');

-- Volcando estructura para tabla db_centro_medico.tbl_facturas
CREATE TABLE IF NOT EXISTS `tbl_facturas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `idHojaCobro` int(11) NOT NULL,
  `numeroFactura` int(11) NOT NULL,
  `tipoFactura` int(11) NOT NULL,
  `estadoFactura` int(11) NOT NULL,
  `fechaMostrar` text NOT NULL,
  `clienteFactura` text NOT NULL,
  `duiFactura` text NOT NULL,
  `fechaFactura` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_facturas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_facturas_emitidas
CREATE TABLE IF NOT EXISTS `tbl_facturas_emitidas` (
  `idFacturaEmitida` int(11) NOT NULL AUTO_INCREMENT,
  `idHoja` int(11) NOT NULL,
  `numeroFactura` int(11) NOT NULL,
  `totalFactura` decimal(9,2) NOT NULL,
  `fechaFactura` date NOT NULL,
  `fechaFacturaEmitida` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idFacturaEmitida`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_facturas_emitidas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_factura_compra
CREATE TABLE IF NOT EXISTS `tbl_factura_compra` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `tipoFactura` varchar(25) NOT NULL,
  `documentoFactura` varchar(25) NOT NULL,
  `numeroFactura` varchar(15) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `fechaFactura` varchar(15) NOT NULL,
  `plazoFactura` int(11) NOT NULL,
  `descripcionFactura` text NOT NULL,
  `totalFactura` decimal(9,2) NOT NULL,
  `fechaIngreso` timestamp NOT NULL DEFAULT current_timestamp(),
  `estadoFactura` int(11) NOT NULL,
  `ivaRetenido` decimal(9,2) NOT NULL,
  `ivaPercibido` decimal(9,2) NOT NULL,
  `descuentoCompra` decimal(9,2) NOT NULL,
  `recibidoPor` text NOT NULL,
  PRIMARY KEY (`idFactura`),
  KEY `idProveedor` (`idProveedor`),
  CONSTRAINT `tbl_factura_compra_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `tbl_proveedores` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_factura_compra: ~4 rows (aproximadamente)
INSERT INTO `tbl_factura_compra` (`idFactura`, `tipoFactura`, `documentoFactura`, `numeroFactura`, `idProveedor`, `fechaFactura`, `plazoFactura`, `descripcionFactura`, `totalFactura`, `fechaIngreso`, `estadoFactura`, `ivaRetenido`, `ivaPercibido`, `descuentoCompra`, `recibidoPor`) VALUES
	(18, 'Compra de medicamentos', 'Crédito fiscal', '5000', 12, '2024-01-16', 0, 'Compra de medicamentos', 0.00, '2024-01-16 21:02:57', 0, 0.00, 0.00, 0.00, 'Edwin Cortez'),
	(19, 'Compra de medicamentos', 'Crédito fiscal', '2355', 12, '2024-01-16', 0, 'Compra de medicamentos', 0.00, '2024-01-16 21:12:51', 0, 5.00, 5.00, 5.00, 'Edwin Cortez'),
	(20, 'Compra de medicamentos', 'Crédito fiscal', '5623', 12, '2024-01-31', 30, 'Compra de medicamentos', 0.00, '2024-01-31 17:19:57', 0, 0.00, 0.00, 0.00, 'Edwin Cortez'),
	(21, 'Compra de medicamentos', 'Crédito fiscal', '5263', 12, '2024-03-16', 30, 'Compra de medicamentos', 0.00, '2024-03-16 23:55:35', 1, 0.00, 0.00, 0.00, 'Edwin Cortez');

-- Volcando estructura para tabla db_centro_medico.tbl_factura_medicamentos
CREATE TABLE IF NOT EXISTS `tbl_factura_medicamentos` (
  `idFacturaMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `idFactura` int(11) NOT NULL,
  `idMedicamento` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(9,5) NOT NULL,
  `vencimiento` varchar(15) NOT NULL,
  `lote` varchar(15) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `descuento` decimal(9,2) NOT NULL DEFAULT 0.00,
  `fechaAgregado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idFacturaMedicamento`),
  KEY `idFactura` (`idFactura`),
  KEY `idMedicamento` (`idMedicamento`),
  CONSTRAINT `tbl_factura_medicamentos_ibfk_1` FOREIGN KEY (`idFactura`) REFERENCES `tbl_factura_compra` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_factura_medicamentos: ~5 rows (aproximadamente)
INSERT INTO `tbl_factura_medicamentos` (`idFacturaMedicamento`, `idFactura`, `idMedicamento`, `cantidad`, `precio`, `vencimiento`, `lote`, `total`, `descuento`, `fechaAgregado`) VALUES
	(102, 18, 970, 100, 0.45000, '2025-01-16', '', 45.00, 0.00, '2024-01-16 21:05:19'),
	(103, 19, 970, 10, 0.55000, '2026-01-23', '', 5.50, 0.00, '2024-01-16 21:13:07'),
	(104, 19, 971, 100, 0.55000, '2025-01-17', '', 55.00, 0.00, '2024-01-16 21:13:18'),
	(106, 20, 970, 100, 0.52000, '2024-10-03', '', 0.52, 5.00, '2024-01-31 17:43:35'),
	(107, 21, 970, 100, 0.25000, '2026-03-16', '', 25.00, 4.00, '2024-03-17 00:03:31');

-- Volcando estructura para tabla db_centro_medico.tbl_gases_arteriales
CREATE TABLE IF NOT EXISTS `tbl_gases_arteriales` (
  `idGasesArteriales` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `muestraGasesArteriales` text NOT NULL,
  `phGasesArteriales` text NOT NULL,
  `pco2GasesArteriales` text NOT NULL,
  `po2GasesArteriales` text NOT NULL,
  `naGasesArteriales` text NOT NULL,
  `kGasesArteriales` text NOT NULL,
  `caGasesArteriales` text NOT NULL,
  `tbhGasesArteriales` text NOT NULL,
  `soGasesArteriales` text NOT NULL,
  `fioGasesArteriales` text NOT NULL,
  `fechaGasesArteriales` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idGasesArteriales`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_gases_arteriales: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_gastos
CREATE TABLE IF NOT EXISTS `tbl_gastos` (
  `idGasto` int(11) NOT NULL AUTO_INCREMENT,
  `tipoGasto` int(11) NOT NULL,
  `montoGasto` decimal(9,2) NOT NULL,
  `entregadoGasto` varchar(50) NOT NULL,
  `idCuentaGasto` int(11) NOT NULL,
  `fechaGasto` date NOT NULL,
  `entidadGasto` int(11) NOT NULL,
  `idProveedorGasto` int(11) NOT NULL,
  `pagoGasto` int(11) NOT NULL,
  `numeroGasto` varchar(25) NOT NULL,
  `bancoGasto` varchar(25) NOT NULL,
  `cuentaGasto` varchar(25) NOT NULL,
  `descripcionGasto` text NOT NULL,
  `codigoGasto` int(11) NOT NULL,
  `flagGasto` int(11) NOT NULL,
  `efectuoGasto` text NOT NULL,
  `eliminadoPor` text NOT NULL,
  `estadoGasto` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idGasto`),
  KEY `idCuentaGasto` (`idCuentaGasto`),
  KEY `idProveedorGasto` (`idProveedorGasto`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_gastos: ~13 rows (aproximadamente)
INSERT INTO `tbl_gastos` (`idGasto`, `tipoGasto`, `montoGasto`, `entregadoGasto`, `idCuentaGasto`, `fechaGasto`, `entidadGasto`, `idProveedorGasto`, `pagoGasto`, `numeroGasto`, `bancoGasto`, `cuentaGasto`, `descripcionGasto`, `codigoGasto`, `flagGasto`, `efectuoGasto`, `eliminadoPor`, `estadoGasto`) VALUES
	(187, 1, 500.00, 'Sofia Beltran', 84, '2024-01-13', 1, 1, 1, '', '', '', 'Pago de honorarios', 1, 0, 'Edwin Cortez', '', 1),
	(188, 1, 500.00, 'Pepe Cruz', 83, '2024-02-19', 1, 1, 1, '', '', '', 'Testing', 2, 0, 'Edwin Cortez', '', 1),
	(189, 1, 25.00, 'Juna de arco', 83, '2024-02-19', 2, 14, 2, '2541', 'Davivienda', '1236544', 'Testing', 3, 1, 'Edwin Cortez', '', 1),
	(190, 1, 50.00, 'Juan Marquez', 84, '2024-02-20', 2, 14, 2, '4564', 'Promerica', '56231', 'dsfsdfdsf', 4, 1, 'Edwin Cortez', '', 1),
	(191, 1, 300.00, 'Julian Alvarez', 83, '2024-02-21', 2, 12, 2, '456', 'Davivienda', '54676521', 'Por compra de algo', 5, 0, 'Informatica', '', 1),
	(192, 1, 600.00, 'TEsting', 84, '2024-02-21', 1, 1, 2, '464', 'Davivienda', '545', 'Testing', 6, 0, 'Edwin Cortez', '', 1),
	(193, 1, 56.00, 'TEst', 84, '2024-02-21', 2, 14, 2, '89898', 'Davivienda', '234234', 'TEsting', 7, 0, 'Edwin Cortez', '', 1),
	(194, 1, 600.00, 'Testing', 84, '2024-02-21', 2, 12, 2, '6598', 'Davivienda', '456132', 'Testing', 8, 0, 'Edwin Cortez', '', 1),
	(195, 1, 600.00, 'Maria del Valle', 84, '2024-02-21', 1, 1, 1, '', '', '', 'Prueba de honorarios', 9, 0, 'Edwin Cortez', '', 1),
	(196, 1, 3000.00, 'Maria Sosa', 83, '2024-02-21', 2, 14, 2, '9633', 'Agricola', '4596713', 'Prueba con cheque', 10, 0, 'Edwin Cortez', '', 1),
	(197, 1, 25.00, 'Dr. Marcos Alonso', 10, '2024-03-23', 1, 1, 1, '', '', '', 'Honorarios médicos, Maria del Carmen Alfaro, 1001', 11, 0, 'Edwin Cortez', '', 1),
	(198, 1, 50.00, 'Farmalab', 9, '2024-03-23', 2, 12, 1, '', '', '', 'Pago de <strong>Farmalab</strong>, Adela Maria Romero Cruz, 1006', 12, 0, 'Edwin Cortez', '', 1),
	(199, 1, 100.00, 'Dr. Juan Antonio Carcamo Flores', 10, '2024-03-23', 1, 2, 1, '', '', '', 'Pago de servicio <strong>Juan Antonio Carcamo Flores(Honorarios)</strong>, Adela Maria Romero Cruz, 1006', 13, 0, 'Edwin Cortez', '', 1);

-- Volcando estructura para tabla db_centro_medico.tbl_habitacion
CREATE TABLE IF NOT EXISTS `tbl_habitacion` (
  `idHabitacion` int(11) NOT NULL AUTO_INCREMENT,
  `numeroHabitacion` varchar(25) NOT NULL,
  `estadoHabitacion` int(11) NOT NULL DEFAULT 1,
  `creadoHabitacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idHabitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_habitacion: ~37 rows (aproximadamente)
INSERT INTO `tbl_habitacion` (`idHabitacion`, `numeroHabitacion`, `estadoHabitacion`, `creadoHabitacion`) VALUES
	(1, 'Consultorio', 0, '2024-01-13 23:19:10'),
	(2, 'Emergencia', 0, '2024-01-13 23:19:10'),
	(3, 'Máxima emergencia', 0, '2024-01-13 23:19:10'),
	(4, 'Recuperación', 1, '2024-01-13 23:19:10'),
	(5, 'Terapia', 0, '2024-01-13 23:19:10'),
	(6, '201', 0, '2024-01-13 23:19:10'),
	(7, '202', 0, '2024-01-13 23:19:10'),
	(8, '203', 0, '2024-01-13 23:19:10'),
	(9, '204', 0, '2024-01-13 23:19:10'),
	(10, '205', 0, '2024-01-13 23:19:10'),
	(11, '301', 0, '2024-01-13 23:19:10'),
	(12, '302', 0, '2024-01-13 23:19:10'),
	(13, '303', 0, '2024-01-13 23:19:10'),
	(14, '304', 1, '2024-01-13 23:19:10'),
	(15, '305', 0, '2024-01-13 23:19:10'),
	(16, '306', 1, '2024-01-13 23:19:10'),
	(17, '307', 1, '2024-01-13 23:19:10'),
	(18, '308', 0, '2024-01-13 23:19:10'),
	(19, '309', 0, '2024-01-13 23:19:10'),
	(20, '310', 1, '2024-01-13 23:19:10'),
	(21, '311', 0, '2024-01-13 23:19:10'),
	(22, '312', 0, '2024-01-13 23:19:10'),
	(23, '313', 0, '2024-01-13 23:19:10'),
	(24, '401', 0, '2024-01-13 23:19:10'),
	(25, '402', 0, '2024-01-13 23:19:10'),
	(26, '403', 0, '2024-01-13 23:19:10'),
	(27, '404', 0, '2024-01-13 23:19:10'),
	(28, '405', 0, '2024-01-13 23:19:10'),
	(29, '406', 0, '2024-01-13 23:19:10'),
	(30, '407', 0, '2024-01-13 23:19:10'),
	(31, '408', 0, '2024-01-13 23:19:10'),
	(32, '409', 0, '2024-01-13 23:19:10'),
	(33, '410', 0, '2024-01-13 23:19:10'),
	(34, '411', 0, '2024-01-13 23:19:10'),
	(35, '412', 0, '2024-01-13 23:19:10'),
	(36, '413', 0, '2024-01-13 23:19:10'),
	(37, 'Pendiente', 0, '2024-01-13 23:19:10');

-- Volcando estructura para tabla db_centro_medico.tbl_hematologia
CREATE TABLE IF NOT EXISTS `tbl_hematologia` (
  `idHematologia` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `eritrocitosHematologia` varchar(25) NOT NULL,
  `hematocritoHematologia` varchar(25) NOT NULL,
  `hemoglobinaHematologia` varchar(25) NOT NULL,
  `vgmHematologia` varchar(25) NOT NULL,
  `hgmHematologia` varchar(25) NOT NULL,
  `chgmHematologia` varchar(25) NOT NULL,
  `leucocitosHematologia` varchar(25) NOT NULL,
  `neutrofHematologia` varchar(25) NOT NULL,
  `neutrofBandHematologia` varchar(25) NOT NULL,
  `linfocitosHematologia` varchar(25) NOT NULL,
  `eosinofilosHematologia` varchar(25) NOT NULL,
  `monocitosHematologia` varchar(25) NOT NULL,
  `basofilosHematologia` varchar(25) NOT NULL,
  `blastosHematologia` varchar(25) NOT NULL,
  `reticulocitosHematologia` varchar(25) NOT NULL,
  `eritrosedHematologia` varchar(25) NOT NULL,
  `plaquetasHematologia` varchar(25) NOT NULL,
  `gotaGruesaHematologia` varchar(25) NOT NULL,
  `rojaHematologia` text NOT NULL,
  `blancaHematologia` text NOT NULL,
  `plaquetariaHematologia` text NOT NULL,
  `observacionesHematologia` text NOT NULL,
  `fechaHematologia` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idHematologia`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_hematologia: ~1 rows (aproximadamente)
INSERT INTO `tbl_hematologia` (`idHematologia`, `examenSolicitado`, `eritrocitosHematologia`, `hematocritoHematologia`, `hemoglobinaHematologia`, `vgmHematologia`, `hgmHematologia`, `chgmHematologia`, `leucocitosHematologia`, `neutrofHematologia`, `neutrofBandHematologia`, `linfocitosHematologia`, `eosinofilosHematologia`, `monocitosHematologia`, `basofilosHematologia`, `blastosHematologia`, `reticulocitosHematologia`, `eritrosedHematologia`, `plaquetasHematologia`, `gotaGruesaHematologia`, `rojaHematologia`, `blancaHematologia`, `plaquetariaHematologia`, `observacionesHematologia`, `fechaHematologia`) VALUES
	(15, 0, 'e', 'h', 'h', 'v', 'h', 'ch', 'l', 'n', 'ne', 'l', 'e', 'm', 'b', 'b', 'r', 'e', 'p', 'g', 'lr', 'lb', 'lp', 'Tilin', '2024-03-04 16:45:15'),
	(16, 0, '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'Alguna 2 que 3', '2024-04-10 01:16:08');

-- Volcando estructura para tabla db_centro_medico.tbl_hisopado_nasal
CREATE TABLE IF NOT EXISTS `tbl_hisopado_nasal` (
  `idHisopadoNasal` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `pasaporteHisopadoNasal` varchar(15) NOT NULL,
  `resultadoHisopadoNasal` text NOT NULL,
  `fechaHN` varchar(10) NOT NULL DEFAULT '0',
  `horaHN` varchar(10) NOT NULL DEFAULT '0',
  `fechaHisopadoNasal` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idHisopadoNasal`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_hisopado_nasal: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_hoja_cobro
CREATE TABLE IF NOT EXISTS `tbl_hoja_cobro` (
  `idHoja` int(11) NOT NULL AUTO_INCREMENT,
  `codigoHoja` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `fechaHoja` varchar(15) NOT NULL,
  `tipoHoja` varchar(20) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `idHabitacion` int(11) NOT NULL,
  `totalHoja` decimal(9,2) NOT NULL,
  `estadoHoja` int(11) NOT NULL DEFAULT 1,
  `salidaHoja` varchar(15) NOT NULL,
  `fechaIngresoHoja` timestamp NOT NULL DEFAULT current_timestamp(),
  `correlativoSalidaHoja` int(11) NOT NULL,
  `diagnosticoHoja` varchar(25) NOT NULL,
  `anulada` int(11) NOT NULL,
  `credito_fiscal` varchar(10) NOT NULL,
  `motivoAnulada` text NOT NULL,
  `paraHoja` text DEFAULT NULL,
  `descuentoHoja` decimal(9,2) DEFAULT NULL,
  `seguroHoja` int(11) DEFAULT 1,
  `dh` decimal(9,2) DEFAULT NULL,
  `esPaquete` int(11) DEFAULT 0,
  `porPagos` int(11) DEFAULT 0,
  `detalleAnulada` text DEFAULT NULL,
  `fechaRecibo` date DEFAULT NULL,
  `pagaMedico` int(11) DEFAULT 0,
  `destinoHoja` int(11) DEFAULT 0,
  `totalPaquete` decimal(9,2) DEFAULT 0.00,
  `esPromocion` int(11) DEFAULT 0,
  `formaPago` int(11) DEFAULT 0,
  PRIMARY KEY (`idHoja`),
  KEY `idPaciente` (`idPaciente`),
  KEY `idMedico` (`idMedico`),
  CONSTRAINT `tbl_hoja_cobro_ibfk_2` FOREIGN KEY (`idMedico`) REFERENCES `tbl_medicos` (`idMedico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_hoja_cobro_ibfk_3` FOREIGN KEY (`idPaciente`) REFERENCES `tbl_pacientes` (`idPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_hoja_cobro: ~15 rows (aproximadamente)
INSERT INTO `tbl_hoja_cobro` (`idHoja`, `codigoHoja`, `idPaciente`, `fechaHoja`, `tipoHoja`, `idMedico`, `idHabitacion`, `totalHoja`, `estadoHoja`, `salidaHoja`, `fechaIngresoHoja`, `correlativoSalidaHoja`, `diagnosticoHoja`, `anulada`, `credito_fiscal`, `motivoAnulada`, `paraHoja`, `descuentoHoja`, `seguroHoja`, `dh`, `esPaquete`, `porPagos`, `detalleAnulada`, `fechaRecibo`, `pagaMedico`, `destinoHoja`, `totalPaquete`, `esPromocion`, `formaPago`) VALUES
	(1, 1000, 1, '2024-01-28', 'Ambulatorio', 1, 1, 0.00, 1, '', '2024-01-28 15:42:20', 0, '', 0, '', '', 'Paciente', NULL, 1, NULL, 0, 0, NULL, NULL, 0, 1, 0.00, 0, 0),
	(2, 1001, 2, '2024-01-28', 'Ambulatorio', 1, 1, 0.00, 0, '2024-02-15', '2024-01-28 15:47:22', 1, 'Paciente de alta', 0, '', '', 'Paciente', NULL, 1, NULL, 0, 0, NULL, '2024-02-19', 0, 2, 0.00, 0, 0),
	(3, 1002, 3, '2024-02-22', 'Ambulatorio', 1, 1, 0.00, 1, '', '2024-02-22 21:35:49', 0, '', 0, '', '', 'Paciente', NULL, 1, NULL, 0, 0, NULL, NULL, 0, 1, 0.00, 0, 0),
	(4, 1003, 2, '2024-03-02', 'Ambulatorio', 1, 1, 0.00, 1, '', '2024-03-02 15:53:41', 0, '', 0, '', '', 'Paciente', NULL, 1, NULL, 0, 0, NULL, NULL, 0, 1, 0.00, 0, 0),
	(5, 1004, 2, '2024-03-07', 'Ambulatorio', 1, 1, 0.00, 0, '2024-03-19', '2024-03-07 15:59:19', 4, 'Paciente de alta', 0, '', '', 'Paciente', NULL, 1, NULL, 0, 0, NULL, '2024-03-23', 0, 1, 0.00, 0, 0),
	(6, 1005, 1, '2024-03-16', 'Ambulatorio', 1, 1, 0.00, 0, '2024-03-16', '2024-03-16 23:08:23', 2, 'Paciente de alta', 0, '', '', 'Paciente', NULL, 1, NULL, 0, 0, NULL, '2024-03-16', 0, 1, 0.00, 0, 0),
	(7, 1006, 3, '2024-03-22', 'Ambulatorio', 2, 1, 0.00, 0, '2024-03-23', '2024-03-22 14:51:15', 3, 'Paciente de alta', 0, '', '', 'Paciente', NULL, 1, NULL, 0, 0, NULL, '2024-03-23', 0, 1, 0.00, 0, 0),
	(17, 1007, 2, '2024-03-29', 'Ambulatoria', 1, 1, 0.00, 1, '', '2024-03-29 22:55:03', 0, '', 0, '', '', '', NULL, 1, NULL, 0, 0, NULL, NULL, 0, 0, 0.00, 0, 0),
	(18, 1008, 2, '2024-03-30', 'Ambulatoria', 1, 1, 0.00, 0, '2024-03-30', '2024-03-30 14:21:12', 5, 'Paciente de alta', 0, '', '', '', NULL, 1, NULL, 0, 0, NULL, '2024-03-30', 0, 0, 0.00, 0, 0),
	(19, 1009, 2, '2024-03-30', 'Ambulatoria', 1, 1, 0.00, 0, '2024-03-30', '2024-03-30 16:55:22', 6, 'Paciente de alta', 0, '', '', '', NULL, 1, NULL, 0, 0, NULL, '2024-03-30', 0, 0, 0.00, 0, 0),
	(20, 1010, 2, '2024-03-30', 'Ambulatoria', 1, 1, 0.00, 0, '2024-03-30', '2024-03-30 17:00:20', 7, 'Paciente de alta', 0, '', '', '', NULL, 1, NULL, 0, 0, NULL, '2024-03-30', 0, 0, 0.00, 0, 0),
	(21, 1011, 3, '2024-03-30', 'Ambulatoria', 1, 1, 0.00, 0, '2024-03-30', '2024-03-30 17:27:26', 8, 'Paciente de alta', 0, '', '', '', NULL, 1, NULL, 0, 0, NULL, '2024-03-30', 0, 0, 0.00, 0, 0),
	(22, 1012, 4, '2024-03-30', 'Ambulatoria', 1, 1, 0.00, 0, '2024-03-30', '2024-03-30 17:30:01', 9, 'Paciente de alta', 0, '', '', '', NULL, 1, NULL, 0, 0, NULL, '2024-03-30', 0, 0, 0.00, 0, 0),
	(23, 1013, 1, '2024-03-30', 'Ambulatoria', 1, 1, 0.00, 0, '2024-03-30', '2024-03-30 22:45:43', 10, 'Paciente de alta', 0, '', '', '', NULL, 1, NULL, 0, 0, NULL, '2024-03-30', 0, 0, 0.00, 0, 0),
	(24, 1014, 1, '2024-03-30', 'Ambulatoria', 1, 1, 0.00, 0, '2024-03-30', '2024-03-30 22:50:07', 11, 'Paciente de alta', 0, '', '', '', NULL, 1, NULL, 0, 0, NULL, '2024-03-30', 0, 0, 0.00, 0, 0);

-- Volcando estructura para tabla db_centro_medico.tbl_hoja_externos
CREATE TABLE IF NOT EXISTS `tbl_hoja_externos` (
  `idHojaExterno` int(11) NOT NULL AUTO_INCREMENT,
  `idHoja` int(11) NOT NULL,
  `idExterno` int(11) NOT NULL,
  `cantidadExterno` int(11) NOT NULL,
  `precioExterno` decimal(9,2) NOT NULL,
  `fechaExterno` date NOT NULL,
  PRIMARY KEY (`idHojaExterno`),
  KEY `idHoja` (`idHoja`),
  KEY `idExterno` (`idExterno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_hoja_externos: ~3 rows (aproximadamente)
INSERT INTO `tbl_hoja_externos` (`idHojaExterno`, `idHoja`, `idExterno`, `cantidadExterno`, `precioExterno`, `fechaExterno`) VALUES
	(1, 2, 1, 1, 25.00, '2024-01-28'),
	(2, 7, 2, 1, 50.00, '2024-03-22'),
	(3, 7, 4, 1, 100.00, '2024-03-22'),
	(4, 4, 1, 1, 50.00, '2024-03-02');

-- Volcando estructura para tabla db_centro_medico.tbl_hoja_insumos
CREATE TABLE IF NOT EXISTS `tbl_hoja_insumos` (
  `idHojaInsumo` int(11) NOT NULL AUTO_INCREMENT,
  `idHoja` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `precioInsumo` decimal(9,2) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL,
  `fechaInsumo` date NOT NULL,
  `descuentoUnitario` decimal(9,2) NOT NULL DEFAULT 0.00,
  `aumentoUnitario` decimal(9,2) NOT NULL DEFAULT 0.00,
  `por` int(11) NOT NULL DEFAULT 0,
  `eliminado` int(11) NOT NULL DEFAULT 0,
  `motivoEliminado` text NOT NULL,
  `pivoteStock` int(11) NOT NULL DEFAULT 0,
  `filaKardexStock` int(11) NOT NULL DEFAULT 0,
  `fechaAgregado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idHojaInsumo`),
  KEY `idHojaInsumo` (`idHoja`),
  KEY `idInsumo` (`idInsumo`),
  CONSTRAINT `tbl_hoja_insumos_ibfk_3` FOREIGN KEY (`idHoja`) REFERENCES `tbl_hoja_cobro` (`idHoja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_hoja_insumos: ~17 rows (aproximadamente)
INSERT INTO `tbl_hoja_insumos` (`idHojaInsumo`, `idHoja`, `idInsumo`, `precioInsumo`, `cantidadInsumo`, `fechaInsumo`, `descuentoUnitario`, `aumentoUnitario`, `por`, `eliminado`, `motivoEliminado`, `pivoteStock`, `filaKardexStock`, `fechaAgregado`) VALUES
	(1, 2, 970, 1.00, 5, '2024-01-28', 0.00, 0.00, 1, 0, '', 0, 0, '2024-02-15 21:23:51'),
	(2, 6, 970, 1.00, 100, '2024-03-16', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-16 23:54:09'),
	(3, 7, 973, 3.00, 10, '2024-03-22', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-23 16:17:55'),
	(4, 4, 970, 1.00, 1, '2024-03-02', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-23 22:15:45'),
	(5, 4, 972, 5.00, 1, '2024-03-02', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-23 22:15:47'),
	(6, 18, 145, 10.00, 1, '2024-03-30', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-30 15:38:22'),
	(8, 18, 15, 5.00, 1, '2024-03-30', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-30 16:38:38'),
	(9, 19, 146, 25.00, 1, '2024-03-30', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-30 16:59:27'),
	(10, 20, 144, 0.00, 1, '2024-03-30', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-30 17:00:27'),
	(11, 21, 145, 10.00, 1, '2024-03-30', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-30 17:27:44'),
	(12, 21, 35, 0.00, 1, '2024-03-30', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-30 17:27:50'),
	(13, 21, 38, 0.00, 1, '2024-03-30', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-30 17:27:54'),
	(14, 21, 21, 0.00, 1, '2024-03-30', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-30 17:28:02'),
	(15, 22, 146, 25.00, 1, '2024-03-30', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-30 17:30:15'),
	(16, 22, 108, 0.00, 1, '2024-03-30', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-30 17:30:30'),
	(17, 23, 127, 15.00, 1, '2024-03-30', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-30 22:45:56'),
	(18, 24, 145, 10.00, 1, '2024-03-30', 0.00, 0.00, 1, 0, '', 0, 0, '2024-03-30 22:59:11');

-- Volcando estructura para tabla db_centro_medico.tbl_hoja_insumos_eliminados
CREATE TABLE IF NOT EXISTS `tbl_hoja_insumos_eliminados` (
  `idEliminado` int(11) NOT NULL AUTO_INCREMENT,
  `filaEliminada` int(11) NOT NULL,
  `idHoja` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `precioInsumo` decimal(9,2) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL,
  `descuentoUnitario` decimal(9,2) NOT NULL DEFAULT 0.00,
  `fechaEliminado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idEliminado`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_hoja_insumos_eliminados: ~2 rows (aproximadamente)
INSERT INTO `tbl_hoja_insumos_eliminados` (`idEliminado`, `filaEliminada`, `idHoja`, `idInsumo`, `precioInsumo`, `cantidadInsumo`, `descuentoUnitario`, `fechaEliminado`) VALUES
	(14, 613, 179, 970, 1.00, 1, 0.00, '2024-01-28 00:13:45'),
	(15, 614, 179, 971, 3.50, 1, 0.00, '2024-01-28 00:13:45'),
	(16, 7, 18, 5, 0.00, 1, 0.00, '2024-03-30 16:48:17');

-- Volcando estructura para tabla db_centro_medico.tbl_honorarios
CREATE TABLE IF NOT EXISTS `tbl_honorarios` (
  `idHonorario` int(11) NOT NULL AUTO_INCREMENT,
  `correlativoSalidaHoja` int(11) NOT NULL,
  `idExterno` int(11) NOT NULL,
  `idHojaExterno` int(11) NOT NULL,
  `idHoja` int(11) NOT NULL,
  `precioExterno` decimal(9,2) NOT NULL,
  `estadoExterno` int(11) NOT NULL,
  `facturar` int(11) NOT NULL,
  `entregadoExterno` date DEFAULT NULL,
  `pivotePlus` int(11) DEFAULT 0,
  `enBanco` int(11) DEFAULT 0,
  `gastoExterno` int(11) DEFAULT 0,
  `fechaExterno` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idHonorario`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_honorarios: ~3 rows (aproximadamente)
INSERT INTO `tbl_honorarios` (`idHonorario`, `correlativoSalidaHoja`, `idExterno`, `idHojaExterno`, `idHoja`, `precioExterno`, `estadoExterno`, `facturar`, `entregadoExterno`, `pivotePlus`, `enBanco`, `gastoExterno`, `fechaExterno`) VALUES
	(196, 1, 1, 1, 2, 25.00, 0, 0, NULL, 0, 0, 0, '2024-03-23 16:27:28'),
	(197, 3, 2, 2, 7, 50.00, 0, 0, NULL, 0, 0, 0, '2024-03-23 16:27:28'),
	(198, 3, 4, 3, 7, 100.00, 0, 0, NULL, 0, 0, 0, '2024-03-23 16:27:28');

-- Volcando estructura para tabla db_centro_medico.tbl_honorarios_paquetes
CREATE TABLE IF NOT EXISTS `tbl_honorarios_paquetes` (
  `idHonorarioPaquete` int(11) NOT NULL AUTO_INCREMENT,
  `idHoja` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `totalHonorarioPaquete` decimal(9,2) NOT NULL,
  `honorarioPadre` int(11) NOT NULL DEFAULT 0,
  `originalHonorarioPaquete` decimal(9,2) NOT NULL,
  `estadoHonorarioPaquete` int(11) NOT NULL DEFAULT 0,
  `divisionPor` int(11) NOT NULL DEFAULT 0,
  `fechaSaldado` date DEFAULT NULL,
  `creadoHonorarioPaquete` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idHonorarioPaquete`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_honorarios_paquetes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_inmunologia
CREATE TABLE IF NOT EXISTS `tbl_inmunologia` (
  `idInmunologia` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `tificoO` varchar(25) NOT NULL,
  `tificoH` varchar(25) NOT NULL,
  `paratificoA` varchar(25) NOT NULL,
  `paratificoB` varchar(25) NOT NULL,
  `brucellaAbortus` varchar(25) NOT NULL,
  `proteusOx` varchar(25) NOT NULL,
  `proteinaC` varchar(25) NOT NULL,
  `reumatoideo` varchar(25) NOT NULL,
  `antiestreptolisina` varchar(25) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idInmunologia`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_inmunologia: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_insumos_hemo
CREATE TABLE IF NOT EXISTS `tbl_insumos_hemo` (
  `idInsumoHemo` int(11) NOT NULL AUTO_INCREMENT,
  `codigoInsumoHemo` varchar(10) NOT NULL,
  `nombreInsumoHemo` varchar(50) NOT NULL,
  `precioInsumoHemo` decimal(9,5) NOT NULL,
  `minimoInsumoHemo` int(11) NOT NULL,
  `stockInsumoHemo` int(11) NOT NULL,
  `pivoteInsumoHemo` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idInsumoHemo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_insumos_hemo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_insumos_lab
CREATE TABLE IF NOT EXISTS `tbl_insumos_lab` (
  `idInsumoLab` int(11) NOT NULL AUTO_INCREMENT,
  `codigoInsumoLab` varchar(10) NOT NULL,
  `nombreInsumoLab` text NOT NULL,
  `tipoInsumoLab` int(11) NOT NULL,
  `precioInsumoLab` decimal(9,2) NOT NULL,
  `stockInsumoLab` decimal(9,2) NOT NULL DEFAULT 0.00,
  `medidaInsumoLab` varchar(15) NOT NULL,
  `estadoInsumoLab` int(11) NOT NULL,
  `editable` int(11) NOT NULL DEFAULT 0,
  `controlado` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idInsumoLab`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_insumos_lab: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_insumos_limpieza
CREATE TABLE IF NOT EXISTS `tbl_insumos_limpieza` (
  `idInsumoLimpieza` int(11) NOT NULL AUTO_INCREMENT,
  `codigoInsumoLimpieza` varchar(10) NOT NULL,
  `nombreInsumoLimpieza` varchar(50) NOT NULL,
  `categoriaInsumoLimpieza` varchar(50) NOT NULL,
  `marcaInsumoLimpieza` varchar(50) NOT NULL,
  `unidadInsumoLimpieza` varchar(25) NOT NULL,
  `precioInsumoLimpieza` decimal(9,5) NOT NULL,
  `minimoInsumoLimpieza` int(11) NOT NULL,
  `stockInsumoLimpieza` int(11) NOT NULL,
  `stockPivote` int(11) NOT NULL DEFAULT 1,
  `pivoteInsumoLimpieza` int(11) NOT NULL DEFAULT 1,
  `editable` int(11) NOT NULL DEFAULT 0,
  `fechaPivote` date DEFAULT NULL,
  PRIMARY KEY (`idInsumoLimpieza`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_insumos_limpieza: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_kardex
CREATE TABLE IF NOT EXISTS `tbl_kardex` (
  `idKardex` int(11) NOT NULL AUTO_INCREMENT,
  `idMedicamento` int(11) NOT NULL,
  `precioMedicamento` decimal(9,2) NOT NULL,
  `cantidadMedicamento` int(11) NOT NULL,
  `descripcionMedicamento` varchar(15) NOT NULL,
  `facturaMedicamento` int(11) NOT NULL,
  `tipoProceso` int(11) NOT NULL,
  `transaccion` int(11) NOT NULL,
  `fechaMedicamento` timestamp NOT NULL DEFAULT current_timestamp(),
  `ocupadaPor` varchar(15) NOT NULL,
  PRIMARY KEY (`idKardex`)
) ENGINE=InnoDB AUTO_INCREMENT=552 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_kardex: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_kardex_bodega
CREATE TABLE IF NOT EXISTS `tbl_kardex_bodega` (
  `idKardex` int(11) NOT NULL AUTO_INCREMENT,
  `idInsumo` int(11) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL DEFAULT 0,
  `stockActual` int(11) NOT NULL DEFAULT 0,
  `tipoKardex` varchar(10) NOT NULL,
  `filaEntrada` int(11) NOT NULL DEFAULT 0,
  `filaSalida` int(11) NOT NULL DEFAULT 0,
  `creadoKardex` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idKardex`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_kardex_bodega: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_kardex_botiquin
CREATE TABLE IF NOT EXISTS `tbl_kardex_botiquin` (
  `idKardex` int(11) NOT NULL AUTO_INCREMENT,
  `idInsumo` int(11) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL DEFAULT 0,
  `stockActual` int(11) NOT NULL DEFAULT 0,
  `tipoKardex` varchar(10) NOT NULL,
  `filaEntrada` int(11) NOT NULL DEFAULT 0,
  `filaSalida` int(11) NOT NULL DEFAULT 0,
  `filaEmpleado` int(11) NOT NULL DEFAULT 0,
  `conceptoKardex` text NOT NULL,
  `movimientoPor` int(11) NOT NULL,
  `creadoKardex` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idKardex`)
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_kardex_botiquin: ~27 rows (aproximadamente)
INSERT INTO `tbl_kardex_botiquin` (`idKardex`, `idInsumo`, `cantidadInsumo`, `stockActual`, `tipoKardex`, `filaEntrada`, `filaSalida`, `filaEmpleado`, `conceptoKardex`, `movimientoPor`, `creadoKardex`) VALUES
	(203, 970, 0, 0, 'Eliminado', 101, 0, 0, '', 0, '2024-01-16 21:03:46'),
	(204, 970, 100, 100, 'Entrada', 102, 0, 0, '', 0, '2024-01-16 21:05:19'),
	(205, 970, 10, 110, 'Entrada', 103, 0, 0, '', 0, '2024-01-16 21:13:07'),
	(206, 971, 100, 100, 'Entrada', 104, 0, 0, '', 0, '2024-01-16 21:13:18'),
	(207, 970, 0, 110, 'Eliminado', 0, 613, 0, '-', 0, '2024-01-16 22:20:51'),
	(208, 971, 0, 100, 'Eliminado', 0, 614, 0, '-', 0, '2024-01-16 22:20:52'),
	(209, 970, 0, 110, 'Eliminado', 105, 0, 0, '', 0, '2024-01-31 17:37:45'),
	(210, 970, 100, 210, 'Entrada', 106, 0, 0, '', 0, '2024-01-31 17:43:35'),
	(211, 970, 5, 205, 'Salida', 0, 1, 0, 'Usado en cuentas privadas', 0, '2024-02-15 21:23:51'),
	(212, 970, 100, 105, 'Salida', 0, 2, 0, 'Usado en cuentas privadas', 0, '2024-03-16 23:54:09'),
	(213, 970, 100, 205, 'Entrada', 107, 0, 0, '', 0, '2024-03-17 00:03:31'),
	(214, 973, 10, 90, 'Salida', 0, 3, 0, 'Usado en cuentas privadas', 0, '2024-03-23 16:17:55'),
	(215, 970, 1, 204, 'Salida', 0, 4, 0, 'Usado en cuentas privadas', 0, '2024-03-23 22:15:45'),
	(216, 972, 1, 99, 'Salida', 0, 5, 0, 'Usado en cuentas privadas', 0, '2024-03-23 22:15:47'),
	(217, 145, 1, -1, 'Salida', 0, 6, 0, 'Usado en cuentas privadas', 0, '2024-03-30 15:38:22'),
	(218, 5, 0, 0, 'Eliminado', 0, 7, 0, '-', 0, '2024-03-30 16:35:57'),
	(219, 15, 1, -1, 'Salida', 0, 8, 0, 'Usado en cuentas privadas', 0, '2024-03-30 16:38:38'),
	(220, 146, 1, -1, 'Salida', 0, 9, 0, 'Usado en cuentas privadas', 0, '2024-03-30 16:59:27'),
	(221, 144, 1, -1, 'Salida', 0, 10, 0, 'Usado en cuentas privadas', 0, '2024-03-30 17:00:27'),
	(222, 145, 1, -2, 'Salida', 0, 11, 0, 'Usado en cuentas privadas', 0, '2024-03-30 17:27:44'),
	(223, 35, 1, -1, 'Salida', 0, 12, 0, 'Usado en cuentas privadas', 0, '2024-03-30 17:27:50'),
	(224, 38, 1, -1, 'Salida', 0, 13, 0, 'Usado en cuentas privadas', 0, '2024-03-30 17:27:54'),
	(225, 21, 1, -1, 'Salida', 0, 14, 0, 'Usado en cuentas privadas', 0, '2024-03-30 17:28:02'),
	(226, 146, 1, -2, 'Salida', 0, 15, 0, 'Usado en cuentas privadas', 0, '2024-03-30 17:30:15'),
	(227, 108, 1, -1, 'Salida', 0, 16, 0, 'Usado en cuentas privadas', 0, '2024-03-30 17:30:30'),
	(228, 127, 1, -1, 'Salida', 0, 17, 0, 'Usado en cuentas privadas', 0, '2024-03-30 22:45:56'),
	(229, 145, 1, -3, 'Salida', 0, 18, 0, 'Usado en cuentas privadas', 0, '2024-03-30 22:59:11');

-- Volcando estructura para tabla db_centro_medico.tbl_kardex_hemo
CREATE TABLE IF NOT EXISTS `tbl_kardex_hemo` (
  `idKardex` int(11) NOT NULL AUTO_INCREMENT,
  `idInsumo` int(11) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL DEFAULT 0,
  `stockActual` int(11) NOT NULL DEFAULT 0,
  `tipoKardex` varchar(10) NOT NULL,
  `filaEntrada` int(11) NOT NULL DEFAULT 0,
  `filaSalida` int(11) NOT NULL DEFAULT 0,
  `creadoKardex` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idKardex`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_kardex_hemo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_kardex_lab
CREATE TABLE IF NOT EXISTS `tbl_kardex_lab` (
  `idKardex` int(11) NOT NULL AUTO_INCREMENT,
  `idInsumo` int(11) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL DEFAULT 0,
  `stockActual` int(11) NOT NULL DEFAULT 0,
  `tipoKardex` varchar(10) NOT NULL,
  `filaEntrada` int(11) NOT NULL DEFAULT 0,
  `filaSalida` int(11) NOT NULL DEFAULT 0,
  `creadoKardex` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idKardex`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_kardex_lab: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_liquidaciones_caja
CREATE TABLE IF NOT EXISTS `tbl_liquidaciones_caja` (
  `idLiquidacion` int(11) NOT NULL AUTO_INCREMENT,
  `inicioLiquidacion` int(11) NOT NULL,
  `finLiquidacion` int(11) NOT NULL,
  `cajeraLiquidacion` int(11) NOT NULL,
  `fechaLiquidacion` date NOT NULL,
  `creadoLiquidacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idLiquidacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_liquidaciones_caja: ~2 rows (aproximadamente)
INSERT INTO `tbl_liquidaciones_caja` (`idLiquidacion`, `inicioLiquidacion`, `finLiquidacion`, `cajeraLiquidacion`, `fechaLiquidacion`, `creadoLiquidacion`) VALUES
	(1, 1, 3, 1, '2024-03-23', '2024-03-23 16:50:45'),
	(2, 1, 4, 1, '2024-03-23', '2024-03-23 22:21:32');

-- Volcando estructura para tabla db_centro_medico.tbl_llegada_pacientes
CREATE TABLE IF NOT EXISTS `tbl_llegada_pacientes` (
  `idLlegada` int(11) NOT NULL AUTO_INCREMENT,
  `numeroLlegada` int(11) NOT NULL,
  `pacienteLlegada` text NOT NULL,
  `edadLlegada` int(11) NOT NULL,
  `codigoLlegada` varchar(10) NOT NULL,
  `destinoLlegada` int(11) NOT NULL,
  `estadoLlegada` int(11) NOT NULL,
  `fechaLlegada` date NOT NULL,
  `idHoja` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idLlegada`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_llegada_pacientes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_medicamentos
CREATE TABLE IF NOT EXISTS `tbl_medicamentos` (
  `idMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `codigoMedicamento` int(11) NOT NULL,
  `nombreMedicamento` varchar(100) NOT NULL,
  `idProveedorMedicamento` int(11) NOT NULL,
  `precioCMedicamento` decimal(9,2) NOT NULL,
  `precioVMedicamento` decimal(9,2) NOT NULL,
  `descuentoMedicamento` int(11) NOT NULL DEFAULT 0,
  `tipoMedicamento` varchar(25) NOT NULL,
  `idClasificacionMedicamento` int(11) NOT NULL,
  `stockMedicamento` int(11) NOT NULL,
  `usadosMedicamento` int(11) NOT NULL,
  `pivoteMedicamento` int(11) NOT NULL,
  `minimoMedicamento` int(11) NOT NULL,
  `ocultarMedicamento` int(11) NOT NULL,
  `feriadoMedicamento` decimal(9,2) NOT NULL DEFAULT 0.00,
  `idFabricante` int(11) NOT NULL DEFAULT 0,
  `creadoMedicamento` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idMedicamento`),
  KEY `idClasificacionMedicamento` (`idClasificacionMedicamento`),
  KEY `idProveedorMedicamento` (`idProveedorMedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_medicamentos: ~144 rows (aproximadamente)
INSERT INTO `tbl_medicamentos` (`idMedicamento`, `codigoMedicamento`, `nombreMedicamento`, `idProveedorMedicamento`, `precioCMedicamento`, `precioVMedicamento`, `descuentoMedicamento`, `tipoMedicamento`, `idClasificacionMedicamento`, `stockMedicamento`, `usadosMedicamento`, `pivoteMedicamento`, `minimoMedicamento`, `ocultarMedicamento`, `feriadoMedicamento`, `idFabricante`, `creadoMedicamento`) VALUES
	(1, 1000, 'ACETAMINOFÉN', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 0, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(2, 1001, 'AZITROMICINA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 0, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(3, 1002, 'DOGENAL', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 0, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(4, 1003, 'ANALGAN', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 0, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(5, 1004, 'HEMOGRAMA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(6, 1005, 'LEUCOGRAMA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(7, 1006, 'HEMATOCRITO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(8, 1007, 'HEMOGLOBINA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(9, 1008, 'RECUENTO DE PLAQUETAS', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(10, 1009, 'RETICULOSITOS', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(11, 1010, 'ERITROSEDIMENTACION', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(12, 1011, 'GOTA GRUESA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(13, 1012, 'FOTIS DE SANGRE PERIFERICA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(14, 1013, 'CONCENTRADO DE STROUT', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(15, 1014, 'DIMERO D', 1, 0.00, 5.00, 0, 'Servicios', 27, -1, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(16, 1015, 'FERRITINA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(17, 1016, 'INMONULOGIA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(18, 1017, 'PRUEBA DE EMBARAZO EN SANGRE', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(19, 1018, 'PRUEBA DE EMBARAZO EN ORINA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(20, 1019, 'SEROLOGIA PARA SIFILIS', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(21, 1020, 'GRUPO SANGUINEO Y FACTOR RH', 1, 0.00, 0.00, 0, 'Servicios', 27, -1, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(22, 1021, 'ANTICUERPOS PARA H.I.V', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(23, 1022, 'PROTEINA "C" REACTIVA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(24, 1023, 'FACTOR REUMATOIDEO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(25, 1024, 'ANTIESTREPTOLISINA "O"', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(26, 1025, 'ANTIGENO PROSTATICO ESPECIFICO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(27, 1026, 'AC. PARA HELICOBACTER PYLORI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(28, 1027, 'ANTIGENOS FEBRILES', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(29, 1028, 'COOMBS DIRECTO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(30, 1029, 'COOMBS INDIRECTO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(31, 1030, 'AC. PARA CHAGAS', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(32, 1031, 'TOXOPLASMA IG "G"', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(33, 1032, 'TOXOPLASMA IG "M"', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(34, 1033, 'UROLOGIA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(35, 1034, 'GENERAL DE ORINA', 1, 0.00, 0.00, 0, 'Servicios', 27, -1, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(36, 1035, 'PROTEINAS AL AZAR', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(37, 1036, 'COPROLOGIA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(38, 1037, 'GENERAL DE HECES', 1, 0.00, 0.00, 0, 'Servicios', 27, -1, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(39, 1038, 'CONCENTRADO DE HECES', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(40, 1039, 'SANGRE OCULTA EN HECES', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(41, 1040, 'PRUEBA AZUL DE METILENO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(42, 1041, 'AZUCARES REDUCTORES', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(43, 1042, 'HELICOBACTER PYLORY EN HECES', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(44, 1043, 'BACTERIOLOGIA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(45, 1044, 'UROCULTIVO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(46, 1045, 'COPROCULTIVO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(47, 1046, 'DIRECTO DE SECRESIONES', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(48, 1047, 'CULTIVO DE SECRESIONES', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(49, 1048, 'CULTIVO FARINGEO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(50, 1049, 'CULTIVO DE ESPUTO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(51, 1050, 'COLORACION DE GRAM', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(52, 1051, 'KOH', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(53, 1052, 'BACILOSCOPIA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(54, 1053, 'QUIMICA SANGUINEA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(55, 1054, 'GLUCOSA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(56, 1055, 'GLUCOSA POST PANDRIAL', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(57, 1056, 'COLESTEROL TOTAL', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(58, 1057, 'COLESTEROL HDL', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(59, 1058, 'COLESTEROL LDL', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(60, 1059, 'TRIGLICERIDOS', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(61, 1060, 'ACIDO URICO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(62, 1061, 'CREATININA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(63, 1062, 'NITROGENO UREICO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(64, 1063, 'UREA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(65, 1064, 'TGO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(66, 1065, 'TGP', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(67, 1066, 'HEMOGLOBINA GLICOSILADA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(68, 1067, 'DEPURACION DE CREATININA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(69, 1068, 'PROTEINA EN ORINA DE 24 HORAS', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(70, 1069, 'PROTEINAS TOTALES', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(71, 1070, 'ALBUMINA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(72, 1071, 'GLOBULINA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(73, 1072, 'BILIRRUBINA TOTAL', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(74, 1073, 'BILIRRUBINA DIRECTA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(75, 1074, 'BILIRRUBINA INDIRECTA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(76, 1075, 'AMILASA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(77, 1076, 'FOSFATASA ALCALINA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(78, 1077, 'T3 TOTAL', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(79, 1078, 'T4 TOTAL', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(80, 1079, 'TSH', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(81, 1080, 'L.D.H', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(82, 1081, 'CLORO ', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(83, 1082, 'SODIO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(84, 1083, 'POTASIO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(85, 1084, 'CALCIO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(86, 1085, 'MAGNESIO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(87, 1086, 'FOSFORO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 1, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(88, 1087, 'CRANEO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(89, 1088, 'WATERS', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(90, 1089, 'CUELLO(TEJIDOS BLANDOS)', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(91, 1090, 'CAVUM', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(92, 1091, 'SENOS PARA NASALES', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(93, 1092, 'TOWN', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(94, 1093, 'SILLA TURCA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(95, 1094, 'HUESOS NASALES', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(96, 1095, 'ART. T.M', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(97, 1096, 'ORBITA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(98, 1097, 'AGUJEROS OPTICOS', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(99, 1098, 'MASTOIDES', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(100, 1099, 'MANDIBULA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(101, 1100, 'CERVICAL', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(102, 1101, 'CERVICAL CON OBLICUAS', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(103, 1102, 'COLUMNA DORSAL', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(104, 1103, 'LUMBAR CON OBLICUAS', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(105, 1104, 'LUMBAR FLEXION Y EXTENSION', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(106, 1105, 'PELVIS', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(107, 1106, 'SACRO-COXIS', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(108, 1107, 'TORAX(PA) DI', 1, 0.00, 0.00, 0, 'Servicios', 27, -1, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(109, 1108, 'TORAX(PA Y LAT) DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(110, 1109, 'COSTILLA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(111, 1110, 'ESTERNON', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(112, 1111, 'ABDOMEN SIMPLE', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(113, 1112, 'ABDOMEN AGUDO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(114, 1113, 'ESOFAGOGRAMA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(115, 1114, 'TUVO DIGESTIVO SUPERIOR', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(116, 1115, 'TRANSITO INTESTINAL', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(117, 1116, 'COLON, ENEMA BARITADO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(118, 1117, 'PIELOGRAMA E.V', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(119, 1118, 'PIELOGRAMA RETROGRADO', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(120, 1119, 'CISTOGRAMA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(121, 1120, 'CISTOURETROGRAMA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(122, 1121, 'PEV. POR INFUSION', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(123, 1122, 'URETROGRAMA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(124, 1123, 'SERIE OSEA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(125, 1124, 'CLAVICULA DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(126, 1125, 'ESCAPULA DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(127, 1126, 'HOMBRO DI', 1, 0.00, 0.00, 0, 'Servicios', 27, -1, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(128, 1127, 'HUMERO DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(129, 1128, 'CODO DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(130, 1129, 'ANTEBRAZO DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(131, 1130, 'MUÑECA DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(132, 1131, 'MANO DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(133, 1132, 'EDAD OSEA DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(134, 1133, 'CADERA DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(135, 1134, 'FEMUR DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(136, 1135, 'RODILLA DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(137, 1136, 'TIBIA PERONE DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(138, 1137, 'PIE DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(139, 1138, 'CALCANEO DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(140, 1139, 'TOBILLO DI', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(141, 1140, 'HISTEROSALPINGOGRAMA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(142, 1141, 'COLANGIOGRAMA POR TUBO EN T.', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(143, 1142, 'FISTULOGRAMA', 1, 0.00, 0.00, 0, 'Servicios', 27, 0, 0, 2, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(144, 1143, 'ULTRASONOGRAFIA ABDOMINAL', 1, 0.00, 0.00, 0, 'Servicios', 27, -1, 0, 3, 0, 0, 0.00, 1, '0000-00-00 00:00:00'),
	(145, 1144, 'Consulta general', 1, 10.00, 10.00, 0, 'Servicios', 27, -3, 0, 10, 0, 0, 0.00, 0, '2024-03-29 21:26:59'),
	(146, 1145, 'Consulta ginecológica', 1, 25.00, 25.00, 0, 'Servicios', 27, -2, 0, 10, 0, 0, 0.00, 0, '2024-03-29 21:27:53');

-- Volcando estructura para tabla db_centro_medico.tbl_medicos
CREATE TABLE IF NOT EXISTS `tbl_medicos` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMedico` varchar(50) NOT NULL,
  `especialidadMedico` varchar(150) NOT NULL,
  `telefonoMedico` varchar(10) NOT NULL,
  `direccionMedico` text NOT NULL,
  PRIMARY KEY (`idMedico`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_medicos: ~2 rows (aproximadamente)
INSERT INTO `tbl_medicos` (`idMedico`, `nombreMedico`, `especialidadMedico`, `telefonoMedico`, `direccionMedico`) VALUES
	(1, 'Dr. Marcos Alonso', 'Ginecologo/Pediatra', '7541-2563', 'El Transito'),
	(2, 'Dr. Juan Antonio Carcamo Flores', 'Pediatra', '7896-5230', 'El Transito');

-- Volcando estructura para tabla db_centro_medico.tbl_medidas
CREATE TABLE IF NOT EXISTS `tbl_medidas` (
  `idMedida` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMedida` text NOT NULL,
  `cantidadMedida` int(11) NOT NULL,
  `unidadMedida` varchar(10) NOT NULL DEFAULT '',
  `estadoMedida` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idMedida`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_medidas: ~2 rows (aproximadamente)
INSERT INTO `tbl_medidas` (`idMedida`, `nombreMedida`, `cantidadMedida`, `unidadMedida`, `estadoMedida`) VALUES
	(1, 'Caja', 100, 'Caja', 1),
	(2, 'Blister', 10, 'Blister', 1);

-- Volcando estructura para tabla db_centro_medico.tbl_menu
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMenu` varchar(25) NOT NULL,
  `htmlMenu` text NOT NULL,
  `fechaMenu` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_menu: ~28 rows (aproximadamente)
INSERT INTO `tbl_menu` (`idMenu`, `nombreMenu`, `htmlMenu`, `fechaMenu`) VALUES
	(1, 'Pacientes', '<li class="menu-item">\r\n                    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#patient" aria-expanded="false"\r\n                        aria-controls="patient">\r\n                        <span><i class="fas fa-user"></i>Datos de pacientes</span>\r\n                    </a>\r\n                    <ul id="patient" class="collapse" aria-labelledby="patient" data-parent="#side-nav-accordion">\r\n                        <li> <a href="<?php echo base_url(); ?>Paciente/agregar_pacientes">Agregar paciente</a> </li>\r\n                        <li> <a href="<?php echo base_url(); ?>Paciente/lista_pacientes">Lista pacientes</a> </li>\r\n                    </ul>\r\n                </li>', '2021-04-30 02:00:15'),
	(2, 'Consultas', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#consultas" aria-expanded="false" aria-controls="consultas">\r\n        <span><i class="fa fa-list"></i>Consultas</span>\r\n    </a>\r\n    <ul id="consultas" class="collapse" aria-labelledby="consultas" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Consultas/">Lista consultas</a> </li>\r\n   </ul>\r\n</li>', '2024-01-28 20:44:51'),
	(3, 'Botiquin', '<li class="menu-item">\r\n                    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#botiquin" aria-expanded="false"\r\n                        aria-controls="botiquin">\r\n                        <span><i class="fa fa-thermometer"></i>Botiquin</span>\r\n                    </a>\r\n                    <ul id="botiquin" class="collapse" aria-labelledby="botiquin" data-parent="#side-nav-accordion">\r\n                        <li> <a href="<?php echo base_url(); ?>Botiquin/">Medicamentos</a> </li>\r\n                        <li> <a href="<?php echo base_url(); ?>Botiquin/agregar_medicamento">Agregar compra</a> </li>\r\n                        <li> <a href="<?php echo base_url(); ?>Botiquin/gestion_medidas">Medidas</a> </li>\r\n                        <li> <a href="<?php echo base_url(); ?>Botiquin/historial_compras">Historial compras</a> </li>\r\n                        <li> <a href="<?php echo base_url(); ?>Botiquin/gestion_fabricantes">Fabricantes</a> </li>\r\n                    </ul>\r\n                </li>', '2021-04-30 02:00:43'),
	(4, 'Hoja de cobro', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#hojaCobro" aria-expanded="false"\r\n        aria-controls="hojaCobro">\r\n        <span><i class="fa fa-file"></i>Facturación</span>\r\n    </a>\r\n    <ul id="hojaCobro" class="collapse" aria-labelledby="hojaCobro" data-parent="#side-nav-accordion">\r\n        <!-- <li> <a href="<?php echo base_url(); ?>Hoja/">Agregar Hoja</a> </li> -->\r\n        <li> <a href="<?php echo base_url(); ?>Hoja/lista_hojas">Listado de Hojas</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>ServiciosExternos/">Servicios Externos</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Proveedor/">Proveedores</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Hoja/historial_hojas">Historial de Hojas</a> </li>\r\n    </ul>\r\n</li>', '2021-04-30 02:00:15'),
	(5, 'Gastos', '<li class="menu-item">\r\n                    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#gastos" aria-expanded="false"\r\n                        aria-controls="gastos">\r\n                        <span><i class="fa fa-tasks"></i>Gastos</span>\r\n                    </a>\r\n                    <ul id="gastos" class="collapse" aria-labelledby="gastos" data-parent="#side-nav-accordion">\r\n                        <li> <a href="<?php echo base_url(); ?>Gastos/">Cuentas</a> </li>\r\n                        <li> <a href="<?php echo base_url(); ?>Gastos/control_gastos">Control de gastos</a> </li>\r\n                    </ul>\r\n                </li>', '2021-05-01 00:20:44'),
	(6, 'Médicos', '<li class="menu-item">\r\n                    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#doctor" aria-expanded="false"\r\n                        aria-controls="doctor">\r\n                        <span><i class="fas fa-stethoscope"></i>Médico</span>\r\n                    </a>\r\n                    <ul id="doctor" class="collapse" aria-labelledby="doctor" data-parent="#side-nav-accordion">\r\n                        <li> <a href="<?php echo base_url(); ?>Medico/">Lista médicos</a> </li>\r\n                    </ul>\r\n                </li>', '2021-05-01 00:20:44'),
	(7, 'Empleados', '<li class="menu-item">\r\n                    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#empleados" aria-expanded="false"\r\n                        aria-controls="empleados">\r\n                        <span><i class="fas fa-users"></i>Empleados</span>\r\n                    </a>\r\n                    <ul id="empleados" class="collapse" aria-labelledby="empleados" data-parent="#side-nav-accordion">\r\n                        <li> <a href="<?php echo base_url(); ?>Empleado/">Agregar empleado</a> </li>\r\n                        <li> <a href="<?php echo base_url(); ?>Empleado/lista_empleados">Lista empleados</a> </li>\r\n                        <!-- <li> <a href="<?php echo base_url(); ?>Empleado/vacaciones_empleados">Cumpleañeros</a> </li> -->\r\n                        <li> <a href="<?php echo base_url(); ?>Empleado/cargos_empleados">Cargos</a> </li>\r\n                    </ul>\r\n                </li>', '2021-05-01 00:20:44'),
	(8, 'Habitaciones', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#habitacion" aria-expanded="false"\r\n        aria-controls="habitacion">\r\n        <span><i class="fas fa-hospital"></i>Habitaciones</span>\r\n    </a>\r\n    <ul id="habitacion" class="collapse" aria-labelledby="habitacion" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Paciente/esquema_habitaciones">Esquema de habitaciones</a></li>\r\n        <li> <a href="<?php echo base_url(); ?>Paciente/senso_diario">Senso diario</a></li>\r\n    </ul>\r\n</li>', '2021-05-01 00:20:44'),
	(9, 'Reportes', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#reportes" aria-expanded="false"\r\n        aria-controls="reportes">\r\n        <span><i class="fas fa-file-invoice-dollar"></i>Contabilidad</span>\r\n    </a>\r\n    <ul id="reportes" class="collapse" aria-labelledby="reportes" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Reportes/liquidacion_caja">Liquidación de caja</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Reportes/cobros_pacientes">Cobros a pacientes</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Reportes/externos_hoja">Externos por hoja</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Reportes/rx_laboratorio">RX y Laboratorio</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Reportes/detalle_gastos">Detalle gastos</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Reportes/detalle_compras">Detalle compras</a> </li>\r\n        <!-- <li> <a href="<?php echo base_url(); ?>Reportes/detalle_facturas">Facturas</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Reportes/salidas_botiquin">Salidas de botiquín</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Reportes/detalle_medicamento">Detalle medicamento</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Reportes/ingresos_costos_gastos">Ingresos, Costos, Gastos</a> </li> -->\r\n    </ul>\r\n</li>', '2021-05-01 00:20:44'),
	(10, 'Configuraciòn', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#configuracion"\r\n        aria-expanded="false" aria-controls="configuracion">\r\n        <span><i class="fa fa-cog"></i>Configuración</span>\r\n    </a>\r\n    <ul id="configuracion" class="collapse" aria-labelledby="configuracion"\r\n        data-parent="#side-nav-accordion">\r\n        <li><a href="<?php echo base_url(); ?>Accesos/">Accesos</a></li>\r\n        <li><a href="<?php echo base_url(); ?>Usuarios/gestion_usuarios">Usuarios</a></li>\r\n        <li><a href="<?php echo base_url(); ?>Permisos/">Permisos</a></li>\r\n        <li><a href="<?php echo base_url(); ?>Herramientas/movimientos_hojas">Movimientos Hojas</a></li>\r\n    </ul>\r\n</li>', '2021-05-01 00:20:44'),
	(11, 'Cuentas por pagar', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#pagar" aria-expanded="false" aria-controls="pagar">\r\n        <span><i class="fas fa-clipboard-list"></i>Cuentas por pagar</span>\r\n    </a>\r\n    <ul id="pagar" class="collapse" aria-labelledby="pagar" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>CuentasPendientes/cuentas_por_pagar">Gestión cuentas</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>CuentasPendientes/cuentas_por_proveedor">Cuentas por proveedor</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>CuentasPendientes/cuentas_por_fecha">Cuentas por fecha</a> </li>\r\n    </ul>\r\n</li>', '2021-05-18 23:29:04'),
	(12, 'Stock Medicamentos', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#stock" aria-expanded="false"\r\n        aria-controls="stock">\r\n        <span><i class="fas fa-clipboard-list"></i>Stock Medicamentos</span>\r\n    </a>\r\n    <ul id="stock" class="collapse" aria-labelledby="stock" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Botiquin/stock_medicamentos">Actualizar Stock</a> </li>\r\n    </ul>\r\n</li>', '2021-06-30 20:54:18'),
	(13, 'Laboratorio', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#laboratorio" aria-expanded="false"aria-controls="laboratorio">\r\n        <span><i class="fas fa-flask"></i>Laboratorio</span>\r\n    </a>\r\n    <ul id="laboratorio" class="collapse" aria-labelledby="laboratorio" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Laboratorio/">Agregar examen</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Laboratorio/examenes_realizados">Examenes realizados</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Laboratorio/historial_examenes">Historial examenes</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Laboratorio/resumen_examenes">Resumen examenes</a> </li>\r\n    </ul>\r\n</li>', '2021-07-30 21:02:34'),
	(14, 'Facturación', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#anuncio" aria-expanded="false"aria-controls="anuncio">\r\n        <span><i class="fas fa-newspaper"></i>Facturación</span>\r\n    </a>\r\n    <ul id="anuncio" class="collapse" aria-labelledby="laboratorio" data-parent="#side-nav-accordion">\r\n        <!-- <li> <a href="<?php echo base_url(); ?>Herramientas/agregar_anuncio">Gestion de anuncios</a> </li> -->\r\n        <!-- <li> <a href="<?php echo base_url(); ?>Herramientas/factura_isbm">Factura ISBM</a> </li> -->\r\n        <li> <a href="<?php echo base_url(); ?>Herramientas/facturacion">Facturación</a> </li>\r\n    </ul>\r\n</li>', '2021-10-26 21:15:57'),
	(15, 'Honorarios', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#honorarios" aria-expanded="false"aria-controls="honorarios">\r\n        <span><i class="fa fa-money-bill"></i>Honorarios</span>\r\n    </a>\r\n    <ul id="honorarios" class="collapse" aria-labelledby="laboratorio" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Honorarios/gestion_honorarios">Honorario de cuentas</a> </li>\r\n        <!-- <li> <a href="<?php echo base_url(); ?>Honorarios/honorarios_paquetes">Honorarios de paquetes</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Honorarios/honorarios_en_banco">Honorarios en banco</a> </li> -->\r\n    </ul>\r\n</li>', '2021-11-12 20:23:19'),
	(16, 'Precio medicamentos', '<li class="menu-item">\r\n    <a href="<?php echo base_url(); ?>Botiquin/precios_medicamentos/">\r\n    <span><i class="fas fa-list"></i>Precio medicamentos</span>\r\n    </a>\r\n</li>', '2022-01-26 19:58:11'),
	(17, 'Hemodialisis', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#hemodialisis" aria-expanded="false" aria-controls="hemodialisis">\r\n        <span><i class="fa fa-tasks"></i>Hemodiálisis </span>\r\n    </a>\r\n    <ul id="hemodialisis" class="collapse" aria-labelledby="hemodialisis" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Hemodialisis/agregar_paciente/">Agregar paciente</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Hemodialisis/agregar_cita/">Agregar cita</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Hemodialisis/lista_citas/">Lista citas</a> </li>\r\n    </ul>\r\n</li>', '2022-02-14 22:47:18'),
	(18, 'Medicamentos', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#medicamentos" aria-expanded="false" aria-controls="medicamentos">\r\n        <span><i class="fa fa-pills"></i>Medicamentos </span>\r\n    </a>\r\n    <ul id="medicamentos" class="collapse" aria-labelledby="medicamentos" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Medicamentos/cuentas_medicamento/">Gestión de cuentas</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Medicamentos/lista_salidas/">Lista de salidas</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Medicamentos/resumen_salidas/">Resumen  salidas</a> </li>\r\n    </ul>\r\n</li>', '2022-02-24 20:55:56'),
	(19, 'ISBM, Hemo, Empleados', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#isbm" aria-expanded="false" aria-controls="isbm">\r\n        <span><i class="fa fa-tablets"></i>ISBM, Hemo, Empleados</span>\r\n    </a>\r\n    <ul id="isbm" class="collapse" aria-labelledby="isbm" data-parent="#side-nav-accordion">\r\n        <!--<li> <a href="<?php echo base_url(); ?>Isbm/cuentas_isbm/">Crear Requisición</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Isbm/cuentas_isbm/">Lista requisiciones</a> </li>-->\r\n        <li> <a href="<?php echo base_url(); ?>Isbm/cuenta_descargo/">Crear cuenta para descargos</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Isbm/lista_cuenta_descargos/">Lista cuenta descargos</a> </li>\r\n    </ul>\r\n</li>', '2022-04-18 20:51:53'),
	(20, 'Insumos laboratorio', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#insumosLab" aria-expanded="false" aria-controls="insumosLab">\r\n        <span><i class="fa fa-vials"></i>Insumos laboratorio</span>\r\n    </a>\r\n    <ul id="insumosLab" class="collapse" aria-labelledby="insumosLab" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>InsumosLab/agregar_compra/">Agregar compra</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>InsumosLab/lista_compras/">Lista compras</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>InsumosLab/lista_insumos/">Lista insumos</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>InsumosLab/gestion_insumos/">Gestión insumos</a> </li>\r\n       <li> <a href="<?php echo base_url(); ?>InsumosLab/donantes/">Ingreso de sangre</a> </li>\r\n       <li> <a href="<?php echo base_url(); ?>InsumosLab/salida_sangre/">Salida de sangre</a> </li>\r\n    </ul>\r\n</li>', '2022-05-20 22:06:09'),
	(21, 'Insumos limpieza', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#insumosLimpieza" aria-expanded="false" aria-controls="insumosLimpieza">\r\n        <span><i class="fa fa-list"></i>Insumos limpieza</span>\r\n    </a>\r\n    <ul id="insumosLimpieza" class="collapse" aria-labelledby="insumosLimpieza" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Limpieza/agregar_compra/">Agregar compra</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Limpieza/lista_compras/">Lista compras</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Limpieza/descargos_insumos">Salidas</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Limpieza/">Gestión insumos</a> </li>\r\n    </ul>\r\n</li>', '2022-08-26 21:00:47'),
	(22, 'Insumos Hemodialisis', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#insumosHemodialisis" aria-expanded="false" aria-controls="insumosHemodialisis">\r\n        <span><i class="fa fa-list"></i>Insumos Hemodialisis</span>\r\n    </a>\r\n    <ul id="insumosHemodialisis" class="collapse" aria-labelledby="insumosHemodialisis" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>InsumosHemo/agregar_compra/">Agregar compra</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>InsumosHemo/lista_compras/">Lista compras</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>InsumosHemo/descargos_insumos">Salidas</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>InsumosHemo/">Gestión insumos</a> </li>\r\n    </ul>\r\n</li>', '2022-09-23 20:07:36'),
	(23, 'Planilla', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#planilla" aria-expanded="false" aria-controls="planilla">\r\n        <span><i class="fa fa-users"></i>Planilla</span>\r\n    </a>\r\n    <ul id="planilla" class="collapse" aria-labelledby="planilla" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Planilla/">Crear planilla</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Planilla/historial_planillas/">Historial planilla</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Planilla/personal_planilla/">Personal planilla</a> </li>\r\n   </ul>\r\n</li>', '2023-02-13 21:52:59'),
	(24, 'Cortes de caja', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#cortes" aria-expanded="false"\r\n        aria-controls="cortes">\r\n        <span><i class="fas fa-file"></i>Cortes de caja</span>\r\n    </a>\r\n    <ul id="cortes" class="collapse" aria-labelledby="cortes" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Cajeras/">Hacer corte</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Cajeras/lista_cortes">Lista de cortes</a> </li>\r\n    </ul>\r\n</li>', '2023-08-02 21:28:20'),
	(25, 'Quirófanos', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#quirofanos" aria-expanded="false"\r\n        aria-controls="quirofanos">\r\n        <span><i class="fas fa-file"></i>Quirófanos</span>\r\n    </a>\r\n    <ul id="quirofanos" class="collapse" aria-labelledby="quirofanos" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Quirofanos/">Cuentas Activas</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Quirofanos/lista_procedimientos">Lista de cuentas</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Quirofanos/resumen_insumos">Resumen insumos</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Quirofanos/resumen_insumos_botiquin">Resumen insumos salas</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Quirofanos/lista_insumos">Lista de insumos</a> </li>\r\n    </ul>\r\n</li>', '2023-10-04 20:23:50'),
	(26, 'Auditoria', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#auditoria" aria-expanded="false" aria-controls="auditoria">\r\n        <span><i class="fa fa-users"></i>Auditoria</span>\r\n    </a>\r\n    <ul id="auditoria" class="collapse" aria-labelledby="auditoria" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Auditoria/cuentas_con_abonos/">Cuentas con abonos</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Auditoria/liquidacion_caja/">Liquidación de caja</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Auditoria/cuentas_pendientes/">Cuentas pendientes</a> </li>\r\n   </ul>\r\n</li>', '2023-10-07 19:39:27'),
	(27, 'Stocks', '<li class="menu-item">\r\n    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#stocks" aria-expanded="false" aria-controls="stocks">\r\n        <span><i class="fa fa-list"></i>Stocks</span>\r\n    </a>\r\n    <ul id="stocks" class="collapse" aria-labelledby="stocks" data-parent="#side-nav-accordion">\r\n        <li> <a href="<?php echo base_url(); ?>Stock/">Crear stock</a> </li>\r\n        <li> <a href="<?php echo base_url(); ?>Botiquin/estado_stocks/">Lista de stocks</a> </li>\r\n   </ul>\r\n</li>', '2023-12-08 22:00:55'),
	(29, 'Cotización', '<li class="menu-item">\r\n                    <a href="#" class="has-chevron" data-toggle="collapse" data-target="#cotizacion" aria-expanded="false"\r\n                        aria-controls="cotizacion">\r\n                        <span><i class="fa fa-file"></i>Cotización</span>\r\n                    </a>\r\n                    <ul id="cotizacion" class="collapse" aria-labelledby="cotizacion" data-parent="#side-nav-accordion">\r\n                        <li> <a href="<?php echo base_url(); ?>Hoja/presupuesto">Crear cotización</a> </li>\r\n                        <li> <a href="<?php echo base_url(); ?>Hoja/lista_presupuestos">Listado de cotizaciones</a> </li>\r\n                    </ul>\r\n                </li>', '2021-04-30 04:20:37');

-- Volcando estructura para tabla db_centro_medico.tbl_movimientos_hoja
CREATE TABLE IF NOT EXISTS `tbl_movimientos_hoja` (
  `idMovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idHoja` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` text NOT NULL,
  `detalleBitacora` text NOT NULL,
  `fechaMovimiento` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idMovimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_movimientos_hoja: ~106 rows (aproximadamente)
INSERT INTO `tbl_movimientos_hoja` (`idMovimiento`, `idHoja`, `idUsuario`, `nombreUsuario`, `detalleBitacora`, `fechaMovimiento`) VALUES
	(1, 180, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Adela Matilde Romero Cruz', '2024-01-28 00:07:25'),
	(2, 1, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Adela Matilde Romero Cruz', '2024-01-28 00:15:06'),
	(3, 1, 1, 'Informatica', 'Actualizo los datos del paciente', '2024-01-28 00:22:45'),
	(4, 1, 1, 'Informatica', 'Actualizo los datos del paciente', '2024-01-28 00:22:52'),
	(5, 1, 1, 'Informatica', 'Actualizo los datos del paciente', '2024-01-28 00:22:58'),
	(6, 1, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-01-28 00:24:39'),
	(7, 2, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Juan Antonio Campos', '2024-01-28 00:43:50'),
	(8, 3, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Maria del Carmen Alfaro', '2024-01-28 00:59:46'),
	(9, 4, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Adela Matilde Romero Cruz', '2024-01-28 01:00:47'),
	(10, 5, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Adela Maria Romero Cruz', '2024-01-28 01:02:09'),
	(11, 1, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Juan Antonio Campos', '2024-01-28 15:39:10'),
	(12, 1, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Juan Antonio Campos', '2024-01-28 15:42:20'),
	(13, 2, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Maria del Carmen Alfaro', '2024-01-28 15:47:22'),
	(14, 2, 1, 'Informatica', 'Agrego 2 elementos de Acetaminofen, con precio de $1.00', '2024-02-15 21:23:51'),
	(15, 2, 1, 'Informatica', 'Edito de 2 elementos a 5 el medicamento Acetaminofen', '2024-02-15 21:24:03'),
	(16, 2, 1, 'Informatica', 'Agrego al externo Dr. Marcos Alonso(Honorarios) con un valor de $25', '2024-02-15 21:25:24'),
	(17, 2, 1, 'Informatica', 'El usuario ha cerrado la cuenta', '2024-02-15 21:25:30'),
	(18, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-15 21:25:33'),
	(19, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:29:31'),
	(20, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:30:54'),
	(21, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:39:05'),
	(22, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:40:21'),
	(23, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:41:21'),
	(24, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:42:17'),
	(25, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:48:48'),
	(26, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:50:48'),
	(27, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:51:13'),
	(28, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:51:30'),
	(29, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:51:45'),
	(30, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:51:52'),
	(31, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:51:58'),
	(32, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:53:55'),
	(33, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:54:12'),
	(34, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:54:38'),
	(35, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:54:50'),
	(36, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:55:33'),
	(37, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-02-19 21:58:39'),
	(38, 2, 1, 'Informatica', 'Creo el recibo número: #1', '2024-02-19 21:59:00'),
	(39, 3, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Adela Maria Romero Cruz', '2024-02-22 21:35:49'),
	(40, 4, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Maria del Carmen Alfaro', '2024-03-02 15:53:41'),
	(41, 5, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Maria del Carmen Alfaro', '2024-03-07 15:59:19'),
	(42, 2, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-03-07 16:15:09'),
	(43, 5, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-03-07 16:15:30'),
	(44, 5, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-03-07 16:57:11'),
	(45, 6, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Juan Antonio Campos', '2024-03-16 23:08:24'),
	(46, 6, 1, 'Informatica', 'Agrego 100 elementos de Acetaminofen, con precio de $1.00', '2024-03-16 23:54:09'),
	(47, 6, 1, 'Informatica', 'El usuario ha cerrado la cuenta', '2024-03-16 23:54:40'),
	(48, 6, 1, 'Informatica', 'Creo el recibo número: #2', '2024-03-16 23:54:42'),
	(49, 5, 1, 'Informatica', 'El usuario ha cerrado la cuenta', '2024-03-19 21:54:57'),
	(50, 7, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: Adela Maria Romero Cruz', '2024-03-22 14:51:15'),
	(51, 7, 1, 'Informatica', 'Agrego al externo Farmalab con un valor de $50', '2024-03-23 16:17:20'),
	(52, 7, 1, 'Informatica', 'Agrego al externo Juan Antonio Carcamo Flores(Honorarios) con un valor de $0', '2024-03-23 16:17:31'),
	(53, 7, 1, 'Informatica', 'Agrego 10 elementos de Analgan, con precio de $3.00', '2024-03-23 16:17:55'),
	(54, 7, 1, 'Informatica', 'El usuario ha cerrado la cuenta', '2024-03-23 16:18:07'),
	(55, 7, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-03-23 16:18:12'),
	(56, 7, 1, 'Informatica', 'El usuario abrio nuevamente la cuenta', '2024-03-23 16:18:23'),
	(57, 7, 1, 'Informatica', 'Cambio la cantidada del externo Juan Antonio Carcamo Flores(Honorarios) de $0.00 a $100', '2024-03-23 16:18:31'),
	(58, 7, 1, 'Informatica', 'El usuario ha cerrado la cuenta', '2024-03-23 16:18:34'),
	(59, 7, 1, 'Informatica', 'El usuario visualizo el resumen de la cuenta', '2024-03-23 16:18:35'),
	(60, 7, 1, 'Informatica', 'Creo el recibo número: #3', '2024-03-23 16:20:01'),
	(61, 5, 1, 'Informatica', 'Creo el recibo número: #4', '2024-03-23 21:54:40'),
	(62, 4, 1, 'Informatica', 'Agrego al externo Dr. Marcos Alonso(Honorarios) con un valor de $50', '2024-03-23 21:59:17'),
	(63, 4, 1, 'Informatica', 'Agrego 1 elementos de Acetaminofen, con precio de $1.00', '2024-03-23 22:15:45'),
	(64, 4, 1, 'Informatica', 'Agrego 1 elementos de Dogenal, con precio de $5.00', '2024-03-23 22:15:47'),
	(65, 9, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-29 22:36:42'),
	(66, 10, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-29 22:36:43'),
	(67, 11, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-29 22:36:43'),
	(68, 12, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-29 22:36:44'),
	(69, 13, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-29 22:51:11'),
	(70, 14, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-29 22:51:12'),
	(71, 15, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-29 22:51:13'),
	(72, 16, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-29 22:52:43'),
	(73, 17, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-29 22:55:03'),
	(74, 18, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-30 14:21:12'),
	(75, 18, 1, 'Informatica', 'Agrego 1 elementos de Consulta general, con precio de $10.00', '2024-03-30 15:29:57'),
	(76, 18, 1, 'Informatica', 'Agrego 1 elementos de Consulta general, con precio de $10.00', '2024-03-30 15:31:51'),
	(77, 18, 1, 'Informatica', 'Agrego 1 elementos de Consulta general, con precio de $10.00', '2024-03-30 15:38:22'),
	(78, 18, 1, 'Informatica', 'Agrego el examen HEMOGRAMA, con precio de $0.00', '2024-03-30 16:35:57'),
	(79, 18, 1, 'Informatica', 'Agrego el examen DIMERO D, con precio de $5.00', '2024-03-30 16:38:38'),
	(80, 18, 1, 'Informatica', 'Elimino 1 elementos del medicamento HEMOGRAMA, motivo: Error', '2024-03-30 16:48:17'),
	(81, 18, 1, 'Informatica', 'El usuario ha cerrado la cuenta', '2024-03-30 16:50:48'),
	(82, 18, 1, 'Informatica', 'Creo el recibo número: #5', '2024-03-30 16:50:50'),
	(83, 19, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-30 16:55:22'),
	(84, 19, 1, 'Informatica', 'Agrego 1 elementos de Consulta ginecológica, con precio de $25.00', '2024-03-30 16:59:27'),
	(85, 19, 1, 'Informatica', 'El usuario ha cerrado la cuenta', '2024-03-30 17:00:03'),
	(86, 19, 1, 'Informatica', 'Creo el recibo número: #6', '2024-03-30 17:00:04'),
	(87, 20, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-30 17:00:20'),
	(88, 20, 1, 'Informatica', 'Agrego el examen ULTRASONOGRAFIA ABDOMINAL, con precio de $0.00', '2024-03-30 17:00:27'),
	(89, 20, 1, 'Informatica', 'El usuario ha cerrado la cuenta', '2024-03-30 17:00:35'),
	(90, 20, 1, 'Informatica', 'Creo el recibo número: #7', '2024-03-30 17:00:36'),
	(91, 21, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-30 17:27:26'),
	(92, 21, 1, 'Informatica', 'Agrego 1 elementos de Consulta general, con precio de $10.00', '2024-03-30 17:27:44'),
	(93, 21, 1, 'Informatica', 'Agrego el examen GENERAL DE ORINA, con precio de $0.00', '2024-03-30 17:27:50'),
	(94, 21, 1, 'Informatica', 'Agrego el examen GENERAL DE HECES, con precio de $0.00', '2024-03-30 17:27:54'),
	(95, 21, 1, 'Informatica', 'Agrego el examen GRUPO SANGUINEO Y FACTOR RH, con precio de $0.00', '2024-03-30 17:28:02'),
	(96, 21, 1, 'Informatica', 'El usuario ha cerrado la cuenta', '2024-03-30 17:28:09'),
	(97, 21, 1, 'Informatica', 'Creo el recibo número: #8', '2024-03-30 17:28:11'),
	(98, 22, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-30 17:30:01'),
	(99, 22, 1, 'Informatica', 'Agrego 1 elementos de Consulta ginecológica, con precio de $25.00', '2024-03-30 17:30:15'),
	(100, 22, 1, 'Informatica', 'Agrego el examen TORAX(PA) DI, con precio de $0.00', '2024-03-30 17:30:30'),
	(101, 22, 1, 'Informatica', 'El usuario ha cerrado la cuenta', '2024-03-30 17:30:43'),
	(102, 22, 1, 'Informatica', 'Creo el recibo número: #9', '2024-03-30 17:30:44'),
	(103, 23, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-30 22:45:43'),
	(104, 23, 1, 'Informatica', 'Agrego el examen HOMBRO DI, con precio de $0.00', '2024-03-30 22:45:56'),
	(105, 23, 1, 'Informatica', 'El usuario ha cerrado la cuenta', '2024-03-30 22:46:16'),
	(106, 23, 1, 'Informatica', 'Creo el recibo número: #10', '2024-03-30 22:46:17'),
	(107, 24, 1, 'Informatica', 'Creo la hoja de cobro a nombre del paciente: ', '2024-03-30 22:50:07'),
	(108, 24, 1, 'Informatica', 'Agrego 1 elementos de Consulta general, con precio de $10.00', '2024-03-30 22:59:11'),
	(109, 24, 1, 'Informatica', 'El usuario ha cerrado la cuenta', '2024-03-30 22:59:25'),
	(110, 24, 1, 'Informatica', 'Creo el recibo número: #11', '2024-03-30 23:05:28');

-- Volcando estructura para tabla db_centro_medico.tbl_movimientos_stocks
CREATE TABLE IF NOT EXISTS `tbl_movimientos_stocks` (
  `idMovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idStock` int(11) NOT NULL,
  `idHoja` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `precioInsumo` decimal(9,3) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL,
  `por` int(11) NOT NULL DEFAULT 0,
  `eliminado` int(11) NOT NULL DEFAULT 0,
  `motivoEliminado` text NOT NULL,
  `reintegro` int(11) NOT NULL DEFAULT 0,
  `fechaAgregado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idMovimiento`),
  KEY `idMovimiento` (`idHoja`),
  KEY `idInsumo` (`idInsumo`),
  CONSTRAINT `tbl_movimientos_stocks_ibfk_3` FOREIGN KEY (`idHoja`) REFERENCES `tbl_hoja_cobro` (`idHoja`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_movimientos_stocks: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_municipios_sv
CREATE TABLE IF NOT EXISTS `tbl_municipios_sv` (
  `idMunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMunicipio` varchar(100) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  PRIMARY KEY (`idMunicipio`),
  KEY `idDepartamento` (`idDepartamento`),
  CONSTRAINT `tbl_municipios_sv_ibfk_1` FOREIGN KEY (`idDepartamento`) REFERENCES `tbl_departamentos_sv` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_municipios_sv: ~262 rows (aproximadamente)
INSERT INTO `tbl_municipios_sv` (`idMunicipio`, `nombreMunicipio`, `idDepartamento`) VALUES
	(1, 'Ahuachapán', 1),
	(2, 'Jujutla', 1),
	(3, 'Atiquizaya', 1),
	(4, 'Concepción de Ataco', 1),
	(5, 'El Refugio', 1),
	(6, 'Guaymango', 1),
	(7, 'Apaneca', 1),
	(8, 'San Francisco Menéndez', 1),
	(9, 'San Lorenzo', 1),
	(10, 'San Pedro Puxtla', 1),
	(11, 'Tacuba', 1),
	(12, 'Turín', 1),
	(13, 'Candelaria de la Frontera', 2),
	(14, 'Chalchuapa', 2),
	(15, 'Coatepeque', 2),
	(16, 'El Congo', 2),
	(17, 'El Porvenir', 2),
	(18, 'Masahuat', 2),
	(19, 'Metapán', 2),
	(20, 'San Antonio Pajonal', 2),
	(21, 'San Sebastián Salitrillo', 2),
	(22, 'Santa Ana', 2),
	(23, 'Santa Rosa Guachipilín', 2),
	(24, 'Santiago de la Frontera', 2),
	(25, 'Texistepeque', 2),
	(26, 'Acajutla', 3),
	(27, 'Armenia', 3),
	(28, 'Caluco', 3),
	(29, 'Cuisnahuat', 3),
	(30, 'Izalco', 3),
	(31, 'Juayúa', 3),
	(32, 'Nahuizalco', 3),
	(33, 'Nahulingo', 3),
	(34, 'Salcoatitán', 3),
	(35, 'San Antonio del Monte', 3),
	(36, 'San Julián', 3),
	(37, 'Santa Catarina Masahuat', 3),
	(38, 'Santa Isabel Ishuatán', 3),
	(39, 'Santo Domingo de Guzmán', 3),
	(40, 'Sonsonate', 3),
	(41, 'Sonzacate', 3),
	(42, 'Alegría', 11),
	(43, 'Berlín', 11),
	(44, 'California', 11),
	(45, 'Concepción Batres', 11),
	(46, 'El Triunfo', 11),
	(47, 'Ereguayquín', 11),
	(48, 'Estanzuelas', 11),
	(49, 'Jiquilisco', 11),
	(50, 'Jucuapa', 11),
	(51, 'Jucuarán', 11),
	(52, 'Mercedes Umaña', 11),
	(53, 'Nueva Granada', 11),
	(54, 'Ozatlán', 11),
	(55, 'Puerto El Triunfo', 11),
	(56, 'San Agustín', 11),
	(57, 'San Buenaventura', 11),
	(58, 'San Dionisio', 11),
	(59, 'San Francisco Javier', 11),
	(60, 'Santa Elena', 11),
	(61, 'Santa María', 11),
	(62, 'Santiago de María', 11),
	(63, 'Tecapán', 11),
	(64, 'Usulután', 11),
	(65, 'Carolina', 13),
	(66, 'Chapeltique', 13),
	(67, 'Chinameca', 13),
	(68, 'Chirilagua', 13),
	(69, 'Ciudad Barrios', 13),
	(70, 'Comacarán', 13),
	(71, 'El Tránsito', 13),
	(72, 'Lolotique', 13),
	(73, 'Moncagua', 13),
	(74, 'Nueva Guadalupe', 13),
	(75, 'Nuevo Edén de San Juan', 13),
	(76, 'Quelepa', 13),
	(77, 'San Antonio del Mosco', 13),
	(78, 'San Gerardo', 13),
	(79, 'San Jorge', 13),
	(80, 'San Luis de la Reina', 13),
	(81, 'San Miguel', 13),
	(82, 'San Rafael Oriente', 13),
	(83, 'Sesori', 13),
	(84, 'Uluazapa', 13),
	(85, 'Arambala', 12),
	(86, 'Cacaopera', 12),
	(87, 'Chilanga', 12),
	(88, 'Corinto', 12),
	(89, 'Delicias de Concepción', 12),
	(90, 'El Divisadero', 12),
	(91, 'El Rosario (Morazán)', 12),
	(92, 'Gualococti', 12),
	(93, 'Guatajiagua', 12),
	(94, 'Joateca', 12),
	(95, 'Jocoaitique', 12),
	(96, 'Jocoro', 12),
	(97, 'Lolotiquillo', 12),
	(98, 'Meanguera', 12),
	(99, 'Osicala', 12),
	(100, 'Perquín', 12),
	(101, 'San Carlos', 12),
	(102, 'San Fernando (Morazán)', 12),
	(103, 'San Francisco Gotera', 12),
	(104, 'San Isidro (Morazán)', 12),
	(105, 'San Simón', 12),
	(106, 'Sensembra', 12),
	(107, 'Sociedad', 12),
	(108, 'Torola', 12),
	(109, 'Yamabal', 12),
	(110, 'Yoloaiquín', 12),
	(111, 'La Unión', 14),
	(112, 'San Alejo', 14),
	(113, 'Yucuaiquín', 14),
	(114, 'Conchagua', 14),
	(115, 'Intipucá', 14),
	(116, 'San José', 14),
	(117, 'El Carmen (La Unión)', 14),
	(118, 'Yayantique', 14),
	(119, 'Bolívar', 14),
	(120, 'Meanguera del Golfo', 14),
	(121, 'Santa Rosa de Lima', 14),
	(122, 'Pasaquina', 14),
	(123, 'Anamoros', 14),
	(124, 'Nueva Esparta', 14),
	(125, 'El Sauce', 14),
	(126, 'Concepción de Oriente', 14),
	(127, 'Polorós', 14),
	(128, 'Lislique', 14),
	(129, 'Antiguo Cuscatlán', 4),
	(130, 'Chiltiupán', 4),
	(131, 'Ciudad Arce', 4),
	(132, 'Colón', 4),
	(133, 'Comasagua', 4),
	(134, 'Huizúcar', 4),
	(135, 'Jayaque', 4),
	(136, 'Jicalapa', 4),
	(137, 'La Libertad', 4),
	(138, 'Santa Tecla', 4),
	(139, 'Nuevo Cuscatlán', 4),
	(140, 'San Juan Opico', 4),
	(141, 'Quezaltepeque', 4),
	(142, 'Sacacoyo', 4),
	(143, 'San José Villanueva', 4),
	(144, 'San Matías', 4),
	(145, 'San Pablo Tacachico', 4),
	(146, 'Talnique', 4),
	(147, 'Tamanique', 4),
	(148, 'Teotepeque', 4),
	(149, 'Tepecoyo', 4),
	(150, 'Zaragoza', 4),
	(151, 'Agua Caliente', 5),
	(152, 'Arcatao', 5),
	(153, 'Azacualpa', 5),
	(154, 'Cancasque', 5),
	(155, 'Chalatenango', 5),
	(156, 'Citalá', 5),
	(157, 'Comapala', 5),
	(158, 'Concepción Quezaltepeque', 5),
	(159, 'Dulce Nombre de María', 5),
	(160, 'El Carrizal', 5),
	(161, 'El Paraíso', 5),
	(162, 'La Laguna', 5),
	(163, 'La Palma', 5),
	(164, 'La Reina', 5),
	(165, 'Las Vueltas', 5),
	(166, 'Nueva Concepción', 5),
	(167, 'Nueva Trinidad', 5),
	(168, 'Nombre de Jesús', 5),
	(169, 'Ojos de Agua', 5),
	(170, 'Potonico', 5),
	(171, 'San Antonio de la Cruz', 5),
	(172, 'San Antonio Los Ranchos', 5),
	(173, 'San Fernando (Chalatenango)', 5),
	(174, 'San Francisco Lempa', 5),
	(175, 'San Francisco Morazán', 5),
	(176, 'San Ignacio', 5),
	(177, 'San Isidro Labrador', 5),
	(178, 'Las Flores', 5),
	(179, 'San Luis del Carmen', 5),
	(180, 'San Miguel de Mercedes', 5),
	(181, 'San Rafael', 5),
	(182, 'Santa Rita', 5),
	(183, 'Tejutla', 5),
	(184, 'Cojutepeque', 7),
	(185, 'Candelaria', 7),
	(186, 'El Carmen (Cuscatlán)', 7),
	(187, 'El Rosario (Cuscatlán)', 7),
	(188, 'Monte San Juan', 7),
	(189, 'Oratorio de Concepción', 7),
	(190, 'San Bartolomé Perulapía', 7),
	(191, 'San Cristóbal', 7),
	(192, 'San José Guayabal', 7),
	(193, 'San Pedro Perulapán', 7),
	(194, 'San Rafael Cedros', 7),
	(195, 'San Ramón', 7),
	(196, 'Santa Cruz Analquito', 7),
	(197, 'Santa Cruz Michapa', 7),
	(198, 'Suchitoto', 7),
	(199, 'Tenancingo', 7),
	(200, 'Aguilares', 6),
	(201, 'Apopa', 6),
	(202, 'Ayutuxtepeque', 6),
	(203, 'Cuscatancingo', 6),
	(204, 'Ciudad Delgado', 6),
	(205, 'El Paisnal', 6),
	(206, 'Guazapa', 6),
	(207, 'Ilopango', 6),
	(208, 'Mejicanos', 6),
	(209, 'Nejapa', 6),
	(210, 'Panchimalco', 6),
	(211, 'Rosario de Mora', 6),
	(212, 'San Marcos', 6),
	(213, 'San Martín', 6),
	(214, 'San Salvador', 6),
	(215, 'Santiago Texacuangos', 6),
	(216, 'Santo Tomás', 6),
	(217, 'Soyapango', 6),
	(218, 'Tonacatepeque', 6),
	(219, 'Zacatecoluca', 8),
	(220, 'Cuyultitán', 8),
	(221, 'El Rosario (La Paz)', 8),
	(222, 'Jerusalén', 8),
	(223, 'Mercedes La Ceiba', 8),
	(224, 'Olocuilta', 8),
	(225, 'Paraíso de Osorio', 8),
	(226, 'San Antonio Masahuat', 8),
	(227, 'San Emigdio', 8),
	(228, 'San Francisco Chinameca', 8),
	(229, 'San Pedro Masahuat', 8),
	(230, 'San Juan Nonualco', 8),
	(231, 'San Juan Talpa', 8),
	(232, 'San Juan Tepezontes', 8),
	(233, 'San Luis La Herradura', 8),
	(234, 'San Luis Talpa', 8),
	(235, 'San Miguel Tepezontes', 8),
	(236, 'San Pedro Nonualco', 8),
	(237, 'San Rafael Obrajuelo', 8),
	(238, 'Santa María Ostuma', 8),
	(239, 'Santiago Nonualco', 8),
	(240, 'Tapalhuaca', 8),
	(241, 'Cinquera', 9),
	(242, 'Dolores', 9),
	(243, 'Guacotecti', 9),
	(244, 'Ilobasco', 9),
	(245, 'Jutiapa', 9),
	(246, 'San Isidro (Cabañas)', 9),
	(247, 'Sensuntepeque', 9),
	(248, 'Tejutepeque', 9),
	(249, 'Victoria', 9),
	(250, 'Apastepeque', 10),
	(251, 'Guadalupe', 10),
	(252, 'San Cayetano Istepeque', 10),
	(253, 'San Esteban Catarina', 10),
	(254, 'San Ildefonso', 10),
	(255, 'San Lorenzo', 10),
	(256, 'San Sebastián', 10),
	(257, 'San Vicente', 10),
	(258, 'Santa Clara', 10),
	(259, 'Santo Domingo', 10),
	(260, 'Tecoluca', 10),
	(261, 'Tepetitán', 10),
	(262, 'Verapaz', 10);

-- Volcando estructura para tabla db_centro_medico.tbl_orina
CREATE TABLE IF NOT EXISTS `tbl_orina` (
  `idOrina` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `colorOrina` text NOT NULL,
  `aspectoOrina` varchar(25) NOT NULL,
  `reaccionOrina` varchar(25) NOT NULL,
  `densidadOrina` varchar(25) NOT NULL,
  `phOrina` varchar(25) NOT NULL,
  `proteinasOrina` varchar(25) NOT NULL,
  `glucosaOrina` varchar(25) NOT NULL,
  `pigBilaOrina` varchar(25) NOT NULL,
  `sangreOcultaOrina` varchar(25) NOT NULL,
  `nitritoOrina` varchar(25) NOT NULL,
  `cuerposCetonicosOrina` varchar(25) NOT NULL,
  `acidosBilOrina` varchar(25) NOT NULL,
  `granulososOrina` varchar(25) NOT NULL,
  `cilindrosLeuOrina` varchar(25) NOT NULL,
  `cilindrosOrina` varchar(25) NOT NULL,
  `oCilindrosOrina` varchar(25) NOT NULL,
  `leucocitosOrina` varchar(25) NOT NULL,
  `hematiesOrina` varchar(25) NOT NULL,
  `celulasEpitelialesOrina` varchar(25) NOT NULL,
  `elemMineralesOrina` varchar(25) NOT NULL,
  `bacteriasOrina` varchar(25) NOT NULL,
  `levaduraOrina` varchar(25) NOT NULL,
  `otrosOrina` varchar(25) NOT NULL,
  `observacionesOrina` text NOT NULL,
  `fechaOrina` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idOrina`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_orina: ~2 rows (aproximadamente)
INSERT INTO `tbl_orina` (`idOrina`, `examenSolicitado`, `colorOrina`, `aspectoOrina`, `reaccionOrina`, `densidadOrina`, `phOrina`, `proteinasOrina`, `glucosaOrina`, `pigBilaOrina`, `sangreOcultaOrina`, `nitritoOrina`, `cuerposCetonicosOrina`, `acidosBilOrina`, `granulososOrina`, `cilindrosLeuOrina`, `cilindrosOrina`, `oCilindrosOrina`, `leucocitosOrina`, `hematiesOrina`, `celulasEpitelialesOrina`, `elemMineralesOrina`, `bacteriasOrina`, `levaduraOrina`, `otrosOrina`, `observacionesOrina`, `fechaOrina`) VALUES
	(19, 0, 'c', 'a', 'r', 'd', 'p', 'p', 'g', 'p', 's', 'n', 'c', 'a', 'g', 'c', 'c', 'o', 'l', 'h', 'c', 'e', 'b', 'l', 'o', 'Obser', '2024-03-04 15:41:50'),
	(22, 0, '', '', '', '', '', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', '', '', '', 'NO SE OBSERVAN', 'NO SE OBSERVAN', '', '', '', '', '', 'NEGATIVO', 'NO SE OBSERVAN', '', '2024-03-07 15:53:56'),
	(23, 0, 'Verde', 'Rojizo', 'Loca', 'Fuerte', '5', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', 'NEGATIVO', '', '-', '-', 'NO SE OBSERVAN', 'NO SE OBSERVAN', '-', '-', '-', '-', '', 'NEGATIVO', 'NO SE OBSERVAN', 'Esta todo bien verde', '2024-04-09 01:05:29');

-- Volcando estructura para tabla db_centro_medico.tbl_pacientes
CREATE TABLE IF NOT EXISTS `tbl_pacientes` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePaciente` varchar(50) NOT NULL,
  `edadPaciente` int(11) NOT NULL,
  `telefonoPaciente` varchar(10) NOT NULL,
  `duiPaciente` varchar(15) NOT NULL,
  `nacimientoPaciente` varchar(15) NOT NULL,
  `departamentoPaciente` int(11) NOT NULL DEFAULT 0,
  `municipioPaciente` int(11) NOT NULL DEFAULT 0,
  `direccionPaciente` text NOT NULL,
  `civilPaciente` varchar(25) NOT NULL,
  `sexoPaciente` varchar(20) NOT NULL,
  `creadoPaciente` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idPaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_pacientes: ~4 rows (aproximadamente)
INSERT INTO `tbl_pacientes` (`idPaciente`, `nombrePaciente`, `edadPaciente`, `telefonoPaciente`, `duiPaciente`, `nacimientoPaciente`, `departamentoPaciente`, `municipioPaciente`, `direccionPaciente`, `civilPaciente`, `sexoPaciente`, `creadoPaciente`) VALUES
	(1, 'Juan Antonio Campos', 14, '7458-9623', '11111111-1', '2010-01-25', 11, 42, 'El Transito', 'Soltero/a', 'Masculino', '2024-01-25 21:25:02'),
	(2, 'Maria del Carmen Alfaro', 29, '7586-2333', '22222222-2', '1995-01-23', 12, 94, 'San Miguel', 'Soltero/a', 'Femenino', '2024-01-25 21:25:02'),
	(3, 'Adela Maria Romero Cruz', 24, '7326-5499', '33333333-3', '2000-02-01', 4, 129, 'El Transito', 'Soltero/a', 'Femenino', '2024-01-25 21:25:02'),
	(4, 'Adela Matilde Romero Cruz', 24, '7326-5499', '44444444-4', '2000-02-01', 11, 48, 'El Transito', 'Casado/a', 'Femenino', '2024-01-25 21:25:02'),
	(5, 'Marcos Daniel Funes', 24, '7485-9631', '55555555-5', '2000-03-25', 11, 50, 'Barrio la Merced', 'Casado/a', 'Masculino', '2024-03-26 01:23:46');

-- Volcando estructura para tabla db_centro_medico.tbl_paquetes
CREATE TABLE IF NOT EXISTS `tbl_paquetes` (
  `idPaquete` int(11) NOT NULL AUTO_INCREMENT,
  `codigoPaquete` int(11) NOT NULL,
  `pacientePaquete` text NOT NULL,
  `medicoPaquete` int(11) NOT NULL,
  `cantidadPaquete` decimal(9,2) NOT NULL,
  `conceptoPaquete` int(11) NOT NULL,
  `fechaPaquete` date NOT NULL,
  `estadoPaquete` int(11) NOT NULL,
  `flagDelete` int(11) NOT NULL,
  `cuenta_creada` varchar(25) NOT NULL DEFAULT '',
  `recibo_creado` text NOT NULL,
  `saldado` int(11) NOT NULL DEFAULT 0,
  `hoja` int(11) NOT NULL DEFAULT 0,
  `fechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idPaquete`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_paquetes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_permisos
CREATE TABLE IF NOT EXISTS `tbl_permisos` (
  `idPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `idAcceso` int(11) NOT NULL,
  `estadoPermiso` int(11) NOT NULL,
  `fechaPermiso` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idPermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_permisos: ~10 rows (aproximadamente)
INSERT INTO `tbl_permisos` (`idPermiso`, `idMenu`, `idAcceso`, `estadoPermiso`, `fechaPermiso`) VALUES
	(1, 1, 1, 1, '2024-03-30 22:38:52'),
	(2, 2, 1, 1, '2024-03-30 22:38:59'),
	(3, 3, 1, 1, '2024-03-30 22:39:13'),
	(4, 13, 1, 1, '2024-03-30 22:41:22'),
	(5, 4, 1, 1, '2024-03-30 22:39:57'),
	(6, 16, 1, 1, '2024-03-30 22:39:46'),
	(7, 6, 1, 1, '2024-03-30 22:41:22'),
	(8, 5, 1, 1, '2024-03-30 22:40:19'),
	(9, 9, 1, 1, '2024-03-30 23:06:24'),
	(12, 10, 1, 1, '2024-03-30 22:41:22');

-- Volcando estructura para tabla db_centro_medico.tbl_personal_planilla
CREATE TABLE IF NOT EXISTS `tbl_personal_planilla` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEmpleado` text NOT NULL,
  `telefonoEmpleado` varchar(10) NOT NULL,
  `duiEmpleado` varchar(10) NOT NULL,
  `correoEmpleado` text NOT NULL,
  `nacimientoEmpleado` date NOT NULL,
  `ingresoEmpleado` date NOT NULL,
  `salarioEmpleado` decimal(9,2) NOT NULL,
  `areaEmpleado` int(11) NOT NULL,
  `direccionEmpleado` text NOT NULL,
  `estadoEmpleado` int(11) NOT NULL DEFAULT 1,
  `cargoEmpleado` text NOT NULL,
  `horasExtras` int(11) NOT NULL DEFAULT 0,
  `precioHoraExtra` decimal(9,2) NOT NULL DEFAULT 0.00,
  `bonoEmpleado` decimal(9,2) NOT NULL DEFAULT 0.00,
  `pivoteRetenciones` int(11) NOT NULL DEFAULT 0,
  `seguimientoEmpleado` text NOT NULL,
  `fechaEmpleado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_personal_planilla: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_pivote_reactivos
CREATE TABLE IF NOT EXISTS `tbl_pivote_reactivos` (
  `idPivoteReactivo` int(11) NOT NULL AUTO_INCREMENT,
  `idExamen` int(11) NOT NULL,
  `idReactivo` int(11) NOT NULL,
  `medidaReactivo` decimal(9,2) NOT NULL,
  `nombreExamen` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`idPivoteReactivo`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_pivote_reactivos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_planilla
CREATE TABLE IF NOT EXISTS `tbl_planilla` (
  `idPlanilla` int(11) NOT NULL AUTO_INCREMENT,
  `quincenaPlanilla` int(11) NOT NULL,
  `mesPlanilla` varchar(15) NOT NULL,
  `descripcionPlanilla` text NOT NULL,
  `fechaPlanilla` date NOT NULL,
  `estadoPlanilla` int(11) NOT NULL DEFAULT 1,
  `creadoPlanilla` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idPlanilla`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_planilla: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_presupuesto
CREATE TABLE IF NOT EXISTS `tbl_presupuesto` (
  `idPresupuesto` int(11) NOT NULL AUTO_INCREMENT,
  `codigoPresupuesto` int(11) NOT NULL,
  `pacientePresupuesto` varchar(100) NOT NULL,
  `fechaPresupuesto` varchar(15) NOT NULL,
  `tipoPresupuesto` varchar(20) NOT NULL,
  `medicoPresupuesto` int(11) NOT NULL,
  PRIMARY KEY (`idPresupuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_presupuesto: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_presupuesto_externos
CREATE TABLE IF NOT EXISTS `tbl_presupuesto_externos` (
  `idPresupuestoExterno` int(11) NOT NULL AUTO_INCREMENT,
  `idPresupuesto` int(11) NOT NULL,
  `idExterno` int(11) NOT NULL,
  `cantidadExterno` int(11) NOT NULL,
  `precioExterno` decimal(9,2) NOT NULL,
  `fechaExterno` date NOT NULL,
  PRIMARY KEY (`idPresupuestoExterno`),
  KEY `idPresupuesto` (`idPresupuesto`),
  KEY `idExterno` (`idExterno`),
  CONSTRAINT `tbl_presupuesto_externos_ibfk_1` FOREIGN KEY (`idExterno`) REFERENCES `tbl_externos` (`idExterno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_presupuesto_externos_ibfk_2` FOREIGN KEY (`idPresupuesto`) REFERENCES `tbl_presupuesto` (`idPresupuesto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_presupuesto_externos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_presupuesto_insumos
CREATE TABLE IF NOT EXISTS `tbl_presupuesto_insumos` (
  `idPresupuestoInsumo` int(11) NOT NULL AUTO_INCREMENT,
  `idPresupuesto` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `precioInsumo` decimal(9,2) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL,
  `fechaInsumo` date NOT NULL,
  PRIMARY KEY (`idPresupuestoInsumo`),
  KEY `idPresupuesto` (`idPresupuesto`),
  KEY `idInsumo` (`idInsumo`),
  CONSTRAINT `tbl_presupuesto_insumos_ibfk_2` FOREIGN KEY (`idPresupuesto`) REFERENCES `tbl_presupuesto` (`idPresupuesto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_presupuesto_insumos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_procedimientos_salas
CREATE TABLE IF NOT EXISTS `tbl_procedimientos_salas` (
  `idProcedimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idHoja` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `procedimientoSala` text NOT NULL,
  `fechaProcedimiento` date NOT NULL,
  `horaProcedimiento` text NOT NULL,
  `estadoProcedimiento` int(11) NOT NULL DEFAULT 1,
  `creadoProcedimiento` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idProcedimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_procedimientos_salas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_proveedores
CREATE TABLE IF NOT EXISTS `tbl_proveedores` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `codigoProveedor` varchar(15) NOT NULL,
  `empresaProveedor` varchar(50) NOT NULL,
  `propietarioProveedor` varchar(75) NOT NULL,
  `nrcProveedor` varchar(10) NOT NULL,
  `visitadorProveedor` varchar(50) NOT NULL,
  `telefonoProveedor` varchar(10) NOT NULL,
  `plazoProveedor` int(11) NOT NULL DEFAULT 0,
  `tipoContribuyente` varchar(50) NOT NULL,
  `direccionProveedor` text NOT NULL,
  `estadoProveedor` int(11) NOT NULL DEFAULT 1,
  `fechaAgregado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_proveedores: ~2 rows (aproximadamente)
INSERT INTO `tbl_proveedores` (`idProveedor`, `codigoProveedor`, `empresaProveedor`, `propietarioProveedor`, `nrcProveedor`, `visitadorProveedor`, `telefonoProveedor`, `plazoProveedor`, `tipoContribuyente`, `direccionProveedor`, `estadoProveedor`, `fechaAgregado`) VALUES
	(12, '1000', 'Farmalab', '', '456222', '2222-222222-222-2', '2635-6412', 60, 'Grande', 'Col. Flor Blanca, San Salvador', 1, '2024-01-31 16:37:18'),
	(14, '1001', 'Texaco', '', '123546', 'Juan Perez', '2365-9748', 30, 'Grande', 'Usulutan', 1, '2024-01-31 16:37:18');

-- Volcando estructura para tabla db_centro_medico.tbl_quimica_clinica
CREATE TABLE IF NOT EXISTS `tbl_quimica_clinica` (
  `idQuimicaClinica` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `sodioQuimicaClinica` varchar(25) NOT NULL,
  `potasioQuimicaClinica` varchar(25) NOT NULL,
  `cloroQuimicaClinica` varchar(25) NOT NULL,
  `magnesioQuimicaClinica` varchar(25) NOT NULL,
  `fosforoQuimicaClinica` varchar(25) NOT NULL,
  `cpkTQuimicaClinica` varchar(25) NOT NULL,
  `cpkMbQuimicaClinica` varchar(25) NOT NULL,
  `ldhQuimicaClinica` varchar(25) NOT NULL,
  `creatininaQuimicaClinica` varchar(25) NOT NULL,
  `troponinaQuimicaClinica` varchar(25) NOT NULL,
  `comentariosQuimicaClinica` varchar(25) NOT NULL,
  `fechaQuimicaClinica` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idQuimicaClinica`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_quimica_clinica: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_quimica_sanguinea
CREATE TABLE IF NOT EXISTS `tbl_quimica_sanguinea` (
  `idQuimicaSanguinea` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `glucosaQS` varchar(25) NOT NULL,
  `posprandialQS` varchar(25) NOT NULL,
  `colesterolQS` varchar(25) NOT NULL,
  `colesterolHDLQS` varchar(25) NOT NULL,
  `colesterolLDLQS` varchar(25) NOT NULL,
  `trigliceridosQS` varchar(25) NOT NULL,
  `acidoUricoQS` varchar(25) NOT NULL,
  `ureaQS` varchar(25) NOT NULL,
  `nitrogenoQS` varchar(25) NOT NULL,
  `creatininaQS` varchar(25) NOT NULL,
  `amilasaQS` varchar(25) NOT NULL,
  `lipasaQS` varchar(25) NOT NULL,
  `fosfatasaQS` varchar(25) NOT NULL,
  `tgpQS` varchar(25) NOT NULL,
  `tgoQS` varchar(25) NOT NULL,
  `hba1cQS` varchar(25) NOT NULL,
  `proteinaTotalQS` varchar(25) NOT NULL,
  `albuminaQS` varchar(25) NOT NULL,
  `globulinaQS` varchar(25) NOT NULL,
  `relacionAGQS` varchar(25) NOT NULL,
  `bilirrubinaTQS` varchar(25) NOT NULL,
  `bilirrubinaDQS` varchar(25) NOT NULL,
  `bilirrubinaIQS` varchar(25) NOT NULL,
  `sodioQuimicaClinica` varchar(25) NOT NULL,
  `potasioQuimicaClinica` varchar(25) NOT NULL,
  `cloroQuimicaClinica` varchar(25) NOT NULL,
  `magnesioQuimicaClinica` varchar(25) NOT NULL,
  `calcioQuimicaClinica` varchar(25) NOT NULL,
  `fosforoQuimicaClinica` varchar(25) NOT NULL,
  `cpkTQuimicaClinica` varchar(25) NOT NULL,
  `cpkMbQuimicaClinica` varchar(25) NOT NULL,
  `ldhQuimicaClinica` varchar(25) NOT NULL,
  `troponinaQuimicaClinica` varchar(25) NOT NULL,
  `notaQS` text NOT NULL,
  `fechaQS` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idQuimicaSanguinea`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_quimica_sanguinea: ~3 rows (aproximadamente)
INSERT INTO `tbl_quimica_sanguinea` (`idQuimicaSanguinea`, `examenSolicitado`, `glucosaQS`, `posprandialQS`, `colesterolQS`, `colesterolHDLQS`, `colesterolLDLQS`, `trigliceridosQS`, `acidoUricoQS`, `ureaQS`, `nitrogenoQS`, `creatininaQS`, `amilasaQS`, `lipasaQS`, `fosfatasaQS`, `tgpQS`, `tgoQS`, `hba1cQS`, `proteinaTotalQS`, `albuminaQS`, `globulinaQS`, `relacionAGQS`, `bilirrubinaTQS`, `bilirrubinaDQS`, `bilirrubinaIQS`, `sodioQuimicaClinica`, `potasioQuimicaClinica`, `cloroQuimicaClinica`, `magnesioQuimicaClinica`, `calcioQuimicaClinica`, `fosforoQuimicaClinica`, `cpkTQuimicaClinica`, `cpkMbQuimicaClinica`, `ldhQuimicaClinica`, `troponinaQuimicaClinica`, `notaQS`, `fechaQS`) VALUES
	(37, 0, '1', '1', '', '1', '1', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Todo chivo tilin', '2024-03-04 14:32:13'),
	(39, 0, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '2024-04-10 01:34:41'),
	(40, 0, '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '', '', '11', '', '', '', '', 'Editado', '2024-04-10 01:35:19');

-- Volcando estructura para tabla db_centro_medico.tbl_responsables
CREATE TABLE IF NOT EXISTS `tbl_responsables` (
  `idResponsable` int(11) NOT NULL AUTO_INCREMENT,
  `idMenor` int(11) NOT NULL,
  `nombreResponsable` varchar(50) NOT NULL,
  `edadResponsable` int(11) NOT NULL,
  `telefonoResponsable` varchar(15) NOT NULL,
  `duiResponsable` varchar(15) NOT NULL,
  `profesionResponsable` text NOT NULL,
  `parentescoResponsable` varchar(15) NOT NULL,
  `direccionResponsable` text NOT NULL,
  `esResponsable` text NOT NULL,
  `pivoteResponsable` int(11) NOT NULL DEFAULT 0,
  `creadoResponsable` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idResponsable`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_responsables: ~4 rows (aproximadamente)
INSERT INTO `tbl_responsables` (`idResponsable`, `idMenor`, `nombreResponsable`, `edadResponsable`, `telefonoResponsable`, `duiResponsable`, `profesionResponsable`, `parentescoResponsable`, `direccionResponsable`, `esResponsable`, `pivoteResponsable`, `creadoResponsable`) VALUES
	(1, 1, ' Maria del Carmen Campos', 35, '7123-6598', '22222222-2', 'Profesora', 'Madre', ' El Transito', '', 0, '2024-01-13 22:22:36'),
	(2, 2, ' Carlos Alfaro', 0, '2365-9878', '32165489-9', ' ', 'Padre', ' ', '', 1, '2024-01-16 21:44:31'),
	(3, 4, ' Rodolfo Alberto Romero', 0, '7695-8431', '06235498-7', '', 'Padre', '', '', 1, '2024-01-25 21:23:56'),
	(4, 3, '', 0, '', '', '', '', '', '', 1, '2024-01-25 22:51:20'),
	(5, 5, 'Juana Funes', 0, '7956-1231', '04125632-9', '', 'M', '', '', 1, '2024-03-26 01:23:46');

-- Volcando estructura para tabla db_centro_medico.tbl_salidas_hemo
CREATE TABLE IF NOT EXISTS `tbl_salidas_hemo` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCuenta` date NOT NULL,
  `estadoCuenta` int(11) NOT NULL DEFAULT 1,
  `cuentaCreada` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_salidas_hemo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_salidas_limpieza
CREATE TABLE IF NOT EXISTS `tbl_salidas_limpieza` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCuenta` date NOT NULL,
  `estadoCuenta` int(11) NOT NULL DEFAULT 1,
  `cuentaCreada` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_salidas_limpieza: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_sanguineo
CREATE TABLE IF NOT EXISTS `tbl_sanguineo` (
  `idSanguineo` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `muestraSanguineo` varchar(25) NOT NULL,
  `grupoSanguineo` varchar(25) NOT NULL,
  `factorSanguineo` varchar(25) NOT NULL,
  `duSanguineo` varchar(25) NOT NULL,
  `fechaSanguineo` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idSanguineo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_sanguineo: ~1 rows (aproximadamente)
INSERT INTO `tbl_sanguineo` (`idSanguineo`, `examenSolicitado`, `muestraSanguineo`, `grupoSanguineo`, `factorSanguineo`, `duSanguineo`, `fechaSanguineo`) VALUES
	(16, 0, 'Sangre', 'A', 'Positivo', 'N/A', '2024-04-10 01:42:53');

-- Volcando estructura para tabla db_centro_medico.tbl_seguros
CREATE TABLE IF NOT EXISTS `tbl_seguros` (
  `idSeguro` int(11) NOT NULL AUTO_INCREMENT,
  `nombreSeguro` varchar(25) NOT NULL,
  `porcentajeSeguro` decimal(9,2) NOT NULL,
  `estadoSeguro` int(11) NOT NULL DEFAULT 1,
  `agregadoSeguro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idSeguro`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_seguros: ~9 rows (aproximadamente)
INSERT INTO `tbl_seguros` (`idSeguro`, `nombreSeguro`, `porcentajeSeguro`, `estadoSeguro`, `agregadoSeguro`) VALUES
	(1, 'Ninguno', 0.00, 1, '0000-00-00 00:00:00'),
	(2, 'Abank', 20.00, 1, '0000-00-00 00:00:00'),
	(3, 'Mapfre', 20.00, 1, '0000-00-00 00:00:00'),
	(4, 'Mi Red', 20.00, 1, '0000-00-00 00:00:00'),
	(5, 'Paligmed', 20.00, 1, '0000-00-00 00:00:00'),
	(6, 'RPN', 20.00, 1, '0000-00-00 00:00:00'),
	(7, 'El tercio', 0.00, 1, '0000-00-00 00:00:00'),
	(8, 'ISSS', 0.00, 1, '0000-00-00 00:00:00'),
	(9, 'Empleados', -25.00, 1, '2023-09-26 20:53:50');

-- Volcando estructura para tabla db_centro_medico.tbl_tipo_consulta_lab
CREATE TABLE IF NOT EXISTS `tbl_tipo_consulta_lab` (
  `idTipoConsultaLab` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoConsultaLab` varchar(25) NOT NULL,
  `agregadoTipoConsultaLab` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idTipoConsultaLab`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_tipo_consulta_lab: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_tipo_gasto
CREATE TABLE IF NOT EXISTS `tbl_tipo_gasto` (
  `idTipoGasto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoGasto` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipoGasto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_tipo_gasto: ~4 rows (aproximadamente)
INSERT INTO `tbl_tipo_gasto` (`idTipoGasto`, `nombreTipoGasto`) VALUES
	(1, 'Crédito fiscal inventariado'),
	(2, 'Crédito fiscal gasto'),
	(3, 'Gasto facturado'),
	(4, 'Gasto no facturado');

-- Volcando estructura para tabla db_centro_medico.tbl_tiroideas_libres
CREATE TABLE IF NOT EXISTS `tbl_tiroideas_libres` (
  `idTiroideaLibre` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `muestraTiroideaLibre` varchar(25) NOT NULL,
  `t3TiroideaLibre` varchar(25) NOT NULL,
  `t4TiroideaLibre` varchar(25) NOT NULL,
  `tshTiroideaLibre` varchar(25) NOT NULL,
  `tshTiroideaLibreU` varchar(25) NOT NULL,
  `observacionTiroideaLibre` text NOT NULL,
  `fechaTiroideaLibre` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idTiroideaLibre`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_tiroideas_libres: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_tiroideas_totales
CREATE TABLE IF NOT EXISTS `tbl_tiroideas_totales` (
  `idTiroideaTotal` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `muestraTiroideaTotal` varchar(25) NOT NULL,
  `t3TiroideaTotal` varchar(25) NOT NULL,
  `t4TiroideaTotal` varchar(25) NOT NULL,
  `tshTiroideaTotal` varchar(25) NOT NULL,
  `observacionTiroideaTotal` text NOT NULL,
  `fechaTiroideaTotal` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idTiroideaTotal`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_tiroideas_totales: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_tolerancia_glucosa
CREATE TABLE IF NOT EXISTS `tbl_tolerancia_glucosa` (
  `idToleranciaGlucosa` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `resultado1ToleranciaGlucosa` text NOT NULL,
  `hora1ToleranciaGlucosa` text NOT NULL,
  `resultado2ToleranciaGlucosa` text NOT NULL,
  `hora2ToleranciaGlucosa` text NOT NULL,
  `resultado3ToleranciaGlucosa` text NOT NULL,
  `hora3ToleranciaGlucosa` text NOT NULL,
  `resultado4ToleranciaGlucosa` text NOT NULL,
  `hora4ToleranciaGlucosa` text NOT NULL,
  `observacionToleranciaGlucosa` text NOT NULL,
  `parametroCarga` varchar(10) NOT NULL DEFAULT '75',
  `fechaToleranciaGlucosa` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idToleranciaGlucosa`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_tolerancia_glucosa: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_toxoplasma
CREATE TABLE IF NOT EXISTS `tbl_toxoplasma` (
  `idToxoplasma` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `iggToxoplasma` varchar(25) NOT NULL,
  `igmToxoplasma` varchar(25) NOT NULL,
  `observacionesToxoplasma` text NOT NULL,
  `fechaToxoplasma` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idToxoplasma`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_toxoplasma: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_uso_reactivos
CREATE TABLE IF NOT EXISTS `tbl_uso_reactivos` (
  `idUsoReactivo` int(11) NOT NULL AUTO_INCREMENT,
  `idReactivo` int(11) NOT NULL,
  `cantidadReactivo` decimal(9,2) NOT NULL,
  `filaPivote` int(11) NOT NULL DEFAULT 0,
  `pivoteTabla` int(11) NOT NULL DEFAULT 0,
  `fechaReactivo` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idUsoReactivo`)
) ENGINE=InnoDB AUTO_INCREMENT=376 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_uso_reactivos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_usuarios
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(50) NOT NULL,
  `psUsuario` text NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idAcceso` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL DEFAULT 0,
  `codigoVerificacion` varchar(50) NOT NULL,
  `nivelUsuario` int(11) NOT NULL DEFAULT 0,
  `estadoUsuario` int(11) NOT NULL DEFAULT 1,
  `fechaUsuario` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idUsuario`),
  KEY `idEmpleado` (`idEmpleado`),
  KEY `idAcceso` (`idAcceso`),
  CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `tbl_empleados` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_usuarios_ibfk_2` FOREIGN KEY (`idAcceso`) REFERENCES `tbl_accesos` (`idAcceso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_usuarios: ~0 rows (aproximadamente)
INSERT INTO `tbl_usuarios` (`idUsuario`, `nombreUsuario`, `psUsuario`, `idEmpleado`, `idAcceso`, `idMedico`, `codigoVerificacion`, `nivelUsuario`, `estadoUsuario`, `fechaUsuario`) VALUES
	(1, 'Informatica', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 0, '2f2bb449c2cb83320769d123f0904b5a', 1, 1, '2021-04-30 00:05:52');

-- Volcando estructura para tabla db_centro_medico.tbl_usuario_anuncio
CREATE TABLE IF NOT EXISTS `tbl_usuario_anuncio` (
  `idUsuarioAnuncio` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idAnuncio` int(11) NOT NULL,
  `fechaProgramacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idUsuarioAnuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_usuario_anuncio: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_vales_hemo
CREATE TABLE IF NOT EXISTS `tbl_vales_hemo` (
  `idVale` int(11) NOT NULL AUTO_INCREMENT,
  `codigoVale` int(11) NOT NULL,
  `citaVale` int(11) NOT NULL,
  `creadoVale` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idVale`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_vales_hemo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_centro_medico.tbl_varios
CREATE TABLE IF NOT EXISTS `tbl_varios` (
  `idVarios` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` text NOT NULL,
  `muestraVarios` varchar(25) NOT NULL,
  `resultadoVarios` text NOT NULL,
  `valorNormalVarios` varchar(25) NOT NULL,
  `observacionesVarios` text NOT NULL,
  `fechaVarios` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idVarios`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_varios: ~3 rows (aproximadamente)
INSERT INTO `tbl_varios` (`idVarios`, `examenSolicitado`, `muestraVarios`, `resultadoVarios`, `valorNormalVarios`, `observacionesVarios`, `fechaVarios`) VALUES
	(139, 'Testing', '5', '4', '3', '2', '2024-03-05 16:11:06'),
	(141, 'CEA', '5', '5', '5', '5', '2024-04-10 01:55:46'),
	(142, 'CEA', 'Test', 'Bueno', '2.5 mg/dl', 'Testing', '2024-04-10 01:56:27');

-- Volcando estructura para tabla db_centro_medico.tbl_zonas_sv
CREATE TABLE IF NOT EXISTS `tbl_zonas_sv` (
  `idZona` int(11) NOT NULL AUTO_INCREMENT,
  `nombreZona` varchar(15) NOT NULL,
  PRIMARY KEY (`idZona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla db_centro_medico.tbl_zonas_sv: ~4 rows (aproximadamente)
INSERT INTO `tbl_zonas_sv` (`idZona`, `nombreZona`) VALUES
	(1, 'Occidental'),
	(2, 'Central'),
	(3, 'Paracentral'),
	(4, 'Oriental');

-- Volcando estructura para disparador db_centro_medico.abonos_empleados
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `abonos_empleados` BEFORE INSERT ON `tbl_abonos_empleados` FOR EACH ROW BEGIN

-- Actualizar el stock en tbl_insumos limpieza
 UPDATE tbl_empleado_x_descuentos AS exd
 SET exd.totalAbonado = (exd.totalAbonado + NEW.montoAbono),
		exd.estadoDescuento = '2'
 WHERE exd.idEmDes = NEW.idEmpleadoDescuento;
 
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.actualizar_abono
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `actualizar_abono` AFTER UPDATE ON `tbl_paquetes` FOR EACH ROW BEGIN
-- Actualizar el stock en tbl_insumos
   UPDATE tbl_abonos_hoja AS ah
   SET ah.montoAbono = NEW.cantidadPaquete
   WHERE ah.paqueteAbono = NEW.idPaquete;
   
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.actualizar_compra_bodega
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `actualizar_compra_bodega` AFTER UPDATE ON `tbl_dcompra_limpieza` FOR EACH ROW BEGIN
-- Obtener el stock actual
   DECLARE stock_actual INT;
   DECLARE diferencia INT;
   SELECT stockInsumoLimpieza INTO stock_actual FROM tbl_insumos_limpieza WHERE idInsumoLimpieza = NEW.idInsumo;
   
-- Diferencia entre la cantidad actual y nueva
   SET diferencia = ABS(NEW.cantidad-OLD.cantidad);

-- Actualizar el stock en tbl_insumos
   UPDATE tbl_insumos_limpieza
   SET stockInsumoLimpieza = stock_actual + (NEW.cantidad - OLD.cantidad)
   WHERE idInsumoLimpieza = NEW.idInsumo;
   
-- Actualizar la fila correspondiente en tbl_kardex
   UPDATE tbl_kardex_bodega
   SET cantidadInsumo = NEW.cantidad,
       stockActual = stock_actual + (NEW.cantidad - OLD.cantidad)
   WHERE filaEntrada = NEW.idDCompraLimpieza;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.actualizar_compra_lab
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `actualizar_compra_lab` AFTER UPDATE ON `tbl_detalle_compra_lab` FOR EACH ROW BEGIN
-- Obtener el stock actual
   DECLARE stock_actual INT;
   DECLARE diferencia INT;
   SELECT il.stockInsumoLab INTO stock_actual FROM tbl_insumos_lab AS il WHERE il.idInsumoLab = NEW.idInsumoLab;
   
-- Diferencia entre la cantidad actual y nueva
   SET diferencia = ABS(NEW.cantidadDetalleCL - OLD.cantidadDetalleCL);

-- Actualizar el stock en tbl_insumos
   UPDATE tbl_insumos_lab AS il
   SET il.stockInsumoLab = stock_actual + (NEW.cantidadDetalleCL - OLD.cantidadDetalleCL)
   WHERE il.idInsumoLab = NEW.idInsumoLab;
   
-- Actualizar la fila correspondiente en tbl_kardex
   UPDATE tbl_kardex_lab
   SET cantidadInsumo = NEW.cantidadDetalleCL,
       stockActual = stock_actual + (NEW.cantidadDetalleCL - OLD.cantidadDetalleCL)
   WHERE filaEntrada = NEW.idDetalleCL;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.actualizar_compra_med
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `actualizar_compra_med` AFTER UPDATE ON `tbl_factura_medicamentos` FOR EACH ROW BEGIN
-- Obtener el stock actual
DECLARE stock_actual INT;
DECLARE diferencia INT;

SELECT m.stockMedicamento INTO stock_actual FROM tbl_medicamentos AS m WHERE m.idMedicamento = NEW.idMedicamento;

-- Diferencia entre la cantidad actual y nueva
SET diferencia = ABS(NEW.cantidad - OLD.cantidad);

-- Actualizar el stock en tbl_insumos
UPDATE tbl_medicamentos AS m
SET m.stockMedicamento = stock_actual + (NEW.cantidad - OLD.cantidad)
WHERE m.idMedicamento = NEW.idMedicamento;


-- Actualizar la fila correspondiente en tbl_kardex
UPDATE tbl_kardex_botiquin
SET cantidadInsumo = NEW.cantidad,
    stockActual = stock_actual + (NEW.cantidad - OLD.cantidad)
WHERE filaEntrada = NEW.idFacturaMedicamento;
      
      
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.actualizar_datos_donante
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `actualizar_datos_donante` BEFORE INSERT ON `tbl_donantes_insumo` FOR EACH ROW BEGIN
-- Obtener el stock actual
   DECLARE stock_actual INT;
   SELECT il.stockInsumoLab INTO stock_actual FROM tbl_insumos_lab AS il WHERE il.idInsumoLab = NEW.idInsumo;
   
-- Actualizar el stock en tbl_insumos
   UPDATE tbl_insumos_lab AS il
   SET il.stockInsumoLab = stock_actual + NEW.cantidadInsumo
   WHERE il.idInsumoLab = NEW.idInsumo;
   
-- Actualizar el stock en tbl_insumos
   UPDATE tbl_donantes AS d
   SET d.ultimaFecha = DATE(NEW.fechaDonanteInsumo)
   WHERE d.idDonante = NEW.idDonante;
   

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.actualizar_entrada_hemo
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `actualizar_entrada_hemo` AFTER UPDATE ON `tbl_dcompra_hemo` FOR EACH ROW BEGIN
-- Obtener el stock actual
   DECLARE stock_actual INT;
   DECLARE diferencia INT;
   SELECT ih.stockInsumoHemo INTO stock_actual FROM tbl_insumos_hemo AS ih WHERE ih.idInsumoHemo = NEW.idInsumo;
   
-- Diferencia entre la cantidad actual y nueva
   SET diferencia = ABS(NEW.cantidad-OLD.cantidad);

-- Actualizar el stock en tbl_insumos
   UPDATE tbl_insumos_hemo AS ih
   SET ih.stockInsumoHemo = stock_actual + (NEW.cantidad - OLD.cantidad)
   WHERE ih.idInsumoHemo = NEW.idInsumo;
   
-- Actualizar la fila correspondiente en tbl_kardex
   UPDATE tbl_kardex_hemo
   SET cantidadInsumo = NEW.cantidad,
       stockActual = stock_actual + (NEW.cantidad - OLD.cantidad)
   WHERE filaEntrada = NEW.idDCompraHemo;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.actualizar_sala
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `actualizar_sala` AFTER UPDATE ON `tbl_detalle_procedimientos` FOR EACH ROW BEGIN

-- Obtener el stock actual
	DECLARE stock_viejo INT;
	DECLARE stock_nuevo INT;
	
	SELECT m.stockSala INTO stock_viejo FROM tbl_medicamentos AS m WHERE m.idMedicamento = NEW.idInsumo;
-- Actualizar el stock en tbl_insumos
   UPDATE tbl_medicamentos AS m
   SET m.stockSala = stock_viejo + OLD.cantidadInsumo
   WHERE m.idMedicamento = NEW.idInsumo;
   
	SELECT m.stockSala INTO stock_nuevo FROM tbl_medicamentos AS m WHERE m.idMedicamento = NEW.idInsumo;
-- Actualizar el stock en tbl_insumos
   UPDATE tbl_medicamentos AS m
   SET m.stockSala = stock_nuevo - NEW.cantidadInsumo
   WHERE m.idMedicamento = NEW.idInsumo;
   
   -- Actualizar la fila correspondiente en tbl_kardex
      UPDATE tbl_kardex_botiquin
      SET cantidadInsumo = NEW.cantidadInsumo,
          stockActual = stock_nuevo - NEW.cantidadInsumo,
          idInsumo = NEW.idInsumo
      WHERE filaSalida = NEW.idDetalleProcedimiento AND movimientoPor = '1';
            
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.actualizar_salida_hemo
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `actualizar_salida_hemo` AFTER UPDATE ON `tbl_dsalidas_hemo` FOR EACH ROW BEGIN
-- Obtener el stock actual
DECLARE stock_actual INT;
DECLARE diferencia INT;

SELECT ih.stockInsumoHemo INTO stock_actual FROM tbl_insumos_hemo AS ih WHERE ih.idInsumoHemo = NEW.idInsumo;

-- Diferencia entre la cantidad actual y nueva
SET diferencia = ABS(NEW.cantidadInsumo - OLD.cantidadInsumo);

-- Actualizar el stock en tbl_insumos
UPDATE tbl_insumos_hemo AS ih
SET ih.stockInsumoHemo = stock_actual - (NEW.cantidadInsumo - OLD.cantidadInsumo)
WHERE ih.idInsumoHemo = NEW.idInsumo;


-- Actualizar la fila correspondiente en tbl_kardex
UPDATE tbl_kardex_hemo
SET cantidadInsumo = NEW.cantidadInsumo,
    stockActual = stock_actual - (NEW.cantidadInsumo - OLD.cantidadInsumo)
WHERE filaSalida = NEW.idDescargosHemo;
      
      
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.actualizar_salida_lab
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `actualizar_salida_lab` AFTER UPDATE ON `tbl_dcuenta_descargoslab` FOR EACH ROW BEGIN
-- Obtener el stock actual
DECLARE stock_actual INT;
DECLARE diferencia INT;

SELECT il.stockInsumoLab INTO stock_actual FROM tbl_insumos_lab AS il WHERE il.idInsumoLab = NEW.idInsumo;

-- Diferencia entre la cantidad actual y nueva
SET diferencia = ABS(NEW.cantidadInsumo - OLD.cantidadInsumo);

-- Actualizar el stock en tbl_insumos
UPDATE tbl_insumos_lab AS il
SET il.stockInsumoLab = stock_actual - (NEW.cantidadInsumo - OLD.cantidadInsumo)
WHERE il.idInsumoLab = NEW.idInsumo;


-- Actualizar la fila correspondiente en tbl_kardex
UPDATE tbl_kardex_lab
SET cantidadInsumo = NEW.cantidadInsumo,
    stockActual = stock_actual - (NEW.cantidadInsumo - OLD.cantidadInsumo)
WHERE filaSalida = NEW.idDescargosLab;
      
      
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.actualizar_salida_med
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `actualizar_salida_med` AFTER UPDATE ON `tbl_hoja_insumos` FOR EACH ROW BEGIN

    DECLARE stock_viejo INT;
    DECLARE stock_nuevo INT;
    DECLARE stock_actual INT;
	 DECLARE stock_actual_cp INT;
 	IF NEW.pivoteStock = 0 THEN
   	IF NEW.idInsumo <> OLD.idInsumo THEN
        -- Insumo viejo
        -- Obtener el stock actual
            SELECT m.stockMedicamento INTO stock_viejo FROM tbl_medicamentos AS m WHERE m.idMedicamento = OLD.idInsumo;
        -- Actualizar el stock en tbl_insumos
            UPDATE tbl_medicamentos AS m
            SET m.stockMedicamento = stock_viejo + OLD.cantidadInsumo
            WHERE m.idMedicamento = OLD.idInsumo;

        -- Insumo nuevo
        -- Obtener el stock actual
            SELECT m.stockMedicamento INTO stock_nuevo FROM tbl_medicamentos AS m WHERE m.idMedicamento = NEW.idInsumo;
        -- Actualizar el stock en tbl_insumos
            UPDATE tbl_medicamentos AS m
            SET m.stockMedicamento = stock_nuevo - NEW.cantidadInsumo
            WHERE m.idMedicamento = NEW.idInsumo;


        -- Actualizar la fila correspondiente en tbl_kardex
            UPDATE tbl_kardex_botiquin
            SET cantidadInsumo = NEW.cantidadInsumo,
                stockActual = stock_nuevo - NEW.cantidadInsumo,
                idInsumo = NEW.idInsumo
            WHERE filaSalida = NEW.idHojaInsumo AND movimientoPor = '0';
	   ELSE
	        -- Obtener el stock actual
	        SELECT m.stockMedicamento INTO stock_actual FROM tbl_medicamentos AS m WHERE m.idMedicamento = NEW.idInsumo;
	
	        -- Actualizar el stock en tbl_insumos
	        UPDATE tbl_medicamentos AS m
	        SET m.stockMedicamento = stock_actual - (NEW.cantidadInsumo - OLD.cantidadInsumo)
	        WHERE m.idMedicamento = NEW.idInsumo;
	
	
	        -- Actualizar la fila correspondiente en tbl_kardex
	        UPDATE tbl_kardex_botiquin
	        SET cantidadInsumo = NEW.cantidadInsumo,
	            stockActual = stock_actual - (NEW.cantidadInsumo - OLD.cantidadInsumo)
	        WHERE filaSalida = NEW.idHojaInsumo AND movimientoPor = '0';
	    END IF;
	ELSE
		-- Obtener el stock actual
		SELECT ds.stockInsumo INTO stock_actual_cp FROM tbl_detalle_stock AS ds WHERE ds.idStock = NEW.pivoteStock AND ds.idInsumo =  NEW.idInsumo;
		
		-- Actualizar el stock en tbl_detalle_stock
         UPDATE tbl_detalle_stock AS ds
         SET ds.stockInsumo = stock_actual_cp + OLD.cantidadInsumo
         WHERE ds.idInsumo = OLD.idInsumo AND ds.idStock = OLD.pivoteStock;
         
		-- Actualizando tbl_kardex_botiquin
		 UPDATE tbl_kardex_botiquin
       SET cantidadInsumo = NEW.cantidadInsumo,
           stockActual = stock_actual_cp - NEW.cantidadInsumo,
           idInsumo = NEW.idInsumo
       WHERE filaSalida = NEW.idHojaInsumo AND movimientoPor = NEW.pivoteStock;
       
       -- Actualizar el stock en tbl_insumos limpieza
			 UPDATE tbl_detalle_stock AS ds
			 SET ds.stockInsumo = (ds.stockInsumo - NEW.cantidadInsumo)
			 WHERE ds.idInsumo = NEW.idInsumo AND ds.idStock = NEW.pivoteStock;
		
   END IF;
    
  END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.actualizar_stock_bodega
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `actualizar_stock_bodega` AFTER UPDATE ON `tbl_dsalidas_limpieza` FOR EACH ROW BEGIN
  -- Obtener el stock actual
      DECLARE stock_actual INT;
      DECLARE diferencia INT;

      SELECT stockInsumoLimpieza INTO stock_actual FROM tbl_insumos_limpieza WHERE idInsumoLimpieza = NEW.idInsumo;
  -- Diferencia entre la cantidad actual y nueva
      SET diferencia = ABS(NEW.cantidadInsumo - OLD.cantidadInsumo);

  -- Actualizar el stock en tbl_insumos
      UPDATE tbl_insumos_limpieza
      SET stockInsumoLimpieza = stock_actual - (NEW.cantidadInsumo - OLD.cantidadInsumo)
      WHERE idInsumoLimpieza = NEW.idInsumo;


  -- Actualizar la fila correspondiente en tbl_kardex
      UPDATE tbl_kardex_bodega
      SET cantidadInsumo = NEW.cantidadInsumo,
          stockActual = stock_actual - (NEW.cantidadInsumo - OLD.cantidadInsumo)
      WHERE filaSalida = NEW.idDescargosLimpieza;
  END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.agregar_cola_lab
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `agregar_cola_lab` AFTER INSERT ON `tbl_hoja_cobro` FOR EACH ROW BEGIN
	INSERT INTO tbl_cola_laboratorio(idPaciente, idHoja)
	VALUES(NEW.idPaciente, NEW.idHoja);

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.editar_salida_empleado
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `editar_salida_empleado` AFTER UPDATE ON `tbl_dcuenta_descargosbm` FOR EACH ROW BEGIN
	DECLARE stock_actual INT;
  -- Obtener el stock actual
  SELECT m.stockMedicamento INTO stock_actual FROM tbl_medicamentos AS m WHERE m.idMedicamento = NEW.idMedicamento;

  -- Actualizar el stock en tbl_insumos
  UPDATE tbl_medicamentos AS m
  SET m.stockMedicamento = stock_actual - (NEW.cantidadMedicamento - OLD.cantidadMedicamento)
  WHERE m.idMedicamento = NEW.idMedicamento;


  -- Actualizar la fila correspondiente en tbl_kardex
  UPDATE tbl_kardex_botiquin
  SET cantidadInsumo = NEW.cantidadMedicamento,
      stockActual = stock_actual - (NEW.cantidadMedicamento - OLD.cantidadMedicamento)
  WHERE filaEmpleado = NEW.idDescargosBM AND movimientoPor = '2';
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.eliminar_cantidad_salida
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `eliminar_cantidad_salida` AFTER DELETE ON `tbl_dsalidas_limpieza` FOR EACH ROW  BEGIN
-- Obtener el stock actual
    DECLARE stock_actual INT;
    SELECT stockInsumoLimpieza INTO stock_actual FROM tbl_insumos_limpieza WHERE idInsumoLimpieza = OLD.idInsumo;

-- Actualizar el stock en tbl_productos
    UPDATE tbl_insumos_limpieza SET stockInsumoLimpieza = stockInsumoLimpieza + OLD.cantidadInsumo WHERE idInsumoLimpieza = OLD.idInsumo;

-- Insertar una fila en tbl_kardex con cantidad cero y mensaje de "Eliminado"
    UPDATE tbl_kardex_bodega
    SET cantidadInsumo = 0, stockActual = stock_actual + OLD.cantidadInsumo, tipoKardex = 'Eliminado'
    WHERE filaSalida = OLD.idDescargosLimpieza;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.eliminar_compra_bodega
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `eliminar_compra_bodega` BEFORE DELETE ON `tbl_dcompra_limpieza` FOR EACH ROW -- DELETE
BEGIN
-- Obtener el stock actual
   DECLARE stock_actual INT;
   SELECT stockInsumoLimpieza INTO stock_actual FROM tbl_insumos_limpieza WHERE idInsumoLimpieza = OLD.idInsumo;

-- Actualizar el stock en tbl_productos
   UPDATE tbl_insumos_limpieza SET stockInsumoLimpieza = stockInsumoLimpieza - OLD.cantidad WHERE idInsumoLimpieza = OLD.idInsumo;

-- Insertar una fila en tbl_kardex con cantidad cero y mensaje de "Eliminado"
   UPDATE tbl_kardex_bodega
   SET cantidadInsumo = 0, stockActual = stock_actual - OLD.cantidad, tipoKardex = 'Eliminado'
   WHERE filaEntrada = OLD.idDCompraLimpieza;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.eliminar_compra_lab
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `eliminar_compra_lab` AFTER DELETE ON `tbl_detalle_compra_lab` FOR EACH ROW BEGIN
-- Obtener el stock actual
   DECLARE stock_actual INT;
   SELECT il.stockInsumoLab INTO stock_actual FROM tbl_insumos_lab AS il WHERE il.idInsumoLab = OLD.idInsumoLab;

-- Actualizar el stock en tbl_productos
   UPDATE tbl_insumos_lab AS il SET il.stockInsumoLab = il.stockInsumoLab - OLD.cantidadDetalleCL WHERE il.idInsumoLab = OLD.idInsumoLab;

-- Insertar una fila en tbl_kardex con cantidad cero y mensaje de "Eliminado"
   UPDATE tbl_kardex_lab
   SET cantidadInsumo = 0, stockActual = stock_actual - OLD.cantidadDetalleCL, tipoKardex = 'Eliminado'
   WHERE filaEntrada = OLD.idDetalleCL;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.eliminar_compra_med
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `eliminar_compra_med` AFTER DELETE ON `tbl_factura_medicamentos` FOR EACH ROW BEGIN
-- Obtener el stock actual
   DECLARE stock_actual INT;
   SELECT m.stockMedicamento INTO stock_actual FROM tbl_medicamentos AS m WHERE m.idMedicamento = OLD.idMedicamento;

-- Actualizar el stock en tbl_productos
   UPDATE tbl_medicamentos AS m SET m.stockMedicamento = m.stockMedicamento - OLD.cantidad 
	WHERE m.idMedicamento = OLD.idMedicamento;

-- Insertar una fila en tbl_kardex con cantidad cero y mensaje de "Eliminado"
   UPDATE tbl_kardex_botiquin AS kb
   SET kb.cantidadInsumo = 0, kb.stockActual = stock_actual - OLD.cantidad, kb.tipoKardex = 'Eliminado'
   WHERE filaEntrada = OLD.idFacturaMedicamento;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.eliminar_descargo_lab
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `eliminar_descargo_lab` AFTER DELETE ON `tbl_dcuenta_descargoslab` FOR EACH ROW BEGIN

-- Obtener el stock actual
 DECLARE stock_actual INT;
 SELECT il.stockInsumoLab INTO stock_actual FROM tbl_insumos_lab AS il WHERE il.idInsumoLab = OLD.idInsumo;
 
-- Actualizar el stock en tbl_productos
 UPDATE tbl_insumos_lab AS il SET il.stockInsumoLab = il.stockInsumoLab + OLD.cantidadInsumo WHERE il.idInsumoLab = OLD.idInsumo;
    
-- Insertar una fila en tbl_kardex con cantidad cero y mensaje de "Eliminado"
 UPDATE tbl_kardex_lab
 SET cantidadInsumo = 0, stockActual = stock_actual + OLD.cantidadInsumo, tipoKardex = 'Eliminado'
 WHERE filaSalida = OLD.idDescargosLab;
    
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.eliminar_entrada_hemo
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `eliminar_entrada_hemo` AFTER DELETE ON `tbl_dcompra_hemo` FOR EACH ROW BEGIN
-- Obtener el stock actual
   DECLARE stock_actual INT;
   SELECT ih.stockInsumoHemo INTO stock_actual FROM tbl_insumos_hemo AS ih WHERE ih.idInsumoHemo = OLD.idInsumo;

-- Actualizar el stock en tbl_productos
   UPDATE tbl_insumos_hemo AS ih SET ih.stockInsumoHemo = ih.stockInsumoHemo - OLD.cantidad WHERE ih.idInsumoHemo = OLD.idInsumo;

-- Insertar una fila en tbl_kardex con cantidad cero y mensaje de "Eliminado"
   UPDATE tbl_kardex_hemo
   SET cantidadInsumo = 0, stockActual = stock_actual - OLD.cantidad, tipoKardex = 'Eliminado'
   WHERE filaEntrada = OLD.idDCompraHemo;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.eliminar_med_empleado
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `eliminar_med_empleado` AFTER DELETE ON `tbl_dcuenta_descargosbm` FOR EACH ROW BEGIN
-- Obtener el stock actual
    DECLARE stock_actual INT;
	 SELECT m.stockMedicamento INTO stock_actual FROM tbl_medicamentos AS m WHERE m.idMedicamento = OLD.idMedicamento;

-- Actualizar el stock en tbl_productos
    UPDATE tbl_medicamentos AS m SET m.stockMedicamento = m.stockMedicamento + OLD.cantidadMedicamento WHERE m.idMedicamento = OLD.idMedicamento;

-- Insertar una fila en tbl_kardex con cantidad cero y mensaje de "Eliminado"
    UPDATE tbl_kardex_botiquin
    SET cantidadInsumo = 0, stockActual = stock_actual + OLD.cantidadMedicamento, tipoKardex = 'Eliminado', conceptoKardex = '-'
    WHERE filaEmpleado = OLD.idDescargosBM AND movimientoPor = '2';
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.eliminar_sala
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `eliminar_sala` AFTER DELETE ON `tbl_detalle_procedimientos` FOR EACH ROW BEGIN

-- Obtener el stock actual
	DECLARE stock_actual INT;

SELECT m.stockSala INTO stock_actual FROM tbl_medicamentos AS m WHERE m.idMedicamento = OLD.idInsumo;

-- Actualizar el stock en tbl_insumos
   UPDATE tbl_medicamentos AS m
   SET m.stockSala = stock_actual + OLD.cantidadInsumo
   WHERE m.idMedicamento = OLD.idInsumo;
   

-- Actualizar la fila correspondiente en tbl_kardex
      UPDATE tbl_kardex_botiquin
      SET cantidadInsumo = 0,
          stockActual = stock_actual + OLD.cantidadInsumo,
          tipoKardex = 'Eliminado',
          idInsumo = OLD.idInsumo
      WHERE filaSalida = OLD.idDetalleProcedimiento AND movimientoPor = '1';
   
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.eliminar_salida_hemo
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `eliminar_salida_hemo` AFTER DELETE ON `tbl_dsalidas_hemo` FOR EACH ROW BEGIN

-- Obtener el stock actual
 DECLARE stock_actual INT;
 SELECT ih.stockInsumoHemo INTO stock_actual FROM tbl_insumos_hemo AS ih WHERE ih.idInsumoHemo = OLD.idInsumo;
 
-- Actualizar el stock en tbl_productos
 UPDATE tbl_insumos_hemo AS ih SET ih.stockInsumoHemo = ih.stockInsumoHemo + OLD.cantidadInsumo WHERE ih.idInsumoHemo = OLD.idInsumo;
    
-- Insertar una fila en tbl_kardex con cantidad cero y mensaje de "Eliminado"
 UPDATE tbl_kardex_hemo
 SET cantidadInsumo = 0, stockActual = stock_actual + OLD.cantidadInsumo, tipoKardex = 'Eliminado'
 WHERE filaSalida = OLD.idDescargosHemo;
    
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.eliminar_salida_med
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `eliminar_salida_med` AFTER DELETE ON `tbl_hoja_insumos` FOR EACH ROW BEGIN
-- Obtener el stock actual
    DECLARE stock_actual INT;
    DECLARE stock_actual_cp INT;
    
   IF OLD.pivoteStock = 0 THEN
		 SELECT m.stockMedicamento INTO stock_actual FROM tbl_medicamentos AS m WHERE m.idMedicamento = OLD.idInsumo;
	
		-- Actualizar el stock en tbl_productos
	    UPDATE tbl_medicamentos AS m SET m.stockMedicamento = m.stockMedicamento + OLD.cantidadInsumo WHERE m.idMedicamento = OLD.idInsumo;
	    
	    INSERT INTO tbl_hoja_insumos_eliminados(filaEliminada, idHoja, idInsumo, precioInsumo, cantidadInsumo, descuentoUnitario)
	    				 VALUES(OLD.idHojaInsumo, OLD.idHoja, OLD.idInsumo, OLD.precioInsumo, OLD.cantidadInsumo, OLD.descuentoUnitario);
	
		-- Insertar una fila en tbl_kardex con cantidad cero y mensaje de "Eliminado"
	    UPDATE tbl_kardex_botiquin
	    SET cantidadInsumo = 0, stockActual = stock_actual + OLD.cantidadInsumo, tipoKardex = 'Eliminado', conceptoKardex = '-'
	    WHERE filaSalida = OLD.idHojaInsumo AND movimientoPor = '0';
	ELSE
		-- Obtener el stock actual
		SELECT ds.stockInsumo INTO stock_actual_cp FROM tbl_detalle_stock AS ds WHERE ds.idStock = OLD.pivoteStock AND ds.idInsumo =  OLD.idInsumo;
		
		-- Actualizar el stock en tbl_detalle_stock
         UPDATE tbl_detalle_stock AS ds
         SET ds.stockInsumo = stock_actual_cp + OLD.cantidadInsumo
         WHERE ds.idInsumo = OLD.idInsumo AND ds.idStock = OLD.pivoteStock;
         
		-- Actualizando tbl_kardex_botiquin
		 UPDATE tbl_kardex_botiquin
       SET cantidadInsumo = '0',
           stockActual = stock_actual_cp + OLD.cantidadInsumo,
           tipoKardex = 'Eliminado',
			  conceptoKardex = '-'
       WHERE filaSalida = OLD.idHojaInsumo AND movimientoPor = OLD.pivoteStock;
		
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.entrada_compra_bodega
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `entrada_compra_bodega` AFTER INSERT ON `tbl_dcompra_limpieza` FOR EACH ROW BEGIN
	-- Obtener el stock actual
   DECLARE stock_actual INT;
   SELECT stockInsumoLimpieza INTO stock_actual FROM tbl_insumos_limpieza WHERE idInsumoLimpieza = NEW.idInsumo;
   
   -- Actualizar el stock en tbl_productos
   UPDATE tbl_insumos_limpieza AS i
   SET i.stockInsumoLimpieza = (i.stockInsumoLimpieza + NEW.cantidad), i.precioInsumoLimpieza = new.precio
   WHERE i.idInsumoLimpieza = NEW.idInsumo;
   
   -- Insertar una fila en tbl_kardex
   INSERT INTO tbl_kardex_bodega(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaEntrada)
   VALUES (NEW.idInsumo, NEW.cantidad, stock_actual + NEW.cantidad, 'Entrada', NEW.idDCompraLimpieza);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.entrada_medicamentos
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `entrada_medicamentos` AFTER INSERT ON `tbl_factura_medicamentos` FOR EACH ROW BEGIN

-- Obtener el stock actual
DECLARE stock_actual INT;
SELECT m.stockMedicamento INTO stock_actual FROM tbl_medicamentos AS m WHERE m.idMedicamento = NEW.idMedicamento;

-- Actualizar el stock en tbl_insumos limpieza
 UPDATE tbl_medicamentos AS m
 SET m.stockMedicamento = m.stockMedicamento + NEW.cantidad
 WHERE m.idMedicamento = NEW.idMedicamento;
 
 -- Insertar una fila en tbl_kardex
 INSERT INTO tbl_kardex_botiquin(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaEntrada)
 VALUES (NEW.idMedicamento, NEW.cantidad, stock_actual + NEW.cantidad, 'Entrada', NEW.idFacturaMedicamento);
    
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.ingreso_compra_hemo
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `ingreso_compra_hemo` AFTER INSERT ON `tbl_dcompra_hemo` FOR EACH ROW BEGIN
	-- Obtener el stock actual
   DECLARE stock_actual INT;
   SELECT ih.stockInsumoHemo INTO stock_actual FROM tbl_insumos_hemo AS ih WHERE ih.idInsumoHemo = NEW.idInsumo;
   
   -- Actualizar el stock en tbl_productos
   UPDATE tbl_insumos_hemo AS ih
   SET ih.stockInsumoHemo = (ih.stockInsumoHemo + NEW.cantidad), ih.precioInsumoHemo = new.precio
   WHERE ih.idInsumoHemo = NEW.idInsumo;
   
   -- Insertar una fila en tbl_kardex
   INSERT INTO tbl_kardex_hemo(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaEntrada)
   VALUES (NEW.idInsumo, NEW.cantidad, stock_actual + NEW.cantidad, 'Entrada', NEW.idDCompraHemo);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.ingreso_compra_lab
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `ingreso_compra_lab` AFTER INSERT ON `tbl_detalle_compra_lab` FOR EACH ROW BEGIN
	-- Obtener el stock actual
   DECLARE stock_actual INT;
   SELECT il.stockInsumoLab INTO stock_actual FROM tbl_insumos_lab AS il WHERE il.idInsumoLab = NEW.idInsumoLab;
   
   -- Actualizar el stock en tbl_productos
   UPDATE tbl_insumos_lab AS il
   SET il.stockInsumoLab = (il.stockInsumoLab + NEW.cantidadDetalleCL), il.precioInsumoLab = new.precioDetalleCL
   WHERE il.idInsumoLab = NEW.idInsumoLab;
   
   -- Insertar una fila en tbl_kardex
   INSERT INTO tbl_kardex_lab(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaEntrada)
   VALUES (NEW.idInsumoLab, NEW.cantidadDetalleCL, stock_actual + NEW.cantidadDetalleCL, 'Entrada', NEW.idDetalleCL);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.salidas_donantes
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `salidas_donantes` BEFORE INSERT ON `tbl_donantes_salidas` FOR EACH ROW BEGIN
-- Obtener el stock actual
   DECLARE stock_actual INT;
   SELECT il.stockInsumoLab INTO stock_actual FROM tbl_insumos_lab AS il WHERE il.idInsumoLab = NEW.idInsumo;
   
-- Actualizar el stock en tbl_insumos
   UPDATE tbl_insumos_lab AS il
   SET il.stockInsumoLab = stock_actual - NEW.cantidadInsumo
   WHERE il.idInsumoLab = NEW.idInsumo;
   
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.salidas_med_empleados
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `salidas_med_empleados` AFTER INSERT ON `tbl_dcuenta_descargosbm` FOR EACH ROW BEGIN

-- Obtener el stock actual
DECLARE stock_actual INT;
SELECT m.stockMedicamento INTO stock_actual FROM tbl_medicamentos AS m WHERE m.idMedicamento = NEW.idMedicamento;

-- Actualizar el stock en tbl_insumos limpieza
 UPDATE tbl_medicamentos AS m
 SET m.stockMedicamento = (m.stockMedicamento - NEW.cantidadMedicamento)
 WHERE m.idMedicamento = NEW.idMedicamento;
 
 -- Insertar una fila en tbl_kardex
 INSERT INTO tbl_kardex_botiquin(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaEmpleado, conceptoKardex, movimientoPor)
 VALUES (NEW.idMedicamento, NEW.cantidadMedicamento, stock_actual - NEW.cantidadMedicamento, 'Salida', NEW.idDescargosBM, 'Entregado EHL', '2');
    
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.salidas_stocks
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `salidas_stocks` AFTER INSERT ON `tbl_movimientos_stocks` FOR EACH ROW BEGIN

-- Obtener el stock actual
	DECLARE stock_actual INT;
	DECLARE ultimo_insertado INT;
	SELECT ds.stockInsumo INTO stock_actual FROM tbl_detalle_stock AS ds WHERE ds.idStock = NEW.idStock AND ds.idInsumo =  NEW.idInsumo;

-- Actualizar el stock en tbl_insumos limpieza
 	UPDATE tbl_detalle_stock AS ds
 	SET ds.stockInsumo = (ds.stockInsumo - NEW.cantidadInsumo)
 	WHERE ds.idInsumo = NEW.idInsumo AND ds.idStock = NEW.idStock;
 
 
  -- Insertar una fila en la hoja de cobro
	INSERT INTO tbl_hoja_insumos(idHoja, idInsumo, precioInsumo, cantidadInsumo, fechaInsumo, por, pivoteStock)
	VALUES (NEW.idHoja, NEW.idInsumo, NEW.precioInsumo, NEW.cantidadInsumo, CURRENT_DATE(), NEW.por, NEW.idStock);
	
   SET ultimo_insertado = LAST_INSERT_ID(); -- Ultimo id insertado en tbl_hoja_insumos

 -- Insertar una fila en tbl_kardex
 	INSERT INTO tbl_kardex_botiquin(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaSalida, conceptoKardex, movimientoPor)
 	VALUES (NEW.idInsumo, NEW.cantidadInsumo, stock_actual - NEW.cantidadInsumo, 'Salida', ultimo_insertado, 'Usado en cuentas privadas CP-1', NEW.idStock);
 
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.salidas_stock_bodega
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `salidas_stock_bodega` AFTER INSERT ON `tbl_dsalidas_limpieza`
 FOR EACH ROW BEGIN
-- Obtener el stock actual
    DECLARE stock_actual INT;
    SELECT stockInsumoLimpieza INTO stock_actual FROM tbl_insumos_limpieza WHERE idInsumoLimpieza = NEW.idInsumo;
    
-- Actualizar el stock en tbl_insumos limpieza
    UPDATE tbl_insumos_limpieza AS i
    SET i.stockInsumoLimpieza = (i.stockInsumoLimpieza - NEW.cantidadInsumo)
    WHERE i.idInsumoLimpieza = NEW.idInsumo;
	
-- Insertar una fila en tbl_kardex
    INSERT INTO tbl_kardex_bodega(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaSalida)
    VALUES (NEW.idInsumo, NEW.cantidadInsumo, stock_actual - NEW.cantidadInsumo, 'Salida', NEW.idDescargosLimpieza);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.salidas_stock_lab
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `salidas_stock_lab` AFTER INSERT ON `tbl_dcuenta_descargoslab` FOR EACH ROW BEGIN

-- Obtener el stock actual
DECLARE stock_actual INT;
SELECT il.stockInsumoLab INTO stock_actual FROM tbl_insumos_lab AS il WHERE il.idInsumoLab = NEW.idInsumo;

-- Actualizar el stock en tbl_insumos limpieza
 UPDATE tbl_insumos_lab AS il
 SET il.stockInsumoLab = (il.stockInsumoLab - NEW.cantidadInsumo)
 WHERE il.idInsumoLab = NEW.idInsumo;
 
 -- Insertar una fila en tbl_kardex
 INSERT INTO tbl_kardex_lab(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaSalida)
 VALUES (NEW.idInsumo, NEW.cantidadInsumo, stock_actual - NEW.cantidadInsumo, 'Salida', NEW.idDescargosLab);
    
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.salida_medicamento
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `salida_medicamento` AFTER INSERT ON `tbl_hoja_insumos` FOR EACH ROW -- BEGIN

-- Obtener el stock actual
-- DECLARE stock_actual INT;
-- SELECT m.stockMedicamento INTO stock_actual FROM tbl_medicamentos AS m WHERE m.idMedicamento = NEW.idInsumo;

-- Actualizar el stock en tbl_insumos limpieza
--  UPDATE tbl_medicamentos AS m
--  SET m.stockMedicamento = (m.stockMedicamento - NEW.cantidadInsumo)
--  WHERE m.idMedicamento = NEW.idInsumo;
 
 -- Insertar una fila en tbl_kardex
--  INSERT INTO tbl_kardex_botiquin(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaSalida)
--  VALUES (NEW.idInsumo, NEW.cantidadInsumo, stock_actual - NEW.cantidadInsumo, 'Salida', NEW.idHojaInsumo);
    
-- END

BEGIN
    -- Obtener el stock actual
    DECLARE stock_actual INT;
    SELECT m.stockMedicamento INTO stock_actual FROM tbl_medicamentos AS m WHERE m.idMedicamento = NEW.idInsumo;


    IF NEW.pivoteStock = 0 THEN
        -- Actualizar el stock en tbl_insumos limpieza
        UPDATE tbl_medicamentos AS m
        SET m.stockMedicamento = (m.stockMedicamento - NEW.cantidadInsumo)
        WHERE m.idMedicamento = NEW.idInsumo;

        -- Insertar una fila en tbl_kardex
        INSERT INTO tbl_kardex_botiquin(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaSalida, conceptoKardex, movimientoPor)
        VALUES (NEW.idInsumo, NEW.cantidadInsumo, stock_actual - NEW.cantidadInsumo, 'Salida', NEW.idHojaInsumo, 'Usado en cuentas privadas', '0');
    -- ELSE
        -- Insertar una fila en tbl_kardex
        -- INSERT INTO tbl_kardex_botiquin(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaSalida, conceptoKardex, movimientoPor)
        -- VALUES (NEW.idInsumo, NEW.cantidadInsumo, stock_actual, 'Salida', '2', 'Usado en sala', NEW.pivoteStock);
    END IF;
    
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.salida_sala
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `salida_sala` AFTER INSERT ON `tbl_detalle_procedimientos` FOR EACH ROW BEGIN

-- Obtener el stock actual
DECLARE stock_actual INT;
SELECT m.stockSala INTO stock_actual FROM tbl_medicamentos AS m WHERE m.idMedicamento = NEW.idInsumo;

-- Actualizar el stock en tbl_insumos limpieza
 UPDATE tbl_medicamentos AS m
 SET m.stockSala = (m.stockSala - NEW.cantidadInsumo)
 WHERE m.idMedicamento = NEW.idInsumo;
 
 -- Insertar una fila en tbl_kardex
 INSERT INTO tbl_kardex_botiquin(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaSalida, conceptoKardex, movimientoPor)
 VALUES (NEW.idInsumo, NEW.cantidadInsumo, stock_actual - NEW.cantidadInsumo, 'Salida', NEW.idDetalleProcedimiento, 'Usado en Sala de operaciones', '1');
 
 -- Insertar una fila en la hoja de cobro
 -- INSERT INTO tbl_hoja_insumos(idHoja, idInsumo, precioInsumo, cantidadInsumo, fechaInsumo, por, pivoteStock)
-- 		  VALUES (NEW.idHoja, NEW.idInsumo, NEW.precioInsumo, NEW.cantidadInsumo, CURRENT_DATE(), NEW.por, '2');
 
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador db_centro_medico.salida_stock_hemo
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `salida_stock_hemo` AFTER INSERT ON `tbl_dsalidas_hemo` FOR EACH ROW BEGIN

-- Obtener el stock actual
DECLARE stock_actual INT;
SELECT ih.stockInsumoHemo INTO stock_actual FROM tbl_insumos_hemo AS ih WHERE ih.idInsumoHemo = NEW.idInsumo;

-- Actualizar el stock en tbl_insumos limpieza
 UPDATE tbl_insumos_hemo AS ih
 SET ih.stockInsumoHemo = (ih.stockInsumoHemo - NEW.cantidadInsumo)
 WHERE ih.idInsumoHemo = NEW.idInsumo;
 
 -- Insertar una fila en tbl_kardex
 INSERT INTO tbl_kardex_hemo(idInsumo, cantidadInsumo, stockActual, tipoKardex, filaSalida)
 VALUES (NEW.idInsumo, NEW.cantidadInsumo, stock_actual - NEW.cantidadInsumo, 'Salida', NEW.idDescargosHemo);
    
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
