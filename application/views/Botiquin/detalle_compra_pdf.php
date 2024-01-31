<style>

    body{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }
    #cabecera {
        text-align: left;
        width: 100%;
        margin: auto;
        }

    #lateral {
        width: 35%;  /* Este será el ancho que tendrá tu columna */
        float:left; /* Aquí determinas de lado quieres quede esta "columna" */
        padding-top: -25px;
        }

    #principal {
        width: 59%;
        float: right;
        }
        
    /* Para limpiar los floats */
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
        }

    .proveedor, .medicamentos{
        margin-top: 10px;
    }

    .proveedor .detalle table, .medicamentos .detalle table{
        font-size: 12px;
        margin: auto;
        width: 100%;
    }
    .proveedor .detalle table tr td{
        padding: 5px;
        text-align: left;
        font-size: 11px;
    }

    .medicamentos .detalle table tr td{
        padding: 5px;
        text-align: center;
        border-width: 1px;
        border-style: solid;
        border-color: #000;
    }

</style>

<?php
    $total = 0;
    $iva = 0;
    $percibido = 0;
    foreach ($medicamentos as $medicamento) {
        $total += ($medicamento->cantidad * $medicamento->precio) - $medicamento->descuento;
    }

    if($factura->tipoContribuyente == "Grande"){
        $percibido = $total * 0.01;
    }

    $iva = $total * 0.13;
?>

<div id="cabecera" class="clearfix">

    <div id="lateral">
        <p><img src="<?php echo base_url() ?>public/img/logo.jpg" alt="Logo hospital Orellana" width="225"></p>
    </div>

    <div id="principal">
        <table style="text-align: center;">
            <tr>
                <td><strong>HOSPITAL ORELLANA, USULUTAN</strong></td>
            </tr>
            <tr>
                <td><strong>Sexta calle oriente, #8, Usulután, El Salvador, PBX: 2606-6673</strong></td>
            </tr>
        </table>
    </div>
</div>
<div class="contenedor">
    <div class="proveedor">
            <p><strong>DATOS DE LA COMPRA:</strong></p>
            <div class="detalle">
                <table class="" >
                    <tbody>
                        <tr>
                            <td><strong>Tipo</strong></td>
                            <td><?php echo $factura->tipoFactura; ?></td>
                            <td><strong>Número de documento</strong></td>
                            <td><?php echo $factura->numeroFactura; ?></td>
                            <td><strong>Fecha</strong></td>
                            <td><?php echo $factura->fechaFactura; ?></td>
                        </tr>

                        <tr>
                            <td><strong>Proveedor</strong></td>
                            <td><?php echo $factura->empresaProveedor; ?></td>
                            <td><strong>Plazo</strong></td>
                            <td>Crédito <?php echo $factura->plazoFactura; ?> dias</td>
                            <td><strong>Monto total</strong></td>
                            <td>$ <?php echo number_format($total, 2); ?></td>
                        </tr>

                        <tr>
                            <td><strong>Descripción</strong></td>
                            <td><?php echo $factura->descripcionFactura; ?></td>
                            <td><!-- <strong>Dias desde compra</strong> --></td>
                            <td></td>
                            <td><strong>Recibida Por: </strong></td>
                            <td><?php echo $factura->recibidoPor; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    <div class="medicamentos">
            <p><strong>DETALLE DE LA MEDICAMENTOS:</strong></p>
            <div class="detalle">
                <table cellspacing="0" cellpadding="5">
                    <thead>
                        <tr style="background-color: #007bff; color: #fff">
                            <td style="color: #fff"><strong>Lote</strong></td>
                            <td style="color: #fff"><strong>Fecha vencimiento</strong></td>
                            <td style="color: #fff"><strong>Medicamento</strong></td>
                            <td style="color: #fff"><strong>Precio</strong></td>
                            <td style="color: #fff"><strong>Cantidad</strong></td>
                            <td style="color: #fff"><strong>Descuento</strong></td>
                            <td style="color: #fff"><strong>Total</strong></td>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                            $totalFila = 0;
                            foreach ($medicamentos as $medicamento) {
                                $totalFila = ($medicamento->precio * $medicamento->cantidad) - $medicamento->descuento;
                        ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                    if($medicamento->vencimiento == ""){
                                        echo "---";
                                    }else{
                                        echo $medicamento->vencimiento;
                                    } 
                                    
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                    if($medicamento->lote == ""){
                                        echo "---";
                                    }else{
                                        echo $medicamento->lote;
                                    } 
                                    
                                ?>
                            </td>
                            <td><?php echo $medicamento->nombreMedicamento ?></td>
                            <td>$ <?php echo $medicamento->precio ?></td>
                            <td><?php echo $medicamento->cantidad ?></td>
                            <td><?php echo $medicamento->descuento ?></td>
                            <td>$ <?php echo number_format(( $totalFila), 2) ?></td>
                        </tr>

                        <?php } ?>

                        <tr>
                            <td colspan="6" style="text-align: right"><strong>SUBTOTAL</strong></td>
                            <td colspan=""><strong>$ <?php echo number_format($total, 2) ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="6" style="text-align: right"><strong>IVA</strong></td>
                            <td colspan=""><strong>$ <?php echo number_format($iva, 2) ?></strong></td>
                        </tr>

                        <?php
                            if($percibido > 0){
                        ?>
                        <tr>
                            <td colspan="6" style="text-align: right"><strong>IVA Percibido</strong></td>
                            <td colspan=""><strong>$ <?php echo number_format($percibido, 2) ?></strong></td>
                        </tr>
                        <?php } ?>

                        <?php
                            if($factura->descuentoCompra > 0){
                        ?>
                        <tr>
                            <td colspan="6" style="text-align: right"><strong>Descuento</strong></td>
                            <td colspan=""><strong>$ <?php echo number_format($factura->descuentoCompra, 2) ?></strong></td>
                        </tr>
                        <?php } ?>

                        <tr>
                            <td colspan="6" style="text-align: right"><strong>TOTAL</strong></td>
                            <td colspan=""><strong>$ <?php echo number_format(($total + $iva + $percibido - $factura->descuentoCompra), 2) ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</div>


