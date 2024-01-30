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
            <div class="row">
                <div class="col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-arrow has-gap">
                            <li class="breadcrumb-item" aria-current="page"> <a href="#"><i class="fa fa-users"></i> Honorarios </a> </li>
                            <li class="breadcrumb-item"><a href="#">Paquetes</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 text-right"></div>
            </div>
			<div class="ms-panel">
				<div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-6"><h6>Honorarios de paquetes</h6></div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-success btn-sm" href="<?php echo base_url()?>Honorarios/gestion_honorarios_paquetes"> Entregar honorarios <i class="fa fa-hand-holding-usd"></i> </a>
							<!-- <a href="<?php echo base_url()?>Paciente/lista_pacientes_excel" class="btn btn-success btn-sm"><i class="fa fa-file-excel"></i> Ver Excel</a> -->
							<!--<button class="btn btn-success btn-sm"><i class="fa fa-file-pdf"></i> Ver PDF</button>-->
                        </div>
                    </div>
				</div>
			
            
				<div class="ms-panel-body">
					<div class="row mt-3">
                        <?php
                            if(sizeof($honorarios) > 0){
                        ?>
                            <div class="table-responsive">
                                <table id="tabla-pacientes" class="table table-striped thead-primary w-100">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Hoja</th>
                                            <th class="text-center">Paciente</th>
                                            <th class="text-center">Médico</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Opción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $index = 0;
                                            foreach ($honorarios as $row) {
                                                $index++;
                                        ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php
                                                    if($row->totalHonorarioPaquete != $row->originalHonorarioPaquete){
                                                        echo "<i class='fa fa-users text-warning'></i>";
                                                    }else{
                                                        echo "<i class='fa fa-user text-primary'></i>";
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center"><?php echo $index; ?></td>
                                            <td class="text-center"> <a href="<?php echo base_url().'Hoja/detalle_hoja/'.$row->idHoja.'/'; ?>" target="_blank" rel="noopener noreferrer"><?php echo $row->codigoHoja; ?></a> </td>
                                            <td class="text-center"><?php echo $row->nombrePaciente; ?></td>
                                            <td class="text-center"><?php echo $row->nombreMedico; ?></td>
                                            <td class="text-center">$<?php echo number_format($row->totalHonorarioPaquete, 2); ?></td>
                                            <td class="text-center">
                                                <?php
                                                    echo '<a href="'.base_url().'Honorarios/dividir_honorario/'.$row->idHonorarioPaquete.'/" title="Dividir honorario"><i class="fa fa-list text-primary"></i></a>';
                                                ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                            }else{
                                echo "<div class='alert-danger text-center p-3 bold col-md-12'>No hay datos que mostrar.</div";
                            }
                        ?>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>


<script>
    $(document).ready(function() {
/*         $("#generarExcel").hide();
        $("#saldarTodos").hide();
        $("#totalHonorario").hide();
        $("#pivoteHonorario").hide(); */
        $('.controlInteligente').select2({
            theme: "bootstrap4"
        });
        $('.controlInteligente2').select2({
            theme: "bootstrap4",
            dropdownParent: $("#facturadosFecha")
        });
    });
</script>