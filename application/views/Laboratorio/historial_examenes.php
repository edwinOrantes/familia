<?php if($this->session->flashdata("exito")):?>
  <script type="text/javascript">
    $(document).ready(function(){
	toastr.remove();
    toastr.options.positionClass = "toast-top-center";
	toastr.success('<?php echo $this->session->flashdata("exito")?>', 'Aviso!');
    });
  </script>
<?php endif; ?>

<?php if($this->session->flashdata("error")):?>
  <script type="text/javascript">
    $(document).ready(function(){
	toastr.remove();
    toastr.options.positionClass = "toast-top-center";
	toastr.error('<?php echo $this->session->flashdata("error")?>', 'Aviso!');
    });
  </script>
<?php endif; ?>

<div class="ms-content-wrapper">
	<div class="row">
		<div class="col-md-12">

			<nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"> <a href="#"><i class="fa fa-users"></i> Pacientes</a> </li>
                    <li class="breadcrumb-item"><a href="#">Exámenes realizados</a></li>
                </ol>
            </nav>
            
				<div class="ms-panel-body">
                    <div class="row">
                        <div class="col-md-12 mt-1">
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
                                                            
                                                        break;
                                                        case '2':
                                                                echo '<a href="'.base_url().'Laboratorio/bacteriologia_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';

                                                        case '3':
                                                            echo '<a href="'.base_url().'Laboratorio/coagulacion_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;

                                                        case '4':
                                                            echo '<a href="'.base_url().'Laboratorio/sanguineo_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;

                                                        case '5':
                                                            echo '<a href="'.base_url().'Laboratorio/quimica_clinica_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;

                                                        case '6':
                                                            echo '<a href="'.base_url().'Laboratorio/quimica_sanguinea_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;

                                                        case '7':
                                                            echo '<a href="'.base_url().'Laboratorio/cropologia_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;

                                                        case '8':
                                                            echo '<a href="'.base_url().'Laboratorio/tiroidea_libre_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';
                                                            echo '<a href="'.base_url().'Laboratorio/tiroidea_libre_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                            echo "<a href='#tiroideaLibreActualizar' data-toggle='modal' onclick='actualizar($idExamen, 8)' ><i class='fas fa-edit ms-text-success'></i></a>";
                                                            // echo "<a href='#eliminarExamen' onclick='eliminar($idExamen, $exam, $idDC)' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                                        break;

                                                        case '9':
                                                            echo '<a href="'.base_url().'Laboratorio/tiroidea_total_pdf_b/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-black"></i></a>';
                                                        break;
                                                    
                                                        case '10':
                                                            echo '<a href="'.base_url().'Laboratorio/varios_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;
                                                        
                                                        case '11':
                                                            echo '<a href="'.base_url().'Laboratorio/psa_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;
                                                        case '12':
                                                            echo '<a href="'.base_url().'Laboratorio/hematologia_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;
                                                        case '13':
                                                            echo '<a href="'.base_url().'Laboratorio/orina_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;
                                                        case '14':
                                                            echo '<a href="'.base_url().'Laboratorio/hisopado_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;

                                                        case '15':
                                                            echo '<a href="'.base_url().'Laboratorio/espermograma_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;

                                                        case '16':
                                                            echo '<a href="'.base_url().'Laboratorio/creatinina_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;

                                                        case '17':
                                                            echo '<a href="'.base_url().'Laboratorio/gases_arteriales_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;

                                                        case '18':
                                                            echo '<a href="'.base_url().'Laboratorio/tolerancia_glucosa_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;

                                                        case '19':
                                                            echo '<a href="'.base_url().'Laboratorio/toxoplasma_pdf/'.$examen->idExamen.'/" target="_blank"><i class="fa fa-print ms-text-primary"></i></a>';
                                                        break;
                                                        
                                                        default:
                                                            # code...
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

                    </div>
				</div>
            </div>
		</div>
	</div>
</div>
