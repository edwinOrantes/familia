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
<style>
    .ms-panel-body, .ms-panel-footer {
    position: relative;
    padding: 0.5rem;
    }
    .agregarConsulta{
        display: none;
    }
    .card-gradient-info{
        background: rgb(25,119,248) !important;
        background: radial-gradient(circle, rgba(25,119,248,1) 0%, rgba(4,75,217,1) 100%) !important; 

    }

    .card-gradient-success{
        background: rgb(150,205,0) !important;
        background: radial-gradient(circle, rgba(150,205,0,1) 0%, rgba(128,186,17,1) 100%) !important; 
    }

    .card-gradient-warning{
         background: rgb(254,181,15) !important;
        background: radial-gradient(circle, rgba(254,181,15,1) 0%, rgba(249,156,82,1) 100%) !important; 
    }

    .card-gradient-danger{
         background: rgb(242,72,48) !important;
        background: radial-gradient(circle, rgba(242,72,48,1) 0%, rgba(249,17,12,1) 100%) !important; 
    }
</style>
<div class="ms-content-wrapper">
	<div class="row">
		<div class="col-md-12">

			<div class="ms-panel">
				<div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-6"><h6>Hoja de cobro</h6></div>
                        <div class="col-md-6 text-right">
                        <a class="btn btn-success btn-sm" href="<?php echo base_url()?>Paciente/agregar_pacientes"><i class="fa fa-arrow-left"></i> Volver </a>
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url()?>Hoja/detalle_hoja/<?php echo $hoja; ?>/"><i class="fa fa-file"></i> Terminar </a>
                        </div>
                    </div>
				</div>
			
            
				<div class="ms-panel-body">
                    <div class="alert-primary p-1 bordeContenedor">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Nombre: </strong></td>
                                <td>
                                    <?php echo $paciente->nombrePaciente; ?> 
                                    <input type="hidden" value="<?php echo $paciente->nombrePaciente; ?>" id="nombrePaciente">
                                    <input type="hidden" value="<?php echo $paciente->idPaciente; ?>" id="idPaciente">
                                </td>
                                <td><strong>Edad: </strong></td>
                                <td><?php echo $paciente->edadPaciente; ?> Años</td>
                                <td><strong>Teléfono: </strong></td>
                                <td><?php echo $paciente->telefonoPaciente; ?></td>
                                <td><strong>DUI: </strong></td>
                                <td><?php echo $paciente->duiPaciente; ?></td>
                            </tr>

                        </table>
                    </div>

                    <div class="row mt-5">
                        <!-- <br>
                            <table class="table table-borderless">
                                <tr class="text-center">
                                    
                                    <th class="text-right"><a href="#consultaMedica" data-toggle="modal" class="btn btn-primary btn-sm">Consulta médica</a></th>
                                    <th class="text-left"><a href="#examenes" data-toggle="modal" class="btn btn-primary btn-sm">Exámenes</a></th>
                                </tr>
                            </table>
                        <br> -->
                        
                        <div class="col-md-4">
                            <a href="#consultaMedica" data-toggle="modal" >
                                <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
                                    <div class="ms-card-body media">
                                        <div class="media-body">
                                            <h6>&nbsp;</h6>
                                            <p class="ms-card-change text-center"> CONSULTA MÉDICA </p>
                                            <p class="fs-12">&nbsp;</p>
                                        </div>
                                    </div>
                                    <!-- <i class="fas fa-stethoscope"></i> -->
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="#examenesLaboratorio" data-toggle="modal">
                                <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
                                    <div class="ms-card-body media">
                                        <div class="media-body">
                                            <h6>&nbsp;</h6>
                                            <p class="ms-card-change text-center"> LABORATORIO </p>
                                            <p class="fs-12">&nbsp;</p>
                                        </div>
                                    </div>
                                    <!-- <i class="flaticon-stats"></i> -->
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="#medicamentos" data-toggle="modal">
                                <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
                                    <div class="ms-card-body media">
                                        <div class="media-body">
                                            <h6>&nbsp;</h6>
                                            <p class="ms-card-change text-center"> MEDICAMENTOS </p>
                                            <p class="fs-12">&nbsp;</p>
                                        </div>
                                    </div>
                                    <!-- <i class="flaticon-user"></i> -->
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="#rayosx" data-toggle="modal">
                                <div class="ms-card card-gradient-info ms-widget ms-infographics-widget">
                                    <div class="ms-card-body media">
                                        <div class="media-body">
                                            <h6>&nbsp;</h6>
                                            <p class="ms-card-change text-center"> RAYOS X </p>
                                            <p class="fs-12">&nbsp;</p>
                                        </div>
                                    </div>
                                    <!-- <i class="fas fa-x-ray"></i> -->
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="#ultrasonografia" data-toggle="modal">
                                <div class="ms-card card-gradient-info ms-widget ms-infographics-widget">
                                    <div class="ms-card-body media">
                                        <div class="media-body">
                                            <h6>&nbsp;</h6>
                                            <p class="ms-card-change text-center"> ULTRASONOGRAFIA </p>
                                            <p class="fs-12">&nbsp;</p>
                                        </div>
                                    </div>
                                    <!-- <i class="flaticon-stats"></i> -->
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="#otrosServicios" data-toggle="modal">
                                <div class="ms-card card-gradient-info ms-widget ms-infographics-widget">
                                    <div class="ms-card-body media">
                                        <div class="media-body">
                                            <h6>&nbsp;</h6>
                                            <p class="ms-card-change text-center"> OTROS SERVICIOS </p>
                                            <p class="fs-12">&nbsp;</p>
                                        </div>
                                    </div>
                                    <!-- <i class="flaticon-user"></i> -->
                                </div>
                            </a>
                        </div>


                        <?php
                            if(sizeof($detalleHoja) > 0){
                        ?>
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Motivo</th>
                                        <th>Precio</th>
                                    </tr>
                        <?php
                            $index = 0;
                            $total = 0;
                            foreach ($detalleHoja as $row) {
                                $index++;
                                $total += $row->precioInsumo;
                        ?>
                                    <tr>
                                        <td><?php echo $index; ?></td>
                                        <td><?php echo $row->nombreMedicamento; ?></td>
                                        <td>$<?php echo $row->precioInsumo; ?></td>
                                    </tr>
                        <?php
                            }
                        ?>
                                    <tr>
                                        <td colspan="2"><strong>TOTAL</strong></td>
                                        <td><strong>$<?php echo $total; ?></strong></td>
                                    </tr>
                                </table>
                            </div>
                        <?php
                            }
                        ?>


                        <input type="hidden" id="idHoja" value="<?php echo $hoja; ?>">
                    </div>
				</div>
            </div>
		</div>
	</div>
</div>

<!-- Modal para agregar consultas-->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="consultaMedica" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Seleccione el tipo de consulta</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">
                                <div class="table-responsive mt-3">
                                    <table class="table">
                                        <tr>
                                            <td><strong>Médico</strong></td>
                                            <td colspan="4">
                                                <div class="input-group">
                                                    <select class="form-control controlInteligente" id="medicoHoja" name="idMedico" required>
                                                        <option value="0">.:: Seleccionar ::.</option>
                                                        <?php 
                                                            foreach ($medicos as $medico) {
                                                                ?>
                                                        
                                                            <option value="<?php echo $medico->idMedico; ?>"><?php echo $medico->nombreMedico; ?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                    <div class="invalid-tooltip">
                                                        Seleccione un médico.
                                                    </div>  
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" id="pesoPaciente" placeholder="Peso(kg)" class="form-control pesoPaciente" />
                                            </td>
                                            <td>
                                                <input type="text" id="alturaPaciente" placeholder="Altura(M)" class="form-control alturaPaciente" />
                                            </td>
                                            <td>
                                                <input type="text" id="temperaturaPaciente" placeholder="Temperatura" class="form-control temperaturaPaciente" />
                                            </td>
                                            <td>
                                                <input type="text" id="presionPaciente" data-mask="999/999" placeholder="Presión" class="form-control presionPaciente" />
                                            </td>
                                        </tr>
                                    </table>
                                    <?php
                                        if( sizeof($examenes) > 0){
                                        
                                    ?>

                                        <table id="" class="table table-striped thead-primary w-100 tabla-medicamentos">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">Código</th>
                                                    <th class="text-center" scope="col">Nombre</th>
                                                    <th class="text-center" scope="col">Fecha</th>
                                                    <th class="text-center" scope="col">Precio</th>
                                                    <th class="text-center" scope="col">Agregar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    
                                                    foreach ($examenes as $row) {
                                                        if($row->pivoteMedicamento == 10){
                                                ?>
                                                    <tr class="filaMedicamento">
                                                        <td class="text-center" scope="row"><?php echo $row->codigoMedicamento; ?></td>
                                                        <td class="text-center" scope="row"><?php echo $row->nombreMedicamento; ?></td>
                                                        <td class="text-center" scope="row">
                                                            <input type="date" class="form-control fechaConsulta">
                                                        </td>


                                                        <td class="text-center" scope="row">
                                                            $ <?php echo number_format($row->precioVMedicamento, 2); ?>
                                                            <input type="hidden" value="<?php echo $row->idMedicamento; ?>" id="test" class="form-control idM" />
                                                            <input type="hidden" value="<?php  echo $row->precioVMedicamento; ?>" id="test" class="form-control precioM" />
                                                            <input type="hidden" value="<?php  echo $row->nombreMedicamento; ?>" id="test" class="form-control nombreM" />
                                                            <input type="hidden" value="1" id="test" class="form-control cantidadM" />
                                                        </td>
                                                    

                                                        <td class="text-center">
                                                            <?php
                                                                echo "<a class='ocultarAgregar agregarConsulta'  title='Agregar a la lista'><i class='fa fa-plus ms-text-primary addMed'></i></a>";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    <?php
                                                }else{
                                                    echo '<div class="alert alert-danger">
                                                        <h6 class="text-center"><strong>No hay datos que mostrar.</strong></h6>
                                                    </div>';
                                                }
                                            ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Fin Modal para agregar consultas-->

<!-- Modal para agregar examenes laboratorio-->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="examenesLaboratorio" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Seleccione los examenes</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">
                                <div class="table-responsive mt-3">
                                    <?php
                                        if( sizeof($examenes) > 0 ){
                                    ?>

                                        <table id="" class="table table-striped thead-primary w-100 tabla-medicamentos">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">Código</th>
                                                    <th class="text-center" scope="col">Nombre</th>
                                                    <th class="text-center" scope="col">Precio</th>
                                                    <th class="text-center" scope="col">Agregar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    
                                                    foreach ($examenes as $row) {
                                                        if($row->pivoteMedicamento == 1){
                                                ?>
                                                    <tr class="filaMedicamento">
                                                        <td class="text-center" scope="row"><?php echo $row->codigoMedicamento; ?></td>
                                                        <td class="text-center" scope="row"><?php echo $row->nombreMedicamento; ?></td>


                                                        <td class="text-center" scope="row">
                                                            $ <?php echo number_format($row->precioVMedicamento, 2); ?>
                                                            <input type="hidden" value="<?php echo $row->idMedicamento; ?>" id="test" class="form-control idM" />
                                                            <input type="hidden" value="<?php  echo $row->precioVMedicamento; ?>" id="test" class="form-control precioM" />
                                                            <input type="hidden" value="<?php  echo $row->nombreMedicamento; ?>" id="test" class="form-control nombreM" />
                                                            <input type="hidden" value="1" id="test" class="form-control cantidadM" />
                                                        </td>
                                                    

                                                        <td class="text-center">
                                                            <?php
                                                                echo "<a class='ocultarAgregar agregarExamen'  title='Agregar a la lista'><i class='fa fa-plus ms-text-primary addMed'></i></a>";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    <?php
                                        }else{
                                            echo '<div class="alert alert-danger">
                                                <h6 class="text-center"><strong>No hay datos que mostrar.</strong></h6>
                                            </div>';
                                        }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Fin Modal para agregar examenes laboratorio-->

<!-- Modal para agregar medicamentos-->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="medicamentos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Seleccione los medicamentos</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">
                                <div class="table-responsive mt-3">
                                    <?php
                                        if( sizeof($examenes) > 0 ){
                                    ?>

                                        <table id="" class="table table-striped thead-primary w-100 tabla-medicamentos">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">Código</th>
                                                    <th class="text-center" scope="col">Nombre</th>
                                                    <th class="text-center" scope="col">Precio</th>
                                                    <th class="text-center" scope="col">Agregar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    
                                                    foreach ($examenes as $row) {
                                                        if($row->pivoteMedicamento == 0){
                                                ?>
                                                    <tr class="filaMedicamento">
                                                        <td class="text-center" scope="row"><?php echo $row->codigoMedicamento; ?></td>
                                                        <td class="text-center" scope="row"><?php echo $row->nombreMedicamento; ?></td>


                                                        <td class="text-center" scope="row">
                                                            $ <?php echo number_format($row->precioVMedicamento, 2); ?>
                                                            <input type="hidden" value="<?php echo $row->idMedicamento; ?>" id="test" class="form-control idM" />
                                                            <input type="hidden" value="<?php  echo $row->precioVMedicamento; ?>" id="test" class="form-control precioM" />
                                                            <input type="hidden" value="<?php  echo $row->nombreMedicamento; ?>" id="test" class="form-control nombreM" />
                                                            <input type="hidden" value="1" id="test" class="form-control cantidadM" />
                                                        </td>
                                                    

                                                        <td class="text-center">
                                                            <?php
                                                                echo "<a class='ocultarAgregar agregarExamen'  title='Agregar a la lista'><i class='fa fa-plus ms-text-primary addMed'></i></a>";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    <?php
                                        }else{
                                            echo '<div class="alert alert-danger">
                                                <h6 class="text-center"><strong>No hay datos que mostrar.</strong></h6>
                                            </div>';
                                        }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Fin Modal para agregar medicamentos-->

<!-- Modal para rayos x-->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="rayosx" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Seleccione los examenes</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">
                                <div class="table-responsive mt-3">
                                    <?php
                                        if( sizeof($examenes) > 0 ){
                                    ?>

                                        <table id="" class="table table-striped thead-primary w-100 tabla-medicamentos">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">Código</th>
                                                    <th class="text-center" scope="col">Nombre</th>
                                                    <th class="text-center" scope="col">Precio</th>
                                                    <th class="text-center" scope="col">Agregar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    
                                                    foreach ($examenes as $row) {
                                                        if($row->pivoteMedicamento == 2){
                                                ?>
                                                    <tr class="filaMedicamento">
                                                        <td class="text-center" scope="row"><?php echo $row->codigoMedicamento; ?></td>
                                                        <td class="text-center" scope="row"><?php echo $row->nombreMedicamento; ?></td>


                                                        <td class="text-center" scope="row">
                                                            $ <?php echo number_format($row->precioVMedicamento, 2); ?>
                                                            <input type="hidden" value="<?php echo $row->idMedicamento; ?>" id="test" class="form-control idM" />
                                                            <input type="hidden" value="<?php  echo $row->precioVMedicamento; ?>" id="test" class="form-control precioM" />
                                                            <input type="hidden" value="<?php  echo $row->nombreMedicamento; ?>" id="test" class="form-control nombreM" />
                                                            <input type="hidden" value="1" id="test" class="form-control cantidadM" />
                                                        </td>
                                                    

                                                        <td class="text-center">
                                                            <?php
                                                                echo "<a class='ocultarAgregar agregarExamen'  title='Agregar a la lista'><i class='fa fa-plus ms-text-primary addMed'></i></a>";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    <?php
                                        }else{
                                            echo '<div class="alert alert-danger">
                                                <h6 class="text-center"><strong>No hay datos que mostrar.</strong></h6>
                                            </div>';
                                        }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Fin Modal para rayos x-->

<!-- Modal para ultrasonografia-->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="ultrasonografia" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Seleccione los examenes</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">
                                <div class="table-responsive mt-3">
                                    <?php
                                        if( sizeof($examenes) > 0 ){
                                    ?>

                                        <table id="" class="table table-striped thead-primary w-100 tabla-medicamentos">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">Código</th>
                                                    <th class="text-center" scope="col">Nombre</th>
                                                    <th class="text-center" scope="col">Precio</th>
                                                    <th class="text-center" scope="col">Agregar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    
                                                    foreach ($examenes as $row) {
                                                        if($row->pivoteMedicamento == 3){
                                                ?>
                                                    <tr class="filaMedicamento">
                                                        <td class="text-center" scope="row"><?php echo $row->codigoMedicamento; ?></td>
                                                        <td class="text-center" scope="row"><?php echo $row->nombreMedicamento; ?></td>


                                                        <td class="text-center" scope="row">
                                                            $ <?php echo number_format($row->precioVMedicamento, 2); ?>
                                                            <input type="hidden" value="<?php echo $row->idMedicamento; ?>" id="test" class="form-control idM" />
                                                            <input type="hidden" value="<?php  echo $row->precioVMedicamento; ?>" id="test" class="form-control precioM" />
                                                            <input type="hidden" value="<?php  echo $row->nombreMedicamento; ?>" id="test" class="form-control nombreM" />
                                                            <input type="hidden" value="1" id="test" class="form-control cantidadM" />
                                                        </td>
                                                    

                                                        <td class="text-center">
                                                            <?php
                                                                echo "<a class='ocultarAgregar agregarExamen'  title='Agregar a la lista'><i class='fa fa-plus ms-text-primary addMed'></i></a>";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    <?php
                                        }else{
                                            echo '<div class="alert alert-danger">
                                                <h6 class="text-center"><strong>No hay datos que mostrar.</strong></h6>
                                            </div>';
                                        }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Fin Modal para ultrasonografia-->

<!-- Modal para otros servicios-->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="otrosServicios" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Seleccione el servicio</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">
                                <div class="table-responsive mt-3">
                                    <?php
                                        if( sizeof($examenes) > 0 ){
                                    ?>

                                        <table id="" class="table table-striped thead-primary w-100 tabla-medicamentos">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" scope="col">Código</th>
                                                    <th class="text-center" scope="col">Nombre</th>
                                                    <th class="text-center" scope="col">Precio</th>
                                                    <th class="text-center" scope="col">Agregar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    
                                                    foreach ($examenes as $row) {
                                                        if($row->pivoteMedicamento == 4){
                                                ?>
                                                    <tr class="filaMedicamento">
                                                        <td class="text-center" scope="row"><?php echo $row->codigoMedicamento; ?></td>
                                                        <td class="text-center" scope="row"><?php echo $row->nombreMedicamento; ?></td>


                                                        <td class="text-center" scope="row">
                                                            $ <?php echo number_format($row->precioVMedicamento, 2); ?>
                                                            <input type="hidden" value="<?php echo $row->idMedicamento; ?>" id="test" class="form-control idM" />
                                                            <input type="hidden" value="<?php  echo $row->precioVMedicamento; ?>" id="test" class="form-control precioM" />
                                                            <input type="hidden" value="<?php  echo $row->nombreMedicamento; ?>" id="test" class="form-control nombreM" />
                                                            <input type="hidden" value="1" id="test" class="form-control cantidadM" />
                                                        </td>
                                                    

                                                        <td class="text-center">
                                                            <?php
                                                                echo "<a class='ocultarAgregar agregarExamen'  title='Agregar a la lista'><i class='fa fa-plus ms-text-primary addMed'></i></a>";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    <?php
                                        }else{
                                            echo '<div class="alert alert-danger">
                                                <h6 class="text-center"><strong>No hay datos que mostrar.</strong></h6>
                                            </div>';
                                        }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Fin Modal para otros servicios-->

<script>

    $(document).on('change', '.calculoIMC', function (event) {
        event.preventDefault();
        var imc = 0;
        var peso = parseFloat($("#pesoPaciente").val());
        var altura = parseFloat($("#alturaPaciente").val());

        imc = peso / (altura * altura);
        
        if(isNaN(imc)){
            $("#imcPaciente").val(0);
        }else{
            $("#imcPaciente").val(imc.toFixed(2));
        }


        /* $('.calculoIMC').each(function() {
            imc += parseFloat($(this).val());
        }); */

    });

    $(document).on('change', '#medicoHoja', function (event) {
        event.preventDefault();
        var medico = $(this).val();
        if(medico > 0){
            $('.agregarConsulta').each(function() {
                $(this).show();
            });
        }else{
            $('.agregarConsulta').each(function() {
                $(this).hide();
            });
        }


        /* $('.calculoIMC').each(function() {
            imc += parseFloat($(this).val());
        }); */

    });

    $('.controlInteligente').select2({
        theme: "bootstrap4",
        dropdownParent: $("#consultaMedica")
    });

    $(document).on("click", ".agregarConsulta", function(e) {
        e.preventDefault();
        var peso = $("#pesoPaciente").val();
        var altura = $("#alturaPaciente").val();
        
        var imc = (peso / (altura * altura));
        var datos = {
            idHoja: $("#idHoja").val(),
            idPaciente: $("#idPaciente").val(),
            nombrePaciente: $("#nombrePaciente").val(),
            idMedico: $("#medicoHoja").val(),
            peso: peso,
            altura: altura,
            imcPaciente: imc,
            temperatura: $("#temperaturaPaciente").val(),
            presion: $("#presionPaciente").val(),
            idM : $(this).closest('tr').find('.idM').val(),
            nombreMedicamento : $(this).closest('tr').find('.nombreM').val(),
            precioM : $(this).closest('tr').find('.precioM').val(),
            cantidadM : $(this).closest('tr').find('.cantidadM').val(),
            fecha : $(this).closest('tr').find('.fechaConsulta').val()
        }

        $.ajax({
            url: "../../agregar_consulta",
            type: "POST",
            data: datos,
            success:function(respuesta){
                var registro = eval(respuesta);
                if (Object.keys(registro).length > 0){
                    if(registro.estado == 1){
                        location.reload()
                    }else{
                        toastr.remove();
                        toastr.options = {
                            "positionClass": "toast-top-left",
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "1000",
                            "extendedTimeOut": "50",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            },
                        toastr.error('Error al agregar los datos', 'Aviso!');
                    }
                }else{
                    toastr.remove();
                    toastr.options = {
                        "positionClass": "toast-top-left",
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "1000",
                        "extendedTimeOut": "50",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        },
                    toastr.error('Error al agregar los datos', 'Aviso!');

                }
            }
        });

        // $(this).closest('tr').remove();


    });


    $(document).on("click", ".agregarExamen", function(e) {
         e.preventDefault();

        var datos = {
            idHoja: $("#idHoja").val(),
            idMedicamento: $(this).closest('tr').find(".idM").val(),
            nombreMedicamento: $(this).closest('tr').find(".nombreM").val(),
            precioV: $(this).closest('tr').find(".precioM").val(),
            cantidad: $(this).closest('tr').find(".cantidadM").val(),
        }

        console.log(datos);

        $.ajax({
            url: "../../agregar_examenes",
            type: "POST",
            data: datos,
            success:function(respuesta){
                var registro = eval(respuesta);
                if (Object.keys(registro).length > 0){
                    if(registro.estado == 1){
                        toastr.remove();
                            toastr.options = {
                                "positionClass": "toast-top-left",
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "1000",
                                "extendedTimeOut": "50",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                                },
                            toastr.success('Datos agregados correctamente', 'Aviso!');
                    }else{
                        toastr.remove();
                        toastr.options = {
                            "positionClass": "toast-top-left",
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "1000",
                            "extendedTimeOut": "50",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            },
                        toastr.error('Error al agregar los datos', 'Aviso!');
                    }
                }else{
                    toastr.remove();
                    toastr.options = {
                        "positionClass": "toast-top-left",
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "1000",
                        "extendedTimeOut": "50",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        },
                    toastr.error('Error al agregar los datos', 'Aviso!');

                }
            }
        });

        $(this).closest('tr').remove();


    });

    $(document).on('click', '.close', function(event) {
        event.preventDefault();
        location.reload();
    });

    $(document).on("change", ".fechaConsulta", function() {
        $("#btnGuardarReceta").show();

        var datos = {
            fecha : $(this).val(),
            medico : $("#medicoHoja").val()
        }

        $.ajax({
            url: "../../../Consultas/validar_fecha",
            type: "POST",
            data: datos,
            success:function(respuesta){
                var registro = eval(respuesta);
                if (Object.keys(registro).length > 0){
                        if(registro.estado == 1){
                        }else{
                            toastr.remove();
                            toastr.options = {
                                "positionClass": "toast-top-left",
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "1000",
                                "extendedTimeOut": "50",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                                },
                            toastr.error(registro.respuesta, 'Aviso!');
                            $(".fechaConsulta ").val("");
                        }
                    }else{
                        toastr.remove();
                        toastr.options = {
                            "positionClass": "toast-top-left",
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "1000",
                            "extendedTimeOut": "50",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            },
                        toastr.error(registro.respuesta, 'Aviso!');
                        $(".fechaConsulta ").val("");
                    }
            }
        });


    });

</script>