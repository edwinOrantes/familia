<?php
class Laboratorio_Model extends CI_Model {

    public function codigoConsulta(){
        $sql = "SELECT COALESCE(MAX(codigoConsulta),'0') AS codigo FROM tbl_consulta_laboratorio";
        $datos = $this->db->query($sql);
        return $datos->row();
    }

    public function validarCodigo($codigo = null){
        if($codigo != null){
            $sql = "SELECT * FROM tbl_consulta_laboratorio AS cl WHERE cl.codigoConsulta = '$codigo' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }
    }

    public function colaPacientes(){
        $sql = "SELECT p.idPaciente, hc.idHoja, p.nombrePaciente, p.edadPaciente, p.duiPaciente, p.telefonoPaciente, 
        cl.idCola, cl.consultaGenerada, DATE(cl.fechaCola) AS fecha, TIME(cl.fechaCola) AS hora
        FROM tbl_cola_laboratorio AS cl
        INNER JOIN tbl_hoja_cobro AS hc ON(cl.idHoja = hc.idHoja)
        INNER JOIN tbl_pacientes AS p ON(p.idPaciente = cl.idPaciente)
        GROUP BY p.idPaciente
        LIMIT 200";
        $datos = $this->db->query($sql);
        return $datos->result();
    }

    public function guardarConsulta($data = null){
        if($data != null){
            $sql = "INSERT INTO tbl_consulta_laboratorio(codigoConsulta, fechaConsulta, idMedico, idPaciente, idHoja, idCola)
                    VALUES(?, ?, ?, ?, ?, ?)";
            if($this->db->query($sql, $data)){
                $idConsulta = $this->db->insert_id();
                return $idConsulta;
            }else{
                return 0;
            }
        }
    }
    
    public function detalleConsulta($id){
        $sql = "SELECT 
                cl.idConsultaLaboratorio, p.idPaciente, p.nombrePaciente, p.edadPaciente, cl.codigoConsulta, cl.fechaConsulta, m.nombreMedico
                FROM tbl_consulta_laboratorio AS cl
                INNER JOIN tbl_pacientes AS p ON(p.idPaciente = cl.idPaciente)
                INNER JOIN tbl_medicos AS m ON(m.idMedico = cl.idMedico)
                WHERE cl.idConsultaLaboratorio = '$id' ";
        $datos = $this->db->query($sql);
        return $datos->row();
    }

    // Datos para el examen de sanguineo
        public function guardarSanguineo($data = null){
            if($data != null){
                $idConsulta = $data["consulta"];
                $tabla = $data["tabla"];
                unset($data["tabla"]);
                unset($data["consulta"]);

                $sql = "INSERT INTO tbl_sanguineo(muestraSanguineo, grupoSanguineo, factorSanguineo, duSanguineo)
                        VALUES(?, ?, ?, ?)";

                if($this->db->query($sql, $data)){
                    $idExamen = $this->db->insert_id();
                    $hora = date('h:i:s a', time());
                    $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, horaDetalleConsulta, nombreExamen, tablaExamen)
                            VALUES('$idConsulta', '$idExamen', '4', '$hora', 'Tipeo sanguineo', '$tabla')"; 
                    $this->db->query($sqlDC);
                    $idDetalleConsulta = $this->db->insert_id();
                    $datos = array('idSanguineo' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                    return $datos;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }

        public function actualizarSanguineo($data = null){
            if($data != null){
                $detalle =  $data["idDetalleConsulta"];
                $tabla =  $data["tabla"];
                unset($data["tabla"]);
                unset($data["idDetalleConsulta"]);
                $sql = "UPDATE tbl_sanguineo SET muestraSanguineo = ?, grupoSanguineo = ?, factorSanguineo = ?,
                        duSanguineo = ? WHERE idSanguineo = ?";
                $sql2 = "UPDATE tbl_detalle_consulta SET tablaExamen = '$tabla' WHERE idDetalleConsulta = '$detalle'";
                if($this->db->query($sql, $data)){
                    $this->db->query($sql2);
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    // Fin examen sanguineo



    // Datos para los examen de orina
        public function guardarOrina($data = null){
            if($data != null){
                $idConsulta = $data["consulta"];
                $tabla = $data["tabla"];
                unset($data["tabla"]);
                unset($data["consulta"]);

                $sql = "INSERT INTO tbl_orina(colorOrina, aspectoOrina, reaccionOrina, densidadOrina, phOrina, proteinasOrina, glucosaOrina, pigBilaOrina, 
                        sangreOcultaOrina, nitritoOrina, cuerposCetonicosOrina, acidosBilOrina, granulososOrina, cilindrosLeuOrina,
                        cilindrosOrina, oCilindrosOrina, leucocitosOrina, hematiesOrina, celulasEpitelialesOrina, elemMineralesOrina, 
                        bacteriasOrina, levaduraOrina, otrosOrina, observacionesOrina)
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        
                if($this->db->query($sql, $data)){
                    $idExamen = $this->db->insert_id();
                    $hora = date('h:i:s a', time());
                    $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, horaDetalleConsulta, nombreExamen, tablaExamen)
                            VALUES('$idConsulta', '$idExamen', '13', '$hora', 'Orina', '$tabla')";

                    $this->db->query($sqlDC);
                    $idDetalleConsulta = $this->db->insert_id();
                    $datos = array('idOrina' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                    return $datos;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }

        public function actualizarOrina($data = null){
            if($data != null){
                $detalle =  $data["idDetalleConsulta"];
                $tabla =  $data["tabla"];
                unset($data["tabla"]);
                unset($data["idDetalleConsulta"]);
                $sql = "UPDATE tbl_orina SET colorOrina = ?, aspectoOrina = ?, reaccionOrina = ?, densidadOrina = ?, phOrina = ?, proteinasOrina = ?,
                                glucosaOrina = ?, pigBilaOrina = ?, sangreOcultaOrina = ?, nitritoOrina = ?, cuerposCetonicosOrina = ?, 
                                acidosBilOrina = ?, granulososOrina = ?, cilindrosLeuOrina = ?, cilindrosOrina = ?, oCilindrosOrina = ?,
                                leucocitosOrina = ?, hematiesOrina = ?, celulasEpitelialesOrina = ?, elemMineralesOrina = ?, bacteriasOrina = ?,
                                levaduraOrina = ?, otrosOrina = ?, observacionesOrina = ?
                        WHERE idOrina = ? ";
                $sql2 = "UPDATE tbl_detalle_consulta SET tablaExamen = '$tabla' WHERE idDetalleConsulta = '$detalle'";
                if($this->db->query($sql, $data)){
                    $this->db->query($sql2);
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    // Fin examene de orina


    // Datos para los examen de hematologia
        public function guardarHematologia($data = null){
            if($data != null){
                $idConsulta = $data["consulta"];
                $tabla = $data["tabla"];
                unset($data["tabla"]);
                unset($data["consulta"]);
                $sql = "INSERT INTO tbl_hematologia(eritrocitosHematologia, hematocritoHematologia, hemoglobinaHematologia,
                        vgmHematologia, hgmHematologia, chgmHematologia, leucocitosHematologia, neutrofHematologia, neutrofBandHematologia,
                        linfocitosHematologia, eosinofilosHematologia, monocitosHematologia, basofilosHematologia, blastosHematologia,
                        reticulocitosHematologia, eritrosedHematologia, plaquetasHematologia, gotaGruesaHematologia, rojaHematologia, 
                        blancaHematologia, plaquetariaHematologia, observacionesHematologia) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                if($this->db->query($sql, $data)){
                    $idExamen = $this->db->insert_id();
                    $hora = date('h:i:s a', time());
                    $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, horaDetalleConsulta, nombreExamen, tablaExamen)
                            VALUES('$idConsulta', '$idExamen', '12', '$hora', 'Hematologia', '$tabla')";
                    $this->db->query($sqlDC);
                    $idDetalleConsulta = $this->db->insert_id();
                    $datos = array('idHematologia' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                    return $datos;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }

        public function actualizarHematologia($data = null){
            if($data != null){
                $detalle =  $data["idDetalleConsulta"];
                $tabla =  $data["tabla"];
                unset($data["tabla"]);
                unset($data["idDetalleConsulta"]);
                $sql = "UPDATE tbl_hematologia SET eritrocitosHematologia = ?, hematocritoHematologia = ?, hemoglobinaHematologia = ?,
                        vgmHematologia = ?, hgmHematologia = ?, chgmHematologia = ?, leucocitosHematologia = ?, neutrofHematologia = ?, neutrofBandHematologia = ?, 
                        linfocitosHematologia = ?, eosinofilosHematologia = ?, monocitosHematologia = ?, basofilosHematologia = ?, blastosHematologia = ?,
                        reticulocitosHematologia = ?, eritrosedHematologia = ?, plaquetasHematologia = ?, gotaGruesaHematologia = ?, rojaHematologia = ?,
                        blancaHematologia = ?, plaquetariaHematologia = ?, observacionesHematologia = ? WHERE idHematologia = ? ";
                $sql2 = "UPDATE tbl_detalle_consulta SET tablaExamen = '$tabla' WHERE idDetalleConsulta = '$detalle'";
                if($this->db->query($sql, $data)){
                    $this->db->query($sql2);
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    // Fin examene de hematologia

    
    // Datos para el examen de coagulacion
        public function guardarCoagulacion($data = null){
            if($data != null){
                $idConsulta = $data["consulta"];
                $tabla = $data["tabla"];
                unset($data["tabla"]);
                unset($data["consulta"]);

                $sql = "INSERT INTO tbl_coagulacion(tiempoProtombina, tiempoTromboplastina, fibrinogeno, inr, tiempoSangramiento, tiempoCoagulacion, observacion) 
                        VALUES(?, ?, ?, ?, ?, ?, ?)";

                if($this->db->query($sql, $data)){
                    $idExamen = $this->db->insert_id();
                    $hora = date('h:i:s a', time());
                    $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, horaDetalleConsulta, nombreExamen, tablaExamen)
                              VALUES('$idConsulta', '$idExamen', '3', '$hora', 'Coagulación', '$tabla')"; 
                    $this->db->query($sqlDC);
                    $idDetalleConsulta = $this->db->insert_id();
                    $datos = array('idCoagulacion' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                    return $datos;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }

        public function actualizarCoagulacion($data = null){
            if($data != null){
                $detalle =  $data["idDetalleConsulta"];
                $tabla =  $data["tabla"];
                unset($data["tabla"]);
                unset($data["idDetalleConsulta"]);
                $sql = "UPDATE tbl_coagulacion SET tiempoProtombina = ?, tiempoTromboplastina = ?, fibrinogeno = ?,
                        inr = ?, tiempoSangramiento = ?, tiempoCoagulacion = ?, observacion = ? WHERE idCoagulacion = ?";
                $sql2 = "UPDATE tbl_detalle_consulta SET tablaExamen = '$tabla' WHERE idDetalleConsulta = '$detalle'";
                if($this->db->query($sql, $data)){
                    $this->db->query($sql2);
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    // Fin examen coagulacion

    // Datos para el examen de cropologia
        public function guardarCropologia($data = null){
            if($data != null){
                $idConsulta = $data["consulta"];
                $solicitado = $data["examenSolicitado"];
                $tabla = $data["tabla"];
                unset($data["tabla"]);
                unset($data["consulta"]);

                $sql = "INSERT INTO tbl_cropologia(colorCropologia, consistenciaCropologia, mucusCropologia, hematiesCropologia, leucocitosCropologia,
                        ascarisCropologia, hymenolepisCropologia, uncinariasCropologia, tricocefalosCropologia, larvaStrongyloides, histolyticaQuistes,
                        histolyticaTrofozoitos, coliQuistes, coliTrofozoitos, giardiaQuistes, giardiaTrofozoitos, blastocystisQuistes, blastocystisTrofozoitos,
                        tricomonasQuistes, tricomonasTrofozoitos, mesnilliQuistes, mesnilliTrofozoitos, nanaQuistes, nanaTrofozoitos, restosMacroscopicos, 
                        restosMicroscopicos, observacionesCropologia) 
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                if($this->db->query($sql, $data)){
                    $idExamen = $this->db->insert_id();
                    $hora = date('h:i:s a', time());
                    $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, horaDetalleConsulta, nombreExamen, tablaExamen)
                            VALUES('$idConsulta', '$idExamen', '7', '$hora', 'Coprologia', '$tabla')"; 
                    $this->db->query($sqlDC);
                    $idDetalleConsulta = $this->db->insert_id();
                    $datos = array('idCropologia' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                    return $datos;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }

        public function actualizarCropologia($data = null){
            if($data != null){
                $detalle =  $data["idDetalleConsulta"];
                $tabla =  $data["tabla"];
                unset($data["tabla"]);
                unset($data["idDetalleConsulta"]);
                $sql = "UPDATE tbl_cropologia SET colorCropologia = ?, consistenciaCropologia = ?, mucusCropologia = ?,
                        hematiesCropologia = ?, leucocitosCropologia = ?, ascarisCropologia = ?, hymenolepisCropologia = ?, 
                        uncinariasCropologia = ?, tricocefalosCropologia = ?, larvaStrongyloides = ?, histolyticaQuistes = ?, 
                        histolyticaTrofozoitos = ?, coliQuistes = ?, coliTrofozoitos = ?, giardiaQuistes = ?, giardiaTrofozoitos = ?, 
                        blastocystisQuistes = ?, blastocystisTrofozoitos = ?, tricomonasQuistes = ?, tricomonasTrofozoitos = ?, 
                        mesnilliQuistes = ?, mesnilliTrofozoitos = ?, nanaQuistes = ?, nanaTrofozoitos = ?, restosMacroscopicos = ?, 
                        restosMicroscopicos = ?, observacionesCropologia = ? WHERE idCropologia = ?";
                $sql2 = "UPDATE tbl_detalle_consulta SET tablaExamen = '$tabla' WHERE idDetalleConsulta = '$detalle'";
                if($this->db->query($sql, $data)){
                    $this->db->query($sql2);
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    // Fin examen cropologia

    // Datos para los examenes varios
        public function guardarVarios($data = null){
            if($data != null){
                $idConsulta = $data["consulta"];
                $examen = $data["examenSolicitadoLibre"];
                $tabla = $data["tabla"];
                unset($data["tabla"]);
                unset($data["consulta"]);

                $sql = "INSERT INTO tbl_varios(examenSolicitado, muestraVarios, resultadoVarios, valorNormalVarios, observacionesVarios)
                        VALUES(?, ?, ?, ?, ?)";
                if($this->db->query($sql, $data)){
                    $idExamen = $this->db->insert_id();
                    $hora = date('h:i:s a', time());
                    $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, horaDetalleConsulta, nombreExamen, tablaExamen)
                            VALUES('$idConsulta', '$idExamen', '10', '$hora', '$examen', '$tabla')"; 
                    $this->db->query($sqlDC);
                    $idDetalleConsulta = $this->db->insert_id();
                    $datos = array('idVarios' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                    return $datos;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }

        public function actualizarVarios($data = null){
            if($data != null){
                $detalle =  $data["idDetalleConsulta"];
                $examen =  $data["examenSolicitado"];
                $tabla =  $data["tabla"];
                unset($data["tabla"]);
                unset($data["idDetalleConsulta"]);
                unset($data["examenSolicitado"]);
                $sql = "UPDATE tbl_varios SET muestraVarios = ?, resultadoVarios = ?, valorNormalVarios = ?,
                        observacionesVarios = ? WHERE idVarios = ? ";
                $sql2 = "UPDATE tbl_detalle_consulta SET tablaExamen = '$tabla' WHERE idDetalleConsulta = '$detalle'";
                if($this->db->query($sql, $data)){
                    $this->db->query($sql2);
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    // Fin examenes varios

    public function historialConsultas(){
        $sql = "SELECT cl.idConsultaLaboratorio, p.idPaciente, p.nombrePaciente, p.edadPaciente, m.idMedico, m.nombreMedico, cl.idConsultaLaboratorio, 
                cl.codigoConsulta, cl.fechaConsultaLaboratorio FROM
                tbl_consulta_laboratorio as cl 
                INNER JOIN tbl_pacientes AS p ON(cl.idPaciente = p.idPaciente) 
                INNER JOIN tbl_medicos AS m ON(cl.idMedico = m.idMedico)
                ORDER BY cl.idConsultaLaboratorio DESC LIMIT 100 ";
        $datos = $this->db->query($sql);
        return $datos->result();
    }

    public function historialConsultasXPaciente($id = null){
        $sql = "SELECT cl.idConsultaLaboratorio, p.idPaciente, p.nombrePaciente, p.edadPaciente, m.idMedico, m.nombreMedico, cl.idConsultaLaboratorio, 
                cl.codigoConsulta, DATE(cl.fechaConsultaLaboratorio) AS fecha, TIME(cl.fechaConsultaLaboratorio) AS hora FROM
                tbl_consulta_laboratorio as cl 
                INNER JOIN tbl_pacientes AS p ON(cl.idPaciente = p.idPaciente) 
                INNER JOIN tbl_medicos AS m ON(cl.idMedico = m.idMedico)
                WHERE p.idPaciente = '$id'
                ORDER BY cl.idConsultaLaboratorio DESC";
        $datos = $this->db->query($sql);
        return $datos->result();
    }

    // Metodo para busqueda de pacientes
        public function busquedaConsultas($data = null){
            if($data != null){
                $param = $data["parametro"];
                $busqueda = $data["busquedaPaciente"];
                $str = "";
                if($param == 1){
                    $str = "p.nombrePaciente LIKE '%$busqueda%'";
                }else{
                    $str = "p.duiPaciente LIKE '%$busqueda%'";
                }
                $sql = "SELECT * FROM tbl_consulta_laboratorio AS cl
                        INNER JOIN tbl_pacientes AS p ON(p.idPaciente = cl.idPaciente)
                        WHERE ".$str."
                        GROUP BY p.idPaciente LIMIT 10";
                $datos = $this->db->query($sql);
                return $datos->result();

            }
        }

    // Metodo para busqueda de pacientes

    















    public function obtenerTipoConsulta(){
        $sql = "SELECT * FROM tbl_tipo_consulta_lab";
        $datos = $this->db->query($sql);
        return $datos->result();
    }

    /* Metodos para gestion de procesos de laboratorio  */
        public function obtenerExamenes(){
            $sql = "SELECT * FROM tbl_medicamentos WHERE pivoteMedicamento = 1";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function guardarHoja($data = null){
            if ($data["hoja"] != null) {
                $hoja = $data["hoja"];
                $paciente = $data["paciente"];
                $medico = $hoja["idMedico"];
                $tipoConsulta = $hoja["tipoConsulta"];

                $habitacion = $hoja["idHabitacion"];

                $sql = "INSERT INTO tbl_pacientes(nombrePaciente, edadPaciente, telefonoPaciente, duiPaciente, nacimientoPaciente, direccionPaciente)
                    VALUES(?, ?, ?, ?, ?, ?)"; 
                
                $sql2 = "INSERT INTO tbl_hoja_cobro(codigoHoja, idPaciente, fechaHoja, tipoHoja, idMedico, idHabitacion, estadoHoja, anulada)
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?) ";
                $idHoja = 0;
                $pacienteL = 0;
                if($paciente["idPaciente"] == 0){
                    unset($paciente["idPaciente"]);
                    if($this->db->query($sql, $paciente)){
                        $pacienteL = $this->db->insert_id();
                        // return 0;
                    }else{
                        // return 0;
                    }
                }else{
                    $pacienteL = $hoja["idPaciente"];
                    // return 0;
                }
                
                $sqlC = "SELECT MAX(codigoConsulta) as codigo FROM tbl_consulta_laboratorio";
                $datoC = $this->db->query($sqlC)->row();
                $cod = 0;
                if($datoC->codigo == NULL ){
                    $cod = 1000;
                }else{
                    $cod = ($datoC->codigo + 1);
                }

                $sqlL = "INSERT INTO tbl_consulta_laboratorio(idHoja, idPaciente, idMedico, codigoConsulta, tipoConsulta) VALUES('$idHoja', '$pacienteL', '$medico', $cod, $tipoConsulta)";
                $this->db->query($sqlL);
                $consulta = $this->db->insert_id();
                return $consulta;
            }else{
                    return 0;
                }
        }

        public function actualizarPaciente($data = null){
            if($data != null){
                $medico["idMedico"] = $data["idMedico"];
                $medico["idConsultaLaboratorio"] = $data["idConsultaLaboratorio"];
                unset($data["idMedico"]);
                unset($data["idConsultaLaboratorio"]);

                $sql = "UPDATE tbl_pacientes SET nombrePaciente = ?, edadPaciente = ? WHERE idPaciente = ?";
                $sql2 = "UPDATE tbl_consulta_laboratorio SET idMedico = ? WHERE idConsultaLaboratorio = ?";
                if($this->db->query($sql, $data)){
                    $this->db->query($sql2, $medico);
                    return true;
                }else{
                    return false;
                }
            }else{  
                return false;
            }
        }


        public function guardarInmunologico($data = null){
            if($data != null){
                $idConsulta = $data["consulta"];
                $solicitado = $data["examenSolicitado"];
                unset($data["consulta"]);
                $sql = "INSERT INTO tbl_inmunologia(examenSolicitado, tificoO, tificoH, paratificoA, paratificoB,
                brucellaAbortus, proteusOx, proteinaC, reumatoideo, antiestreptolisina) VALUES(?, ?,?, ?, ?, ?, ?, ?, ?, ?)";
                if($this->db->query($sql, $data)){
                    $idExamen = $this->db->insert_id();
                    $hora = date('h:i:s a', time());
                    $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, examenSolicitado, horaDetalleConsulta )
                            VALUES('$idConsulta', '$idExamen', '1', '$solicitado', '$hora')"; 
                    $this->db->query($sqlDC);
                    $idDetalleConsulta = $this->db->insert_id();
                    $datos = array('idInmunologia' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                    return $datos;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }


        public function detalleExamen($id, $tipo){
            switch ($tipo) {
                case '1':
                    $sql = "SELECT * FROM tbl_inmunologia WHERE idInmunologia = '$id' ";
                    break;
                case '2':
                    $sql = "SELECT * FROM tbl_bacteriologia WHERE idBacteriologia = '$id' ";
                    break;
                case '3':
                    $sql = "SELECT * FROM tbl_coagulacion WHERE idCoagulacion = '$id' ";
                    break;
                case '4':
                    $sql = "SELECT * FROM tbl_sanguineo WHERE idSanguineo = '$id' ";
                    break;
                case '5':
                    $sql = "SELECT * FROM tbl_quimica_clinica WHERE idQuimicaClinica = '$id' ";
                    break;
                case '6':
                    $sql = "SELECT * FROM tbl_quimica_sanguinea WHERE idQuimicaSanguinea = '$id' ";
                    break;
                case '7':
                    $sql = "SELECT * FROM tbl_cropologia WHERE idCropologia = '$id' ";
                    break;
                case '8':
                    $sql = "SELECT * FROM tbl_tiroideas_libres WHERE idTiroideaLibre = '$id' ";
                    break;
                case '9':
                    $sql = "SELECT * FROM tbl_tiroideas_totales WHERE idTiroideaTotal = '$id' ";
                    break;
                case '10':
                    $sql = "SELECT * FROM tbl_varios WHERE idVarios = '$id' ";
                    break;
                case '11':
                    $sql = "SELECT * FROM tbl_antigeno_prostatico WHERE idAntigenoProstatico = '$id' ";
                    break;
                case '12':
                    $sql = "SELECT * FROM tbl_hematologia WHERE idHematologia = '$id' ";
                    break;
                case '13':
                    $sql = "SELECT * FROM tbl_orina WHERE idOrina = '$id' ";
                    break;
                case '14':
                    $sql = "SELECT * FROM tbl_hisopado_nasal WHERE idHisopadoNasal = '$id' ";
                    break;
                case '15':
                    $sql = "SELECT * FROM tbl_espermograma WHERE idEspermograma  = '$id' ";
                    break;
                case '16':
                    $sql = "SELECT * FROM tbl_depuracion_creatinina WHERE idDepuracion  = '$id' ";
                    break;
                case '17':
                    $sql = "SELECT * FROM tbl_gases_arteriales WHERE idGasesArteriales  = '$id' ";
                    break;
                case '18':
                    $sql = "SELECT * FROM tbl_tolerancia_glucosa WHERE idToleranciaGlucosa = '$id' ";
                    break;
                case '19':
                    $sql = "SELECT * FROM tbl_toxoplasma WHERE idToxoplasma = '$id' ";
                    break;
                default:
                    # code...
                    break;
            }
            
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function obtenerExamenesRealizados($id){
            $sql = "SELECT dc.nombreExamen, cl.idConsultaLaboratorio, dc.idDetalleConsulta, dc.idExamen, 
                    dc.horaDetalleConsulta, dc.fechaDetalleConsulta, dc.tipoExamen, dc.examenes
                    FROM tbl_consulta_laboratorio AS cl 
                    INNER JOIN tbl_detalle_consulta AS dc on(cl.idConsultaLaboratorio = dc.idConsultaLaboratorio) 
                    WHERE cl.idConsultaLaboratorio = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function fechasVisitas($id = null, $fecha = null){
            $sql = "SELECT DISTINCT(cl.fechaConsulta) AS fecha FROM tbl_consulta_laboratorio AS cl
                    WHERE cl.idPaciente = '$id' AND cl.fechaConsulta != '$fecha' ";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function historialRealizado($fecha = null, $p = null){
            $sql = "SELECT cl.fechaConsulta, dc.nombreExamen, cl.idPaciente, cl.idConsultaLaboratorio, dc.idDetalleConsulta, dc.idExamen, 
                    dc.horaDetalleConsulta, dc.fechaDetalleConsulta, dc.tipoExamen, dc.examenes, dc.tablaExamen
                    FROM tbl_consulta_laboratorio AS cl 
                    INNER JOIN tbl_detalle_consulta AS dc on(cl.idConsultaLaboratorio = dc.idConsultaLaboratorio) 
                    WHERE cl.fechaConsulta = '$fecha' AND cl.idPaciente = '$p'
                    ORDER BY cl.fechaConsulta ASC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function obtenerDetalleConsulta($id, $pivote){
            $sql = "SELECT idDetalleConsulta FROM tbl_detalle_consulta WHERE idExamen = '$id' AND tipoExamen = '$pivote' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function buscarExamen($id, $pivote){
            switch ($pivote) {
                case '1':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_inmunologia AS i ON(dc.idExamen = i.idInmunologia)
                    WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote' ";
                    break;
                case '2':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_bacteriologia AS b ON(dc.idExamen = b.idBacteriologia)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote' ";
                    break;
                
                case '3':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_coagulacion AS c ON(dc.idExamen = c.idCoagulacion)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote' ";
                    break;
                
                case '4':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_sanguineo AS s ON(dc.idExamen = s.idSanguineo)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote' ";
                    break;
                case '5':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_quimica_clinica AS qc ON(dc.idExamen = qc.idQuimicaClinica)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote' ";
                    break;
                case '6':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_quimica_sanguinea AS qs ON(dc.idExamen = qs.idQuimicaSanguinea)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;
                case '7':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_cropologia AS c ON(dc.idExamen = c.idCropologia)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;
                case '8':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_tiroideas_libres AS c ON(dc.idExamen = c.idTiroideaLibre)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;
                case '9':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_tiroideas_totales AS c ON(dc.idExamen = c.idTiroideaTotal)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;

                case '10':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_varios AS c ON(dc.idExamen = c.idVarios)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;
                
                case '11':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_antigeno_prostatico AS c ON(dc.idExamen = c.idAntigenoProstatico)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;
                
                case '12':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_hematologia AS c ON(dc.idExamen = c.idHematologia)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;
                case '13':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_orina AS c ON(dc.idExamen = c.idOrina)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;
                case '14':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_hisopado_nasal AS c ON(dc.idExamen = c.idHisopadoNasal)
                            WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;
                case '15':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_espermograma AS esp ON(dc.idExamen = esp.idEspermograma)
                             WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;
                case '16':
                    $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_depuracion_creatinina AS crea ON(dc.idExamen = crea.idDepuracion)
                             WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;
                case '17':
                        $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_gases_arteriales AS arte ON(dc.idExamen = arte.idGasesArteriales)
                                WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote' ";
                    break;
                case '18':
                        $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_tolerancia_glucosa AS tg ON(dc.idExamen = tg.idToleranciaGlucosa)
                                WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;
                
                case '19':
                        $sql = "SELECT * FROM tbl_detalle_consulta AS dc INNER JOIN tbl_toxoplasma AS t ON(dc.idExamen = t.idToxoplasma)
                                WHERE dc.idExamen = '$id' AND dc.tipoExamen = '$pivote'";
                    break;

                default:
                    # code...
                    break;
            }
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function actualizarInmunologia($data = null){
            if($data != null){
                    $detalle =  $data["idDetalleConsulta"];
                    $examen =  $data["examenSolicitado"];
                    unset($data["idDetalleConsulta"]);
                    $sql = "UPDATE tbl_inmunologia SET examenSolicitado = ?, tificoO = ?, tificoH = ?, paratificoA = ?,
                            paratificoB = ?, brucellaAbortus = ?, proteusOx = ?, proteinaC = ?, reumatoideo = ?, antiestreptolisina = ?
                            WHERE idInmunologia = ?";
                    if($this->db->query($sql, $data)){
                        $sql2 = "UPDATE tbl_detalle_consulta SET examenSolicitado = '$examen' WHERE idDetalleConsulta = '$detalle'";
                        if($this->db->query($sql2)){
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
            }else{
                    return false;
            }
        }

        public function actualizarBacteriologia($data = null){
            if($data != null){
                $detalle =  $data["idDetalleConsulta"];
                $examen =  $data["bacteriologiaSolicitado"];
                unset($data["idDetalleConsulta"]);
                $sql = "UPDATE tbl_bacteriologia SET examenSolicitado = ?, resultadoDirecto = ?, procedenciaCultivo = ?, resultadoCultivo = ?, cefixime = ?,
                        amikacina = ?, levofloxacina = ?, ceftriaxona = ?, azitromicina = ?, imipenem = ?, meropenem = ?, fosfocil = ?,
                        ciprofloxacina = ?, penicilina = ?, vancomicina = ?, acidoNalidixico = ?, gentamicina = ?, nitrofurantoina = ?,
                        ceftazimide = ?, cefotaxime = ?, clindamicina = ?, trimetropimSulfa = ?, ampicilina = ?, piperacilina = ?,
                        amoxicilina = ?, claritromicina = ?, cefuroxime = ?, observacionesCultivo = ? WHERE idBacteriologia = ?";
                if($this->db->query($sql, $data)){
                    $sql2 = "UPDATE tbl_detalle_consulta SET examenSolicitado = '$examen' WHERE idDetalleConsulta = '$detalle'";
                    if($this->db->query($sql2)){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function eliminarExamen($data = null){
            if($data != null){
                $pivote =  $data["tipoExamen"];
                $id =  $data["idExamen"];
                $detalle =  $data["idDetalleConsuta"];
                switch ($pivote) {
                    case '1':
                        $sql = "DELETE FROM tbl_inmunologia WHERE idInmunologia = '$id' ";
                        break;
                    case '2':
                            $sql = "DELETE FROM tbl_bacteriologia WHERE idBacteriologia = '$id' ";
                        break;
                    case '3':
                            $sql = "DELETE FROM tbl_coagulacion WHERE idCoagulacion = '$id' ";
                        break;
                    case '4':
                            $sql = "DELETE FROM tbl_sanguineo WHERE idSanguineo = '$id' ";
                        break;
                    case '5':
                            $sql = "DELETE FROM tbl_quimica_clinica WHERE idQuimicaClinica = '$id' ";
                        break;
                    case '6':
                            $sql = "DELETE FROM tbl_quimica_sanguinea WHERE idQuimicaSanguinea = '$id' ";
                        break;
                    case '7':
                            $sql = "DELETE FROM tbl_cropologia WHERE idCropologia = '$id' ";
                        break;
                    case '8':
                            $sql = "DELETE FROM tbl_tiroideas_libres WHERE idTiroideaLibre = '$id' ";
                        break;
                    case '9':
                            $sql = "DELETE FROM tbl_tiroideas_totales WHERE idTiroideaTotal = '$id' ";
                        break;
                    case '10':
                            $sql = "DELETE FROM tbl_varios WHERE idVarios = '$id' ";
                        break;
                    case '11':
                            $sql = "DELETE FROM tbl_antigeno_prostatico WHERE idAntigenoProstatico = '$id' ";
                        break;
                    case '12':
                            $sql = "DELETE FROM tbl_hematologia WHERE idHematologia = '$id' ";
                        break;
                    case '13':
                            $sql = "DELETE FROM tbl_orina WHERE idOrina = '$id' ";
                        break;
                    case '14':
                            $sql = "DELETE FROM tbl_hisopado_nasal WHERE idHisopadoNasal = '$id' ";
                        break;
                    case '15':
                            $sql = "DELETE FROM tbl_espermograma WHERE idEspermograma = '$id' ";
                        break;
                    case '16':
                            $sql = "DELETE FROM tbl_depuracion_creatinina WHERE idDepuracion = '$id' ";
                        break;
                    case '17':
                            $sql = "DELETE FROM tbl_gases_arteriales WHERE idGasesArteriales = '$id' ";
                        break;
                    case '18':
                            $sql = "DELETE FROM tbl_tolerancia_glucosa WHERE idToleranciaGlucosa = '$id' ";
                        break;
                    case '19':
                            $sql = "DELETE FROM tbl_toxoplasma WHERE idToxoplasma = '$id' ";
                        break;
                    default:
                        echo "Undefined";
                        break;
                }
                $sql2 = "DELETE FROM tbl_detalle_consulta WHERE idDetalleConsulta = '$detalle' ";
                $sql3 = "DELETE FROM tbl_examenes_realizados WHERE idConsulta = '$detalle' ";
                if($this->db->query($sql)){
                    $this->db->query($sql2);
                    $this->db->query($sql3);
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        

        public function busquedaHistorial($str = null){
            $sql = "SELECT cl.idConsultaLaboratorio, p.idPaciente, p.nombrePaciente, p.edadPaciente, m.idMedico,
                    m.nombreMedico, cl.codigoConsulta, cl.fechaConsultaLaboratorio
                    FROM tbl_consulta_laboratorio as cl 
                    INNER JOIN tbl_pacientes AS p ON(cl.idPaciente = p.idPaciente)
                    INNER JOIN tbl_medicos AS m ON(cl.idMedico = m.idMedico)
                    WHERE p.nombrePaciente LIKE '%$str%'";
            $datos = $this->db->query($sql);
            return $datos->result();
        }
        public function todasConsultas(){
            $sql = "SELECT cl.idConsultaLaboratorio, p.idPaciente, p.nombrePaciente, p.edadPaciente, m.idMedico, m.nombreMedico, cl.codigoConsulta, 
                    cl.fechaConsultaLaboratorio, tcl.nombreTipoConsultaLab
                    FROM tbl_consulta_laboratorio as cl 
                    INNER JOIN tbl_pacientes AS p ON(cl.idPaciente = p.idPaciente)
                    INNER JOIN tbl_medicos AS m ON(cl.idMedico = m.idMedico)
                    INNER JOIN tbl_tipo_consulta_lab AS tcl ON(tcl.idTipoConsultaLab = cl.tipoConsulta)";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function guardarBacteriologico($data = null){
            if($data != null){
                $idConsulta = $data["consulta"];
                $solicitado = $data["bacteriologiaSolicitado"];
                unset($data["consulta"]);

                $sql = "INSERT INTO tbl_bacteriologia(examenSolicitado, resultadoDirecto, procedenciaCultivo, resultadoCultivo, cefixime, amikacina, levofloxacina, ceftriaxona, azitromicina,
                        imipenem, meropenem, fosfocil, ciprofloxacina, penicilina, vancomicina, acidoNalidixico, gentamicina, nitrofurantoina,
                        ceftazimide, cefotaxime, clindamicina, trimetropimSulfa, ampicilina, piperacilina, amoxicilina, claritromicina, cefuroxime, observacionesCultivo)
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                if($this->db->query($sql, $data)){
                    $idExamen = $this->db->insert_id();
                    $hora = date('h:i:s a', time());
                    $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, examenSolicitado, horaDetalleConsulta )
                            VALUES('$idConsulta', '$idExamen', '2', '$solicitado', '$hora')"; 
                    $this->db->query($sqlDC);
                    $idDetalleConsulta = $this->db->insert_id();
                    $datos = array('idBacteriologia' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                    return $datos;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }

        public function guardarExamenes($data = null, $consulta = null){
            $examenes = $data["examenes"];
            $cadenaExamenes = "";
            for ($i=0; $i < sizeof($examenes) ; $i++) { 
                $examen = $examenes[$i];
                $sql = "INSERT INTO tbl_examenes_realizados(idExamen, idConsulta) VALUES('$examen', '$consulta')";
                $this->db->query($sql);
            }
            $cadenaExamenes = $this->nombresExamenes($data);
            $sql2 = "UPDATE tbl_detalle_consulta SET examenes = '$cadenaExamenes' WHERE idDetalleConsulta = '$consulta' ";
            $this->db->query($sql2);

            return $cadenaExamenes;
        }

        public function nombresExamenes($data = null){
            $examenes = $data["examenes"];
            $cadena = "";
            for ($i=0; $i < sizeof($examenes) ; $i++) { 
                $examen = $examenes[$i];
                $sql = "SELECT nombreMedicamento FROM tbl_medicamentos WHERE idMedicamento = '$examen' ";
                $nombre = $this->db->query($sql)->row();
                $cadena .= $nombre->nombreMedicamento.", ";
            }
            return $cadena;
        }

        public function totalHojaLaboratorio($id){
            $sql = "SELECT m.nombreMedicamento, m.precioVMedicamento FROM tbl_detalle_consulta AS dc INNER JOIN tbl_consulta_laboratorio AS cl 
                    ON(dc.idConsultaLaboratorio = cl.idConsultaLaboratorio) INNER JOIN tbl_examenes_realizados AS exr 
                    ON(dc.idDetalleConsulta = exr.idConsulta) INNER JOIN tbl_medicamentos AS m ON(exr.idExamen = m.idMedicamento) 
                    WHERE cl.idConsultaLaboratorio = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->result();
        }



        // Datos para el examen de quimica clinica
            public function guardarQuimicaClinica($data = null){
                if($data != null){
                    $idConsulta = $data["consulta"];
                    $solicitado = $data["quimicaClinicaSolicitado"];
                    unset($data["consulta"]);

                    $sql = "INSERT INTO tbl_quimica_clinica(examenSolicitado, sodioQuimicaClinica, potasioQuimicaClinica, cloroQuimicaClinica, 
                            magnesioQuimicaClinica, fosforoQuimicaClinica, cpkTQuimicaClinica, cpkMbQuimicaClinica, ldhQuimicaClinica,
                            creatininaQuimicaClinica, troponinaQuimicaClinica, comentariosQuimicaClinica)
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    if($this->db->query($sql, $data)){
                        $idExamen = $this->db->insert_id();
                        $hora = date('h:i:s a', time());
                        $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, examenSolicitado, horaDetalleConsulta )
                                VALUES('$idConsulta', '$idExamen', '5', '$solicitado', '$hora')"; 
                        $this->db->query($sqlDC);
                        $idDetalleConsulta = $this->db->insert_id();
                        $datos = array('idQuimicaClinica' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                        return $datos;
                    }else{
                        return 0;
                    }
                }else{
                    return 0;
                }
            }

            public function actualizarQuimicaClinica($data = null){
                if($data != null){
                    $detalle =  $data["idDetalleConsulta"];
                    $examen =  $data["quimicaClinicaSolicitado"];
                    unset($data["idDetalleConsulta"]);
                    $sql = "UPDATE tbl_quimica_clinica SET examenSolicitado = ?, sodioQuimicaClinica = ?, potasioQuimicaClinica = ?, cloroQuimicaClinica = ?, magnesioQuimicaClinica = ?,
                        fosforoQuimicaClinica = ?, cpkTQuimicaClinica = ?, cpkMbQuimicaClinica = ?, ldhQuimicaClinica = ?, creatininaQuimicaClinica = ?, troponinaQuimicaClinica = ?,
                        comentariosQuimicaClinica = ? WHERE idQuimicaClinica = ?";
                    if($this->db->query($sql, $data)){
                        $sql2 = "UPDATE tbl_detalle_consulta SET examenSolicitado = '$examen' WHERE idDetalleConsulta = '$detalle'";
                        if($this->db->query($sql2)){
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        // Fin examen quimica clinica

        // Datos para el examen de quimica sanguinea
            public function guardarQuimicaSanguinea($data = null){
                if($data != null){
                    $idConsulta = $data["consulta"];
                    $solicitado = $data["examenSolicitado"];
                    $tabla = $data["tabla"];
                    unset($data["tabla"]);
                    unset($data["examenSolicitado"]);
                    unset($data["consulta"]);

                    $sql = "INSERT INTO tbl_quimica_sanguinea(glucosaQS, posprandialQS, colesterolQS, trigliceridosQS, colesterolHDLQS, colesterolLDLQS, acidoUricoQS, ureaQS,
                            nitrogenoQS, creatininaQS, amilasaQS, lipasaQS, fosfatasaQS, tgpQS, tgoQS, hba1cQS, proteinaTotalQS, albuminaQS, globulinaQS, relacionAGQS, bilirrubinaTQS,
                            bilirrubinaDQS, bilirrubinaIQS, sodioQuimicaClinica, potasioQuimicaClinica, cloroQuimicaClinica, magnesioQuimicaClinica, calcioQuimicaClinica, fosforoQuimicaClinica, cpkTQuimicaClinica,
                            cpkMbQuimicaClinica, ldhQuimicaClinica, troponinaQuimicaClinica, notaQS)
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    if($this->db->query($sql, $data)){
                        $idExamen = $this->db->insert_id();
                        $hora = date('h:i:s a', time());
                        $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, horaDetalleConsulta, nombreExamen, tablaExamen)
                                    VALUES('$idConsulta', '$idExamen', '6', '$hora', 'Quimica sanguinea', '$tabla')"; 
                        $this->db->query($sqlDC);
                        $idDetalleConsulta = $this->db->insert_id();
                        $datos = array('idQuimicaSanguinea' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                        return $datos;
                    }else{
                        return 0;
                    }
                }else{
                    return 0;
                }
            }

            public function actualizarQuimicaSanguinea($data = null){
                if($data != null){
                    $detalle =  $data["idDetalleConsulta"];
                    $tabla =  $data["tabla"];
                    unset($data["tabla"]);
                    unset($data["idDetalleConsulta"]);

                    $sql = "UPDATE tbl_quimica_sanguinea SET glucosaQS = ?, posprandialQS = ?, colesterolQS = ?, trigliceridosQS = ?, colesterolHDLQS = ?,
                            colesterolLDLQS = ?, acidoUricoQS = ?, ureaQS = ?, nitrogenoQS = ?, creatininaQS = ?,
                            amilasaQS = ?, lipasaQS = ?, fosfatasaQS = ?, tgpQS = ?, tgoQS = ?, hba1cQS = ?, proteinaTotalQS = ?, albuminaQS = ?,
                            globulinaQS = ?, relacionAGQS = ?, bilirrubinaTQS = ?, bilirrubinaDQS = ?, bilirrubinaIQS = ?, sodioQuimicaClinica = ?, potasioQuimicaClinica = ?,
                            cloroQuimicaClinica = ?, magnesioQuimicaClinica = ?, calcioQuimicaClinica = ?, fosforoQuimicaClinica = ?, cpkTQuimicaClinica = ?, cpkMbQuimicaClinica = ?, ldhQuimicaClinica = ?,
                            troponinaQuimicaClinica = ?, notaQS = ? WHERE idQuimicaSanguinea = ?";
                    $sql2 = "UPDATE tbl_detalle_consulta SET tablaExamen = '$tabla' WHERE idDetalleConsulta = '$detalle'";
                    if($this->db->query($sql, $data)){
                        $this->db->query($sql2);
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        // Fin examen quimica sanguinea


        // Datos para las pruebas tiroideas libres
            public function guardarTiroideaLibre($data = null){
                if($data != null){
                    $idConsulta = $data["consulta"];
                    $solicitado = $data["examenSolicitado"];
                    unset($data["consulta"]);

                    $sql = "INSERT INTO tbl_tiroideas_libres(examenSolicitado, muestraTiroideaLibre, t3TiroideaLibre, t4TiroideaLibre, tshTiroideaLibre, tshTiroideaLibreU, 
                            observacionTiroideaLibre) VALUES(?, ?, ?, ?, ?, ?, ?)";
                    if($this->db->query($sql, $data)){
                        $idExamen = $this->db->insert_id();
                        $hora = date('h:i:s a', time());
                        $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, examenSolicitado, horaDetalleConsulta )
                                VALUES('$idConsulta', '$idExamen', '8', '$solicitado', '$hora')"; 
                        $this->db->query($sqlDC);
                        $idDetalleConsulta = $this->db->insert_id();
                        $datos = array('idTiroideaLibre' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                        return $datos;
                    }else{
                        return 0;
                    }
                }else{
                    return 0;
                }
            }

            public function actualizarTiroideaLibre($data = null){
                if($data != null){
                    $detalle =  $data["idDetalleConsulta"];
                    $examen =  $data["examenSolicitado"];
                    unset($data["idDetalleConsulta"]);
                    $sql = "UPDATE tbl_tiroideas_libres SET examenSolicitado = ?, muestraTiroideaLibre = ?, t3TiroideaLibre = ?, t4TiroideaLibre = ?,
                            tshTiroideaLibre = ?, tshTiroideaLibreU = ?, observacionTiroideaLibre = ? WHERE idTiroideaLibre = ?";
                    if($this->db->query($sql, $data)){
                        $sql2 = "UPDATE tbl_detalle_consulta SET examenSolicitado = '$examen' WHERE idDetalleConsulta = '$detalle'";
                        if($this->db->query($sql2)){
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        // Fin tiroideas libres

        // Datos para las pruebas tiroides totales
            public function guardarTiroideaTotal($data = null){
                if($data != null){
                    $idConsulta = $data["consulta"];
                    $solicitado = $data["examenSolicitado"];
                    unset($data["consulta"]);

                    $sql = "INSERT INTO tbl_tiroideas_totales(examenSolicitado, muestraTiroideaTotal, t3TiroideaTotal, t4TiroideaTotal,
                            tshTiroideaTotal, observacionTiroideaTotal) VALUES(?, ?, ?, ?, ?, ?)";
                    if($this->db->query($sql, $data)){
                        $idExamen = $this->db->insert_id();
                        $hora = date('h:i:s a', time());
                        $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, examenSolicitado, horaDetalleConsulta )
                                VALUES('$idConsulta', '$idExamen', '9', '$solicitado', '$hora')"; 
                        $this->db->query($sqlDC);
                        $idDetalleConsulta = $this->db->insert_id();
                        $datos = array('idTiroideaTotal' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                        return $datos;
                    }else{
                        return 0;
                    }
                }else{
                    return 0;
                }
            }

            public function actualizarTiroideaTotal($data = null){
                if($data != null){
                    $detalle =  $data["idDetalleConsulta"];
                    $examen =  $data["examenSolicitado"];
                    unset($data["idDetalleConsulta"]);
                    $sql = "UPDATE tbl_tiroideas_totales SET examenSolicitado = ?, muestraTiroideaTotal = ?, t3TiroideaTotal = ?, t4TiroideaTotal = ?,
                            tshTiroideaTotal = ?, observacionTiroideaTotal = ? WHERE idTiroideaTotal = ?";
                    if($this->db->query($sql, $data)){
                        $sql2 = "UPDATE tbl_detalle_consulta SET examenSolicitado = '$examen' WHERE idDetalleConsulta = '$detalle'";
                        if($this->db->query($sql2)){
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        // Fin tiroides totales

        

        // Datos para examen psa
            public function guardarPSA($data = null){
                if($data != null){
                    $idConsulta = $data["consulta"];
                    $solicitado = $data["examenSolicitado"];
                    unset($data["consulta"]);

                    $sql = "INSERT INTO tbl_antigeno_prostatico(examenSolicitado, muestraAntigenoProstatico, resultadoAntigenoProstatico,
                            observacionAntigenoProstatico) VALUES(?, ?, ?, ?)";
                    if($this->db->query($sql, $data)){
                        $idExamen = $this->db->insert_id();
                        $hora = date('h:i:s a', time());
                        $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, examenSolicitado,
                                horaDetalleConsulta ) VALUES('$idConsulta', '$idExamen', '11', '$solicitado', '$hora')"; 
                        $this->db->query($sqlDC);
                        $idDetalleConsulta = $this->db->insert_id();
                        $datos = array('idPSA' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                        return $datos;
                    }else{
                        return 0;
                    }
                }else{
                    return 0;
                }
            }

            public function actualizarPSA($data = null){
                if($data != null){
                    $detalle =  $data["idDetalleConsulta"];
                    $examen =  $data["examenSolicitado"];
                    unset($data["idDetalleConsulta"]);
                    $sql = "UPDATE tbl_antigeno_prostatico SET examenSolicitado = ?, muestraAntigenoProstatico = ?, resultadoAntigenoProstatico = ?,
                            observacionAntigenoProstatico = ? WHERE idAntigenoProstatico = ? ";
                    if($this->db->query($sql, $data)){
                        $sql2 = "UPDATE tbl_detalle_consulta SET examenSolicitado = '$examen' WHERE idDetalleConsulta = '$detalle'";
                        if($this->db->query($sql2)){
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        // Fin examene psa


        // Datos para los examen hisopado nasal
            public function guardarHisopado($data = null){
                if($data != null){
                    $idConsulta = $data["consulta"];
                    $solicitado = $data["examenSolicitado"];
                    $f = $data["fechaCovid"];
                    $h = $data["horaCovid"];
                    unset($data["consulta"]);
                    unset($data["fechaCovid"]);
                    unset($data["horaCovid"]);

                    $sql = "INSERT INTO tbl_hisopado_nasal(examenSolicitado, pasaporteHisopadoNasal, resultadoHisopadoNasal) VALUES(?, ?, ?)";
                    if($this->db->query($sql, $data)){
                        $idExamen = $this->db->insert_id();
                        // $hora = date('h:i:s a', time());
                        $hora = $f." ".$h;
                        $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, examenSolicitado,
                                horaDetalleConsulta ) VALUES('$idConsulta', '$idExamen', '14', '$solicitado', '$hora')"; 
                        $this->db->query($sqlDC);
                        $idDetalleConsulta = $this->db->insert_id();
                        $datos = array('idHisopado' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                        return $datos;
                    }else{
                        return 0;
                    }
                }else{
                    return 0;
                }
            }

            public function actualizarHisopado($data = null){
                if($data != null){
                    $detalle =  $data["idDetalleConsulta"];
                    $examen =  $data["examenSolicitado"];
                    $fecha = $data["fechaCovid"]." ".$data["horaCovid"];
                    unset($data["idDetalleConsulta"]);
                    unset($data["examenSolicitado"]);
                    unset($data["fechaCovid"]);
                    unset($data["horaCovid"]);
                    $sql = "UPDATE tbl_hisopado_nasal SET pasaporteHisopadoNasal = ?, resultadoHisopadoNasal = ?
                            WHERE idHisopadoNasal = ? ";
                    if($this->db->query($sql, $data)){
                        $sql2 = "UPDATE tbl_detalle_consulta SET examenSolicitado = '$examen', horaDetalleConsulta = '$fecha' WHERE idDetalleConsulta = '$detalle'";
                        if($this->db->query($sql2)){
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        // Fin examen hisopado nasal

        // Datos para los examen de espermograma
            public function guardarEspermograma($data = null){
                if($data != null){
                    $idConsulta = $data["consulta"];
                    $solicitado = $data["examenSolicitado"];
                    unset($data["consulta"]);

                    $sql = "INSERT INTO tbl_espermograma(examenSolicitado, colorEspermograma, phEspermograma, volumenEspermograma, licuefaccionEspermograma,
                            viscocidadEspermograma, abstinenciaEspermograma, hematiesEspermograma, leucocitosEspermograma, epitelialesEspermograma,
                            bacteriasEspermograma, mprEspermograma, mplEspermograma, mnpEspermograma, inmovilesEspermograma, recuentoEspermograma,
                            normalesEspermograma, anormalCbEspermograma, anormalClEspermograma, vivosEspermograma, muertosEspermograma, observacionesEspermograma) 
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    if($this->db->query($sql, $data)){
                        $idExamen = $this->db->insert_id();
                        $hora = date('h:i:s a', time());
                        $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, examenSolicitado,
                                horaDetalleConsulta ) VALUES('$idConsulta', '$idExamen', '15', '$solicitado', '$hora')"; 
                        $this->db->query($sqlDC);
                        $idDetalleConsulta = $this->db->insert_id();
                        $datos = array('idEspermograma' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                        return $datos;
                    }else{
                        return 0;
                    }
                }else{
                    return 0;
                }
            }

            public function actualizarEspermograma($data = null){
                if($data != null){
                    $detalle =  $data["idDetalleConsulta"];
                    $examen =  $data["examenSolicitado"];
                    unset($data["idDetalleConsulta"]);
                    $sql = "UPDATE tbl_espermograma SET examenSolicitado = ?, colorEspermograma = ?, phEspermograma = ?, volumenEspermograma = ?,
                            licuefaccionEspermograma = ?, viscocidadEspermograma = ?, abstinenciaEspermograma = ?, hematiesEspermograma = ?,
                            leucocitosEspermograma = ?, epitelialesEspermograma = ?, bacteriasEspermograma = ?, mprEspermograma = ?,
                            mplEspermograma = ?, mnpEspermograma = ?, inmovilesEspermograma = ?, recuentoEspermograma = ?, normalesEspermograma = ?,
                            anormalCbEspermograma = ?, anormalClEspermograma = ?, vivosEspermograma = ?, muertosEspermograma = ?,
                            observacionesEspermograma = ? WHERE idEspermograma = ?";
                    if($this->db->query($sql, $data)){
                        $sql2 = "UPDATE tbl_detalle_consulta SET examenSolicitado = '$examen' WHERE idDetalleConsulta = '$detalle'";
                        if($this->db->query($sql2)){
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        // Fin examene de espermograma


        // Datos para los examen de creatinina
            public function guardarCreatinina($data = null){
                if($data != null){
                    $idConsulta = $data["consulta"];
                    $solicitado = $data["examenSolicitado"];
                    unset($data["consulta"]);

                    $sql = "INSERT INTO tbl_depuracion_creatinina(examenSolicitado, sexoDepuracion, edadDepuracion, volumenDepuracion, tiempoDepuracion, csDepuracion, coDepuracion, dcDepuracion, valorNormal, proteinasDepuracion, observacionesDepuracion) 
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    if($this->db->query($sql, $data)){
                        $idExamen = $this->db->insert_id();
                        $hora = date('h:i:s a', time());
                        $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, examenSolicitado,
                                horaDetalleConsulta ) VALUES('$idConsulta', '$idExamen', '16', '$solicitado', '$hora')"; 
                        $this->db->query($sqlDC);
                        $idDetalleConsulta = $this->db->insert_id();
                        $datos = array('idCreatinina' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                        return $datos;
                    }else{
                        return 0;
                    }
                }else{
                    return 0;
                }
            }

            public function actualizarCreatinina($data = null){
                if($data != null){
                    $detalle =  $data["idDetalleConsulta"];
                    unset($data["idDetalleConsulta"]);
                    unset($data["consulta"]);
                    $sql = "UPDATE tbl_depuracion_creatinina SET sexoDepuracion = ?, edadDepuracion = ?, volumenDepuracion = ?, tiempoDepuracion = ?, csDepuracion = ?, coDepuracion = ?, 
                             dcDepuracion = ?, valorNormal = ?, proteinasDepuracion = ?, observacionesDepuracion = ? WHERE idDepuracion = ?";
                    if($this->db->query($sql, $data)){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        // Fin examene de creatinina

        // Datos para los examen de gases arteriales
            public function guardarGasesArteriales($data = null){
                if($data != null){
                    $idConsulta = $data["consulta"];
                    $solicitado = $data["examenSolicitado"];
                    unset($data["consulta"]);

                    $sql = "INSERT INTO tbl_gases_arteriales(examenSolicitado, muestraGasesArteriales, phGasesArteriales, pco2GasesArteriales, po2GasesArteriales, naGasesArteriales, kGasesArteriales, caGasesArteriales, tbhGasesArteriales, soGasesArteriales, fioGasesArteriales) 
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    if($this->db->query($sql, $data)){
                        $idExamen = $this->db->insert_id();
                        $hora = date('h:i:s a', time());
                        $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, examenSolicitado,
                                horaDetalleConsulta ) VALUES('$idConsulta', '$idExamen', '17', '$solicitado', '$hora')"; 
                        $this->db->query($sqlDC);
                        $idDetalleConsulta = $this->db->insert_id();
                        $datos = array('idGasesArteriales' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                        return $datos;
                    }else{
                        return 0;
                    }
                }else{
                    return 0;
                }
            }

            public function actualizarGasesArteriales($data = null){
                if($data != null){
                    $detalle =  $data["idDetalleConsulta"];
                    unset($data["idDetalleConsulta"]);
                    unset($data["consulta"]);
                    $sql = "UPDATE tbl_gases_arteriales SET muestraGasesArteriales = ?, phGasesArteriales = ?, pco2GasesArteriales = ?, po2GasesArteriales = ?,
                            naGasesArteriales = ?, kGasesArteriales = ?, caGasesArteriales = ?, tbhGasesArteriales = ?, soGasesArteriales = ?, fioGasesArteriales = ?
                            WHERE idGasesArteriales = ?";
                    if($this->db->query($sql, $data)){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        // Fin examenes gases arteriales

        // Datos para los examen de gases arteriales
            public function guardarToleranciaGlucosa($data = null){
                if($data != null){
                    $idConsulta = $data["consulta"];
                    $solicitado = $data["examenSolicitado"];
                    unset($data["consulta"]);

                    $sql = "INSERT INTO tbl_tolerancia_glucosa(examenSolicitado, resultado1ToleranciaGlucosa, hora1ToleranciaGlucosa, resultado2ToleranciaGlucosa,
                                        hora2ToleranciaGlucosa, resultado3ToleranciaGlucosa, hora3ToleranciaGlucosa, resultado4ToleranciaGlucosa, hora4ToleranciaGlucosa, 
                                        observacionToleranciaGlucosa, parametroCarga) 
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
                    if($this->db->query($sql, $data)){
                        $idExamen = $this->db->insert_id();
                        $hora = date('h:i:s a', time());
                        $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, examenSolicitado,
                                horaDetalleConsulta ) VALUES('$idConsulta', '$idExamen', '18', '$solicitado', '$hora')"; 
                        $this->db->query($sqlDC);
                        $idDetalleConsulta = $this->db->insert_id();
                        $datos = array('idToleranciaGlucosa' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                        return $datos;
                    }else{
                        return 0;
                    }
                }else{
                    return 0;
                }
            }

            public function actualizarToleranciaGlucosa($data = null){
                if($data != null){
                    $detalle =  $data["idDetalleConsulta"];
                    unset($data["idDetalleConsulta"]);
                    unset($data["consulta"]);
                    $sql = "UPDATE tbl_tolerancia_glucosa SET resultado1ToleranciaGlucosa = ?, hora1ToleranciaGlucosa = ?, resultado2ToleranciaGlucosa = ?,
                            hora2ToleranciaGlucosa = ?, resultado3ToleranciaGlucosa = ?, hora3ToleranciaGlucosa = ?, resultado4ToleranciaGlucosa = ?,
                            hora4ToleranciaGlucosa = ?, observacionToleranciaGlucosa = ?
                            WHERE idToleranciaGlucosa = ?";
                    if($this->db->query($sql, $data)){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        // Fin examenes gases arteriales

        // Datos para los examen de gases arteriales
            public function guardarToxoplasma($data = null){
                if($data != null){
                    $idConsulta = $data["consulta"];
                    $solicitado = $data["examenSolicitado"];
                    unset($data["consulta"]);

                    $sql = "INSERT INTO tbl_toxoplasma(examenSolicitado, iggToxoplasma, igmToxoplasma, observacionesToxoplasma) 
                            VALUES(?, ?, ?, ?)";
                    if($this->db->query($sql, $data)){
                        $idExamen = $this->db->insert_id();
                        $hora = date('h:i:s a', time());
                        $sqlDC = "INSERT INTO tbl_detalle_consulta(idConsultaLaboratorio, idExamen, tipoExamen, examenSolicitado,
                                horaDetalleConsulta ) VALUES('$idConsulta', '$idExamen', '19', '$solicitado', '$hora')"; 
                        $this->db->query($sqlDC);
                        $idDetalleConsulta = $this->db->insert_id();
                        $datos = array('idToxoplasma' => $idExamen, 'idDetalleConsulta' => $idDetalleConsulta );
                        return $datos;
                    }else{
                        return 0;
                    }
                }else{
                    return 0;
                }
            }
            	
            
            public function actualizarToxoplasma($data = null){
                if($data != null){
                    $detalle =  $data["idDetalleConsulta"];
                    unset($data["idDetalleConsulta"]);
                    unset($data["consulta"]);
                    $sql = "UPDATE tbl_toxoplasma SET iggToxoplasma = ?, igmToxoplasma = ?, observacionesToxoplasma = ? WHERE idToxoplasma = ?";
                    if($this->db->query($sql, $data)){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
           
        // Fin examenes gases arteriales

        public function agregarNuevoExamen($name = null){
            if($name != null){
                $sql = "INSERT INTO tbl_medicamentos(nombreMedicamento, ocultarMedicamento) VALUES('$name', '1')";
                if($this->db->query($sql)){
                    $nuevoExamen = $this->db->insert_id();
                    return $nuevoExamen;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        } 
    
        public function obtenerConsultas($i, $f){
            $sql = "SELECT * FROM tbl_consulta_laboratorio as cl INNER JOIN tbl_pacientes AS p ON(cl.idPaciente = p.idPaciente) WHERE date(fechaConsultaLaboratorio) BETWEEN '$i' AND '$f' ";
            $datos = $this->db->query($sql);
            return $datos->result();
        } 

        public function obtenerDetalleConsultas($id){
            $sql = "SELECT idDetalleConsulta, examenes FROM tbl_detalle_consulta WHERE idConsultaLaboratorio = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function detalleExamenesRealizados($id){
            $sql = "SELECT exam.idExamen, med.nombreMedicamento, med.precioVMedicamento FROM tbl_examenes_realizados exam
                    INNER JOIN tbl_medicamentos as med ON(exam.idExamen = med.idMedicamento) WHERE exam.idConsulta = '$id'";
            $datos = $this->db->query($sql);
            return $datos->result();
        } 

    /* Fin metodos para gestion de procesos de laboratorio  */

    /* Metodos para Dashboard */
        public function examenesMes($i, $f){
            /* $sql = "SELECT m.nombreMedicamento, m.precioVMedicamento, dc.* FROM tbl_detalle_consulta AS dc INNER JOIN tbl_medicamentos AS m 
                    ON(dc.examenSolicitado = m.idMedicamento) WHERE dc.fechaDetalleConsulta BETWEEN '$i' AND '$f' "; */
            $sql = "SELECT m.idMedicamento, m.nombreMedicamento, m.precioVMedicamento, m.precioVMedicamento, exar.fechaExamenRealizado FROM tbl_examenes_realizados AS exar INNER JOIN tbl_medicamentos AS m ON(exar.idExamen = m.idMedicamento)
                    WHERE DATE(exar.fechaExamenRealizado) BETWEEN '$i' AND '$f'";

            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function obtenerFechas($f){
            /* $sql = "SELECT idConsultaLaboratorio, fechaConsultaLaboratorio as fechaConsulta FROM tbl_consulta_laboratorio 
                    WHERE fechaConsultaLaboratorio < '$f' ORDER BY fechaConsultaLaboratorio DESC LIMIT 30 "; */
                $sql = "SELECT DISTINCT(DATE(exar.fechaExamenRealizado)) as fechaConsulta FROM tbl_examenes_realizados AS exar
                WHERE DATE(exar.fechaExamenRealizado) < '$f' GROUP BY exar.fechaExamenRealizado ORDER BY exar.fechaExamenRealizado DESC LIMIT 30 ";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function examenesDiarios($f){
            /* $sql = "SELECT COUNT(idDetalleConsulta) as totalExamenes FROM tbl_detalle_consulta WHERE fechaDetalleConsulta LIKE '%$f%' "; */
            $sql = "SELECT  COUNT(idExamenRealizado) as totalExamenes  FROM tbl_examenes_realizados WHERE DATE(fechaExamenRealizado) = '$f'";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function examenesRealizados($i, $f){
            /* $sql = "SELECT COUNT(dc.examenSolicitado) as totalMes, m.nombreMedicamento, m.precioVMedicamento FROM tbl_detalle_consulta
                    AS dc INNER JOIN tbl_medicamentos AS m ON(dc.examenSolicitado = m.idMedicamento) WHERE dc.fechaDetalleConsulta 
                    BETWEEN '$i' AND '$f' GROUP BY dc.examenSolicitado "; */
            $sql = "SELECT COUNT(exar.idExamen) AS totalMes, m.nombreMedicamento, m.precioVMedicamento FROM tbl_examenes_realizados
                    AS exar INNER JOIN tbl_medicamentos AS m ON(exar.idExamen = m.idMedicamento) WHERE DATE(exar.fechaExamenRealizado) 
                    BETWEEN '$i' AND '$f' GROUP BY exar.idExamen";
            $datos = $this->db->query($sql);
            return $datos->result();
        }
    /* Fin metodos para Dashboard */


    // Metodos para gestion de inventario de laboratorio
        public function examenReactivo($id = null){
            $sql = "SELECT pr.*, m.nombreMedicamento, il.nombreInsumoLab FROM tbl_pivote_reactivos AS pr
                    INNER JOIN tbl_medicamentos AS m ON(pr.idExamen = m.idMedicamento)
                    INNER JOIN tbl_insumos_lab AS il ON(pr.idReactivo = il.idInsumoLab)
                    WHERE pr.idExamen = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function obtenerReactivo($id = null){
            $sql = "SELECT * FROM tbl_insumos_lab WHERE idInsumoLab = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function actualizarReactivos($stock, $insumo, $cantidad, $pivote, $tabla){
            $sql1 = "UPDATE tbl_insumos_lab SET stockInsumoLab = '$stock' WHERE idInsumoLab = '$insumo' ";
            $sql2 = "INSERT INTO tbl_uso_reactivos(idReactivo, cantidadReactivo, filaPivote, pivoteTabla) VALUES($insumo, $cantidad, $pivote, $tabla)";
            // if($this->db->query($sql1) && $this->db->query($sql2) ){
            if($this->db->query($sql2) ){
                return true;
            }else{
                return false;
            }
        }

        public function reintegroStock($pivote, $tabla){
            $sql = "SELECT * FROM tbl_uso_reactivos WHERE filaPivote = '$pivote' AND pivoteTabla = '$tabla' ";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function updateStock($stock, $reactivo){
            $sql = "UPDATE tbl_insumos_lab SET stockInsumoLab = '$stock' WHERE idInsumoLab = '$reactivo' ";
            $this->db->query($sql);
        }

        public function borrarUsoInsumo($pivote, $tabla){
            $sql = "DELETE FROM tbl_uso_reactivos WHERE filaPivote = '$pivote' AND pivoteTabla = '$tabla' ";
            $this->db->query($sql);
        }

        public function reactivosEnUSo(){
            $sql = "SELECT il.nombreInsumoLab, il.codigoInsumoLab, cr.*, DATEDIFF(NOW(), cr.fechaInicio) diasTranscurridos FROM tbl_control_reactivos AS cr
                    INNER JOIN tbl_insumos_lab AS il ON(cr.idIReactivo = il.idInsumoLab)
                    WHERE cr.estadoControlR = 1";
            $datos = $this->db->query($sql);
            return $datos->result();
        }
    // Fin metodos para gestion de inventario de laboratorio

    // Validando que se hayan subido a la nube los resultados
        public function marcarSubido($c = null){
            $sql = "UPDATE tbl_consulta_laboratorio as cl SET cl.online = 1 WHERE cl.idConsultaLaboratorio = '$c' ";
            if($this->db->query($sql)){
                return true;
            }else{  
                return false;
            }
        }
    // Validando que se hayan subido a la nube los resultados


    //Metodos para busqueda de resultados
        public function cabeceraBusqueda($id){
            $sql = "SELECT 
                    cl.idConsultaLaboratorio, p.idPaciente, p.nombrePaciente, p.edadPaciente, cl.codigoConsulta, cl.fechaConsulta, m.nombreMedico
                    FROM tbl_consulta_laboratorio AS cl
                    INNER JOIN tbl_pacientes AS p ON(p.idPaciente = cl.idPaciente)
                    INNER JOIN tbl_medicos AS m ON(m.idMedico = cl.idMedico)
                    WHERE cl.idPaciente = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }
        //Metodos para busqueda de resultados
        
        
        
        
        
        
        
        
        
        
        
        
        
    // Metodos nuevos para examenes
        
        public function pacienteConsulta($id = null){
            $sql = "SELECT * FROM tbl_consulta_laboratorio AS cl WHERE cl.idConsultaLaboratorio = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }
        
        public function historialHematologia($id = null){
            $sql = "SELECT * FROM tbl_hematologia AS h
                    INNER JOIN tbl_consulta_laboratorio AS cl ON(cl.idConsultaLaboratorio = h.idConsulta)
                    WHERE cl.idPaciente = '$id' AND h.pivoteCreado = 1 ORDER BY h.idHematologia DESC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function obtenerHematologia($id = null){
            $sql = "SELECT * FROM tbl_hematologia AS h WHERE idConsulta = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }
        public function hematologiaPDF($id = null){
            $sql = "SELECT * FROM tbl_hematologia AS h WHERE idHematologia = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function guardarHematologiaLab($data = null){
            if($data != null){
                $sql = "UPDATE tbl_hematologia SET 
                    examenSolicitado = ?, fechaExamen = ?, globulosRojos = ?, eritrosedimentacion = ?, globulosBlancos = ?, reticulositos = ?, hematocrito = ?, 
                    tpTrombolastina = ?, hemoglobina = ?, tSangramiento = ?, vlGMedio = ?, tCoagulacion = ?, hbGMedia = ?, tProtombina = ?, concHbGlobMed = ?, 
                    neutrofilos = ?, linfocitos = ?, eosinofilos = ?, basofilos = ?, monocitos = ?, plaquetas = ?, observacionesH = ?, pivoteCreado = 1 WHERE idHematologia = ?             ";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }

        }

        public function guardarQuimicaLab($data = null){
            if($data != null){
                $sql = "UPDATE tbl_quimica_sanguinea_lab SET 
                    nombreExamen = ?, fechaExamen = ?, glucosa = ?, fosfatasa = ?, glucosaPostPrand = ?, lipasa = ?, globulina = ?, 
                    amilasa = ?, trigliceridos = ?, indiceAG = ?, colesterol = ?, bilirrubinaD = ?, colesterolHDL = ?, bilirrubinaI = ?, 
                    colesterolLDL = ?, albumina = ?, acidoUrico = ?, fosforo = ?, creatinina = ?, cloro = ?, nitrogeno = ?, calcio = ?, 
                    proteinasT = ?, potasio = ?, bilirrubina = ?, sodio = ?, tgo = ?, magnesio = ?, tgp = ?, fosfatasaA = ?, 
                    observacionesQS = ?, pivoteCreado = '1' WHERE idQuimicaSanguinea = ?";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }

        }

        public function obtenerQuimicaSanguinea($id = null){
            $sql = "SELECT * FROM tbl_quimica_sanguinea_lab AS qs WHERE idConsulta = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function historialQuimica($id = null){
            $sql = "SELECT * FROM tbl_quimica_sanguinea_lab AS qs
                    INNER JOIN tbl_consulta_laboratorio AS cl ON(cl.idConsultaLaboratorio = qs.idConsulta)
                    WHERE cl.idPaciente = '$id' AND pivoteCreado = '1' ORDER BY qs.idQuimicaSanguinea DESC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function quimicaPDF($id = null){
            $sql = "SELECT * FROM tbl_quimica_sanguinea_lab AS qs WHERE qs.idQuimicaSanguinea = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        
        public function cabeceraPDF($id = null){
            $sql = "SELECT
                    cl.codigoConsulta, p.nombrePaciente, p.edadPaciente, cl.fechaConsulta, TIME(h.fechaHematologia) as hora, m.nombreMedico 
                    FROM tbl_hematologia AS h
                    INNER JOIN tbl_consulta_laboratorio AS cl ON(cl.idConsultaLaboratorio = h.idConsulta)
                    INNER JOIN tbl_pacientes AS p ON(p.idPaciente = cl.idPaciente)
                    INNER JOIN tbl_medicos AS m ON(m.idMedico = cl.idMedico)
                    WHERE h.idHematologia = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }


        public function cabeceraPDFQ($id = null){
            $sql = "SELECT
                    cl.codigoConsulta, p.nombrePaciente, p.edadPaciente, cl.fechaConsulta, TIME(qs.creadoQuimica) as hora, m.nombreMedico 
                    FROM tbl_quimica_sanguinea_lab AS qs
                    INNER JOIN tbl_consulta_laboratorio AS cl ON(cl.idConsultaLaboratorio = qs.idConsulta)
                    INNER JOIN tbl_pacientes AS p ON(p.idPaciente = cl.idPaciente)
                    INNER JOIN tbl_medicos AS m ON(m.idMedico = cl.idMedico)
                    WHERE qs.idQuimicaSanguinea = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function obtenerUrianalisis($id = null){
            $sql = "SELECT * FROM tbl_uruanalisis_lab AS u WHERE u.idConsulta = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function guardarUrianalisis($data = null){
            if($data != null){
                $sql = "UPDATE tbl_uruanalisis_lab SET 
                        nombreExamen = ?, fechaExamen = ?, color = ?, aspecto = ?, reaccion = ?, densidad = ?, ph = ?, glucosa = ?, 
                        proteinas = ?, pigmentosB = ?, sangreO = ?, nitritos = ?, cuerposC = ?, acidosBiliares = ?, granulosos = ?, 
                        cilindrosL = ?, cilindrosH = ?, otrosCilindros = ?, leucositos = ?, hematies = ?, celulasE = ?, elementosM = ?,
                        bacterias = ?, levadura = ?, otrosUno = ?, otrosDos = ?, observacionesU = ?,pivoteCreado = '1' WHERE idUrianalisis  = ?";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }

        }

        public function historialUrianalisis($id = null){
            $sql = "SELECT * FROM tbl_uruanalisis_lab AS u
                    INNER JOIN tbl_consulta_laboratorio AS cl ON(cl.idConsultaLaboratorio = u.idConsulta)
                    WHERE cl.idPaciente = '$id' AND pivoteCreado = '1' ORDER BY u.idUrianalisis DESC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function cabeceraPDFU($id = null){
            $sql = "SELECT
                    cl.codigoConsulta, p.nombrePaciente, p.edadPaciente, cl.fechaConsulta, TIME(u.creadoUrianalisis) as hora, m.nombreMedico 
                    FROM tbl_uruanalisis_lab AS u
                    INNER JOIN tbl_consulta_laboratorio AS cl ON(cl.idConsultaLaboratorio = u.idConsulta)
                    INNER JOIN tbl_pacientes AS p ON(p.idPaciente = cl.idPaciente)
                    INNER JOIN tbl_medicos AS m ON(m.idMedico = cl.idMedico)
                    WHERE u.idUrianalisis = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function urianalisisPDF($id = null){
            $sql = "SELECT * FROM tbl_uruanalisis_lab AS u WHERE u.idUrianalisis = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function obtenerCoprologia($id = null){
            $sql = "SELECT * FROM tbl_coprologia_lab AS c WHERE c.idConsulta = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function guardarCoprologia($data = null){
            if($data != null){
                $sql = "UPDATE tbl_coprologia_lab SET 
                        nombreExamen = ?, fechaExamen = ?, color = ?, consistencia = ?, mucus = ?, hematies = ?,
                        leucocitos = ?, bacterias = ?, levaduras = ?, restosAM = ?, otrosUno = ?, otrosDos = ?, histolyticaT = ?,
                        histolyticaQ = ?, ascarisH = ?, ascarisL = ?, coliT = ?, coliQ = ?, trinchiuraH = ?, trinchiuraL = ?,
                        nanaT = ?, nanaQ = ?, guodH = ?, guodL = ?, mesniliT = ?, mesniliQ = ?, vermicH = ?, vermicL = ?,
                        lambiaT = ?, lambiaQ = ?, stercoH = ?, stercoL = ?, hominisT = ?, hominisQ = ?, hymenolepisH = ?,
                        hymenolepisL = ?, balantidiumT = ?, balantidiumQ = ?, taeniasH = ?, taeniasL = ?, blastocystisT = ?,
                        blastocystisQ = ?, otrosH = ?, otrosL = ?, observacionesC = ?, pivoteCreado = '1'
                        WHERE idCoprologia = ?";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }

        }

        public function historialCoprologia($id = null){
            $sql = "SELECT * FROM tbl_coprologia_lab AS c
                    INNER JOIN tbl_consulta_laboratorio AS cl ON(cl.idConsultaLaboratorio = c.idConsulta)
                    WHERE cl.idPaciente = '$id' AND pivoteCreado = '1' ORDER BY c.idCoprologia DESC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function cabeceraPDFC($id = null){
            $sql = "SELECT
                    cl.codigoConsulta, p.nombrePaciente, p.edadPaciente, cl.fechaConsulta, TIME(c.creadoCoprologia) as hora, m.nombreMedico 
                    FROM tbl_coprologia_lab AS c
                    INNER JOIN tbl_consulta_laboratorio AS cl ON(cl.idConsultaLaboratorio = c.idConsulta)
                    INNER JOIN tbl_pacientes AS p ON(p.idPaciente = cl.idPaciente)
                    INNER JOIN tbl_medicos AS m ON(m.idMedico = cl.idMedico)
                    WHERE c.idCoprologia = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function coprologiaPDF($id = null){
            $sql = "SELECT * FROM tbl_coprologia_lab AS c WHERE c.idCoprologia = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function obtenerVarios($id = null){
            $sql = "SELECT * FROM tbl_varios_lab AS vl WHERE vl.idConsulta = '$id' AND vl.idVarios = (SELECT MAX(idVarios) FROM tbl_varios_lab) ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function guardarVariosLab($data = null){
            if($data != null){
                $sql = "UPDATE tbl_varios_lab SET 
                       fechaExamen = ?, encabezadoVarios = ?, nombreExamen = ?,  detalleVarios = ?, pivoteCreado = '1' WHERE idVarios = ?";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }

        }

        
        public function historialVarios($id = null){
            $sql = "SELECT * FROM tbl_varios_lab AS vl
                    INNER JOIN tbl_consulta_laboratorio AS cl ON(cl.idConsultaLaboratorio = vl.idConsulta)
                    WHERE cl.idPaciente = '$id' AND vl.pivoteCreado = '1' ORDER BY vl.idVarios DESC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }


        public function nuevoVariosLab($data = null){
            if($data != null){
                $sql = "INSERT INTO tbl_varios_lab(idConsulta) VALUES(?)";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        
        public function cabeceraPDFV($id = null){
            $sql = "SELECT
                    cl.codigoConsulta, p.nombrePaciente, p.edadPaciente, cl.fechaConsulta, TIME(vl.creadoVarios) as hora, m.nombreMedico 
                    FROM tbl_varios_lab AS vl
                    INNER JOIN tbl_consulta_laboratorio AS cl ON(cl.idConsultaLaboratorio = vl.idConsulta)
                    INNER JOIN tbl_pacientes AS p ON(p.idPaciente = cl.idPaciente)
                    INNER JOIN tbl_medicos AS m ON(m.idMedico = cl.idMedico)
                    WHERE vl.idVarios = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function variosPDF($id = null){
            $sql = "SELECT * FROM tbl_varios_Lab AS v WHERE v.idVarios = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function obtenerBosquejos(){
            $sql = "SELECT * FROM tbl_bosquejos ORDER BY idBosquejo ASC ";
            $datos = $this->db->query($sql);
            return $datos->result();
        }


        public function guardarBosquejo($data = null){
            if($data != null){
                $sql = "INSERT INTO tbl_bosquejos(encabezadoBosquejo, examenBosquejo, detalleBosquejo ) VALUES(?, ?, ?)";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    // Metodos nuevos para examenes
}
?>




