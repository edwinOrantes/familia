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

    #dvPruebasEspeciales{
        margin: 0 auto;
        margin-bottom: 200px;
        border: 1px solid #000;
        border-radius: 5px;
        padding: 30px;
        width: 50%;
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
                                                <textarea name="examenFisico" id="examenFisico" class="form-control bordes" cols="30" rows="3"><?php echo $consulta->evolucionEnfermedad; ?></textarea>
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
                                                                <form action="<?php echo base_url(); ?>Laboratorio/guardar_hematologia_lab" method="post">
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <table class="table table-borderless">
                                                                                <tr>
                                                                                    <td><strong>Examen:</strong> <input type="text"  class="form-control"  id="nombreExamen" name="nombreExamen"></td>
                                                                                    <td><strong>Fecha:</strong>  <input type="date" class="form-control"  id="fechaExamen" name="fechaExamen"></td>
                                                                                </tr>
                                                                            </table>
                                            
                                                                            <table class="table table-borderless tblReducida">
                                            
                                                                                <tr>
                                                                                    <td>Globulos rojos</td>
                                                                                    <td> <input type="text" class="form-control" name="globulosRojos" id="globulosRojos"> </td>
                                                                                    <td> <span class="badge badge-danger">3,960,000-5,500,000 X mm3</span> </td>
                                                                                    <td>Eritrosedimentación</td>
                                                                                    <td><input type="text" class="form-control" name="eritrosedimentacion" id="eritrosedimentacion"></td>
                                                                                    <td> <span class="badge badge-danger">1-20mm/hr</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Globulos blancos</td>
                                                                                    <td> <input type="text" class="form-control" name="globulosBlancos" id="globulosBlancos"> </td>
                                                                                    <td> <span class="badge badge-danger"> 5,000-10,000 X mm3</span> </td>
                                                                                    <td>Reticulositos</td>
                                                                                    <td><input type="text" class="form-control" name="reticulositos" id="reticulositos"></td>
                                                                                    <td> <span class="badge badge-danger">0.5-1.5%</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Hematocrito</td>
                                                                                    <td> <input type="text" class="form-control" name="hematocrito" id="hematocrito"> </td>
                                                                                    <td> <span class="badge badge-danger">36-50%</span> </td>
                                                                                    <td>T.P Trombolastina</td>
                                                                                    <td><input type="text" class="form-control" name="tpTrombolastina" id="tpTrombolastina"></td>
                                                                                    <td> <span class="badge badge-danger">22-38 Seg.</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Hemoglobina</td>
                                                                                    <td> <input type="text" class="form-control" name="hemoglobina" id="hemoglobina"> </td>
                                                                                    <td> <span class="badge badge-danger">12-16.6 g%</span> </td>
                                                                                    <td>T. de sangramiento</td>
                                                                                    <td><input type="text" class="form-control" name="tSangramiento" id="tSangramiento"></td>
                                                                                    <td> <span class="badge badge-danger">1-3 Minutos</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Vl. globular medio</td>
                                                                                    <td> <input type="text" class="form-control" name="vlGMedio" id="vlGMedio"> </td>
                                                                                    <td> <span class="badge badge-danger">90.9-92.7 micras3</span> </td>
                                                                                    <td>T. de coagulacion</td>
                                                                                    <td><input type="text" class="form-control" name="tCoagulacion" id="tCoagulacion"></td>
                                                                                    <td> <span class="badge badge-danger">5-10 Minutos</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Hb. globular media</td>
                                                                                    <td> <input type="text" class="form-control" name="hbGMedia" id="hbGMedia"> </td>
                                                                                    <td> <span class="badge badge-danger">30.2-31.7 uug</span> </td>
                                                                                    <td>T. Protombina</td>
                                                                                    <td><input type="text" class="form-control" name="tProtombina" id="tProtombina"></td>
                                                                                    <td> <span class="badge badge-danger">13-17 Seg</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Conc. HB. Glob. Med</td>
                                                                                    <td> <input type="text" class="form-control" name="concHbGlobMed" id="concHbGlobMed"> </td>
                                                                                    <td> <span class="badge badge-danger">33-33.5%</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Neutrofilos</td>
                                                                                    <td> <input type="text" class="form-control" name="neutrofilos" id="neutrofilos"> </td>
                                                                                    <td> <span class="badge badge-danger">40-70%</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Linfocitos</td>
                                                                                    <td> <input type="text" class="form-control" name="linfocitos" id="linfocitos"> </td>
                                                                                    <td> <span class="badge badge-danger">20-40%</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Eosinofilos</td>
                                                                                    <td> <input type="text" class="form-control" name="eosinofilos" id="eosinofilos"> </td>
                                                                                    <td> <span class="badge badge-danger">1-4%</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Basofilos</td>
                                                                                    <td> <input type="text" class="form-control" name="basofilos" id="basofilos"> </td>
                                                                                    <td> <span class="badge badge-danger">0-1%</span> </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>Monocitos</td>
                                                                                    <td> <input type="text" class="form-control" name="monocitos" id="monocitos"> </td>
                                                                                    <td> <span class="badge badge-danger">2-5%</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Plaquetas</td>
                                                                                    <td> <input type="text" class="form-control" name="plaquetas" id="plaquetas"> </td>
                                                                                    <td> <span class="badge badge-danger">150,000-400,000 X mm3</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Observaciones</td>
                                                                                    <td colspan="2"> <textarea class="form-control" name="observacionesH" id="observacionesH"></textarea></td>
                                                                                    <td></td>
                                                                                    <td >
                                                                                        <input type="hidden" class="form-control" name="idHematologia" id="idHematologia"> 
                                                                                        <input type="hidden" class="form-control" name="idConsulta"> 
                                                                                        <button class="btn btn-primary btn-block"> <i class="fa fa-save"></i> Guardar</button>
                                                                                    </td>
                                                                                </tr>
                                            
                                            
                                                                            </table>
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
                                                                                            if($row->fechaConsulta == date("Y-m-d")){
                                                                                                echo '<tr class="alert-primary">';
                                                                                            }else{
                                                                                                echo '<tr>';
                                                                                            }
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
                                                                </form>
                                                            </div>
                                        
                                                            <div role="tabpanel" class="tab-pane fade" id="quimicaSanguinea">
                                                                <form action="<?php echo base_url(); ?>Laboratorio/guardar_quimica_lab" method="post">
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <table class="table table-borderless">
                                                                                <tr>
                                                                                    <td><strong>Examen:</strong> <input type="text"  class="form-control"  id="nombreExamen" name="nombreExamen"></td>
                                                                                    <td><strong>Fecha:</strong>  <input type="date" class="form-control"  id="fechaExamenQ" name="fechaExamen"></td>
                                                                                </tr>
                                                                            </table>
                                            
                                                                            <table class="table table-borderless tblReducida">
                                            
                                                                                <tr>
                                                                                    <td>Glucosa</td>
                                                                                    <td> <input type="text" class="form-control" name="glucosa" id="glucosa"> </td>
                                                                                    <td> <span class="badge badge-danger">55/110 mg/dl</span> </td>
                                                                                    <td>Fosfatasa acida Prost.</td>
                                                                                    <td><input type="text" class="form-control" name="fosfatasa" id="fosfatasa"></td>
                                                                                    <td> <span class="badge badge-danger">Menos 1.7 U/L</span> </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>Glucosa Post-Prand</td>
                                                                                    <td> <input type="text" class="form-control" name="glucosaPostPrand" id="glucosaPostPrand"> </td>
                                                                                    <td> <span class="badge badge-danger">---</span> </td>
                                                                                    <td>Lipasa</td>
                                                                                    <td><input type="text" class="form-control" name="lipasa" id="lipasa"></td>
                                                                                    <td> <span class="badge badge-danger">Menos de 38 U/L</span> </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>Globulina</td>
                                                                                    <td> <input type="text" class="form-control" name="globulina" id="globulina"> </td>
                                                                                    <td> <span class="badge badge-danger">2.3-3.4 g/dl</span> </td>
                                                                                    <td>Amilasa</td>
                                                                                    <td><input type="text" class="form-control" name="amilasa" id="amilasa"></td>
                                                                                    <td> <span class="badge badge-danger">Menos de 90 U/L</span> </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>Trigliceridos</td>
                                                                                    <td> <input type="text" class="form-control" name="trigliceridos" id="trigliceridos"> </td>
                                                                                    <td> <span class="badge badge-danger">Hasta 15 mg/dl</span> </td>
                                                                                    <td>Indice A/G</td>
                                                                                    <td><input type="text" class="form-control" name="indiceAG" id="indiceAG"></td>
                                                                                    <td> <span class="badge badge-danger">1.2-2.2</span> </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>Colesterol</td>
                                                                                    <td> <input type="text" class="form-control" name="colesterol" id="colesterol"> </td>
                                                                                    <td> <span class="badge badge-danger">Hasta 200 mg/dl</span> </td>
                                                                                    <td>Bilirrubina directa</td>
                                                                                    <td><input type="text" class="form-control" name="bilirrubinaD" id="bilirrubinaD"></td>
                                                                                    <td> <span class="badge badge-danger">Hasta 0.25 mg/dl</span> </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>Colesterol H.D.L</td>
                                                                                    <td> <input type="text" class="form-control" name="colesterolHDL" id="colesterolHDL"> </td>
                                                                                    <td> <span class="badge badge-danger">35-65 mg/dl</span> </td>
                                                                                    <td>Bilirrubina indirecta</td>
                                                                                    <td><input type="text" class="form-control" name="bilirrubinaI" id="bilirrubinaI"></td>
                                                                                    <td> <span class="badge badge-danger">---</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Colesterol L.D.L</td>
                                                                                    <td> <input type="text" class="form-control" name="colesterolLDL" id="colesterolLDL"> </td>
                                                                                    <td> <span class="badge badge-danger">Hasta 150 mg/dl</span> </td>
                                                                                    <td>Albumina</td>
                                                                                    <td> <input type="text" class="form-control" name="albumina" id="albumina"> </td>
                                                                                    <td> <span class="badge badge-danger">3.5-5.0 g/dl</span> </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>Ácido Úrico</td>
                                                                                    <td> <input type="text" class="form-control" name="acidoUrico" id="acidoUrico"> </td>
                                                                                    <td> <span class="badge badge-danger">2.5-7.0 mg/dl</span> </td>
                                                                                    <td>Fosforo</td>
                                                                                    <td> <input type="text" class="form-control" name="fosforo" id="fosforo"> </td>
                                                                                    <td> <span class="badge badge-danger">2.5-5.0 mg/dl</span> </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>Creatinina</td>
                                                                                    <td> <input type="text" class="form-control" name="creatinina" id="creatinina"> </td>
                                                                                    <td> <span class="badge badge-danger">0.7-1.4 mg/dl</span> </td>
                                                                                    <td>Cloro</td>
                                                                                    <td> <input type="text" class="form-control" name="cloro" id="cloro"> </td>
                                                                                    <td> <span class="badge badge-danger">95-115mmol/l</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Nitrógeno</td>
                                                                                    <td> <input type="text" class="form-control" name="nitrogeno" id="nitrogeno"> </td>
                                                                                    <td> <span class="badge badge-danger">4.7-22.5 mg/dl</span> </td>
                                                                                    <td>Calcio</td>
                                                                                    <td> <input type="text" class="form-control" name="calcio" id="calcio"> </td>
                                                                                    <td> <span class="badge badge-danger">8.1-10.4 mg/dl</span> </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>Proteinas totales</td>
                                                                                    <td> <input type="text" class="form-control" name="proteinasT" id="proteinasT"> </td>
                                                                                    <td> <span class="badge badge-danger">6.7-8.7 g/dl</span> </td>
                                                                                    <td>Potasio</td>
                                                                                    <td> <input type="text" class="form-control" name="potasio" id="potasio"> </td>
                                                                                    <td> <span class="badge badge-danger">3.6-5.5 mmol/l</span> </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>Bilirrubina</td>
                                                                                    <td> <input type="text" class="form-control" name="bilirrubina" id="bilirrubina"> </td>
                                                                                    <td> <span class="badge badge-danger">Hasta 1.1 mg/dl</span> </td>
                                                                                    <td>Sodio</td>
                                                                                    <td> <input type="text" class="form-control" name="sodio" id="sodio"> </td>
                                                                                    <td> <span class="badge badge-danger">135-155 mmol/l</span> </td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td>T.G.O</td>
                                                                                    <td> <input type="text" class="form-control" name="tgo" id="tgo"> </td>
                                                                                    <td> <span class="badge badge-danger">Menos de 38 U/L</span> </td>
                                                                                    <td>Magnesio</td>
                                                                                    <td> <input type="text" class="form-control" name="magnesio" id="magnesio"> </td>
                                                                                    <td> <span class="badge badge-danger">1.6-2.5 mg/dl</span> </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>T.G.P</td>
                                                                                    <td> <input type="text" class="form-control" name="tgp" id="tgp"> </td>
                                                                                    <td> <span class="badge badge-danger">Menos de 40 U/L</span> </td>
                                                                                    <td>Fosfatasa alcalina</td>
                                                                                    <td> <input type="text" class="form-control" name="fosfatasaA" id="fosfatasaA"> </td>
                                                                                    <td> <span class="badge badge-danger">98-279 U/L</span> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Observaciones</td>
                                                                                    <td colspan="2"> <textarea class="form-control" name="observacionesQS" id="observacionesQS"></textarea></td>
                                                                                    <td >
                                                                                        <input type="hidden" class="form-control" name="idQuimicaSanguinea" id="idQuimicaSanguinea"> 
                                                                                        <input type="hidden" class="form-control" name="idConsulta"> 
                                                                                        <button class="btn btn-primary btn-block mt-2"> <i class="fa fa-save"></i> Guardar</button>
                                                                                    </td>
                                                                                </tr>
                                            
                                            
                                                                            </table>
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
                                                                                                    <input type="hidden" class="fechaExamen" value="'.$row->fechaExamen.'">
                                        
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
                                                                </form>
                                                            </div>
                                        
                                                            <div role="tabpanel" class="tab-pane fade" id="urianalisis">
                                                                <form action="<?php echo base_url(); ?>Laboratorio/guardar_urianalisis_lab" method="post">
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <table class="table table-borderless">
                                                                                <tr>
                                                                                    <td><strong>Examen:</strong> <input type="text"  class="form-control"  id="nombreExamen" name="nombreExamen"></td>
                                                                                    <td><strong>Fecha:</strong>  <input type="date" class="form-control"  id="fechaExamen" name="fechaExamen"></td>
                                                                                </tr>
                                                                            </table>
                                            
                                                                            <table class="table table-borderless tblReducida">
                                                                                <tr class="bg-danger text-white text-center">
                                                                                    <th colspan="4">EXAMEN FISICO QUIMICO</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Color</td>
                                                                                    <td> <input type="text" class="form-control" name="color" id="color"> </td>
                                                                                    <td>Aspecto</td>
                                                                                    <td><input type="text" class="form-control" name="aspecto" id="aspecto"></td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Reacción</td>
                                                                                    <td> <input type="text" class="form-control" name="reaccion" id="reaccion"> </td>
                                                                                    <td>Densidad</td>
                                                                                    <td><input type="text" class="form-control" name="densidad" id="densidad"></td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>P.H.</td>
                                                                                    <td> <input type="text" class="form-control" name="ph" id="ph"> </td>
                                                                                    <td>Glucosa</td>
                                                                                    <td><input type="text" class="form-control" name="glucosa" id="glucosaU"></td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Proteinas</td>
                                                                                    <td> <input type="text" class="form-control" name="proteinas" id="proteinas"> </td>
                                                                                    <td>Pigmentos Biliares</td>
                                                                                    <td><input type="text" class="form-control" name="pigmentosB" id="pigmentosB"></td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Sangre oculta</td>
                                                                                    <td> <input type="text" class="form-control" name="sangreO" id="sangreO"> </td>
                                                                                    <td>Nitritos</td>
                                                                                    <td><input type="text" class="form-control" name="nitritos" id="nitritos"></td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Cuerpos Cetonicos</td>
                                                                                    <td> <input type="text" class="form-control" name="cuerposC" id="cuerposC"> </td>
                                                                                    <td>Acidos Biliares</td>
                                                                                    <td><input type="text" class="form-control" name="acidosBiliares" id="acidosBiliares"></td>
                                                                                </tr>
                                        
                                                                                <tr class="bg-danger text-white text-center">
                                                                                    <th colspan="4">EXAMEN MICROSCOPICO</th>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Granulosos</td>
                                                                                    <td> <input type="text" class="form-control" name="granulosos" id="granulosos"> </td>
                                                                                    <td>Cilindros leucocitarios</td>
                                                                                    <td> <input type="text" class="form-control" name="cilindrosL" id="cilindrosL"> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Cilindros Hialinos</td>
                                                                                    <td> <input type="text" class="form-control" name="cilindrosH" id="cilindrosH"> </td>
                                                                                    <td>Otros cilindros</td>
                                                                                    <td> <input type="text" class="form-control" name="otrosCilindros" id="otrosCilindros"> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Leucositos</td>
                                                                                    <td> <input type="text" class="form-control" name="leucositos" id="leucositos"> </td>
                                                                                    <td>Hematies</td>
                                                                                    <td> <input type="text" class="form-control" name="hematies" id="hematies"> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Celulas Epiteliales</td>
                                                                                    <td> <input type="text" class="form-control" name="celulasE" id="celulasE"> </td>
                                                                                    <td>Elementos minerales</td>
                                                                                    <td> <input type="text" class="form-control" name="elementosM" id="elementosM"> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Bacterias</td>
                                                                                    <td> <input type="text" class="form-control" name="bacterias" id="bacterias"> </td>
                                                                                    <td>Levadura</td>
                                                                                    <td> <input type="text" class="form-control" name="levadura" id="levadura"> </td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Otros</td>
                                                                                    <td> <input type="text" class="form-control" name="OtrosUno" id="OtrosUno"> </td>
                                                                                    <td>Otros</td>
                                                                                    <td> <input type="text" class="form-control" name="otrosDos" id="otrosDos"> </td>
                                                                                </tr>
                                        
                                                                                <tr>
                                                                                    <td>Observaciones</td>
                                                                                    <td> <textarea class="form-control" name="observacionesU" id="observacionesU"></textarea></td>
                                                                                    <td></td>
                                                                                    <td >
                                                                                        <input type="hidden" class="form-control" name="idUrianalisis" id="idUrianalisis"> 
                                                                                        <input type="hidden" class="form-control" name="idConsulta"> 
                                                                                        <button class="btn btn-primary btn-block mt-2"> <i class="fa fa-save"></i> Guardar</button>
                                                                                    </td>
                                                                                </tr>
                                            
                                            
                                                                            </table>
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
                                                                </form>
                                                            </div>
                                        
                                                            <div role="tabpanel" class="tab-pane fade" id="coprologia">
                                                                <form action="<?php echo base_url(); ?>Laboratorio/guardar_coprologia_lab" method="post">
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <table class="table table-borderless">
                                                                                <tr>
                                                                                    <td><strong>Examen:</strong> <input type="text"  class="form-control"  id="nombreExamenC" name="nombreExamen"></td>
                                                                                    <td><strong>Fecha:</strong>  <input type="date" class="form-control"  id="fechaExamenC" name="fechaExamen"></td>
                                                                                </tr>
                                                                            </table>
                                            
                                                                            <table class="table table-borderless tblReducida">
                                                                                <tr>
                                                                                    <td>Color</td>
                                                                                    <td colspan="2"> <input type="text" class="form-control" name="color" id="colorC"> </td>
                                                                                    <td>Consistencia</td>
                                                                                    <td colspan="2"><input type="text" class="form-control" name="consistencia" id="consistenciaC"></td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Mucus</td>
                                                                                    <td colspan="2"> <input type="text" class="form-control" name="mucus" id="mucusC"> </td>
                                                                                    <td>Hematies</td>
                                                                                    <td colspan="2"><input type="text" class="form-control" name="hematies" id="hematiesC"></td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Leucocitos</td>
                                                                                    <td colspan="2"> <input type="text" class="form-control" name="leucocitos" id="leucocitosC"> </td>
                                                                                    <td>Bacterias</td>
                                                                                    <td colspan="2"><input type="text" class="form-control" name="bacterias" id="bacteriasC"></td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Levaduras</td>
                                                                                    <td colspan="2"> <input type="text" class="form-control" name="levaduras" id="levadurasC"> </td>
                                                                                    <td>Restos Alim. Microsc. </td>
                                                                                    <td colspan="2"><input type="text" class="form-control" name="restosAM" id="restosAMC"></td>
                                                                                </tr>
                                            
                                                                                <tr>
                                                                                    <td>Otros</td>
                                                                                    <td colspan="2"> <input type="text" class="form-control" name="otrosUno" id="otrosUnoC"> </td>
                                                                                    <td>Otros</td>
                                                                                    <td colspan="2"><input type="text" class="form-control" name="otrosDos" id="otrosDosC"></td>
                                                                                </tr>
                                        
                                                                                <tr class="bg-danger text-white text-center">
                                                                                    <th>PROTOZOARIOS</th>
                                                                                    <th>TROFOZOITO</th>
                                                                                    <th>QUISTE</th>
                                                                                    <th>METAZOARIOS</th>
                                                                                    <th>HUEVO</th>
                                                                                    <th>LARVA</th>
                                                                                </tr>
                                        
                                                                                <tr>
                                                                                    <td>Entamoeba Histolytica</td>
                                                                                    <td> <input type="text" class="form-control" name="histolyticaT" id="histolyticaTC"> </td>
                                                                                    <td> <input type="text" class="form-control" name="histolyticaQ" id="histolyticaQC"> </td>
                                                                                    <td>Ascaris lumbricoides</td>
                                                                                    <td><input type="text" class="form-control" name="ascarisH" id="ascarisHC"></td>
                                                                                    <td><input type="text" class="form-control" name="ascarisL" id="ascarisLC"></td>
                                                                                </tr>
                                        
                                                                                <tr>
                                                                                    <td>Entamoeba Coli</td>
                                                                                    <td> <input type="text" class="form-control" name="coliT" id="coliTC"> </td>
                                                                                    <td> <input type="text" class="form-control" name="coliQ" id="coliQC"> </td>
                                                                                    <td>Trichuris trinchiura</td>
                                                                                    <td><input type="text" class="form-control" name="trinchiuraH" id="trinchiuraHC"></td>
                                                                                    <td><input type="text" class="form-control" name="trinchiuraL" id="trinchiuraLC"></td>
                                                                                </tr>
                                        
                                                                                <tr>
                                                                                    <td>Endolimax Nana</td>
                                                                                    <td> <input type="text" class="form-control" name="nanaT" id="nanaTC"> </td>
                                                                                    <td> <input type="text" class="form-control" name="nanaQ" id="nanaQC"> </td>
                                                                                    <td>Ancylostoma guod</td>
                                                                                    <td><input type="text" class="form-control" name="guodH" id="guodHC"></td>
                                                                                    <td><input type="text" class="form-control" name="guodL" id="guodLC"></td>
                                                                                </tr>
                                        
                                                                                <tr>
                                                                                    <td>Chilomastic mesnili</td>
                                                                                    <td> <input type="text" class="form-control" name="mesniliT" id="mesniliTC"> </td>
                                                                                    <td> <input type="text" class="form-control" name="mesniliQ" id="mesniliQC"> </td>
                                                                                    <td>Enterobios vermic</td>
                                                                                    <td><input type="text" class="form-control" name="vermicH" id="vermicHC"></td>
                                                                                    <td><input type="text" class="form-control" name="vermicL" id="vermicLC"></td>
                                                                                </tr>
                                        
                                                                                <tr>
                                                                                    <td>Giardia Lambia</td>
                                                                                    <td> <input type="text" class="form-control" name="lambiaT" id="lambiaTC"> </td>
                                                                                    <td> <input type="text" class="form-control" name="lambiaQ" id="lambiaQC"> </td>
                                                                                    <td>Strongiloides Sterco</td>
                                                                                    <td><input type="text" class="form-control" name="stercoH" id="stercoHC"></td>
                                                                                    <td><input type="text" class="form-control" name="stercoL" id="stercoLC"></td>
                                                                                </tr>
                                        
                                                                                <tr>
                                                                                    <td>Tricomonas hominis</td>
                                                                                    <td> <input type="text" class="form-control" name="hominisT" id="hominisTC"> </td>
                                                                                    <td> <input type="text" class="form-control" name="hominisQ" id="hominisQC"> </td>
                                                                                    <td>Hymenolepis nana</td>
                                                                                    <td><input type="text" class="form-control" name="hymenolepisH" id="hymenolepisHC"></td>
                                                                                    <td><input type="text" class="form-control" name="hymenolepisL" id="hymenolepisLC"></td>
                                                                                </tr>
                                        
                                                                                <tr>
                                                                                    <td>Balantidium coli</td>
                                                                                    <td> <input type="text" class="form-control" name="balantidiumT" id="balantidiumTC"> </td>
                                                                                    <td> <input type="text" class="form-control" name="balantidiumQ" id="balantidiumQC"> </td>
                                                                                    <td>Taenias</td>
                                                                                    <td><input type="text" class="form-control" name="taeniasH" id="taeniasHC"></td>
                                                                                    <td><input type="text" class="form-control" name="taeniasL" id="taeniasLC"></td>
                                                                                </tr>
                                        
                                                                                <tr>
                                                                                    <td>Blastocystis hominis</td>
                                                                                    <td> <input type="text" class="form-control" name="blastocystisT" id="blastocystisTC"> </td>
                                                                                    <td> <input type="text" class="form-control" name="blastocystisQ" id="blastocystisQC"> </td>
                                                                                    <td>Otros</td>
                                                                                    <td><input type="text" class="form-control" name="otrosH" id="otrosHC"></td>
                                                                                    <td><input type="text" class="form-control" name="otrosL" id="otrosLC"></td>
                                                                                </tr>
                                            
                                        
                                                                                <tr>
                                                                                    <td>Observaciones</td>
                                                                                    <td colspan="2"> <textarea class="form-control" name="observacionesC" id="observacionesCC"></textarea></td>
                                                                                    <td></td>
                                                                                    <td >
                                                                                        <input type="hidden" class="form-control" name="idCoprologia" id="idCoprologiaC"> 
                                                                                        <input type="hidden" class="form-control" name="idConsulta"> 
                                                                                        <button class="btn btn-primary btn-block mt-2"> <i class="fa fa-save"></i> Guardar</button>
                                                                                    </td>
                                                                                </tr>
                                            
                                            
                                                                            </table>
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
                                                                </form>
                                                            </div>
                                        
                                                            <div role="tabpanel" class="tab-pane fade" id="pruebasEspeciales">
                                                                <div id="dvPruebasEspeciales">
                                                                    <div class="row">
                                                                        <div class="col-md-6 text-center">
                                                                            <img src="<?php echo base_url(); ?>public/img/logo.png" width="250">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <table class="table table-borderless table-sm text-center">
                                                                                <tr>
                                                                                    <td><strong>Lorem ipsum dolor sit amet.</strong></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><strong>Lorem ipsum dolor sit amet.</strong></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><strong>Lorem ipsum dolor sit amet.</strong></td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="row">
                                                                        <table class="table table-borderless table-sm">
                                                                            <tr>
                                                                                <td><strong>Paciente:</strong></td>
                                                                                <td></td>
                                                                                <td><strong>Edad:</strong></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><strong>Médico: </strong></td>
                                                                                <td></td>
                                                                                <td><strong>Fecha: </strong></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
    
                                                                    <div class="row">
                                                                        <p>Examen</p>
                                                                        <table class="table table-bordered thead-primary w-100 text-center table-sm">
                                                                            <thead>
                                                                                <tr class="bg-primary">
                                                                                    <th>Parametro</th>
                                                                                    <th>Resultado</th>
                                                                                    <th>Valor de referancia</th>
                                                                                </tr>
                                                                            </thead>
    
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>A</td>
                                                                                    <td>A</td>
                                                                                    <td>A</td>
                                                                                </tr>
    
                                                                                <tr>
                                                                                    <td>A</td>
                                                                                    <td>A</td>
                                                                                    <td>A</td>
                                                                                </tr>
    
                                                                                <tr>
                                                                                    <td>A</td>
                                                                                    <td>A</td>
                                                                                    <td>A</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                </div>
                                                            </div>
                                        
                                                            <div role="tabpanel" class="tab-pane fade" id="bacteriologia">
                                                                <p>Bacteriología</p>
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
                                                        <td><input type="date" value="" class="form-control" name="proximaReceta" id="proximaReceta"></td>
                                                        <td><input type="hidden" value="<?php echo $paciente->idConsulta; ?>" class="form-control" name="consultaActual" id="consultaActual"></td>
                                                        <td><input type="hidden" value="<?php echo $paciente->idMedico; ?>" class="form-control" name="idMedico" id="idMedico"></td>
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
                                                                    <div class="input-group">
                                                                        <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                        <input type="text" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <div class="input-group">
                                                                        <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                        <input type="text" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <div class="input-group">
                                                                        <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                        <input type="text" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <div class="input-group">
                                                                        <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                        <input type="text" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" list="lista_medicamentos" class="form-control bold busquedaMedicamentos txtMedicamento" name="medicamento[]" placeholder="Medicamento">
                                                                    <div class="input-group">
                                                                        <input type="text" list="lista_indicaciones" class="form-control bold mt-1 busquedaIndicaciones txtIndicacion" name="indicacion[]"  placeholder="Indicación médica">
                                                                        <input type="text" style="width: 40px !important" list="lista_medidas" class="form-control bold mt-1 busquedaMedidas txtMedida" name="medida[]"  placeholder="Cantidad">
                                                                    </div>
                                                                </td>
                                                            </tr>
        
                                                        </table>

                                                    </div>
                                                    <textarea class="form-control" name="indicacionLibre" id="indicacionLibre"></textarea>

                                                    <div id="dvdDetalle" style="display: none">Detalle</div>

                                                    <datalist id="lista_medicamentos"></datalist>
                                                    <datalist id="lista_indicaciones"></datalist>
                                                    <datalist id="lista_medidas"></datalist>
                                                </div>
        
                                                <div class="col-md-2">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td><button class="btn btn-outline-primary btn-block" id="indicacionMedica"> <i class="fa fa-plus"></i>Indicación médica</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="#agregarIndicacion" data-toggle="modal" class="btn btn-outline-primary btn-block"> <i class="fa fa-clock"></i>Indicación horario</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="#agregarCantidad" data-toggle="modal" class="btn btn-outline-primary btn-block"> <i class="fa fa-plus"></i>Agregar cantidad</a></td>
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
        var html =  '<table class="table table-borderless text-center">';
        html +=  '<tr class="alert-primary"> <td colspan= "3">INFORMACION DE LA RECETA</td> </tr>';
        html +=  $(this).closest('tr').find('.htmlReceta').val();
        html +=  '<tr class="alert-danger"> <td colspan= "3"><a href="#" class="cerrarReceta"><i class="fa fa-times"></i></a></tr>';
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
    });
</script>

<script>
    $(document).on("click", ".verHematologia", function(e){
        e.preventDefault();
        $("#nombreExamen").val( $(this).closest('tr').find('.examenSolicitado').val());
        $("#fechaExamen").val($(this).closest('tr').find('.fechaExamen').val());
        $("#globulosRojos").val($(this).closest('tr').find('.globulosRojos').val());
        $("#eritrosedimentacion").val($(this).closest('tr').find('.eritrosedimentacion').val());
        $("#globulosBlancos").val($(this).closest('tr').find('.globulosBlancos').val());
        $("#reticulositos").val($(this).closest('tr').find('.reticulositos').val());
        $("#hematocrito").val($(this).closest('tr').find('.hematocrito').val());
        $("#tpTrombolastina").val($(this).closest('tr').find('.tpTrombolastina').val());
        $("#hemoglobina").val($(this).closest('tr').find('.hemoglobina').val());
        $("#tSangramiento").val($(this).closest('tr').find('.tSangramiento').val());
        $("#vlGMedio").val($(this).closest('tr').find('.vlGMedio').val());
        $("#tCoagulacion").val($(this).closest('tr').find('.tCoagulacion').val());
        $("#hbGMedia").val($(this).closest('tr').find('.hbGMedia').val());
        $("#tProtombina").val($(this).closest('tr').find('.tProtombina').val());
        $("#concHbGlobMed").val($(this).closest('tr').find('.concHbGlobMed').val());
        $("#neutrofilos").val($(this).closest('tr').find('.neutrofilos').val());
        $("#linfocitos").val($(this).closest('tr').find('.linfocitos').val());
        $("#eosinofilos").val($(this).closest('tr').find('.eosinofilos').val());
        $("#basofilos").val($(this).closest('tr').find('.basofilos').val());
        $("#monocitos").val($(this).closest('tr').find('.monocitos').val());
        $("#plaquetas").val($(this).closest('tr').find('.plaquetas').val());
        $("#observacionesH").val( $(this).closest('tr').find('.observacionesH').val());
    });


    $(document).on("click", ".verQuimica", function(e){
        e.preventDefault();
        

        $("#nombreExamen").val( $(this).closest('tr').find('.nombreExamen').val());
        $("#fechaExamenQ").val($(this).closest('tr').find('.fechaExamen').val());

        $("#glucosa").val($(this).closest('tr').find('.glucosa').val());
        $("#fosfatasa").val($(this).closest('tr').find('.fosfatasa').val());
        $("#glucosaPostPrand").val($(this).closest('tr').find('.glucosaPostPrand').val());
        $("#lipasa").val($(this).closest('tr').find('.lipasa').val());
        $("#globulina").val($(this).closest('tr').find('.globulina').val());
        $("#amilasa").val($(this).closest('tr').find('.amilasa').val());
        $("#trigliceridos").val($(this).closest('tr').find('.trigliceridos').val());
        $("#indiceAG").val($(this).closest('tr').find('.indiceAG').val());
        $("#colesterol").val($(this).closest('tr').find('.colesterol').val());
        $("#bilirrubinaD").val($(this).closest('tr').find('.bilirrubinaD').val());
        $("#colesterolHDL").val($(this).closest('tr').find('.colesterolHDL').val());
        $("#bilirrubinaI").val($(this).closest('tr').find('.bilirrubinaI').val());
        $("#colesterolLDL").val($(this).closest('tr').find('.colesterolLDL').val());
        $("#albumina").val($(this).closest('tr').find('.albumina').val());
        $("#acidoUrico").val($(this).closest('tr').find('.acidoUrico').val());
        $("#fosforo").val($(this).closest('tr').find('.fosforo').val());
        $("#creatinina").val($(this).closest('tr').find('.creatinina').val());
        $("#cloro").val($(this).closest('tr').find('.cloro').val());
        $("#nitrogeno").val($(this).closest('tr').find('.nitrogeno').val());
        $("#calcio").val($(this).closest('tr').find('.calcio').val());
        $("#proteinasT").val($(this).closest('tr').find('.proteinasT').val());
        $("#potasio").val($(this).closest('tr').find('.potasio').val());
        $("#bilirrubina").val($(this).closest('tr').find('.bilirrubina').val());
        $("#sodio").val($(this).closest('tr').find('.sodio').val());
        $("#tgo").val($(this).closest('tr').find('.tgo').val());
        $("#magnesio").val($(this).closest('tr').find('.magnesio').val());
        $("#tgp").val($(this).closest('tr').find('.tgp').val());
        $("#fosfatasaA").val($(this).closest('tr').find('.fosfatasaA').val());
        $("#observacionesQS").val($(this).closest('tr').find('.observacionesQS').val());

    });

    $(document).on("click", ".verUrianalisis", function(e){
        e.preventDefault();

        $("#nombreExamen").val($(this).closest('tr').find('.nombreExamen').val());
        $("#fechaExamen").val($(this).closest('tr').find('.fechaExamen').val());

        $("#color").val($(this).closest('tr').find('.color').val());
        $("#aspecto").val($(this).closest('tr').find('.aspecto').val());
        $("#reaccion").val($(this).closest('tr').find('.reaccion').val());
        $("#densidad").val($(this).closest('tr').find('.densidad').val());
        $("#ph").val($(this).closest('tr').find('.ph').val());
        $("#glucosaU").val($(this).closest('tr').find('.glucosa').val());
        $("#proteinas").val($(this).closest('tr').find('.proteinas').val());
        $("#pigmentosB").val($(this).closest('tr').find('.pigmentosB').val());
        $("#sangreO").val($(this).closest('tr').find('.sangreO').val());
        $("#nitritos").val($(this).closest('tr').find('.nitritos').val());
        $("#cuerposC").val($(this).closest('tr').find('.cuerposC').val());
        $("#acidosBiliares").val($(this).closest('tr').find('.acidosBiliares').val());
        $("#granulosos").val($(this).closest('tr').find('.granulosos').val());
        $("#cilindrosL").val($(this).closest('tr').find('.cilindrosL').val());
        $("#cilindrosH").val($(this).closest('tr').find('.cilindrosH').val());
        $("#otrosCilindros").val($(this).closest('tr').find('.otrosCilindros').val());
        $("#leucositos").val($(this).closest('tr').find('.leucositos').val());
        $("#hematies").val($(this).closest('tr').find('.hematies').val());
        $("#celulasE").val($(this).closest('tr').find('.celulasE').val());
        $("#elementosM").val($(this).closest('tr').find('.elementosM').val());
        $("#bacterias").val($(this).closest('tr').find('.bacterias').val());
        $("#levadura").val($(this).closest('tr').find('.levadura').val());
        $("#OtrosUno").val($(this).closest('tr').find('.otrosUno').val());
        $("#otrosDos").val($(this).closest('tr').find('.otrosDos').val());
        $("#observacionesU").val($(this).closest('tr').find('.observacionesU').val());

    });

    $(document).on("click", ".verCoprologia", function(e){
        e.preventDefault();
        $("#nombreExamenC").val($(this).closest('tr').find('.nombreExamen').val());
        $("#fechaExamenC").val($(this).closest('tr').find('.fechaExamen').val());

        $("#colorC").val($(this).closest('tr').find('.colorC').val());
        $("#consistenciaC").val($(this).closest('tr').find('.consistencia').val());
        $("#mucusC").val($(this).closest('tr').find('.mucus').val());
        $("#hematiesC").val($(this).closest('tr').find('.hematiesC').val());
        $("#leucocitosC").val($(this).closest('tr').find('.leucocitos').val());
        $("#bacteriasC").val($(this).closest('tr').find('.bacteriasC').val());
        $("#levadurasC").val($(this).closest('tr').find('.levaduras').val());
        $("#restosAMC").val($(this).closest('tr').find('.restosAM').val());
        $("#otrosUnoC").val($(this).closest('tr').find('.otrosUno').val());
        $("#otrosDosC").val($(this).closest('tr').find('.otrosDosC').val());
        $("#histolyticaTC").val($(this).closest('tr').find('.histolyticaT').val());
        $("#histolyticaQC").val($(this).closest('tr').find('.histolyticaQ').val());
        $("#ascarisHC").val($(this).closest('tr').find('.ascarisH').val());
        $("#ascarisLC").val($(this).closest('tr').find('.ascarisL').val());
        $("#coliTC").val($(this).closest('tr').find('.coliT').val());
        $("#coliQC").val($(this).closest('tr').find('.coliQ').val());
        $("#trinchiuraHC").val($(this).closest('tr').find('.trinchiuraH').val());
        $("#trinchiuraLC").val($(this).closest('tr').find('.trinchiuraL').val());
        $("#nanaTC").val($(this).closest('tr').find('.nanaT').val());
        $("#nanaQC").val($(this).closest('tr').find('.nanaQ').val());
        $("#guodHC").val($(this).closest('tr').find('.guodH').val());
        $("#guodLC").val($(this).closest('tr').find('.guodL').val());
        $("#mesniliTC").val($(this).closest('tr').find('.mesniliT').val());
        $("#mesniliQC").val($(this).closest('tr').find('.mesniliQ').val());
        $("#vermicHC").val($(this).closest('tr').find('.vermicH').val());
        $("#vermicLC").val($(this).closest('tr').find('.vermicL').val());
        $("#lambiaTC").val($(this).closest('tr').find('.lambiaT').val());
        $("#lambiaQC").val($(this).closest('tr').find('.lambiaQ').val());
        $("#stercoHC").val($(this).closest('tr').find('.stercoH').val());
        $("#stercoLC").val($(this).closest('tr').find('.stercoL').val());
        $("#hominisTC").val($(this).closest('tr').find('.hominisT').val());
        $("#hominisQC").val($(this).closest('tr').find('.hominisQ').val());
        $("#hymenolepisHC").val($(this).closest('tr').find('.hymenolepisH').val());
        $("#hymenolepisLC").val($(this).closest('tr').find('.hymenolepisL').val());
        $("#balantidiumTC").val($(this).closest('tr').find('.balantidiumT').val());
        $("#balantidiumQC").val($(this).closest('tr').find('.balantidiumQ').val());
        $("#taeniasHC").val($(this).closest('tr').find('.taeniasH').val());
        $("#taeniasLC").val($(this).closest('tr').find('.taeniasL').val());
        $("#blastocystisTC").val($(this).closest('tr').find('.blastocystisT').val());
        $("#blastocystisQC").val($(this).closest('tr').find('.blastocystisQ').val());
        $("#otrosHC").val($(this).closest('tr').find('.otrosH').val());
        $("#otrosLC").val($(this).closest('tr').find('.otrosL').val());
        $("#observacionesCC").val($(this).closest('tr').find('.observacionesC').val());


    });
</script>

