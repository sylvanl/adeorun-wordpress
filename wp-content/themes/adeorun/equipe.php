<?php  /* Template Name: Page équipe */
get_header(); ?>

	<main role="main">
    <div class="container">

      <section>
        <h1><?php the_title(); ?></h1>

        <?php if(get_field('sous_titre_equipe'))
        {
          echo '<h2>' . get_field('sous_titre_equipe') . '</h2>';
        }
        if(get_field('presentation_equipe'))
        {
          echo '<p>' . get_field('presentation_equipe') . '</p>';
        }

        if( have_rows('membres_equipe') ): ?>
  
          <div class="row">
            <?php while( have_rows('membres_equipe') ): the_row(); ?>

              <div class="col s4">
                <div class="team_image">
                  <?php $image = get_sub_field('image_membre_equipe');
                  if( !empty($image) ): ?>
                    <img class="responsive-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                  <?php endif;
                  if(get_sub_field('citation_membre_equipe'))
                  {
                  
                    echo '<div class="overlay"><p class="center-align">' . get_sub_field('citation_membre_equipe') . '</p></div>';
                  } ?>
                </div>
                
                <?php if(get_sub_field('nom_membre_equipe'))
                {
                  echo '<h2>' . get_sub_field('nom_membre_equipe') . '</h2>';
                }
                if(get_sub_field('description_membre_equipe'))
                {
                  echo '<p class="center-align">' . get_sub_field('description_membre_equipe') . '</p>';
                } ?>
                
                <div class="row center-align">
                  <?php if(get_sub_field('email_membre_equipe')): ?>
                    <button class="waves-effect waves-light btn" type="button" url="<?php get_sub_field('email_membre_equipe') ?>">
                      <i class="fas fa-envelope"></i>
                    </button>
                  <?php endif;
                  if(get_sub_field('facebook_membre_equipe')): ?>
                    <button class="waves-effect waves-light btn" type="button" url="<?php get_sub_field('facebook_membre_equipe') ?>">
                      <i class="fab fa-facebook-f"></i>
                    </button>
                  <?php endif;
                  if(get_sub_field('twitter_membre_equipe')): ?>
                    <button class="waves-effect waves-light btn" type="button" url="<?php get_sub_field('twitter_membre_equipe') ?>">
                      <i class="fab fa-twitter"></i>
                    </button>
                  <?php endif;
                  if(get_sub_field('linkedin_membre_equipe')): ?>
                    <button class="waves-effect waves-light btn" type="button" url="<?php get_sub_field('linkedin_membre_equipe') ?>">
                      <i class="fab fa-linkedin-in"></i>
                    </button>
                  <?php endif; ?>
                </div>
              </div>
                
            <?php endwhile; ?>
          </div>
        
        <?php endif; ?>
      </section>
      
      <section>
        <?php if(get_field('titre_recrutement'))
        {
          echo '<h1>' . get_field('titre_recrutement') . '</h1>';
        }
        if(get_field('description_recrutement'))
        {
          echo '<p>' . get_field('description_recrutement') . '</p>';
        }
        if(get_sub_field('lien_recrutement')): ?>
          <button type="button" url="<?php get_sub_field('lien_recrutement') ?>">
            <?php get_sub_field('texte_bouton_recrutement') ?>
          </button>
        <?php endif; ?>
      </section>
      
      <section>
        <?php if(get_field('titre_locaux'))
        {
          echo '<h1>' . get_field('titre_locaux') . '</h1>';
        }
        if(get_field('description_locaux'))
        {
          echo '<p>' . get_field('description_locaux') . '</p>';
        }
        if(get_field('galerie_locaux')): ?>
          <div class="row">
            <?php foreach( get_field('galerie_locaux') as $image ): ?>
              <div class="col s4">
                <img class="responsive-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
              </div>
            <?php endforeach; ?>
          </div>        
        <?php endif; ?>
      </section>

      <section>
        <?php if(get_field('titre_adresse'))
        {
          echo '<h1>' . get_field('titre_adresse') . '</h1>';
        }
        if(get_field('description_adresse'))
        {
          echo '<p>' . get_field('description_adresse') . '</p>';
        } ?>

        <!-- Ajouter la carte ici !!! -->

      </section>

      <section>
        <?php the_content(); ?>
      </section>

    </div>
	</main>

<?php get_footer(); ?>
