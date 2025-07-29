<?php



    $prefix = 'wpcf_';

    

    add_filter('rwmb_meta_boxes', 'wpcf_meta_boxes');

    

    function wpcf_meta_boxes($meta_boxes) {


      // POSTS MIMOS

      $meta_boxes[] = array(

        'id'         => 'mimos',

        'title'      => 'Mimos para download',

        'post_types' => array('mimos'),

        'context'    => 'side',

        'priority'   => 'high',

        'fields'     => array ( 



          array(

            'id'        => "mimos_destaque",

            'name'      => 'Destaque',

            'type'      => 'radio',

            'options'   => array('1' => 'Sim', '0' => 'Nao'),

            'std'       => '0',

            'admin_columns' => 'after title',

          ),



          // array(

          //   'id'         => "mimos_link",

          //   'name'       => 'Link de Download',

          //   'type'       => 'text',

          //   'admin_columns' => 'after title',

          // ), 

          array(

            'id'         => "mimos_id_form",

            'name'       => 'ID FORM RD',

            'type'       => 'text',

            'admin_columns' => 'after title',

          ), 



          array(

            'id'         => "mimos_desc",

            'name'       => 'Subtítulo',

            'type'       => 'textarea',

            'admin_columns' => 'after title',

          ), 



        ),

      );



      // POSTS VIDEOS

      $meta_boxes[] = array(

        'id'             => 'videos_webseries',

        'title'          => 'DETALHES DO VÍDEO',

        'context'        => 'normal',

        'post_types' => array('series'),

        'fields'     => array(



          array(

            'id'         => "video_texto",

            'name'       => '',

            'type'    => 'textarea'

          ), 

          array(
            'id'         => "series_url",
            'desc'       => 'Insira a URL do vídeo',
            'type'       => 'text'
          ), 

        ),

      );



      // POSTS PODCASTS

      $meta_boxes[] = array(

        'id'             => 'podcasts',

        'title'          => 'Detalhes do Podcast',

        'context'        => 'side',

        'post_types' => array('podcasts'),

        'fields'     => array(



          array(

            'id'         => "podcast_texto",

            'name'       => '',

            'type'    => 'textarea'

          ), 

        ),

      );



      $meta_boxes[] = array(

        'id'             => 'podcasts_ctas',

        'title'          => 'Opções do podcast',

        'context'        => 'normal',

        'post_types' => array('podcasts'),

        'fields'     => array(



          array(

            'id'          => 'podcast_cta',

            'name'        => '',

            'type'        => 'group',

            'clone'       => true,

            'sort_clone'  => true,

            'collapsible' => true,

            'max_clone'       => '6',

            'group_title' => 'Botão',

            'save_state' => true,

            'fields' => array(

  

              array(

                'id'   => 'podcast_title',

                'name' => 'Texto do botão',

                'type' => 'text',

              ),

              

              array(

                'id'   => 'podcast_link',

                'name' => 'URL do botão',

                'type' => 'text',

              ),

              

              array(

                'id'   => 'podcast_cor',

                'name' => 'Cor do botão',

                'type' => 'color',

              ),  

            )

          ), 

        ),

      );

      
      // BANNER LINK
      $meta_boxes[] = array(
        'id'         => 'mb_banner_link',
        'title'      => 'Link do banner',
        'post_types' => array('banner'),
        'context'    => 'side',
        'priority'   => 'high',
        'fields'     => array ( 
          array(
            'id'         => "banner_link",
            'name'       => '',
            'type'       => 'text'
          ), 
        ),
      );

      // BANNERS DO DESKTOP
      $meta_boxes[] = array(
        'id'         => 'mb_banner_thumb_desktop',
        'title'      => '[DESTAQUES] HEADER | FOOTER | SIDEBAR',
        'post_types' => array('banner'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields'     => array ( 

          array(
            'id'   => 'banner_thumb',
            'type' => 'image_advanced',
            'name' => '',
            'desc' => 'Mobile (300x100)',
            'columns' => 4,
            'max_file_uploads' => 1
          ),

          array(
            'id'   => 'banner_thumb_desktop',
            'type' => 'image_advanced',
            'name' => '',
            'desc' => 'Desktop (1030x128)',
            'columns' => 4,
            'max_file_uploads' => 1
          ),

          array(
            'id'   => 'banner_thumb_vertical_desktop',
            'type' => 'image_advanced',
            'name' => '',
            'desc' => 'Desktop Sidebar (320x400)',
            'columns' => 4,
            'max_file_uploads' => 1
          ),

          
        ),
      );

      // BANNERS INTERNOS VESTIBULAR
      $meta_boxes[] = array(
        'id'         => 'mb_banner_interno_vestibular_desktop',
        'title'      => '[DESTAQUE] VESTIBULAR',
        'post_types' => array('banner'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields'     => array ( 

          array(
            'id'   => 'banner_interno_vestibular_desktop',
            'type' => 'image_advanced',
            'name' => '',
            'desc' => 'Desktop (768x90)',
            'columns' => 4,
            'max_file_uploads' => 1
          ),

          array(
            'id'   => 'banner_interno_vestibular_mobile',
            'type' => 'image_advanced',
            'name' => '',
            'desc' => 'Mobile (300x200)',
            'columns' => 4,
            'max_file_uploads' => 1
          ),

        ),
      );


      // BANNER NOTICIAS E MATERIAS
      $meta_boxes[] = array(
        'id'         => 'mb_banner_interno_desktop',
        'title'      => '[INTERNOS] NOTICIAS | MATÉRIAS',
        'post_types' => array('banner'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields'     => array ( 

          array(
            'id'   => 'banner_interno_desktop',
            'type' => 'image_advanced',
            'name' => '',
            'desc' => 'Desktop (970x250)',
            'columns' => 4,
            'max_file_uploads' => 1
          ),

          array(
            'id'   => 'banner_interno_mobile',
            'type' => 'image_advanced',
            'name' => '',
            'desc' => 'Mobile (300x200)',
            'columns' => 4,
            'max_file_uploads' => 1
          ),

        ),
      );

      // DATA DE EXPIRAÇÃO
      $meta_boxes[] = array(
        'id'         => 'mb_banner_expiracao',
        'title'      => 'Data de expiração',
        'post_types' => array('banner'),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields'     => array ( 

          array(
            'id' => 'banner_expiracao',
            'type' => 'datetime',
            'name' => '',
            'admin_columns' => array(
              'position'   => 'before date',
              'title'      => 'Expiração'
            ),
          ),

          
        ),
      );
            

         // ESCOLAS

      $meta_boxes[] = array(

        'id'             => 'page-single-escola',

        'title'          => 'Informações da Escola',

        'context'        => 'normal',

        'post_types' => array('escolas-medicas'),

        'fields'     => array(
          array(
            'id'     => 'page_single_escola_tabela',
            'name'   => '', // Optional
            'type'   => 'group',
            'clone' => true,
            'sort_clone' => true,
            'collapsible' => true,
            'max_clone' => 12,
            'group_title' => '',
            'save_state' => true,
            // List of sub-fields
            'fields' => array(

              array(
                'id'   => 'page_single_escola_image',
                'name' => '',
                'type' => 'file_advanced',
                'desc' => '',
                'max_file_uploads' => 1,
            ),

              array(
                'id'   => 'page_single_escola_linha',
                'name' => '',
                'type' => 'text',
              ),

              array(
                'id'   => 'page_single_escola_coluna',
                'name' => '',
                'type' => 'wysiwyg',
              ),
            ),
          ),
        ),
      );
      

      $meta_boxes[] = array(

        'id'             => 'page-single-escola_map',

        'title'          => 'Localização',

        'context'        => 'normal',

        'post_types' => array('escolas-medicas'),

        'fields'     => array(

              
              array(
                'id'   => 'page_single_escola_log',
                'name' => 'Logadouro',
                'type' => 'text',
              ),

              array(
                'id'   => 'page_single_escola_state',
                'name' => 'Estado',
                'type' => 'text',
              ),
              array(
                'id'   => 'page_single_escola_city',
                'name' => 'cidade',
                'type' => 'text',
              ),
              array(
                'id'   => 'page_single_escola_street',
                'name' => 'Bairro',
                'type' => 'text',
              ),
              array(
                'id'   => 'page_single_escola_lat',
                'name' => 'latitude/longitude',
                'type' => 'text',
              ),

            ),
      );
      
      $meta_boxes[] = array(

        'id'             => 'page-single-escola-series-escola',

        'title'          => 'Posts webseries',

        'context'        => 'side',

        'post_types' => array('escolas-medicas'),

        'fields'     => array(
          array(
            'id'          => 'page-single-serie-posts',
            'name'        => 'Selecione 4 posts',
            'type'        => 'post',
        
            // Post type.
            'post_type'   => 'series',
        
            // Field type.
            'field_type'  => 'select_advanced',
        
            // Placeholder, inherited from `select_advanced` field.
            'placeholder' => 'Select a page',
            
            'multiple' => true,
            // Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
          ),
        ),
      );

      $meta_boxes[] = array(

        'id'             => 'page-single-escola-podcast-escola',

        'title'          => 'Posts de Podcasts',

        'context'        => 'side',

        'post_types' => array('escolas-medicas'),

        'fields'     => array(
          array(
            'id'          => 'page-single-podcast-posts',
            'name'        => 'Selecione 1 post',
            'type'        => 'post',
        
            // Post type.
            'post_type'   => 'Podcasts',
        
            // Field type.
            'field_type'  => 'select_advanced',
        
            // Placeholder, inherited from `select_advanced` field.
            'placeholder' => 'Select a page',
            
            'multiple' => true,
            // Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
          ),
        ),
      );

      $meta_boxes[] = array(

        'id'             => 'page-single-escola-material-escola',

        'title'          => 'Posts de materiais',

        'context'        => 'side',

        'post_types' => array('escolas-medicas'),

        'fields'     => array(
          array(
            'id'          => 'page-single-material-posts',
            'name'        => 'Selecione 3 post',
            'type'        => 'post',
        
            // Post type.
            'post_type'   => 'post',
        
            // Field type.
            'field_type'  => 'select_advanced',
        
            // Placeholder, inherited from `select_advanced` field.
            'placeholder' => 'Select a page',
            
            'multiple' => true,
            // Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
            
          ),
        ),
      );

            

    return $meta_boxes;

}

