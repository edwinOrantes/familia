<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

class Proveedor extends CI_Controller {

    public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/El_Salvador');
		if (!$this->session->has_userdata('valido')){
			$this->session->set_flashdata("error", "Debes iniciar sesión");
			redirect(base_url());
		}
		$this->load->model("Proveedor_Model");
	}

    public function index(){
        $datos = $this->Proveedor_Model->obtenerProveedores();
        $ultimoCodigo = $this->Proveedor_Model->ultimoCodigo();
        $codigo = $ultimoCodigo->codigo;
        if($codigo  == null){ 
            $codigo = 1000; 
        }else{ 
            $codigo = $codigo + 1;
        }
        $data = array('proveedores' => $datos, 'cod' => $codigo);
        $this->load->view('Base/header');
		$this->load->view('Botiquin/proveedores', $data);
        $this->load->view('Base/footer');
        
    }

	public function guardar_proveedor(){
        $datos = $this->input->post();

		// Datos para el servicio externo
		$externo["proveedor"] = $datos["empresaProveedor"];
		$externo["tipoEntidad"] = 2;
		$externo["descripcionExterno"] = "Para pago de honorarios";
		// Creando un solo arreglo
		$data["proveedor"] = $datos;
		$data["externo"] = $externo;



        $bool = $this->Proveedor_Model->guardarProveedor($data);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
			redirect(base_url()."Proveedor/");
		}else{
			$this->session->set_flashdata("error","Error al guardar los datos!");
			redirect(base_url()."Proveedor/");
		}

		// echo json_encode($datos);
    }

    public function actualizar_proveedor(){
        $datos = $this->input->post();
		$bool = $this->Proveedor_Model->actualizarProveedor($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
			redirect(base_url()."Proveedor/");
		}else{
			$this->session->set_flashdata("error","Error al actualizar los datos!");
			redirect(base_url()."Proveedor/");
		}

		// echo json_encode($datos);
    }

    public function eliminar_proveedor(){
        $datos = $this->input->post();
        $bool = $this->Proveedor_Model->eliminarProveedor($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron eliminados con exito!");
			redirect(base_url()."Proveedor/");
		}else{
			$this->session->set_flashdata("error","Error al eliminar los datos!");
			redirect(base_url()."Proveedor/");
		}
    }

    public function lista_proveedores_excel(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Código');
		$sheet->setCellValue('B1', 'Proveedor');
		$sheet->setCellValue('C1', 'NRC');
		$sheet->setCellValue('D1', 'Visitador');
		$sheet->setCellValue('E1', 'Teléfono');
		$sheet->setCellValue('F1', 'Plazo pago');
		$sheet->setCellValue('G1', 'Tipo contribuyente');
		$sheet->setCellValue('H1', 'Direccion');

			
		$datos = $this->Proveedor_Model->obtenerProveedores();
		$number = 1;
		$flag = 2;
		foreach($datos as $d){
			$sheet->setCellValue('A'.$flag, $d->codigoProveedor);
			$sheet->setCellValue('B'.$flag, $d->empresaProveedor);
			$sheet->setCellValue('C'.$flag, $d->nrcProveedor);
			$sheet->setCellValue('D'.$flag, $d->visitadorProveedor);
			$sheet->setCellValue('E'.$flag, $d->telefonoProveedor);
			$sheet->setCellValue('F'.$flag, $d->plazoProveedor." dias");
			$sheet->setCellValue('G'.$flag, $d->tipoContribuyente);
			$sheet->setCellValue('H'.$flag, $d->direccionProveedor);
				
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

			//Custom width for Individual Columns
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
		$sheet->getColumnDimension('H')->setAutoSize(true);
		$curdate = date('d-m-Y H:i:s');
		$writer = new Xlsx($spreadsheet);
		$filename = 'listado_proveedores '.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}
    
}
