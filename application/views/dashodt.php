<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->html->head(); ?>

<div class="container">


    <?php $this->html->menuDashboard(); ?>

    <div class="ui main container dash">
        <div class="separ"></div>
        <h1 class="ui header">Reporte ODT</h1>


        <form class="ui form" id="reporteVentasForm" method="post" accept-charset="utf-8">
            <div class="two fields">
                <div class="field">
                    <label>Usuario Procesa</label>
                    <?php if ($usuarios['status'] != 0) {
                        echo $usuarios['data']; ?>
                    <?php } else { ?>

                        <div class="ui fluid search selection dropdown">
                            <input type="hidden" name="usuarioProceso">
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
                    <label>Tipo de Material</label>
                    <?php if ($materiales['status'] != 0) {
                        echo $materiales['data']; ?>
                    <?php } else { ?>

                        <div class="ui fluid search selection dropdown">
                            <input type="hidden" name="material">
                            <i class="dropdown icon"></i>
                            <div class="default text">Seleccionar tipo de materiales</div>
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
            <div class="fields">
                <div class="three wide field">
                    <label>Fecha desde (proceso)</label>
                    <input id="fdesde" name="fdesde" type="date" onchange="validaFechas()" onkeyup="validaFechas()">
                </div>
                <div class="three wide field">
                    <label>Fecha hasta (proceso)</label>
                    <input id="fhasta" name="fhasta" type="date" onchange="validaFechas()" onkeyup="validaFechas()">
                </div>
                <div class="three wide field">
                    <label>Proceso</label>
                    <select class="ui fluid dropdown" name="proceso">
                        <option value="">Selecciona un proceso</option>
                        <!--<option value="1">Selección</option>-->
                        <option value="2">Trituración</option>
                        <option value="3">Almacenamiento</option>
                    </select>
                </div>
                <div class="three wide field">
                    <label>Estado Proceso</label>
                    <select class="ui fluid dropdown" name="status_proceso">
                        <option value="">Selecciona un estado</option>
                        <option value="0">Pendiente</option>
                        <option value="1">Completo</option>
                    </select>
                </div>
            </div>


            <button class="secondary ui button" id="bt_consultar" name="bt_consultar" type="submit">Filtrar</button>
            <div class="secondary ui button" id="bt_clear" name="bt_clear">Borrar Filtros</div>
        </form>


        <div class="separ"></div>
        <h3 class="ui dividing header"></h3>


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
                        <th>Peso ODT original</th>
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


                            <td data-label="peso" style="text-align: right;"><?php echo $valor['peso_total'] . MEDIDA_PESO; ?></td>
                            <td data-label="faltante" style="text-align: right;"><?php echo $valor['faltante'] . MEDIDA_PESO; ?></td>

                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="5" style="text-align: center;"> TOTALES </td>
                        <td style="text-align: right;"><?php echo $sumatorias['sumPeso'] . MEDIDA_PESO; ?></td>
                        <td style="text-align: right;"><?php echo $sumatorias['sumFaltante']  . MEDIDA_PESO; ?></td>
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
            $('#reporteVentasForm')[0].reset();
        });


    });
</script>


<?php $this->html->footer(); ?>