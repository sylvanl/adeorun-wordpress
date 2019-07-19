<?php get_header(); ?>

	<main role="main">

<!-- Mini menu -->
			<aside class="documentation_tags">
				<?php
					$taxonomy = 'documentation_tags';

					$term_args = array(
					 'orderby' => 'name',
					 'order' => 'ASC'
					 );

					$terms = get_terms($taxonomy,$term_args);?>

		    <?php if ($terms) { foreach($terms as $term) {

					$args = array(
					'post_type' => 'Documentation',
					'tax_query' => array(
					array(
						'taxonomy' => 'documentation_tags',
						'terms' => array($term->term_id),
						'include_children' => true,
						'operator' => 'IN'
						)
					)
				);
		    $my_query = new WP_Query($args); if ($my_query->have_posts()) { ?>
					<div class="row">
		        		<div id="<?php echo $term->slug; ?>">
		  					<p class="term-title"><?php echo $term->name; ?></p>

		  				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
		  					<div class="col-sm-2">
		  						<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to ', 'textdomain'); ?><?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
		  					</div>
		  				<?php endwhile; ?>
					</div>
		    </div>

				<?php }
				 } } ?>
				<?php wp_reset_query(); ?>
			</aside>
<!-- /Mini menu -->
    <div class="container">
			<!-- post title -->
				 <div class="row">
					<h1><?php the_title(); ?></h1>
					<p><?php the_excerpt(); ?></p>
				</div>

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
