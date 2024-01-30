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
                    <li class="breadcrumb-item active"><a href="#">Detalle de servicios externos</a></li>
                </ol>
            </nav>
			<div class="ms-panel">
				<div class="ms-panel-header">
					<h6>Ingrese el rango de numeros que desea</h6>
				</div>
				<div class="ms-panel-body">
					<div class="row">
						<div class="col-md-8 tade">
							<form class="needs-validation" id="reporteCirugiasFechas" method="post" action="<?php echo base_url()?>Reportes/guardar_liquidacion" target="_blank" novalidate>
								<div class="form-row align-items-center">
									<div class="col-md-3">
										<input type="number" class="form-control numeros" max="<?php echo $numeroLimite-1; ?>" id="hojaInicio" name="hojaInicio" placeholder="Número correlativo de inicio" required>
										<div class="invalid-tooltip">
											Debes agregar el numero inicial.
										</div>
									</div>

                                    <div class="col-md-3">
										<input type="number" value="<?php echo $numeroLimite; ?>" max="<?php echo $numeroLimite; ?>" class="form-control numeros" id="hojaFin" name="hojaFin" placeholder="Número correlativo de fin" required>
										<div class="invalid-tooltip">
											Debes agregar el numero final.
										</div>
									</div>

                                    <div class="col-md-3">
										<input type="date" value=""  class="form-control" id="fechaLiquidacion" name="fechaLiquidacion" required>
										<div class="invalid-tooltip">
											Debes agregar la fecha.
										</div>
									</div>

									<div class="col-md-3">
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


<script>
$(document).on("change", "#fechaLiquidacion", function(e) {
	e.preventDefault();
	var datos = {
		fecha : $(this).val()
	}

	/* $.ajax({
		url: "validar_fecha_liquidacion",
		type: "POST",
		beforeSend: function () { },
		data: datos,
		success:function(respuesta){
			var registro = eval(respuesta);
			if (Object.keys(registro).length > 0){
				if(registro.estado == 1){
					toastr.remove();
					toastr.options = {
						"positionClass": "toast-top-left",
						"showDuration": "5000",
						"hideDuration": "5000",
						"timeOut": "5000",
						"extendedTimeOut": "5000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
						},
					toastr.error('Ya existe una liquidacion con esta fecha', 'Aviso!');
					$("#fechaLiquidacion").val("");
					// location.reload();
				}
			}
		},
		error:function(){
			alert("Hay un error");
		}
	}); */
});
</script>