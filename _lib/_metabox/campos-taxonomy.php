<?php

    add_filter('rwmb_meta_boxes', 'wpcf_meta_boxes_tax');
    function wpcf_meta_boxes_tax($meta_boxes) {


        $meta_boxes[] = array(
            'id' => 'term_series',
            'title'      => 'Campos',
            'taxonomies' => 'serie', // List of taxonomies. Array or string
            'fields' => array(

                array(
                    'id'   => 'term_serie_thumb',
                    'name' => 'Imagem da Categoria',
                    'type' => 'image_advanced',
                ),

                array(
                    'id'   => 'term_serie_color',
                    'name' => 'Cor da Categoria',
                    'type' => 'color',
                ),
                
            ),
        );

        $meta_boxes[] = array(
            'id' => 'term_assuntos',
            'title'      => 'Campos',
            'taxonomies' => 'assunto', // List of taxonomies. Array or string
            'fields' => array(

                array(
                    'id'   => 'term_assunto_thumb',
                    'name' => 'Imagem da Categoria',
                    'type' => 'image_advanced',
                ),

                array(
                    'id'   => 'term_assunto_color',
                    'name' => 'Cor da Categoria',
                    'type' => 'color',
                ),
                
            ),
        );
   
        return $meta_boxes;
    }