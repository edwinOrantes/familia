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
CREATE DATABASE IF NOT EXISTS `db_centro_medico` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_accesos
CREATE TABLE IF NOT EXISTS `tbl_accesos` (
  `idAcceso` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAcceso` varchar(50) NOT NULL,
  `descripcionAcceso` text NOT NULL,
  `estadoAcceso` int(11) NOT NULL,
  `fechaAcceso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idAcceso`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_animations
CREATE TABLE IF NOT EXISTS `tbl_animations` (
  `idAnimation` int(11) NOT NULL AUTO_INCREMENT,
  `linkAnimation` text NOT NULL,
  `fechaAnimation` date NOT NULL,
  `estadoAnimation` int(11) NOT NULL,
  `publicadoAnimation` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idAnimation`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_areas_hospital
CREATE TABLE IF NOT EXISTS `tbl_areas_hospital` (
  `idArea` int(11) NOT NULL AUTO_INCREMENT,
  `nombreArea` text NOT NULL,
  `precioExtraArea` decimal(9,2) DEFAULT 0.00,
  PRIMARY KEY (`idArea`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_bitacora
CREATE TABLE IF NOT EXISTS `tbl_bitacora` (
  `idBitacora` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `descripcionBitacora` text NOT NULL,
  `fechaBitacora` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idBitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=969 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_cargos
CREATE TABLE IF NOT EXISTS `tbl_cargos` (
  `idCargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCargo` varchar(50) NOT NULL,
  PRIMARY KEY (`idCargo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_clasificacion_cg
CREATE TABLE IF NOT EXISTS `tbl_clasificacion_cg` (
  `idClasificacionCG` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCG` varchar(30) NOT NULL,
  PRIMARY KEY (`idClasificacionCG`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_clasificacion_medicamentos
CREATE TABLE IF NOT EXISTS `tbl_clasificacion_medicamentos` (
  `idClasificacionMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreClasificacionMedicamento` varchar(50) NOT NULL,
  PRIMARY KEY (`idClasificacionMedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_clasificacion_ri
CREATE TABLE IF NOT EXISTS `tbl_clasificacion_ri` (
  `idClasificacionRI` int(11) NOT NULL AUTO_INCREMENT,
  `nombreClasificacionRI` varchar(30) NOT NULL,
  PRIMARY KEY (`idClasificacionRI`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_consultas
CREATE TABLE IF NOT EXISTS `tbl_consultas` (
  `idConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `nombrePaciente` text NOT NULL,
  `peso` decimal(9,2) NOT NULL DEFAULT 0.00,
  `altura` decimal(9,2) NOT NULL DEFAULT 0.00,
  `imc` decimal(9,2) NOT NULL DEFAULT 0.00,
  `fechaConsulta` date NOT NULL,
  `hojaCobro` int(11) NOT NULL DEFAULT 0,
  `estadoConsulta` int(11) NOT NULL DEFAULT 1,
  `creadaConsulta` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idConsulta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_consulta_laboratorio
CREATE TABLE IF NOT EXISTS `tbl_consulta_laboratorio` (
  `idConsultaLaboratorio` int(11) NOT NULL AUTO_INCREMENT,
  `idHoja` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `codigoConsulta` int(11) NOT NULL,
  `tipoConsulta` int(11) NOT NULL,
  `online` int(11) NOT NULL DEFAULT 0,
  `fechaConsultaLaboratorio` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idConsultaLaboratorio`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_control_descuentos
CREATE TABLE IF NOT EXISTS `tbl_control_descuentos` (
  `idControlD` int(11) NOT NULL AUTO_INCREMENT,
  `idEmDes` int(11) NOT NULL,
  `cantidadControlD` decimal(9,2) NOT NULL,
  `creadoControlD` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idControlD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_corte_cajera
CREATE TABLE IF NOT EXISTS `tbl_corte_cajera` (
  `idCorteCaja` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `turnoCorte` varchar(10) NOT NULL,
  `fechaCorte` date NOT NULL,
  `creadoCorte` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCorteCaja`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

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
  `fechaCropologia` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCropologia`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_cuentas_gestion_insumos
CREATE TABLE IF NOT EXISTS `tbl_cuentas_gestion_insumos` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCuenta` date NOT NULL,
  `estadoCuenta` int(11) NOT NULL DEFAULT 1,
  `cuentaCreada` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_cuenta_isbm
CREATE TABLE IF NOT EXISTS `tbl_cuenta_isbm` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `codigoCuenta` int(11) NOT NULL DEFAULT 0,
  `fechaCuenta` varchar(12) NOT NULL,
  `estadoCuenta` int(11) NOT NULL DEFAULT 0,
  `creacionCuenta` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_cuenta_medicamentos
CREATE TABLE IF NOT EXISTS `tbl_cuenta_medicamentos` (
  `idCuentaMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `idCuentaBotiquin` int(11) NOT NULL,
  `idMedicamento` int(11) NOT NULL,
  `cantidadMedicamento` int(11) NOT NULL,
  `fechaUso` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCuentaMedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_dcuenta_isbm
CREATE TABLE IF NOT EXISTS `tbl_dcuenta_isbm` (
  `idDetalleCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `idCuenta` int(11) NOT NULL,
  `idMedicamento` int(11) NOT NULL,
  `cantidadMedicamento` int(11) NOT NULL,
  `fechaUso` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDetalleCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_descuentos_planilla
CREATE TABLE IF NOT EXISTS `tbl_descuentos_planilla` (
  `idDP` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDP` text NOT NULL,
  `creadaDP` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDP`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_detalle_consulta
CREATE TABLE IF NOT EXISTS `tbl_detalle_consulta` (
  `idDetalleConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `idConsultaLaboratorio` int(11) NOT NULL,
  `idExamen` int(11) NOT NULL,
  `tipoExamen` int(11) NOT NULL,
  `examenSolicitado` int(11) NOT NULL,
  `fechaDetalleConsulta` timestamp NOT NULL DEFAULT current_timestamp(),
  `horaDetalleConsulta` text NOT NULL,
  `examenes` text NOT NULL,
  PRIMARY KEY (`idDetalleConsulta`)
) ENGINE=InnoDB AUTO_INCREMENT=300 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
  `departamentoEmpleado` int(11) NOT NULL,
  `municipioEmpleado` int(11) NOT NULL,
  `direccionEmpleado` text NOT NULL,
  `ingresoEmpleado` date NOT NULL,
  PRIMARY KEY (`idEmpleado`),
  KEY `departamentoEmpleado` (`departamentoEmpleado`),
  KEY `municipioEmpleado` (`municipioEmpleado`),
  KEY `cargoEmpleado` (`cargoEmpleado`),
  CONSTRAINT `tbl_empleados_ibfk_1` FOREIGN KEY (`municipioEmpleado`) REFERENCES `tbl_municipios_sv` (`idMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_empleados_ibfk_2` FOREIGN KEY (`cargoEmpleado`) REFERENCES `tbl_cargos` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_examenes_realizados
CREATE TABLE IF NOT EXISTS `tbl_examenes_realizados` (
  `idExamenRealizado` int(11) NOT NULL AUTO_INCREMENT,
  `idExamen` int(11) NOT NULL,
  `idConsulta` int(11) NOT NULL,
  `fechaExamenRealizado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idExamenRealizado`)
) ENGINE=InnoDB AUTO_INCREMENT=440 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_externos_generados
CREATE TABLE IF NOT EXISTS `tbl_externos_generados` (
  `idExternoGenerado` int(11) NOT NULL AUTO_INCREMENT,
  `inicioExternoGenerado` int(11) NOT NULL,
  `finExternoGenerado` int(11) NOT NULL,
  `fechaGenerado` date NOT NULL,
  `fechaExternoGenerado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idExternoGenerado`),
  KEY `inicioExternoGenerado` (`inicioExternoGenerado`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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
  `fechaAgregado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idFacturaMedicamento`),
  KEY `idFactura` (`idFactura`),
  KEY `idMedicamento` (`idMedicamento`),
  CONSTRAINT `tbl_factura_medicamentos_ibfk_1` FOREIGN KEY (`idFactura`) REFERENCES `tbl_factura_compra` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_habitacion
CREATE TABLE IF NOT EXISTS `tbl_habitacion` (
  `idHabitacion` int(11) NOT NULL AUTO_INCREMENT,
  `numeroHabitacion` varchar(25) NOT NULL,
  `estadoHabitacion` int(11) NOT NULL DEFAULT 1,
  `creadoHabitacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idHabitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
  PRIMARY KEY (`idHoja`),
  KEY `idPaciente` (`idPaciente`),
  KEY `idMedico` (`idMedico`),
  CONSTRAINT `tbl_hoja_cobro_ibfk_2` FOREIGN KEY (`idMedico`) REFERENCES `tbl_medicos` (`idMedico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_hoja_cobro_ibfk_3` FOREIGN KEY (`idPaciente`) REFERENCES `tbl_pacientes` (`idPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_hoja_insumos
CREATE TABLE IF NOT EXISTS `tbl_hoja_insumos` (
  `idHojaInsumo` int(11) NOT NULL AUTO_INCREMENT,
  `idHoja` int(11) NOT NULL,
  `idInsumo` int(11) NOT NULL,
  `precioInsumo` decimal(9,2) NOT NULL,
  `cantidadInsumo` int(11) NOT NULL,
  `fechaInsumo` date NOT NULL,
  `descuentoUnitario` decimal(9,2) NOT NULL DEFAULT 0.00,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_liquidaciones_caja
CREATE TABLE IF NOT EXISTS `tbl_liquidaciones_caja` (
  `idLiquidacion` int(11) NOT NULL AUTO_INCREMENT,
  `inicioLiquidacion` int(11) NOT NULL,
  `finLiquidacion` int(11) NOT NULL,
  `cajeraLiquidacion` int(11) NOT NULL,
  `fechaLiquidacion` date NOT NULL,
  `creadoLiquidacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idLiquidacion`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_medicamentos
CREATE TABLE IF NOT EXISTS `tbl_medicamentos` (
  `idMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `idBM` int(11) NOT NULL,
  `codigoMedicamento` int(11) NOT NULL,
  `nombreMedicamento` varchar(100) NOT NULL,
  `idProveedorMedicamento` int(11) NOT NULL,
  `precioCMedicamento` decimal(9,2) NOT NULL,
  `precioVMedicamento` decimal(9,2) NOT NULL,
  `tipoMedicamento` varchar(25) NOT NULL,
  `idClasificacionMedicamento` int(11) NOT NULL,
  `stockMedicamento` int(11) NOT NULL,
  `usadosMedicamento` int(11) NOT NULL,
  `pivoteMedicamento` int(11) NOT NULL,
  `minimoMedicamento` int(11) NOT NULL,
  `ocultarMedicamento` int(11) NOT NULL,
  `feriadoMedicamento` decimal(9,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`idMedicamento`),
  KEY `idClasificacionMedicamento` (`idClasificacionMedicamento`),
  KEY `idProveedorMedicamento` (`idProveedorMedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=972 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_medicos
CREATE TABLE IF NOT EXISTS `tbl_medicos` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMedico` varchar(50) NOT NULL,
  `especialidadMedico` varchar(150) NOT NULL,
  `telefonoMedico` varchar(10) NOT NULL,
  `direccionMedico` text NOT NULL,
  PRIMARY KEY (`idMedico`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_menu
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMenu` varchar(25) NOT NULL,
  `htmlMenu` text NOT NULL,
  `fechaMenu` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_movimientos_hoja
CREATE TABLE IF NOT EXISTS `tbl_movimientos_hoja` (
  `idMovimiento` int(11) NOT NULL AUTO_INCREMENT,
  `idHoja` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` text NOT NULL,
  `detalleBitacora` text NOT NULL,
  `fechaMovimiento` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idMovimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_municipios_sv
CREATE TABLE IF NOT EXISTS `tbl_municipios_sv` (
  `idMunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMunicipio` varchar(100) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  PRIMARY KEY (`idMunicipio`),
  KEY `idDepartamento` (`idDepartamento`),
  CONSTRAINT `tbl_municipios_sv_ibfk_1` FOREIGN KEY (`idDepartamento`) REFERENCES `tbl_departamentos_sv` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_orina
CREATE TABLE IF NOT EXISTS `tbl_orina` (
  `idOrina` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `colorOrina` text NOT NULL,
  `urobilinogenoOrina` varchar(25) NOT NULL,
  `aspectoOrina` varchar(25) NOT NULL,
  `cuerposCetonicosOrina` varchar(25) NOT NULL,
  `densidadOrina` varchar(25) NOT NULL,
  `cilindrosOrina` varchar(25) NOT NULL,
  `phOrina` varchar(25) NOT NULL,
  `hematiesOrina` varchar(25) NOT NULL,
  `proteinasOrina` varchar(25) NOT NULL,
  `leucocitosOrina` varchar(25) NOT NULL,
  `glucosaOrina` varchar(25) NOT NULL,
  `celulasEpitelialesOrina` varchar(25) NOT NULL,
  `sangreOcultaOrina` varchar(25) NOT NULL,
  `cristalesOrina` varchar(25) NOT NULL,
  `bilirrubinaOrina` varchar(25) NOT NULL,
  `parasitologicoOrina` varchar(25) NOT NULL,
  `nitritoOrina` varchar(25) NOT NULL,
  `bacteriasOrina` varchar(25) NOT NULL,
  `grumosOrina` varchar(25) NOT NULL,
  `filamentoOrina` varchar(25) NOT NULL,
  `observacionesOrina` text NOT NULL,
  `fechaOrina` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idOrina`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_pacientes
CREATE TABLE IF NOT EXISTS `tbl_pacientes` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePaciente` varchar(50) NOT NULL,
  `edadPaciente` int(11) NOT NULL,
  `telefonoPaciente` varchar(10) NOT NULL,
  `duiPaciente` varchar(15) NOT NULL,
  `nacimientoPaciente` varchar(15) NOT NULL,
  `direccionPaciente` text NOT NULL,
  `civilPaciente` varchar(25) NOT NULL,
  `sexoPaciente` varchar(20) NOT NULL,
  `creadoPaciente` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idPaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_permisos
CREATE TABLE IF NOT EXISTS `tbl_permisos` (
  `idPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `idAcceso` int(11) NOT NULL,
  `estadoPermiso` int(11) NOT NULL,
  `fechaPermiso` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idPermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_pivote_reactivos
CREATE TABLE IF NOT EXISTS `tbl_pivote_reactivos` (
  `idPivoteReactivo` int(11) NOT NULL AUTO_INCREMENT,
  `idExamen` int(11) NOT NULL,
  `idReactivo` int(11) NOT NULL,
  `medidaReactivo` decimal(9,2) NOT NULL,
  `nombreExamen` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`idPivoteReactivo`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_proveedores
CREATE TABLE IF NOT EXISTS `tbl_proveedores` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `codigoProveedor` varchar(15) NOT NULL,
  `empresaProveedor` varchar(50) NOT NULL,
  `propietarioProveedor` varchar(75) NOT NULL,
  `nrcProveedor` varchar(10) NOT NULL,
  `nitProveedor` varchar(50) NOT NULL,
  `telefonoProveedor` varchar(10) NOT NULL,
  `emailProveedor` varchar(50) NOT NULL,
  `direccionProveedor` text NOT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_salidas_hemo
CREATE TABLE IF NOT EXISTS `tbl_salidas_hemo` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCuenta` date NOT NULL,
  `estadoCuenta` int(11) NOT NULL DEFAULT 1,
  `cuentaCreada` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_salidas_limpieza
CREATE TABLE IF NOT EXISTS `tbl_salidas_limpieza` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCuenta` date NOT NULL,
  `estadoCuenta` int(11) NOT NULL DEFAULT 1,
  `cuentaCreada` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_seguros
CREATE TABLE IF NOT EXISTS `tbl_seguros` (
  `idSeguro` int(11) NOT NULL AUTO_INCREMENT,
  `nombreSeguro` varchar(25) NOT NULL,
  `porcentajeSeguro` decimal(9,2) NOT NULL,
  `estadoSeguro` int(11) NOT NULL DEFAULT 1,
  `agregadoSeguro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idSeguro`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_tipo_consulta_lab
CREATE TABLE IF NOT EXISTS `tbl_tipo_consulta_lab` (
  `idTipoConsultaLab` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoConsultaLab` varchar(25) NOT NULL,
  `agregadoTipoConsultaLab` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idTipoConsultaLab`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_tipo_gasto
CREATE TABLE IF NOT EXISTS `tbl_tipo_gasto` (
  `idTipoGasto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoGasto` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipoGasto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_usuarios
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(50) NOT NULL,
  `psUsuario` text NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idAcceso` int(11) NOT NULL,
  `codigoVerificacion` varchar(50) NOT NULL,
  `nivelUsuario` int(11) NOT NULL DEFAULT 0,
  `estadoUsuario` int(11) NOT NULL DEFAULT 1,
  `fechaUsuario` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idUsuario`),
  KEY `idEmpleado` (`idEmpleado`),
  KEY `idAcceso` (`idAcceso`),
  CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `tbl_empleados` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_usuarios_ibfk_2` FOREIGN KEY (`idAcceso`) REFERENCES `tbl_accesos` (`idAcceso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_usuario_anuncio
CREATE TABLE IF NOT EXISTS `tbl_usuario_anuncio` (
  `idUsuarioAnuncio` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idAnuncio` int(11) NOT NULL,
  `fechaProgramacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idUsuarioAnuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_vales_hemo
CREATE TABLE IF NOT EXISTS `tbl_vales_hemo` (
  `idVale` int(11) NOT NULL AUTO_INCREMENT,
  `codigoVale` int(11) NOT NULL,
  `citaVale` int(11) NOT NULL,
  `creadoVale` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idVale`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_varios
CREATE TABLE IF NOT EXISTS `tbl_varios` (
  `idVarios` int(11) NOT NULL AUTO_INCREMENT,
  `examenSolicitado` int(11) NOT NULL,
  `muestraVarios` varchar(25) NOT NULL,
  `resultadoVarios` text NOT NULL,
  `valorNormalVarios` varchar(25) NOT NULL,
  `observacionesVarios` text NOT NULL,
  `fechaVarios` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idVarios`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla db_centro_medico.tbl_zonas_sv
CREATE TABLE IF NOT EXISTS `tbl_zonas_sv` (
  `idZona` int(11) NOT NULL AUTO_INCREMENT,
  `nombreZona` varchar(15) NOT NULL,
  PRIMARY KEY (`idZona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

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
