<?php

/*
* Configurações do Tema
* Desenvolvedor: Bruno Lima
* Email: brunolimadevelopment@gmail.com
*/

//===================================Painel================================================
require_once locate_template('/_lib/dashboard.php');

//================================Funções Dashboard========================================
require_once locate_template('/_lib/admin.php');//..................STYLE LOGIN/ADMIN

//===================================Features==============================================
require_once locate_template('/_lib/_features/bem.php');//..........MENU BEM CSS

//===================================Backend===============================================
require_once locate_template('/_lib/posts.php');//..................POST TYPE FUNCTIONS
require_once locate_template('/_lib/taxonomies.php');//.............TAXONOMIES FUNCTIONS
require_once locate_template('/_lib/thumbs.php');//.................THUMBNAIL FUNCTIONS

//===================================Tema==================================================

require_once locate_template('/_lib/scripts.php');//................SCRIPTS E CSS

// REMOVER BARRA ADMIN

//add_filter('show_admin_bar', '__return_false');


// CONFIGURAÇÕES DO TEMA
function tema_setup() {

  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'menu_1' => 'Menu Header',
    'menu_2' => 'Menu Footer',
    'menu_3' => 'Menu Mobile',
  ));

  add_editor_style('/assets/css/editor-style.css');//..Tell the TinyMCE editor to use a custom stylesheet
  add_theme_support('post-thumbnails');//..............Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)

  set_post_thumbnail_size(1200, 0, true);
}

add_action('after_setup_theme', 'tema_setup');



// METABOX CLASS (Fields + Taxonomies Fields)
if (is_admin()):

  define('RWMBC_URL', trailingslashit( get_stylesheet_directory_uri() . '/_lib/_metabox'));

  define('RWMBC_DIR', trailingslashit( STYLESHEETPATH . '/_lib/_metabox'));

  require_once RWMBC_DIR . 'functions.php';
  require_once RWMBC_DIR . 'campos.php';
  require_once RWMBC_DIR . 'campos-pages.php';
  require_once RWMBC_DIR . 'campos-taxonomy.php';
  require_once RWMBC_DIR . 'settings.php';

endif;

add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
  $wp_admin_bar->remove_node( 'wp-logo' );
}