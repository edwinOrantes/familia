<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// Clases para el reporte en excel
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

class Medico extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/El_Salvador');
		if (!$this->session->has_userdata('valido')){
			$this->session->set_flashdata("error", "Debes iniciar sesión");
			redirect(base_url());
		}
		$this->load->model("Medico_Model");
	}

	public function index(){
		$data["medicos"] = $this->Medico_Model->obtenerMedicos();
		$this->load->view('Base/header');
		$this->load->view('Medico/lista_medicos', $data);
		$this->load->view('Base/footer');
    }
	
	public function prueba(){
		$this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
		redirect(base_url()."Medico/");
	}

	public function actualizar_medico(){
		$data = $this->input->post();
		$datos = array('nombreMedico ' => $data['nombreMedicoA'], 'especialidadMedico ' => $data['especialidadMedicoA'],
		'telefonoMedico ' => $data['telefonoClinicaA'], 'direccionMedico ' => $data['direccionMedicoA'], 'idMedico ' => $data['idMedicoA']);
		$bool = $this->Medico_Model->actualizarMedico($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
			redirect(base_url()."Medico/");
		}else{
			$this->session->set_flashdata("error","Los datos no fueron actualizados!");
			redirect(base_url()."Medico/");
		}
	}
	
	public function guardar_medico(){
		$datos = $this->input->post();
		// Datos para el servicio externo
			$externo["medico"] = $datos["nombreMedico"];
			$externo["tipoEntidad"] = 1;
			$externo["descripcionExterno"] = "Para pago de honorarios";
			// Creando un solo arreglo
			$data["medico"] = $datos;
			$data["externo"] = $externo;
		$bool = $this->Medico_Model->guardarMedico($data);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
			redirect(base_url()."Medico/");
		}else{
			$this->session->set_flashdata("error","Error al guardar los datos!");
			redirect(base_url()."Medico/");
		}

	}

	public function eliminar_medico(){
		$id = $this->input->post('idEliminar');
		$data = array('idMedico' => $id );
		$bool = $this->Medico_Model->eliminarMedico($data);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron eliminados con exito!");
			redirect(base_url()."Medico/");
		}else{
			$this->session->set_flashdata("error","Error al eliminar los datos!");
			redirect(base_url()."Medico/");
		}
	}

	public function medicos_excel(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Id');
		$sheet->setCellValue('B1', 'Nombre');
		$sheet->setCellValue('C1', 'Especialidad');
		$sheet->setCellValue('D1', 'Telefono');
		$sheet->setCellValue('E1', 'Dirección');
			
		$datos = $this->Medico_Model->obtenerMedicos();
		$number = 1;
		$flag = 2;
		foreach($datos as $d){
			$sheet->setCellValue('A'.$flag, $number);
			$sheet->setCellValue('B'.$flag, $d->nombreMedico);
			$sheet->setCellValue('C'.$flag, $d->especialidadMedico);
			$sheet->setCellValue('D'.$flag, $d->telefonoMedico);
			$sheet->setCellValue('E'.$flag, $d->direccionMedico);
				
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
		$sheet->getStyle('A1:H1')->getFont()->setBold(true);		
		//$sheet->getStyle('A1:H10')->applyFromArray($styleThinBlackBorderOutline);
		//Alignment
		//fONT SIZE
		$sheet->getStyle('A1:H10')->getFont()->setSize(12);
		//$sheet->getStyle('A1:E2')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

		//$sheet->getStyle('A2:D100')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			//Custom width for Individual Columns
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$curdate = date('d-m-Y H:i:s');
		$writer = new Xlsx($spreadsheet);
		$filename = 'listado_medicos'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}
	
}

