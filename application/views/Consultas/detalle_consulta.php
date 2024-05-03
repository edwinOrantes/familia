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

    .verDetalleConsulta, .verDetalleActual{
        cursor: pointer
    }

    .tabla_examen, .nombre_examen{
        display: none;
    }

    #dvHistorialLab .table tr td{
        padding: 1px !important
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
                                                                    $peso_ideal = ($row->altura * 100) - 100 - ((($row->altura * 100)-150)/4);
                                                                }else{
                                                                    $peso_ideal = ($row->altura * 100) - 100 - ((($row->altura * 100)-150)/2.5);
                                                                }
                                                            // Calculo peso ideal
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $index; ?></td>
                                                            <td class="text-center"><?php echo $row->fechaConsulta; ?></td>
                                                            <td class="text-center"><?php echo ($row->altura * 100); ?> cm</td>
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
                                        <div class="col-md-10" id="contenedorconsulta">

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
                                        
                                        <div class="col-md-10" id="contenedorconsultaH"></div>

                                        <div class="col-md-2 text-center">
                                            <p><strong>HISTORIAL</strong></p>
                                            <div class="table-responsive historial">
                                                <table class="table table-borderless table-sm">
                                                    <?php
                                                     foreach ($historial_detalles as $row) {
                                                        if($row->fechaConsulta == date('Y-m-d')){
                                                            echo '<tr class="verDetalleActual alert-primary">
                                                                    <td colspan="2"><strong>'.$row->fechaConsulta.'</strong></td>
                                                                </tr>';
                                                        }else{
                                                    ?>
                                                    <tr class="verDetalleConsulta">
                                                        <td><?php echo $row->fechaConsulta; ?>
                                                            <input type="hidden" value="<?php echo $row->consultaPor; ?>" class="consultaPorH">
                                                            <input type="hidden" value="<?php echo $row->presenteEnfermedad; ?>" class="presenteEnfermedadH">
                                                            <input type="hidden" value="<?php echo $row->evolucionEnfermedad; ?>" class="evolucionEnfermedadH">
                                                            <input type="hidden" value="<?php echo $row->paConsulta; ?>" class="paConsultaH">
                                                            <input type="hidden" value="<?php echo $row->fcConsulta; ?>" class="fcConsultaH">
                                                            <input type="hidden" value="<?php echo $row->tempConsulta; ?>" class="tempConsultaH">
                                                            <input type="hidden" value="<?php echo $row->frConsulta; ?>" class="frConsultaH">
                                                            <input type="hidden" value="<?php echo $row->diagnosticoConsulta; ?>" class="diagnosticoConsultaH">
                                                            <input type="hidden" value="<?php echo $row->planConsulta; ?>" class="planConsultaH">
                                                            <input type="hidden" value="<?php echo $row->peso; ?>" class="pesoH">
                                                            <input type="hidden" value="<?php echo $row->altura; ?>" class="alturaH">
                                                            <input type="hidden" value="<?php echo $row->imc; ?>" class="imcH">
                                                            <input type="hidden" value="<?php echo $row->temperaturaPaciente; ?>" class="temperaturaPacienteH">
                                                            <input type="hidden" value="<?php echo $row->presionPaciente; ?>" class="presionPacienteH">
                                                        </td>
                                                        <td><?php echo $row->consultaPor; ?></td>
                                                    </tr>
                                                    <?php }} ?>
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
                                                <td><textarea name="antMedicos" id="antMedicos" class="form-control" cols="30" rows="3"><?php echo $antecedentes->antecedentesMedicos;?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 125px"><strong>ANT. QUIRURGICOS</strong></td>
                                                <td><textarea name="antQuirurgicos" id="antQuirurgicos" class="form-control" cols="30" rows="3"><?php echo $antecedentes->antecedentesQuirurgicos;?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 125px"><strong>ALERGIAS</strong></td>
                                                <td><textarea name="alergias" id="alergias" class="form-control" cols="30" rows="3"><?php echo $antecedentes->antecedentesAlergias;?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 125px"><strong>PARTOS</strong></td>
                                                <td><textarea name="partos" id="partos" class="form-control" cols="30" rows="3"><?php echo $antecedentes->antecedentesPartos;?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 125px"><strong>INGRESOS</strong></td>
                                                <td><textarea name="ingresos" id="ingresos" class="form-control" cols="30" rows="3"><?php echo $antecedentes->antecedentesIngresos;?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 125px"><strong>OTROS</strong></td>
                                                <td><textarea name="otros" id="otros" class="form-control" cols="30" rows="3"><?php echo $antecedentes->antecedentesOtros;?></textarea></td>
                                                <input type="hidden" value="<?php echo $antecedentes->idAntecedentes;?>" id="idPaciente" name="idPaciente">
                                            </tr>

                                            <tr class="text-center">
                                                <td colspan="2"><button type="button" class="btn btn-primary" id="btnGuardarAntecedentes"> <i class="fa fa-save"></i> Guardar</button></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="examanesLaboratorio">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="accordion" id="accordionExample3">
                                                <?php
                                                    $flag = 1;
                                                    foreach ($historial_laboratorio as $row) {
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
                                                                                    <td><a href="#" class="examenFecha">'.$fila->nombreExamen.'</a> <p class="nombre_examen">'.$fila->nombreExamen.'</p> <div class="tabla_examen">'.base64_encode($fila->tablaExamen).'</div> </td>
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
                                        <div class="col-md-1"></div>
                                        <div class="col-md-7 text-center">
                                            <h5 id="nombreExamen"></h5>
                                            <div id="dvHistorialLab"></div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="recetas">
                                    <form action="<?php echo base_url(); ?>Consultas/guardar_receta_medica" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td><strong>FECHA:</strong></td>
                                                        <td><input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control" name="fechaReceta" id="fechaReceta"></td>
                                                        <td><strong>PROXIMA CITA:</strong></td>
                                                        <td><input type="date" value="" class="form-control" name="proximaReceta" id="proximaReceta"></td>
                                                        <td><input type="hidden" value="<?php echo $paciente->idConsulta; ?>" class="form-control" name="consultaActual" id="consultaActual"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            
                                                <div class="col-md-8">
                                                    <div class="historial_receta dvhistorial_receta">
                                                        <table class="table table-borderless"  id="recetaMedica">
                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <input type="text" list="lista_indicaciones" class="form-control mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                </td>
                                                            </tr>
        
                                                        </table>
                                                    </div>

                                                    <div id="dvdDetalle" style="display: none">Detalle</div>

                                                    <datalist id="lista_medicamentos"></datalist>
                                                    <datalist id="lista_indicaciones"></datalist>
                                                </div>
        
                                                <div class="col-md-2">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td><button class="btn btn-outline-primary btn-block" id="indicacionMedica"> <i class="fa fa-plus"></i>Indicación médica</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="#agregarIndicacion" data-toggle="modal" class="btn btn-outline-primary btn-block"> <i class="fa fa-clock"></i>Indicación horario</a href="#agregarIndicacion" data-toggle="modal"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn btn-primary btn-block" id="btnGuardarReceta"> <i class="fa fa-save"></i>Guardar receta</button></td>
                                                        </tr>
                                                    </table>
                                                </div>

                                            <div class="col-md-2 text-center">
                                                <p><strong>HISTORIAL</strong></p>
                                                <div class="table-responsive historial_receta table-md">
                                                    <table class="table table-borderless table-sm">
                                                        <?php 
                                                            foreach ($historial_recetas as $row) {
                                                                if($row->fechaReceta == date("Y-m-d")){
                                                                    echo '<tr class="alert-primary">';
                                                                }else{
                                                                    echo '<tr>';
                                                                }
                                                                echo ' <td>'.$row->fechaReceta.'</td>';
                                                                echo ' <td>
                                                                        <a href="'.base_url().'Consultas/receta_medica/'.$row->idReceta.'" target="_blank" title="Imprimir receta"><i class="fa fa-print text-danger"></i></a>
                                                                        <a href="#" title="Ver receta" class="verReceta"><i class="fa fa-file text-success"></i></a>
                                                                        <input type="hidden" value="'.$row->htmlReceta.'" class="htmlReceta" name="htmlReceta">
                                                                    </td>';
                                                                echo '</tr>';
                                                            }
                                                        ?>
                                                        
                                                        
                                                    </table>
                                                </div>
                                            </div>
                                        </div> 

                                        <input type="hidden" value="<?php echo $paciente->idPaciente; ?>" name="idPaciente">
                                    </form>
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

<!-- Modales -->
    <!-- Modal para agregar datos del Medicamento-->
        <div class="modal fade" id="agregarIndicacion" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Datos de la indicación</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <form class="needs-validation" method="post" action="<?php echo base_url()?>Botiquin/guardar_medida" novalidate>
                                        
                                        <div class="form-row">

                                            <div class="col-md-12 mb-2">
                                                <label for=""><strong>Indicación</strong></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="detalleIndicacion" name="detalleIndicacion" placeholder="Detalle de la indicación" required>
                                                    <div class="invalid-tooltip">
                                                        Ingrese un detalle
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="text-center">
                                            <button class="btn btn-primary mt-4 d-inline w-20" type="button" id="btnHorarioMedicina"><i class="fa fa-save"></i> Guardar </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para agregar datos del Medicamento-->
<!-- Modales -->

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
        $("#btnGuardarReceta").hide();
        $("#contenedorconsultaH").hide();
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

    $(document).on("click", "#btnGuardarAntecedentes", function(e) {
        e.preventDefault();
        var datos = {
            antMedicos : $("#antMedicos").val(),
            antQuirurgicos : $("#antQuirurgicos").val(),
            alergias : $("#alergias").val(),
            partos : $("#partos").val(),
            ingresos : $("#ingresos").val(),
            otros : $("#otros").val(),
            idPaciente : $("#idPaciente").val()
        };

        $.ajax({
            url: "../../guardar_antecedentes_consulta",
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

    $(document).on("click", "#indicacionMedica", function(e) {
        e.preventDefault();
        var html = "";
        html +='<tr>';
        html +='    <td>';
        html +='        <input type="text" class="form-control" name="medicamento[]" placeholder="Medicamento">';
        html +='        <input type="text" class="form-control mt-1" name="indicacion[]"  placeholder="Indicación médica">';
        html +='    </td>';
        html +='</tr>';

        $("#recetaMedica").append(html);


    });

    $(document).on("click", "#btnHorarioMedicina", function(e) {
        e.preventDefault();
        var datos = {
            detalleIndicacion : $("#detalleIndicacion").val()
        };

        $.ajax({
            url: "../../guardar_horario_medicina",
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
                            $("#detalleIndicacion").val("");
                            $("#detalleIndicacion").focus();
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
    
    $(document).on("click", ".verDetalleConsulta", function(e) {
        e.preventDefault();
        var html = '';
        // Creando Contenido
            html += '<div class="row">';
            html += '    <div class="col-md-12">';
            html += '        <div class="row">';
            html += '            <div class="col-md-12 alert-danger">';
            html += '                <table class="table table-borderless table-sm">';
            html += '                    <tr class="text-center">';
            html += '                        <td colspan="5"><strong>DATOS TOMADOS EN EMERGENCIA:</strong></td>';
            html += '                    </tr>';
            html += '                    <tr>';
            html += '                        <td> <strong>Peso: </strong> '+$(this).closest('tr').find('.pesoH').val()+' Kg</td>';
            html += '                        <td> <strong>Altura: </strong>'+$(this).closest('tr').find('.alturaH').val()+' Cm</td>';
            html += '                        <td> <strong>IMC: </strong>'+$(this).closest('tr').find('.imcH').val()+'</td>';
            html += '                        <td> <strong>Presión: </strong>'+$(this).closest('tr').find('.temperaturaPacienteH').val()+'</td>';
            html += '                        <td> <strong>Temperatura: </strong>'+$(this).closest('tr').find('.presionPacienteH').val()+' °C</td>';
            html += '                    </tr>';
            html += '                </table>';
            html += '            </div>';
            html += '            <div class="col-md-12">';
            html += '                <table class="table table-borderless table-sm">';
            html += '                    <tr>';
            html += '                        <td><strong>CONSULTA POR:</strong></td>';
            html += '                    </tr>';
            html += '                    <tr>';
            html += '                        <td><input type="text" value="'+$(this).closest('tr').find('.consultaPorH').val()+'" class="form-control" name="consultaPor" id="consultaPor" readonly></td>';
            html += '                    </tr>';
            html += '                </table>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="row">';
            html += '            <div class="col-md-6 text-center">';
            html += '                <p><strong>PRESENTE ENFERMEDAD</strong></p>';
            html += '                <textarea name="presenteEnfermedad" id="presenteEnfermedad" class="form-control" cols="30" rows="5" readonly>'+$(this).closest('tr').find('.presenteEnfermedadH').val()+'</textarea>';
            html += '            </div>';
            html += '            <div class="col-md-6 text-center">';
            html += '                <p><strong>EVOLUCION</strong></p>';
            html += '                <textarea name="evolucionEnfermedad" id="evolucionEnfermedad" class="form-control" cols="30" rows="5" readonly>'+$(this).closest('tr').find('.evolucionEnfermedadH').val()+'</textarea>';
            html += '            </div>';
            html += '        </div>';
            html += '        <div class="col-md-12">';
            html += '            <div class="row">';
            html += '                <div class="col-md-12">';
            html += '                    <table class="table table-borderless">';
            html += '                        <tr>';
            html += '                            <td><strong>EXAMEN FISICO</strong></td>';
            html += '                            <td>P.A: <input type="text" value="'+$(this).closest('tr').find('.paConsultaH').val()+'"  size="10" readonly></td>';
            html += '                            <td>F.C: <input type="text" value="'+$(this).closest('tr').find('.fcConsultaH').val()+'"  size="10" readonly></td>';
            html += '                            <td>Temp:<input type="text" value="'+$(this).closest('tr').find('.tempConsultaH').val()+'"  size="10" readonly></td>';
            html += '                            <td>FR: <input type="text" value="'+$(this).closest('tr').find('.frConsultaH').val()+'"  size="10" readonly></td>';
            html += '                        </tr>';
            html += '                    </table>';
            html += '                </div>';
            html += '            </div>';
            html += '            <div class="row">';
            html += '                <div class="col-md-6 text-center">';
            html += '                    <p><strong>IMPRESION DIAGNOSTICA</strong></p>';
            html += '                    <table class="table table-borderless">';
            html += '                            <tr>';
            html += '                                <td class="text-left">'+$(this).closest('tr').find('.diagnosticoConsultaH').val()+'</td>';
            html += '                            </tr>';
            html += '                    </table>';
            html += '                </div>';
            html += '                <div class="col-md-6">';
            html += '                    <p><strong>PLAN</strong></p>';
            html += '                    <textarea name="planEnfermedad" id="planEnfermedad" class="form-control" cols="30" rows="8" readonly>'+$(this).closest('tr').find('.planConsultaH').val()+'</textarea>';
            html += '                </div>';
            html += '            </div>';
            html += '        </div>';
            html += '    </div>';
            html += '    </div>';
            html += '</div>';
        // Creando Contenido

        $("#contenedorconsulta").hide();
        $("#contenedorconsultaH").html(html);
        $("#contenedorconsultaH").show();
        
    });
    
    $(document).on("click", ".verDetalleActual", function(e) {
        e.preventDefault();
        $("#contenedorconsulta").show();
        $("#contenedorconsultaH").html("");
        $("#contenedorconsultaH").hide();
        
    });
    
    $(document).on("keyup", ".busquedaMedicamentos", function() {
        $("#lista_medicamentos").html();
        var lista = "";
        var datos = {
            str : $(this).val()
        }

        $.ajax({
            url: "../../buscar_medicamento",
            type: "POST",
            data: datos,
            success:function(respuesta){
                var registro = eval(respuesta);
                if (Object.keys(registro).length > 0){
                    for (let i = 0; i < registro.length; i++) {
                        lista += '<option value="'+registro[i]["nombreMedicamento"]+'">'+registro[i]["nombreMedicamento"]+'</option>';
                    }
                    $("#lista_medicamentos").html(lista);
                }
            }
        });
    });
    
    $(document).on("keyup", ".busquedaIndicaciones", function() {
        $("#lista_indicaciones").html();
        var lista = "";
        var datos = {
            str : $(this).val()
        }

        $.ajax({
            url: "../../buscar_indicaciones",
            type: "POST",
            data: datos,
            success:function(respuesta){
                var registro = eval(respuesta);
                if (Object.keys(registro).length > 0){
                    for (let i = 0; i < registro.length; i++) {
                        lista += '<option value="'+registro[i]["detalleHorario"]+'">'+registro[i]["detalleHorario"]+'</option>';
                    }
                    $("#lista_indicaciones").html(lista);
                }
            }
        });
    });

    $(document).on("change", "#proximaReceta", function() {
        $("#btnGuardarReceta").show();
    });

    $(document).on("click", ".verReceta", function(e) {
        e.preventDefault();
        var html =  '<table class="table table-borderless text-center">';
        html +=  '<tr class="alert-primary"> <td colspan= "2">INFORMACION DE LA RECETA</td> </tr>';
        html +=  $(this).closest('tr').find('.htmlReceta').val();
        html +=  '<tr class="alert-danger"> <td colspan= "2"><a href="#" class="cerrarReceta"><i class="fa fa-times"></i></a></tr>';
        html +=  '</table>';
        
        $("#dvdDetalle").html(html);
        $("#dvdDetalle").show();
        $(".dvhistorial_receta").hide();
    });


    $(document).on("click", ".cerrarReceta", function(e) {
        e.preventDefault();
        $("#dvdDetalle").html("");
        $("#dvdDetalle").hide();
        $(".dvhistorial_receta").show();
    });

    $(document).on("click", ".examenFecha", function(e) {
        e.preventDefault();
        var html = $(this).closest('tr').find('.tabla_examen').html();
        var tabla = checkUTF8(atob(html));
        var nombre = $(this).closest('tr').find('.nombre_examen').html();
        $("#dvHistorialLab").html(tabla);
        $("#nombreExamen").html(nombre);

        // console.log(tabla);
    });

    function checkUTF8(text) {
        var utf8Text = text;
        try {
            // Try to convert to utf-8
            utf8Text = decodeURIComponent(escape(text));
            // If the conversion succeeds, text is not utf-8
        }catch(e) {
            // console.log(e.message); // URI malformed
            // This exception means text is utf-8
        }   
        return utf8Text; // returned text is always utf-8
    }

   /*  $(document).on("click", "#btnGuardarReceta", function(e) {
        e.preventDefault();
        // Obtener todos los pares de inputs
        var detalle = [];
        var datos = [];
        var index = 0;
        var html = "";
        $('.txtMedicamento').each(function(){
            var medicamento = $(this).closest('tr').find('.txtMedicamento').val();
            var indicacion = $(this).closest('tr').find('.txtIndicacion').val();

            
            if(medicamento != '' || indicacion != '') {
                index++;
                html += '<tr>';
                html += '    <td>'+medicamento+'</td>';
                html += '    <td>'+indicacion+'</td>';
                html += '</tr>';
                detalle.push(
                    {
                        medicamento: medicamento,
                        indicacion: indicacion,
                        cadena: medicamento + "-"+ indicacion,
                        consulta : $("#consultaActual").val(),
                        hoy : $("#fechaReceta").val(),
                        proxima : $("#proximaReceta").val()
                    }
                );
            }
        });

        if(detalle.length > 0){

            datos.push(
                {
                    detalle : detalle,
                    consulta : $("#consultaActual").val(),
                    html : html,
                    hoy : $("#fechaReceta").val(),
                    proxima : $("#proximaReceta").val()
                }
            );
            var datosJSON = JSON.stringify(datos);
            $.ajax({
                url: "../../guardar_receta_medica",
                type: "POST",
                data: datosJSON,
                success:function(respuesta){
                    var registro = eval(respuesta);
                    if (Object.keys(registro).length > 0){
                        if(registro.estado == 1){
                            var html = ''
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

            // console.log(datosJSON);

        }

    }); */


</script>

