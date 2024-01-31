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
                <ol class="breadcrumb breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"> <a href="#"><i class="fa fa-users"></i> Botíquin </a> </li>
                    <li class="breadcrumb-item"><a href="#">Proveedores</a></li>
                </ol>
            </nav>

			<div class="ms-panel">
				<div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-6"><h6>Listado de proveedores</h6></div>
                        <div class="col-md-6 text-right">
                                <button class="btn btn-primary btn-sm" href="#agregarProveedor" data-toggle="modal"><i class="fa fa-plus"></i> Agregar provedor</button>
                                <a href="<?php echo base_url()?>Proveedor/lista_proveedores_excel" class="btn btn-success btn-sm"><i class="fa fa-file-excel"></i> Ver Excel</a>
                                <!--<button class="btn btn-success btn-sm"><i class="fa fa-file-pdf"></i> Ver PDF</button>-->
                        </div>
                    </div>
				</div>
				<div class="ms-panel-body">
                    <div class="row">
                        <div class="table-responsive mt-3">
							<?php
								if (sizeof($proveedores) > 0) {
							?>
							<table id="" class="table table-striped thead-primary w-100 tablaPlus">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Código</th>
                                        <th class="text-center" scope="col">Proveedor</th>
                                        <th class="text-center" scope="col">NRC</th>
                                        <th class="text-center" scope="col">Visitador</th>
                                        <th class="text-center" scope="col">Teléfono</th>
                                        <th class="text-center" scope="col">Plazo para pagos</th>
                                        <th class="text-center" scope="col">Tipo contribuyente</th>
                                        <th class="text-center" scope="col">Dirección</th>
                                        <th class="text-center" scope="col">Opción</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$index = 0;
										foreach ($proveedores as $proveedor) {
											$index++;
									?>
                                    <tr>
                                        <td class="text-center" scope="row"><?php echo $proveedor->codigoProveedor?></td>
                                        <td class="text-center"><?php echo $proveedor->empresaProveedor?></td>
                                        <td class="text-center"><?php echo $proveedor->nrcProveedor?></td>
                                        <td class="text-center"><?php echo $proveedor->visitadorProveedor; ?></td>
                                        <td class="text-center"><?php echo $proveedor->telefonoProveedor?></td>
                                        <td class="text-center"><?php echo $proveedor->plazoProveedor; ?> dias</td>
                                        <td class="text-center"><?php echo $proveedor->tipoContribuyente; ?></td>
                                        <td class="text-center"><?php echo $proveedor->direccionProveedor; ?></td>
                                        <td class="text-center">
											<input type="hidden" value="<?= $proveedor->codigoProveedor; ?>" class="codigoProveedor">
											<input type="hidden" value="<?= $proveedor->empresaProveedor; ?>" class="empresaProveedor">
											<input type="hidden" value="<?= $proveedor->nrcProveedor; ?>" class="nrcProveedor">
											<input type="hidden" value="<?= $proveedor->visitadorProveedor; ?>" class="visitadorProveedor">
											<input type="hidden" value="<?= $proveedor->telefonoProveedor; ?>" class="telefonoProveedor">
											<input type="hidden" value="<?= $proveedor->plazoProveedor; ?>" class="plazoProveedor">
											<input type="hidden" value="<?= $proveedor->tipoContribuyente; ?>" class="tipoContribuyente">
											<input type="hidden" value="<?= $proveedor->direccionProveedor; ?>" class="direccionProveedor">
											<input type="hidden" value="<?= $proveedor->idProveedor; ?>" class="idProveedor">
										<?php
											echo "<a href='#actualizarProveedor' class='btnActualizarProveedor' data-toggle='modal'><i class='fas fa-edit ms-text-success'></i></a>";
                                            if($this->session->userdata("nivel") == 1){
												echo "<a class='btnElinarProveedor' href='#eliminarProveedor' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
											}
										?>

                                        </td>
                                    </tr>

									<?php } ?>
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
<div class="modal fade" id="agregarProveedor" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog ms-modal-dialog-width">
		<div class="modal-content ms-modal-content-width">
			<div class="modal-header  ms-modal-header-radius-0">
				<h4 class="modal-title text-white">Datos del proveedor</h4>
				<button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
			</div>

			<div class="modal-body p-0 text-left">
				<div class="col-xl-12 col-md-12">
					<div class="ms-panel ms-panel-bshadow-none">
						<div class="ms-panel-body">
							<form class="needs-validation" method="post" action="<?php echo base_url()?>Proveedor/guardar_proveedor" novalidate>
								
                                <div class="form-row">

									<div class="col-md-12">
										<label for=""><strong>Código</strong></label>
										<div class="input-group">
											<input type="text" class="form-control" value=<?php echo $cod; ?> readonly>
											<input type="hidden" class="form-control" id="codigoProveedor" name="codigoProveedor" value=<?php echo $cod; ?> required>
                                            <div class="invalid-tooltip">
                                                Ingrese el codigo del proveedor.
                                            </div>
										</div>
									</div>

									<div class="col-md-6">
										<label for=""><strong>Nombre</strong></label>
										<div class="input-group">
											<input type="text" class="form-control" id="empresaProveedor" name="empresaProveedor" placeholder="Nombre de la empresa" required>
                                            <div class="invalid-tooltip">
                                                Ingrese el nombre de la empresa.
                                            </div>
										</div>
									</div>

									<div class="col-md-6">
										<label for=""><strong>NRC</strong></label>
										<div class="input-group">
											<input type="text" class="form-control" id="nrcProveedor" name="nrcProveedor" placeholder="NRC del proveedor" required>
                                            <div class="invalid-tooltip">
                                                Ingrese el NRC del proveedor.
                                            </div>
										</div>
									</div>

									<div class="col-md-6">
										<label for=""> <strong>Teléfono</strong> </label>
										<div class="input-group">
											<input type="text" class="form-control" data-mask="9999-9999" id="telefonoProveedor" name="telefonoProveedor" placeholder="Teléfono del proveedor" required>
                                            <div class="invalid-tooltip">
                                                Ingrese el número de teléfono.
                                            </div>
										</div>
									</div>

									<div class="col-md-6">
										<label for=""> <strong>Nombre(Visitador)</strong></label>
										<div class="input-group">
											<input type="text" class="form-control" id="visitadorProveedor" name="visitadorProveedor" placeholder="Nombre del visitador" required>
                                            <div class="invalid-tooltip">
                                                Nombre del visitador.
                                            </div>
										</div>
									</div>

									<div class="col-md-6">
										<label for=""> <strong>Plazo para pagos</strong></label>
										<div class="input-group">
											<input type="text" class="form-control" id="plazoProveedor" name="plazoProveedor" placeholder="Dias que se dan para efectuar el pago" required>
                                            <div class="invalid-tooltip">
                                                Ingrese el numero de dias.
                                            </div>
										</div>
									</div>

									<div class="col-md-6">
										<label for=""> <strong>Tipo Contribuyente</strong></label>
										<div class="input-group">
											<select class="form-control" id="tipoContribuyente" name="tipoContribuyente" required>
												<option value="">.:: Seleccionar ::.</option>
												<option value="Pequeño">Pequeño</option>
												<option value="Mediano">Mediano</option>
												<option value="Grande">Grande</option>
											</select>
                                            <div class="invalid-tooltip">
                                                Seleccione el tipo de contribuyente.
                                            </div>
										</div>
									</div>

									<div class="col-md-12">
										<label for=""><strong>Dirección</strong></label>
										<div class="input-group">
											<textarea  class="form-control disableSelect" id="direccionProveedor" name="direccionProveedor" required></textarea>
                                            <div class="invalid-tooltip">
                                                Ingrese la dirección del proveedor.
                                            </div>
										</div>
									</div>

								</div>

								<div class="text-center">
                                    <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar proveedor</button>
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

<!-- Modal para agregar datos del Medicamento-->
	<div class="modal fade" id="actualizarProveedor" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog ms-modal-dialog-width">
			<div class="modal-content ms-modal-content-width">
				<div class="modal-header  ms-modal-header-radius-0">
					<h4 class="modal-title text-white">Datos del proveedor</h4>
					<button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
				</div>

				<div class="modal-body p-0 text-left">
					<div class="col-xl-12 col-md-12">
						<div class="ms-panel ms-panel-bshadow-none">
							<div class="ms-panel-body">
								<form class="needs-validation" method="post" action="<?php echo base_url()?>Proveedor/actualizar_proveedor" novalidate>

									<div class="form-row">

										<div class="col-md-12">
											<label for=""><strong>Código</strong></label>
											<div class="input-group">
												<input type="text" class="form-control" value=<?php echo $cod; ?> readonly>
												<input type="hidden" class="form-control" id="codigoProveedorA" name="codigoProveedor" value=<?php echo $cod; ?> required>
												<div class="invalid-tooltip">
													Ingrese el codigo del proveedor.
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<label for=""><strong>Nombre</strong></label>
											<div class="input-group">
												<input type="text" class="form-control" id="empresaProveedorA" name="empresaProveedor" placeholder="Nombre de la empresa" required>
												<div class="invalid-tooltip">
													Ingrese el nombre de la empresa.
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<label for=""><strong>NRC</strong></label>
											<div class="input-group">
												<input type="text" class="form-control" id="nrcProveedorA" name="nrcProveedor" placeholder="NRC del proveedor" required>
												<div class="invalid-tooltip">
													Ingrese el NRC del proveedor.
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<label for=""> <strong>Teléfono</strong> </label>
											<div class="input-group">
												<input type="text" class="form-control" data-mask="9999-9999" id="telefonoProveedorA" name="telefonoProveedor" placeholder="Teléfono del proveedor" required>
												<div class="invalid-tooltip">
													Ingrese el número de teléfono.
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<label for=""> <strong>Nombre(Visitador)</strong></label>
											<div class="input-group">
												<input type="text" class="form-control" id="visitadorProveedorA" name="visitadorProveedor" placeholder="Nombre del visitador" required>
												<div class="invalid-tooltip">
													Nombre del visitador.
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<label for=""> <strong>Plazo para pagos</strong></label>
											<div class="input-group">
												<input type="text" class="form-control" id="plazoProveedorA" name="plazoProveedor" placeholder="Dias que se dan para efectuar el pago" required>
												<div class="invalid-tooltip">
													Ingrese el numero de dias.
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<label for=""> <strong>Tipo Contribuyente</strong></label>
											<div class="input-group">
												<select class="form-control" id="tipoContribuyenteA" name="tipoContribuyente" required>
													<option value="">.:: Seleccionar ::.</option>
													<option value="Pequeño">Pequeño</option>
													<option value="Mediano">Mediano</option>
													<option value="Grande">Grande</option>
												</select>
												<div class="invalid-tooltip">
													Seleccione el tipo de contribuyente.
												</div>
											</div>
										</div>

										<div class="col-md-12">
											<label for=""><strong>Dirección</strong></label>
											<div class="input-group">
												<textarea  class="form-control disableSelect" id="direccionProveedorA" name="direccionProveedor" required></textarea>
												<div class="invalid-tooltip">
													Ingrese la dirección del proveedor.
												</div>
											</div>
										</div>

									</div>

									<input type="hidden" class="form-control" id="idProveedorA" name="idProveedor">
									<div class="text-center">
										<button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar proveedor</button>
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


<!-- Modal para agregar datos del Medicamento-->
	<div class="modal fade" id="eliminarProveedor" tabindex="-1" role="dialog" aria-labelledby="modal-5">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content pb-5">

				<div class="modal-header bg-danger">
					<h3 class="modal-title has-icon text-white"><i class="flaticon-alert-1"></i> Advertencia</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
				</div>

				<div class="modal-body text-center">
					<p class="h5">¿Estas seguro de eliminar los datos de este proveedor?</p>
				</div>
				
				<form action="<?php echo base_url() ?>Proveedor/eliminar_proveedor" method="post">
					<input type="hidden" id="proveedorEliminar" name="proveedorEliminar"/>
					<div class="text-center">
						<button class="btn btn-danger shadow-none"><i class="fa fa-trash"></i> Eliminar</button>
						<button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<!-- Fin Modal eliminar  datos del Medicamento-->


<script>

	$(document).on('click', '.btnActualizarProveedor', function(e) {
		e.preventDefault();
		$("#codigoProveedorA").val($(this).closest('tr').find('.codigoProveedor').val());
		$("#empresaProveedorA").val($(this).closest('tr').find('.empresaProveedor').val());
		$("#nrcProveedorA").val($(this).closest('tr').find('.nrcProveedor').val());
		$("#telefonoProveedorA").val($(this).closest('tr').find('.telefonoProveedor').val());
		$("#visitadorProveedorA").val($(this).closest('tr').find('.visitadorProveedor').val());
		$("#plazoProveedorA").val($(this).closest('tr').find('.plazoProveedor').val());
		$("#tipoContribuyenteA").val($(this).closest('tr').find('.tipoContribuyente').val());
		$("#direccionProveedorA").val($(this).closest('tr').find('.direccionProveedor').val());
		$("#idProveedorA").val($(this).closest('tr').find('.idProveedor').val());
	});

	$(document).on('click', '.btnElinarProveedor', function(e) {
		e.preventDefault();
		$("#proveedorEliminar").val($(this).closest('tr').find('.idProveedor').val());
	});

</script>