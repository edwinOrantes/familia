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
        margin: 10px;
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
        border: 1px solid #075480;
        color: #000000;
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
        height: 30px;
    }

    .detalle .table tr td{
        height: 50px;
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
                            <td><p class="borderAzul"><?php echo substr($cabecera->fechaDetalleConsulta, 0, 10)." ".$cabecera->horaDetalleConsulta; ?></p></td>
                        </tr>
            
                    </table>
                </div>
            </div>
            
            <p style="font-size: 12px; color: #075480; margin-top: 25px"><strong>EXAMEN TIPEO SANGUINEO Y FACTOR RH</strong></p>
            <div class="detalle">
                <table class="table">
                    <thead>
                        <tr style="background: #075480;">
                            <th> Parametro </th>
                            <th> Resultado </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if($sanguineo->muestraSanguineo != ""){
                                echo '<tr>
                                        <td style="padding-left: 50px"><strong class="">Muestra</strong></td>
                                        <td style="text-align: center; font-weight: bold; font-size: 12px">'.$sanguineo->muestraSanguineo.'</td>
                                    </tr>';
                            }
                            if($sanguineo->grupoSanguineo != ""){
                                echo '<tr>
                                        <td style="padding-left: 50px"><strong class="">Grupo sanguíneo</strong></td>
                                        <td style="text-align: center; font-weight: bold; font-size: 12px">'.$sanguineo->grupoSanguineo.'</td>
                                    </tr>';
                            }
                            if($sanguineo->factorSanguineo != ""){
                                echo '<tr>
                                        <td style="padding-left: 50px"><strong class="">Factor RH</strong></td>
                                        <td style="text-align: center; font-weight: bold; font-size: 12px">'.$sanguineo->factorSanguineo.'</td>
                                    </tr>';
                            }
                            if($sanguineo->duSanguineo != ""){
                                echo '<tr>
                                        <td style="padding-left: 50px"><strong class="">Du</strong></td>
                                        <td style="text-align: center; font-weight: bold; font-size: 12px">'.$sanguineo->duSanguineo.'</td>
                                    </tr>';
                            }

                        ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>