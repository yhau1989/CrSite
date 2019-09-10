<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->html->head(); ?>

<div class="container">

    <?php $this->html->menuDashboard(); ?>

    <div class="ui main container dash">
        <div class="separ"></div>
        <h1 class="ui header">Compra # <?php echo str_pad($id_compra, 10, "0", STR_PAD_LEFT); ?></h1>

        <div class="separ"></div>

        <?php if ($compras['status'] != 0) {
            echo $compras['data']; ?>
        <?php } else { ?>

            <div class="ui two column stackable grid">
                <div class="column">
                    <h4 class="ui dividing header">
                        Proveedor
                        <div class="sub header"><?php echo $compras['data']['cabecera'][0]['proveedor']; ?></div>
                    </h4>
                    <h4 class="ui dividing header">
                        Comprador
                        <div class="sub header"><?php echo $compras['data']['cabecera'][0]['comprador']; ?></div>
                    </h4>
                    <h4 class="ui dividing header">
                        Fecha compra
                        <div class="sub header"><?php echo $compras['data']['cabecera'][0]['fecha_compra']; ?></div>
                    </h4>
                    <a class="secondary ui button" href="<?php echo strtolower(base_url()); ?>dashboard/reportecompras">
                        <i class="angle left icon"></i>
                        Volver
                    </a>
                </div>
                <div class="column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="right aligned">
                                <h4>Subtotal</h4>
                                <p>$ <?php echo $compras['data']['totales'][0]['SubTotal']; ?></p>
                            </div>
                        </div>
                        <div class="content">
                            <div class="right aligned">
                                <h4>IVA</h4>
                                <p>$ <?php echo number_format((float) ($compras['data']['totales'][0]['IVA']), 2, '.', ''); ?></p>
                            </div>
                        </div>
                        <div class="content">
                            <div class="right aligned">
                                <h4>Total Neto</h4>
                                <p>$ <?php echo $compras['data']['cabecera'][0]['valor_total']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
            </div>



            <div class="separ"></div>

           

            <table id="DetalleCompra_<?php echo $id_compra; ?>" class="ui celled table">
                <?php if ($compras['status'] != 0) {
                    echo $compras['data']; ?>
                <?php } else { ?>
                    <thead>
                        <tr>
                            <th class="one wide">Item</th>
                            <th class="two wide">Peso</th>
                            <th class="seven wide">Material</th>
                            <th class="two wide">Precio item</th>
                            <th class="two wide">Iva item</th>
                            <th class="two wide">Subtotal item</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($compras['data']['items'] as $clave => $valor) { ?>
                            <tr>
                                <td data-label="id"><?php echo $clave + 1; ?></td>
                                <td data-label="peso"><?php echo $valor['peso']; ?> Kg</td>
                                <td data-label="material"><?php echo $valor['material']; ?></td>
                                <td data-label="valor"><?php echo '$ ' . $valor['valor']; ?></td>
                                <td data-label="iva"><?php echo '$ ' . $valor['iva']; ?></td>
                                <td data-label="total_item"><?php echo '$ ' . $valor['valor_total']; ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } ?>
            </table>

            <div class="separ"></div>
    </div>


    <div class="ui inverted vertical footer segment">
        <div class="separ"></div>
        <div class="ui container">
            <div class="ui stackable inverted divided equal height stackable grid">
                <div class=" column">
                    <h4 class="ui inverted header">Gracias</h4>
                    <p>Gracias a nuestros profesores por incentivar la investigación y el desarrollo</p>
                </div>
            </div>
        </div>
        <div class="separ"></div>
    </div>


</div>

<?php $this->html->footer(); ?>