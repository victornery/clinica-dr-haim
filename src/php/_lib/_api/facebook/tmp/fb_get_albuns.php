<?php
/*
* FACEBOOK API WP PLUGIN: ALBUMS TEMPLATE
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

$div_id = md5(uniqid(rand(), true));
echo '<div id="'.$div_id.'" class="facebook-album">';

    require(FACEBOOK_DIR . '/tmp/FacebookAlbums.php');

    $newitens = $itens - 4;
    // if($newitens) : $itens = $newitens; endif;

    if($more == 'true') :
        echo '<div class="wrap-token">
        <button class="fb-more btn-more" data-qtd="'. $newitens .'" data-token="'.$fb_next.'">Ver Mais</button></div>';
    endif;
echo '</div>';
?>
