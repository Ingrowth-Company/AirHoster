<?php get_template_part('template-parts/html', 'header'); ?>

<?php

global $exclud_id_postagem;

$_TERM_OBJ  = get_queried_object(); // return Object WP_Term()

$_ID_CAT    = $_TERM_OBJ->term_id;  // OK

$_NAME_CAT     = $_TERM_OBJ->name;     // OK

$_SLUG_CAT  = $_TERM_OBJ->slug;

$args       = array('post_type' => 'post', 
'tax_query' => array(
    array('taxonomy'=>'destaques','field'=>'slug','terms'=>'sim'),  
),
'cat' => $_ID_CAT, 'posts_per_page' => 2, 'no_found_rows' => 'true', 'orderby' => 'date', 'order' => 'DESC');

$destaque   = new WP_Query($args);

$color      = get_term_meta($_ID_CAT, 'term_color', true);

echo do_shortcode('[banner zona="header" slug="' . $_SLUG_CAT . '"]');

?>

<div class="section">

    <div class="wrapper w-container">

        <div class="header-block side-margins">

            <h1 class="header"><?php echo $_NAME_CAT; ?></h1>

            <div class="header-line"></div>

        </div>

        <div class="w-layout-grid grid-big">



            <?php

            $i = 1;

            while ($destaque->have_posts()) : $destaque->the_post();

                $day        = get_the_date('d', get_the_ID());

                $month      = get_the_date('F', get_the_ID());

                $data       = $day . ' de ' . $month;

                $thumbnail_url  = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');

                $exclud_id_postagem[] = get_the_ID();

            ?>

                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-card-v2-big w-inline-block">

                    <div class="post-card-content">

                        <div class="badge" style="background:<?php echo $color; ?>;"><?php echo $_NAME_CAT; ?></div>

                        <h3 class="post-v2-heading"><?php the_title(); ?></h3>

                        <div class="post-info-2 text-white">

                            <div class="post-info-author text-white">

                                <img src="https://uploads-ssl.webflow.com/5fa443314944220d73966316/5fa443310cae07fbe2288da7_user-white.svg" alt="" class="mini-icon">

                                <div><?php the_author(); ?></div>

                                <div class="divider-small transparent"></div>

                            </div>

                            <div class="post-info-block-2">

                                <img src="https://uploads-ssl.webflow.com/5fa443314944220d73966316/5fa443310cae07d071288d94_calendar-white.svg" alt="" class="mini-icon">

                                <div><?php echo $data; ?></div>

                            </div>

                            <div class="post-info-block-2">

                                <div class="divider-small transparent"></div>

                                <img src="https://uploads-ssl.webflow.com/5fa443314944220d73966316/5fa443310cae073d8e288d91_clock-white.svg" alt="" class="mini-icon">

                                <div><?php echo do_shortcode('[rt_reading_time label="" postfix="minutos de leitura" postfix_singular="minutos de leitura"]'); ?></div>

                            </div>

                        </div>

                    </div>

                    <div class="post-gradient"></div>

                    <div class="thumbnail-2" style="background-image: url('<?php echo $thumbnail_url; ?>'); background-position: center; filter: brightness(99.8242%); transform: translate3d(0px, 0px, 0px) scale3d(1.00105, 1.00105, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; will-change: filter, transform;"></div>

                </a>



            <?php $i++;
                wp_reset_postdata();
            endwhile; ?>



        </div>

    </div>

</div>



<div class="section top-section">

    <div class="wrapper w-container">

        <div class="w-layout-grid grid-medium">



            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args       = array('post_type' => 'post', 'cat' => $_ID_CAT, 'posts_per_page' => 12, 'paged' => $paged, 'post__not_in' => $exclud_id_postagem, 'orderby' => 'date', 'order' => 'DESC');

            global $wp_query;

            query_posts(array_merge($wp_query->query, $args));

            while (have_posts()) : the_post();

                $day        = get_the_date('d', get_the_ID());

                $month      = get_the_date('F', get_the_ID());

                $data       = $day . ' de ' . $month;

                $thumb_url  = get_the_post_thumbnail_url(get_the_ID(), 'thumb');



            ?>

                <div class="post-card">

                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="thumbnail-medium w-inline-block">

                        <div class="badge" style="background:<?php echo $color; ?>;"><?php echo $_NAME_CAT; ?></div>

                        <div class="thumbnail-2" style="background-image: url('<?php echo $thumb_url; ?>'); background-position: center; filter: brightness(100%); transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d;">

                            <!-- <img src="images/placeholder.60f9b1840c.svg" loading="lazy" alt="" class="image-6"> -->

                        </div>

                    </a>

                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-heading-link w-inline-block">

                        <h4 class="post-heading-medium"><?php the_title(); ?></h4>

                    </a>

                    <div class="post-info">

                        <div class="post-info-block">

                            <img src="https://uploads-ssl.webflow.com/5fa443314944220d73966316/5fa443310cae071d79288d77_calendar.svg" alt="" class="mini-icon-grey">

                            <div><?php echo $data; ?></div>

                        </div>

                        <div class="post-info-block">

                            <div class="divider-small"></div>

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.png" alt="" class="mini-icon-grey">

                            <div><?php the_author(); ?></div>

                        </div>

                        <div class="post-info-block">

                            <div class="divider-small"></div>

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/clock.svg" alt="" class="mini-icon-grey">

                            <div><?php echo do_shortcode('[rt_reading_time label="" postfix="minutos de leitura" postfix_singular="minutos de leitura"]'); ?></div>

                        </div>

                    </div>

                </div>



            <?php wp_reset_postdata();
            endwhile;
            ?>



        </div>
        <div style=" display: flex; align-items: center; justify-content: center; margin: 50px 0 10px 0;">
            <?php wp_pagenavi(); ?>
        </div>

    </div>

</div>

<?php echo do_shortcode('[banner zona="footer" slug="' . $_SLUG_CAT . '"]'); ?>


<?php get_template_part('template-parts/html', 'footer'); ?>