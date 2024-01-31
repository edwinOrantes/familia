<?php
class Proveedor_Model extends CI_Model {
    // Obtener departamentos
    public function obtenerProveedores(){
        $sql = "SELECT * FROM tbl_proveedores as p WHERE p.estadoProveedor = '1' ";
        $datos = $this->db->query($sql);
        return $datos->result();
    }

    public function ultimoCodigo(){
        $sql = "SELECT MAX(codigoProveedor) as codigo FROM tbl_proveedores";
        $datos = $this->db->query($sql);
        return $datos->row();
    }

    public function guardarProveedor($data = null){
        if($data != null){
            $proveedor = $data["proveedor"];
		    $externo = $data["externo"];

            $sql = "INSERT INTO tbl_proveedores(codigoProveedor, empresaProveedor, nrcProveedor, telefonoProveedor, visitadorProveedor, plazoProveedor, tipoContribuyente,  direccionProveedor)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            $sql2 = "INSERT INTO tbl_externos(nombreExterno, tipoEntidad, descripcionExterno, idEntidad)
                        VALUES(?, ?, ?, ?)";
            if($this->db->query($sql, $proveedor)){
                $externo["idProveedor"] = $this->db->insert_id(); // Id del proveedor.
                $this->db->query($sql2, $externo);
                    return true;
            }else{
                return false;
            }
        }
    }


    public function actualizarProveedor($data = null ){
        if($data != null){
            $sql = "UPDATE tbl_proveedores SET codigoProveedor = ?, empresaProveedor = ?, nrcProveedor = ?,
                            telefonoProveedor = ?, visitadorProveedor =?, plazoProveedor = ?, tipoContribuyente = ?, direccionProveedor = ?
                        WHERE idProveedor = ?";
            if($this->db->query($sql, $data)){
                return true;
            }else{
                return false;
            }
        }
    }

    public function eliminarProveedor($id = null){
        if ($id != null ) {
            $sql = "UPDATE tbl_proveedores SET estadoProveedor = 0  WHERE idProveedor = ?";
            if($this->db->query($sql, $id)){
                return true;
            }else{
                return false;
            }
        }
    }
    
}
?>