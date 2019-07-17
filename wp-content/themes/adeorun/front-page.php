<?php get_header(); ?>

<?php $fields = get_fields(); extract( $fields ); ?>

<main role="main">

  <div class="container">

    <!-- Thumbmail Page d'accueil -->
      <div class="main_block">

        <div class="main_block_search ">
          <h2>Recherchez un événement</h2>
          <textarea name="event_search" rows="8" cols="80" placeholder="Rechercher un événement..."></textarea>
          <button class="btn waves-effect waves-light" type="submit" name="action">Rechercher</button>
          <button class="btn waves-effect waves-light" type="submit" name="action">Me surprendre</button>
        </div>

        <div class="main_block_side">
          <h3><?php echo $home_title; ?></h3>
          <p><?php echo $home_description; ?></p>
          <a class="waves-effect waves-light btn" href="<?php echo $home_button_link; ?>"><?php echo $home_button_text; ?></a>
        </div>

      </div>

  </div>
</main>

<?php get_footer(); ?>
