<?php /* Template Name: Outil */ ?>
<?php get_header(); ?>

		<div class="container">

			<div class="section">
				<h1><?php the_title(); ?></h1>
				<p class="sub_heading center-align"><?php the_excerpt(); ?></p>
			</div>

			<div class="row">
				<?php $query = new WP_Query(array(
					'post_type' => 'Outils',
					'post_status' => 'publish'
				));


				while ($query->have_posts()) : $query->the_post(); ?>

				<div class="small_clickable col s3">
					<a class="black-text no-underline" href="<?php echo the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<p><?php the_title(); ?></p>
					</a><i class="far fa-arrow-right right black-text"></i>
				</div>

				<?php endwhile;
				wp_reset_query(); ?>

			</div>

		</div><!-- #container -->

<?php get_footer(); ?>
