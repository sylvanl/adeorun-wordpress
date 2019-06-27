
<?php get_header(); ?>

<div class="container">

  <section class="first_articles">

    <?php $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => 'adeorun-news',
        'posts_per_page' => 4,
    		);
    		$arr_posts = new WP_Query( $args );


    		if ( $arr_posts->have_posts() ) :

    				while ( $arr_posts->have_posts() ) :
    						$arr_posts->the_post();
    						?>
    						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    								<?php
    								if ( has_post_thumbnail() ) :
    										the_post_thumbnail();
    								endif;
    								?>
    								<header class="entry-header">
    										<h3 class="entry-title"><?php the_title(); ?></h3>
    								</header>
    								<div class="entry-content">
    										<?php the_excerpt(); ?>
    										<a href="<?php the_permalink(); ?>">Read More</a>
    								</div>
    						</article>
    						<?php
    				endwhile;
    		endif; ?>
  </section>

  <section class="other_articles">
    <?php $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
        );
        $arr_posts = new WP_Query( $args );


        if ( $arr_posts->have_posts() ) :

            while ( $arr_posts->have_posts() ) :
                $arr_posts->the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                    if ( has_post_thumbnail() ) :
                        the_post_thumbnail();
                    endif;
                    ?>
                    <header class="entry-header">
                        <h3 class="entry-title"><?php the_title(); ?></h3>
                    </header>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                </article>
                <?php
            endwhile;
        endif; ?>
  </section>

</div>

<?php get_footer(); ?>