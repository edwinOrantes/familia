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
                        c.altura, c.imc, c.temperaturaPaciente, c.presionPaciente, c.fechaConsulta 
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

        public function detalleConsulta($c = null){
            if($c != null){
                $sql = "SELECT * FROM tbl_dconsulta_medica AS cm WHERE cm.idConsulta = '$c' ";
                $datos = $this->db->query($sql);
                return $datos->row();
            }
        }

        public function guardarDetalleConsulta($data = null){
            $sql = "UPDATE tbl_dconsulta_medica SET consultaPor = ?, presenteEnfermedad = ?, evolucionEnfermedad = ?, paConsulta = ?, fcConsulta = ?, 
                    tempConsulta = ?, frConsulta = ?, diagnosticoUno = ?, diagnosticoDos = ?, diagnosticoTres = ?, diagnosticoConsulta = ?, planConsulta = ?
                    WHERE idDetalleConsulta = ?";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
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
    
}
?>

