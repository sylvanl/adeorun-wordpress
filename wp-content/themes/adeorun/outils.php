<?php /* Template Name: Outils */ ?>

<?php get_header(); ?>

		<div id="container">

			<section>
			
				<h1><?php the_title(); ?></h1>

				<p><?php the_content(); ?></p>

				<?php $query = new WP_Query(array(
					'post_type' => 'Outil',
					'post_status' => 'publish'
				));

				while ($query->have_posts()) :
					$query->the_post();
					$post_id = get_the_ID();
					echo $post_id;
					echo "<br>"; ?>
					<article id="post-<?php $query->the_ID(); ?>" <?php $query->post_class(); ?>>

						<!-- post thumbnail -->
						<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
							</a>
						<?php endif; ?>
						<!-- /post thumbnail -->

						<!-- post title -->
						<h2>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h2>
						<!-- /post title -->

						<!-- post details -->
						<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
						<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
						<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
						<!-- /post details -->

						<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

						<?php edit_post_link(); ?>

					</article>
				<?php endwhile;

				wp_reset_query(); ?>

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
