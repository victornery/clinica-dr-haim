<?php
/*
* INSTAGRAM FETCH USER/HASHTAG: SHORTCODE
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
* Baseado no projeto de Vassardish and Bolandish: https://github.com/Bolandish/Instagram-Grabber
*/

function fetch_ig( $atts ) {

    // Attributes
    extract( shortcode_atts(
        array(
            'type'      => '',
            'ig'        => '',
            'itens'     => '',
            'size'      => '',
            'caption'   => 'true',
            'data'      => 'true',
            'template'  => 'caption',
            'likes'     => ''
        ), $atts)
    );

    if ( empty($type) || empty($ig)) return false;

    $ig_fotos = new ClassInstagram($ig, $itens, $size, $caption, $data, $template, $likes);
    if($type == 'user') : $ig_fotos->getInstagramUser(); else :  $ig_fotos->getInstagramTag(); endif;

}

add_shortcode( 'instagram', 'fetch_ig' );

?>