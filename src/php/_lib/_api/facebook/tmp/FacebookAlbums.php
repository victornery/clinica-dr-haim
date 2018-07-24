<?php
/*
* FACEBOOK API WP PLUGIN: ALBUMS LOOP TEMPLATE
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

foreach ($fb_obj['data'] as $item) {
    $settings    = get_option( 'options_gerais');
    $id          = isset($item['id']) ? $item['id'] : "";
    $data        = isset($item['created_time']) ? $item['created_time'] : "";
    $name        = isset($item['name']) ? $item['name'] : "";
    $description = isset($item['description']) ? $item['description'] : "";
    $link        = isset($item['link']) ? $item['link'] : "";
    $likes       = isset($item['likes']['summary']['total_count']) ? $item['likes']['summary']['total_count'] : "0";
    $cover_photo = isset($item['cover_photo']['id']) ? $item['cover_photo']['id'] : "";
    $count       = isset($item['count']) ? $item['count'] : "";
    $album_link  = get_page_link($settings['settings_fotos_url'])."album?id=".$id."&album_name=".urlencode($name)."&data=".date('Y-m-d', strtotime($data));

    //excluir albuns da variável $remove e de "Profile Pictures", "Cover" e "Timeline"
    if($name!="Profile Pictures" && $name!="Cover Photos" && $name!="Timeline Photos" && $name!="Mobile Uploads"){

        echo "<div class='facebook-album__box'>";
            echo "<div class='facebook-album__thumb'>";
                echo "<a class='facebook-album__cover' href='".$album_link."' style='background-image: url(https://graph.facebook.com/v2.7/".$cover_photo."/picture?access_token=".$token.");'>";
                echo "</a>";
            echo "</div>";
            echo "<div class='facebook-album__data'>".date('d/m/Y', strtotime($data))."</div>";
            echo "<h4 class='facebook-album__titulo'>";
                echo "<a class='facebook-album__link' href='{$album_link}'>{$name}</a>";
            echo "</h4>";
            echo "<div class='facebook-album__info'>";
                echo "<span class='facebook-album__icons'>
                    <i class='fa fa-camera'></i> {$count}
                </span>
                <span class='facebook-album__icons'>
                    <i class='fa fa-facebook-square'></i>
                    <a class='facebook-album__link' href='{$link}' target='_blank'>Ver no Facebook</a>
                </span>";
            echo "</div>";
        echo "</div>";
    }
}