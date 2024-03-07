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
                    <li class="breadcrumb-item"><a href="#">Detalle paciente</a></li>
                </ol>
            </nav>

			<div class="ms-panel">
				<div class="ms-panel-body">
                    <div class="alert-primary p-1 bordeContenedor">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Nombre: </strong></td>
                                <td><?php echo $paciente->nombrePaciente; ?></td>
                                <td><strong>Edad: </strong></td>
                                <td><?php echo $paciente->edadPaciente; ?> Años</td>
                                <td><strong>Teléfono: </strong></td>
                                <td><?php echo $paciente->telefonoPaciente; ?></td>
                            </tr>

                            <tr>
                                <td><strong>DUI: </strong></td>
                                <td><?php echo $paciente->duiPaciente; ?></td>
                                <td><strong>Fecha de nacimiento: </strong></td>
                                <td><?php echo $paciente->nacimientoPaciente; ?></td>
                                <td><strong>Dirección: </strong></td>
                                <td><?php echo $paciente->direccionPaciente; ?></td>
                            </tr>
                        </table>
                    </div>

                    <!-- Tabs -->
                        <div class="ms-panel ms-panel-fh mt-3">
                            <div class="ms-panel-body clearfix">
                                <ul class="nav nav-tabs tabs-bordered left-tabs nav-justified" role="tablist" aria-orientation="vertical">
                                    <li role="presentation"><a href="#consultas_h" aria-controls="consultas_h" class="active show" role="tab" data-toggle="tab" aria-selected="true"> Consultas </a></li>
                                    <li role="presentation"><a href="#laboratorio_h" aria-controls="laboratorio_h" role="tab" data-toggle="tab" class="" aria-selected="false"> Laboratorio </a></li>
                                    <li role="presentation"><a href="#cobros_h" aria-controls="cobros_h" role="tab" data-toggle="tab" class="" aria-selected="false"> Cobros </a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active show" id="consultas_h">
                                        <!-- Bloque para listar consultas -->
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <?php
                                                        if(sizeof($consultas) > 0){
                                                    ?>
                                                        <div class="table-responsive">
                                                            <h6 class="text-center mt-3">Historial de consultas</h6>
                                                            <table id="tabla-pacientes" class="table table-striped thead-primary w-100">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col" class="text-center">#</th>
                                                                        <th scope="col" class="text-center">Fecha</th>
                                                                        <th scope="col" class="text-center">Peso</th>
                                                                        <th scope="col" class="text-center">Altura</th>
                                                                        <th scope="col" class="text-center">IMC</th>
                                                                        <th scope="col" class="text-center">Hora</th>
                                                                        <th scope="col" class="text-center">Opción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        $index = 0;
                                                                        foreach ($consultas as $row) {
                                                                            $index++;
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center"><?php echo $index; ?></td>
                                                                        <td class="text-center"><?php echo $row->fechaConsulta; ?></td>
                                                                        <td class="text-center"><?php echo $row->peso; ?></td>
                                                                        <td class="text-center"><?php echo $row->altura; ?></td>
                                                                        <td class="text-center"><?php echo $row->imc; ?></td>
                                                                        <td class="text-center"><?php echo date("h:i:s A", strtotime($row->hora)); ?></td>
                                                                        <td class="text-center">
                                                                            <!-- <a href="<?php echo base_url(); ?>Laboratorio/detalle_consulta_historial/<?php echo $row->idConsultaLaboratorio; ?>/" target="_blank" title="Ver detalle de examenes" class="text-info" target="blank"><i class="fas fa-file-pdf"></i></a> -->
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    <?php
                                                        }else{
                                                            echo '<div class="alert alert-danger">
                                                                    <h6 class="text-center"><strong>No hay expedientes que mostrar.</strong></h6>
                                                                </div>';
                                                        }
                                                    ?>
                                                </div>   
                                            </div>
                                        <!-- Fin bloque para listar consultas -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="laboratorio_h">
                                        <!-- Bloque para listar examenes de laboratorio -->
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <?php
                                                        if(sizeof($laboratorio) > 0){
                                                    ?>
                                                        <div class="table-responsive">
                                                            <h6 class="text-center mt-3">Lista de examenes de laboratorio realizados a este paciente</h6>
                                                            <table id="tabla-pacientes" class="table table-striped thead-primary w-100">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col" class="text-center">#</th>
                                                                        <th scope="col" class="text-center">Fecha</th>
                                                                        <th scope="col" class="text-center">Hora</th>
                                                                        <th scope="col" class="text-center">Opción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        $index = 0;
                                                                        foreach ($laboratorio as $row) {
                                                                            $index++;
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center"><?php echo $index; ?></td>
                                                                        <td class="text-center"><?php echo $row->fecha; ?></td>
                                                                        <td class="text-center"><?php echo date("h:i:s A", strtotime($row->hora)); ?></td>
                                                                        <td class="text-center">
                                                                            <a href="<?php echo base_url(); ?>Laboratorio/detalle_consulta_historial/<?php echo $row->idConsultaLaboratorio; ?>/" target="_blank" title="Ver detalle de examenes" class="text-info" target="blank"><i class="fas fa-file-pdf"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    <?php
                                                        }else{
                                                            echo '<div class="alert alert-danger">
                                                                    <h6 class="text-center"><strong>No hay expedientes que mostrar.</strong></h6>
                                                                </div>';
                                                        }
                                                    ?>
                                                </div>   
                                            </div>
                                        <!-- Fin bloque para listar examenes de laboratorio -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="cobros_h">
                                        <!-- Bloque para listar los expedientes -->
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <?php
                                                        if(sizeof($expedientes) > 0){
                                                    ?>
                                                        <div class="table-responsive">
                                                            <h6 class="text-center mt-3">Lista de cobros realizados a este paciente</h6>
                                                            <table id="tabla-pacientes" class="table table-striped thead-primary w-100">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col" class="text-center">Código</th>
                                                                        <th scope="col" class="text-center">Médico</th>
                                                                        <th scope="col" class="text-center">Fecha</th>
                                                                        <th scope="col" class="text-center">Opción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        foreach ($expedientes as $expediente) {
                                                                    ?>
                                                                    <tr>
                                                                        <td class="text-center"><?php echo $expediente->codigoHoja; ?></td>
                                                                        <td class="text-center"><?php echo $expediente->nombreMedico; ?></td>
                                                                        <td class="text-center"><?php echo $expediente->fechaHoja; ?></td>
                                                                        <td class="text-center">
                                                                            <!-- <a href="<?php echo base_url(); ?>Hoja/detalle_hoja/<?php echo $expediente->idHoja; ?>/" target="_blank" title="Ver hoja de cobro" class="text-info" target="blank"><i class="fas fa-file"></i></a> -->
                                                                            <a href="<?php echo base_url(); ?>Hoja/resumen_hoja/<?php echo $expediente->idHoja; ?>/" target="_blank" title="Ver resumen de hoja de cobro" class="text-info" target="blank"><i class="fas fa-file-pdf"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    <?php
                                                        }else{
                                                            echo '<div class="alert alert-danger">
                                                                    <h6 class="text-center"><strong>No hay expedientes que mostrar.</strong></h6>
                                                                </div>';
                                                        }
                                                    ?>
                                                </div>   
                                            </div>
                                        <!-- Fin bloque para listar los expedientes -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Tabs -->

                    

                    <!-- Parte para mostrar el detalle de Ingresos y Ambulatorios -->

				</div>
            </div>
		</div>
	</div>
</div>
