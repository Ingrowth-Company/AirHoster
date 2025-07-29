<?php

/**

* Custom Post Types

* Desenvolvedor: Bruno Lima

*/



function post_type_mimos_register() {

    $labels = array(

        'name' => 'Mimos',

        'singular_name' => 'Mimos',

        'menu_name' => 'Mimos',

        'add_new' => _x('Adicionar Mimos', 'item'),

        'add_new_item' => __('Adicionar Novo Mimos'),

        'edit_item' => __('Editar Mimos'),

        'new_item' => __('Novo Mimos')

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'publicly_queryable' => true,

        'show_ui' => true,

        'show_in_menu' => true,

        'query_var' => true,

        'rewrite' => array('slug' => 'mimos'),

        'capability_type' => 'post',

        'has_archive' => true,

        'hierarchical' => true,

        'menu_position' => 4,

        'menu_icon' => 'dashicons-book',

        'supports' => array('title','', 'thumbnail')

    );

    register_post_type('mimos', $args);

}

add_action('init', 'post_type_mimos_register');