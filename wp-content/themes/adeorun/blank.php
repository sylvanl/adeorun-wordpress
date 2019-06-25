<?php  /* Template Name: BlankSS */ ?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

  <?php get_template_part('components/head'); ?>

    <main role="main">
      <div class="container">

        <section>
          <?php the_content(); ?>
        </section>

      </div>
    </main>

  <?php get_template_part('components/scripts'); ?>

	</body>
</html>