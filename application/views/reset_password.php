<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<?php $this->html->head(); ?>

<div class="container">

    
    <div class="ui fixed inverted menu">
        <div class="ui container">
            <a href="<?php echo strtolower(base_url()); ?>" class="header item">
                <img class="logo" src="<?php echo strtolower(base_url()); ?>/assets/images/cropped-IMG-20181016-WA0435-2.jpg">
                <span>&nbsp; Procefibras</span>
            </a>
        </div>
    </div>

    <div class="ui main container" style="padding-top: 3em;">
        <div class="separ"></div>

        <?php if (isset($email) && strlen($email) > 0){ ?>

            <div class="ui text container">
                <form method="post" accept-charset="utf-8" class="ui form" id="form_chgpwsd">
                    <div class="field">
                        <a href="<?php echo strtolower(base_url()); ?>" style="color: #666666">
                            <i class="arrow left icon"></i> Inicio
                        </a>
                    </div>
                    
                    <div class="field">
                        <label>Contraseña</label>
                        <input id="psswd" type="password" maxlength="25" name="psswd" autocomplete="off" placeholder="contraseña" required>
                    </div>
                    <div class="field">
                        <label>Confirme su contraseña</label>
                        <input id="psswd2" type="password" maxlength="25" name="psswd2" autocomplete="off" placeholder="contraseña" required>
                    </div>

                    <div class="ui field">
                        <div style="text-align: center">
                            <button id="btn" class="secondary ui button" type="submit">Cambiar</button>
                            <div class="ui divider"></div>
                            <div style="padding-top: 40px; font-size: 12px;">
                                Copyright 2019 - All rights reserved
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        <?php } else {?>

            <h4><?php echo (isset($mensaje) ? $mensaje : ''); ?></h4>
        <?php }?>

    </div>

</div>



<?php $this->html->footer(); ?>