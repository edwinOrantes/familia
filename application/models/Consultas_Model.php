<?php
class Consultas_Model extends CI_Model {
    // Metodos para extraer lista de pacientes por atender
        public function consultasPendientesHoy($fecha = null){
            $sql = "SELECT m.nombreMedico, p.*, c.*, TIME(c.creadaConsulta) AS hora FROM tbl_consultas AS c 
                    INNER JOIN tbl_medicos AS m ON(m.idMedico = c.idMedico)
                    INNER JOIN tbl_pacientes AS p ON(p.idPaciente = c.idConsulta)
                    WHERE DATE(c.fechaConsulta) = '$fecha'
                    ORDER BY c.idConsulta ASC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }
    
}
?>

