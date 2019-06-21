
<?php get_header(); ?>

	<main role="main">
    <div class="container">

	<!-- section -->
<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


			<!-- post title -->
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
      <p><?php the_excerpt(); ?></p>
			<!-- /post title -->

      <!-- Steps of the documentation -->
      <?php if( have_rows('etapes') ): ?>
      <?php $step = 1; ?>
      	<ul>
      	<?php while( have_rows('etapes') ): the_row();

      		// vars

      		$name = get_sub_field('nom_de_letape');
      		$content = get_sub_field('contenu_de_letape');
      		$image = get_sub_field('image_de_letape');

      		?>

      		<li>
              <?php echo $step;
                    $step += 1;
              ?>
      				<h4><?php echo $name; ?></h4>
              <p><?php echo $content; ?></p>
      				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
      		</li>
      	<?php endwhile; ?>
      	</ul>

      <?php endif; ?>
      <!-- /Steps of the documentation -->

      <!-- Dynamic content -->
			<?php the_content(); ?>
      <!-- /Dynamic content -->



      <!-- comments of the post-->
			<?php get_template_part('components/comments'); ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>



	</section>
      </div>
	<!-- /section -->
	</main>



<?php get_footer(); ?>
