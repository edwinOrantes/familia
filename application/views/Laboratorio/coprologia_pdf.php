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
        margin-bottom: 10px;
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
        margin-top: -100px;
    }

    .detalle{
        margin-top: 15px;
    }
    .table{
        border-collapse: collapse;
        margin-top: 25px;
    }
    
    .detalle .table tr th{
        color: #fff;
        padding: 5px 40px 5px 40px;
        height: 30px;
        border: 1px solid #075480;
    }

    .detalle .table tr td{
        height: 30px;
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
            <div style="border: 2px solid #075480; padding-top: 10px; padding-bottom: 15px;">
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
                            <td><p class="borderAzul"><?php echo $cabecera->fechaConsulta." ".$cabecera->hora; ?></p></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <p style="font-size: 12px; color: #075480; margin-top: 25px"><strong>RESULTADOS EXAMEN DE COPROLOGIA</p>
            <div class="detalle">
                <table class="table">
                    <thead>
                        <tr style="background: #075480;">
                            <th> Parametro </th>
                            <th> Resultado </th>
                            <th> Unidades </th>
                            <th> Valores de referencia </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if($coprologia->color != ""){
                                echo '<tr>
                                        <td><strong>Color</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->color.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">55-110 mg/dl</td>
                                    </tr>';
                            }
                            if($coprologia->consistencia != ""){
                                echo '<tr>
                                        <td><strong>Consistencia</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->consistencia.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">140 mg/dl</td>
                                    </tr>';
                            }
                            if($coprologia->mucus != ""){
                                echo '<tr>
                                        <td><strong>Mucus</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->mucus.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Menor de 200 mg/dl</td>
                                    </tr>';
                            }
                            if($coprologia->hematies != ""){
                                echo '<tr>
                                        <td><strong>Hematies</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->hematies.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">35-65 mg/dl</td>
                                    </tr>';
                            }
                            if($coprologia->leucocitos != ""){
                                echo '<tr>
                                        <td><strong>Leucocitos</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->leucocitos.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Menor de 150 mg/dl</td>
                                    </tr>';
                            }
                            if($coprologia->bacterias != ""){
                                echo '<tr>
                                        <td><strong>Bacterias</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->bacterias.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Menor de 150 mg/dl</td>
                                    </tr>';
                            }
                            if($coprologia->levaduras != ""){
                                echo '<tr>
                                        <td><strong>Levaduras</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->levaduras.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">2.5-7.0 mg/dl</td>
                                    </tr>';
                            }
                            if($coprologia->restosAM != ""){
                                echo '<tr>
                                        <td><strong>Restos Alim. Microsc. </strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->restosAM.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">10.0 a 48.1 mg/dl</td>
                                    </tr>';
                            }
                            if($coprologia->otrosUno != ""){
                                echo '<tr>
                                        <td><strong>Otros</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->otrosUno.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">4.7-22.5 mg/dl</td>
                                    </tr>';
                            }
                            if($coprologia->otrosDos != ""){
                                echo '<tr>
                                        <td><strong>Otros/strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->otrosDos.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">0.7-1.4 mg/dl</td>
                                    </tr>';
                            }
                            if($coprologia->histolyticaT != ""){
                                echo '<tr>
                                        <td><strong>Entamoeba Histolytica</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->histolyticaT.'</td>
                                        <td style="text-align: center; font-weight: bold">U/L</td>
                                        <td style="text-align: center; font-weight: bold">Menor de 90 U/L</td>
                                    </tr>';
                            }
                            if($coprologia->histolyticaT != ""){
                                echo '<tr>
                                        <td><strong>Entamoeba Histolytica</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->histolyticaQ.'</td>
                                        <td style="text-align: center; font-weight: bold">U/L</td>
                                        <td style="text-align: center; font-weight: bold">Menor de 90 U/L</td>
                                    </tr>';
                            }
                            if($coprologia->ascarisH != ""){
                                echo '<tr>
                                        <td><strong>Ascaris lumbricoides</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->ascarisH.'</td>
                                        <td style="text-align: center; font-weight: bold">U/L</td>
                                        <td style="text-align: center; font-weight: bold">Menor de 38 U/L</td>
                                    </tr>';
                            }
                            if($coprologia->ascarisL != ""){
                                echo '<tr>
                                        <td><strong>Ascaris lumbricoides</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->ascarisL.'</td>
                                        <td style="text-align: center; font-weight: bold">U/L</td>
                                        <td style="text-align: center; font-weight: bold">98-279 U/L</td>
                                    </tr>';
                            }
                            if($coprologia->coliT != ""){
                                echo '<tr>
                                        <td><strong>Entamoeba Coli</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->coliT.'</td>
                                        <td style="text-align: center; font-weight: bold">U/L</td>
                                        <td style="text-align: center; font-weight: bold">1-40 U/L</td>
                                    </tr>';
                            }
                            if($coprologia->coliQ != ""){
                                echo '<tr>
                                        <td><strong>Entamoeba Coli</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->coliQ.'</td>
                                        <td style="text-align: center; font-weight: bold">U/L</td>
                                        <td style="text-align: center; font-weight: bold">1-38 U/L</td>
                                    </tr>';
                            }
                            if($coprologia->trinchiuraH != ""){
                                echo '<tr>
                                        <td><strong>Trichuris trinchiura</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->trinchiuraH.'</td>
                                        <td style="text-align: center; font-weight: bold">%</td>
                                        <td style="text-align: center; font-weight: bold">4.5-6.5%</td>
                                    </tr>';
                            }
                            if($coprologia->trinchiuraL != ""){
                                echo '<tr>
                                        <td><strong>Trichuris trinchiura</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->trinchiuraL.'</td>
                                        <td style="text-align: center; font-weight: bold">g/dl</td>
                                        <td style="text-align: center; font-weight: bold">6.7-8.7 d/dl</td>
                                    </tr>';
                            }
                            if($coprologia->nanaT != ""){
                                echo '<tr>
                                        <td><strong>Endolimax Nana</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->nanaT.'</td>
                                        <td style="text-align: center; font-weight: bold">g/dl</td>
                                        <td style="text-align: center; font-weight: bold">3.5-5.0 g/dl</td>
                                    </tr>';
                            }
                            if($coprologia->nanaQ != ""){
                                echo '<tr>
                                        <td><strong>Endolimax Nana</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->nanaQ.'</td>
                                        <td style="text-align: center; font-weight: bold">g/dl</td>
                                        <td style="text-align: center; font-weight: bold">2.3-3.4 g/dl</td>
                                    </tr>';
                            }
                            if($coprologia->guodH != ""){
                                echo '<tr>
                                        <td><strong>Ancylostoma guod</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->guodH.'</td>
                                        <td style="text-align: center; font-weight: bold"></td>
                                        <td style="text-align: center; font-weight: bold">1.2-2.2</td>
                                    </tr>';
                            }
                            if($coprologia->guodL != ""){
                                echo '<tr>
                                        <td><strong>Ancylostoma guod</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->guodL.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Hasta 1.1 mg/dl</td>
                                    </tr>';
                            }
                            if($coprologia->mesniliT != ""){
                                echo '<tr>
                                        <td><strong>Chilomastic mesnili</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->mesniliT.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Hasta 0.25 mg/dl</td>
                                    </tr>';
                            }
                            if($coprologia->mesniliQ != ""){
                                echo '<tr>
                                        <td><strong>Chilomastic mesnili</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->mesniliQ.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold"></td>
                                    </tr>';
                            }
                            if($coprologia->vermicH != ""){
                                echo '<tr>
                                        <td><strong>Enterobios vermic</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->vermicH.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->vermicL != ""){
                                echo '<tr>
                                        <td><strong>Enterobios vermic</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->vermicL.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->lambiaT != ""){
                                echo '<tr>
                                        <td><strong>Giardia Lambia</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->lambiaT.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->lambiaQ != ""){
                                echo '<tr>
                                        <td><strong>Giardia Lambia</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->lambiaQ.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->stercoH != ""){
                                echo '<tr>
                                        <td><strong>Strongiloides Sterco</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->stercoH.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->stercoL != ""){
                                echo '<tr>
                                        <td><strong>Strongiloides Sterco</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->stercoL.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->hominisT != ""){
                                echo '<tr>
                                        <td><strong>Tricomonas hominis</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->hominisT.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->hominisQ != ""){
                                echo '<tr>
                                        <td><strong>Tricomonas hominis</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->hominisQ.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->hymenolepisH != ""){
                                echo '<tr>
                                        <td><strong>Hymenolepis nana</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->hymenolepisH.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->hymenolepisL != ""){
                                echo '<tr>
                                        <td><strong>Hymenolepis nana</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->hymenolepisL.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->balantidiumT != ""){
                                echo '<tr>
                                        <td><strong>Balantidium coli</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->balantidiumT.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->balantidiumQ != ""){
                                echo '<tr>
                                        <td><strong>Balantidium coli</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->balantidiumQ.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->taeniasH != ""){
                                echo '<tr>
                                        <td><strong>Taenias</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->taeniasH.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->taeniasL != ""){
                                echo '<tr>
                                        <td><strong>Taenias</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->taeniasL.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->blastocystisT != ""){
                                echo '<tr>
                                        <td><strong>Blastocystis</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->blastocystisT.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->blastocystisQ != ""){
                                echo '<tr>
                                        <td><strong>Blastocystis</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->blastocystisQ.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->otrosH != ""){
                                echo '<tr>
                                        <td><strong>Otros</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->otrosH.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->otrosL != ""){
                                echo '<tr>
                                        <td><strong>Otros</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$coprologia->otrosL.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($coprologia->observacionesC != ""){
                                echo '<tr>
                                        <td><strong>Observaciones</strong></td>
                                        <td style="text-align: center; font-weight: bold" colspan=3>'.$coprologia->observacionesU.'</td>
                                    </tr>';
                            }

                        ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>