<?php get_header(); ?>


<div class="content">
	<div class="container">
      <h1><?php post_type_archive_title(); ?></h1>
      <p>Retrouvez tout ce dont vous avez besoin</p>

		<?php
			$taxonomy = 'documentation_tags';

			$term_args = array(
			 'orderby' => 'name',
			 'order' => 'ASC'
			 );

			$terms = get_terms($taxonomy,$term_args);?>


      <?php foreach($terms as $term): ?>
        <ul>
          <li><a href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
        </ul>
      <?php endforeach; ?>

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
  				<h3 class="term-title"><?php echo $term->name; ?></h1>

  				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
  					<div class="col-sm-2">
  						<?php if (has_post_thumbnail()) : ?>
  							<?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive aligncenter')); ?>
  						<?php endif; ?>

  						<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to ', 'textdomain'); ?><?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
  					</div>
  				<?php endwhile; ?>
			</div>
    </div>

		<?php }
		 } } ?>
		<?php wp_reset_query(); ?>

<?php
		$terms = get_terms( 'documentation_tags' );

echo '<ul>';

foreach ( $terms as $term ) {

    // The $term is an object, so we don't need to specify the $taxonomy.
    $term_link = get_term_link( $term );

    // If there was an error, continue to the next term.
    if ( is_wp_error( $term_link ) ) {
        continue;
    }

    // We successfully got a link. Print it out.
    echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
}


echo '</ul>'; ?>

	</div>
</div>
<?php get_footer(); ?>
