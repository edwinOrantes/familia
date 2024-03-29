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
                    <li class="breadcrumb-item"><a href="#">Lista medicamentos</a></li>
                </ol>
            </nav>

			<div class="ms-panel">

				<div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-6"><h6>Listado de medicamentos</h6></div>
                        <div class="col-md-6 text-right">
                                <button class="btn btn-primary btn-sm" href="#agregarMedicamento" data-toggle="modal"><i class="fa fa-plus"></i> Agregar Medicamento</button>
                                <a href="<?php echo base_url()?>Botiquin/medicamentos_excel" class="btn btn-success btn-sm"><i class="fa fa-file-excel"></i> Ver Excel</a>
                                <!--<button class="btn btn-success btn-sm"><i class="fa fa-file-pdf"></i> Ver PDF</button>-->
                        </div>
                    </div>
				</div>

				<div class="ms-panel-body">
                    <div class="row">
                        <div class="table-responsive mt-3">
							<?php
								if (sizeof($medicamentos) > 0) {
							?>
                            <table id="" class="table table-striped thead-primary w-100 tabla-medicamentos">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Código</th>
                                        <th class="text-center" scope="col">Nombre</th>
                                        <th class="text-center" scope="col">Precio Compra</th>
                                        <th class="text-center" scope="col">Precio Venta</th>
                                        <th class="text-center" scope="col">Existencia</th>
                                        <th class="text-center" scope="col">Opción</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
									$index = 0;
									$cero = 0;
									$st = 0;
									foreach ($medicamentos as $medicamento) {

										if($medicamento->tipoMedicamento != "Servicios" && $medicamento->tipoMedicamento != "Otros servicios"){
											// Obteniendo valores
												$index++;
												$id ='"'.$medicamento->idMedicamento.'"';
												$codigo = '"'.$medicamento->codigoMedicamento.'"';
												$nombre = '"'.$medicamento->nombreMedicamento.'"';
												$idfabricante = '"'.$medicamento->idFabricante.'"';
												$precioC = '"'.$medicamento->precioCMedicamento.'"';
												$precioV = '"'.$medicamento->precioVMedicamento.'"';
												$tipo = '"'.$medicamento->tipoMedicamento.'"';
												$clasif = '"'.$medicamento->nombreClasificacionMedicamento.'"';
												$idclasif = '"'.$medicamento->idClasificacionMedicamento.'"';
												$stock = '"'.$medicamento->stockMedicamento.'"';
												$usados = '"'.$medicamento->usadosMedicamento.'"';
												if($medicamento->tipoMedicamento == "Servicios"){
													$stock = '"'.$cero.'"';
												}else{
													$stock = '"'.$medicamento->stockMedicamento.'"';
												} 

												if($medicamento->tipoMedicamento == 1){
													$alert = "alert-danger";
												}else{
													$alert = "";
												}

											// Obteniendo valores

								?>
                                    <tr class="<?php echo $alert; ?>">
                                        <td class="text-center"><?php echo $medicamento->codigoMedicamento; ?></td>
                                        <td class="text-center"><?php echo $medicamento->nombreMedicamento; ?></td>
                                        <td class="text-center">$ <?php echo number_format($medicamento->precioCMedicamento, 2); ?></td>
                                        <td class="text-center">$ <?php echo number_format($medicamento->precioVMedicamento, 2); ?></td>
                                        <td class="text-center">
											<?php
												if($medicamento->stockMedicamento == 0){
													echo '<span class="badge badge-gradient-danger">Sin stock</span>';
												}else{
													echo $medicamento->stockMedicamento;
												}
											?>
										</td>
                                        <td class="text-center">
											<!-- variable -->
												<input type="hidden" value="<?php echo $medicamento->idMedicamento; ?>" class="idMedicamento">
												<input type="hidden" value="<?php echo $medicamento->codigoMedicamento; ?>" class="codigoMedicamento">
												<input type="hidden" value="<?php echo $medicamento->nombreMedicamento; ?>" class="nombreMedicamento">
												<input type="hidden" value="<?php echo $medicamento->idFabricante; ?>" class="idFabricante">
												<input type="hidden" value="<?php echo $medicamento->precioCMedicamento; ?>" class="precioCMedicamento">
												<input type="hidden" value="<?php echo $medicamento->precioVMedicamento; ?>" class="precioVMedicamento">
												<input type="hidden" value="<?php echo $medicamento->tipoMedicamento; ?>" class="tipoMedicamento">
												<input type="hidden" value="<?php echo $medicamento->idClasificacionMedicamento; ?>" class="idClasificacionMedicamento">
											<!-- variable -->

											<?php
												// echo "<a onclick='verDetalle($id, $codigo, $nombre, $precioC, $precioV, $tipo, $clasif, $stock, $usados)' href='#verMedicamento' data-toggle='modal'><i class='far fa-eye ms-text-primary'></i></a>";
												echo "<a href='#actualizarMedicamento' class='actualizarMedicamento' data-toggle='modal'><i class='fas fa-pencil-alt ms-text-success'></i></a>";
												
												switch($this->session->userdata('nivel')) {
													case '1':
														echo "<a href='#eliminarMedicamento' class='eliminarMedicamento' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
													break;
													default:
														echo "";
														break;
												}

											?>
                                        </td>
                                    </tr>

								<?php
										} // Fin del IF
										$st = 0;
									} // Fin del foreach
								
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
<div class="modal fade" id="agregarMedicamento" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog ms-modal-dialog-width">
		<div class="modal-content ms-modal-content-width">
			<div class="modal-header  ms-modal-header-radius-0">
				<h4 class="modal-title text-white">Datos del medicamento</h4>
				<button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
			</div>

			<div class="modal-body p-0 text-left">
				<div class="col-xl-12 col-md-12">
					<div class="ms-panel ms-panel-bshadow-none">
						<div class="ms-panel-body">
							<form class="needs-validation" method="post" action="<?php echo base_url()?>Botiquin/guardar_medicamento" novalidate>
								
                                <div class="form-row">

									<div class="col-md-6 mb-3">
										<label for=""><strong>Código</strong></label>
										<div class="input-group">
											<input type="text" class="form-control" value=<?php echo $cod; ?> readonly>
											<input type="hidden" class="form-control" id="codigoMedicamento" name="codigoMedicamento" value=<?php echo $cod; ?> required>
                                            <div class="invalid-tooltip">
                                                Ingrese un código.
                                            </div>
										</div>
									</div>

									<div class="col-md-6 mb-2">
										<label for=""><strong>Nombre</strong></label>
										<div class="input-group">
											<input type="text" class="form-control" id="nombreMedicamento" name="nombreMedicamento" placeholder="Nombre del medicamento" required>
                                            <div class="invalid-tooltip">
                                                Ingrese un nombre.
                                            </div>
										</div>
									</div>

									<div class="col-md-6 mb-3">
										<label for=""><strong>Fabricante</strong></label>
										<div class="input-group">
                                        <select class="form-control controlInteligente" id="idFabricanteMedicamento" name="idFabricanteMedicamento" required>
                                            <option value="">.:: Seleccionar::.</option>

                                            <?php
												foreach ($fabricantes as $fabricante) {
											?>
                                            <option value="<?php echo $fabricante->idFabricante ?>"><?php echo $fabricante->nombreFabricante ?></option>
											<?php } ?>

                                        </select>
                                            <div class="invalid-tooltip">
                                                Ingrese un fabricante.
                                            </div>
										</div>

									</div>

									<div class="col-md-6 mb-3">
										<label for=""><strong>Precio compra</strong></label>
										<div class="input-group">
											<input type="text" class="form-control" id="precioCMedicamento" name="precioCMedicamento" placeholder="Precio de compra del medicamento" required>
                                            <div class="invalid-tooltip">
                                                Ingrese el precio de compra.
                                            </div>
										</div>
									</div>

									<div class="col-md-6 mb-3">
										<label for=""><strong>Precio venta</strong></label>
										<div class="input-group">
											<input type="text" class="form-control" id="precioVMedicamento" name="precioVMedicamento" placeholder="Precio venta del medicamento" required>
                                            <div class="invalid-tooltip">
                                                Ingrese un precio de venta.
                                            </div>
										</div>
									</div>

									<div class="col-md-6 mb-3">
										<label for=""><strong>Descuento empleados(%)</strong></label>
										<div class="input-group">
											<input type="text" value="0" class="form-control" id="descuentoMedicamento" name="descuentoMedicamento" placeholder="Porcentaje de descuento, ej. 10" required>
                                            <div class="invalid-tooltip">
                                                Ingrese el porcentaje de descuento para empleados.
                                            </div>
										</div>
									</div>

									<div class="col-md-6 mb-3">
										<label for=""><strong>Tipo</strong></label>
                                        <select class="form-control" id="tipoMedicamento" name="tipoMedicamento" required>
                                            <option value="">.:: Seleccionar ::.</option>
                                            <option value="Medicamentos">Medicamentos</option>
                                            <option value="Materiales médicos">Materiales médicos</option>
                                            <option value="Servicios">Servicios</option>
                                            <option value="Otros servicios">Otros servicios</option>
                                        </select>
                                        <div class="invalid-tooltip">
                                            Selecciona un tipo de medicamento.
                                        </div>
									</div>

									<div class="col-md-6 mb-3">
										<label for="validationCustom08"><strong>Clasificación</strong></label>
										<select class="form-control controlInteligente" id="idClasificacionMedicamento" name="idClasificacionMedicamento" required>
                                            <option value="">.:: Seleccionar ::.</option>

											<?php
												foreach ($clasificaciones as $clasificacion) {
											?>
                                            <option value="<?php echo $clasificacion->idClasificacionMedicamento ?>"><?php echo $clasificacion->nombreClasificacionMedicamento ?></option>
											<?php } ?>

                                        </select>
                                        <div class="invalid-tooltip">
                                            Selecciona una clasificación.
                                        </div>
									</div>

								</div>

								<div class="text-center">
									<input type="hidden" name="ocultarMedicamento" value="0">
                                    <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar medicamento</button>
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


<!-- Modal ver datos del Medicamento-->
<div class="modal fade" id="verMedicamento" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog ms-modal-dialog-width">
		<div class="modal-content ms-modal-content-width">
			<div class="modal-header  ms-modal-header-radius-0">
				<h4 class="modal-title text-white">Datos del medicamento</h4>
				<button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
			</div>

			<div class="modal-body p-0 text-left">
				<div class="col-xl-12 col-md-12">
					<div class="ms-panel ms-panel-bshadow-none">
						<div class="ms-panel-body" id="detalleMedicamento"></div>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Fin Modal ver datos del Medicamento-->

<!-- Modal para actualizar datos del Medicamento-->
	<div class="modal fade" id="actualizarMedicamento" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog ms-modal-dialog-width">
			<div class="modal-content ms-modal-content-width">
				<div class="modal-header  ms-modal-header-radius-0">
					<h4 class="modal-title text-white">Datos del medicamento</h4>
					<button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
				</div>

				<div class="modal-body p-0 text-left">
					<div class="col-xl-12 col-md-12">
						<div class="ms-panel ms-panel-bshadow-none">
							<div class="ms-panel-body">
								<form class="needs-validation" method="post" action="<?php echo base_url()?>Botiquin/actualizar_medicamento" novalidate>
									
									<div class="form-row">
										<div class="col-md-12 mb-3">
											<label for=""><strong>Código</strong></label>
											<div class="input-group">
												<input type="text" class="form-control" id="codigoMedicamentoAA"  readonly>
												<div class="invalid-tooltip">
													Ingrese un código.
												</div>
											</div>
										</div>
																		</div>
									
									<div class="form-row">
										<div class="col-md-6 mb-2">
											<label for=""><strong>Nombre</strong></label>
											<div class="input-group">
												<input type="text" class="form-control" id="nombreMedicamentoA" name="nombreMedicamentoA" placeholder="Nombre del medicamento" required>
												<div class="invalid-tooltip">
													Ingrese un nombre.
												</div>
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<label for=""><strong>Fabricante</strong></label>
											<div class="input-group">
											<select class="form-control controlInteligente2" id="idFabricanteA" name="idFabricanteA" required>
												<option value="">.:: Seleccionar::.</option>

												<?php
													foreach ($fabricantes as $fabricante) {
												?>
												<option value="<?php echo $fabricante->idFabricante ?>"><?php echo $fabricante->nombreFabricante ?></option>
												<?php } ?>

											</select>
												<div class="invalid-tooltip">
													Ingrese un fabricante.
												</div>
											</div>

										</div>
									</div>

									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label for=""><strong>Precio compra</strong></label>
											<div class="input-group">
												<input type="text" class="form-control" id="precioCMedicamentoA" name="precioCMedicamentoA" placeholder="Precio de compra del medicamento" required>
												<div class="invalid-tooltip">
													Ingrese el precio de compra.
												</div>
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<label for=""><strong>Precio venta</strong></label>
											<div class="input-group">
												<input type="text" class="form-control" id="precioVMedicamentoA" name="precioVMedicamentoA" placeholder="Precio venta del medicamento" required>
												<div class="invalid-tooltip">
													Ingrese un precio de venta.
												</div>
											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label for=""><strong>Tipo</strong></label>
											<select class="form-control" id="tipoMedicamentoA" name="tipoMedicamentoA" required>
												<option value="">.:: Seleccionar ::.</option>
												<option value="Medicamentos">Medicamentos</option>
												<option value="Materiales médicos">Materiales médicos</option>
												<option value="Gastos hospitalarios">Gastos hospitalarios</option>
												<option value="Servicios">Servicios</option>
												<option value="Otros servicios">Otros servicios</option>
											</select>
											<div class="invalid-tooltip">
												Selecciona un tipo de medicamento.
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<label for="validationCustom08"><strong>Clasificación</strong></label>
											<select class="form-control controlInteligente2" id="idClasificacionMedicamentoA" name="idClasificacionMedicamentoA" required>
												<option value="">.:: Seleccionar ::.</option>

												<?php
													foreach ($clasificaciones as $clasificacion) {
												?>
												<option value="<?php echo $clasificacion->idClasificacionMedicamento ?>"><?php echo $clasificacion->nombreClasificacionMedicamento ?></option>
												<?php } ?>

											</select>
											<div class="invalid-tooltip">
												Selecciona una clasificación.
											</div>
										</div>
									</div>
									<input type="hidden" id="idMedicamentoA" name="idMedicamentoA">						
									<div class="text-center">
										<button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar medicamento</button>
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


<!-- Modal para agregar datos del Medicamento-->
	<div class="modal fade" id="eliminarMedicamento" tabindex="-1" role="dialog" aria-labelledby="modal-5">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content pb-5">

				<div class="modal-header bg-danger">
					<h3 class="modal-title has-icon text-white"><i class="flaticon-alert-1"></i> Advertencia</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
				</div>

				<div class="modal-body text-center">
					<p class="h5">¿Estas seguro de eliminar los datos de este medicamento?</p>
				</div>

				<form action="<?php echo base_url()?>Botiquin/eliminar_medicamento" method="post">
					<input type="hidden" id="idMedicamento" name="idMedicamento">									
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
	/* function verDetalle(id, codigo,nombre, proveedor, precioC, precioV, tipo, clasif, stock, usados){
		var html = "";
				html += '<table class="table table-borderless">';
					html += '<tr>';
						html += '<td><strong>Código: </strong></td>';
						html += '<td>'+codigo+'</td>';
					html += '</tr>';
					html += '<tr>';
						html += '<td><strong>Medicamento: </strong></td>';
						html += '<td>'+nombre+'</td>';
						html += '<td><strong>Proveedor: </strong></td>';
						html += '<td>'+proveedor+'</td>';
					html += '</tr>';
					html += '<tr>';
						html += '<td><strong>Precio de compra: </strong></td>';
						html += '<td>$ '+precioC+'</td>';
						html += '<td><strong>Precio de venta: </strong></td>';
						html += '<td>$ '+precioV+'</td>';
					html += '</tr>';
					html += '<tr>';
						html += '<td><strong>Cantidad disponible: </strong></td>';
						html += '<td>'+stock+'</td>';
						html += '<td><strong>Cantidad usada: </strong></td>';
						html += '<td>'+usados+'</td>';
					html += '</tr>';
					html += '<tr>';
						html += '<td><strong>Tipo de medicamento: </strong></td>';
						html += '<td>'+tipo+'</td>';
						html += '<td><strong>Clasificación</strong></td>';
						html += '<td>'+clasif+'</td>';
					html += '</tr>';
			html += '</table>';

			document.getElementById("detalleMedicamento").innerHTML = html;
	} */


	$(document).on("click", ".actualizarMedicamento", function(e) {
		e.preventDefault();
		$("#codigoMedicamentoAA").val($(this).closest('tr').find('.codigoMedicamento').val());
		$("#nombreMedicamentoA").val($(this).closest('tr').find('.nombreMedicamento').val());
		$("#idFabricanteA").val($(this).closest('tr').find('.idFabricante').val());
		$("#precioCMedicamentoA").val($(this).closest('tr').find('.precioCMedicamento').val());
		$("#precioVMedicamentoA").val($(this).closest('tr').find('.precioVMedicamento').val());
		$("#tipoMedicamentoA").val($(this).closest('tr').find('.tipoMedicamento').val());
		$("#idClasificacionMedicamentoA").val($(this).closest('tr').find('.idClasificacionMedicamento').val());
		$("#idMedicamentoA").val($(this).closest('tr').find('.idMedicamento').val());

	});


	$(document).on("click", ".eliminarMedicamento", function(e) {
		e.preventDefault();
		$("#idMedicamento").val($(this).closest('tr').find('.idMedicamento').val());

	});

	$(document).ready(function() {
        $(".controlInteligente").select2({
            theme: 'bootstrap4',
			dropdownParent: $("#agregarMedicamento")
        });

		$(".controlInteligente2").select2({
            theme: 'bootstrap4',
			dropdownParent: $("#actualizarMedicamento")
        });
    });

</script>