<?php get_header(); ?>


<div class="content">
	<div class="container">
      <h1><?php post_type_archive_title(); ?></h1>
      <p>Retrouvez tout ce dont vous avez besoin</p>


<?php
		$terms = get_terms( array( 'taxonomy' => 'documentation_tags', 'parent' => 0 ) );

echo '<div>';

foreach ( $terms as $term ) {
$image = get_field('image', $term, false);

    // The $term is an object, so we don't need to specify the $taxonomy.
    $term_link = get_term_link( $term );

    // If there was an error, continue to the next term.
    if ( is_wp_error( $term_link ) ) {
        continue;
    } ?>

    <!-- // We successfully got a link. Print it out. -->
		<img src="<?php echo $image[0]; ?>">
		<?php echo '<p><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></p>';


}


echo '</div>'; ?>

	</div>
</div>
<?php get_footer(); ?>
