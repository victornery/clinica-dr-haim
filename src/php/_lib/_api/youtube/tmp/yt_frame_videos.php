<?php
/*
* YOUTUBE API WP PLUGIN: GET VIDEOS TEMPLATE
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

$div_id = md5(uniqid(rand(), true));

echo '<div id="'.$div_id.'" class="youtube-search-list">';
    echo '<div class="frame-video">';
        foreach ($yt_obj['items'] as $item) {
            $yt_title = $item['snippet']['title'];
            $yt_desc  = $item['snippet']['description'];
            $yt_img   = $item['snippet']['thumbnails']['high']['url'];
            $yt_video = $item['id']['videoId'];

            $yt_sts   = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&id={$yt_video}&key={$api_key}");
            $yt_info  = json_decode($yt_sts, true);

            $yt_views = number_format( $yt_info['items'][0]['statistics']['viewCount'], 0, '.', '.' );
            $yt_likes = number_format( $yt_info['items'][0]['statistics']['likeCount'], 0, '.', '.' );

            echo '<div class="videos__thumb videos__thumb--destaque">';
                echo '<div id="'.$div_id.'_palco" class="youtube__iframe load">';
                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$yt_video.'?rel=0" frameborder="0" allowfullscreen></iframe>';
                echo '</div>';
            echo '</div>';
            echo '<div class="videos__desc">
                    <div class="videos__title">Fala Eusébio</div>
                    <div class="videos__title videos__title--big">'.$yt_title.'</div>
                </div>';
        }

    if($pages == 'true' && $yt_next) :
        $new_itens = $itens - 1;
        echo '<div class="wrap-token"><button class="yt-more-videos btn-more" data-title="'.$title.'" data-like="'.$likes.'" data-caption="'.$caption.'" data-qtd="'. $new_itens .'" data-token="'.$yt_next.'">Ver Mais</button></div>';
    endif;

    echo '</div>';
echo '</div>';
?>