<?php /* Template Name: Sport */ ?>

<?php get_header(); ?>

<main role="main">
  <div class="container">

    <section>
      <h1><?php the_title(); ?></h1>
      <p><?php the_content(); ?></p>

      <div class="row">

        <?php if( have_rows('sport') ): ?>
        <?php while( have_rows('sport') ): the_row();

        // Variables
            $image = get_sub_field('sport_icon');
            $title = get_sub_field('sport_title');
            $link = get_sub_field('sport_link');
          ?>

          	  <div class='col s3 large-clickable hoverable'>
                  <a href="<?php echo $link; ?>">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                    <p class="orga-title"><?php echo $title; ?><i class="far fa-arrow-right right black-text"></i></p>
                  </a>
              </div>

          <?php endwhile; ?>
        <?php endif; ?>
      </div>

    </section>

  </div>
</main>

<?php get_footer(); ?>
