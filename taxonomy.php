<?php get_template_part('template-parts/html','header');?>
<?php 
    $_TERM_OBJ      = get_queried_object(); // return Object WP_Term()
    $_ID_CAT        = $_TERM_OBJ->term_id;  // OK
    $_NAME_CAT 	    = $_TERM_OBJ->name;     // OK
    $_NAME_TERM     = $_TERM_OBJ->taxonomy; // OK
    $_PARENT        = $_TERM_OBJ->parent;   // OK
    $_THUMB_CAT     = get_term_meta( $_ID_CAT, 'term_serie_thumb', true); // OK
    $_COLOR_CAT     = get_term_meta( $_ID_CAT, 'term_serie_color', true); // OK
    $_THUMB_URL     = wp_get_attachment_image_src($_THUMB_CAT, 'full');   // OK
    $_CHILDREN_TERM = get_term_children($_ID_CAT, $_NAME_TERM);
    $_FNAME         = get_the_author_meta('first_name');
    $_LNAME         = get_the_author_meta('last_name');
    $_FULL_NAME     = '';

    if( empty($_FNAME)){
        $_FULL_NAME = $_LNAME;
    } elseif( empty( $_LNAME )){
        $_FULL_NAME = $_FNAME;
    } else {
        $_FULL_NAME = "{$_FNAME} {$_LNAME}";
    }
?>
<div class="section top-section top-series">
    <div class="wrapper">
        <div class="w-layout-grid grid-2">
            <a href="#" class="post-card-v2-max post-serie w-inline-block">
                <div class="post-card-content">
                    <h2 class="title-serie"><?php echo $_NAME_CAT; ?></h2>
                </div>
                <div class="post-gradient"></div>
                <div class="thumbnail">
                    <img src="<?php echo $_THUMB_URL[0]; ?>" loading="lazy" alt="<?php echo single_cat_title(); ?>" class="image-4">
                </div>
            </a>
            <div>
                <h2 class="topo-serie-header"><?php echo single_cat_title(); ?></h2>
                <p><?php echo category_description(); ?></p>
                <p class="p-ficha-tecnica">Ficha Ténica</p>
                <p>Direção: <?php echo $_FULL_NAME ? $_FULL_NAME : the_author(); ?></p>
            </div>
        </div>
    </div>
</div>
<?php foreach ($_CHILDREN_TERM as $child) : 
    $term   = get_term_by('id', $child, $_NAME_TERM);
    $videos = new WP_Query(array(
        'post_type' => 'series',
        'tax_query' => array(
            'relation'  => 'AND',
            array(
                'taxonomy'         => 'serie',
                'field'            => 'id',
                'terms'            => array( $term->term_id )
            )
        ),
        'orderby' => 'date',
        'order' => 'ASC'
    ));
?>

<?php if($videos->have_posts()): ?>
<div class="section">
    <div class="wrapper w-container">
        <div class="header-block no-margin-bottom">
            <h3 class="header"><?php echo $term->name; //echo ' ID: '.$term->term_id;?></h3>
            <div class="header-line"></div>
        </div>
        <div data-animation="slide" data-duration="600" data-infinite="1" class="slider-v3 w-slider">
            <div class="w-slider-mask">
                <?php
                    $qtd_posts = [];
				    $i = 0;
                    while ( $videos->have_posts() ) : $videos->the_post(); 
                    $video_texto           = get_post_meta(get_the_ID(), 'video_texto', true);
                    $thumbnail_url         = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                    $thumbnail_not_default = get_template_directory_uri().'/assets/images/background-image.svg'; 
                    $qtd_posts[]           = $i; // atribui cada post dentro do array
                ?>        
                    <div class="slide-v3 w-slide">
                        <div class="post-card mimo-card">
                            <a href="<?php the_permalink(); ?>" class="thumbnail-small w-inline-block">
                                <div class="thumbnail">
                                    <img src="<?php echo $thumbnail_url ? $thumbnail_url : $thumbnail_not_default; ?>" loading="lazy" alt="" class="image-2">
                                </div>
                            </a>
                            <a href="<?php the_permalink(); ?>" class="post-heading-link w-inline-block">
                                <h5 class="post-heading-small"><?php the_title(); ?></h5>
                            </a>
                            <p class="paragraph"><?php echo $video_texto; ?></p>
                        </div>
                    </div>
                <?php $i++; endwhile; wp_reset_postdata();?>
            </div>
            <?php $total_posts = count($qtd_posts); // total de posts
                if($total_posts > 4): ?>
                    <div class="slider-v3-arrow left w-slider-arrow-left">
                        <img src="https://uploads-ssl.webflow.com/5fa443314944220d73966316/5fa443310cae073ffd288d8a_left.svg" alt="" class="slider-v5-arrow-icon">
                    </div>
                    <div class="slider-v3-arrow w-slider-arrow-right">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/right.svg" alt="" class="slider-v5-arrow-icon">
                    </div>
            <?php endif; ?>
            <div class="slider-v5-nav w-slider-nav w-round"></div>
        </div>
    </div>
</div>
<?php endif; endforeach;?>
<?php get_template_part('template-parts/html','footer');?>