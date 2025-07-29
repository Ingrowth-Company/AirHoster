<?php

/*

* Scripts

* Desenvolvedor: Bruno Lima

*/

function call_script() {

    $theme = wp_get_theme();

    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.min.css', array(), $theme->get('Version'), 'all');
    wp_register_script('main', get_template_directory_uri() . '/assets/js/main.min.js', array(), $theme->get('Version'), 'all');

    wp_enqueue_script('main');
    

}

add_action('wp_enqueue_scripts', 'call_script', 100);