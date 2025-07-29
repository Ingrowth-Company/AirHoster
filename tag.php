<?php get_template_part('template-parts/html','header');?>
<div class="fs-page-tag">
    <h2 class="fs-page-tag__title">Tag: <?php echo single_tag_title(); ?></h2>
    <section class="fs-component-section-tags">
        <div class="container">
            <div class="fs-component-section-tags__content">
                <?php 
                    global $exclud_id_postagem;
                    global $wp_query;
                    query_posts(array_merge($wp_query->query));
                    while (have_posts()) : the_post(); 
                    $exclud_id_postagem[] = get_the_ID();
                ?>
                <?php include(locate_template('template-parts/content/loop-search.php')); ?>
                <?php endwhile;  wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
</div>
<?php get_template_part('template-parts/html','footer');?>

