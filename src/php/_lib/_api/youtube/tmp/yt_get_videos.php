<?php
/*
* YOUTUBE API WP PLUGIN: GET VIDEOS TEMPLATE
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

$div_id = md5(uniqid(rand(), true));

echo '<div id="'.$div_id.'_popup" class="mfp-modal mfp-modal--video mfp-hide">aaa</div>';
echo '<div id="'.$div_id.'" class="youtube-search-list">';
    // echo '<div class="list-videos">';

        require(YOUTUBE_DIR . '/tmp/YoutubeGetVideos.php');

        if($pages == 'true' && $yt_next) :
            echo '<div class="wrap-token"><button class="yt-more-videos btn-more" data-id="'.$div_id.'_popup" data-title="'.$title.'" data-like="'.$likes.'" data-caption="'.$caption.'" data-qtd="'. $itens .'" data-token="'.$yt_next.'">Ver Mais</button></div>';
        endif;

    // echo '</div>';
echo '</div>';
?>