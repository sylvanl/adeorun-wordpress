<?php /* Template Name: Documentation */ ?>

<?php get_header(); ?>

		<div id="container">
			<div id="content" role="main">

			<?php
			// get all the categories from the database
			$terms = get_terms( array(
				'taxonomy' => 'documentation_tags',
				'hide_empty' => false,
			) );

				// loop through the categries
				foreach ($terms as $term) {

					// setup the cateogory ID
					$term_id= $term->term_id;
					echo($term_id);
					// Make a header for the cateogry
					echo "<h2>".$term->name."</h2>";
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
				<?php } // done the foreach statement ?>


			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
