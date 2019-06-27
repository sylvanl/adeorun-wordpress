<?php get_header(); ?>

<?php $post_type = get_post_type_object(get_post_type($post)); ?>
	<main role="main">
    <div class="container">

					<!-- post title -->
					  <section>

							<h1><?php echo $post_type->labels->name; ?></h1>
		    			<h2>
		    				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		    			</h2>

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
