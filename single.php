<?php get_template_part('template-parts/html','header'); ?>

<?php 

    global $exclud_id_postagem; 

    while (have_posts()) : the_post(); $exclud_id_postagem[] = get_the_ID(); 

    $day        = get_the_date('d', get_the_ID());   

    $month      = get_the_date('F', get_the_ID());   

    $data       = $day.' de '.$month;

    $thumbnail_url  = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');

    $cat    = get_the_category(get_the_ID());

    $color  = get_term_meta( $cat[0]->term_id, 'term_color', true); 

    $avatar = get_avatar_url( get_the_author_meta( 'ID' ) );  

    $author = get_the_author(get_the_ID());

    $link   = get_the_permalink();
?>

<div class="section">

    <div class="wrapper w-container">

        <div class="post-wrapper">

            <div class="post-content">

                <div class="post-body">

                    <div class="post">

                        <div class="post-card topo-post-interna">

                            <h2 class="post-heading-large"><?php the_title(); ?></h2>

                            <div class="post-info">

                                <div class="post-info-block">

                                    <img src="https://uploads-ssl.webflow.com/5fa443314944220d73966316/5fa443310cae071d79288d77_calendar.svg" alt="data" width="14px" height="14px" class="mini-icon-grey">

                                    <div><?php echo $data; ?></div>

                                </div>

                                <div class="post-info-block">

                                    <div class="divider-small"></div>

                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.png" alt="Usuário" width="14px" height="14px" class="mini-icon-grey">

                                    <div><?php the_author(); ?></div>

                                </div>

                                <div class="post-info-block">

                                    <div class="divider-small"></div>

                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/clock.svg" alt="Tempo de leitura" width="14px" height="14px" class="mini-icon-grey">

                                    <div><?php echo do_shortcode('[rt_reading_time label="" postfix="minutos de leitura" postfix_singular="minutos de leitura"]'); ?></div>

                                </div>

                                <div class="post-info-block">
                                    <?php echo get_compartilhe($link); ?>
                                </div>

                            </div>

                            <?php if($thumbnail_url): ?>

                            <a href="#" class="thumbnail-medium thumb-post w-inline-block single-thumb-post">

                                <div class="badge" style="background:<?php echo $color; ?>;"><?php echo $cat[0]->name; ?></div>

                                <div class="thumbnail thumb-post-interno" style="background-image: url('<?php echo $thumbnail_url;?>');background-position:center;">

                                    <!-- <img src="images/placeholder.60f9b1840c.svg" loading="lazy" alt="" class="image-3 image-3-post-interno"> -->

                                </div>

                            </a>

                            <?php endif; ?>

                        </div>

                        <div class="post-rich-text w-richtext">

                            

                           <?php the_content(); ?>

                        </div>


                        <div class="post-about">

                            <div class="post-author">

                                <div class="post-avatar" style="background-image: url('<?php echo $avatar;?>');"></div>

                                <h4><?php echo $author; ?></h4>

                                <!-- <a href="#" class="post-author-link">View Posts</a> -->

                            </div>

                            <?php 

                                $tax_categories = get_the_tags(); 
                                

                                if($tax_categories):

                            ?>

                            <div class="post-tags">

                                <h6>Post Tags:</h6>

                                <div class="div-block-2">

                                    <?php foreach ( $tax_categories as $cat ): ?>

                                    <span class="tag"><?php echo $cat->name; ?></span>

                                    <?php endforeach; ?>

                                </div>

                            </div>

                            <?php endif; ?>

                        </div>

                        <?php 

                            // If comments are open or we have at least one comment, load up the comment template.

                            if ( comments_open() || get_comments_number() ) :

                                comments_template();

                            endif;

                        ?>

                    </div>

                </div>

            </div>

            <?php include(locate_template('template-parts/sidebar.php')); ?>

        </div>

    </div>

</div>

<?php endwhile; wp_reset_postdata(); ?>

<?php get_template_part('template-parts/html','footer');?>