<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->html->head(); ?>

<div class="container">

    <?php $this->html->menuDashboard(); ?>

    <div class="ui main container dash">
        <div class="separ"></div>
        <h1 class="ui header">Venta # <?php echo str_pad($id_venta, 10, "0", STR_PAD_LEFT); ?></h1>

        <div class="separ"></div>

        <?php if ($venta['status'] != 0) {
            echo $venta['data']; ?>
        <?php } else { ?>

            <div class="ui two column stackable grid">
                <div class="column">
                    <h4 class="ui dividing header">
                        Cliente
                        <div class="sub header"><?php echo $venta['data']['cabecera'][0]['cliente']; ?></div>
                    </h4>
                    <h4 class="ui dividing header">
                        Vendedor
                        <div class="sub header"><?php echo $venta['data']['cabecera'][0]['vendedor']; ?></div>
                    </h4>
                    <h4 class="ui dividing header">
                        Fecha venta
                        <div class="sub header"><?php echo $venta['data']['cabecera'][0]['fecha_venta']; ?></div>
                    </h4>
                    <a class="secondary ui button" href="<?php echo strtolower(base_url()); ?>dashboard/reporteventas">
                        <i class="angle left icon"></i>
                        Volver
                    </a>
                </div>
                <div class="column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="right aligned">
                                <h4>Subtotal</h4>
                                <p>$ <?php echo $venta['data']['totales'][0]['SubTotal']; ?></p>
                            </div>
                        </div>
                        <div class="content">
                            <div class="right aligned">
                                <h4>IVA</h4>
                                <p>$ <?php echo number_format((float) ($venta['data']['totales'][0]['IVA']), 2, '.', ''); ?></p>
                            </div>
                        </div>
                        <div class="content">
                            <div class="right aligned">
                                <h4>Total Neto</h4>
                                <p>$ <?php echo $venta['data']['cabecera'][0]['valor_total']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
            </div>



            <div class="separ"></div>

            <table class="ui celled table">
                <?php if ($venta['status'] != 0) {
                    echo $venta['data']; ?>
                <?php } else { ?>
                    <thead>
                        <tr>
                            <th class="one wide">Item</th>
                            <th class="two wide">Cantidad</th>
                            <th class="seven wide">Descripción</th>
                            <th class="two wide">Precio item</th>
                            <th class="two wide">Iva item</th>
                            <th class="two wide">Subtotal item</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($venta['data']['items'] as $clave => $valor) { ?>
                            <tr>
                                <td data-label="id"><?php echo $clave + 1; ?></td>
                                <td data-label="peso"><?php echo $valor['peso']; ?></td>
                                <td data-label="descripcion"><?php echo $valor['descripcion']; ?></td>
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


<script>
    $(function() {

        $('.ui.dropdown')
            .dropdown();

        $('#bt_clear').on('click', function() {
            $('.ui.dropdown').dropdown('clear');
            $('#reporteVentasForm')[0].reset();
        });


    });
</script>


<?php $this->html->footer(); ?>