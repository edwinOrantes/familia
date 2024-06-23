<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// Clases para el reporte en excel

use Mpdf\Tag\Dd;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	use PhpOffice\PhpSpreadsheet\Helper\Sample;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	use PhpOffice\PhpSpreadsheet\RichText\RichText;
	use PhpOffice\PhpSpreadsheet\Shared\Date;
	use PhpOffice\PhpSpreadsheet\Style\Alignment;
	use PhpOffice\PhpSpreadsheet\Style\Border;
	use PhpOffice\PhpSpreadsheet\Style\Color;
	use PhpOffice\PhpSpreadsheet\Style\Fill;
	use PhpOffice\PhpSpreadsheet\Style\Font;
	use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
	use PhpOffice\PhpSpreadsheet\Style\Protection;
	use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
	use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
	use PhpOffice\PhpSpreadsheet\Worksheet\ColumnDimension;
	use PhpOffice\PhpSpreadsheet\Worksheet;

class Paciente extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/El_Salvador');
		if (!$this->session->has_userdata('valido')){
			$this->session->set_flashdata("error", "Debes iniciar sesión");
			redirect(base_url());
		}
		$this->load->model("Paciente_Model");
		$this->load->model("Medico_Model");
		$this->load->model("Usuarios_Model");
		$this->load->model("Hoja_Model");
		$this->load->model("Laboratorio_Model");
		$this->load->model("Consultas_Model");
	}

	public function agregar_pacientes(){
		$data["departamentos"] = $this->Paciente_Model->obtenerDepartamentos();
		$data["municipios"] = $this->Paciente_Model->allMunicipios();
		$data["medicos"] = $this->Medico_Model->obtenerMedicos();
		$this->load->view('Base/header');
		$this->load->view('Paciente/agregar_paciente', $data);
		$this->load->view('Base/footer');
		// echo json_encode($data["municipios"]);
    }
    
    public function lista_pacientes(){
		
		/* $pacientes = $this->Paciente_Model->obtenerPacientes();
		$departamentos = $this->Paciente_Model->obtenerDepartamentos();
		$medicos = $this->Medico_Model->obtenerMedicos();
		$data = array('pacientes' => $pacientes, 'departamentos' => $departamentos, 'medicos' => $medicos); */

		$this->load->view('Base/header');
		// $this->load->view('Paciente/lista_paciente', $data);
		$this->load->view('Paciente/busqueda_paciente');
		$this->load->view('Base/footer');
		
	}

	public function resultado_busqueda($txt = null){
		$parametro = "";
		if($this->input->post()) {
			$parametro = $datos = $this->input->post("busquedaPaciente");
		} else {
			$parametro = str_replace("%20"," ", $txt);
		}

		$datos = $this->input->post();
		$pacientes = $this->Paciente_Model->busquedaPaciente(trim($parametro));
		$departamentos = $this->Paciente_Model->obtenerDepartamentos();
		$medicos = $this->Medico_Model->obtenerMedicos();
		$data = array('pacientes' => $pacientes, 'departamentos' => $departamentos, 'medicos' => $medicos);

		$this->load->view('Base/header');
		$this->load->view('Paciente/lista_paciente', $data);
		$this->load->view('Base/footer');

		// echo json_encode($parametro);
	}

	public function buscar_por_dui(){
		$datos = $this->input->post();
		$params["paciente"] = $datos["duiPaciente"];
		$params["pivote"] = 0;

		$paciente = $this->Paciente_Model->validadPaciente($params);

		if(!is_null($paciente)){
			$data["pacientes"] = $this->Paciente_Model->busquedaPaciente(trim($paciente->nombrePaciente));
			$this->load->view('Base/header');
			$this->load->view('Paciente/lista_paciente', $data);
			$this->load->view('Base/footer');
		}else{
			$this->session->set_flashdata("error","El paciente no fue encontrado");
			redirect(base_url()."Paciente/lista_pacientes");
		}
		// echo json_encode($paciente);
	}

	public function detalle_paciente($id){
		$data["paciente"] = $this->Paciente_Model->detallePaciente($id);
		$data["expedientes"] = $this->Paciente_Model->hojasPaciente($id);
		$data["laboratorio"] = $this->Laboratorio_Model->historialConsultasXPaciente($id);
		$data["consultas"] = $this->Consultas_Model->consultasPorPaciente($id);

		$data["historial_recetas"] = $this->Consultas_Model->recetasMedicas($id); // Historial detalles Consultas

		// Laboratorio
			$data["historial_hematologia"] = $this->Laboratorio_Model->historialHematologia($id);
			$data["historial_quimica"] = $this->Laboratorio_Model->historialQuimica($id);
			$data["historial_urianalisis"] = $this->Laboratorio_Model->historialUrianalisis($id);
			$data["historial_coprologia"] = $this->Laboratorio_Model->historialCoprologia($id);
			$data["historial_varios"] = $this->Laboratorio_Model->historialVarios($id);
			$data["historial_bacteriologia"] = $this->Laboratorio_Model->historialBacteriologia($id);
		// Laboratorio


		$this->load->view('Base/header');
		$this->load->view('Paciente/detalle_paciente', $data);
		$this->load->view('Base/footer');

		// echo json_encode($data["consultas"]);
	}

	// Municipios de El Salvador
	public function obtener_municipios(){
		if($this->input->is_ajax_request())
		{
			$id =$this->input->get("id");
			$datos = $this->Paciente_Model->obtenerMunicipios($id);
			echo json_encode($datos);
		}
		else
		{
			echo "Error...";
		}
	}

	public function agregar_paciente(){
		$datos = $this->input->post();
		
		//Pacientes
			$paciente["duiPaciente"] = $datos["duiPaciente"];
			$paciente["nombrePaciente"] = $datos["nombrePaciente"];
			$paciente["nacimientoPaciente"] = $datos["nacimientoPaciente"];
			$paciente["telefonoPaciente"] = $datos["telefonoPaciente"];
			$paciente["edadPaciente"] = $datos["edadPaciente"];
			$paciente["civilPaciente"] = $datos["civilPaciente"];
			$paciente["sexoPaciente"] = $datos["sexoPaciente"];
			$paciente["departamentoPaciente"] = $datos["departamentoPaciente"];
			$paciente["municipioPaciente"] = $datos["municipioPaciente"];
			$paciente["direccionPaciente"] = $datos["direccionPaciente"];
			$paciente["idPaciente"] = $datos["idPaciente"];
		//Pacientes

		// Responsables
			$responsable["nombreResponsable"] = $datos["nombreResponsable"];
			$responsable["telefonoResponsable"] = $datos["telefonoResponsable"];
			$responsable["duiResponsable"] = $datos["duiResponsable"];
			$responsable["parentescoResponsable"] = $datos["parentescoResponsable"];
			
			if($datos["edadPaciente"] < 18){
				$responsable["pivote"] = 0;
			}else{
				$responsable["pivote"] = 1;
			}
		// Responsables

		if($paciente["idPaciente"] == 0){
			unset($paciente["idPaciente"]);
			$bool = $this->Paciente_Model->guardarPaciente($paciente);// Agregar paciente
		}else{
			$bool = $this->Paciente_Model->actualizarPaciente($paciente); // Actualizar paciente
		}
		
		
		// Responsable
			if($datos["idResponsable"] == 0){
				$responsable["idMenor"] = $bool;
				$responsable["accion"] = 1;
			}else{
				$responsable["idResponsable"] = $datos["idResponsable"];
				$responsable["accion"] = 2;
			}
		// Responsable
		
		if($bool){
			$bool2 = $this->Paciente_Model->guardarResponsables($responsable);
			$this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
			redirect(base_url()."Paciente/motivo_paciente/".$bool."/"); // Redirigiendo al siguiente paso
		}else{
			$this->session->set_flashdata("error","Hubo un error al guardar los datos!");
			redirect(base_url()."Paciente/agregar_pacientes");
		}
		
		// echo json_encode($datos);

	}

	public function actualizar_paciente(){
		$datos = $this->input->post();
		$return = 0;
		if(isset($datos["returnHoja"])){
			$return = 1;
			$hoja = $datos["idHojaCobro"];
			unset($datos["returnHoja"]);
			unset($datos["idHojaCobro"]);

			// Se visualizo el resumen
			$bitacora["idCuenta"] = $hoja;
			$bitacora["idUsuario"] = $this->session->userdata('id_usuario_h');
			$bitacora["usuario"] = $this->session->userdata('usuario_h');
			$bitacora["descripcionBitacora"] = "Actualizo los datos del paciente";
			
		// Se visualizo el resumen
		}

		$bool = $this->Paciente_Model->actualizarPacienteHoja($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
			if($return == 0){
				redirect(base_url()."Paciente/resultado_busqueda/".$datos["nombrePaciente"]);
			}else{
				$this->Usuarios_Model->insertarMovimientoHoja($bitacora); // Capturando movimiento de la hoja de cobro
				redirect(base_url()."Hoja/detalle_hoja/".$hoja."/");
			}
		}else{
			$this->session->set_flashdata("error","Hubo un error al actualizar los datos!");
			if($return == 0){
				redirect(base_url()."Paciente/lista_pacientes/".$datos["nombrePaciente"]);
			}else{
				redirect(base_url()."Hoja/detalle_hoja/".$hoja."/");
			}
			
		}
		
	}


	/* public function motivo_paciente($param = null){
		$data["paciente"] = $this->Paciente_Model->detallePaciente($param);
		$data["medicos"] = $this->Medico_Model->obtenerMedicos();
		$data["habitaciones"] = $this->Paciente_Model->obtenerHabitaciones2();

		$codigo = $this->Hoja_Model->codigoHoja(); // Ultimo codigo de hoja
		$cod = 0;
		if($codigo->codigoHoja == NULL ){
			$cod = 1000;
		}else{
			$cod = ($codigo->codigoHoja + 1);
		}
		$data["codigo"] = $cod;

		$this->load->view('Base/header');
		$this->load->view('Paciente/motivo_paciente', $data);
		$this->load->view('Base/footer');

		// echo json_encode($data);
	} */

	public function motivo_paciente($param = null){
		$existe_hoja = $this->Hoja_Model->existeHoja($param, date('Y-m-d'));
		if(is_null($existe_hoja)){
			// Crear hoja cobro
				$codigo = $this->Hoja_Model->codigoHoja(); // Ultimo codigo de hoja
				$cod = 0;
				if($codigo->codigoHoja == NULL ){
					$cod = 1000;
				}else{
					$cod = ($codigo->codigoHoja + 1);
				}
				$hoja["codigo"] = $cod;
				$hoja["tipo"] = "Ambulatoria";
				$hoja["idMedico"] = 1;
				$hoja["fecha"] = date('Y-m-d');
				$hoja["destino"] = 0;
				$hoja["habitacion"] = 1;
				$hoja["para"] = "";
				$hoja["paciente"] = $param;
				$idHoja = $this->Hoja_Model->guardarHoja($hoja);
				if($idHoja > 0){
					// Datos para bitacora -Anular externo cuenta
						$bitacora["idCuenta"] = $idHoja ;
						$bitacora["idUsuario"] = $this->session->userdata('id_usuario_h');
						$bitacora["usuario"] = $this->session->userdata('usuario_h');
						$bitacora["descripcionBitacora"] = "Creo la hoja de cobro a nombre del paciente: ";
					// Fin datos para bitacora -Anular externo cuenta
					$this->Usuarios_Model->insertarMovimientoHoja($bitacora); // Capturando movimiento de la hoja de cobro
				}
			// Crear hoja cobro
		}else{
			$idHoja = $existe_hoja->idHoja;
		}

		
		$data["paciente"] = $this->Paciente_Model->detallePaciente($param);
		$data["examenes"] = $this->Paciente_Model->obtenerExamenes();
		$data["medicos"] = $this->Medico_Model->obtenerMedicos();
		$data["hoja"] = $idHoja;
		// Detalle de la hoja
			$data["detalleHoja"] = $this->Hoja_Model->medicamentosHoja($idHoja);
		// Detalle de la hoja
		
		
		$this->load->view('Base/header');
		$this->load->view('Paciente/motivo_paciente', $data);
		$this->load->view('Base/footer');

		// echo json_encode($data["hoja"]);
	}

	public function eliminar_paciente(){
		$datos = $this->input->post();
		$bool = $this->Paciente_Model->eliminarPaciente($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron eliminados con exito!");
			redirect(base_url()."Paciente/lista_pacientes");
		}else{
			$this->session->set_flashdata("error","Hubo un error al aliminar los datos!");
			redirect(base_url()."Paciente/lista_pacientes");
		}
	}

	public function lista_pacientes_excel(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Nombre');
		$sheet->setCellValue('B1', 'Edad');
		$sheet->setCellValue('C1', 'Teléfono');
		$sheet->setCellValue('D1', 'DUI');
		$sheet->setCellValue('E1', 'Fecha de nacimiento');
		$sheet->setCellValue('F1', 'Dirección');
			
		$datos = $this->Paciente_Model->obtenerPacientes();
		$number = 1;
		$flag = 2;
		foreach($datos as $d){
			$sheet->setCellValue('A'.$flag, $d->nombrePaciente);
			$sheet->setCellValue('B'.$flag, $d->edadPaciente);
			$sheet->setCellValue('C'.$flag, $d->telefonoPaciente);
			$sheet->setCellValue('D'.$flag, $d->duiPaciente);
			$sheet->setCellValue('E'.$flag, $d->nacimientoPaciente);
			$sheet->setCellValue('F'.$flag, $d->direccionPaciente);
				
			$flag = $flag+1;
			$number = $number+1;
		}
		
		
		$styleThinBlackBorderOutline = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => Border::BORDER_THIN,
							'color' => ['argb' => 'FF000000'],
						],
					],
				];
		//Font BOLD
		$sheet->getStyle('A1:F1')->getFont()->setBold(true);		
		//$sheet->getStyle('A1:K10')->applyFromArray($styleThinBlackBorderOutline);
		//Alignment
		//fONT SIZE
		$sheet->getStyle('A1:F10')->getFont()->setSize(12);
		//$sheet->getStyle('A1:E2')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

		//$sheet->getStyle('A2:D100')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			//Custom width for Individual Columns
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$curdate = date('d-m-Y H:i:s');
		$writer = new Xlsx($spreadsheet);
		$filename = 'listado_pacientes '.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}

	// Control de habitaciones
	public function paciente_habitacion(){
		$this->load->view('Base/header');
		
		$pacientes = $this->Paciente_Model->obtenerPacientesHabitacion();
		
		$data = array('pacientes' => $pacientes);

		$this->load->view('Paciente/paciente_habitacion', $data);
		$this->load->view('Base/footer');

		

	}	

	// Obteniendo DUI de paciente para validad
	public function validar_paciente(){
		if($this->input->is_ajax_request()){
			$datos =$this->input->post();
			$data = $this->Paciente_Model->validadPaciente($datos);
			if(!is_null($data) > 0){
				$fecha1 = new DateTime($data->nacimientoPaciente);
				$fecha2 = new DateTime(date('Y-m-d'));
				$diferencia = $fecha1->diff($fecha2);
				$data->edadPaciente = $diferencia->y;

				$respuesta = array('estado' => 1, 'respuesta' => 'Exito', 'datos' => $data);
				header("content-type:application/json");
				print json_encode($respuesta);
			}else{
				$respuesta = array('estado' => 0, 'respuesta' => 'Error', 'datos' => null );
				header("content-type:application/json");
				print json_encode($respuesta);
			}
		}
		else{
			$respuesta = array('estado' => 0, 'respuesta' => 'Error', 'datos' => null );
			header("content-type:application/json");
			print json_encode($respuesta);
		}
	}

	// Agregando consulta
		public function agregar_consulta(){
			if($this->input->is_ajax_request()){
				$datos =$this->input->post();
				// Consulta
					$consulta["idPaciente"] = $datos["idPaciente"];
					$consulta["idMedico"] = $datos["idMedico"];
					$consulta["nombrePaciente"] = $datos["nombrePaciente"];
					$consulta["pesoPaciente"] = $datos["peso"];
					$consulta["alturaPaciente"] = $datos["altura"];
					$consulta["imcPaciente"] = $datos["imcPaciente"];
					$consulta["temperatura"] = $datos["temperatura"];
					$consulta["presion"] = $datos["presion"];

					$consulta["fcPaciente"] = $datos["fcPaciente"];
					$consulta["frPaciente"] = $datos["frPaciente"];
					$consulta["satPaciente"] = $datos["satPaciente"];
					$consulta["pcPaciente"] = $datos["pcPaciente"];

					$consulta["fechaHoja"] = $datos["fecha"];
					$consulta["hoja"] = $datos["idHoja"];
				// Consulta

				// Agregar a la hoja de cobro
					$medicamento["idHoja"] = $datos["idHoja"];
					$medicamento["idMedicamento"] = $datos["idM"];
					$medicamento["precioMedicamento"] = $datos["precioM"];
					$medicamento["cantidadMedicamento"] = 1;
					$medicamento["detalle"] = "";
					$medicamento["fechaHoja"] = date("y-m-d");
					$medicamento["por"] = $this->session->userdata('id_usuario_h');
				// Agregar a la hoja de cobro

				// Datos para bitacora -Restaurar cuenta
					$bitacora["idCuenta"] = $this->input->post("idHoja");
					$bitacora["idUsuario"] = $this->session->userdata('id_usuario_h');
					$bitacora["usuario"] = $this->session->userdata('usuario_h');
					$bitacora["descripcionBitacora"] = "Agrego 1 elementos de ".$datos['nombreMedicamento'].", con precio de $".$datos['precioM'];
				// Fin datos para bitacora -Restaurar cuenta
				
				$resp = $this->Hoja_Model->guardarConsulta($consulta); // Capturando movimiento de la hoja de cobro
				if($resp){
					$bool = $this->Hoja_Model->guardarDetalleHojaUnitario($medicamento);
					if($bool){
						$this->Usuarios_Model->insertarMovimientoHoja($bitacora); // Capturando movimiento de la hoja de cobro
						$respuesta = array('estado' => 1, 'respuesta' => 'Exito');
						header("content-type:application/json");
						print json_encode($respuesta);
					}else{
						$respuesta = array('estado' => 0, 'respuesta' => 'Error');
						header("content-type:application/json");
						print json_encode($respuesta);
					}
				}else{
					$respuesta = array('estado' => 0, 'respuesta' => 'Error');
					header("content-type:application/json");
					print json_encode($respuesta);
				}

				
			}
			else{
				echo "Error...";
			}
		}
	// Agregando consulta

	// Agregando examenes
		public function agregar_examenes(){
			if($this->input->is_ajax_request()){
				$datos =$this->input->post();
				// Medicamento
					$medicamento["idHoja"] = $datos["idHoja"];
					$medicamento["idMedicamento"] = $datos["idMedicamento"];
					$medicamento["precioMedicamento"] = $datos["precioV"];
					$medicamento["cantidadMedicamento"] = $datos["cantidad"];
					$medicamento["detalle"] = $datos["detalle"];
					$medicamento["fechaHoja"] = date("Y-m-d");;
					$medicamento["por"] = $this->session->userdata('id_usuario_h');
				// Medicamento
				// Datos para bitacora -Restaurar cuenta
					$bitacora["idCuenta"] = $datos["idHoja"];
					$bitacora["idUsuario"] = $this->session->userdata('id_usuario_h');
					$bitacora["usuario"] = $this->session->userdata('usuario_h');
					$bitacora["descripcionBitacora"] = "Agrego el examen ".$datos['nombreMedicamento'].", con precio de $".$datos['precioV'];
				// Fin datos para bitacora -Restaurar cuenta

				$bool = $this->Hoja_Model->guardarDetalleHojaUnitario($medicamento);
				if($bool){
					$this->Usuarios_Model->insertarMovimientoHoja($bitacora); // Capturando movimiento de la hoja de cobro
					$respuesta = array('estado' => 1, 'respuesta' => 'Exito');
					header("content-type:application/json");
					print json_encode($respuesta);
				}else{
					$respuesta = array('estado' => 0, 'respuesta' => 'Error');
					header("content-type:application/json");
					print json_encode($respuesta);
				}

				// echo json_encode($bitacora);
			}
			else{
				echo "Error...";
			}
		}
	// Agregando examenes





















	public function esquema_habitaciones(){
		$this->load->view('Base/header');
		$habitaciones = $this->Paciente_Model->obtenerHabitaciones();
		$data = array('habitaciones' => $habitaciones);
		$this->load->view('Paciente/habitaciones', $data);
		$this->load->view('Base/footer');

	}

	public function detalle_habitacion(){
		if($this->input->is_ajax_request()){
			$id =$this->input->get("id");
			$data = $this->Paciente_Model->detalleHabitacion($id);
			echo json_encode($data);
		}
		else{
			echo "Error...";
		}
	}

	public function senso_diario(){
		$fecha = date('Y-m-d');
		$data["detalleSenso"] = $this->Paciente_Model->sensoHoy($fecha);
		
		$this->load->view("Base/header");
		$this->load->view("Paciente/senso_hoy", $data);
		$this->load->view("Base/footer");
	}

	public function obtener_detalle(){
		if($this->input->is_ajax_request()){
			$paciente =$this->input->post("id");
			$data = $this->Paciente_Model->obtenerDetalle(trim($paciente));
			echo json_encode($data);
		}else{
			echo "Error";
		}
	}

	// Busqueda asincrona de paciente
		public function busqueda_paciente(){
			if($this->input->is_ajax_request()){
				$paciente =$this->input->post("paciente");
				$data = $this->Paciente_Model->busquedaPaciente(trim($paciente));
				echo json_encode($data);
			}else{
				echo "Error";
			}
		}

		public function recomendaciones_paciente(){
			if($this->input->is_ajax_request()){
				$id =$this->input->get("id");
				$data = $this->Paciente_Model->buscarRecomendaciones(trim($id));
				echo json_encode($data);
			}
			else{
				echo "Error...";
			}
		}
	// Fin busqueda

}
