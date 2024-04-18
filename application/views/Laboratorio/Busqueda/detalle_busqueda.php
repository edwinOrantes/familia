<!-- scripts para avisos -->
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

<style>
    .tabla_examen, .nombre_examen{
        display: none;
    }

    #htmlDetalle .table tr td{
        padding: 1px !important
    }
    
</style>

<div class="ms-content-wrapper">
	<div class="row">
		<div class="col-md-12">
            <div class="">
                <div class="row">
                    <div class="col-md-12 mt-1">
                        <div class="alert-primary table-responsive bordeContenedor pt-3 pl-3">
                            <form action="" method="">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Código:</strong></td>
                                        <td><?php echo $paciente->codigoConsulta; ?></td>
                                        <td><strong>Fecha:</strong></td>
                                        <td><?php echo $paciente->fechaConsulta; ?></td>
                                        <td><strong>Tipo:</strong></td>
                                        <td>Ambulatorio</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>Paciente:</strong></td>
                                        <td><?php echo $paciente->nombrePaciente; ?> </td>
                                        <td><strong>Edad:</strong></td>
                                        <td><?php echo $paciente->edadPaciente." Años"; ?></td>
                                        <td><strong>Medico:</strong></td>
                                        <td><?php echo $paciente->nombreMedico; ?></td>
                                    </tr>
                        
                                </table>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
