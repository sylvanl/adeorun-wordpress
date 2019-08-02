<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404">

				<div class="container">
					<img src="<?php the_field('404_image', 'option'); ?>">
					<h1><?php the_field('404_title', 'option'); ?></h1>
					<p class="sub_heading center-align"><?php the_field('404_text', 'option'); ?></p>

					<div class="center-align">
						<a class="waves-effect waves-light btn" href="<?php echo home_url(); ?>"><?php the_field('404_button', 'option'); ?></a>
					</div>
				</div>
			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
