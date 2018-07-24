<?php
/*
* YOUTUBE API WP PLUGIN: LOAD MORE TEMPLATE
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

require(YOUTUBE_DIR . '/tmp/YoutubeGetVideos.php');

if($yt_next) :
    echo '<div class="wrap-token"><button class="yt-more-videos btn-more" data-id="'.$div_id.'_popup" data-title="'.$title.'" data-like="'.$likes.'" data-caption="'.$caption.'" data-qtd="'. $itens .'" data-token="'.$yt_next.'">Ver Mais</button></div>';
endif;

?>