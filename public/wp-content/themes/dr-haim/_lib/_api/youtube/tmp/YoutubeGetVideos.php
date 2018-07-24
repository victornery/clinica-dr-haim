<?php
/*
* YOUTUBE API WP PLUGIN: LOAD VIDEOS TEMPLATE
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

foreach ($yt_obj['items'] as $item) {

    //VIDEOS INFO
    $yt_title = $item['snippet']['title'];
    $yt_desc  = $item['snippet']['description'];
    $yt_img   = $item['snippet']['thumbnails']['high']['url'];
    $yt_video = $item['id']['videoId'];

    //VIDEOS STATISTICS
    $yt_sts   = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&id={$yt_video}&key={$api_key}");
    $yt_info  = json_decode($yt_sts, true);
    $yt_views = number_format( $yt_info['items'][0]['statistics']['viewCount'], 0, '.', '.' );
    $yt_likes = number_format( $yt_info['items'][0]['statistics']['likeCount'], 0, '.', '.' );

    //PRINT VIDEO LIST
    echo '<div class="youtube__square">';
        echo '<div class="youtube__thumb">';
            echo '<a class="youtube__link open-popup-video" data-effect="mfp-zoom-in" data-video="'.$yt_video.'" href="#'.$div_id.'_popup">
                <div class="b-lazy fade youtube__img" data-src="'.$yt_img.'"></div>
                <span class="youtube__play"></span>
            </a>';
        echo '</div>';
        echo '<div class="youtube__statistics">';
            echo '<span class="youtube__views"><i class="fa fa-eye"></i>'.$yt_views.'</span>';
            echo '<span class="youtube__likes"><i class="fa fa-heart-o"></i>'.$yt_likes.'</span>';
        echo '</div>';
        echo '<div class="youtube__title">'.$yt_title.'</div>';
    echo '</div>';
}

?>