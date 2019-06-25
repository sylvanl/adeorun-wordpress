<?php get_header(); ?>

<?php $fields = get_fields(); extract( $fields ); ?>

<main role="main">

  <div class="container">

    <!-- Thumbmail Page d'accueil -->
    <section>

      <div class="main_block">
        <div class="main_block_search ">

          <h2>Recherchez un évènement</h2>

            <label for="event_type">Type d'évènement</label>
            <textarea name="event_type" rows="8" cols="80"></textarea>

            <label for="event_date">Dates</label>
            <textarea name="event_date" rows="8" cols="80"></textarea>

            <label for="event_location">Autour de</label>
            <textarea name="event_type" rows="8" cols="80"></textarea>

            <button type="submit" name="button">Rechercher</button>

        </div>

        <div class="main_block_event">
          <a href="<?php echo $lien_evenement_page_accueil; ?>"><p><?php echo $evenement_page_acceuil; ?></p></a>
        </div>
      </div>

    </section>

    <section>
      <h2><?php echo $premier_titre; ?> </h2>
    </section>

    <section>
      <h2><?php echo $deuxieme_titre; ?> </h2>

      	      <?php if( have_rows('type_organisateur') ): ?>
      	      <?php $type = 1; ?>
      	      	<ul>
      	      	<?php while( have_rows('type_organisateur') ): the_row();

      	      		// vars

      	      		$image = get_sub_field('image_type_organisateur');
      	      		$title = get_sub_field('titre_type_organisateur');
      	      		$description = get_sub_field('description_type_organisateur');

      	      		?>

      	      		<li>
      	              <?php
      	                    $type += 1;
      	              ?>
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
      	      				<h4><?php echo $title; ?></h4>
      	              <p><?php echo $description; ?></p>

      	      		</li>
      	      	<?php endwhile; ?>
      	      	</ul>

      	      <?php endif; ?>

    </section>

  </div>
</main>

<?php get_footer(); ?>
