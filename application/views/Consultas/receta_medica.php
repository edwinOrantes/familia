<style>
    body{
        
        /* background-image: url('public/img/test3_bg.jpg') ; */
        background-size: cover;        
        background-repeat: no-repeat;
        padding: 0;
        margin: 0;
    }
    .cabecera{
        width: 100%;
    }
    .img_cabecera{
        padding-top: -20px;
        width: 225px;
        float: left;
    }
    .title_cabecera{
        font-size: 16px;
        float: right;
        line-height: 5px;
        text-align: center;
        width: 60%;
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
        height: 50px
    }

    .contenido_receta{
        height: 700px
    }
    
    .pie_receta{
        height: 100px
    }

    .signos_recetas{
        float:left;
        width: 50%;
        
    }
    
    .fechas_receta{
        float:right;
        width: 50%
    }


    .letraMayuscula{
        text-transform: uppercase;
    }


</style>

<div class="cabecera" style="font-family: Times New Roman">
    <div class="body_left">
        
        <div>
            <h5 style="text-decoration: underline"><strong>TELEFONO</strong></h5>
            <h5><strong>2605-6298</strong></h5>
        </div>

        <div>
            <h5 style="text-decoration: underline"><strong>HORARIO</strong></h5>
            <p>De Lunes a Sabado</p>
            <p>7:00 a.m a 5:00 p.m</p>
            <p>Domingo</p>
            <p>8:00 a.m a 12:00 m.d</p>
        </div>

        <h5 style="text-decoration: underline"><strong>SERVICIOS</strong></h5>
        <div style="text-align: left; margin: 15px 0px 100px -20px; line-height: 22px">
            <ul>
                <li>Ultrasonografía</li>
                <li>Toma y lectura de: Electrocardiogramas</li>
                <li>Consulta de niños y adultos</li>
                <li>Controles prenatales</li>
                <li>Consulta Ginecológica y planificación familiar</li>
                <li>Colocación de sueros</li>
                <li>Control de azúcar y presión</li>
                <li>Pequeña cirugía</li>
                <li>Cirugías mayores</li>
            </ul>
        </div>

        <div style="font-size: 12px; font-weight: bold">
            <p> Atendiéndole con la amabilidad que nos caracteriza.</p>
        </div>

        
    </div>
    <div class="body_right">
        <div class="cabecera_receta">
            <table>
                <tr>
                    <th>PACIENTE: </th>
                    <th style="border-bottom: 1px solid #000000; text-align: left; width: 250px"> <?php echo $detalle->nombrePaciente; ?> </th>
                    <th>Edad: </th>
                    <th style="border-bottom: 1px solid #000000; text-align: left; width: 75"> <?php echo $detalle->edadPaciente; ?> Años</th>
                </tr>
            </table>
        </div>
        
        <div class="contenido_receta">
            <?php

                $indicaciones = json_decode($detalle->medicamentosReceta);
                foreach ($indicaciones as $row) {
                    echo '<div style="">
                        <p>'.$row->medicamento.'</p>
                        <p>'.$row->indicacion.'</p>
                    </div>';
                }

                 
            ?>
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
                        <td><?php echo $detalle->presionPaciente; ?></td>
                        <td><?php echo $detalle->temperaturaPaciente; ?></td>
                    </tr>
                </table>
            </div>
            <div class="fechas_receta" style="line-height: 1px; text-align: center;">
                <h6><strong>FECHA DE CONSULTA: </strong><?php echo $detalle->fechaReceta; ?></h6>
                <h6><strong>PRÓXIMA CITA: </strong><?php echo $detalle->proximaReceta; ?></h6>
            </div>
        </div>
    </div>
</div>

