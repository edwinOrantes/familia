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
    .listaConsultas .text-center{
        font-size: 16px;
    }
</style>

<div class="ms-content-wrapper">
	<div class="row">
		<div class="col-md-12">
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"> <a href="#"><i class="fa fa-clipboard-list"></i> Consultas </a> </li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Hemodialisis/lista_citas/">Lista de consultas</a></li>
                </ol>
            </nav> 
            
			<div class="ms-panel">
				<div class="ms-panel-header ms-panel-custome">
                    
				</div>
				<div class="ms-panel-body">
                    <?php
                        if(sizeof($citas) > 0){
                    ?>
                    <table class="table table-borderless thead-primary tablaPlus listaConsultas">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Paciente</th>
                                <th class="text-center">Edad</th>
                                <!-- <th class="text-center">Telefono</th> -->
                                <th class="text-center">Procesos</th>
                                <!-- <th class="text-center">Médico</th> -->
                                <th class="text-center">Llegada</th>
                                <th class="text-center">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $number = 0;
                                    foreach ($citas as $cita) {
                                        $number++;
                                ?>
                                <tr>
                                            <td class="text-center"><?php echo $number; ?>
                                            </td>
                                            <td class="text-center"><?php echo $cita->nombrePaciente; ?></td>
                                            <td class="text-center"><?php echo $cita->edadPaciente; ?> Años</td>
                                            <!-- <td class="text-center"><?php echo $cita->telefonoPaciente; ?></td> -->
                                            <td class="text-center">
                                                <?php
                                                    $consulta = $this->Consultas_Model->consultaARealizar($cita->idConsulta, 10, 10);
                                                    foreach ($consulta as $row) {
                                                        echo '<strong> '.$row->nombreMedicamento.' </strong>';
                                                    }

                                                    $examenes = $this->Consultas_Model->consultaARealizar($cita->idConsulta, 1, 9);
                                                    if(sizeof($examenes) > 0){
                                                        echo '(<span style="font-size: 10px">';
                                                        foreach ($examenes as $row) {
                                                            echo $row->nombreMedicamento.",";
                                                        }
                                                        echo '</span>) ';
                                                    }
                                                ?>
                                                
                                            </td>
                                            <!-- <td class="text-center"><?php echo $cita->nombreMedico; ?></td> -->
                                            <td class="text-center"><?php echo date("h:i:s A", strtotime($cita->hora)); ?></td>
                                            <td class="text-center">
                                                <?php
                                                    echo "<a  title='Consulta atendida' target='blank' href='".base_url()."Consultas/detalle_consulta/".$cita->idConsulta."/'><i class='fas fa-file fa-2x ms-text-primary'></i></a>";
                                                    // echo "<a  title='Consulta atendida' target='blank' href='".base_url()."Consultas/detalle_consulta/".$cita->idConsulta."/'><i class='fas fa-check ms-text-primary'></i></a>";
                                                ?>
                                            </td>
                                        </tr>

                                <?php } ?>
                            </tbody>
                    </table>
                    <?php 
                        }else{
                            echo "<div class='alert-danger p-3 text-center bold'>No hay citas para este turno.</div>";
                        }
                    ?>                
				</div>
			</div>
		</div>
	</div>
</div> 

<!-- Modal actualizar cita-->
    <div class="modal fade" id="actualizarCita" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Datos de la cita</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">
                                <div class="col-md-12" id="">
                                <form class="needs-validation" method="POST" action="<?php echo base_url(); ?>Hemodialisis/actualizar_cita" novalidate>
						
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for=""><strong>Nombre Completo</strong></label>
                                            <input type="text" list="recomendacionesPacientes" class="form-control" id="nombrePacienteU" name="nombrePaciente" placeholder="Nombre del paciente" autocomplete="off"  required>
                                            <div class="invalid-tooltip">
                                                Debes ingresar el nombre del paciente.
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><strong>Turno</strong></label>
                                            <select class="form-control" name="turnoCita" id="turnoCitaU" required>
                                                <option value="">.:Seleccionar:.</option>
                                                <option value="1">Primer</option>
                                                <option value="2">Segundo</option>
                                                <option value="3">Tercer</option>
                                            </select>
                                            <div class="invalid-tooltip">
                                                Debes seleccionar el turno.
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6" id="turnoCita">
                                            <label for=""><strong>Fecha</strong></label>
                                            <input type="date" class="form-control" name="fechaCita" id="fechaCitaU" required>
                                            <div class="invalid-tooltip">
                                                Selecciona la fecha de la cita.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><strong>Responsable</strong></label>
                                            <input type="text" class="form-control" id="responsablePacienteU" name="responsablePaciente" required>
                                            <div class="invalid-tooltip">
                                                Debes ingresar la fecha de nacimiento del paciente.
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=""><strong>Tel. responsable</strong></label>
                                            <input class="form-control" data-mask="9999-9999" id="telRespPacienteU" name="telRespPaciente" required>
                                            <div class="invalid-tooltip">
                                                Debes ingresar dirección del paciente.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <p id="tipoPaciente" class=""></p>
                                        </div>
                                    </div>

                                    <input type="hidden" name="idPaciente" id="idPacienteU">
                                    <input type="hidden" name="idCita" id="idCitaU">

                                    <div class="form-group text-center mt-3 botonesCita">
                                        <button type="submit" class="btn btn-primary has-icon"><i class="fa fa-save"></i> Actualizar cita </button>
                                        <a data-dismiss="modal" class="btn btn-danger has-icon"><i class=" fa fa-times"></i> Cancelar </a>
                                    </div>
                                
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <datalist id="recomendacionesPacientes"></datalist>
            </div>
        </div>
    </div>
<!-- Fin modal actualizar cita-->

<!-- Modal actualizar cita-->
    <div class="modal fade" id="irAFecha" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Datos de la cita</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">
                                <div class="col-md-12" id="">
                                <form class="needs-validation" method="POST" action="<?php echo base_url(); ?>Hemodialisis/lista_citas/" novalidate>
						
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><strong>Fecha</strong></label>
                                            <input type="date" class="form-control" id="fechaCitas" name="fechaCitas" value="<?php echo date('Y-m-d'); ?>" required>
                                            <div class="invalid-tooltip">
                                                Debes seleccionar la fecha deseada.
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=""><strong>Turno</strong></label>
                                            <input type="number" value="1" class="form-control" id="turnoCitas" name="turnoCitas" required>
                                            <div class="invalid-tooltip">
                                                Debes sel turno deseado.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-center mt-3 botonesCita">
                                        <button type="submit" class="btn btn-primary has-icon"> Ir <i class="fa fa-arrow-right"></i></button>
                                        <a data-dismiss="modal" class="btn btn-default has-icon" data-dismiss="modal"><i class=" fa fa-times"></i> Cancelar </a>
                                    </div>
                                
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <datalist id="recomendacionesPacientes"></datalist>
            </div>
        </div>
    </div>
<!-- Fin modal actualizar cita-->


<!-- Modal para crear hoja de cobro-->
    <div class="modal fade" id="modalCrearHojaCobro" tabindex="-1" role="dialog" aria-labelledby="modal-5">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content pb-5">

				<div class="modal-header bg-danger">
					<h3 class="modal-title has-icon text-white"><i class="flaticon-alert-1"></i> Advertencia</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
				</div>

				<div class="modal-body text-center">
					<p class="h5">¿Estas seguro de crear hoja de cobro?</p>
				</div>
				
				<form action="<?php echo base_url()?>Hemodialisis/crear_hoja/" method="post">
					<input type="hidden" class="form-control" id="pacienteHoja" name="pacienteHoja" />
					<input type="hidden" class="form-control" id="citaHoja" name="citaHoja" />
					<div class="text-center">
						<button type="submit" class="btn btn-danger shadow-none"><i class="fa fa-file"></i> Crear </button>
						<button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
					</div>
				</form>

			</div>
		</div>
	</div>
<!-- Fin Modal crear hoja de cobro -->

<!-- Modal para eliminar cita-->
    <div class="modal fade" id="modalEliminarCita" tabindex="-1" role="dialog" aria-labelledby="modal-5">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content pb-5">

				<div class="modal-header bg-danger">
					<h3 class="modal-title has-icon text-white"><i class="flaticon-alert-1"></i> Advertencia</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
				</div>

				<div class="modal-body text-center">
					<p class="h5">¿Estas seguro de eliminar la cita?</p>
				</div>
				
				<form action="<?php echo base_url()?>Hemodialisis/eliminar_cita/" method="post">
					<input type="hidden" class="form-control" id="citaHojaE" name="citaHoja" />
					<input type="hidden" class="form-control" id="turnoCita" name="turnoCita" value="<?php echo $turno; ?>"/>
					<input type="hidden" class="form-control" id="fechaCita" name="fechaCita" value="<?php echo $dia; ?>"/>
					<div class="text-center">
						<button type="submit" class="btn btn-danger shadow-none"><i class="fa fa-file"></i> Eliminar </button>
						<button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
					</div>
				</form>

			</div>
		</div>
	</div>
<!-- Fin modal eliminar cita -->

<script>
    $(document).on("click", "#crearHojaCobro", function(event) {
        //event.preventDefault();
        var idCita = $(this).closest("tr").find("#idCita").val();
        var idPaciente = $(this).closest("tr").find("#idPaciente").val();

        $("#pacienteHoja").val(idPaciente);
        $("#citaHoja").val(idCita);
        $("#modalCrearHojaCobro").modal();
    });

    $(document).on("click", "#eliminarCita", function(event) {
        //event.preventDefault();
        var idCita = $(this).closest("tr").find("#idCita").val();

        $("#citaHojaE").val(idCita);
        $("#modalEliminarCita").modal();
    });

    $(document).on("click", ".saldarCita", function(event) {
        //event.preventDefault();
        var resp = confirm("¿El paciente ya fue atendido?");
        if (resp == true) {
            var cita = $(this).closest("tr").find("#idCita").val();
            var datos = {
                idCita: cita
            }
            $.ajax({
                url: "../saldar_cita",
                type: "POST",
                data: datos,
                success:function(respuesta){
                    var registro = eval(respuesta);
                    if(registro.length > 0){}
                }
            });
            $(this).hide();
        }


    });

    $(document).on("click", "#editarCita", function(event) {
        event.preventDefault();
            var idCita = $(this).closest("tr").find("#idCita").val();
            var idPaciente = $(this).closest("tr").find("#idPaciente").val();
            var nombrePaciente = $(this).closest("tr").find("#nombrePaciente").val();
        /*var edadPaciente = $(this).closest("tr").find("#edadPaciente").val();
        var telefonoPaciente = $(this).closest("tr").find("#telefonoPaciente").val();*/
            var responsablePaciente = $(this).closest("tr").find("#responsablePaciente").val();
            var telRespPaciente = $(this).closest("tr").find("#telRespPaciente").val();
            var turnoCita = $(this).closest("tr").find("#turnoCita").val();
            var fechaCita = $(this).closest("tr").find("#fechaCita").val();

            console.log(telRespPaciente );

        // Asignando datos
        $("#turnoCitaU").val(turnoCita);
        $("#fechaCitaU").val(fechaCita);
        $("#responsablePacienteU").val(responsablePaciente);
        $("#nombrePacienteU").val(nombrePaciente);
        $("#telRespPacienteU").val(telRespPaciente);
        $("#idPacienteU").val(idPaciente);
        $("#idCitaU").val(idCita);

        $("#actualizarCita").modal();

    });

    $(document).on('keyup', '#nombrePacienteU', function (event) {
       event.preventDefault();
       $("#recomendacionesPacientes").html("");
       var data = {
            id: $(this).val()
       }

        $.ajax({
            url: "../recomendaciones_paciente",
            type: "GET",
            beforeSend: function () { },
            data: data,
            success:function(respuesta){
                var registro = eval(respuesta);
                if (registro.length > 0){
                    var html = "";
                    for (var i = 0; i < registro.length; i++){
                        html += "<option value='"+ registro[i]["nombrePaciente"]+"'>  ";
                    }
                        console.log(html);
                    $("#recomendacionesPacientes").append(html);
                }
            },
            error:function(){
                alert("Hay un error");
            }
        });

    });

    $(document).on('change', '#nombrePacienteU', function (event) {
       event.preventDefault();
        $.ajax({
            url: "../buscar_paciente",
            type: "GET",
            beforeSend: function () { },
            data: {id:$(this).val()},
            success:function(respuesta){
                var registro = eval(respuesta);
                if (registro.length > 0){
                    var html = "";
                    $("#tipoPaciente").html('');
                    for (var i = 0; i < registro.length; i++) {
                        // $("#edadPaciente").val(registro[i]["edadPaciente"]);
                        $("#idPacienteU").val(registro[i]["idPaciente"]);
                        $("#turnoCitaU").val("");
                        $("#responsablePacienteU").val("");
                        $("#telRespPacienteU").val("");


                        if(registro[i]["vinoDe"] == 1){
                            html = '<a href="#" class="btn btn-outline-success bt-sm">Paciente hemodialisis</a>';
                        }else{
                            html = '<a href="#" class="btn btn-outline-primary bt-sm">Paciente privado</a>';
                        }
                    }

                    $(".botonesCita").show();

                }else{
                    $("#idPaciente").val("0");
                    html = '<a href="#" class="btn btn-outline-danger bt-sm">Paciente no existe</a>';
                }
                $("#tipoPaciente").html(html);
            },
            error:function(){
                alert("Hay un error");
            }
        });

    });
</script>

