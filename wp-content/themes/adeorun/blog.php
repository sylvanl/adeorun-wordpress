<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php the_title(); ?></h1>

      <?php
      echo '<ul class="nav nav-tabs" role="tablist">';
      $args = array(
          'hide_empty'=> 1,
          'orderby' => 'name',
          'order' => 'ASC'
      );
      $categories = get_categories($args);
      foreach($categories as $category) {
          echo
              '<li>
                  <a href="#'.$category->slug.'" role="tab" data-toggle="tab">
                      '.$category->name.'
                  </a>
              </li>';
      }
      echo '</ul>';

      echo '<div class="tab-content">';
      foreach($categories as $category) {
          echo '<div class="tab-pane" id="' . $category->slug.'">';
          $the_query = new WP_Query(array(
              'post_type' => 'acme_product',
              'posts_per_page' => 100,
              'category_name' => $category->slug
          ));

          while ( $the_query->have_posts() ) :
          $the_query->the_post();
          echo '<h1>';
              the_title();
          echo '</h1>';
          endwhile;
      }
      echo '</div>';
      ?>

      <ul>

      <?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>
      <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

      <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
      <li><?php the_excerpt(__('(more…)')); ?></li>
      </br>

      <?php
      endwhile;
      wp_reset_postdata();
      ?>

      </ul>

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
