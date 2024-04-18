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
                                <td><strong>DUI: </strong></td>
                                <td><?php echo $paciente->duiPaciente; ?></td>
                                <td><strong>Dirección: </strong></td>
                                <td><?php echo $paciente->direccionPaciente; ?></td>
                            </tr>

                            <tr>
                                <td><strong>Estatura: </strong></td>
                                <td><?php echo $paciente->altura; ?></td>
                                <td><strong>Peso: </strong></td>
                                <td><?php echo $paciente->peso; ?></td>
                                <td><strong>IMC: </strong></td>
                                <td><?php echo $paciente->imc; ?></td>
                                <td><strong>Temperatura: </strong></td>
                                <td><?php echo $paciente->temperaturaPaciente; ?></td>
                                <td><strong>Presión arterial: </strong></td>
                                <td><?php echo $paciente->presionPaciente; ?></td>
                            </tr>
                        </table>
                    </div>

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
                                    <p>Datos del paciente</p>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tabConsulta">
                                    <p>Consultas</p>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="antecedentes">
                                    <p>Antecedentes</p>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="examanesLaboratorio">
                                    <p>Laboratorio clinico</p>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="recetas">
                                    <p>Recetas</p>
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
