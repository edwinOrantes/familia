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

class Online extends CI_Controller {
	/* Metodos para gestion de procesos de laboratorio */
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('America/El_Salvador');
        if (!$this->session->has_userdata('valido')){
            $this->session->set_flashdata("error", "Debes iniciar sesión");
            redirect(base_url());
        }
        $this->load->model("Laboratorio_Model");  // Modelo para gestionar datos del laboratorio
    }

    // Subir resultados en linea
        public function subir_resultados($params = null){
            $datosOnline = [];
            $datos = unserialize(base64_decode(urldecode($params)));
            foreach ($datos as $row) {
                switch ($row["tipoExamen"]) {
                    case '1':
                        $tblHTML = $this->examen_inmunologia($row["idExamen"]);
                        $examen = [
                            "idConsulta" => $row["idConsulta"],
                            "idExamen" => $row["idExamen"],
                            "detalle" => $tblHTML,
                            "fila" => $row["filaDetalle"]

                        ];
                        $datosOnline[] = $examen;
                    break;
                    case '2':
                            echo '<a href="'.base_url().'Laboratorio/bacteriologia_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
    
                    case '3':
                        echo '<a href="'.base_url().'Laboratorio/coagulacion_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
    
                    case '4':
                        echo '<a href="'.base_url().'Laboratorio/sanguineo_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
    
                    case '5':
                        echo '<a href="'.base_url().'Labo ratorio/quimica_clinica_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
    
                    case '6':
                        $tblHTML = $this->quimica_sanguinea($row["idExamen"]);
                        $examen = [
                            "idConsulta" => $row["idConsulta"],
                            "idExamen" => $row["idExamen"],
                            "detalle" => $tblHTML,
                            "fila" => $row["filaDetalle"]

                        ];
                        $datosOnline[] = $examen;
                    break;
    
                    case '7':
                        echo '<a href="'.base_url().'Laboratorio/cropologia_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
    
                    case '8':
                        echo '<a href="'.base_url().'Laboratorio/tiroidea_libre_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
    
                    case '9':
                        echo '<a href="'.base_url().'Laboratorio/tiroidea_total_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
                
                    case '10':
                        echo '<a href="'.base_url().'Laboratorio/varios_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
                    
                    case '11':
                        echo '<a href="'.base_url().'Laboratorio/psa_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
                    case '12':
                        echo '<a href="'.base_url().'Laboratorio/hematologia_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
                    case '13':
                        echo '<a href="'.base_url().'Laboratorio/orina_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
                    case '14':
                        echo '<a href="'.base_url().'Laboratorio/hisopado_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
    
                    case '15':
                        echo '<a href="'.base_url().'Laboratorio/espermograma_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
    
                    case '16':
                        echo '<a href="'.base_url().'Laboratorio/creatinina_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
    
                    case '17':
                        echo '<a href="'.base_url().'Laboratorio/gases_arteriales_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
    
                    case '18':
                        echo '<a href="'.base_url().'Laboratorio/tolerancia_glucosa_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
    
                    case '19':
                        echo '<a href="'.base_url().'Laboratorio/toxoplasma_pdf/'.$row["idExamen"].'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                    break;
                    
                    default:
                        echo "Nel";
                        break;
                }
            }
            // echo json_encode($datosOnline);
            $this->subirDatos($datosOnline);
        }

        public function examen_inmunologia($id){
            $html = '';
            $cabecera = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_inmunologia", "idInmunologia", 1);
            $inmunologia = $this->Laboratorio_Model->detalleExamen($id, 1);
            // Tabla detalle
                $html .= '<div class="contenedor">';
                $html .= '    <div class="medicamentos">';
                $html .= '        <div style="border: 2px solid #0b88c9; padding-top: 10px; padding-bottom: 10px;">';
                $html .= '            <div class="">';
                $html .= '                <table id="tablaPaciente" cellspacing=10>';
                $html .= '                    <tr>';
                $html .= '                        <td><strong class="borderAzul">Paciente:</strong></td>';
                $html .= '                        <td><p class="borderAzul">'.$cabecera->nombrePaciente.'</td>';
                $html .= '                        <td><strong class="borderAzul">Edad:</strong></td>';
                $html .= '                        <td><p class="borderAzul">'.$cabecera->edadPaciente.' Años</p></td>';
                $html .= '                    </tr>';
                $html .= '                    <tr>';
                $html .= '                        <td><strong class="borderAzul">Médico:</strong></td>';
                $html .= '                        <td><p class="borderAzul">'.$cabecera->nombreMedico.'</p></td>';
                $html .= '                        <td><strong class="borderAzul">Fecha:</strong></td>';
                $html .= '                        <td><p class="borderAzul">'.substr($cabecera->fechaDetalleConsulta, 0, 10).' '.$cabecera->horaDetalleConsulta.'</p></td>';
                $html .= '                    </tr>';
                $html .= '                </table>';
                $html .= '            </div>';
                $html .= '        </div>';
                $html .= '        <div class="detalle">';
                $html .= '            <p style="font-size: 12px; color: #0b88c9; margin-top: 20px"><strong>RESULTADOS EXAMEN INMUNOLOGIA</strong></p>';
                $html .= '            <table class="table">';
                $html .= '                <thead>';
                $html .= '                    <tr style="background: #0b88c9;">';
                $html .= '                        <th> Parametro </th>';
                $html .= '                        <th> Resultado </th>';
                $html .= '                        <th> Valores de referencia </th>';
                $html .= '                    </tr>';
                $html .= '                </thead>';
                $html .= '                <tbody>';
                $html .= '                        <tr>';
                $html .= '                            <th colspan="4" style="color: #0b88c9; text-align: center; font-size: 12px; background: rgba(0, 123, 255, 0.1); height: 25px" >';
                $html .= '                                <strong>Examen realizado: ".ucwords(strtolower($cabecera->examenes))."</strong>';
                $html .= '                            </th>';
                $html .= '                        </tr>';
                    if($inmunologia->tificoO != ""){
                        $html .= '<tr>
                                <td><strong class="borderAzul">Tífico O</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$inmunologia->tificoO.'</td>
                                <td style="text-align: center; font-weight: bold">Negativo</td>
                            </tr>';
                    }
                    if($inmunologia->tificoH != ""){
                        $html .= '<tr>
                                <td><strong class="borderAzul">Tífico H</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$inmunologia->tificoH.'</td>
                                <td style="text-align: center; font-weight: bold">Negativo</td>
                            </tr>';
                    }
                    if($inmunologia->paratificoA != ""){
                        $html .= '<tr>
                                <td><strong class="borderAzul">Paratífico A</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$inmunologia->paratificoA.'</td>
                                <td style="text-align: center; font-weight: bold">Negativo</td>
                            </tr>';
                    }
                    if($inmunologia->paratificoB != ""){
                        $html .= '<tr>
                                <td><strong class="borderAzul">Paratífico B</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$inmunologia->paratificoB.'</td>
                                <td style="text-align: center; font-weight: bold">Negativo</td>
                            </tr>';
                    }
                    if($inmunologia->brucellaAbortus != ""){
                        $html .= '<tr>
                                <td><strong class="borderAzul">Brucella Abortus</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$inmunologia->brucellaAbortus.'</td>
                                <td style="text-align: center; font-weight: bold">Negativo</td>
                            </tr>';
                    }
                    if($inmunologia->proteusOx != ""){
                        $html .= '<tr>
                                <td><strong class="borderAzul">Proteus OX-19</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$inmunologia->proteusOx.'</td>
                                <td style="text-align: center; font-weight: bold">Negativo</td>
                            </tr>';
                    }
                    if($inmunologia->proteinaC != ""){
                        $html .= '<tr>
                                <td><strong class="borderAzul">Proteína "C" reactiva</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$inmunologia->proteinaC.'</td>
                                <td style="text-align: center;"><p class="borderAzul">VN: Hasta 6mg/L</p></td>
                            </tr>';
                    }
                    if($inmunologia->reumatoideo != ""){
                        $html .= '<tr>
                                <td><strong class="borderAzul">Factor Reumatoideo</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$inmunologia->reumatoideo.'</td>
                                <td style="text-align: center;"><p class="borderAzul">Valor normal: < 8UI/mL</p></td>
                            </tr>';
                    }
                    if($inmunologia->antiestreptolisina != ""){
                        $html .= '<tr>
                                <td><strong class="borderAzul">Antiestreptolisina "O"</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$inmunologia->antiestreptolisina.'</td>
                                <td style="text-align: center;"><p class="borderAzul">Valor normal: Hasta 200 UI/mL</p></td>
                            </tr>';
                    }

                $html .= '                </tbody>';
                $html .= '            </table>';
                $html .= '        </div>';
                $html .= '    </div>';
                $html .= '</div>';
            // Tabla detalle

            // return $html;
            return urlencode(base64_encode(serialize($html)));
        }

        public function quimica_sanguinea($id){
            $html = "";
            $cabecera = $this->Laboratorio_Model->cabeceraPDF($id, "tbl_quimica_sanguinea", "idQuimicaSanguinea ", 6);
            $sanguinea = $this->Laboratorio_Model->detalleExamen($id, 6);
            // Inicio HTML
                $html .= '<div class="contenedor">';
                $html .= '    <div class="medicamentos">';
                $html .= '        <div style="border: 2px solid #0b88c9; padding-top: 10px; padding-bottom: 15px;">';
                $html .= '            <div class="">';
                $html .= '                <table id="tablaPaciente" cellspacing=10>';
                $html .= '                    <tr>';
                $html .= '                        <td><strong class="borderAzul">Paciente:</strong></td>';
                $html .= '                        <td><p class="borderAzul">'.$cabecera->nombrePaciente.'</p></td>';
                $html .= '                        <td><strong class="borderAzul">Edad:</strong></td>';
                $html .= '                        <td><p class="borderAzul">'.$cabecera->edadPaciente.' Años</p></td>';
                $html .= '                    </tr>';
                $html .= '                    ';
                $html .= '                    <tr>';
                $html .= '                        <td><strong class="borderAzul">Médico:</strong></td>';
                $html .= '                        <td><p class="borderAzul">'.$cabecera->nombreMedico.'</p></td>';
                $html .= '                        <td><strong class="borderAzul">Fecha:</strong></td>';
                $html .= '                        <td><p class="borderAzul">'.substr($cabecera->fechaDetalleConsulta, 0, 10)." ".$cabecera->horaDetalleConsulta.'</p></td>';
                $html .= '                    </tr>';
                $html .= '                </table>';
                $html .= '            </div>';
                $html .= '        </div>';
                $html .= '        ';
                $html .= '        <p style="font-size: 12px; color: #0b88c9; margin-top: 25px"><strong>RESULTADOS EXAMEN QUIMICA SANGUINEA</p>';
                $html .= '        <div class="detalle">';
                $html .= '            <table class="table">';
                $html .= '                <thead>';
                $html .= '                    <tr style="background: #0b88c9;">';
                $html .= '                        <th> Parametro </th>';
                $html .= '                        <th> Resultado </th>';
                $html .= '                        <th> Unidades </th>';
                $html .= '                        <th> Valores de referencia </th>';
                $html .= '                    </tr>';
                $html .= '                </thead>';
                $html .= '                <tbody>';
                if($sanguinea->glucosaQS != ""){
                    $html .= '<tr>
                                <td><strong>Glucosa</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->glucosaQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">60-110mg/dl</td>
                            </tr>';
                }
                if($sanguinea->posprandialQS != ""){
                    $html .= '<tr>
                                <td><strong>Glucosa postprandial</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->posprandialQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">Menor de 140 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->colesterolQS != ""){
                    $html .= '<tr>
                                <td><strong>Colesterol</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->colesterolQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">Menor de 200 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->colesterolHDLQS != ""){
                    $html .= '<tr>
                                <td><strong>Colesterol HDL</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->colesterolHDLQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">Mayor de 35 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->colesterolLDLQS != ""){
                    $html .= '<tr>
                                <td><strong>Colesterol LDL</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->colesterolLDLQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">Menor de 130 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->trigliceridosQS != ""){
                    $html .= '<tr>
                                <td><strong>Triglicéridos</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->trigliceridosQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">Menor de 150 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->acidoUricoQS != ""){
                    $html .= '<tr>
                                <td><strong>Ácido úrico</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->acidoUricoQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">2.4-7.0 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->ureaQS != ""){
                    $html .= '<tr>
                                <td><strong>Urea</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->ureaQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">15-45 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->nitrogenoQS != ""){
                    $html .= '<tr>
                                <td><strong>Nitrógeno Ureico</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->nitrogenoQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">5-25 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->creatininaQS != ""){
                    $html .= '<tr>
                                <td><strong>Creatinina</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->creatininaQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">0.5-1.4 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->amilasaQS != ""){
                    $html .= '<tr>
                                <td><strong>Amilasa</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->amilasaQS.'</td>
                                <td style="text-align: center; font-weight: bold">U/L</td>
                                <td style="text-align: center; font-weight: bold">Menor de 90 U/L</td>
                            </tr>';
                }
                if($sanguinea->lipasaQS != ""){
                    $html .= '<tr>
                                <td><strong>Lipasa</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->lipasaQS.'</td>
                                <td style="text-align: center; font-weight: bold">U/L</td>
                                <td style="text-align: center; font-weight: bold">Menor de 38 U/L</td>
                            </tr>';
                }
                if($sanguinea->fosfatasaQS != ""){
                    $html .= '<tr>
                                <td><strong>Fosfatasa alcalina</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->fosfatasaQS.'</td>
                                <td style="text-align: center; font-weight: bold">U/L</td>
                                <td style="text-align: center; font-weight: bold">Hasta 275 U/L</td>
                            </tr>';
                }
                if($sanguinea->tgpQS != ""){
                    $html .= '<tr>
                                <td><strong>TGP</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->tgpQS.'</td>
                                <td style="text-align: center; font-weight: bold">U/L</td>
                                <td style="text-align: center; font-weight: bold">1-40 U/L</td>
                            </tr>';
                }
                if($sanguinea->tgoQS != ""){
                    $html .= '<tr>
                                <td><strong>TGO</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->tgoQS.'</td>
                                <td style="text-align: center; font-weight: bold">U/L</td>
                                <td style="text-align: center; font-weight: bold">1-38 U/L</td>
                            </tr>';
                }
                if($sanguinea->hba1cQS != ""){
                    $html .= '<tr>
                                <td><strong>Hemoglobina glicosilada</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->hba1cQS.'</td>
                                <td style="text-align: center; font-weight: bold">%</td>
                                <td style="text-align: center; font-weight: bold">4.5-6.5%</td>
                            </tr>';
                }
                if($sanguinea->proteinaTotalQS != ""){
                    $html .= '<tr>
                                <td><strong>Proteína total</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->proteinaTotalQS.'</td>
                                <td style="text-align: center; font-weight: bold">g/dl</td>
                                <td style="text-align: center; font-weight: bold">6.6-8.3 d/dl</td>
                            </tr>';
                }
                if($sanguinea->albuminaQS != ""){
                    $html .= '<tr>
                                <td><strong>Albúmina</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->albuminaQS.'</td>
                                <td style="text-align: center; font-weight: bold">g/dl</td>
                                <td style="text-align: center; font-weight: bold">3.5-5.0 g/dl</td>
                            </tr>';
                }
                if($sanguinea->globulinaQS != ""){
                    $html .= '<tr>
                                <td><strong>Globulina</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->globulinaQS.'</td>
                                <td style="text-align: center; font-weight: bold">g/dl</td>
                                <td style="text-align: center; font-weight: bold">2-3.5 g/dl</td>
                            </tr>';
                }
                if($sanguinea->relacionAGQS != ""){
                    $html .= '<tr>
                                <td><strong>Relación A/G</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->relacionAGQS.'</td>
                                <td style="text-align: center; font-weight: bold"></td>
                                <td style="text-align: center; font-weight: bold">1.2-2.2</td>
                            </tr>';
                }
                if($sanguinea->bilirrubinaTQS != ""){
                    $html .= '<tr>
                                <td><strong>Bilirrubina total</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->bilirrubinaTQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">Hasta 1.1 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->bilirrubinaDQS != ""){
                    $html .= '<tr>
                                <td><strong>Bilirrubina directa</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->bilirrubinaDQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">Hasta 0.25 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->bilirrubinaIQS != ""){
                    $html .= '<tr>
                                <td><strong>Bilirrubina indirecta</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->bilirrubinaIQS.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold"></td>
                            </tr>';
                }
                if($sanguinea->sodioQuimicaClinica != ""){
                    $html .= '<tr>
                                <td><strong>Sodio</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->sodioQuimicaClinica.'</td>
                                <td style="text-align: center; font-weight: bold">mmol/L</td>
                                <td style="text-align: center; font-weight: bold">136-148 mmol/L</td>
                            </tr>';
                }
                if($sanguinea->potasioQuimicaClinica != ""){
                    $html .= '<tr>
                                <td><strong>Potasio</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->potasioQuimicaClinica.'</td>
                                <td style="text-align: center; font-weight: bold">mmol/L</td>
                                <td style="text-align: center; font-weight: bold">3.5-5.3 mmol/L</td>
                            </tr>';
                }
                if($sanguinea->cloroQuimicaClinica != ""){
                    $html .= '<tr>
                                <td><strong>Cloro</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->cloroQuimicaClinica.'</td>
                                <td style="text-align: center; font-weight: bold">mmol/L</td>
                                <td style="text-align: center; font-weight: bold">98-107 mmol/L</td>
                            </tr>';
                }
                if($sanguinea->magnesioQuimicaClinica != ""){
                    $html .= '<tr>
                                <td><strong>Magnesio</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->magnesioQuimicaClinica.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">1.6-2.5 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->calcioQuimicaClinica != ""){
                    $html .= '<tr>
                                <td><strong>Calcio</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->calcioQuimicaClinica.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">8.5-10.5 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->fosforoQuimicaClinica != ""){
                    $html .= '<tr>
                                <td><strong>Fosforo</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->fosforoQuimicaClinica.'</td>
                                <td style="text-align: center; font-weight: bold">mg/dl</td>
                                <td style="text-align: center; font-weight: bold">2.5-5.0 mg/dl</td>
                            </tr>';
                }
                if($sanguinea->cpkTQuimicaClinica != ""){
                    $html .= '<tr>
                                <td><strong>CPK Total</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->cpkTQuimicaClinica.'</td>
                                <td style="text-align: center; font-weight: bold">U/L</td>
                                <td style="text-align: center; font-weight: bold">0-195 U/L</td>
                            </tr>';
                }
                if($sanguinea->cpkMbQuimicaClinica != ""){
                    $html .= '<tr>
                                <td><strong>CPK MB</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->cpkMbQuimicaClinica.'</td>
                                <td style="text-align: center; font-weight: bold">U/L</td>
                                <td style="text-align: center; font-weight: bold">Menor a 24 U/L</td>
                            </tr>';
                }
                if($sanguinea->ldhQuimicaClinica != ""){
                    $html .= '<tr>
                                <td><strong>LDH</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->ldhQuimicaClinica.'</td>
                                <td style="text-align: center; font-weight: bold">U/L</td>
                                <td style="text-align: center; font-weight: bold">230-460 U/L</td>
                            </tr>';
                }
                if($sanguinea->troponinaQuimicaClinica != ""){
                    $html .= '<tr>
                                <td><strong>Troponina I</strong></td>
                                <td style="text-align: center; font-weight: bold">'.$sanguinea->troponinaQuimicaClinica.'</td>
                                <td style="text-align: center; font-weight: bold">ng/dl</td>
                                <td style="text-align: center; font-weight: bold">VN: menor a 0.30 ng/dl</td>
                            </tr>';
                }
                if($sanguinea->notaQS != ""){
                    $html .= '<tr>
                                <td><strong>Observaciones</strong></td>
                                <td style="text-align: center; font-weight: bold" colspan=3>'.$sanguinea->notaQS.'</td>
                            </tr>';
                }
                $html .= '                </tbody>';
                $html .= '            </table>';
                $html .= '        </div>';
                $html .= '    </div>';
                $html .= '</div>';
            // Fin HTML
            return urlencode(base64_encode(serialize($html)));
        }

    

    public function subirDatos($datos = null){
        if($datos != null){

            // Obteniendo el id de la consulta
                foreach ($datos as $row) {
                    $consulta = $row["idConsulta"];
                }
            // Obteniendo el id de la consulta

            $data["consulta"] = $consulta; // Para validar si ya hay un registro de este tipo.
            $data["detalle"] = $datos;
            

            // Convertir datos a formato JSON
            $datos_json = json_encode($data);

            // Configurar opciones de la solicitud HTTP
            $opciones = array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json',
                    'content' => $datos_json
                )
            );

            $context  = stream_context_create($opciones);

            // URL del servicio web
            $url_servicio = 'http://192.168.1.92/Lab_Online/Resultados/guardar_examenes';

            // Realizar la solicitud HTTP POST
            $resultado = file_get_contents($url_servicio, false, $context);
            $resp = json_decode($resultado, true);

            // Manejar la respuesta del servicio web
            if ($resp["estado"] == 1) {
                $this->Laboratorio_Model->marcarSubido($consulta);
                $this->session->set_flashdata("exito","Los datos de la hoja de laboratorio fueron guardados con exito!");
                redirect(base_url()."Online/detalle_examenes_online/$consulta/");
            } else {
                $this->session->set_flashdata("error","Error al subir los datos.");
                redirect(base_url()."Laboratorio/detalle_consulta/$consulta/");
            }

            // echo json_encode($resp);
        }
        
    }

    public function detalle_examenes_online($c = null){
        if($c != null){
            $this->load->view("Base/header");
            $this->load->view("Laboratorio/mensaje_online");
            $this->load->view("Base/footer");
        }else{
            redirect(base_url()."Laboratorio/detalle_consulta/$c/");
        }
    }
    // Subir resultados en linea
	
}

