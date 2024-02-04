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
                <ol class="breadcrumb breadcrumb-arrow has-gap">
                    <li class="breadcrumb-item" aria-current="page"> <a href="#"><i class="fa fa-user-md"></i> Botiquin </a> </li>
                    <li class="breadcrumb-item"><a href="#">gestión de fabricantes</a></li>
                </ol>
            </nav>

			<div class="ms-panel">
				<div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-6"><h6>Listado de fabricantes</h6></div>
                        <div class="col-md-6 text-right">
                                <button class="btn btn-primary btn-sm" href="#agregarFabricante" data-toggle="modal"><i class="fa fa-plus"></i> Agregar fabricante</button>
                                <!-- <a href="<?php echo base_url()?>Medico/medicos_excel" class="btn btn-success btn-sm"><i class="fa fa-file-excel"></i> Ver Excel</a> -->
                                <!--<button class="btn btn-success btn-sm"><i class="fa fa-file-pdf"></i> Ver PDF</button>-->
                        </div>
                    </div>
				</div>
				<div class="ms-panel-body">
                    <div class="row">

                        <?php
                            if(sizeof($fabricantes) > 0){
                        ?>
                        <div class="table-responsive mt-3">
                            <table id="" class="table table-striped thead-primary w-100 tablaPlus">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">#</th>
                                        <th class="text-center" scope="col">Nombre</th>
                                        <th class="text-center" scope="col">Tiempo para devolucion</th>
                                        <th class="text-center" scope="col">Opción</th>
                                    </tr>
                                </thead>
                                <tbody>

									<?php
									$index = 0;
										foreach ($fabricantes as $row) {
											$index++;
									?>
                                    <tr>
                                        <td class="text-center" scope="row"><?php echo $index; ?></td>
                                        <td class="text-center"><?php echo $row->nombreFabricante; ?></td>
                                        <td class="text-center"><?php echo $row->tiempoFabricante; ?> dias</td>
                                        <td class="text-center">
                                            <input type="hidden" value="<?php echo $row->nombreFabricante; ?>" class="nombreFabricante">
                                            <input type="hidden" value="<?php echo $row->tiempoFabricante; ?>" class="tiempoFabricante">
                                            <input type="hidden" value="<?php echo $row->idFabricante; ?>" class="idFabricante">
										<?php
                                            //echo "<a onclick='verDetalle($id, $nombre, $especialidad, $telefono, $direccion)' href='#verMedico' data-toggle='modal'><i class='far fa-eye ms-text-primary'></i></a>";
                                            echo "<a href='#actualizarFabricante' class='editarFabricante' data-toggle='modal'><i class='fas fa-edit ms-text-success'></i></a>";
											switch($this->session->userdata('nivel')) {
												case '1':
													echo "<a href='#eliminarFabricante' class='eliminarFabricante' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
												break;
												default:
													echo "";
													break;
											}
										?>
                                        </td>
                                    </tr>

									<?php }	?>
                                </tbody>
                            </table>
                        </div>

                        <?php
                            }else{
                                echo '<div class="col-md-12 p-3 alert-danger text-danger bold text-center">No hay datos que mostrar.</div>';
                            }
                        ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal para agregar datos del Medicamento-->
<div class="modal fade" id="agregarFabricante" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog ms-modal-dialog-width">
		<div class="modal-content ms-modal-content-width">
			<div class="modal-header  ms-modal-header-radius-0">
				<h4 class="modal-title text-white"></i> Datos del fabricante</h4>
				<button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
			</div>

			<div class="modal-body p-0 text-left">
				<div class="col-xl-12 col-md-12">
					<div class="ms-panel ms-panel-bshadow-none">
						<div class="ms-panel-body">
							<form class="needs-validation" id="frmMedico"  method="post" action="<?php echo base_url() ?>Botiquin/guardar_fabricante"  novalidate>
								
                                <div class="form-row">
									<div class="col-md-12">
										<label for=""><strong>Nombre</strong></label>
										<div class="input-group">
											<input type="text" class="form-control" id="nombreFabricante" name="nombreFabricante" placeholder="Nombre del fabricante" required>
                                            <div class="invalid-tooltip">
                                                Ingrese un nombre.
                                            </div>
										</div>
									</div>

									<div class="col-md-12">
										<label for=""><strong>Tiempo para devoluciones</strong></label>
										<div class="input-group">
											<select class="form-control" id="devolucionMedico" name="devolucionMedico" required>
                                                <option value="">.::Seleccionar::.</option>
                                                <option value="30">1 Mes</option>
                                                <option value="60">2 Mes</option>
                                                <option value="90">3 Mes</option>
                                                <option value="120">4 Mes</option>
                                                <option value="150">5 Mes</option>
                                                <option value="180">6 Mes</option>
                                            </select>
                                            <div class="invalid-tooltip">
                                                Ingrese el tiempo permitido para una devolución
                                            </div>
										</div>
									</div>
								</div>

								<div class="text-center">
                                    <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                    <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
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


<!-- Modal para actualizar datos del Medicamento-->
<div class="modal fade" id="actualizarFabricante" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog ms-modal-dialog-width">
		<div class="modal-content ms-modal-content-width">
			<div class="modal-header  ms-modal-header-radius-0">
				<h4 class="modal-title text-white"></i> Datos del médico</h4>
				<button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
			</div>

			<div class="modal-body p-0 text-left">
				<div class="col-xl-12 col-md-12">
					<div class="ms-panel ms-panel-bshadow-none">
						<div class="ms-panel-body">
							
                            <form class="needs-validation" id="frmMedico"  method="post" action="<?php echo base_url() ?>Botiquin/actualizar_fabricante"  novalidate>
								
                                <div class="form-row">
									<div class="col-md-12">
										<label for=""><strong>Nombre</strong></label>
										<div class="input-group">
											<input type="text" class="form-control" id="nombreFabricanteA" name="nombreFabricante" placeholder="Nombre del fabricante" required>
                                            <div class="invalid-tooltip">
                                                Ingrese un nombre.
                                            </div>
										</div>
									</div>

									<div class="col-md-12">
										<label for=""><strong>Tiempo para devoluciones</strong></label>
										<div class="input-group">
											<select class="form-control" id="devolucionMedicoA" name="devolucionMedico" required>
                                                <option value="">.::Seleccionar::.</option>
                                                <option value="30">1 Mes</option>
                                                <option value="60">2 Mes</option>
                                                <option value="90">3 Mes</option>
                                                <option value="120">4 Mes</option>
                                                <option value="150">5 Mes</option>
                                                <option value="180">6 Mes</option>
                                            </select>
                                            <div class="invalid-tooltip">
                                                Ingrese el tiempo permitido para una devolución
                                            </div>
										</div>
									</div>
								</div>

								<div class="text-center">
									<input type="hidden" class="form-control" id="idFabricanteA" name="idFabricante" required>
                                    <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar </button>
                                    <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                                </div>
							</form>
                            
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Fin Modal actualizar datos del Medicamento-->


<!-- Modal para eliminar datos del Medicamento-->
<div class="modal fade" id="eliminarFabricante" tabindex="-1" role="dialog" aria-labelledby="modal-5">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content pb-5">
			<form action="<?php echo base_url() ?>Botiquin/eliminar_fabricante" method="post">
				<div class="modal-header bg-danger">
					<h3 class="modal-title has-icon text-white"><i class="flaticon-alert-1"></i> Advertencia</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
				</div>

				<div class="modal-body text-center">
					<p class="h5">¿Estas seguro de eliminar los datos de este fabricante ?</p>
					<input type="hidden" id="idEliminar" name="idEliminar"/>
				</div>

				<div class="text-center">
					<button type="submit" class="btn btn-danger shadow-none"><i class="fa fa-trash"></i> Eliminar</button>
					<button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
				</div>
			</form>

		</div>
	</div>
</div>
<!-- Fin Modal eliminar  datos del Medicamento-->

<script>
    $(document).on("click", ".editarFabricante", function(e) {
        e.preventDefault();
        $("#nombreFabricanteA").val($(this).closest('tr').find('.nombreFabricante').val());
        $("#devolucionMedicoA").val($(this).closest('tr').find('.tiempoFabricante').val());
        $("#idFabricanteA").val($(this).closest('tr').find('.idFabricante').val());
    });

    $(document).on("click", ".eliminarFabricante", function(e) {
        e.preventDefault();
        $("#idEliminar").val($(this).closest('tr').find('.idFabricante').val());
    });
</script>