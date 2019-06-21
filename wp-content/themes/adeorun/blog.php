<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

	<main role="main">
		<!-- section -->

			<h1><?php the_title(); ?></h1>

<ul>
      <?php $cats = get_categories();
                              foreach( $cats as $cat ) : ?>
                                  <li>
                                      <a href="#" data-filter=".<?php echo $cat -> slug; ?>">
                                          <?php echo $cat -> name ; ?>
                                      </a>
                                  </li>
                              <?php endforeach; ?>
</ul>


                          <?php while(have_posts()): the_post(); ?>

                              <div>
                                    <?php
                                      foreach( $cats as $cat ) :
                                                      $classe = 'blablazut' . 'shmilblique';
                                        endforeach; ?>

                                              <?php the_post_thumbnail(); ?>

                                              <a href="<?php the_permalink(); ?>">
                                              <?php the_title(); ?></a>
                                                  </div>

                                          <?php endwhile; ?>




		<!-- /section -->
	</main>


<?php get_footer(); ?>
