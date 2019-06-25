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

      <!-- Steps of the documentation -->
			<section>

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

			</section>
      <!-- /Steps of the documentation -->

      <!-- Dynamic content -->
			<section>
				<?php the_content(); ?>
			</section>
      <!-- /Dynamic content -->

      <!-- comments of the post-->
			<section>
				<?php get_template_part('components/comments'); ?>
			</section>


      </div>
	<!-- /section -->
	</main>



<?php get_footer(); ?>
