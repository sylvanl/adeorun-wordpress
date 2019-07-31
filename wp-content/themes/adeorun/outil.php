<?php /* Template Name: Outil */ ?>
<?php get_header(); ?>

		<div class="container">

			<div class="section">
				<h1><?php the_title(); ?></h1>
				<p class="sub_heading center-align"><?php the_excerpt(); ?></p>
			</div>

			<div class="row">
				<?php $query = new WP_Query(array(
					'post_type' => 'Outil',
					'post_status' => 'publish'
				));


				while ($query->have_posts()) :
					$query->the_post();
					$post_id = get_the_ID(); ?>

				<div class="col s3 small_clickable">
					<a class="black-text" href="<?php the_permalink(); ?>">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php if ( has_post_thumbnail() ) :
								the_post_thumbnail();
							endif; ?>
							<header class="entry-header">
								<p class="entry-title"><?php the_title(); ?></p>
							</header>
						</article>
					</a>
				</div>
				<?php endwhile;

				wp_reset_query(); ?>
				</div>

		</div><!-- #container -->

<?php get_footer(); ?>
