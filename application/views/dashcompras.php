
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
                        <?php if($usuarios['status'] != 0)   {  echo $usuarios['data']; ?>
                        <?php } else{?>

                        <div class="ui fluid search selection dropdown">
                            <input type="hidden" name="comprador">
                            <i class="dropdown icon"></i>
                            <div class="default text">Seleccionar usuario</div>
                            <div class="menu">
                                <?php foreach ($usuarios['data'] as $clave => $valor) { ?>
                                        <div class="item" data-value="<?php echo $valor['id'];?>">
                                            <?php echo $valor['usuario'];?>
                                        </div>
                                <?php } ?> 
                            </div>
                        </div>
                    <?php } ?> 
                </div>
                <div class="field">
                    <label>Proveedor</label>
                        <?php if($proveedores['status'] != 0)   {  echo $proveedores['data']; ?>
                        <?php } else{?>

                        <div class="ui fluid search selection dropdown">
                            <input type="hidden" name="proveedor">
                            <i class="dropdown icon"></i>
                            <div class="default text">Seleccionar proveedor</div>
                            <div class="menu">
                                <?php foreach ($proveedores['data'] as $clave => $valor) { ?>
                                        <div class="item" data-value="<?php echo $valor['id'];?>">
                                            <?php echo $valor['proveedor'];?>
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



<script>

        $(function() {
            
            $('.ui.dropdown')
            .dropdown();

            $('#bt_clear').on('click', function() {
                $('.ui.dropdown').dropdown('clear');
                $('#reporteComprasForm')[0].reset();
            });


          });

          

        </script>

<?php $this->html->footer(); ?>