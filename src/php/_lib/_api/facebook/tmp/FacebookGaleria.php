<?php
/*
* FACEBOOK API WP PLUGIN: GALERIA LOOP TEMPLATE
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

foreach ($fb_obj['data'] as $item) {

    $id     = isset($item['album']['id']) ? $item['album']['id'] : "";
    $source = isset($item['images'][0]['source']) ? $item['images'][0]['source'] : ""; //hd image
    $name   = isset($item['name']) ? $item['name'] : "";
    $link   = isset($item['link']) ? $item['link'] : "";
    $likes  = isset($item['likes']['summary']['total_count']) ? $item['likes']['summary']['total_count'] : "0";

    echo "<div class='facebook-album__box'>";
        echo "<div class='facebook-album__thumb'>";
            // alt='WS - ".$_GET['album_name']."' title='WS - ".$_GET['album_name']."'
            echo "<a class='b-lazy fade facebook-album__cover fancybox' data-src='".$source."' rel='".$id."' href='".$source."' target='_blank' style='background-image: url(".$source.");' data-gallery></a>";
        echo "</div>";

        echo "<div class='facebook-album__info facebook-album__info--galeria'>";
            echo "
            <span class='facebook-album__icons'>
                <i class='fa fa-thumbs-up'></i>{$likes}
            </span>
            <span class='facebook-album__icons'>
                <i class='fa fa-facebook-square'></i>
                <a class='facebook-album__link' href='{$link}' target='_blank'>Ver no Facebook</a>
            </span>";
        echo "</div>";
    echo "</div>";
}

?>