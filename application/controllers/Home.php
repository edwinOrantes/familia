<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/El_Salvador');
        if ($this->session->has_userdata('valido')){
			redirect(base_url()."Hoja/");
		}
		$this->load->model("Usuarios_Model");
	}

	public function index(){
		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$data["fecha"] = $dias[date("w")].", ".$meses[date('n')-1]." ".date("d");
		$data["hora"] = date("h:i A");

		$data["anuncios"] = $this->Usuarios_Model->obtenerAnuncios();
		$this->load->view('Base/login', $data);
		//echo md5("os2021");
		//echo md5("Admin2021_Orellana");
	}

	public function validar_usuario(){
		$inputs = $this->input->post();
		$params = array('nombreUsuario' => $inputs['nombreUsuario'], 'psUsuario' => md5($inputs['psUsuario']));
		$datos = $this->Usuarios_Model->validarUsuario($params);
		if ($datos['estado'] == 1) {
			
			$userName = explode(" ", $datos["datos"]->nombreEmpleado);
			$lastName = explode(" ", $datos["datos"]->apellidoEmpleado);
			$ses = array(
				'usuario_h'=> $datos["datos"]->nombreUsuario,
				'id_usuario_h'=> $datos["datos"]->idUsuario,
				'id_empleado_h'=> $datos["datos"]->idEmpleado,
				'acceso_h'=> $datos["datos"]->idAcceso,
				'empleado_h'=> $userName[0]." ".$lastName[0], 	
				'acceso_nombre'=> $datos["datos"]->nombreAcceso,
				'valido'=> TRUE,
				'nacimiento'=> $datos["datos"]->nacimientoEmpleado,
				'verificacion'=> $datos["datos"]->codigoVerificacion,
				'nivel'=> $datos["datos"]->nivelUsuario,
			);

			$this->session->set_userdata($ses);
			$this->session->set_flashdata("exito", "Bienvenido nuevamente: ".$this->session->userdata('empleado_h')."");
			// Agregando evento a bitacora
				$data["idUsuario"] = $this->session->userdata('id_usuario_h');
				$data["descripcionBitacora"] = "El usuario: ".$this->session->userdata('usuario_h')." Ha iniciado sesión";
				$this->Usuarios_Model->insertarBitacora($data);
			// Mandando a cada usuario a su respectivo lugar

			if($datos["datos"]->idMedico > 0){
				redirect(base_url()."Consultas/");
			}else{
				switch ($datos["datos"]->idAcceso) {
					case 1:
						// redirect(base_url()."Usuarios/dashboard");
						redirect(base_url()."Paciente/agregar_pacientes");
						break;
					case 8:
						redirect(base_url()."Paciente/agregar_pacientes");
						break;
						
					case 5:
						redirect(base_url()."Paciente/agregar_pacientes");
						break;
	
					case 9:
						redirect(base_url()."Paciente/agregar_pacientes");
						break;
					
					case 15:
						redirect(base_url()."Paciente/agregar_pacientes");
						break;
	
					case 16:
						redirect(base_url()."Paciente/agregar_pacientes");
						break;
						
					default:
						redirect(base_url()."Paciente/agregar_pacientes");
						break;
				}
			}
		}
		else{
			$this->session->set_flashdata("error", "Los datos ingresados son incorrectos");
			redirect(base_url());
		} 

		// echo json_encode($datos);
			
	}

	
}
