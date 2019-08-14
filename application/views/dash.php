<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->html->head(); ?>

<div class="container">


    <?php $this->html->menuDashboard(); ?>

    <div class="ui main container dash">
        <div class="separ"></div>
        <h1 class="ui header">Administrador Procefibras App</h1>


        <h3 class="ui dividing header">
            Compras
        </h3>

        <table class="ui celled table">
            <?php  if($compras['status'] != 0)   {  echo $compras['data']; ?>
            <?php } else{?>
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
                            <td data-label="proveedor"><?php echo $valor['proveedor'];?></td>
                            <td data-label="lote"><?php echo $valor['lote'];?></td>
                            <td data-label="valor_total"><?php echo '$ ' . $valor['valor_total'];?></td>
                            <td data-label="comprador"><?php echo $valor['comprador'];?></td>
                            <td data-label="fecha_compra"><?php echo $valor['fecha_compra'];?></td>
                        </tr>
                    <?php } ?> 
                </tbody>
            <?php }?>
           
        </table>


        <h3 class="ui dividing header">
            Ventas
        </h3>

        <table class="ui celled table">

        <?php  if($ventas['status'] != 0)   {  echo $ventas['data']; ?>
            <?php } else{?>
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
                            <td data-label="cliente"><?php echo $valor['cliente'];?></td>
                            <td data-label="valor_total"><?php echo '$ ' . $valor['valor_total'];?></td>
                            <td data-label="vendedor"><?php echo $valor['vendedor'];?></td>
                            <td data-label="fecha_venta"><?php echo $valor['fecha_venta'];?></td>
                        </tr>
                    <?php } ?> 
                </tbody>
            <?php }?>
        </table>

        <h3 class="ui dividing header">
            Lotes
        </h3>

        <div style="overflow-x: scroll">

        
        <table class="ui celled table" style="overflow-x: scroll">
        <?php  if($lotes['status'] != 0)   {  echo $lotes['data']; ?>
            <?php } else{?>
                <thead>
                    <tr>
                        <th>Lote</th>
                        <th>Compra</th>
                        <th>Proceso Selecciona</th>
                        <th>Proceso Tritura</th>
                        <th>Proceso Almacena</th>
                        <th>Proceso Material</th>
                        <th>Peso</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lotes['data'] as $clave => $valor) { ?>
                        <tr>
                            <td data-label="id"><?php echo $valor['lote']; ?></td>
                            <td>
                                <div class="meta">
                                    <span class="cinema" data-field="usuario_compra"><b>Comprador</b>: <?php echo $valor['usuario_compra'];?></span><br>
                                    <span class="cinema" data-field="fecha_ini_compra"><b>Inicio</b>: <?php echo $valor['fecha_ini_compra'];?></span><br>
                                    <span class="cinema" data-field="fecha_fin_compra"><b>Fin</b>: <?php echo $valor['fecha_fin_compra'];?></span><br>
                                </div>
                            </td>
                            <td>
                                <div class="meta">
                                    <span class="cinema" data-field="proceso_selecciona"><b>Status</b>: <?php echo ($valor['proceso_selecciona'] == 1) ? 'Completo' : 'Pendiente' ;?></span><br>
                                    <span class="cinema" data-field="usuario_selecciona"><b>Seleccionador</b>: <?php echo $valor['usuario_selecciona'];?></span><br>
                                    <span class="cinema" data-field="fecha_ini_selecciona"><b>Inicio</b>: <?php echo $valor['fecha_ini_selecciona'];?></span><br>
                                    <span class="cinema" data-field="fecha_fin_selecciona"><b>Fin</b>: <?php echo $valor['fecha_fin_selecciona'];?></span><br>
                                </div>
                            </td>

                            <td>
                                <div class="meta">
                                    <span class="cinema" data-field="proceso_procesar"><b>Status</b>: <?php echo ($valor['proceso_procesar'] == 1) ? 'Completo' : 'Pendiente';?></span><br>
                                    <span class="cinema" data-field="usuario_tritura"><b>Triturador</b>: <?php echo $valor['usuario_tritura'];?></span><br>
                                    <span class="cinema" data-field="fecha_ini_procesa"><b>Inicio</b>: <?php echo $valor['fecha_ini_procesa'];?></span><br>
                                    <span class="cinema" data-field="fecha_fin_procesa"><b>Fin</b>: <?php echo $valor['fecha_fin_procesa'];?></span><br>
                                </div>
                            </td>

                            <td>
                                <div class="meta">
                                    <span class="cinema" data-field="proceso_almacenar"><b>Status</b>: <?php echo ($valor['proceso_almacenar'] == 1) ? 'Completo' : 'Pendiente';?></span><br>
                                    <span class="cinema" data-field="usuario_almacena"><b>Almacenador</b>: <?php echo $valor['usuario_almacena'];?></span><br>
                                    <span class="cinema" data-field="fecha_ini_almacena"><b>Inicio</b>: <?php echo $valor['fecha_ini_almacena'];?></span><br>
                                    <span class="cinema" data-field="fecha_fin_almacena"><b>Fin</b>: <?php echo $valor['fecha_fin_almacena'];?></span><br>
                                </div>
                            </td>
                            
                            <td data-label="material"><?php echo $valor['material'];?></td>
                            <td data-label="peso"><?php echo $valor['peso'] . ' lb';?></td>
                        </tr>
                    <?php } ?> 
                </tbody>
            <?php }?>
        </table>

        </div>

        <div class="separ"></div>
    </div>




    <div class="ui inverted vertical footer segment">
        <div class="separ"></div>
        <div class="ui container">
      <div class="ui stackable inverted divided equal height stackable grid">
        <div class="three wide column">
          <h4 class="ui inverted header">Frameworks Usados</h4>
          <div class="ui inverted link list">
            <a href="https://facebook.github.io/react-native/" class="item" target="_blank" rel="noopener noreferrer">React Native</a>
            <a href="https://medoo.in/" class="item" target="_blank" rel="noopener noreferrer">Medoo</a>
            <a href="https://www.codeigniter.com/" class="item" target="_blank" rel="noopener noreferrer">Codeigniter</a>
            <a href="https://semantic-ui.com/" class="item" target="_blank" rel="noopener noreferrer">Semantic UI</a>
            <a href="https://expo.io/" class="item" target="_blank" rel="noopener noreferrer">Expo</a>
          </div>
        </div>
        <div class="three wide column">
          <h4 class="ui inverted header">Tecnologias Usadas</h4>
          <div class="ui inverted link list">
            <a href="https://www.mysql.com/" target="_blank" rel="noopener noreferrer" class="item">MySql</a>
            <a href="https://php.net/" target="_blank" rel="noopener noreferrer" class="item">PHP</a>
            <a href="https://developer.mozilla.org/es/docs/Web/JavaScript" target="_blank" rel="noopener noreferrer" class="item">JavaScript</a>
            <a href="https://cloud.google.com/" target="_blank" rel="noopener noreferrer" class="item">Google Cloud</a>
          </div>
        </div>
        <div class="seven wide column">
          <h4 class="ui inverted header">Gracias</h4>
          <p>Gracias a nuestros profesores por incentivar la investigación y el desarrollo</p>
        </div>
      </div>
    </div>
        <div class="separ"></div>
    </div>


</div>



<?php $this->html->footer(); ?>