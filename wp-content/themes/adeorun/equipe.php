<?php  /* Template Name: Page équipe */
get_header(); ?>

	<main role="main">
    <div class="container">

      <h1><?php the_title(); ?></h1>

      <?php if(get_field('sous_titre_equipe'))
      {
        echo '<p>' . get_field('sous_titre_equipe') . '</p>';
      }

      if(get_field('presentation_equipe'))
      {
        echo '<p>' . get_field('presentation_equipe') . '</p>';
      }

      if( have_rows('membres_equipe') ): ?>
 
        <div class="row">
          <?php while( have_rows('membres_equipe') ): the_row(); ?>

            <div class="col s4">
              <?php if(get_sub_field('image_membre_equipe'))
              {
                echo '<img>' . get_sub_field('image_membre_equipe') . '</img>';
              }
              if(get_sub_field('nom_membre_equipe'))
              {
                echo '<p>' . get_sub_field('nom_membre_equipe') . '</p>';
              }
              if(get_sub_field('description_membre_equipe'))
              {
                echo '<p>' . get_sub_field('description_membre_equipe') . '</p>';
              } ?>
              
              <div class="row">
                <?php if(get_sub_field('description_membre_equipe'))
                {
                  echo '<p>' . get_sub_field('description_membre_equipe') . '</p>';
                } ?>
              </div>

              <div class="row">
              
              </div>

            </div>
            
    
            <li>sub_field_1 = <?php the_sub_field('sub_field_1'); ?>, sub_field_2 = <?php the_sub_field('sub_field_2'); ?>, etc</li>
            
            <?php 
            
            $sub_field_3 = get_sub_field('sub_field_3'); 
            
            // do something with $sub_field_3
            
            ?>
              
          <?php endwhile; ?>
        </div>
      
      <?php endif;

      if(get_field('field_name'))
      {
        echo '<p>' . get_field('field_name') . '</p>';
      }

      ?>

      <p>Ceci est la page équipe</p>

    </div>
	</main>

<?php get_footer(); ?>
