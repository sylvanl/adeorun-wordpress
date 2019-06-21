<?php get_header(); ?>

	<main role="main">

		<div class="container">

			<!-- section -->
			<section>

				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


						<!-- post title -->
						<h1>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h1>

						<p><?php the_excerpt(); ?></p>
						<!-- /post title -->

						<!-- post & author details -->
						<?php get_template_part('components/author'); ?>
						<div class="post_details">
								<p class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></p>
						</div>


						<!-- /post & author details -->

						<!-- post thumbnail -->
						<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail(); // Fullsize image for the single post ?>
							</a>
						<?php endif; ?>
						<!-- /post thumbnail -->

						<!-- sidebar-->
						<?php get_template_part('components/sidebar'); ?>
						<!-- /sidebar-->


						<?php the_content(); // Dynamic Content ?>

						<!-- tags & categories-->
						<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
						<p><?php _e( 'Categories: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>

						<!-- author of the post-->
						<?php get_template_part('components/author'); ?>

						<!-- comments of the post-->
						<?php get_template_part('components/comments'); ?>

					</article>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>

					<!-- article -->
					<article>

						<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

					</article>
					<!-- /article -->

				<?php endif; ?>


			<!-- Show 3 lastest posts -->
			<h3>A découvrir également</h3>
			<?php
			$args = array( 'numberposts' => "3", 'order'=> 'ASC', 'orderby' => 'title' );
			$postslist = get_posts( $args );
			foreach ($postslist as $post) :  setup_postdata($post); ?>
					<div>
						<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail(); // Fullsize image for the single post ?>
							</a>
						<?php endif; ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); // Fullsize image for the single post ?>
						</a>

						<div class="post_details">
								<p class="author_pic"><?php echo get_avatar( get_the_author_meta('<? php the_author_ID ?>') , 32 ); ?> </p>
								<p class="author_name"><?php the_author_posts_link(); ?></p>
								<p class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></p>
						</div>
					</div>
			<?php endforeach; ?>

			</section>
		</div>
		<!-- /section -->
	</main>



<?php get_footer(); ?>
