<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->html->head(); ?>

<div class="container">
    <div class="seccionSlider">
        <div class="ui container">
            <div class="ui large secondary pointing menu hidden">
                <a class="item">Inicio</a>
                <a class="item"  href="#seccionApp">App</a>
                <a class="item" href="#seccionEmpresa">Empresa</a>
                <a class="item" href="#seccionProcesos">Procesos</a>
                <div class="right item">
                    <a href="<?php echo strtolower(base_url()); ?>ingreso" class="ui secondary button">Login</a>
                </div>
			</div>
        </div>
        <div  class="sliderContet">
            <div class="ui text container samo">
                <h1>Procefibras App</h1>
                <h2>App para la gestion de residuos de INNOMINE S.A.</h2>
                <div  class="ui huge secondary button">Descardar App <i class="right arrow icon"></i></div>
            </div>
        </div>
    </div>

    <div id="seccionApp" class="ui vertical stripe segment">
        <div  class="ui middle aligned stackable grid container">
            <div class="row">
                <div class="eight wide column">
                    <h3 class="ui header">We Help Companies and Companions</h3>
                    <p>We can give your company superpowers to do things that they never thought possible. Let us
                        delight your customers and empower your needs...through pure data analytics.</p>
                    <h3 class="ui header">We Make Bananas That Can Dance</h3>
                    <p>Yes that's right, you thought it was the stuff of dreams, but even bananas can be bioengineered.
                    </p>
                </div>
                <div class="six wide right floated column">
                    <img src="<?php echo strtolower(base_url()); ?>/assets/images/93e38a80576251.5d26f2bb67625.jpg" class="ui large bordered rounded image">
                </div>
            </div>
            <div class="row">
                <div class="center aligned column">
                    <a class="ui huge button">Check Them Out</a>
                </div>
            </div>
		</div>
		<div class="separ"></div>
	</div>

	<div id="seccionEmpresa" class="ui vertical stripe quote segment">
	<div class="separ"></div>
    <div class="ui equal width stackable internally celled grid">
      <div class="center aligned row">
        <div class="column">
          <h3>"What a Company"</h3>
          <p>That is what they all say about us</p>
        </div>
        <div class="column">
          <h3>"I shouldn't have gone with their competitor."</h3>
          <p>
            <img  class="ui avatar image"> <b>Nan</b> Chief Fun Officer Acme Toys
          </p>
        </div>
      </div>
	</div>
	<div class="separ"></div>
  </div>

  

  <div id="seccionProcesos" class="ui vertical stripe segment">
  <div class="separ"></div>
    <div class="ui text container">
      <h3 class="ui header">Breaking The Grid, Grabs Your Attention</h3>
      <p>Instead of focusing on content creation and hard work, we have learned how to master the art of doing nothing by providing massive amounts of whitespace and generic content that can seem massive, monolithic and worth your attention.</p>
      <a class="ui large button">Read More</a>
      <h4 class="ui horizontal header divider">
        <a href="#">Case Studies</a>
      </h4>
      <h3 class="ui header">Did We Tell You About Our Bananas?</h3>
      <p>Yes I know you probably disregarded the earlier boasts as non-sequitur filler content, but its really true. It took years of gene splicing and combinatory DNA research, but our bananas can really dance.</p>
      <a class="ui large button">I'm Still Quite Interested</a>
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
            <a href="https://facebook.github.io/react-native/" class="item">React Native</a>
            <a href="https://medoo.in/" class="item">Medoo</a>
            <a href="https://www.codeigniter.com/" class="item">Codeigniter</a>
            <a href="https://semantic-ui.com/" class="item">Semantic UI</a>
          </div>
        </div>
        <div class="three wide column">
          <h4 class="ui inverted header">Tecnologias Usadas</h4>
          <div class="ui inverted link list">
            <a href="https://www.mysql.com/" class="item">MySql</a>
            <a href="https://php.net/" class="item">PHP</a>
            <a href="https://developer.mozilla.org/es/docs/Web/JavaScript" class="item">JavaScript</a>
            <a href="https://cloud.google.com/" class="item">Google Cloud</a>
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