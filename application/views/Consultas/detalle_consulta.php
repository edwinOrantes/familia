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
    .historial, .historial_receta {
        height: 480px;
        overflow-y: scroll;
    }

</style>

<div class="ms-content-wrapper">
	<div class="row">
		<div class="col-md-12">

			<div class="ms-panel">
				<div class="">
                    <!-- Tabs -->
                       <div class="ms-panel-body clearfix">
                            <ul class="nav nav-tabs d-flex nav-justified mb-4" role="tablist">
                                <li role="presentation"><a href="#datosPaciente" aria-controls="datosPaciente" class="active" role="tab" data-toggle="tab">Datos del paciente</a></li>
                                <li role="presentation"><a href="#tabConsulta" aria-controls="tabConsulta" role="tab" data-toggle="tab">Consultas</a></li>
                                <li role="presentation"><a href="#antecedentes" aria-controls="antecedentes" role="tab" data-toggle="tab">Antecedentes</a></li>
                                <li role="presentation"><a href="#examanesLaboratorio" aria-controls="examanesLaboratorio" role="tab" data-toggle="tab">Exámenes de Laboratorio</a></li>
                                <li role="presentation"><a href="#recetas" aria-controls="recetas" role="tab" data-toggle="tab">Recetas</a></li>
                                <li role="presentation"><a href="#reporteQuirurgico" aria-controls="reporteQuirurgico" role="tab" data-toggle="tab">Reporte quirúrgico </a></li>
                                <li role="presentation"><a href="#ingresosHospitalarios" aria-controls="ingresosHospitalarios" role="tab" data-toggle="tab">Ingresos hospitalarios </a></li>
                            </ul>
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active show fade in" id="datosPaciente">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <table class="table table-bordered">
                                                <tr class="bg-primary text-white">
                                                    <td colspan="6" class="text-center"><strong>Datos del paciente</strong></td>
                                                </tr>
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
                                                    <td><strong>Dirección: </strong></td>
                                                    <td colspan="3"><?php echo $paciente->direccionPaciente; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-5">
                                            <table class="table table-bordered">
                                                <tr class="bg-primary text-white">
                                                    <td colspan="5" class="text-center"><strong>Datos del responsable</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Nombre: </strong></td>
                                                    <td><?php echo $paciente->nombreResponsable; ?></td>
                                                    <td><strong>Teléfono: </strong></td>
                                                    <td><?php echo $paciente->telefonoResponsable; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>DUI: </strong></td>
                                                    <td><?php echo $paciente->duiResponsable; ?></td>
                                                    <td><strong>Parentesco: </strong></td>
                                                    <td colspan="3"><?php echo $paciente->parentescoResponsable; ?></td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="table-responsive mt-3">
                                            <table class="table table-hover thead-primary">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" scope="col">#</th>
                                                        <th class="text-center" scope="col">Fecha</th>
                                                        <th class="text-center" scope="col">Altura</th>
                                                        <th class="text-center" scope="col">Peso</th>
                                                        <th class="text-center" scope="col">IMC</th>
                                                        <th class="text-center" scope="col">Peso ideal</th>
                                                        <th class="text-center" scope="col">Temperatura </th>
                                                        <th class="text-center" scope="col">Presión</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $index = 0;
                                                        $peso_ideal = 0;
                                                        foreach ($medidas as $row) {
                                                            $index++;
                                                            // Para hombres: Peso Ideal=Altura (cm)−100−[(Altura (cm)−150)/4]
                                                            // Para mujeres: Peso Ideal=Altura (cm)−100−[(Altura (cm)−150)/2.5]

                                                            // Calculo peso ideal
                                                                if($paciente->sexoPaciente == "Masculino"){
                                                                    $peso_ideal = $row->altura - 100 - (($row->altura-150)/4);
                                                                }else{
                                                                    $peso_ideal = $row->altura - 100 - (($row->altura-150)/2.5);
                                                                }
                                                            // Calculo peso ideal
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $index; ?></td>
                                                            <td class="text-center"><?php echo $row->fechaConsulta; ?></td>
                                                            <td class="text-center"><?php echo $row->altura; ?> cm</td>
                                                            <td class="text-center"><?php echo $row->peso; ?> Kg</td>
                                                            <td class="text-center"><?php echo $row->imc; ?></td>
                                                            <td class="text-center"><?php echo $peso_ideal; ?> Kg</td>
                                                            <td class="text-center"><?php echo $row->temperaturaPaciente; ?></td>
                                                            <td class="text-center"><?php echo $row->presionPaciente; ?></td>
                                                        </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            </div>
                                    </div>


                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tabConsulta">

                                    <div class="row">
                                        <div class="col-md-10">

                                            <div class="row">
                                                <div class="col-md-12 bg-danger text-white">
                                                    <table class="table table-borderless table-sm">
                                                        <tr class="text-center">
                                                            <td colspan="5"><strong>DATOS TOMADOS EN EMERGENCIA:</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <strong>Peso: </strong><?php echo $paciente->peso; ?> Kg</td>
                                                            <td> <strong>Altura: </strong><?php echo $paciente->altura; ?> Cm</td>
                                                            <td> <strong>IMC: </strong><?php echo $paciente->imc; ?></td>
                                                            <td> <strong>Presión: </strong><?php echo $paciente->presionPaciente; ?></td>
                                                            <td> <strong>Temperatura: </strong><?php echo $paciente->temperaturaPaciente; ?> °C</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-12">
                                                    <table class="table table-borderless table-sm">
                                                        <tr>
                                                            <td><strong>CONSULTA POR:</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" value="<?php echo $consulta->consultaPor; ?>" class="form-control" name="consultaPor" id="consultaPor"></td>
                                                        </tr>
                                                    </table>
                                                </div>
        
                                                
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6 text-center">
                                                    <p><strong>PRESENTE ENFERMEDAD</strong></p>
                                                    <textarea name="presenteEnfermedad" id="presenteEnfermedad" class="form-control" cols="30" rows="5"><?php echo $consulta->presenteEnfermedad; ?></textarea>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    <p><strong>EVOLUCION</strong></p>
                                                    <textarea name="evolucionEnfermedad" id="evolucionEnfermedad" class="form-control" cols="30" rows="5"><?php echo $consulta->evolucionEnfermedad; ?></textarea>
                                                </div>
                                            </div>
    
                                        
                                        
                                            <div class="col-md-12">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <td><strong>EXAMEN FISICO</strong></td>
                                                                <td>P.A: <input type="text" value="<?php echo $consulta->paConsulta; ?>"  size="10" class="" name="paConsulta" id="paConsulta"></td>
                                                                <td>F.C: <input type="text" value="<?php echo $consulta->fcConsulta; ?>"  size="10" class="" name="fcConsulta" id="fcConsulta"></td>
                                                                <td>Temp: <input type="text" value="<?php echo $consulta->tempConsulta; ?>"  size="10" class="" name="tempConsulta" id="tempConsulta"></td>
                                                                <td>FR: <input type="text" value="<?php echo $consulta->frConsulta; ?>"  size="10" class="" name="frConsulta" id="frConsulta"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <p><strong>IMPRESION DIAGNOSTICA</strong></p>
                                                        <table class="table table-borderless">
                                                                <tr>
                                                                    <td><input type="text" value="<?php echo $consulta->diagnosticoUno; ?>" list="lista_diagnostico" class="form-control impresionEnfermedad" name="diagnosticoUno" id="diagnosticoUno"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" value="<?php echo $consulta->diagnosticoDos; ?>" list="lista_diagnostico" class="form-control impresionEnfermedad" name="diagnosticoDos" id="diagnosticoDos"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" value="<?php echo $consulta->diagnosticoTres; ?>" list="lista_diagnostico" class="form-control impresionEnfermedad" name="diagnosticoTres" id="diagnosticoTres"></td>
                                                                </tr>
                                                        </table>
    
    
                                                        <datalist id="lista_diagnostico"></datalist>
                                                    </div>
        
                                                    <div class="col-md-6">
                                                        <p><strong>PLAN</strong></p>
                                                        <textarea name="planEnfermedad" id="planEnfermedad" class="form-control" cols="30" rows="8"><?php echo $consulta->planConsulta; ?></textarea>
                                                        <input type="hidden" value="<?php echo $consulta->idDetalleConsulta; ?>" name="idDetalleConsulta" id="idDetalleConsulta">
                                                    </div>
    
                                                </div>
    
                                            </div>

                                        </div>


                                        <div class="col-md-2 text-center">
                                            <p><strong>HISTORIAL</strong></p>
                                            <div class="table-responsive historial">
                                                <table class="table table-borderless table-sm">
                                                    <tr>
                                                        <td>2024-01-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-02-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-03-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-04-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-04-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-05-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-05-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-05-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-05-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-05-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>

                                                </table>
                                            </div>

                                            <div class="mt-5">
                                                <button type="button" class="btn btn-primary btn-block" id="btnGuardarDetalleConsulta"> <i class="fa fa-save"></i> Guardar </button>
                                            </div>
                                        </div>


                                    </div>

`                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="antecedentes">
                                    <div class="row">
                                        <table class="table table-borderless table-sm">
                                            <tr>
                                                <td style="width: 125px"><strong>ANT. MEDICOS</strong></td>
                                                <td><textarea name="antMedicos" id="antMedicos" class="form-control" cols="30" rows="3"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 125px"><strong>ANT. QUIRURGICOS</strong></td>
                                                <td><textarea name="antQuirurgicos" id="antQuirurgicos" class="form-control" cols="30" rows="3"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 125px"><strong>ALERGIAS</strong></td>
                                                <td><textarea name="alergias" id="alergias" class="form-control" cols="30" rows="3"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 125px"><strong>PARTOS</strong></td>
                                                <td><textarea name="partos" id="partos" class="form-control" cols="30" rows="3"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 125px"><strong>INGRESOS</strong></td>
                                                <td><textarea name="ingresos" id="ingresos" class="form-control" cols="30" rows="3"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 125px"><strong>OTROS</strong></td>
                                                <td><textarea name="otros" id="otros" class="form-control" cols="30" rows="3"></textarea></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="examanesLaboratorio">
                                    <p>Laboratorio clinico</p>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="recetas">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td><strong>FECHA:</strong></td>
                                                    <td><input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control" name="fechaReceta" id="fechaReceta"></td>
                                                    <td><strong>PROXIMA CITA:</strong></td>
                                                    <td><input type="date" value="" class="form-control" name="fechaReceta" id="fechaReceta"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="historial_receta">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <input type="text" class="form-control" name="medicamento[]" placeholder="Medicamento">
                                                        <input type="text" class="form-control mt-1" name="indicacion[]"  placeholder="Indicación médica">
                                                    </tr>
                                                </table>
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <input type="text" class="form-control" name="medicamento[]" placeholder="Medicamento">
                                                        <input type="text" class="form-control mt-1" name="indicacion[]"  placeholder="Indicación médica">
                                                    </tr>
                                                </table>
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <input type="text" class="form-control" name="medicamento[]" placeholder="Medicamento">
                                                        <input type="text" class="form-control mt-1" name="indicacion[]"  placeholder="Indicación médica">
                                                    </tr>
                                                </table>
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <input type="text" class="form-control" name="medicamento[]" placeholder="Medicamento">
                                                        <input type="text" class="form-control mt-1" name="indicacion[]"  placeholder="Indicación médica">
                                                    </tr>
                                                </table>
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <input type="text" class="form-control" name="medicamento[]" placeholder="Medicamento">
                                                        <input type="text" class="form-control mt-1" name="indicacion[]"  placeholder="Indicación médica">
                                                    </tr>
                                                </table>
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <input type="text" class="form-control" name="medicamento[]" placeholder="Medicamento">
                                                        <input type="text" class="form-control mt-1" name="indicacion[]"  placeholder="Indicación médica">
                                                    </tr>
                                                </table>
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <input type="text" class="form-control" name="medicamento[]" placeholder="Medicamento">
                                                        <input type="text" class="form-control mt-1" name="indicacion[]"  placeholder="Indicación médica">
                                                    </tr>
                                                </table>
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <input type="text" class="form-control" name="medicamento[]" placeholder="Medicamento">
                                                        <input type="text" class="form-control mt-1" name="indicacion[]"  placeholder="Indicación médica">
                                                    </tr>
                                                </table>
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <input type="text" class="form-control" name="medicamento[]" placeholder="Medicamento">
                                                        <input type="text" class="form-control mt-1" name="indicacion[]"  placeholder="Indicación médica">
                                                    </tr>
                                                </table>
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <input type="text" class="form-control" name="medicamento[]" placeholder="Medicamento">
                                                        <input type="text" class="form-control mt-1" name="indicacion[]"  placeholder="Indicación médica">
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-md-4 text-center">
                                            <p><strong>HISTORIAL</strong></p>
                                            <div class="table-responsive historial_receta">
                                                <table class="table table-borderless table-sm">
                                                    <tr>
                                                        <td>2024-01-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-02-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-03-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-04-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-04-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-05-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-05-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-05-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-05-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2024-05-01</td>
                                                        <td>DOLORES</td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="reporteQuirurgico">
                                    <p> Reporte quirurgico </p>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="ingresosHospitalarios">
                                    <p> Ingresos hospitalarios </p>
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


<script>

$(document).on("keyup", ".impresionEnfermedad", function() {
    $("#lista_diagnostico").html();
    var lista = "";
    var datos = {
        str : $(this).val()
    }

    $.ajax({
        url: "../../buscar_diagnostico",
        type: "POST",
        data: datos,
        success:function(respuesta){
            var registro = eval(respuesta);
            if (Object.keys(registro).length > 0){
                for (let i = 0; i < registro.length; i++) {
                    lista += '<option value="'+registro[i]["nombreDiagnostico"]+'">'+registro[i]["nombreDiagnostico"]+'</option>';
                }
                $("#lista_diagnostico").html(lista);
            }
        }
    });
});

$(document).ready(function(){
    // Obtener la última pestaña activa desde el almacenamiento local
    var ultimaPestana = localStorage.getItem('ultimaPestana');

    // Si hay una última pestaña activa, activarla
    if (ultimaPestana) {
        $('.nav-tabs a[href="' + ultimaPestana + '"]').tab('show');
    }

    // Guardar la pestaña activa al cambiar de pestaña
    $('.nav-tabs a').on('shown.bs.tab', function(event){
        var nuevaPestana = $(event.target).attr('href');
        localStorage.setItem('ultimaPestana', nuevaPestana);
    });
});

$(document).on("click", "#btnGuardarDetalleConsulta", function(e) {
    e.preventDefault();
    var datos = {
        consultaPor: $("#consultaPor").val(),
        presenteEnfermedad: $("#presenteEnfermedad").val(),
        evolucionEnfermedad: $("#evolucionEnfermedad").val(),
        paConsulta: $("#paConsulta").val(),
        fcConsulta: $("#fcConsulta").val(),
        tempConsulta: $("#tempConsulta").val(),
        frConsulta: $("#frConsulta").val(),
        diagnosticoUno: $("#diagnosticoUno").val(),
        diagnosticoDos: $("#diagnosticoDos").val(),
        diagnosticoTres: $("#diagnosticoTres").val(),
        diagnostico: "",
        planEnfermedad: $("#planEnfermedad").val(),
        idDetalleConsulta: $("#idDetalleConsulta").val(),
    };

    $.ajax({
        url: "../../guardar_detalle_consulta",
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
                        toastr.success('Datos agregados con exito', 'Aviso!');
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
                        toastr.error('No se agrego el detalle...', 'Aviso!');
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
                    toastr.error('No se agrego el detalle...', 'Aviso!');

                }
            }
    });


});

</script>

