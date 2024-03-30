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

