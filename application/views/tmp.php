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
        <?php echo (isset($titulo) ? $titulo : ''); ?>
        <h4><?php echo (isset($msg) ? $msg : ''); ?></h4>
    </div>

</div>



<?php $this->html->footer(); ?>