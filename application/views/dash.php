<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->html->head(); ?>

<div class="container">


    <?php $this->html->menuDashboard(); ?>


    <div class="dash" style="padding-left:60px;padding-right:60px;">

        <h1 class="ui header">
            Administrador Procefibras App
        </h1>

        <div class="ui two column doubling grid">

            <div class="three wide column">

                <div class="separ"></div>
                <h3 class="ui dividing header">
                    Stocks
                </h3>
                <div>

                    <?php if ($stock['status'] != 0) {
                        echo $stock['data']; ?>
                    <?php } else { ?>

                        <div class="ui fluid card">
                            <?php foreach ($stock['data'] as $clave => $valor) { ?>

                                <div class="content">


                                    <h4 class="ui header"><?php echo $valor['tipo']; ?></h4>
                                    <?php echo $valor['stock']; ?> lb

                                </div>

                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            </div>


            <div class="thirteen wide column">

                <div>
                    <div class="separ"></div>
                    <h3 class="ui dividing header">
                        Compras del día
                    </h3>

                    <table class="ui celled table">
                        <?php if ($compras['status'] != 0) {
                            echo $compras['data']; ?>
                        <?php } else { ?>
                            <thead>
                                <tr>
                                    <th>Id compra</th>
                                    <th>Proveedor</th>
                                    <th>Lote</th>
                                    <th>Valor total</th>
                                    <th>Comprador</th>
                                    <th>Fecha</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($compras['data'] as $clave => $valor) { ?>
                                    <tr>
                                        <td data-label="id_compra"><?php echo str_pad($valor['id'], 10, "0", STR_PAD_LEFT); ?></td>
                                        <td data-label="proveedor"><?php echo $valor['proveedor']; ?></td>
                                        <td data-label="lote"><?php echo $valor['lote']; ?></td>
                                        <td data-label="valor_total"><?php echo '$ ' . $valor['valor_total']; ?></td>
                                        <td data-label="comprador"><?php echo $valor['comprador']; ?></td>
                                        <td data-label="fecha_compra"><?php echo $valor['fecha_compra']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        <?php } ?>

                    </table>


                    <h3 class="ui dividing header">
                        Ventas del día
                    </h3>

                    <table class="ui celled table">

                        <?php if ($ventas['status'] != 0) {
                            echo $ventas['data']; ?>
                        <?php } else { ?>
                            <thead>
                                <tr>
                                    <th>Id venta</th>
                                    <th>Cliente</th>
                                    <th>Valor total</th>
                                    <th>Vendedor</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ventas['data'] as $clave => $valor) { ?>
                                    <tr>
                                        <td data-label="id"><?php echo str_pad($valor['id'], 10, "0", STR_PAD_LEFT); ?></td>
                                        <td data-label="cliente"><?php echo $valor['cliente']; ?></td>
                                        <td data-label="valor_total"><?php echo '$ ' . $valor['valor_total']; ?></td>
                                        <td data-label="vendedor"><?php echo $valor['vendedor']; ?></td>
                                        <td data-label="fecha_venta"><?php echo $valor['fecha_venta']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        <?php } ?>
                    </table>

                    <h3 class="ui dividing header">
                        ODT del día
                    </h3>

                    <div style="overflow-x: scroll">


                        <table class="ui celled table" style="overflow-x: scroll">
                            <?php if ($odt['status'] != 0) {
                                echo $odt['data']; ?>
                            <?php } else { ?>
                                <thead>
                                    <tr>
                                        <th>Código ODT</th>
                                        <th>Material</th>
                                        <th>Proceso Selecciona</th>
                                        <th>Proceso Tritura</th>
                                        <th>Proceso Almacena</th>
                                        <th>Peso</th>
                                        <th>Faltante</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($odt['data'] as $clave => $valor) { ?>
                                        <tr>
                                            <td data-label="id"><?php echo $valor['orden_id']; ?></td>
                                            <td data-label="material"><?php echo $valor['material']; ?></td>
                                            <td>
                                                <div class="meta">
                                                    <span class="cinema" data-field="proceso_procesar"><b>Status</b>: Completo</span><br>
                                                    <span class="cinema" data-field="usuario_selecciona"><b>Seleccionador</b>: <?php echo $valor['usuario_selecciona']; ?></span><br>
                                                    <span class="cinema" data-field="fecha_ini_selecciona"><b>Inicio</b>: <?php echo $valor['fecha_ini_selecciona']; ?></span><br>
                                                    <span class="cinema" data-field="fecha_fin_selecciona"><b>Fin</b>: <?php echo $valor['fecha_fin_selecciona']; ?></span><br>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="meta">
                                                    <span class="cinema" data-field="proceso_procesar"><b>Status</b>: <?php echo ($valor['proceso_trituracion'] == 1) ? 'Completo' : 'Pendiente'; ?></span><br>
                                                    <span class="cinema" data-field="usuario_tritura"><b>Triturador</b>: <?php echo $valor['usuario_tritura']; ?></span><br>
                                                    <span class="cinema" data-field="fecha_ini_procesa"><b>Inicio</b>: <?php echo $valor['fecha_ini_tritura']; ?></span><br>
                                                    <span class="cinema" data-field="fecha_fin_procesa"><b>Fin</b>: <?php echo $valor['fecha_fin_tritura']; ?></span><br>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="meta">
                                                    <span class="cinema" data-field="proceso_almacenar"><b>Status</b>: <?php echo ($valor['proceso_almacena'] == 1) ? 'Completo' : 'Pendiente'; ?></span><br>
                                                    <span class="cinema" data-field="usuario_almacena"><b>Almacenador</b>: <?php echo $valor['usuario_almacena']; ?></span><br>
                                                    <span class="cinema" data-field="fecha_ini_almacena"><b>Inicio</b>: <?php echo $valor['fecha_ini_almacena']; ?></span><br>
                                                    <span class="cinema" data-field="fecha_fin_almacena"><b>Fin</b>: <?php echo $valor['fecha_fin_almacena']; ?></span><br>
                                                </div>
                                            </td>


                                            <td data-label="peso"><?php echo $valor['peso_total'] . ' lb'; ?></td>
                                            <td data-label="faltante"><?php echo $valor['faltante'] . ' lb'; ?></td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            <?php } ?>
                        </table>

                    </div>

                    <div class="separ"></div>
                </div>


            </div>

        </div>


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