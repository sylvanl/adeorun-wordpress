<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404">

				<div class="container">
				<?php $error = get_field('404', 'options');?>
					<img src="<?php echo $error['404_image']; ?>">
					<h1><?php echo $error['404_title']; ?></h1>
					<p class="sub_heading center-align"><?php echo $error['404_texte']; ?></p>

					<div class="center-align">
						<a class="waves-effect waves-light btn" href="<?php echo home_url(); ?>"><?php echo $error['404_button']; ?></a>
					</div>
				</div>
			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
