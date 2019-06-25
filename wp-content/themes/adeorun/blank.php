<?php  /* Template Name: Blank */
get_header(); ?>

<!-- Hide header and footer -->
<style>
  nav {
    display:none;
  } 
  footer {
    display:none;
  }
</style>
<!-- /Hide header and footer -->

<main role="main">
		
  <div class="container">

    <h1><?php the_title(); ?></h1>

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

      <!-- article -->
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php the_content(); ?>

      </article>
      <!-- /article -->

    <?php endwhile; ?>

    <?php else: ?>

      <!-- article -->
      <article>

        <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

      </article>
      <!-- /article -->

    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>