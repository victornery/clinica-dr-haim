<?php
/*
* Configurações do Tema
*
*/

//=========================================================================================
// INCLUDE FUNCTIONS
//=========================================================================================

//===================================Painel================================================
require_once locate_template('/_lib/dashboard.php');
//================================Funções Dashboard========================================
require_once locate_template('/_lib/admin.php');//..................STYLE LOGIN/ADMIN
require_once locate_template('/_lib/filtros.php');//................FILTROS FIELDS
//===================================Features==============================================
require_once locate_template('/_lib/_features/social.php');//.......SOCIAL FIELDS
require_once locate_template('/_lib/_features/blog.php');//.........BLOG FUNCTIONS
require_once locate_template('/_lib/_features/remove.php');//.......CLEAN FUNCTIONS
require_once locate_template('/_lib/_features/excerpt.php');//......EXCERPT FUNCTIONS
require_once locate_template('/_lib/_features/share.php');//........SHARE FUNCTIONS
require_once locate_template('/_lib/_features/bem.php');//..........MENU BEM CSS
require_once locate_template('/_lib/_features/breadcrumbs.php');//..BREADCRUMBS
require_once locate_template('/_lib/_features/cforms.php');//.......CF7 SELECTS
require_once locate_template('/_lib/_features/dataformat.php');//...DATA FORMAT EVENTOS
// require_once locate_template('/_lib/_features/select.php');//....SELECT AJAX
require_once locate_template('/_lib/_features/pagnav.php');//.......PAGINATION
//===================================API's===============================================
require_once locate_template('/_lib/_api/youtube/youtube.php');//....YOUTUBE
require_once locate_template('/_lib/_api/facebook/facebook.php');//..FACEBOOK
//===================================Backend===============================================
require_once locate_template('/_lib/posts.php');//..................POST TYPE FUNCTIONS
//===================================Tema==================================================
require_once locate_template('/_lib/scripts.php');//................SCRIPTS E CSS
require_once locate_template('/_lib/ajax.php');//...................FUNÇÕES AJAX

//=========================================================================================
// ADICIONANDO FAVICON
//=========================================================================================

function blog_favicon() {
  echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_template_directory_uri().'/_lib/_admin/favicon.png" />';
}
add_action('wp_head', 'blog_favicon');

//=========================================================================================
// CONFIGURAÇÕES DO TEMA
//=========================================================================================

function setting_theme() {

  register_nav_menus(array(
    'nav_header' => 'Header',
  ));

  add_editor_style('/assets/css/editor-style.css');//..Tell the TinyMCE editor to use a custom stylesheet

}

add_action('after_setup_theme', 'setting_theme');

//=========================================================================================
// METABOX CLASS (Fields + Taxonomies Fields)
//=========================================================================================

if (is_admin()):
  define('RWMBC_URL', trailingslashit( get_stylesheet_directory_uri() . '/_lib/_metabox'));
  define('RWMBC_DIR', trailingslashit( STYLESHEETPATH . '/_lib/_metabox'));
  require_once RWMBC_DIR . 'functions.php';
  require_once RWMBC_DIR . 'campos.php';
  require_once RWMBC_DIR . 'campos-pages.php';
  require_once RWMBC_DIR . 'campos-taxonomy.php';
  require_once RWMBC_DIR . 'settings.php';
endif;