<?php get_header(); ?>

<!-- Hide footer -->
<style>
  footer {
    display:none;
  }
</style>
<!-- /Hide footer -->

<?php $fields = get_fields(); extract( $fields ); ?>

<main role="main">
  
  <!-- Thumbmail Page d'accueil -->
  <div class="home_block row">

    <div class="home_block_search col s9 valign-wrapper">
      <div>
        <h2 class="left-align">Recherchez un événement</h2>
        <div class="valign-wrapper">
          <div class="valign-wrapper">
            <input type="text" name="event_search" placeholder="Rechercher un événement...">
            <button class="btn btn-large waves-effect waves-light" type="submit" name="action">Rechercher</button>
          </div>
          <button class="btn secondary btn-large waves-effect waves-light" type="submit" name="action">Me surprendre</button>
        </div>
      </div>
    </div>

    <div class="home_block_side col s3 valign-wrapper">
      <div>
        <h2 class="left-align white_text"><?php echo $home_title; ?></h2>
        <p class="white_text"><?php echo $home_description; ?></p>
        <button class="home_block_side_button btn light btn-large waves-effect waves-light" href="<?php echo $home_button_link; ?>"><?php echo $home_button_text; ?></button>
      </div>
    </div>

  </div>


      <div class=" event_block row">
      	<?php $query = new WP_Query(array(
					'post_type' => 'Evenements',
          'post_status' => 'publish',
				));

				while ($query->have_posts()) : $query->the_post(); ?>

          <div class="col s3">
            <?php the_favorites_button($post_id, $site_id); ?>
            <a class="black-text no-underline" href="<?php echo the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

              
              <?php the_post_thumbnail(); ?>
              <p class="bold"><?php the_title(); ?></p>
              <p><?php the_field('start_date'); ?></p>
              <p><?php the_field('city');?> , <?php the_field('region_name'); ?></p>

              <?php if( have_rows('circuit') ): ?>
                <div>
                <?php while( have_rows('circuit') ): the_row();
                  $distance = get_sub_field('distance'); ?>
                <div>
                  <p><?php echo $distance; ?></p>
                  <p>Km</p>
                </div>
                <?php endwhile; ?> 

                </div>
               <?php endif; ?> 
            </a>
          </div>

				<?php endwhile;
				wp_reset_query(); ?>

      </div>

      </div>
</main>

   

<?php get_footer(); ?>
