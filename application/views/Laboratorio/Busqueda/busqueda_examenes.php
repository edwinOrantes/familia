<!-- Body Content Wrapper -->
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

			<nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"> <a href="#"><i class="fa fa-users"></i> Laboratorio </a> </li>
                    <li class="breadcrumb-item"><a href="#">Busqueda resultados</a></li>
                </ol>
            </nav>

			<div class="ms-panel">
				<div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form" id="frmBusquedaPaciente" action="<?php echo base_url(); ?>Laboratorio/resultado_busqueda" method="post">
                                <input type="text" class="form-control" list="listaPacientes" placeholder="Nombre del paciente" id="busquedaPaciente" name="busquedaPaciente" required>
                                <input type="hidden" value="1" name="parametro">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form class="form" id="" action="<?php echo base_url(); ?>Laboratorio/resultado_busqueda" method="post">
                                <input type="text" data-mask="99999999-9" class="form-control" placeholder="DUI del paciente" id="duiPaciente" name="busquedaPaciente" required>
                                <input type="hidden" value="2" name="parametro">
							</form>
                        </div>
                    </div>
				</div>
               
            
				<div class="ms-panel-body">
					<div class="row mt-3">
						<div class="table-responsive" id="contenedorPaciente">
						</div>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>

<datalist id="listaPacientes"></datalist>


<!-- Modal ver datos del paciente-->
	<div class="modal fade" id="verPaciente" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog ms-modal-dialog-width">
			<div class="modal-content ms-modal-content-width">
				<div class="modal-header  ms-modal-header-radius-0">
					<h4 class="modal-title text-white"></i>  Datos del paciente</h4>
					<button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
				</div>

				<div class="modal-body p-0 text-left">
					<div class="col-xl-12 col-md-12">
						<div class="ms-panel ms-panel-bshadow-none">
							<div class="ms-panel-body" id="detallePaciente">
								
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
<!-- Fin Modal ver datos del paciente-->


<!-- Modal actualizar paciente-->
	<div class="modal fade" id="actualizarP" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog ms-modal-dialog-width">
			<div class="modal-content ms-modal-content-width">
				<div class="modal-header  ms-modal-header-radius-0">
					<h4 class="modal-title text-white"></i>  Datos del paciente</h4>
					<button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
				</div>

				<div class="modal-body p-0 text-left">
					<div class="col-xl-12 col-md-12">
						<div class="ms-panel ms-panel-bshadow-none">
							<div class="ms-panel-body">
							<form class="needs-validation" method="post" action="<?php echo base_url()?>Paciente/actualizar_paciente" novalidate>
							
								<div class="row">
									<div class="form-group col-md-6">
										<label for=""><strong>Nombre Completo</strong></label>
										<input type="text" class="form-control" id="nombrePaciente" name="nombrePaciente" placeholder="Nombre del paciente" required>
										<div class="invalid-tooltip">
											Debes ingresar el nombre del paciente.
										</div>
									</div>

									<div class="form-group col-md-6">
										<label for=""><strong>Edad</strong></label>
										<input type="number" class="form-control numeros" min="0" id="edadPaciente" name="edadPaciente" placeholder="Edad del paciente" required>
										<div class="invalid-tooltip">
											Debes ingresar la edad del paciente.
										</div>
									</div>

								</div>

								<div class="row">
									
									<div class="form-group col-md-6">
										<label for=""><strong>Teléfono</strong></label>
										<input type="text" class="form-control" data-mask="9999-9999" id="telefonoPaciente" name="telefonoPaciente" placeholder="Teléfono del paciente" required>
										<div class="invalid-tooltip">
											Debes ingresar el teléfono del paciente.
										</div>
									</div>

									<div class="form-group col-md-6">
										<label for=""><strong>DUI</strong></label>
										<input type="text" class="form-control" id="duiPaciente" name="duiPaciente" data-mask="99999999-9" placeholder="DUI del paciente" required>
										<div class="invalid-tooltip">
											Debes ingresar el DUI del paciente.
										</div>
									</div>

								</div>


								<div class="row">

									<div class="form-group col-md-6">
										<label for=""><strong>Fecha de nacimiento</strong></label>
										<input type="date" class="form-control" id="nacimientoPaciente" name="nacimientoPaciente" required>
										<div class="invalid-tooltip">
											Debes ingresar la fecha de nacimiento del paciente.
										</div>
									</div>

									<div class="form-group col-md-6">
										<label for=""><strong>Dirección</strong></label>
										<input class="form-control" id="direccionPaciente" name="direccionPaciente" required>
										<div class="invalid-tooltip">
											Debes ingresar dirección del paciente.
										</div>
									</div>

								</div>


								<div class="form-group text-center mt-3">
									<input type="hidden" class="form-control" id="idPaciente" name="idPaciente">
									<button type="submit" class="btn btn-primary has-icon"><i class="fa fa-save"></i> Actualizar paciente </button>
									<button type="reset" class="btn btn-default has-icon"><i class=" fa fa-times"></i> Cancelar </button>
								</div>
							
							</form>

							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
<!-- Fin Modal actualizar paciente-->

<!-- Modal para eliminar datos paciente-->
	<div class="modal fade" id="pacienteAEliminar" tabindex="-1" role="dialog" aria-labelledby="modal-5">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content pb-5">

				<div class="modal-header bg-danger">
					<h3 class="modal-title has-icon text-white"><i class="flaticon-alert-1"></i> Advertencia</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
				</div>

				<div class="modal-body text-center">
					<p class="h5">¿Estas seguro de eliminar los datos de este paciente?</p>
				</div>
				<form action="<?php echo base_url() ?>Paciente/eliminar_paciente" method="post">								
					<div class="text-center">
						<input type="hidden" id="pacienteE" name="idPaciente"/>
						<button class="btn btn-danger shadow-none"><i class="fa fa-trash"></i> Eliminar</button>
						<button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
					</div>
				</form>									
			</div>
		</div>
	</div>
<!-- Fin Modal eliminar datos del paciente-->

<script>
	function verDetalle(id, nombre, apellido, edad, telefono, ocupacion, sexo, dui, estado, nacimiento, municipio, departamento, direccion){
			var html = "";
			html += '<table class="table table-borderless">';
				html += '<tr>';
					html += '<td><strong>Nombre: </strong></td>';
					html += '<td>'+nombre+' '+apellido+'</td>';
					html += '<td><strong>Edad: </strong></td>';
					html += '<td>'+edad+'</td>';
				html += '</tr>';
				html += '<tr>';
					html += '<td><strong>Ocupación: </strong></td>';
					html += '<td>'+ocupacion+'</td>';
					html += '<td><strong>Teléfono: </strong></td>';
					html += '<td>'+telefono+'</td>';
				html += '</tr>';
				html += '<tr>';
					html += '<td><strong>Estado civil: </strong></td>';
					html += '<td>'+estado+'</td>';
					html += '<td><strong>Sexo: </strong></td>';
					html += '<td>'+sexo+'</td>';
				html += '</tr>';
				html += '<tr>';
					html += '<td><strong>DUI: </strong></td>';
					html += '<td>'+dui+'</td>';
					html += '<td><strong>Fecha de nacimiento: </strong></td>';
					html += '<td>'+nacimiento+'</td>';
				html += '</tr>';
				html += '<tr>';
					html += '<td><strong>Dirección: </strong></td>';
					html += '<td>'+direccion+', '+municipio+','+departamento+'</td>';
				html += '</tr>';
		html += '</table>';

		document.getElementById("detallePaciente").innerHTML = html;
	}

	function actualizarPaciente(id, nombre, edad, telefono, dui, nacimiento, direccion){
		document.getElementById("idPaciente").value = id;
		document.getElementById("nombrePaciente").value = nombre;
		//document.getElementById("apellidoPaciente").value = apellido;
		document.getElementById("edadPaciente").value = edad;
		document.getElementById("telefonoPaciente").value = telefono;
		/* document.getElementById("ocupacionPaciente").value = ocupacion;
		document.getElementById("sexoPaciente").value = sexo; */
		document.getElementById("duiPaciente").value = dui;
		//document.getElementById("estadoPaciente").value = estado;
		document.getElementById("nacimientoPaciente").value = nacimiento;
		/* document.getElementById("municipioPaciente").value = idMun;
		document.getElementById("departamentoPaciente").value = idDepto;
		document.getElementById("medicoPaciente").value = medico; */
		document.getElementById("direccionPaciente").value = direccion;
		
	}

	function eliminarPaciente(id){
		document.getElementById("pacienteE").value = id;
	}
</script>


<!-- Script busqueda paciente -->
<script>
    $(document).ready(function() {
        $("#busquedaPaciente").focus();
    });
    
	$(document).on('keyup', '#busquedaPaciente', function (event) {
        event.preventDefault();
        $.ajax({
            url: "recomendaciones_paciente",
            type: "POST",
            beforeSend: function () { },
            data: {str:$(this).val()},
            success:function(respuesta){
                var registro = eval(respuesta);
                if (registro.length > 0){
                    var html = "";
                    for (var i = 0; i < registro.length; i++) 
                    {
                        html += "<option value='"+ registro[i]["nombrePaciente"] +"'>  ";
                        
                    }
                    $("#listaPacientes").append(html);
                }
            },
            error:function(){
                alert("Hay un error");
            }
        });

    });

	/* $(document).on('change', '#duiPaciente', function (event) {
        event.preventDefault();
        var duiPaciente = $(this).val();
        var datos = {
            paciente: $(this).val(),
            pivote: 0
        }
        $.ajax({
                url: "validar_paciente",
                type: "POST",
                data: datos,
                success:function(respuesta){
                    var registro = eval(respuesta);
                    if (Object.keys(registro).length > 0){
                        if(registro.estado == 1){
                            var datos = registro.datos;
                            // Paciente
                                alert(datos["nombrePaciente"]);
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
                        toastr.error('Error...', 'Aviso!');
                    }
                }
            });

    }); */
</script>
<!-- Fin Script busqueda paciente -->

