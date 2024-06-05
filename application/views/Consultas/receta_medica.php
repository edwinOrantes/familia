<style>
    body{
        background-image: url('public/img/bg_cm.jpg') ;
        background-size: cover;        
        background-repeat: no-repeat;
        padding: 0;
        margin: 0;
    }
    .cabecera{
        width: 100%;
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

    .body_left{
        /* border: 2px solid #075480; */
        border-radius: 5px;
        float: left;
        height: 85%;
        padding: 5px;
        text-align:center;
        width: 7%;
    }

    .body_right{
        float: right;
        width: 85%;
        display: flex;
        flex-direction: column;
    }

    .cabecera_receta{
        height: 50px;
    }

    .contenido_receta{
        height: 650px
    }
    
    .signos_recetas{
        float:left;
        width: 50%;
        
    }
    
    .fechas_receta{
        float:right;
        padding: 0px 0px 0px 5px;
        width: 50%;
    }
    .fechas_receta p{
        font-size: 16px;
        text-align: left
    }

    .letraMayuscula{
        text-transform: uppercase;
    }

    #mensaje{
        clear: both;
        text-align: center;
        font-size: 16px;
        font-weight: bold
    }

</style>
<?php
    // Definir la fecha
    function fecha($fecha = null){
        // Crear un objeto DateTime a partir de la fecha
        $date = new DateTime($fecha);
        
        // Array con los nombres de los días de la semana en español
        $diasSemana = [
            "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"
        ];
        
        // Array con los nombres de los meses en español
        $meses = [
            1 => "enero", "febrero", "marzo", "abril", "mayo", "junio", 
            "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
        ];
        
        // Obtener el nombre del día de la semana
        $nombreDia = $diasSemana[$date->format("w")];
        
        // Obtener el día del mes
        $diaMes = $date->format("d");
        
        // Obtener el nombre del mes
        $nombreMes = $meses[(int)$date->format("m")];
        
        // Obtener el año
        $anio = $date->format("Y");
        
        // Formatear la fecha
        $fechaFormateada = "$nombreDia $diaMes de $nombreMes del $anio";
        
        // Imprimir la fecha formateada
        return $fechaFormateada;

    }
?>


<div class="cabecera" style="font-family: Times New Roman">
    <div class="body_left">
        
        <!-- <div>
            <h5 style="text-decoration: underline"><strong>TELEFONO</strong></h5>
            <h5><strong>2605-6298</strong></h5>
        </div>

        <div>
            <h5 style="text-decoration: underline"><strong>HORARIO</strong></h5>
            <p>De Lunes a Sabado</p>
            <p>7:00 a.m a 5:00 p.m</p>
            <p>Domingo</p>
            <p>8:00 a.m a 12:00 m.d</p>
        </div> -->

        <!-- <h5 style="text-decoration: underline"><strong>SERVICIOS</strong></h5>
        <div style="text-align: left; margin: 15px 0px 100px -20px; line-height: 22px">
            <ul>
                <li>Consulta general</li>
                <li>Consulta con especialistas</li>
                <li>Ingresos médicos</li>
                <li>Pequeña cirugía</li>
                <li>Atención de partos</li>
                <li>Laboratorio clínico</li>
                <li>Exámenes especiales</li>
                <li>Ultrasonografía</li>
                <li>Rayos X</li>
                <li>Transporte de pacientes delicados</li>
                <li>Atención 24/7</li>
            </ul>
        </div> -->

        <!-- <div style="font-size: 12px; font-weight: bold">
            <p> Atendiéndole con la amabilidad que nos caracteriza.</p>
        </div> -->

        
    </div>
    <div class="body_right">
        <div class="cabecera_receta">
            <table style="width: 100%">
                 <tr>
                    <td style="font-weight: bold; text-transform: uppercase">Fecha: </td>
                    <td style="text-align: left; width: 250px"> <?php echo fecha($detalle->fechaReceta); ?> </td>
                </tr>
                
                <tr>
                    <td style="font-weight: bold">PACIENTE: </td>
                    <td style="text-align: left; width: 250px; text-transform: uppercase"> <?php echo $detalle->nombrePaciente; ?></td>
                    <td style="font-weight: bold">EDAD: </td>
                    <td style="text-align: left; width: 75px; text-transform: uppercase"> <?php echo $detalle->edadPaciente; ?> Años</td>
                </tr>

                <tr>
                    <td colspan=4 style="border-bottom: 2px solid #075480;"></td>
                </tr>               
            </table>
        </div>
        <!-- <hr style="color: #075480; height: 2px;"> --> 
        <div class="contenido_receta">
            <?php

                $indicaciones = json_decode($detalle->medicamentosReceta);
                foreach ($indicaciones as $row) {
                    echo '<div class="" style="padding-top: -15px">
                        <p><strong>'.$row->medicamento.'</strong></p>
                        <p style="padding-top: -15px">'.$row->aplicacion.' '.$row->indicacion." ".@$row->medida.'</p>
                    </div>';
                }

                 
            ?>
            <p><?php echo $detalle->indicacionLibre; ?></p>
        </div>

        <div class="pie_receta">
            <hr style="color: #1560b7 ">
            <div class="signos_recetas"></div>

            <div class="fechas_receta" style="border-left: 2px solid #075480; line-height: 1px; text-align: center;">
                <p><strong>PRÓXIMA CITA: </strong><?php echo $detalle->proximaReceta; ?></p>
                <p><strong>MEDICO: </strong><?php echo $detalle->nombreMedico; ?></p>
            </div>

        </div>
    </div>

    
</div>
<!-- <div id="mensaje"><p>Estamos para atenderle siempre, gracias por su confianza.</p></div> -->

