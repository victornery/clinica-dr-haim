<?php
/*
* YOUTUBE API WP PLUGIN: GET VIDEOS TEMPLATE
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

echo '<div id="'.md5(uniqid(rand(), true)).'" class="youtube-search-list">';
    echo '<div class="frame-video">';
        $i = '0';
        foreach ($yt_obj['items'] as $item) {


            $yt_title = $item['snippet']['title'];
            $yt_desc  = $item['snippet']['description'];
            $yt_img   = $item['snippet']['thumbnails']['high']['url'];
            $yt_video = $item['id']['videoId'];

            $yt_sts   = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&id={$yt_video}&key={$api_key}");
            $yt_info  = json_decode($yt_sts, true);


            $yt_views = number_format( $yt_info['items'][0]['statistics']['viewCount'], 2, '.', '.' );
            $yt_likes = number_format( $yt_info['items'][0]['statistics']['likeCount'], 2, '.', '.' );


            if($i == '0') {
                    echo '<div class="youtube__iframe">';
                        echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$yt_video.'" frameborder="0" allowfullscreen></iframe>';
                    echo '</div>';
                    echo ($title == 'true' ? '<div class="youtube__title">'.$yt_title.'</div>' : '');
                    echo ($likes == 'true' ? '<div class="youtube__statistics statistics">
                        <span class="statistics__views"><i class="fa fa-eye"></i>'.$yt_info['items'][0]['statistics']['viewCount'].'</span>
                        <span class="statistics__likes"><i class="fa fa-heart-o"></i>'.$yt_info['items'][0]['statistics']['likeCount'].'</span>
                    </div>' : '');
                    echo ($caption == 'true' ? '<div class="youtube__caption">'.$yt_desc.'</div>' : '');
                echo '</div>';
                echo '<div class="list-videos">';
                $i++;
            } else {
                echo '<div class="youtube__square">';
                echo '<div class="youtube__thumb b-lazy fade" data-src="'.$yt_img.'">';
                    echo '<a href="http://youtube.com/watch?v=$yt_video" target="_blank"></a>';
                echo '</div>';
                echo ($likes == 'true' ? '<div class="youtube__statistics statistics">
                        <span class="statistics__views"><i class="fa fa-eye"></i>'.$yt_info['items'][0]['statistics']['viewCount'].'</span>
                        <span class="statistics__likes"><i class="fa fa-heart-o"></i>'.$yt_info['items'][0]['statistics']['likeCount'].'</span>
                    </div>' : '');
                echo ($title == 'true' ? '<div class="youtube__title">'.$yt_title.'</div>' : '');
                echo ($caption == 'true' ? '<div class="youtube__caption">'.$yt_desc.'</div>' : '');
                echo '</div>';
            }
        }

    if($pages == 'true') :
        $new_itens = $itens - 1;
        echo '<div class="wrap-token"><button class="yt-more-videos btn-more" data-title="'.$title.'" data-like="'.$likes.'" data-caption="'.$caption.'" data-qtd="'. $new_itens .'" data-token="'.$yt_next.'">Ver Mais</button></div>';
    endif;

    echo '</div>';
echo '</div>';
?>