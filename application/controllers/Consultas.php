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
			$data["antecedentes"] = $this->Consultas_Model->antecedentesConsulta($paciente->idPaciente);
			$data["historial_detalles"] = $this->Consultas_Model->historialDetallesConsultas($paciente->idPaciente); // Historial detalles Consultas
		// Datos actuales
		
		$this->load->view("Base/header");
		$this->load->view("Consultas/detalle_consulta", $data);
		$this->load->view("Base/footer");

		// echo json_encode($data["historial_detalles"]);
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

	public function guardar_antecedentes_consulta(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();

			$bool = $this->Consultas_Model->guardarAntecedentesConsulta($datos);
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

	public function guardar_horario_medicina(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();

			$bool = $this->Consultas_Model->guardarDetalleHorario($datos);
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

	public function buscar_medicamento(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();
			$resp = $this->Consultas_Model->buscarMedicamento($datos["str"]);
			print json_encode($resp);
		}else{
			echo "Error";
		}
	}

	public function buscar_indicaciones(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();
			$resp = $this->Consultas_Model->buscarIndicaciones($datos["str"]);
			print json_encode($resp);
		}else{
			echo "Error";
		}
	}


	public function receta_medica(){
		$data = array();
		// Factura
			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
			$mpdf = new \Mpdf\Mpdf([
				'margin_left' => 15,
				'margin_right' => 15,
				'margin_top' => 30,
				'margin_bottom' => 25,
				'margin_header' => 10,
				'margin_footer' => 25
			]);
			$mpdf->SetHTMLHeader('
					<div class="cabecera" style="font-family: Times New Roman">
						<div class="img_cabecera"><img src="'.base_url().'public/img/logo.jpg"></div>
						<div class="title_cabecera">
							<h5 style="line-height: 20px">Avenida Ferrocarril, #51 Barrio la Cruz, frente a la Iglesia Adventista, El Tránsito, San Miguel, PBX: 2605-6298</h5>
						</div>
					</div>
				');
			//$mpdf->setFooter('{PAGENO}');
			/* $mpdf->SetHTMLFooter('
				<table width="100%">
					<tr>
						<td width="33%" style="text-align: center; border-top: 1px solid #0b88c9"><strong style="font-size: 11px; color: #0b88c9">Firma y sello del profesional</td>
						<td width="33%" align="center"><strong style="font-size: 11px; color: #0b88c9">{PAGENO}/{nbpg}</strong></td>
						<td width="33%" style="text-align: center; border-top: 1px solid #0b88c9"><strong style="font-size: 11px; color: #0b88c9">Sello del laboratorio</strong></td>
					</tr>
				</table>'); */
			$mpdf->SetProtection(array('print'));
			$mpdf->SetTitle("Hospital Orellana, Usulutan");
			$mpdf->SetAuthor("Edwin Orantes");
			//$mpdf->SetWatermarkText("Hospital Orellana, Usulutan");
			$mpdf->showWatermarkText = true;
			$mpdf->watermark_font = 'DejaVuSansCondensed';
			$mpdf->watermarkTextAlpha = 0.1;
			$mpdf->SetDisplayMode('fullpage');
			//$mpdf->AddPage('L'); //Voltear Hoja

			$html = $this->load->view('Consultas/receta_medica', $data,true); // Cargando hoja de estilos

			$mpdf->WriteHTML($html);
			$mpdf->Output('examen_bacteriologia.pdf', 'I');
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
