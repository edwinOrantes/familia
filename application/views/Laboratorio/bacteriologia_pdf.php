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
            
            <p style="font-size: 12px; color: #075480; margin-top: 25px"><strong><?php echo $bacteriologia->nombreExamen; ?></p>
            <p style="font-size: 12px; color: #075480; margin-top: 25px"><strong><?php echo $bacteriologia->resultadoExamen; ?></p>
            <p style="font-size: 12px; color: #075480; margin-top: 25px"><strong><?php echo $bacteriologia->seAisla; ?></p>
            <div class="detalle">
                <table class="table" style="text-align: center;">
                    <thead>
                        <tr style="background: #075480;">
                            <th> Parametro </th>
                            <th> Resultado </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($bacteriologia->cefixime != ""){
                                echo '<tr>
                                        <td><strong class="">Cefixime</strong></td>
                                        <td style="text-align: center; font-weight: bold">'.$bacteriologia->cefixime.'</td>
                                    </tr>';
                                    
                            }
                            if($bacteriologia->amikacina != ""){
                                echo '<tr>
                                        <td><strong class="">Amikacina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->amikacina.'</td>
                                    </tr>';
                            }
                            if($bacteriologia->levofloxacina != ""){
                                echo '<tr>
                                        <td><strong class="">Levofloxacina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->levofloxacina.'</td>
                                    </tr>';
                            }
                            if($bacteriologia->ceftriaxona != ""){
                                echo '<tr>
                                        <td><strong class="">Ceftriaxona</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->ceftriaxona.'</td>
                                    </tr>';
                            }
                            if($bacteriologia->azitromicina != ""){
                                echo '<tr>
                                        <td><strong class="">Azitromicina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->azitromicina.' </td>
                                    </tr>';
                            }
                            if($bacteriologia->imipenem != ""){
                                echo '<tr>
                                        <td><strong class="">Imipenem</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->imipenem.'</td>
                                    </tr>';
                            }
                            if($bacteriologia->meropenem != ""){
                                echo '<tr>
                                        <td><strong class="">Meropenem</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->meropenem.'</td>
                                    </tr>';
                            }
                            if($bacteriologia->fosfocil != ""){
                                echo '<tr>
                                        <td><strong class="">Fosfomicina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->fosfocil.'</td>
                                    </tr>';
                            }
                            if($bacteriologia->ciprofloxacina != ""){
                                echo '<tr>
                                        <td><strong class="">Ciprofloxacina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->ciprofloxacina.'</td>
                                    </tr>';
                            }
                            if($bacteriologia->penicilina != ""){
                                echo '<tr>
                                        <td><strong class="">Penicilina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->penicilina.'</td>
                                    </tr>';
                            }
                            if($bacteriologia->vancomicina != ""){
                                echo '<tr>
                                        <td><strong class="">Vancomicina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->vancomicina.'</td>
                                        </tr>';
                            }

                            if($bacteriologia->acidoNalidixico != ""){
                                echo '<tr>
                                        <td><strong class=""> Ácido nalidíxico </strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->acidoNalidixico.'</td>
                                    </tr>';
                            }  
                            if($bacteriologia->gentamicina != ""){
                                echo '<tr>
                                    <td><strong class="">Gentamicina</strong></td>
                                    <td style="text-align: center;  font-weight: bold" >'.$bacteriologia->gentamicina.'</td>
                                </tr>';
                            }
                            if($bacteriologia->nitrofurantoina != ""){
                                echo '<tr>
                                        <td><strong class="">Nitrofurantoina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->nitrofurantoina.'</td>
                                    </tr>';
                            }
                            if($bacteriologia->ceftazimide != ""){
                                echo '<tr>
                                        <td><strong class="">Ceftazidime</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->ceftazimide.'</td>
                                    </tr>';
                            }
                            if($bacteriologia->cefotaxime != ""){
                                echo '<tr>
                                        <td><strong class="">T.P Cefotaxime</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->cefotaxime.'</td>
                                    </tr>';
                            }

                            if($bacteriologia->clindamicina != ""){
                                echo '<tr>
                                        <td><strong class="">Clindamicina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->clindamicina.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->trimetropimSulfa != ""){
                                echo '<tr>
                                        <td><strong class=""> Trimetoprima/Sulfametoxazol</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->trimetropimSulfa.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->ampicilina != ""){
                                echo '<tr>
                                        <td><strong class=""> Ampicilina/Sulbactam </strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->ampicilina.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->piperacilina != ""){
                                echo '<tr>
                                        <td><strong class=""> Piperacilina/Tazobactam </strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->piperacilina.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->amoxicilina != ""){
                                echo '<tr>
                                        <td><strong class=""> Amoxicilina/Ácido clavulánico </strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->amoxicilina.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->claritromicina != ""){
                                echo '<tr>
                                        <td><strong class="">Claritromicina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->claritromicina.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->cefuroxime != ""){
                                echo '<tr>
                                        <td><strong class="">Cefuroxime</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->cefuroxime.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->cefepime != ""){
                                echo '<tr>
                                        <td><strong class="">Cefepime</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->cefepime.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->metronidazol != ""){
                                echo '<tr>
                                        <td><strong class="">Metronidazol</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->metronidazol.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->norfloxacina != ""){
                                echo '<tr>
                                        <td><strong class="">Norfloxacina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->norfloxacina.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->tobramicina != ""){
                                echo '<tr>
                                        <td><strong class="">Tobramicina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->tobramicina.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->ertapenem != ""){
                                echo '<tr>
                                        <td><strong class="">Ertapenem</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->ertapenem.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->doripenem != ""){
                                echo '<tr>
                                        <td><strong class="">Doripenem</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->doripenem.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->colistin != ""){
                                echo '<tr>
                                        <td><strong class="">Colistin</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->colistin.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->linezolid != ""){
                                echo '<tr>
                                        <td><strong class="">Linezolid</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->linezolid.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->moxifloxacino != ""){
                                echo '<tr>
                                        <td><strong class="">Moxifloxacino</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->moxifloxacino.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->kanamicina != ""){
                                echo '<tr>
                                        <td><strong class="">Kanamicina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->kanamicina.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->aztreonam != ""){
                                echo '<tr>
                                        <td><strong class="">Aztreonam</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->aztreonam.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->cefaclor != ""){
                                echo '<tr>
                                        <td><strong class="">Cefaclor</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->cefaclor.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->cefazolina != ""){
                                echo '<tr>
                                        <td><strong class="">Cefazolina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->cefazolina.' </td>
                                    </tr>';
                            }

                            if($bacteriologia->tetraciclina != ""){
                                echo '<tr>
                                        <td><strong class="">Tetraciclina</strong></td>
                                        <td style="text-align: center;  font-weight: bold">'.$bacteriologia->tetraciclina.' </td>
                                    </tr>';
                            }


                            if($bacteriologia->observacionExamen != ""){
                                echo '<tr>
                                        <td><strong class="">Observación </strong></td>
                                        <td style="text-align: center;  font-weight: bold" colspan=2>'.$bacteriologia->observacionExamen.'</td>
                                    </tr>';
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>