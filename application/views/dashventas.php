
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->html->head(); ?>

<div class="container">


    <?php $this->html->menuDashboard(); ?>

    <div class="ui main container dash">
        <div class="separ"></div>
        <h1 class="ui header">Reporte Ventas</h1>


        <form class="ui form" id="reporteVentasForm" method="post" accept-charset="utf-8">
            <div class="two fields">
                <div class="field">
                    <label>Usuario vendedor</label>
                        <?php if($usuarios['status'] != 0)   {  echo $usuarios['data']; ?>
                        <?php } else{?>

                        <div class="ui fluid search selection dropdown">
                            <input type="hidden" name="vendedor">
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
                    <label>Cliente</label>
                        <?php if($clientes['status'] != 0)   {  echo $clientes['data']; ?>
                        <?php } else{?>

                        <div class="ui fluid search selection dropdown">
                            <input type="hidden" name="cliente">
                            <i class="dropdown icon"></i>
                            <div class="default text">Seleccionar cliente</div>
                            <div class="menu">
                                <?php foreach ($clientes['data'] as $clave => $valor) { ?>
                                        <div class="item" data-value="<?php echo $valor['id'];?>">
                                            <?php echo $valor['cliente'];?>
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
                $('#reporteVentasForm')[0].reset();
            });


          });

          

        </script>


<?php $this->html->footer(); ?>