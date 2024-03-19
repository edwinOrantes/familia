<?php if($this->session->flashdata("exito")):?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.remove();
            toastr.options.positionClass = "toast-top-center";
            toastr.success('<?php echo $this->session->flashdata("exito")?>', 'Aviso!');
        });
    </script>
<?php endif; ?>

<?php if($this->session->flashdata("error")):?>
    <script type="text/javascript">
        $(document).ready(function() {
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
                    <li class="breadcrumb-item" aria-current="page"> <a href="#"><i class="fa fa-users"></i> Habitaciones
                        </a> </li>
                    <li class="breadcrumb-item"><a href="#">Lista habitaciones </a></li>
                </ol>
            </nav>

            <div class="ms-panel">
                <div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Listado de empleados</h6>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="#agregarHabitacion" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Agregar </a>
                        </div>
                    </div>
                </div>
                <div class="ms-panel-body">
                    <div class="row">
                        <div class="table-responsive mt-3">
                            <table id="" class="table table-striped thead-primary w-100 tablaPlus">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">#</th>
                                        <th class="text-center" scope="col">Habitación</th>
                                        <th class="text-center" scope="col">Opción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                      $index = 0;
                                        foreach ($habitaciones as $row) {
                                          $index++;
                
                                    ?>
                                    <tr>
                                        <td class="text-center" scope="row"><?php echo $index; ?></td>
                                        <td class="text-center"><?php echo $row->numeroHabitacion; ?></td>
                                        <td class="text-center">
                                            <input type="hidden" value="<?php echo $row->numeroHabitacion; ?>" class="numeroHabitacion">
                                            <input type="hidden" value="<?php echo $row->idHabitacion; ?>" class="idHabitacion">
                                            <?php
                                               echo "<a href='#actualizarHabitacion' class='actualizarHabitacion' data-toggle='modal'><i class='fas fa-edit ms-text-success'></i></a>";
                                               echo "<a  href='#eliminarHabitacion' class='eliminarHabitacion' data-toggle='modal'><i class='far fa-trash-alt ms-text-danger'></i></a>";
                                            ?>
                                        </td>
                                    </tr>

                                    <?php }	?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal guardar la habitacion-->
    <div class="modal fade" id="agregarHabitacion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white"></i> Datos de la habitacion</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span
                            aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">
                                <form class="needs-validation" method="post" action="<?php echo base_url()?>Habitaciones/guardar_habitacion" novalidate>
                                    
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for=""><strong>Nombre</strong></label>
                                            <input type="text" class="form-control" id="nombreHabitacion" name="nombreHabitacion" required>
                                            <div class="invalid-tooltip">
                                                Debes ingresar el nombre de la habitación.
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary has-icon"><i class="fa fa-save"></i> Guardar </button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Fin Modal guardar la habitacion-->

<!-- Modal para actualizar datos la habitacion-->
    <div class="modal fade" id="actualizarHabitacion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white"></i> Datos de la habitacion</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span
                            aria-hidden="true" class="text-white">&times;</span></button>
                </div>

                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-body">
                                <form class="needs-validation" method="post" action="<?php echo base_url()?>Habitaciones/actualizar_habitacion" novalidate>
                                    
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for=""><strong>Nombre</strong></label>
                                            <input type="text" class="form-control" id="nombreHabitacionU" name="nombreHabitacion" required>
                                            <div class="invalid-tooltip">
                                                Debes ingresar el nombre de la habitación.
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group text-center">
                                        <input type="hidden" class="form-control" id="idHabitacion" name="idHabitacion" required>
                                        <button type="submit" class="btn btn-primary has-icon"><i class="fa fa-save"></i> Actualizar </button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Fin Modal actualizar datos la habitacion-->


<!-- Modal para eliminar datos la habitacion-->
    <div class="modal fade" id="eliminarHabitacion" tabindex="-1" role="dialog" aria-labelledby="modal-5">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content pb-5">
                <form action="<?php echo base_url() ?>Habitaciones/eliminar_habitacion" method="post">
                    <div class="modal-header bg-danger">
                        <h3 class="modal-title has-icon text-white"><i class="flaticon-alert-1"></i> Advertencia</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
                                class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body text-center">
                        <p class="h5">¿Estas seguro de eliminar estos datos ?</p>
                        <input type="text" id="habitacionEliminar" name="idHabitacion" />
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-danger shadow-none"><i class="fa fa-trash"></i> Eliminar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<!-- Fin Modal eliminar  datos la habitacion-->

<script>

$(document).on("click", ".actualizarHabitacion", function(e) {
    e.preventDefault();
    $("#nombreHabitacionU").val($(this).closest('tr').find('.numeroHabitacion').val());
    $("#idHabitacion").val($(this).closest('tr').find('.idHabitacion').val());
});

$(document).on("click", ".eliminarHabitacion", function(e) {
    e.preventDefault();
    $("#habitacionEliminar").val($(this).closest('tr').find('.idHabitacion').val());
});

</script>