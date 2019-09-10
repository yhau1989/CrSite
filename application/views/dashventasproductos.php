<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->html->head(); ?>

<div class="container">


    <?php $this->html->menuDashboard(); ?>

    <div class="ui main container dash">
        <div class="separ"></div>
        <h1 class="ui header">Reporte Ventas por productos</h1>


        <form class="ui form" id="reporteVentasProductos" method="post" accept-charset="utf-8">
            <div class="two fields">
                <div class="field">
                    <div class="two fields">
                        <div class="field">
                            <label>Fecha desde</label>
                            <input id="fdesde" name="fdesde" type="date" onchange="validaFechas()" onkeyup="validaFechas()">
                        </div>
                        <div class="field">
                            <label>Fecha hasta</label>
                            <input id="fhasta" name="fhasta" type="date" onchange="validaFechas()" onkeyup="validaFechas()">
                        </div>
                    </div>
                </div>
                <div class="field">
                <label>Material</label>
                    <?php if ($materiales['status'] != 0) {
                        echo $materiales['data']; ?>
                    <?php } else { ?>

                        <div class="ui fluid search selection dropdown">
                            <input type="hidden" name="material">
                            <i class="dropdown icon"></i>
                            <div class="default text">Seleccionar material</div>
                            <div class="menu">
                                <?php foreach ($materiales['data'] as $clave => $valor) { ?>
                                    <div class="item" data-value="<?php echo $valor['id']; ?>">
                                        <?php echo $valor['tipo']; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            


            <button class="secondary ui button" id="bt_consultar" name="bt_consultar" type="submit">Filtrar</button>
            <div class="secondary ui button" id="bt_clear" name="bt_clear">Borrar Filtros</div>
        </form>


        <div class="separ"></div>
        <h3 class="ui dividing header"></h3>


        <?php if ($ventas['status'] == 0) { ?>
            <div id="exportTable" class="secondary ui button">
                <i class="arrow alternate circle down icon"></i>
                Exportar a Excel
            </div>
        <?php } ?>


        <table id="ReporteVentasPorProductos" class="ui celled table">
            <?php if ($ventas['status'] != 0) {
                echo $ventas['data']; ?>
            <?php } else { ?>
                <thead>
                    <tr>
                        <th>Id venta</th>
                        <th>Fecha venta</th>
                        <th>Material</th>
                        <th>Peso material</th>
                        <th>Valor material</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventas['data'] as $clave => $valor) { ?>
                        <tr>
                            <td data-label="id">
                                <?php echo str_pad($valor['id_venta'], 10, "0", STR_PAD_LEFT); ?>
                                <!--<a href="<?php echo strtolower(base_url()) . 'dashboard/detalleventa/' . $valor['id_venta']; ?>"><?php echo str_pad($valor['id_venta'], 10, "0", STR_PAD_LEFT); ?></a>-->
                            </td>
                            <td data-label="fecha_item"><?php echo $valor['fecha_item']; ?></td>
                            <td data-label="material"><?php echo $valor['material']; ?></td>
                            <td data-label="peso" style="text-align: right;"><?php echo $valor['peso'] . MEDIDA_PESO; ?></td>
                            <td data-label="valor" style="text-align: right;"><?php echo '$ ' . $valor['valor']; ?></td>
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


        $('#exportTable').on('click', function() {
            $('#ReporteVentasPorProductos').tableExport({
                type: 'excel',
                escape: 'false',
            });
        });


    });
</script>


<?php $this->html->footer(); ?>