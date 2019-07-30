<?php get_header(); ?>

<div class="container">

    <div class = "row">
        <div class = "col s12">
            <ul class = "tabs">
                <li class = "tab col s3"><a href = "#tous">Tous</a></li>

                <?php // get all the categories from the database
                $cats = get_categories(); 

                // loop through the categries
                foreach ($cats as $cat) :
                    // setup the cateogory ID
                    $cat_id= $cat->term_id;
                    // create a custom wordpress query
                    query_posts("cat=$cat_id&posts_per_page=100");
                    // start the wordpress loop!
                    if (have_posts()) : ?>
                        <li class = "tab col s3"><a href = "#<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></a></li>
                    <?php endif;
                endforeach; ?>
            </ul>
        </div>

        <?php $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
        );
        $arr_posts = new WP_Query( $args );


        if ( $arr_posts->have_posts() ) : ?>

            <div id = "tous" class = "col s12">
                <?php while ( $arr_posts->have_posts() ) :
                    $arr_posts->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php if ( has_post_thumbnail() ) :
                            the_post_thumbnail();
                        endif; ?>
                        <header class="entry-header">
                            <h3 class="entry-title"><?php the_title(); ?></h3>
                        </header>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

        <?php endif; ?>

        <?php foreach ($cats as $cat) :
            // setup the cateogory ID
            $cat_id= $cat->term_id;
            // create a custom wordpress query
            query_posts("cat=$cat_id&posts_per_page=100");
            // start the wordpress loop!
            if (have_posts()) : ?>
                <div id = "<?php echo $cat->term_id; ?>" class = "col s12">
                    <?php while (have_posts()) : the_post(); ?>
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
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>

    <script>
        jQuery(document).ready(function(){
            jQuery('.tabs').tabs();
        });
    </script>

  <!-- <section class="first_articles">

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
  </section> -->

  

</div>

<?php get_footer(); ?>
