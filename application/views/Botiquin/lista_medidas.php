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
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"> <a href="#"><i class="fa fa-medkit"></i> Botíquin </a> </li>
                    <li class="breadcrumb-item"><a href="#">Medidas</a></li>
                </ol>
            </nav>

			<div class="ms-panel">

				<div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-6"><h6>Listado de medidas</h6></div>
                        <div class="col-md-6 text-right">
                                <button class="btn btn-primary btn-sm" href="#agregarMedida" data-toggle="modal"><i class="fa fa-plus"></i> Agregar medida</button>
                        </div>
                    </div>
				</div>

				<div class="ms-panel-body">
                    <div class="row">
                        <div class="table-responsive mt-3">
							<?php
								if (sizeof($medidas) > 0) {
							?>
                            <table id="" class="table table-striped thead-primary w-100 tabla-medicamentos">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">#</th>
                                        <th class="text-center" scope="col">Nombre</th>
                                        <th class="text-center" scope="col">Cantidad</th>
                                        <th class="text-center" scope="col">Unidad</th>
                                        <th class="text-center" scope="col">Opción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $index = 0;
                                        foreach ($medidas as $row) {
                                            $index++;
                                    ?>

                                    <tr>
                                        <td class="text-center"><?php echo $index; ?></td>
                                        <td class="text-center"><?php echo $row->nombreMedida; ?></td>
                                        <td class="text-center"><?php echo $row->cantidadMedida; ?></td>
                                        <td class="text-center"><?php echo $row->unidadMedida; ?></td>
                                        <td class="text-center">
											<!-- variable -->
												<input type="hidden" value="<?php echo $row->idMedida; ?>" class="idMedida">
												<input type="hidden" value="<?php echo $row->nombreMedida; ?>" class="nombreMedida">
												<input type="hidden" value="<?php echo $row->cantidadMedida; ?>" class="cantidadMedida">
												<input type="hidden" value="<?php echo $row->unidadMedida; ?>" class="unidadMedida">
											<!-- variable -->

											<?php
												echo "<a href='#actualizarMedida' class='actualizarMedida' data-toggle='modal'><i class='fas fa-pencil-alt ms-text-success'></i></a>";
												echo "<a href='#eliminarMedida' class='eliminarMedida' data-toggle='modal'><i class='fas fa-trash-alt ms-text-danger'></i></a>";
											?>
                                        </td>
                                    </tr>

                                    <?php
                                        }
                                    ?>

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


<!-- Modal para agregar datos del Medicamento-->
    <div class="modal fade" id="agregarMedida" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Datos de la medida</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">
                                <form class="needs-validation" method="post" action="<?php echo base_url()?>Botiquin/guardar_medida" novalidate>
                                    
                                    <div class="form-row">

                                        <div class="col-md-12 mb-2">
                                            <label for=""><strong>Nombre</strong></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="nombreMedida" name="nombreMedida" placeholder="Nombre de la medida" required>
                                                <div class="invalid-tooltip">
                                                    Ingrese un nombre.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for=""><strong>Cantidad</strong></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="cantidadMedida" name="cantidadMedida" placeholder="Ingrese una cantidad" required>
                                                <div class="invalid-tooltip">
                                                    Ingrese una cantidad.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for=""><strong>Unidades</strong></label>
                                            <div class="input-group">
                                                <select class="form-control" id="unidadMedida" name="unidadMedida" required>
                                                    <option value="">.:Seleccionar:.</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Blister">Blister</option>
                                                    <option value="Ml">Ml</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CC">Rollo</option>
                                                </select>
                                                <div class="invalid-tooltip">
                                                    Seleccione la unidad de medida.
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="text-center">
                                        <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar </button>
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
    <div class="modal fade" id="actualizarMedida" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Datos de la medida</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">
                                <form class="needs-validation" method="post" action="<?php echo base_url()?>Botiquin/actualizar_medida" novalidate>
                                    
                                    <div class="form-row">

                                        <div class="col-md-12 mb-2">
                                            <label for=""><strong>Nombre</strong></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="nombreMedidaU" name="nombreMedida" placeholder="Nombre de la medida" required>
                                                <div class="invalid-tooltip">
                                                    Ingrese un nombre.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for=""><strong>Cantidad</strong></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="cantidadMedidaU" name="cantidadMedida" placeholder="Ingrese una cantidad" required>
                                                <div class="invalid-tooltip">
                                                    Ingrese una cantidad.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for=""><strong>Unidades</strong></label>
                                            <div class="input-group">
                                                <select class="form-control" id="unidadMedidaU" name="unidadMedida" required>
                                                    <option value="">.:Seleccionar:.</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Blister">Blister</option>
                                                    <option value="Ml">Ml</option>
                                                    <option value="CC">CC</option>
                                                    <option value="CC">Rollo</option>
                                                </select>
                                                <div class="invalid-tooltip">
                                                    Seleccione la unidad de medida.
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="text-center">
                                        <input type="text" class="form-control" id="idMedidaU" name="idMedida" required>
                                        <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar </button>
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


<!-- Modal para agregar datos del Medicamento-->
	<div class="modal fade" id="eliminarMedida" tabindex="-1" role="dialog" aria-labelledby="modal-5">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content pb-5">

				<div class="modal-header bg-danger">
					<h3 class="modal-title has-icon text-white"><i class="flaticon-alert-1"></i> Advertencia</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
				</div>

				<div class="modal-body text-center">
					<p class="h5">¿Estas seguro de eliminar los datos de esta medida?</p>
				</div>

				<form action="<?php echo base_url()?>Botiquin/eliminar_medida" method="post">
					<input type="hidden" id="idMedidaD" name="idMedida">									
					<div class="text-center">
						<button type="submit" class="btn btn-danger shadow-none"><i class="fa fa-trash"></i> Eliminar</button>
					</div>
				</form>

			</div>
		</div>
	</div>
<!-- Fin Modal eliminar  datos del Medicamento-->

<script>
	$(document).on("click", ".actualizarMedida", function(e) {
		e.preventDefault();

        $("#nombreMedidaU").val($(this).closest('tr').find('.nombreMedida').val());
        $("#cantidadMedidaU").val($(this).closest('tr').find('.cantidadMedida').val());
        $("#unidadMedidaU").val($(this).closest('tr').find('.unidadMedida').val());
        $("#idMedidaU").val($(this).closest('tr').find('.idMedida').val());
	});


	$(document).on("click", ".eliminarMedida", function(e) {
		e.preventDefault();
		$("#idMedidaD").val($(this).closest('tr').find('.idMedida').val());

	});


</script>