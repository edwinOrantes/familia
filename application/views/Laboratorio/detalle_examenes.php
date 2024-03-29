<!-- scripts para avisos -->
<?php if($this->session->flashdata("exito")):?>
    <script type="text/javascript">
    $(document).ready(function() {
        toastr.remove();
        toastr.options.positionClass = "toast-top-center";
        toastr.success('<?php echo $this->session->flashdata("exito")?>', 'Aviso!');
    });
    </script>
<?php endif; ?>

<?php if($this->session->flashdata("error")):?>
    <script type="text/javascript">
    $(document).ready(function() {
        toastr.remove();
        toastr.options.positionClass = "toast-top-center";
        toastr.error('<?php echo $this->session->flashdata("error")?>', 'Aviso!');
    });
    </script>
<?php endif; ?>

<!-- Horas para tolerancia a la glucosa -->
    <?php
        $hora= date('h:i A'); 
        $primera = strtotime ( '-1 hour' , strtotime ($hora)); 
        $segunda = strtotime ( '-2 hour' , strtotime ($hora)); 
        $tercera = strtotime ( '-3 hour' , strtotime ($hora)); 
        $primera = date ( 'h:i A' , $primera); 
        $segunda = date ( 'h:i A' , $segunda); 
        $tercera = date ( 'h:i A' , $tercera); 
    ?>
<!-- Fin horas para tolerancia a la glucosa -->

<?php
    $totalConsulta = 0;

    /* foreach ($totalHojaLaboratorio as $examen) {
        $totalConsulta += $examen->precioVMedicamento;
    } */

    // echo json_encode($datosOnline);
    // Datos a subir en linea
        // $params = urlencode(base64_encode(serialize($datosOnline)));
    // Datos a subir en linea

?>

<div class="">
    <div class="row">
        <div class="col-md-2 pl-4">
            <div class="text-center">
                <a href="#cropologia" data-toggle='modal' class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Coprologia </strong> </a>
                <a href="#orina" data-toggle="modal" class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Orina </strong> </a>
                <a href="#hematologia" data-toggle='modal' class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Hematología </strong> </a>
                <a href="#quimicaSanguinea" data-toggle='modal' class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Química sanguinea </strong> </a>
                <a href="#sanguineo" data-toggle='modal' class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Tipeo sanguineo </strong> </a>
                <a href="#coagulacion" data-toggle='modal' class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Pruebas de coagulación </strong> </a>
                <a href="#varios" data-toggle='modal' class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Varios </strong> </a>
                <!-- <a href='#inmunologia' data-toggle='modal' class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Inmunologia </strong> </a> -->
                <!-- <a href="#bacteriologia" data-toggle='modal' class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Bacteriologia </strong> </a> -->
                <!-- <a href="#tiroideasLibres" data-toggle='modal' class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Tiroideas libres </strong> </a> -->
                <!-- <a href="#tiroideasTotales" data-toggle='modal'class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Tiroideas totales </strong> </a> -->
                <!-- <a href="#psaTotal" data-toggle='modal'  class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> PSA Total </strong> </a> -->
                <!-- <a href="#hisopadoNasal" data-toggle="modal" class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Hisopado nasal </strong> </a> -->
                <!-- <a href="#espermograma" data-toggle="modal" class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Espermograma </strong> </a> -->
                <!-- <a href="#examenCreatinina" data-toggle="modal" class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> D. Creatinina </strong> </a> -->
                <!-- <a href="#gasesArteriales" data-toggle="modal" class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Gases arteriales </strong> </a> -->
                <!-- <a href="#toleranciaGlucosa" data-toggle="modal" class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> T. a la Glucosa </strong> </a> -->
                <!-- <a href="#toxoplasma" data-toggle="modal" class="btn btn-primary btn-sm btn-block py-3 mt-1 has-icon"><strong> Toxoplasma </strong> </a> -->
            </div>
        </div>

        <div class="col-md-8 mt-1">
            <div class="alert-primary table-responsive bordeContenedor pt-3 pl-3">
                <form action="" method="">
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>Código:</strong></td>
                            <td><?php echo $paciente->codigoConsulta; ?></td>
                            <td><strong>Fecha:</strong></td>
                            <td><?php echo $paciente->fechaConsulta; ?></td>
                            <td><strong>Tipo:</strong></td>
                            <td>Ambulatorio</td>
                        </tr>
                        
                        <tr>
                            <td><strong>Paciente:</strong></td>
                            <td><?php echo $paciente->nombrePaciente; ?> </td>
                            <td><strong>Edad:</strong></td>
                            <td><?php echo $paciente->edadPaciente." Años"; ?></td>
                            <td><strong>Medico:</strong></td>
                            <td><?php echo $paciente->nombreMedico; ?></td>
                        </tr>
            
                    </table>
                </form>
            </div>
            
            <div class="table-responsive mt-3">
            <table id="" class="table table-striped thead-primary w-100">
                    <thead>
                        <tr>
                            <th class="text-center">Examen</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Hora</th>
                            <th class="text-center">Opción</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            foreach ($examenesRealizados as $examen) {
                                $idExamen ='"'.$examen->idExamen.'"'; // Id del examen.
                                $exam ='"'.$examen->tipoExamen.'"'; // Id del examen.
                                $idDC ='"'.$examen->idDetalleConsulta.'"'; // Id detalle de la consulta.
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $examen->nombreExamen; ?></td>
                            <td class="text-center"><?php echo substr($examen->fechaDetalleConsulta, 0, 10); ?></td>
                            <td class="text-center"><?php echo $examen->horaDetalleConsulta; ?></td>
                            <td class="text-center">
                                <?php
                                    switch ($examen->tipoExamen) {
                                        case '1':
                                            echo '<a href="'.base_url().'Laboratorio/examen_inmunologia_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';
                                            echo '<a href="'.base_url().'Laboratorio/examen_inmunologia/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#inmunologiaActualizar' data-toggle='modal' onclick='actualizar($idExamen, 1)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;
                                        case '2':
                                                echo '<a href="'.base_url().'Laboratorio/bacteriologia_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';
                                                echo '<a href="'.base_url().'Laboratorio/bacteriologia_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                echo "<a href='#bacteriologiaActualizar' data-toggle='modal' onclick='actualizar($idExamen, 2)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                                // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;

                                        case '3':
                                            echo '<a href="'.base_url().'Laboratorio/coagulacion_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#coagulacionActualizar' data-toggle='modal' onclick='actualizar($idExamen, 3)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                        break;

                                        case '4':
                                            echo '<a href="'.base_url().'Laboratorio/sanguineo_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#sanguineoActualizar' data-toggle='modal' onclick='actualizar($idExamen, 4)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;

                                        case '5':
                                            echo '<a href="'.base_url().'Laboratorio/quimica_clinica_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#quimicaClinicaActualizar' data-toggle='modal' onclick='actualizar($idExamen, 5)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;

                                        case '6':
                                            echo '<a href="'.base_url().'Laboratorio/quimica_sanguinea_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#quimicaSanguineaActualizar' data-toggle='modal' onclick='actualizar($idExamen, 6)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;

                                        case '7':
                                            echo '<a href="'.base_url().'Laboratorio/cropologia_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#cropologiaActualizar' data-toggle='modal' onclick='actualizar($idExamen, 7)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;

                                        case '8':
                                            echo '<a href="'.base_url().'Laboratorio/tiroidea_libre_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';
                                            echo '<a href="'.base_url().'Laboratorio/tiroidea_libre_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#tiroideaLibreActualizar' data-toggle='modal' onclick='actualizar($idExamen, 8)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;

                                        case '9':
                                            echo '<a href="'.base_url().'Laboratorio/tiroidea_total_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';
                                            echo '<a href="'.base_url().'Laboratorio/tiroidea_total_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#tiroideasTotalesActualizar' data-toggle='modal' onclick='actualizar($idExamen, 9)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            //  echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;
                                    
                                        case '10':
                                            echo '<a href="'.base_url().'Laboratorio/varios_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#variosActualizar' data-toggle='modal' onclick='actualizar($idExamen, 10)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;
                                        
                                        case '11':
                                            echo '<a href="'.base_url().'Laboratorio/psa_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';
                                            echo '<a href="'.base_url().'Laboratorio/psa_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#psaTotalActualizar' data-toggle='modal' onclick='actualizar($idExamen, 11)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;
                                        case '12':
                                            echo '<a href="'.base_url().'Laboratorio/hematologia_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#hematologiaActualizar' data-toggle='modal' onclick='actualizar($idExamen, 12)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;
                                        case '13':
                                            echo '<a href="'.base_url().'Laboratorio/orina_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#orinaActualizar' data-toggle='modal' onclick='actualizar($idExamen, 13)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;
                                        case '14':
                                            echo '<a href="'.base_url().'Laboratorio/hisopado_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';
                                            echo '<a href="'.base_url().'Laboratorio/hisopado_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#hisopadoNasalActualizar' data-toggle='modal' onclick='actualizar($idExamen, 14)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;

                                        case '15':
                                            echo '<a href="'.base_url().'Laboratorio/espermograma_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';
                                            echo '<a href="'.base_url().'Laboratorio/espermograma_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#espermogramaActualizar' data-toggle='modal' onclick='actualizar($idExamen, 15)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;

                                        case '16':
                                            echo '<a href="'.base_url().'Laboratorio/creatinina_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';
                                            echo '<a href="'.base_url().'Laboratorio/creatinina_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#examenCreatininaActualizar' data-toggle='modal' onclick='actualizar($idExamen, 16)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;

                                        case '17':
                                            echo '<a href="'.base_url().'Laboratorio/gases_arteriales_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';
                                            echo '<a href="'.base_url().'Laboratorio/gases_arteriales_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#gasesArterialesActualizar' data-toggle='modal' onclick='actualizar($idExamen, 17)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;

                                        case '18':
                                            echo '<a href="'.base_url().'Laboratorio/tolerancia_glucosa_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';
                                            echo '<a href="'.base_url().'Laboratorio/tolerancia_glucosa_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#toleranciaGlucosaActualizar' data-toggle='modal' onclick='actualizar($idExamen, 18)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;

                                        case '19':
                                            echo '<a href="'.base_url().'Laboratorio/toxoplasma_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-balck"></i></a>';
                                            echo '<a href="'.base_url().'Laboratorio/toxoplasma_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                            echo "<a href='#toxoplasmaActualizar' data-toggle='modal' onclick='actualizar($idExamen, 19)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;
                                        
                                        default:
                                            # code...
                                            break;
                                    }

                                    switch($this->session->userdata('nivel')) {
                                        case '1':
                                            echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                        break;
                                        default:
                                            echo "";
                                            break;
                                    }
                                    
                                ?>
                                
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
            </table>

               

            </div>

        </div>

        <div class="col-md-2">
            <div class="ms-panel ms-panel-fh">
                <div class="ms-panel-header">
                    <h6>Otras</h6>
                </div>
                <div class="ms-panel-body">
                    <div class="accordion" id="accordionExample3">
                        <?php
                            $flag = 1;
                            foreach ($historial as $row) {
                        ?>
                            <div class="card">
                                <div class="card-header collapsed" data-toggle="collapse" role="button" data-target="#fechas<?php echo $flag; ?>" aria-expanded="false" aria-controls="fechas<?php echo $flag; ?>">
                                    <span class="has-icon"> <i class="far fa-calendar"></i> <?php echo $row->fecha; ?> </span>
                                </div>
                                <div id="fechas<?php echo $flag; ?>" class="collapse" data-parent="#accordionExample3" style="">
                                    <div class="card-body">
                                        <table class="table">
                                            <?php
                                                $examenes = $this->Laboratorio_Model->historialRealizado($row->fecha, $paciente->idPaciente);
                                                foreach ($examenes as $fila) {
                                                    echo '<tr>
                                                            <td><a href="">'.$fila->nombreExamen.'</a></td>
                                                        </tr>';
                                                }
                                            ?>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php
                            $flag++;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modales para insertar -->
    <!-- Modal para examen inmunologia-->
        <div class="modal fade" id="inmunologia" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de inmunologia</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="-3">
                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_inmunologia" target="_blank" novalidate>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Exámenes solicitados</strong>
                                                        <select name="examenSolicitado[]" id="" class="form-control controlInteligente" multiple="multiple" required="">
                                                            <option value="">:: Seleccionar ::</option>
                                                            <?php
                                                                foreach ($examenes as $examen) {
                                                            ?>
                                                                <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="invalid-tooltip">
                                                            Seleccione un tipo de examen.
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table table-borderless">
                                                        <thead></thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="menosPadding"><strong>Tífico O</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="tificoO" id="tificoO"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Tífico H</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="tificoH" id="tificoH"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Paratífico A</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="paratificoA" id="paratificoA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Paratífico B</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="paratificoB" id="paratificoB"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Brucella Abortus</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="brucellaAbortus" id="brucellaAbortus"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Proteus OX-19</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="proteusOx" id="proteusOx"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table-borderless">
                                                        <thead></thead>
                                                        <tbody>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Proteína "C" reactiva (VN: Hasta 6mg/L)</strong><br><input type="text" class="pivoteText form-control menosHeight" name="proteinaC" id="proteinaC"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Fac. Reumatoideo (Valor normal: < 8UI/mL)</strong> <br> <input type="text" class="pivoteText form-control menosHeight" name="reumatoideo" id="reumatoideo"> </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Antiestreptolisina "O" ( Valor normal: Hasta 200 UI/mL)</strong> <br> <input type="text" class="pivoteText form-control menosHeight" name="antiestreptolisina" id="antiestreptolisina"> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen inmunologia-->

    <!-- Modal para examen bacteriologia-->
        <div class="modal fade" id="bacteriologia" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de bacteriología</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_bacteriologia" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                            <strong>Exámenes solicitados</strong><br>
                                                            <div class="input-group">
                                                                <select name="bacteriologiaSolicitado[]" id="" class=" form-control controlInteligente2" multiple="multiple" required="">
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                        <strong>Resultado de directo</strong><br>
                                                            <input type="text" class="form-control menosHeight" name="resultadoDirecto" id="resultadoDirecto">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                        <strong>Procedencia de la muestra</strong><br>
                                                            <input type="text" size="92" name="procedenciaDirecto" id="procedenciaDirecto" class="form-control menosHeight">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                        <strong>Resultado de cultivo</strong><br>
                                                            <input type="text" class="form-control menosHeight" name="resultadoCultivo" id="resultadoCultivo">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Cefixime</strong><br><input type="text" class="form-control menosHeight" name="cefixime" id="cefixime"></td>
                                                        <td class="menosPadding"><strong> Amikacina</strong><br><input type="text" class="form-control menosHeight" name="amikacina" id="amikacina"></td>
                                                        <td class="menosPadding"><strong> Levofloxacina</strong><br><input type="text" class="form-control menosHeight" name="levofloxacina" id="levofloxacina"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Ceftriaxona </strong><br><input type="text" class="form-control menosHeight" name="ceftriaxona" id="ceftriaxona"></td>
                                                        <td class="menosPadding"><strong> Azitromicina </strong><br><input type="text" class="form-control menosHeight" name="azitromicina" id="azitromicina"></td>
                                                        <td class="menosPadding"><strong> Imipenem </strong><br><input type="text" class="form-control menosHeight" name="imipenem" id="imipenem"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Meropenem </strong><br><input type="text" class="form-control menosHeight" name="meropenem" id="meropenem"></td>
                                                        <td class="menosPadding"><strong> Fosfocil </strong><br><input type="text" class="form-control menosHeight" name="fosfocil" id="fosfocil"></td>
                                                        <td class="menosPadding"><strong> Ciprofloxacina </strong><br><input type="text" class="form-control menosHeight" name="ciprofloxacina" id="ciprofloxacina"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Penicilina </strong><br><input type="text" class="form-control menosHeight" name="penicilina" id="penicilina"></td>
                                                        <td class="menosPadding"><strong> Vancomicina </strong><br><input type="text" class="form-control menosHeight" name="vancomicina" id="vancomicina"></td>
                                                        <td class="menosPadding"><strong> Ácido nalidíxico </strong><br><input type="text" class="form-control menosHeight" name="acidoNalidixico" id="acidoNalidixico"></td>
                                                    </tr>

                                                    <tr>
                                                        
                                                        <td class="menosPadding"><strong> Gentamicina </strong><br><input type="text" class="form-control menosHeight" name="gentamicina" id="gentamicina"></td>
                                                        <td class="menosPadding"><strong> Nitrofurantoina </strong><br><input type="text" class="form-control menosHeight" name="nitrofurantoina" id="nitrofurantoina"></td>
                                                        <td class="menosPadding"><strong> Ceftazidime </strong><br><input type="text" class="form-control menosHeight" name="ceftazimide" id="ceftazimide"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Cefotaxime </strong><br><input type="text" class="form-control menosHeight" name="cefotaxime" id="cefotaxime"></td>
                                                        <td class="menosPadding"><strong> Clindamicina </strong><br><input type="text" class="form-control menosHeight" name="clindamicina" id="clindamicina"></td>
                                                        <td class="menosPadding"><strong> Trimetropim sulfa </strong><br><input type="text" class="form-control menosHeight" name="trimetropimSulfa" id="trimetropimSulfa"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Ampicilina/Sulbactam </strong><br><input type="text" class="form-control menosHeight" name="ampicilina" id="ampicilina"></td>
                                                        <td class="menosPadding"><strong> Piperacilina/Tazobactam </strong><br><input type="text" class="form-control menosHeight" name="piperacilina" id="piperacilina"></td>
                                                        <td class="menosPadding"><strong> Amoxicilina ácido clavulánico</strong><br><input type="text" class="form-control menosHeight" name="amoxicilina" id="amoxicilina"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Claritromicina </strong><br><input type="text" class="form-control menosHeight" name="claritromicina" id="claritromicina"></td>
                                                        <td class="menosPadding"></td>
                                                        <td class="menosPadding"><strong> Cefuroxime </strong><br><input type="text" class="form-control menosHeight" name="cefuroxime" id="cefuroxime"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3"><strong> Observación </strong><br><textarea  class="form-control menosHeight" name="observacion" id="observacionBacteriologia" cols="96"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen bacteriologia-->

    <!-- Modal para examen Tiempo de coagulación-->
        <div class="modal fade"  id="coagulacion" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de coagulación</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_coagulacion" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding"><strong> Tiempo de protombina</strong><br><input type="text" class="form-control menosHeight" name="tiempoProtombina" id="tiempoProtombina"><p class="text-primary" style="font-size:12px">Valor normal: 10-14 segundos</p></td>
                                                        <td class="menosPadding"><strong> Tiempo parcial de tromboplastina</strong><br><input type="text" class="form-control menosHeight" name="tiempoTromboplastina" id="tiempoTromboplastina"><p class="text-primary" style="font-size:12px">Valor normal: 20-33 segundos</p></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Fibrinógeno </strong><br><input type="text" class="form-control menosHeight" name="fibrinogeno" id="fibrinogeno"><p class="text-primary" style="font-size:12px">Valor normal: 200-400 mg/dl</p></td>
                                                        <td class="menosPadding"><strong> INR </strong><br><input type="text" class="form-control menosHeight" name="inr" id="inr"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Tiempo de sangramiento </strong><br><input type="text" class="form-control menosHeight" name="tiempoSangramiento" id="tiempoSangramiento"><p class="text-primary" style="font-size:12px">Valor normal: 1-4 minutos</p></td>
                                                        <td class="menosPadding"><strong> Tiempo de coagulación </strong><br><input type="text" class="form-control menosHeight" name="tiempoCoagulacion" id="tiempoCoagulacion"><p class="text-primary" style="font-size:12px">Valor normal: 4-9 minutos</p></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Observación </strong><br><textarea  class="form-control menosHeight" name="observacion" id="observacionCoagulacion" cols="96"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen Tiempo de coagulación-->

    <!-- Modal para examen Tipeo sanguineo-->
        <div class="modal fade" id="sanguineo" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de tipeo sanguineo</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_sanguineo" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra</strong><br><input type="text" value="Sangre" class="form-control menosHeight" name="muestraSanguineo" id="muestraSanguineo"></td>
                                                        <td class="menosPadding"><strong> Grupo sanguíneo</strong><br><input type="text" class="form-control menosHeight" name="grupoSanguineo" id="grupoSanguineo"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Factor RH </strong><br><input type="text" class="form-control menosHeight" name="factorSanguineo" id="factorSanguineo"></td>
                                                        <td class="menosPadding"><strong> DU </strong><br><input type="text" class="form-control menosHeight" name="duSanguineo" id="duSanguineo"></td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen Tipeo sanguineo-->

    <!-- Modal para examen sanguinea-->
        <div class="modal fade" id="quimicaSanguinea" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Química Sanguinea</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmQuimicaSanguinea" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_quimica_sanguinea" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <input type="hidden" value="0" name="examenSolicitado">
                                                   
                                                    <tr>
                                                        <td class="menosPadding"><strong> Glucosa (60-110 mg/dl)</strong><br><input type="text" name="glucosa" class="form-control menosHeight" id="glucosa"></td>
                                                        <td class="menosPadding"><strong> Glucosa P. (140 mg/dl)</strong><br><input type="text" name="posprandial" class="form-control menosHeight" id="posprandial"></td>
                                                        <td class="menosPadding"><strong> Colesterol ( < de 200 mg/dl)</strong><br><input type="text" name="colesterol" class="form-control menosHeight" id="colesterol"></td>
                                                        <td class="menosPadding"><strong> Triglicéridos ( < de 150 mg/dl)</strong><br><input type="text" name="trigliceridos" class="form-control menosHeight" id="trigliceridos"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Colesterol HDL ( > de 35 mg/dl) </strong><br><input type="text" name="colesterolHDL" class="form-control menosHeight" id="colesterolHDL"></td>
                                                        <td class="menosPadding"><strong> Colesterol LDL ( < 130 mg/dl)</strong><br><input type="text" name="colesterolLDL" class="form-control menosHeight" id="colesterolLDL"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Ácido úrico (2.4-7.0 mg/dl) </strong><br><input type="text" name="acidoUrico" class="form-control menosHeight" id="acidoUrico" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Urea ( 15-45 mg/dl)</strong><br><input type="text" name="urea" class="form-control menosHeight" id="urea"></td>
                                                        <td class="menosPadding"><strong> Nitrógeno ureico ( 5-25 mg/dl)</strong><br><input type="text" name="nitrogenoUreico" class="form-control menosHeight" id="nitrogenoUreico"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Creatinina ( 0.5-1.4 mg/dl)</strong><br><input type="text" name="creatinina" class="form-control menosHeight" id="creatinina" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Amilasa ( VN: menor de 90 U/L)</strong><br><input type="text" name="amilasa" class="form-control menosHeight" id="amilasa"></td>
                                                        <td class="menosPadding"><strong> Lipasa ( VN: menor de 38 U/L)</strong><br><input type="text" name="lipasa" class="form-control menosHeight" id="lipasa"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Fosfatasa alcalina ( Hasta 275 U/L)</strong><br><input type="text" name="fosfatasaAlcalina" class="form-control menosHeight" id="fosfatasaAlcalina" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TGP ( VN: 1-40 U/L)</strong><br><input type="text" name="tgp" class="form-control menosHeight" id="tgp"></td>
                                                        <td class="menosPadding"><strong> TGO ( VN: 1-38 U/L)</strong><br><input type="text" name="tgo" class="form-control menosHeight" id="tgo"></td>
                                                        <td colspan="2" class="menosPadding"><strong> HBA1C ( VN: 4.5-6.5% )</strong><br><input type="text" name="hba1c" class="form-control menosHeight" id="hba1c" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Proteina total (VN: 6.6-8.3 g/dL)</strong><br><input type="text" name="proteinaTotal" class="form-control menosHeight" id="proteinaTotal"></td>
                                                        <td class="menosPadding"><strong> Albúmina (VN: 3.5-5.0 g/dL)</strong><br><input type="text" name="albumina" class="form-control menosHeight" id="albumina"></td>
                                                        <td class="menosPadding"><strong> Globulina (VN: 2-3.5 g/dL) </strong><br><input type="text" name="globulina" class="form-control menosHeight" id="globulina"></td>
                                                        <td class="menosPadding"><strong> Relación A/G: 1.2 a 2.2 </strong><br><input type="text" name="relacionAG" class="form-control menosHeight" id="relacionAG"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Bili. Total (VN: hasta 1.1 mg/dl)</strong><br><input type="text" name="biliTotal" class="form-control menosHeight" id="biliTotal"></td>
                                                        <td class="menosPadding"><strong> Bili. directa (VN: hasta 0.25 mg/dl)</strong><br><input type="text" name="biliDirecta" class="form-control menosHeight" id="biliDirecta"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Bilirrubina indirecta </strong><br><input type="text" name="biliIndirecta" class="form-control menosHeight" id="cloro" size="47"></td>
                                                    </tr>

                                                    <!-- Quimica sanguinea -->

                                                        <tr>
                                                            <td class="menosPadding"><strong> Sodio (136-148 mmol/L)</strong><br><input type="text" class="form-control menosHeight" name="sodioQuimicaClinica" id="sodioQuimicaClinica"></td>
                                                            <td class="menosPadding" colspan="2"><strong> Potasio (3.5-5.3 mmol/L)</strong><br><input type="text" class="form-control menosHeight" name="potasioQuimicaClinica" id="potasioQuimicaClinica"></td>
                                                            <td class="menosPadding"><strong> Cloro (98-107 mmol/L)</strong><br><input type="text" class="form-control menosHeight" name="cloroQuimicaClinica" id="cloroQuimicaClinica"></td>
                                                        </tr>

                                                        <tr>
                                                            <td class="menosPadding"><strong> Magnesio (1.6-2.5 mg/dl) </strong><br><input type="text" class="form-control menosHeight" name="magnesioQuimicaClinica" id="magnesioQuimicaClinica"></td>
                                                            <td class="menosPadding"  colspan="2"><strong> Calcio (8.5-10.5 mg/dl) </strong><br><input type="text" class="form-control menosHeight" name="calcioQuimicaClinica" id="calcioQuimicaClinica"></td>
                                                            <td class="menosPadding"><strong> Fosforo (Vn: 2.5-5.0 mg/dl) </strong><br><input type="text" class="form-control menosHeight" name="fosforoQuimicaClinica" id="fosforoQuimicaClinica"></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="menosPadding"><strong> CPK Total (0-195 U/L) </strong><br><input type="text" class="form-control menosHeight" name="cpkTQuimicaClinica" id="cpkTQuimicaClinica"></td>
                                                            <td class="menosPadding"><strong> CPK MB (menor a 24U/L) </strong><br><input type="text" class="form-control menosHeight" name="cpkMbQuimicaClinica" id="cpkMbQuimicaClinica"></td>
                                                            <td class="menosPadding"><strong> LDH (230-460 U/L) </strong><br><input type="text" class="form-control menosHeight" name="ldhQuimicaClinica" id="ldhQuimicaClinica"></td>
                                                            <td class="menosPadding"><strong> Troponina I (VN: menor a 0.30 ng/ml) </strong><br><input type="text" class="form-control menosHeight" name="troponinaQuimicaClinica" id="troponinaQuimicaClinica"></td>
                                                        </tr>

                                                    <!-- Fin quimica sanguinea -->

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Comentarios </strong><br><textarea name="nota" class="form-control menosHeight" id="nota" cols="96"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen sanguinea-->

    <!-- Modal para examen cropologia-->
        <div class="modal fade" id="cropologia" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Coprologia </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">
                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_cropologia" novalidate>
                                            <div class="row" style="margin-top: 0px;">
                                                <div class="col-md-4" class="border" style="margin-top: -20px;">
                                                    <table>
                                                        <thead></thead>
                                                        <tbody class="text-left">

                                                            <tr>
                                                                <td class="menosPadding"><strong> Color </strong><br><input type="text" class="form-control menosHeight" name="colorCropologia" id="color"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Consistencia </strong><br><input type="text" class="form-control menosHeight" name="consistenciaCropologia" id="consistenciaCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Mucus  </strong><br><input type="text" class="form-control menosHeight" name="mucusCropologia" id="mucusCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Hematíes </strong><br><input type="text"  class="form-control menosHeight" name="hematiesCropologia" id="hematiesCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Leucocitos </strong><br><input type="text"  class="form-control menosHeight" name="leucocitosCropologia" id="leucocitosCropologia"></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td colspan="4" class="divider text-center text-primary font-weight-bold">METAZOARIOS</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Ascaris </strong><br><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="ascarisCropologia" id="ascarisCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Hymenolepis </strong><br><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="hymenolepisCropologia" id="hymenolepisCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Uncinarias  </strong><br><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="uncinariasCropologia" id="uncinariasCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Tricocéfalos </strong><br><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="tricocefalosCropologia" id="tricocefalosCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Larva strongyloides </strong><br><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="larvaStrongyloides" id="larvaStrongyloides"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-md-8" class="border" style="margin-top: -20px;">
                                                    <table class="table table-borderless">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <td></td>
                                                                <th colspan="2" class="text-primary"><strong>PROTOZOARIOS</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-left">
                                                            <tr class="text-center">
                                                                <td></td>
                                                                <td>Quistes</td>
                                                                <td>Trofozoitos</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Entamoeba histolytica</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="histolyticaQuistes" id="histolyticaQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="histolyticaTrofozoitos" id="histolyticaTrofozoitos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Entamoeba coli</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="coliQuistes" id="coliQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="coliTrofozoitos" id="coliTrofozoitos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Giardia lamblia</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="giardiaQuistes" id="giardiaQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="giardiaTrofozoitos" id="giardiaTrofozoitos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Blastocystis hominis</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="blastocystisQuistes" id="blastocystisQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="blastocystisTrofozoitos" id="blastocystisTrofozoitos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Tricomonas hominis</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="tricomonasQuistes" id="tricomonasQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name=" tricomonasTrofozoitos " id=" tricomonasTrofozoitos "></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Chilomastix mesnilli</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="mesnilliQuistes" id="mesnilliQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="mesnilliTrofozoitos" id="mesnilliTrofozoitos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Endolimax nana</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="nanaQuistes" id="nanaQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="nanaTrofozoitos" id="nanaTrofozoitos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center text-primary" colspan="3"><strong>RESTOS ALIMENTICIOS</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Restos macroscópicos</td>
                                                                <td class="menosPadding" colspan="2"><input type="text" class="form-control menosHeight" name="restosMacroscopicos" id="restosMacroscopicos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Restos microscópicos</td>
                                                                <td class="menosPadding" colspan="2"><input type="text" class="form-control menosHeight" name="restosMicroscopicos" id="restosMicroscopicos"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-md-12">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesCropologia" id="observacionesCropologia" class="form-control menosHeight"></textarea></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>               
    <!-- Modal para examen cropologia-->

    <!-- Modal para examen tiroideas libres-->
        <div class="modal fade" id="tiroideasLibres" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Tiroidea libre</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_tiroidea_libre" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr>
                                                        <input type="hidden" value="0" name="examenSolicitado">
                                                       <!--  <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente8 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar  ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div> 
                                                        </td> -->
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" value="Suero" class="form-control menosHeight" name="muestraTiroideaLibre" id="muestraTiroideaLibre"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T3 Libres <span class="text-primary">(Vn: 1.4-4.2 pg/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="t3TiroideaLibre" id="t3TiroideaLibre"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T4 Libres <span class="text-primary">(Vn: 0.80-2.0 ng/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="t4TiroideaLibre" id="t4TiroideaLibre"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TSH <span class="text-primary">(Vn: 0.3-3.0 uUI/ml)</span> </strong><br><input type="text" class="form-control menosHeight" name="tshTiroideaLibre" id="tshTiroideaLibre"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TSH Ultrasensible<span class="text-primary">(Vn: 0.03-3.0 uUI/ml)</span> </strong><br><input type="text" class="form-control menosHeight" name="tshTiroideaLibreU" id="tshTiroideaLibreU"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionTiroideaLibre" id="observacionTiroideaLibre" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit" id="tLibre"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen tiroideas libres-->
    
    <!-- Modal para examen tiroideas totales-->
        <div class="modal fade" id="tiroideasTotales" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Tiroideas totales </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_tiroideas_totales" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr>
                                                    <input type="hidden" value="0" name="examenSolicitado">
                                                        <!-- <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente9 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                                </div>
                                                        </td> -->
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" value="Suero" class="form-control menosHeight" name="muestraTiroideaTotal" id="muestraTiroideaTotal"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T3 Total <span class="text-primary">(Vn: 0.5-5.0 ng/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="t3TiroideaTotal" id="t3TiroideaTotal"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T4 Total <span class="text-primary">(Vn: 60.0-120.0 nmol/L)</span></strong><br><input type="text" class="form-control menosHeight" name="t4TiroideaTotal" id="t4TiroideaTotal"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TSH <span class="text-primary">(Vn: 0.3-5.6 uUI/ml)</span> </strong><br><input type="text" class="form-control menosHeight" name="tshTiroideaTotal" id="tshTiroideaTotal"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionTiroideaTotal" id="observacionTiroideaTotal" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen tiroideas totales-->

    <!-- Modal para examen varios-->
        <div class="modal fade" id="varios" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Varios </h4>
                        <button type="button" class="close text-white cerrarVarios" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-12 text-right" style="display: none;">
                                                <strong> Otro </strong>
                                                <label class="ms-switch">
                                                    <input type="checkbox" id="pivoteExamen" value="examenes" name="examenes">
                                                    <span class="ms-switch-slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <form class="needs-validation frmData" id="frmVarios" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_varios" target="_blank" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr>
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <input type="text" class="form-control menosHeight" name="examenSolicitadoLibre" id="detalleLibre">
                                                            <div class="input-group" id="ocultarSelectVarios">
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" class="form-control menosHeight" name="muestraVarios" id="muestraVarios"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Resultado </strong><br><input type="text" class="form-control menosHeight" name="resultadoVarios" id="glucosa"><input type="text" class="menosHeight" name="valorNormalVarios" id="valorNormalVarios" placeholder="Valor normal" style="float: right;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesVarios" id="observacionesVarios" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <!-- <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen varios-->

    <!-- Modal para examen PSA Total-->
        <div class="modal fade" id="psaTotal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Antigeno prostatico especifico total (PSA TOTAL) </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_psa" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente11 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                            if($examen->idMedicamento == 713){
                                                                                echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                            }else{
                                                                                echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" value="Suero" class="form-control menosHeight" name="muestraAntigenoProstatico" id="muestraAntigenoProstatico"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Resultado <span class="text-primary">(Rango de referencia: Menor de 4.0 ng/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="resultadoAntigenoProstatico" id="resultadoAntigenoProstatico"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionAntigenoProstatico" id="observacionAntigenoProstatico" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen PSA Total-->

    <!-- Modal para examen Hematologia-->
        <div class="modal fade" id="hematologia" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Hematologia </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmHematologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_hematologia" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr>
                                                        <td class="menosPadding"><strong> Eritrocitos (4-6 millones)</strong><br><input type="text" class="form-control menosHeight" name="eritrocitosHematologia" id="eritrocitosHematologia"></td>
                                                        <td class="menosPadding"><strong> Hematócrito (37-45 %)</strong><br><input type="text" class="form-control menosHeight" name="hematocritoHematologia" id="hematocritoHematologia"></td>
                                                        <td class="menosPadding"><strong> Hemoglobina (12-15 g/dl)</strong><br><input type="text" class="form-control menosHeight" name="hemoglobinaHematologia" id="hemoglobinaHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> VCM (82-96 fl)</strong><br><input type="text" class="form-control menosHeight" name="vgmHematologia" id="vgmHematologia"></td>
                                                        <td class="menosPadding"><strong> HCM (27-32 pg)</strong><br><input type="text" class="form-control menosHeight" name="hgmHematologia" id="hgmHematologia"></td>
                                                        <td class="menosPadding"><strong> CHCM (30-35 g/dl)</strong><br><input type="text" class="form-control menosHeight" name="chgmHematologia" id="chgmHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Leucocitos (5-10 mil)</strong><br><input type="text" class="form-control menosHeight" name="leucocitosHematologia" id="leucocitosHematologia"></td>
                                                        <td class="menosPadding"><strong> Neutrofilos Segmentados (%)</strong><br><input type="text" class="form-control menosHeight" name="neutrofHematologia" id="neutrofHematologia"></td>
                                                        <td class="menosPadding"><strong> Neutrofilos en Banda (%)</strong><br><input type="text" class="form-control menosHeight" name="neutrofBandHematologia" id="neutrofBandHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Linfocitos (%)</strong><br><input type="text" class="form-control menosHeight" name="linfocitosHematologia" id="linfocitosHematologia"></td>
                                                        <td class="menosPadding"><strong> Eosinófilos (%)</strong><br><input type="text" class="form-control menosHeight" name="eosinofilosHematologia" id="eosinofilosHematologia"></td>
                                                        <td class="menosPadding"><strong> Monocitos (%)</strong><br><input type="text" class="form-control menosHeight" name="monocitosHematologia" id="monocitosHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Basófilos (%)</strong><br><input type="text" class="form-control menosHeight" name="basofilosHematologia" id="basofilosHematologia"></td>
                                                        <td class="menosPadding"><strong> Blastos (%)</strong><br><input type="text" class="form-control menosHeight" name="blastosHematologia" id="blastosHematologia"></td>
                                                        <td class="menosPadding"><strong> Reticulocitos (0.5-2.0 gr%)</strong><br><input type="text" class="form-control menosHeight" name="reticulocitosHematologia" id="reticulocitosHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Eritrosedimentación (0-20 mm/hr)</strong><br><input type="text" class="form-control menosHeight" name="eritrosedHematologia" id="eritrosedHematologia"></td>
                                                        <td class="menosPadding"><strong> Plaquetas xmmc </strong><br><input type="text" class="form-control menosHeight" name="plaquetasHematologia" id="plaquetasHematologia"><span class="text-primary" style="font-size: 12px;">Valor normal 150,000-450,000</span></td>
                                                        <td class="menosPadding"><strong> Gota gruesa </strong><br><input type="text" class="form-control menosHeight" name="gotaGruesaHematologia" id="gotaGruesaHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-center text-primary" colspan="3"><strong> FROTIS DE SANGRE PERIFERICA </strong></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-primary" colspan="3"><strong> Linea Roja </strong><br><input type="text" class="form-control menosHeight" name="rojaHematologia" id="rojaHematologia"></td>
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-primary" colspan="3"><strong> Linea Blanca </strong><br><input type="text" class="form-control menosHeight" name="blancaHematologia" id="blancaHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-primary" colspan="3"><strong> Linea Plaquetaria </strong><br><input type="text" class="form-control menosHeight" name="plaquetariaHematologia" id="plaquetariaHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesHematologia" id="observacionesHematologia" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen Hematologia-->

    <!-- Modal para examen Orina-->
        <div class="modal fade" id="orina" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Examen de orina </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmOrina" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_orina" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr class="text-center alert-primary">
                                                        <td colspan="4">EXAMEN FISICO QUIMICO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="menosPadding"><strong> Color </strong><br><input type="text" class="form-control menosHeight" name="colorOrina" id="colorOrina"></td>
                                                        <td class="menosPadding"><strong> Aspecto </strong><br><input type="text" class="form-control menosHeight" name="aspectoOrina" id="aspectoOrina"></td>
                                                        <td class="menosPadding"><strong> Reacción </strong><br><input type="text" class="form-control menosHeight" name="reaccionOrina" id="reaccionOrina"></td>
                                                        <td class="menosPadding"><strong> Densidad </strong><br><input type="text" class="form-control menosHeight" name="densidadOrina" id="densidadOrina"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> pH </strong><br><input type="text" class="form-control menosHeight" name="phOrina" id="phOrina"></td>
                                                        <td class="menosPadding"><strong> Proteínas </strong><br><input value="NEGATIVO" type="text" class="form-control menosHeight" name="proteinasOrina" id="proteinasOrina"></td>
                                                        <td class="menosPadding"><strong> Glucosa </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="glucosaOrina" id="glucosaOrina"></td>
                                                        <td class="menosPadding"><strong> Pigmentos Biliares </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="pigBilaOrina" id="pigBilaOrina"></td>

                                                    </tr>
                                                    
                                                    <tr class="">
                                                        <td class="menosPadding"><strong> Sangre oculta </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="sangreOcultaOrina" id="sangreOcultaOrina"></td>
                                                        <td class="menosPadding"><strong> Nitrito </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="nitritoOrina" id="nitritoOrina"></td>
                                                        <td class="menosPadding"><strong> Cuerpos cetónicos </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="cuerposCetonicosOrina" id="cuerposCetonicosOrina"></td>
                                                        <td class="menosPadding"><strong> Acidos biliares </strong><br><input type="text" class="form-control menosHeight" name="acidosBilOrina" id="acidosBilOrina"></td>
                                                    </tr>

                                                    <tr class="text-center alert-primary">
                                                        <td colspan="4">EXAMEN MICROSCOPICO</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Granulosos </strong><br><input type="text" class="form-control menosHeight" name="granulososOrina" id="granulososOrina"></td>
                                                        <td class="menosPadding"><strong> Cilindros leucocitarios </strong><br><input type="text" class="form-control menosHeight" name="cilindrosLeuOrina" id="cilindrosLeuOrina"></td>
                                                        <td class="menosPadding"><strong> Cilindros hialinos </strong><br><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="cilindrosOrina" id="cilindrosOrina"></td>
                                                        <td class="menosPadding"><strong> Otros cilindros </strong><br><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="oCilindrosOrina" id="oCilindrosOrina"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> Leucocitos </strong><br><input type="text" class="form-control menosHeight" name="leucocitosOrina" id="leucocitosOrina"></td>
                                                        <td class="menosPadding"><strong> Hematíes </strong><br><input type="text" class="form-control menosHeight" name="hematiesOrina" id="hematiesOrina"></td>
                                                        <td class="menosPadding"><strong> Células Epiteliales </strong><br><input type="text" class="form-control menosHeight" name="celulasEpitelialesOrina" id="celulasEpitelialesOrina"></td>
                                                        <td class="menosPadding"><strong> Elementos minerales </strong><br><input type="text" class="form-control menosHeight" name="elemMineralesOrina" id="elemMineralesOrina"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> Bacterias </strong><br><input type="text" class="form-control menosHeight" name="bacteriasOrina" id="bacteriasOrina"></td>
                                                        <td class="menosPadding"><strong> Levaduras  </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="levaduraOrina" id="levaduraOrina"></td>
                                                        <td class="menosPadding"><strong> Otros </strong><br><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="otrosOrina" id="otrosOrina"></td>
                                                        <td></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesOrina" id="observacionesOrina" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen Orina-->
    
    <!-- Modal para examen hisopado nasal-->
        <div class="modal fade" id="hisopadoNasal" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Hisopado nasal </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmHisopado" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_hisopado" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente14 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                            if($examen->idMedicamento == 958){
                                                                                echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                            }else{
                                                                                echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> Fecha </strong><br><input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control menosHeight" name="fechaCovid" id="fechaCovid"></td>
                                                        <td class="menosPadding"><strong> Hora </strong><br><input type="text" value="<?php echo date("h:i A"); ?>"  class="form-control menosHeight" name="horaCovid" id="horaCovid"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Pasaporte </strong><br><input type="text" class="form-control menosHeight" name="pasaporteCovid" id="pasaporteCovid"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Observaciones </strong><br><textarea name="nota" id="nota" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen hisopado nasal-->

    <!-- Modal para examen espermograma-->  
        <div class="modal fade" id="espermograma" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Examen de orina </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmOrina" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_esperma" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-grup">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente14 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                            if($examen->idMedicamento == 681){
                                                                                echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                            }else{
                                                                                echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Color </strong><br><input type="text" class="form-control menosHeight" name="colorExperma" id="colorExperma" required></td>
                                                        <td class="menosPadding"><strong> pH </strong><br><input type="text" class="form-control menosHeight" name="phEsperma" id="phEsperma"></td>
                                                        <td class="menosPadding"><strong> Volumen </strong><br><input type="text" class="form-control menosHeight" name="volumenEsperma" id="volumenEsperma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Licuefacción </strong><br><input type="text" class="form-control menosHeight" name="licuefaccionEsperma" id="licuefaccionEsperma"></td>
                                                        <td class="menosPadding"><strong> Viscosidad </strong><br><input type="text" class="form-control menosHeight" name="viscocidadEsperma" id="viscocidadEsperma"></td>
                                                        <td class="menosPadding"><strong> Días de abstinencia </strong><br><input type="text" class="form-control menosHeight" name="abstinenciaEsperma" id="abstinenciaEsperma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Hematíes </strong><br><input type="text" class="form-control menosHeight" name="hematiesEsperma" id="hematiesEsperma"></td>
                                                        <td class="menosPadding"><strong> Leucocitos </strong><br><input type="text" class="form-control menosHeight" name="leucocitosEsperma" id="leucocitosEsperma"></td>
                                                        <td class="menosPadding"><strong> Células Epiteliales </strong><br><input type="text" class="form-control menosHeight" name="epitelialesEsperma" id="epitelialesEsperma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Bacterias  </strong><br><input type="text" class="form-control menosHeight" name="bacteriasEsperma" id="bacteriasEsperma"></td>
                                                        <td class="menosPadding"><strong> Movilidad progresivamente rápida </strong><br><input type="text" class="form-control menosHeight" name="mprEsperma" id="mprEsperma"></td>
                                                        <td class="menosPadding"><strong> Movilidad progresivamente lenta </strong><br><input type="text" class="form-control menosHeight" name="mplEsperma" id="mplEsperma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Movilidad no progresiva </strong><br><input type="text" class="form-control menosHeight" name="mnpEsperma" id="mnpEsperma"></td>
                                                        <td class="menosPadding"><strong> Inmóviles </strong><br><input type="text" class="form-control menosHeight" name="inmovilesEsperma" id="inmovilesEsperma"></td>
                                                        <td class="menosPadding"><strong> Recuento  </strong><br><input type="text" class="form-control menosHeight" name="recuentoEsperma" id="recuentoEsperma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Normales </strong><br><input type="text" class="form-control menosHeight" name="normalesEsperma" id="normalesEsperma"></td>
                                                        <td class="menosPadding"><strong> Anormal cabeza </strong><br><input type="text" class="form-control menosHeight" name="anormalCbEsperma" id="anormalCbEsperma"></td>
                                                        <td class="menosPadding"><strong> Anormal cola  </strong><br><input type="text" class="form-control menosHeight" name="anormalClEsperma" id="anormalClEsperma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Vivos </strong><br><input type="text" class="form-control menosHeight" name="vivosEsperma" id="vivosEsperma"></td>
                                                        <td class="menosPadding"><strong> Muertos </strong><br><input type="text" class="form-control menosHeight" name="muertosEsperma" id="muertosEsperma"></td>
                                                    </tr>


                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesEsperma" id="observacionesEsperma" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen espermograma-->

    <!-- Modal para examen creatinina en orina de 24 horas-->  
        <div class="modal fade" id="examenCreatinina" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Examen de orina </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmOrina" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_creatinina" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="2">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-grup">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente15 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                            if($examen->idMedicamento == 677){
                                                                                echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                            }else{
                                                                                echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Sexo </strong><br>
                                                            <select id="sexoCreatinina" name="sexoCreatinina" class="form-control menosHeight valorNormal" required>
                                                                <option value="">.::Seleccionar::.</option>
                                                                <option value="M">Masculino</option>
                                                                <option value="F">Femenino</option>
                                                            </select>
                                                        </td>
                                                        <td class="menosPadding"><strong> Edad </strong><br><input type="text" value="<?php echo $paciente->edadPaciente; ?>" class="form-control menosHeight valorNormal" id="edadCreatinina" name="edadCreatinina" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Volumen </strong><br><input type="text" class="form-control menosHeight calculoCreatinina" name="volumenCreatinina" id="volumenCreatinina" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Tiempo </strong><br><input type="text" value="1440" class="form-control menosHeight calculoCreatinina" name="tiempoCreatinina" id="tiempoCreatinina" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Creatinina en sangre </strong><br><input type="text" class="form-control menosHeight calculoCreatinina" name="sangreCreatinina" id="sangreCreatinina" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Creatinina en orina </strong><br><input type="text" class="form-control menosHeight calculoCreatinina" name="orinaCreatinina" id="orinaCreatinina"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Depuración de Creatinina </strong><br><input type="text" class="form-control menosHeight" name="depuracionCreatinina" id="depuracionCreatinina" required><input type="text" class="menosHeight" name="valorNormalDepuracion" id="valorNormalDepuracion" placeholder="Valor normal" style="float: right;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Proteinas 24Hr </strong><br><input type="text" class="form-control menosHeight" name="proteinasCreatinina" id="proteinasCreatinina"></td>
                                                    </tr>


                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Observaciones </strong><br><textarea name="observacionesCreatinina" id="observacionesCreatinina" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen creatinina en orina de 24 horas-->

    <!-- Modal para examen gases arteriales-->
        <div class="modal fade" id="gasesArteriales" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Gases arteriales </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_gases_arteriales" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="2">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-grup">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente15 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                            if($examen->idMedicamento == 1079){
                                                                                echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                            }else{
                                                                                echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Muestra </strong><br><input type="text" value="" class="form-control menosHeight" name="muestraArteriales" id="muestraArteriales"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> PH <span class="text-primary">(Vn: 7.20-7.60)</span></strong><br><input type="text" class="form-control menosHeight" name="phArteriales" id="phArteriales"></td>
                                                        <td class="menosPadding"><strong> PCO2 <span class="text-primary">(Vn: 30.0 - 50.0 mmHg)</span></strong><br><input type="text" class="form-control menosHeight" name="pco2Arteriales" id="pco2Arteriales"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> PO2 <span class="text-primary">(Vn: 80.0 - 100.0 mmHf)</span></strong><br><input type="text" class="form-control menosHeight" name="po2Arteriales" id="po2Arteriales"></td>
                                                        <td class="menosPadding"><strong> NA+ <span class="text-primary">(Vn: 135.0 - 145.0 mmol/L)</span></strong><br><input type="text" class="form-control menosHeight" name="naArteriales" id="naArteriales"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> K+ <span class="text-primary">(Vn: 3.5 - 5.10 mmol/L)</span> </strong><br><input type="text" class="form-control menosHeight" name="kArteriales" id="kArteriales"></td>
                                                        <td class="menosPadding"><strong> Ca++ <span class="text-primary">(Vn: 1.13 - 1.32 mmol/L)</span> </strong><br><input type="text" class="form-control menosHeight" name="caArteriales" id="caArteriales"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> tHb <span class="text-primary">(Vn: 12.0 - 17.0 gr/dl)</span> </strong><br><input type="text" class="form-control menosHeight" name="thbArteriales" id="thbArteriales"></td>
                                                        <td class="menosPadding"><strong> So2 <span class="text-primary">(Vn: 90 - 100 %)</span> </strong><br><input type="text" class="form-control menosHeight" name="soArteriales" id="soArteriales"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> FIO2 </strong><br><input type="text" class="form-control menosHeight" name="fio2Arteriales" id="fio2Arteriales"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit" id="tLibre"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen gases arteriales-->

    <!-- Modal para examen tolerancia glucosa-->
        <div class="modal fade" id="toleranciaGlucosa" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de Tolerancia a la Glucosa</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="-3">
                                        <form class="needs-validation frmData" id="frmToleranciaGlucosa" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_tolerancia_glucosa" target="_blank" novalidate>
                                            <table class="table table-borderless">
                                                <tr style="display: none;">
                                                    <td colspan="3">
                                                        <strong>Exámenes solicitados</strong>
                                                        <select name="examenSolicitado[]" id="" class="form-control"required="">
                                                            <option value="">:: Seleccionar ::</option>
                                                            <?php
                                                                foreach ($examenes as $examen) {
                                                                    if($examen->idMedicamento == 662){
                                                                        echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                    }else{
                                                                        echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                        <div class="invalid-tooltip">
                                                            Seleccione un tipo de examen.
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-borderless">
                                                        <thead></thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>PRIMERA MUESTRA GLUCOSA EN AYUNAS</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado1" id="resultado1" placeholder="Valor normal: 60 - 110 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" value="<?php echo $tercera; ?>" class="pivoteText antigenosFebriles form-control menosHeight" name="hora1" id="hora1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>1h POST CARGA <input type="text" value="75" size="5" name="parametroCarga" class="menosHeight">  DE DEXTROSA</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado2" id="resultado2" placeholder="Valor normal: Menor de 200 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" value="<?php echo $segunda; ?>" class="pivoteText antigenosFebriles form-control menosHeight" name="hora2" id="hora2"></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>2h POST CARGA</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado3" id="resultado3" placeholder="Valor normal: Menor de 140 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" value="<?php echo $primera; ?>" class="pivoteText antigenosFebriles form-control menosHeight" name="hora3" id="hora3"></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>3h POST CARGA</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado4" id="resultado4" placeholder="Valor normal: 70 - 115 mg/dl"></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" value="<?php echo $hora; ?>" class="pivoteText antigenosFebriles form-control menosHeight" name="hora4" id="hora4"></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding" colspan="2"><strong> Observaciones </strong><br><textarea name="observacionesTG" id="observacionesTG" class="form-control menosHeight disableSelect"></textarea></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen inmunologia glucosa-->

    <!-- Modal para examen Toxoplasma-->
        <div class="modal fade" id="toxoplasma" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de tipeo sanguineo</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_toxoplasma" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="3">
                                                            <input type="text" name="examenSolicitado[]" value="1087" >
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Toxoplasma IgG</strong><br><input type="text" class="form-control menosHeight" name="iggToxoplasma" id="iggToxoplasma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Toxoplasma IgM </strong><br><input type="text" class="form-control menosHeight" name="igmToxoplasma" id="igmToxoplasma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesToxoplasma" id="observacionesToxoplasma" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>
 
                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen Toxoplasma-->

<!-- Fin modales para insertar -->

<!-- Modales para actualizar -->
    <!-- Modal para actualizar examen inmunologia-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="inmunologiaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de inmunologia</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="-3">
                                        <form class="needs-validation" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_inmunologia" novalidate>
                                            <table class="table table-borderless">
                                                <tr style="display: none;">
                                                    <td colspan="3">
                                                        <strong>Exámenes solicitados</strong>
                                                        <select name="examenSolicitado" id="inmunologiaSolicitadoA" class="controlInteligenteU" required>
                                                            <option value="">:: Seleccionar ::</option>
                                                            <?php
                                                                foreach ($examenes as $examen) {
                                                            ?>
                                                                <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="invalid-tooltip">
                                                            Seleccione un tipo de examen.
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table table-borderless">
                                                        <thead></thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Tífico O</strong></td>
                                                                <td colspan="2"><input type="text" class="pivoteText" name="tificoO" id="tificoOA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong>Tífico H</strong></td>
                                                                <td colspan="2"><input type="text" class="pivoteText" name="tificoH" id="tificoHA"></td>
                                                                            
                                                            </tr>

                                                            <tr>
                                                                <td><strong> Paratífico A</strong></td>
                                                                <td colspan="2"><input type="text" class="pivoteText" name="paratificoA" id="paratificoAA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong> Paratífico B</strong></td>
                                                                <td><input type="text" class="pivoteText" name="paratificoB" id="paratificoBA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong> Brucella Abortus</strong></td>
                                                                <td><input type="text" class="pivoteText" name="brucellaAbortus" id="brucellaAbortusA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong> Proteus OX-19</strong></td>
                                                                <td><input type="text" class="pivoteText" name="proteusOx" id="proteusOxA"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table-borderless">
                                                        <thead></thead>
                                                        <tbody>

                                                            <tr>
                                                                <td><strong> Proteína "C" reactiva</strong><p class="text-primary">VN: Hasta 6mg/L</p></td>
                                                                <td><input type="text" class="pivoteText" name="proteinaC" id="proteinaCA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong> Fac. Reumatoideo</strong> <p class="text-primary">Valor normal: < 8UI/mL</p></td>
                                                                <td><input type="text" class="pivoteText" name="reumatoideo" id="reumatoideoA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong> Antiestreptolisina "O"</strong> <p class="text-primary">Valor normal: Hasta 200 UI/mL</p></td>
                                                                <td><input type="text" class="pivoteText" name="antiestreptolisina" id="antiestreptolisinaA"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                            <div class="text-center">
                                                <input type="hidden" name="idInmunologia" id="idInmunologia">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaI">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para actualizar examen inmunologia-->

    <!-- Modal para eliminar consulta-->
        <div class="modal fade p-5" id="eliminarExamen" tabindex="-1" role="dialog" aria-labelledby="modal-5">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content pb-5">

                    <div class="modal-header bg-danger">
                        <h3 class="modal-title has-icon text-white"><i class="flaticon-alert-1"></i> Advertencia</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
                                class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body text-center">
                        <p class="h5">¿Estas seguro de eliminar este examen?</p>
                    </div>

                    <form class="needs-validation" action="<?php echo base_url()?>Laboratorio/eliminar_examen" method="post">
                        
                        <input type="hidden" name="idExamen" id="idExamen">
                        <input type="hidden" name="tipoExamen" id="tipoExamen">
                        <input type="hidden" name="idDetalleConsuta" id="idDC">
                        <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                    
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger shadow-none"><i class="fa fa-trash-alt"></i> Eliminar </button>
                            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    <!-- Fin Modal eliminar consulta-->

    <!-- Modal para examen bacteriologia-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="bacteriologiaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de bacteriología</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_bacteriologia" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="3">
                                                            <strong>Exámenes solicitados</strong><br>
                                                            <div class="input-group">
                                                                <select name="bacteriologiaSolicitado" id="bacteriologiaSolicitadoA" class=" form-control controlInteligenteU2" required="">
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                        <strong>Resultado de directo</strong><br>
                                                            <input type="text" size="92" name="resultadoDirecto" id="resultadoDirectoA" class="form-control menosHeight">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                        <strong>Procedencia de la muestra</strong><br>
                                                            <input type="text" size="92" name="procedenciaDirecto" id="procedenciaDirectoA" class="form-control menosHeight">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                        <strong>Resultado de cultivo</strong><br>
                                                            <input type="text" size="92" name="resultadoCultivo" id="resultadoCultivoA" class="form-control menosHeight">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Cefixime</strong><br><input type="text" class="form-control menosHeight" name="cefixime" id="cefiximeA"></td>
                                                        <td class="menosPadding"><strong> Amikacina</strong><br><input type="text" class="form-control menosHeight" name="amikacina" id="amikacinaA"></td>
                                                        <td class="menosPadding"><strong> Levofloxacina</strong><br><input type="text" class="form-control menosHeight" name="levofloxacina" id="levofloxacinaA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Ceftriaxona </strong><br><input type="text" class="form-control menosHeight" name="ceftriaxona" id="ceftriaxonaA"></td>
                                                        <td class="menosPadding"><strong> Azitromicina </strong><br><input type="text" class="form-control menosHeight" name="azitromicina" id="azitromicinaA"></td>
                                                        <td class="menosPadding"><strong> Imipenem </strong><br><input type="text" class="form-control menosHeight" name="imipenem" id="imipenemA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Meropemen </strong><br><input type="text" class="form-control menosHeight" name="meropenem" id="meropenemA"></td>
                                                        <td class="menosPadding"><strong> Fosfocil </strong><br><input type="text" class="form-control menosHeight" name="fosfocil" id="fosfocilA"></td>
                                                        <td class="menosPadding"><strong> Imipenem </strong><br><input type="text" class="form-control menosHeight" name="ciprofloxacina" id="ciprofloxacinaA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Penicilina </strong><br><input type="text" class="form-control menosHeight" name="penicilina" id="penicilinaA"></td>
                                                        <td class="menosPadding"><strong> Vancomicina </strong><br><input type="text" class="form-control menosHeight" name="vancomicina" id="vancomicinaA"></td>
                                                        <td class="menosPadding"><strong> Ácido nalidíxico </strong><br><input type="text" class="form-control menosHeight" name="acidoNalidixico" id="acidoNalidixicoA"></td>
                                                    </tr>

                                                    <tr>
                                                        
                                                        <td class="menosPadding"><strong> Gentamicina </strong><br><input type="text" class="form-control menosHeight" name="gentamicina" id="gentamicinaA"></td>
                                                        <td class="menosPadding"><strong> Nitrofurantoina </strong><br><input type="text" class="form-control menosHeight" name="nitrofurantoina" id="nitrofurantoinaA"></td>
                                                        <td class="menosPadding"><strong> Ceftazidime </strong><br><input type="text" class="form-control menosHeight" name="ceftazimide" id="ceftazimideA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Cefotaxime </strong><br><input type="text" class="form-control menosHeight" name="cefotaxime" id="cefotaximeA"></td>
                                                        <td class="menosPadding"><strong> Clindamicina </strong><br><input type="text" class="form-control menosHeight" name="clindamicina" id="clindamicinaA"></td>
                                                        <td class="menosPadding"><strong> Trimetropim sulfa </strong><br><input type="text" class="form-control menosHeight" name="trimetropimSulfa" id="trimetropimSulfaA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Ampicilina/Sulbactam </strong><br><input type="text" class="form-control menosHeight" name="ampicilina" id="ampicilinaA"></td>
                                                        <td class="menosPadding"><strong> Piperacilina/Tazobactam </strong><br><input type="text" class="form-control menosHeight" name="piperacilina" id="piperacilinaA"></td>
                                                        <td class="menosPadding"><strong> Amoxicilina ácido clavulánico</strong><br><input type="text" class="form-control menosHeight" name="amoxicilina" id="amoxicilinaA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Claritromicina </strong><br><input type="text" class="form-control menosHeight" name="claritromicina" id="claritromicinaA"></td>
                                                        <td class="menosPadding"></td>
                                                        <td class="menosPadding"><strong> Cefuroxime </strong><br><input type="text" class="form-control menosHeight" name="cefuroxime" id="cefuroximeA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3"><strong> Observación </strong><br><textarea  class="form-control menosHeight" name="observacion" id="observacionBacteriologiaA" cols="96"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idBacteriologia" id="idBacteriologia">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaB">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen bacteriologia-->

    <!-- Modal para examen Tiempo de coagulación-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="coagulacionActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de coagulación</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_coagulacion" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding"><strong> Tiempo de protombina</strong><br><input type="text" class="form-control menosHeight" name="tiempoProtombina" id="tiempoProtombinaA"><p class="text-primary" style="font-size:12px">Valor normal: 10-14 segundos</p></td>
                                                        <td class="menosPadding"><strong> Tiempo parcial de tromboplastina</strong><br><input type="text" class="form-control menosHeight" name="tiempoTromboplastina" id="tiempoTromboplastinaA"><p class="text-primary" style="font-size:12px">Valor normal: 20-33 segundos</p></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Fibrinógeno </strong><br><input type="text" class="form-control menosHeight" name="fibrinogeno" id="fibrinogenoA"><p class="text-primary" style="font-size:12px">Valor normal: 200-400 mg/dl </p></td>
                                                        <td class="menosPadding"><strong> INR </strong><br><input type="text" class="form-control menosHeight" name="inr" id="inrA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Tiempo de sangramiento </strong><br><input type="text" class="form-control menosHeight" name="tiempoSangramiento" id="tiempoSangramientoA"><p class="text-primary" style="font-size:12px">Valor normal: 1-4 minutos</p></td>
                                                        <td class="menosPadding"><strong> Tiempo de coagulación </strong><br><input type="text" class="form-control menosHeight" name="tiempoCoagulacion" id="tiempoCoagulacionA"><p class="text-primary" style="font-size:12px">Valor normal: 4-9 minutos</p></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Observación </strong><br><textarea  class="form-control menosHeight" name="observacion" id="observacionCoagulacionA" cols="96"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idCoagulacion" id="idCoagulacion">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaC">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen Tiempo de coagulación-->

    <!-- Modal para examen Tipeo sanguineo-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="sanguineoActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de tipeo sanguineo</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_sanguineo" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra</strong><br><input type="text" class="form-control menosHeight" name="muestraSanguineo" id="muestraSanguineoA"></td>
                                                        <td class="menosPadding"><strong> Grupo sanguíneo</strong><br><input type="text" class="form-control menosHeight" name="grupoSanguineo" id="grupoSanguineoA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Factor RH </strong><br><input type="text" class="form-control menosHeight" name="factorSanguineo" id="factorSanguineoA"></td>
                                                        <td class="menosPadding"><strong> DU </strong><br><input type="text" class="form-control menosHeight" name="duSanguineo" id="duSanguineoA"></td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idSanguineo" id="idSanguineo">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaS">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen Tipeo sanguineo-->

    <!-- Modal para examen sanguinea-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="quimicaSanguineaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Química Sanguinea</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmQuimicaCLinica" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_quimica_sanguinea" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr style="display: none;">
                                                    <tr>
                                                        <td class="menosPadding"><strong> Glucosa (60-110 mg/dl)</strong><br><input type="text" name="glucosa" class="form-control menosHeight" id="glucosaActualizar"></td>
                                                        <td class="menosPadding"><strong> Glucosa P. (140 mg/dl)</strong><br><input type="text" name="posprandial" class="form-control menosHeight" id="posprandialActualizar"></td>
                                                        <td class="menosPadding"><strong> Colesterol ( < de 200 mg/dl)</strong><br><input type="text" name="colesterol" class="form-control menosHeight" id="colesterolActualizar"></td>
                                                        <td class="menosPadding"><strong> Triglicéridos ( < de 150 mg/dl)</strong><br><input type="text" name="trigliceridos" class="form-control menosHeight" id="trigliceridosActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Colesterol HDL ( > de 35 mg/dl) </strong><br><input type="text" name="colesterolHDL" class="form-control menosHeight" id="colesterolHDLActualizar"></td>
                                                        <td class="menosPadding"><strong> Colesterol LDL ( < 130 mg/dl)</strong><br><input type="text" name="colesterolLDL" class="form-control menosHeight" id="colesterolLDLActualizar"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Ácido úrico (2.4-7.0 mg/dl) </strong><br><input type="text" name="acidoUrico" class="form-control menosHeight" id="acidoUricoActualizar" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Urea ( 15-45 mg/dl)</strong><br><input type="text" name="urea" class="form-control menosHeight" id="ureaActualizar"></td>
                                                        <td class="menosPadding"><strong> Nitrógeno ureico ( 5-25 mg/dl)</strong><br><input type="text" name="nitrogenoUreico" class="form-control menosHeight" id="nitrogenoUreicoActualizar"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Creatinina ( 0.5-1.4 mg/dl)</strong><br><input type="text" name="creatinina" class="form-control menosHeight" id="creatininaActualizar" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Amilasa ( VN: menor de 90 U/L)</strong><br><input type="text" name="amilasa" class="form-control menosHeight" id="amilasaActualizar"></td>
                                                        <td class="menosPadding"><strong> Lipasa ( VN: menor de 38 U/L)</strong><br><input type="text" name="lipasa" class="form-control menosHeight" id="lipasaActualizar"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Fosfatasa alcalina ( Hasta 275 U/L)</strong><br><input type="text" name="fosfatasaAlcalina" class="form-control menosHeight" id="fosfatasaAlcalinaActualizar" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TGP ( VN: 1-40 U/L)</strong><br><input type="text" name="tgp" class="form-control menosHeight" id="tgpActualizar"></td>
                                                        <td class="menosPadding"><strong> TGO ( VN: 1-38 U/L)</strong><br><input type="text" name="tgo" class="form-control menosHeight" id="tgoActualizar"></td>
                                                        <td colspan="2" class="menosPadding"><strong> HBA1C ( VN: 4.5-6.5% )</strong><br><input type="text" name="hba1c" class="form-control menosHeight" id="hba1cActualizar" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Proteina total (VN: 6.6-8.3 g/dL)</strong><br><input type="text" name="proteinaTotal" class="form-control menosHeight" id="proteinaTotalActualizar"></td>
                                                        <td class="menosPadding"><strong> Albúmina (VN: 3.5-5.0 g/dL)</strong><br><input type="text" name="albumina" class="form-control menosHeight" id="albuminaActualizar"></td>
                                                        <td class="menosPadding"><strong> Globulina (VN: 2-3.5 g/dL) </strong><br><input type="text" name="globulina" class="form-control menosHeight" id="globulinaActualizar"></td>
                                                        <td class="menosPadding"><strong> Relación A/G: 1.2 a 2.2 </strong><br><input type="text" name="relacionAG" class="form-control menosHeight" id="relacionAGActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Bili. Total (VN: hasta 1.1 mg/dl)</strong><br><input type="text" name="biliTotal" class="form-control menosHeight" id="biliTotalActualizar"></td>
                                                        <td class="menosPadding"><strong> Bili. directa (VN: hasta 0.25 mg/dl)</strong><br><input type="text" name="biliDirecta" class="form-control menosHeight" id="biliDirectaActualizar"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Bilirrubina indirecta </strong><br><input type="text" name="biliIndirecta" class="form-control menosHeight" id="biliIndirectaActualizar" size="47"></td>
                                                    </tr>

                                                    <!-- Inicio -->
                                                        <tr>
                                                            <td class="menosPadding"><strong> Sodio (136-148 mmol/L)</strong><br><input type="text" class="form-control menosHeight" name="sodioQuimicaClinica" id="sodioQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding" colspan="2"><strong> Potasio (3.5-5.3 mmol/L)</strong><br><input type="text" class="form-control menosHeight" name="potasioQuimicaClinica" id="potasioQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding"><strong> Cloro (98-107 mmol/L)</strong><br><input type="text" class="form-control menosHeight" name="cloroQuimicaClinica" id="cloroQuimicaClinicaActualizar"></td>
                                                        </tr>

                                                        <tr>
                                                            <td class="menosPadding"><strong> Magnesio (1.6-2.5 mg/dl) </strong><br><input type="text" class="form-control menosHeight" name="magnesioQuimicaClinica" id="magnesioQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding" colspan="2"><strong> Calcio (8.5-10.5 mg/dl) </strong><br><input type="text" class="form-control menosHeight" name="calcioQuimicaClinica" id="calcioQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding"><strong> Fosforo (Vn: 2.5-5.0 mg/dl) </strong><br><input type="text" class="form-control menosHeight" name="fosforoQuimicaClinica" id="fosforoQuimicaClinicaActualizar"></td>
                                                        </tr>

                                                        <tr>
                                                            <td class="menosPadding"><strong> CPK Total (0-195 U/L) </strong><br><input type="text" class="form-control menosHeight" name="cpkTQuimicaClinica" id="cpkTQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding"><strong> CPK MB (menor a 24U/L) </strong><br><input type="text" class="form-control menosHeight" name="cpkMbQuimicaClinica" id="cpkMbQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding"><strong> LDH (230-460 U/L) </strong><br><input type="text" class="form-control menosHeight" name="ldhQuimicaClinica" id="ldhQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding"><strong> Troponina I (VN: menor a 0.30 ng/ml) </strong><br><input type="text" class="form-control menosHeight" name="troponinaQuimicaClinica" id="troponinaQuimicaClinicaActualizar"></td>
                                                        </tr>
                                                    <!-- Fin -->

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Comentarios </strong><br><textarea name="nota" class="form-control menosHeight" id="notaActualizar" cols="96"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idQuimicaSanguinea" id="idQuimicaSanguinea">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaQS">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen sanguinea-->

    <!-- Modal para examen cropologia-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="cropologiaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Coprologia </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">
                                        <form class="needs-validation" id="frmCropologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_cropologia" novalidate>
                                            <div class="row" style="margin-top: 0px;">
                                                <div class="col-md-12">
                                                </div>
                                                <div class="col-md-4" class="border" style="margin-top: -20px;">
                                                    <table>
                                                        <thead></thead>
                                                        <tbody class="text-left">

                                                            <tr>
                                                                <td class="menosPadding"><strong> Color </strong><br><input type="text" class="form-control menosHeight" name="colorCropologia" id="colorActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Consistencia </strong><br><input type="text" class="form-control menosHeight" name="consistenciaCropologia" id="consistenciaCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Mucus  </strong><br><input type="text" class="form-control menosHeight" name="mucusCropologia" id="mucusCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Hematíes </strong><br><input type="text" class="form-control menosHeight" name="hematiesCropologia" id="hematiesCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Leucocitos </strong><br><input type="text" class="form-control menosHeight" name="leucocitosCropologia" id="leucocitosCropologiaActualizar"></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td colspan="4" class="divider text-center text-primary font-weight-bold">METAZOARIOS</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Ascaris </strong><br><input type="text" class="form-control menosHeight" name="ascarisCropologia" id="ascarisCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Hymenolepis </strong><br><input type="text" class="form-control menosHeight" name="hymenolepisCropologia" id="hymenolepisCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Uncinarias  </strong><br><input type="text" class="form-control menosHeight" name="uncinariasCropologia" id="uncinariasCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Tricocéfalos </strong><br><input type="text" class="form-control menosHeight" name="tricocefalosCropologia" id="tricocefalosCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Larva strongyloides </strong><br><input type="text" class="form-control menosHeight" name="larvaStrongyloides" id="larvaStrongyloidesActualizar"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-md-8" class="border" style="margin-top: -20px;">
                                                    <table class="table table-borderless">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <td></td>
                                                                <th colspan="2" class="text-primary"><strong>PROTOZOARIOS</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-left">
                                                            <tr class="text-center">
                                                                <td></td>
                                                                <td>Quistes</td>
                                                                <td>Trofozoitos</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Entamoeba histolytica</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="histolyticaQuistes" id="histolyticaQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="histolyticaTrofozoitos" id="histolyticaTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Entamoeba coli</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="coliQuistes" id="coliQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="coliTrofozoitos" id="coliTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Giardia lamblia</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="giardiaQuistes" id="giardiaQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="giardiaTrofozoitos" id="giardiaTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Blastocystis hominis</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="blastocystisQuistes" id="blastocystisQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="blastocystisTrofozoitos" id="blastocystisTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Tricomonas hominis</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="tricomonasQuistes" id="tricomonasQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name=" tricomonasTrofozoitos " id="tricomonasTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Chilomastix mesnilli</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="mesnilliQuistes" id="mesnilliQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="mesnilliTrofozoitos" id="mesnilliTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Endolimax nana</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="nanaQuistes" id="nanaQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="nanaTrofozoitos" id="nanaTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center text-primary" colspan="3"><strong>RESTOS ALIMENTICIOS</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Restos macroscópicos</td>
                                                                <td class="menosPadding" colspan="2"><input type="text" class="form-control menosHeight" name="restosMacroscopicos" id="restosMacroscopicosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Restos microscópicos</td>
                                                                <td class="menosPadding" colspan="2"><input type="text" class="form-control menosHeight" name="restosMicroscopicos" id="restosMicroscopicosActualizar"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-md-12">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesCropologia" id="observacionesCropologiaActualizar" class="form-control menosHeight" ></textarea></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <input type="hidden" name="idCropologia" id="idCropologia">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaCr">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>               
    <!-- Modal para examen cropologia-->

    <!-- Modal para examen tiroideas libres-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="tiroideaLibreActualizar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Tiroidea libre</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_tiroidea_libre" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado" id="tiroideaLibreSolicitadoActualizar" class="controlInteligenteU8 form-control" required>
                                                                    <option value="">:: Seleccionar  ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div> 
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" class="form-control menosHeight" name="muestraTiroideaLibre" id="muestraTiroideaLibreActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T3 Libres <span class="text-primary">(Vn: 1.4-4.2 pg/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="t3TiroideaLibre" id="t3TiroideaLibreActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T4 Libres <span class="text-primary">(Vn: 0.80-2.0 ng/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="t4TiroideaLibre" id="t4TiroideaLibreActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TSH <span class="text-primary">(Vn: 0.3-3.0 uUI/ml)</span> </strong><br><input type="text" class="form-control menosHeight" name="tshTiroideaLibre" id="tshTiroideaLibreActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TSH Ultrasensible<span class="text-primary">(Vn: 0.03-3.0 uUI/ml)</span> </strong><br><input type="text" class="form-control menosHeight" name="tshTiroideaLibreU" id="tshTiroideaLibreUActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionTiroideaLibre" id="observacionTiroideaLibreActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idTiroideaLibre" id="idTiroideaLibre">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaTL">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen tiroideas libres-->

    <!-- Modal para examen tiroideas totales-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="tiroideasTotalesActualizar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Tiroideas totales </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmTiroideaTotal" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_tiroideas_totales" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado" id="tiroideaTotalActualizar" class="controlInteligenteU9 form-control" required>
                                                                    <option value="">:: Seleccionar::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                                </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" class="form-control menosHeight" name="muestraTiroideaTotal" id="muestraTiroideaTotalActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T3 Total <span class="text-primary">(Vn: 0.5-5.0 ng/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="t3TiroideaTotal" id="t3TiroideaTotalActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T4 Total <span class="text-primary">(Vn: 60.0-120.0 nmol/L)</span></strong><br><input type="text" class="form-control menosHeight" name="t4TiroideaTotal" id="t4TiroideaTotalActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TSH <span class="text-primary">(Vn: 0.3-5.6 uUI/ml)</span> </strong><br><input type="text" class="form-control menosHeight" name="tshTiroideaTotal" id="tshTiroideaTotalActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionTiroideaTotal" id="observacionTiroideaTotalActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idTiroideaTotal" id="idTiroideaTotal">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaTT">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen tiroideas totales-->

    <!-- Modal para examen varios-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="variosActualizar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Varios </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        
                                        <form class="needs-validation" id="frmVarios" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_varios" novalidate>
                                            
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" class="form-control menosHeight" name="muestraVarios" id="muestraVariosActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Resultado </strong><br><input type="text" class="form-control menosHeight" name="resultadoVarios" id="resultadoActualizar"><input type="text" class="menosHeight" name="valorNormalVarios" id="valorNormalVariosActualizar" placeholder="Valor normal" style="float: right;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesVarios" id="observacionesVariosActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idVarios" id="idVarios">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaV">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen varios-->

    <!-- Modal para examen PSA Total-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="psaTotalActualizar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Antigeno prostatico especifico total (PSA TOTAL) </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmPSATotal" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_psa" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado" id="solicitadoAPActualizar" class="controlInteligenteU11 form-control" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" class="form-control menosHeight" name="muestraAntigenoProstatico" id="muestraAPActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Resultado <span class="text-primary">(Rango de referencia: Menor de 4.0 ng/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="resultadoAntigenoProstatico" id="resultadoAPActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionAntigenoProstatico" id="observacionAPActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idAntigenoProstatico" id="idAntigenoProstatico">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaPSA">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen PSA Total-->

    <!-- Modal para examen Hematologia-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="hematologiaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Hematologia </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmHematologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_hematologia" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding"><strong> Eritrocitos (4-6 millones)</strong><br><input type="text" class="form-control menosHeight" name="eritrocitosHematologia" id="eritrocitosHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Hematócrito (37-45 %)</strong><br><input type="text" class="form-control menosHeight" name="hematocritoHematologia" id="hematocritoHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Hemoglobina (12-15 g/dl)</strong><br><input type="text" class="form-control menosHeight" name="hemoglobinaHematologia" id="hemoglobinaHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> VCM (82-96fl)</strong><br><input type="text" class="form-control menosHeight" name="vgmHematologia" id="vgmHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> HCM (27-32 pg)</strong><br><input type="text" class="form-control menosHeight" name="hgmHematologia" id="hgmHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> CHCM (30-35 g/dl)</strong><br><input type="text" class="form-control menosHeight" name="chgmHematologia" id="chgmHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Leucocitos (5-10 mil)</strong><br><input type="text" class="form-control menosHeight" name="leucocitosHematologia" id="leucocitosHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Neutrofilos Segmentados (%)</strong><br><input type="text" class="form-control menosHeight" name="neutrofHematologia" id="neutrofHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Neutrofilos en Banda (%)</strong><br><input type="text" class="form-control menosHeight" name="neutrofBandHematologia" id="neutrofBandHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Linfocitos (%)</strong><br><input type="text" class="form-control menosHeight" name="linfocitosHematologia" id="linfocitosHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Eosinófilos (%)</strong><br><input type="text" class="form-control menosHeight" name="eosinofilosHematologia" id="eosinofilosHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Monocitos (%)</strong><br><input type="text" class="form-control menosHeight" name="monocitosHematologia" id="monocitosHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Basófilos (%)</strong><br><input type="text" class="form-control menosHeight" name="basofilosHematologia" id="basofilosHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Blastos (%)</strong><br><input type="text" class="form-control menosHeight" name="blastosHematologia" id="blastosHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Reticulocitos (0.5-2.0 gr%)</strong><br><input type="text" class="form-control menosHeight" name="reticulocitosHematologia" id="reticulocitosHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Eritrosedimentación (0-20 mm/hr)</strong><br><input type="text" class="form-control menosHeight" name="eritrosedHematologia" id="eritrosedHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Plaquetas xmmc </strong><br><input type="text" class="form-control menosHeight" name="plaquetasHematologia" id="plaquetasHematologiaActualizar"><span class="text-primary" style="font-size: 12px;">Valor normal 150,000-450,000</span></td>
                                                        <td class="menosPadding"><strong> Gota gruesa </strong><br><input type="text" class="form-control menosHeight" name="gotaGruesaHematologia" id="gotaGruesaHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-center text-primary" colspan="3"><strong> FROTIS DE SANGRE PERIFERICA </strong></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-primary" colspan="3"><strong> Linea Roja </strong><br><input type="text" class="form-control menosHeight" name="rojaHematologia" id="rojaHematologiaActualizar"></td>
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-primary" colspan="3"><strong> Linea Blanca </strong><br><input type="text" class="form-control menosHeight" name="blancaHematologia" id="blancaHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-primary" colspan="3"><strong> Linea Plaquetaria </strong><br><input type="text" class="form-control menosHeight" name="plaquetariaHematologia" id="plaquetariaHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesHematologia" id="observacionesHematologiaActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idHematologia" id="idHematologia">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaH">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen Hematologia-->

    <!-- Modal para examen Orina-->
        <div class="modal fade" id="orinaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Examen de orina </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmOrina" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_orina" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr class="text-center alert-primary">
                                                        <td colspan="4">EXAMEN FISICO QUIMICO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="menosPadding"><strong> Color </strong><br><input type="text" class="form-control menosHeight" name="colorOrina" id="colorOrinaU"></td>
                                                        <td class="menosPadding"><strong> Aspecto </strong><br><input type="text" class="form-control menosHeight" name="aspectoOrina" id="aspectoOrinaU"></td>
                                                        <td class="menosPadding"><strong> Reacción </strong><br><input type="text" class="form-control menosHeight" name="reaccionOrina" id="reaccionOrinaU"></td>
                                                        <td class="menosPadding"><strong> Densidad </strong><br><input type="text" class="form-control menosHeight" name="densidadOrina" id="densidadOrinaU"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> pH </strong><br><input type="text" class="form-control menosHeight" name="phOrina" id="phOrinaU"></td>
                                                        <td class="menosPadding"><strong> Proteínas </strong><br><input value="NEGATIVO" type="text" class="form-control menosHeight" name="proteinasOrina" id="proteinasOrinaU"></td>
                                                        <td class="menosPadding"><strong> Glucosa </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="glucosaOrina" id="glucosaOrinaU"></td>
                                                        <td class="menosPadding"><strong> Pigmentos Biliares </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="pigBilaOrina" id="pigBilaOrinaU"></td>

                                                    </tr>
                                                    
                                                    <tr class="">
                                                        <td class="menosPadding"><strong> Sangre oculta </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="sangreOcultaOrina" id="sangreOcultaOrinaU"></td>
                                                        <td class="menosPadding"><strong> Nitrito </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="nitritoOrina" id="nitritoOrinaU"></td>
                                                        <td class="menosPadding"><strong> Cuerpos cetónicos </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="cuerposCetonicosOrina" id="cuerposCetonicosOrinaU"></td>
                                                        <td class="menosPadding"><strong> Acidos biliares </strong><br><input type="text" class="form-control menosHeight" name="acidosBilOrina" id="acidosBilOrinaU"></td>
                                                    </tr>

                                                    <tr class="text-center alert-primary">
                                                        <td colspan="4">EXAMEN MICROSCOPICO</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Granulosos </strong><br><input type="text" class="form-control menosHeight" name="granulososOrina" id="granulososOrinaU"></td>
                                                        <td class="menosPadding"><strong> Cilindros leucocitarios </strong><br><input type="text" class="form-control menosHeight" name="cilindrosLeuOrina" id="cilindrosLeuOrinaU"></td>
                                                        <td class="menosPadding"><strong> Cilindros hialinos </strong><br><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="cilindrosOrina" id="cilindrosOrinaU"></td>
                                                        <td class="menosPadding"><strong> Otros cilindros </strong><br><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="oCilindrosOrina" id="oCilindrosOrinaU"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> Leucocitos </strong><br><input type="text" class="form-control menosHeight" name="leucocitosOrina" id="leucocitosOrinaU"></td>
                                                        <td class="menosPadding"><strong> Hematíes </strong><br><input type="text" class="form-control menosHeight" name="hematiesOrina" id="hematiesOrinaU"></td>
                                                        <td class="menosPadding"><strong> Células Epiteliales </strong><br><input type="text" class="form-control menosHeight" name="celulasEpitelialesOrina" id="celulasEpitelialesOrinaU"></td>
                                                        <td class="menosPadding"><strong> Elementos minerales </strong><br><input type="text" class="form-control menosHeight" name="elemMineralesOrina" id="elemMineralesOrinaU"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> Bacterias </strong><br><input type="text" class="form-control menosHeight" name="bacteriasOrina" id="bacteriasOrinaU"></td>
                                                        <td class="menosPadding"><strong> Levaduras  </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="levaduraOrina" id="levaduraOrinaU"></td>
                                                        <td class="menosPadding"><strong> Otros </strong><br><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="otrosOrina" id="otrosOrinaU"></td>
                                                        <td></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesOrina" id="observacionesOrinaU" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="text" name="idOrina" id="idOrina">
                                                <input type="text" name="idDetalleConsulta" id="idDetalleConsultaO">
                                                <input type="text" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen Orina-->

    <!-- Modal para examen hisopado nasal-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="hisopadoNasalActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Hisopado nasal </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmHisopado" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_hisopado" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado" id="" class="controlInteligenteU14 form-control" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                            if($examen->idMedicamento == 958){
                                                                                echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                            }else{
                                                                                echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Fecha </strong><br><input type="date" class="form-control menosHeight" name="fechaCovid" id="fechaCovidActualizar"></td>
                                                        <td class="menosPadding"><strong> Hora </strong><br><input type="text"  class="form-control menosHeight" name="horaCovid" id="horaCovidActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Pasaporte </strong><br><input type="text" class="form-control menosHeight" name="pasaporteCovid" id="pasaporteCovidActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Observaciones </strong><br><textarea name="observaciones" id="observacionesHisopadoActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idHisopadoNasal" id="idHisopadoNasal">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaHN">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen hisopado nasal-->

    <!-- Modal para examen espermograma-->
        <div class="modal fade" id="espermogramaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Examen de orina </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmOrina" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_esperma" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <input type="text" name="examenSolicitado" id="espermogramaSolicitadoActualizar">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Color </strong><br><input type="text" class="form-control menosHeight" name="colorExperma" id="colorExpermaActualizar"></td>
                                                        <td class="menosPadding"><strong> pH </strong><br><input type="text" class="form-control menosHeight" name="phEsperma" id="phEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Volumen </strong><br><input type="text" class="form-control menosHeight" name="volumenEsperma" id="volumenEspermaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Licuefacción </strong><br><input type="text" class="form-control menosHeight" name="licuefaccionEsperma" id="licuefaccionEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Viscosidad </strong><br><input type="text" class="form-control menosHeight" name="viscocidadEsperma" id="viscocidadEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Días de abstinencia </strong><br><input type="text" class="form-control menosHeight" name="abstinenciaEsperma" id="abstinenciaEspermaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Hematíes </strong><br><input type="text" class="form-control menosHeight" name="hematiesEsperma" id="hematiesEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Leucocitos </strong><br><input type="text" class="form-control menosHeight" name="leucocitosEsperma" id="leucocitosEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Células Epiteliales </strong><br><input type="text" class="form-control menosHeight" name="epitelialesEsperma" id="epitelialesEspermaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Bacterias  </strong><br><input type="text" class="form-control menosHeight" name="bacteriasEsperma" id="bacteriasEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Movilidad progresivamente rápida </strong><br><input type="text" class="form-control menosHeight" name="mprEsperma" id="mprEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Movilidad progresivamente lenta </strong><br><input type="text" class="form-control menosHeight" name="mplEsperma" id="mplEspermaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Movilidad no progresiva </strong><br><input type="text" class="form-control menosHeight" name="mnpEsperma" id="mnpEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Inmóviles </strong><br><input type="text" class="form-control menosHeight" name="inmovilesEsperma" id="inmovilesEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Recuento  </strong><br><input type="text" class="form-control menosHeight" name="recuentoEsperma" id="recuentoEspermaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Normales </strong><br><input type="text" class="form-control menosHeight" name="normalesEsperma" id="normalesEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Anormal cabeza </strong><br><input type="text" class="form-control menosHeight" name="anormalCbEsperma" id="anormalCbEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Anormal cola  </strong><br><input type="text" class="form-control menosHeight" name="anormalClEsperma" id="anormalClEspermaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Vivos </strong><br><input type="text" class="form-control menosHeight" name="vivosEsperma" id="vivosEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Muertos </strong><br><input type="text" class="form-control menosHeight" name="muertosEsperma" id="muertosEspermaActualizar"></td>
                                                    </tr>


                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesEsperma" id="observacionesEspermaActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idEspermograma" id="idEspermograma">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaEsp">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen espermograma-->

    <!-- Modal para examen creatinina en orina de 24 horas-->  
        <div class="modal fade" id="examenCreatininaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Examen de orina </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmOrina" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_creatinina" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding"><strong> Sexo </strong><br>
                                                            <select id="sexoCreatininaActualizar" name="sexoCreatinina" class="form-control menosHeight valorNormal" required>
                                                                <option value="">.::Seleccionar::.</option>
                                                                <option value="M">Masculino</option>
                                                                <option value="F">Femenino</option>
                                                            </select>
                                                        </td>
                                                        <td class="menosPadding"><strong> Edad </strong><br><input type="text" value="<?php echo $paciente->edadPaciente; ?>" class="form-control menosHeight valorNormal" id="edadCreatininaActualizar" name="edadCreatinina" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Volumen </strong><br><input type="text" class="form-control menosHeight calculoCreatinina" name="volumenCreatinina" id="volumenCreatininaActualizar" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Tiempo </strong><br><input type="text" value="1440" class="form-control menosHeight calculoCreatinina" name="tiempoCreatinina" id="tiempoCreatininaActualizar" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Creatinina en sangre </strong><br><input type="text" class="form-control menosHeight calculoCreatinina" name="sangreCreatinina" id="sangreCreatininaActualizar" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Creatinina en orina </strong><br><input type="text" class="form-control menosHeight calculoCreatinina" name="orinaCreatinina" id="orinaCreatininaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Depuración de Creatinina </strong><br><input type="text" class="form-control menosHeight" name="depuracionCreatinina" id="depuracionCreatininaActualizar" required><input type="text" class="menosHeight" name="valorNormalDepuracion" id="valorNormalDepuracionActualizar" placeholder="Valor normal" style="float: right;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Proteinas 24Hr </strong><br><input type="text" class="form-control menosHeight" name="proteinasCreatinina" id="proteinasCreatininaActualizar"></td>
                                                    </tr>


                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Observaciones </strong><br><textarea name="observacionesCreatinina" id="observacionesCreatininaActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idCreatinina" id="idCreatinina">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaCrea">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen creatinina en orina de 24 horas-->

    <!-- Modal para actualizar examen gases arteriales-->
        <div class="modal fade" id="gasesArterialesActualizar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Gases arteriales </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_gases_arteriales" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Muestra </strong><br><input type="text" value="" class="form-control menosHeight" name="muestraArteriales" id="muestraArterialesActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> PH <span class="text-primary">(Vn: 7.20-7.60)</span></strong><br><input type="text" class="form-control menosHeight" name="phArteriales" id="phArterialesActualizar"></td>
                                                        <td class="menosPadding"><strong> PCO2 <span class="text-primary">(Vn: 30.0 - 50.0 mmHg)</span></strong><br><input type="text" class="form-control menosHeight" name="pco2Arteriales" id="pco2ArterialesActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> PO2 <span class="text-primary">(Vn: 80.0 - 100.0 mmHf)</span></strong><br><input type="text" class="form-control menosHeight" name="po2Arteriales" id="po2ArterialesActualizar"></td>
                                                        <td class="menosPadding"><strong> NA+ <span class="text-primary">(Vn: 135.0 - 145.0 mmol/L)</span></strong><br><input type="text" class="form-control menosHeight" name="naArteriales" id="naArterialesActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> K+ <span class="text-primary">(Vn: 3.5 - 5.10 mmol/L)</span> </strong><br><input type="text" class="form-control menosHeight" name="kArteriales" id="kArterialesActualizar"></td>
                                                        <td class="menosPadding"><strong> Ca++ <span class="text-primary">(Vn: 1.13 - 1.32 mmol/L)</span> </strong><br><input type="text" class="form-control menosHeight" name="caArteriales" id="caArterialesActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> tHb <span class="text-primary">(Vn: 12.0 - 17.0 gr/dl)</span> </strong><br><input type="text" class="form-control menosHeight" name="thbArteriales" id="thbArterialesActualizar"></td>
                                                        <td class="menosPadding"><strong> So2 <span class="text-primary">(Vn: 90 - 100 %)</span> </strong><br><input type="text" class="form-control menosHeight" name="soArteriales" id="soArterialesActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> FIO2 </strong><br><input type="text" class="form-control menosHeight" name="fio2Arteriales" id="fio2ArterialesActualizar"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idGasesArteriales" id="idGasesArteriales">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaArte">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit" id=""><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para actualizar examen gases arteriales-->

    <!-- Modal para actualizar examen tolerancia glucosa-->
        <div class="modal fade" id="toleranciaGlucosaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de Tolerancia a la Glucosa</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="-3">
                                        <form class="needs-validation frmData" id="frmToleranciaGlucosa" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_tolerancia_glucosa" novalidate>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-borderless">
                                                        <thead></thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>PRIMERA MUESTRA GLUCOSA EN AYUNAS</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado1" id="resultado1Actualizar" placeholder="Valor normal: 60 - 110 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="hora1" id="hora1Actualizar"></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>1h POST CARGA 75gr DE DEXTROSA</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado2" id="resultado2Actualizar" placeholder="Valor normal: Menor de 200 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="hora2" id="hora2Actualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>2h POST CARGA</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado3" id="resultado3Actualizar" placeholder="Valor normal: Menor de 140 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="hora3" id="hora3Actualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>3h POST CARGA</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado4" id="resultado4Actualizar" placeholder="Valor normal: 70 - 115 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="hora4" id="hora4Actualizar"></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding" colspan="2"><strong> Observaciones </strong><br><textarea name="observacionesTG" id="observacionesTGActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <input type="hidden" name="idToleranciaGlucosa" id="idToleranciaGlucosa">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaTole">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para actualizar examen inmunologia glucosa-->

    <!-- Modal para examen Toxoplasma-->
        <div class="modal fade" id="toxoplasmaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de tipeo sanguineo</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_toxoplasma" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding"><strong> Toxoplasma IgG</strong><br><input type="text" class="form-control menosHeight" name="iggToxoplasma" id="iggToxoplasmaA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Toxoplasma IgM </strong><br><input type="text" class="form-control menosHeight" name="igmToxoplasma" id="igmToxoplasmaA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesToxoplasma" id="observacionesToxoplasmaA" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>
 
                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idToxoplasma" id="idToxoplasma">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaTox">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen Toxoplasma-->

<!-- Fin modales para actualizar -->

<script>
    $(document).ready(function() {

        // Pivote para liberar examenes varios
            $("#pivoteExamen").click(function() {
                var valor = $('input:checkbox[name=examenes]:checked').val();
                if (valor == "examenes") {
                    $("#ocultarSelectVarios").hide();
                    $("#controlInteligente10").attr("required", false);
                    $("#detalleLibre").attr("required", true);
                    $("#detalleLibre").show();
                } else {
                    $("#detalleLibre").hide();
                    $("#ocultarSelectVarios").show();
                    $("#controlInteligente10").attr("required", true);
                    $("#detalleLibre").attr("required", false);
                }
            });
        // Pivote para liberar examenes varios
    });
</script>

<!-- Script para gestionar examenes -->
    <script>
        function actualizar(idExamen, pivote){
            var data = {
                idExamen: idExamen,
                pivote: pivote
            }
            $.ajax({
                url: "../../buscar_examen",
                type: "post",
                // data: {idExamen: idExamen },
                data: data,
                success:function(respuesta){
                    var registro = eval(respuesta);
                    console.log(registro);
                    if (registro.length > 0){
                        for (let i = 0; i < registro.length; i++) {
                            switch (pivote) {
                                case 1:
                                    $("#idInmunologia").val(registro[i]["idInmunologia"]);
                                    $("#idDetalleConsultaI").val(registro[i]["idDetalleConsulta"]);
                                    $("#inmunologiaSolicitadoA").val(registro[i]["examenSolicitado"]);
                                    $("#tificoOA").val(registro[i]["tificoO"]);
                                    $("#tificoHA").val(registro[i]["tificoH"]);
                                    $("#paratificoAA").val(registro[i]["paratificoA"]);
                                    $("#paratificoBA").val(registro[i]["paratificoB"]);
                                    $("#brucellaAbortusA").val(registro[i]["brucellaAbortus"]);
                                    $("#proteusOxA").val(registro[i]["proteusOx"]);
                                    $("#proteinaCA").val(registro[i]["proteinaC"]);
                                    $("#reumatoideoA").val(registro[i]["reumatoideo"]);
                                    $("#antiestreptolisinaA").val(registro[i]["antiestreptolisina"]);
                                    break;
                                case 2:
                                    $("#idBacteriologia").val(registro[i]["idBacteriologia"]);
                                    $("#idDetalleConsultaB").val(registro[i]["idDetalleConsulta"]);
                                    $("#bacteriologiaSolicitadoA").val(registro[i]["examenSolicitado"]);
                                    $("#resultadoDirectoA").val(registro[i]["resultadoDirecto"]);
                                    $("#procedenciaDirectoA").val(registro[i]["procedenciaCultivo"]);
                                    $("#resultadoCultivoA").val(registro[i]["resultadoCultivo"]);
                                    $("#cefiximeA").val(registro[i]["cefixime"]);
                                    $("#amikacinaA").val(registro[i]["amikacina"]);
                                    $("#levofloxacinaA").val(registro[i]["levofloxacina"]);
                                    $("#ceftriaxonaA").val(registro[i]["ceftriaxona"]);
                                    $("#azitromicinaA").val(registro[i]["azitromicina"]);
                                    $("#imipenemA").val(registro[i]["imipenem"]);
                                    $("#meropenemA").val(registro[i]["meropenem"]);
                                    $("#fosfocilA").val(registro[i]["fosfocil"]);
                                    $("#ciprofloxacinaA").val(registro[i]["ciprofloxacina"]);
                                    $("#penicilinaA").val(registro[i]["penicilina"]);
                                    $("#vancomicinaA").val(registro[i]["vancomicina"]);
                                    $("#acidoNalidixicoA").val(registro[i]["acidoNalidixico"]);
                                    $("#gentamicinaA").val(registro[i]["gentamicina"]);
                                    $("#nitrofurantoinaA").val(registro[i]["nitrofurantoina"]);
                                    $("#ceftazimideA").val(registro[i]["ceftazimide"]);
                                    $("#cefotaximeA").val(registro[i]["cefotaxime"]);
                                    $("#clindamicinaA").val(registro[i]["clindamicina"]);
                                    $("#trimetropimSulfaA").val(registro[i]["trimetropimSulfa"]);
                                    $("#ampicilinaA").val(registro[i]["ampicilina"]);
                                    $("#piperacilinaA").val(registro[i]["piperacilina"]);
                                    $("#amoxicilinaA").val(registro[i]["amoxicilina"]);
                                    $("#claritromicinaA").val(registro[i]["claritromicina"]);
                                    $("#cefuroximeA").val(registro[i]["cefuroxime"]);
                                    $("#observacionBacteriologiaA").val(registro[i]["observacionesCultivo"]);
                                    break;
                                case 3:
                                    $("#idCoagulacion").val(registro[i]["idCoagulacion"]);
                                    $("#idDetalleConsultaC").val(registro[i]["idDetalleConsulta"]);
                                    $("#coagulacionSolicitadoA").val(registro[i]["examenSolicitado"]); 
                                    $("#tiempoProtombinaA").val(registro[i]["tiempoProtombina"]); 
                                    $("#tiempoTromboplastinaA").val(registro[i]["tiempoTromboplastina"]); 
                                    $("#fibrinogenoA").val(registro[i]["fibrinogeno"]); 
                                    $("#inrA").val(registro[i]["inr"]); 
                                    $("#tiempoSangramientoA").val(registro[i]["tiempoSangramiento"]); 
                                    $("#tiempoCoagulacionA").val(registro[i]["tiempoCoagulacion"]); 
                                    $("#observacionCoagulacionA").val(registro[i]["observacion"]); 
                                break;
                                case 4:
                                    $("#idSanguineo").val(registro[i]["idSanguineo"]);
                                    $("#idDetalleConsultaS").val(registro[i]["idDetalleConsulta"]);
                                    $("#sanguineoSolicitadoA").val(registro[i]["examenSolicitado"]);
                                    $("#muestraSanguineoA").val(registro[i]["muestraSanguineo"]);
                                    $("#grupoSanguineoA").val(registro[i]["grupoSanguineo"]);
                                    $("#factorSanguineoA").val(registro[i]["factorSanguineo"]);
                                    $("#duSanguineoA").val(registro[i]["duSanguineo"]);
                                break;
                                case 5:
                                    $("#idQuimicaClinica").val(registro[i]["idQuimicaClinica"]);
                                    $("#idDetalleConsultaQC").val(registro[i]["idDetalleConsulta"]);
                                    $("#quimicaClinicaSolicitadoActualizar").val(registro[i]["examenSolicitado"]);
                                    $("#sodioQuimicaClinicaActualizar").val(registro[i]["sodioQuimicaClinica"]);
                                    $("#potasioQuimicaClinicaActualizar").val(registro[i]["potasioQuimicaClinica"]);
                                    $("#cloroQuimicaClinicaActualizar").val(registro[i]["cloroQuimicaClinica"]);
                                    $("#magnesioQuimicaClinicaActualizar").val(registro[i]["magnesioQuimicaClinica"]);
                                    $("#fosforoQuimicaClinicaActualizar").val(registro[i]["fosforoQuimicaClinica"]);
                                    $("#cpkTQuimicaClinicaActualizar").val(registro[i]["cpkTQuimicaClinica"]);
                                    $("#cpkMbQuimicaClinicaActualizar").val(registro[i]["cpkMbQuimicaClinica"]);
                                    $("#ldhQuimicaClinicaActualizar").val(registro[i]["ldhQuimicaClinica"]);
                                    $("#creatininaQuimicaClinicaActualizar").val(registro[i]["creatininaQuimicaClinica"]);
                                    $("#troponinaQuimicaClinicaActualizar").val(registro[i]["troponinaQuimicaClinica"]);
                                    $("#comentariosQuimicaClinicaActualizar").val(registro[i]["comentariosQuimicaClinica"]);
                                break;
                                case 6:
                                    $("#idQuimicaSanguinea").val(registro[i]["idQuimicaSanguinea"]);
                                    $("#idDetalleConsultaQS").val(registro[i]["idDetalleConsulta"]);
                                    $("#quimicaSanguineaSolicitadoActualizar").val(registro[i]["examenSolicitado"]);
                                    $("#glucosaActualizar").val(registro[i]["glucosaQS"]);
                                    $("#posprandialActualizar").val(registro[i]["posprandialQS"]);
                                    $("#colesterolActualizar").val(registro[i]["colesterolQS"]);
                                    $("#trigliceridosActualizar").val(registro[i]["trigliceridosQS"]);
                                    $("#colesterolHDLActualizar").val(registro[i]["colesterolHDLQS"]);
                                    $("#colesterolLDLActualizar").val(registro[i]["colesterolLDLQS"]);
                                    $("#acidoUricoActualizar").val(registro[i]["acidoUricoQS"]);
                                    $("#ureaActualizar").val(registro[i]["ureaQS"]);
                                    $("#nitrogenoUreicoActualizar").val(registro[i]["nitrogenoQS"]);
                                    $("#creatininaActualizar").val(registro[i]["creatininaQS"]);
                                    $("#amilasaActualizar").val(registro[i]["amilasaQS"]);
                                    $("#lipasaActualizar").val(registro[i]["lipasaQS"]);
                                    $("#fosfatasaAlcalinaActualizar").val(registro[i]["fosfatasaQS"]);
                                    $("#tgpActualizar").val(registro[i]["tgpQS"]);
                                    $("#tgoActualizar").val(registro[i]["tgoQS"]);
                                    $("#hba1cActualizar").val(registro[i]["hba1cQS"]);
                                    $("#proteinaTotalActualizar").val(registro[i]["proteinaTotalQS"]);
                                    $("#albuminaActualizar").val(registro[i]["albuminaQS"]);
                                    $("#globulinaActualizar").val(registro[i]["globulinaQS"]);
                                    $("#relacionAGActualizar").val(registro[i]["relacionAGQS"]);
                                    $("#biliTotalActualizar").val(registro[i]["bilirrubinaTQS"]);
                                    $("#biliDirectaActualizar").val(registro[i]["bilirrubinaDQS"]);
                                    $("#biliIndirectaActualizar").val(registro[i]["bilirrubinaIQS"]);
                                    $("#notaActualizar").val(registro[i]["notaQS"]);

                                    $("#sodioQuimicaClinicaActualizar").val(registro[i]["sodioQuimicaClinica"]);
                                    $("#potasioQuimicaClinicaActualizar").val(registro[i]["potasioQuimicaClinica"]);
                                    $("#cloroQuimicaClinicaActualizar").val(registro[i]["cloroQuimicaClinica"]);
                                    $("#magnesioQuimicaClinicaActualizar").val(registro[i]["magnesioQuimicaClinica"]);
                                    $("#calcioQuimicaClinicaActualizar").val(registro[i]["calcioQuimicaClinica"]);
                                    $("#fosforoQuimicaClinicaActualizar").val(registro[i]["fosforoQuimicaClinica"]);
                                    $("#cpkTQuimicaClinicaActualizar").val(registro[i]["cpkTQuimicaClinica"]);
                                    $("#cpkMbQuimicaClinicaActualizar").val(registro[i]["cpkMbQuimicaClinica"]);
                                    $("#ldhQuimicaClinicaActualizar").val(registro[i]["ldhQuimicaClinica"]);
                                    $("#creatininaQuimicaClinicaActualizar").val(registro[i]["creatininaQuimicaClinica"]);
                                    $("#troponinaQuimicaClinicaActualizar").val(registro[i]["troponinaQuimicaClinica"]);


                                break;
                                case 7:
                                    $("#idCropologia").val(registro[i]["idCropologia"]);
                                    $("#idDetalleConsultaCr").val(registro[i]["idDetalleConsulta"]);
                                    $("#cropologiaSolicitadoActualizar").val(registro[i]["examenSolicitado"]);
                                    $("#colorActualizar").val(registro[i]["colorCropologia"]);
                                    $("#consistenciaCropologiaActualizar").val(registro[i]["consistenciaCropologia"]);
                                    $("#mucusCropologiaActualizar").val(registro[i]["mucusCropologia"]);
                                    $("#hematiesCropologiaActualizar").val(registro[i]["hematiesCropologia"]);
                                    $("#leucocitosCropologiaActualizar").val(registro[i]["leucocitosCropologia"]);
                                    $("#ascarisCropologiaActualizar").val(registro[i]["ascarisCropologia"]);
                                    $("#hymenolepisCropologiaActualizar").val(registro[i]["hymenolepisCropologia"]);
                                    $("#uncinariasCropologiaActualizar").val(registro[i]["uncinariasCropologia"]);
                                    $("#tricocefalosCropologiaActualizar").val(registro[i]["tricocefalosCropologia"]);
                                    $("#larvaStrongyloidesActualizar").val(registro[i]["larvaStrongyloides"]);
                                    $("#histolyticaQuistesActualizar").val(registro[i]["histolyticaQuistes"]);
                                    $("#histolyticaTrofozoitosActualizar").val(registro[i]["histolyticaTrofozoitos"]);
                                    $("#coliQuistesActualizar").val(registro[i]["coliQuistes"]);
                                    $("#coliTrofozoitosActualizar").val(registro[i]["coliTrofozoitos"]);
                                    $("#giardiaQuistesActualizar").val(registro[i]["giardiaQuistes"]);
                                    $("#giardiaTrofozoitosActualizar").val(registro[i]["giardiaTrofozoitos"]);
                                    $("#blastocystisQuistesActualizar").val(registro[i]["blastocystisQuistes"]);
                                    $("#blastocystisTrofozoitosActualizar").val(registro[i]["blastocystisTrofozoitos"]);
                                    $("#tricomonasQuistesActualizar").val(registro[i]["tricomonasQuistes"]);
                                    $("#tricomonasTrofozoitosActualizar").val(registro[i]["tricomonasTrofozoitos"]);
                                    $("#mesnilliQuistesActualizar").val(registro[i]["mesnilliQuistes"]);
                                    $("#mesnilliTrofozoitosActualizar").val(registro[i]["mesnilliTrofozoitos"]);
                                    $("#nanaQuistesActualizar").val(registro[i]["nanaQuistes"]);
                                    $("#nanaTrofozoitosActualizar").val(registro[i]["nanaTrofozoitos"]);
                                    $("#restosMacroscopicosActualizar").val(registro[i]["restosMacroscopicos"]);
                                    $("#restosMicroscopicosActualizar").val(registro[i]["restosMicroscopicos"]);
                                    $("#observacionesCropologiaActualizar").val(registro[i]["observacionesCropologia"]);
                                break;
                                case 8:
                                    $("#idTiroideaLibre").val(registro[i]["idTiroideaLibre"]);
                                    $("#idDetalleConsultaTL").val(registro[i]["idDetalleConsulta"]);
                                    $("#tiroideaLibreSolicitadoActualizar").val(registro[i]["examenSolicitado"]);
                                    $("#muestraTiroideaLibreActualizar").val(registro[i]["muestraTiroideaLibre"]);
                                    $("#t3TiroideaLibreActualizar").val(registro[i]["t3TiroideaLibre"]);
                                    $("#t4TiroideaLibreActualizar").val(registro[i]["t4TiroideaLibre"]);
                                    $("#tshTiroideaLibreActualizar").val(registro[i]["tshTiroideaLibre"]);
                                    $("#tshTiroideaLibreUActualizar").val(registro[i]["tshTiroideaLibreU"]);
                                    $("#observacionTiroideaLibreActualizar").val(registro[i]["observacionTiroideaLibre"]); 
                                break;
                                case 9:
                                    $("#idTiroideaTotal").val(registro[i]["idTiroideaTotal"]);
                                    $("#idDetalleConsultaTT").val(registro[i]["idDetalleConsulta"]);
                                    $("#tiroideaTotalActualizar").val(registro[i]["examenSolicitado"]);
                                    $("#muestraTiroideaTotalActualizar").val(registro[i]["muestraTiroideaTotal"]);
                                    $("#t3TiroideaTotalActualizar").val(registro[i]["t3TiroideaTotal"]);
                                    $("#t4TiroideaTotalActualizar").val(registro[i]["t4TiroideaTotal"]);
                                    $("#tshTiroideaTotalActualizar").val(registro[i]["tshTiroideaTotal"]);
                                    $("#observacionTiroideaTotalActualizar").val(registro[i]["observacionTiroideaTotal"]);
                                    break;
                                case 10:
                                    $("#idVarios").val(registro[i]["idVarios"]);
                                    $("#idDetalleConsultaV").val(registro[i]["idDetalleConsulta"]);
                                    $("#variosSolicitadoActualizar").val(registro[i]["examenSolicitado"]);
                                    $("#muestraVariosActualizar").val(registro[i]["muestraVarios"]);
                                    $("#resultadoActualizar").val(registro[i]["resultadoVarios"]);
                                    $("#valorNormalVariosActualizar").val(registro[i]["valorNormalVarios"]);
                                    $("#observacionesVariosActualizar").val(registro[i]["observacionesVarios"]);
                                break;
                                case 11:
                                    $("#idAntigenoProstatico").val(registro[i]["idAntigenoProstatico"]);
                                    $("#idDetalleConsultaPSA").val(registro[i]["idDetalleConsulta"]);
                                    $("#solicitadoAPActualizar").val(registro[i]["examenSolicitado"]);
                                    $("#muestraAPActualizar").val(registro[i]["muestraAntigenoProstatico"]);
                                    $("#resultadoAPActualizar").val(registro[i]["resultadoAntigenoProstatico"]);
                                    $("#observacionAPActualizar").val(registro[i]["observacionAntigenoProstatico"]);
                                break;
                                case 12:
                                    $("#idHematologia").val(registro[i]["idHematologia"]);
                                    $("#idDetalleConsultaH").val(registro[i]["idDetalleConsulta"]);
                                    $("#hematologiaSolicitadoActualizar").val(registro[i]["examenSolicitado"]);
                                    $("#eritrocitosHematologiaActualizar").val(registro[i]["eritrocitosHematologia"]);
                                    $("#hematocritoHematologiaActualizar").val(registro[i]["hematocritoHematologia"]);
                                    $("#hemoglobinaHematologiaActualizar").val(registro[i]["hemoglobinaHematologia"]);
                                    $("#vgmHematologiaActualizar").val(registro[i]["vgmHematologia"]);
                                    $("#hgmHematologiaActualizar").val(registro[i]["hgmHematologia"]);
                                    $("#chgmHematologiaActualizar").val(registro[i]["chgmHematologia"]);
                                    $("#leucocitosHematologiaActualizar").val(registro[i]["leucocitosHematologia"]);
                                    $("#neutrofHematologiaActualizar").val(registro[i]["neutrofHematologia"]);
                                    $("#neutrofBandHematologiaActualizar").val(registro[i]["neutrofBandHematologia"]);
                                    $("#linfocitosHematologiaActualizar").val(registro[i]["linfocitosHematologia"]);
                                    $("#eosinofilosHematologiaActualizar").val(registro[i]["eosinofilosHematologia"]);
                                    $("#monocitosHematologiaActualizar").val(registro[i]["monocitosHematologia"]);
                                    $("#basofilosHematologiaActualizar").val(registro[i]["basofilosHematologia"]);
                                    $("#blastosHematologiaActualizar").val(registro[i]["blastosHematologia"]);
                                    $("#reticulocitosHematologiaActualizar").val(registro[i]["reticulocitosHematologia"]);
                                    $("#eritrosedHematologiaActualizar").val(registro[i]["eritrosedHematologia"]);
                                    $("#plaquetasHematologiaActualizar").val(registro[i]["plaquetasHematologia"]);
                                    $("#gotaGruesaHematologiaActualizar").val(registro[i]["gotaGruesaHematologia"]);
                                    $("#rojaHematologiaActualizar").val(registro[i]["rojaHematologia"]);
                                    $("#blancaHematologiaActualizar").val(registro[i]["blancaHematologia"]);
                                    $("#plaquetariaHematologiaActualizar").val(registro[i]["plaquetariaHematologia"]);
                                    $("#observacionesHematologiaActualizar").val(registro[i]["observacionesHematologia"]);
                                break;
                                case 13:
                                    $("#idOrina").val(registro[i]["idOrina"]);
                                    $("#idDetalleConsultaO").val(registro[i]["idDetalleConsulta"]);
                                    $("#colorOrinaU").val(registro[i]["colorOrina"]);
                                    $("#aspectoOrinaU").val(registro[i]["aspectoOrina"]);
                                    $("#reaccionOrinaU").val(registro[i]["reaccionOrina"]);
                                    $("#densidadOrinaU").val(registro[i]["densidadOrina"]);
                                    $("#phOrinaU").val(registro[i]["phOrina"]);
                                    $("#proteinasOrinaU").val(registro[i]["proteinasOrina"]);
                                    $("#glucosaOrinaU").val(registro[i]["glucosaOrina"]);
                                    $("#pigBilaOrinaU").val(registro[i]["pigBilaOrina"]);
                                    $("#sangreOcultaOrinaU").val(registro[i]["sangreOcultaOrina"]);
                                    $("#nitritoOrinaU").val(registro[i]["nitritoOrina"]);
                                    $("#cuerposCetonicosOrinaU").val(registro[i]["cuerposCetonicosOrina"]);
                                    $("#acidosBilOrinaU").val(registro[i]["acidosBilOrina"]);
                                    $("#granulososOrinaU").val(registro[i]["granulososOrina"]);
                                    $("#cilindrosLeuOrinaU").val(registro[i]["cilindrosLeuOrina"]);
                                    $("#cilindrosOrinaU").val(registro[i]["cilindrosOrina"]);
                                    $("#oCilindrosOrinaU").val(registro[i]["oCilindrosOrina"]);
                                    $("#leucocitosOrinaU").val(registro[i]["leucocitosOrina"]);
                                    $("#hematiesOrinaU").val(registro[i]["hematiesOrina"]);
                                    $("#celulasEpitelialesOrinaU").val(registro[i]["celulasEpitelialesOrina"]);
                                    $("#elemMineralesOrinaU").val(registro[i]["elemMineralesOrina"]);
                                    $("#bacteriasOrinaU").val(registro[i]["bacteriasOrina"]);
                                    $("#levaduraOrinaU").val(registro[i]["levaduraOrina"]);
                                    $("#otrosOrinaU").val(registro[i]["otrosOrina"]);
                                    $("#observacionesOrinaO").val(registro[i]["observacionesOrina"]);

                                break;
                                case 14:
                                    $("#idHisopadoNasal").val(registro[i]["idHisopadoNasal"]);
                                    $("#idDetalleConsultaHN").val(registro[i]["idDetalleConsulta"]);
                                    $("#fechaCovidActualizar").val(registro[i]["horaDetalleConsulta"].substr(0,10));
                                    $("#horaCovidActualizar").val(registro[i]["horaDetalleConsulta"].substr(11,19));
                                    $("#pasaporteCovidActualizar").val(registro[i]["pasaporteHisopadoNasal"]);
                                    $("#observacionesHisopadoActualizar").val(registro[i]["resultadoHisopadoNasal"]);

                                break;
                                case 15:
                                    $("#idEspermograma").val(registro[i]["idEspermograma"]);
                                    $("#idDetalleConsultaEsp").val(registro[i]["idDetalleConsulta"]);

                                    $("#espermogramaSolicitadoActualizar").val(registro[i]["examenSolicitado"]);
                                    $("#colorExpermaActualizar").val(registro[i]["colorEspermograma"]);
                                    $("#phEspermaActualizar").val(registro[i]["phEspermograma"]);
                                    $("#volumenEspermaActualizar").val(registro[i]["volumenEspermograma"]);
                                    $("#licuefaccionEspermaActualizar").val(registro[i]["licuefaccionEspermograma"]);
                                    $("#viscocidadEspermaActualizar").val(registro[i]["viscocidadEspermograma"]);
                                    $("#abstinenciaEspermaActualizar").val(registro[i]["abstinenciaEspermograma"]);
                                    $("#hematiesEspermaActualizar").val(registro[i]["hematiesEspermograma"]);
                                    $("#leucocitosEspermaActualizar").val(registro[i]["leucocitosEspermograma"]);
                                    $("#epitelialesEspermaActualizar").val(registro[i]["epitelialesEspermograma"]);
                                    $("#bacteriasEspermaActualizar").val(registro[i]["bacteriasEspermograma"]);
                                    $("#mprEspermaActualizar").val(registro[i]["mprEspermograma"]);
                                    $("#mplEspermaActualizar").val(registro[i]["mplEspermograma"]);
                                    $("#mnpEspermaActualizar").val(registro[i]["mnpEspermograma"]);
                                    $("#inmovilesEspermaActualizar").val(registro[i]["inmovilesEspermograma"]);
                                    $("#recuentoEspermaActualizar").val(registro[i]["recuentoEspermograma"]);
                                    $("#normalesEspermaActualizar").val(registro[i]["normalesEspermograma"]);
                                    $("#anormalCbEspermaActualizar").val(registro[i]["anormalCbEspermograma"]);
                                    $("#anormalClEspermaActualizar").val(registro[i]["anormalClEspermograma"]);
                                    $("#vivosEspermaActualizar").val(registro[i]["vivosEspermograma"]);
                                    $("#muertosEspermaActualizar").val(registro[i]["muertosEspermograma"]);
                                    $("#observacionesEspermaActualizar").val(registro[i]["observacionesEspermograma"]);


                                break;
                                case 16:
                                    $("#idCreatinina").val(registro[i]["idDepuracion"]);
                                    $("#idDetalleConsultaCrea").val(registro[i]["idDetalleConsulta"]);

                                    $("#sexoCreatininaActualizar").val(registro[i]["sexoDepuracion"]);
                                    $("#edadCreatininaActualizar").val(registro[i]["edadDepuracion"]);
                                    $("#volumenCreatininaActualizar").val(registro[i]["volumenDepuracion"]);
                                    $("#tiempoCreatininaActualizar").val(registro[i]["tiempoDepuracion"]);
                                    $("#sangreCreatininaActualizar").val(registro[i]["csDepuracion"]);
                                    $("#orinaCreatininaActualizar").val(registro[i]["coDepuracion"]);
                                    $("#depuracionCreatininaActualizar").val(registro[i]["dcDepuracion"]);
                                    $("#valorNormalDepuracionActualizar").val(registro[i]["valorNormal"]);
                                    $("#proteinasCreatininaActualizar").val(registro[i]["proteinasDepuracion"]);
                                    $("#observacionesCreatininaActualizar").val(registro[i]["observacionesDepuracion"]);
                                break;
                                case 17:
                                    $("#idGasesArteriales").val(registro[i]["idGasesArteriales"]);
                                    $("#idDetalleConsultaArte").val(registro[i]["idDetalleConsulta"]);

                                    $("#muestraArterialesActualizar").val(registro[i]["muestraGasesArteriales"]);
                                    $("#phArterialesActualizar").val(registro[i]["phGasesArteriales"]);
                                    $("#pco2ArterialesActualizar").val(registro[i]["pco2GasesArteriales"]);
                                    $("#po2ArterialesActualizar").val(registro[i]["po2GasesArteriales"]);
                                    $("#naArterialesActualizar").val(registro[i]["naGasesArteriales"]);
                                    $("#kArterialesActualizar").val(registro[i]["kGasesArteriales"]);
                                    $("#caArterialesActualizar").val(registro[i]["caGasesArteriales"]);
                                    $("#thbArterialesActualizar").val(registro[i]["tbhGasesArteriales"]);
                                    $("#soArterialesActualizar").val(registro[i]["soGasesArteriales"]);
                                    $("#fio2ArterialesActualizar").val(registro[i]["fioGasesArteriales"]);
                                break;

                                case 18:
                                    $("#idToleranciaGlucosa").val(registro[i]["idToleranciaGlucosa"]);
                                    $("#idDetalleConsultaTole").val(registro[i]["idDetalleConsulta"]);
                                    
                                    $("#resultado1Actualizar").val(registro[i]["resultado1ToleranciaGlucosa"]);
                                    $("#hora1Actualizar").val(registro[i]["hora1ToleranciaGlucosa"]);
                                    $("#resultado2Actualizar").val(registro[i]["resultado2ToleranciaGlucosa"]);
                                    $("#hora2Actualizar").val(registro[i]["hora2ToleranciaGlucosa"]);
                                    $("#resultado3Actualizar").val(registro[i]["resultado3ToleranciaGlucosa"]);
                                    $("#hora3Actualizar").val(registro[i]["hora3ToleranciaGlucosa"]);
                                    $("#resultado4Actualizar").val(registro[i]["resultado4ToleranciaGlucosa"]);
                                    $("#hora4Actualizar").val(registro[i]["hora4ToleranciaGlucosa"]);
                                    $("#observacionesTGActualizar").val(registro[i]["observacionToleranciaGlucosa"]);

                                break;

                                case 19:
                                    $("#idToxoplasma").val(registro[i]["idToxoplasma"]);
                                    $("#idDetalleConsultaTox").val(registro[i]["idDetalleConsulta"]);
                                    
                                    $("#iggToxoplasmaA").val(registro[i]["iggToxoplasma"]);
                                    $("#igmToxoplasmaA").val(registro[i]["igmToxoplasma"]);
                                    $("#observacionesToxoplasmaA").val(registro[i]["observacionesToxoplasma"]);
                                    
                                break;

                                default:
                                    break;
                            }
                        }
                    }
                }
            });

        }
        

        function eliminar(idExamen, exam, idDC){
            console.log(idExamen, exam, idDC);
            $("#idExamen").val(idExamen);
            $("#tipoExamen").val(exam);
            $("#idDC").val(idDC);
        }
        
        /* $(document).on('click', '.close', function(event) {
            event.preventDefault();
            location.reload();
        }); */
    </script>
<!-- Fin gestion de examenes -->

<script>
    $(document).ready(function(){
        $(".cerrarVarios").click(function() {
            location.reload();
        });

        $(".frmData").keypress(function(e) {
            if (e.which == 13) {
                return false;
            }
        });
    });

    $(document).on('change', '.calculoCreatinina', function() {
        
        var volumen = $("#volumenCreatinina").val();
        var tiempo = $("#tiempoCreatinina").val();
        var sangre = $("#sangreCreatinina").val();
        var orina = $("#orinaCreatinina").val();
        
        //Calculo de el valor de la creatinina
            var creatinina = (orina*volumen) / (sangre*tiempo);
            if (isNaN(creatinina)) {
                $("#depuracionCreatinina").val("0");
            }else{
                $("#depuracionCreatinina").val(creatinina.toFixed(2));
            }
        //Calculo de el valor de la creatinina

    })

    $(document).on("change", ".valorNormal", function() {
        // Calcumo de valor normal
            var sexo = $("#sexoCreatinina").val();
            var edad = $("#edadCreatinina").val();

            
            switch (true) {
                case edad > 0 && edad <= 15:
                    if(sexo == "M"){
                        $("#valorNormalDepuracion").val("40-95 ml/min");
                    }else{
                        $("#valorNormalDepuracion").val("43-97 ml/min");
                    }
                    break;
                case edad > 15 && edad <= 30:
                    if(sexo == "M"){
                        $("#valorNormalDepuracion").val("50-156 ml/min");
                    }else{
                        $("#valorNormalDepuracion").val("74-133 ml/min");
                    }
                    break;
                case edad > 30 && edad <= 40:
                    if(sexo == "M"){
                        $("#valorNormalDepuracion").val("20-175 ml/min");
                    }else{
                        $("#valorNormalDepuracion").val("53-153 ml/min");
                    }
                    break;
                case edad > 40 && edad <= 50:
                    if(sexo == "M"){
                        $("#valorNormalDepuracion").val("45-132 ml/min");
                    }else{
                        $("#valorNormalDepuracion").val("29-133 ml/min");
                    }
                    break;
                case edad > 50 && edad <= 60:
                    if(sexo == "M"){
                        $("#valorNormalDepuracion").val("40-123 ml/min");
                    }else{
                        $("#valorNormalDepuracion").val("25-122 ml/min");
                    }
                    break;
                case edad > 60 && edad <= 70:
                    if(sexo == "M"){
                        $("#valorNormalDepuracion").val("25-116 ml/min");
                    }else{
                        $("#valorNormalDepuracion").val("35-93 ml/min");
                    }
                    break;
                case edad > 70 && edad <= 80:
                    if(sexo == "M"){
                        $("#valorNormalDepuracion").val("35-95 ml/min");
                    }else{
                        $("#valorNormalDepuracion").val("30-75 ml/min");
                    }
                    break;
                case edad > 80 && edad <= 90:
                    if(sexo == "M"){
                        $("#valorNormalDepuracion").val("18-76 ml/min");
                    }else{
                        $("#valorNormalDepuracion").val("19-75 ml/min");
                    }
                    break;
                case edad > 90 && edad <= 100:
                    if(sexo == "M"){
                        $("#valorNormalDepuracion").val("15-50 ml/min");
                    }else{
                        $("#valorNormalDepuracion").val("24-55 ml/min");
                    }
                    break;
            
                default:
                    $("#valorNormalDepuracion").val("");
                    break;
            }
        //Fin calculo valor normal
    });
</script>

<script>
    /* $('#tLibre').click(function(e) {
        e.preventDefault();
        // Coding
        window.print();
        $('#tiroideasLibres').modal('hide'); //or  $('#IDModal').modal('hide');
        //$('#tiroideasLibres').reset();
        return false;
    }); */
</script>