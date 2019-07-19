<?php /* Template Name: Organisateur */ ?>

<?php get_header(); ?>

<main role="main">
  <div class="container">

    <section>
      <h1><?php the_title(); ?></h1>
      <h2><?php the_content(); ?></h2>

      <div class="row valign-wrapper">

        <?php if( have_rows('type_organisateur') ): ?>
        <?php $type = 1; ?>
        <?php $row_count = count(get_field('type_organisateur')); ?>

        <?php while( have_rows('type_organisateur') ): the_row();

        // Variables

            $image = get_sub_field('image_type_organisateur');
            $title = get_sub_field('titre_type_organisateur');
            $description = get_sub_field('description_type_organisateur');
          ?>

            <?php if($row_count > 4) : ?>

          	  <div class='col s3 large-clickable hoverable'>
          	    <?php $type += 1; ?>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
          	      <h3><?php echo $title; ?></h3>
          	      <p class="subtitle"><?php echo $description; ?></p>
              </div>

            <?php else : ?>

              <div class="large-clickable hoverable">
                <?php $type += 1; ?>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                  <h3><?php echo $title; ?></h3>
          	      <p class="subtitle"><?php echo $description; ?></p>
              </div>

            <?php endif; ?>


          <?php endwhile; ?>
        <?php endif; ?>
      </div>

    </section>

  </div>
</main>

<?php get_footer(); ?>
