<?php get_header(); ?>

		<div id="container">

			<section>
				<h1><?php the_title(); ?></h1>

				<?php $query = new WP_Query(array(
					'post_type' => 'Outil',
					'post_status' => 'publish'
				));

				while ($query->have_posts()) :
					$query->the_post();
					$post_id = get_the_ID(); ?>

					<a href="<?php the_permalink(); ?>">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php if ( has_post_thumbnail() ) :
								the_post_thumbnail();
							endif; ?>
							<header class="entry-header">
								<h3 class="entry-title"><?php the_title(); ?></h3>
							</header>
						</article>
					</a>
				<?php endwhile;

				wp_reset_query(); ?>
			</section>

			<section>
				<p><?php the_content(); ?></p>
			</section>

		</div><!-- #container -->

<?php get_footer(); ?>
