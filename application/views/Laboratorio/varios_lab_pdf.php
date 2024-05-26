<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background-image: url('public/img/bg_cm.jpg') ;
        background-size: cover;        
        background-repeat: no-repeat;
        padding: 0;
        margin: 0;
    }

    .img_cabecera{
        float: left;
        padding-top: -50px;
        /* text-align: center; */
        width: 25%;
    }
    .title_cabecera{
        float: right;
        text-align: center;
        width: 75%;
    }

    .title_cabecera h2{
        font-size: 40px
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
        border-bottom: 1px solid #075480;
    }

    .medicamentos{
        text-align: center;
    }

    .medicamentos .detalle table tr td{
        padding: 2px !important;
        font-size: 12px;
        color: #000000;
        border-bottom: 1px solid #cbcbcb;
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
        border: 1px solid #cbcbcb;
    }

    .detalle .table tr td{
        height: 30px;
    }
</style>

<div>
    <!-- <div id="cabecera" class="clearfix">

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
    </div> -->

    <?php
        echo '<div class="cabecera" style="font-family: Times New Roman">
                <div class="img_cabecera"><img src="'.base_url().'public/img/logo_receta.jpg"></div>
                <div class="title_cabecera">
                    <h2 style="line-height: 1px; color: #075480">HOSPITAL LA FAMILIA </h2>
                    <h5 style="padding-top: -15px;">Avenida Ferrocarril,Barrio la Cruz #51, <br> El Tránsito, San Miguel, C.S.S.P. N° 2059 </h5>
                    <h3 style="padding-top: -15px;"> 
                        <img src="'.base_url().'public/img/telefono.jpg" style="width: 15px"> 2605-6298 &nbsp;&nbsp;&nbsp;
                            <img src="'.base_url().'public/img/whatsapp.jpg" style="width: 15px"> 7280-1674
                    </h3>
                </div>
            </div>'
    ?>


    <div class="contenedor">
        <div class="medicamentos">
            <div style="border-bottom: 2px solid #075480; padding-top: 10px; padding-bottom: 15px;">
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
            
            <p style="font-size: 12px; color: #075480; margin-top: 25px; text-align: center; text-decoration: underline"><strong><?php echo $varios->encabezadoVarios; ?></strong></p>
            <p style="font-size: 12px; color♣: #075480; margin-top: 5px; text-align: center"><strong>EXAMEN SOLICITADO:</strong> <?php echo $varios->nombreExamen; ?></p>
            <div class="detalle">
                <p style="font-size: 12px; color: #075480; margin-top: 5px; text-align: center"><strong>RESULTADO:</strong></p>
                <?php
                    echo base64_decode($varios->detalleVarios);
                ?>
            </div>
        </div>
    </div>
</div>