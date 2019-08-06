<?php /* Template Name: Organisateur */ ?>

<?php get_header(); ?>

<main role="main">
  <div class="container">

    <section>
      <h1><?php the_title(); ?></h1>
      <h2><?php the_content(); ?></h2>

      <div class="row valign-wrapper">

        <?php if( have_rows('type_organisateur') ): ?>
        <?php $row_count = count(get_field('type_organisateur')); ?>

        <?php while( have_rows('type_organisateur') ): the_row();

        // Variables

            $image = get_sub_field('image_type_organisateur');
            $title = get_sub_field('titre_type_organisateur');
            $description = get_sub_field('description_type_organisateur');
            $link = get_sub_field('lien_type_organisateur');
          ?>

            <?php if($row_count > 4) : ?>

            <a href="<?php echo $link; ?>">
          	  <div class='col s3 large-clickable hoverable'>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                    <p class="orga-title"><?php echo $title; ?></p>
                    <p class="subtitle grey-text"><?php echo $description; ?><i class="far fa-arrow-right right black-text"></i></p>
              </div>
            </a>    

            <?php else : ?>
            <a href="<?php echo $link; ?>">
              <div class="large-clickable hoverable">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                    <p class="orga-title"><?php echo $title; ?></p>
                    <p class="subtitle grey-text"><?php echo $description; ?><i class="far fa-arrow-right right black-text"></i></p>
              </div>
            </a>
            <?php endif; ?>


          <?php endwhile; ?>
        <?php endif; ?>
      </div>

    </section>

  </div>
</main>

<?php get_footer(); ?>
