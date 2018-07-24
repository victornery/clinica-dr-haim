<?php
/*
* FACEBOOK API WP PLUGIN: GALERIA TEMPLATE
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

$div_id = md5(uniqid(rand(), true));

echo '<div id="'.$div_id.'" class="facebook-album">';

    require(FACEBOOK_DIR . '/tmp/FacebookGaleria.php');

    if($more == 'true' && $fb_more) :
        echo '<div class="wrap-token"><button class="fb-more-gal btn-more" data-album="'.$_GET['id'].'" data-qtd="'. $itens .'" data-token="'.$fb_next.'">Ver Mais</button></div>';
    endif;

echo '</div>';
?>
