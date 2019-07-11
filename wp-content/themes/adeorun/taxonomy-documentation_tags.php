<?php get_header(); ?>


<h1><?php echo single_cat_title(); ?></h1>

<?php


$this_term = get_queried_object();
$args = array(
'parent' => $this_term->term_id,
'orderby' => 'slug',
'hide_empty' => false
);
$child_terms = get_terms( $this_term->taxonomy, $args );
echo '<ul>';
foreach ($child_terms as $term) {

// List the child topic
echo '<li><h3><a href="' . get_term_link( $term->name, $this_term->taxonomy ) . '">' . $term->name . '</a></h3>';

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

// List the posts
if($query->have_posts()) {
     while($query->have_posts()) : $query->the_post(); ?>
          <li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li><?php
     endwhile;
} else  { echo "no posts";}


// close our <li>
echo '</li>';
} //end foreach
 ?>



<?php get_footer(); ?>
