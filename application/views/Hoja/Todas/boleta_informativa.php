
<style>
    body{
        background-image: url('public/img/test3_bg.jpg') ;
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
        width: 25%;
        width: 225px;
        float: left;
    }
    .title_cabecera{
        float: right;
        line-height: 5px;
        text-align: center;
        width: 60%;
    }

    .subtitle_cabecera{
        clear: both;
        width: 100%;
    }

    .subtitle_cabecera h5{
        font-size: 11px;
        margin-top: 15px;
        text-align: center;
    }

    .paciente{
        width: 100%;
        margin-top: -8px;
        
    }

    .tabla_paciente tr th, tr td{
        height: 45px;
        padding-right: 10px
    }

    .letraMayuscula{
        text-transform: uppercase;
    }
</style>

<div class="paciente">
    <table class="tabla_paciente" style="font-family: Times New Roman; width: 100%">

    <tr>
            <td><strong>PACIENTE: </strong></td>
            <td class="letraMayuscula" colspan="3"><?php echo $paciente->nombrePaciente; ?></td>
            <td class="letraMayuscula"><strong>Edad:</strong></td>
            <td class="letraMayuscula"><?php echo $paciente->edadPaciente; ?> años</td>
        </tr>

        <tr>
            <td><strong>DUI: </strong></td>
            <td colspan="3"><?php echo $paciente->duiPaciente; ?></td>
            
            <td class="letraMayuscula"><strong>F. Ingreso:</strong></td>
            <td><?php echo date("d/m/Y", strtotime($paciente->fechaHoja))?></td>
        </tr>

        <tr>
            <td><strong>MEDICO: </strong></td>
            <td colspan="3" class="letraMayuscula"><?php echo $paciente->nombreMedico; ?></td>
            <td class="letraMayuscula"><strong>HC:</strong></td>
            <td><?php echo $paciente->codigoHoja; ?></td>
        </tr>

    </table>
</div>