<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	// Clases para el reporte en excel
    /* Clases para excel */
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
    /* Fin clases */

class Laboratorio extends CI_Controller {
	/* Metodos para gestion de procesos de laboratorio */
        public function __construct(){
            parent::__construct();
            date_default_timezone_set('America/El_Salvador');
            if (!$this->session->has_userdata('valido')){
                $this->session->set_flashdata("error", "Debes iniciar sesión");
                redirect(base_url());
            }
            $this->load->model("Medico_Model");
            $this->load->model("Paciente_Model");
            $this->load->model("Botiquin_Model");
            $this->load->model("Externos_Model");
            $this->load->model("Hoja_Model");
            $this->load->model("Usuarios_Model");
            $this->load->model("Laboratorio_Model");  // Modelo para gestionar datos del laboratorio
        }

        public function index(){
            $data['medicos'] = $this->Medico_Model->obtenerMedicos();
            $data["pacientes"] = $this->Laboratorio_Model->colaPacientes();
            $data["codigo"] = $this->Laboratorio_Model->codigoConsulta();
            $this->load->view('Base/header');
            $this->load->view('Laboratorio/cola_pacientes', $data);
            $this->load->view('Base/footer');
            // echo "Tas mal, aqui neles, nuay nada...";

            // echo json_encode($data);
        }

        public function crear_consulta(){
            $datos = $this->input->post();
            $cod = $this->Laboratorio_Model->validarCodigo($datos["codigo"]);
            // Validando codigo
                if(is_null($cod)){
                    $datos["codigo"] = $datos["codigo"];
                }else{
                    $datos["codigo"] = $datos["codigo"] + 1;
                }
            // Validando codigo

            $resp = $this->Laboratorio_Model->guardarConsulta($datos);
            if($resp){
                $this->session->set_flashdata("exito","Los datos de la hoja de laboratorio fueron guardados con exito!");
                redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
            }else{
                $this->session->set_flashdata("error","Error al guardar los datos de la hoja de laboratorio!");
                redirect(base_url()."Laboratorio/");
            }
            // echo json_encode($datos);
        }

        public function detalle_consulta($id){
            $data["paciente"] = $this->Laboratorio_Model->detalleConsulta($id);
            $data["consulta"] = $id;
            
            $data["examenes"] = $this->Laboratorio_Model->obtenerExamenes();
            $data["examenesRealizados"] = $this->Laboratorio_Model->obtenerExamenesRealizados($id);
            $data["historial"] = $this->Laboratorio_Model->fechasVisitas($data["paciente"]->idPaciente, $data["paciente"]->fechaConsulta);
            $data["consulta"] = $id;

            $this->load->view("Base/header");
            $this->load->view("Laboratorio/detalle_examenes", $data);
            $this->load->view("Base/footer"); 

            // echo json_encode($data["historial"]);

        }

        public function detalle_consulta_historial($id){
            $data["paciente"] = $this->Laboratorio_Model->detalleConsulta($id);
            $data["examenesRealizados"] = $this->Laboratorio_Model->obtenerExamenesRealizados($id);

            $this->load->view("Base/header");
            $this->load->view("Laboratorio/historial_examenes", $data);
            $this->load->view("Base/footer"); 

            // echo json_encode($data);


        }

        public function agregar_examen(){
            $data['medicos'] = $this->Medico_Model->obtenerMedicos();
            $data['pacientes'] = $this->Paciente_Model->obtenerPacientes();
            $data['habitaciones'] = $this->Paciente_Model->obtenerHabitaciones2();
            $data['medicamentos'] = $this->Botiquin_Model->obtenerMedicamentos();
            $data['externos'] = $this->Externos_Model->obtenerExternos();
            $codigo = $this->Laboratorio_Model->codigoConsulta(); // Ultimo codigo de hoja
            $data['tipo'] = $this->Laboratorio_Model->obtenerTipoConsulta(); // Ultimo codigo de hoja
            $cod = 0;
            if($codigo->codigoConsulta == NULL ){
                $cod = 1000;
            }else{
                $cod = ($codigo->codigoConsulta + 1);
            }
            $data['codigo'] = $cod;


            $this->load->view('Base/header');
            $this->load->view('Laboratorio/agregar_examen', $data);
            $this->load->view('Base/footer');

            // echo json_encode($data);
        }

        
        // Examen de quimica sanguinea
            public function guardar_quimica_sanguinea(){
                $datos = $this->input->post();
                $resp = $this->Laboratorio_Model->guardarQuimicaSanguinea($datos);
                $examen = $resp["idQuimicaSanguinea"];
                $consulta = $resp["idDetalleConsulta"];
                
                if($resp != 0){
                    $this->session->set_flashdata("exito","Los datos del examen fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/quimica_sanguinea_pdf/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos del examen!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$c/");
                }

                // echo json_encode($datos);
            }

            public function quimica_sanguinea_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_quimica_sanguinea", "idQuimicaSanguinea ", 6);
                $data['sanguinea'] = $this->Laboratorio_Model->detalleExamen($id, 6);
                
                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 20,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/quimica_sanguinea_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('examen_quimica_sanguinea.pdf', 'I');
                

            }

            public function actualizar_quimica_sanguinea(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                $bool = $this->Laboratorio_Model->actualizarQuimicaSanguinea($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }

                // echo json_encode($datos);
            }
        // Fin quimica sanguinea

        // Examen de Orina
            public function guardar_orina(){
                $datos = $this->input->post();
                $resp = $this->Laboratorio_Model->guardarOrina($datos);
                $examen = $resp["idOrina"];
                $consulta = $resp["idDetalleConsulta"];

                if($resp != 0){
                    $this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/orina_pdf/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }

                // echo json_encode($datos);
            }

            public function orina_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_orina", "idOrina", 13);
                $data['orina'] = $this->Laboratorio_Model->detalleExamen($id, 13);
                /* var_dump($data['cabecera']);
                echo "<br>___________________________________________________________________________________<br>";
                var_dump($data['orina']); */

                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/orina_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('orina_pdf.pdf', 'I');
                

            }

            public function actualizar_orina(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                 
                 $bool = $this->Laboratorio_Model->actualizarOrina($datos);
                 if($bool){
                     $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                     redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                 }else{
                     $this->session->set_flashdata("error","Error al actualizar los datos!");
                     redirect(base_url()."Laboratorio/");
                 }
                // echo json_encode($datos);
            }
        // Fin Orina

        
        // Examenes Hematologia
            public function guardar_hematologia(){
                $datos = $this->input->post();
                $resp = $this->Laboratorio_Model->guardarHematologia($datos);
                $examen = $resp["idHematologia"];
                $consulta = $resp["idDetalleConsulta"];
                if($resp != 0){
                    $this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/hematologia_pdf/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }

                // echo json_encode($datos);
            }

            public function hematologia_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_hematologia", "idHematologia", 12);
                $data['hematologia'] = $this->Laboratorio_Model->detalleExamen($id, 12);
                // var_dump($data['cabecera']);
                // echo "<br>___________________________________________________________________________________<br>";
                //var_dump($data['hematologia']);

                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L', 'img_dpi' => 96]);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480">
                                    <strong style="font-size: 11px; color: #075480">Firma y sello del profesional</strong>
                                </td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/hematologia_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('hematologia_pdf.pdf', 'I');
                // Fin

            }

            public function actualizar_hematologia(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                $bool = $this->Laboratorio_Model->actualizarHematologia($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }
                // echo json_encode($datos);
            }
        // Fin Hematologia

        // Examen de sanguineo
            public function guardar_sanguineo(){
                $datos = $this->input->post();
                $c = $datos["consulta"];
                $resp = $this->Laboratorio_Model->guardarSanguineo($datos);
                $examen = $resp["idSanguineo"];
                $consulta = $resp["idDetalleConsulta"];
                if($resp != 0){
                    $this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/sanguineo_pdf/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$c/");
                } 

                // echo json_encode($datos);
            }

            public function sanguineo_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_sanguineo", "idSanguineo", 4);
                $data['sanguineo'] = $this->Laboratorio_Model->detalleExamen($id, 4);
                
                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 20,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/sanguineo_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('examen_sanguineo.pdf', 'I');
                

            }

            public function actualizar_sanguineo(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                
                $bool = $this->Laboratorio_Model->actualizarSanguineo($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }

                // echo json_encode($datos);
            }
        // Fin sanguineo

        
        // Examen de Coagulacion
            public function guardar_coagulacion(){
                $datos = $this->input->post();
                $c = $datos["consulta"];
                $resp = $this->Laboratorio_Model->guardarCoagulacion($datos);
                $examen = $resp["idCoagulacion"];
                $consulta = $resp["idDetalleConsulta"];
                if($resp != 0){
                    $this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/coagulacion_pdf/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$c/");
                }
                // echo json_encode($datos);
            }

            public function coagulacion_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_coagulacion", "idCoagulacion", 3);
                $data['coagulacion'] = $this->Laboratorio_Model->detalleExamen($id, 3);

                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 20,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/coagulacion_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('examen_coagulacion.pdf', 'I');
                

            }

            public function actualizar_coagulacion(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                $bool = $this->Laboratorio_Model->actualizarCoagulacion($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }
                // echo json_encode($datos);
            }
        // Fin coagulacion

        // Examen de Cropologia
            public function guardar_cropologia(){
                $datos = $this->input->post();
                $resp = $this->Laboratorio_Model->guardarCropologia($datos);
                $examen = $resp["idCropologia"];
                $consulta = $resp["idDetalleConsulta"];
                if($resp != 0){
                    $this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/cropologia_pdf/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }

                // echo json_encode($datos);
            }

            public function cropologia_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_cropologia", "idCropologia", 7);
                $data['cropologia'] = $this->Laboratorio_Model->detalleExamen($id, 7);
                

                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/cropologia_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('examen_cropologia.pdf', 'I');
                // Fin
                

            }

            public function actualizar_cropologia(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                $bool = $this->Laboratorio_Model->actualizarCropologia($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }

                // echo json_encode($datos);
            }
        // Fin Cropologia

        // Examenes varios
            public function guardar_varios(){
                $datos = $this->input->post();
                $resp = $this->Laboratorio_Model->guardarVarios($datos);
                
                $examen = $resp["idVarios"];
                $consulta = $resp["idDetalleConsulta"];
                if($resp != 0){
                    $this->session->set_flashdata("exito","Los datos de la hoja de cobro fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/varios_pdf/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos de la hoja de cobro!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }

                // echo json_encode($datos);
            }

            public function varios_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_varios", "idVarios", 10);
                $data['varios'] = $this->Laboratorio_Model->detalleExamen($id, 10);

                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/varios_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('varios_pdf.pdf', 'I');
                // Factura
                

                //  echo json_encode($data);

            }

            public function actualizar_varios(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                $bool = $this->Laboratorio_Model->actualizarVarios($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }

                // echo json_encode($datos);
            }

        // Fin varios
























        public function guardar_inmunologia(){
            $datos = $this->input->post();
            $params = $datos["examenSolicitado"];
            $data["examenes"] = $datos["examenSolicitado"];
            $datos["examenSolicitado"] = $data["examenes"][0];

            
            $resp = $this->Laboratorio_Model->guardarInmunologico($datos);
            $examen = $resp["idInmunologia"];
            $consulta = $resp["idDetalleConsulta"];
            
            $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes
            if($resp != 0){
                $this->descuentosReactivos($params, $examen, 1); // Ejecutando descuentos de stock
                $this->session->set_flashdata("exito","Los datos fueron guardados con exito!");
                redirect(base_url()."Laboratorio/examen_inmunologia_b/$examen/");
            }else{
                $this->session->set_flashdata("error","Error al guardar los datos!");
                redirect(base_url()."Laboratorio/historial_examenes/");
            }

        }

        public function actualizar_inmunologia(){
            $datos = $this->input->post();
            $resp = $datos["consulta"];
            unset($datos["consulta"]);
            $bool = $this->Laboratorio_Model->actualizarInmunologia($datos);
            if($bool){
                $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
            }else{
                $this->session->set_flashdata("error","Error al actualizar los datos!");
                redirect(base_url()."Laboratorio/");
            }

        }

        public function eliminar_examen(){
            $datos = $this->input->post();
            $resp = $datos["consulta"];
            unset($datos["consulta"]);
            
            $bool = $this->Laboratorio_Model->eliminarExamen($datos);
            if($bool){
                $this->session->set_flashdata("exito","Los datos fueron eliminados con exito!");
                redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
            }else{
                $this->session->set_flashdata("error","Error al eliminar los datos!");
                redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
            }

            // echo json_encode($datos);
        }

        public function guardar_bacteriologia(){
            $datos = $this->input->post();
            $data["examenes"] = $datos["bacteriologiaSolicitado"];
            $datos["bacteriologiaSolicitado"] = $data["examenes"][0];
            // echo json_encode($datos);
            $resp = $this->Laboratorio_Model->guardarBacteriologico($datos);
            $examen = $resp["idBacteriologia"];
            $consulta = $resp["idDetalleConsulta"];
            $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los 
            if($resp != 0){
                $this->session->set_flashdata("exito","Los datos de la hoja de cobro fueron guardados con exito!");
                redirect(base_url()."Laboratorio/bacteriologia_pdf_b/$examen/");
            }else{
                $this->session->set_flashdata("error","Error al guardar los datos de la hoja de cobro!");
                redirect(base_url()."Laboratorio/historial_examenes/");
            }
        }

        public function actualizar_bacteriologia(){
            $datos = $this->input->post();
            $resp = $datos["consulta"];
            unset($datos["consulta"]);
            // echo json_encode($datos);
            $bool = $this->Laboratorio_Model->actualizarBacteriologia($datos);
            if($bool){
                $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
            }else{
                $this->session->set_flashdata("error","Error al actualizar los datos!");
                redirect(base_url()."Laboratorio/");
            }

        }   

        public function examen_inmunologia($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_inmunologia", "idInmunologia", 1);
            $data['inmunologia'] = $this->Laboratorio_Model->detalleExamen($id, 1);
            
            // Inicio PDF
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 20,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('
                    <table width="100%">
                        <tr>
                            <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                            <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                            <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                        </tr>
                    </table>');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/inmunologia_pdf', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('examen_inmunologia.pdf', 'I');
            // Fin PDF
            
        }

        public function bacteriologia_pdf($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_bacteriologia", "idBacteriologia", 2);
            $data['bacteriologia'] = $this->Laboratorio_Model->detalleExamen($id, 2);
            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 20,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('
                    <table width="100%">
                        <tr>
                            <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                            <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                            <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                        </tr>
                    </table>');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bacteriologia_pdf', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('examen_bacteriologia.pdf', 'I');
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

        public function buscar_paciente(){
            if($this->input->is_ajax_request()){
                $id =$this->input->get("id");
                $data = $this->Paciente_Model->buscarPaciente(trim($id));
                echo json_encode($data);
            }
            else{
                echo "Error...";
            }
        }

        public function guardar_paciente(){
                /* echo '<script>
                    if (window.history.replaceState) { // verificamos disponibilidad
                        window.history.replaceState(null, null, window.location.href);
                    }
                </script>'; */
                $datos = $this->input->post();
                $bita = $datos["nombrePaciente"];

                if(sizeof($datos) > 0){
                    $c = $datos["codigoHoja"];
                    $codigo = $this->Hoja_Model->validarCodigoHoja($c);
                    if(!is_null($codigo)){
                        $ultimoCodigo = $this->Hoja_Model->codigoHoja(); // Ultimo codigo de hoja
                        $uc = $ultimoCodigo->codigoHoja + 1;
                        $datos["codigoHoja"] = "$uc";
                    }

                    if(isset($datos["idPaciente"]) && $datos["idPaciente"] > 0){
                        $paciente["nombrePaciente"] = $datos["nombrePaciente"];
                        $paciente["edadPaciente"] = $datos["edadPaciente"];
                        $paciente["telefonoPaciente"] = "0000-0000";
                        $paciente["duiPaciente"] = "00000000-0";
                        $paciente["nacimientoPaciente"] = "0000-00-00";
                        $paciente["direccionPaciente"] = "Usulután";
                        $paciente["idPaciente"] = $datos["idPaciente"];

                        $hoja["codigoHoja"] = $datos["codigoHoja"];
                        $hoja["tipoHoja"] = "Ambulatorio";
                        $hoja["fechaHoja"] = $datos["fechaHoja"];
                        $hoja["idMedico"] = $datos["idMedico"];
                        $hoja["idHabitacion"] = 37;
                        $hoja["idPaciente"] = $datos["idPaciente"];
                        $hoja["estadoHoja"] = 0;
                        $hoja["anulada"] = 1;
                        $hoja["tipoConsulta"] = $datos["tipoConsulta"];

                        $data["paciente"] = $paciente;
                        $data["hoja"] = $hoja;

                    }else{
                        $paciente["nombrePaciente"] = $datos["nombrePaciente"];
                        $paciente["edadPaciente"] = $datos["edadPaciente"];
                        $paciente["telefonoPaciente"] = "0000-0000";
                        $paciente["duiPaciente"] = "00000000-0";
                        $paciente["nacimientoPaciente"] = "0000-00-00";
                        $paciente["direccionPaciente"] = "Usulután";
                        $paciente["idPaciente"] = "0";

                        $hoja["codigoHoja"] = $datos["codigoHoja"];
                        $hoja["tipoHoja"] = "Ambulatorio";
                        $hoja["fechaHoja"] = $datos["fechaHoja"];
                        $hoja["idMedico"] = $datos["idMedico"];
                        $hoja["idHabitacion"] = 37;
                        $hoja["idPaciente"] = 0;
                        $hoja["estadoHoja"] = 0;
                        $hoja["anulada"] = 1;
                        $hoja["tipoConsulta"] = $datos["tipoConsulta"];

                        $data["paciente"] = $paciente;
                        $data["hoja"] = $hoja;
                        
                    }
                    $resp = $this->Laboratorio_Model->guardarHoja($data);
                    if($resp != 0){
                        // Agregando evento a bitacora
                            $bitacora["idUsuario"] = $this->session->userdata('id_usuario_h');
                            $bitacora["descripcionBitacora"] = "El usuario: ".$this->session->userdata('usuario_h')." Creo la hoja de laboratorio con ID = ".$resp." corespondiente al paciente ".$bita;
                            $this->Usuarios_Model->insertarBitacora($bitacora);
                            
                        $this->session->set_flashdata("exito","Los datos de la hoja de laboratorio fueron guardados con exito!");
                        redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                    }else{
                        $this->session->set_flashdata("error","Error al guardar los datos de la hoja de laboratorio!");
                        redirect(base_url()."Laboratorio/agregar_examen/");
                    }

                }else{
                    $this->session->set_flashdata("error","No se permite el reenvio de datos");
                    redirect(base_url()."Laboratorio/agregar_examen");
                }
            
        }
            
        

        public function buscar_examen(){
            if($this->input->is_ajax_request()){
                $id =$this->input->post("idExamen");
                $pivote =$this->input->post("pivote");
                $data = $this->Laboratorio_Model->buscarExamen(trim($id), trim($pivote));
                // $data2 = $this->Laboratorio_Model->obtenerDetalleConsulta(trim($id), trim($pivote));
                echo json_encode($data);
            }
            else{
                echo "Error...";
            }
        }
        
        public function historial_examenes(){
            $this->load->view("Base/header");
            $this->load->view("Laboratorio/buscar_paciente",);
            $this->load->view("Base/footer");
        }
        
        public function resultado_historial(){
            echo '<script>
				if (window.history.replaceState) { // verificamos disponibilidad
					window.history.replaceState(null, null, window.location.href);
				}
			</script>';
            $datos = $this->input->post();
            if(!isset($datos["nombrePaciente"])){
				$this->session->set_flashdata("error","Regresando a busqueda de pacientes!");
				redirect(base_url()."Laboratorio/historial_examenes");
			}else{
                $datos = $this->input->post();
                $str = trim($datos["nombrePaciente"]);
                $data["paciente"] = $this->Laboratorio_Model->busquedaHistorial($str);
                $data["medicos"] = $this->Medico_Model->obtenerMedicos();
                $this->load->view("Base/header");
                $this->load->view("Laboratorio/historial_consultas", $data);
                $this->load->view("Base/footer");
                // echo json_encode($data["paciente"]) ;
            }
        }

        
        public function examenes_realizados(){
            $data["paciente"] = $this->Laboratorio_Model->historialConsultas();
            $data["medicos"] = $this->Medico_Model->obtenerMedicos();
            $this->load->view("Base/header");
            $this->load->view("Laboratorio/historial_consultas", $data);
            $this->load->view("Base/footer");
            // echo json_encode($data);
        }

        

        public function actualizar_paciente(){
            $datos = $this->input->post();
            // var_dump($datos);
            $bool = $this->Laboratorio_Model->actualizarPaciente($datos);
            if($bool){
                $this->session->set_flashdata("exito","Los datos de la hoja de cobro fueron guardados con exito!");
                redirect(base_url()."Laboratorio/examenes_realizados/");
            }else{
                $this->session->set_flashdata("error","Error al guardar los datos de la hoja de cobro!");
                redirect(base_url()."Laboratorio/examenes_realizados");
            }
        }




        // Examen de quimica clinica
            public function guardar_quimica_clinica(){
                $datos = $this->input->post();
                $data["examenes"] = $datos["quimicaClinicaSolicitado"];
                $datos["quimicaClinicaSolicitado"] = $data["examenes"][0];
                $resp = $this->Laboratorio_Model->guardarQuimicaClinica($datos);

                $examen = $resp["idQuimicaClinica"];
                $consulta = $resp["idDetalleConsulta"];
                $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los

                if($resp != 0){
                    $this->session->set_flashdata("exito","Los datos de la hoja de cobro fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/quimica_clinica_pdf/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos de la hoja de cobro!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }
            }

            public function quimica_clinica_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_quimica_clinica", "idQuimicaClinica", 5);
                $data['quimica'] = $this->Laboratorio_Model->detalleExamen($id, 5);

                
                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 20,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/quimica_clinica_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('examen_quimica_clinica.pdf', 'I');
                

            }

            public function actualizar_quimica_clinica(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                $bool = $this->Laboratorio_Model->actualizarQuimicaClinica($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }
            }
        // Fin quimica clinica

        // Examen de Tiroideas libres
            public function guardar_tiroidea_libre(){
                $datos = $this->input->post();
                $examenes = array();
                // Analizando informacion ingresada
                    if($datos["t3TiroideaLibre"] != ""){
                        array_push($examenes, 870);
                    }
                    if($datos["t4TiroideaLibre"] != ""){
                        array_push($examenes, 871);
                    }
                    if($datos["tshTiroideaLibre"] != ""){
                        array_push($examenes, 872);
                    }
                    if($datos["tshTiroideaLibreU"] != ""){
                        array_push($examenes, 1088);
                    }
                // echo json_encode($datos);
                // Fin analisis
                if(sizeof($examenes) > 0){

                    $data["examenes"] = $examenes;
                    $datos["examenSolicitado"] = $examenes[0];
                    $resp = $this->Laboratorio_Model->guardarTiroideaLibre($datos);

                    $examen = $resp["idTiroideaLibre"];
                    $consulta = $resp["idDetalleConsulta"];
                    $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes

                    if($resp != 0){
                        $this->descuentosReactivos($examenes, $examen, 8); // Ejecutando descuentos de stock
                        $this->session->set_flashdata("exito","Los datos de la hoja de cobro fueron guardados con exito!");
                        redirect(base_url()."Laboratorio/tiroidea_libre_pdf_b/$examen/");
                    }else{
                        $this->session->set_flashdata("error","Error al guardar los datos de la hoja de cobro!");
                        redirect(base_url()."Laboratorio/historial_examenes/");
                    }
                    
                }else{
                    $this->session->set_flashdata("error","No seleccionaste ningun examen!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }
                // Anterior
                    // var_dump($examenes);
                    /* $data["examenes"] = $datos["examenSolicitado"];
                    $datos["examenSolicitado"] = $data["examenes"][0];
                    $resp = $this->Laboratorio_Model->guardarTiroideaLibre($datos);

                    $examen = $resp["idTiroideaLibre"];
                    $consulta = $resp["idDetalleConsulta"];
                    $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes 

                    if($resp != 0){
                        $this->session->set_flashdata("exito","Los datos de la hoja de cobro fueron guardados con exito!");
                        redirect(base_url()."Laboratorio/tiroidea_libre_pdf/$examen/");
                    }else{
                        $this->session->set_flashdata("error","Error al guardar los datos de la hoja de cobro!");
                        redirect(base_url()."Laboratorio/historial_examenes/");
                    } */
                // Fin anterior
            }

            public function tiroidea_libre_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_tiroideas_libres", "idTiroideaLibre", 8);
                $data['tiroideaLibre'] = $this->Laboratorio_Model->detalleExamen($id, 8);
                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/tirodidea_libre_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('examen_tirodidea_libre.pdf', 'I');
                

            }

            public function actualizar_tiroidea_libre(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                $bool = $this->Laboratorio_Model->actualizarTiroideaLibre($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }
            }

        // Fin Tiroideas libres

        // Examen de Tiroideas Totales
            public function guardar_tiroideas_totales(){
                $datos = $this->input->post();
                
                $examenes = array();
                // Analizando informacion ingresada
                    if($datos["t3TiroideaTotal"] != ""){
                        array_push($examenes, 868);
                    }
                    if($datos["t4TiroideaTotal"] != ""){
                        array_push($examenes, 869);
                    }
                    if($datos["tshTiroideaTotal"] != ""){
                        // array_push($examenes, 872);
                        array_push($examenes, 1078);
                    }
                // Fin analisis
                
                if(sizeof($examenes) > 0){
                    $data["examenes"] = $examenes;
                    $datos["examenSolicitado"] = $examenes[0];
                    echo json_encode($data);
                    $resp = $this->Laboratorio_Model->guardarTiroideaTotal($datos);

                    $examen = $resp["idTiroideaTotal"];
                    $consulta = $resp["idDetalleConsulta"];
                    $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes
                    if($resp != 0){
                        $this->descuentosReactivos($examenes, $examen, 9); // Ejecutando descuentos de stock
                        $this->session->set_flashdata("exito","Los datos de la hoja de cobro fueron guardados con exito!");
                        redirect(base_url()."Laboratorio/tiroidea_total_pdf_b/$examen/");
                    }else{
                        $this->session->set_flashdata("error","Error al guardar los datos de la hoja de cobro!");
                        redirect(base_url()."Laboratorio/historial_examenes/");
                    }
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos de la hoja de cobro!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }
                
                // Anterior
                    /* $data["examenes"] = $datos["examenSolicitado"];
                    $datos["examenSolicitado"] = $data["examenes"][0];
                    $resp = $this->Laboratorio_Model->guardarTiroideaTotal($datos);

                    $examen = $resp["idTiroideaTotal"];
                    $consulta = $resp["idDetalleConsulta"];
                    $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes 

                    if($resp != 0){
                        $this->session->set_flashdata("exito","Los datos de la hoja de cobro fueron guardados con exito!");
                        redirect(base_url()."Laboratorio/tiroidea_total_pdf/$examen/");
                    }else{
                        $this->session->set_flashdata("error","Error al guardar los datos de la hoja de cobro!");
                        redirect(base_url()."Laboratorio/historial_examenes/");
                    } */
                // Fin anterior



            }

            public function tiroidea_total_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_tiroideas_totales", "idTiroideaTotal", 9);
                $data['tiroideaTotal'] = $this->Laboratorio_Model->detalleExamen($id, 9);
                
                // Reporte
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/tirodidea_total_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('examen_tirodidea_total.pdf', 'I'); 
                // Fin reporte

            }

            public function actualizar_tiroideas_totales(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                // var_dump($datos);
                unset($datos["consulta"]);
                $bool = $this->Laboratorio_Model->actualizarTiroideaTotal($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }
            }

        // Fin Tiroideas Totales

        

        // Examenes PSA
            public function guardar_psa(){
                $datos = $this->input->post();
                $data["examenes"] = $datos["examenSolicitado"];
                $examenes = $datos["examenSolicitado"];
                $datos["examenSolicitado"] = $data["examenes"][0];
                echo json_encode($datos);
                $resp = $this->Laboratorio_Model->guardarPSA($datos);

                $examen = $resp["idPSA"];
                $consulta = $resp["idDetalleConsulta"];
                $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes 

                if($resp != 0){
                    $this->descuentosReactivos($examenes, $examen, 11); // Ejecutando descuentos de stock
                    $this->session->set_flashdata("exito","Los datos de la hoja de cobro fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/psa_pdf_b/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos de la hoja de cobro!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }
            }

            public function psa_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_antigeno_prostatico", "idAntigenoProstatico", 11);
                $data['psa'] = $this->Laboratorio_Model->detalleExamen($id, 11);

                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/psa_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('psa_pdf.pdf', 'I');
                

            }

            public function actualizar_psa(){
                $datos = $this->input->post();
                // var_dump($datos);
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                $bool = $this->Laboratorio_Model->actualizarPSA($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }
            }

        // Fin PSA


        // Examen de Hisopado Nasal
            public function guardar_hisopado(){
                $datos = $this->input->post();
                $data["examenes"] = $datos["examenSolicitado"];
                $examenes = $datos["examenSolicitado"];
                $datos["examenSolicitado"] = $data["examenes"][0];
                $resp = $this->Laboratorio_Model->guardarHisopado($datos);

                $examen = $resp["idHisopado"];
                $consulta = $resp["idDetalleConsulta"];
                $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes 

                 if($resp != 0){
                    $this->descuentosReactivos($examenes, $examen, 14); // Ejecutando descuentos de stock
                    $this->session->set_flashdata("exito","Los datos de la hoja de cobro fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/hisopado_pdf_b/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos de la hoja de cobro!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }

                // echo json_encode($datos);
            }

            public function hisopado_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_hisopado_nasal", "idHisopadoNasal", 14);
                $data['hisopado'] = $this->Laboratorio_Model->detalleExamen($id, 14);

                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/hisopado_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('hisopado_pdf.pdf', 'I');
                

            }

            public function actualizar_hisopado(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                $bool = $this->Laboratorio_Model->actualizarHisopado($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }

                // echo json_encode($datos);
            }
        // Fin Hisopado Nasal

        // Examenes varios
            public function guardar_libre(){
                $datos = $this->input->post();
                $datosExamen = array('examen' => $datos["examenSolicitadoLibre"], 'mostrar' => 1);
                $respExamen = $this->Laboratorio_Model->agregarNuevoExamen($datosExamen);
                $data["examenes"] = $datos["examenSolicitado"];
                $datos["examenSolicitado"] = $data["examenes"][0];
                $resp = $this->Laboratorio_Model->guardarVarios($datos);
                
                $examen = $resp["idVarios"];
                $consulta = $resp["idDetalleConsulta"];
                $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes 
                
                if($resp != 0){
                    $this->session->set_flashdata("exito","Los datos de la hoja de cobro fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/varios_pdf/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos de la hoja de cobro!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }
            }

            /* public function varios_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_varios", "idVarios", 10);
                $data['varios'] = $this->Laboratorio_Model->detalleExamen($id, 10);

                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/varios_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('varios_pdf.pdf', 'I');
                

            }

            public function actualizar_varios(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                $bool = $this->Laboratorio_Model->actualizarVarios($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }
            } */

        // Fin varios

        // Examenes Espermograma
            public function guardar_esperma(){
                $datos = $this->input->post();
                $data["examenes"] = $datos["examenSolicitado"];
                $examenes = $datos["examenSolicitado"];
                $datos["examenSolicitado"] = $data["examenes"][0];
                var_dump($datos);
                $resp = $this->Laboratorio_Model->guardarEspermograma($datos);

                $examen = $resp["idEspermograma"];
                $consulta = $resp["idDetalleConsulta"];
                $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes 

                if($resp != 0){
                    $this->descuentosReactivos($examenes, $examen, 15); // Ejecutando descuentos de stock
                    $this->session->set_flashdata("exito","Los datos del examen fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/espermograma_pdf_b/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos de la consulta!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }
            }

            public function espermograma_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_espermograma", "idEspermograma", 15);
                $data['espermograma'] = $this->Laboratorio_Model->detalleExamen($id, 15);
                // var_dump($data['cabecera']);
                // echo "<br>___________________________________________________________________________________<br>";
                // var_dump($data['hematologia']);

                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/espermograma_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('hematologia_pdf.pdf', 'I');
                

            }

            public function actualizar_esperma(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                
                $bool = $this->Laboratorio_Model->actualizarEspermograma($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }
            }
        // Fin Espermograma

        // Examenes Creatinina
            public function guardar_creatinina(){
                $datos = $this->input->post();
                $datos["depuracionCreatinina"] = $datos["depuracionCreatinina"];
                $data["examenes"] = $datos["examenSolicitado"];
                $examenes = $datos["examenSolicitado"];
                $datos["examenSolicitado"] = $data["examenes"][0];
                $resp = $this->Laboratorio_Model->guardarCreatinina($datos);

                $examen = $resp["idCreatinina"];
                $consulta = $resp["idDetalleConsulta"];
                $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes 

                if($resp != 0){
                    $this->descuentosReactivos($examenes, $examen, 16); // Ejecutando descuentos de stock
                    $this->session->set_flashdata("exito","Los datos del examen fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/creatinina_pdf_b/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos de la consulta!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }
            }

            public function creatinina_pdf($id){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_depuracion_creatinina", "idDepuracion", 16);
                $data['creatinina'] = $this->Laboratorio_Model->detalleExamen($id, 16);
                // var_dump($data['espermograma']);
                // echo "<br>___________________________________________________________________________________<br>";
                // var_dump($data['hematologia']);
                
                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/creatinina_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('hematologia_pdf.pdf', 'I');
                // Fin Facturas
                

            }
            
            public function actualizar_creatinina(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                
                $bool = $this->Laboratorio_Model->actualizarCreatinina($datos);
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }
            }
        // Fin Creatinina

        // Examenes gases arteriales
            public function guardar_gases_arteriales(){
                $datos = $this->input->post();
                $data["examenes"] = $datos["examenSolicitado"];
                $examenes = $datos["examenSolicitado"];
                $datos["examenSolicitado"] = $data["examenes"][0];
                $resp = $this->Laboratorio_Model->guardarGasesArteriales($datos);
                
                $examen = $resp["idGasesArteriales"];
                $consulta = $resp["idDetalleConsulta"];
                $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes 
                
                if($resp != 0){
                    $this->descuentosReactivos($examenes, $examen, 17); // Ejecutando descuentos de stock
                    $this->session->set_flashdata("exito","Los datos del examen fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/gases_arteriales_pdf_b/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos de la consulta!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                }
            }
            
            public function gases_arteriales_pdf($id = null){
                
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_gases_arteriales", "idGasesArteriales", 17);
                $data['arteriales'] = $this->Laboratorio_Model->detalleExamen($id, 17);

                
                // var_dump($data['espermograma']);
                // echo "<br>___________________________________________________________________________________<br>";
                // var_dump($data['hematologia']);
                
                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/gases_arteriales_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('hematologia_pdf.pdf', 'I');
                // Fin Facturas
               
               
            }
            
            public function actualizar_gases_arteriales(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                echo json_encode($datos);
                
                $bool = $this->Laboratorio_Model->actualizarGasesArteriales($datos);
                
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }
            }
        // Fin gases arteriales

        // Examenes gases arteriales
            public function guardar_tolerancia_glucosa(){
                $datos = $this->input->post();
                $pCarga = $datos["parametroCarga"];
                unset($datos["parametroCarga"]);
                $datos["parametroCarga"] = $pCarga;
                $data["examenes"] = $datos["examenSolicitado"];
                $examenes = $datos["examenSolicitado"];
                $datos["examenSolicitado"] = $data["examenes"][0];
                
                $resp = $this->Laboratorio_Model->guardarToleranciaGlucosa($datos);
                
                $examen = $resp["idToleranciaGlucosa"];
                $consulta = $resp["idDetalleConsulta"];
                $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes 
                
                if($resp != 0){
                    $this->descuentosReactivos($examenes, $examen, 18); // Ejecutando descuentos de stock
                    $this->session->set_flashdata("exito","Los datos del examen fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/tolerancia_glucosa_pdf_b/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos de la consulta!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                    
                }
            }
            
            public function tolerancia_glucosa_pdf($id = null){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_tolerancia_glucosa", "idToleranciaGlucosa ", 18);
                $data['tolerancia'] = $this->Laboratorio_Model->detalleExamen($id, 18);
                
                // Factura
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/tolerancia_glucosa_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('hematologia_pdf.pdf', 'I');
                // Fin Facturas
            
            }
        
            public function actualizar_tolerancia_glucosa(){
                $datos = $this->input->post();
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                
                $bool = $this->Laboratorio_Model->actualizarToleranciaGlucosa($datos);
                
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }
            }
        // Fin gases arteriales

        // Examenes gases arteriales
            public function guardar_toxoplasma(){
                    
                $datos = $this->input->post();
                $data["examenes"] = $datos["examenSolicitado"];
                $examenes = $datos["examenSolicitado"];
                $datos["examenSolicitado"] = $data["examenes"][0];
                
                $resp = $this->Laboratorio_Model->guardarToxoplasma($datos);
                $examen = $resp["idToxoplasma"];
                $consulta = $resp["idDetalleConsulta"];
                
                $resp2 = $this->Laboratorio_Model->guardarExamenes($data, $consulta); //guardando todos los examenes 
                if($resp != 0){
                    $this->descuentosReactivos($examenes, $examen, 19); // Ejecutando descuentos de stock
                    $this->session->set_flashdata("exito","Los datos del examen fueron guardados con exito!");
                    redirect(base_url()."Laboratorio/toxoplasma_pdf_b/$examen/");
                }else{
                    $this->session->set_flashdata("error","Error al guardar los datos de la consulta!");
                    redirect(base_url()."Laboratorio/historial_examenes/");
                    
                }

                // echo json_encode($datos);
            }
            
            public function toxoplasma_pdf($id = null){
                $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_toxoplasma", "idToxoplasma ", 19);
                $data['toxoplasma'] = $this->Laboratorio_Model->detalleExamen($id, 19);

                // Reporte toxoplasma
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                    $mpdf = new \Mpdf\Mpdf([
                        'margin_left' => 15,
                        'margin_right' => 15,
                        'margin_top' => 15,
                        'margin_bottom' => 25,
                        'margin_header' => 10,
                        'margin_footer' => 25
                    ]);
                    //$mpdf->setFooter('{PAGENO}');
                    $mpdf->SetHTMLFooter('
                        <table width="100%">
                            <tr>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Firma y sello del profesional</td>
                                <td width="33%" align="center"><strong style="font-size: 11px; color: #075480">{PAGENO}/{nbpg}</strong></td>
                                <td width="33%" style="text-align: center; border-top: 1px solid #075480"><strong style="font-size: 11px; color: #075480">Sello del laboratorio</strong></td>
                            </tr>
                        </table>');
                    $mpdf->SetProtection(array('print'));
                    $mpdf->SetTitle("Centro Médico La Familia");
                    $mpdf->SetAuthor("Edwin Orantes");
                    $mpdf->showWatermarkText = true;
                    $mpdf->watermark_font = 'DejaVuSansCondensed';
                    $mpdf->watermarkTextAlpha = 0.1;
                    $mpdf->SetDisplayMode('fullpage');
                    //$mpdf->AddPage('L'); //Voltear Hoja

                    $html = $this->load->view('base/header', $data,true); 
                    $html = $this->load->view('Laboratorio/toxoplasma_pdf', $data,true); // Cargando hoja de estilos

                    $mpdf->WriteHTML($html);
                    $mpdf->Output('hematologia_pdf.pdf', 'I');
                // Fin reporte toxoplasma

                // echo json_encode($datos);

            }

            public function actualizar_toxoplasma(){
                $datos = $this->input->post();
                echo json_encode($datos);
                $resp = $datos["consulta"];
                unset($datos["consulta"]);
                
                $bool = $this->Laboratorio_Model->actualizarToxoplasma($datos);
                
                if($bool){
                    $this->session->set_flashdata("exito","Los datos fueron actualizados con exito!");
                    redirect(base_url()."Laboratorio/detalle_consulta/$resp/");
                }else{
                    $this->session->set_flashdata("error","Error al actualizar los datos!");
                    redirect(base_url()."Laboratorio/");
                }
            }
        // Fin gases arteriales
        
    public function resumen_examenes(){
        $this->load->view("Base/header");
        $this->load->view("Laboratorio/reporte_por_fechas");
        $this->load->view("Base/footer");
    }

    public function resumen_examenes_excel(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $datos = $this->input->post();
            if($datos["fechaInicio"] > $datos["fechaFin"]){
                /* $this->session->set_flashdata("error","La fecha de inicio no puede ser mayor o igual a la fecha fin");
				redirect(base_url()."Laboratorio/resumen_examenes"); */
            }else{
                $i = $datos["fechaInicio"];
                $f = $datos["fechaFin"];
            }
        }else{
            $i = date("Y-m-d");
            $f = date("Y-m-d");
        }

        // Sacando excel
            $datos = $this->Laboratorio_Model->obtenerConsultas($i, $f);
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'CENTRO MEDICO LA FAMILIA');
            $sheet->mergeCells('A1:E1');
            // Centrando horizontalmente.
                $centrar = [
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ];
                $sheet->getStyle('A1:F2')->applyFromArray($centrar);
                $sheet->getStyle('A2:F2')->applyFromArray($centrar);
            // Fin centrar horizontalmente

            $sheet->setCellValue('A2', '#');
            $sheet->setCellValue('B2', 'Paciente');
            $sheet->setCellValue('C2', 'Examenes');
            $sheet->setCellValue('D2', 'Efectuados');
            $sheet->setCellValue('E2', 'Total');

            // Poniendo en negritas
                $sheet->getStyle('A1:E1')->getFont()->setBold(true);	
                $sheet->getStyle('A2:E2')->getFont()->setBold(true);	
            // Fin poner negritas
            $flag = 3;
            $index=1;
            
            foreach ($datos as $fila) {
                $cadenaDetalle = "";
                $consumidoPaciente = 0;
                $detalleConsulta = $this->Laboratorio_Model->obtenerDetalleConsultas($fila->idConsultaLaboratorio);
                $efectuados = 0;
                $hospital = 0;
                $isbm = 0;
                $urologica = 0;
                
                foreach ($detalleConsulta as $detalle) {

                    $cadenaDetalle .= $detalle->examenes;

                    $totalExamenes = $this->Laboratorio_Model->detalleExamenesRealizados($detalle->idDetalleConsulta);
                    foreach ($totalExamenes as $detalleConsumido) {
                        $consumidoPaciente += ($detalleConsumido->precioVMedicamento * 1);
                        $efectuados++;
                    }
                    
                }
                // var_dump($detalleConsulta);
                //echo $fila->tipoConsulta." --- ".$fila->idConsultaLaboratorio." --- ".$fila->nombrePaciente." --- ".$cadenaDetalle." --- ".$consumidoPaciente."<br>";
                
                
                $sheet->setCellValue('A'.$flag, $index);
                $sheet->setCellValue('B'.$flag, $fila->nombrePaciente);
                $sheet->setCellValue('C'.$flag, $cadenaDetalle);
                $sheet->getStyle('C'.$flag)->getAlignment()->setWrapText(true);
                $sheet->setCellValue('D'.$flag, $efectuados);
                $sheet->setCellValue('E'.$flag, $consumidoPaciente);
                
                $efectuados = 0;
                $index++;
                $flag++;
                

            }

            $sheet->getColumnDimension('A')->setWidth(5);
            $sheet->getColumnDimension('B')->setWidth(50);
            $sheet->getColumnDimension('C')->setWidth(100);
            $sheet->getColumnDimension('D')->setWidth(15);
            $sheet->getColumnDimension('E')->setWidth(15);

            $curdate = date('d-m-Y H:i:s');
            $writer = new Xlsx($spreadsheet);
            $filename = 'examenes_del_mes'.$curdate;
            ob_end_clean();
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
        // Fin sacar excel
    }
    /* Metodos para gestion de procesos de laboratorio */

    /* Metodos para el Dashboard */
        public function dashboard_laboratorio(){

            // Total consumido en el mes... 
                $totalLab = 0;
                $totalLabOld = 0;
                $totalExamenes = 0;
                $totalExamenesOld = 0;
                $anio = date('Y');
                $mes = date('m');

                $i = $anio."-".$mes."-01";
                $f = $anio."-".$mes."-31";
                // Mes anterior
                $fbs = explode("-", $f);
                $today = $fbs[0]."-".$fbs[1]."-".date('d');

                $ib = date("Y-m-d",strtotime($i."- 1 month")); 
                $fb = date("Y-m-d",strtotime($today."- 1 month")); 

                $examenes = $this->Laboratorio_Model->examenesMes($i, $f); // Toma lo que hay hasta este dia....
                foreach ($examenes as $examen) {
                    $totalLab += (1 * $examen->precioVMedicamento );
                    $totalExamenes++;
                }
                // Mes anterior
                $examenesAnteriores = $this->Laboratorio_Model->examenesMes($ib, $fb); // Toma lo que hay hasta este dia el el mes anterior...
                foreach ($examenesAnteriores as $examen) {
                    $totalLabOld += (1 * $examen->precioVMedicamento );
                    $totalExamenesOld++;
                }

                $data["totalLab"] = $totalLab;
                $data["totalExamenes"] = $totalExamenes;
                $data["totalLabOld"] = $totalLabOld;
                $data["totalExamenesOld"] = $totalExamenesOld;

                // Examenes Hoy
                    $hi = date("Y-m-d");
                    $hf = date("Y-m-d");
                    $totalH = 0;
                    $examenesHoy = $this->Laboratorio_Model->examenesMes($hi, $hf);
                    foreach ($examenesHoy as $examen) {
                        // $totalH += (1 * $examen->precioVMedicamento );
                        $totalH++;
                    }
                    $data["totalH"] = $totalH;
                // Fin hoy

            // Fin consumido este mes

            // Las 30 fechas anteriores
                $examenesDiarios = 0;
                $fechas = $this->Laboratorio_Model->obtenerFechas($f);
                if(sizeof($fechas) != 0){
                    foreach ($fechas as $fecha) {
                        $data['fechas'][] = $fecha->fechaConsulta;
                        $examenesDiarios = $this->Laboratorio_Model->examenesDiarios($fecha->fechaConsulta);
                        $data["examenesDiarios"][] = $examenesDiarios->totalExamenes;
                    }
                    $data['examenes_data'] = json_encode($data['examenesDiarios']);
                    $data['fecha_data'] = json_encode($data['fechas']);
                }
            // Fin fechas

            //Reactivos en uso
                $data["reactivosEU"] = $this->Laboratorio_Model->reactivosEnUSo();
            //Fin reactivos en uso

            $this->load->view("Base/header");
            $this->load->view("Laboratorio/dashboard_laboratorio", $data);
            $this->load->view("Base/footer");
        }

        public function detalle_examenes_excel(){
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Examen Realizado');
            $sheet->setCellValue('B1', 'Cantidad');
            $sheet->setCellValue('C1', 'Precio');
            $sheet->setCellValue('D1', 'Total');

            $anio = date('Y');
            $mes = date('m');

            $i = $anio."-".$mes."-01";
            $f = $anio."-".$mes."-31";

            /* $i = "2022-04-01";
            $f = "2022-04-31"; */

            $datos = $this->Laboratorio_Model->examenesRealizados($i, $f);
            $number = 1;
            $flag = 2;
            $totalFactura = 0;
            $totalGlobal = 0;
            foreach($datos as $d){
                $sheet->setCellValue('A'.$flag, $d->nombreMedicamento);
                $sheet->setCellValue('B'.$flag, $d->totalMes);
                $sheet->setCellValue('C'.$flag, $d->precioVMedicamento);
                $sheet->setCellValue('D'.$flag, ($d->totalMes * $d->precioVMedicamento));
                if($d->precioVMedicamento == 0){
                    $sheet->setCellValue('E'.$flag, "Laboratorio externo");
                }
                $flag++;
            }
            
            $style = [
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => 'FF000000'],
                            ],
                        ],
                    ];
        
            $sheet->getStyle('A1:D1')->getFont()->setBold(true);		
            //Alignment
            //fONT SIZE
            $sheet->getStyle('A1:D'.$flag)->getFont()->setSize(12);
            $sheet->getStyle('A1:D'.$flag)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

            $sheet->getStyle('A1:D'.$flag)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle("A".($flag+1).":D".($flag+1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            //Custom width for Individual Columns
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setWidth(25);

            $curdate = date('d-m-Y H:i:s');
            $writer = new Xlsx($spreadsheet);
            $filename = 'examenes_del_mes'.$curdate;
            ob_end_clean();
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
        }

        public function examenes_por_fecha_excel(){
            $datos = $this->input->post();
            if ($datos['hojaInicio'] > $datos['hojaFin']) {
                $this->session->set_flashdata("error","La fecha de inicio no puede ser mayor o igual a la fecha fin");
                redirect(base_url()."Laboratorio/dashboard_laboratorio");
            }else{
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A1', 'Examen Realizado');
                $sheet->setCellValue('B1', 'Cantidad');
                $sheet->setCellValue('C1', 'Precio');
                $sheet->setCellValue('D1', 'Total');

                $datos = $this->Laboratorio_Model->examenesRealizados($datos['hojaInicio'], $datos['hojaFin']);
                $number = 1;
                $flag = 2;
                $totalFactura = 0;
                $totalGlobal = 0;
                foreach($datos as $d){
                    $sheet->setCellValue('A'.$flag, $d->nombreMedicamento);
                    $sheet->setCellValue('B'.$flag, $d->totalMes);
                    $sheet->setCellValue('C'.$flag, $d->precioVMedicamento);
                    $sheet->setCellValue('D'.$flag, ($d->totalMes * $d->precioVMedicamento));
                    if($d->precioVMedicamento == 0){
                        $sheet->setCellValue('E'.$flag, "Laboratorio externo");
                    }
                    $flag++;
                }
                
                $style = [
                            'borders' => [
                                'allBorders' => [
                                    'borderStyle' => Border::BORDER_THIN,
                                    'color' => ['argb' => 'FF000000'],
                                ],
                            ],
                        ];
            
                $sheet->getStyle('A1:D1')->getFont()->setBold(true);		
                //Alignment
                //fONT SIZE
                $sheet->getStyle('A1:D'.$flag)->getFont()->setSize(12);
                $sheet->getStyle('A1:D'.$flag)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

                $sheet->getStyle('A1:D'.$flag)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("A".($flag+1).":D".($flag+1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                //Custom width for Individual Columns
                $sheet->getColumnDimension('A')->setAutoSize(true);
                $sheet->getColumnDimension('B')->setAutoSize(true);
                $sheet->getColumnDimension('C')->setAutoSize(true);
                $sheet->getColumnDimension('D')->setAutoSize(true);
                $sheet->getColumnDimension('E')->setWidth(25);

                $curdate = date('d-m-Y H:i:s');
                $writer = new Xlsx($spreadsheet);
                $filename = 'examenes_del_mes'.$curdate;
                ob_end_clean();
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
                header('Cache-Control: max-age=0');
                $writer->save('php://output');
            }
        }
    /* Fin metodos para el Dashboard */


    private function descuentosReactivos($params = null, $pivote = null, $tabla = null){
        // Recorriendo el vector de examenes
            $stock = 0;
            for ($i=0; $i < sizeof($params); $i++) {
                $ex = $params[$i];
                
                $resp = $this->Laboratorio_Model->examenReactivo($ex);
                foreach ($resp as $fila) {
                    $stock = 0;
                    $med =  $this->Laboratorio_Model->obtenerReactivo($fila->idReactivo);
                    // Nuevo stock
                    $stock = ($med->stockInsumoLab - $fila->medidaReactivo);
                    $this->Laboratorio_Model->actualizarReactivos($stock, $fila->idReactivo, $fila->medidaReactivo, $pivote, $tabla);
                }
            }
        // Fin recorrer el vector de examenes
    }


    // public function reintegroStock($pivote, $tabla){
        public function reintegroStock($pivote = null, $tabla = null){
            $stock = 0;
            $datos = $this->Laboratorio_Model->reintegroStock($pivote, $tabla);
            // echo json_encode($datos);
            foreach ($datos as $fila) {
                $insumo = $this->Laboratorio_Model->obtenerReactivo($fila->idReactivo);
                $stock = ($insumo->stockInsumoLab + $fila->cantidadReactivo);
                //$this->Laboratorio_Model->updateStock($stock, $fila->idReactivo);
                // echo $fila->idUsoReactivo." --- ".$fila->idReactivo." --- ".$fila->cantidadReactivo."<br>";
                $this->Laboratorio_Model->borrarUsoInsumo($pivote, $tabla);
            }
        }
    // Fin


    // Blanco y negro
        public function examen_inmunologia_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_inmunologia", "idInmunologia", 1);
            $data['inmunologia'] = $this->Laboratorio_Model->detalleExamen($id, 1);
            
            // Inicio PDF
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/inmunologia_pdf', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('examen_inmunologia.pdf', 'I');
            // Fin PDF
            
        }

        public function cropologia_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_cropologia", "idCropologia", 7);
            $data['cropologia'] = $this->Laboratorio_Model->detalleExamen($id, 7);
            

            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/cropologia_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('examen_cropologia.pdf', 'I');
            // Fin
            

        }

        public function orina_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_orina", "idOrina", 13);
            $data['orina'] = $this->Laboratorio_Model->detalleExamen($id, 13);
            /* var_dump($data['cabecera']);
            echo "<br>___________________________________________________________________________________<br>";
            var_dump($data['orina']); */

            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/orina_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('orina_pdf.pdf', 'I');
            

        }

        public function varios_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_varios", "idVarios", 10);
            $data['varios'] = $this->Laboratorio_Model->detalleExamen($id, 10);

            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/varios_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('varios_pdf.pdf', 'I');
            

        }

        public function sanguineo_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_sanguineo", "idSanguineo", 4);
            $data['sanguineo'] = $this->Laboratorio_Model->detalleExamen($id, 4);
            
            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/sanguineo_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('examen_sanguineo.pdf', 'I');
            

        }

        public function psa_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_antigeno_prostatico", "idAntigenoProstatico", 11);
            $data['psa'] = $this->Laboratorio_Model->detalleExamen($id, 11);

            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/psa_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('psa_pdf.pdf', 'I');
            

        }

        public function coagulacion_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_coagulacion", "idCoagulacion", 3);
            $data['coagulacion'] = $this->Laboratorio_Model->detalleExamen($id, 3);

            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/coagulacion_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('examen_coagulacion.pdf', 'I');
            

        }

        public function hisopado_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_hisopado_nasal", "idHisopadoNasal", 14);
            $data['hisopado'] = $this->Laboratorio_Model->detalleExamen($id, 14);

            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/hisopado_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('hisopado_pdf.pdf', 'I');
            

        }

        /* public function quimica_sanguinea_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_quimica_sanguinea", "idQuimicaSanguinea ", 6);
            $data['sanguinea'] = $this->Laboratorio_Model->detalleExamen($id, 6);
            
            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/quimica_sanguinea_pdf', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('examen_quimica_sanguinea.pdf', 'I');
            

        } */

        public function bacteriologia_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_bacteriologia", "idBacteriologia", 2);
            $data['bacteriologia'] = $this->Laboratorio_Model->detalleExamen($id, 2);
            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/bacteriologia_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('examen_bacteriologia.pdf', 'I');
        }

        public function tiroidea_libre_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_tiroideas_libres", "idTiroideaLibre", 8);
            $data['tiroideaLibre'] = $this->Laboratorio_Model->detalleExamen($id, 8);
            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/tirodidea_libre_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('examen_tirodidea_libre.pdf', 'I');
            

        }

        public function tiroidea_total_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_tiroideas_totales", "idTiroideaTotal", 9);
            $data['tiroideaTotal'] = $this->Laboratorio_Model->detalleExamen($id, 9);
            
            // Reporte
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/tirodidea_total_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('examen_tirodidea_total.pdf', 'I'); 
            // Fin reporte

        }

        public function hematologia_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_hematologia", "idHematologia", 12);
            $data['hematologia'] = $this->Laboratorio_Model->detalleExamen($id, 12);
            // var_dump($data['cabecera']);
            // echo "<br>___________________________________________________________________________________<br>";
            //var_dump($data['hematologia']);

            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L', 'img_dpi' => 96]);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/hematologia_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('hematologia_pdf.pdf', 'I');
            // Fin

        }

        public function espermograma_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_espermograma", "idEspermograma", 15);
            $data['espermograma'] = $this->Laboratorio_Model->detalleExamen($id, 15);
            // var_dump($data['cabecera']);
            // echo "<br>___________________________________________________________________________________<br>";
            // var_dump($data['hematologia']);

            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/espermograma_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('hematologia_pdf.pdf', 'I');

        }

        public function creatinina_pdf_b($id){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_depuracion_creatinina", "idDepuracion", 16);
            $data['creatinina'] = $this->Laboratorio_Model->detalleExamen($id, 16);
            // var_dump($data['espermograma']);
            // echo "<br>___________________________________________________________________________________<br>";
            // var_dump($data['hematologia']);
            
            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/creatinina_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('hematologia_pdf.pdf', 'I');
            // Fin Facturas
            

        }

        public function tolerancia_glucosa_pdf_b($id = null){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_tolerancia_glucosa", "idToleranciaGlucosa ", 18);
            $data['tolerancia'] = $this->Laboratorio_Model->detalleExamen($id, 18);
            
            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/tolerancia_glucosa_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('hematologia_pdf.pdf', 'I');
            // Fin Facturas
        
        }

        public function toxoplasma_pdf_b($id = null){
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_toxoplasma", "idToxoplasma ", 19);
            $data['toxoplasma'] = $this->Laboratorio_Model->detalleExamen($id, 19);

            // Reporte toxoplasma
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/toxoplasma_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('hematologia_pdf.pdf', 'I');
            // Fin reporte toxoplasma

            // echo json_encode($datos);

        }

        public function gases_arteriales_pdf_b($id = null){
                    
            $data['cabecera'] = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_gases_arteriales", "idGasesArteriales", 17);
            $data['arteriales'] = $this->Laboratorio_Model->detalleExamen($id, 17);

            
            // var_dump($data['espermograma']);
            // echo "<br>___________________________________________________________________________________<br>";
            // var_dump($data['hematologia']);
            
            // Factura
                $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
                $mpdf = new \Mpdf\Mpdf([
                    'margin_left' => 15,
                    'margin_right' => 15,
                    'margin_top' => 45,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 25
                ]);
                //$mpdf->setFooter('{PAGENO}');
                $mpdf->SetHTMLFooter('');
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle("Centro Médico La Familia");
                $mpdf->SetAuthor("Edwin Orantes");
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermarkTextAlpha = 0.1;
                $mpdf->SetDisplayMode('fullpage');
                //$mpdf->AddPage('L'); //Voltear Hoja

                $html = $this->load->view('base/header', $data,true); 
                $html = $this->load->view('Laboratorio/bn/gases_arteriales_pdf_b', $data,true); // Cargando hoja de estilos

                $mpdf->WriteHTML($html);
                $mpdf->Output('hematologia_pdf.pdf', 'I');
            // Fin Facturas
        
        
        }

    // Blanco y negro
	
}