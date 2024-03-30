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

			<!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-arrow has-gap">
                    <li class="breadcrumb-item" aria-current="page"> <a href="#"><i class="fa fa-users"></i> Pacientes</a> </li>
                    <li class="breadcrumb-item"><a href="#">Detalle paciente</a></li>
                </ol>
            </nav> -->

			<div class="ms-panel">
				<div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-6"><h6>Que proceso se desea realizar?</h6></div>
                        <div class="col-md-6 text-right">
                        <a class="btn btn-success btn-sm" href="<?php echo base_url()?>Paciente/agregar_pacientes"><i class="fa fa-arrow-left"></i> Volver </a>
                        </div>
                    </div>
				</div>
			
            
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
                                <td><strong>DUI: </strong></td>
                                <td><?php echo $paciente->duiPaciente; ?></td>
                            </tr>

                            <!-- <tr>
                                <td><strong>Fecha de nacimiento: </strong></td>
                                <td><?php echo $paciente->nacimientoPaciente; ?></td>
                                <td><strong>Dirección: </strong></td>
                                <td><?php echo $paciente->direccionPaciente; ?></td>
                            </tr>

                            <tr>
                                <td><strong>Responsable: </strong></td>
                                <td><?php echo $n = $paciente->nombreResponsable ? $paciente->nombreResponsable : "-"; ?></td>
                                <td><strong>Teléfono: </strong></td>
                                <td><?php echo $t = $paciente->telefonoResponsable ? $paciente->telefonoResponsable : "-"; ?></td>
                                <td></td>
                                <td></td>
                            </tr> -->
                        </table>
                    </div>

                    <!-- Motivo de la visita -->
                        <div class="row mt-5">
                            <div class="col-md-12 text-center">
                                <div class="">
                                    <label class="ms-checkbox-wrap">
                                        <input type="radio" class="motivoVisita" name="motivoVisita" value="1">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                    <span class="bold h6"> Agregar a consulta </span> 
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="ms-checkbox-wrap">
                                        <input type="radio" class="motivoVisita" name="motivoVisita" value="2">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                     <span class="bold h6"> Crear hoja de cobro </span>
                                </div>

                            </div>   
                        </div>
                    <!-- Fin Motivo de la visita -->

                    <!-- Si viene a consulta -->
                        <div id="consulta" style="display: none;">
                            <form class="needs-validation mt-4" method="post" action="<?php echo base_url()?>Hoja/crear_consulta" novalidate>
                                <div class="col-md-12 text-center"><h6 class="text-primary"> Información de la consulta </h6></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="form-row">
                                                <div class="col-md-4" style="display: none">
                                                    <label for=""><strong>Código</strong></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="<?php echo $codigo; ?>" id="codigoHoja" readonly/>
                                                        <input type="hidden" class="form-control" value="<?php echo $codigo; ?>" name="codigoHoja"/>
                                                        <div class="invalid-tooltip">
                                                            Seleccione un tipo de documento.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4" style="display: none">
                                                    <label for=""><strong>Tipo</strong></label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="tipoConsulta" name="tipoHoja" required>
                                                            <option value="">.:: Seleccionar ::.</option>
                                                            <option value="Ingreso">Ingreso</option>
                                                            <option value="Ambulatorio" selected>Ambulatorio</option>
                                                            <!--<option value="Otro">Otro</option>-->
                                                        </select>
                                                        <div class="invalid-tooltip">
                                                            Seleccione un tipo de hoja.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for=""><strong>Médico</strong></label>
                                                    <div class="input-group">
                                                        <select class="form-control controlInteligente" id="medicoHoja" name="idMedico" required>
                                                            <option value="">.:: Seleccionar ::.</option>
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
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <label for=""><strong>Fecha de consulta</strong></label>
                                                    <div class="input-group">
                                                    <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" id="fechaIngreso" name="fechaHoja" placeholder="Fecha del ingreso" required>
                                                        <div class="invalid-tooltip">
                                                            Seleccione un tipo de documento.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4" style="display: none">
                                                    <label for=""><strong>Destino</strong></label>
                                                    <div class="input-group">
                                                        <select name="destinoHoja" id="destinoHoja" class="form-control" required>
                                                            <option value="">.::Seleccionar::.</option>
                                                            <option value="1" selected>Consulta</option>
                                                            <option value="2">Ultrasonografía</option>
                                                            <option value="3">Rayos X</option>
                                                            <option value="4">Laboratorio</option>
                                                            <option value="5">Hemodiálisis</option>
                                                            <option value="6">Paquete</option>
                                                        </select>
                                                        <div class="invalid-tooltip">
                                                            Ingrese el destino del paciente
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4" style="display: none">
                                                    <label for=""><strong>Habitación</strong></label>
                                                    <div class="input-group">
                                                        
                                                        <select class="form-control" id="habitacionHoja" name="idHabitacion" required>
                                                            <?php 
                                                                foreach ($habitaciones as $habitacion) {
                                                                    if($habitacion->idHabitacion == 1){
                                                            ?>
                                                                    <option value="<?php echo $habitacion->idHabitacion; ?>" selected><?php echo $habitacion->numeroHabitacion; ?></option>
                                                            <?php }} ?>
                                                        </select>

                                                        <div class="invalid-tooltip">
                                                            Ingrese el numero de habitacion del paciente.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for=""><strong>Para</strong></label>
                                                    <div class="input-group">
                                                        
                                                        <select class="form-control" id="paraHoja" name="paraHoja" required>
                                                            <option value="Paciente">Paciente</option>
                                                            <option value="Empleado">Empleado</option>
                                                        </select>

                                                        <div class="invalid-tooltip">
                                                            Ingrese el numero de habitacion del paciente.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for=""><strong>Peso</strong></label>
                                                    <div class="input-group">
                                                    <input type="text" class="form-control calculoIMC" id="pesoPaciente" name="pesoPaciente" placeholder="Peso del paciente el Kg" required>
                                                        <div class="invalid-tooltip">
                                                            Ingresa el peso del paciente.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for=""><strong>Altura</strong></label>
                                                    <div class="input-group">
                                                    <input type="text" class="form-control calculoIMC" id="alturaPaciente" name="alturaPaciente" placeholder="Altura en metro" required>
                                                        <div class="invalid-tooltip">
                                                            Ingresa la altura del paciente.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for=""><strong>IMC</strong></label>
                                                    <div class="input-group">
                                                    <input type="text" class="form-control" id="imcPaciente" name="imcPaciente" placeholder="IMC del paciente" required>
                                                        <div class="invalid-tooltip">
                                                            Ingresa el IMC del paciente.
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                            </div>

                                            <hr>

                                        </div>
                                        
                                    </div>
                                    <input type="hidden" value="<?php echo $paciente->idPaciente; ?>" name="idPaciente">
                                    <input type="hidden" value="<?php echo $paciente->nombrePaciente; ?>" name="nombrePaciente">
                                    <div class="text-center" id="">
                                        <button class="btn btn-primary mt-2 d-inline w-20" type="submit"> Siguiente <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>  
                        </div>
                    <!-- Si viene a consulta -->

                    <!-- Si viene solo sera hoja de cobro -->
                        <div id="hoja" class="p-3" style="display: none;">
                            <form class="needs-validation" method="post" action="<?php echo base_url()?>Hoja/crear_hoja" novalidate>
                                <div class="col-md-12 text-center"><h6 class="text-primary"> Información de la hoja de cobro </h6></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for=""><strong>Código</strong></label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="<?php echo $codigo; ?>" id="codigoHoja" readonly/>
                                                        <input type="hidden" class="form-control" value="<?php echo $codigo; ?>" name="codigoHoja"/>
                                                        <div class="invalid-tooltip">
                                                            Seleccione un tipo de documento.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for=""><strong>Tipo</strong></label>
                                                    <div class="input-group">
                                                        <select class="form-control" id="tipoConsulta" name="tipoHoja" required>
                                                            <option value="">.:: Seleccionar ::.</option>
                                                            <option value="Ingreso">Ingreso</option>
                                                            <option value="Ambulatorio">Ambulatorio</option>
                                                            <!--<option value="Otro">Otro</option>-->
                                                        </select>
                                                        <div class="invalid-tooltip">
                                                            Seleccione un tipo de hoja.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for=""><strong>Médico</strong></label>
                                                    <div class="input-group">
                                                        <select class="form-control controlInteligente" id="medicoHoja" name="idMedico" required>
                                                            <option value="">.:: Seleccionar ::.</option>
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
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label for=""><strong>Fecha de ingreso</strong></label>
                                                    <div class="input-group">
                                                    <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" id="fechaIngreso" name="fechaHoja" placeholder="Fecha del ingreso" required>
                                                        <div class="invalid-tooltip">
                                                            Seleccione un tipo de documento.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for=""><strong>Destino</strong></label>
                                                    <div class="input-group">
                                                        <select name="destinoHoja" id="destinoHoja" class="form-control" required>
                                                            <option value="">.::Seleccionar::.</option>
                                                            <option value="1">Consulta</option>
                                                            <option value="2">Ultrasonografía</option>
                                                            <option value="3">Rayos X</option>
                                                            <option value="4">Laboratorio</option>
                                                            <option value="5">Hemodiálisis</option>
                                                            <option value="6">Paquete</option>
                                                        </select>
                                                        <div class="invalid-tooltip">
                                                            Ingrese el destino del paciente
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for=""><strong>Habitación</strong></label>
                                                    <div class="input-group">
                                                        
                                                        <select class="form-control" id="habitacionHoja" name="idHabitacion" required>
                                                            <option value="37">.:: Seleccionar ::.</option>
                                                            <?php 
                                                                foreach ($habitaciones as $habitacion) {
                                                                    if($habitacion->idHabitacion <= 36){
                                                            ?>
                                                                    <option value="<?php echo $habitacion->idHabitacion; ?>"><?php echo $habitacion->numeroHabitacion; ?></option>
                                                            <?php }} ?>
                                                        </select>

                                                        <div class="invalid-tooltip">
                                                            Ingrese el numero de habitacion del paciente.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for=""><strong>Para</strong></label>
                                                    <div class="input-group">
                                                        
                                                        <select class="form-control" id="paraHoja" name="paraHoja" required>
                                                            <option value="Paciente">Paciente</option>
                                                            <option value="Empleado">Empleado</option>
                                                        </select>

                                                        <div class="invalid-tooltip">
                                                            Ingrese el numero de habitacion del paciente.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <hr>

                                        </div>
                                    </div>
                                    <input type="hidden" value="<?php echo $paciente->idPaciente; ?>" name="idPaciente">
                                    <input type="hidden" value="<?php echo $paciente->nombrePaciente; ?>" name="nombrePaciente">
                                    <div class="text-center" id="">
                                        <button class="btn btn-primary mt-2 d-inline w-20" type="submit"> Siguiente <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>  
                        </div>
                    <!-- Si viene solo sera hoja de cobro -->

				</div>
            </div>
		</div>
	</div>
</div>


<script>
     $(document).on('change', '.motivoVisita', function (event) {
        event.preventDefault();
        var motivo = $(this).val();
        if(motivo == 1){
            $("#hoja").hide();
            $("#consulta").show();
        }else{
            $("#consulta").hide();
            $("#hoja").show();

        }
        // alert(motivo);
    });

     $(document).on('change', '#tipoConsulta', function (event) {
        event.preventDefault();
        var tipo = $(this).val();
        if(tipo == "Ingreso"){
            $("#destinoHoja").val(1);
        }else{
            $("#destinoHoja").val("");
        }
    });

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

    /* $('.controlInteligente').select2({
        theme: "bootstrap4",
        dropdownParent: $(".ms-content-wrapper")
    }); */
</script>
