<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->html->head(); ?>

<div class="container">
  <div class="seccionSlider">
    <div class="ui container">
      <div class="ui large secondary pointing menu hidden">
        <a class="item">Inicio</a>
        <a class="item" href="#seccionApp">Empresa</a>
        <a class="item" href="#seccionEmpresa">App</a>
        <a class="item" href="#seccionProcesos">Tecnologías</a>
        <div class="right item">
          <a href="<?php echo strtolower(base_url()); ?>ingreso" class="ui secondary button">Login</a>
        </div>
      </div>
    </div>
    <div class="sliderContet">
      <div class="ui text container samo">
        <h1>Procefibras App</h1>
        <h2>App para la gestion de residuos de INNOMINE S.A.</h2>
        <a href="https://drive.google.com/open?id=1gUW3BVp-emTrnXC4UQyn50q4txpUrGJP" download class="ui huge secondary button">Descardar App <i class="right arrow icon"></i></a>
      </div>
    </div>
  </div>

  <div id="seccionApp" class="ui vertical stripe segment">
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="eight wide column">
          <h3 class="ui header">Soluciones para reciclaje</h3>
          <p>Empresa Ecuatoriana con experiencia en el mercado de procesamiento de Fibra, la operación en Innomine S.A – Procefibras, se basa en el respeto del tiempo de nuestros proveedores y clientes.</p>
          <h3 class="ui header">Compra de materiales</h3>
          <p>En toda la provincia del Guayas, compramos cualquier tipo de material reciclable. 
             <br><strong>Horario de atención:</strong> Lunes a Viernes de 8:00hrs a 18:00hrs, Sábados de 08:00 a 12:30
          </p>
        </div>
        <div class="six wide right floated column">
          <img src="https://procefibras.com/wp-content/uploads/2019/05/cropped-IMG-20181016-WA0435-2.jpg" class="ui large bordered rounded image">
        </div>
      </div>
      <div class="row">
        <div class="center aligned column">
          <a href="https://procefibras.com" target="_blank" rel="noopener noreferrer" class="ui huge button">Visitar sitio de la empresa</a>
        </div>
      </div>
    </div>
    <div class="separ"></div>
  </div>

  <div id="seccionEmpresa" class="ui vertical stripe quote segment">
    <div class="separ"></div>
    <div class="ui stackable internally celled grid">
      <div class="center aligned row">
        <div class="four wide column">
          <h3>Plataformas disponibles</h3>
          <p>Android y IOS</p>
        </div>
        <div class="twelve wide column">
          <h3>Proceso de control</h3>
          <p>
            <div class="ui mini ordered tablet stackable steps">
              <div class="active step">
                <div class="content">
                  <div class="title">Compra</div>
                  <div class="description">Compra de chatarra</div>
                </div>
              </div>
              <div class="active step">
                <div class="content">
                  <div class="title">Selección</div>
                  <div class="description">Selección y división de chatarra</div>
                </div>
              </div>
              <div class="active step">
                <div class="content">
                  <div class="title">Trituración</div>
                  <div class="description">Triturar la chatarra seleccionada</div>
                </div>
              </div>
              <div class="active step">
                <div class="content">
                  <div class="title">Almacenamiento</div>
                  <div class="description">Almacenar la materia prima por colores</div>
                </div>
              </div>
              <div class="active step">
                <div class="content">
                  <div class="title">Venta</div>
                  <div class="description">Venta de materia prima</div>
                </div>
              </div>
            </div>
          </p>
        </div>
      </div>
    </div>
    <div class="separ"></div>
  </div>



  <div class="ui vertical stripe segment">
    <div class="separ"></div>
    <div class="ui text container">
      <h3 class="ui header">Open source</h3>
      <p>La aplicación mobil de Profecibras, esta constriuda 100% con tecnologías Open Source, usa lenguajes de programación como PHP, JavaScript y usa una base de datos
      MySQL</p>
      <h4 class="ui horizontal header divider">
        <a href="#">Plataforma Tecnológica</a>
      </h4>
      <h3 class="ui header">Arquitectura de la Plataforma para el App</h3>
      <p>
        Para que el app funcione de manera optima y esté operativa 24/7 creo una arquitectura basada en 
        <a href="https://es.wikipedia.org/wiki/Software_como_servicio" target="_blank" rel="noopener noreferrer">Sass</a> cuenta con un Api restfull 
        (Servicio web) que permite la interacción con la base de datos, el App mobil se conecta a este servicio web el mismo que esta alojado en  
        <a href=" https://cloud.google.com/" target="_blank" rel="noopener noreferrer">Google Cloud</a> el sitio que estamos viendo y la Bade de datos estan alojados en 
        un Goole Cloud.       
      </p>
    </div>
    <div class="separ"></div>
  </div>

  <div id="seccionProcesos" class="ui inverted vertical footer segment">
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