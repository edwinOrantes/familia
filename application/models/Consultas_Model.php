<?php
class Consultas_Model extends CI_Model {
    // Metodos para extraer lista de pacientes por atender
        public function consultasPendientesHoy($fecha = null){
            $sql = "SELECT m.nombreMedico, p.*, c.*, TIME(c.creadaConsulta) AS hora FROM tbl_consultas AS c 
                    INNER JOIN tbl_medicos AS m ON(m.idMedico = c.idMedico)
                    INNER JOIN tbl_pacientes AS p ON(p.idPaciente = c.idPaciente)
                    WHERE DATE(c.fechaConsulta) = '$fecha' AND c.estadoConsulta = '1'
                    ORDER BY c.idConsulta ASC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function cabeceraConsulta($consulta = null){
            if($consulta != null){
                $sql = "SELECT r.nombreResponsable, r.parentescoResponsable, r.duiResponsable, r.telefonoResponsable, p.*, c.idConsulta, c.peso, 
                        c.altura, c.imc, c.temperaturaPaciente, c.presionPaciente, c.fechaConsulta, c.idMedico
                        FROM tbl_consultas AS c 
                        INNER JOIN tbl_pacientes AS p ON(p.idPaciente = c.idPaciente)
                        INNER JOIN tbl_responsables AS r ON(r.idMenor = p.idPaciente)
                        WHERE c.idConsulta = '$consulta' ";
                $datos = $this->db->query($sql);
                return $datos->row();
            }
        }

        public function obtenerIdPaciente($consulta = null){
            if($consulta != null){
                $sql = "SELECT c.idPaciente FROM tbl_consultas AS c WHERE c.idConsulta = '$consulta' ";
                $datos = $this->db->query($sql);
                return $datos->row();
            }
        }

        public function historialMedidas($paciente = null){
            if($paciente != null){
                $sql = "SELECT 
                        c.peso, c.altura, c.imc, c.temperaturaPaciente, c.presionPaciente, c.fechaConsulta
                        FROM tbl_consultas AS c WHERE c.idPaciente = '$paciente' 
                        ORDER BY date(c.fechaConsulta) ASC";
                $datos = $this->db->query($sql);
                return $datos->result();
            }
        }

        public function buscarDiagnostico($str = null){
            if($str != null){
                $sql = "SELECT dc.idDiagnostico, dc.codigoDiagnostico, dc.nombreDiagnostico 
                        FROM tbl_diagnosticos_cie AS dc
                        WHERE dc.nombreDiagnostico LIKE '%$str%'";
                $datos = $this->db->query($sql);
                return $datos->result();
            }
        }

        public function buscarMedicamento($str = null){
            if($str != null){
                $sql = "SELECT m.nombreMedicamento FROM tbl_medicamentos AS m
                        WHERE m.nombreMedicamento LIKE '%$str%'
                        AND m.pivoteMedicamento = 0";
                $datos = $this->db->query($sql);
                return $datos->result();
            }
        }

        public function buscarIndicaciones($str = null){
            if($str != null){
                $sql = "SELECT dh.detalleHorario FROM tbl_horario_medicina AS dh 
                        WHERE dh.detalleHorario LIKE '%$str%'";
                $datos = $this->db->query($sql);
                return $datos->result();
            }
        }

        public function buscarCantidades($str = null){
            if($str != null){
                $sql = "SELECT cm.detalleCantidad FROM tbl_cantidad_medicamentos AS cm 
                        WHERE cm.detalleCantidad LIKE '%$str%'";
                $datos = $this->db->query($sql);
                return $datos->result();
            }
        }

        public function buscarIndicacionExtra($str = null){
            if($str != null){
                $sql = "SELECT ie.detalleIndicacionExtra FROM tbl_indicacion_extra AS ie 
                        WHERE ie.detalleIndicacionExtra LIKE '%$str%'";
                $datos = $this->db->query($sql);
                return $datos->result();
            }
        }

        public function detalleConsulta($c = null){
            if($c != null){
                $sql = "SELECT * FROM tbl_dconsulta_medica AS cm WHERE cm.idConsulta = '$c' ";
                $datos = $this->db->query($sql);
                return $datos->row();
            }
        }
        
        public function detalleConsultaR($c = null){
            if($c != null){
                $sql = "SELECT * FROM tbl_dconsulta_medica AS cm WHERE cm.idConsulta = '$c' ";
                $datos = $this->db->query($sql);
                return $datos->result();
            }
        }

        public function recetaHoy($fecha = null, $paciente = null){
                $sql = "SELECT * FROM tbl_receta_medica AS rm WHERE rm.fechaReceta = '$fecha' 
                        AND rm.idPaciente = '$paciente' AND rm.idReceta = (SELECT MAX(idReceta) 
                        FROM tbl_receta_medica WHERE idPaciente = '$paciente') ";
                $datos = $this->db->query($sql);
                return $datos->row();
        }


        public function guardarDetalleConsulta($data = null){
            $sql = "UPDATE tbl_dconsulta_medica SET consultaPor = ?, presenteEnfermedad = ?, evolucionEnfermedad = ?, paConsulta = ?, fcConsulta = ?, 
                    tempConsulta = ?, frConsulta = ?, satConsulta = ?, examenFisico = ?, diagnosticoUno = ?, diagnosticoDos = ?, diagnosticoTres = ?,
                    diagnosticoConsulta = ?, planConsulta = ?
                    WHERE idDetalleConsulta = ?";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }

        public function antecedentesConsulta($p = null){
            if($p != null){
                $sql = "SELECT * FROM tbl_antecedentes_consulta AS ac WHERE ac.idPaciente = '$p' ";
                $datos = $this->db->query($sql);
                return $datos->row();
            }
        }

        public function guardarAntecedentesConsulta($data = null){
            $sql = "UPDATE tbl_antecedentes_consulta SET antecedentesMedicos = ?, antecedentesQuirurgicos = ?, antecedentesAlergias = ?,
                    antecedentesPartos = ?, antecedentesIngresos = ?, antecedentesOtros  = ?
                    WHERE idAntecedentes  = ?";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }

        public function guardarDetalleHorario($data = null){
            if($data != null){
                $sql = "INSERT INTO tbl_horario_medicina(detalleHorario) VALUES(?)";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function guardarCantidadMedicamento($data = null){
            if($data != null){
                $sql = "INSERT INTO tbl_cantidad_medicamentos(detalleCantidad) VALUES(?)";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function guardarindicacionExtra($data = null){
            if($data != null){
                $sql = "INSERT INTO tbl_indicacion_extra(detalleIndicacionExtra) VALUES(?)";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        
        public function historialDetallesConsultas($p = null){
            if($p != null){
                $sql = "SELECT * FROM tbl_dconsulta_medica AS dcm 
                        INNER JOIN tbl_consultas AS c ON(c.idConsulta = dcm.idConsulta)
                        WHERE c.idPaciente = '$p' ORDER BY c.idConsulta DESC";
                $datos = $this->db->query($sql);
                return $datos->result();
            }
        }

   


        public function consultasPorPaciente($id = null){
            $sql = "SELECT m.nombreMedico, p.*, c.*, TIME(c.creadaConsulta) AS hora FROM tbl_consultas AS c 
                    INNER JOIN tbl_medicos AS m ON(m.idMedico = c.idMedico)
                    INNER JOIN tbl_pacientes AS p ON(p.idPaciente = c.idConsulta)
                    WHERE p.idPaciente = '$id'
                    ORDER BY c.idConsulta ASC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function consultaARealizar($c = null, $i = null, $f = null){
            $sql = "SELECT 
                m.nombreMedicamento
                FROM tbl_hoja_insumos AS hi
                INNER JOIN tbl_consultas AS c ON(c.hojaCobro = hi.idHoja)
                INNER JOIN tbl_medicamentos AS m ON(m.idMedicamento = hi.idInsumo)
                WHERE c.idConsulta = '$c' AND m.pivoteMedicamento BETWEEN '$i' AND '$f' ";
            $datos = $this->db->query($sql);
            return $datos->result();
        }


        public function saldarConsulta($id = null){
            $sql = "UPDATE tbl_consultas SET estadoConsulta = '0' WHERE hojaCobro = '$id' ";
            if($this->db->query($sql)){
                return true;
            }else{
                return false;
            }
        }

        // Recetas medicas
            public function guardarRecetaMedica($data = null, $idReceta = null){
                if($data != null){
                    $bool = false;
                    $sql = "INSERT INTO tbl_receta_medica(fechaReceta, proximaReceta, idConsulta, indicacionLibre, idPaciente, htmlReceta, medicamentosReceta)
                            VALUES(?, ?, ?, ?, ?, ?, ?)";

                    $sqlU = "UPDATE tbl_receta_medica SET fechaReceta = ?, proximaReceta = ?, idConsulta = ?, indicacionLibre = ?, 
                            idPaciente = ?, htmlReceta = ?, medicamentosReceta = ? WHERE idReceta = '$idReceta' ";
                    if($idReceta == 0){
                        $bool = $this->db->query($sql, $data);
                    }else{
                        $bool = $this->db->query($sqlU, $data);
                    }

                    if($bool){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }

            public function recetasMedicas($p = null){
                // $sql = "SELECT * FROM tbl_receta_medica AS rm WHERE rm.idPaciente =  '$p' ORDER BY rm.idReceta DESC ";
                $sql = "SELECT m.nombreMedico, rm.* FROM tbl_receta_medica AS rm 
                        INNER JOIN tbl_consultas AS c ON(c.idConsulta = rm.idConsulta)
                        INNER JOIN tbl_medicos AS m ON(m.idMedico = c.idMedico)
                        WHERE rm.idPaciente =  '$p' ORDER BY rm.idReceta DESC";
                $datos = $this->db->query($sql);
                return $datos->result();
            }

            public function cantidadConsultasMedico($m = null){
                $sql = "SELECT m.cantidadConsultas FROM tbl_medicos AS m WHERE m.idMedico = '$m' ";
                $datos = $this->db->query($sql);
                return $datos->row();
            }

            public function validarFecha($data = null){
                if($data != null){
                    $sql = "SELECT COALESCE(COUNT(c.idConsulta), 0) AS consultas FROM tbl_consultas AS c WHERE c.fechaConsulta = ? AND c.idMedico = ? ";
                    $datos = $this->db->query($sql, $data);
                    return $datos->row();
                }
            }

            public function detalleReceta($r = null){
                if($r != null){
                    $sql = "SELECT p.nombrePaciente, p.edadPaciente, m.nombreMedico, c.peso, c.altura, c.imc, c.temperaturaPaciente, c.presionPaciente, 
                            rm.* FROM tbl_receta_medica AS rm 
                            INNER JOIN tbl_consultas AS c ON(c.idConsulta = rm.idConsulta)
                            INNER JOIN tbl_pacientes AS p ON(p.idPaciente = c.idPaciente)
                            INNER JOIN tbl_medicos AS m ON(m.idMedico = c.idMedico)
                            WHERE rm.idReceta = '$r' ";
                    $datos = $this->db->query($sql);
                    return $datos->row();
                }
            }
        // Recetas medicas


        // Examenes de laboratorio
            public function fechasVisitas($id = null){
                $sql = "SELECT DISTINCT(cl.fechaConsulta) AS fecha FROM tbl_consulta_laboratorio AS cl
                        WHERE cl.idPaciente = '$id' ";
                $datos = $this->db->query($sql);
                return $datos->result();
            }
        // Examenes de laboratorio

    
}
?>