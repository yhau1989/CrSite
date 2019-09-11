<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->html->head(); ?>

<div class="container">


    <?php $this->html->menuDashboard(); ?>

    <div class="ui main container dash">
        <div class="separ"></div>
        <h1 class="ui header">Reporte Compras</h1>

        <form class="ui form" id="reporteComprasForm" method="post" accept-charset="utf-8">
            <div class="two fields">
                <div class="field">
                    <label>Usuario comprador</label>
                    <?php if ($usuarios['status'] != 0) {
                        echo $usuarios['data']; ?>
                    <?php } else { ?>

                        <div class="ui fluid search selection dropdown">
                            <input type="hidden" name="comprador">
                            <i class="dropdown icon"></i>
                            <div class="default text">Seleccionar usuario</div>
                            <div class="menu">
                                <?php foreach ($usuarios['data'] as $clave => $valor) { ?>
                                    <div class="item" data-value="<?php echo $valor['id']; ?>">
                                        <?php echo $valor['usuario']; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="field">
                    <label>Proveedor</label>
                    <?php if ($proveedores['status'] != 0) {
                        echo $proveedores['data']; ?>
                    <?php } else { ?>

                        <div class="ui fluid search selection dropdown">
                            <input type="hidden" name="proveedor">
                            <i class="dropdown icon"></i>
                            <div class="default text">Seleccionar proveedor</div>
                            <div class="menu">
                                <?php foreach ($proveedores['data'] as $clave => $valor) { ?>
                                    <div class="item" data-value="<?php echo $valor['id']; ?>">
                                        <?php echo $valor['proveedor']; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="fields">
                <div class="three wide field">
                    <label>Fecha desde</label>
                    <input id="fdesde" name="fdesde" type="date" onchange="validaFechas()" onkeyup="validaFechas()">
                </div>
                <div class="three wide field">
                    <label>Fecha hasta</label>
                    <input id="fhasta" name="fhasta" type="date" onchange="validaFechas()" onkeyup="validaFechas()">
                </div>
            </div>


            <button class="secondary ui button" id="bt_consultar" name="bt_consultar" type="submit">Filtrar</button>
            <div class="secondary ui button" id="bt_clear" name="bt_clear">Borrar Filtros</div>
        </form>



        <div class="separ"></div>
        <h3 class="ui dividing header"></h3>
        <table class="ui celled table">
            <?php if ($compras['status'] != 0) {
                echo $compras['data']; ?>
            <?php } else { ?>
                <thead>
                    <tr>
                        <th>Id compra</th>
                        <th>Proveedor</th>
                        <th>Comprador</th>
                        <th>Fecha</th>
                        <th>Peso Total</th>
                        <th>Valor total</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compras['data'] as $clave => $valor) { ?>
                        <tr>
                            <td data-label="id_compra">
                                <a href="<?php echo strtolower(base_url()) . 'dashboard/detallecompra/' . $valor['id']; ?>"><?php echo str_pad($valor['id'], 10, "0", STR_PAD_LEFT); ?></a>
                            </td>
                            <td data-label="proveedor"><?php echo $valor['proveedor']; ?></td>
                            <td data-label="comprador"><?php echo $valor['comprador']; ?></td>
                            <td data-label="fecha_compra"><?php echo $valor['fecha_compra']; ?></td>
                            <td data-label="peso_total" style="text-align: right;"><?php echo $valor['peso_total'] . MEDIDA_PESO; ?></td>
                            <td data-label="valor_total" style="text-align: right;"><?php echo '$ ' . $valor['valor_total']; ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4" style="text-align: center;"> TOTALES </td>
                        <td style="text-align: right;"><?php echo $sumatorias['sumPeso'] . MEDIDA_PESO; ?></td>
                        <td style="text-align: right;"><?php echo '$ ' . $sumatorias['sumValor']; ?></td>
                    </tr>
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
            $('#reporteComprasForm')[0].reset();
        });

        $('#fdesde').keypress(function(event) {
            event.preventDefault();
            return false;
        });

        $('#fhasta').keypress(function(event) {
            event.preventDefault();
            return false;
        });


    });
</script>

<?php $this->html->footer(); ?>