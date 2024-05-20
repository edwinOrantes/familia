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
    .eye{
        position:absolute;
        height:200px;
        width:200px;
        top: 40px;
        left : 40px;
        z-index: 1;
        }

    .heaven
        {
        position:absolute;
        height:300px;
        width:300px;
        z-index: -1;
        }
    #cabecera {
        text-align: left;
        width: 100%;
        margin: auto;
        margin-bottom: 15px;
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
        margin-top: 15px;
    }
    .table{
        border-collapse: collapse;
        margin-top: 25px;
    }
    
    .detalle .table tr th{
        color: #fff;
        padding: 5px 40px 5px 40px;
        border: 1px solid #075480;
        /* height: 30px; */
    }

    .detalle .table tr td{
        height: 26px;
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
            
            <p style="font-size: 12px; color: #075480; margin-top: 25px"><strong>HEMATOLOGIA</strong></p>
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

                            if($hematologia->globulosRojos != ""){
                                echo '<tr>
                                        <td><strong class="">Globulos rojos</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$hematologia->globulosRojos.' X mm3</td>
                                        <td style="text-align: center; font-weight: bold">3,960,000-5,500,000 X mm3</td>
                                    </tr>';
                                    
                            }
                            if($hematologia->globulosBlancos != ""){
                                echo '<tr>
                                        <td><strong class="">Globulos blancos</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->globulosBlancos.' X mm3</td>
                                        <td style="text-align: center;  font-weight: bold"> 5,000-10,000 X mm3 </td>
                                    </tr>';
                            }
                            if($hematologia->hematocrito != ""){
                                echo '<tr>
                                        <td><strong class="">Hematocrito</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->hematocrito.' %</td>
                                        <td style="text-align: center;  font-weight: bold"> 36-50% </td>
                                    </tr>';
                            }
                            if($hematologia->hemoglobina != ""){
                                echo '<tr>
                                        <td><strong class="">Hemoglobina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->hemoglobina.' g%</td>
                                        <td style="text-align: center;  font-weight: bold"> 12-16.6 g% </td>
                                    </tr>';
                            }
                            if($hematologia->vlGMedio != ""){
                                echo '<tr>
                                        <td><strong class="">Vl. globular medio</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->vlGMedio.' micras3</td>
                                        <td style="text-align: center;  font-weight: bold"> 90.9-92.7 micras3 </td>
                                    </tr>';
                            }
                            if($hematologia->hbGMedia != ""){
                                echo '<tr>
                                        <td><strong class="">Hb. globular media</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->hbGMedia.' uug</td>
                                        <td style="text-align: center;  font-weight: bold"> 30.2-31.7 uug </td>
                                    </tr>';
                            }
                            if($hematologia->concHbGlobMed != ""){
                                echo '<tr>
                                        <td><strong class="">Conc. HB. Glob. Med</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->concHbGlobMed.' %</td>
                                        <td style="text-align: center;  font-weight: bold"> 33-33.5% </td>
                                    </tr>';
                            }
                            if($hematologia->neutrofilos != ""){
                                echo '<tr>
                                        <td><strong class="">Neutrofilos</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->neutrofilos.' %</td>
                                        <td style="text-align: center;  font-weight: bold"> 40-70% </td>
                                    </tr>';
                            }
                            if($hematologia->linfocitos != ""){
                                echo '<tr>
                                        <td><strong class="">Linfocitos</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->linfocitos.' %</td>
                                        <td style="text-align: center;  font-weight: bold"> 20-40%</td>
                                    </tr>';
                            }
                            if($hematologia->eosinofilos != ""){
                                echo '<tr>
                                        <td><strong class="">Eosinofilos</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->eosinofilos.' %</td>
                                        <td style="text-align: center;  font-weight: bold"> 1-4% </td>
                                    </tr>';
                            }
                            if($hematologia->basofilos != ""){
                                echo '<tr>
                                        <td><strong class="">Basofilos</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->basofilos.' %</td>
                                        <td style="text-align: center;  font-weight: bold"> 0-1% </td>
                                        </tr>';
                                    }
                                    if($hematologia->monocitos != ""){
                                        echo '<tr>
                                        <td><strong class="">Monocitos</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->monocitos.' %</td>
                                        <td style="text-align: center;  font-weight: bold"> 2-5% </td>
                                    </tr>';
                            }
                                
                            if($hematologia->plaquetas != ""){
                                echo '<tr>
                                    <td><strong class="">Plaquetas</strong></td>
                                    <td style="text-align: center;  font-weight: bold" >'.$hematologia->plaquetas.' X mm3</td>
                                    <td style="text-align: center;  font-weight: bold"> 150,000-400,000 X mm3 </td>
                                </tr>';
                            }
                            if($hematologia->eritrosedimentacion != ""){
                                echo '<tr>
                                        <td><strong class="">Eritrosedimentación</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->eritrosedimentacion.' mm/hr</td>
                                        <td style="text-align: center;  font-weight: bold">1-20mm/hr</td>
                                    </tr>';
                            }
                            if($hematologia->reticulositos != ""){
                                echo '<tr>
                                        <td><strong class="">Reticulositos</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->reticulositos.' %</td>
                                        <td style="text-align: center;  font-weight: bold"> 0.5-1.5% </td>
                                    </tr>';
                            }
                            if($hematologia->tpTrombolastina != ""){
                                echo '<tr>
                                        <td><strong class="">T.P Trombolastina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->tpTrombolastina.' Seg.</td>
                                        <td style="text-align: center;  font-weight: bold"> 22-38 Seg. </td>
                                    </tr>';
                            }
                            
                            if($hematologia->tSangramiento != ""){
                                echo '<tr>
                                        <td><strong class="">T. de sangramiento</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->tSangramiento.' Minutos</td>
                                        <td style="text-align: center;  font-weight: bold"> 1-3 Minutos </td>
                                    </tr>';
                            }
                            
                            if($hematologia->tCoagulacion != ""){
                                echo '<tr>
                                        <td><strong class="">T. de coagulacion</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->tCoagulacion.' Minutos</td>
                                        <td style="text-align: center;  font-weight: bold"> 5-10 Minutos </td>
                                    </tr>';
                            }
                           
                            if($hematologia->tProtombina != ""){
                                echo '<tr>
                                        <td><strong class="">T. Protombina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$hematologia->tProtombina.' Minutos</td>
                                        <td style="text-align: center;  font-weight: bold"> 13-17 Seg </td>
                                    </tr>';
                            }
                            

                            if($hematologia->observacionesH != ""){
                                echo '<tr>
                                        <td><strong class="">Observaciones</strong></td>
                                        <td style="text-align: center;  font-weight: bold" colspan=2>'.$hematologia->observacionesH.'</td>
                                    </tr>';
                            }

                        ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>