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
    .ms-panel-body{
        padding: 0px
    }
    .historial{
        height: 150px;
        overflow-y: scroll;
    }

    .form-control, .bordes{
        border: 2px solid #075480;
        font-size: 16px
    }

    .historial_receta {
        height: 380px;
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

    #recetaMedica tr td{
        padding: 0px
    }

    .tabla_examen, .nombre_examen{
        display: none;
    }

    #htmlDetalle .table tr td{
        padding: 1px !important
    }

    .tblReducida  td  {
        padding: 3px 5px 0px 0px;
    }

    #dvPruebasEspeciales, .contenedorExamen, .contenedorExamenQ,
    .contenedorExamenU, .contenedorExamenC, .contenedorExamenV,
    .contenedorExamenB{
        margin: 0 auto;
        margin-bottom: 200px;
        /* border: 1px solid #075480; */
        border-radius: 5px;
        padding: 30px;
        width: 75%;
        box-shadow: #075480 0px 13px 27px -5px, #075480 0px 8px 16px -8px;
    }

</style>


<div class="ms-content-wrapper">
	<div class="row">
		<div class="col-md-12">

			<div class="ms-panel">
				<div class="">
                    <!-- Tabs -->
                       <div class="ms-panel-body clearfix">
                            <ul class="nav nav-tabs d-flex nav-justified mb-1" role="tablist">
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
                                                                    $peso_ideal = ($row->altura) - 100 - ((($row->altura)-150)/4);
                                                                }else{
                                                                    $peso_ideal = ($row->altura) - 100 - ((($row->altura)-150)/2.5);
                                                                }
                                                            // Calculo peso ideal
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $index; ?></td>
                                                            <td class="text-center"><?php echo $row->fechaConsulta; ?></td>
                                                            <td class="text-center"><?php echo ($row->altura); ?> cm</td>
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

                                        <div class="col-md-6">
                                                <div class="col-md-12 bg-danger text-white">
                                                    <div class="datosEnfermeria">
                                                        <table class="table table-borderless table-sm">
                                                            <tr class="text-center">
                                                                <td colspan="5"><strong>SIGNOS VITALES POR ENFERMERIA:</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td> <strong>Peso: </strong><?php echo $paciente->peso; ?> Kg</td>
                                                                <td> <strong>Altura: </strong><?php echo $paciente->altura; ?> m</td>
                                                                <td> <strong>IMC: </strong><?php echo $paciente->imc; ?></td>
                                                                <td> <strong>Presión: </strong><?php echo $paciente->presionPaciente; ?></td>
                                                                <td> <strong>Temperatura: </strong><?php echo $paciente->temperaturaPaciente; ?> °C</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="datosEnfermeriaH"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <table class="table table-borderless table-sm">
                                                        <tr>
                                                            <td><strong>CONSULTA POR:</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" style="width: 400px" value="<?php echo $consulta->consultaPor; ?>" class="form-control bordes" name="consultaPor" id="consultaPor"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <p><strong>PRESENTE ENFERMEDAD</strong></p>
                                                    <textarea name="presenteEnfermedad" id="presenteEnfermedad" class="form-control bordes" cols="30" rows="3"><?php echo $consulta->presenteEnfermedad; ?></textarea>
                                                </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <p><strong>EVOLUCION</strong></p>
                                                    <textarea name="evolucionEnfermedad" id="evolucionEnfermedad" class="form-control bordes" cols="30" rows="11"><?php echo $consulta->evolucionEnfermedad; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="col-md-12">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td><strong>EXAMEN FISICO</strong></td>
                                                        <td>P.A: <input type="text" class=" bordes" value="<?php echo $consulta->paConsulta; ?>"  size="5" class="" name="paConsulta" id="paConsulta"> <span class="font-weight-bold">mm/hg</span> </td>
                                                        <td>F.C: <input type="text" class=" bordes" value="<?php echo $consulta->fcConsulta; ?>"  size="5" class="" name="fcConsulta" id="fcConsulta"> <span class="font-weight-bold">lat/min</span></td>
                                                        <td>Temp: <input type="text" class=" bordes" value="<?php echo $consulta->tempConsulta; ?>"  size="5" class="" name="tempConsulta" id="tempConsulta"> <span class="font-weight-bold">°C</span></td>
                                                        <td>FR: <input type="text" class=" bordes" value="<?php echo $consulta->frConsulta; ?>"  size="5" class="" name="frConsulta" id="frConsulta"> <span class="font-weight-bold">resp/min</span></td>
                                                        <td>SAT: <input type="text" class=" bordes" value="<?php echo $consulta->satConsulta; ?>"  size="5" class="" name="satConsulta" id="satConsulta"> <span class="font-weight-bold">%</span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-12">
                                                <textarea name="examenFisico" id="examenFisico" class="form-control bordes" cols="30" rows="3"><?php echo $consulta->examenFisico; ?></textarea>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <p><strong>IMPRESION DIAGNOSTICA</strong></p>
                                                        <table class="table table-borderless">
                                                                <tr>
                                                                    <td style="padding: 0px"><input type="text" value="<?php echo $consulta->diagnosticoUno; ?>" list="lista_diagnostico" class="form-control bordes impresionEnfermedad" name="diagnosticoUno" id="diagnosticoUno"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding: 0px"><input type="text" value="<?php echo $consulta->diagnosticoDos; ?>" list="lista_diagnostico" class="form-control bordes impresionEnfermedad" name="diagnosticoDos" id="diagnosticoDos"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding: 0px"><input type="text" value="<?php echo $consulta->diagnosticoTres; ?>" list="lista_diagnostico" class="form-control bordes impresionEnfermedad" name="diagnosticoTres" id="diagnosticoTres"></td>
                                                                </tr>
                                                        </table>
    
    
                                                        <datalist id="lista_diagnostico"></datalist>
                                                    </div>
        
                                                    <div class="col-md-6">
                                                        <p><strong>PLAN</strong></p>
                                                        <textarea name="planEnfermedad" id="planEnfermedad" class="form-control bordes" cols="30" rows="4"><?php echo $consulta->planConsulta; ?></textarea>
                                                        <input type="hidden" value="<?php echo $consulta->idDetalleConsulta; ?>" name="idDetalleConsulta" id="idDetalleConsulta">
                                                    </div>

                                                </div>
                                                        
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <p><strong>HISTORIAL</strong></p>
                                            <div class="table-responsive historial">
                                                <table class="table table-borderless table-sm">
                                                    <?php
                                                     foreach ($historial_detalles as $row) {
                                                        if($row->fechaConsulta == date('Y-m-d')){
                                                            echo '<tr class="verDetalleActual alert-primary">
                                                                    <td><strong>'.$row->fechaConsulta.'</strong><input type="hidden" value="'.$row->idConsulta.'" class="idConsultaA"></td>
                                                                    <td>'.$row->consultaPor.'</td>
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
                                                            <input type="hidden" value="<?php echo $row->satConsulta; ?>" class="satConsultaH">
                                                            <input type="hidden" value="<?php echo $row->diagnosticoConsulta; ?>" class="diagnosticoConsultaH">
                                                            <input type="hidden" value="<?php echo $row->planConsulta; ?>" class="planConsultaH">
                                                            <input type="hidden" value="<?php echo $row->peso; ?>" class="pesoH">
                                                            <input type="hidden" value="<?php echo $row->altura; ?>" class="alturaH">
                                                            <input type="hidden" value="<?php echo $row->imc; ?>" class="imcH">
                                                            <input type="hidden" value="<?php echo $row->temperaturaPaciente; ?>" class="temperaturaPacienteH">
                                                            <input type="hidden" value="<?php echo $row->presionPaciente; ?>" class="presionPacienteH">
                                                            <input type="hidden" value="<?php echo $row->examenFisico; ?>" class="examenFisicoH">
                                                            <input type="hidden" value="<?php echo $row->diagnosticoUno; ?>" class="diagnosticoUnoH">
                                                            <input type="hidden" value="<?php echo $row->diagnosticoDos; ?>" class="diagnosticoDosH">
                                                            <input type="hidden" value="<?php echo $row->diagnosticoTres; ?>" class="diagnosticoTresH">
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

`                               </div>

                                <div role="tabpanel" class="tab-pane fade" id="antecedentes">
                                    <div class="row p-3">
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
                                    <!-- Lab -->
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="ms-panel-body clearfix">
                                                    
                                                        <ul class="nav nav-tabs d-flex nav-justified mb-1" role="tablist">
                                                        <li role="presentation"><a href="#hematologia" aria-controls="hematologia" class="active" role="tab" data-toggle="tab" aria-selected="false">Hematología</a></li>
                                                        <li role="presentation"><a href="#quimicaSanguinea" aria-controls="quimicaSanguinea" role="tab" data-toggle="tab" class="" aria-selected="false">Química sanguínea</a></li>
                                                        <li role="presentation"><a href="#urianalisis" aria-controls="urianalisis" role="tab" data-toggle="tab" aria-selected="false">Urianálisis </a></li>
                                                        <li role="presentation"><a href="#coprologia" aria-controls="coprologia" role="tab" data-toggle="tab" aria-selected="false">Coprología </a></li>
                                                        <li role="presentation"><a href="#pruebasEspeciales" aria-controls="pruebasEspeciales" role="tab" data-toggle="tab" aria-selected="false">Pruebas especiales </a></li>
                                                        <li role="presentation"><a href="#bacteriologia" aria-controls="bacteriologia" role="tab" data-toggle="tab" aria-selected="false">Bacteriología </a></li>
                                                        </ul>
                                                    <div class="px-3"> 
                                                        <div class="tab-content">
                                                            <div role="tabpanel" class="tab-pane active show fade in" id="hematologia">
                                                                <div class="row">
                                                                    <div class="col-md-10">
                                                                        <div class="contenedorExamen">
                                                                            
                                                                            <table class="table table-borderless table-sm" style="display: none">
                                                                                <tr>
                                                                                    <td><p class="h6"><strong>Examen: </strong> <span id="spanNombreHematologia"></span></p></td>
                                                                                    <td><p class="h6"><strong>Fecha: </strong> <span id="spanFechaHematologia"></span></p></td>
                                                                                </tr>
                                                                            </table>

                                                                            <table class="table table-bordered thead-primary w-100 text-center table-sm">
                                                                                <thead>
                                                                                    <tr class="bg-primary">
                                                                                        <th>Parametro</th>
                                                                                        <th>Resultado</th>
                                                                                        <th>Valor de referancia</th>
                                                                                    </tr>
                                                                                </thead>
        
                                                                                <tbody id="tbodyHematologia"></tbody>
                                                                            </table>
                                                                        </div>

                                                                        <div class="alert-danger p-5 text-center mt-3 mensajeVacio">
                                                                            <h5>Seleccionar un examen del historial</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 text-center">
                                                                        <p><strong>HISTORIAL</strong></p>
                                                                        <div class="table-responsive historial_receta table-md">
                                                                            <table class="table table-borderless table-sm">
                                                                                <tr>
                                                                                    <td>Fecha</td>
                                                                                    <td>Opcion</td>
                                                                                </tr>
                                                                                <?php 
                                                                                    foreach ($historial_hematologia as $row) {
                                                                                        echo '<tr>';
                                                                                        echo ' <td>'.$row->fechaConsulta.'</td>';
                                                                                        echo ' <td>
                                    
                                                                                                <input type="hidden" class="globulosRojos" value="'.$row->globulosRojos.'">
                                                                                                <input type="hidden" class="eritrosedimentacion" value="'.$row->eritrosedimentacion.'">
                                                                                                <input type="hidden" class="globulosBlancos" value="'.$row->globulosBlancos.'">
                                                                                                <input type="hidden" class="reticulositos" value="'.$row->reticulositos.'">
                                                                                                <input type="hidden" class="hematocrito" value="'.$row->hematocrito.'">
                                                                                                <input type="hidden" class="tpTrombolastina" value="'.$row->tpTrombolastina.'">
                                                                                                <input type="hidden" class="hemoglobina" value="'.$row->hemoglobina.'">
                                                                                                <input type="hidden" class="tSangramiento" value="'.$row->tSangramiento.'">
                                                                                                <input type="hidden" class="vlGMedio" value="'.$row->vlGMedio.'">
                                                                                                <input type="hidden" class="tCoagulacion" value="'.$row->tCoagulacion.'">
                                                                                                <input type="hidden" class="hbGMedia" value="'.$row->hbGMedia.'">
                                                                                                <input type="hidden" class="tProtombina" value="'.$row->tProtombina.'">
                                                                                                <input type="hidden" class="concHbGlobMed" value="'.$row->concHbGlobMed.'">
                                                                                                <input type="hidden" class="neutrofilos" value="'.$row->neutrofilos.'">
                                                                                                <input type="hidden" class="linfocitos" value="'.$row->linfocitos.'">
                                                                                                <input type="hidden" class="eosinofilos" value="'.$row->eosinofilos.'">
                                                                                                <input type="hidden" class="basofilos" value="'.$row->basofilos.'">
                                                                                                <input type="hidden" class="monocitos" value="'.$row->monocitos.'">
                                                                                                <input type="hidden" class="plaquetas" value="'.$row->plaquetas.'">
                                                                                                <input type="hidden" class="observacionesH" value="'.$row->observacionesH.'">
                                                                                                <input type="hidden" class="examenSolicitado" value="'.$row->examenSolicitado.'">
                                                                                                <input type="hidden" class="fechaExamen" value="'.$row->fechaExamen.'">
                                    
                                                                                                <a href="'.base_url().'Laboratorio/hematologia_pdf/'.$row->idHematologia.'" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                                                                <a href="#" title="Ver receta" class="verHematologia"><i class="fa fa-file text-success"></i></a>
                                                                                            </td>';
                                                                                        echo '</tr>';
                                                                                    }
                                                                                ?>
                                                                                
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                        
                                                            <div role="tabpanel" class="tab-pane fade" id="quimicaSanguinea">
                                                                <div class="row">
                                                                    <div class="col-md-10">
                                                                        <div class="contenedorExamenQ">
                                                                            
                                                                            <table class="table table-borderless table-sm" style="display: none">
                                                                                <tr>
                                                                                    <td><p class="h6"><strong>Examen: </strong> <span id="spanNombreQuimica"></span></p></td>
                                                                                    <td><p class="h6"><strong>Fecha: </strong> <span id="spanFechaQuimica"></span></p></td>
                                                                                </tr>
                                                                            </table>

                                                                            <table class="table table-bordered thead-primary w-100 text-center table-sm">
                                                                                <thead>
                                                                                    <tr class="bg-primary">
                                                                                        <th>Parametro</th>
                                                                                        <th>Resultado</th>
                                                                                        <th>Valor de referancia</th>
                                                                                    </tr>
                                                                                </thead>
        
                                                                                <tbody id="tbodyQuimica"></tbody>
                                                                            </table>
                                                                        </div>

                                                                        <div class="alert-danger p-5 text-center mt-3 mensajeVacioQ">
                                                                            <h5>Seleccionar un examen del historial</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 text-center">
                                                                        <p><strong>HISTORIAL</strong></p>
                                                                        <div class="table-responsive historial_receta table-md">
                                                                            <table class="table table-borderless table-sm">
                                                                                <tr>
                                                                                    <td>Fecha</td>
                                                                                    <td>Opcion</td>
                                                                                </tr>
                                                                                <?php 
                                                                                    foreach ($historial_quimica as $row) {
                                                                                        if($row->fechaExamen == date("Y-m-d")){
                                                                                            echo '<tr class="alert-primary">';
                                                                                        }else{
                                                                                            echo '<tr>';
                                                                                        }
                                                                                        echo ' <td>'.$row->fechaExamen.'</td>';
                                                                                        echo ' <td>
                                    
                                                                                                <input type="hidden" class="glucosa" value="'.$row->glucosa.'">
                                                                                                <input type="hidden" class="fosfatasa" value="'.$row->fosfatasa.'">
                                                                                                <input type="hidden" class="glucosaPostPrand" value="'.$row->glucosaPostPrand.'">
                                                                                                <input type="hidden" class="lipasa" value="'.$row->lipasa.'">
                                                                                                <input type="hidden" class="globulina" value="'.$row->globulina.'">
                                                                                                <input type="hidden" class="amilasa" value="'.$row->amilasa.'">
                                                                                                <input type="hidden" class="trigliceridos" value="'.$row->trigliceridos.'">
                                                                                                <input type="hidden" class="indiceAG" value="'.$row->indiceAG.'">
                                                                                                <input type="hidden" class="colesterol" value="'.$row->colesterol.'">
                                                                                                <input type="hidden" class="bilirrubinaD" value="'.$row->bilirrubinaD.'">
                                                                                                <input type="hidden" class="colesterolHDL" value="'.$row->colesterolHDL.'">
                                                                                                <input type="hidden" class="bilirrubinaI" value="'.$row->bilirrubinaI.'">
                                                                                                <input type="hidden" class="colesterolLDL" value="'.$row->colesterolLDL.'">
                                                                                                <input type="hidden" class="albumina" value="'.$row->albumina.'">
                                                                                                <input type="hidden" class="acidoUrico" value="'.$row->acidoUrico.'">
                                                                                                <input type="hidden" class="fosforo" value="'.$row->fosforo.'">
                                                                                                <input type="hidden" class="creatinina" value="'.$row->creatinina.'">
                                                                                                <input type="hidden" class="cloro" value="'.$row->cloro.'">
                                                                                                <input type="hidden" class="nitrogeno" value="'.$row->nitrogeno.'">
                                                                                                <input type="hidden" class="calcio" value="'.$row->calcio.'">
                                                                                                <input type="hidden" class="proteinasT" value="'.$row->proteinasT.'">
                                                                                                <input type="hidden" class="potasio" value="'.$row->potasio.'">
                                                                                                <input type="hidden" class="bilirrubina" value="'.$row->bilirrubina.'">
                                                                                                <input type="hidden" class="sodio" value="'.$row->sodio.'">
                                                                                                <input type="hidden" class="tgo" value="'.$row->tgo.'">
                                                                                                <input type="hidden" class="magnesio" value="'.$row->magnesio.'">
                                                                                                <input type="hidden" class="tgp" value="'.$row->tgp.'">
                                                                                                <input type="hidden" class="fosfatasaA" value="'.$row->fosfatasaA.'">
                                                                                                <input type="hidden" class="observacionesQS" value="'.$row->observacionesQS.'">
                                                                                                <input type="hidden" class="nombreExamen" value="'.$row->nombreExamen.'">
                                                                                                <input type="hidden" class="fechaExamenQ" value="'.$row->fechaExamen.'">
                                    
                                                                                                <a href="'.base_url().'Laboratorio/quimica_pdf/'.$row->idQuimicaSanguinea.'" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                                                                <a href="#" title="Ver receta" class="verQuimica"><i class="fa fa-file text-success"></i></a>
                                                                                            </td>';
                                                                                        echo '</tr>';
                                                                                    }
                                                                                ?>
                                                                                
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                        
                                                            <div role="tabpanel" class="tab-pane fade" id="urianalisis">
                                                                <div class="row">
                                                                    <div class="col-md-10">
                                                                        <div class="contenedorExamenU">
                                                                            
                                                                            <table class="table table-borderless table-sm" style="display: none">
                                                                                <tr>
                                                                                    <td><p class="h6"><strong>Examen: </strong> <span id="spanNombreUrianalisis"></span></p></td>
                                                                                    <td><p class="h6"><strong>Fecha: </strong> <span id="spanFechaUrianalisis"></span></p></td>
                                                                                </tr>
                                                                            </table>

                                                                            <table class="table table-bordered thead-primary w-100 text-center table-sm" id="tbodyUrianalisis"> </table>
                                                                        </div>

                                                                        <div class="alert-danger p-5 text-center mt-3 mensajeVacioU">
                                                                            <h5>Seleccionar un examen del historial</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 text-center">
                                                                        <p><strong>HISTORIAL</strong></p>
                                                                        <div class="table-responsive historial_receta table-md">
                                                                            <table class="table table-borderless table-sm">
                                                                                <tr>
                                                                                    <td>Fecha</td>
                                                                                    <td>Opcion</td>
                                                                                </tr>
                                                                                <?php 
                                                                                    foreach ($historial_urianalisis as $row) {
                                                                                        if($row->fechaExamen == date("Y-m-d")){
                                                                                            echo '<tr class="alert-primary">';
                                                                                        }else{
                                                                                            echo '<tr>';
                                                                                        }
                                                                                        echo ' <td>'.$row->fechaExamen.'</td>';
                                                                                        echo ' <td>
                                    
                                                                                                <input type="hidden" class="color" value="'.$row->color.'">
                                                                                                <input type="hidden" class="aspecto" value="'.$row->aspecto.'">
                                                                                                <input type="hidden" class="reaccion" value="'.$row->reaccion.'">
                                                                                                <input type="hidden" class="densidad" value="'.$row->densidad.'">
                                                                                                <input type="hidden" class="ph" value="'.$row->ph.'">
                                                                                                <input type="hidden" class="glucosa" value="'.$row->glucosa.'">
                                                                                                <input type="hidden" class="proteinas" value="'.$row->proteinas.'">
                                                                                                <input type="hidden" class="pigmentosB" value="'.$row->pigmentosB.'">
                                                                                                <input type="hidden" class="sangreO" value="'.$row->sangreO.'">
                                                                                                <input type="hidden" class="nitritos" value="'.$row->nitritos.'">
                                                                                                <input type="hidden" class="cuerposC" value="'.$row->cuerposC.'">
                                                                                                <input type="hidden" class="acidosBiliares" value="'.$row->acidosBiliares.'">
                                                                                                <input type="hidden" class="granulosos" value="'.$row->granulosos.'">
                                                                                                <input type="hidden" class="cilindrosL" value="'.$row->cilindrosL.'">
                                                                                                <input type="hidden" class="cilindrosH" value="'.$row->cilindrosH.'">
                                                                                                <input type="hidden" class="otrosCilindros" value="'.$row->otrosCilindros.'">
                                                                                                <input type="hidden" class="leucositos" value="'.$row->leucositos.'">
                                                                                                <input type="hidden" class="hematies" value="'.$row->hematies.'">
                                                                                                <input type="hidden" class="celulasE" value="'.$row->celulasE.'">
                                                                                                <input type="hidden" class="elementosM" value="'.$row->elementosM.'">
                                                                                                <input type="hidden" class="bacterias" value="'.$row->bacterias.'">
                                                                                                <input type="hidden" class="levadura" value="'.$row->levadura.'">
                                                                                                <input type="hidden" class="otrosUno" value="'.$row->otrosUno.'">
                                                                                                <input type="hidden" class="otrosDos" value="'.$row->elementosM.'">
                                                                                                <input type="hidden" class="observacionesU" value="'.$row->observacionesU.'">
                                                                                                <input type="hidden" class="nombreExamen" value="'.$row->nombreExamen.'">
                                                                                                <input type="hidden" class="fechaExamen" value="'.$row->fechaExamen.'">
                                    
                                                                                                <a href="'.base_url().'Laboratorio/urianalisis_pdf/'.$row->idUrianalisis.'" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                                                                <a href="#" title="Ver receta" class="verUrianalisis"><i class="fa fa-file text-success"></i></a>
                                                                                            </td>';
                                                                                        echo '</tr>';
                                                                                    }
                                                                                ?>
                                                                                
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                        
                                                            <div role="tabpanel" class="tab-pane fade" id="coprologia">
                                                               <div class="row">
                                                                    <div class="col-md-10">
                                                                        <div class="contenedorExamenC">
                                                                            
                                                                            <table class="table table-borderless table-sm"  style="display: none">
                                                                                <tr>
                                                                                    <td><p class="h6"><strong>Examen: </strong> <span id="spanNombreCoprologia"></span></p></td>
                                                                                    <td><p class="h6"><strong>Fecha: </strong> <span id="spanFechaCoprologia"></span></p></td>
                                                                                </tr>
                                                                            </table>

                                                                            <table class="table table-bordered thead-primary w-100 text-center table-sm" id="tbodyCoprologia"> </table>
                                                                        </div>

                                                                        <div class="alert-danger p-5 text-center mt-3 mensajeVacioC">
                                                                            <h5>Seleccionar un examen del historial</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 text-center">
                                                                        <p><strong>HISTORIAL</strong></p>
                                                                        <div class="table-responsive historial_receta table-md">
                                                                            <table class="table table-borderless table-sm">
                                                                                <tr>
                                                                                    <td>Fecha</td>
                                                                                    <td>Opcion</td>
                                                                                </tr>
                                                                                <?php 
                                                                                    foreach ($historial_coprologia as $row) {
                                                                                        if($row->fechaExamen == date("Y-m-d")){
                                                                                            echo '<tr class="alert-primary">';
                                                                                        }else{
                                                                                            echo '<tr>';
                                                                                        }
                                                                                        echo ' <td>'.$row->fechaExamen.'</td>';
                                                                                        echo ' <td>
                                    
                                                                                                <input type="hidden" class="colorC" value="'.$row->color.'">
                                                                                                <input type="hidden" class="consistencia" value="'.$row->consistencia.'">
                                                                                                <input type="hidden" class="mucus" value="'.$row->mucus.'">
                                                                                                <input type="hidden" class="hematiesC" value="'.$row->hematies.'">
                                                                                                <input type="hidden" class="leucocitos" value="'.$row->leucocitos.'">
                                                                                                <input type="hidden" class="bacteriasC" value="'.$row->bacterias.'">
                                                                                                <input type="hidden" class="levaduras" value="'.$row->levaduras.'">
                                                                                                <input type="hidden" class="restosAM" value="'.$row->restosAM.'">
                                                                                                <input type="hidden" class="otrosUno" value="'.$row->otrosUno.'">
                                                                                                <input type="hidden" class="otrosDosC" value="'.$row->otrosDos.'">
                                                                                                <input type="hidden" class="histolyticaT" value="'.$row->histolyticaT.'">
                                                                                                <input type="hidden" class="histolyticaQ" value="'.$row->histolyticaQ.'">
                                                                                                <input type="hidden" class="ascarisH" value="'.$row->ascarisH.'">
                                                                                                <input type="hidden" class="ascarisL" value="'.$row->ascarisL.'">
                                                                                                <input type="hidden" class="coliT" value="'.$row->coliT.'">
                                                                                                <input type="hidden" class="coliQ" value="'.$row->coliQ.'">
                                                                                                <input type="hidden" class="trinchiuraH" value="'.$row->trinchiuraH.'">
                                                                                                <input type="hidden" class="trinchiuraL" value="'.$row->trinchiuraL.'">
                                                                                                <input type="hidden" class="nanaT" value="'.$row->nanaT.'">
                                                                                                <input type="hidden" class="nanaQ" value="'.$row->nanaQ.'">
                                                                                                <input type="hidden" class="guodH" value="'.$row->guodH.'">
                                                                                                <input type="hidden" class="guodL" value="'.$row->guodL.'">
                                                                                                <input type="hidden" class="mesniliT" value="'.$row->mesniliT.'">
                                                                                                <input type="hidden" class="mesniliQ" value="'.$row->mesniliQ.'">
                                                                                                <input type="hidden" class="vermicH" value="'.$row->vermicH.'">
                                                                                                <input type="hidden" class="vermicL" value="'.$row->vermicL.'">
                                                                                                <input type="hidden" class="lambiaT" value="'.$row->lambiaT.'">
                                                                                                <input type="hidden" class="lambiaQ" value="'.$row->lambiaQ.'">
                                                                                                <input type="hidden" class="stercoH" value="'.$row->stercoH.'">
                                                                                                <input type="hidden" class="stercoL" value="'.$row->stercoL.'">
                                                                                                <input type="hidden" class="hominisT" value="'.$row->hominisT.'">
                                                                                                <input type="hidden" class="hominisQ" value="'.$row->hominisQ.'">
                                                                                                <input type="hidden" class="hymenolepisH" value="'.$row->hymenolepisH.'">
                                                                                                <input type="hidden" class="hymenolepisL" value="'.$row->hymenolepisL.'">
                                                                                                <input type="hidden" class="balantidiumT" value="'.$row->balantidiumT.'">
                                                                                                <input type="hidden" class="balantidiumQ" value="'.$row->balantidiumQ.'">
                                                                                                <input type="hidden" class="taeniasH" value="'.$row->taeniasH.'">
                                                                                                <input type="hidden" class="taeniasL" value="'.$row->taeniasL.'">
                                                                                                <input type="hidden" class="blastocystisT" value="'.$row->blastocystisT.'">
                                                                                                <input type="hidden" class="blastocystisQ" value="'.$row->blastocystisQ.'">
                                                                                                <input type="hidden" class="otrosH" value="'.$row->otrosH.'">
                                                                                                <input type="hidden" class="otrosL" value="'.$row->otrosL.'">
                                                                                                <input type="hidden" class="observacionesC" value="'.$row->observacionesC.'">
                                    
                                                                                                <input type="hidden" class="nombreExamen" value="'.$row->nombreExamen.'">
                                                                                                <input type="hidden" class="fechaExamen" value="'.$row->fechaExamen.'">
                                    
                                                                                                <a href="'.base_url().'Laboratorio/coprologia_pdf/'.$row->idCoprologia.'" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                                                                <a href="#" title="Ver receta" class="verCoprologia"><i class="fa fa-file text-success"></i></a>
                                                                                            </td>';
                                                                                        echo '</tr>';
                                                                                    }
                                                                                ?>
                                                                                
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                        
                                                            <div role="tabpanel" class="tab-pane fade" id="pruebasEspeciales">
                                                                <div class="row">
                                                                    <div class="col-md-10">
                                                                        <div class="contenedorExamenV">
                                                                            
                                                                            <table class="table table-borderless table-sm" style="display: none">
                                                                                <tr>
                                                                                    <td><p class="h6"><strong>Examen: </strong> <span id="spanNombreVarios"></span></p></td>
                                                                                    <td><p class="h6"><strong>Fecha: </strong> <span id="spanFechaVarios"></span></p></td>
                                                                                </tr>
                                                                            </table>

                                                                            <table class="table table-bordered thead-primary w-100 text-center table-sm" id="tbodyVarios"> </table>
                                                                        </div>

                                                                        <div class="alert-danger p-5 text-center mt-3 mensajeVacioV">
                                                                            <h5>Seleccionar un examen del historial</h5>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-2 text-center">
                                                                        <p><strong>HISTORIAL</strong></p>
                                                                        <div class="table-responsive historial_receta table-md">
                                                                            <table class="table table-borderless table-sm">
                                                                                <tr>
                                                                                    <td>Fecha</td>
                                                                                    <td>Opcion</td>
                                                                                </tr>
                                                                                <?php 
                                                                                    foreach ($historial_varios as $row) {
                                                                                        if($row->fechaExamen == date("Y-m-d")){
                                                                                            echo '<tr class="alert-primary">';
                                                                                        }else{
                                                                                            echo '<tr>';
                                                                                        }
                                                                                        echo ' <td>'.$row->fechaExamen.'</td>';
                                                                                        echo ' <td>
                                    
                                                                                                <input type="hidden" class="encabezadoVarios" value="'.$row->encabezadoVarios.'">
                                                                                                <input type="hidden" class="detalleVarios" value="'.$row->detalleVarios.'">
                                                                                                <input type="hidden" class="nombreExamen" value="'.$row->nombreExamen.'">
                                                                                                <input type="hidden" class="fechaExamen" value="'.$row->fechaExamen.'">
                                                                                                <input type="hidden" class="idVarios" value="'.$row->idVarios.'">
                                    
                                                                                                <a href="'.base_url().'Laboratorio/varios_lab_pdf/'.$row->idVarios.'" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                                                                <a href="#" title="Ver examen" class="verVarios"><i class="fa fa-file text-success"></i></a>
                                                                                            </td>';
                                                                                        echo '</tr>';
                                                                                    }
                                                                                ?>
                                                                                
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                        
                                                            <div role="tabpanel" class="tab-pane fade" id="bacteriologia">
                                                                <div class="row">
                                                                    <div class="col-md-10">
                                                                        <div class="contenedorExamenB">
                                                                            <table class="table table-borderless table-sm" style="display: none">
                                                                                <tr>
                                                                                    <td><p class="h6"><strong>Examen: </strong> <span id="spanNombreBacteriologia"></span></p></td>
                                                                                    <td><p class="h6"><strong>Fecha: </strong> <span id="spanFechaBacteriologia"></span></p></td>
                                                                                </tr>
                                                                            </table>

                                                                            <p style="font-size: 12px; color: #075480; margin-top: 25px" id="nombreExamenB"><strong></strong></p>
                                                                            <p style="font-size: 12px; color: #075480; margin-top: 25px" id="resultadoExamenB"><strong></strong></p>
                                                                            <p style="font-size: 12px; color: #075480; margin-top: 25px" id="seAislaB"><strong></strong></p>

                                                                            <table class="table table-bordered thead-primary w-100 text-center table-sm">
                                                                                <thead>
                                                                                    <tr style="background: #075480;">
                                                                                        <th> Parametro </th>
                                                                                        <th> Resultado </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="tbodyBacteriologia"></tbody>
                                                                            </table>
                                                                        </div>

                                                                        <div class="alert-danger p-5 text-center mt-3 mensajeVacioB">
                                                                            <h5>Seleccionar un examen del historial</h5>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 text-center">
                                                                        <p><strong>HISTORIAL</strong></p>
                                                                        <div class="historial_receta">
                                                                            <table class="table table-borderless table-sm">
                                                                                <tr>
                                                                                    <td>Fecha</td>
                                                                                    <td>Opcion</td>
                                                                                </tr>
                                                                                <?php 
                                                                                    foreach ($historial_bacteriologia as $row) {
                                                                                        echo '<tr' . ($row->fechaExamen == date("Y-m-d") ? ' class="alert-primary"' : '') . '>';
                                                                                        echo '<td>' . $row->fechaExamen . '</td>';
                                                                                        echo  '<td>
                                                                                            <input type="hidden" class="cefixime" value="' . $row->cefixime . '">
                                                                                            <input type="hidden" class="amikacina" value="' . $row->amikacina . '">
                                                                                            <input type="hidden" class="levofloxacina" value="' . $row->levofloxacina . '">
                                                                                            <input type="hidden" class="ceftriaxona" value="' . $row->ceftriaxona . '">
                                                                                            <input type="hidden" class="azitromicina" value="' . $row->azitromicina . '">
                                                                                            <input type="hidden" class="imipenem" value="' . $row->imipenem . '">
                                                                                            <input type="hidden" class="meropenem" value="' . $row->meropenem . '">
                                                                                            <input type="hidden" class="fosfocil" value="' . $row->fosfocil . '">
                                                                                            <input type="hidden" class="ciprofloxacina" value="' . $row->ciprofloxacina . '">
                                                                                            <input type="hidden" class="penicilina" value="' . $row->penicilina . '">
                                                                                            <input type="hidden" class="vancomicina" value="' . $row->vancomicina . '">
                                                                                            <input type="hidden" class="acidoNalidixico" value="' . $row->acidoNalidixico . '">
                                                                                            <input type="hidden" class="gentamicina" value="' . $row->gentamicina . '">
                                                                                            <input type="hidden" class="nitrofurantoina" value="' . $row->nitrofurantoina . '">
                                                                                            <input type="hidden" class="ceftazimide" value="' . $row->ceftazimide . '">
                                                                                            <input type="hidden" class="cefotaxime" value="' . $row->cefotaxime . '">
                                                                                            <input type="hidden" class="clindamicina" value="' . $row->clindamicina . '">
                                                                                            <input type="hidden" class="trimetropimSulfa" value="' . $row->trimetropimSulfa . '">
                                                                                            <input type="hidden" class="ampicilina" value="' . $row->ampicilina . '">
                                                                                            <input type="hidden" class="piperacilina" value="' . $row->piperacilina . '">
                                                                                            <input type="hidden" class="amoxicilina" value="' . $row->amoxicilina . '">
                                                                                            <input type="hidden" class="claritromicina" value="' . $row->claritromicina . '">
                                                                                            <input type="hidden" class="cefuroxime" value="' . $row->cefuroxime . '">
                                                                                            <input type="hidden" class="cefepime" value="' . $row->cefepime . '">
                                                                                            <input type="hidden" class="metronidazol" value="' . $row->metronidazol . '">
                                                                                            <input type="hidden" class="norfloxacina" value="' . $row->norfloxacina . '">
                                                                                            <input type="hidden" class="tobramicina" value="' . $row->tobramicina . '">
                                                                                            <input type="hidden" class="ertapenem" value="' . $row->ertapenem . '">
                                                                                            <input type="hidden" class="doripenem" value="' . $row->doripenem . '">
                                                                                            <input type="hidden" class="colistin" value="' . $row->colistin . '">
                                                                                            <input type="hidden" class="linezolid" value="' . $row->linezolid . '">
                                                                                            <input type="hidden" class="moxifloxacino" value="' . $row->moxifloxacino . '">
                                                                                            <input type="hidden" class="kanamicina" value="' . $row->kanamicina . '">
                                                                                            <input type="hidden" class="aztreonam" value="' . $row->aztreonam . '">
                                                                                            <input type="hidden" class="cefaclor" value="' . $row->cefaclor . '">
                                                                                            <input type="hidden" class="cefazolina" value="' . $row->cefazolina . '">
                                                                                            <input type="hidden" class="tetraciclina" value="' . $row->tetraciclina . '">
                                                                                            <input type="hidden" class="observacionExamen" value="' . $row->observacionExamen . '">
                                                                                            <input type="hidden" class="nombreExamen" value="' . $row->nombreExamen . '">
                                                                                            <input type="hidden" class="fechaExamen" value="' . $row->fechaExamen . '">
                                                                                            <input type="hidden" class="resultadoExamen" value="' . $row->resultadoExamen . '">
                                                                                            <input type="hidden" class="seAisla" value="' . $row->seAisla . '">
                                                                                            <input type="hidden" class="idBacteriologia" value="' . $row->idBacteriologia . '">
                                                                                            <a href="' . base_url() . 'Laboratorio/bacteriologia_lab_pdf/' . $row->idBacteriologia . '" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                                                            <a href="#" title="Ver examen" class="verBacteriologia"><i class="fa fa-file text-success"></i></a>
                                                                                        </td>';
                                                                                        echo '</tr>';
                                                                                    }
                                                                                ?>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Lab -->
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
                                                        <td><input type="date" value="<?php echo $receta = !is_null($receta_hoy) ? $receta_hoy->proximaReceta : ' '; ?>" class="form-control" name="proximaReceta" id="proximaReceta"></td>
                                                        <td><input type="hidden" value="<?php echo $paciente->idConsulta; ?>" class="form-control" name="consultaActual" id="consultaActual"></td>
                                                        <td><input type="hidden" value="<?php echo $paciente->idMedico; ?>" class="form-control" name="idMedico" id="idMedico"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            
                                                <div class="col-md-8">
                                                    <div class="historial_receta dvhistorial_receta">
                                                        <table class="table table-borderless" id="recetaMedica">
                                                            <?php
                                                            if(!is_null($receta_hoy)){
                                                                $medicamentos = json_decode($receta_hoy->medicamentosReceta);
                                                                if(!is_null($medicamentos)){
                                                                    foreach ($medicamentos as $row) {
                                                                        echo '<tr>
                                                                                <td>
                                                                                    <input type="text" value="'.$row->medicamento.'" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                                    <div class="input-group">
                                                                                        <select value="'.$row->aplicacion.'" name="aplicacion[]" id="" class="mt-1 bordes" style="background: white; width: 150px !important;">
                                                                                            <option value="DAR"'.($row->aplicacion == "DAR" ? " selected" : "").'>DAR</option>
                                                                                            <option value="TOMAR"'.($row->aplicacion == "TOMAR" ? " selected" : "").'>TOMAR</option>
                                                                                            <option value="DILUIR"'.($row->aplicacion == "DILUIR" ? " selected" : "").'>DILUIR</option>
                                                                                        </select>
                                                                                        <input type="text" value="'.$row->indicacion.'" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                                        <input type="text" value="'.$row->medida.'" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">
                                                                                    </div>
                                                                                </td>
                                                                            </tr>';
                                                                    }
                                                            }
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <div class="input-group">

                                                                        <select name="aplicacion[]" id="" class="mt-1 bordes" style="background: white; width: 150px !important;">
                                                                            <option value="DAR">DAR</option>
                                                                            <option value="TOMAR">TOMAR</option>
                                                                            <option value="DILUIR">DILUIR</option>
                                                                        </select>

                                                                        <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                        <input type="text" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <div class="input-group">
                                                                        <select name="aplicacion[]" id="" class="mt-1 bordes" style="background: white; width: 150px !important;">
                                                                            <option value="DAR">DAR</option>
                                                                            <option value="TOMAR">TOMAR</option>
                                                                            <option value="DILUIR">DILUIR</option>
                                                                        </select>
                                                                        <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                        <input type="text" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <div class="input-group">
                                                                        <select name="aplicacion[]" id="" class="mt-1 bordes" style="background: white; width: 150px !important;">
                                                                            <option value="DAR">DAR</option>
                                                                            <option value="TOMAR">TOMAR</option>
                                                                            <option value="DILUIR">DILUIR</option>
                                                                        </select>
                                                                        <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                        <input type="text" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <div class="input-group">
                                                                        <select name="aplicacion[]" id="" class="mt-1 bordes" style="background: white; width: 150px !important;">
                                                                            <option value="DAR">DAR</option>
                                                                            <option value="TOMAR">TOMAR</option>
                                                                            <option value="DILUIR">DILUIR</option>
                                                                        </select>
                                                                        <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                        <input type="text" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <div class="input-group">
                                                                        <select name="aplicacion[]" id="" class="mt-1 bordes" style="background: white; width: 150px !important;">
                                                                            <option value="DAR">DAR</option>
                                                                            <option value="TOMAR">TOMAR</option>
                                                                            <option value="DILUIR">DILUIR</option>
                                                                        </select>
                                                                        <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                        <input type="text" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">
                                                                    </div>
                                                                </td>
                                                            </tr>
        
                                                        </table>

                                                    </div>
                                                    <input type="text" value="<?php echo @$receta_hoy->indicacionLibre; ?>" class="form-control p-3" list="indicacion_extra" placeholder="Indicación extra" name="indicacionLibre" id="indicacionLibre">

                                                    <div id="dvdDetalle" style="display: none">Detalle</div>

                                                    <datalist id="lista_medicamentos"></datalist>
                                                    <datalist id="lista_indicaciones"></datalist>
                                                    <datalist id="lista_medidas"></datalist>
                                                    <datalist id="indicacion_extra"></datalist>
                                                </div>
        
                                                <div class="col-md-2">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td><button class="btn btn-outline-primary btn-block" id="indicacionMedica"> <i class="fa fa-plus"></i>Nuevo</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="#agregarIndicacion" data-toggle="modal" class="btn btn-outline-primary btn-block"> <i class="fa fa-clock"></i>Indicación médica</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="#agregarCantidad" data-toggle="modal" class="btn btn-outline-primary btn-block"> <i class="fa fa-plus"></i>Agregar cantidad</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="#indicacionExtra" data-toggle="modal" class="btn btn-outline-primary btn-block"> <i class="fa fa-plus"></i>Indicación libre</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><button class="btn btn-primary btn-block" id="btnGuardarReceta"> <i class="fa fa-save"></i>Guardar extra</button></td>
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
                                                                        <input type="hidden" value="'.base64_encode($row->medicamentosReceta).'" class="medicamentosReceta">
                                                                        <input type="hidden" value="'.$row->idReceta.'" class="idReceta">
                                                                        <input type="hidden" value="'.$row->proximaReceta.'" class="proximaReceta">
                                                                        <input type="hidden" value="'.$row->indicacionLibre.'" class="indicacionLibre">
                                                                        <input type="hidden" value="'.$row->fechaReceta.'" class="fechaReceta">
                                                                    </td>';
                                                                echo '</tr>';
                                                            }
                                                        ?>
                                                        
                                                        
                                                    </table>
                                                </div>
                                            </div>
                                        </div> 

                                        <input type="hidden" value="<?php echo $receta = !is_null($receta_hoy) ? $receta_hoy->idReceta : '0'; ?>" id="idRecetaActual" name="idReceta">
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

    <!-- Modal para agregar cantidades-->
        <div class="modal fade" id="agregarCantidad" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                <label for="" class="h6 mt-3"><strong>Cantidad</strong></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="cantidadMedicamento" name="cantidadMedicamento" placeholder="Cantidad del medicamento" required>
                                                    <div class="invalid-tooltip">
                                                        Ingrese una cantidad
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="text-center">
                                            <button class="btn btn-primary mt-4 d-inline w-20" type="button" id="btnCantidadMedicamento"><i class="fa fa-save"></i> Guardar </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para agregar cantidades-->

    <!-- Modal para indicacion extra-->
        <div class="modal fade" id="indicacionExtra" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <form class="needs-validation" method="post" action="<?php echo base_url()?>Botiquin/guardar_indicacion_extra" novalidate>
                                        
                                        <div class="form-row">

                                            <div class="col-md-12 mb-2">
                                                <label for="" class="h6 mt-3"><strong>Cantidad</strong></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="txtIndicacionExtra" name="txtIndicacionExtra" placeholder="Detalle de la indicación" required>
                                                    <div class="invalid-tooltip">
                                                        Ingrese un detalle
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="text-center">
                                            <button class="btn btn-primary mt-4 d-inline w-20" type="button" id="btnIndicacionExtra"><i class="fa fa-save"></i> Guardar </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para indicacion extra-->
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
        $(".contenedorExamen, .contenedorExamenQ, .contenedorExamenU, .contenedorExamenC, .contenedorExamenV, .contenedorExamenB").hide();
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
            satConsulta: $("#satConsulta").val(),
            examenFisico: $("#examenFisico").val(),
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
       /*  html +='<tr>';
        html +='    <td>';
        html +='        <input type="text" class="form-control" name="medicamento[]" placeholder="Medicamento">';
        html +='        <input type="text" class="form-control mt-1" name="indicacion[]"  placeholder="Indicación médica">';
        html +='    </td>';
        html +='</tr>'; */
        html +='<tr>';
        html +='    <td>';
        html +='        <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">';
        html +='        <div class="input-group">';
        html +='            <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">';
        html +='            <input type="text" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">';
        html +='        </div>';
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

    $(document).on("click", "#btnCantidadMedicamento", function(e) {
        e.preventDefault();
        var datos = {
            cantidadMedicamento : $("#cantidadMedicamento").val()
        };

        $.ajax({
            url: "../../guardar_cantidad_medicamento",
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
                            $("#cantidadMedicamento").val("");
                            $("#cantidadMedicamento").focus();
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

    $(document).on("click", "#btnIndicacionExtra", function(e) {
        e.preventDefault();
        var datos = {
            cantidadMedicamento : $("#txtIndicacionExtra").val()
        };

        $.ajax({
            url: "../../guardar_indicacion_extra",
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
                            $("#txtIndicacionExtra").val("");
                            $("#txtIndicacionExtra").focus();
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
        var html = "";
        $("#consultaPor").val($(this).closest('tr').find('.consultaPorH').val());
        $("#presenteEnfermedad").val($(this).closest('tr').find('.presenteEnfermedadH').val());
        $("#evolucionEnfermedad").val($(this).closest('tr').find('.evolucionEnfermedadH').val());
        $("#paConsulta").val($(this).closest('tr').find('.paConsultaH').val());
        $("#fcConsulta").val($(this).closest('tr').find('.fcConsultaH').val());
        $("#tempConsulta").val($(this).closest('tr').find('.tempConsultaH').val());
        $("#frConsulta").val($(this).closest('tr').find('.frConsultaH').val());
        $("#satConsulta").val($(this).closest('tr').find('.satConsultaH').val());
        $("#examenFisico").val($(this).closest('tr').find('.examenFisicoH').val());
        $("#planEnfermedad").val($(this).closest('tr').find('.planConsultaH').val());
        $("#diagnosticoUno").val($(this).closest('tr').find('.diagnosticoUnoH').val());
        $("#diagnosticoDos").val($(this).closest('tr').find('.diagnosticoDosH').val());
        $("#diagnosticoTres").val($(this).closest('tr').find('.diagnosticoTresH').val());

        html += '<table class="table table-borderless table-sm">';
        html += '    <tbody><tr class="text-center">';
        html += '        <td colspan="5"><strong>SIGNOS VITALES POR ENFERMERIA:</strong></td>';
        html += '    </tr>';
        html += '    <tr>';
        html += '        <td> <strong>Peso: </strong>'+$(this).closest('tr').find('.pesoH').val()+' Kg</td>';
        html += '        <td> <strong>Altura: </strong>'+$(this).closest('tr').find('.alturaH').val()+' Cm</td>';
        html += '        <td> <strong>IMC: </strong>'+$(this).closest('tr').find('.imcH').val()+'</td>';
        html += '        <td> <strong>Presión: </strong>'+$(this).closest('tr').find('.presionPacienteH').val()+'</td>';
        html += '        <td> <strong>Temperatura: </strong>'+$(this).closest('tr').find('.temperaturaPacienteH').val()+'°C</td>';
        html += '    </tr>';
        html += '</tbody></table>';

        $("#btnGuardarDetalleConsulta").hide();
        $(".datosEnfermeria").hide();
        $(".datosEnfermeriaH").html(html);
        $(".datosEnfermeriaH").show();
        
    });

    $(document).on("click", ".verDetalleActual", function(e) {
        e.preventDefault();
        var datos = {
            id : $(this).closest('tr').find('.idConsultaA').val()
        }
        $.ajax({
            url: "../../obtener_detalle_actual",
            type: "POST",
            data: datos,
            success:function(respuesta){
                var registro = eval(respuesta);
                for (let i = 0; i < registro.length; i++) {
                    var html = "";
                    $("#consultaPor").val(registro[i]["consultaPor"]);
                    $("#presenteEnfermedad").val(registro[i]["presenteEnfermedad"]);
                    $("#evolucionEnfermedad").val(registro[i]["evolucionEnfermedad"]);
                    $("#paConsulta").val(registro[i]["paConsulta"]);
                    $("#fcConsulta").val(registro[i]["fcConsulta"]);
                    $("#tempConsulta").val(registro[i]["tempConsulta"]);
                    $("#frConsulta").val(registro[i]["frConsulta"]);
                    $("#satConsulta").val(registro[i]["satConsulta"]);
                    $("#examenFisico").val(registro[i]["examenFisico"]);
                    $("#planEnfermedad").val(registro[i]["planConsulta"]);
                    $("#diagnosticoUno").val(registro[i]["diagnosticoUno"]);
                    $("#diagnosticoDos").val(registro[i]["diagnosticoDos"]);
                    $("#diagnosticoTres").val(registro[i]["diagnosticoTres"]);

                    $("#btnGuardarDetalleConsulta").show();
                    $(".datosEnfermeria").show();
                    $(".datosEnfermeriaH").html();
                    $(".datosEnfermeriaH").hide();
                }
            }
        });

        
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

    $(document).on("keyup", ".busquedaMedidas", function() {
        $("#lista_indicaciones").html();
        var lista = "";
        var datos = {
            str : $(this).val()
        }

        $.ajax({
            url: "../../buscar_cantidades",
            type: "POST",
            data: datos,
            success:function(respuesta){
                var registro = eval(respuesta);
                if (Object.keys(registro).length > 0){
                    for (let i = 0; i < registro.length; i++) {
                        lista += '<option value="'+registro[i]["detalleCantidad"]+'">'+registro[i]["detalleCantidad"]+'</option>';
                    }
                    $("#lista_medidas").html(lista);
                }
            }
        });
    });

    $(document).on("keyup", "#indicacionLibre", function() {
        $("#lista_indicaciones").html();
        var lista = "";
        var datos = {
            str : $(this).val()
        }

        $.ajax({
            url: "../../buscar_indicacion_extra",
            type: "POST",
            data: datos,
            success:function(respuesta){
                var registro = eval(respuesta);
                if (Object.keys(registro).length > 0){
                    for (let i = 0; i < registro.length; i++) {
                        lista += '<option value="'+registro[i]["detalleIndicacionExtra"]+'">'+registro[i]["detalleIndicacionExtra"]+'</option>';
                    }
                    $("#indicacion_extra").html(lista);
                }
            }
        });
    });

    $(document).on("change", "#proximaReceta", function() {
        $("#btnGuardarReceta").show();

        var datos = {
            fecha : $(this).val(),
            medico : $("#idMedico").val()
        }

        $.ajax({
            url: "../../validar_fecha",
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
                            $("#proximaReceta").val("");
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
                        $("#proximaReceta").val("");

                    }
            }
        });


    });

    $(document).on("click", ".verReceta", function(e) {
        e.preventDefault();
        var medicamentosReceta =  atob($(this).closest('tr').find('.medicamentosReceta').val());
        $("#proximaReceta").val($(this).closest('tr').find('.proximaReceta').val());
        $("#idRecetaActual").val($(this).closest('tr').find('.idReceta').val());
        $("#indicacionLibre").val($(this).closest('tr').find('.indicacionLibre').val());
        $("#fechaReceta").val($(this).closest('tr').find('.fechaReceta').val());


        var valores = JSON.parse(medicamentosReceta);
        
        var html = '';
        if(Array.isArray(valores)){
            valores.forEach(medicamento => {
                html += '<tr>';
                html += '    <td>';
                html += '        <input type="text" value="'+medicamento.medicamento+'" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">';
                html += '        <div class="input-group">';
                html += '            <select name="aplicacion[]" id="" class="mt-1 bordes" style="background: white; width: 150px !important;">';
                html += '                <option value="DAR"'+(medicamento.aplicacion === "DAR" ? " selected" : "")+'>DAR</option>';
                html += '                <option value="TOMAR"'+(medicamento.aplicacion === "TOMAR" ? " selected" : "")+'>TOMAR</option>';
                html += '                <option value="DILUIR"'+(medicamento.aplicacion === "DILUIR" ? " selected" : "")+'>DILUIR</option>';
                html += '            </select>';
                html += '            <input type="text" value="'+medicamento.indicacion+'" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">';
                html += '            <input type="text" value="'+medicamento.medida+'" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">';
                html += '        </div>';
                html += '    </td>';
                html += '</tr>';
            });
            $("#recetaMedica").html(html);
            /* $("#dvdDetalle").show();
            $(".dvhistorial_receta").hide(); */
            
        }else{
            console.log(typeof(valores));
            console.log("medicamentosReceta");

        }
        




        /* var html =  '<table class="table table-borderless text-center">';
        html +=  '<tr class="alert-primary"> <td colspan= "3">INFORMACION DE LA RECETA</td> </tr>';
        html +=  $(this).closest('tr').find('.htmlReceta').val();
        html +=  '<tr class="alert-danger"> <td colspan= "3"><a href="#" class="cerrarReceta"><i class="fa fa-times"></i></a></tr>';
        html +=  '</table>'; */
        
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

<script>
    $(document).ready(function() {
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

        if($("#proximaReceta").val() != ""){
            $("#btnGuardarReceta").show();
        }

    });
</script>

<script>
    $(document).on("click", ".verHematologia", function(e){
        e.preventDefault();
       var html = "";
       var nombreExamen =  $(this).closest('tr').find('.examenSolicitado').val();
       var fechaExamen = $(this).closest('tr').find('.fechaExamen').val();
       var globulosRojos = $(this).closest('tr').find('.globulosRojos').val();
       var eritrosedimentacion = $(this).closest('tr').find('.eritrosedimentacion').val();
       var globulosBlancos = $(this).closest('tr').find('.globulosBlancos').val();
       var reticulositos = $(this).closest('tr').find('.reticulositos').val();
       var hematocrito = $(this).closest('tr').find('.hematocrito').val();
       var tpTrombolastina = $(this).closest('tr').find('.tpTrombolastina').val();
       var hemoglobina = $(this).closest('tr').find('.hemoglobina').val();
       var tSangramiento = $(this).closest('tr').find('.tSangramiento').val();
       var vlGMedio = $(this).closest('tr').find('.vlGMedio').val();
       var tCoagulacion = $(this).closest('tr').find('.tCoagulacion').val();
       var hbGMedia = $(this).closest('tr').find('.hbGMedia').val();
       var tProtombina = $(this).closest('tr').find('.tProtombina').val();
       var concHbGlobMed = $(this).closest('tr').find('.concHbGlobMed').val();
       var neutrofilos = $(this).closest('tr').find('.neutrofilos').val();
       var linfocitos = $(this).closest('tr').find('.linfocitos').val();
       var eosinofilos = $(this).closest('tr').find('.eosinofilos').val();
       var basofilos = $(this).closest('tr').find('.basofilos').val();
       var monocitos = $(this).closest('tr').find('.monocitos').val();
       var plaquetas = $(this).closest('tr').find('.plaquetas').val();
       var observacionesH =  $(this).closest('tr').find('.observacionesH').val();

       
       // Datos
        if(globulosRojos != ""){
                html += '<tr> '
                html += '  <td><strong class="">Globulos rojos</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+globulosRojos+' X mm3</td>';
                html += '  <td style="text-align: center; font-weight: bold">3,960,000-5,500,000 X mm3</td>';
                html += '</tr>';
        }

        if(globulosBlancos != ""){
                html += '<tr> '
                html += '  <td><strong class="">Globulos blancos</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+globulosBlancos+' X mm3</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 5,000-10,000 X mm3 </td>';
                html += '</tr>';
        }

        if(hematocrito != ""){
                html += '<tr> '
                html += '  <td><strong class="">Hematocrito</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+hematocrito+'  %</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 36-50% </td>';
                html += '</tr>';
        }

        if(hemoglobina != ""){
                html += '<tr> '
                html += '  <td><strong class="">Hemoglobina</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+hemoglobina+'  g%</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 12-16.6 g% </td>';
                html += '</tr>';
        }

        if(vlGMedio != ""){
                html += '<tr> '
                html += '  <td><strong class="">Vl. globular medio</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+vlGMedio+' micras3</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 90.9-92.7 micras3 </td>';
                html += '</tr>';
        }

        if(hbGMedia != ""){
                html += '<tr> '
                html += '  <td><strong class="">Hb. globular media</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+hbGMedia+'  micras3</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 90.9-92.7 micras3 </td>';
                html += '</tr>';
        }

        if(concHbGlobMed != ""){
                html += '<tr> '
                html += '  <td><strong class="">Conc. HB. Glob. Med</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+concHbGlobMed+' %</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 33-33.5% </td>';
                html += '</tr>';
        }


        if(neutrofilos != ""){
                html += '<tr> '
                html += '  <td><strong class="">Neutrofilos</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+neutrofilos+' %</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 40-70% </td>';
                html += '</tr>';
        }

        if(linfocitos != ""){
                html += '<tr> '
                html += '  <td><strong class="">Linfocitos</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+linfocitos+' %</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 20-40%</td>';
                html += '</tr>';
        }

        if(eosinofilos != ""){
                html += '<tr> '
                html += '  <td><strong class="">Eosinofilos</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+eosinofilos+' %</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 1-4% </td>';
                html += '</tr>';
        }

        if(basofilos != ""){
                html += '<tr> '
                html += '  <td><strong class="">Basofilos</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+basofilos+'  %</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 0-1% </td>';
                html += '</tr>';
        }

        if(monocitos != ""){
                html += '<tr> '
                html += '  <td><strong class="">Monocitos</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+monocitos+' %</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 2-5% </td>';
                html += '</tr>';
        }

        if(plaquetas != ""){
                html += '<tr> '
                html += '  <td><strong class="">Plaquetas</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+plaquetas+' X mm3</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 150,000-400,000 X mm3 </td>';
                html += '</tr>';
        }

        if(eritrosedimentacion != ""){
                html += '<tr> '
                html += '  <td><strong class="">Eritrosedimentación</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+eritrosedimentacion+' 1-20mm/hr</td>';
                html += '  <td style="text-align: center;  font-weight: bold">1-20mm/hr</td>';
                html += '</tr>';
        }

        if(reticulositos != ""){
                html += '<tr> '
                html += '  <td><strong class="">Reticulositos</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+reticulositos+' %</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 0.5-1.5% </td>';
                html += '</tr>';
        }

        if(tpTrombolastina != ""){
                html += '<tr> '
                html += '  <td><strong class="">T.P Trombolastina</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+tpTrombolastina+' Seg.</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 22-38 Seg. </td>';
                html += '</tr>';
        }

        if(tSangramiento != ""){
                html += '<tr> '
                html += '  <td><strong class="">T. de sangramiento</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+tSangramiento+' Min.</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 1-3 Minutos </td>';
                html += '</tr>';
        }
        if(tCoagulacion != ""){
                html += '<tr> '
                html += '  <td><strong class="">T. de coagulacion</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+tCoagulacion+' Min.</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 5-10 Minutos </td>';
                html += '</tr>';
        }

        if(tProtombina != ""){
                html += '<tr> '
                html += '  <td><strong class="">T. Protombina</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold">'+tProtombina+' Seg.</td>';
                html += '  <td style="text-align: center;  font-weight: bold"> 13-17 Seg </td>';
                html += '</tr>';
        }

        if(observacionesH != ""){
                html += '<tr> '
                html += '  <td><strong class="">Observaciones</strong></td>';
                html += '  <td style="text-align: center; font-weight: bold" colspan=2>'+observacionesH+'</td>';
                html += '</tr>';
        }
       // Datos
       $("#tbodyHematologia").html(html);
       $("#spanNombreHematologia").html(nombreExamen);
       $("#spanFechaHematologia").html(fechaExamen);
       $(".mensajeVacio").hide();
       $(".contenedorExamen").show();
       
    });

    $(document).on("click", ".verQuimica", function(e){
        e.preventDefault();
        var html = "";

        nombreExamen =  $(this).closest('tr').find('.nombreExamen').val();
        fechaExamenQ = $(this).closest('tr').find('.fechaExamenQ').val();

        glucosa = $(this).closest('tr').find('.glucosa').val();
        fosfatasa = $(this).closest('tr').find('.fosfatasa').val();
        glucosaPostPrand = $(this).closest('tr').find('.glucosaPostPrand').val();
        lipasa = $(this).closest('tr').find('.lipasa').val();
        globulina = $(this).closest('tr').find('.globulina').val();
        amilasa = $(this).closest('tr').find('.amilasa').val();
        trigliceridos = $(this).closest('tr').find('.trigliceridos').val();
        indiceAG = $(this).closest('tr').find('.indiceAG').val();
        colesterol = $(this).closest('tr').find('.colesterol').val();
        bilirrubinaD = $(this).closest('tr').find('.bilirrubinaD').val();
        colesterolHDL = $(this).closest('tr').find('.colesterolHDL').val();
        bilirrubinaI = $(this).closest('tr').find('.bilirrubinaI').val();
        colesterolLDL = $(this).closest('tr').find('.colesterolLDL').val();
        albumina = $(this).closest('tr').find('.albumina').val();
        acidoUrico = $(this).closest('tr').find('.acidoUrico').val();
        fosforo = $(this).closest('tr').find('.fosforo').val();
        creatinina = $(this).closest('tr').find('.creatinina').val();
        cloro = $(this).closest('tr').find('.cloro').val();
        nitrogeno = $(this).closest('tr').find('.nitrogeno').val();
        calcio = $(this).closest('tr').find('.calcio').val();
        proteinasT = $(this).closest('tr').find('.proteinasT').val();
        potasio = $(this).closest('tr').find('.potasio').val();
        bilirrubina = $(this).closest('tr').find('.bilirrubina').val();
        sodio = $(this).closest('tr').find('.sodio').val();
        tgo = $(this).closest('tr').find('.tgo').val();
        magnesio = $(this).closest('tr').find('.magnesio').val();
        tgp = $(this).closest('tr').find('.tgp').val();
        fosfatasaA = $(this).closest('tr').find('.fosfatasaA').val();
        observacionesQS = $(this).closest('tr').find('.observacionesQS').val();

        // Valores
            if(glucosa != ""){
                html += '<tr>';
                html +=   '      <td><strong>Glucosa</strong></td>';
                html +=   '      <td style="text-align: center; font-weight: bold">'+glucosa+' mg/dl</td>';
                html +=    '     <td style="text-align: center; font-weight: bold">55-110 mg/dl</td>';
                html +=    '</tr>';
            }
            if(glucosaPostPrand != ""){
                html += '<tr>';
                html += '        <td><strong>Glucosa Post-Prand</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+glucosaPostPrand+'</td>';
                html += '        <td style="text-align: center; font-weight: bold">--</td>';
                html += '    </tr>';
            }
            if(globulina != ""){
                html += ' <tr>';
                html += '        <td><strong>Globulina</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+globulina+' g/dl</td>';
                html += '        <td style="text-align: center; font-weight: bold">2.3-3.4 g/dl</td>';
                html += '    </tr>';
            }
            if(trigliceridos != ""){
                html += ' <tr>';
                html += '        <td><strong>Trigliceridos</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+trigliceridos+' mg/dl</td>';
                html += '        <td style="text-align: center; font-weight: bold">Hasta 15 mg/dl</td>';
                html += '    </tr>';
            }
            if(colesterol != ""){
                html += '<tr>';
                html += '        <td><strong>Colesterol</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+colesterol+' mg/dl</td>';
                html += '        <td style="text-align: center; font-weight: bold">Hasta 200 mg/dl</td>';
                html += '    </tr>';
            }
            if(colesterolHDL != ""){
                html += '<tr>';
                html += '        <td><strong>Colesterol H.D.L</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+colesterolHDL+' mg/dl</td>';
                html += '        <td style="text-align: center; font-weight: bold">35-65 mg/dl</td>';
                html += '    </tr>';
            }
            if(colesterolLDL != ""){
                html += '<tr>';
                html += '        <td><strong>Colesterol L.D.L</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+colesterolLDL+' mg/dl</td>';
                html += '        <td style="text-align: center; font-weight: bold">Hasta 150 mg/dl</td>';
                html += '    </tr>';
            }
            if(acidoUrico != ""){
                html += '<tr>';
                html += '        <td><strong>Ácido Úrico</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+acidoUrico+' mg/dl</td>';
                html += '        <td style="text-align: center; font-weight: bold">2.5-7.0 mg/dl</td>';
                html += '    </tr>';
            }
            if(creatinina != ""){
                html += '<tr>';
                html += '        <td><strong>Creatinina</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+creatinina+' mg/dl</td>';
                html += '        <td style="text-align: center; font-weight: bold">0.7-1.4 mg/dl</td>';
                html += '    </tr>';
            }
            if(nitrogeno != ""){
                html += '<tr>';
                html += '        <td><strong>Nitrógeno</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+nitrogeno+' mg/dl</td>';
                html += '        <td style="text-align: center; font-weight: bold">4.7-22.5 mg/dl</td>';
                html += '    </tr>';
            }
            if(proteinasT != ""){
                html += '<tr>';
                html += '        <td><strong>Proteinas totales</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+proteinasT+' g/dl</td>';
                html += '        <td style="text-align: center; font-weight: bold">6.7-8.7 g/dl</td>';
                html += '    </tr>';
            }
            if(bilirrubina != ""){
                html += '<tr>';
                html += '        <td><strong>Bilirrubina</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+bilirrubina+' mg/dl</td>';
                html += '        <td style="text-align: center; font-weight: bold">Hasta 1.1 mg/dl</td>';
                html += '    </tr>';
            }
            if(tgo != ""){
                html += '<tr>';
                html += '        <td><strong>T.G.O</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+tgo+' U/L</td>';
                html += '        <td style="text-align: center; font-weight: bold">Menos de 38 U/L</td>';
                html += '    </tr>';
            }
            if(tgp != ""){
                html += '<tr>';
                html += '        <td><strong>T.G.P</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold">'+tgp+' U/L</td>';
                html += '        <td style="text-align: center; font-weight: bold">Menos de 40 U/L</td>';
                html += '    </tr>';
            }

            if(fosfatasa != ""){
                html += '<tr>';
                html += '         <td><strong>Fosfatasa acida Prost.</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+fosfatasa+' U/L</td>';
                html += '         <td style="text-align: center; font-weight: bold">Menos 1.7 U/L</td>';
                html += '     </tr>';
            }
            
            if(lipasa != ""){
                html += '<tr>';
                html += '         <td><strong>Lipasa</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+lipasa+' U/L</td>';
                html += '         <td style="text-align: center; font-weight: bold">Menos de 38 U/L</td>';
                html += '     </tr>';
            }
            
            if(amilasa != ""){
                html += '<tr>';
                html += '         <td><strong>Amilasa</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+amilasa+' U/L</td>';
                html += '         <td style="text-align: center; font-weight: bold">Menos de 90 U/L</td>';
                html += '     </tr>';
            }
            
            if(indiceAG != ""){
                html += ' <tr>';
                html += '         <td><strong>Indice A/G</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+indiceAG+'</td>';
                html += '         <td style="text-align: center; font-weight: bold">1.2-2.2</td>';
                html += '     </tr>';
            }
            
            if(bilirrubinaD != ""){
                html += '<tr>';
                html += '         <td><strong>Bilirrubina directa</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+bilirrubinaD+' mg/dl</td>';
                html += '         <td style="text-align: center; font-weight: bold">Hasta 0.25 mg/dl</td>';
                html += '     </tr>';
            }
            
            if(bilirrubinaI != ""){
                html += ' <tr>';
                html += '         <td><strong>Bilirrubina indirecta</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+bilirrubinaI+'</td>';
                html += '         <td style="text-align: center; font-weight: bold">---</td>';
                html += '     </tr>';
            }
            
            if(albumina != ""){
                html += ' <tr>';
                html += '         <td><strong>Albumina</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+albumina+' g/dl</td>';
                html += '         <td style="text-align: center; font-weight: bold">3.5-5.0 g/dl</td>';
                html += '     </tr>';
            }

            if(fosforo != ""){
                html += ' <tr>';
                html += '         <td><strong>Fosforo</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+fosforo+' mg/dl</td>';
                html += '         <td style="text-align: center; font-weight: bold">2.5-5.0 mg/dl</td>';
                html += '     </tr>';
            }
            
            if(cloro != ""){
                html += ' <tr>';
                html += '         <td><strong>Cloro</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+cloro+' mmol/l</td>';
                html += '         <td style="text-align: center; font-weight: bold">95-115mmol/l</td>';
                html += '     </tr>';
            }
            
            if(calcio != ""){
                html += ' <tr>';
                html += '         <td><strong>Calcio</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+calcio+' mg/dl</td>';
                html += '         <td style="text-align: center; font-weight: bold">8.1-10.4 mg/dl</td>';
                html += '     </tr>';
            }
            
            if(potasio != ""){
                html += ' <tr>';
                html += '         <td><strong>Potasio</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+potasio+' mmol/l</td>';
                html += '         <td style="text-align: center; font-weight: bold">3.6-5.5 mmol/l</td>';
                html += '     </tr>';
            }
            
            if(sodio != ""){
                html += ' <tr>';
                html += '         <td><strong>Sodio</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+sodio+' mmol/l</td>';
                html += '         <td style="text-align: center; font-weight: bold">135-155 mmol/l</td>';
                html += '     </tr>';
            }
            
            if(magnesio != ""){
                html += ' <tr>';
                html += '         <td><strong>Magnesio</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+magnesio+' mg/dl</td>';
                html += '         <td style="text-align: center; font-weight: bold">1.6-2.5 mg/dl</td>';
                html += '     </tr>';
            }
            
            if(fosfatasaA != ""){
                html += '<tr>';
                html += '         <td><strong>Fosfatasa alcalina</strong></td>';
                html += '         <td style="text-align: center; font-weight: bold">'+fosfatasaA+' U/L</td>';
                html += '         <td style="text-align: center; font-weight: bold">98-279 U/L</td>';
                html += '     </tr>';
            }                           
            if(observacionesQS != ""){
                html += '<tr>';
                html += '        <td><strong>Observaciones</strong></td>';
                html += '        <td style="text-align: center; font-weight: bold" colspan=3>'+observacionesQS+'</td>';
                html += '    </tr>';
            }
        // Valores

        $("#tbodyQuimica").html(html);
       $("#spanNombreQuimica").html(nombreExamen);
       $("#spanFechaQuimica").html(fechaExamenQ);
       $(".mensajeVacioQ").hide();
       $(".contenedorExamenQ").show();

    });

    $(document).on("click", ".verUrianalisis", function(e){
        e.preventDefault();
        var html ="";
        var nombreExamen = $(this).closest('tr').find('.nombreExamen').val();
        var fechaExamen = $(this).closest('tr').find('.fechaExamen').val();
        var color = $(this).closest('tr').find('.color').val();
        var aspecto = $(this).closest('tr').find('.aspecto').val();
        var reaccion = $(this).closest('tr').find('.reaccion').val();
        var densidad = $(this).closest('tr').find('.densidad').val();
        var ph = $(this).closest('tr').find('.ph').val();
        var glucosaU = $(this).closest('tr').find('.glucosa').val();
        var proteinas = $(this).closest('tr').find('.proteinas').val();
        var pigmentosB = $(this).closest('tr').find('.pigmentosB').val();
        var sangreO = $(this).closest('tr').find('.sangreO').val();
        var nitritos = $(this).closest('tr').find('.nitritos').val();
        var cuerposC = $(this).closest('tr').find('.cuerposC').val();
        var acidosBiliares = $(this).closest('tr').find('.acidosBiliares').val();
        var granulosos = $(this).closest('tr').find('.granulosos').val();
        var cilindrosL = $(this).closest('tr').find('.cilindrosL').val();
        var cilindrosH = $(this).closest('tr').find('.cilindrosH').val();
        var otrosCilindros = $(this).closest('tr').find('.otrosCilindros').val();
        var leucositos = $(this).closest('tr').find('.leucositos').val();
        var hematies = $(this).closest('tr').find('.hematies').val();
        var celulasE = $(this).closest('tr').find('.celulasE').val();
        var elementosM = $(this).closest('tr').find('.elementosM').val();
        var bacterias = $(this).closest('tr').find('.bacterias').val();
        var levadura = $(this).closest('tr').find('.levadura').val();
        var otrosUno = $(this).closest('tr').find('.otrosUno').val();
        var otrosDos = $(this).closest('tr').find('.otrosDos').val();
        var observacionesU = $(this).closest('tr').find('.observacionesU').val();


        // Valores
            html += '<tr style="background: #075480; color: #ffffff">';
            html += '    <th colspan="4">EXAMEN FISICO QUIMICO</th>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Color</strong></td>';
            html += '    <td> '+color+'</td>';
            html += '    <td><strong>Aspecto</strong></td>';
            html += '    <td>'+aspecto+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Reacción</strong></td>';
            html += '    <td> '+reaccion+'</td>';
            html += '    <td><strong>Densidad</strong></td>';
            html += '    <td>'+densidad+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>P.H.</strong></td>';
            html += '    <td>'+ph+'</td>';
            html += '    <td><strong>Glucosa</strong></td>';
            html += '    <td>'+glucosaU+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Proteinas</strong></td>';
            html += '    <td> '+proteinas+'</td>';
            html += '    <td><strong>Pigmentos Biliares</strong></td>';
            html += '    <td>'+pigmentosB+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Sangre oculta</strong></td>';
            html += '    <td> '+sangreO+'</td>';
            html += '    <td><strong>Nitritos</strong></td>';
            html += '    <td>'+nitritos+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Cuerpos Cetonicos</strong></td>';
            html += '    <td> '+cuerposC+'</td>';
            html += '    <td><strong>Acidos Biliares</strong></td>';
            html += '    <td>'+acidosBiliares+'</td>';
            html += '</tr>';
            html += '<tr style="background: #075480; color: #ffffff">';
            html += '    <th colspan="4">EXAMEN MICROSCOPICO</th>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Granulosos</strong></td>';
            html += '    <td> '+granulosos+'</td>';
            html += '    <td><strong>Cilindros leucocitarios</strong></td>';
            html += '    <td> '+cilindrosL+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Cilindros Hialinos</strong></td>';
            html += '    <td> '+cilindrosH+'</td>';
            html += '    <td><strong>Otros cilindros</strong></td>';
            html += '    <td> '+otrosCilindros+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Leucositos</strong></td>';
            html += '    <td> '+leucositos+'</td>';
            html += '    <td><strong>Hematies</strong></td>';
            html += '    <td> '+hematies+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Celulas Epiteliales</strong></td>';
            html += '    <td> '+celulasE+'</td>';
            html += '    <td><strong>Elementos minerales</strong></td>';
            html += '    <td> '+elementosM+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Bacterias</strong></td>';
            html += '    <td> '+bacterias+'</td>';
            html += '    <td><strong>Levadura</strong></td>';
            html += '    <td> '+levadura+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Otros</strong></td>';
            html += '    <td> '+otrosUno+'</td>';
            html += '    <td></td>';
            html += '    <td></td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Observaciones</strong></td>';
            html += '    <td colspan=2>'+observacionesU+'</td>';
            html += '</tr>';
        // Valores

       $("#tbodyUrianalisis").html(html);
       $("#spanNombreUrianalisis").html(nombreExamen);
       $("#spanFechaUrianalisis").html(fechaExamen);
       $(".mensajeVacioU").hide();
       $(".contenedorExamenU").show();

                

    });

    $(document).on("click", ".verCoprologia", function(e){
        e.preventDefault();
        var html = "";
        var nombreExamenC = $(this).closest('tr').find('.nombreExamen').val();
        var fechaExamenC = $(this).closest('tr').find('.fechaExamen').val();
        var colorC = $(this).closest('tr').find('.colorC').val();
        var consistenciaC = $(this).closest('tr').find('.consistencia').val();
        var mucusC = $(this).closest('tr').find('.mucus').val();
        var hematiesC = $(this).closest('tr').find('.hematiesC').val();
        var leucocitosC = $(this).closest('tr').find('.leucocitos').val();
        var bacteriasC = $(this).closest('tr').find('.bacteriasC').val();
        var levadurasC = $(this).closest('tr').find('.levaduras').val();
        var restosAMC = $(this).closest('tr').find('.restosAM').val();
        var otrosUnoC = $(this).closest('tr').find('.otrosUno').val();
        var otrosDosC = $(this).closest('tr').find('.otrosDosC').val();
        var histolyticaTC = $(this).closest('tr').find('.histolyticaT').val();
        var histolyticaQC = $(this).closest('tr').find('.histolyticaQ').val();
        var ascarisHC = $(this).closest('tr').find('.ascarisH').val();
        var ascarisLC = $(this).closest('tr').find('.ascarisL').val();
        var coliTC = $(this).closest('tr').find('.coliT').val();
        var coliQC = $(this).closest('tr').find('.coliQ').val();
        var trinchiuraHC = $(this).closest('tr').find('.trinchiuraH').val();
        var trinchiuraLC = $(this).closest('tr').find('.trinchiuraL').val();
        var nanaTC = $(this).closest('tr').find('.nanaT').val();
        var nanaQC = $(this).closest('tr').find('.nanaQ').val();
        var guodHC = $(this).closest('tr').find('.guodH').val();
        var guodLC = $(this).closest('tr').find('.guodL').val();
        var mesniliTC = $(this).closest('tr').find('.mesniliT').val();
        var mesniliQC = $(this).closest('tr').find('.mesniliQ').val();
        var vermicHC = $(this).closest('tr').find('.vermicH').val();
        var vermicLC = $(this).closest('tr').find('.vermicL').val();
        var lambiaTC = $(this).closest('tr').find('.lambiaT').val();
        var lambiaQC = $(this).closest('tr').find('.lambiaQ').val();
        var stercoHC = $(this).closest('tr').find('.stercoH').val();
        var stercoLC = $(this).closest('tr').find('.stercoL').val();
        var hominisTC = $(this).closest('tr').find('.hominisT').val();
        var hominisQC = $(this).closest('tr').find('.hominisQ').val();
        var hymenolepisHC = $(this).closest('tr').find('.hymenolepisH').val();
        var hymenolepisLC = $(this).closest('tr').find('.hymenolepisL').val();
        var balantidiumTC = $(this).closest('tr').find('.balantidiumT').val();
        var balantidiumQC = $(this).closest('tr').find('.balantidiumQ').val();
        var taeniasHC = $(this).closest('tr').find('.taeniasH').val();
        var taeniasLC = $(this).closest('tr').find('.taeniasL').val();
        var blastocystisTC = $(this).closest('tr').find('.blastocystisT').val();
        var blastocystisQC = $(this).closest('tr').find('.blastocystisQ').val();
        var otrosHC = $(this).closest('tr').find('.otrosH').val();
        var otrosLC = $(this).closest('tr').find('.otrosL').val();
        var observacionesC = $(this).closest('tr').find('.observacionesC').val();

        // Valores
            html += '<tr style="background: #075480; color: #ffffff">';
            html += '    <th colspan="6">EXAMEN MACROSCOPICO</th>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Color</strong></td>';
            html += '    <td colspan="2"> '+colorC+'</td>';
            html += '    <td><strong>Consistencia</strong></td>';
            html += '    <td colspan="2">'+consistenciaC+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Mucus</strong></td>';
            html += '    <td colspan="2"> '+mucusC+' </td>';
            html += '    <td><strong>Hematies</strong></td>';
            html += '    <td colspan="2">'+hematiesC+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Leucocitos</strong></td>';
            html += '    <td colspan="2"> '+leucocitosC+' </td>';
            html += '    <td><strong>Bacterias</strong></td>';
            html += '    <td colspan="2">'+bacteriasC+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Levaduras</strong></td>';
            html += '    <td colspan="2"> '+levadurasC+' </td>';
            html += '    <td><strong>Restos Alim. Microsc.</strong></td>';
            html += '    <td colspan="2">'+restosAMC+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Otros</strong></td>';
            html += '    <td colspan="5">'+otrosUnoC+'</td>';
            html += '</tr>';
            html += '<tr style="background: #075480; color: #ffffff">';
            html += '    <th colspan="6">EXAMEN MICROSCOPICO</th>';
            html += '</tr>';
            html += '<tr style="background: rgba(255,0,0,0.3);">';
            html += '    <th>PROTOZOARIOS</th>';
            html += '    <th>TROFOZOITO</th>';
            html += '    <th>QUISTE</th>';
            html += '    <th>METAZOARIOS</th>';
            html += '    <th>HUEVO</th>';
            html += '    <th>LARVA</th>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Entamoeba Histolytica</strong></td>';
            html += '    <td> '+histolyticaTC+' </td>';
            html += '    <td> '+histolyticaQC+' </td>';
            html += '    <td><strong>Ascaris lumbricoides</strong></td>';
            html += '    <td>'+ascarisHC+'</td>';
            html += '    <td>'+ascarisLC+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Entamoeba Coli</strong></td>';
            html += '    <td> '+coliTC+'</td>';
            html += '    <td> '+coliQC+'</td>';
            html += '    <td><strong>Trichuris trinchiura</strong></td>';
            html += '    <td>'+trinchiuraHC+'</td>';
            html += '    <td>'+trinchiuraLC+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Endolimax Nana</strong></td>';
            html += '    <td> '+nanaTC+'</td>';
            html += '    <td> '+nanaQC+'</td>';
            html += '    <td><strong>Ancylostoma duodenale</strong></td>';
            html += '    <td>'+guodHC+'</td>';
            html += '    <td>'+guodLC+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Chilomastix mesnili</strong></td>';
            html += '    <td> '+mesniliTC+'</td>';
            html += '    <td> '+mesniliQC+'</td>';
            html += '    <td><strong>Enterobios vermic</strong></td>';
            html += '    <td>'+vermicHC+'</td>';
            html += '    <td>'+vermicLC+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Giardia Lambia</strong></td>';
            html += '    <td> '+lambiaTC+' </td>';
            html += '    <td>'+lambiaQC+'</td>';
            html += '    <td><strong>Strongyloides stercoralis</strong></td>';
            html += '    <td>'+stercoHC+'</td>';
            html += '    <td>'+stercoLC+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Tricomonas hominis</strong></td>';
            html += '    <td>'+hominisTC+'</td>';
            html += '    <td>'+hominisQC+'</td>';
            html += '    <td><strong>Hymenolepis nana</strong></td>';
            html += '    <td>'+hymenolepisHC+'</td>';
            html += '    <td>'+hymenolepisLC+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Balantidium coli</strong></td>';
            html += '    <td>'+balantidiumTC+'</td>';
            html += '    <td>'+balantidiumQC+'</td>';
            html += '    <td><strong>Taenias</</strong>td>';
            html += '    <td>'+taeniasHC+'</td>';
            html += '    <td>'+taeniasLC+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Blastocystis hominis</strong></td>';
            html += '    <td>'+blastocystisTC+'</td>';
            html += '    <td>'+blastocystisQC+'</td>';
            html += '    <td><strong>Otros</strong></td>';
            html += '    <td>'+otrosHC+'</td>';
            html += '    <td>'+otrosLC+'</td>';
            html += '</tr>';
            html += '<tr>';
            html += '    <td><strong>Observaciones</strong></td>';
            html += '    <td colspan="5">'+observacionesC+'</td>';
            html += '</tr>';
        // Valores

       $("#tbodyCoprologia").html(html);
       $("#spanNombreCoprologia").html(nombreExamenC);
       $("#spanFechaCoprologia").html(fechaExamenC);
       $(".mensajeVacioC").hide();
       $(".contenedorExamenC").show();
                


    });

    $(document).on("click", ".verVarios", function(e){
        e.preventDefault();
        var html = "";

        var fechaExamen = $(this).closest('tr').find('.fechaExamen').val();
        var encabezadoExamen = $(this).closest('tr').find('.encabezadoVarios').val();
        var indicadoExamen = $(this).closest('tr').find('.nombreExamen').val();
        var note_editable = checkUTF8(atob($(this).closest('tr').find('.detalleVarios').val()));

        html += '<p style="font-size: 12px; color: #075480; margin-top: 25px; text-align: center; text-decoration: underline"><strong>'+encabezadoExamen+'</strong></p>';
        html += '<p style="font-size: 12px; color: #075480; margin-top: 5px; text-align: center"><strong>EXAMEN SOLICITADO:</strong>'+indicadoExamen+'</p>';
        html += '<div class="detalle">';
        html += '    <p style="font-size: 12px; color: #075480; margin-top: 5px; text-align: center"><strong>RESULTADO:</strong></p>'+note_editable+'</div>';



       $("#tbodyVarios").html(html);
       $("#spanNombreVarios").html(indicadoExamen);
       $("#spanFechaVarios").html(fechaExamen);
       $(".mensajeVacioV").hide();
       $(".contenedorExamenV").show();
                


    });


    $(document).on("click", ".verBacteriologia", function(e){
        e.preventDefault();
        var html = "";
        // Valores
            var nombreExamenB = $(this).closest('tr').find('.nombreExamen').val();
            var fechaExamenB = $(this).closest('tr').find('.fechaExamen').val();
            var resultadoBacteriologia = $(this).closest('tr').find('.resultadoExamen').val();
            var seAisla = $(this).closest('tr').find('.seAisla').val();

            var cefixime = $(this).closest('tr').find('.cefixime').val();
            var amikacina = $(this).closest('tr').find('.amikacina').val();
            var levofloxacina = $(this).closest('tr').find('.levofloxacina').val();
            var ceftriaxona = $(this).closest('tr').find('.ceftriaxona').val();
            var azitromicina = $(this).closest('tr').find('.azitromicina').val();
            var imipenem = $(this).closest('tr').find('.imipenem').val();
            var meropenem = $(this).closest('tr').find('.meropenem').val();
            var fosfocil = $(this).closest('tr').find('.fosfocil').val();
            var ciprofloxacina = $(this).closest('tr').find('.ciprofloxacina').val();
            var penicilina = $(this).closest('tr').find('.penicilina').val();
            var vancomicina = $(this).closest('tr').find('.vancomicina').val();
            var acidoNalidixico = $(this).closest('tr').find('.acidoNalidixico').val();
            var gentamicina = $(this).closest('tr').find('.gentamicina').val();
            var nitrofurantoina = $(this).closest('tr').find('.nitrofurantoina').val();
            var ceftazimide = $(this).closest('tr').find('.ceftazimide').val();
            var cefotaxime = $(this).closest('tr').find('.cefotaxime').val();
            var clindamicina = $(this).closest('tr').find('.clindamicina').val();
            var trimetropimSulfa = $(this).closest('tr').find('.trimetropimSulfa').val();
            var ampicilina = $(this).closest('tr').find('.ampicilina').val();
            var piperacilina = $(this).closest('tr').find('.piperacilina').val();
            var amoxicilina = $(this).closest('tr').find('.amoxicilina').val();
            var claritromicina = $(this).closest('tr').find('.claritromicina').val();
            var cefuroxime = $(this).closest('tr').find('.cefuroxime').val();
            var cefepime = $(this).closest('tr').find('.cefepime').val();
            var metronidazol = $(this).closest('tr').find('.metronidazol').val();
            var norfloxacina = $(this).closest('tr').find('.norfloxacina').val();
            var tobramicina = $(this).closest('tr').find('.tobramicina').val();
            var ertapenem = $(this).closest('tr').find('.ertapenem').val();
            var doripenem = $(this).closest('tr').find('.doripenem').val();
            var colistin = $(this).closest('tr').find('.colistin').val();
            var linezolid = $(this).closest('tr').find('.linezolid').val();
            var moxifloxacino = $(this).closest('tr').find('.moxifloxacino').val();
            var kanamicina = $(this).closest('tr').find('.kanamicina').val();
            var aztreonam = $(this).closest('tr').find('.aztreonam').val();
            var cefaclor = $(this).closest('tr').find('.cefaclor').val();
            var cefazolina = $(this).closest('tr').find('.cefazolina').val();
            var tetraciclina = $(this).closest('tr').find('.tetraciclina').val();
            var observacionBacteriologia = $(this).closest('tr').find('.observacionExamen').val();
            var idBacteriologia = $(this).closest('tr').find('.idBacteriologia').val();
        // Valores

        if(cefixime != ""){
            html += '<tr>';
            html += '        <td><strong class="">Cefixime</strong></td>';
            html += '        <td style="text-align: center; font-weight: bold">'+cefixime+'</td>';
            html += '    </tr>';
                
        }
        if(amikacina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Amikacina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+amikacina+'</td>';
            html += '    </tr>';
        }
        if(levofloxacina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Levofloxacina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+levofloxacina+'</td>';
            html += '    </tr>';
        }
        if(ceftriaxona != ""){
            html += '<tr>';
            html += '        <td><strong class="">Ceftriaxona</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+ceftriaxona+'</td>';
            html += '    </tr>';
        }
        if(azitromicina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Azitromicina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+azitromicina+'</td>';
            html += '    </tr>';
        }
        if(imipenem != ""){
            html += '<tr>';
            html += '        <td><strong class="">Imipenem</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+imipenem+'</td>';
            html += '    </tr>';
        }
        if(meropenem != ""){
            html += '<tr>';
            html += '        <td><strong class="">Meropenem</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+meropenem+'</td>';
            html += '    </tr>';
        }
        if(fosfocil != ""){
            html += '<tr>';
            html += '        <td><strong class="">Fosfomicina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+fosfocil+'</td>';
            html += '    </tr>';
        }
        if(ciprofloxacina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Ciprofloxacina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+ciprofloxacina+'</td>';
            html += '    </tr>';
        }
        if(penicilina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Penicilina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+penicilina+'</td>';
            html += '    </tr>';
        }
        if(vancomicina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Vancomicina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+vancomicina+'</td>';
            html += '        </tr>';
        }
        if(acidoNalidixico != ""){
            html += '<tr>';
            html += '        <td><strong class=""> Ácido nalidíxico </strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+acidoNalidixico+'</td>';
            html += '    </tr>';
        }  
        if(gentamicina != ""){
            html += '<tr>';
            html += '    <td><strong class="">Gentamicina</strong></td>';
            html += '    <td style="text-align: center;  font-weight: bold" >'+gentamicina+'</td>';
            html += '</tr>';
        }
        if(nitrofurantoina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Nitrofurantoina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+nitrofurantoina+'</td>';
            html += '    </tr>';
        }
        if(ceftazimide != ""){
            html += '<tr>';
            html += '        <td><strong class="">Ceftazidime</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+ceftazimide+'</td>';
            html += '    </tr>';
        }
        if(cefotaxime != ""){
            html += '<tr>';
            html += '        <td><strong class="">T.P Cefotaxime</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+cefotaxime+'</td>';
            html += '    </tr>';
        }
        if(clindamicina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Clindamicina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+clindamicina+'</td>';
            html += '    </tr>';
        }
        if(trimetropimSulfa != ""){
            html += '<tr>';
            html += '        <td><strong class=""> Trimetoprima/Sulfametoxazol</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+trimetropimSulfa+'</td>';
            html += '    </tr>';
        }
        if(ampicilina != ""){
            html += '<tr>';
            html += '        <td><strong class=""> Ampicilina/Sulbactam </strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+ampicilina+'</td>';
            html += '    </tr>';
        }
        if(piperacilina != ""){
            html += '<tr>';
            html += '        <td><strong class=""> Piperacilina/Tazobactam </strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+piperacilina+'</td>';
            html += '    </tr>';
        }
        if(amoxicilina != ""){
            html += '<tr>';
            html += '        <td><strong class=""> Amoxicilina/Ácido clavulánico </strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+amoxicilina+'</td>';
            html += '    </tr>';
        }
        if(claritromicina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Claritromicina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+claritromicina+'</td>';
            html += '    </tr>';
        }
        if(cefuroxime != ""){
            html += '<tr>';
            html += '        <td><strong class="">Cefuroxime</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+cefuroxime+'</td>';
            html += '    </tr>';
        }
        if(cefepime != ""){
            html += '<tr>';
            html += '        <td><strong class="">Cefepime</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+cefepime+'</td>';
            html += '    </tr>';
        }
        if(metronidazol != ""){
            html += '<tr>';
            html += '        <td><strong class="">Metronidazol</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+metronidazol+'</td>';
            html += '    </tr>';
        }
        if(norfloxacina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Norfloxacina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+norfloxacina+'</td>';
            html += '    </tr>';
        }
        if(tobramicina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Tobramicina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+tobramicina+'</td>';
            html += '    </tr>';
        }
        if(ertapenem != ""){
            html += '<tr>';
            html += '        <td><strong class="">Ertapenem</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+ertapenem+'</td>';
            html += '    </tr>';
        }
        if(doripenem != ""){
            html += '<tr>';
            html += '        <td><strong class="">Doripenem</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+doripenem+'</td>';
            html += '    </tr>';
        }
        if(colistin != ""){
            html += '<tr>';
            html += '        <td><strong class="">Colistin</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+colistin+'</td>';
            html += '    </tr>';
        }
        if(linezolid != ""){
            html += '<tr>';
            html += '        <td><strong class="">Linezolid</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+linezolid+'</td>';
            html += '    </tr>';
        }
        if(moxifloxacino != ""){
            html += '<tr>';
            html += '        <td><strong class="">Moxifloxacino</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+moxifloxacino+'</td>';
            html += '    </tr>';
        }
        if(kanamicina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Kanamicina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+kanamicina+'</td>';
            html += '    </tr>';
        }
        if(aztreonam != ""){
            html += '<tr>';
            html += '        <td><strong class="">Aztreonam</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+aztreonam+'</td>';
            html += '    </tr>';
        }
        if(cefaclor != ""){
            html += '<tr>';
            html += '        <td><strong class="">Cefaclor</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+cefaclor+'</td>';
            html += '    </tr>';
        }
        if(cefazolina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Cefazolina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+cefazolina+'</td>';
            html += '    </tr>';
        }
        if(tetraciclina != ""){
            html += '<tr>';
            html += '        <td><strong class="">Tetraciclina</strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold">'+tetraciclina+'</td>';
            html += '    </tr>';
        }
        if(observacionBacteriologia != ""){
            html += '<tr>';
            html += '        <td><strong class="">Observación </strong></td>';
            html += '        <td style="text-align: center;  font-weight: bold" colspan=2>'+observacionBacteriologia+'</td>';
            html += '    </tr>';
        }

        $("#tbodyBacteriologia").html(html);
       $("#spanNombreBacteriologia").html(nombreExamenB);
       $("#spanFechaBacteriologia").html(fechaExamenB);
       $("#resultadoExamenB").html(resultadoBacteriologia);
       $("#seAislaB").html(seAisla);
       $(".mensajeVacioB").hide();
       $(".contenedorExamenB").show();

       


       


                

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

</script>



        

                        