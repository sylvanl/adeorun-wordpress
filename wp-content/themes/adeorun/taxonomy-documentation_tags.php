<?php get_header(); ?>


  <div class="sub_header section">
    <h1 class="white_text"><?php echo single_cat_title(); ?></h1>
    <input type="text" placeholder="Recherche" class="light-placeholder small-placeholder">
  </div>

<div class="container">
<?php


$this_term = get_queried_object();
$args = array(
'parent' => $this_term->term_id,
'orderby' => 'slug',
'hide_empty' => false
);
$child_terms = get_terms( $this_term->taxonomy, $args );

echo '<div class="section"><div class="row">';
foreach ($child_terms as $term) {
  echo '<div class="small_clickable col s4"><p>' . $term->name . '</p></div>';
}
echo '</div></div>
<div class="divider"></div>';

foreach ($child_terms as $term) {

// List the child topic
echo '<div class="section"><h2 id="<?php # . $term->slug ?>" class="left-align">' . $term->name . '</h2>';

// Get posts from that child topic
$query = new WP_Query( array(
 'tax_query' => array(
   'relation' => 'AND',
   array(
     'taxonomy' => $this_term->taxonomy,
     'field'    => 'slug',
     'terms'    => array( $term->slug )
   )
 )
) );
?>

<?php // List the posts ?>
  <div class="row">
  <?php if($query->have_posts()) {
      while($query->have_posts()) : $query->the_post(); ?>

            <div class="small_clickable col s3"><a class="black-text" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>

        <?php endwhile;
  } else  { echo "no posts";} ?>
  </div>
</div>
<div class="divider"></div>
<?php } //end foreach
 ?>

</div>

<?php get_footer(); ?>
