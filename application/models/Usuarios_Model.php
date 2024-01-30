<?php
class Usuarios_Model extends CI_Model {
    
    public function obtenerEmpleados(){
        $sql = "SELECT * FROM tbl_empleados";
        $datos = $this->db->query($sql);
        return $datos->result();
    }

    // Para los anuncions
    public function obtenerAnuncios(){
        $sql = "SELECT * FROM tbl_anuncios WHERE estadoAnuncio = 1";
        $datos = $this->db->query($sql);
        return $datos->result();
    }

    public function obtenerAccesos(){
        $sql = "SELECT * FROM tbl_accesos";
        $datos = $this->db->query($sql);
        return $datos->result();
    }
    
    public function obtenerUsuarios(){
        $sql = "SELECT e.nombreEmpleado, e.apellidoEmpleado, u.*, a.nombreAcceso FROM tbl_usuarios as u INNER JOIN tbl_empleados as e ON(u.idEmpleado = e.idEmpleado)
                INNER JOIN tbl_accesos as a ON(u.idAcceso = a.idAcceso) WHERE u.estadoUsuario = '1'";
        $datos = $this->db->query($sql);
        return $datos->result();
    }

    public function guardarUsuario($data = null){
        if($data != null){
            $sql = "INSERT INTO tbl_usuarios(nombreUsuario, psUsuario, idEmpleado, idAcceso) VALUES(?, ?, ?, ?)";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }else{
            return null;
        }
    }

    public function actualizarUsuario($data = null){
        if($data != null){

            if($data["psUsuario"] == ""){
                unset($data["psUsuario"]);
                $sql = "UPDATE tbl_usuarios SET nombreUsuario = ?, idEmpleado = ?, idAcceso= ? WHERE idUsuario = ? ";
            }else{
                $sql = "UPDATE tbl_usuarios SET nombreUsuario = ?, psUsuario = ?, idEmpleado = ?, idAcceso= ? WHERE idUsuario = ? ";
            }
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }else{
            return null;
        }
    }

    public function eliminarUsuario($data = null){
        if($data != null){
            $sql = "DELETE FROM tbl_usuarios WHERE idUsuario = ? ";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }else{
            return null;
        }
    }

    public function validarUsuario($data = null){
		if ($data != null){
			$sql = "SELECT u.idUsuario, u.nombreUsuario, u.psUsuario, u.idAcceso, u.codigoVerificacion, u.nivelUsuario, e.idEmpleado, e.nombreEmpleado, e.apellidoEmpleado,
                    a.nombreAcceso, e.nacimientoEmpleado FROM tbl_usuarios as u INNER JOIN tbl_empleados as e ON(u.idEmpleado = e.idEmpleado) INNER JOIN 
                    tbl_accesos AS a ON(u.idAcceso = a.idAcceso)  WHERE nombreUsuario = ? AND psUsuario = ? AND u.estadoUsuario = '1' ";
			$datos = $this->db->query($sql, $data);
			if ($datos->num_rows() > 0){
				return array("estado" => 1, "datos" => $datos->row());
			}else{
                return array("estado" => 0);
            }
		}else{
            return array("estado" => 0);
        }

	}

    public function insertarBitacora($data = null){
        if($data != null){
            $sql = "INSERT INTO tbl_bitacora(idUsuario, descripcionBitacora) VALUES(?, ?)";
            if($this->db->query($sql, $data)){
                return true;
            }
        }else{
            return false;
        }
    }

    public function insertarMovimientoHoja($data = null){
        if($data != null){
            $sql = "INSERT INTO tbl_movimientos_hoja(idHoja, idUsuario, nombreUsuario, detalleBitacora) VALUES(?, ?, ?, ?)";
            if($this->db->query($sql, $data)){
                return true;
            }
        }else{
            return false;
        }
    }

    public function nombreMedicamento($id){
        $sql = "SELECT nombreMedicamento as nombre FROM tbl_medicamentos WHERE idMedicamento = '$id' ";
        $datos = $this->db->query($sql);
        return $datos->row();
    }

    public function nombreExterno($id){
        $sql = "SELECT nombreExterno as nombre FROM tbl_externos WHERE idExterno = '$id' ";
        $datos = $this->db->query($sql);
        return $datos->row();
    }

    public function datosExterno($id){
        $sql = "SELECT e.nombreExterno, he.idHoja, he.precioExterno FROM tbl_hoja_externos AS he INNER JOIN tbl_externos AS e ON(he.idExterno = e.idExterno) WHERE he.idHojaExterno = '$id' ";
        $datos = $this->db->query($sql);
        return $datos->row();
    }

    

    // Metodos para el Dashboard

        public function obtenerHojas($i, $f){
            /* $anio = date("Y");
            $mes = date("m");
            $i = $anio."-".$mes."-01";
            $f = $anio."-".$mes."-31"; */
            //$i = "2021-12-01";
            //$f = "2021-12-31";
            $flagC = 0;
            $primer = 0;
            $ultimo = 0;

            $sql = "SELECT * FROM tbl_externos_generados WHERE DATE(fechaGenerado) BETWEEN '$i' AND '$f' ";
            $datos = $this->db->query($sql);
            $respuesta = $datos->result();

            foreach ($respuesta as $fila) {
                $flagC++;
                if($flagC == 1 ){
                    $primer = $fila->inicioExternoGenerado;
                }
                $ultimo = $fila->finExternoGenerado;
            }
            
            
            $sql2 = "SELECT * FROM tbl_hoja_cobro WHERE correlativoSalidaHoja BETWEEN '$primer' AND '$ultimo' ORDER BY correlativoSalidaHoja ASC ";
            $hojas = $this->db->query($sql2);
            return $hojas->result();
        
        }
        
        public function topMedicos($i, $f){
            $sql = "SELECT COUNT(hc.idMedico) as totalMedico, hc.idHoja, hc.idMedico, m.* FROM tbl_hoja_cobro AS hc inner JOIN tbl_medicos AS m
                ON(hc.idMedico = m.idMedico) WHERE hc.correlativoSalidaHoja > 0 AND hc.anulada = 0 AND hc.salidaHoja BETWEEN '$i' AND '$f'
                GROUP BY hc.idMedico ORDER BY COUNT(hc.idMedico) DESC LIMIT 5";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function obtenerHojasMedico($i, $f, $m){
            $sql = "SELECT hc.idHoja, hc.fechaHoja, hc.tipoHoja, hc.totalHoja, hc.fechaIngresoHoja, hc.estadoHoja, hc.anulada, p.nombrePaciente,
                    m.nombreMedico, m.idMedico, h.idHabitacion, h.numeroHabitacion FROM tbl_hoja_cobro as hc INNER JOIN tbl_pacientes as p on(hc.idPaciente = p.idPaciente)
                    INNER JOIN tbl_medicos as m on(hc.idMedico = m.idMedico) INNER JOIN tbl_habitacion as h on(hc.idHabitacion = h.idHabitacion)
                    WHERE hc.salidaHoja BETWEEN '$i' AND '$f' AND hc.idMedico = $m AND hc.correlativoSalidaHoja > 0 ORDER BY hc.fechaHoja DESC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function topMedicamentos($i, $f){
            /* $sql = "SELECT m.nombreMedicamento, COUNT(hi.idInsumo) as vecesOcupada, SUM(hi.cantidadInsumo) AS totalUsadas, hi.* FROM 
                    tbl_hoja_insumos as hi INNER JOIN tbl_medicamentos as m ON(hi.idInsumo = m.idMedicamento) INNER JOIN tbl_hoja_cobro AS hc
                    ON(hi.idHoja = hc.idHoja) WHERE hc.correlativoSalidaHoja> 0 AND hc.anulada = 0 AND hc.salidaHoja BETWEEN '$i' AND '$f' GROUP BY hi.idInsumo 
                    ORDER BY SUM(hi.cantidadInsumo) DESC LIMIT 5 "; */
            $sql = "SELECT m.nombreMedicamento, COUNT(hi.idInsumo) as vecesOcupada, SUM(hi.cantidadInsumo) AS totalUsadas, hi.*, m.tipoMedicamento FROM 
                    tbl_hoja_insumos as hi INNER JOIN tbl_medicamentos as m ON(hi.idInsumo = m.idMedicamento) INNER JOIN tbl_hoja_cobro AS hc
                    ON(hi.idHoja = hc.idHoja) WHERE m.tipoMedicamento = 'Medicamentos' AND hc.correlativoSalidaHoja > 0 AND hc.anulada = 0 AND hc.salidaHoja BETWEEN '$i' AND '$f' GROUP BY hi.idInsumo 
                    ORDER BY SUM(hi.cantidadInsumo) DESC LIMIT 5";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function fechasGraficas($f){
            $sql = "SELECT COUNT(salidaHoja) as hojas, salidaHoja FROM tbl_hoja_cobro WHERE salidaHoja <= '$f' AND salidaHoja != ''
                    GROUP BY salidaHoja ORDER BY salidaHoja DESC LIMIT 31 ";
            $datos = $this->db->query($sql);
            return $datos->result();   
        }

        public function externosHoja($fecha = null){
            if($fecha != null){
                $sql ="SELECT hc.salidaHoja, e.idExterno, e.nombreExterno, he.idHojaExterno, he.idHoja, he.cantidadExterno, he.precioExterno,
                    he.fechaExterno FROM tbl_hoja_externos as he INNER JOIN tbl_externos as e ON(he.idExterno = e.idExterno) INNER JOIN tbl_hoja_cobro 
                    as hc ON(he.idHoja = hc.idHoja) WHERE hc.salidaHoja = '$fecha' AND hc.anulada = 0 ";
                $datos = $this->db->query($sql, $fecha);
                return $datos->result();
            }
        }

        public function medicamentosHoja($fecha = null){
            if($fecha != null){
                $sql = "SELECT hc.salidaHoja, hi.idHojaInsumo, m.nombreMedicamento, hi.precioInsumo, hi.cantidadInsumo, hi.fechaInsumo
                        FROM tbl_hoja_insumos as hi INNER JOIN tbl_medicamentos as m ON(hi.idInsumo = m.idMedicamento)
                        INNER JOIN tbl_hoja_cobro as hc ON(hi.idHoja = hc.idHoja) WHERE hc.salidaHoja = '$fecha' AND correlativoSalidaHoja > 0  AND hc.anulada = 0 ";
                $datos = $this->db->query($sql, $fecha);
                return $datos->result();
            }
        }

        /* public function medicamentosHoja($fecha = null){
            if($fecha != null){
                $sqlprev = "SELECT * FROM tbl_externos_generados WHERE fechaGenerado = '$fecha' ";
                $rangos = $this->db->query($sqlprev)->row();
                $inicio = $rangos->inicioExternoGenerado;
                $fin = $rangos->finExternoGenerado;
                $sql = "SELECT hc.salidaHoja, hi.idHojaInsumo, m.nombreMedicamento, hi.precioInsumo, hi.cantidadInsumo, hi.fechaInsumo
                        FROM tbl_hoja_insumos as hi INNER JOIN tbl_medicamentos as m ON(hi.idInsumo = m.idMedicamento)
                        INNER JOIN tbl_hoja_cobro as hc ON(hi.idHoja = hc.idHoja) WHERE hc.correlativoSalidaHoja BETWEEN '$inicio' AND '$fin' ";
                $datos = $this->db->query($sql, $fecha);
                return $datos->result();
            }
        } */

        public function externosMes($i, $f){
                $sql ="SELECT hc.salidaHoja, e.idExterno, e.nombreExterno, he.idHojaExterno, he.idHoja, he.cantidadExterno, he.precioExterno,
                he.fechaExterno FROM tbl_hoja_externos as he INNER JOIN tbl_externos as e ON(he.idExterno = e.idExterno) INNER JOIN
                tbl_hoja_cobro as hc ON(he.idHoja = hc.idHoja) WHERE hc.salidaHoja BETWEEN '$i' AND '$f' AND correlativoSalidaHoja > 0 AND hc.anulada = 0 ";
                $datos = $this->db->query($sql);
                return $datos->result();
        }

        public function medicamentosMes($i, $f){
                $sql = "SELECT hc.salidaHoja, hi.idHojaInsumo, m.nombreMedicamento, hi.precioInsumo, hi.cantidadInsumo, hi.fechaInsumo
                FROM tbl_hoja_insumos as hi INNER JOIN tbl_medicamentos as m ON(hi.idInsumo = m.idMedicamento) INNER JOIN tbl_hoja_cobro as
                hc ON(hi.idHoja = hc.idHoja) WHERE hc.salidaHoja BETWEEN '$i' AND '$f' AND correlativoSalidaHoja > 0 AND hc.anulada = 0";
                $datos = $this->db->query($sql);
                return $datos->result();
        }

        // Externos y medicamentos, por recibo de cobro
            public function externosHoja2($i){
                $sql ="SELECT hc.salidaHoja, e.idExterno, e.nombreExterno, he.idHojaExterno, he.idHoja, he.cantidadExterno, he.precioExterno,
                    he.fechaExterno FROM tbl_hoja_externos as he INNER JOIN tbl_externos as e ON(he.idExterno = e.idExterno) INNER JOIN tbl_hoja_cobro 
                    AS hc ON(he.idHoja = hc.idHoja) WHERE hc.idHoja = '$i' AND hc.anulada = 0 ";
                $datos = $this->db->query($sql);
                return $datos->result();
            }

            public function medicamentosHoja2($i){
                $sql = "SELECT hc.salidaHoja, hc.idHoja, hi.idHojaInsumo, m.nombreMedicamento, hi.precioInsumo, hi.cantidadInsumo, hi.fechaInsumo
                            FROM tbl_hoja_insumos as hi INNER JOIN tbl_medicamentos as m ON(hi.idInsumo = m.idMedicamento)
                            INNER JOIN tbl_hoja_cobro as hc ON(hi.idHoja = hc.idHoja) WHERE hc.idHoja = '$i' AND hc.anulada = 0 ";
                $datos = $this->db->query($sql);
                return $datos->result();
            }
        // Fin resumen de externos y medicamentos
        
        public function obtenerUsuario($id = null){
            $sql = "SELECT CONCAT(e.nombreEmpleado,' ', e.apellidoEmpleado) as usuario, u.nombreUsuario
                    FROM tbl_usuarios AS u
                    INNER JOIN tbl_empleados AS e ON(e.idEmpleado = u.idEmpleado)
                    WHERE u.idUsuario = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }
    
}
?>

