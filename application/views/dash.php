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
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Job</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Name">James</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Engineer</td>
                </tr>
                <tr>
                    <td data-label="Name">Jill</td>
                    <td data-label="Age">26</td>
                    <td data-label="Job">Engineer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
            </tbody>
        </table>


        <h3 class="ui dividing header">
            Ventas
        </h3>

        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Job</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
            </tbody>
        </table>

        <h3 class="ui dividing header">
            Lotes
        </h3>

        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Job</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
                <tr>
                    <td data-label="Name">Elyse</td>
                    <td data-label="Age">24</td>
                    <td data-label="Job">Designer</td>
                </tr>
            </tbody>
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