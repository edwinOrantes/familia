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


class Planilla extends CI_Controller {

    public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/El_Salvador');
        $this->load->model("Planilla_Model");
		if (!$this->session->has_userdata('valido')){
			$this->session->set_flashdata("error", "Debes iniciar sesión");
			redirect(base_url());
		}
	}

    public function index(){
        $this->load->view('Base/header');
		$this->load->view('Planilla/crear_planilla');
		$this->load->view('Base/footer');

		// echo json_encode($data["personal"]);
    }

	public function crear_planilla(){
		$datos = $this->input->post();

		$resp = $this->Planilla_Model->crearPlanilla($datos); // true si se realizo la consulta.
		if($resp > 0){
			$this->session->set_flashdata("exito","La planilla fue creada con exito!");
			redirect(base_url()."Planilla/agregar_personal/".$resp."/");
		}else{
			$this->session->set_flashdata("error","Error al crear la planilla!");
			redirect(base_url()."Planilla/");
		}

		// echo json_encode($datos);
	}

	public function agregar_personal($flag = null){
		$datos = $this->Planilla_Model->personalPlanilla();
		$count = 0;
		foreach ($datos as $row) {
			// echo json_encode($row->salarioEmpleado);
			$base = $row->salarioEmpleado;
			$salario = $row->salarioEmpleado/2;
			// Calculo del ISSS
				switch ($base) {
					case( ($base >= 1) && ($base <= 1000)):
						$isss = $salario * 0.03;
						break;
					case ($base > 1000 ):
						$isss = 30/2;
						break;
						
					default:
						$isss = $base * 0.03;
						break;
				}
			//Fin calculo ISSS
		
			$afp = $salario * 0.0725;  // Calculando porcentaje a descontar de AFP
			
			switch ($row->pivoteRetenciones) {
				case '1':
					$isss = 0;
					$afp = 0;
					$totalRetenciones = 0;
					break;
				case '3':
					$isss = 0;
					$afp = 0;
					$totalRetenciones = 0;
					break;
				
				default:
					$totalRetenciones = $isss + $afp; //Sumando retenciones
					break;
			}

			$salario = $salario - $totalRetenciones;
		
			// Calculo de la renta
				switch ($salario) {
					case ( ($salario >= 1) && ($salario <= 236)):
						$renta = 0;
						break;
					case ( ($salario > 236) && ($salario <= 447.62)):
						$renta = 8.83 + (($salario -236 )* 0.10);
						break;
					case ( ($salario > 447.62) && ($salario <= 1019.05)):
						$renta = 30 + (($salario - 447.62 ) * 0.20);
						break;
					
					case ( ($salario > 1019.05) && ($salario <= 1000000000)):
						$renta = 144.28 + (($salario - 1019.05 ) * 0.30);
						break;
					
					default:
						# code...
						break;
				}
			// Fin calculo renta
			
			switch ($row->pivoteRetenciones) {
				case '1':
					$renta = ($base/2) *0.10;
					$salario = $salario - $renta ; // Descontando la renta
					break;
				case '3':
					$renta = 0;
					$salario = $salario - $renta ; // Descontando la renta
					break;
				default:
					$salario = $salario - $renta ;
					break;
			}

			if(($row->bonoEmpleado > 0)){
				$salario += ($row->bonoEmpleado/2); // Sumando el bono, si hay
			}
			$personal[$count]["idEmpleado"] = $row->idEmpleado;
			$personal[$count]["salarioEmpleado"] = $row->salarioEmpleado;
			$personal[$count]["precioHoraExtra"] = $row->precioHoraExtra;
			$personal[$count]["bonoEmpleado"] = $row->bonoEmpleado;
			$personal[$count]["isss"] = $isss;
			$personal[$count]["afp"] = $afp;
			$personal[$count]["renta"] = $renta;
			$personal[$count]["liquido"] = round($salario, 2);
			$count++;

			//echo $row->nombreEmpleado." --- ".$row->areaEmpleado." --- ".$row->pivoteRetenciones."<br>";
		}
		$data["personal"] = $personal;
		$resp = $this->Planilla_Model->guardarPersonalPlanilla($data, $flag); // true si se realizo la consulta.
		if($resp ){
			$this->session->set_flashdata("exito","La planilla fue creada con exito!");
			redirect(base_url()."Planilla/detalle_planilla/".$flag."/");
		}else{
			$this->session->set_flashdata("error","Error al crear la planilla!");
			redirect(base_url()."Planilla/");
		}

		// echo json_encode($personal);
	}

	public function detalle_planilla($flag = null){
		$data["personal"] = $this->Planilla_Model->personalXPlanilla($flag);
		$data["planillaActual"] = $flag;
		$data["estado"] = $this->Planilla_Model->estadoPlanilla($flag);
		$data["descuentos"] = $this->Planilla_Model->descuentosActivos($flag);
		$this->load->view('Base/header');
		$this->load->view('Planilla/detalle_planilla', $data);
		$this->load->view('Base/footer');

		// echo json_encode($data["descuentos"]);
	}

	public function historial_planillas(){
		$data["planillas"] = $this->Planilla_Model->historialPlanillas();
		$this->load->view('Base/header');
		$this->load->view('Planilla/historial_planilla', $data);
		$this->load->view('Base/footer');

		// echo json_encode($data["planillas"]);
	}

	public function guardar_vacaciones(){
		if($this->input->is_ajax_request()){
			$vacaciones["salarioTotal"] = $this->input->post("salarioTotal");
			$vacaciones["vacaciones"] =  $this->input->post("vacaciones");
			$vacaciones["planilla"] =  $this->input->post("planilla");


			// Ejecutando consultas
			$bool = $this->Planilla_Model->guardarVacaciones($vacaciones);
			if($bool){
				$respuesta = array('estado' => 1, 'respuesta' => 'Exito');
				header("content-type:application/json");
				print json_encode($respuesta);
			}else{
				$respuesta = array('estado' => 0, 'respuesta' => 'Error');
				header("content-type:application/json");
				print json_encode($respuesta);
			}

		}
		else{
			$respuesta = array('estado' => 0, 'respuesta' => 'Error');
			header("content-type:application/json");
			print json_encode($respuesta);
		}
	}

	public function guardar_horas_extras(){
		if($this->input->is_ajax_request()){
			$extras["otros"] = $this->input->post("otros");
			$extras["horas"] = $this->input->post("horas");
			$extras["totalHoras"] =  $this->input->post("totalHoras");
			$extras["renta"] =  $this->input->post("renta");
			$extras["liquido"] =  $this->input->post("liquido");
			$extras["idFila"] =  $this->input->post("idFila");
			
			// Ejecutando consultas
			$bool = $this->Planilla_Model->guardarHorasExtras($extras);
			if($bool){
				$respuesta = array('estado' => 1, 'respuesta' => 'Exito');
				header("content-type:application/json");
				print json_encode($respuesta);
			}else{
				$respuesta = array('estado' => 0, 'respuesta' => 'Error');
				header("content-type:application/json");
				print json_encode($respuesta);
			}

		}
		else{
			$respuesta = array('estado' => 0, 'respuesta' => 'Error');
			header("content-type:application/json");
			print json_encode($respuesta);
		}
	}

	public function cerrar_planilla(){
		$datos = $this->input->post();
		$planilla = $datos["planillaCerrar"];
		$resp = $this->Planilla_Model->cerrarPlanilla($datos); // true si se realizo la consulta.
		if($resp){
			$this->session->set_flashdata("exito","La planilla fue cerrada con exito!");
			redirect(base_url()."Planilla/detalle_planilla/".$planilla."/");
		}else{
			$this->session->set_flashdata("error","Error al crear la planilla!");
			redirect(base_url()."Planilla/detalle_planilla/".$planilla."/");
		}
		/* echo json_encode($descuentos); */
	}

	public function anonima(){
        $data["personal"] = $this->Planilla_Model->obtenerEmpleados();
        $this->load->view('Base/header');
		$this->load->view('Planilla/detalle_planilla_anonima', $data);
		$this->load->view('Base/footer');

		// echo json_encode($data["personal"]);
    }
    
	public function planilla_excel($pivote = null){
		// Encriptacion
			//nadie mas debe conocerla
			$clave  = 'Una cadena, muy, muy larga para mejorar la encriptacion';
			//Metodo de encriptacion
			$method = 'aes-256-cbc';
			// Puedes generar una diferente usando la funcion $getIV()
			$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");

			/*
			Desencripta el texto recibido
			*/
			$desencriptar = function ($valor) use ($method, $clave, $iv) {
				$encrypted_data = base64_decode($valor);
				return openssl_decrypt($valor, $method, $clave, false, $iv);
			};
			/*
			Genera un valor para IV
			*/
			$getIV = function () use ($method) {
				return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
			};

		// Encriptacion
 		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', '#');
		$sheet->setCellValue('B1', 'EMPLEADO');
		$sheet->setCellValue('C1', 'SALARIO');
		$sheet->setCellValue('D1', 'DESCUENTO');
		$sheet->setCellValue('E1', 'A PAGAR');
		$sheet->setCellValue('F1', 'CONCEPTO');

		$border = [
            'borders' => [
                'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
		
		$sheet->getStyle('A1:F1')->applyFromArray($border);
 
		$datos = $this->Planilla_Model->planillaExcel($pivote);
		$number = 1;
		$flag = 2;
		foreach($datos as $d){
			$des = $this->Planilla_Model->totalDescuentosMes($pivote, $d->idEmpleado);
			if(isset($des->descuento)){
				$descuento = $des->descuento;
			}else{
				$descuento = 0;
			}
			$sheet->setCellValue('A'.$flag, $desencriptar($d->seguimientoEmpleado));
			$sheet->setCellValue('B'.$flag, $d->nombreEmpleado);
			$sheet->setCellValue('C'.$flag, number_format(($d->liquidoDetallePlanilla + $descuento), 2));
			$sheet->setCellValue('D'.$flag, number_format($descuento, 2));
			$sheet->setCellValue('E'.$flag, number_format($d->liquidoDetallePlanilla, 2));
			$sheet->setCellValue('F'.$flag, $d->descripcionPlanilla);
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
		$sheet->getStyle('A1:F'.$flag)->getFont()->setSize(12);
		$sheet->getStyle('A1:D'.$flag)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

		$sheet->getStyle('A1:F'.$flag)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			//Custom width for Individual Columns
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);

		$curdate = date('d-m-Y H:i:s');
		$writer = new Xlsx($spreadsheet);
		$filename = 'detalle_planilla'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}

	public function planilla_comprobante($pivote = null){
		$data["empleados"] = $this->Planilla_Model->comprobantePlanilla($pivote);
		$data["pivote"] = 1;

		// Factura
			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
			$mpdf = new \Mpdf\Mpdf([
				'margin_left' => 15,
				'margin_right' => 15,
				'margin_top' => 45,
				'margin_bottom' => 25,
				'margin_header' => 10,
				'margin_footer' => 10
			]);
			//$mpdf->setFooter('{PAGENO}');
			//$mpdf->SetHTMLFooter('');
			$mpdf->SetProtection(array('print'));
			$mpdf->SetTitle("Hospital Orellana, Usulutan");
			$mpdf->SetAuthor("Edwin Orantes");
			//$mpdf->SetWatermarkText("Hospital Orellana, Usulutan");
			$mpdf->showWatermarkText = true;
			$mpdf->watermark_font = 'DejaVuSansCondensed';
			$mpdf->watermarkTextAlpha = 0.1;
			$mpdf->SetDisplayMode('fullpage');
			//$mpdf->AddPage('L'); //Voltear Hoja

			$html = $this->load->view('Planilla/comprobante_planilla', $data,true); // Cargando hoja de estilos

			$mpdf->WriteHTML($html);
			$mpdf->Output('detalle_compra.pdf', 'I');
		// Factura

		// echo json_encode($data);

	}

	public function comprobante_x_empleado($pivote = null){
		$data["empleados"] = $this->Planilla_Model->comprobanteXEmpleado($pivote);
		$data["pivote"] = 1;

		// Factura
			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
			$mpdf = new \Mpdf\Mpdf([
				'margin_left' => 15,
				'margin_right' => 15,
				'margin_top' => 45,
				'margin_bottom' => 25,
				'margin_header' => 10,
				'margin_footer' => 10
			]);
			//$mpdf->setFooter('{PAGENO}');
			// $mpdf->SetHTMLFooter('');
			// $mpdf->SetProtection(array('print'));
			$mpdf->SetTitle("Hospital Orellana, Usulutan");
			$mpdf->SetAuthor("Edwin Orantes");
			//$mpdf->SetWatermarkText("Hospital Orellana, Usulutan");
			$mpdf->showWatermarkText = true;
			$mpdf->watermark_font = 'DejaVuSansCondensed';
			$mpdf->watermarkTextAlpha = 0.1;
			$mpdf->SetDisplayMode('fullpage');
			//$mpdf->AddPage('L'); //Voltear Hoja

			$html = $this->load->view('Planilla/comprobante_planilla', $data,true); // Cargando hoja de estilos

			$mpdf->WriteHTML($html);
			$mpdf->Output('detalle_comprobantes.pdf', 'I');
		// Factura

		// echo json_encode($data);

	}

	public function agregar_empleado_planilla(){
		$data["areas"] = $this->Planilla_Model->obtenerAreas();
		$this->load->view('Base/header');
		$this->load->view('Planilla/agregar_empleado', $data);
		$this->load->view('Base/footer');

		// echo json_encode($data["personal"]);
	}

	public function guardar_empleado(){
		$datos = $this->input->post();
		$resp = $this->Planilla_Model->guardarEmpleado($datos); // true si se realizo la consulta.
		if($resp){
			$this->session->set_flashdata("exito","El empleado fue guardado con exito!");
			redirect(base_url()."Planilla/agregar_empleado_planilla/");
		}else{
			$this->session->set_flashdata("error","Error al guardar el empleado!");
			redirect(base_url()."Planilla/agregar_empleado_planilla/");
		}
	}
    
	public function personal_planilla(){
		$data["personal"] = $this->Planilla_Model->personalPlanilla();
		$data["areas"] = $this->Planilla_Model->obtenerAreas();
		$this->load->view('Base/header');
		$this->load->view('Planilla/personal_planilla', $data);
		$this->load->view('Base/footer');

		// echo json_encode($data["personal"]);
	}
    
	public function detalle_empleado($emp = null){
		$data["empleado"] = $this->Planilla_Model->obtenerEmpleado($emp);
		$data["cuentasDescargos"] = $this->Planilla_Model->obtenerCuentasDescargos($emp);
		$data["descargos"] = $this->Planilla_Model->obtenerDescuentosEmpleado($emp);
		$data["salarios"] = $this->Planilla_Model->obtenerSueldos($emp);
		$this->load->view('Base/header');
		$this->load->view('Planilla/detalle_empleado', $data);
		$this->load->view('Base/footer');

		// echo json_encode($data["descargos"]);
		// echo size_of($data["descargos"]);
	}

	public function actualizar_empleado(){
		$datos = $this->input->post();
		$resp = $this->Planilla_Model->actualizarEmpleado($datos); // true si se realizo la consulta.
		if($resp > 0){
			$this->session->set_flashdata("exito","El empleado fue actualizado con exito!");
			redirect(base_url()."Planilla/personal_planilla/");
		}else{
			$this->session->set_flashdata("error","Error al actualizar la planilla!");
			redirect(base_url()."Planilla/personal_planilla/");
		}

		// echo json_encode($data["empleado"] );
	}

	public function eliminar_empleado(){
		$datos = $this->input->post();
		$resp = $this->Planilla_Model->eliminarEmpleado($datos); // true si se realizo la consulta.
		if($resp > 0){
			$this->session->set_flashdata("exito","El empleado fue eliminado con exito!");
			redirect(base_url()."Planilla/personal_planilla/");
		}else{
			$this->session->set_flashdata("error","Error al eliminar el empleado!");
			redirect(base_url()."Planilla/personal_planilla/");
		}

		// echo json_encode($datos);
	}

	public function descuentos_planilla(){
		$data["descuentos"] = $this->Planilla_Model->obtenerDescargosPlanilla();
		$this->load->view("Base/header");
		$this->load->view("Planilla/descuentos_planilla", $data);
		$this->load->view("Base/footer");
	}

	public function guardar_info_descuento(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();
			$resp = $this->Planilla_Model->guardarInfoDescargo($datos);
			if($resp){
				$respuesta = array('estado' => 1, 'respuesta' => 'Exito');
				header("content-type:application/json");
				print json_encode($respuesta);
			}else{
				$respuesta = array('estado' => 0, 'respuesta' => 'Error');
				header("content-type:application/json");
				print json_encode($respuesta);
			}

		}
		else{
			$respuesta = array('estado' => 0, 'respuesta' => 'Error');
			header("content-type:application/json");
			print json_encode($respuesta);
		}
	}

	public function obtener_historial_descuentos(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();
			$resp = $this->Planilla_Model->obtenerHistorialDescuentos($datos);
			header("content-type:application/json");
			print json_encode($resp);
		}
		else{
			$respuesta = array('estado' => 0, 'respuesta' => 'Error');
			header("content-type:application/json");
			print json_encode($respuesta);
		}
	}

	public function editar_descuento(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();
			$descuento["nombre"] = $datos["nombreD"];
			$descuento["id"] = $datos["idD"];
			$resp = $this->Planilla_Model->actualizarInfoDescargo($descuento);
			if($resp){
				$respuesta = array('estado' => 1, 'respuesta' => 'Exito');
				header("content-type:application/json");
				print json_encode($respuesta);
			}else{
				$respuesta = array('estado' => 0, 'respuesta' => 'Error');
				header("content-type:application/json");
				print json_encode($respuesta);
			}
		}
		else{
			$respuesta = array('estado' => 0, 'respuesta' => 'Error');
			header("content-type:application/json");
			print json_encode($respuesta);
		}
	}

	public function guardar_descuento_empleado(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();
			$resp = $this->Planilla_Model->cargarDescuentoEmpleado($datos);
			if($resp){
				$respuesta = array('estado' => 1, 'respuesta' => 'Exito');
				header("content-type:application/json");
				print json_encode($respuesta);
			}else{
				$respuesta = array('estado' => 0, 'respuesta' => 'Error');
				header("content-type:application/json");
				print json_encode($respuesta);
			}
		}
		else{
			$respuesta = array('estado' => 0, 'respuesta' => 'Error');
			header("content-type:application/json");
			print json_encode($respuesta);
		}
	}

	public function procesar_descuentos(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();
			$filaEditar = $datos["fila"];
			$datosFila = $this->Planilla_Model->empleadoDescuento($filaEditar); // Detalle de la fila a editar
			$nombreDescuento = $this->Planilla_Model->nombreDescuento($datos["idDescuento"]); // Nombre del descuento
			// Datos para consultas
			$data["cuota"] = $datos["cuota"];
			$data["liquido"] = $datosFila->liquidoDetallePlanilla;
			$data["nuevoLiquido"] = $datosFila->liquidoDetallePlanilla - $datos["cuota"];
			$data["idEmpleadoDescuento"] = $datos["idEmpleadoDescuento"];
			$data["idDescuento"] = $datos["idDescuento"];
			$data["fila"] = $datos["fila"];
			$data["planilla"] = $datos["planilla"];
			
			$data["descuento"] = $datosFila->descuentosPlanilla + $datos["cuota"]; // Sumando los descuentos
			$data["detalleDescuentos"] = $datosFila->detalleDescuentos."<p>".$nombreDescuento->nombreDP."<p>"; // Sumando los descuentos
			// Datos para consultas

			$bool = $this->Planilla_Model->guardarAbonoEmpleado($data);
			if($bool){
				$respuesta = array('estado' => 1, 'respuesta' => 'Exito');
				header("content-type:application/json");
				print json_encode($respuesta);
			}else{
				$respuesta = array('estado' => 0, 'respuesta' => 'Error');
				header("content-type:application/json");
				print json_encode($respuesta);
			}

			// echo json_encode($nombreDescuento);
		}
		else{
			echo "Error...";
		}
	}

	public function saldar_descuentos(){
		if($this->input->is_ajax_request()){
			$datos = $this->input->post();
			$bool = $this->Planilla_Model->saldarDescuento($datos);
			if($bool){
				$respuesta = array('estado' => 1, 'respuesta' => 'Exito');
				header("content-type:application/json");
				print json_encode($respuesta);
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



	public function resetar_valores($flag = null){
		$datos = $this->input->post();
		$fila = $this->Planilla_Model->obtenerDetallePlanilla($datos["filaResetear"]);
		$empleado = $this->Planilla_Model->obtenerEmpleado($fila->idEmpleado);
		

		$base = $empleado->salarioEmpleado;
		$salario = $empleado->salarioEmpleado/2;

		// Calculo del ISSS
			switch ($base) {
				case( ($base >= 1) && ($base <= 1000)):
					$isss = $salario * 0.03;
					break;
				case ($base > 1000 ):
					$isss = 30/2;
					break;
					
				default:
					$isss = $base * 0.03;
					break;
			}
		//Fin calculo ISSS
	
		$afp = $salario * 0.0725;  // Calculando porcentaje a descontar de AFP
		
		switch ($empleado->pivoteRetenciones) {
			case '1':
				$isss = 0;
				$afp = 0;
				$totalRetenciones = 0;
				break;
			case '3':
				$isss = 0;
				$afp = 0;
				$totalRetenciones = 0;
				break;
			
			default:
				$totalRetenciones = $isss + $afp; //Sumando retenciones
				break;
		}

		$salario = $salario - $totalRetenciones;
	
		// Calculo de la renta
			switch ($salario) {
				case ( ($salario >= 1) && ($salario <= 236)):
					$renta = 0;
					break;
				case ( ($salario > 236) && ($salario <= 447.62)):
					$renta = 8.83 + (($salario -236 )* 0.10);
					break;
				case ( ($salario > 447.62) && ($salario <= 1019.05)):
					$renta = 30 + (($salario - 447.62 ) * 0.20);
					break;
				
				case ( ($salario > 1019.05) && ($salario <= 1000000000)):
					$renta = 144.28 + (($salario - 1019.05 ) * 0.30);
					break;
				
				default:
					# code...
					break;
			}
		// Fin calculo renta
		
		switch ($empleado->pivoteRetenciones) {
			case '1':
				$renta = ($base/2) *0.10;
				$salario = $salario - $renta ; // Descontando la renta
				break;
			case '3':
				$renta = 0;
				$salario = $salario - $renta ; // Descontando la renta
				break;
			default:
				$salario = $salario - $renta ;
				break;
		}

		if(($empleado->bonoEmpleado > 0)){
			$salario += ($empleado->bonoEmpleado/2); // Sumando el bono, si hay
		}
		$emp["salarioEmpleado"] = $empleado->salarioEmpleado;
		$emp["precioHoraExtra"] = $empleado->precioHoraExtra;
		$emp["bonoEmpleado"] = $empleado->bonoEmpleado;
		$emp["isss"] = $isss;
		$emp["afp"] = $afp;
		$emp["renta"] = $renta;
		$emp["liquido"] = round($salario, 2);
		$emp["fila"] = $datos["filaResetear"];

		$resp = $this->Planilla_Model->resetearFila($datos["filaResetear"]); // true si se realizo la consulta.
		if($resp ){
			$this->Planilla_Model->actualizarFila($emp);
			$this->session->set_flashdata("exito","Datos procesados con exito!");
			redirect(base_url()."Planilla/detalle_planilla/".$fila->idPlanilla."/");
		}else{
			$this->session->set_flashdata("error","Error al procesar los datos!");
			redirect(base_url()."Planilla/detalle_planilla/".$fila->idPlanilla."/");
		}

		// echo json_encode($personal);
	}

	public function encriptar(){
		//ConfiguraciÃ³n del algoritmo de encriptacion
		//Debes cambiar esta cadena, debe ser larga y unica
		//nadie mas debe conocerla
		$clave  = 'Una cadena, muy, muy larga para mejorar la encriptacion';
		//Metodo de encriptacion
		$method = 'aes-256-cbc';
		// Puedes generar una diferente usando la funcion $getIV()
		$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
		/*
		Encripta el contenido de la variable, enviada como parametro.
		*/
		$encriptar = function ($valor) use ($method, $clave, $iv) {
			return openssl_encrypt ($valor, $method, $clave, false, $iv);
		};
		/*
		Desencripta el texto recibido
		*/
		$desencriptar = function ($valor) use ($method, $clave, $iv) {
			$encrypted_data = base64_decode($valor);
			return openssl_decrypt($valor, $method, $clave, false, $iv);
		};
		/*
		Genera un valor para IV
		*/
		$getIV = function () use ($method) {
			return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
		};


		$personal = $this->Planilla_Model->personalEncriptar();
		/*foreach ($personal  as $row) {
			$dato_encriptado = $encriptar($row->seguimientoEmpleado);
			$dato_desencriptado = $desencriptar($dato_encriptado);
			//echo $row->idEmpleado." -- ".$row->nombreEmpleado." --- ".$row->seguimientoEmpleado." --- ".$dato_encriptado." --- ".$dato_desencriptado."<br>";
			//$this->Planilla_Model->personalUEncriptar($dato_encriptado, $row->idEmpleado);
		}*/
		$e = $encriptar("");
		$d = $desencriptar($e);
		echo $d;

	}
	// Funciones para encriptar

} 
