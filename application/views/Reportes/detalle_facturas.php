<?php if($this->session->flashdata("error")):?>
  <script type="text/javascript">
    $(document).ready(function(){
	toastr.remove();
    toastr.options.positionClass = "toast-top-center";
	toastr.error('<?php echo $this->session->flashdata("error")?>', 'Advertencia!');
    });
  </script>
<?php endif; ?>

<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
	<div class="row">
		<div class="col-xl-12 col-md-12">
			<nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                    <li class="breadcrumb-item active" aria-current="page"> <a href="#"><i class="fa fa-tasks"></i> Reportes</a> </li>
                    <li class="breadcrumb-item active"><a href="#">Detalle de facturas</a></li>
                </ol>
            </nav>
			<div class="ms-panel">
				<div class="ms-panel-header">
					<h6>Ingrese el rango de fechas</h6>
				</div>
				<div class="ms-panel-body">
					<div class="row">
						<div class="col-md-8 tade">
							<form class="needs-validation" id="reporteCirugiasFechas" method="post" action="<?php echo base_url()?>Reportes/detalle_facturas_excel" novalidate>
								<div class="form-row align-items-center">
									<div class="col-md-4">
										<input type="date" class="form-control" max="" id="hojaInicio" name="hojaInicio" placeholder="Fecha de inicio" required>
										<div class="invalid-tooltip">
											Debes agregar la fecha inicial.
										</div>
									</div>

                                    <div class="col-md-4">
										<input type="date" class="form-control" id="hojaFin" name="hojaFin" placeholder="Fecha fin" required>
										<div class="invalid-tooltip">
											Debes agregar la fecha final.
										</div>
									</div>

									<div class="col-md-4">
									    <button type="submit" class="btn btn-success mb-2"><i class="fa fa-file-pdf"></i> Generar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>