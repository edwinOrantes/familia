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
        padding-top: -20px;
        padding-left: 20px;
        /* text-align: center; */
        width: 40%;
    }
    .title_cabecera{
        font-size: 16px;
        float: right;
        line-height: 5px;
        text-align: center;
        padding-right: 20px;
        width: 50%;
    }
    .body_left{
        border: 2px solid #1560b7;
        border-radius: 5px;
        float: left;
        height: 95%;
        padding: 5px;
        text-align:center;
        width: 27%;
    }


    .body_right{
        float: right;
        width: 68%;
        display: flex;
        flex-direction: column;
    }

    .cabecera_receta{
        height: 50px;
        padding-bottom: 20px
    }

    .contenido_receta{
        height: 650px
    }
    
    .pie_receta{
        height: 100px;
    }
    
    .signos_recetas{
        float:left;
        width: 58%;
        
    }
    
    .fechas_receta{
        float:right;
        padding: 0px 0px 0px 5px;
        width: 40%;
    }
    .fechas_receta p{
        font-size: 12px;
        text-align: left
    }


    .letraMayuscula{
        text-transform: uppercase;
    }


</style>

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

        <h5 style="text-decoration: underline"><strong>SERVICIOS</strong></h5>
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
        </div>

        <!-- <div style="font-size: 12px; font-weight: bold">
            <p> Atendiéndole con la amabilidad que nos caracteriza.</p>
        </div> -->

        
    </div>
    <div class="body_right">
        <div class="cabecera_receta">
            <table>
                <tr>
                    <td style="font-weight: bold">Paciente: </td>
                    <td style="border-bottom: 1px solid #000000; text-align: left; width: 250px;"> <?php echo $detalle->nombrePaciente; ?> </td>
                    <td style="font-weight: bold">Edad: </td>
                    <td style="border-bottom: 1px solid #000000;text-align: left; width: 75px"> <?php echo $detalle->edadPaciente; ?> Años</td>
                </tr>
                <tr>
                    <td colspan="4"> &nbsp; </td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Fecha: </td>
                    <td style="border-bottom: 1px solid #000000; text-align: left; width: 250px"> <?php echo $detalle->fechaReceta; ?> </td>
                </tr>
            </table>
        </div>
        
        <div class="contenido_receta">
            <?php

                $indicaciones = json_decode($detalle->medicamentosReceta);
                foreach ($indicaciones as $row) {
                    echo '<div style="">
                        <p>'.$row->medicamento.'</p>
                        <p>'.$row->indicacion." ".@$row->medida.'</p>
                    </div>';
                }

                 
            ?>
            <p><?php echo $detalle->indicacionLibre; ?></p>
        </div>

        <div class="pie_receta">
            <hr style="color: #1560b7 ">
            <div class="signos_recetas">
                <table style="font-size: 12px; text-align: center; padding-top: 7px; width: 100%">
                    <tr>
                        <th>Peso</th>
                        <th>Altura</th>
                        <th>IMC</th>
                        <th>P.A</th>
                        <th>Temp.</th>
                    </tr>

                    <tr>
                        <td><?php echo $detalle->peso; ?>Kg</td>
                        <td><?php echo $detalle->altura; ?>m</td>
                        <td><?php echo $detalle->imc; ?></td>
                        <td><?php echo $detalle->presionPaciente; ?> mm/Hg</td>
                        <td><?php echo $detalle->temperaturaPaciente; ?> °C</td>
                    </tr>
                </table>
            </div>

            <div class="fechas_receta" style="border-left: 2px solid #075480; line-height: 1px; text-align: center;">
                <p><strong>PRÓXIMA CITA: </strong><?php echo $detalle->proximaReceta; ?></p>
                <p><strong>MEDICO: </strong><?php echo $detalle->nombreMedico; ?></p>
            </div>
        </div>
    </div>
</div>

