<?php
/*
* YOUTUBE API WP PLUGIN
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

function TwitterShortcode( $atts ) {
    // Attributes
    extract( shortcode_atts(
        array(
            'itens' => '3',
            'name'  => ''
        ), $atts)
    );

    $tweet = new ClassTwitter();
             $tweet->getTweet();
}
add_shortcode( 'twitter', 'TwitterShortcode');