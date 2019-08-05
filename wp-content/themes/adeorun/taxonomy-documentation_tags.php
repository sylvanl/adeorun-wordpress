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
    'hide_empty' => true
  );
  $child_terms = get_terms( $this_term->taxonomy, $args );
?>

<div class="section">
  <div class="row">
    <?php foreach ($child_terms as $term) : ?>
    <div class="small_clickable col s3">
      <?php $image = get_field('taxo-image', $term); ?>
      <img src="<?php echo $image['url']; ?>">
      <p><?php echo $term->name; ?><i class="far fa-arrow-right right black-text"></i></p>
    </div>
    <?php endforeach; ?>
  </div>
</div>   

<div class="divider"></div>

<?php foreach ($child_terms as $term) : ?>

<?php //List child Taxonomies
$image = get_field('taxo-image', $term); ?>

<div class="section">
  <img src="<?php echo $image['url']; ?>" alt="">
  <h2 id="<?php echo ('#' . $term->slug); ?>" class="left-align">
    <?php echo $term->name; ?>
  </h2>

<?php // Get posts from that child topic
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

            <div class="small_clickable col s3"><a class="black-text" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><i class="far fa-arrow-right right black-text"></i></div>

        <?php endwhile;
  } else  { echo "no posts";} ?>
  </div>
</div>
<div class="divider"></div>
<?php endforeach; //end foreach ?>

</div>

<?php get_footer(); ?>
