<?php
/*
* Metabox Settings
* Desenvolvedor: Bruno Lima
*/

// CREATE PAGE
add_filter( 'mb_settings_pages', 'prefix_options_page' );
function prefix_options_page($settings_pages){

  $settings_pages[] = array(
    'id'          => 'theme-options',
    'option_name' => 'options_gerais',
    'menu_title'  => 'Frontpage',
  );
  return $settings_pages;

}

// START DEFINITION OF META BOXES
add_filter( 'rwmb_meta_boxes', 'prefix_options_meta_boxes' );
function prefix_options_meta_boxes( $meta_boxes ) {

  // GTM
  $meta_boxes[] = array(
    'id'        => 'gtm_codes',
    'title'     => 'GTM Code',
    'context'   => 'side',
    'priority'  => 'high',
    'settings_pages' => 'theme-options',
    'fields'    => array(

      array(
        'name'  => '',
        'id'    => 'gtm_head',
        'desc'  => 'Code Head',
        'type'  => 'textarea',
      ),

      array(
        'name'  => '',
        'id'    => 'gtm_body',
        'desc'  => 'Code Body',
        'type'  => 'textarea',
      ),
    )
  );

    // NETWORKS
    $meta_boxes[] = array(
      'id'        => 'networks',
      'title'     => 'Redes Sociais',
      'context'   => 'side',
      'priority'  => 'high',
      'settings_pages' => 'theme-options',
      'fields'    => array(
      
        array(
          'id'          => 'midia_sociais',
          'name'        => '',
          'type'        => 'group',
          'clone'       => true,
          'sort_clone'  => true,
          'collapsible' => true,
          'max_clone'       => '4',
          'group_title' => 'Link da Mídia',
          'save_state' => true,
          'fields' => array(
  
            array(
              'id'   => 'midia',
              'name' => '',
              'desc' => 'Url da mídia',
              'type' => 'text',
            ), 
            
            array(
              'id'   => 'midia_name',
              'name' => '',
              'desc' => 'Nome da mídia',
              'type' => 'text',
            ), 
  
            array(
              'id'   => 'midia_icone',
              'name' => '',
              'desc' => 'ícone da mídia',
              'type' => 'text',
            ), 
              
          )
        ),
    
      )
    );
  


  return $meta_boxes;
}