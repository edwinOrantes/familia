<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Consultas extends CI_Controller {

    public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/El_Salvador');
		if (!$this->session->has_userdata('valido')){
			$this->session->set_flashdata("error", "Debes iniciar sesión");
			redirect(base_url());
		}
        $this->load->model("Consultas_Model");
        $this->load->model("Laboratorio_Model");
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
			$data["historial_recetas"] = $this->Consultas_Model->recetasMedicas($paciente->idPaciente); // Historial detalles Consultas
			$data["historial_laboratorio"] = $this->Consultas_Model->fechasVisitas($paciente->idPaciente); // Historial laboratorio
		// Datos actuales
		
		$this->load->view("Base/header");
		$this->load->view("Consultas/detalle_consulta", $data);
		$this->load->view("Base/footer");

		// echo json_encode($data["historial_laboratorio"]);
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

	public function obtener_detalle_actual(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();
			$detalle = $this->Consultas_Model->detalleConsultaR($datos["id"]);
			print json_encode($detalle);
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

	public function guardar_cantidad_medicamento(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();

			$bool = $this->Consultas_Model->guardarCantidadMedicamento($datos);
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

	public function buscar_cantidades(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();
			$resp = $this->Consultas_Model->buscarCantidades($datos["str"]);
			print json_encode($resp);
		}else{
			echo "Error";
		}
	}
	public function validar_fecha(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();
			$agendadas = $this->Consultas_Model->validarFecha($datos);
			$disponibles = $this->Consultas_Model->cantidadConsultasMedico($datos["medico"]);

			if($agendadas->consultas < $disponibles->cantidadConsultas){
				$respuesta = array('estado' => 1, 'respuesta' => 'Exito');
				header("content-type:application/json");
				print json_encode($respuesta);

			}else{
				$respuesta = array('estado' => 0, 'respuesta' => 'Para esta fecha no hay cupos disponibles con este médico');
				header("content-type:application/json");
				print json_encode($respuesta);
			}

		}else{
			echo "Error";
		}
	}
	
	/* public function guardar_receta_medica(){
		if($this->input->is_ajax_request()){
			// $datos = $this->input->post();
			// Recibir los datos JSON enviados por AJAX
			$datosJSON = file_get_contents("php://input");
			// Decodificar los datos JSON a un array de PHP
			$datos = json_decode($datosJSON, true);
			$data = array();


			foreach ($datos as $row) {
				// Acceder a las propiedades de cada objeto

				
				// Aquí puedes hacer lo que desees con los datos, como guardarlos en la base de datos
				
				// Por ejemplo, puedes imprimirlos

				$listaMedidas = array();

				foreach ($row["detalle"] as $fila) {
					// echo json_encode($fila);
					$objeto = array(
						"medicamento" => $fila["medicamento"],
						"indicacion" => $fila["indicacion"]
					);
					// Agregar el arreglo al arreglo combinado
					array_push($listaMedidas, $objeto);
				}

				unset($row["detalle"]);
				$row["json"] = json_encode($listaMedidas);
			}

			$resp = $this->Consultas_Model->guardarRecetaMedica($row);
			if($resp > 0){
				$respuesta = array('estado' => 1, 'respuesta' => 'Exito', 'consulta' => $resp);
				header("content-type:application/json");
				print json_encode($respuesta);

			}else{
				$respuesta = array('estado' => 0, 'respuesta' => 'Error', 'consulta' => '0');
				header("content-type:application/json");
				print json_encode($respuesta);
			}

			// echo json_encode($datos);

		}
		else{
			$respuesta = array('estado' => 0, 'respuesta' => 'Error', 'consulta' => '0');
			header("content-type:application/json");
			print json_encode($respuesta);
		}
	} */

	public function guardar_receta_medica(){
		$datos = $this->input->post();
		
		// Creando Json de medidas
			// Crear un arreglo combinado
			$listaInsumos = array();
			$html = "";
			// Obtener el número de elementos en una de las matrices (se asume que todas tienen la misma longitud)
			$numElementos = count($datos["medicamento"]);
			// Iterar sobre la longitud de las matrices y combinar los datos
			for ($i = 0; $i < $numElementos; $i++) {
				// Crear un arreglo asociativo para cada conjunto de datos

				if($datos["medicamento"][$i]!= '' || $datos["indicacion"][$i] != '' || $datos["medida"][$i] != '') {
					$html .= '<tr>
						<td>'.$datos["medicamento"][$i].'</td>
						<td>'.$datos["indicacion"][$i].'</td>
						<td>'.$datos["medida"][$i].'</td>
					</tr>';
					$objeto = array(
						"medicamento" => $datos["medicamento"][$i],
						"indicacion" => $datos["indicacion"][$i],
						"medida" => $datos["medida"][$i],
					);
					// Agregar el arreglo al arreglo combinado
					array_push($listaInsumos, $objeto);
				}

			}
			unset($datos["medicamento"], $datos["indicacion"], $datos["medida"], $datos["htmlReceta"]);
			$datos["html"] = $html;
			$datos["medidas"] = json_encode($listaInsumos);
		// Creando Json de medidas

			
			$bool = $this->Consultas_Model->guardarRecetaMedica($datos);
			if($bool){
				$this->session->set_flashdata("exito","Los datos fueron agregados con exito!");
				redirect(base_url()."Consultas/detalle_consulta/".$datos['consultaActual']."/");
			}else{
				$this->session->set_flashdata("error","Hubo un error al agregar los datos!");
				redirect(base_url()."Consultas/detalle_consulta/".$datos['consultaActual']."/");
			}

			// echo json_encode($datos);
	}


	public function receta_medica($r = null){

		$data["detalle"] = $this->Consultas_Model->detalleReceta($r);
		// Receta
			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
			$mpdf = new \Mpdf\Mpdf([
				'margin_left' => 15,
				'margin_right' => 15,
				'margin_top' => 40,
				'margin_bottom' => 25,
				'margin_header' => 15,
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
			$mpdf->Output('receta_medica', 'I');
		// Receta

		// echo json_encode($data);
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
