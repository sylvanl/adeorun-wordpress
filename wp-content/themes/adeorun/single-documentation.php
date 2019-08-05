<?php get_header(); ?>

	<main role="main">
	  <?php get_template_part('components/upbar'); ?>

<!-- Mini menu -->
	<aside class="documentation_tags">
 
		<?php 
		
			// get the custom post type's taxonomy terms
			$custom_taxterms = wp_get_object_terms( $post->ID, 'documentation_tags', array('fields' => 'ids') );
			// arguments
			$args = array(
				'post_type' => 'documentation',
				'post_status' => 'publish',
				'posts_per_page' => -1, // you may edit this number
				'tax_query' => array(
					array(
						'taxonomy' => 'documentation_tags',
						'field' => 'id',
						'terms' => $custom_taxterms
					)
				),
				'post__not_in' => array ($post->ID),
				);

		$related_items = new WP_Query( $args );
		// loop over query
		if ($related_items->have_posts()) :
			echo '<ul>';
				while ( $related_items->have_posts() ) : $related_items->the_post();
				?>
			<li><a class="black-text" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php
				endwhile;
			echo '</ul>';
		endif;
		// Reset Post Data
			wp_reset_postdata(); ?>
		
 	</aside>	
	<!-- /Mini menu -->

    <div class="container">
			<!-- post title -->
			<div class="section">
				<h1><?php the_title(); ?></h1>
				<p class="sub_heading center-align"><?php the_excerpt(); ?></p>
			</div>

			<!-- /post title -->

      <!-- Steps of the documentation -->


	      <?php if( have_rows('etapes') ): ?>
	      <?php $step = 1; ?>

		  	<div class="section">
	      	<?php while( have_rows('etapes') ): the_row();

	      		// vars

	      		$name = get_sub_field('nom_de_letape');
	      		$content = get_sub_field('contenu_de_letape');
	      		$image = get_sub_field('image_de_letape');

	      		?>
					
					<?php if($step % 2 != 0) :  ?>
					<div class="row">
						<div class="col s7">
							<h4><?php echo $name; ?></h4>
							<p><?php echo $content; ?></p>
						</div>

						<div class="col s5">
	      					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
				 		</div>
					</div>
					<div class="divider"></div>

					<?php else : ?>
					<div class="row">
						<div class="col s7">
	      					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
				 		</div>
						<div class="col s5">
							<h4><?php echo $name; ?></h4>
							<p><?php echo $content; ?></p>
						</div>
					</div>
					<div class="divider"></div>

				<?php endif; ?>
	        <?php $step += 1; ?>
			  <?php endwhile; ?>
			  </div>


	      <?php endif; ?>

      <!-- /Steps of the documentation -->

      <!-- Dynamic content -->
			<div class="section">
				<?php the_content(); ?>
			</div>
      <!-- /Dynamic content -->

      <!-- comments of the post-->
			<div class="section">
				<?php get_template_part('components/comments'); ?>
	</div>


      </div>
	<!-- /section -->
	</main>



<?php get_footer(); ?>
