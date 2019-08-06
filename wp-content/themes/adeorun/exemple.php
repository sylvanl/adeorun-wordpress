<?php /* Template Name: Exemple */ ?>

<?php get_header(); ?>

<?php
  // vars
  $temoignage = get_field('temoignage');
  $bouton = get_field('bouton_formulaire');
  $fonctionnalites = get_field('fonctionnalites_adeorun');
  $evenement_titre = get_field('evenements_titre');
  $avantages = get_field('avantages_adeorun');
  $sport_type = get_field('sport_type');
?>

<main role="main">
  <div class="container">

    <div class="page_title section">
      <h1><?php the_title(); ?></h1>
      <p class="center-align"><?php the_excerpt(); ?></p>
    </div>

    <div class="page_fonctionnalites section">

      <?php $advantage = 1; ?>
      <?php if( have_rows('fonctionnalites_adeorun') ): while ( have_rows('fonctionnalites_adeorun') ) : the_row(); ?>
        <?php if( have_rows('fonctionnalites') ): while ( have_rows('fonctionnalites') ) : the_row();
          $name = get_sub_field('titre');
          $image = get_sub_field('image');
          $description = get_sub_field('description');
         ?>

  				<?php if($advantage % 2 != 0) :  ?>
          <div class="row">
            <div class="col s7">
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
            </div>

              <div class="col s5">
                <h3><?php echo $name; ?></h3>
                <p><?php echo $description; ?></p>
                <button class="waves-effect waves-light btn" url="<?php echo $bouton['url']; ?>"><?php echo $bouton['texte']; ?></a>
              </div>
          </div>
          <?php else : ?>
            <div class="row">
              <div class="col s5">
                <h3><?php echo $name; ?></h3>
                <p><?php echo $description; ?></p>
                <button class="waves-effect waves-light btn" url="<?php echo $bouton['url']; ?>"><?php echo $bouton['texte']; ?></a>
              </div>

              <div class="col s7">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
              </div>
          </div>
          <?php endif; ?>
          <?php $advantage += 1; ?>

          <?php endwhile; ?>
          <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>

    </div>

    <div class="divider"></div>
      <div class="page_contenu section">
        <p><?php the_content(); ?></p>
      </div>

    <div class="divider"></div>
      <div class="page_avantages section">
      <h3><?php echo $avantages['titre']; ?></h3>

      <div class="row">
      <?php if( have_rows('avantages_adeorun') ): while ( have_rows('avantages_adeorun') ) : the_row(); ?>
        <?php if( have_rows('avantages') ): while ( have_rows('avantages') ) : the_row();

          // vars
          $name = get_sub_field('titre');
          $image = get_sub_field('image');
          ?>

          <div class="small_clickable col s3">
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
              <p><?php echo $name; ?></p>
          </div>

          <?php endwhile; ?>
          <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>

        </div>
    </div>
    
    <div class="page_couts section row">
      <h3><?php the_field('titre', 'option'); ?></h3>
      <p><?php the_field('contenu', 'option'); ?></p>

      <div class="page_couts_aside col s4 offset-s9">
        <p>Frais de services à la charge du participant*</p>
        <p><?php the_field('cout_fixe', 'option'); ?> €</p>
        <p>*<?php the_field('cout_variable', 'option'); ?>% + <?php the_field('cout_fixe', 'option'); ?>€ (TTC par participant) </p>
      </div>
    </div>


    <div class="page_temoignage section row">

      <div class="col s7 card medium section">
        <div class="page_temoignage_contenu">
          <p><?php echo $temoignage['contenu']; ?></p>
        </div>

        <div class="page_temoignage_profil section">
          <div class="col s3">
            <img src="<?php echo $teimoignage['profile_picture']['url']; ?>" alt="">
          </div>

          <div class="col s9">
            <p><?php echo $temoignage['name']; ?></p>
            <p><?php echo $temoignage['description']; ?></p>
          </div>
        </div>

        <div class="page_button_formulaire section">
          <button class="waves-effect waves-light btn" url="<?php echo $bouton['url']; ?>"><?php echo $bouton['texte']; ?></a>
        </div>

      </div>

    </div>

    <div class="page_evenements section">
      <h3><?php echo $evenement_titre; ?></h3>

      <div class="row">
      	<?php $query = new WP_Query(array(
					'post_type' => 'Evenements',
          'post_status' => 'publish',
          'tax_query' => array(
              array(
                'taxonomy' => $sport_type,
              ),
            ),

				));
        var_dump($sport_type);

				while ($query->have_posts()) : $query->the_post(); ?>

          <div class="small_clickable col s3">
            <a class="black-text no-underline" href="<?php echo the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <p><?php the_title(); ?></p>
            </a><i class="far fa-arrow-right right black-text"></i>
          </div>

				<?php endwhile;
				wp_reset_query(); ?>

      </div>
    </div>


  </div>

</main>



<?php get_footer(); ?>
