<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->html->head(); ?>

<div class="ui text container login">
    

<div class="ui segment">
            <div class="ui basic segment">
                <form class="ui form" action="javascript:;" onsubmit="link(this)">
                    <div class="field">
                        <a href="<?php echo strtolower(base_url()); ?>" style="color: #666666">
                            <i class="arrow left icon"></i> Inicio
                        </a>
                    </div>
                    <div class="field">
                        <div style="text-align: center">
                            <img class="ui image" src="images/resdec.jpg" alt="">
                            <h3>Ingeso</h3>
                            <span id="error_login"></span>
                        </div>
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <input id="idUser" type="text" maxlength="20" name="email" autocomplete="off" placeholder="email" required="">
                    </div>
                    <div class="field">
                        <label>Contraseña</label>
                        <input id="psswd" type="password" maxlength="25" name="psswd" autocomplete="off" placeholder="contraseña" required="">
                    </div>
                    <div class="ui field">
                        <div style="text-align: right;">
                            <a href="">Olvidó su contraseña?</a>
                        </div>
                    </div>
                    <div class="ui field">
                        <div style="text-align: center">
                            <button id="btn" class="secondary ui button" type="submit">Ingresar</button>
                            <div class="ui divider"></div>
                            <div style="padding-top: 40px; font-size: 12px;">
                                Copyright 2019 - All rights reserved
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


</div>



<?php $this->html->footer(); ?>