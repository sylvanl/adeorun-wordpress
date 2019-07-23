<?php /* Template Name: Exemple */ ?>

<?php get_header(); ?>

<?php
  // vars
  $temoignage = get_field('temoignage');
  if( have_rows('temoignage') ):
    while( have_rows('temoignage') ) : the_row(); 
      echo the_sub_field('titre');
    endwhile;
  endif;
  $bouton = get_field('bouton_formulaire');
  $fonctionnalites = get_field('fonctionnalites_adeorun');
  $evenement_titre = get_field('evenements_titre');
  $avantages = get_field('avantages_adeorun');
?>

<main role="main">
  <div class="container">

    <div class="page_title">
      <h1><?php the_title(); ?></h1>
      <p><?php echo $evenement_titre; ?></p>
    </div>

    <div class="page_thumbnail">
      <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_post_thumbnail(); // Fullsize image for the single post ?>
        </a>
      <?php endif; ?>
    </div>

    <div class="page_temoignage">

      <div class="page_temoignage_titre">
        <h3><?php echo $temoignage['titre']; ?></h3>
      </div>

      <div class="page_temoignage_contenu">
        <img src="<?php echo $teimoignage['image']['url']; ?>" alt="">
        <p><?php echo $temoignage['description'] ?></p>
        <p><?php echo $temoignage['contenu'] ?></p>
      </div>

    </div>

    <div class="page_button_formulaire">
      <button class="waves-effect waves-light btn" url="<?php echo $bouton['url']; ?>"><?php echo $bouton['texte']; ?></a>
    </div>

    <div class="page_fonctionnalités">

      <h3><?php echo $fonctionnalites['titre']; ?></h3>

      <?php if( have_rows('fonctionnalites_adeorun') ): while ( have_rows('fonctionnalites_adeorun') ) : the_row(); ?>

        <?php if( have_rows('fonctionnalites') ): while ( have_rows('fonctionnalites') ) : the_row();

          // vars
          $name = get_sub_field('titre');
          $image = get_sub_field('image');

          ?>

          <div>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
              <p><?php echo $name; ?></p>
          </div>

          <?php endwhile; ?>
          <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>

    </div>

    <div class="page_evenements">
      <h3><?php echo $evenement_titre; ?></h3>
    </div>

    <div class="page_contenu">
      <p><?php the_content(); ?></p>
    </div>

    <div class="page_avantages">
      <h3><?php echo $avantages['titre']; ?></h3>

      <?php if( have_rows('avantages_adeorun') ): while ( have_rows('avantages_adeorun') ) : the_row(); ?>

        <?php if( have_rows('avantages') ): while ( have_rows('avantages') ) : the_row();

          // vars
          $name = get_sub_field('titre');
          $image = get_sub_field('image');

          ?>

          <div>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
              <p><?php echo $name; ?></p>
          </div>

          <?php endwhile; ?>
          <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>

    </div>

    <div class="page_couts">
      <h3><?php the_field('titre', 'option'); ?></h3>
      <p><?php the_field('contenu', 'option'); ?></p>
      <p><?php the_field('cout_fixe', 'option'); ?></p>
      <p><?php the_field('cout_variable', 'option'); ?></p>

    </div>

  </div>

</main>



<?php get_footer(); ?>
