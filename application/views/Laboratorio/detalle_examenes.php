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

    .historial_varios{
        height: 200px;
        overflow-x: hidden;
        overflow-y: scroll;
        width: 100%;
        border: 1px solid;
    }
    #dvVarios {
        height: 400px; /* Establece la altura deseada */
    }
</style>

<div class="">
    <div class="row">
        
        <div class="col-md-12">
            <div class="ms-panel-body clearfix">
                
                    <ul class="nav nav-tabs d-flex nav-justified" role="tablist">
                    <li role="presentation"><a href="#datosPaciente" aria-controls="datosPaciente" class="active show" role="tab" data-toggle="tab" aria-selected="false">Datos del paciente</a></li>
                    <li role="presentation"><a href="#hematologia" aria-controls="hematologia" class="" role="tab" data-toggle="tab" aria-selected="false">Hematología</a></li>
                    <li role="presentation"><a href="#quimicaSanguinea" aria-controls="quimicaSanguinea" role="tab" data-toggle="tab" class="" aria-selected="false">Química sanguínea</a></li>
                    <li role="presentation"><a href="#urianalisis" aria-controls="urianalisis" role="tab" data-toggle="tab" aria-selected="false">Urianálisis </a></li>
                    <li role="presentation"><a href="#coprologia" aria-controls="coprologia" role="tab" data-toggle="tab" aria-selected="false">Coprología </a></li>
                    <li role="presentation"><a href="#pruebasEspeciales" aria-controls="pruebasEspeciales" role="tab" data-toggle="tab" aria-selected="false">Pruebas especiales </a></li>
                    <li role="presentation"><a href="#bacteriologia" aria-controls="bacteriologia" role="tab" data-toggle="tab" aria-selected="false">Bacteriología </a></li>
                    </ul>
                <div class="m-2"> 
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
                                                <td> <span class="badge badge-danger">22-38 Seg.</span> </td>
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
                                                <td> <span class="badge badge-danger">0-1%</span> </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Monocitos</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $hematologia->monocitos; ?>" name="monocitos" id="monocitos"> </td>
                                                <td> <span class="badge badge-danger">2-5%</span> </td>
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
                                                                <a href="#" title="Ver examen" class="verHematologia"><i class="fa fa-file text-success"></i></a>
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
                                                <td> <span class="badge badge-danger">55-110 mg/dl</span> </td>
                                                <td>Fosfatasa acida Prost.</td>
                                                <td><input type="text" class="form-control" value="<?php echo $quimica->fosfatasa; ?>" name="fosfatasa" id="fosfatasa"></td>
                                                <td> <span class="badge badge-danger">Menos 1.7 U/L</span> </td>
                                            </tr>
        
                                            <tr>
                                                <td>Glucosa Post-Prand</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->glucosaPostPrand; ?>" name="glucosaPostPrand" id="glucosaPostPrand"> </td>
                                                <td> <span class="badge badge-danger">---</span> </td>
                                                <td>Lipasa</td>
                                                <td><input type="text" class="form-control" value="<?php echo $quimica->lipasa; ?>" name="lipasa" id="lipasa"></td>
                                                <td> <span class="badge badge-danger">Menos de 38 U/L</span> </td>
                                            </tr>
        
                                            <tr>
                                                <td>Globulina</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->globulina; ?>" name="globulina" id="globulina"> </td>
                                                <td> <span class="badge badge-danger">2.3-3.4 g/dl</span> </td>
                                                <td>Amilasa</td>
                                                <td><input type="text" class="form-control" value="<?php echo $quimica->amilasa; ?>" name="amilasa" id="amilasa"></td>
                                                <td> <span class="badge badge-danger">Menos de 90 U/L</span> </td>
                                            </tr>
        
                                            <tr>
                                                <td>Trigliceridos</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->trigliceridos; ?>" name="trigliceridos" id="trigliceridos"> </td>
                                                <td> <span class="badge badge-danger">Hasta 15 mg/dl</span> </td>
                                                <td>Indice A/G</td>
                                                <td><input type="text" class="form-control" value="<?php echo $quimica->indiceAG; ?>" name="indiceAG" id="indiceAG"></td>
                                                <td> <span class="badge badge-danger">1.2-2.2</span> </td>
                                            </tr>
        
                                            <tr>
                                                <td>Colesterol</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->colesterol; ?>" name="colesterol" id="colesterol"> </td>
                                                <td> <span class="badge badge-danger">Hasta 200 mg/dl</span> </td>
                                                <td>Bilirrubina directa</td>
                                                <td><input type="text" class="form-control" value="<?php echo $quimica->bilirrubinaD; ?>" name="bilirrubinaD" id="bilirrubinaD"></td>
                                                <td> <span class="badge badge-danger">Hasta 0.25 mg/dl</span> </td>
                                            </tr>
        
                                            <tr>
                                                <td>Colesterol H.D.L</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->colesterolHDL; ?>" name="colesterolHDL" id="colesterolHDL"> </td>
                                                <td> <span class="badge badge-danger">35-65 mg/dl</span> </td>
                                                <td>Bilirrubina indirecta</td>
                                                <td><input type="text" class="form-control" value="<?php echo $quimica->bilirrubinaI; ?>" name="bilirrubinaI" id="bilirrubinaI"></td>
                                                <td> <span class="badge badge-danger">---</span> </td>
                                            </tr>
        
                                            <tr>
                                                <td>Colesterol L.D.L</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->colesterolLDL; ?>" name="colesterolLDL" id="colesterolLDL"> </td>
                                                <td> <span class="badge badge-danger">Hasta 150 mg/dl</span> </td>
                                                <td>Albumina</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->albumina; ?>" name="albumina" id="albumina"> </td>
                                                <td> <span class="badge badge-danger">3.5-5.0 g/dl</span> </td>
                                            </tr>
        
                                            <tr>
                                                <td>Ácido Úrico</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->acidoUrico; ?>" name="acidoUrico" id="acidoUrico"> </td>
                                                <td> <span class="badge badge-danger">2.5-7.0 mg/dl</span> </td>
                                                <td>Fosforo</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->fosforo; ?>" name="fosforo" id="fosforo"> </td>
                                                <td> <span class="badge badge-danger">2.5-5.0 mg/dl</span> </td>
                                            </tr>
        
                                            <tr>
                                                <td>Creatinina</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->creatinina; ?>" name="creatinina" id="creatinina"> </td>
                                                <td> <span class="badge badge-danger">0.7-1.4 mg/dl</span> </td>
                                                <td>Cloro</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->cloro; ?>" name="cloro" id="cloro"> </td>
                                                <td> <span class="badge badge-danger">95-115mmol/l</span> </td>
                                            </tr>
        
                                            <tr>
                                                <td>Nitrógeno</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->nitrogeno; ?>" name="nitrogeno" id="nitrogeno"> </td>
                                                <td> <span class="badge badge-danger">4.7-22.5 mg/dl</span> </td>
                                                <td>Calcio</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->calcio; ?>" name="calcio" id="calcio"> </td>
                                                <td> <span class="badge badge-danger">8.1-10.4 mg/dl</span> </td>
                                            </tr>
        
                                            <tr>
                                                <td>Proteinas totales</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->proteinasT; ?>" name="proteinasT" id="proteinasT"> </td>
                                                <td> <span class="badge badge-danger">6.7-8.7 g/dl</span> </td>
                                                <td>Potasio</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->potasio; ?>" name="potasio" id="potasio"> </td>
                                                <td> <span class="badge badge-danger">3.6-5.5 mmol/l</span> </td>
                                            </tr>
        
                                            <tr>
                                                <td>Bilirrubina</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->bilirrubina; ?>" name="bilirrubina" id="bilirrubina"> </td>
                                                <td> <span class="badge badge-danger">Hasta 1.1 mg/dl</span> </td>
                                                <td>Sodio</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->sodio; ?>" name="sodio" id="sodio"> </td>
                                                <td> <span class="badge badge-danger">135-155 mmol/l</span> </td>
                                            </tr>
        
                                            <tr>
                                                <td>T.G.O</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->tgo; ?>" name="tgo" id="tgo"> </td>
                                                <td> <span class="badge badge-danger">Menos de 38 U/L</span> </td>
                                                <td>Magnesio</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->magnesio; ?>" name="magnesio" id="magnesio"> </td>
                                                <td> <span class="badge badge-danger">1.6-2.5 mg/dl</span> </td>
                                            </tr>
                                            <tr>
                                                <td>T.G.P</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->tgp; ?>" name="tgp" id="tgp"> </td>
                                                <td> <span class="badge badge-danger">Menos de 40 U/L</span> </td>
                                                <td>Fosfatasa alcalina</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $quimica->fosfatasaA; ?>" name="fosfatasaA" id="fosfatasaA"> </td>
                                                <td> <span class="badge badge-danger">98-279 U/L</span> </td>
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
                                                                <a href="#" title="Ver examen" class="verQuimica"><i class="fa fa-file text-success"></i></a>
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
                                                <td style="display: none">Otros</td>
                                                <td style="display: none"> <input type="text" class="form-control" value="<?php echo $urianalisis->otrosDos; ?>" name="otrosDos" id="otrosDos"> </td>
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
                                                                <a href="#" title="Ver examen" class="verUrianalisis"><i class="fa fa-file text-success"></i></a>
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
                            <form action="<?php echo base_url(); ?>Laboratorio/guardar_coprologia_lab" method="post">
                                <div class="row">
                                    <div class="col-md-10">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td><strong>Examen:</strong> <input type="text" value="<?php echo $coprologia->nombreExamen; ?>"  class="form-control"  id="nombreExamenC" name="nombreExamen"></td>
                                                <td><strong>Fecha:</strong>  <input type="date" value="<?php echo $coprologia->fechaExamen; ?>" class="form-control"  id="fechaExamenC" name="fechaExamen"></td>
                                            </tr>
                                        </table>
        
                                        <table class="table table-borderless frmExamen">
                                            <tr class="bg-danger text-white text-center">
                                                <th colspan="6">EXAMEN MACROSCOPICO</th>
                                            </tr>
                                            <tr>
                                                <td>Color</td>
                                                <td colspan="2"> <input type="text" class="form-control" value="<?php echo $coprologia->color; ?>" name="color" id="colorC"> </td>
                                                <td>Consistencia</td>
                                                <td colspan="2"><input type="text" class="form-control" value="<?php echo $coprologia->consistencia; ?>" name="consistencia" id="consistenciaC"></td>
                                            </tr>
        
                                            <tr>
                                                <td>Mucus</td>
                                                <td colspan="2"> <input type="text" class="form-control" value="<?php echo $coprologia->mucus; ?>" name="mucus" id="mucusC"> </td>
                                                <td>Hematies</td>
                                                <td colspan="2"><input type="text" class="form-control" value="<?php echo $coprologia->hematies; ?>" name="hematies" id="hematiesC"></td>
                                            </tr>
        
                                            <tr>
                                                <td>Leucocitos</td>
                                                <td colspan="2"> <input type="text" class="form-control" value="<?php echo $coprologia->leucocitos; ?>" name="leucocitos" id="leucocitosC"> </td>
                                                <td>Bacterias</td>
                                                <td colspan="2"><input type="text" class="form-control" value="<?php echo $coprologia->bacterias; ?>" name="bacterias" id="bacteriasC"></td>
                                            </tr>
        
                                            <tr>
                                                <td>Levaduras</td>
                                                <td colspan="2"> <input type="text" class="form-control" value="<?php echo $coprologia->levaduras; ?>" name="levaduras" id="levadurasC"> </td>
                                                <td>Restos Alim. Microsc. </td>
                                                <td colspan="2"><input type="text" class="form-control" value="<?php echo $coprologia->restosAM; ?>" name="restosAM" id="restosAMC"></td>
                                            </tr>
        
                                            <tr>
                                                <td>Otros</td>
                                                <td colspan="2"> <input type="text" class="form-control" value="<?php echo $coprologia->otrosUno; ?>" name="otrosUno" id="otrosUnoC"> </td>
                                                <td>Otros</td>
                                                <td colspan="2"><input type="text" class="form-control" value="<?php echo $coprologia->otrosDos; ?>" name="otrosDos" id="otrosDosC"></td>
                                            </tr>

                                            <tr class="bg-danger text-white text-center">
                                                <th colspan="6">EXAMEN MICROSCOPICO</th>
                                            </tr>
    
                                            <tr class="alert-danger text-center">
                                                <th>PROTOZOARIOS</th>
                                                <th>TROFOZOITO</th>
                                                <th>QUISTE</th>
                                                <th>METAZOARIOS</th>
                                                <th>HUEVO</th>
                                                <th>LARVA</th>
                                            </tr>
    
                                            <tr>
                                                <td>Entamoeba Histolytica</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->histolyticaT; ?>" name="histolyticaT" id="histolyticaTC"> </td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->histolyticaQ; ?>" name="histolyticaQ" id="histolyticaQC"> </td>
                                                <td>Ascaris lumbricoides</td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->ascarisH; ?>" name="ascarisH" id="ascarisHC"></td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->ascarisL; ?>" name="ascarisL" id="ascarisLC"></td>
                                            </tr>
    
                                            <tr>
                                                <td>Entamoeba Coli</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->coliT; ?>" name="coliT" id="coliTC"> </td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->coliQ; ?>" name="coliQ" id="coliQC"> </td>
                                                <td>Trichuris trinchiura</td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->trinchiuraH; ?>" name="trinchiuraH" id="trinchiuraHC"></td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->trinchiuraL; ?>" name="trinchiuraL" id="trinchiuraLC"></td>
                                            </tr>
    
                                            <tr>
                                                <td>Endolimax Nana</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->nanaT; ?>" name="nanaT" id="nanaTC"> </td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->nanaQ; ?>" name="nanaQ" id="nanaQC"> </td>
                                                <td>Ancylostoma duodenale</td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->guodH; ?>" name="guodH" id="guodHC"></td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->guodL; ?>" name="guodL" id="guodLC"></td>
                                            </tr>
    
                                            <tr>
                                                <td>Chilomastix mesnili</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->mesniliT; ?>" name="mesniliT" id="mesniliTC"> </td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->mesniliQ; ?>" name="mesniliQ" id="mesniliQC"> </td>
                                                <td>Enterobios vermic</td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->vermicH; ?>" name="vermicH" id="vermicHC"></td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->vermicL; ?>" name="vermicL" id="vermicLC"></td>
                                            </tr>
    
                                            <tr>
                                                <td>Giardia Lambia</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->lambiaT; ?>" name="lambiaT" id="lambiaTC"> </td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->lambiaQ; ?>" name="lambiaQ" id="lambiaQC"> </td>
                                                <td>Strongyloides stercoralis</td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->stercoH; ?>" name="stercoH" id="stercoHC"></td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->stercoL; ?>" name="stercoL" id="stercoLC"></td>
                                            </tr>
    
                                            <tr>
                                                <td>Tricomonas hominis</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->hominisT; ?>" name="hominisT" id="hominisTC"> </td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->hominisQ; ?>" name="hominisQ" id="hominisQC"> </td>
                                                <td>Hymenolepis nana</td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->hymenolepisH; ?>" name="hymenolepisH" id="hymenolepisHC"></td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->hymenolepisL; ?>" name="hymenolepisL" id="hymenolepisLC"></td>
                                            </tr>
    
                                            <tr>
                                                <td>Balantidium coli</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->balantidiumT; ?>" name="balantidiumT" id="balantidiumTC"> </td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->balantidiumQ; ?>" name="balantidiumQ" id="balantidiumQC"> </td>
                                                <td>Taenias</td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->taeniasH; ?>" name="taeniasH" id="taeniasHC"></td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->taeniasL; ?>" name="taeniasL" id="taeniasLC"></td>
                                            </tr>
    
                                            <tr>
                                                <td>Blastocystis hominis</td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->blastocystisT; ?>" name="blastocystisT" id="blastocystisTC"> </td>
                                                <td> <input type="text" class="form-control" value="<?php echo $coprologia->blastocystisQ; ?>" name="blastocystisQ" id="blastocystisQC"> </td>
                                                <td>Otros</td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->otrosH; ?>" name="otrosH" id="otrosHC"></td>
                                                <td><input type="text" class="form-control" value="<?php echo $coprologia->otrosL; ?>" name="otrosL" id="otrosLC"></td>
                                            </tr>
        
    
                                            <tr>
                                                <td>Observaciones</td>
                                                <td colspan="2"> <textarea class="form-control" name="observacionesC" id="observacionesCC"><?php echo $coprologia->observacionesC; ?></textarea></td>
                                                <td></td>
                                                <td >
                                                    <input type="hidden" class="form-control" value="<?php echo $coprologia->idCoprologia; ?>" name="idCoprologia" id="idCoprologiaC"> 
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
                                                    foreach ($historial_coprologia as $row) {
                                                        if($row->fechaExamen == date("Y-m-d")){
                                                            echo '<tr class="alert-primary">';
                                                        }else{
                                                            echo '<tr>';
                                                        }
                                                        echo ' <td>'.$row->fechaExamen.'</td>';
                                                        echo ' <td>
    
                                                                <input type="hidden" class="colorC" value="'.$row->color.'">
                                                                <input type="hidden" class="consistencia" value="'.$row->consistencia.'">
                                                                <input type="hidden" class="mucus" value="'.$row->mucus.'">
                                                                <input type="hidden" class="hematiesC" value="'.$row->hematies.'">
                                                                <input type="hidden" class="leucocitos" value="'.$row->leucocitos.'">
                                                                <input type="hidden" class="bacteriasC" value="'.$row->bacterias.'">
                                                                <input type="hidden" class="levaduras" value="'.$row->levaduras.'">
                                                                <input type="hidden" class="restosAM" value="'.$row->restosAM.'">
                                                                <input type="hidden" class="otrosUno" value="'.$row->otrosUno.'">
                                                                <input type="hidden" class="otrosDosC" value="'.$row->otrosDos.'">
                                                                <input type="hidden" class="histolyticaT" value="'.$row->histolyticaT.'">
                                                                <input type="hidden" class="histolyticaQ" value="'.$row->histolyticaQ.'">
                                                                <input type="hidden" class="ascarisH" value="'.$row->ascarisH.'">
                                                                <input type="hidden" class="ascarisL" value="'.$row->ascarisL.'">
                                                                <input type="hidden" class="coliT" value="'.$row->coliT.'">
                                                                <input type="hidden" class="coliQ" value="'.$row->coliQ.'">
                                                                <input type="hidden" class="trinchiuraH" value="'.$row->trinchiuraH.'">
                                                                <input type="hidden" class="trinchiuraL" value="'.$row->trinchiuraL.'">
                                                                <input type="hidden" class="nanaT" value="'.$row->nanaT.'">
                                                                <input type="hidden" class="nanaQ" value="'.$row->nanaQ.'">
                                                                <input type="hidden" class="guodH" value="'.$row->guodH.'">
                                                                <input type="hidden" class="guodL" value="'.$row->guodL.'">
                                                                <input type="hidden" class="mesniliT" value="'.$row->mesniliT.'">
                                                                <input type="hidden" class="mesniliQ" value="'.$row->mesniliQ.'">
                                                                <input type="hidden" class="vermicH" value="'.$row->vermicH.'">
                                                                <input type="hidden" class="vermicL" value="'.$row->vermicL.'">
                                                                <input type="hidden" class="lambiaT" value="'.$row->lambiaT.'">
                                                                <input type="hidden" class="lambiaQ" value="'.$row->lambiaQ.'">
                                                                <input type="hidden" class="stercoH" value="'.$row->stercoH.'">
                                                                <input type="hidden" class="stercoL" value="'.$row->stercoL.'">
                                                                <input type="hidden" class="hominisT" value="'.$row->hominisT.'">
                                                                <input type="hidden" class="hominisQ" value="'.$row->hominisQ.'">
                                                                <input type="hidden" class="hymenolepisH" value="'.$row->hymenolepisH.'">
                                                                <input type="hidden" class="hymenolepisL" value="'.$row->hymenolepisL.'">
                                                                <input type="hidden" class="balantidiumT" value="'.$row->balantidiumT.'">
                                                                <input type="hidden" class="balantidiumQ" value="'.$row->balantidiumQ.'">
                                                                <input type="hidden" class="taeniasH" value="'.$row->taeniasH.'">
                                                                <input type="hidden" class="taeniasL" value="'.$row->taeniasL.'">
                                                                <input type="hidden" class="blastocystisT" value="'.$row->blastocystisT.'">
                                                                <input type="hidden" class="blastocystisQ" value="'.$row->blastocystisQ.'">
                                                                <input type="hidden" class="otrosH" value="'.$row->otrosH.'">
                                                                <input type="hidden" class="otrosL" value="'.$row->otrosL.'">
                                                                <input type="hidden" class="observacionesC" value="'.$row->observacionesC.'">
    
                                                                <input type="hidden" class="nombreExamen" value="'.$row->nombreExamen.'">
                                                                <input type="hidden" class="fechaExamen" value="'.$row->fechaExamen.'">
    
                                                                <a href="'.base_url().'Laboratorio/coprologia_pdf/'.$row->idCoprologia.'" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                                <a href="#" title="Ver examen" class="verCoprologia"><i class="fa fa-file text-success"></i></a>
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
                            <form action="<?php echo base_url(); ?>Laboratorio/guardar_varios_lab" method="post">
                                <div class="row">
                                    <div class="col-md-10">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td style="width: 150px"><strong>FECHA</strong></td>
                                                <td><input type="date" value="<?php echo $varios->fechaExamen; ?>" class="form-control"  id="fechaExamenV" name="fechaExamen"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>ENCABEZADO</td>
                                                <td><input type="text" value="<?php echo $varios->encabezadoVarios; ?>"  class="form-control"  id="encabezadoExamenV" name="encabezadoExamen"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>EXAMEN INDICADO</strong></td>
                                                <td><input type="text" value="<?php echo $varios->nombreExamen; ?>" class="form-control"  id="indicadoExamenV" name="indicadoExamen"></td>
                                            </tr>
                                        </table>
                                        <!-- <textarea class="form-control" rows="20" name="detalleVarios" id="detalleVarios"></textarea> -->
                                        <div id="dvVarios"><?php echo base64_decode($varios->detalleVarios); ?></div>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <p><strong>HISTORIAL</strong></p>
                                        <div class="table-responsive historial_varios table-md">
                                            <table class="table table-borderless table-sm">
                                                <tr>
                                                    <td>Fecha</td>
                                                    <td>Opcion</td>
                                                </tr>
                                                <?php 
                                                    foreach ($historial_varios as $row) {
                                                        if($row->fechaExamen == date("Y-m-d")){
                                                            echo '<tr class="alert-primary">';
                                                        }else{
                                                            echo '<tr>';
                                                        }
                                                        echo ' <td>'.$row->fechaExamen.'</td>';
                                                        echo ' <td>
    
                                                                <input type="hidden" class="encabezadoVarios" value="'.$row->encabezadoVarios.'">
                                                                <input type="hidden" class="detalleVarios" value="'.$row->detalleVarios.'">
                                                                <input type="hidden" class="nombreExamen" value="'.$row->nombreExamen.'">
                                                                <input type="hidden" class="fechaExamen" value="'.$row->fechaExamen.'">
                                                                <input type="hidden" class="idVarios" value="'.$row->idVarios.'">
    
                                                                <a href="'.base_url().'Laboratorio/varios_lab_pdf/'.$row->idVarios.'" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                                <a href="#" title="Ver examen" class="verVarios"><i class="fa fa-file text-success"></i></a>
                                                            </td>';
                                                        echo '</tr>';
                                                    }
                                                ?>
                                                
                                            </table>
                                        </div>
                                        <p><strong>BOSQUEJO</strong></p>
                                        <div class="table-responsive historial_varios table-md">
                                            <table class="table table-borderless table-sm">
                                                <tr>
                                                    <td>Fecha</td>
                                                    <td>Opcion</td>
                                                </tr>
                                                <?php 
                                                    foreach ($bosquejos as $row) {
                                                        echo '<tr>';
                                                        echo ' <td>'.$row->examenBosquejo.'</td>';
                                                        echo ' <td>
                                                                <input type="hidden" class="encabezadoBosquejo" value="'.$row->encabezadoBosquejo.'">
                                                                <input type="hidden" class="examenBosquejo" value="'.$row->examenBosquejo.'">
                                                                <input type="hidden" class="detalleBosquejo" value="'.$row->detalleBosquejo.'">
                                                                <a href="#" title="Ver examen" class="verBosquejo"><i class="fa fa-file text-success"></i></a>
                                                            </td>';
                                                        echo '</tr>';
                                                    }
                                                ?>
                                                
                                            </table>
                                        </div>

                                        <div class="mt-2">
                                            <input type="hidden" class="form-control" value="<?php echo $varios->idVarios; ?>" name="idExamen" id="idExamenV"> 
                                            <input type="hidden" class="form-control" value="<?php echo $consulta; ?>" name="idConsulta" id="idConsultaV"> 
                                            <button type="button" id="btnNuevoExamen" class="btn btn-outline-success btn-block">Nuevo</button>
                                            <button type="button" id="btnGuardarBosquejo" class="btn btn-outline-primary btn-block">Guardar bosquejo</button>
                                            <button type="button" id="btnGuardarExamen" class="btn btn-primary btn-block">Guardar examen</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
    
                        <div role="tabpanel" class="tab-pane fade" id="bacteriologia">
                            <form action="<?php echo base_url(); ?>Laboratorio/guardar_bacteriologia_lab" method="post">
                                <div class="row">
                                    <div class="col-md-10">
                                        <table class="table table-borderless">
                                                <tbody class="text-left">
                                                    <tr>
                                                        <td colspan="3">
                                                            <strong>Examen indicado</strong><br>
                                                            <input type="text" value="<?php echo $bacteriologia->nombreExamen; ?>" class="form-control" name="nombreExamen" id="nombreExamenB">
                                                        </td>
                                                        <td colspan="3">
                                                            <strong>Fecha</strong><br>
                                                            <input type="date" value="<?php echo $bacteriologia->fechaExamen; ?>" class="form-control"  id="fechaExamenB" name="fechaExamen">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="6">
                                                            <strong>Resultado </strong><br>
                                                            <input type="text" value="<?php echo $bacteriologia->resultadoExamen; ?>" size="92" name="resultadoBacteriologia" id="resultadoBacteriologia" class="form-control">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="6">
                                                            <strong>Se aisla</strong><br>
                                                            <input type="text" value="<?php echo $bacteriologia->seAisla; ?>" size="92" name="seAisla" id="seAisla" class="form-control">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong> Cefixime</strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->cefixime; ?>" class="form-control" name="cefixime" id="cefixime"></td>
                                                        <td><strong> Amikacina</strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->amikacina; ?>" class="form-control" name="amikacina" id="amikacina"></td>
                                                        <td><strong> Levofloxacina</strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->levofloxacina; ?>" class="form-control" name="levofloxacina" id="levofloxacina"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong> Ceftriaxona </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->ceftriaxona; ?>" class="form-control" name="ceftriaxona" id="ceftriaxona"></td>
                                                        <td><strong> Azitromicina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->azitromicina; ?>" class="form-control" name="azitromicina" id="azitromicina"></td>
                                                        <td><strong> Imipenem </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->imipenem; ?>" class="form-control" name="imipenem" id="imipenem"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong> Meropenem </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->meropenem; ?>" class="form-control" name="meropenem" id="meropenem"></td>
                                                        <td><strong> Fosfomicina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->fosfocil; ?>" class="form-control" name="fosfocil" id="fosfocil"></td>
                                                        <td><strong> Ciprofloxacina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->ciprofloxacina; ?>" class="form-control" name="ciprofloxacina" id="ciprofloxacina"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong> Penicilina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->penicilina; ?>" class="form-control" name="penicilina" id="penicilina"></td>
                                                        <td><strong> Vancomicina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->vancomicina; ?>" class="form-control" name="vancomicina" id="vancomicina"></td>
                                                        <td><strong> Ácido nalidíxico </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->acidoNalidixico; ?>" class="form-control" name="acidoNalidixico" id="acidoNalidixico"></td>
                                                    </tr>

                                                    <tr>
                                                        
                                                        <td><strong> Gentamicina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->gentamicina; ?>" class="form-control" name="gentamicina" id="gentamicina"></td>
                                                        <td><strong> Nitrofurantoina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->nitrofurantoina; ?>" class="form-control" name="nitrofurantoina" id="nitrofurantoina"></td>
                                                        <td><strong> Ceftazidime </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->ceftazimide; ?>" class="form-control" name="ceftazimide" id="ceftazimide"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong> Cefotaxime </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->cefotaxime; ?>" class="form-control" name="cefotaxime" id="cefotaxime"></td>
                                                        <td><strong> Clindamicina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->clindamicina; ?>" class="form-control" name="clindamicina" id="clindamicina"></td>
                                                        <td><strong> Trimetoprima/Sulfametoxazol</strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->trimetropimSulfa; ?>" class="form-control" name="trimetropimSulfa" id="trimetropimSulfa"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong> Ampicilina/Sulbactam </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->ampicilina; ?>" class="form-control" name="ampicilina" id="ampicilina"></td>
                                                        <td><strong> Piperacilina/Tazobactam </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->piperacilina; ?>" class="form-control" name="piperacilina" id="piperacilina"></td>
                                                        <td><strong> Amoxicilina/Ácido clavulánico</strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->amoxicilina; ?>" class="form-control" name="amoxicilina" id="amoxicilina"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong> Claritromicina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->claritromicina; ?>" class="form-control" name="claritromicina" id="claritromicina"></td>
                                                        <td><strong> Cefuroxime </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->cefuroxime; ?>" class="form-control" name="cefuroxime" id="cefuroxime"></td>
                                                        <td><strong> Cefepime </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->cefepime; ?>" class="form-control" name="cefepime" id="cefepime"></td>
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td><strong> Metronidazol </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->metronidazol; ?>" class="form-control" name="metronidazol" id="metronidazol"></td>
                                                        <td><strong> Norfloxacina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->norfloxacina; ?>" class="form-control" name="norfloxacina" id="norfloxacina"></td>
                                                        <td><strong> Tobramicina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->tobramicina; ?>" class="form-control" name="tobramicina" id="tobramicina"></td>
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td><strong> Ertapenem </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->ertapenem; ?>" class="form-control" name="ertapenem" id="ertapenem"></td>
                                                        <td><strong> Doripenem </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->doripenem; ?>" class="form-control" name="doripenem" id="doripenem"></td>
                                                        <td><strong> Colistin </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->colistin; ?>" class="form-control" name="colistin" id="colistin"></td>
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td><strong> Linezolid </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->linezolid; ?>" class="form-control" name="linezolid" id="linezolid"></td>
                                                        <td><strong> Moxifloxacino </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->moxifloxacino; ?>" class="form-control" name="moxifloxacino" id="moxifloxacino"></td>
                                                        <td><strong> Kanamicina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->kanamicina; ?>" class="form-control" name="kanamicina" id="kanamicina"></td>
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td><strong> Aztreonam </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->aztreonam; ?>" class="form-control" name="aztreonam" id="aztreonam"></td>
                                                        <td><strong> Cefaclor </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->cefaclor; ?>" class="form-control" name="cefaclor" id="cefaclor"></td>
                                                        <td><strong> Cefazolina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->cefazolina; ?>" class="form-control" name="cefazolina" id="cefazolina"></td>
                                                        
                                                    </tr>

                                                    <tr>
                                                        <td><strong> Tetraciclina </strong></td>
                                                        <td><input type="text" value="<?php echo $bacteriologia->tetraciclina; ?>" class="form-control" name="tetraciclina" id="tetraciclina"></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        
                                                    </tr>

                                                    <tr>
                                                         
                                                        <td colspan="6"><strong> Observación </strong><br><textarea  class="form-control" name="observacion" id="observacionBacteriologia" cols="96"><?php echo $bacteriologia->observacionExamen; ?></textarea></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <p><strong>HISTORIAL</strong></p>
                                        <div class="table-responsive historial_varios table-md">
                                            <table class="table table-borderless table-sm">
                                                <tr>
                                                    <td>Fecha</td>
                                                    <td>Opcion</td>
                                                </tr>
                                                <?php 
                                                    foreach ($historial_bacteriologia as $row) {
                                                        if($row->fechaExamen == date("Y-m-d")){
                                                            echo '<tr class="alert-primary">';
                                                        }else{
                                                            echo '<tr>';
                                                        }
                                                        echo ' <td>'.$row->fechaExamen.'</td>';
                                                        echo ' <td>
    
                                                                <input type="hidden" class="cefixime" value="'.$row->cefixime.'">
                                                                <input type="hidden" class="amikacina" value="'.$row->amikacina.'">
                                                                <input type="hidden" class="levofloxacina" value="'.$row->levofloxacina.'">
                                                                <input type="hidden" class="ceftriaxona" value="'.$row->ceftriaxona.'">
                                                                <input type="hidden" class="azitromicina" value="'.$row->azitromicina.'">
                                                                <input type="hidden" class="imipenem" value="'.$row->imipenem.'">
                                                                <input type="hidden" class="meropenem" value="'.$row->meropenem.'">
                                                                <input type="hidden" class="fosfocil" value="'.$row->fosfocil.'">
                                                                <input type="hidden" class="ciprofloxacina" value="'.$row->ciprofloxacina.'">
                                                                <input type="hidden" class="penicilina" value="'.$row->penicilina.'">
                                                                <input type="hidden" class="vancomicina" value="'.$row->vancomicina.'">
                                                                <input type="hidden" class="acidoNalidixico" value="'.$row->acidoNalidixico.'">
                                                                <input type="hidden" class="gentamicina" value="'.$row->gentamicina.'">
                                                                <input type="hidden" class="nitrofurantoina" value="'.$row->nitrofurantoina.'">
                                                                <input type="hidden" class="ceftazimide" value="'.$row->ceftazimide.'">
                                                                <input type="hidden" class="cefotaxime" value="'.$row->cefotaxime.'">
                                                                <input type="hidden" class="clindamicina" value="'.$row->clindamicina.'">
                                                                <input type="hidden" class="trimetropimSulfa" value="'.$row->trimetropimSulfa.'">
                                                                <input type="hidden" class="ampicilina" value="'.$row->ampicilina.'">
                                                                <input type="hidden" class="piperacilina" value="'.$row->piperacilina.'">
                                                                <input type="hidden" class="amoxicilina" value="'.$row->amoxicilina.'">
                                                                <input type="hidden" class="claritromicina" value="'.$row->claritromicina.'">
                                                                <input type="hidden" class="cefuroxime" value="'.$row->cefuroxime.'">
                                                                <input type="hidden" class="cefepime" value="'.$row->cefepime.'">
                                                                <input type="hidden" class="metronidazol" value="'.$row->metronidazol.'">
                                                                <input type="hidden" class="norfloxacina" value="'.$row->norfloxacina.'">
                                                                <input type="hidden" class="tobramicina" value="'.$row->tobramicina.'">
                                                                <input type="hidden" class="ertapenem" value="'.$row->ertapenem.'">
                                                                <input type="hidden" class="doripenem" value="'.$row->doripenem.'">
                                                                <input type="hidden" class="colistin" value="'.$row->colistin.'">
                                                                <input type="hidden" class="linezolid" value="'.$row->linezolid.'">
                                                                <input type="hidden" class="moxifloxacino" value="'.$row->moxifloxacino.'">
                                                                <input type="hidden" class="kanamicina" value="'.$row->kanamicina.'">
                                                                <input type="hidden" class="aztreonam" value="'.$row->aztreonam.'">
                                                                <input type="hidden" class="cefaclor" value="'.$row->cefaclor.'">
                                                                <input type="hidden" class="cefazolina" value="'.$row->cefazolina.'">
                                                                <input type="hidden" class="tetraciclina" value="'.$row->tetraciclina.'">
                                                                <input type="hidden" class="observacionExamen" value="'.$row->observacionExamen.'">
    
                                                                <input type="hidden" class="nombreExamen" value="'.$row->nombreExamen.'">
                                                                <input type="hidden" class="fechaExamen" value="'.$row->fechaExamen.'">
                                                                <input type="hidden" class="resultadoExamen" value="'.$row->resultadoExamen.'">
                                                                <input type="hidden" class="seAisla" value="'.$row->seAisla.'">
                                                                <input type="hidden" class="idBacteriologia" value="'.$row->idBacteriologia.'">
    
                                                                <a href="'.base_url().'Laboratorio/bacteriologia_lab_pdf/'.$row->idBacteriologia.'" target="_blank" title="Imprimir resultado"><i class="fa fa-print text-danger"></i></a>
                                                                <a href="#" title="Ver examen" class="verBacteriologia"><i class="fa fa-file text-success"></i></a>
                                                            </td>';
                                                        echo '</tr>';
                                                    }
                                                ?>
                                                
                                            </table>
                                        </div>
                                        
                                        <div>
                                            <br>
                                            <input type="text" class="form-control" value="<?php echo $bacteriologia->idBacteriologia; ?>" name="idBacteriologia" id="idBacteriologia"> 
                                            <input type="hidden" class="form-control" value="<?php echo $consulta; ?>" name="idConsulta"> 
                                            <button class="btn btn-primary btn-block mt-3">Guardar examen</button>
                                        </div>
                                        
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

        $(document).ready(function() {
            $('#dvVarios').summernote({
                height: 400,                 // Altura del editor
                minHeight: null,             // Altura mínima del editor
                maxHeight: null,             // Altura máxima del editor
                focus: true,                 // Enfocar el editor después de inicializarlo
                lang: 'es-ES',               // Cambiar el idioma (necesitas incluir el archivo de idioma)
                toolbar: [
                    // Personalizar la barra de herramientas
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    // ['insert', ['link', 'picture', 'video']],
                    // ['view', ['fullscreen', 'codeview', 'help']]
                ],
            });
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

    $(document).on("click", ".verCoprologia", function(e){
        e.preventDefault();
        $("#nombreExamenC").val($(this).closest('tr').find('.nombreExamen').val());
        $("#fechaExamenC").val($(this).closest('tr').find('.fechaExamen').val());

        $("#colorC").val($(this).closest('tr').find('.colorC').val());
        $("#consistenciaC").val($(this).closest('tr').find('.consistencia').val());
        $("#mucusC").val($(this).closest('tr').find('.mucus').val());
        $("#hematiesC").val($(this).closest('tr').find('.hematiesC').val());
        $("#leucocitosC").val($(this).closest('tr').find('.leucocitos').val());
        $("#bacteriasC").val($(this).closest('tr').find('.bacteriasC').val());
        $("#levadurasC").val($(this).closest('tr').find('.levaduras').val());
        $("#restosAMC").val($(this).closest('tr').find('.restosAM').val());
        $("#otrosUnoC").val($(this).closest('tr').find('.otrosUno').val());
        $("#otrosDosC").val($(this).closest('tr').find('.otrosDosC').val());
        $("#histolyticaTC").val($(this).closest('tr').find('.histolyticaT').val());
        $("#histolyticaQC").val($(this).closest('tr').find('.histolyticaQ').val());
        $("#ascarisHC").val($(this).closest('tr').find('.ascarisH').val());
        $("#ascarisLC").val($(this).closest('tr').find('.ascarisL').val());
        $("#coliTC").val($(this).closest('tr').find('.coliT').val());
        $("#coliQC").val($(this).closest('tr').find('.coliQ').val());
        $("#trinchiuraHC").val($(this).closest('tr').find('.trinchiuraH').val());
        $("#trinchiuraLC").val($(this).closest('tr').find('.trinchiuraL').val());
        $("#nanaTC").val($(this).closest('tr').find('.nanaT').val());
        $("#nanaQC").val($(this).closest('tr').find('.nanaQ').val());
        $("#guodHC").val($(this).closest('tr').find('.guodH').val());
        $("#guodLC").val($(this).closest('tr').find('.guodL').val());
        $("#mesniliTC").val($(this).closest('tr').find('.mesniliT').val());
        $("#mesniliQC").val($(this).closest('tr').find('.mesniliQ').val());
        $("#vermicHC").val($(this).closest('tr').find('.vermicH').val());
        $("#vermicLC").val($(this).closest('tr').find('.vermicL').val());
        $("#lambiaTC").val($(this).closest('tr').find('.lambiaT').val());
        $("#lambiaQC").val($(this).closest('tr').find('.lambiaQ').val());
        $("#stercoHC").val($(this).closest('tr').find('.stercoH').val());
        $("#stercoLC").val($(this).closest('tr').find('.stercoL').val());
        $("#hominisTC").val($(this).closest('tr').find('.hominisT').val());
        $("#hominisQC").val($(this).closest('tr').find('.hominisQ').val());
        $("#hymenolepisHC").val($(this).closest('tr').find('.hymenolepisH').val());
        $("#hymenolepisLC").val($(this).closest('tr').find('.hymenolepisL').val());
        $("#balantidiumTC").val($(this).closest('tr').find('.balantidiumT').val());
        $("#balantidiumQC").val($(this).closest('tr').find('.balantidiumQ').val());
        $("#taeniasHC").val($(this).closest('tr').find('.taeniasH').val());
        $("#taeniasLC").val($(this).closest('tr').find('.taeniasL').val());
        $("#blastocystisTC").val($(this).closest('tr').find('.blastocystisT').val());
        $("#blastocystisQC").val($(this).closest('tr').find('.blastocystisQ').val());
        $("#otrosHC").val($(this).closest('tr').find('.otrosH').val());
        $("#otrosLC").val($(this).closest('tr').find('.otrosL').val());
        $("#observacionesCC").val($(this).closest('tr').find('.observacionesC').val());


    });

    
    $(document).on("click", ".verBacteriologia", function(e){
        e.preventDefault();

        

        $("#nombreExamenB").val($(this).closest('tr').find('.nombreExamen').val());
        $("#fechaExamenB").val($(this).closest('tr').find('.fechaExamen').val());
        $("#resultadoBacteriologia").val($(this).closest('tr').find('.resultadoExamen').val());
        $("#seAisla").val($(this).closest('tr').find('.seAisla').val());

        $("#cefixime").val($(this).closest('tr').find('.cefixime').val());
        $("#amikacina").val($(this).closest('tr').find('.amikacina').val());
        $("#levofloxacina").val($(this).closest('tr').find('.levofloxacina').val());
        $("#ceftriaxona").val($(this).closest('tr').find('.ceftriaxona').val());
        $("#azitromicina").val($(this).closest('tr').find('.azitromicina').val());
        $("#imipenem").val($(this).closest('tr').find('.imipenem').val());
        $("#meropenem").val($(this).closest('tr').find('.meropenem').val());
        $("#fosfocil").val($(this).closest('tr').find('.fosfocil').val());
        $("#ciprofloxacina").val($(this).closest('tr').find('.ciprofloxacina').val());
        $("#penicilina").val($(this).closest('tr').find('.penicilina').val());
        $("#vancomicina").val($(this).closest('tr').find('.vancomicina').val());
        $("#acidoNalidixico").val($(this).closest('tr').find('.acidoNalidixico').val());
        $("#gentamicina").val($(this).closest('tr').find('.gentamicina').val());
        $("#nitrofurantoina").val($(this).closest('tr').find('.nitrofurantoina').val());
        $("#ceftazimide").val($(this).closest('tr').find('.ceftazimide').val());
        $("#cefotaxime").val($(this).closest('tr').find('.cefotaxime').val());
        $("#clindamicina").val($(this).closest('tr').find('.clindamicina').val());
        $("#trimetropimSulfa").val($(this).closest('tr').find('.trimetropimSulfa').val());
        $("#ampicilina").val($(this).closest('tr').find('.ampicilina').val());
        $("#piperacilina").val($(this).closest('tr').find('.piperacilina').val());
        $("#amoxicilina").val($(this).closest('tr').find('.amoxicilina').val());
        $("#claritromicina").val($(this).closest('tr').find('.claritromicina').val());
        $("#cefuroxime").val($(this).closest('tr').find('.cefuroxime').val());
        $("#cefepime").val($(this).closest('tr').find('.cefepime').val());
        $("#metronidazol").val($(this).closest('tr').find('.metronidazol').val());
        $("#norfloxacina").val($(this).closest('tr').find('.norfloxacina').val());
        $("#tobramicina").val($(this).closest('tr').find('.tobramicina').val());
        $("#ertapenem").val($(this).closest('tr').find('.ertapenem').val());
        $("#doripenem").val($(this).closest('tr').find('.doripenem').val());
        $("#colistin").val($(this).closest('tr').find('.colistin').val());
        $("#linezolid").val($(this).closest('tr').find('.linezolid').val());
        $("#moxifloxacino").val($(this).closest('tr').find('.moxifloxacino').val());
        $("#kanamicina").val($(this).closest('tr').find('.kanamicina').val());
        $("#aztreonam").val($(this).closest('tr').find('.aztreonam').val());
        $("#cefaclor").val($(this).closest('tr').find('.cefaclor').val());
        $("#cefazolina").val($(this).closest('tr').find('.cefazolina').val());
        $("#tetraciclina").val($(this).closest('tr').find('.tetraciclina').val());
        $("#observacionBacteriologia").val($(this).closest('tr').find('.observacionExamen').val());
        $("#idBacteriologia").val($(this).closest('tr').find('.idBacteriologia').val());

















































    });

    $(document).on("click", ".verBosquejo", function(e){
        e.preventDefault();
        $("#encabezadoExamenV").val($(this).closest('tr').find('.encabezadoBosquejo').val());
        $("#indicadoExamenV").val($(this).closest('tr').find('.examenBosquejo').val());
        $(".note-editable").html(checkUTF8(atob($(this).closest('tr').find('.detalleBosquejo').val())))


    });


    $(document).on("click", "#btnGuardarBosquejo", function(e){
        e.preventDefault();

        var datos = {
            encabezado: $("#encabezadoExamenV").val(),
            examenV: $("#indicadoExamenV").val(),
            detalle: $(".note-editable").html()
        }

        $.ajax({
            url: "../../guardar_bosquejo",
            type: "POST",
            data: datos,
            success:function(respuesta){
                var registro = eval(respuesta);
                if (Object.keys(registro).length > 0){
                        if(registro.estado == 1){
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
                            toastr.success('Datos agregados con exito', 'Aviso!');
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
                            toastr.error(registro.respuesta, 'Aviso!');
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
                        toastr.error(registro.respuesta, 'Aviso!');

                    }
            }
        });

    });

    $(document).on("click", "#btnGuardarExamen", function(e){
        e.preventDefault();

        var datos = {
            fecha: $("#fechaExamenV").val(),
            encabezado: $("#encabezadoExamenV").val(),
            examenV: $("#indicadoExamenV").val(),
            detalle: $(".note-editable").html(),
            idExamen: $("#idExamenV").val(),
            idConsulta: $("#idConsultaV").val()
            
        }

        $.ajax({
            url: "../../guardar_varios_lab",
            type: "POST",
            data: datos,
            success:function(respuesta){
                var registro = eval(respuesta);
                if (Object.keys(registro).length > 0){
                        if(registro.estado == 1){
                            location.reload();
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
                            toastr.error(registro.respuesta, 'Aviso!');
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
                        toastr.error(registro.respuesta, 'Aviso!');

                    }
            }
        });

    });

    $(document).on("click", "#btnNuevoExamen", function(e){
        e.preventDefault();

        var datos = {
            idConsulta: $("#idConsultaV").val()
        }

        $.ajax({
            url: "../../nuevo_varios_lab",
            type: "POST",
            data: datos,
            success:function(respuesta){
                var registro = eval(respuesta);
                if (Object.keys(registro).length > 0){
                    if(registro.estado == 1){
                        location.reload();
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
                        toastr.error(registro.respuesta, 'Aviso!');
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
                    toastr.error(registro.respuesta, 'Aviso!');

                }
            }
        });

    });

    $(document).on("click", ".verVarios", function(e){
        e.preventDefault();
        $("#fechaExamenV").val($(this).closest('tr').find('.fechaExamen').val());
        $("#encabezadoExamenV").val($(this).closest('tr').find('.encabezadoVarios').val());
        $("#indicadoExamenV").val($(this).closest('tr').find('.nombreExamen').val());
        $(".note-editable").html(checkUTF8(atob($(this).closest('tr').find('.detalleVarios').val())))
        $("#idExamenV").val($(this).closest('tr').find('.idVarios').val());

    });

    function checkUTF8(text) {
        var utf8Text = text;
        try {
            // Try to convert to utf-8
            utf8Text = decodeURIComponent(escape(text));
            // If the conversion succeeds, text is not utf-8
        }catch(e) {
            // console.log(e.message); // URI malformed
            // This exception means text is utf-8
        }   
        return utf8Text; // returned text is always utf-8
    }

</script>
