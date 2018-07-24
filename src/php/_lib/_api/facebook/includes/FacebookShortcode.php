<?php
/*
* FACEBOOK API WP PLUGIN: SHORTCODE
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

function FacebookShortcode( $atts ) {
    // Attributes
    extract( shortcode_atts(
        array(
            'token'   => '',
            'fanpage' => '',
            'itens'   => '',
            'more'    => 'true'
        ), $atts)
    );

    if (empty($token) || empty($fanpage)) return false;

    $fb_album = new ClassFacebook($token, $fanpage, $itens, $more, '');
    $fb_album->getFacebook();
}
add_shortcode( 'facebook', 'FacebookShortcode');

function FacebookShortcodeGaleria( $atts ) {
    // Attributes
    extract( shortcode_atts(
        array(
            'token'   => '',
            'album' => '',
            'itens'   => '',
            'more'    => 'true'
        ), $atts)
    );

    if (empty($token) || empty($album)) return false;

    $fb_album = new ClassFacebook($token, $album, $itens, $more, '');
    $fb_album->getFacebookGallery();
}
add_shortcode( 'galeriafb', 'FacebookShortcodeGaleria');