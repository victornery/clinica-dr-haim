<?php
/*
* INSTAGRAM API WP PLUGIN
* Desenvolvedor: Nicholas Lima
* Email: nick.lima.wp@gmail.com
* Baseado no projeto de Vassardish and Bolandish: https://github.com/Bolandish/Instagram-Grabber
*/

define('INSTAGRAM_URL', trailingslashit( get_stylesheet_directory_uri() . '/_lib/_api/instagram'));
define('INSTAGRAM_DIR', trailingslashit( STYLESHEETPATH . '/_lib/_api/instagram'));

require_once INSTAGRAM_DIR . '/class/InstagramClass.php';
require_once INSTAGRAM_DIR . '/includes/InstagramShortcode.php';