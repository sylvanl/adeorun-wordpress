<?php /* Template Name: Outils */ ?>

<?php get_header(); ?>

		<div id="container">

			<section>

				<h1><?php the_title(); ?></h1>
				<h3><?php the_content(); ?></h3>

			</section>

			<section>
				<?php
				// get all the categories from the database
				$terms = get_terms( array(
					'taxonomy' => 'outil_tags',
					'hide_empty' => false,
				) );
					// loop through the categries
					foreach ($terms as $term) {
						echo '<div>';
							// setup the cateogory ID
							$term_id= $term->term_id;

							// Make a header for the cateogry
							echo "<h4>".$term->name."</h4>";
							// create a custom wordpress query
							$loop = new WP_Query( array(
							    'posts_per_page'  => 5,
							    'category_name'   => $term->slug,
							    'post__not_in'    => array( get_the_ID() )
							  ) );
							// start the wordpress loop!
							if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

								<?php // create our link now that the post is setup ?>
								<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
								<?php echo '<hr/>'; ?>

							<?php endwhile; endif; // done our wordpress loop. Will start again for each category ?>
						<?php echo '</div>'; ?>
					<?php } // done the foreach statement ?>
				</section>


		</div><!-- #container -->

<?php get_footer(); ?>
