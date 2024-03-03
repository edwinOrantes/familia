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

<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
	<div class="row">
		<div class="col-md-12">

			<nav aria-label="breadcrumb">
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item" aria-current="page"> <a href="#"><i class="fa fa-file-word"></i> Laboratorio </a> </li>
                    <li class="breadcrumb-item"><a href="#">Examenes</a></li>
                </ol>
            </nav>

			<div class="ms-panel">
				<div class="ms-panel-header ms-panel-custome">
                    <h6>Lista de examenes</h6>
				</div>
				<div class="ms-panel-body">
					<div class="row">
                        <div class="table-responsive mt-3">
                            <?php
                                if(sizeof($paciente) > 0){
                            ?>
                            <table id="tabla-consultas" class="table table-striped thead-primary w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">#</th>
                                        <th class="text-center" scope="col">Paciente</th>
                                        <th class="text-center" scope="col">Médico</th>
                                        <th class="text-center" scope="col">Fecha</th>
                                        <th class="text-center" scope="col">Opción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    foreach ($paciente as $paciente) {
                                        $id ='"'.$paciente->idPaciente.'"'; // Id del paciente.
                                        $nombre ='"'.$paciente->nombrePaciente.'"'; // Nombre del paciente.
                                        $edad ='"'.$paciente->edadPaciente.'"'; // Edad del paciente.
                                        $medico ='"'.$paciente->idMedico.'"'; // Id del medico.
                                        $idConsultaLaboratorio ='"'.$paciente->idConsultaLaboratorio.'"'; // Id del medico.
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $paciente->codigoConsulta; ?></td>
                                        <td class="text-center"><?php echo $paciente->nombrePaciente; ?></td>
                                        <td class="text-center"><?php echo $paciente->nombreMedico; ?></td>
                                        <td class="text-center"><?php echo substr($paciente->fechaConsultaLaboratorio, 0, 10); ?></td>
										<td class="text-center">
                                            <a href="<?php echo base_url(); ?>Laboratorio/detalle_consulta/<?php echo $paciente->idConsultaLaboratorio; ?>/" target="blank" title="Ver detalle"><i class="fas fa-eye ms-text-primary"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
								</tbody>
                            </table>
							<?php
                                }else{
                                    echo '<div class="alert-danger p-3 bold text-center">No hay datos que mostrar.</div>';
                                }
                            ?>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

	$(document).ready(function() {
		$("#tabla-consultas").DataTable({
			//stateSave: true,
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
			},
			"order": [[ 0, "desc"]]
		})
	});

</script>
