<?php

use PhpOffice\PhpSpreadsheet\Shared\Date;

if ($this->session->flashdata("exito")) : ?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.remove();
            toastr.options.positionClass = "toast-top-center";
            toastr.success('<?php echo $this->session->flashdata("exito") ?>', 'Aviso!');
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata("error")) : ?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.remove();
            toastr.options.positionClass = "toast-top-center";
            toastr.error('<?php echo $this->session->flashdata("error") ?>', 'Aviso!');
        });
    </script>
<?php endif; ?>

<?php
    $totalGastos = 0;
    foreach ($listaGastos as $cuenta) {
        $totalGastos += $cuenta->montoGasto;
    }
?>

<div class="ms-content-wrapper">
    <div class="row">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-arrow has-gap has-bg">
                    <li class="breadcrumb-item active" aria-current="page"> <a href="#"><i class="fa fa-tasks"></i> Gastos</a> </li>
                    <li class="breadcrumb-item active"><a href="#">Control de gastos</a></li>
                    <?php
                        if(sizeof($listaGastos) > 0){
                            echo '<li class="breadcrumb-item"><a href="#">Total de gastos <strong>$ '.number_format($totalGastos, 2).'</strong></a></li>';
                        }
                    ?>
                    
                </ol>
            </nav>

            <div class="ms-panel">
                <div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Listado de gastos del mes de <?php echo $mes; ?></h6>
                        </div>
                        <div class="col-md-6 text-right">
                            <?php
                                if (sizeof($listaGastos) > 0) {
                            ?>
                                <a href="<?php echo base_url() ?>Gastos/gastos_excel_fecha/<?php echo $inicio ?>" class="btn btn-success btn-sm"><i class="fa fa-file-excel"></i> Ver Excel</a>
                            <?php
                                }
                            ?>
                            <a class="btn btn-outline-primary btn-sm" href="<?php echo base_url() ?>Gastos/control_gastos" ><i class="fa fa-arrow-left"></i> Regresar </a>
                        </div>
                    </div>
                </div>


                <div class="ms-panel-body">
                    <input type="hidden" id="mesResumen" value="<?php echo $mess; ?>">
                    <input type="hidden" id="anioResumen" value="<?php echo $anio; ?>">
                    <div class="row mt-3" id="detalleGeneralGastos">
                        <?php
                        if (sizeof($listaGastos) > 0) {
                        ?>
                            <div class="table-responsive">
                                <table id="tabla-pacientes" class="table table-striped thead-primary w-100">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Código</th>
                                            <th class="text-center">Detalle</th>
                                            <th class="text-center">Monto</th>
                                            <th class="text-center">Proveedor</th>
                                            <th class="text-center">Descripción</th>
                                            <th class="text-center">Opción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tipoEntidad = "";
                                        $proveedor = "";
                                        foreach ($listaGastos as $cuenta) {
                                            $id ='"'.$cuenta->idGasto.'"';
                                            $tipo ='"'.$cuenta->tipoGasto.'"';
                                            $monto ='"'.$cuenta->montoGasto.'"';
                                            $entregado ='"'.$cuenta->entregadoGasto.'"';
                                            $idCuenta ='"'.$cuenta->idCuentaGasto.'"';
                                            $fecha ='"'.$cuenta->fechaGasto.'"';
                                            $entidad ='"'.$cuenta->entidadGasto.'"';
                                            $idProveedor ='"'.$cuenta->idProveedorGasto.'"';
                                            $pago ='"'.$cuenta->pagoGasto.'"';
                                            $numero ='"'.$cuenta->numeroGasto.'"';
                                            $descripcion ='"'.$cuenta->descripcionGasto.'"';
                                            $codigo ='"'.$cuenta-> codigoGasto.'"';

                                            if ($cuenta->entidadGasto == 1) {
                                                $tipoEntidad = "Médico";
                                                //$medico = $this->Externos_Model->detalleExternoMedico($cuenta->idProveedorGasto);
                                                $medico = $this->Externos_Model->obtenerMedico($cuenta->idProveedorGasto);
                                                $proveedor = $medico->nombreMedico;
                                            } else {
                                                $tipoEntidad = "Otros proveedores";
                                                $medico = $this->Pendientes_Model->rowProveedor($cuenta->idProveedorGasto);
                                                $proveedor = $medico->empresaProveedor;
                                                /* if($cuenta->flagGasto == 1){
                                                    $medico = $this->Pendientes_Model->rowProveedor($cuenta->idProveedorGasto);
                                                    $proveedor = $medico->empresaProveedor;
                                                }else{
                                                    $medico = $this->Externos_Model->detalleExternoProveedor($cuenta->idProveedorGasto);
                                                    $proveedor = $medico->empresaProveedor;
                                                } */
                                                
                                            }
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $cuenta->codigoGasto; ?></td>
                                                <td class="text-center"><?php echo $cuenta->nombreCuenta; ?></td>
                                                <td class="text-center">$ <?php echo $cuenta->montoGasto; ?></td>
                                                <td class="text-center"><?php echo $proveedor; ?></td>
                                                <td class="text-center"><?php echo $cuenta->descripcionGasto; ?></td>
                                                <td><?php
                                                   echo "<a title='Editar datos' href='#editarGasto' onclick='editarGasto($id, $tipo, $monto, $entregado, $idCuenta, $fecha, $entidad, $idProveedor, $pago, $numero, $descripcion, $codigo)' data-toggle='modal'><i class='fas fa-edit ms-text-primary'></i></a>";
                                                   echo "<a title='Imprimir recibo' href='".base_url()."Gastos/imprimir_recibo/".$cuenta->idGasto."/".$cuenta->idProveedorGasto."/".$cuenta->entidadGasto."/".$cuenta->flagGasto."' target='blank'><i class='fas fa-print ms-text-primary'></i></a>";
                                                ?>
                                                </td>
                                            </tr>
                                        <?php $proveedor = ""; } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        } else {
                            echo '<div class="col-md-12 alert alert-danger">
                                        <h6 class="text-center"><strong>No hay datos que mostrar.</strong></h6>
                                    </div>';
                        }
                        ?>

                    </div>

                    
                </div>

                <div id="grafica">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                        <p class="highcharts-description">
                            Resumen de los gastos de los ultimos 3 meses.
                        </p>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar datos del Medicamento-->
    <div class="modal fade" id="editarGasto" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white"></i> Datos del gasto</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">

                                <form class="needs-validation" id="" method="post" action="<?php echo base_url() ?>Gastos/editar_gasto" novalidate>
                                    
                                    <div class="form-row">

                                        <div class="col-md-6">
                                            <label for=""><strong>Código:</strong></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control numeros" id="codigoGastoA" value="<?php echo $codigo; ?>" required readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for=""><strong>Tipo de Gasto:</strong></label>
                                            <div class="input-group">
                                                <select class="form-control" id="tipoGastoA" name="tipoGasto" required>
                                                    <option value="">.:: Seleccionar ::.</option>
                                                    <?php
                                                    foreach ($tipoGasto as $tipo) {
                                                    ?>
                                                        <option value="<?php echo $tipo->idTipoGasto; ?>"><?php echo $tipo->nombreTipoGasto; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-tooltip">
                                                    Seleccione una opción.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for=""><strong>Monto:</strong></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control numeros" id="montoGastoA" name="montoGasto" placeholder="Ingrese el monto del gasto" onKeyPress="return soloNumeros(event)" required>
                                                <div class="invalid-tooltip">
                                                    Ingrese un nombre.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for=""><strong>Entregado a:</strong></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="entregadoGastoA" name="entregadoGasto" placeholder="A quien se entrega el dinero" required>
                                                <div class="invalid-tooltip">
                                                    Ingrese un nombre de la persona a quien se entrega el dinero.
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-6">
                                            <label for=""><strong>Cuenta de gastos:</strong></label>
                                            <div class="input-group">
                                                <select class="form-control" id="idCuentaGastoA" name="idCuentaGasto" required>
                                                    <option value="">.:: Seleccionar ::.</option>
                                                    <?php
                                                    foreach ($cuentas as $cuenta) {
                                                    ?>
                                                        <option value="<?= $cuenta->idCuenta ?>"><?= $cuenta->nombreCuenta ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-tooltip">
                                                    Ingrese un nombre.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for=""><strong>Fecha:</strong></label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" id="fechaGastoA" name="fechaGasto" required>
                                                <div class="invalid-tooltip">
                                                    Ingrese una fecha para este gasto.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-6">
                                            <label for=""><strong>Tipo entidad:</strong></label>
                                            <div class="input-group">
                                                <select class="form-control" id="entidadGastoA" name="entidadGasto" required>
                                                    <option value="">.:: Seleccionar ::.</option>
                                                    <option value="1">Médico</option>
                                                    <option value="2">Proveedor</option>
                                                </select>
                                                <div class="invalid-tooltip">
                                                    Seleccione un proveedor.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for=""><strong>Proveedor:</strong></label>
                                            <div class="input-group">
                                                <select class="form-control" id="idProveedorGastoA" name="idProveedorGasto" required>
                                                    <option value="">.:: Seleccionar ::.</option>
                                                    <?php
                                                    foreach ($proveedores as $proveedor) {
                                                    ?>
                                                        <option value="<?= $proveedor->idProveedor ?>"><?= $proveedor->empresaProveedor ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-tooltip">
                                                    Seleccione un proveedor.
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-6">
                                            <label for=""><strong>Forma de pago:</strong></label>
                                            <div class="input-group">
                                                <select class="form-control" id="pagoGastoA" name="pagoGasto" required>
                                                    <option value="">.:: Seleccionar ::.</option>
                                                    <option value="1">Efectivo</option>
                                                    <option value="2">Cheque</option>
                                                </select>
                                                <div class="invalid-tooltip">
                                                    Ingrese quien recibe el $.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6" id="numeroChequeA">
                                            <label for=""><strong>Número de cheque:</strong></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="chequeGastoA" name="numeroGasto">
                                                <div class="invalid-tooltip">
                                                    Ingrese el numero de cheque.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-12">
                                            <label for=""><strong>Descripción:</strong></label>
                                            <div class="input-group">
                                                <textarea class="form-control disableSelect" id="descripcionCuentaA" name=" descripcionGasto" required></textarea>
                                                <div class="invalid-tooltip">
                                                    Ingrese una descripción.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                        <input type="text" class="form-control numeros" name="codigoGasto" value="<?php echo $codigo; ?>">
                                    <div class="text-center">
                                        <input type="hidden" id="idGastoA" name="idGasto" />
                                        <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar cuenta</button>
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

<!-- 
    <script type="text/javascript">
      Highcharts.chart("container", {
        chart: {
          type: "column",
        },
        title: {
          text: "Resumen de gastos de los últimos 3 meses",
        },
        subtitle: {
          text: "Hospital Orellana",
        },
        xAxis: {
          categories: [
            <?php
                for ($i=0; $i < sizeof($mesesGrafica) ; $i++) { 
                    echo '"'.$mesesGrafica[$i].'",';
                }  
            ?>
          ],
          crosshair: true,
        },
        yAxis: {
          min: 0,
          title: {
            text: "Monto ($)",
          },
        },
        tooltip: {
          headerFormat:
            '<span style="font-size:10px">{point.key}</span><table>',
          pointFormat:
            '<tr><td style="font-size: 12px; color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="font-size: 12px; padding:0"><b>${point.y:.1f}</b></td></tr>',
          footerFormat: "</table>",
          shared: true,
          useHTML: true,
        },
        plotOptions: {
          column: {
            pointPadding: 0.2,
            borderWidth: 0,
          },
        },
        series: [
          {
            name: "Gastos",
            data: [
                <?php
                    for ($i=0; $i < sizeof($valoresGrafica) ; $i++) { 
                        echo $valoresGrafica[$i].',';
                    }  
                ?>
            ],
          }
        ],
      });
    </script> -->

<script>
    $(document).ready(function() {
        $("#verPorFechas").click(function() {
            var valor = $('input:checkbox[name=porFecha]:checked').val();
            if (valor == "porFecha") {
                $("#detalleGeneralGastos").hide();
                $("#divBotonera").hide();
                $("#formularioFechas").fadeIn();
                $("#titleLista").hide();
                $("#titleFecha").fadeIn();
            } else {
                $("#formularioFechas").hide();
                $("#detalleGeneralGastos").fadeIn();
                $("#divBotonera").fadeIn();
                $("#titleLista").fadeIn();
                $("#titleFecha").hide();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#idProveedorGasto").prop('disabled', true); //Bloqueando la entidad
        $("#entidadGasto").change(function() {
            $("#idProveedorGasto").prop('disabled', false); // Desbloqueando la entidad
            $('#idProveedorGasto').each(function() {
                $('#idProveedorGasto option').remove();
            })
            var flag = $(this).val();
            $.ajax({
                url: "tipo_entidad",
                type: "GET",
                data: {id: flag},
                success: function(respuesta) {
                    var registro = eval(respuesta);
                    if (registro.length > 0) {
                        var entidad = "";
                        for (var i = 0; i < registro.length; i++) {
                            if (flag == "1") {
                                entidad += "<option value='" + registro[i]["idMedico"] + "'>" + registro[i]["nombreMedico"] + "</option>";
                            } else {
                                entidad += "<option value='" + registro[i]["idProveedor"] + "'>" + registro[i]["empresaProveedor"] + "</option>";
                            }
                        }
                        $("#idProveedorGasto").append(entidad);
                    }

                    console.log(entidad);
                }
            });

        });

        // Actualizar
            $("#idProveedorGastoA").prop('disabled', true); //Bloqueando la entidad
            $("#entidadGastoA").change(function() {
                $("#idProveedorGastoA").prop('disabled', false); // Desbloqueando la entidad
                $('#idProveedorGastoA').each(function() {
                    $('#idProveedorGastoA option').remove();
                })
                var flag = $(this).val();
                $.ajax({
                    url: "tipo_entidad",
                    type: "GET",
                    data: {id: flag},
                    success: function(respuesta) {
                        var registro = eval(respuesta);
                        if (registro.length > 0) {
                            var entidad = "";
                            for (var i = 0; i < registro.length; i++) {
                                if (flag == "1") {
                                    entidad += "<option value='" + registro[i]["idMedico"] + "'>" + registro[i]["nombreMedico"] + "</option>";
                                } else {
                                    entidad += "<option value='" + registro[i]["idProveedor"] + "'>" + registro[i]["empresaProveedor"] + "</option>";
                                }
                            }
                            $("#idProveedorGastoA").append(entidad);
                        }

                    }
                });

            });

    });

    // Ocultando y mostrando campo para cheque
    $(document).on('change', '#pagoGasto', function(event) {
        event.preventDefault();
        var valor = $(this).val();
        var html = '';
        html += '<label for=""><strong>Número de cheque:</strong></label>';
        html += '<div class="input-group">';
        html += '    <input type="text" class="form-control" id="chequeGasto" name="chequeGasto" required>';
        html += '    <div class="invalid-tooltip">';
        html += '        Ingrese el numero de cheque.';
        html += '    </div>';
        html += '</div>';
        if (valor == 2) {
            $("#numeroCheque").append(html);
        } else {
            $("#numeroCheque").html('');
        }

    });

    $(document).on('change', '#pagoGastoA', function(event) {
        event.preventDefault();
        var valor = $(this).val();
        var html = '';
        html += '<label for=""><strong>Número de cheque:</strong></label>';
        html += '<div class="input-group">';
        html += '    <input type="text" class="form-control" id="chequeGastoA" name="chequeGasto" required>';
        html += '    <div class="invalid-tooltip">';
        html += '        Ingrese el numero de cheque.';
        html += '    </div>';
        html += '</div>';
        if (valor == 2) {
            $("#numeroChequeA").show();
        } else {
            $("#numeroChequeA").hide();
        }

    });
</script>

<script>
    function editarGasto(id, tipo, monto, entregado, idCuenta, fecha, entidad, idProveedor, pago, numero, descripcion, codigo){
        console.log(idProveedor);
        document.getElementById("idGastoA").value = id;
        document.getElementById("tipoGastoA").value = tipo;
        document.getElementById("entregadoGastoA").value = entregado;
        document.getElementById("idCuentaGastoA").value = idCuenta;
        document.getElementById("montoGastoA").value = monto;
        document.getElementById("fechaGastoA").value = fecha;
        document.getElementById("entidadGastoA").value = entidad;
        
        document.getElementById("pagoGastoA").value = pago;
        if(pago == 1){
            $("#numeroChequeA").hide();
        }else{
            $("#numeroChequeA").show();
        }
        document.getElementById("chequeGastoA").value = numero;
        document.getElementById("descripcionCuentaA").value = descripcion;
        document.getElementById("codigoGastoA").value = codigo;

        $("#idProveedorGastoA").prop('disabled', false); // Desbloqueando la entidad
        $('#idProveedorGastoA').each(function() {
            $('#idProveedorGastoA option').remove();
        })
        $.ajax({
            url: "tipo_entidad",
            type: "GET",
            data: {id: entidad},
            success: function(respuesta) {
                var registro = eval(respuesta);
                if (registro.length > 0) {
                    var entidadHTML = "";
                    for (var i = 0; i < registro.length; i++) {
                        if (entidad == 1) {
                            if(registro[i]["idMedico"] == idProveedor){
                                entidadHTML += "<option value='" + registro[i]["idMedico"] + "' selected>" + registro[i]["nombreMedico"] + "</option>";
                            }else{
                                entidadHTML += "<option value='" + registro[i]["idMedico"] + "'>" + registro[i]["nombreMedico"] + "</option>";
                            }
                        } else {
                            if(registro[i]["idProveedor"] == idProveedor){
                                entidadHTML += "<option value='" + registro[i]["idProveedor"] + "' selected>" + registro[i]["empresaProveedor"] + "</option>";
                            }else{
                                entidadHTML += "<option value='" + registro[i]["idProveedor"] + "'>" + registro[i]["empresaProveedor"] + "</option>";
                            }
                        }
                    }
                    $("#idProveedorGastoA").append(entidadHTML);
                }

            }
        });
        document.getElementById("idProveedorGastoA").value = idProveedor;
       
    }
</script>