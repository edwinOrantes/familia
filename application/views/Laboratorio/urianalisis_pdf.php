<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        background-image: url('public/img/bg_cm.jpg') ;
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
            <table style="text-align: center; margin-left: 50px">
                <tr>
                    <td><h3 style="line-height: 20px;">Avenida Ferrocarril, #51 Barrio la Cruz, <br> El Tránsito, San Miguel, PBX: 2605-6298</h3></td>
                </tr>
                <tr>
                    <td><h2 style="line-height: 20px">C.S.S.P. N° 2059</h2></td>
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
            
            <p style="font-size: 12px; color: #075480; margin-top: 25px"><strong>URIANALISIS</p>
            <div class="detalle">

                <table class="table">
                    <tr style="background: #075480;">
                        <th colspan="4">EXAMEN FISICO QUIMICO</th>
                    </tr>
                    <tr>
                        <td><strong>Color</strong></td>
                        <td> <?php echo $urianalisis->color; ?></td>
                        <td><strong>Aspecto</strong></td>
                        <td><?php echo $urianalisis->aspecto; ?></td>
                    </tr>

                    <tr>
                        <td><strong>Reacción</strong></td>
                        <td> <?php echo $urianalisis->reaccion; ?></td>
                        <td><strong>Densidad</strong></td>
                        <td><?php echo $urianalisis->densidad; ?></td>
                    </tr>

                    <tr>
                        <td><strong>P.H.</strong></td>
                        <td><?php echo $urianalisis->ph; ?></td>
                        <td><strong>Glucosa</strong></td>
                        <td><?php echo $urianalisis->glucosa; ?></td>
                    </tr>

                    <tr>
                        <td><strong>Proteinas</strong></td>
                        <td> <?php echo $urianalisis->proteinas; ?></td>
                        <td><strong>Pigmentos Biliares</strong></td>
                        <td><?php echo $urianalisis->pigmentosB; ?></td>
                    </tr>

                    <tr>
                        <td><strong>Sangre oculta</strong></td>
                        <td> <?php echo $urianalisis->sangreO; ?></td>
                        <td><strong>Nitritos</strong></td>
                        <td><?php echo $urianalisis->nitritos; ?></td>
                    </tr>

                    <tr>
                        <td><strong>Cuerpos Cetonicos</strong></td>
                        <td> <?php echo $urianalisis->cuerposC; ?> </td>
                        <td><strong>Acidos Biliares</strong></td>
                        <td><?php echo $urianalisis->acidosBiliares; ?></td>
                    </tr>

                    <tr style="background: #075480;">
                        <th colspan="4">EXAMEN MICROSCOPICO</th>
                    </tr>

                    <tr>
                        <td><strong>Granulosos</strong></td>
                        <td> <?php echo $urianalisis->granulosos; ?></td>
                        <td><strong>Cilindros leucocitarios</strong></td>
                        <td> <?php echo $urianalisis->cilindrosL; ?> </td>
                    </tr>

                    <tr>
                        <td><strong>Cilindros Hialinos</strong></td>
                        <td> <?php echo $urianalisis->cilindrosH; ?> </td>
                        <td><strong>Otros cilindros</strong></td>
                        <td> <?php echo $urianalisis->otrosCilindros; ?> </td>
                    </tr>

                    <tr>
                        <td><strong>Leucositos</strong></td>
                        <td> <?php echo $urianalisis->leucositos; ?> </td>
                        <td><strong>Hematies</strong></td>
                        <td> <?php echo $urianalisis->hematies; ?> </td>
                    </tr>

                    <tr>
                        <td><strong>Celulas Epiteliales</strong></td>
                        <td> <?php echo $urianalisis->celulasE; ?> </td>
                        <td><strong>Elementos minerales</strong></td>
                        <td> <?php echo $urianalisis->elementosM; ?> </td>
                    </tr>

                    <tr>
                        <td><strong>Bacterias</strong></td>
                        <td> <?php echo $urianalisis->bacterias; ?></td>
                        <td><strong>Levadura</strong></td>
                        <td> <?php echo $urianalisis->levadura; ?> </td>
                    </tr>

                    <tr>
                        <td><strong>Otros</strong></td>
                        <td> <?php echo $urianalisis->otrosUno; ?> </td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><strong>Observaciones</strong></td>
                        <td colspan=3><?php echo $urianalisis->observacionesU; ?></td>
                    </tr>


                </table>

                <!-- <table class="table">
                    <thead>
                        <tr style="background: #075480;">
                            <th> Parametro </th>
                            <th> Resultado </th>
                            <th> Unidades </th>
                            <th> Valores de referencia </th>
                        </tr>
                    </thead>
                    <tbody> -->

                        <!-- <?php

                            if($urianalisis->color != ""){
                                echo '<tr>
                                        <td><strong>Color</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->color.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">55-110 mg/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->aspecto != ""){
                                echo '<tr>
                                        <td><strong>Aspecto</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->aspecto.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">140 mg/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->reaccion != ""){
                                echo '<tr>
                                        <td><strong>Reacción</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->reaccion.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Menor de 200 mg/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->densidad != ""){
                                echo '<tr>
                                        <td><strong>Densidad</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->densidad.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">35-65 mg/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->ph != ""){
                                echo '<tr>
                                        <td><strong>P.H.</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->ph.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Menor de 150 mg/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->glucosa != ""){
                                echo '<tr>
                                        <td><strong>Glucosa</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->glucosa.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Menor de 150 mg/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->proteinas != ""){
                                echo '<tr>
                                        <td><strong>Proteinas</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->proteinas.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">2.5-7.0 mg/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->pigmentosB != ""){
                                echo '<tr>
                                        <td><strong>Pigmentos Biliares</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->pigmentosB.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">10.0 a 48.1 mg/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->sangreO != ""){
                                echo '<tr>
                                        <td><strong>Sangre oculta</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->sangreO.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">4.7-22.5 mg/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->nitritos != ""){
                                echo '<tr>
                                        <td><strong>Nitritos/strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->nitritos.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">0.7-1.4 mg/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->cuerposC != ""){
                                echo '<tr>
                                        <td><strong>Cuerpos Cetonicos</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->cuerposC.'</td>
                                        <td style="text-align: center; font-weight: bold">U/L</td>
                                        <td style="text-align: center; font-weight: bold">Menor de 90 U/L</td>
                                    </tr>';
                            }
                            if($urianalisis->acidosBiliares != ""){
                                echo '<tr>
                                        <td><strong>Acidos Biliares</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->acidosBiliares.'</td>
                                        <td style="text-align: center; font-weight: bold">U/L</td>
                                        <td style="text-align: center; font-weight: bold">Menor de 38 U/L</td>
                                    </tr>';
                            }
                            if($urianalisis->granulosos != ""){
                                echo '<tr>
                                        <td><strong>Granulosos</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->granulosos.'</td>
                                        <td style="text-align: center; font-weight: bold">U/L</td>
                                        <td style="text-align: center; font-weight: bold">98-279 U/L</td>
                                    </tr>';
                            }
                            if($urianalisis->cilindrosL != ""){
                                echo '<tr>
                                        <td><strong>Cilindros leucocitarios</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->cilindrosL.'</td>
                                        <td style="text-align: center; font-weight: bold">U/L</td>
                                        <td style="text-align: center; font-weight: bold">1-40 U/L</td>
                                    </tr>';
                            }
                            if($urianalisis->cilindrosH != ""){
                                echo '<tr>
                                        <td><strong>Cilindros Hialinos</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->cilindrosH.'</td>
                                        <td style="text-align: center; font-weight: bold">U/L</td>
                                        <td style="text-align: center; font-weight: bold">1-38 U/L</td>
                                    </tr>';
                            }
                            if($urianalisis->otrosCilindros != ""){
                                echo '<tr>
                                        <td><strong>Otros cilindros</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->otrosCilindros.'</td>
                                        <td style="text-align: center; font-weight: bold">%</td>
                                        <td style="text-align: center; font-weight: bold">4.5-6.5%</td>
                                    </tr>';
                            }
                            if($urianalisis->leucositos != ""){
                                echo '<tr>
                                        <td><strong>Leucositos</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->leucositos.'</td>
                                        <td style="text-align: center; font-weight: bold">g/dl</td>
                                        <td style="text-align: center; font-weight: bold">6.7-8.7 d/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->hematies != ""){
                                echo '<tr>
                                        <td><strong>Hematies</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->hematies.'</td>
                                        <td style="text-align: center; font-weight: bold">g/dl</td>
                                        <td style="text-align: center; font-weight: bold">3.5-5.0 g/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->celulasE != ""){
                                echo '<tr>
                                        <td><strong>Celulas Epiteliales</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->celulasE.'</td>
                                        <td style="text-align: center; font-weight: bold">g/dl</td>
                                        <td style="text-align: center; font-weight: bold">2.3-3.4 g/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->elementosM != ""){
                                echo '<tr>
                                        <td><strong>Elementos minerales</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->elementosM.'</td>
                                        <td style="text-align: center; font-weight: bold"></td>
                                        <td style="text-align: center; font-weight: bold">1.2-2.2</td>
                                    </tr>';
                            }
                            if($urianalisis->bacterias != ""){
                                echo '<tr>
                                        <td><strong>Bacterias</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->bacterias.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Hasta 1.1 mg/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->levadura != ""){
                                echo '<tr>
                                        <td><strong>Levadura</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->levadura.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold">Hasta 0.25 mg/dl</td>
                                    </tr>';
                            }
                            if($urianalisis->otrosUno != ""){
                                echo '<tr>
                                        <td><strong>Otros</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->otrosUno.'</td>
                                        <td style="text-align: center; font-weight: bold">mg/dl</td>
                                        <td style="text-align: center; font-weight: bold"></td>
                                    </tr>';
                            }
                            if($urianalisis->otrosDos != ""){
                                echo '<tr>
                                        <td><strong>Otros</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$urianalisis->otrosDos.'</td>
                                        <td style="text-align: center; font-weight: bold">mmol/L</td>
                                        <td style="text-align: center; font-weight: bold">135-155 mmol/L</td>
                                    </tr>';
                            }
                            if($urianalisis->observacionesU != ""){
                                echo '<tr>
                                        <td><strong>Observaciones</strong></td>
                                        <td style="text-align: center; font-weight: bold" colspan=3>'.$urianalisis->observacionesU.'</td>
                                    </tr>';
                            }

                        ?> -->
                       
                    <!-- </tbody>
                </table> -->
            </div>
        </div>
    </div>
</div>