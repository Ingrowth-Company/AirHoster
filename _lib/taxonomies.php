<?php

/*

* Configurações de Taxonomias

* Desenvolvedor: Bruno Lima

*/


$labels = array( 'name' => _x( 'Séries', 'Séries', 'text_domain' ));

$args   = array(

  'labels'            => $labels,

  'hierarchical'      => true,

  'public'            => true,

  'show_ui'           => true,

  'show_admin_column' => true,

  'show_in_nav_menus' => true,

  'show_tagcloud'     => true,

  'rewrite'           => array('slug' => 'serie'),

);



register_taxonomy( 'serie', array( 'series' ), $args);