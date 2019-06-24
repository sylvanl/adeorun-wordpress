
<?php get_header(); ?>

	<main role="main">
    <div class="container">

	     <!-- section -->
        <section>

			<!-- post title -->
    			<h1>
    				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    			</h1>
          <p><?php the_excerpt(); ?></p>
			<!-- /post title -->

      <!-- Dynamic content -->
			<?php the_content(); ?>



	     </section>
      </div>
	<!-- /section -->
	</main>



<?php get_footer(); ?>
