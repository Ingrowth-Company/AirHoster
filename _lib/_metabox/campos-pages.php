<?php

  add_filter('rwmb_meta_boxes', 'wpcf_meta_boxes_pages');
  function wpcf_meta_boxes_pages($meta_boxes) {

   
    
    // ANUNCIO
    $meta_boxes[] = array(
      'id'          => 'page_anuncio',
      'title'       => 'Mídias',
      'context'     => 'normal',
      'pages' => array('page'),
      'include' => array(
        'relation'  => 'OR',
        'template'  => array('page-anuncie.php'),
      ),
      'fields'     => array(

        array(
          'id'     => 'page_anuncio_midias',
          'type'   => 'group',
          'clone' => true,
          'sort_clone' => true,
          'max_clone' => '4',
          'fields' => array(

            array(
              'id'   => 'page_anuncio_thumb',
              'type' => 'image_advanced',
              'name' => 'Imagens',
              'desc' => 'Selecione uma imagem',
              'max_file_uploads' => 1
            ),
        
            array(
              'id'   => 'page_anuncio_numero',
              'name' => 'Número de seguidores',
              'type' => 'text',
            ), 
          
            array(
              'id'   => 'page_anuncio_texto',
              'name' => 'Detalhes',
              'type' => 'text',
            ), 
          ), 
        ), 
      ),
    );



  
 
  return $meta_boxes;
}
