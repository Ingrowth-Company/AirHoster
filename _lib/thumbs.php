<?php

/*

* Thumbnail functions

* Desenvolvedor: Bruno Lima

*/



//=========================================================================================

// ADICIONANDO TAMANHHO DE IMAGENS

//=========================================================================================



if (function_exists('add_image_size')) {

//     add_image_size('thumb-small', 500, 190, true );

//     add_image_size('thumb-medium', 800, 304, true );

//     add_image_size('thumb-large', 1080, 410, true );
      add_image_size('thumb-large', 970, 250, true );

}



// FUNÇÃO PARA CUSTOMIZAR O TEMA ATRAVÉS DO PAINEL.

// https://codex.wordpress.org/Theme_Customization_API

// tutor: https://scriptcerto.com.br/blogwordpress/o-guia-completo-personalizador-tema-wordpress/

function cd_customizer_settings ($wp_customize) {



    // adiciona a config. para fazer upload da logo desktop.

    $wp_customize->add_setting( 'logo_header_desktop' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_header_desktop', array(

        'label'    => __( 'Logo Header Desktop', 'm1' ),

        'section'  => 'title_tagline',

        'settings' => 'logo_header_desktop',

    ))); 



    $wp_customize->add_setting( 'logo_footer_desktop' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_footer_desktop', array(

        'label'    => __( 'Logo Footer Desktop', 'm1' ),

        'section'  => 'title_tagline',

        'settings' => 'logo_footer_desktop',

    )));

    

}

add_action ('customize_register', 'cd_customizer_settings');



function create_responsive_image( $img ) {

    $img_id = attachment_url_to_postid( $img );

    $img_srcset = wp_get_attachment_image_srcset( $img_id );

    $img_sizes = wp_get_attachment_image_sizes( $img_id );

    return '<img src="' . $img . '" srcset="'.$img_srcset.'" srcsize="'.$img_sizes.'" width="170px" height="45px" alt="Melhores Escolas Médicas">';

  }