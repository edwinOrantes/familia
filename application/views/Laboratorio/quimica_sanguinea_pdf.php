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
                            <td><p class="borderAzul"><?php echo $cabecera->fechaConsulta." ".date("g:i A", strtotime($cabecera->hora)); ?></p></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <p style="font-size: 12px; color: #075480; margin-top: 25px"><strong>RESULTADOS EXAMEN QUIMICA SANGUINEA</p>
            <div class="detalle">
                <table class="table">
                    <thead>
                        <tr style="background: #075480;">
                            <th> Parametro </th>
                            <th> Resultado </th>
                            <th> Valores de referencia </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if($quimica->glucosa != ""){
                                echo '<tr>
                                        <td><strong>Glucosa</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->glucosa.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">55-110 mg/dl</td>
                                    </tr>';
                            }
                            if($quimica->glucosaPostPrand != ""){
                                echo '<tr>
                                        <td><strong>Glucosa Post-Prand</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->glucosaPostPrand.'</td>
                                        <td style="text-align: center; font-weight: bold">--</td>
                                    </tr>';
                            }
                            if($quimica->globulina != ""){
                                echo '<tr>
                                        <td><strong>Globulina</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->globulina.' g/dl</td>
                                        <td style="text-align: center; font-weight: bold">2.3-3.4 g/dl</td>
                                    </tr>';
                            }
                            if($quimica->trigliceridos != ""){
                                echo '<tr>
                                        <td><strong>Trigliceridos</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->trigliceridos.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Hasta 15 mg/dl</td>
                                    </tr>';
                            }
                            if($quimica->colesterol != ""){
                                echo '<tr>
                                        <td><strong>Colesterol</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->colesterol.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Hasta 200 mg/dl</td>
                                    </tr>';
                            }
                            if($quimica->colesterolHDL != ""){
                                echo '<tr>
                                        <td><strong>Colesterol H.D.L</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->colesterolHDL.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">35-65 mg/dl</td>
                                    </tr>';
                            }
                            if($quimica->colesterolLDL != ""){
                                echo '<tr>
                                        <td><strong>Colesterol L.D.L</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->colesterolLDL.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Hasta 150 mg/dl</td>
                                    </tr>';
                            }
                            if($quimica->acidoUrico != ""){
                                echo '<tr>
                                        <td><strong>Ácido Úrico</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->acidoUrico.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">2.5-7.0 mg/dl</td>
                                    </tr>';
                            }
                            if($quimica->creatinina != ""){
                                echo '<tr>
                                        <td><strong>Creatinina</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->creatinina.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">0.7-1.4 mg/dl</td>
                                    </tr>';
                            }
                            if($quimica->nitrogeno != ""){
                                echo '<tr>
                                        <td><strong>Nitrógeno</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->nitrogeno.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">4.7-22.5 mg/dl</td>
                                    </tr>';
                            }
                            if($quimica->proteinasT != ""){
                                echo '<tr>
                                        <td><strong>Proteinas totales</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->proteinasT.' g/dl</td>
                                        <td style="text-align: center; font-weight: bold">6.7-8.7 g/dl</td>
                                    </tr>';
                            }
                            if($quimica->bilirrubina != ""){
                                echo '<tr>
                                        <td><strong>Bilirrubina</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->bilirrubina.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Hasta 1.1 mg/dl</td>
                                    </tr>';
                            }
                            if($quimica->tgo != ""){
                                echo '<tr>
                                        <td><strong>T.G.O</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->tgo.' U/L</td>
                                        <td style="text-align: center; font-weight: bold">Menos de 38 U/L</td>
                                    </tr>';
                            }
                            if($quimica->tgp != ""){
                                echo '<tr>
                                        <td><strong>T.G.P</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->tgp.' U/L</td>
                                        <td style="text-align: center; font-weight: bold">Menos de 40 U/L</td>
                                    </tr>';
                            }

                            if($quimica->fosfatasa != ""){
                                echo '<tr>
                                        <td><strong>Fosfatasa acida Prost.</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->fosfatasa.' U/L</td>
                                        <td style="text-align: center; font-weight: bold">Menos 1.7 U/L</td>
                                    </tr>';
                            }
                            
                            if($quimica->lipasa != ""){
                                echo '<tr>
                                        <td><strong>Lipasa</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->lipasa.' U/L</td>
                                        <td style="text-align: center; font-weight: bold">Menos de 38 U/L</td>
                                    </tr>';
                            }
                            
                            if($quimica->amilasa != ""){
                                echo '<tr>
                                        <td><strong>Amilasa</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->amilasa.' U/L</td>
                                        <td style="text-align: center; font-weight: bold">Menos de 90 U/L</td>
                                    </tr>';
                            }
                            
                            if($quimica->indiceAG != ""){
                                echo '<tr>
                                        <td><strong>Indice A/G</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->indiceAG.'</td>
                                        <td style="text-align: center; font-weight: bold">1.2-2.2</td>
                                    </tr>';
                            }
                            
                            if($quimica->bilirrubinaD != ""){
                                echo '<tr>
                                        <td><strong>Bilirrubina directa</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->bilirrubinaD.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Hasta 0.25 mg/dl</td>
                                    </tr>';
                            }
                            
                            if($quimica->bilirrubinaI != ""){
                                echo '<tr>
                                        <td><strong>Bilirrubina indirecta</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->bilirrubinaI.'</td>
                                        <td style="text-align: center; font-weight: bold">---</td>
                                    </tr>';
                            }
                            
                            if($quimica->albumina != ""){
                                echo '<tr>
                                        <td><strong>Albumina</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->albumina.' g/dl</td>
                                        <td style="text-align: center; font-weight: bold">3.5-5.0 g/dl</td>
                                    </tr>';
                            }
                            
                            

                            if($quimica->fosforo != ""){
                                echo '<tr>
                                        <td><strong>Fosforo</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->fosforo.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">2.5-5.0 mg/dl</td>
                                    </tr>';
                            }
                            
                            if($quimica->cloro != ""){
                                echo '<tr>
                                        <td><strong>Cloro</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->cloro.' mmol/l</td>
                                        <td style="text-align: center; font-weight: bold">95-115mmol/l</td>
                                    </tr>';
                            }
                            
                            if($quimica->calcio != ""){
                                echo '<tr>
                                        <td><strong>Calcio</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->calcio.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">8.1-10.4 mg/dl</td>
                                    </tr>';
                            }
                            
                            if($quimica->potasio != ""){
                                echo '<tr>
                                        <td><strong>Potasio</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->potasio.' mmol/l</td>
                                        <td style="text-align: center; font-weight: bold">3.6-5.5 mmol/l</td>
                                    </tr>';
                            }
                            
                            if($quimica->sodio != ""){
                                echo '<tr>
                                        <td><strong>Sodio</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->sodio.' mmol/l</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/l</td>
                                    </tr>';
                            }
                            
                            if($quimica->magnesio != ""){
                                echo '<tr>
                                        <td><strong>Magnesio</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->magnesio.' mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">1.6-2.5 mg/dl</td>
                                    </tr>';
                            }
                            
                            if($quimica->fosfatasaA != ""){
                                echo '<tr>
                                        <td><strong>Fosfatasa alcalina</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$quimica->fosfatasaA.' U/L</td>
                                        <td style="text-align: center; font-weight: bold">98-279 U/L</td>
                                    </tr>';
                            }                           
                            if($quimica->observacionesQS != ""){
                                echo '<tr>
                                        <td><strong>Observaciones</strong></td>
                                        <td style="text-align: center; font-weight: bold" colspan=3>'.$quimica->observacionesQS.'</td>
                                    </tr>';
                            }

                        ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>