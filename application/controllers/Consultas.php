<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Consultas extends CI_Controller {

    public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/El_Salvador');
        $this->load->model("Consultas_Model");
		if (!$this->session->has_userdata('valido')){
			$this->session->set_flashdata("error", "Debes iniciar sesión");
			redirect(base_url());
		}
	}


	public function index(){
		$fecha = date("Y-m-d");
		$data["citas"] = $this->Consultas_Model->consultasPendientesHoy($fecha);
		$this->load->view("Base/header");
		$this->load->view("Consultas/lista_citas", $data);
		$this->load->view("Base/footer");
		// echo json_encode($data);
	}

	public function detalle_consulta($consulta = null){
		$paciente = $this->Consultas_Model->obtenerIdPaciente($consulta); // Obteneiendo el id del paciente
		$data["paciente"] = $this->Consultas_Model->cabeceraConsulta($consulta);
		$data["medidas"] = $this->Consultas_Model->historialMedidas($paciente->idPaciente);

		// Datos actuales
			$data["consulta"] = $this->Consultas_Model->detalleConsulta($consulta);
		// Datos actuales
		

		$this->load->view("Base/header");
		$this->load->view("Consultas/detalle_consulta", $data);
		$this->load->view("Base/footer");

		// echo json_encode($data["consulta"]);
	}

	public function guardar_detalle_consulta(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();

			$datos["diagnostico"] = $datos["diagnosticoUno"]."<br>".$datos["diagnosticoDos"]."<br>".$datos["diagnosticoTres"];

			$bool = $this->Consultas_Model->guardarDetalleConsulta($datos);
			if($bool){
				$respuesta = array('estado' => 1, 'respuesta' => 'Exito');
				header("content-type:application/json");
				print json_encode($respuesta);

			}else{
				$respuesta = array('estado' => 0, 'respuesta' => 'Error');
				header("content-type:application/json");
				print json_encode($respuesta);
			}

			// echo json_encode($datos);

		}
		else{
			$respuesta = array('estado' => 0, 'respuesta' => 'Error');
			header("content-type:application/json");
			print json_encode($respuesta);
		}
	}

	public function buscar_diagnostico(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();
			$resp = $this->Consultas_Model->buscarDiagnostico($datos["str"]);
			print json_encode($resp);
		}else{
			echo "Error";
		}
	}
















    // Metodos para obtener los pacientes pendientes
		public function consultas_pendientes(){
			//$pivote = $this->session->userdata("acceso_h");
			 $pivote = 8;
			$destino = 0;
			$titulo = "";
			$fecha = date('Y-m-d');
			switch ($pivote) {
				case '14':
					$destino = 3;
					$titulo = "Lista de examenes pendientes";
					break;
				case '8':
					$destino = 2;
					$titulo = "Lista de ultrasonografias pendientes";
					break;
				
				default:
					$destino = 0;
					break; 
			}

			// Obteniendo el turno al que se agregara la ultra
				$turno = 0;
				if((date('h:i:s', time()) < date_create_from_format("h:i:s", "10:15:00")->format("h:i:s")) && (date('a', time()) == "am")){
					$turno = 1;
				}else{
					$turno = 2;
				}
			// Fin calcular turno
			$data["titulo"] = $titulo;
			$data["pendientes"] = $this->Consultas_Model->consultasPendientesHoy($fecha, $destino, $turno);
			$this->load->view("Base/header");
			$this->load->view("Consultas/listado_consultas", $data);
			$this->load->view("Base/footer");

		}


		public function liberar_cupo(){
			if($this->input->is_ajax_request()){
				$cupo = $this->input->post("idCupo");
				$bool = $this->Consultas_Model->liberarCupo($cupo);
				if($bool){
					echo "Good";
				}else{
					echo "Error";
				}
			}else{
				echo "Error";
			}
		}
		
		public function regresar_cupo(){
			if($this->input->is_ajax_request()){
				$cupo = $this->input->post("idCupo");
				$bool = $this->Consultas_Model->regresarCupo($cupo);
				if($bool){
					echo "Good";
				}else{
					echo "Error";
				}
			}else{
				echo "Error";
			}
		}
	// Fin procesos

    
}
