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

class Botiquin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/El_Salvador');
		if (!$this->session->has_userdata('valido')){
			$this->session->set_flashdata("error", "Debes iniciar sesión");
			redirect(base_url());
		}
		$this->load->model("Botiquin_Model");
		$this->load->model("Proveedor_Model");
		$this->load->model("Usuarios_Model");
	}

	public function index(){
		// Obteniendo el ultimo codigo
			$ultimoCodigo = $this->Botiquin_Model->ultimoCodigo();
			$codigo = $ultimoCodigo->codigo;
			if($codigo  == null){ 
				$codigo = 1000; 
			}else{ 
				$codigo = $codigo + 1;
			}
		// Fin del obtener ultimo codigo

		$data["medicamentos"] = $this->Botiquin_Model->medicamentosBotiquin();
		$data["clasificaciones"] = $this->Botiquin_Model->obtenerClasificacionMedicamentos();
		// $data["proveedores"] = $this->Proveedor_Model->obtenerProveedores();
		$data["fabricantes"] = $this->Botiquin_Model->obtenerFabricantes();
		$data["cod"] = $codigo;

		$this->load->view('Base/header');
		$this->load->view('Botiquin/lista_medicamentos', $data);
		$this->load->view('Base/footer');
    }
    
    public function agregar_medicamento(){
		$proveedores = $this->Proveedor_Model->obtenerProveedores();
		$medicamentos = $this->Botiquin_Model->obtenerMedicamentos();
		$data = array('proveedores' => $proveedores, 'medicamentos' => $medicamentos);
		$this->load->view('Base/header');
		$this->load->view('Botiquin/agregar_medicamento', $data);
		$this->load->view('Base/footer');
	}

	public function guardar_medicamento(){
		$datos = $this->input->post();
		$datos["feriado"] = $datos["precioVMedicamento"];
		$bool = $this->Botiquin_Model->guardarMedicamento($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
			redirect(base_url()."Botiquin/");
		}else{
			$this->session->set_flashdata("error","Error al guardar los datos!");
			redirect(base_url()."Botiquin/");
		}

		// echo json_encode($datos);
	}

	public function actualizar_medicamento(){
		$datos = $this->input->post();
		$bool = $this->Botiquin_Model->actualizarMedicamento($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
			redirect(base_url()."Botiquin/");
		}else{
			$this->session->set_flashdata("error","Error al actualizar los datos!");
			redirect(base_url()."Botiquin/");
		}
		
		// echo json_encode($datos);
	}

	public function eliminar_medicamento(){
		$datos = $this->input->post();
		$bool = $this->Botiquin_Model->eliminarMedicamento($datos);
		if($bool){
			$this->session->set_flashdata("exito","Los datos fueron eliminados con exito!");
			redirect(base_url()."Botiquin/");
		}else{
			$this->session->set_flashdata("error","Error al eliminar los datos!");
			redirect(base_url()."Botiquin/");
		}
		// echo json_encode($datos);
	}

	public function medicamentos_excel(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Código');
		$sheet->setCellValue('B1', 'Nombre');
		$sheet->setCellValue('C1', 'Fabricante');
		$sheet->setCellValue('D1', 'Precio compra');
		$sheet->setCellValue('E1', 'Tipo');
		$sheet->setCellValue('F1', 'Clasificación');
		$sheet->setCellValue('G1', 'Precio venta');
		$sheet->setCellValue('H1', 'Cantidad vendida');
		$sheet->setCellValue('I1', 'Total vendido ($)');
		$sheet->setCellValue('J1', 'Cantidad en stock');
		$sheet->setCellValue('K1', 'Total stock ($)');
			
		$datos = $this->Botiquin_Model->medicamentosBotiquin();

		$number = 1;
		$flag = 2;
		$totalVendido = 0;
		$totalStock = 0;
		foreach($datos as $d){
			if($d->tipoMedicamento == "Medicamentos" || $d->tipoMedicamento == "Materiales médicos"){

			
				$totalVendido = ($d->usadosMedicamento * $d->precioVMedicamento);
				$totalStock = ($d->stockMedicamento * $d->precioVMedicamento );

				$sheet->setCellValue('A'.$flag, $d->codigoMedicamento);
				$sheet->setCellValue('B'.$flag, $d->nombreMedicamento);
				$sheet->setCellValue('C'.$flag, $d->nombreFabricante);
				$sheet->setCellValue('D'.$flag, $d->precioCMedicamento);
				$sheet->setCellValue('E'.$flag, $d->tipoMedicamento);
				$sheet->setCellValue('F'.$flag, $d->nombreClasificacionMedicamento);
				$sheet->setCellValue('G'.$flag, $d->precioVMedicamento);
				$sheet->setCellValue('H'.$flag, $d->usadosMedicamento);
				$sheet->setCellValue('I'.$flag, $totalVendido);
				
				if($d->stockMedicamento == 0){
					$sheet->setCellValue('J'.$flag, '0');
				}else{
					if($d->stockMedicamento < 0){
						$sheet->setCellValue('J'.$flag, '0' );
					}else{
						$sheet->setCellValue('J'.$flag, $d->stockMedicamento);
					}
						
				}

				if($d->stockMedicamento < 0){
					$sheet->setCellValue('K'.$flag, '0');
				}else{
					$sheet->setCellValue('K'.$flag, $totalStock );
				}
				
				
					
				$flag = $flag+1;
				$number = $number+1;
			}
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
		$sheet->getStyle('A1:K1')->getFont()->setBold(true);		
		//$sheet->getStyle('A1:L10')->applyFromArray($styleThinBlackBorderOutline);
		//Alignment
		//fONT SIZE
		$sheet->getStyle('A1:K'.$flag)->getFont()->setSize(12);
		//$sheet->getStyle('A1:E2')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

		//$sheet->getStyle('A2:D100')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			//Custom width for Individual Columns
		$sheet->getColumnDimension('A')->setAutoSize(true);
		$sheet->getColumnDimension('B')->setAutoSize(true);
		$sheet->getColumnDimension('C')->setAutoSize(true);
		$sheet->getColumnDimension('D')->setAutoSize(true);
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
		$sheet->getColumnDimension('H')->setAutoSize(true);
		$sheet->getColumnDimension('I')->setAutoSize(true);
		$sheet->getColumnDimension('J')->setAutoSize(true);
		$sheet->getColumnDimension('K')->setAutoSize(true);

		$curdate = date('d-m-Y H:i:s');
		$writer = new Xlsx($spreadsheet);
		$filename = 'listado_medicamentos'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}

	public function guardar_compra(){
		$datos = $this->input->post();
		$datos["recibidoPor"] = $this->session->userdata("empleado_h");

		$resp = $this->Botiquin_Model->guardarFactura($datos);
		if($resp > 0){
			// Agregando evento a bitacora
				$data["idUsuario"] = $this->session->userdata('id_usuario_h');
				$data["descripcionBitacora"] = "El usuario: ".$this->session->userdata('usuario_h')." agrego la compra con Id = ".$resp;
				$this->Usuarios_Model->insertarBitacora($data);
			// Fin bitacora	
			$this->session->set_flashdata("exito","Los datos de la factura fueron guardados con exito!");
			redirect(base_url()."Botiquin/detalle_factura_compra/".$resp."/");
		}else{
			$this->session->set_flashdata("error","Error al guardar los datos de la factura!");
			redirect(base_url()."Botiquin/agregar_medicamento");
		}
		
	}

	public function historial_compras(){
		$datos = $this->Botiquin_Model->obtenerFacturasCompra();
		$data = array('facturas' => $datos );
		$this->load->view('Base/header');
		$this->load->view('Botiquin/historial_compras', $data);
		$this->load->view('Base/footer');
	}

	public function detalle_factura_compra($id){
		$data["facturas"] = $this->Botiquin_Model->detalleFacturasCompra($id);
		$data["medicamentos"] = $this->Botiquin_Model->medicamentosFactura($id);
		$data["listaMedicamentos"] = $this->Botiquin_Model->obtenerMedicamentos();
		$data["proveedores"] = $this->Proveedor_Model->obtenerProveedores();
		
		$this->load->view('Base/header');
		$this->load->view('Botiquin/detalle_compras', $data);
		$this->load->view('Base/footer'); 


	}

	public function guardar_detalle_compra(){
		$datos = $this->input->post();
		$bool = $this->Botiquin_Model->guardarDetalleFactura($datos);
		if($bool){
			// Agregando evento a bitacora
				$data["idUsuario"] = $this->session->userdata('id_usuario_h');
				$data["descripcionBitacora"] = "El usuario: ".$this->session->userdata('usuario_h')." agrego medicamentos a la factura con Id = ".$datos['idFactura'];
			$this->Usuarios_Model->insertarBitacora($data);
		// Fin bitacora	
			$this->session->set_flashdata("exito","La factura cambio su estado a Saldada");
			redirect(base_url()."Botiquin/detalle_factura_compra/".$datos['idFactura']."/");
		}else{
			$this->session->set_flashdata("error","Error al saldar la factura");
			redirect(base_url()."Botiquin/detalle_factura_compra/".$datos['idFactura']."/");
		}

	}

	public function compras_excel(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Fecha');
		$sheet->setCellValue('B1', 'Número');
		$sheet->setCellValue('C1', 'Tipo');
		$sheet->setCellValue('D1', 'Proveedor');
		$sheet->setCellValue('E1', 'Plazo');
		$sheet->setCellValue('F1', 'Total');
		$sheet->setCellValue('G1', 'Descripcion');
		$sheet->setCellValue('H1', 'Estado');
			
		$datos = $this->Botiquin_Model->obtenerFacturasCompra();
		$number = 1;
		$flag = 2;
		foreach($datos as $d){

			// Obteniendo el plazo de la factura
			if ($d->plazoFactura == "0") {
				$plazo = "Contado";
			}else{
				$plazo = "Crédito ".$d->plazoFactura." dias";
			}

			// Obteniendo el estado de la factura
			if ($d->estadoFactura == 1) {
				$estado = "Pendiente";
			}else{
				$estado = "Saldada";
			}

			$sheet->setCellValue('A'.$flag, $d->idFactura);
			$sheet->setCellValue('B'.$flag, $d->numeroFactura);
			$sheet->setCellValue('C'.$flag, $d->tipoFactura);
			$sheet->setCellValue('D'.$flag, $d->empresaProveedor);
			$sheet->setCellValue('E'.$flag, $plazo);
			/* Aqui estoy trabajando */
			$totalFactura = 0;
			$medicamentos = $this->Botiquin_Model->medicamentosFactura($d->idFactura);
			foreach ($medicamentos as $medicamento) {
				$totalFactura += ($medicamento->cantidad * $medicamento->precio) + (($medicamento->cantidad * $medicamento->precio) * 0.13);
			}

			$sheet->setCellValue('F'.$flag, number_format($totalFactura, 2));
			$sheet->setCellValue('G'.$flag, $d->descripcionFactura);
			$sheet->setCellValue('H'.$flag, $estado);
				
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
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
		$sheet->getColumnDimension('H')->setAutoSize(true);
		$curdate = date('d-m-Y H:i:s');
		$writer = new Xlsx($spreadsheet);
		$filename = 'listado_compras'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}

	public function saldar_compra(){
		$datos = $this->input->post();
		$data = array('estadoFactura' => "0", 'idFactura' => $datos['idFactura'] );
		$bool = $this->Botiquin_Model->saldarCompra($data);
		if($bool){
			$this->session->set_flashdata("exito","La factura cambio su estado a Saldada");
			redirect(base_url()."Botiquin/detalle_factura_compra/".$datos['idFactura']."/");
		}else{
			$this->session->set_flashdata("error","Error al saldar la factura");
			redirect(base_url()."Botiquin/detalle_factura_compra/".$datos['idFactura']."/");
		}

		
	}

	public function detalle_compra_pdf($id = null){

		$data["factura"] = $this->Botiquin_Model->detalleFacturasCompra($id);
		$data["medicamentos"] = $this->Botiquin_Model->medicamentosFactura($id);
		// Factura
			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
			$mpdf = new \Mpdf\Mpdf([
				'margin_left' => 15,
				'margin_right' => 15,
				'margin_top' => 15,
				'margin_bottom' => 25,
				'margin_header' => 10,
				'margin_footer' => 10
			]);
			//$mpdf->setFooter('{PAGENO}');
			$mpdf->SetHTMLFooter('
				<table width="100%">
					<tr>
						<td width="33%">{DATE j-m-Y}</td>
						<td width="33%" align="center">{PAGENO}/{nbpg}</td>
						<td width="33%" style="text-align: right;">Detalle de compra</td>
					</tr>
				</table>');
			$mpdf->SetProtection(array('print'));
			$mpdf->SetTitle("Hospital Orellana, Usulutan");
			$mpdf->SetAuthor("Edwin Orantes");
			//$mpdf->SetWatermarkText("Hospital Orellana, Usulutan");
			$mpdf->showWatermarkText = true;
			$mpdf->watermark_font = 'DejaVuSansCondensed';
			$mpdf->watermarkTextAlpha = 0.1;
			$mpdf->SetDisplayMode('fullpage');
			//$mpdf->AddPage('L'); //Voltear Hoja

			$html = $this->load->view('Botiquin/detalle_compra_pdf',$data,true); // Cargando hoja de estilos

			$mpdf->WriteHTML($html);
			$mpdf->Output('detalle_compra.pdf', 'I');
		// Fin factura
		
	}

	public function actualizar_medicamento_factura(){
		$datos = $this->input->post();
		/* Para Factura */
			$data["cantidad"] = $datos["cantidadInsumo"]; // Cantidad para actualizar kardex y factura
			$data["idFacturaMedicamento"] = $datos["idMedicamentoFactura"];
		/* Para Factura */
		$bool = $this->Botiquin_Model->actualizarMedicamentoFactura($data, $data1);
		if($bool){
			$this->session->set_flashdata("exito","El medicamento se actualizo con exito'");
			redirect(base_url()."Botiquin/detalle_factura_compra/".$datos["idHojaReturn"]."/");
		}else{
			$this->session->set_flashdata("error","Error al actualizar el medicamento");
			redirect(base_url()."Botiquin/detalle_factura_compra/".$datos["idHojaReturn"]."/");
		} 
		// echo json_encode($data);
	}

	public function eliminar_medicamento_factura(){
		$datos = $this->input->post();
		/* Para Factura */
			$data["idFacturaMedicamento"] = $datos["idMedicamentoFactura"];
		/* Para Factura */
		$bool = $this->Botiquin_Model->eliminarMedicamentoFactura($data);
		if($bool){
			$this->session->set_flashdata("exito","El medicamento se elimino exito'");
			redirect(base_url()."Botiquin/detalle_factura_compra/".$datos["idHojaReturn"]."/");
		}else{
			$this->session->set_flashdata("error","Error al eliminar el medicamento");
			redirect(base_url()."Botiquin/detalle_factura_compra/".$datos["idHojaReturn"]."/");
		}
		
	}

	public function actualizar_datos_factura(){
		$datos = $this->input->post();
		$bool = $this->Botiquin_Model->actualizarDetalleFactura($datos);
		if($bool){
			$this->session->set_flashdata("exito","La factuar se actualizo con exito'");
			redirect(base_url()."Botiquin/detalle_factura_compra/".$datos["idFactura"]);
		}else{
			$this->session->set_flashdata("error","Error al actualizar la factura");
			redirect(base_url()."Botiquin/detalle_factura_compra/".$datos["idFactura"]);
		}
	}

	public function obtener_medicamentos(){
		if($this->input->is_ajax_request()){
			$datos = $this->Botiquin_Model->stockMinimo();
			echo json_encode($datos);
		}
		else{
			echo "Error...";
		}
	}

	public function stock_medicamentos(){
		// Obteniendo el ultimo codigo
			$ultimoCodigo = $this->Botiquin_Model->ultimoCodigo();
			$codigo = $ultimoCodigo->codigo;
			if($codigo  == null){ 
				$codigo = 1000; 
			}else{ 
				$codigo = $codigo + 1;
			}
		// Fin del obtener ultimo codigo

		$medicamentos = $this->Botiquin_Model->obtenerMedicamentos();
		$clasificacionMedicamentos = $this->Botiquin_Model->obtenerClasificacionMedicamentos();
		$proveedores = $this->Proveedor_Model->obtenerProveedores();
		$data = array('clasificaciones' => $clasificacionMedicamentos, 'proveedores' => $proveedores, 'cod' => $codigo, 'medicamentos' => $medicamentos);

		$this->load->view('Base/header');
		$this->load->view('Botiquin/stock_medicamentos', $data);
		$this->load->view('Base/footer');
	}

	public function actualizar_stock_medicamento(){
		$datos = $this->input->post();

		$data["stockMedicamento"] = $datos["stockMedicamento"];
		$data["idMedicamento"] = $datos["idMedicamentoA"];
		
		$bool = $this->Botiquin_Model->actualizarStock($data);
		if($bool){
			$this->session->set_flashdata("exito","Los datos se actualizaron con exito!");
			redirect(base_url()."Botiquin/stock_medicamentos");
		}else{
			$this->session->set_flashdata("error","Error al actualizar los datos!");
			redirect(base_url()."Botiquin/stock_medicamentos");
		}
	}


	// Para vista de consultar precios
		public function precios_medicamentos(){
			$data["medicamentos"] = $this->Botiquin_Model->obtenerMedicamentos();
			$this->load->view("Base/header");
			$this->load->view("Botiquin/lista_precios", $data);
			$this->load->view("Base/footer");
		}
	// Fin vista consultar precio

	// Metodos ajax
		public function guardar_medicamento_async(){
			if($this->input->is_ajax_request()){
				$data["factura"]  = $this->input->post("factura");
				$data["id"]  = $this->input->post("id");
				$data["cantidad"]  = $this->input->post("cantidad");
				$data["precioC"]  = $this->input->post("precioC");
				$data["fecha"]  = $this->input->post("fecha");
				$data["total"]  = ($this->input->post("cantidad") * $data["precioC"]  = $this->input->post("precioC"));
				$data["descuento"]  = $this->input->post("descuento");

				$bool = $this->Botiquin_Model->guardarMedicamentoAsync($data);

				if($bool){
					$respuesta = array('estado' => 1, 'respuesta' => 'Exito');
					header("content-type:application/json");
					print json_encode($respuesta);

				}else{
					$respuesta = array('estado' => 0, 'respuesta' => 'Error');
					header("content-type:application/json");
					print json_encode($respuesta);
				}

				// echo json_encode($data);

			}
			else{
				$respuesta = array('estado' => 0, 'respuesta' => 'Error');
				header("content-type:application/json");
				print json_encode($respuesta);
			}
		}
	// Fin metodos ajax

	// Guardando IVA retenido
		public function guardar_iva(){
			$datos = $this->input->post();
			$return = $datos["idFactura"];
			//var_dump($datos);
			$bool = $this->Botiquin_Model->guardarIVARetenido($datos);
			if($bool){
				$this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
				redirect(base_url()."Botiquin/detalle_factura_compra/".$return."/");
			}else{
				$this->session->set_flashdata("error","Error al guardar los datos!");
				redirect(base_url()."Botiquin/detalle_factura_compra/".$return."/");
			}
		}
		// Fin IVA retenido
		
		
		
	// Fabricantes
		
		public function gestion_fabricantes(){
			$data["fabricantes"] = $this->Botiquin_Model->obtenerFabricantes();
			$this->load->view("Base/header");
			$this->load->view("Botiquin/Fabricantes/gestion_fabricantes", $data);
			$this->load->view("Base/footer");
		}

		public function guardar_fabricante(){
			$datos = $this->input->post();
			$bool = $this->Botiquin_Model->guardarFabricante($datos);
			if($bool){
				$this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
				redirect(base_url()."Botiquin/gestion_fabricantes");
			}else{
				$this->session->set_flashdata("error","Error al guardar los datos!");
				redirect(base_url()."Botiquin/gestion_fabricantes");
			}

			// echo json_encode($datos);
		}

		public function actualizar_fabricante(){
			$datos = $this->input->post();
			$bool = $this->Botiquin_Model->actualizarFabricante($datos);
			if($bool){
				$this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
				redirect(base_url()."Botiquin/gestion_fabricantes");
			}else{
				$this->session->set_flashdata("error","Error al actualizar los datos!");
				redirect(base_url()."Botiquin/gestion_fabricantes");
			}

			// echo json_encode($datos);
		}


		public function eliminar_fabricante(){
			$datos = $this->input->post();
			$bool = $this->Botiquin_Model->eliminarFabricante($datos);
			if($bool){
				$this->session->set_flashdata("exito","Los datos fueron eliminados con exito!");
				redirect(base_url()."Botiquin/gestion_fabricantes");
			}else{
				$this->session->set_flashdata("error","Error al eliminar los datos!");
				redirect(base_url()."Botiquin/gestion_fabricantes");
			}

			// echo json_encode($datos);
		}
	// Fabricantes

}
