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

class Gastos extends CI_Controller {

    public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/El_Salvador');
		if (!$this->session->has_userdata('valido')){
			$this->session->set_flashdata("error", "Debes iniciar sesión");
			redirect(base_url());
		}
		$this->load->model("Gastos_Model");
		$this->load->model("Proveedor_Model");
		$this->load->model("Medico_Model");
		$this->load->model("Externos_Model");
		$this->load->model("Pendientes_Model");
	}

	public function index(){
		$this->load->view('Base/header');
        $data['clasificaciones'] = $this->Gastos_Model->obtenerClasificacion(); 
        $data['cuentas'] = $this->Gastos_Model->obtenerCuentas(); 
		$this->load->view('Gastos/index', $data);
		$this->load->view('Base/footer');
	}

    public function guardar_cuenta(){
        $datos = $this->input->post();
        $bool = $this->Gastos_Model->guardarCuenta($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos de la cuenta se guardaron con exito!");
			redirect(base_url()."Gastos/");
		}else{
			$this->session->set_flashdata("error","Error al guardar los datos de la cuenta!");
			redirect(base_url()."Gastos/");
		}
        //var_dump($datos);
    }

    public function actualizar_cuenta(){
        $datos = $this->input->post();
        $bool = $this->Gastos_Model->actualizarCuenta($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos de la cuenta se actualizaron con exito!");
			redirect(base_url()."Gastos/");
		}else{
			$this->session->set_flashdata("error","Error al actualizar los datos de la cuenta!");
			redirect(base_url()."Gastos/");
		}
        //var_dump($datos);
    }

    public function eliminar_cuenta(){
        $id = $this->input->post("idEliminar");
        $bool = $this->Gastos_Model->eliminarCuenta($id);
		if($bool){
			$this->session->set_flashdata("exito","Los datos de la cuenta se eliminaron con exito!");
			redirect(base_url()."Gastos/");
		}else{
			$this->session->set_flashdata("error","Error al eliminar los datos de la cuenta!");
			redirect(base_url()."Gastos/");
		}
        //var_dump($datos);
    }

    public function gastos_excel(){
		/* Obteniendo fechas localmente */
		$anio = date("Y");
		$mes = date("m");
		$i = $anio."-".$mes."-01";
		$f = $anio."-".$mes."-31";

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Detalle');
		$sheet->setCellValue('B1', 'Monto');
		$sheet->setCellValue('C1', 'Proveedor');
		$sheet->setCellValue('D1', 'Tipo de gasto');
		$sheet->setCellValue('E1', 'Forma de pago');
		$sheet->setCellValue('F1', 'Cheque');
		$sheet->setCellValue('G1', 'Banco');
		$sheet->setCellValue('H1', 'Descripción');
			
		$datos = $this->Gastos_Model->obtenerGastos($i, $f);
		$number = 1;
		$flag = 2;
		$tipoEntidad = "";
        $proveedor = "";
		foreach($datos as $d){
			if ($d->entidadGasto == 1) {
				$tipoEntidad = "Médico";
				$medico = $this->Externos_Model->detalleExternoMedico($d->idProveedorGasto);
				$proveedor = $medico->nombreMedico;
				
			}else{
				$tipoEntidad = "Otros proveedores";
				if($d->flagGasto == 1){
					$medico = $this->Pendientes_Model->rowProveedor($d->idProveedorGasto);
					$proveedor = $medico->empresaProveedor;
				}else{
					$medico = $this->Externos_Model->detalleExternoProveedor2($d->idProveedorGasto);
					$proveedor = $medico->empresaProveedor;
				}
			}

			$sheet->setCellValue('A'.$flag, $d->nombreCuenta);
			$sheet->setCellValue('B'.$flag, $d->montoGasto);
			$sheet->setCellValue('C'.$flag, $proveedor);
			$sheet->setCellValue('D'.$flag, $d->nombreTipoGasto);
			switch ($d->pagoGasto) {
				case '1':
					$sheet->setCellValue('E'.$flag, "Efectivo");
					break;
				case '2':
					$sheet->setCellValue('E'.$flag, "Cheque");
					break;
				case '3':
					$sheet->setCellValue('E'.$flag, "Caja chica");
					break;
				case '4':
					$sheet->setCellValue('E'.$flag, "Cargo a cuenta");
					break;
				
				default:
					$sheet->setCellValue('E'.$flag, "Efectivo");
					break;
			}
			$sheet->setCellValue('F'.$flag, $d->numeroGasto);
			$sheet->setCellValue('G'.$flag, $d->bancoGasto);
			$sheet->setCellValue('H'.$flag, strip_tags($d->descripcionGasto));
				
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
		$sheet->getStyle('A1:H'.$flag)->getFont()->setSize(12);
		$sheet->getStyle('A1:H1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

		$sheet->getStyle('A1:H'.$flag)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
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
		$filename = 'listado_de_gastos_'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}

	public function gastos_excel_fecha($f){
		$arreglo =  explode("-", $f);
		/* Obteniendo fechas localmente */
		$anio = $arreglo[0];
		$mes = $arreglo[1];
		$i = $anio."-".$mes."-01";
		$f = $anio."-".$mes."-31";

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Detalle');
		$sheet->setCellValue('B1', 'Monto');
		$sheet->setCellValue('C1', 'Proveedor');
		$sheet->setCellValue('D1', 'Tipo de gasto');
		$sheet->setCellValue('E1', 'Descripción');
			
		$datos = $this->Gastos_Model->obtenerGastos($i, $f);
		$number = 1;
		$flag = 2;
		$tipoEntidad = "";
        $proveedor = "";
		foreach($datos as $d){
			if ($d->entidadGasto == 1) {
				$tipoEntidad = "Médico";
				$medico = $this->Externos_Model->detalleExternoMedico($d->idProveedorGasto);
				$proveedor = $medico->nombreMedico;
				
			}else{
				$tipoEntidad = "Otros proveedores";
				if($d->flagGasto == 1){
					$medico = $this->Pendientes_Model->rowProveedor($d->idProveedorGasto);
					$proveedor = $medico->empresaProveedor;
				}else{
					$medico = $this->Externos_Model->detalleExternoProveedor2($d->idProveedorGasto);
					$proveedor = $medico->empresaProveedor;
				}
			}

			$sheet->setCellValue('A'.$flag, $d->nombreCuenta);
			$sheet->setCellValue('B'.$flag, $d->montoGasto);
			$sheet->setCellValue('C'.$flag, $proveedor);
			$sheet->setCellValue('D'.$flag, $d->nombreTipoGasto);
			$sheet->setCellValue('E'.$flag, strip_tags($d->descripcionGasto));
				
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
		$sheet->getStyle('A1:E1')->getFont()->setBold(true);		
		//$sheet->getStyle('A1:H10')->applyFromArray($styleThinBlackBorderOutline);
		//Alignment
		//fONT SIZE
		$sheet->getStyle('A1:E'.$flag)->getFont()->setSize(12);
		$sheet->getStyle('A1:E1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

		$sheet->getStyle('A1:E'.$flag)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			//Custom width for Individual Columns
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$curdate = date('d-m-Y H:i:s');
		$writer = new Xlsx($spreadsheet);
		$filename = 'listado_de_gastos_'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
		
		
	}

    public function control_gastos(){
		$meses = array('enero','febrero','marzo','abril','mayo','junio','julio', 'agosto','septiembre','octubre','noviembre','diciembre');
		$data['proveedores'] = $this->Proveedor_Model->obtenerProveedores(); 
		$data['cuentas'] = $this->Gastos_Model->obtenerCuentas();
		$data['tipoGasto'] = $this->Gastos_Model->obtenertipoGasto();

		// Obtener los gastos efectuados
		// Logica para el mes
			$anio = date("Y");
			$mes = date("m");
			$i = $anio."-".$mes."-01";
			$f = $anio."-".$mes."-31";
			if($mes < 10){
				$flagMes = substr($mes-1, -1);
			}else{
				$flagMes = $mes-1;
			}
			$data["mes"] = $meses[$flagMes];

		$data['listaGastos'] = $this->Gastos_Model->obtenerGastos($i, $f);
		$codigo = $this->Gastos_Model->codigoGasto(); // Ultimo codigo de hoja
		if($codigo == NULL ){
			$codigo = 1000000;
		}else{
			$codigo = $codigo->codigo +1;
		}
		$data["cod"] = $codigo;
		// Fin gastos efectuados

		$this->load->view('Base/header');
		$this->load->view('Gastos/control_gastos', $data);
		$this->load->view('Base/footer');

		// echo json_encode($data);
		//var_dump();
		/* foreach ($data['listaGastos'] as $gasto) {
			echo $gasto->fechaGasto."<br>";
		} */

	}

	public function control_gastos_fecha(){
		echo '<script>
				if (window.history.replaceState) { // verificamos disponibilidad
					window.history.replaceState(null, null, window.location.href);
				}
			</script>';
		$datos = $this->input->post();
		if(sizeof($datos) > 0){
			$meses = array('enero','febrero','marzo','abril','mayo','junio','julio', 'agosto','septiembre','octubre','noviembre','diciembre');
			$data['proveedores'] = $this->Proveedor_Model->obtenerProveedores(); 
			$data['cuentas'] = $this->Gastos_Model->obtenerCuentas();
			$data['tipoGasto'] = $this->Gastos_Model->obtenertipoGasto();
			
			// Obtener los gastos efectuados
			// Logica para el mes
				$anio = $datos ["anioReporte"];
				$mes = $datos ["mesReporte"];
				$i = $anio."-".$mes."-01";
				$f = $anio."-".$mes."-31";
				if($mes < 10){
					$flagMes = substr($mes-1, -1);
				}else{
					$flagMes = $mes-1;
				}
				$data["mes"] = $meses[$flagMes];
				$data["mess"] = $flagMes;
				$data["anio"] = $anio;

				$data["meses"] = $meses;
			
			/* // Logica para arreglo de meses usados en la grafia
				if($flagMes == 0){
					$data["mesesGrafica"] = array($meses[10], $meses[11], $meses[$flagMes]);
				}else{
					if($flagMes == 1){
						$data["mesesGrafica"] = array($meses[11], $meses[0], $meses[$flagMes]);
					}else{
						$data["mesesGrafica"] = array($meses[$flagMes-2], $meses[$flagMes-1], $meses[$flagMes]);
					}
				}

			//Logica usada para los valores de la grafica

				if($mes = "01"){
					$ip = $anio."-12-01";
					$fp = $anio."-12-31";
					
					$ipp = $anio."-11-01";
					$fpp = $anio."-11-31";
				}else{
					if($mes = "02"){
						$ip = $anio."-01-01";
						$fp = $anio."-01-31";
						
						$ipp = $anio."-12-01";
						$fpp = $anio."-12-31";
					}else{
							$ip = $anio."-0".($mes - 1)."-01";
							$fp = $anio."-0".($mes - 1)."-31";
							
							$ipp = $anio."-0".($mes - 2 )."-01";
							$fpp = $anio."-0".($mes - 2 )."-31";
						}
				}
				
				$mesPrev = $this->Gastos_Model->sumaGastos($ip, $fp);
				$mp = "";
				if($mesPrev->totalGasto == NULL){
					$mp = 0;
				}else{
					$mp = $mesPrev->totalGasto;
				}

				$mesActual = $this->Gastos_Model->sumaGastos($i, $f);
				$ma = "";
				if($mesActual->totalGasto == NULL){
					$ma = 0;
				}else{
					$ma = $mesActual->totalGasto;
				}

				$mesNext = $this->Gastos_Model->sumaGastos($ipp, $fpp);
				$mpp = "";
				if($mesNext->totalGasto == NULL){
					$mpp = 0;
				}else{
					$mpp = $mesNext->totalGasto;
				}

				$data["valoresGrafica"] = array($mp, $mpp, $ma); */

			$data['listaGastos'] = $this->Gastos_Model->obtenerGastos($i, $f);
			$data['inicio'] = $i;
			$data['fin'] = $f;
			// Fin gastos efectuados
			
			$this->load->view('Base/header');
			// $this->load->view('Gastos/control_gastos_fecha', $data);
			$this->load->view('Gastos/control_gastos', $data);
			$this->load->view('Base/footer'); 
		}else{
			$this->session->set_flashdata("error","No se permite el reenvio de datos");
			redirect(base_url()."Gastos/control_gastos");
		}
	}

	public function guardar_gasto(){
		echo '<script>
				if (window.history.replaceState) { // verificamos disponibilidad
					window.history.replaceState(null, null, window.location.href);
				}
			</script>';
		$datos = $this->input->post();  // Valores para el gasto
		
		$datos["descripcionGasto"] = trim($datos["descripcionGasto"]);
		$c = $datos["codigoGasto"];
		$codigo = $this->Gastos_Model->buscarCodigo($c);
		
		if(!is_null($codigo)){
			$ultimoCodigo = $this->Gastos_Model->ultimoGasto(); // Ultimo codigo de hoja
			$uc = $ultimoCodigo->ultimo + 1;
			$datos["codigoGasto"] = "$uc";
		}

		if(sizeof($datos) > 0){
			// Detalle
			$datos["efectuoGasto"] = $this->session->userdata("empleado_h");
			$entidadGasto = $datos["entidadGasto"];
			$recibo = array();
			// Datos del recibo
				$dato = $this->Gastos_Model->obtenerEntidadGasto($datos["idProveedorGasto"], $datos ["entidadGasto"]);
				$recibo["fecha"] = $datos["fechaGasto"];
				$recibo["codigo"] = $datos["codigoGasto"];
				$recibo["entregado"] = $datos["entregadoGasto"];
				$recibo["proveedor"] = $dato->proveedor;
				$recibo["concepto"] = $datos["descripcionGasto"];
				$recibo["total"] = $datos["montoGasto"];
				$recibo["forma"] = $datos["pagoGasto"];
				if(isset($datos["chequeGasto"])){
					$recibo["cheque"] = $datos["chequeGasto"];
					$recibo["bancoGasto"] = $datos["bancoGasto"];
					$recibo["cuentaGasto"] = $datos["cuentaGasto"];
				}else{
					$recibo["cheque"] = "";
					$recibo["bancoGasto"] = "";
					$recibo["cuentaGasto"] = "";
				}
				$recibo["efectuoGasto"] = $datos["efectuoGasto"];
				//$this->recibo_gasto($recibo);
			// Fin datos del recibo


			$bool = $this->Gastos_Model->guardarGasto($datos);
			if($bool){
				//$this->session->set_flashdata("exito","El gasto se registro con exito!");
				$this->recibo_gasto($recibo);
				//redirect(base_url()."Gastos/recibo_gasto");
			}else{
				$this->session->set_flashdata("error","Error al registrar el gasto!");
				redirect(base_url()."Gastos/control_gastos");
			}

			// echo json_encode($recibo);
		}else{
			$this->session->set_flashdata("error","No se permite el reenvio de datos");
			redirect(base_url()."Gastos/control_gastos");
		}

		// echo json_encode($datos);
	}

	// Funcion para obtener de forma asincrona el tipo de entidad
	public function tipo_entidad(){
        if($this->input->is_ajax_request())
		{
            $id =$this->input->get("id");
            if($id =="1"){
                $datos = $this->Medico_Model->obtenerMedicos();
            }
            else{
                $datos = $this->Proveedor_Model->obtenerProveedores();
            }
			echo json_encode($datos);
		}
		else
		{
			echo "Error...";
		}
    }

	public function recibo_gasto($datos){
		// Recibo de gastos
			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
			$mpdf = new \Mpdf\Mpdf([
				'margin_left' => 15,
				'margin_right' => 15,
				'margin_top' => 45,
				'margin_bottom' => 78,
				'margin_header' => 10,
				'margin_footer' => 23
				]);
			//$mpdf->setFooter('');
			//$mpdf->SetProtection(array('print'));
			$mpdf->SetTitle("Centro Médico, El Tránsito");
			$mpdf->SetAuthor("Edwin Orantes");
			$mpdf->showWatermarkText = false;
			$mpdf->watermark_font = 'DejaVuSansCondensed';
			$mpdf->watermarkTextAlpha = 0.1;
			$mpdf->SetDisplayMode('fullpage');
			//$mpdf->AddPage('L'); //Voltear Hoja
			$html = $this->load->view('Gastos/recibo_gasto', $datos ,true); // Cargando hoja de estilos
			$mpdf->SetHTMLHeader('
				<div class="cabecera" style="font-family: Times New Roman">
					<div class="img_cabecera"><img src="'.base_url().'public/img/logo.jpg"></div>
					<div class="title_cabecera">
						<h5 style="line-height: 20px">Avenida Ferrocarril, #51 Barrio la Cruz, frente a la Iglesia Adventista, El Tránsito, San Miguel, PBX: 2605-6298</h5>
					</div>
					
					<div class="subtitle_cabecera">
						<table class="tabla_num_recibo" style="font-family: Times New Roman;">
							<tr>
								<td><h5>FECHA: '.$datos["fecha"].'</h5></td>
								<td><h5>RECIBO DE EGRESO: '.$datos["codigo"].'</h5></td>
							</tr>
						</table>

					</div>
				</div>
			');
			
			$mpdf->WriteHTML($html);
			$mpdf->Output('recibro_de_cobro.pdf', 'I');
		// Recibo de gastos
	}

	public function imprimir_recibo($gasto, $proveedor, $entidad, $flag){
		$datos = $this->Gastos_Model->obtenerGasto($gasto);
		$dato = $this->Gastos_Model->obtenerEntidadGasto($proveedor, $entidad);
		if($flag == 1){
			$recibo["cuentasPagar"] = $this->Pendientes_Model->detalleGasto($gasto);
		}

		$recibo["fecha"] = $datos->fechaGasto;
		$recibo["codigo"] = $datos->codigoGasto;
		$recibo["entregado"] = $datos->entregadoGasto;
		$recibo["proveedor"] = $dato->proveedor;
		$recibo["forma"] = $datos->pagoGasto;
		$recibo["cheque"] = $datos->numeroGasto;
		$recibo["concepto"] = $datos->descripcionGasto;
		$recibo["total"] = $datos->montoGasto;
		$recibo["efectuoGasto"] = $datos->efectuoGasto;
		$recibo["bancoGasto"] = $datos->bancoGasto;
		$recibo["cuentaGasto"] = $datos->cuentaGasto;
		$recibo["flag"] = $flag;
		// Recibo de gastos
			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
			$mpdf = new \Mpdf\Mpdf([
				'margin_left' => 15,
				'margin_right' => 15,
				'margin_top' => 50,
				'margin_bottom' => 15,
				'margin_header' => 10,
				'margin_footer' => 25
				]);
			
			//$mpdf->SetProtection(array('print'));
			$mpdf->SetTitle("Hospital Orellana, Usulutan");
			$mpdf->SetAuthor("Edwin Orantes");
			$mpdf->showWatermarkText = false;
			$mpdf->watermark_font = 'DejaVuSansCondensed';
			$mpdf->watermarkTextAlpha = 0.1;
			$mpdf->SetDisplayMode('fullpage');
			//$mpdf->AddPage('L'); //Voltear Hoja
			$html = $this->load->view('Gastos/recibo_gasto', $recibo ,true); // Cargando hoja de estilos
			$mpdf->SetHTMLHeader('
				<div class="cabecera" style="font-family: Times New Roman">
						<div class="img_cabecera"><img src="'.base_url().'public/img/logo_receta.jpg" width=200></div>
						<div class="title_cabecera">
							<h2 style="line-height: 1px; color: #075480">HOSPITAL LA FAMILIA </h2>
							<h5 style="padding-top: -15px;">Avenida Ferrocarril,Barrio la Cruz #51, <br> El Tránsito, San Miguel </h5>
							<h3 style="padding-top: -15px;"> 
								<img src="'.base_url().'public/img/telefono.jpg" style="width: 15px"> 2605-6298 &nbsp;&nbsp;&nbsp;
								 <img src="'.base_url().'public/img/whatsapp.jpg" style="width: 15px"> 7280-1674
							</h3>
						</div>
					</div>
			');

			$mpdf->WriteHTML($html);
			if($flag == 1){
				$mpdf->setHTMLFooter('
					<div class="detalle">
						<table class="tabla_num_recibo">
							<tr>
								<td style="text-align: center;">
									<p>F._______________________________________</p>
									<h5><strong>RECIBI CONFORME</strong></h5>
								</td>
								<td style="text-align: center;">
									<p style="text-decoration: underline;">
										F.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;'.$this->session->userdata("empleado_h").'&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
									<h5><strong>ELABORADO POR</strong></h5>
								</td>
							</tr>
						</table>
					</div>
				');
			}
			$mpdf->Output('recibo_gasto.pdf', 'I');
		// Fin
		// echo json_encode($recibo);
	
	}

	public function editar_gasto(){
		'<script>
				if (window.history.replaceState) { // verificamos disponibilidad
					window.history.replaceState(null, null, window.location.href);
				}
			</script>';
		$datos = $this->input->post();
		if(sizeof($datos) > 0){
			// Detalle
			$idGasto =  $datos["idGasto"];
			$recibo = array();
			// Obteniendo nombre del Médico o proveedor
				$dato = $this->Gastos_Model->obtenerEntidadGasto($datos["idProveedorGasto"], $datos ["entidadGasto"]);
				$recibo["fecha"] = $datos["fechaGasto"];
				$recibo["codigo"] = $datos["codigoGasto"];
				$recibo["efectuoGasto"] = $datos["entregadoGasto"];
				$recibo["entregado"] = $datos["entregadoGasto"];
				$recibo["proveedor"] = $dato->proveedor;
				$recibo["concepto"] = $datos["descripcionGasto"];
				$recibo["total"] = $datos["montoGasto"];
				$recibo["forma"] = $datos["pagoGasto"];
				$recibo["efectuoGasto"] = $datos["efectuoGasto"];

				$recibo["bancoGasto"] = $datos["bancoGasto"];
				$recibo["cuentaGasto"] = $datos["cuentaGasto"];
				
			unset($datos["codigoGasto"]);
			unset($datos["efectuoGasto"]);
			if($datos["numeroGasto"] == ""){
				unset($datos["numeroGasto"]);
				unset($datos["bancoGasto"]);
				unset($datos["cuentaGasto"]);
			}else{
				$recibo["cheque"] = $datos["numeroGasto"];
			}
			$bool = $this->Gastos_Model->actualizarGastos($datos);
			if($bool){
				$this->Gastos_Model->actualizarCuentaPorPagar($idGasto, $datos["montoGasto"]);
				$this->recibo_gasto($recibo);
			}else{
				$this->session->set_flashdata("error","Error al actualizar los datos de la cuenta!");
				redirect(base_url()."Gastos/control_gastos");
			}
		}else{
			$this->session->set_flashdata("error","No se permite el reenvio de datos");
			redirect(base_url()."Gastos/control_gastos");
		}
		// echo json_encode($datos);*/
	}

	public function eliminar_gasto(){
		if($this->input->is_ajax_request()){
			// Datos para eliminar medicamento 
				$gasto = $this->input->post();
				echo json_encode($gasto);
			
			// Ejecutando consultas
				$bool = $this->Gastos_Model->eliminarGasto($gasto);
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

	/* public function test(){
		$mystring = 'Honorarios médicos, PATRICIA BEATRIZ HERNANDEZ , 5074';
		$findme   = 'Honorarios médicos';
		$pos = strpos($mystring, $findme);

		// Nótese el uso de ===. Puesto que == simple no funcionará como se espera
		// porque la posición de 'a' está en el 1° (primer) caracter.
		if ($pos === false) {
			echo "La cadena '$findme' no fue encontrada en la cadena '$mystring'";
		} else {
			echo "La cadena '$findme' fue encontrada en la cadena '$mystring'";
			echo " y existe en la posición $pos";
		}
	} */

	public function test(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		// Propiedades para centrar elemento
		$centrar = [
			'alignment' => [
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
		];
		$sheet->setCellValue('A1', '#');
		$sheet->setCellValue('B1', 'Cuenta');
		$sheet->setCellValue('C1', 'Categoria');
		$sheet->setCellValue('D1', 'Gasto');

		$datos = $this->Gastos_Model->test();
		$flag = 2;
		$number = 1;
		foreach ($datos as $d) {
			// echo " |".$d->clasificacionCuenta." ".$d->nombreCuenta." --- ".$d->nombreCG."<br>";
			$sheet->setCellValue('A'.$flag, $number);
			$sheet->setCellValue('B'.$flag, $d->nombreCuenta);
			$sheet->setCellValue('C'.$flag, $d->nombreCG);
			$sheet->setCellValue('D'.$flag, " ");
			$flag++;
			$number++;
		}
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);

		$curdate = date('d-m-Y H:i:s');
		$writer = new Xlsx($spreadsheet);
		$filename = 'listado_gastos_'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		$writer->save('php://output');

	}

	// Dashboard -> detalle de cuentas
		public function detalle_cuentas_gastos($i, $f){
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio", "Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$data["mes"] = $meses[date("m") -1];
			/* $i = date("Y")."-".date("m")."-01";
			$f = date("Y")."-".date("m")."-31"; */
			// $data["cuentas"] = $this->Gastos_Model->obtenerGastos($i, $f);
			$data["cuentas"] = $this->Gastos_Model->resumenCuentas($i, $f);
			$this->load->view("Base/header");
			$this->load->view("Usuarios/detalle_cuentas", $data);
			$this->load->view("Base/footer");
			// var_dump($data["cuentas"]);
			
			
		}

		public function buscar_detalle_gasto(){
			if($this->input->is_ajax_request()){
				$data["id"] = $this->input->post("idCuenta");
				$data["i"] = date("Y")."-".date("m")."-01";
				$data["f"] = date("Y")."-".date("m")."-31";
				$detalle = $this->Gastos_Model->obtenerDetalleCuenta($data);
				echo json_encode($detalle);
			}else{
				echo "Error...";
			}
		}
	// Fin dashboard

	
}