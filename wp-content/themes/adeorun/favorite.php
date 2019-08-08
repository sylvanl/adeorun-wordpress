<?php /* Template Name: Favoris */ ?>

<?php get_header(); ?>

<main>

    <div class="container">

    <div class="section">
        <h1><?php the_title(); ?></h1>
        <h2><?php the_content(); ?></h2>
    </div>

    <div class="section">
        <div class="row">
    <?php 
        $favorites = get_user_favorites();
            if ( $favorites ) : // This is important: if an empty array is passed into the WP_Query parameters, all posts will be returned
            $favorites_query = new WP_Query(array(
                'post_type' => 'Evenements', // If you have multiple post types, pass an array
                'posts_per_page' => -1,
                'ignore_sticky_posts' => true,
                'post__in' => $favorites,
            ));
            if ( $favorites_query->have_posts() ) : while ( $favorites_query->have_posts() ) : $favorites_query->the_post(); ?>
                <div class="col s3">
                    <?php the_favorites_button($post_id, $site_id); ?>
                    <a class="black-text no-underline" href="<?php echo the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

                    
                    <?php the_post_thumbnail(); ?>
                    <p class="bold"><?php the_title(); ?></p>
                    <p><?php the_field('start_date'); ?></p>
                    <p><?php the_field('city');?> , <?php the_field('region_name'); ?></p>

                    <?php if( have_rows('circuit') ): ?>
                        <div>
                            <?php while( have_rows('circuit') ): the_row();
                            $distance = get_sub_field('distance'); ?>
                            <div>
                                <p><?php echo $distance; ?></p>
                                <p>Km</p>
                            </div>
                            <?php endwhile; ?>  
                        </div>
                    <?php endif; ?> 
                    </a>
                </div>
            <?php endwhile; 
            endif; wp_reset_postdata();
            else :
                // No Favorites
            endif;




    ?>
            </div>
        </div>
    </div>

</main>



<?php get_footer(); ?>
