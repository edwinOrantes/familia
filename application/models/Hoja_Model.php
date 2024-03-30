<?php
    
class Hoja_Model extends CI_Model {
    // Seccion para hoja de cobro
        public function codigoHoja(){
            $sql = "SELECT MAX(codigoHoja) as codigoHoja FROM tbl_hoja_cobro";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function guardarHoja($data = null){
            if ($data != null) {
                
                $sql = "INSERT INTO tbl_hoja_cobro(codigoHoja, tipoHoja, idMedico, fechaHoja, destinoHoja, idHabitacion, paraHoja, idPaciente)
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
                if($this->db->query($sql, $data)){
                    $idHoja = $this->db->insert_id(); // Id de la hoja de cobro
                    return $idHoja;
                }else{
                    return 0;
                } 
            }else{
                return 0;
            }
        }

        public function guardarConsulta($data = null){
            if ($data != null) {
                $sql = "INSERT INTO tbl_consultas(idPaciente, idMedico, nombrePaciente, peso, altura, imc, temperaturaPaciente, presionPaciente, fechaConsulta, hojaCobro)
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                } 
            }else{
                return false;
            }
        }

        public function detalleHoja($id){
            if($id != null){
                $sql = "SELECT 
                        hc.idHoja, hc.codigoHoja, hc.fechaHoja, hc.credito_fiscal, hc.tipoHoja, hc.totalHoja, hc.estadoHoja, 
                        hc.salidaHoja, hc.diagnosticoHoja, hc.correlativoSalidaHoja, hc.anulada, hc.paraHoja,
                        hc.descuentoHoja, hc.detalleAnulada, hc.formaPago, p.idPaciente, p.nombrePaciente, p.edadPaciente, 
                        p.direccionPaciente, p.duiPaciente, m.nombreMedico, h.idHabitacion, h.numeroHabitacion
                        FROM tbl_hoja_cobro as hc INNER JOIN tbl_pacientes as p
                        ON(hc.idPaciente = p.idPaciente) INNER JOIN tbl_medicos as m on(hc.idMedico = m.idMedico)
                        INNER JOIN tbl_habitacion AS h ON(hc.idHabitacion = h.idHabitacion)
                        WHERE hc.idHoja = '$id'";
                $datos = $this->db->query($sql);
                return $datos->row();
            }else{
                return null;
            }
        }

        public function existeHoja($paciente = null, $fecha = null){
            if($paciente != null){
                $sql = "SELECT COALESCE(h.idHoja,'0') AS idHoja FROM tbl_hoja_cobro AS h WHERE h.correlativoSalidaHoja = '0' AND h.idPaciente = '$paciente' AND h.fechaHoja = '$fecha'";
                $datos = $this->db->query($sql);
                return $datos->row();
            }else{
                return 0;
            }
        }

        public function cambiarFormaPago($data = null){
            if ($data != null){
                $sql = "UPDATE tbl_hoja_cobro SET formaPago = ? WHERE idHoja = ?";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }


        public function agregarDescuento($row = null, $precio = null, $desc = null){
            $sql = "UPDATE tbl_hoja_insumos SET aumentoUnitario = '$desc', precioInsumo = '$precio' WHERE idHojaInsumo = '$row' ";
            $this->db->query($sql);
        }

        public function correlativoHoja($id = null){
            if($id != null){
                $sql = "SELECT hc.correlativoSalidaHoja FROM tbl_hoja_cobro AS hc WHERE hc.idHoja = '$id'";
                $datos = $this->db->query($sql);
                return $datos->row();
            }
        }












        public function segurosActivos(){
            $sql = "SELECT * FROM tbl_seguros WHERE estadoSeguro = '1'";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function obtenerSeguro($id = null){
            $sql = "SELECT * FROM tbl_seguros WHERE idSeguro = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function guardarProcedimiento($data = null){
            if ($data != null){
                $sql = "UPDATE tbl_hoja_cobro SET procedimientoHoja = ?, dh = ? WHERE idHoja = ?";
                // $sql = "UPDATE tbl_hoja_cobro SET procedimientoHoja = ? WHERE idHoja = ?";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }


        /* public function guardarHoja($data = null){
            if ($data["hoja"] != null) {
                $hoja = $data["hoja"];
                $paciente = $data["paciente"];

                $habitacion = $hoja["idHabitacion"];

                $sql = "INSERT INTO tbl_pacientes(nombrePaciente, edadPaciente, telefonoPaciente, duiPaciente, nacimientoPaciente, direccionPaciente)
                    VALUES(?, ?, ?, ?, ?, ?)"; 
                
                $sql2 = "INSERT INTO tbl_hoja_cobro(codigoHoja, idPaciente, fechaHoja, tipoHoja, idMedico, idHabitacion, estadoHoja, seguroHoja, pagaMedico)
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?) ";

                if($paciente["idPaciente"] == 0){
                    unset($paciente["idPaciente"]);
                    if($this->db->query($sql, $paciente)){
                        $hojaCobro["codigoHoja"] = $hoja["codigoHoja"];
                        $hojaCobro["idPaciente"] = $this->db->insert_id(); // Id del paciente;
                        $hojaCobro["fechaHoja"] = $hoja["fechaHoja"];
                        $hojaCobro["tipoHoja"] = $hoja["tipoHoja"];
                        $hojaCobro["idMedico"] = $hoja["idMedico"];
                        $hojaCobro["idHabitacion"] = $hoja["idHabitacion"];
                        $hojaCobro["estadoHoja"]  = $hoja["estadoHoja"];
                        $hojaCobro["seguroHoja"]  = $hoja["seguroHoja"];
                        $hojaCobro["pagaMedico"]  = $hoja["pagaMedico"];

                        if($this->db->query($sql2, $hojaCobro)){
                            $idHoja = $this->db->insert_id(); // Id de la hoja de cobro
                            $sql3 = "UPDATE tbl_habitacion SET estadoHabitacion = '1' WHERE idHabitacion = '$habitacion' ";
                            $this->db->query($sql3);
                            return $idHoja;
                        }else{
                            return 0;
                        }   
                    }else{
                        return 0;
                    }
                }else{
                    $hojaCobro["codigoHoja"] = $hoja["codigoHoja"];
                    $hojaCobro["idPaciente"] = $hoja["idPaciente"]; // Id del paciente;
                    $hojaCobro["fechaHoja"] = $hoja["fechaHoja"];
                    $hojaCobro["tipoHoja"] = $hoja["tipoHoja"];
                    $hojaCobro["idMedico"] = $hoja["idMedico"];
                    $hojaCobro["idHabitacion"] = $hoja["idHabitacion"];
                    $hojaCobro["estadoHoja"]  = $hoja["estadoHoja"];
                    $hojaCobro["seguroHoja"]  = $hoja["seguroHoja"];
                    $hojaCobro["pagaMedico"]  = $hoja["pagaMedico"];
                    if($this->db->query($sql2, $hojaCobro)){
                        $idHoja = $this->db->insert_id(); // Id de la hoja de cobro
                        $sql2 = "UPDATE tbl_habitacion SET estadoHabitacion = '1' WHERE idHabitacion = '$habitacion' ";
                        $this->db->query($sql2);
                        return $idHoja;
                    }else{
                        return 0;
                    }
                }

            }else{
                return 0;
            }
        }*/


        public function paqueteHoja($data = null){
            if($data != null){
            /*  Actualizando cantidad usada del servicio externo */
                $sql = "UPDATE tbl_hoja_cobro SET totalPaquete = ?, esPaquete = ? WHERE idHoja = ?";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

       

        public function obtenerAbonos($hoja = null){
            $sql = "SELECT * FROM tbl_abonos_hoja WHERE idHoja = '$hoja' ";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function obtenerHojas(){
            $sql = "SELECT hc.idHoja, hc.fechaHoja, hc.tipoHoja, hc.codigoHoja, hc.totalHoja, hc.fechaIngresoHoja, hc.estadoHoja, hc.anulada, hc.seguroHoja, hc.esPaquete,
                    hc.correlativoSalidaHoja, p.nombrePaciente, p.edadPaciente, p.idPaciente, m.nombreMedico, m.idMedico, h.idHabitacion, h.numeroHabitacion FROM tbl_hoja_cobro as hc 
                    INNER JOIN tbl_pacientes as p on(hc.idPaciente = p.idPaciente)
                    INNER JOIN tbl_medicos as m on(hc.idMedico = m.idMedico) INNER JOIN tbl_habitacion as h on(hc.idHabitacion = h.idHabitacion)
                    ORDER BY hc.codigoHoja DESC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function obtenerHojasPN($param = null){
            $sql = "SELECT hc.idHoja, hc.fechaHoja, hc.tipoHoja, hc.codigoHoja, hc.totalHoja, hc.fechaIngresoHoja, hc.estadoHoja, hc.anulada, hc.seguroHoja, hc.destinoHoja, hc.esPaquete,
                    hc.correlativoSalidaHoja, hc.porPagos, hc.pagaMedico, p.nombrePaciente, p.edadPaciente, p.idPaciente, m.nombreMedico, m.idMedico, h.idHabitacion, h.numeroHabitacion FROM tbl_hoja_cobro as hc 
                    INNER JOIN tbl_pacientes as p on(hc.idPaciente = p.idPaciente)
                    INNER JOIN tbl_medicos as m on(hc.idMedico = m.idMedico) INNER JOIN tbl_habitacion as h on(hc.idHabitacion = h.idHabitacion)
                    WHERE p.nombrePaciente LIKE '%$param%'
                    ORDER BY hc.codigoHoja DESC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function obtenerRangoHojas(){
            $sql = "SELECT hc.idHoja, hc.fechaHoja, hc.tipoHoja, hc.codigoHoja, hc.totalHoja, hc.fechaIngresoHoja, hc.estadoHoja, hc.anulada, hc.seguroHoja, hc.esPaquete,
                    hc.correlativoSalidaHoja, hc.porPagos, hc.pagaMedico, hc.destinoHoja, p.nombrePaciente, p.edadPaciente, p.idPaciente, m.nombreMedico, m.idMedico, h.idHabitacion, h.numeroHabitacion
                    FROM tbl_hoja_cobro as hc INNER JOIN tbl_pacientes as p on(hc.idPaciente = p.idPaciente)
                    INNER JOIN tbl_medicos as m on(hc.idMedico = m.idMedico) INNER JOIN tbl_habitacion as h on(hc.idHabitacion = h.idHabitacion)
                    ORDER BY hc.codigoHoja DESC LIMIT 500";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function obtenerHojasFecha($i, $f){
            $sql = "SELECT hc.idHoja, hc.fechaHoja, hc.tipoHoja, hc.totalHoja, hc.fechaIngresoHoja, hc.estadoHoja, hc.anulada, p.nombrePaciente, hc.correlativoSalidaHoja,
                    hc.porPagos, hc.pagaMedico, m.nombreMedico, m.idMedico, h.idHabitacion, h.numeroHabitacion FROM tbl_hoja_cobro as hc INNER JOIN tbl_pacientes as p on(hc.idPaciente = p.idPaciente)
                    INNER JOIN tbl_medicos as m on(hc.idMedico = m.idMedico) INNER JOIN tbl_habitacion as h on(hc.idHabitacion = h.idHabitacion)
                    WHERE hc.salidaHoja BETWEEN '$i' AND '$f' ORDER BY hc.fechaHoja DESC";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function guardarDetalleHoja($data = null){
            if($data != null){
                $idHoja = $data["idHoja"];
                $fechaHoja = $data["fechaHoja"];
            // Insertando medicamentos
                if(isset($data["idMedicamento"])){
                    $idMedicamento = $data["idMedicamento"];
                    $precioMedicamento = $data["precioMedicamento"];
                    $cantidadMedicamento = $data["cantidadMedicamento"];
                    $stockMedicamento = $data["stockMedicamento"];
                    $usadosMedicamento = $data["usadosMedicamento"];

                    //Insertando Insumos
                        for ($i=0; $i < sizeof($idMedicamento) ; $i++) { 
                            $sql = "INSERT INTO tbl_hoja_insumos(idHoja, idInsumo, precioInsumo, cantidadInsumo, fechaInsumo)
                                    VALUES('$idHoja', '$idMedicamento[$i]', '$precioMedicamento[$i]', '$cantidadMedicamento[$i]', '$fechaHoja')";
                            $this->db->query($sql);
                            
                            // Insertando en Kardex
                            $idTransaccion = $this->db->insert_id(); // Id de la transaccion
                            $sql2 = "INSERT INTO tbl_kardex(idMedicamento,  precioMedicamento, cantidadMedicamento, descripcionMedicamento, facturaMedicamento,
                                    tipoProceso, transaccion, ocupadaPor) VALUES('$idMedicamento[$i]', '$precioMedicamento[$i]', '$cantidadMedicamento[$i]', 'Salida',
                                    '$idHoja', '2', '$idTransaccion', 'Hospital')";

                            /*  $sql4 = "INSERT INTO tbl_med_hoja(idMedicamento, idHoja, cantidadMedHoja, precioMedHoja)
                                       VALUES('$medicamentos[$i]', '$idHoja', '$cantidadMedicamentos[$i]', '$precioMedicamentos[$i]')";
                                        */
                            $this->db->query($sql2);
                            // Fin insertar kardex
                        }

                    // Actualizando el stock de los insumos
                        $sm = 0;
                        $um = 0;
                        for ($i=0; $i < sizeof($cantidadMedicamento); $i++) {

                            // Obteniendo stock anuma
                                $sqlStock = "SELECT stockMedicamento, usadosMedicamento FROM tbl_medicamentos WHERE idMedicamento = '$idMedicamento[$i]' ";
                                $datosStock = $this->db->query($sqlStock);
                                $filaStock = $datosStock->row();

                            //$sm = $stockMedicamento[$i] - $cantidadMedicamento[$i];  //Obteniendo el nuevo stock
                            //$um = $usadosMedicamento[$i] + $cantidadMedicamento[$i]; // Obteniendo el total de insumos usados
                            
                            $sm = $filaStock->stockMedicamento - $cantidadMedicamento[$i];  //Obteniendo el nuevo stock
                            $um = $filaStock->usadosMedicamento + $cantidadMedicamento[$i]; // Obteniendo el total de insumos usados

                            $sql3 = "UPDATE tbl_medicamentos SET stockMedicamento = '$sm', usadosMedicamento = '$um'  WHERE idMedicamento  = '$idMedicamento[$i]' ";
                            $this->db->query($sql3);
                            $sm = 0;
                            $um = 0;
                        }
                }
            
            // Insertando externos
                if(isset($data["idExterno"])){
                    $idExterno = $data["idExterno"];
                    $precioExterno = $data["precioExterno"];
                    $cantidadExterno = $data["cantidadExterno"];
                    for ($i=0; $i < sizeof($idExterno) ; $i++) { 
                            $sql4 = "INSERT INTO tbl_hoja_externos(idHoja, idExterno, cantidadExterno, precioExterno, fechaExterno)
                                    VALUES('$idHoja', '$idExterno[$i]', '$cantidadExterno[$i]', '$precioExterno[$i]', '$fechaHoja')";
                            $this->db->query($sql4);
                        }
                }
                return true;
            }else{
                return false;
            }
        }

        /* public function guardarDetalleHojaUnitario($data = null){
            if($data != null){
                $idHoja = $data["idHoja"];
                $fechaHoja = $data["fechaHoja"];
                $por = $this->session->userdata('id_usuario_h');
            // Insertando medicamentos
                if(isset($data["idMedicamento"])){
                    $idMedicamento = $data["idMedicamento"];
                    $precioMedicamento = $data["precioMedicamento"];
                    $cantidadMedicamento = $data["cantidadMedicamento"];
                    $stockMedicamento = $data["stockMedicamento"];
                    $usadosMedicamento = $data["usadosMedicamento"];

                    //Insertando Insumos
                            $sql = "INSERT INTO tbl_hoja_insumos(idHoja, idInsumo, precioInsumo, cantidadInsumo, fechaInsumo, por)
                                    VALUES('$idHoja', '$idMedicamento', '$precioMedicamento', '$cantidadMedicamento', '$fechaHoja', '$por')";
                            $this->db->query($sql);
                            
                            // Insertando en Kardex
                            $idTransaccion = $this->db->insert_id(); // Id de la transaccion
                            $sql2 = "INSERT INTO tbl_kardex(idMedicamento,  precioMedicamento, cantidadMedicamento, descripcionMedicamento, facturaMedicamento,
                                    tipoProceso, transaccion, ocupadaPor) VALUES('$idMedicamento', '$precioMedicamento', '$cantidadMedicamento', 'Salida',
                                    '$idHoja', '2', '$idTransaccion', 'Hospital')";

                            $this->db->query($sql2);
                            // Fin insertar kardex
                    // Fin insertar insumos

                    // Actualizando el stock de los insumos
                        $sm = 0;
                        $um = 0;
                            // Obteniendo stock anuma
                                $sqlStock = "SELECT stockMedicamento, usadosMedicamento FROM tbl_medicamentos WHERE idMedicamento = '$idMedicamento' ";
                                $datosStock = $this->db->query($sqlStock);
                                $filaStock = $datosStock->row();
                            
                            $sm = $filaStock->stockMedicamento - $cantidadMedicamento;  //Obteniendo el nuevo stock
                            $um = $filaStock->usadosMedicamento + $cantidadMedicamento; // Obteniendo el total de insumos usados

                        $sql3 = "UPDATE tbl_medicamentos SET stockMedicamento = '$sm', usadosMedicamento = '$um'  WHERE idMedicamento  = '$idMedicamento' ";
                        $this->db->query($sql3);
                        $sm = 0;
                        $um = 0;
                }
                return true;
            }else{
                return false;
            }
        } */

        public function guardarDetalleHojaUnitario($data = null){
            if($data != null){
                $sql = "INSERT INTO tbl_hoja_insumos(idHoja, idInsumo, precioInsumo, cantidadInsumo, fechaInsumo, por)
                        VALUES(?,?,?,?,?,?)";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function guardarDetalleHojaUnitario2($data = null){
            if($data != null){
                $idHoja = $data["idHoja"];
                $fechaHoja = $data["fechaHoja"];
            // Insertando externos
                if(isset($data["idExterno"])){
                    $idExterno = $data["idExterno"];
                    $precioExterno = $data["precioExterno"];
                    $cantidadExterno = $data["cantidadExterno"];
                    $sql4 = "INSERT INTO tbl_hoja_externos(idHoja, idExterno, cantidadExterno, precioExterno, fechaExterno)
                            VALUES('$idHoja', '$idExterno', '$cantidadExterno', '$precioExterno', '$fechaHoja')";
                    $this->db->query($sql4);
                }
                return true;
            }else{
                return false;
            }
        }

        public function externosHoja($id = null){
            if($id != null){
                $sql ="SELECT e.idExterno, e.nombreExterno, he.idHojaExterno, he.idHoja, he.cantidadExterno, he.precioExterno, he.fechaExterno
                FROM tbl_hoja_externos as he INNER JOIN tbl_externos as e ON(he.idExterno = e.idExterno) WHERE he.idHoja = ? ";
                $datos = $this->db->query($sql, $id);
                return $datos->result();
            }
        }

        public function medicamentosHoja($id = null){
            if($id != null){
                $sql = "SELECT hi.idHojaInsumo, m.nombreMedicamento, m.idMedicamento, m.stockMedicamento, m.usadosMedicamento, hi.precioInsumo,
                        hi.cantidadInsumo, hi.descuentoUnitario, hi.aumentoUnitario, hi.fechaInsumo, hi.pivoteStock, m.tipoMedicamento, m.pivoteMedicamento
                        FROM tbl_hoja_insumos as hi INNER JOIN tbl_medicamentos as m
                        ON(hi.idInsumo = m.idMedicamento) WHERE hi.idHoja = '$id' AND hi.eliminado = '0'";
                $datos = $this->db->query($sql, $id);
                return $datos->result();
            }
        }

        public function medicamentosHojaResumen($id = null){
            if($id != null){
                /* $sql = "SELECT hi.idHojaInsumo, m.nombreMedicamento, m.idMedicamento, m.stockMedicamento, m.usadosMedicamento, hi.precioInsumo,
                        hi.fechaInsumo, m.tipoMedicamento, SUM(hi.cantidadInsumo) as cantidadInsumo FROM tbl_hoja_insumos as hi
                        INNER JOIN tbl_medicamentos as m ON(hi.idInsumo = m.idMedicamento) WHERE hi.idHoja = '$id' GROUP BY m.idMedicamento "; */
                $sql = "SELECT hi.idHojaInsumo, m.nombreMedicamento, m.idMedicamento, m.stockMedicamento, m.usadosMedicamento, hi.precioInsumo,
                    hi.fechaInsumo, m.tipoMedicamento, hi.cantidadInsumo, hi.descuentoUnitario FROM tbl_hoja_insumos as hi
                    INNER JOIN tbl_medicamentos as m ON(hi.idInsumo = m.idMedicamento) WHERE hi.idHoja = '$id' AND hi.eliminado = '0'";
                $datos = $this->db->query($sql, $id);
                return $datos->result();
            }
        }
        //($datosMedicamento, $datosStock, $datosKardex, NULL);
        public function actualizarHoja($data = null){
            if($data != null){
            /*  Actualizando cantidad usada del medicamento */
                $sql = "UPDATE tbl_hoja_insumos SET cantidadInsumo = ?, idInsumo = ?, precioInsumo = ? WHERE idHojaInsumo = ?";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function eliminarMedicamento($insumo = null){
            if($insumo != null){
                $sql = "DELETE FROM tbl_hoja_insumos WHERE idHojaInsumo = '$insumo' ";
                if($this->db->query($sql)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        /* public function eliminarMedicamento($data){
            if($data != null){
                $sql = "UPDATE tbl_hoja_insumos SET precioInsumo = '0', cantidadInsumo = '0', descuentoUnitario = '0', eliminado = '1', motivoEliminado = ? WHERE idHojaInsumo = ? ";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        } */

        public function actualizarExterno($data = null){
            if($data != null){
            /*  Actualizando cantidad usada del servicio externo */
                $sql = "UPDATE tbl_hoja_externos SET cantidadExterno = ?, precioExterno = ? WHERE idHojaExterno = ?";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function eliminarExterno($data = null){
            if($data != null){
                $sql = "DELETE FROM tbl_hoja_externos WHERE idHojaExterno = ? ";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }

            }else{
                return false;
            }
        }

        // Gestionando estado de hoja
        public function cerrarHoja($data = null, $n = null){
            if($data != null){
                $flagH = 0;
                
                $dui = $data["duiPaciente"];
                $idPaciente = $data["idPaciente"];
                unset($data["idPaciente"]);
                unset($data["duiPaciente"]);

                if(isset($data["idHabitacion"])){
                    $flagH = 1;
                    $habitacion = $data["idHabitacion"];
                    unset($data["idHabitacion"]);
                }

                $sql = "UPDATE tbl_hoja_cobro SET salidaHoja = ?, diagnosticoHoja = ?, estadoHoja = 0 WHERE idHoja = ?";
                if($this->db->query($sql, $data)){
                    
                    if($flagH == 1){
                        
                        /*$sqlC = "UPDATE tbl_hoja_cobro SET correlativoSalidaHoja = '$n' WHERE idHoja = '".$data["idHoja"]."'";
                        $this->db->query($sqlC);*/

                        $sql2 = "UPDATE tbl_habitacion SET estadoHabitacion = '0' WHERE idHabitacion = '$habitacion' ";
                        $this->db->query($sql2);
                    }

                    if($dui != ""){
                        $sql3 = "UPDATE tbl_pacientes SET duiPaciente = '$dui' WHERE idPaciente = '$idPaciente' ";
                        $this->db->query($sql3);
                    }

                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function restaurarHoja($data = null){
            if($data != null){
                $sql = "UPDATE tbl_hoja_cobro SET estadoHoja = 1 WHERE idHoja = ?";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        // Obtener el numero correlativo de salida
        public function numeroCorrelativo(){
            $sql = "SELECT MAX(correlativoSalidaHoja) AS correlativo FROM tbl_hoja_cobro";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function actualizarDetalleHoja($data = null){
            if($data != null){
                $habitacionVieja = $data["habitacionVieja"];
                $habitacionNueva = $data["idHabitacion"];
                unset($data["habitacionVieja"]);
            /*  Actualizando cantidad usada del medicamento */
                $sql = "UPDATE tbl_hoja_cobro SET fechaHoja = ?, tipoHoja = ?, idMedico = ?, idHabitacion = ? WHERE idHoja = ?";
                $sql2 = "UPDATE tbl_habitacion SET estadoHabitacion = 0 WHERE idHabitacion = '$habitacionVieja' ";
                $sql3 = "UPDATE tbl_habitacion SET estadoHabitacion = 1 WHERE idHabitacion = '$habitacionNueva' ";
                if($this->db->query($sql, $data)){
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

        public function actualizarPacienteHoja($data = null, $hoja = null){
            $sql = "INSERT INTO tbl_pacientes(nombrePaciente, edadPaciente, telefonoPaciente, duiPaciente, nacimientoPaciente, direccionPaciente)
                    VALUES(?, ?, ?, ?, ?, ?)";
            if($this->db->query($sql, $data)){
                $paciente = $this->db->insert_id(); // Id del paciente insertado
                $sql2 = "UPDATE tbl_hoja_cobro SET idPaciente = '$paciente' WHERE idHoja = '$hoja' ";
                if($this->db->query($sql2)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function eliminarDetalleHoja($data = null){
            if($data != null){
                $hoja = $data["hoja"];
                $motivo = $data["motivo"];
                $sqlM = "UPDATE tbl_hoja_insumos SET precioInsumo = '0', cantidadInsumo = '0' WHERE idHoja = '$hoja' ";
                $sqlE = "UPDATE tbl_hoja_externos SET precioExterno = '0'  WHERE idHoja = '$hoja' ";
                $sqlU = "UPDATE tbl_hoja_cobro SET motivoAnulada = '$motivo' WHERE idHoja = '$hoja' ";
                if($this->db->query($sqlM)){
                    if($this->db->query($sqlE)){
                        $this->db->query($sqlU);
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

        public function descuentoUnitario($precio = null, $unitario = null, $id = null){
            $sql = "UPDATE tbl_hoja_insumos SET precioInsumo = '$precio', descuentoUnitario = '$unitario' WHERE idHojaInsumo = '$id' ";
            if($this->db->query($sql)){
                return true;
            }else{
                return false;
            }
        }

        public function agregarPorDescuento($porcentaje = null, $id = null){
            $sql = "UPDATE tbl_hoja_cobro SET dh = '$porcentaje' WHERE idHoja = '$id' ";
            if($this->db->query($sql)){
                return true;
            }else{
                return false;
            }
        }

        public function aumentoSeguro($precio = null, $id = null){
            $sql = "UPDATE tbl_hoja_insumos SET precioInsumo = '$precio' WHERE idHojaInsumo = '$id' ";
            if($this->db->query($sql)){
                return true;
            }else{
                return false;
            }
        }

        public function agregarSeguro($seguro = null, $hoja = null){
            $sql = "UPDATE tbl_hoja_cobro SET seguroHoja = '$seguro' WHERE idHoja = '$hoja' ";
            if($this->db->query($sql)){
                return true;
            }else{
                return false;
            }
        }

    // Seccion para crear presupuesto
        public function codigoPresupuesto(){
            $sql = "SELECT MAX(codigoPresupuesto) AS codigoPresupuesto FROM tbl_presupuesto ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function guardarPresupuesto($data = null){
            if ($data != null) {
                $sql = "INSERT INTO tbl_presupuesto(codigoPresupuesto, pacientePresupuesto, fechaPresupuesto, tipoPresupuesto, medicoPresupuesto) VALUES(?, ?, ?, ?, ?) ";
                if ($this->db->query($sql, $data)) {
                    $idPresupuesto = $this->db->insert_id(); // Id de la hoja de cobro
                    return $idPresupuesto;

                }else{
                    return 0;
                }
            }else{
                    return 0;
                }
        }

        public function detallePresupuesto($id){
            if($id != null){
                $sql = "SELECT m.nombreMedico, p.* FROM tbl_presupuesto as p INNER JOIN tbl_medicos as m ON(p.medicoPresupuesto = m.idMedico) WHERE p.idPresupuesto = '$id' ";
                $datos = $this->db->query($sql);
                return $datos->row();
            }else{
                return null;
            }
        }

        /* public function guardarDetallePresupuesto($data = null){
            if($data != null){
                $idHoja = $data["idHoja"];
                $fechaHoja = $data["fechaHoja"];
            // Insertando medicamentos
                if(isset($data["idMedicamento"])){
                    $idMedicamento = $data["idMedicamento"];
                    $precioMedicamento = $data["precioMedicamento"];
                    $cantidadMedicamento = $data["cantidadMedicamento"];

                    //Insertando Insumos
                        for ($i=0; $i < sizeof($idMedicamento) ; $i++) { 
                            $sql = "INSERT INTO tbl_presupuesto_insumos(idPresupuesto, idInsumo, precioInsumo, cantidadInsumo, fechaInsumo)
                                    VALUES('$idHoja', '$idMedicamento[$i]', '$precioMedicamento[$i]', '$cantidadMedicamento[$i]', '$fechaHoja')";
                            $this->db->query($sql);
                        }
                }
            
            // Insertando externos
                if(isset($data["idExterno"])){
                    $idExterno = $data["idExterno"];
                    $precioExterno = $data["precioExterno"];
                    $cantidadExterno = $data["cantidadExterno"];
                    for ($i=0; $i < sizeof($idExterno) ; $i++) { 
                            $sql4 = "INSERT INTO tbl_presupuesto_externos(idPresupuesto, idExterno, cantidadExterno, precioExterno, fechaExterno)
                                    VALUES('$idHoja', '$idExterno[$i]', '$cantidadExterno[$i]', '$precioExterno[$i]', '$fechaHoja')";
                            $this->db->query($sql4);
                        }
                }
                return true;
            }else{
                return false;
            }
        } */

        public function guardarDetallePresupuesto($data = null){
            if($data != null){
                $idHoja = $data["idHoja"];
                $fechaHoja = $data["fechaHoja"];
            // Insertando medicamentos
                if(isset($data["idMedicamento"])){
                    $idMedicamento = $data["idMedicamento"];
                    $precioMedicamento = $data["precioMedicamento"];
                    $cantidadMedicamento = $data["cantidadMedicamento"];

                    //Insertando Insumos
                        $sql = "INSERT INTO tbl_presupuesto_insumos(idPresupuesto, idInsumo, precioInsumo, cantidadInsumo, fechaInsumo)
                                VALUES('$idHoja', '$idMedicamento', '$precioMedicamento', '$cantidadMedicamento', '$fechaHoja')";
                        $this->db->query($sql);
                }
                return true;
            }else{
                return false;
            }
        }

        public function guardarExternoPresupuesto($data = null){
            if($data != null){
                $idHoja = $data["idHoja"];
                $fechaHoja = $data["fechaHoja"];
            // Insertando externos
                if(isset($data["idExterno"])){
                    $idExterno = $data["idExterno"];
                    $precioExterno = $data["precioExterno"];
                    $cantidadExterno = $data["cantidadExterno"];
                    $sql4 = "INSERT INTO tbl_presupuesto_externos(idPresupuesto, idExterno, cantidadExterno, precioExterno, fechaExterno)
                            VALUES('$idHoja', '$idExterno', '$cantidadExterno', '$precioExterno', '$fechaHoja')";
                    $this->db->query($sql4);
                }
                return true;
            }else{
                return false;
            }
        }

        public function externosPresupuesto($id = null){
            if($id != null){
                $sql ="SELECT e.idExterno, e.nombreExterno, pe.idPresupuestoExterno, pe.idPresupuesto, pe.cantidadExterno, pe.precioExterno, 
                pe.fechaExterno FROM tbl_presupuesto_externos as pe INNER JOIN tbl_externos as e ON(pe.idExterno = e.idExterno)
                WHERE pe.idPresupuesto = ? ";
                $datos = $this->db->query($sql, $id);
                return $datos->result();
            }
        }

        public function medicamentosPresupuesto($id = null){
            if($id != null){
                $sql = "SELECT pi.idPresupuestoInsumo, m.nombreMedicamento, m.idMedicamento, m.stockMedicamento, m.usadosMedicamento,
                        pi.precioInsumo, pi.cantidadInsumo, pi.fechaInsumo, m.tipoMedicamento FROM tbl_presupuesto_insumos as pi INNER JOIN 
                        tbl_medicamentos as m ON(pi.idInsumo = m.idMedicamento)  WHERE pi.idPresupuesto = '$id'  ";
                $datos = $this->db->query($sql, $id);
                return $datos->result();
            }
        }

        public function actualizarMedicamentoPresupuesto($data = null){
            if($data != null){
                $sql = "UPDATE tbl_presupuesto_insumos SET cantidadInsumo = ? WHERE idPresupuestoInsumo = ? ";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        /* public function eliminarMedicamentoPresupuesto($id = null){
            if($id != null){
                $sql = "DELETE FROM tbl_presupuesto_insumos WHERE idPresupuestoInsumo = ? ";
                if($this->db->query($sql, $id)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        } */

        public function eliminarMedicamentoPresupuesto($id = null){
            if($id != null){
                $sql = "DELETE FROM tbl_presupuesto_insumos WHERE idPresupuestoInsumo = ? ";
                if($this->db->query($sql, $id)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function actualizarExternoPresupuesto($data = null){
            if($data != null){
                $sql = "UPDATE tbl_presupuesto_externos SET cantidadExterno = ?, precioExterno = ? WHERE idPresupuestoExterno = ? ";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function eliminarExternoPresupuesto($id = null){
            if($id != null){
                $sql = "DELETE FROM tbl_presupuesto_externos WHERE idPresupuestoExterno = ? ";
                if($this->db->query($sql, $id)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        // Guardando hoja creada con datos de cotizacion
        /* public function guardarHoja2($hoja = null, $detalle = null){
            if ($hoja != null) {
                $habitacion = $hoja["idHabitacion"];
                //$medico = $hoja["idMedico"];
                $sql = "INSERT INTO tbl_hoja_cobro(codigoHoja, idPaciente, fechaHoja, tipoHoja, idMedico, idHabitacion, estadoHoja) VALUES(?, ?, ?, ?, ?, ?, ?)";
                if ($this->db->query($sql, $hoja)) {
                    $idHoja = $this->db->insert_id(); // Id de la hoja de cobro
                    $sql2 = "UPDATE tbl_habitacion SET estadoHabitacion = '1' WHERE idHabitacion = '$habitacion' ";
                    $this->db->query($sql2);

                    // Insertando Insumos y externos
                            $idHoja2 = $idHoja;
                            $fechaHoja = $hoja["fechaHoja"];
                        // Insertando medicamentos
                            if(isset($detalle["idMedicamento"])){
                                $idMedicamento = $detalle["idMedicamento"];
                                $precioMedicamento = $detalle["precioMedicamento"];
                                $cantidadMedicamento = $detalle["cantidadMedicamento"];
                                $stockMedicamento = $detalle["stockMedicamento"];
                                $usadosMedicamento = $detalle["usadosMedicamento"];
                
                                //Insertando Insumos
                                    for ($i=0; $i < sizeof($idMedicamento) ; $i++) { 
                                        $sql3 = "INSERT INTO tbl_hoja_insumos(idHoja, idInsumo, precioInsumo, cantidadInsumo, fechaInsumo)
                                                VALUES('$idHoja2', '$idMedicamento[$i]', '$precioMedicamento[$i]', '$cantidadMedicamento[$i]', '$fechaHoja')";
                                        $this->db->query($sql3);
                                        
                                        // Insertando en Kardex
                                        $idTransaccion = $this->db->insert_id(); // Id de la transaccion
                                        $sql4 = "INSERT INTO tbl_kardex(idMedicamento,  precioMedicamento, cantidadMedicamento, descripcionMedicamento, facturaMedicamento,
                                                tipoProceso, transaccion) VALUES('$idMedicamento[$i]', '$precioMedicamento[$i]', '$cantidadMedicamento[$i]', 'Salida',
                                                '$idHoja2', '2', '$idTransaccion')";
                                        $this->db->query($sql4);
                                    }
                
                                // Actualizando el stock de los insumos
                                    $sm = 0;
                                    $um = 0;
                                    for ($i=0; $i < sizeof($cantidadMedicamento); $i++) {
                                        $sm = $stockMedicamento[$i] - $cantidadMedicamento[$i];  //Obteniendo el nuevo stock
                                        $um = $usadosMedicamento[$i] + $cantidadMedicamento[$i]; // Obteniendo el total de insumos usados
                                        $sql5 = "UPDATE tbl_medicamentos SET stockMedicamento = '$sm', usadosMedicamento = '$um'  WHERE idMedicamento  = '$idMedicamento[$i]' ";
                                        $this->db->query($sql5);
                                        $sm = 0;
                                        $um = 0;
                                    }
                            }
                        
                        // Insertando externos
                            if(isset($detalle["idExterno"])){
                                $idExterno = $detalle["idExterno"];
                                $precioExterno = $detalle["precioExterno"];
                                $cantidadExterno = $detalle["cantidadExterno"];
                                for ($i=0; $i < sizeof($idExterno) ; $i++) { 
                                        $sql6 = "INSERT INTO tbl_hoja_externos(idHoja, idExterno, cantidadExterno, precioExterno, fechaExterno)
                                                VALUES('$idHoja2', '$idExterno[$i]', '$cantidadExterno[$i]', '$precioExterno[$i]', '$fechaHoja')";
                                        $this->db->query($sql6);
                                    }
                            }

                    return $idHoja;

                }else{
                    return 0;
                }
            }else{
                    return 0;
                }
        } */

        public function guardarPresupuestoHoja($data = null){
            if ($data["hoja"] != null) {
                $hoja = $data["hoja"];
                $paciente = $data["paciente"];
                $detalle = $data["detalle"];
                $habitacion = $hoja["idHabitacion"];
                $fechaHoja = $hoja["fechaHoja"];

                $sql = "INSERT INTO tbl_pacientes(nombrePaciente, edadPaciente, telefonoPaciente, duiPaciente, nacimientoPaciente, direccionPaciente)
                    VALUES(?, ?, ?, ?, ?, ?)"; 
                
                $sql2 = "INSERT INTO tbl_hoja_cobro(codigoHoja, idPaciente, fechaHoja, tipoHoja, idMedico, idHabitacion, estadoHoja)
                        VALUES(?, ?, ?, ?, ?, ?, ?) ";

                if($paciente["idPaciente"] == 0){
                    unset($paciente["idPaciente"]);
                    if($this->db->query($sql, $paciente)){
                        $hojaCobro["codigoHoja"] = $hoja["codigoHoja"];
                        $hojaCobro["idPaciente"] = $this->db->insert_id(); // Id del paciente;
                        $hojaCobro["fechaHoja"] = $hoja["fechaHoja"];
                        $hojaCobro["tipoHoja"] = $hoja["tipoHoja"];
                        $hojaCobro["idMedico"] = $hoja["idMedico"];
                        $hojaCobro["idHabitacion"] = $hoja["idHabitacion"];
                        $hojaCobro["estadoHoja"]  = $hoja["estadoHoja"];

                        if($this->db->query($sql2, $hojaCobro)){
                            $idHoja = $this->db->insert_id(); // Id de la hoja de cobro
                            $sql3 = "UPDATE tbl_habitacion SET estadoHabitacion = '1' WHERE idHabitacion = '$habitacion' ";
                            $this->db->query($sql3);
                            // Insertando Insumos y externos
                                // Insertando medicamentos
                                    if(isset($detalle["idMedicamento"])){
                                        $idMedicamento = $detalle["idMedicamento"];
                                        $precioMedicamento = $detalle["precioMedicamento"];
                                        $cantidadMedicamento = $detalle["cantidadMedicamento"];
                                        $stockMedicamento = $detalle["stockMedicamento"];
                                        $usadosMedicamento = $detalle["usadosMedicamento"];
                        
                                        //Insertando Insumos
                                            for ($i=0; $i < sizeof($idMedicamento) ; $i++) { 
                                                $sql4 = "INSERT INTO tbl_hoja_insumos(idHoja, idInsumo, precioInsumo, cantidadInsumo, fechaInsumo)
                                                        VALUES('$idHoja', '$idMedicamento[$i]', '$precioMedicamento[$i]', '$cantidadMedicamento[$i]', '$fechaHoja')";
                                                $this->db->query($sql4);
                                            }
                                    }
                                
                                // Insertando externos
                                    if(isset($detalle["idExterno"])){
                                        $idExterno = $detalle["idExterno"];
                                        $precioExterno = $detalle["precioExterno"];
                                        $cantidadExterno = $detalle["cantidadExterno"];
                                        for ($i=0; $i < sizeof($idExterno); $i++) { 
                                                $sql6 = "INSERT INTO tbl_hoja_externos(idHoja, idExterno, cantidadExterno, precioExterno, fechaExterno)
                                                        VALUES('$idHoja', '$idExterno[$i]', '$cantidadExterno[$i]', '$precioExterno[$i]', '$fechaHoja')";
                                                $this->db->query($sql6);
                                            }
                                    }
                            return $idHoja;
                        }else{
                            return 0;
                        }   
                    }else{
                        return 0;
                    }
                }else{
                    $hojaCobro["codigoHoja"] = $hoja["codigoHoja"];
                    $hojaCobro["idPaciente"] = $hoja["idPaciente"]; // Id del paciente;
                    $hojaCobro["fechaHoja"] = $hoja["fechaHoja"];
                    $hojaCobro["tipoHoja"] = $hoja["tipoHoja"];
                    $hojaCobro["idMedico"] = $hoja["idMedico"];
                    $hojaCobro["idHabitacion"] = $hoja["idHabitacion"];
                    $hojaCobro["estadoHoja"]  = $hoja["estadoHoja"];
                    if($this->db->query($sql2, $hojaCobro)){
                        $idHoja = $this->db->insert_id(); // Id de la hoja de cobro
                        $sql3 = "UPDATE tbl_habitacion SET estadoHabitacion = '1' WHERE idHabitacion = '$habitacion' ";
                        $this->db->query($sql3);

                        // Insertando Insumos y externos
                            // Insertando medicamentos
                            if(isset($detalle["idMedicamento"])){
                                $idMedicamento = $detalle["idMedicamento"];
                                $precioMedicamento = $detalle["precioMedicamento"];
                                $cantidadMedicamento = $detalle["cantidadMedicamento"];
                                $stockMedicamento = $detalle["stockMedicamento"];
                                $usadosMedicamento = $detalle["usadosMedicamento"];
                
                                //Insertando Insumos
                                    for ($i=0; $i < sizeof($idMedicamento) ; $i++) { 
                                        $sql4 = "INSERT INTO tbl_hoja_insumos(idHoja, idInsumo, precioInsumo, cantidadInsumo, fechaInsumo)
                                                VALUES('$idHoja', '$idMedicamento[$i]', '$precioMedicamento[$i]', '$cantidadMedicamento[$i]', '$fechaHoja')";
                                        $this->db->query($sql4);
                                    }
                            }
                        
                        // Insertando externos
                            if(isset($detalle["idExterno"])){
                                $idExterno = $detalle["idExterno"];
                                $precioExterno = $detalle["precioExterno"];
                                $cantidadExterno = $detalle["cantidadExterno"];
                                for ($i=0; $i < sizeof($idExterno); $i++) { 
                                        $sql6 = "INSERT INTO tbl_hoja_externos(idHoja, idExterno, cantidadExterno, precioExterno, fechaExterno)
                                                VALUES('$idHoja', '$idExterno[$i]', '$cantidadExterno[$i]', '$precioExterno[$i]', '$fechaHoja')";
                                        $this->db->query($sql6);
                                    }
                            }
                        return $idHoja;
                    }else{
                        return 0;
                    }
                }// Fin If/Else de guardar datos de la hoja de cobro.

                


            }else{
                    return 0;
                }
        }

        public function obtenerPresupuestos(){
            $sql = "SELECT m.nombreMedico, p.* FROM tbl_presupuesto as p INNER JOIN tbl_medicos as m ON(p.medicoPresupuesto = m.idMedico) ";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        // Consultas para cambiar medicamento en hoja de cobro.
        public function obtenerMedicamento($id){
            $sql = "SELECT * from tbl_medicamentos WHERE idMedicamento = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        // Código de factura
        public function obtenerCodigoFacturaC(){
            // $sql = "SELECT MAX(numeroFactura) as codigo FROM tbl_facturas WHERE tipoFactura = '1' ";
            $sql = "SELECT * FROM tbl_facturas WHERE tipoFactura = '1' AND id_factura = (SELECT MAX(id_factura) FROM tbl_facturas) ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function obtenerCodigoFacturaCF(){
            $sql = "SELECT MAX(numeroFactura) as codigo FROM tbl_facturas WHERE tipoFactura = '2' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function hojaFactura($id){
            $sql = "SELECT * FROM tbl_facturas WHERE idHojaCobro = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function montoFactura($id){
            $sql = "SELECT * FROM tbl_facturas_emitidas  WHERE idHoja = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function guardarConsumidorFinal($data = null){
            if($data != null){

                $tipo = $data["tipoFactura"];
                $factura = $data["numeroFactura"];
                $id = $data["idHojaCobro"];
                $fecha = $data["fechaFactura"];

                $sql = "INSERT INTO tbl_facturas(clienteFactura, duiFactura, idHojaCobro, numeroFactura, tipoFactura, fechaMostrar) VALUES(?, ?, ?, ?, ?, ?)";

                $sql2 = "UPDATE tbl_facturas SET numeroFactura = '$factura', fechaMostrar = '$fecha'  WHERE idHojaCobro = '$id' ";

                if(isset($data["actualizarCodigoFactura"])){
                    $bool = $this->db->query($sql2);
                }else{
                    $bool = $this->db->query($sql, $data);
                }
                if($bool){
                    if($tipo == 1){
                        $sql2 = "UPDATE tbl_hoja_cobro SET credito_fiscal = '$factura' WHERE idHoja = '$id' ";
                        $this->db->query($sql2);
                    }
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function anularHoja($data = null){
            if($data != null){
                $sql = "UPDATE tbl_hoja_cobro SET estadoHoja = ?, anulada = ?, motivoAnulada = ?, detalleAnulada = ? WHERE idHoja = ? ";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function validarCodigoHoja($codigo){
            $sql = "SELECT * FROM tbl_hoja_cobro WHERE codigoHoja = '$codigo' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function existenciaCorrelativo($id){
            $sql = "SELECT correlativoSalidaHoja FROM tbl_hoja_cobro WHERE idHoja = '$id' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function actualizarCorrelativo($id, $c){
            $sql = "UPDATE tbl_hoja_cobro SET correlativoSalidaHoja = '$c', fechaRecibo = NOW() WHERE idHoja = '$id' ";
            if($this->db->query($sql)){
                return true;
            }else{
                return false;
            }
        }

        public function guardarFactura($data = null){
            if($data != null){
                $idHoja = $data["idHoja"];
                $numero = $data["numeroFactura"];
                $total = $data["totalFactura"];
                $sqlprev = "SELECT * FROM tbl_facturas_emitidas WHERE idHoja = '$idHoja'";
                $datos = $this->db->query($sqlprev)->result();
                if(sizeof($datos) > 0){
                    $row = 0;
                    foreach ($datos as $fila) {
                        $row = $fila->idFacturaEmitida;
                    }
                    $sql = "UPDATE tbl_facturas_emitidas SET numeroFactura = '$numero' , totalFactura = '$total' WHERE idFacturaEmitida = '$row' ";
                }else{
                    $sql = "INSERT INTO tbl_facturas_emitidas(idHoja, numeroFactura, totalFactura, fechaFactura) VALUES(?, ?, ?, ?)";
                }
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function guardarLlegadaPaciente($data = null){            
            if($data != null){
                $sql = "INSERT INTO tbl_llegada_pacientes(numeroLlegada, pacienteLlegada, edadLlegada, codigoLlegada, destinoLlegada, estadoLlegada, fechaLlegada, idHoja, turno)
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }

            }else{
                return false;
            }
        }

        public function obtenerCupo($date, $destino, $turno){
            //$sql = "SELECT MAX(numeroLlegada) AS cupo FROM tbl_llegada_pacientes WHERE fechaLlegada = '$date' ";
            $sql = "SELECT MAX(numeroLlegada) AS cupo FROM tbl_llegada_pacientes WHERE fechaLlegada = '$date' AND destinoLlegada = '$destino' AND turno = '$turno'";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function consultaXCodigo($codigo){
            $sql = "SELECT idHoja FROM tbl_hoja_cobro WHERE codigoHoja = '$codigo' ";
            $datos = $this->db->query($sql);
            return $datos->row();
        }
        
    // Metodo para paquete
        public function obtenerPaquetes(){
            $sql = "SELECT m.nombreMedico, p.* FROM tbl_paquetes as p INNER JOIN tbl_medicos AS m ON(p.medicoPaquete = m.idMedico)";
            $datos = $this->db->query($sql);
            return $datos->result();
        }

        public function guardarPaquete($data){
            $sql = "INSERT INTO tbl_paquetes(codigoPaquete, pacientePaquete, medicoPaquete, cantidadPaquete, conceptoPaquete, fechaPaquete, estadoPaquete, cuenta_creada, hoja)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            if($this->db->query($sql, $data)){
                $idpaquete = $this->db->insert_id(); // Id del paquete
                return $idpaquete;
            }else{
                return 0;
            }
        }

        public function actualizarPaquete($data = null){
            if($data != null){
                $sql = "UPDATE tbl_paquetes SET pacientePaquete = ?, medicoPaquete = ?, cantidadPaquete = ?, conceptoPaquete = ?, fechaPaquete = ?
                        WHERE idPaquete = ?";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
                
            }else{
                return false;
            }
        }

        public function eliminarPaquete($data){
            $user = $this->session->userdata("id_usuario_h");
            $sql = "UPDATE tbl_paquetes SET estadoPaquete = '0', flagDelete = '$user' WHERE idPaquete = ? ";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }

        public function obtenerPaquete($id = null, $pivote = null){
            $sql = "SELECT m.nombreMedico, hc.tipoHoja, hc.esPaquete, p.*
                    FROM tbl_paquetes AS p 
                    INNER JOIN tbl_hoja_cobro AS hc ON(hc.idHoja = p.hoja)
                    INNER JOIN tbl_medicos AS m ON(p.medicoPaquete = m.idMedico)
                    WHERE p.idPaquete = '$id' "; // Modalidad nueva

            $sql2 = "SELECT m.nombreMedico, p.*
                    FROM tbl_paquetes AS p 
                    INNER JOIN tbl_medicos AS m ON(p.medicoPaquete = m.idMedico)
                    WHERE p.idPaquete = '$id' "; //Modalidad vieja
            if($pivote == 0){
                $datos = $this->db->query($sql);
            }else{
                $datos = $this->db->query($sql2);
            }
            return $datos->row();
        }

        public function codigoPaquete(){
            $sql = "SELECT MAX(codigoPaquete) as codigoPaquete FROM tbl_paquetes";
            $datos = $this->db->query($sql);
            return $datos->row();
        }

        public function agregarAPaquete($data = null){
            if($data != null){
                $sql = "UPDATE tbl_paquetes SET recibo_creado = ?, saldado = ? WHERE idPaquete = ?";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    // Fin metodo paquete


        public function obtenerHoja($hoja = null){
            if($hoja != null){
                $sql = "SELECT hc.*, p.nombrePaciente FROM tbl_hoja_cobro AS hc 
                        INNER JOIN tbl_pacientes AS p ON(hc.idPaciente = p.idPaciente)
                        WHERE hc.idHoja = '$hoja' ";
                $datos = $this->db->query($sql);
                return $datos->row();
            }
        }

        public function agregarPaquete($paquete = null, $pago = null){
            if($paquete != null && $pago != null){
                $sql = "UPDATE tbl_abonos_hoja SET paqueteAbono = '$paquete'
                        WHERE idAbono = '$pago' ";
                if($this->db->query($sql)){
                    return true;
                }else{
                    false;
                }
            }
        }

    // Cambiar forma de pago

    // Metodos para crear cuenta y abonos desde paquetes
        public function guardarAbonoHoja($data = null){
            if($data != null){
                $sql = "INSERT INTO tbl_abonos_hoja(idHoja, montoAbono, fechaAbono, paqueteAbono) VALUES(?, ?, ?, ?)";
                if($this->db->query($sql, $data)){
                    $idPago = $this->db->insert_id(); // Id del paquete
                    return $idPago;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }

        public function crearHojaPaquete($data = null){ //Creando hoja desde paquete
            if($data != null){
                $sql = "INSERT INTO tbl_hoja_cobro(codigoHoja, idPaciente, fechaHoja, tipoHoja, idMedico, idHabitacion, estadoHoja, seguroHoja, porPagos, pagaMedico, esPaquete, totalPaquete)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";
                if($this->db->query($sql, $data)){
                    $idPago = $this->db->insert_id(); // Id hoja de cobro
                    return $idPago;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }
    // Metodos para crear cuenta y abonos desde paquetes

        

    // Conectandose a otra DB
        /* public function test(){
            $DB2 = $this->load->database('enfermeria_db', TRUE);
            $sql = "SELECT * FROM tbl_senso_diario ";
            $datos = $DB2->query($sql);
            return $datos->result();
        } */

        /* public function test(){
            $DB2 = $this->load->database('fast_db', TRUE);
            $sql = "SELECT * FROM tbl_menu";
            $datos = $DB2->query($sql);
            return $datos->result();
        } */
    // Fin otra db

    public function testing(){
        $anio = date("Y");
        $mes = date("m");
        /* $i = $anio."-".$mes."-01";
        $f = $anio."-".$mes."-31"; */
        $i = "2022-01-01";
        $f = "2022-01-31";
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

    public function guardarSala($data = null){
        if($data != null){
            $sql = "INSERT INTO tbl_procedimientos_salas(idHoja, idPaciente, procedimientoSala, fechaProcedimiento, horaProcedimiento)
                    VALUES(?, ?, ?, ?, ?)";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }
    }

    public function validarPaquete($id = null){
        $sql = "SELECT hc.idHoja, hc.fechaHoja, hc.salidaHoja, hc.codigoHoja, hc.anulada, hc.tipoHoja, hc.descuentoHoja, hc.esPaquete, hc.totalPaquete,
                p.idPaciente, p.nombrePaciente, m.idMedico, m.nombreMedico,
                (SELECT SUM(hi.cantidadInsumo * hi.precioInsumo) FROM tbl_hoja_insumos AS hi WHERE hi.idHoja = hc.idHoja) AS medicamentos,
                (SELECT SUM(he.precioExterno * he.cantidadExterno) FROM tbl_hoja_externos AS he WHERE he.idHoja = hc.idHoja) AS externos
                FROM tbl_hoja_cobro as hc 
                INNER JOIN tbl_medicos AS med ON(hc.idMedico = med.idMedico)
                INNER JOIN tbl_pacientes  p ON(hc.idPaciente = p.idPaciente) 
                INNER JOIN tbl_medicos as m ON(hc.idMedico = m.idMedico)
                WHERE hc.idHoja = '$id'
                ORDER BY hc.correlativoSalidaHoja ASC";
        $datos = $this->db->query($sql);
        return $datos->row();
    }

    public function guardarHonorarioPaquete($data = null){
        if($data != null){
            $sql = "INSERT INTO tbl_honorarios_paquetes(idHoja, idMedico, totalHonorarioPaquete, originalHonorarioPaquete)
                VALUES(?, ?, ?, ?)";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function actualizarMontoPaquete($data = null){
        if($data != null){
            $sql = "UPDATE tbl_hoja_cobro SET totalPaquete = ? WHERE idHoja = ?";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function agregarAControlCajeras($data = null){
        if($data != null){
            $sql = "INSERT INTO tbl_control_cajeras(idUsuario, idHoja, correlativoHoja, fechaGenerado) VALUES(?, ?, ?, ?)";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }


    // Control de stocks
        public function guardarDescargoStock($data = null){
            if($data != null){
                $sql = "INSERT INTO tbl_movimientos_stocks(idStock, idHoja, idInsumo, precioInsumo, cantidadInsumo, por)
                            VALUES(?, ?, ?, ?, ?, ?)";
                if($this->db->query($sql, $data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

    // Control de stocks

}

?> 
