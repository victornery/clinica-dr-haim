<?php
/*
* Thumbnail functions
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

//=========================================================================================
// RESETA TAMANHHO DE IMAGENS
//=========================================================================================

add_filter('intermediate_image_sizes','get_sizes');
function get_sizes ($sizes){
    $type = get_post_type($_REQUEST['post_id']);
    foreach($sizes as $key => $value){
        //Gera o tamanho full para o slide
        if($type=='slides'  &&  $value != 'full' && $value != 'thumb-385x180'){
            unset($sizes[$key]);
        }
        if($type=='page'  &&  $value != 'full'){unset($sizes[$key]);} //Gera o tamanhho full para pages
    }
    return $sizes;
}

//=========================================================================================
// LAZY LOAD FUNCTIONS
//=========================================================================================

function imglazy($post, $size, $efeito, $alt ) {

    $thumb = wp_get_attachment_image_src( $post, $size );
    $url = $thumb['0'];
    echo '<img class="b-lazy '.$efeito.'" data-src="'.$url.'" alt="'.$alt.'" title="'.$alt.'">';
    echo '<noscript><img src="'.$url.'" alt="'.$alt.'" title="'.$alt.'"></noscript>';
}

function thumblazy($post, $size, $efeito, $alt ) {

    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post), $size);
    $url = $thumb['0'];
    echo '<img class="b-lazy '.$efeito.'" data-src="'.$url.'" alt="'.$alt.'" title="'.$alt.'">';
    echo '<noscript><img src="'.$url.'" alt="'.$alt.'" title="'.$alt.'"></noscript>';
}

function lazyimage( $atts ) {
    // Attributes
    extract( shortcode_atts(
        array(
            'post'   => '',
            'size'   => '',
            'efeito' => 'fade',
            'alt'    => '',
            'tipo'   => 'thumb'
        ), $atts)
    );

    if(empty($post)) return false;
    if($tipo == 'attachment') {
        imglazy($post, $size, $efeito, $alt);
    } else {
        thumblazy($post, $size, $efeito, $alt);
    }

}
add_shortcode( 'lazy', 'lazyimage');