<?php if (have_posts()): while (have_posts()) : the_post(); ?>


          <div class="col s3">
            <?php the_favorites_button($post_id, $site_id); ?>
            <a class="black-text no-underline" href="<?php echo the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

              <?php 
                foreach (get_the_terms(get_the_ID(), 'evenement_tags') as $cat) {
                    echo '<span class="new badge grey lighten-1" data-badge-caption="">' .  $cat->name .'</span>';
                } 
              ?>

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

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
