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
              <?php $image = get_field('image_membre_equipe');
              if( !empty($image) ): ?>
                <img  class="responsive-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              <?php endif;
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
                }
                if(get_sub_field('email_membre_equipe')): ?>
                  <button type="button" url="<?php get_sub_field('email_membre_equipe') ?>">
                    <i class="fas fa-envelope"></i>
                  </button>
                <?php endif;
                if(get_sub_field('facebook_membre_equipe')): ?>
                  <button type="button" url="<?php get_sub_field('facebook_membre_equipe') ?>">
                    <i class="fab fa-facebook-f"></i>
                  </button>
                <?php endif;
                if(get_sub_field('twitter_membre_equipe')): ?>
                  <button type="button" url="<?php get_sub_field('twitter_membre_equipe') ?>">
                    <i class="fab fa-twitter"></i>
                  </button>
                <?php endif;
                if(get_sub_field('linkedin_membre_equipe')): ?>
                  <button type="button" url="<?php get_sub_field('linkedin_membre_equipe') ?>">
                    <i class="fab fa-linkedin-in"></i>
                  </button>
                <?php endif; ?>
              </div>
            </div>
              
          <?php endwhile; ?>
        </div>
      
      <?php endif; ?>

      

    </div>
	</main>

<?php get_footer(); ?>
