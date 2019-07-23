<?php get_header(); ?>

<?php $post_type = get_post_type_object(get_post_type($post)); ?>
	<main role="main">
   	 <div class="container">

	<!-- post title -->
		<section>
		    <h1>
		    	<?php the_title(); ?>
		    </h1>
		</section>
	<!-- /post title -->
		<section>
			<p><?php the_excerpt(); ?></p>
		</section>


    <!-- Dynamic content -->
		<section>
			<?php the_content(); ?>
		</section>
					<!-- /Dynamic content -->

      </div>
	</main>

<?php get_footer(); ?>
