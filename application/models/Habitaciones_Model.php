<?php
class Habitaciones_Model extends CI_Model {

    public function obtenerHabitaciones(){
        $sql = "SELECT * FROM tbl_habitacion WHERE estadoHabitacion = '1'";
        $datos = $this->db->query($sql);
        return $datos->result();
    }

    // Guardar un paciente
    public function guardarHabitacion($data = null){
        if ($data != null) {
            $sql = "INSERT INTO tbl_habitacion(numeroHabitacion) VALUES(?)";
            if ($this->db->query($sql, $data)) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function actualizarHabitacion($data = null){
        if($data != null){
            $sql = "UPDATE tbl_habitacion SET numeroHabitacion = ? WHERE idHabitacion = ?";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }
    }


    public function eliminarHabitacion($data = null){
        if($data != null){
            $sql = "UPDATE tbl_habitacion SET estadoHabitacion = '0' WHERE idHabitacion = ?";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }
    }

}
?>