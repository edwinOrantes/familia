<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        /* background-image: url('public/img/test2_bg.jpg') ; */
        background-size: cover;        
        background-repeat: no-repeat;
        padding: 0;
        margin: 0;
    }
    #cabecera {
        text-align: left;
        width: 100%;
        margin: auto;
        }

    #lateral {
        width: 40%;  /* Este será el ancho que tendrá tu columna */
        float:left; /* Aquí determinas de lado quieres quede esta "columna" */
        padding-top: -20px;
        }

    #principal {
        width: 60%;
        float: right;
        }
        
    /* Para limpiar los floats */
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
        }

    .borderAzul{
        color: #000000;
        font-size: 13px;
    }

    .proveedor .detalle table, .medicamentos .detalle table{
        font-size: 12px;
        margin: auto;
        width: 100%;
    }
    .proveedor .detalle table tr td{
        padding: 5px;
        text-align: left;
        font-size: 12px;
        border: 1px solid #075480;
    }

    .medicamentos{
        text-align: center;
    }

    .medicamentos .detalle table tr td{
        padding: 2px !important;
        font-size: 12px;
        color: #000000;
        border: 1px solid #075480;
    }

    #tablaPaciente{
        width: 100%;
    }

    #imgAgua{
        margin: 0 auto;
        width: 75%;
    }
    #marcaAgua{
        width: 450px;
        margin: 0 auto;
        opacity: 0.1;
    }

    .detalle{
        margin-top: 25px;
    }
    .table{
        border-collapse: collapse;
        margin-top: 25px;
    }
    
    .detalle .table tr th{
        color: #fff;
        font-size: 12px;
        padding: 5px 10px 5px 10px;
    }

    .detalle .table tr td{
        font-size: 12px;
        font-weight: bold;
        height: 25px;
    }
</style>

<div>
    <div id="cabecera" class="clearfix">

        <div id="lateral">
            <p><img src="<?php echo base_url() ?>public/img/logo.jpg" alt="Logo hospital Orellana" width="250"></p>
        </div>

        <div id="principal">
            <table style="text-align: center; margin-left: 20px">
                <tr>
                    <td><h5 style="line-height: 20px">Avenida Ferrocarril, #51 Barrio la Cruz, <br> frente a la Iglesia Adventista, El Tránsito, San Miguel, PBX: 2605-6298</h5></td>
                </tr>
                <tr>
                    <td><h5 style="line-height: 20px">C.S.S.P. N° 2059</h5></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="contenedor">
        <div class="medicamentos">
            
            <div style="border: 2px solid #075480; padding-top: 10px; padding-bottom: 0px;">
                <div class="">
                    <table id="tablaPaciente" cellspacing=10>
                        <tr>
                            <td><strong class="borderAzul">Paciente:</strong></td>
                            <td><p class="borderAzul"><?php echo $cabecera->nombrePaciente; ?></p></td>
                            <td><strong class="borderAzul">Edad:</strong></td>
                            <td><p class="borderAzul"><?php echo $cabecera->edadPaciente; ?> Años</p></td>
                        </tr>
                        
                        <tr>
                            <td><strong class="borderAzul">Médico:</strong></td>
                            <td><p class="borderAzul"><?php echo $cabecera->nombreMedico; ?></p></td>
                            <td><strong class="borderAzul">Fecha:</strong></td>
                            <td><p class="borderAzul"><?php echo substr($cabecera->fechaDetalleConsulta, 0, 10)." ".$cabecera->horaDetalleConsulta; ?></p></td>
                        </tr>
                        
                    </table>
                </div>
            </div>
            
            <p style="font-size: 12px; color: #075480"><strong>RESULTADOS EXAMEN GENERAL DE HECES</strong></p>
            <div class="detalle">
                <table class="table" style="margin-top: -15px;">
                    <thead>
                        <tr style="background: #075480;">
                            <th colspan="2"> Parametro </th>
                            <th colspan="2"> Resultado </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($cropologia->colorCropologia != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Color</strong></td>
                                        <td colspan="2" style="text-align: center;">'.$cropologia->colorCropologia.'</td>
                                    </tr>';
                            }
                            if($cropologia->consistenciaCropologia != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Consistencia</strong></td>
                                        <td colspan="2" style="text-align: center;">'.$cropologia->consistenciaCropologia.'</td>
                                    </tr>';
                            }
                            if($cropologia->mucusCropologia != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Mucus</strong></td>
                                        <td colspan="2" style="text-align: center;">'.$cropologia->mucusCropologia.'</td>
                                    </tr>';
                            }
                            if($cropologia->hematiesCropologia != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Hematíes</strong></td>
                                        <td colspan="2" style="text-align: center;">'.$cropologia->hematiesCropologia.' x campo</td>
                                    </tr>';
                            }
                            if($cropologia->leucocitosCropologia != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Leucocitos</strong></td>
                                        <td colspan="2" style="text-align: center;">'.$cropologia->leucocitosCropologia.' x campo</td>
                                    </tr>';
                            }

                            echo '<tr>
                                    <th colspan="4" style="color: #075480; text-align: center; font-size: 12px; background: rgba(7, 84, 128, 0.1); height: 25px" ><strong>METAZOARIOS</strong></th>
                                </tr>';
                            if($cropologia->ascarisCropologia != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Ascaris lumbricoides</strong></td>
                                        <td colspan="2" style="text-align: center;">'.$cropologia->ascarisCropologia.'</td>
                                    </tr>';
                            }
                            if($cropologia->hymenolepisCropologia != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Hymenolepis</strong></td>
                                        <td colspan="2" style="text-align: center;">'.$cropologia->hymenolepisCropologia.'</td>
                                    </tr>';
                            }
                            if($cropologia->uncinariasCropologia != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Uncinarias</strong></td>
                                        <td colspan="2" style="text-align: center;">'.$cropologia->uncinariasCropologia.'</td>
                                    </tr>';
                            }
                            if($cropologia->tricocefalosCropologia != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Trichuris trichiura</strong></td>
                                        <td colspan="2" style="text-align: center;">'.$cropologia->tricocefalosCropologia.'</td>
                                    </tr>';
                            }
                            if($cropologia->larvaStrongyloides != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Larva strongyloides stercoralis </strong></td>
                                        <td colspan="2" style="text-align: center;">'.$cropologia->larvaStrongyloides.'</td>
                                    </tr>';
                            }

                            echo '<tr>
                                    <th colspan="4" style="color: #075480; color: #075480; text-align: center; font-size: 12px; background: rgba(7, 84, 128, 0.1); height: 25px"><strong>PROTOZOARIOS</strong></th>
                                </tr>';
                            echo '<tr>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center; color: #075480;"><strong>Quistes</strong></td>
                                    <td style="text-align: center; color: #075480;"><strong>Trofozoitos</strong></td>
                                </tr>';
                            if($cropologia->histolyticaQuistes != "" || $cropologia->histolyticaTrofozoitos != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Entamoeba histolytica</strong></td>
                                        <td style="text-align: center;">'.$cropologia->histolyticaQuistes.'</td>
                                        <td style="text-align: center;">'.$cropologia->histolyticaTrofozoitos.'</td>
                                    </tr>';
                            }
                            if($cropologia->coliQuistes != "" || $cropologia->coliTrofozoitos != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Entamoeba coli</strong></td>
                                        <td style="text-align: center;">'.$cropologia->coliQuistes.'</td>
                                        <td style="text-align: center;">'.$cropologia->coliTrofozoitos.'</td>
                                    </tr>';
                            }
                            if($cropologia->giardiaQuistes != "" || $cropologia->giardiaTrofozoitos != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Giardia lamblia</strong></td>
                                        <td style="text-align: center;">'.$cropologia->giardiaQuistes.'</td>
                                        <td style="text-align: center;">'.$cropologia->giardiaTrofozoitos.'</td>
                                    </tr>';
                            }
                            if($cropologia->blastocystisQuistes != "" || $cropologia->blastocystisTrofozoitos != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Blastocystis hominis</strong></td>
                                        <td style="text-align: center;">'.$cropologia->blastocystisQuistes.'</td>
                                        <td style="text-align: center;">'.$cropologia->blastocystisTrofozoitos.'</td>
                                    </tr>';
                            }
                            if($cropologia->tricomonasQuistes != "" || $cropologia->tricomonasTrofozoitos != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Tricomonas hominis</strong></td>
                                        <td style="text-align: center;">'.$cropologia->tricomonasQuistes.'</td>
                                        <td style="text-align: center;">'.$cropologia->tricomonasTrofozoitos.'</td>
                                    </tr>';
                            }
                            if($cropologia->mesnilliQuistes != "" || $cropologia->mesnilliTrofozoitos != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Chilomastix mesnilli</strong></td>
                                        <td style="text-align: center;">'.$cropologia->mesnilliQuistes.'</td>
                                        <td style="text-align: center;">'.$cropologia->mesnilliTrofozoitos.'</td>
                                    </tr>';
                            }
                            if($cropologia->nanaQuistes != "" || $cropologia->nanaTrofozoitos != ""){
                                echo '<tr>
                                        <td colspan="2"><strong class="">Endolimax nana</strong></td>
                                        <td style="text-align: center;">'.$cropologia->nanaQuistes.'</td>
                                        <td style="text-align: center;">'.$cropologia->nanaTrofozoitos.'</td>
                                    </tr>';
                            }

                            if($cropologia->restosMacroscopicos != "" && $cropologia->restosMicroscopicos != ""){
                                echo '<tr>
                                    <th colspan="4" style="color: #075480; color: #075480; color: #075480; text-align: center; font-size: 12px; background: rgba(7, 84, 128, 0.1); height: 25px"><strong>RESTOS ALIMENTICIOS</strong></th>
                                </tr>';
                                if($cropologia->restosMacroscopicos != ""){
                                    echo '<tr>
                                            <td colspan="2"><strong class="borderAzul">Restos Alimenticios Macroscópicos</strong></td>
                                            <td colspan="2" style="text-align: center;">'.$cropologia->restosMacroscopicos.'</td>
                                        </tr>';
                                }
                                if($cropologia->restosMicroscopicos != ""){
                                    echo '<tr>
                                            <td colspan="2"><strong class="borderAzul">Restos Alimenticios Microscópicos</strong></td>
                                            <td colspan="2" style="text-align: center;">'.$cropologia->restosMicroscopicos.'</td>
                                        </tr>';
                                }
                            }

                        ?>
                       
                    </tbody>
                </table>


                <table class="table" style="margin-top: 10px;">
                    <thead></thead>
                    <tbody>
                        <?php
                            if($cropologia->observacionesCropologia != ""){
                                echo '<tr>
                                        <td style="width: 200"><strong class="">Observaciones</strong></td>
                                        <td colspan=3>'.$cropologia->observacionesCropologia.'</td>
                                    </tr>';
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <div id="imgAgua" style="margin-top: -400px;">  
        <img src="<?php echo base_url(); ?>public/img/logo.png" alt="Logo hospital orellana" id="marcaAgua">
    </div> -->
</div>