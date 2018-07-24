<?php
/*
* FACEBOOK API WP PLUGIN
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
*/

$token   = '1880120838904077|qQWQhUZ5HXAkAKTn5RpL3KbAivc';
$fanpage = '160348600707675';
$btnText = 'Ver mais';

define('FACEBOOK_URL', trailingslashit( get_stylesheet_directory_uri() . '/_lib/_api/facebook'));
define('FACEBOOK_DIR', trailingslashit( STYLESHEETPATH . '/_lib/_api/facebook'));

require_once FACEBOOK_DIR . '/class/ClassFacebookAlbums.php';
require_once FACEBOOK_DIR . '/includes/FacebookAjax.php';
require_once FACEBOOK_DIR . '/includes/FacebookShortcode.php';