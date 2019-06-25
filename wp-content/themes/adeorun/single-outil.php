<?php get_header(); ?>

	<main role="main">
    <div class="container">



					<!-- post title -->
					  <section>

		    			<h1>
		    				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		    			</h1>

		          <p><?php the_excerpt(); ?></p>

						</section>
					<!-- /post title -->

      		<!-- Dynamic content -->
						<section>
							<?php the_content(); ?>
						</section>
					<!-- /Dynamic content -->

      </div>
	</main>



<?php get_footer(); ?>
