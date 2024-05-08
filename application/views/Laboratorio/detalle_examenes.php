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

    .table td  {
        padding: 3px 5px 0px 0px;
        }
</style>

<div class="">
    <div class="row">
        
        <div class="col-md-12">
            <div class="ms-panel-body clearfix">
                <ul class="nav nav-tabs d-flex nav-justified mb-4" role="tablist">
                <li role="presentation"><a href="#datosPaciente" aria-controls="datosPaciente" class="active show" role="tab" data-toggle="tab" aria-selected="false">Datos del paciente</a></li>
                <li role="presentation"><a href="#hematologia" aria-controls="hematologia" class="" role="tab" data-toggle="tab" aria-selected="false">Hematología</a></li>
                <li role="presentation"><a href="#quimicaSanguinea" aria-controls="quimicaSanguinea" role="tab" data-toggle="tab" class="" aria-selected="false">Química sanguínea</a></li>
                <li role="presentation"><a href="#urianalisis" aria-controls="urianalisis" role="tab" data-toggle="tab" aria-selected="false">Urianálisis </a></li>
                <li role="presentation"><a href="#coprologia" aria-controls="coprologia" role="tab" data-toggle="tab" aria-selected="false">Coprología </a></li>
                <li role="presentation"><a href="#pruebasEspeciales" aria-controls="pruebasEspeciales" role="tab" data-toggle="tab" aria-selected="false">Pruebas especiales </a></li>
                <li role="presentation"><a href="#bacteriologia" aria-controls="bacteriologia" role="tab" data-toggle="tab" aria-selected="false">Bacteriología </a></li>
                </ul>
                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade active show" id="datosPaciente">
                        <div class="alert-primary table-responsive bordeContenedor pt-3 pl-3">
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
                        </div> 
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="hematologia">
                        <form action="<?php echo base_url(); ?>Laboratorio/guardar_hematologia_lab" method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Examen:</strong> <input type="text" value="<?php echo $hematologia->examenSolicitado; ?>"  class="form-control"  id="nombreExamen" name="nombreExamen"></td>
                                            <td><strong>Fecha:</strong>  <input type="date" value="<?php echo $hematologia->fechaExamen; ?>" class="form-control"  id="fechaExamen" name="fechaExamen"></td>
                                        </tr>
                                    </table>
    
                                    <table class="table table-borderless frmExamen">
    
                                        <tr>
                                            <td>Globulos rojos</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->globulosRojos; ?>" name="globulosRojos" id="globulosRojos"> </td>
                                            <td> <span class="badge badge-danger">3,960,000-5,500,000 X mm3</span> </td>
                                            <td>Eritrosedimentación</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->eritrosedimentacion; ?>" name="eritrosedimentacion" id="eritrosedimentacion"></td>
                                            <td> <span class="badge badge-danger">1-20mm/hr</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Globulos blancos</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->globulosBlancos; ?>" name="globulosBlancos" id="globulosBlancos"> </td>
                                            <td> <span class="badge badge-danger"> 5,000-10,000 X mm3</span> </td>
                                            <td>Reticulositos</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->reticulositos; ?>" name="reticulositos" id="reticulositos"></td>
                                            <td> <span class="badge badge-danger">0.5-1.5%</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Hematocrito</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->hematocrito; ?>" name="hematocrito" id="hematocrito"> </td>
                                            <td> <span class="badge badge-danger">36-50%</span> </td>
                                            <td>T.P Trombolastina</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tpTrombolastina; ?>" name="tpTrombolastina" id="tpTrombolastina"></td>
                                            <td> <span class="badge badge-danger">26-34 Seg.</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Hemoglobina</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->hemoglobina; ?>" name="hemoglobina" id="hemoglobina"> </td>
                                            <td> <span class="badge badge-danger">12-16.6 g%</span> </td>
                                            <td>T. de sangramiento</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tSangramiento; ?>" name="tSangramiento" id="tSangramiento"></td>
                                            <td> <span class="badge badge-danger">1-3 Minutos</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Vl. globular medio</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="vlGMedio" id="vlGMedio"> </td>
                                            <td> <span class="badge badge-danger">90.9-92.7 micras3</span> </td>
                                            <td>T. de coagulacion</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="tCoagulacion" id="tCoagulacion"></td>
                                            <td> <span class="badge badge-danger">5-10 Minutos</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Hb. globular media</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->hbGMedia; ?>" name="hbGMedia" id="hbGMedia"> </td>
                                            <td> <span class="badge badge-danger">30.2-31.7 uug</span> </td>
                                            <td>T. Protombina</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tProtombina; ?>" name="tProtombina" id="tProtombina"></td>
                                            <td> <span class="badge badge-danger">13-17 Seg</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Conc. HB. Glob. Med</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->concHbGlobMed; ?>" name="concHbGlobMed" id="concHbGlobMed"> </td>
                                            <td> <span class="badge badge-danger">33-33.5%</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Neutrofilos</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->neutrofilos; ?>" name="neutrofilos" id="neutrofilos"> </td>
                                            <td> <span class="badge badge-danger">40-70%</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Linfocitos</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->linfocitos; ?>" name="linfocitos" id="linfocitos"> </td>
                                            <td> <span class="badge badge-danger">20-40%</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Eosinofilos</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->eosinofilos; ?>" name="eosinofilos" id="eosinofilos"> </td>
                                            <td> <span class="badge badge-danger">1-4%</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Basofilos</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->basofilos; ?>" name="basofilos" id="basofilos"> </td>
                                            <td> <span class="badge badge-danger">2-5%</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Monocitos</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->monocitos; ?>" name="monocitos" id="monocitos"> </td>
                                            <td> <span class="badge badge-danger">0-1%</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Plaquetas</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->plaquetas; ?>" name="plaquetas" id="plaquetas"> </td>
                                            <td> <span class="badge badge-danger">150,000-400,000 X mm3</span> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Observaciones</td>
                                            <td colspan="2"> <textarea class="form-control" name="observacionesH" id="observacionesH"><?php echo $hematologia->observacionesH; ?></textarea></td>
                                            <td></td>
                                            <td >
                                                <input type="hidden" class="form-control" value="<?php echo $hematologia->idHematologia; ?>" name="idHematologia" id="idHematologia"> 
                                                <input type="hidden" class="form-control" value="<?php echo $consulta; ?>" name="idConsulta"> 
                                                <button class="btn btn-primary btn-block"> <i class="fa fa-save"></i> Guardar</button>
                                            </td>
                                        </tr>
    
    
                                    </table>
                                </div>
                                <div class="col-md-2 text-center">
                                    <p><strong>HISTORIAL</strong></p>
                                    <div class="table-responsive historial_receta table-md">
                                        <table class="table table-borderless table-sm">
                                            <tr>
                                                <td>Fecha</td>
                                                <td>Opcion</td>
                                            </tr>
                                            <?php 
                                                foreach ($historial_hematologia as $row) {
                                                    if($row->fechaConsulta == date("Y-m-d")){
                                                        echo '<tr class="alert-primary">';
                                                    }else{
                                                        echo '<tr>';
                                                    }
                                                    echo ' <td>'.$row->fechaConsulta.'</td>';
                                                    echo ' <td>

                                                            <input type="hidden" class="globulosRojos" value="'.$row->globulosRojos.'">
                                                            <input type="hidden" class="eritrosedimentacion" value="'.$row->eritrosedimentacion.'">
                                                            <input type="hidden" class="globulosBlancos" value="'.$row->globulosBlancos.'">
                                                            <input type="hidden" class="reticulositos" value="'.$row->reticulositos.'">
                                                            <input type="hidden" class="hematocrito" value="'.$row->hematocrito.'">
                                                            <input type="hidden" class="tpTrombolastina" value="'.$row->tpTrombolastina.'">
                                                            <input type="hidden" class="hemoglobina" value="'.$row->hemoglobina.'">
                                                            <input type="hidden" class="tSangramiento" value="'.$row->tSangramiento.'">
                                                            <input type="hidden" class="vlGMedio" value="'.$row->vlGMedio.'">
                                                            <input type="hidden" class="tCoagulacion" value="'.$row->tCoagulacion.'">
                                                            <input type="hidden" class="hbGMedia" value="'.$row->hbGMedia.'">
                                                            <input type="hidden" class="tProtombina" value="'.$row->tProtombina.'">
                                                            <input type="hidden" class="concHbGlobMed" value="'.$row->concHbGlobMed.'">
                                                            <input type="hidden" class="neutrofilos" value="'.$row->neutrofilos.'">
                                                            <input type="hidden" class="linfocitos" value="'.$row->linfocitos.'">
                                                            <input type="hidden" class="eosinofilos" value="'.$row->eosinofilos.'">
                                                            <input type="hidden" class="basofilos" value="'.$row->basofilos.'">
                                                            <input type="hidden" class="monocitos" value="'.$row->monocitos.'">
                                                            <input type="hidden" class="plaquetas" value="'.$row->plaquetas.'">
                                                            <input type="hidden" class="observacionesH" value="'.$row->observacionesH.'">
                                                            <input type="hidden" class="examenSolicitado" value="'.$row->examenSolicitado.'">
                                                            <input type="hidden" class="fechaExamen" value="'.$row->fechaExamen.'">

                                                            <a href="'.base_url().'Laboratorio/hematologia_pdf/'.$row->idHematologia.'" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                            <a href="#" title="Ver receta" class="verHematologia"><i class="fa fa-file text-success"></i></a>
                                                        </td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="quimicaSanguinea">
                        <form action="<?php echo base_url(); ?>Laboratorio/guardar_quimica_lab" method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Examen:</strong> <input type="text" value="<?php echo $quimica->nombreExamen; ?>"  class="form-control"  id="nombreExamen" name="nombreExamen"></td>
                                            <td><strong>Fecha:</strong>  <input type="date" value="<?php echo $quimica->fechaExamen; ?>" class="form-control"  id="fechaExamenQ" name="fechaExamen"></td>
                                        </tr>
                                    </table>
    
                                    <table class="table table-borderless frmExamen">
    
                                        <tr>
                                            <td>Glucosa</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->glucosa; ?>" name="glucosa" id="glucosa"> </td>
                                            <td>Fosfatasa acida Prost.</td>
                                            <td><input type="text" class="form-control" value="<?php echo $quimica->fosfatasa; ?>" name="fosfatasa" id="fosfatasa"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Glucosa Post-Prand</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->glucosaPostPrand; ?>" name="glucosaPostPrand" id="glucosaPostPrand"> </td>
                                            <td>Lipasa</td>
                                            <td><input type="text" class="form-control" value="<?php echo $quimica->lipasa; ?>" name="lipasa" id="lipasa"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Globulina</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->globulina; ?>" name="globulina" id="globulina"> </td>
                                            <td>Amilasa</td>
                                            <td><input type="text" class="form-control" value="<?php echo $quimica->amilasa; ?>" name="amilasa" id="amilasa"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Trigliceridos</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->trigliceridos; ?>" name="trigliceridos" id="trigliceridos"> </td>
                                            <td>Indice A/G</td>
                                            <td><input type="text" class="form-control" value="<?php echo $quimica->indiceAG; ?>" name="indiceAG" id="indiceAG"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Colesterol</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->colesterol; ?>" name="colesterol" id="colesterol"> </td>
                                            <td>Bilirrubina directa</td>
                                            <td><input type="text" class="form-control" value="<?php echo $quimica->bilirrubinaD; ?>" name="bilirrubinaD" id="bilirrubinaD"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Colesterol H.D.L</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->colesterolHDL; ?>" name="colesterolHDL" id="colesterolHDL"> </td>
                                            <td>Bilirrubina indirecta</td>
                                            <td><input type="text" class="form-control" value="<?php echo $quimica->bilirrubinaI; ?>" name="bilirrubinaI" id="bilirrubinaI"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Colesterol L.D.L</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->colesterolLDL; ?>" name="colesterolLDL" id="colesterolLDL"> </td>
                                            <td>Albumina</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->albumina; ?>" name="albumina" id="albumina"> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Ácido Úrico</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->acidoUrico; ?>" name="acidoUrico" id="acidoUrico"> </td>
                                            <td>Fosforo</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->fosforo; ?>" name="fosforo" id="fosforo"> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Creatinina</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->creatinina; ?>" name="creatinina" id="creatinina"> </td>
                                            <td>Cloro</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->cloro; ?>" name="cloro" id="cloro"> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Nitrógeno</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->nitrogeno; ?>" name="nitrogeno" id="nitrogeno"> </td>
                                            <td>Calcio</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->calcio; ?>" name="calcio" id="calcio"> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Proteinas totales</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->proteinasT; ?>" name="proteinasT" id="proteinasT"> </td>
                                            <td>Potasio</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->potasio; ?>" name="potasio" id="potasio"> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Bilirrubina</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->bilirrubina; ?>" name="bilirrubina" id="bilirrubina"> </td>
                                            <td>Sodio</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->sodio; ?>" name="sodio" id="sodio"> </td>
                                        </tr>
    
                                        <tr>
                                            <td>T.G.O</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->tgo; ?>" name="tgo" id="tgo"> </td>
                                            <td>Magnesio</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->magnesio; ?>" name="magnesio" id="magnesio"> </td>
                                        </tr>
                                        <tr>
                                            <td>T.G.P</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->tgp; ?>" name="tgp" id="tgp"> </td>
                                            <td>Fosfatasa alcalina</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $quimica->fosfatasaA; ?>" name="fosfatasaA" id="fosfatasaA"> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Observaciones</td>
                                            <td colspan="2"> <textarea class="form-control" name="observacionesQS" id="observacionesQS"><?php echo $quimica->observacionesQS; ?></textarea></td>
                                            <td >
                                                <input type="hidden" class="form-control" value="<?php echo $quimica->idQuimicaSanguinea; ?>" name="idQuimicaSanguinea" id="idQuimicaSanguinea"> 
                                                <input type="hidden" class="form-control" value="<?php echo $consulta; ?>" name="idConsulta"> 
                                                <button class="btn btn-primary btn-block mt-2"> <i class="fa fa-save"></i> Guardar</button>
                                            </td>
                                        </tr>
    
    
                                    </table>
                                </div>
                                <div class="col-md-2 text-center">
                                    <p><strong>HISTORIAL</strong></p>
                                    <div class="table-responsive historial_receta table-md">
                                        <table class="table table-borderless table-sm">
                                            <tr>
                                                <td>Fecha</td>
                                                <td>Opcion</td>
                                            </tr>
                                            <?php 
                                                foreach ($historial_quimica as $row) {
                                                    if($row->fechaExamen == date("Y-m-d")){
                                                        echo '<tr class="alert-primary">';
                                                    }else{
                                                        echo '<tr>';
                                                    }
                                                    echo ' <td>'.$row->fechaExamen.'</td>';
                                                    echo ' <td>

                                                            <input type="hidden" class="glucosa" value="'.$row->glucosa.'">
                                                            <input type="hidden" class="fosfatasa" value="'.$row->fosfatasa.'">
                                                            <input type="hidden" class="glucosaPostPrand" value="'.$row->glucosaPostPrand.'">
                                                            <input type="hidden" class="lipasa" value="'.$row->lipasa.'">
                                                            <input type="hidden" class="globulina" value="'.$row->globulina.'">
                                                            <input type="hidden" class="amilasa" value="'.$row->amilasa.'">
                                                            <input type="hidden" class="trigliceridos" value="'.$row->trigliceridos.'">
                                                            <input type="hidden" class="indiceAG" value="'.$row->indiceAG.'">
                                                            <input type="hidden" class="colesterol" value="'.$row->colesterol.'">
                                                            <input type="hidden" class="bilirrubinaD" value="'.$row->bilirrubinaD.'">
                                                            <input type="hidden" class="colesterolHDL" value="'.$row->colesterolHDL.'">
                                                            <input type="hidden" class="bilirrubinaI" value="'.$row->bilirrubinaI.'">
                                                            <input type="hidden" class="colesterolLDL" value="'.$row->colesterolLDL.'">
                                                            <input type="hidden" class="albumina" value="'.$row->albumina.'">
                                                            <input type="hidden" class="acidoUrico" value="'.$row->acidoUrico.'">
                                                            <input type="hidden" class="fosforo" value="'.$row->fosforo.'">
                                                            <input type="hidden" class="creatinina" value="'.$row->creatinina.'">
                                                            <input type="hidden" class="cloro" value="'.$row->cloro.'">
                                                            <input type="hidden" class="nitrogeno" value="'.$row->nitrogeno.'">
                                                            <input type="hidden" class="calcio" value="'.$row->calcio.'">
                                                            <input type="hidden" class="proteinasT" value="'.$row->proteinasT.'">
                                                            <input type="hidden" class="potasio" value="'.$row->potasio.'">
                                                            <input type="hidden" class="bilirrubina" value="'.$row->bilirrubina.'">
                                                            <input type="hidden" class="sodio" value="'.$row->sodio.'">
                                                            <input type="hidden" class="tgo" value="'.$row->tgo.'">
                                                            <input type="hidden" class="magnesio" value="'.$row->magnesio.'">
                                                            <input type="hidden" class="tgp" value="'.$row->tgp.'">
                                                            <input type="hidden" class="fosfatasaA" value="'.$row->fosfatasaA.'">
                                                            <input type="hidden" class="observacionesQS" value="'.$row->observacionesQS.'">
                                                            <input type="hidden" class="nombreExamen" value="'.$row->nombreExamen.'">
                                                            <input type="hidden" class="fechaExamen" value="'.$row->fechaExamen.'">

                                                            <a href="'.base_url().'Laboratorio/quimica_pdf/'.$row->idQuimicaSanguinea.'" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                            <a href="#" title="Ver receta" class="verQuimica"><i class="fa fa-file text-success"></i></a>
                                                        </td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="urianalisis">
                        <form action="<?php echo base_url(); ?>Laboratorio/guardar_urianalisis_lab" method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Examen:</strong> <input type="text" value="<?php echo $urianalisis->nombreExamen; ?>"  class="form-control"  id="nombreExamen" name="nombreExamen"></td>
                                            <td><strong>Fecha:</strong>  <input type="date" value="<?php echo $urianalisis->fechaExamen; ?>" class="form-control"  id="fechaExamen" name="fechaExamen"></td>
                                        </tr>
                                    </table>
    
                                    <table class="table table-borderless frmExamen">
                                        <tr class="bg-danger text-white text-center">
                                            <th colspan="4">EXAMEN FISICO QUIMICO</th>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->color; ?>" name="color" id="color"> </td>
                                            <td>Aspecto</td>
                                            <td><input type="text" class="form-control" value="<?php echo $urianalisis->aspecto; ?>" name="aspecto" id="aspecto"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Reacción</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->reaccion; ?>" name="reaccion" id="reaccion"> </td>
                                            <td>Densidad</td>
                                            <td><input type="text" class="form-control" value="<?php echo $urianalisis->densidad; ?>" name="densidad" id="densidad"></td>
                                        </tr>
    
                                        <tr>
                                            <td>P.H.</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->ph; ?>" name="ph" id="ph"> </td>
                                            <td>Glucosa</td>
                                            <td><input type="text" class="form-control" value="<?php echo $urianalisis->glucosa; ?>" name="glucosa" id="glucosaU"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Proteinas</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->proteinas; ?>" name="proteinas" id="proteinas"> </td>
                                            <td>Pigmentos Biliares</td>
                                            <td><input type="text" class="form-control" value="<?php echo $urianalisis->pigmentosB; ?>" name="pigmentosB" id="pigmentosB"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Sangre oculta</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->sangreO; ?>" name="sangreO" id="sangreO"> </td>
                                            <td>Nitritos</td>
                                            <td><input type="text" class="form-control" value="<?php echo $urianalisis->nitritos; ?>" name="nitritos" id="nitritos"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Cuerpos Cetonicos</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->cuerposC; ?>" name="cuerposC" id="cuerposC"> </td>
                                            <td>Acidos Biliares</td>
                                            <td><input type="text" class="form-control" value="<?php echo $urianalisis->acidosBiliares; ?>" name="acidosBiliares" id="acidosBiliares"></td>
                                        </tr>

                                        <tr class="bg-danger text-white text-center">
                                            <th colspan="4">EXAMEN MICROSCOPICO</th>
                                        </tr>
    
                                        <tr>
                                            <td>Granulosos</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->granulosos; ?>" name="granulosos" id="granulosos"> </td>
                                            <td>Cilindros leucocitarios</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->cilindrosL; ?>" name="cilindrosL" id="cilindrosL"> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Cilindros Hialinos</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->cilindrosH; ?>" name="cilindrosH" id="cilindrosH"> </td>
                                            <td>Otros cilindros</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->otrosCilindros; ?>" name="otrosCilindros" id="otrosCilindros"> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Leucositos</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->leucositos; ?>" name="leucositos" id="leucositos"> </td>
                                            <td>Hematies</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->hematies; ?>" name="hematies" id="hematies"> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Celulas Epiteliales</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->celulasE; ?>" name="celulasE" id="celulasE"> </td>
                                            <td>Elementos minerales</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->elementosM; ?>" name="elementosM" id="elementosM"> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Bacterias</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->bacterias; ?>" name="bacterias" id="bacterias"> </td>
                                            <td>Levadura</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->levadura; ?>" name="levadura" id="levadura"> </td>
                                        </tr>
    
                                        <tr>
                                            <td>Otros</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->otrosUno; ?>" name="OtrosUno" id="OtrosUno"> </td>
                                            <td>Otros</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $urianalisis->otrosDos; ?>" name="otrosDos" id="otrosDos"> </td>
                                        </tr>

                                        <tr>
                                            <td>Observaciones</td>
                                            <td> <textarea class="form-control" name="observacionesU" id="observacionesU"><?php echo $urianalisis->observacionesU; ?></textarea></td>
                                            <td></td>
                                            <td >
                                                <input type="hidden" class="form-control" value="<?php echo $urianalisis->idUrianalisis; ?>" name="idUrianalisis" id="idUrianalisis"> 
                                                <input type="hidden" class="form-control" value="<?php echo $consulta; ?>" name="idConsulta"> 
                                                <button class="btn btn-primary btn-block mt-2"> <i class="fa fa-save"></i> Guardar</button>
                                            </td>
                                        </tr>
    
    
                                    </table>
                                </div>
                                <div class="col-md-2 text-center">
                                    <p><strong>HISTORIAL</strong></p>
                                    <div class="table-responsive historial_receta table-md">
                                        <table class="table table-borderless table-sm">
                                            <tr>
                                                <td>Fecha</td>
                                                <td>Opcion</td>
                                            </tr>
                                            <?php 
                                                foreach ($historial_urianalisis as $row) {
                                                    if($row->fechaExamen == date("Y-m-d")){
                                                        echo '<tr class="alert-primary">';
                                                    }else{
                                                        echo '<tr>';
                                                    }
                                                    echo ' <td>'.$row->fechaExamen.'</td>';
                                                    echo ' <td>

                                                            <input type="hidden" class="color" value="'.$row->color.'">
                                                            <input type="hidden" class="aspecto" value="'.$row->aspecto.'">
                                                            <input type="hidden" class="reaccion" value="'.$row->reaccion.'">
                                                            <input type="hidden" class="densidad" value="'.$row->densidad.'">
                                                            <input type="hidden" class="ph" value="'.$row->ph.'">
                                                            <input type="hidden" class="glucosa" value="'.$row->glucosa.'">
                                                            <input type="hidden" class="proteinas" value="'.$row->proteinas.'">
                                                            <input type="hidden" class="pigmentosB" value="'.$row->pigmentosB.'">
                                                            <input type="hidden" class="sangreO" value="'.$row->sangreO.'">
                                                            <input type="hidden" class="nitritos" value="'.$row->nitritos.'">
                                                            <input type="hidden" class="cuerposC" value="'.$row->cuerposC.'">
                                                            <input type="hidden" class="acidosBiliares" value="'.$row->acidosBiliares.'">
                                                            <input type="hidden" class="granulosos" value="'.$row->granulosos.'">
                                                            <input type="hidden" class="cilindrosL" value="'.$row->cilindrosL.'">
                                                            <input type="hidden" class="cilindrosH" value="'.$row->cilindrosH.'">
                                                            <input type="hidden" class="otrosCilindros" value="'.$row->otrosCilindros.'">
                                                            <input type="hidden" class="leucositos" value="'.$row->leucositos.'">
                                                            <input type="hidden" class="hematies" value="'.$row->hematies.'">
                                                            <input type="hidden" class="celulasE" value="'.$row->celulasE.'">
                                                            <input type="hidden" class="elementosM" value="'.$row->elementosM.'">
                                                            <input type="hidden" class="bacterias" value="'.$row->bacterias.'">
                                                            <input type="hidden" class="levadura" value="'.$row->levadura.'">
                                                            <input type="hidden" class="otrosUno" value="'.$row->otrosUno.'">
                                                            <input type="hidden" class="otrosDos" value="'.$row->elementosM.'">
                                                            <input type="hidden" class="observacionesU" value="'.$row->observacionesU.'">
                                                            <input type="hidden" class="nombreExamen" value="'.$row->nombreExamen.'">
                                                            <input type="hidden" class="fechaExamen" value="'.$row->fechaExamen.'">

                                                            <a href="'.base_url().'Laboratorio/urianalisis_pdf/'.$row->idUrianalisis.'" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                            <a href="#" title="Ver receta" class="verUrianalisis"><i class="fa fa-file text-success"></i></a>
                                                        </td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="coprologia">
                        <form action="<?php echo base_url(); ?>Laboratorio/guardar_hematologia_lab" method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Examen:</strong> <input type="text" value="<?php echo $hematologia->examenSolicitado; ?>"  class="form-control"  id="nombreExamen" name="nombreExamen"></td>
                                            <td><strong>Fecha:</strong>  <input type="date" value="<?php echo $hematologia->fechaExamen; ?>" class="form-control"  id="fechaExamen" name="fechaExamen"></td>
                                        </tr>
                                    </table>
    
                                    <table class="table table-borderless frmExamen">
                                        <tr>
                                            <td>Color</td>
                                            <td colspan="2"> <input type="text" class="form-control" value="<?php echo $hematologia->globulosRojos; ?>" name="color" id="color"> </td>
                                            <td>Consistencia</td>
                                            <td colspan="2"><input type="text" class="form-control" value="<?php echo $hematologia->eritrosedimentacion; ?>" name="consistencia" id="consistencia"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Mucus</td>
                                            <td colspan="2"> <input type="text" class="form-control" value="<?php echo $hematologia->globulosBlancos; ?>" name="mucus" id="mucus"> </td>
                                            <td>Hematies</td>
                                            <td colspan="2"><input type="text" class="form-control" value="<?php echo $hematologia->reticulositos; ?>" name="hematies" id="hematies"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Leucocitos</td>
                                            <td colspan="2"> <input type="text" class="form-control" value="<?php echo $hematologia->hematocrito; ?>" name="leucocitos" id="leucocitos"> </td>
                                            <td>Bacterias</td>
                                            <td colspan="2"><input type="text" class="form-control" value="<?php echo $hematologia->tpTrombolastina; ?>" name="bacterias" id="bacterias"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Levaduras</td>
                                            <td colspan="2"> <input type="text" class="form-control" value="<?php echo $hematologia->hemoglobina; ?>" name="levaduras" id="levaduras"> </td>
                                            <td>Restos Alim. Microsc. </td>
                                            <td colspan="2"><input type="text" class="form-control" value="<?php echo $hematologia->tSangramiento; ?>" name="restosAM" id="restosAM"></td>
                                        </tr>
    
                                        <tr>
                                            <td>Otros</td>
                                            <td colspan="2"> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="otrosUno" id="otrosUno"> </td>
                                            <td>Otros</td>
                                            <td colspan="2"><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="otrosDos" id="otrosDos"></td>
                                        </tr>

                                        <tr class="bg-danger text-white text-center">
                                            <th>PROTOZOARIOS</th>
                                            <th>TROFOZOITO</th>
                                            <th>QUISTE</th>
                                            <th>METAZOARIOS</th>
                                            <th>HUEVO</th>
                                            <th>LARVA</th>
                                        </tr>

                                        <tr>
                                            <td>Entamoeba Histolytica</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="histolyticaT" id="histolyticaT"> </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="histolyticaQ" id="histolyticaQ"> </td>
                                            <td>Ascaris lumbricoides</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="ascarisH" id="ascarisH"></td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="ascarisL" id="ascarisL"></td>
                                        </tr>

                                        <tr>
                                            <td>Entamoeba Coli</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="coliT" id="coliT"> </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="coliQ" id="coliQ"> </td>
                                            <td>Trichuris trinchiura</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="trinchiuraH" id="trinchiuraH"></td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="trinchiuraL" id="trinchiuraL"></td>
                                        </tr>

                                        <tr>
                                            <td>Endolimax Nana</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="nanaT" id="nanaT"> </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="nanaQ" id="nanaQ"> </td>
                                            <td>Ancylostoma guod</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="guodH" id="guodH"></td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="guodL" id="guodL"></td>
                                        </tr>

                                        <tr>
                                            <td>Chilomastic mesnili</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="mesniliT" id="mesniliT"> </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="mesniliQ" id="mesniliQ"> </td>
                                            <td>Enterobios vermic</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="vermicH" id="vermicH"></td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="vermicL" id="vermicL"></td>
                                        </tr>

                                        <tr>
                                            <td>Giardia Lambia</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="lambiaT" id="lambiaT"> </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="lambiaQ" id="lambiaQ"> </td>
                                            <td>Strongiloides Sterco</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="stercoH" id="stercoH"></td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="stercoL" id="stercoL"></td>
                                        </tr>

                                        <tr>
                                            <td>Tricomonas hominis</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="hominisT" id="hominisT"> </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="hominisQ" id="hominisQ"> </td>
                                            <td>Hymenolepis nana</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="hymenolepisH" id="hymenolepisH"></td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="hymenolepisL" id="hymenolepisL"></td>
                                        </tr>

                                        <tr>
                                            <td>Balantidium coli</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="balantidiumT" id="balantidiumT"> </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="balantidiumQ" id="balantidiumQ"> </td>
                                            <td>Taenias</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="taeniasH" id="taeniasH"></td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="taeniasL" id="taeniasL"></td>
                                        </tr>

                                        <tr>
                                            <td>Blastocystis hominis</td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="blastocystisT" id="blastocystisT"> </td>
                                            <td> <input type="text" class="form-control" value="<?php echo $hematologia->vlGMedio; ?>" name="blastocystisQ" id="blastocystisQ"> </td>
                                            <td>Otros</td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="otrosH" id="otrosH"></td>
                                            <td><input type="text" class="form-control" value="<?php echo $hematologia->tCoagulacion; ?>" name="otrosL" id="otrosL"></td>
                                        </tr>
    

                                        <tr>
                                            <td>Observaciones</td>
                                            <td colspan="2"> <textarea class="form-control" name="observacionesGH" id="observacionesGH"><?php echo $hematologia->observacionesH; ?></textarea></td>
                                            <td></td>
                                            <td >
                                                <input type="hidden" class="form-control" value="<?php echo $hematologia->idHematologia; ?>" name="idHematologia" id="idHematologia"> 
                                                <input type="hidden" class="form-control" value="<?php echo $consulta; ?>" name="idConsulta"> 
                                                <button class="btn btn-primary btn-block mt-2"> <i class="fa fa-save"></i> Guardar</button>
                                            </td>
                                        </tr>
    
    
                                    </table>
                                </div>
                                <div class="col-md-2 text-center">
                                    <p><strong>HISTORIAL</strong></p>
                                    <div class="table-responsive historial_receta table-md">
                                        <table class="table table-borderless table-sm">
                                            <tr>
                                                <td>Fecha</td>
                                                <td>Opcion</td>
                                            </tr>
                                            <?php 
                                                foreach ($historial_hematologia as $row) {
                                                    if($row->fechaConsulta == date("Y-m-d")){
                                                        echo '<tr class="alert-primary">';
                                                    }else{
                                                        echo '<tr>';
                                                    }
                                                    echo ' <td>'.$row->fechaConsulta.'</td>';
                                                    echo ' <td>

                                                            <input type="hidden" class="globulosRojos" value="'.$row->globulosRojos.'">
                                                            <input type="hidden" class="eritrosedimentacion" value="'.$row->eritrosedimentacion.'">
                                                            <input type="hidden" class="globulosBlancos" value="'.$row->globulosBlancos.'">
                                                            <input type="hidden" class="reticulositos" value="'.$row->reticulositos.'">
                                                            <input type="hidden" class="hematocrito" value="'.$row->hematocrito.'">
                                                            <input type="hidden" class="tpTrombolastina" value="'.$row->tpTrombolastina.'">
                                                            <input type="hidden" class="hemoglobina" value="'.$row->hemoglobina.'">
                                                            <input type="hidden" class="tSangramiento" value="'.$row->tSangramiento.'">
                                                            <input type="hidden" class="vlGMedio" value="'.$row->vlGMedio.'">
                                                            <input type="hidden" class="tCoagulacion" value="'.$row->tCoagulacion.'">
                                                            <input type="hidden" class="hbGMedia" value="'.$row->hbGMedia.'">
                                                            <input type="hidden" class="tProtombina" value="'.$row->tProtombina.'">
                                                            <input type="hidden" class="concHbGlobMed" value="'.$row->concHbGlobMed.'">
                                                            <input type="hidden" class="neutrofilos" value="'.$row->neutrofilos.'">
                                                            <input type="hidden" class="linfocitos" value="'.$row->linfocitos.'">
                                                            <input type="hidden" class="eosinofilos" value="'.$row->eosinofilos.'">
                                                            <input type="hidden" class="basofilos" value="'.$row->basofilos.'">
                                                            <input type="hidden" class="monocitos" value="'.$row->monocitos.'">
                                                            <input type="hidden" class="plaquetas" value="'.$row->plaquetas.'">
                                                            <input type="hidden" class="observacionesH" value="'.$row->observacionesH.'">
                                                            <input type="hidden" class="examenSolicitado" value="'.$row->examenSolicitado.'">
                                                            <input type="hidden" class="fechaExamen" value="'.$row->fechaExamen.'">

                                                            <a href="'.base_url().'Laboratorio/hematologia_pdf/'.$row->idHematologia.'" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                            <a href="#" title="Ver receta" class="verHematologia"><i class="fa fa-file text-success"></i></a>
                                                        </td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="pruebasEspeciales">
                        <p>Pruebas especiales </p>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="bacteriologia">
                        <p>Bacteriología</p>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>

<!-- Modales para insertar -->
    <!-- Modal para examen inmunologia-->
        <div class="modal fade" id="inmunologia" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de inmunologia</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="-3">
                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_inmunologia" target="_blank" novalidate>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Exámenes solicitados</strong>
                                                        <select name="examenSolicitado[]" id="" class="form-control controlInteligente" multiple="multiple" required="">
                                                            <option value="">:: Seleccionar ::</option>
                                                            <?php
                                                                foreach ($examenes as $examen) {
                                                            ?>
                                                                <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="invalid-tooltip">
                                                            Seleccione un tipo de examen.
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table table-borderless">
                                                        <thead></thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="menosPadding"><strong>Tífico O</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="tificoO" id="tificoO"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Tífico H</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="tificoH" id="tificoH"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Paratífico A</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="paratificoA" id="paratificoA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Paratífico B</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="paratificoB" id="paratificoB"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Brucella Abortus</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="brucellaAbortus" id="brucellaAbortus"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Proteus OX-19</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="proteusOx" id="proteusOx"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table-borderless">
                                                        <thead></thead>
                                                        <tbody>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Proteína "C" reactiva (VN: Hasta 6mg/L)</strong><br><input type="text" class="pivoteText form-control menosHeight" name="proteinaC" id="proteinaC"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Fac. Reumatoideo (Valor normal: < 8UI/mL)</strong> <br> <input type="text" class="pivoteText form-control menosHeight" name="reumatoideo" id="reumatoideo"> </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Antiestreptolisina "O" ( Valor normal: Hasta 200 UI/mL)</strong> <br> <input type="text" class="pivoteText form-control menosHeight" name="antiestreptolisina" id="antiestreptolisina"> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen inmunologia-->

    <!-- Modal para examen bacteriologia-->
        <div class="modal fade" id="bacteriologia" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de bacteriología</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_bacteriologia" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                            <strong>Exámenes solicitados</strong><br>
                                                            <div class="input-group">
                                                                <select name="bacteriologiaSolicitado[]" id="" class=" form-control controlInteligente2" multiple="multiple" required="">
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                        <strong>Resultado de directo</strong><br>
                                                            <input type="text" class="form-control menosHeight" name="resultadoDirecto" id="resultadoDirecto">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                        <strong>Procedencia de la muestra</strong><br>
                                                            <input type="text" size="92" name="procedenciaDirecto" id="procedenciaDirecto" class="form-control menosHeight">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                        <strong>Resultado de cultivo</strong><br>
                                                            <input type="text" class="form-control menosHeight" name="resultadoCultivo" id="resultadoCultivo">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Cefixime</strong><br><input type="text" class="form-control menosHeight" name="cefixime" id="cefixime"></td>
                                                        <td class="menosPadding"><strong> Amikacina</strong><br><input type="text" class="form-control menosHeight" name="amikacina" id="amikacina"></td>
                                                        <td class="menosPadding"><strong> Levofloxacina</strong><br><input type="text" class="form-control menosHeight" name="levofloxacina" id="levofloxacina"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Ceftriaxona </strong><br><input type="text" class="form-control menosHeight" name="ceftriaxona" id="ceftriaxona"></td>
                                                        <td class="menosPadding"><strong> Azitromicina </strong><br><input type="text" class="form-control menosHeight" name="azitromicina" id="azitromicina"></td>
                                                        <td class="menosPadding"><strong> Imipenem </strong><br><input type="text" class="form-control menosHeight" name="imipenem" id="imipenem"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Meropenem </strong><br><input type="text" class="form-control menosHeight" name="meropenem" id="meropenem"></td>
                                                        <td class="menosPadding"><strong> Fosfocil </strong><br><input type="text" class="form-control menosHeight" name="fosfocil" id="fosfocil"></td>
                                                        <td class="menosPadding"><strong> Ciprofloxacina </strong><br><input type="text" class="form-control menosHeight" name="ciprofloxacina" id="ciprofloxacina"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Penicilina </strong><br><input type="text" class="form-control menosHeight" name="penicilina" id="penicilina"></td>
                                                        <td class="menosPadding"><strong> Vancomicina </strong><br><input type="text" class="form-control menosHeight" name="vancomicina" id="vancomicina"></td>
                                                        <td class="menosPadding"><strong> Ácido nalidíxico </strong><br><input type="text" class="form-control menosHeight" name="acidoNalidixico" id="acidoNalidixico"></td>
                                                    </tr>

                                                    <tr>
                                                        
                                                        <td class="menosPadding"><strong> Gentamicina </strong><br><input type="text" class="form-control menosHeight" name="gentamicina" id="gentamicina"></td>
                                                        <td class="menosPadding"><strong> Nitrofurantoina </strong><br><input type="text" class="form-control menosHeight" name="nitrofurantoina" id="nitrofurantoina"></td>
                                                        <td class="menosPadding"><strong> Ceftazidime </strong><br><input type="text" class="form-control menosHeight" name="ceftazimide" id="ceftazimide"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Cefotaxime </strong><br><input type="text" class="form-control menosHeight" name="cefotaxime" id="cefotaxime"></td>
                                                        <td class="menosPadding"><strong> Clindamicina </strong><br><input type="text" class="form-control menosHeight" name="clindamicina" id="clindamicina"></td>
                                                        <td class="menosPadding"><strong> Trimetropim sulfa </strong><br><input type="text" class="form-control menosHeight" name="trimetropimSulfa" id="trimetropimSulfa"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Ampicilina/Sulbactam </strong><br><input type="text" class="form-control menosHeight" name="ampicilina" id="ampicilina"></td>
                                                        <td class="menosPadding"><strong> Piperacilina/Tazobactam </strong><br><input type="text" class="form-control menosHeight" name="piperacilina" id="piperacilina"></td>
                                                        <td class="menosPadding"><strong> Amoxicilina ácido clavulánico</strong><br><input type="text" class="form-control menosHeight" name="amoxicilina" id="amoxicilina"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Claritromicina </strong><br><input type="text" class="form-control menosHeight" name="claritromicina" id="claritromicina"></td>
                                                        <td class="menosPadding"></td>
                                                        <td class="menosPadding"><strong> Cefuroxime </strong><br><input type="text" class="form-control menosHeight" name="cefuroxime" id="cefuroxime"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3"><strong> Observación </strong><br><textarea  class="form-control menosHeight" name="observacion" id="observacionBacteriologia" cols="96"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen bacteriologia-->

    <!-- Modal para examen Tiempo de coagulación-->
        <div class="modal fade"  id="coagulacion" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de coagulación</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_coagulacion" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding"><strong> Tiempo de protombina</strong><br><input type="text" class="form-control menosHeight" name="tiempoProtombina" id="tiempoProtombina"><p class="text-primary" style="font-size:12px">Valor normal: 10-14 segundos</p></td>
                                                        <td class="menosPadding"><strong> Tiempo parcial de tromboplastina</strong><br><input type="text" class="form-control menosHeight" name="tiempoTromboplastina" id="tiempoTromboplastina"><p class="text-primary" style="font-size:12px">Valor normal: 20-33 segundos</p></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Fibrinógeno </strong><br><input type="text" class="form-control menosHeight" name="fibrinogeno" id="fibrinogeno"><p class="text-primary" style="font-size:12px">Valor normal: 200-400 mg/dl</p></td>
                                                        <td class="menosPadding"><strong> INR </strong><br><input type="text" class="form-control menosHeight" name="inr" id="inr"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Tiempo de sangramiento </strong><br><input type="text" class="form-control menosHeight" name="tiempoSangramiento" id="tiempoSangramiento"><p class="text-primary" style="font-size:12px">Valor normal: 1-4 minutos</p></td>
                                                        <td class="menosPadding"><strong> Tiempo de coagulación </strong><br><input type="text" class="form-control menosHeight" name="tiempoCoagulacion" id="tiempoCoagulacion"><p class="text-primary" style="font-size:12px">Valor normal: 4-9 minutos</p></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Observación </strong><br><textarea  class="form-control menosHeight" name="observacion" id="observacionCoagulacion" cols="96"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen Tiempo de coagulación-->

    <!-- Modal para examen Tipeo sanguineo-->
        <div class="modal fade" id="sanguineo" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de tipeo sanguineo</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_sanguineo" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra</strong><br><input type="text" value="Sangre" class="form-control menosHeight" name="muestraSanguineo" id="muestraSanguineo"></td>
                                                        <td class="menosPadding"><strong> Grupo sanguíneo</strong><br><input type="text" class="form-control menosHeight" name="grupoSanguineo" id="grupoSanguineo"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Factor RH </strong><br><input type="text" class="form-control menosHeight" name="factorSanguineo" id="factorSanguineo"></td>
                                                        <td class="menosPadding"><strong> DU </strong><br><input type="text" class="form-control menosHeight" name="duSanguineo" id="duSanguineo"></td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen Tipeo sanguineo-->

    <!-- Modal para examen sanguinea-->
        <div class="modal fade" id="quimicaSanguinea" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Química Sanguinea</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmQuimicaSanguinea" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_quimica_sanguinea" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <input type="hidden" value="0" name="examenSolicitado">
                                                   
                                                    <tr>
                                                        <td class="menosPadding"><strong> Glucosa (55-110 mg/dl)</strong><br><input type="text" name="glucosa" class="form-control menosHeight" id="glucosa"></td>
                                                        <td class="menosPadding"><strong> Glucosa P. (140 mg/dl)</strong><br><input type="text" name="posprandial" class="form-control menosHeight" id="posprandial"></td>
                                                        <td class="menosPadding"><strong> Colesterol ( < de 200 mg/dl)</strong><br><input type="text" name="colesterol" class="form-control menosHeight" id="colesterol"></td>
                                                        <td class="menosPadding"><strong> Triglicéridos ( < de 150 mg/dl)</strong><br><input type="text" name="trigliceridos" class="form-control menosHeight" id="trigliceridos"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Colesterol HDL (35-65 mg/dl) </strong><br><input type="text" name="colesterolHDL" class="form-control menosHeight" id="colesterolHDL"></td>
                                                        <td class="menosPadding"><strong> Colesterol LDL ( < 150 mg/dl)</strong><br><input type="text" name="colesterolLDL" class="form-control menosHeight" id="colesterolLDL"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Ácido úrico (2.5-7.0 mg/dl) </strong><br><input type="text" name="acidoUrico" class="form-control menosHeight" id="acidoUrico" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Urea ( 10.0 a 48.1 mg/dl)</strong><br><input type="text" name="urea" class="form-control menosHeight" id="urea"></td>
                                                        <td class="menosPadding"><strong> Nitrógeno ureico ( 4.7-22.5 mg/dl)</strong><br><input type="text" name="nitrogenoUreico" class="form-control menosHeight" id="nitrogenoUreico"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Creatinina ( 0.7-1.4 mg/dl)</strong><br><input type="text" name="creatinina" class="form-control menosHeight" id="creatinina" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Amilasa ( VN: menor de 90 U/L)</strong><br><input type="text" name="amilasa" class="form-control menosHeight" id="amilasa"></td>
                                                        <td class="menosPadding"><strong> Lipasa ( VN: menor de 38 U/L)</strong><br><input type="text" name="lipasa" class="form-control menosHeight" id="lipasa"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Fosfatasa alcalina ( 98-279 U/L)</strong><br><input type="text" name="fosfatasaAlcalina" class="form-control menosHeight" id="fosfatasaAlcalina" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TGP ( VN: 1-40 U/L)</strong><br><input type="text" name="tgp" class="form-control menosHeight" id="tgp"></td>
                                                        <td class="menosPadding"><strong> TGO ( VN: 1-38 U/L)</strong><br><input type="text" name="tgo" class="form-control menosHeight" id="tgo"></td>
                                                        <td colspan="2" class="menosPadding"><strong> HBA1C ( VN: 4.5-6.5% )</strong><br><input type="text" name="hba1c" class="form-control menosHeight" id="hba1c" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Proteina total (VN: 6.7-8.7 g/dL)</strong><br><input type="text" name="proteinaTotal" class="form-control menosHeight" id="proteinaTotal"></td>
                                                        <td class="menosPadding"><strong> Albúmina (VN: 3.5-5.0 g/dL)</strong><br><input type="text" name="albumina" class="form-control menosHeight" id="albumina"></td>
                                                        <td class="menosPadding"><strong> Globulina (VN: 2.3-3.4 g/dL) </strong><br><input type="text" name="globulina" class="form-control menosHeight" id="globulina"></td>
                                                        <td class="menosPadding"><strong> Relación A/G: 1.2 a 2.2 </strong><br><input type="text" name="relacionAG" class="form-control menosHeight" id="relacionAG"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Bili. Total (VN: hasta 1.1 mg/dl)</strong><br><input type="text" name="biliTotal" class="form-control menosHeight" id="biliTotal"></td>
                                                        <td class="menosPadding"><strong> Bili. directa (VN: hasta 0.25 mg/dl)</strong><br><input type="text" name="biliDirecta" class="form-control menosHeight" id="biliDirecta"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Bilirrubina indirecta </strong><br><input type="text" name="biliIndirecta" class="form-control menosHeight" id="cloro" size="47"></td>
                                                    </tr>

                                                    <!-- Quimica sanguinea -->

                                                        <tr>
                                                            <td class="menosPadding"><strong> Sodio (135-155 mmol/L)</strong><br><input type="text" class="form-control menosHeight" name="sodioQuimicaClinica" id="sodioQuimicaClinica"></td>
                                                            <td class="menosPadding" colspan="2"><strong> Potasio (3.6-5.5 mmol/L)</strong><br><input type="text" class="form-control menosHeight" name="potasioQuimicaClinica" id="potasioQuimicaClinica"></td>
                                                            <td class="menosPadding"><strong> Cloro (95-115 mmol/L)</strong><br><input type="text" class="form-control menosHeight" name="cloroQuimicaClinica" id="cloroQuimicaClinica"></td>
                                                        </tr>

                                                        <tr>
                                                            <td class="menosPadding"><strong> Magnesio (1.6-2.5 mg/dl) </strong><br><input type="text" class="form-control menosHeight" name="magnesioQuimicaClinica" id="magnesioQuimicaClinica"></td>
                                                            <td class="menosPadding"  colspan="2"><strong> Calcio (8.1-10.4 mg/dl) </strong><br><input type="text" class="form-control menosHeight" name="calcioQuimicaClinica" id="calcioQuimicaClinica"></td>
                                                            <td class="menosPadding"><strong> Fosforo (Vn: 2.5-5.0 mg/dl) </strong><br><input type="text" class="form-control menosHeight" name="fosforoQuimicaClinica" id="fosforoQuimicaClinica"></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="menosPadding"><strong> CPK Total (0-195 U/L) </strong><br><input type="text" class="form-control menosHeight" name="cpkTQuimicaClinica" id="cpkTQuimicaClinica"></td>
                                                            <td class="menosPadding"><strong> CPK MB (menor a 24U/L) </strong><br><input type="text" class="form-control menosHeight" name="cpkMbQuimicaClinica" id="cpkMbQuimicaClinica"></td>
                                                            <td class="menosPadding"><strong> LDH (230-460 U/L) </strong><br><input type="text" class="form-control menosHeight" name="ldhQuimicaClinica" id="ldhQuimicaClinica"></td>
                                                            <td class="menosPadding"><strong> Troponina I (VN: menor a 0.30 ng/ml) </strong><br><input type="text" class="form-control menosHeight" name="troponinaQuimicaClinica" id="troponinaQuimicaClinica"></td>
                                                        </tr>

                                                    <!-- Fin quimica sanguinea -->

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Comentarios </strong><br><textarea name="nota" class="form-control menosHeight" id="nota" cols="96"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen sanguinea-->

    <!-- Modal para examen cropologia-->
        <div class="modal fade" id="cropologia" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Coprologia </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">
                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_cropologia" novalidate>
                                            <div class="row" style="margin-top: 0px;">
                                                <div class="col-md-4" class="border" style="margin-top: -20px;">
                                                    <table>
                                                        <thead></thead>
                                                        <tbody class="text-left">

                                                            <tr>
                                                                <td class="menosPadding"><strong> Color </strong><br><input type="text" class="form-control menosHeight" name="colorCropologia" id="color"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Consistencia </strong><br><input type="text" class="form-control menosHeight" name="consistenciaCropologia" id="consistenciaCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Mucus  </strong><br><input type="text" class="form-control menosHeight" name="mucusCropologia" id="mucusCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Hematíes </strong><br><input type="text"  class="form-control menosHeight" name="hematiesCropologia" id="hematiesCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Leucocitos </strong><br><input type="text"  class="form-control menosHeight" name="leucocitosCropologia" id="leucocitosCropologia"></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td colspan="4" class="divider text-center text-primary font-weight-bold">METAZOARIOS</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Ascaris </strong><br><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="ascarisCropologia" id="ascarisCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Hymenolepis </strong><br><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="hymenolepisCropologia" id="hymenolepisCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Uncinarias  </strong><br><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="uncinariasCropologia" id="uncinariasCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Tricocéfalos </strong><br><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="tricocefalosCropologia" id="tricocefalosCropologia"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Larva strongyloides </strong><br><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="larvaStrongyloides" id="larvaStrongyloides"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-md-8" class="border" style="margin-top: -20px;">
                                                    <table class="table table-borderless">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <td></td>
                                                                <th colspan="2" class="text-primary"><strong>PROTOZOARIOS</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-left">
                                                            <tr class="text-center">
                                                                <td></td>
                                                                <td>Quistes</td>
                                                                <td>Trofozoitos</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Entamoeba histolytica</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="histolyticaQuistes" id="histolyticaQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="histolyticaTrofozoitos" id="histolyticaTrofozoitos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Entamoeba coli</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="coliQuistes" id="coliQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="coliTrofozoitos" id="coliTrofozoitos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Giardia lamblia</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="giardiaQuistes" id="giardiaQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="giardiaTrofozoitos" id="giardiaTrofozoitos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Blastocystis hominis</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="blastocystisQuistes" id="blastocystisQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="blastocystisTrofozoitos" id="blastocystisTrofozoitos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Tricomonas hominis</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="tricomonasQuistes" id="tricomonasQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name=" tricomonasTrofozoitos" id=" tricomonasTrofozoitos "></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Chilomastix mesnilli</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="mesnilliQuistes" id="mesnilliQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="mesnilliTrofozoitos" id="mesnilliTrofozoitos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Endolimax nana</td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN"  class="form-control menosHeight" name="nanaQuistes" id="nanaQuistes"></td>
                                                                <td class="menosPadding"><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="nanaTrofozoitos" id="nanaTrofozoitos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center text-primary" colspan="3"><strong>RESTOS ALIMENTICIOS</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Restos macroscópicos</td>
                                                                <td class="menosPadding" colspan="2"><input type="text" class="form-control menosHeight" name="restosMacroscopicos" id="restosMacroscopicos"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Restos microscópicos</td>
                                                                <td class="menosPadding" colspan="2"><input type="text" class="form-control menosHeight" name="restosMicroscopicos" id="restosMicroscopicos"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-md-12">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesCropologia" id="observacionesCropologia" class="form-control menosHeight"></textarea></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>               
    <!-- Modal para examen cropologia-->

    <!-- Modal para examen tiroideas libres-->
        <div class="modal fade" id="tiroideasLibres" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Tiroidea libre</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_tiroidea_libre" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr>
                                                        <input type="hidden" value="0" name="examenSolicitado">
                                                       <!--  <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente8 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar  ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div> 
                                                        </td> -->
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" value="Suero" class="form-control menosHeight" name="muestraTiroideaLibre" id="muestraTiroideaLibre"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T3 Libres <span class="text-primary">(Vn: 1.4-4.2 pg/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="t3TiroideaLibre" id="t3TiroideaLibre"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T4 Libres <span class="text-primary">(Vn: 0.80-2.0 ng/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="t4TiroideaLibre" id="t4TiroideaLibre"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TSH <span class="text-primary">(Vn: 0.3-3.0 uUI/ml)</span> </strong><br><input type="text" class="form-control menosHeight" name="tshTiroideaLibre" id="tshTiroideaLibre"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TSH Ultrasensible<span class="text-primary">(Vn: 0.03-3.0 uUI/ml)</span> </strong><br><input type="text" class="form-control menosHeight" name="tshTiroideaLibreU" id="tshTiroideaLibreU"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionTiroideaLibre" id="observacionTiroideaLibre" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit" id="tLibre"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen tiroideas libres-->
    
    <!-- Modal para examen tiroideas totales-->
        <div class="modal fade" id="tiroideasTotales" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Tiroideas totales </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_tiroideas_totales" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr>
                                                    <input type="hidden" value="0" name="examenSolicitado">
                                                        <!-- <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente9 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                                </div>
                                                        </td> -->
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" value="Suero" class="form-control menosHeight" name="muestraTiroideaTotal" id="muestraTiroideaTotal"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T3 Total <span class="text-primary">(Vn: 0.5-5.0 ng/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="t3TiroideaTotal" id="t3TiroideaTotal"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T4 Total <span class="text-primary">(Vn: 60.0-120.0 nmol/L)</span></strong><br><input type="text" class="form-control menosHeight" name="t4TiroideaTotal" id="t4TiroideaTotal"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TSH <span class="text-primary">(Vn: 0.3-5.6 uUI/ml)</span> </strong><br><input type="text" class="form-control menosHeight" name="tshTiroideaTotal" id="tshTiroideaTotal"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionTiroideaTotal" id="observacionTiroideaTotal" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen tiroideas totales-->

    <!-- Modal para examen varios-->
        <div class="modal fade" id="varios" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Varios </h4>
                        <button type="button" class="close text-white cerrarVarios" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-12 text-right" style="display: none;">
                                                <strong> Otro </strong>
                                                <label class="ms-switch">
                                                    <input type="checkbox" id="pivoteExamen" value="examenes" name="examenes">
                                                    <span class="ms-switch-slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <form class="needs-validation frmData" id="frmVarios" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_varios" target="_blank" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr>
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <input type="text" class="form-control menosHeight" name="examenSolicitadoLibre" id="detalleLibre">
                                                            <div class="input-group" id="ocultarSelectVarios">
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" class="form-control menosHeight" name="muestraVarios" id="muestraVarios"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Resultado </strong><br><input type="text" class="form-control menosHeight" name="resultadoVarios" id="glucosa"><input type="text" class="menosHeight" name="valorNormalVarios" id="valorNormalVarios" placeholder="Valor normal" style="float: right;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesVarios" id="observacionesVarios" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
                                                <!-- <button class="btn btn-light mt-4 d-inline w-20" type="button" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <!-- Fin Modal para examen varios-->

    <!-- Modal para examen PSA Total-->
        <div class="modal fade" id="psaTotal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Antigeno prostatico especifico total (PSA TOTAL) </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_psa" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente11 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                            if($examen->idMedicamento == 713){
                                                                                echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                            }else{
                                                                                echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" value="Suero" class="form-control menosHeight" name="muestraAntigenoProstatico" id="muestraAntigenoProstatico"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Resultado <span class="text-primary">(Rango de referencia: Menor de 4.0 ng/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="resultadoAntigenoProstatico" id="resultadoAntigenoProstatico"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionAntigenoProstatico" id="observacionAntigenoProstatico" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen PSA Total-->

    <!-- Modal para examen Hematologia-->
        <div class="modal fade" id="hematologia" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Hematologia </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmHematologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_hematologia" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr>
                                                        <td class="menosPadding"><strong> Eritrocitos (4-6 millones)</strong><br><input type="text" class="form-control menosHeight" name="eritrocitosHematologia" id="eritrocitosHematologia"></td>
                                                        <td class="menosPadding"><strong> Hematócrito (36-50 %)</strong><br><input type="text" class="form-control menosHeight" name="hematocritoHematologia" id="hematocritoHematologia"></td>
                                                        <td class="menosPadding"><strong> Hemoglobina (12-16.2 g/dl)</strong><br><input type="text" class="form-control menosHeight" name="hemoglobinaHematologia" id="hemoglobinaHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> VCM (82-96 fl)</strong><br><input type="text" class="form-control menosHeight" name="vgmHematologia" id="vgmHematologia"></td>
                                                        <td class="menosPadding"><strong> HCM (27-32 pg)</strong><br><input type="text" class="form-control menosHeight" name="hgmHematologia" id="hgmHematologia"></td>
                                                        <td class="menosPadding"><strong> CHCM (30-35 g/dl)</strong><br><input type="text" class="form-control menosHeight" name="chgmHematologia" id="chgmHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Leucocitos (5-10 mil)</strong><br><input type="text" class="form-control menosHeight" name="leucocitosHematologia" id="leucocitosHematologia"></td>
                                                        <td class="menosPadding"><strong> Neutrofilos Segmentados (%)</strong><br><input type="text" class="form-control menosHeight" name="neutrofHematologia" id="neutrofHematologia"></td>
                                                        <td class="menosPadding"><strong> Neutrofilos en Banda (%)</strong><br><input type="text" class="form-control menosHeight" name="neutrofBandHematologia" id="neutrofBandHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Linfocitos (%)</strong><br><input type="text" class="form-control menosHeight" name="linfocitosHematologia" id="linfocitosHematologia"></td>
                                                        <td class="menosPadding"><strong> Eosinófilos (%)</strong><br><input type="text" class="form-control menosHeight" name="eosinofilosHematologia" id="eosinofilosHematologia"></td>
                                                        <td class="menosPadding"><strong> Monocitos (%)</strong><br><input type="text" class="form-control menosHeight" name="monocitosHematologia" id="monocitosHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Basófilos (%)</strong><br><input type="text" class="form-control menosHeight" name="basofilosHematologia" id="basofilosHematologia"></td>
                                                        <td class="menosPadding"><strong> Blastos (%)</strong><br><input type="text" class="form-control menosHeight" name="blastosHematologia" id="blastosHematologia"></td>
                                                        <td class="menosPadding"><strong> Reticulocitos (0.5-2.0 gr%)</strong><br><input type="text" class="form-control menosHeight" name="reticulocitosHematologia" id="reticulocitosHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Eritrosedimentación (0-20 mm/hr)</strong><br><input type="text" class="form-control menosHeight" name="eritrosedHematologia" id="eritrosedHematologia"></td>
                                                        <td class="menosPadding"><strong> Plaquetas xmmc </strong><br><input type="text" class="form-control menosHeight" name="plaquetasHematologia" id="plaquetasHematologia"><span class="text-primary" style="font-size: 12px;">Valor normal 150,000-450,000</span></td>
                                                        <td class="menosPadding"><strong> Gota gruesa </strong><br><input type="text" class="form-control menosHeight" name="gotaGruesaHematologia" id="gotaGruesaHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-center text-primary" colspan="3"><strong> FROTIS DE SANGRE PERIFERICA </strong></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-primary" colspan="3"><strong> Linea Roja </strong><br><input type="text" class="form-control menosHeight" name="rojaHematologia" id="rojaHematologia"></td>
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-primary" colspan="3"><strong> Linea Blanca </strong><br><input type="text" class="form-control menosHeight" name="blancaHematologia" id="blancaHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-primary" colspan="3"><strong> Linea Plaquetaria </strong><br><input type="text" class="form-control menosHeight" name="plaquetariaHematologia" id="plaquetariaHematologia"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesHematologia" id="observacionesHematologia" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <input type="hidden" name="edadPaciente" value="<?php echo $paciente->edadPaciente; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen Hematologia-->

    <!-- Modal para examen Orina-->
        <div class="modal fade" id="orina" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Examen de orina </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmOrina" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_orina" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr class="text-center alert-primary">
                                                        <td colspan="4">EXAMEN FISICO QUIMICO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="menosPadding"><strong> Color </strong><br><input type="text" class="form-control menosHeight" name="colorOrina" id="colorOrina"></td>
                                                        <td class="menosPadding"><strong> Aspecto </strong><br><input type="text" class="form-control menosHeight" name="aspectoOrina" id="aspectoOrina"></td>
                                                        <td class="menosPadding"><strong> Reacción </strong><br><input type="text" class="form-control menosHeight" name="reaccionOrina" id="reaccionOrina"></td>
                                                        <td class="menosPadding"><strong> Densidad </strong><br><input type="text" class="form-control menosHeight" name="densidadOrina" id="densidadOrina"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> pH </strong><br><input type="text" class="form-control menosHeight" name="phOrina" id="phOrina"></td>
                                                        <td class="menosPadding"><strong> Proteínas </strong><br><input value="NEGATIVO" type="text" class="form-control menosHeight" name="proteinasOrina" id="proteinasOrina"></td>
                                                        <td class="menosPadding"><strong> Glucosa </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="glucosaOrina" id="glucosaOrina"></td>
                                                        <td class="menosPadding"><strong> Pigmentos Biliares </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="pigBilaOrina" id="pigBilaOrina"></td>

                                                    </tr>
                                                    
                                                    <tr class="">
                                                        <td class="menosPadding"><strong> Sangre oculta </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="sangreOcultaOrina" id="sangreOcultaOrina"></td>
                                                        <td class="menosPadding"><strong> Nitrito </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="nitritoOrina" id="nitritoOrina"></td>
                                                        <td class="menosPadding"><strong> Cuerpos cetónicos </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="cuerposCetonicosOrina" id="cuerposCetonicosOrina"></td>
                                                        <td class="menosPadding"><strong> Acidos biliares </strong><br><input type="text" class="form-control menosHeight" name="acidosBilOrina" id="acidosBilOrina"></td>
                                                    </tr>

                                                    <tr class="text-center alert-primary">
                                                        <td colspan="4">EXAMEN MICROSCOPICO</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Granulosos </strong><br><input type="text" class="form-control menosHeight" name="granulososOrina" id="granulososOrina"></td>
                                                        <td class="menosPadding"><strong> Cilindros leucocitarios </strong><br><input type="text" class="form-control menosHeight" name="cilindrosLeuOrina" id="cilindrosLeuOrina"></td>
                                                        <td class="menosPadding"><strong> Cilindros hialinos </strong><br><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="cilindrosOrina" id="cilindrosOrina"></td>
                                                        <td class="menosPadding"><strong> Otros cilindros </strong><br><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="oCilindrosOrina" id="oCilindrosOrina"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> Leucocitos </strong><br><input type="text" class="form-control menosHeight" name="leucocitosOrina" id="leucocitosOrina"></td>
                                                        <td class="menosPadding"><strong> Hematíes </strong><br><input type="text" class="form-control menosHeight" name="hematiesOrina" id="hematiesOrina"></td>
                                                        <td class="menosPadding"><strong> Células Epiteliales </strong><br><input type="text" class="form-control menosHeight" name="celulasEpitelialesOrina" id="celulasEpitelialesOrina"></td>
                                                        <td class="menosPadding"><strong> Elementos minerales </strong><br><input type="text" class="form-control menosHeight" name="elemMineralesOrina" id="elemMineralesOrina"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> Bacterias </strong><br><input type="text" class="form-control menosHeight" name="bacteriasOrina" id="bacteriasOrina"></td>
                                                        <td class="menosPadding"><strong> Levaduras  </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="levaduraOrina" id="levaduraOrina"></td>
                                                        <td class="menosPadding"><strong> Otros </strong><br><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="otrosOrina" id="otrosOrina"></td>
                                                        <td></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesOrina" id="observacionesOrina" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen Orina-->
    
    <!-- Modal para examen hisopado nasal-->
        <div class="modal fade" id="hisopadoNasal" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Hisopado nasal </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmHisopado" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_hisopado" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente14 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                            if($examen->idMedicamento == 958){
                                                                                echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                            }else{
                                                                                echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> Fecha </strong><br><input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control menosHeight" name="fechaCovid" id="fechaCovid"></td>
                                                        <td class="menosPadding"><strong> Hora </strong><br><input type="text" value="<?php echo date("h:i A"); ?>"  class="form-control menosHeight" name="horaCovid" id="horaCovid"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Pasaporte </strong><br><input type="text" class="form-control menosHeight" name="pasaporteCovid" id="pasaporteCovid"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Observaciones </strong><br><textarea name="nota" id="nota" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen hisopado nasal-->

    <!-- Modal para examen espermograma-->  
        <div class="modal fade" id="espermograma" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Examen de orina </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmOrina" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_esperma" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-grup">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente14 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                            if($examen->idMedicamento == 681){
                                                                                echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                            }else{
                                                                                echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Color </strong><br><input type="text" class="form-control menosHeight" name="colorExperma" id="colorExperma" required></td>
                                                        <td class="menosPadding"><strong> pH </strong><br><input type="text" class="form-control menosHeight" name="phEsperma" id="phEsperma"></td>
                                                        <td class="menosPadding"><strong> Volumen </strong><br><input type="text" class="form-control menosHeight" name="volumenEsperma" id="volumenEsperma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Licuefacción </strong><br><input type="text" class="form-control menosHeight" name="licuefaccionEsperma" id="licuefaccionEsperma"></td>
                                                        <td class="menosPadding"><strong> Viscosidad </strong><br><input type="text" class="form-control menosHeight" name="viscocidadEsperma" id="viscocidadEsperma"></td>
                                                        <td class="menosPadding"><strong> Días de abstinencia </strong><br><input type="text" class="form-control menosHeight" name="abstinenciaEsperma" id="abstinenciaEsperma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Hematíes </strong><br><input type="text" class="form-control menosHeight" name="hematiesEsperma" id="hematiesEsperma"></td>
                                                        <td class="menosPadding"><strong> Leucocitos </strong><br><input type="text" class="form-control menosHeight" name="leucocitosEsperma" id="leucocitosEsperma"></td>
                                                        <td class="menosPadding"><strong> Células Epiteliales </strong><br><input type="text" class="form-control menosHeight" name="epitelialesEsperma" id="epitelialesEsperma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Bacterias  </strong><br><input type="text" class="form-control menosHeight" name="bacteriasEsperma" id="bacteriasEsperma"></td>
                                                        <td class="menosPadding"><strong> Movilidad progresivamente rápida </strong><br><input type="text" class="form-control menosHeight" name="mprEsperma" id="mprEsperma"></td>
                                                        <td class="menosPadding"><strong> Movilidad progresivamente lenta </strong><br><input type="text" class="form-control menosHeight" name="mplEsperma" id="mplEsperma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Movilidad no progresiva </strong><br><input type="text" class="form-control menosHeight" name="mnpEsperma" id="mnpEsperma"></td>
                                                        <td class="menosPadding"><strong> Inmóviles </strong><br><input type="text" class="form-control menosHeight" name="inmovilesEsperma" id="inmovilesEsperma"></td>
                                                        <td class="menosPadding"><strong> Recuento  </strong><br><input type="text" class="form-control menosHeight" name="recuentoEsperma" id="recuentoEsperma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Normales </strong><br><input type="text" class="form-control menosHeight" name="normalesEsperma" id="normalesEsperma"></td>
                                                        <td class="menosPadding"><strong> Anormal cabeza </strong><br><input type="text" class="form-control menosHeight" name="anormalCbEsperma" id="anormalCbEsperma"></td>
                                                        <td class="menosPadding"><strong> Anormal cola  </strong><br><input type="text" class="form-control menosHeight" name="anormalClEsperma" id="anormalClEsperma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Vivos </strong><br><input type="text" class="form-control menosHeight" name="vivosEsperma" id="vivosEsperma"></td>
                                                        <td class="menosPadding"><strong> Muertos </strong><br><input type="text" class="form-control menosHeight" name="muertosEsperma" id="muertosEsperma"></td>
                                                    </tr>


                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesEsperma" id="observacionesEsperma" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen espermograma-->

    <!-- Modal para examen creatinina en orina de 24 horas-->  
        <div class="modal fade" id="examenCreatinina" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Examen de orina </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmOrina" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_creatinina" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="2">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-grup">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente15 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                            if($examen->idMedicamento == 677){
                                                                                echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                            }else{
                                                                                echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Sexo </strong><br>
                                                            <select id="sexoCreatinina" name="sexoCreatinina" class="form-control menosHeight valorNormal" required>
                                                                <option value="">.::Seleccionar::.</option>
                                                                <option value="M">Masculino</option>
                                                                <option value="F">Femenino</option>
                                                            </select>
                                                        </td>
                                                        <td class="menosPadding"><strong> Edad </strong><br><input type="text" value="<?php echo $paciente->edadPaciente; ?>" class="form-control menosHeight valorNormal" id="edadCreatinina" name="edadCreatinina" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Volumen </strong><br><input type="text" class="form-control menosHeight calculoCreatinina" name="volumenCreatinina" id="volumenCreatinina" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Tiempo </strong><br><input type="text" value="1440" class="form-control menosHeight calculoCreatinina" name="tiempoCreatinina" id="tiempoCreatinina" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Creatinina en sangre </strong><br><input type="text" class="form-control menosHeight calculoCreatinina" name="sangreCreatinina" id="sangreCreatinina" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Creatinina en orina </strong><br><input type="text" class="form-control menosHeight calculoCreatinina" name="orinaCreatinina" id="orinaCreatinina"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Depuración de Creatinina </strong><br><input type="text" class="form-control menosHeight" name="depuracionCreatinina" id="depuracionCreatinina" required><input type="text" class="menosHeight" name="valorNormalDepuracion" id="valorNormalDepuracion" placeholder="Valor normal" style="float: right;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Proteinas 24Hr </strong><br><input type="text" class="form-control menosHeight" name="proteinasCreatinina" id="proteinasCreatinina"></td>
                                                    </tr>


                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Observaciones </strong><br><textarea name="observacionesCreatinina" id="observacionesCreatinina" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen creatinina en orina de 24 horas-->

    <!-- Modal para examen gases arteriales-->
        <div class="modal fade" id="gasesArteriales" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Gases arteriales </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_gases_arteriales" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="2">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-grup">
                                                                <select name="examenSolicitado[]" id="" class="controlInteligente15 form-control" multiple="multiple" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                            if($examen->idMedicamento == 1079){
                                                                                echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                            }else{
                                                                                echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Muestra </strong><br><input type="text" value="" class="form-control menosHeight" name="muestraArteriales" id="muestraArteriales"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> PH <span class="text-primary">(Vn: 7.20-7.60)</span></strong><br><input type="text" class="form-control menosHeight" name="phArteriales" id="phArteriales"></td>
                                                        <td class="menosPadding"><strong> PCO2 <span class="text-primary">(Vn: 30.0 - 50.0 mmHg)</span></strong><br><input type="text" class="form-control menosHeight" name="pco2Arteriales" id="pco2Arteriales"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> PO2 <span class="text-primary">(Vn: 80.0 - 100.0 mmHf)</span></strong><br><input type="text" class="form-control menosHeight" name="po2Arteriales" id="po2Arteriales"></td>
                                                        <td class="menosPadding"><strong> NA+ <span class="text-primary">(Vn: 135.0 - 145.0 mmol/L)</span></strong><br><input type="text" class="form-control menosHeight" name="naArteriales" id="naArteriales"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> K+ <span class="text-primary">(Vn: 3.5 - 5.10 mmol/L)</span> </strong><br><input type="text" class="form-control menosHeight" name="kArteriales" id="kArteriales"></td>
                                                        <td class="menosPadding"><strong> Ca++ <span class="text-primary">(Vn: 1.13 - 1.32 mmol/L)</span> </strong><br><input type="text" class="form-control menosHeight" name="caArteriales" id="caArteriales"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> tHb <span class="text-primary">(Vn: 12.0 - 17.0 gr/dl)</span> </strong><br><input type="text" class="form-control menosHeight" name="thbArteriales" id="thbArteriales"></td>
                                                        <td class="menosPadding"><strong> So2 <span class="text-primary">(Vn: 90 - 100 %)</span> </strong><br><input type="text" class="form-control menosHeight" name="soArteriales" id="soArteriales"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> FIO2 </strong><br><input type="text" class="form-control menosHeight" name="fio2Arteriales" id="fio2Arteriales"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit" id="tLibre"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen gases arteriales-->

    <!-- Modal para examen tolerancia glucosa-->
        <div class="modal fade" id="toleranciaGlucosa" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de Tolerancia a la Glucosa</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="-3">
                                        <form class="needs-validation frmData" id="frmToleranciaGlucosa" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_tolerancia_glucosa" target="_blank" novalidate>
                                            <table class="table table-borderless">
                                                <tr style="display: none;">
                                                    <td colspan="3">
                                                        <strong>Exámenes solicitados</strong>
                                                        <select name="examenSolicitado[]" id="" class="form-control"required="">
                                                            <option value="">:: Seleccionar ::</option>
                                                            <?php
                                                                foreach ($examenes as $examen) {
                                                                    if($examen->idMedicamento == 662){
                                                                        echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                    }else{
                                                                        echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                        <div class="invalid-tooltip">
                                                            Seleccione un tipo de examen.
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-borderless">
                                                        <thead></thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>PRIMERA MUESTRA GLUCOSA EN AYUNAS</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado1" id="resultado1" placeholder="Valor normal: 60 - 110 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" value="<?php echo $tercera; ?>" class="pivoteText antigenosFebriles form-control menosHeight" name="hora1" id="hora1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>1h POST CARGA <input type="text" value="75" size="5" name="parametroCarga" class="menosHeight">  DE DEXTROSA</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado2" id="resultado2" placeholder="Valor normal: Menor de 200 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" value="<?php echo $segunda; ?>" class="pivoteText antigenosFebriles form-control menosHeight" name="hora2" id="hora2"></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>2h POST CARGA</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado3" id="resultado3" placeholder="Valor normal: Menor de 140 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" value="<?php echo $primera; ?>" class="pivoteText antigenosFebriles form-control menosHeight" name="hora3" id="hora3"></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>3h POST CARGA</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado4" id="resultado4" placeholder="Valor normal: 70 - 115 mg/dl"></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" value="<?php echo $hora; ?>" class="pivoteText antigenosFebriles form-control menosHeight" name="hora4" id="hora4"></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding" colspan="2"><strong> Observaciones </strong><br><textarea name="observacionesTG" id="observacionesTG" class="form-control menosHeight disableSelect"></textarea></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen inmunologia glucosa-->

    <!-- Modal para examen Toxoplasma-->
        <div class="modal fade" id="toxoplasma" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de tipeo sanguineo</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/guardar_toxoplasma" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="3">
                                                            <input type="text" name="examenSolicitado[]" value="1087" >
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Toxoplasma IgG</strong><br><input type="text" class="form-control menosHeight" name="iggToxoplasma" id="iggToxoplasma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Toxoplasma IgM </strong><br><input type="text" class="form-control menosHeight" name="igmToxoplasma" id="igmToxoplasma"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesToxoplasma" id="observacionesToxoplasma" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>
 
                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen Toxoplasma-->

<!-- Fin modales para insertar -->

<!-- Modales para actualizar -->
    <!-- Modal para actualizar examen inmunologia-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="inmunologiaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de inmunologia</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="-3">
                                        <form class="needs-validation" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_inmunologia" novalidate>
                                            <table class="table table-borderless">
                                                <tr style="display: none;">
                                                    <td colspan="3">
                                                        <strong>Exámenes solicitados</strong>
                                                        <select name="examenSolicitado" id="inmunologiaSolicitadoA" class="controlInteligenteU" required>
                                                            <option value="">:: Seleccionar ::</option>
                                                            <?php
                                                                foreach ($examenes as $examen) {
                                                            ?>
                                                                <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="invalid-tooltip">
                                                            Seleccione un tipo de examen.
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table table-borderless">
                                                        <thead></thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Tífico O</strong></td>
                                                                <td colspan="2"><input type="text" class="pivoteText" name="tificoO" id="tificoOA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong>Tífico H</strong></td>
                                                                <td colspan="2"><input type="text" class="pivoteText" name="tificoH" id="tificoHA"></td>
                                                                            
                                                            </tr>

                                                            <tr>
                                                                <td><strong> Paratífico A</strong></td>
                                                                <td colspan="2"><input type="text" class="pivoteText" name="paratificoA" id="paratificoAA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong> Paratífico B</strong></td>
                                                                <td><input type="text" class="pivoteText" name="paratificoB" id="paratificoBA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong> Brucella Abortus</strong></td>
                                                                <td><input type="text" class="pivoteText" name="brucellaAbortus" id="brucellaAbortusA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong> Proteus OX-19</strong></td>
                                                                <td><input type="text" class="pivoteText" name="proteusOx" id="proteusOxA"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table-borderless">
                                                        <thead></thead>
                                                        <tbody>

                                                            <tr>
                                                                <td><strong> Proteína "C" reactiva</strong><p class="text-primary">VN: Hasta 6mg/L</p></td>
                                                                <td><input type="text" class="pivoteText" name="proteinaC" id="proteinaCA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong> Fac. Reumatoideo</strong> <p class="text-primary">Valor normal: < 8UI/mL</p></td>
                                                                <td><input type="text" class="pivoteText" name="reumatoideo" id="reumatoideoA"></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong> Antiestreptolisina "O"</strong> <p class="text-primary">Valor normal: Hasta 200 UI/mL</p></td>
                                                                <td><input type="text" class="pivoteText" name="antiestreptolisina" id="antiestreptolisinaA"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                </div>
                                            <div class="text-center">
                                                <input type="hidden" name="idInmunologia" id="idInmunologia">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaI">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para actualizar examen inmunologia-->

    <!-- Modal para eliminar consulta-->
        <div class="modal fade p-5" id="eliminarExamen" tabindex="-1" role="dialog" aria-labelledby="modal-5">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content pb-5">

                    <div class="modal-header bg-danger">
                        <h3 class="modal-title has-icon text-white"><i class="flaticon-alert-1"></i> Advertencia</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
                                class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body text-center">
                        <p class="h5">¿Estas seguro de eliminar este examen?</p>
                    </div>

                    <form class="needs-validation" action="<?php echo base_url()?>Laboratorio/eliminar_examen" method="post">
                        
                        <input type="hidden" name="idExamen" id="idExamen">
                        <input type="hidden" name="tipoExamen" id="tipoExamen">
                        <input type="hidden" name="idDetalleConsuta" id="idDC">
                        <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                    
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger shadow-none"><i class="fa fa-trash-alt"></i> Eliminar </button>
                            <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    <!-- Fin Modal eliminar consulta-->

    <!-- Modal para examen bacteriologia-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="bacteriologiaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de bacteriología</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_bacteriologia" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="3">
                                                            <strong>Exámenes solicitados</strong><br>
                                                            <div class="input-group">
                                                                <select name="bacteriologiaSolicitado" id="bacteriologiaSolicitadoA" class=" form-control controlInteligenteU2" required="">
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                        <strong>Resultado de directo</strong><br>
                                                            <input type="text" size="92" name="resultadoDirecto" id="resultadoDirectoA" class="form-control menosHeight">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                        <strong>Procedencia de la muestra</strong><br>
                                                            <input type="text" size="92" name="procedenciaDirecto" id="procedenciaDirectoA" class="form-control menosHeight">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3">
                                                        <strong>Resultado de cultivo</strong><br>
                                                            <input type="text" size="92" name="resultadoCultivo" id="resultadoCultivoA" class="form-control menosHeight">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Cefixime</strong><br><input type="text" class="form-control menosHeight" name="cefixime" id="cefiximeA"></td>
                                                        <td class="menosPadding"><strong> Amikacina</strong><br><input type="text" class="form-control menosHeight" name="amikacina" id="amikacinaA"></td>
                                                        <td class="menosPadding"><strong> Levofloxacina</strong><br><input type="text" class="form-control menosHeight" name="levofloxacina" id="levofloxacinaA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Ceftriaxona </strong><br><input type="text" class="form-control menosHeight" name="ceftriaxona" id="ceftriaxonaA"></td>
                                                        <td class="menosPadding"><strong> Azitromicina </strong><br><input type="text" class="form-control menosHeight" name="azitromicina" id="azitromicinaA"></td>
                                                        <td class="menosPadding"><strong> Imipenem </strong><br><input type="text" class="form-control menosHeight" name="imipenem" id="imipenemA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Meropemen </strong><br><input type="text" class="form-control menosHeight" name="meropenem" id="meropenemA"></td>
                                                        <td class="menosPadding"><strong> Fosfocil </strong><br><input type="text" class="form-control menosHeight" name="fosfocil" id="fosfocilA"></td>
                                                        <td class="menosPadding"><strong> Imipenem </strong><br><input type="text" class="form-control menosHeight" name="ciprofloxacina" id="ciprofloxacinaA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Penicilina </strong><br><input type="text" class="form-control menosHeight" name="penicilina" id="penicilinaA"></td>
                                                        <td class="menosPadding"><strong> Vancomicina </strong><br><input type="text" class="form-control menosHeight" name="vancomicina" id="vancomicinaA"></td>
                                                        <td class="menosPadding"><strong> Ácido nalidíxico </strong><br><input type="text" class="form-control menosHeight" name="acidoNalidixico" id="acidoNalidixicoA"></td>
                                                    </tr>

                                                    <tr>
                                                        
                                                        <td class="menosPadding"><strong> Gentamicina </strong><br><input type="text" class="form-control menosHeight" name="gentamicina" id="gentamicinaA"></td>
                                                        <td class="menosPadding"><strong> Nitrofurantoina </strong><br><input type="text" class="form-control menosHeight" name="nitrofurantoina" id="nitrofurantoinaA"></td>
                                                        <td class="menosPadding"><strong> Ceftazidime </strong><br><input type="text" class="form-control menosHeight" name="ceftazimide" id="ceftazimideA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Cefotaxime </strong><br><input type="text" class="form-control menosHeight" name="cefotaxime" id="cefotaximeA"></td>
                                                        <td class="menosPadding"><strong> Clindamicina </strong><br><input type="text" class="form-control menosHeight" name="clindamicina" id="clindamicinaA"></td>
                                                        <td class="menosPadding"><strong> Trimetropim sulfa </strong><br><input type="text" class="form-control menosHeight" name="trimetropimSulfa" id="trimetropimSulfaA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Ampicilina/Sulbactam </strong><br><input type="text" class="form-control menosHeight" name="ampicilina" id="ampicilinaA"></td>
                                                        <td class="menosPadding"><strong> Piperacilina/Tazobactam </strong><br><input type="text" class="form-control menosHeight" name="piperacilina" id="piperacilinaA"></td>
                                                        <td class="menosPadding"><strong> Amoxicilina ácido clavulánico</strong><br><input type="text" class="form-control menosHeight" name="amoxicilina" id="amoxicilinaA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Claritromicina </strong><br><input type="text" class="form-control menosHeight" name="claritromicina" id="claritromicinaA"></td>
                                                        <td class="menosPadding"></td>
                                                        <td class="menosPadding"><strong> Cefuroxime </strong><br><input type="text" class="form-control menosHeight" name="cefuroxime" id="cefuroximeA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="3"><strong> Observación </strong><br><textarea  class="form-control menosHeight" name="observacion" id="observacionBacteriologiaA" cols="96"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idBacteriologia" id="idBacteriologia">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaB">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para examen bacteriologia-->

    <!-- Modal para examen Tiempo de coagulación-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="coagulacionActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de coagulación</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_coagulacion" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding"><strong> Tiempo de protombina</strong><br><input type="text" class="form-control menosHeight" name="tiempoProtombina" id="tiempoProtombinaA"><p class="text-primary" style="font-size:12px">Valor normal: 10-14 segundos</p></td>
                                                        <td class="menosPadding"><strong> Tiempo parcial de tromboplastina</strong><br><input type="text" class="form-control menosHeight" name="tiempoTromboplastina" id="tiempoTromboplastinaA"><p class="text-primary" style="font-size:12px">Valor normal: 20-33 segundos</p></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Fibrinógeno </strong><br><input type="text" class="form-control menosHeight" name="fibrinogeno" id="fibrinogenoA"><p class="text-primary" style="font-size:12px">Valor normal: 200-400 mg/dl </p></td>
                                                        <td class="menosPadding"><strong> INR </strong><br><input type="text" class="form-control menosHeight" name="inr" id="inrA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Tiempo de sangramiento </strong><br><input type="text" class="form-control menosHeight" name="tiempoSangramiento" id="tiempoSangramientoA"><p class="text-primary" style="font-size:12px">Valor normal: 1-4 minutos</p></td>
                                                        <td class="menosPadding"><strong> Tiempo de coagulación </strong><br><input type="text" class="form-control menosHeight" name="tiempoCoagulacion" id="tiempoCoagulacionA"><p class="text-primary" style="font-size:12px">Valor normal: 4-9 minutos</p></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Observación </strong><br><textarea  class="form-control menosHeight" name="observacion" id="observacionCoagulacionA" cols="96"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idCoagulacion" id="idCoagulacion">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaC">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para examen Tiempo de coagulación-->

    <!-- Modal para examen Tipeo sanguineo-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="sanguineoActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de tipeo sanguineo</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_sanguineo" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra</strong><br><input type="text" class="form-control menosHeight" name="muestraSanguineo" id="muestraSanguineoA"></td>
                                                        <td class="menosPadding"><strong> Grupo sanguíneo</strong><br><input type="text" class="form-control menosHeight" name="grupoSanguineo" id="grupoSanguineoA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Factor RH </strong><br><input type="text" class="form-control menosHeight" name="factorSanguineo" id="factorSanguineoA"></td>
                                                        <td class="menosPadding"><strong> DU </strong><br><input type="text" class="form-control menosHeight" name="duSanguineo" id="duSanguineoA"></td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idSanguineo" id="idSanguineo">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaS">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para examen Tipeo sanguineo-->

    <!-- Modal para examen sanguinea-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="quimicaSanguineaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Química Sanguinea</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmQuimicaCLinica" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_quimica_sanguinea" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr style="display: none;">
                                                    <tr>
                                                        <td class="menosPadding"><strong> Glucosa (55-110 mg/dl)</strong><br><input type="text" name="glucosa" class="form-control menosHeight" id="glucosaActualizar"></td>
                                                        <td class="menosPadding"><strong> Glucosa P. (140 mg/dl)</strong><br><input type="text" name="posprandial" class="form-control menosHeight" id="posprandialActualizar"></td>
                                                        <td class="menosPadding"><strong> Colesterol ( < de 200 mg/dl)</strong><br><input type="text" name="colesterol" class="form-control menosHeight" id="colesterolActualizar"></td>
                                                        <td class="menosPadding"><strong> Triglicéridos ( < de 150 mg/dl)</strong><br><input type="text" name="trigliceridos" class="form-control menosHeight" id="trigliceridosActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Colesterol HDL (35-65 mg/dl) </strong><br><input type="text" name="colesterolHDL" class="form-control menosHeight" id="colesterolHDLActualizar"></td>
                                                        <td class="menosPadding"><strong> Colesterol LDL ( < 150 mg/dl)</strong><br><input type="text" name="colesterolLDL" class="form-control menosHeight" id="colesterolLDLActualizar"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Ácido úrico (2.5-7.0 mg/dl) </strong><br><input type="text" name="acidoUrico" class="form-control menosHeight" id="acidoUricoActualizar" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Urea ( 10.0 a 48.1 mg/dl)</strong><br><input type="text" name="urea" class="form-control menosHeight" id="ureaActualizar"></td>
                                                        <td class="menosPadding"><strong> Nitrógeno ureico ( 4.7-22.5 mg/dl)</strong><br><input type="text" name="nitrogenoUreico" class="form-control menosHeight" id="nitrogenoUreicoActualizar"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Creatinina ( 0.7-1.4 mg/dl)</strong><br><input type="text" name="creatinina" class="form-control menosHeight" id="creatininaActualizar" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Amilasa ( VN: menor de 90 U/L)</strong><br><input type="text" name="amilasa" class="form-control menosHeight" id="amilasaActualizar"></td>
                                                        <td class="menosPadding"><strong> Lipasa ( VN: menor de 38 U/L)</strong><br><input type="text" name="lipasa" class="form-control menosHeight" id="lipasaActualizar"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Fosfatasa alcalina ( 98-279 U/L)</strong><br><input type="text" name="fosfatasaAlcalina" class="form-control menosHeight" id="fosfatasaAlcalinaActualizar" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TGP ( VN: 1-40 U/L)</strong><br><input type="text" name="tgp" class="form-control menosHeight" id="tgpActualizar"></td>
                                                        <td class="menosPadding"><strong> TGO ( VN: 1-38 U/L)</strong><br><input type="text" name="tgo" class="form-control menosHeight" id="tgoActualizar"></td>
                                                        <td colspan="2" class="menosPadding"><strong> HBA1C ( VN: 4.5-6.5% )</strong><br><input type="text" name="hba1c" class="form-control menosHeight" id="hba1cActualizar" size="47"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Proteina total (VN: 6.7-8.7 g/dL)</strong><br><input type="text" name="proteinaTotal" class="form-control menosHeight" id="proteinaTotalActualizar"></td>
                                                        <td class="menosPadding"><strong> Albúmina (VN: 3.5-5.0 g/dL)</strong><br><input type="text" name="albumina" class="form-control menosHeight" id="albuminaActualizar"></td>
                                                        <td class="menosPadding"><strong> Globulina (VN: 2.3-3.4 g/dL) </strong><br><input type="text" name="globulina" class="form-control menosHeight" id="globulinaActualizar"></td>
                                                        <td class="menosPadding"><strong> Relación A/G: 1.2 a 2.2 </strong><br><input type="text" name="relacionAG" class="form-control menosHeight" id="relacionAGActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Bili. Total (VN: hasta 1.1 mg/dl)</strong><br><input type="text" name="biliTotal" class="form-control menosHeight" id="biliTotalActualizar"></td>
                                                        <td class="menosPadding"><strong> Bili. directa (VN: hasta 0.25 mg/dl)</strong><br><input type="text" name="biliDirecta" class="form-control menosHeight" id="biliDirectaActualizar"></td>
                                                        <td colspan="2" class="menosPadding"><strong> Bilirrubina indirecta </strong><br><input type="text" name="biliIndirecta" class="form-control menosHeight" id="biliIndirectaActualizar" size="47"></td>
                                                    </tr>

                                                    <!-- Inicio -->
                                                        <tr>
                                                            <td class="menosPadding"><strong> Sodio (135-155 mmol/L)</strong><br><input type="text" class="form-control menosHeight" name="sodioQuimicaClinica" id="sodioQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding" colspan="2"><strong> Potasio (3.6-5.5 mmol/L)</strong><br><input type="text" class="form-control menosHeight" name="potasioQuimicaClinica" id="potasioQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding"><strong> Cloro (95-115 mmol/L)</strong><br><input type="text" class="form-control menosHeight" name="cloroQuimicaClinica" id="cloroQuimicaClinicaActualizar"></td>
                                                        </tr>

                                                        <tr>
                                                            <td class="menosPadding"><strong> Magnesio (1.6-2.5 mg/dl) </strong><br><input type="text" class="form-control menosHeight" name="magnesioQuimicaClinica" id="magnesioQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding" colspan="2"><strong> Calcio (8.1-10.4 mg/dl) </strong><br><input type="text" class="form-control menosHeight" name="calcioQuimicaClinica" id="calcioQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding"><strong> Fosforo (Vn: 2.5-5.0 mg/dl) </strong><br><input type="text" class="form-control menosHeight" name="fosforoQuimicaClinica" id="fosforoQuimicaClinicaActualizar"></td>
                                                        </tr>

                                                        <tr>
                                                            <td class="menosPadding"><strong> CPK Total (0-195 U/L) </strong><br><input type="text" class="form-control menosHeight" name="cpkTQuimicaClinica" id="cpkTQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding"><strong> CPK MB (menor a 24U/L) </strong><br><input type="text" class="form-control menosHeight" name="cpkMbQuimicaClinica" id="cpkMbQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding"><strong> LDH (230-460 U/L) </strong><br><input type="text" class="form-control menosHeight" name="ldhQuimicaClinica" id="ldhQuimicaClinicaActualizar"></td>
                                                            <td class="menosPadding"><strong> Troponina I (VN: menor a 0.30 ng/ml) </strong><br><input type="text" class="form-control menosHeight" name="troponinaQuimicaClinica" id="troponinaQuimicaClinicaActualizar"></td>
                                                        </tr>
                                                    <!-- Fin -->

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Comentarios </strong><br><textarea name="nota" class="form-control menosHeight" id="notaActualizar" cols="96"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idQuimicaSanguinea" id="idQuimicaSanguinea">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaQS">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para examen sanguinea-->

    <!-- Modal para examen cropologia-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="cropologiaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Coprologia </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">
                                        <form class="needs-validation" id="frmCropologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_cropologia" novalidate>
                                            <div class="row" style="margin-top: 0px;">
                                                <div class="col-md-12">
                                                </div>
                                                <div class="col-md-4" class="border" style="margin-top: -20px;">
                                                    <table>
                                                        <thead></thead>
                                                        <tbody class="text-left">

                                                            <tr>
                                                                <td class="menosPadding"><strong> Color </strong><br><input type="text" class="form-control menosHeight" name="colorCropologia" id="colorActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Consistencia </strong><br><input type="text" class="form-control menosHeight" name="consistenciaCropologia" id="consistenciaCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Mucus  </strong><br><input type="text" class="form-control menosHeight" name="mucusCropologia" id="mucusCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Hematíes </strong><br><input type="text" class="form-control menosHeight" name="hematiesCropologia" id="hematiesCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Leucocitos </strong><br><input type="text" class="form-control menosHeight" name="leucocitosCropologia" id="leucocitosCropologiaActualizar"></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td colspan="4" class="divider text-center text-primary font-weight-bold">METAZOARIOS</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Ascaris </strong><br><input type="text" class="form-control menosHeight" name="ascarisCropologia" id="ascarisCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Hymenolepis </strong><br><input type="text" class="form-control menosHeight" name="hymenolepisCropologia" id="hymenolepisCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Uncinarias  </strong><br><input type="text" class="form-control menosHeight" name="uncinariasCropologia" id="uncinariasCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Tricocéfalos </strong><br><input type="text" class="form-control menosHeight" name="tricocefalosCropologia" id="tricocefalosCropologiaActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong> Larva strongyloides </strong><br><input type="text" class="form-control menosHeight" name="larvaStrongyloides" id="larvaStrongyloidesActualizar"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-md-8" class="border" style="margin-top: -20px;">
                                                    <table class="table table-borderless">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <td></td>
                                                                <th colspan="2" class="text-primary"><strong>PROTOZOARIOS</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-left">
                                                            <tr class="text-center">
                                                                <td></td>
                                                                <td>Quistes</td>
                                                                <td>Trofozoitos</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Entamoeba histolytica</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="histolyticaQuistes" id="histolyticaQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="histolyticaTrofozoitos" id="histolyticaTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Entamoeba coli</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="coliQuistes" id="coliQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="coliTrofozoitos" id="coliTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Giardia lamblia</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="giardiaQuistes" id="giardiaQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="giardiaTrofozoitos" id="giardiaTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Blastocystis hominis</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="blastocystisQuistes" id="blastocystisQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="blastocystisTrofozoitos" id="blastocystisTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Tricomonas hominis</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="tricomonasQuistes" id="tricomonasQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name=" tricomonasTrofozoitos" id="tricomonasTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Chilomastix mesnilli</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="mesnilliQuistes" id="mesnilliQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="mesnilliTrofozoitos" id="mesnilliTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Endolimax nana</td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="nanaQuistes" id="nanaQuistesActualizar"></td>
                                                                <td class="menosPadding"><input type="text" class="form-control menosHeight" name="nanaTrofozoitos" id="nanaTrofozoitosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center text-primary" colspan="3"><strong>RESTOS ALIMENTICIOS</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Restos macroscópicos</td>
                                                                <td class="menosPadding" colspan="2"><input type="text" class="form-control menosHeight" name="restosMacroscopicos" id="restosMacroscopicosActualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="textPeque">Restos microscópicos</td>
                                                                <td class="menosPadding" colspan="2"><input type="text" class="form-control menosHeight" name="restosMicroscopicos" id="restosMicroscopicosActualizar"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-md-12">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesCropologia" id="observacionesCropologiaActualizar" class="form-control menosHeight" ></textarea></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <input type="hidden" name="idCropologia" id="idCropologia">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaCr">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>               
    <!-- Modal para examen cropologia-->

    <!-- Modal para examen tiroideas libres-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="tiroideaLibreActualizar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Tiroidea libre</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_tiroidea_libre" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado" id="tiroideaLibreSolicitadoActualizar" class="controlInteligenteU8 form-control" required>
                                                                    <option value="">:: Seleccionar  ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div> 
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" class="form-control menosHeight" name="muestraTiroideaLibre" id="muestraTiroideaLibreActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T3 Libres <span class="text-primary">(Vn: 1.4-4.2 pg/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="t3TiroideaLibre" id="t3TiroideaLibreActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T4 Libres <span class="text-primary">(Vn: 0.80-2.0 ng/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="t4TiroideaLibre" id="t4TiroideaLibreActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TSH <span class="text-primary">(Vn: 0.3-3.0 uUI/ml)</span> </strong><br><input type="text" class="form-control menosHeight" name="tshTiroideaLibre" id="tshTiroideaLibreActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TSH Ultrasensible<span class="text-primary">(Vn: 0.03-3.0 uUI/ml)</span> </strong><br><input type="text" class="form-control menosHeight" name="tshTiroideaLibreU" id="tshTiroideaLibreUActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionTiroideaLibre" id="observacionTiroideaLibreActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idTiroideaLibre" id="idTiroideaLibre">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaTL">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para examen tiroideas libres-->

    <!-- Modal para examen tiroideas totales-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="tiroideasTotalesActualizar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Tiroideas totales </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmTiroideaTotal" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_tiroideas_totales" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado" id="tiroideaTotalActualizar" class="controlInteligenteU9 form-control" required>
                                                                    <option value="">:: Seleccionar::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                                </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" class="form-control menosHeight" name="muestraTiroideaTotal" id="muestraTiroideaTotalActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T3 Total <span class="text-primary">(Vn: 0.5-5.0 ng/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="t3TiroideaTotal" id="t3TiroideaTotalActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> T4 Total <span class="text-primary">(Vn: 60.0-120.0 nmol/L)</span></strong><br><input type="text" class="form-control menosHeight" name="t4TiroideaTotal" id="t4TiroideaTotalActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> TSH <span class="text-primary">(Vn: 0.3-5.6 uUI/ml)</span> </strong><br><input type="text" class="form-control menosHeight" name="tshTiroideaTotal" id="tshTiroideaTotalActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionTiroideaTotal" id="observacionTiroideaTotalActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idTiroideaTotal" id="idTiroideaTotal">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaTT">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para examen tiroideas totales-->

    <!-- Modal para examen varios-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="variosActualizar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Varios </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        
                                        <form class="needs-validation" id="frmVarios" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_varios" novalidate>
                                            
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" class="form-control menosHeight" name="muestraVarios" id="muestraVariosActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Resultado </strong><br><input type="text" class="form-control menosHeight" name="resultadoVarios" id="resultadoActualizar"><input type="text" class="menosHeight" name="valorNormalVarios" id="valorNormalVariosActualizar" placeholder="Valor normal" style="float: right;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesVarios" id="observacionesVariosActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idVarios" id="idVarios">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaV">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para examen varios-->

    <!-- Modal para examen PSA Total-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="psaTotalActualizar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Antigeno prostatico especifico total (PSA TOTAL) </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmPSATotal" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_psa" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado" id="solicitadoAPActualizar" class="controlInteligenteU11 form-control" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                    ?>
                                                                        <option value="<?php echo $examen->idMedicamento; ?>"><?php echo $examen->nombreMedicamento; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Muestra </strong><br><input type="text" class="form-control menosHeight" name="muestraAntigenoProstatico" id="muestraAPActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Resultado <span class="text-primary">(Rango de referencia: Menor de 4.0 ng/ml)</span></strong><br><input type="text" class="form-control menosHeight" name="resultadoAntigenoProstatico" id="resultadoAPActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionAntigenoProstatico" id="observacionAPActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idAntigenoProstatico" id="idAntigenoProstatico">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaPSA">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen PSA Total-->

    <!-- Modal para examen Hematologia-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="hematologiaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Hematologia </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmHematologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_hematologia" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding"><strong> Eritrocitos (4-6 millones)</strong><br><input type="text" class="form-control menosHeight" name="eritrocitosHematologia" id="eritrocitosHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Hematócrito (36-50 %)</strong><br><input type="text" class="form-control menosHeight" name="hematocritoHematologia" id="hematocritoHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Hemoglobina (12-16.2 g/dl)</strong><br><input type="text" class="form-control menosHeight" name="hemoglobinaHematologia" id="hemoglobinaHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> VCM (82-96fl)</strong><br><input type="text" class="form-control menosHeight" name="vgmHematologia" id="vgmHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> HCM (27-32 pg)</strong><br><input type="text" class="form-control menosHeight" name="hgmHematologia" id="hgmHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> CHCM (30-35 g/dl)</strong><br><input type="text" class="form-control menosHeight" name="chgmHematologia" id="chgmHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Leucocitos (5-10 mil)</strong><br><input type="text" class="form-control menosHeight" name="leucocitosHematologia" id="leucocitosHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Neutrofilos Segmentados (%)</strong><br><input type="text" class="form-control menosHeight" name="neutrofHematologia" id="neutrofHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Neutrofilos en Banda (%)</strong><br><input type="text" class="form-control menosHeight" name="neutrofBandHematologia" id="neutrofBandHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Linfocitos (%)</strong><br><input type="text" class="form-control menosHeight" name="linfocitosHematologia" id="linfocitosHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Eosinófilos (%)</strong><br><input type="text" class="form-control menosHeight" name="eosinofilosHematologia" id="eosinofilosHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Monocitos (%)</strong><br><input type="text" class="form-control menosHeight" name="monocitosHematologia" id="monocitosHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Basófilos (%)</strong><br><input type="text" class="form-control menosHeight" name="basofilosHematologia" id="basofilosHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Blastos (%)</strong><br><input type="text" class="form-control menosHeight" name="blastosHematologia" id="blastosHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Reticulocitos (0.5-2.0 gr%)</strong><br><input type="text" class="form-control menosHeight" name="reticulocitosHematologia" id="reticulocitosHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Eritrosedimentación (0-20 mm/hr)</strong><br><input type="text" class="form-control menosHeight" name="eritrosedHematologia" id="eritrosedHematologiaActualizar"></td>
                                                        <td class="menosPadding"><strong> Plaquetas xmmc </strong><br><input type="text" class="form-control menosHeight" name="plaquetasHematologia" id="plaquetasHematologiaActualizar"><span class="text-primary" style="font-size: 12px;">Valor normal 150,000-450,000</span></td>
                                                        <td class="menosPadding"><strong> Gota gruesa </strong><br><input type="text" class="form-control menosHeight" name="gotaGruesaHematologia" id="gotaGruesaHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-center text-primary" colspan="3"><strong> FROTIS DE SANGRE PERIFERICA </strong></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-primary" colspan="3"><strong> Linea Roja </strong><br><input type="text" class="form-control menosHeight" name="rojaHematologia" id="rojaHematologiaActualizar"></td>
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-primary" colspan="3"><strong> Linea Blanca </strong><br><input type="text" class="form-control menosHeight" name="blancaHematologia" id="blancaHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding text-primary" colspan="3"><strong> Linea Plaquetaria </strong><br><input type="text" class="form-control menosHeight" name="plaquetariaHematologia" id="plaquetariaHematologiaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesHematologia" id="observacionesHematologiaActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idHematologia" id="idHematologia">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaH">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <input type="hidden" name="edadPaciente" value="<?php echo $paciente->edadPaciente; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para examen Hematologia-->

    <!-- Modal para examen Orina-->
        <div class="modal fade" id="orinaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Examen de orina </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmOrina" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_orina" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    <tr class="text-center alert-primary">
                                                        <td colspan="4">EXAMEN FISICO QUIMICO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="menosPadding"><strong> Color </strong><br><input type="text" class="form-control menosHeight" name="colorOrina" id="colorOrinaU"></td>
                                                        <td class="menosPadding"><strong> Aspecto </strong><br><input type="text" class="form-control menosHeight" name="aspectoOrina" id="aspectoOrinaU"></td>
                                                        <td class="menosPadding"><strong> Reacción </strong><br><input type="text" class="form-control menosHeight" name="reaccionOrina" id="reaccionOrinaU"></td>
                                                        <td class="menosPadding"><strong> Densidad </strong><br><input type="text" class="form-control menosHeight" name="densidadOrina" id="densidadOrinaU"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> pH </strong><br><input type="text" class="form-control menosHeight" name="phOrina" id="phOrinaU"></td>
                                                        <td class="menosPadding"><strong> Proteínas </strong><br><input value="NEGATIVO" type="text" class="form-control menosHeight" name="proteinasOrina" id="proteinasOrinaU"></td>
                                                        <td class="menosPadding"><strong> Glucosa </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="glucosaOrina" id="glucosaOrinaU"></td>
                                                        <td class="menosPadding"><strong> Pigmentos Biliares </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="pigBilaOrina" id="pigBilaOrinaU"></td>

                                                    </tr>
                                                    
                                                    <tr class="">
                                                        <td class="menosPadding"><strong> Sangre oculta </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="sangreOcultaOrina" id="sangreOcultaOrinaU"></td>
                                                        <td class="menosPadding"><strong> Nitrito </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="nitritoOrina" id="nitritoOrinaU"></td>
                                                        <td class="menosPadding"><strong> Cuerpos cetónicos </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="cuerposCetonicosOrina" id="cuerposCetonicosOrinaU"></td>
                                                        <td class="menosPadding"><strong> Acidos biliares </strong><br><input type="text" class="form-control menosHeight" name="acidosBilOrina" id="acidosBilOrinaU"></td>
                                                    </tr>

                                                    <tr class="text-center alert-primary">
                                                        <td colspan="4">EXAMEN MICROSCOPICO</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Granulosos </strong><br><input type="text" class="form-control menosHeight" name="granulososOrina" id="granulososOrinaU"></td>
                                                        <td class="menosPadding"><strong> Cilindros leucocitarios </strong><br><input type="text" class="form-control menosHeight" name="cilindrosLeuOrina" id="cilindrosLeuOrinaU"></td>
                                                        <td class="menosPadding"><strong> Cilindros hialinos </strong><br><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="cilindrosOrina" id="cilindrosOrinaU"></td>
                                                        <td class="menosPadding"><strong> Otros cilindros </strong><br><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="oCilindrosOrina" id="oCilindrosOrinaU"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> Leucocitos </strong><br><input type="text" class="form-control menosHeight" name="leucocitosOrina" id="leucocitosOrinaU"></td>
                                                        <td class="menosPadding"><strong> Hematíes </strong><br><input type="text" class="form-control menosHeight" name="hematiesOrina" id="hematiesOrinaU"></td>
                                                        <td class="menosPadding"><strong> Células Epiteliales </strong><br><input type="text" class="form-control menosHeight" name="celulasEpitelialesOrina" id="celulasEpitelialesOrinaU"></td>
                                                        <td class="menosPadding"><strong> Elementos minerales </strong><br><input type="text" class="form-control menosHeight" name="elemMineralesOrina" id="elemMineralesOrinaU"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="menosPadding"><strong> Bacterias </strong><br><input type="text" class="form-control menosHeight" name="bacteriasOrina" id="bacteriasOrinaU"></td>
                                                        <td class="menosPadding"><strong> Levaduras  </strong><br><input type="text" value="NEGATIVO" class="form-control menosHeight" name="levaduraOrina" id="levaduraOrinaU"></td>
                                                        <td class="menosPadding"><strong> Otros </strong><br><input type="text" value="NO SE OBSERVAN" class="form-control menosHeight" name="otrosOrina" id="otrosOrinaU"></td>
                                                        <td></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesOrina" id="observacionesOrinaU" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idOrina" id="idOrina">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaO">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar</button>
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
        </div>
    <!-- Fin Modal para examen Orina-->

    <!-- Modal para examen hisopado nasal-->
        <div class="modal fade" data-backdrop="static" data-keyboard="false" id="hisopadoNasalActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Hisopado nasal </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmHisopado" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_hisopado" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <strong>Exámen realizado</strong><br>
                                                            <div class="input-group">
                                                                <select name="examenSolicitado" id="" class="controlInteligenteU14 form-control" required>
                                                                    <option value="">:: Seleccionar ::</option>
                                                                    <?php
                                                                        foreach ($examenes as $examen) {
                                                                            if($examen->idMedicamento == 958){
                                                                                echo '<option value="'.$examen->idMedicamento.'" selected>'.$examen->nombreMedicamento.'</option>';
                                                                            }else{
                                                                                echo '<option value="'.$examen->idMedicamento.'">'.$examen->nombreMedicamento.'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="invalid-tooltip">
                                                                    Seleccione un tipo de examen.
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Fecha </strong><br><input type="date" class="form-control menosHeight" name="fechaCovid" id="fechaCovidActualizar"></td>
                                                        <td class="menosPadding"><strong> Hora </strong><br><input type="text"  class="form-control menosHeight" name="horaCovid" id="horaCovidActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Pasaporte </strong><br><input type="text" class="form-control menosHeight" name="pasaporteCovid" id="pasaporteCovidActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Observaciones </strong><br><textarea name="observaciones" id="observacionesHisopadoActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idHisopadoNasal" id="idHisopadoNasal">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaHN">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para examen hisopado nasal-->

    <!-- Modal para examen espermograma-->
        <div class="modal fade" id="espermogramaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Examen de orina </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation" id="frmOrina" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_esperma" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">
                                                    
                                                    <tr style="display: none;">
                                                        <td class="menosPadding" colspan="4">
                                                            <input type="text" name="examenSolicitado" id="espermogramaSolicitadoActualizar">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Color </strong><br><input type="text" class="form-control menosHeight" name="colorExperma" id="colorExpermaActualizar"></td>
                                                        <td class="menosPadding"><strong> pH </strong><br><input type="text" class="form-control menosHeight" name="phEsperma" id="phEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Volumen </strong><br><input type="text" class="form-control menosHeight" name="volumenEsperma" id="volumenEspermaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Licuefacción </strong><br><input type="text" class="form-control menosHeight" name="licuefaccionEsperma" id="licuefaccionEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Viscosidad </strong><br><input type="text" class="form-control menosHeight" name="viscocidadEsperma" id="viscocidadEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Días de abstinencia </strong><br><input type="text" class="form-control menosHeight" name="abstinenciaEsperma" id="abstinenciaEspermaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Hematíes </strong><br><input type="text" class="form-control menosHeight" name="hematiesEsperma" id="hematiesEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Leucocitos </strong><br><input type="text" class="form-control menosHeight" name="leucocitosEsperma" id="leucocitosEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Células Epiteliales </strong><br><input type="text" class="form-control menosHeight" name="epitelialesEsperma" id="epitelialesEspermaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Bacterias  </strong><br><input type="text" class="form-control menosHeight" name="bacteriasEsperma" id="bacteriasEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Movilidad progresivamente rápida </strong><br><input type="text" class="form-control menosHeight" name="mprEsperma" id="mprEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Movilidad progresivamente lenta </strong><br><input type="text" class="form-control menosHeight" name="mplEsperma" id="mplEspermaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Movilidad no progresiva </strong><br><input type="text" class="form-control menosHeight" name="mnpEsperma" id="mnpEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Inmóviles </strong><br><input type="text" class="form-control menosHeight" name="inmovilesEsperma" id="inmovilesEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Recuento  </strong><br><input type="text" class="form-control menosHeight" name="recuentoEsperma" id="recuentoEspermaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Normales </strong><br><input type="text" class="form-control menosHeight" name="normalesEsperma" id="normalesEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Anormal cabeza </strong><br><input type="text" class="form-control menosHeight" name="anormalCbEsperma" id="anormalCbEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Anormal cola  </strong><br><input type="text" class="form-control menosHeight" name="anormalClEsperma" id="anormalClEspermaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Vivos </strong><br><input type="text" class="form-control menosHeight" name="vivosEsperma" id="vivosEspermaActualizar"></td>
                                                        <td class="menosPadding"><strong> Muertos </strong><br><input type="text" class="form-control menosHeight" name="muertosEsperma" id="muertosEspermaActualizar"></td>
                                                    </tr>


                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesEsperma" id="observacionesEspermaActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idEspermograma" id="idEspermograma">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaEsp">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para examen espermograma-->

    <!-- Modal para examen creatinina en orina de 24 horas-->  
        <div class="modal fade" id="examenCreatininaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Examen de orina </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmOrina" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_creatinina" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding"><strong> Sexo </strong><br>
                                                            <select id="sexoCreatininaActualizar" name="sexoCreatinina" class="form-control menosHeight valorNormal" required>
                                                                <option value="">.::Seleccionar::.</option>
                                                                <option value="M">Masculino</option>
                                                                <option value="F">Femenino</option>
                                                            </select>
                                                        </td>
                                                        <td class="menosPadding"><strong> Edad </strong><br><input type="text" value="<?php echo $paciente->edadPaciente; ?>" class="form-control menosHeight valorNormal" id="edadCreatininaActualizar" name="edadCreatinina" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Volumen </strong><br><input type="text" class="form-control menosHeight calculoCreatinina" name="volumenCreatinina" id="volumenCreatininaActualizar" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Tiempo </strong><br><input type="text" value="1440" class="form-control menosHeight calculoCreatinina" name="tiempoCreatinina" id="tiempoCreatininaActualizar" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Creatinina en sangre </strong><br><input type="text" class="form-control menosHeight calculoCreatinina" name="sangreCreatinina" id="sangreCreatininaActualizar" required></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Creatinina en orina </strong><br><input type="text" class="form-control menosHeight calculoCreatinina" name="orinaCreatinina" id="orinaCreatininaActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Depuración de Creatinina </strong><br><input type="text" class="form-control menosHeight" name="depuracionCreatinina" id="depuracionCreatininaActualizar" required><input type="text" class="menosHeight" name="valorNormalDepuracion" id="valorNormalDepuracionActualizar" placeholder="Valor normal" style="float: right;"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"  colspan="2"><strong> Proteinas 24Hr </strong><br><input type="text" class="form-control menosHeight" name="proteinasCreatinina" id="proteinasCreatininaActualizar"></td>
                                                    </tr>


                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Observaciones </strong><br><textarea name="observacionesCreatinina" id="observacionesCreatininaActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idCreatinina" id="idCreatinina">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaCrea">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen creatinina en orina de 24 horas-->

    <!-- Modal para actualizar examen gases arteriales-->
        <div class="modal fade" id="gasesArterialesActualizar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white"> Gases arteriales </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_gases_arteriales" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> Muestra </strong><br><input type="text" value="" class="form-control menosHeight" name="muestraArteriales" id="muestraArterialesActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> PH <span class="text-primary">(Vn: 7.20-7.60)</span></strong><br><input type="text" class="form-control menosHeight" name="phArteriales" id="phArterialesActualizar"></td>
                                                        <td class="menosPadding"><strong> PCO2 <span class="text-primary">(Vn: 30.0 - 50.0 mmHg)</span></strong><br><input type="text" class="form-control menosHeight" name="pco2Arteriales" id="pco2ArterialesActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> PO2 <span class="text-primary">(Vn: 80.0 - 100.0 mmHf)</span></strong><br><input type="text" class="form-control menosHeight" name="po2Arteriales" id="po2ArterialesActualizar"></td>
                                                        <td class="menosPadding"><strong> NA+ <span class="text-primary">(Vn: 135.0 - 145.0 mmol/L)</span></strong><br><input type="text" class="form-control menosHeight" name="naArteriales" id="naArterialesActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> K+ <span class="text-primary">(Vn: 3.5 - 5.10 mmol/L)</span> </strong><br><input type="text" class="form-control menosHeight" name="kArteriales" id="kArterialesActualizar"></td>
                                                        <td class="menosPadding"><strong> Ca++ <span class="text-primary">(Vn: 1.13 - 1.32 mmol/L)</span> </strong><br><input type="text" class="form-control menosHeight" name="caArteriales" id="caArterialesActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> tHb <span class="text-primary">(Vn: 12.0 - 17.0 gr/dl)</span> </strong><br><input type="text" class="form-control menosHeight" name="thbArteriales" id="thbArterialesActualizar"></td>
                                                        <td class="menosPadding"><strong> So2 <span class="text-primary">(Vn: 90 - 100 %)</span> </strong><br><input type="text" class="form-control menosHeight" name="soArteriales" id="soArterialesActualizar"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="2"><strong> FIO2 </strong><br><input type="text" class="form-control menosHeight" name="fio2Arteriales" id="fio2ArterialesActualizar"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idGasesArteriales" id="idGasesArteriales">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaArte">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit" id=""><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para actualizar examen gases arteriales-->

    <!-- Modal para actualizar examen tolerancia glucosa-->
        <div class="modal fade" id="toleranciaGlucosaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de Tolerancia a la Glucosa</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="-3">
                                        <form class="needs-validation frmData" id="frmToleranciaGlucosa" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_tolerancia_glucosa" novalidate>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-borderless">
                                                        <thead></thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>PRIMERA MUESTRA GLUCOSA EN AYUNAS</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado1" id="resultado1Actualizar" placeholder="Valor normal: 60 - 110 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="hora1" id="hora1Actualizar"></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>1h POST CARGA 75gr DE DEXTROSA</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado2" id="resultado2Actualizar" placeholder="Valor normal: Menor de 200 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="hora2" id="hora2Actualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>2h POST CARGA</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado3" id="resultado3Actualizar" placeholder="Valor normal: Menor de 140 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="hora3" id="hora3Actualizar"></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding text-center" colspan="2"><strong>3h POST CARGA</strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td class="menosPadding"><strong>Resultado</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="resultado4" id="resultado4Actualizar" placeholder="Valor normal: 70 - 115 mg/dl" required></td>
                                                                <td class="menosPadding"><strong>Hora</strong><br><input type="text" class="pivoteText antigenosFebriles form-control menosHeight" name="hora4" id="hora4Actualizar"></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="menosPadding" colspan="2"><strong> Observaciones </strong><br><textarea name="observacionesTG" id="observacionesTGActualizar" class="form-control menosHeight disableSelect"></textarea></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <input type="hidden" name="idToleranciaGlucosa" id="idToleranciaGlucosa">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaTole">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Actualizar examen</button>
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
        </div>
    <!-- Fin Modal para actualizar examen inmunologia glucosa-->

    <!-- Modal para examen Toxoplasma-->
        <div class="modal fade" id="toxoplasmaActualizar" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Examén de tipeo sanguineo</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div class="">

                                        <form class="needs-validation frmData" id="frmInmunologia" method="post" action="<?php echo base_url() ?>Laboratorio/actualizar_toxoplasma" novalidate>
                                            <table class="table table-borderless">
                                                <thead></thead>
                                                <tbody class="text-left">

                                                    <tr>
                                                        <td class="menosPadding"><strong> Toxoplasma IgG</strong><br><input type="text" class="form-control menosHeight" name="iggToxoplasma" id="iggToxoplasmaA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding"><strong> Toxoplasma IgM </strong><br><input type="text" class="form-control menosHeight" name="igmToxoplasma" id="igmToxoplasmaA"></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="menosPadding" colspan="4"><strong> Observaciones </strong><br><textarea name="observacionesToxoplasma" id="observacionesToxoplasmaA" class="form-control menosHeight disableSelect"></textarea></td>
                                                    </tr>
 
                                                </tbody>
                                            </table>
                                            <div class="text-center">
                                                <input type="hidden" name="idToxoplasma" id="idToxoplasma">
                                                <input type="hidden" name="idDetalleConsulta" id="idDetalleConsultaTox">
                                                <input type="hidden" name="consulta" value="<?php echo $consulta; ?>">
                                                <button class="btn btn-primary mt-4 d-inline w-20" type="submit"><i class="fa fa-save"></i> Guardar examen</button>
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
        </div>
    <!-- Fin Modal para examen Toxoplasma-->

<!-- Fin modales para actualizar -->

<!-- Modal para examen Toxoplasma-->
    <div class="modal fade" id="detalleTablaExamen" tabindex="-1" role="dialog" awhria-hidden="true">
            <div class="modal-dialog ms-modal-dialog-width">
                <div class="modal-content ms-modal-content-width">
                    <div class="modal-header  ms-modal-header-radius-0">
                        <h4 class="modal-title text-white">Resultados del examen <span id="htmlNombre" class="text-white"></span></h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true" class="text-white">&times;</span></button>
                    </div>

                    <div class="modal-body p-0 text-left">
                        <div class="col-xl-12 col-md-12">
                            <div class="ms-panel ms-panel-bshadow-none">
                                <div class="ms-panel-body">
                                    <div id="htmlDetalle">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<!-- Fin Modal para examen Toxoplasma-->

<script>
    $(document).ready(function() {
        // Obtener la última pestaña activa desde el almacenamiento local
        var ultimaPestana = localStorage.getItem('ultimaPestana');

        // Si hay una última pestaña activa, activarla
        if (ultimaPestana) {
            $('.nav-tabs a[href="' + ultimaPestana + '"]').tab('show');
        }

        // Guardar la pestaña activa al cambiar de pestaña
        $('.nav-tabs a').on('shown.bs.tab', function(event){
            var nuevaPestana = $(event.target).attr('href');
            localStorage.setItem('ultimaPestana', nuevaPestana);
        });
    });
</script>

<script>
    $(document).on("click", ".verHematologia", function(e){
        e.preventDefault();
        $("#nombreExamen").val( $(this).closest('tr').find('.examenSolicitado').val());
        $("#fechaExamen").val($(this).closest('tr').find('.fechaExamen').val());
        $("#globulosRojos").val($(this).closest('tr').find('.globulosRojos').val());
        $("#eritrosedimentacion").val($(this).closest('tr').find('.eritrosedimentacion').val());
        $("#globulosBlancos").val($(this).closest('tr').find('.globulosBlancos').val());
        $("#reticulositos").val($(this).closest('tr').find('.reticulositos').val());
        $("#hematocrito").val($(this).closest('tr').find('.hematocrito').val());
        $("#tpTrombolastina").val($(this).closest('tr').find('.tpTrombolastina').val());
        $("#hemoglobina").val($(this).closest('tr').find('.hemoglobina').val());
        $("#tSangramiento").val($(this).closest('tr').find('.tSangramiento').val());
        $("#vlGMedio").val($(this).closest('tr').find('.vlGMedio').val());
        $("#tCoagulacion").val($(this).closest('tr').find('.tCoagulacion').val());
        $("#hbGMedia").val($(this).closest('tr').find('.hbGMedia').val());
        $("#tProtombina").val($(this).closest('tr').find('.tProtombina').val());
        $("#concHbGlobMed").val($(this).closest('tr').find('.concHbGlobMed').val());
        $("#neutrofilos").val($(this).closest('tr').find('.neutrofilos').val());
        $("#linfocitos").val($(this).closest('tr').find('.linfocitos').val());
        $("#eosinofilos").val($(this).closest('tr').find('.eosinofilos').val());
        $("#basofilos").val($(this).closest('tr').find('.basofilos').val());
        $("#monocitos").val($(this).closest('tr').find('.monocitos').val());
        $("#plaquetas").val($(this).closest('tr').find('.plaquetas').val());
        $("#observacionesH").val( $(this).closest('tr').find('.observacionesH').val());
    });


    $(document).on("click", ".verQuimica", function(e){
        e.preventDefault();
        

        $("#nombreExamen").val( $(this).closest('tr').find('.nombreExamen').val());
        $("#fechaExamenQ").val($(this).closest('tr').find('.fechaExamen').val());

        $("#glucosa").val($(this).closest('tr').find('.glucosa').val());
        $("#fosfatasa").val($(this).closest('tr').find('.fosfatasa').val());
        $("#glucosaPostPrand").val($(this).closest('tr').find('.glucosaPostPrand').val());
        $("#lipasa").val($(this).closest('tr').find('.lipasa').val());
        $("#globulina").val($(this).closest('tr').find('.globulina').val());
        $("#amilasa").val($(this).closest('tr').find('.amilasa').val());
        $("#trigliceridos").val($(this).closest('tr').find('.trigliceridos').val());
        $("#indiceAG").val($(this).closest('tr').find('.indiceAG').val());
        $("#colesterol").val($(this).closest('tr').find('.colesterol').val());
        $("#bilirrubinaD").val($(this).closest('tr').find('.bilirrubinaD').val());
        $("#colesterolHDL").val($(this).closest('tr').find('.colesterolHDL').val());
        $("#bilirrubinaI").val($(this).closest('tr').find('.bilirrubinaI').val());
        $("#colesterolLDL").val($(this).closest('tr').find('.colesterolLDL').val());
        $("#albumina").val($(this).closest('tr').find('.albumina').val());
        $("#acidoUrico").val($(this).closest('tr').find('.acidoUrico').val());
        $("#fosforo").val($(this).closest('tr').find('.fosforo').val());
        $("#creatinina").val($(this).closest('tr').find('.creatinina').val());
        $("#cloro").val($(this).closest('tr').find('.cloro').val());
        $("#nitrogeno").val($(this).closest('tr').find('.nitrogeno').val());
        $("#calcio").val($(this).closest('tr').find('.calcio').val());
        $("#proteinasT").val($(this).closest('tr').find('.proteinasT').val());
        $("#potasio").val($(this).closest('tr').find('.potasio').val());
        $("#bilirrubina").val($(this).closest('tr').find('.bilirrubina').val());
        $("#sodio").val($(this).closest('tr').find('.sodio').val());
        $("#tgo").val($(this).closest('tr').find('.tgo').val());
        $("#magnesio").val($(this).closest('tr').find('.magnesio').val());
        $("#tgp").val($(this).closest('tr').find('.tgp').val());
        $("#fosfatasaA").val($(this).closest('tr').find('.fosfatasaA').val());
        $("#observacionesQS").val($(this).closest('tr').find('.observacionesQS').val());

    });

    $(document).on("click", ".verUrianalisis", function(e){
        e.preventDefault();

        $("#nombreExamen").val($(this).closest('tr').find('.nombreExamen').val());
        $("#fechaExamen").val($(this).closest('tr').find('.fechaExamen').val());

        $("#color").val($(this).closest('tr').find('.color').val());
        $("#aspecto").val($(this).closest('tr').find('.aspecto').val());
        $("#reaccion").val($(this).closest('tr').find('.reaccion').val());
        $("#densidad").val($(this).closest('tr').find('.densidad').val());
        $("#ph").val($(this).closest('tr').find('.ph').val());
        $("#glucosaU").val($(this).closest('tr').find('.glucosa').val());
        $("#proteinas").val($(this).closest('tr').find('.proteinas').val());
        $("#pigmentosB").val($(this).closest('tr').find('.pigmentosB').val());
        $("#sangreO").val($(this).closest('tr').find('.sangreO').val());
        $("#nitritos").val($(this).closest('tr').find('.nitritos').val());
        $("#cuerposC").val($(this).closest('tr').find('.cuerposC').val());
        $("#acidosBiliares").val($(this).closest('tr').find('.acidosBiliares').val());
        $("#granulosos").val($(this).closest('tr').find('.granulosos').val());
        $("#cilindrosL").val($(this).closest('tr').find('.cilindrosL').val());
        $("#cilindrosH").val($(this).closest('tr').find('.cilindrosH').val());
        $("#otrosCilindros").val($(this).closest('tr').find('.otrosCilindros').val());
        $("#leucositos").val($(this).closest('tr').find('.leucositos').val());
        $("#hematies").val($(this).closest('tr').find('.hematies').val());
        $("#celulasE").val($(this).closest('tr').find('.celulasE').val());
        $("#elementosM").val($(this).closest('tr').find('.elementosM').val());
        $("#bacterias").val($(this).closest('tr').find('.bacterias').val());
        $("#levadura").val($(this).closest('tr').find('.levadura').val());
        $("#OtrosUno").val($(this).closest('tr').find('.otrosUno').val());
        $("#otrosDos").val($(this).closest('tr').find('.otrosDos').val());
        $("#observacionesU").val($(this).closest('tr').find('.observacionesU').val());

    });
</script>