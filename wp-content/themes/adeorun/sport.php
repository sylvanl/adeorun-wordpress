<?php /* Template Name: Sport */ ?>

<?php get_header(); ?>

<main role="main">
  <div class="container">

    <section>
      <h1><?php the_title(); ?></h1>
      <h2><?php the_content(); ?></h2>

      <div class="row valign-wrapper">

        <?php if( have_rows('sport') ): ?>
        <?php while( have_rows('sport') ): the_row();

        // Variables

            $image = get_sub_field('sport_icon');
            $title = get_sub_field('sport_title');
          ?>

          	  <div class='col s3 large-clickable hoverable'>
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
          	      <p class="orga-title"><?php echo $title; ?></h3>
          	      <p class="subtitle grey-text"><?php echo $description; ?><i class="far fa-arrow-right right black-text"></i></p>
              </div>

          <?php endwhile; ?>
        <?php endif; ?>
      </div>

    </section>

  </div>
</main>

<?php get_footer(); ?>
