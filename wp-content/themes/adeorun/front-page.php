<?php get_header(); ?>

<!-- Hide footer -->
<style>
  footer {
    display:none;
  }
</style>
<!-- /Hide footer -->

<?php $fields = get_fields(); extract( $fields ); ?>

<main role="main">
  
  <!-- Thumbmail Page d'accueil -->
  <div class="home_block row">

    <div class="home_block_search col s9 valign-wrapper">
      <div>
        <h2 class="left-align">Recherchez un événement</h2>
        <div class="valign-wrapper">
          <div class="valign-wrapper">
            <input type="text" name="event_search" placeholder="Rechercher un événement...">
            <button class="btn btn-large waves-effect waves-light" type="submit" name="action">Rechercher</button>
          </div>
          <button class="btn secondary btn-large waves-effect waves-light" type="submit" name="action">Me surprendre</button>
        </div>
      </div>
    </div>

    <div class="home_block_side col s3 valign-wrapper">
      <div>
        <h2 class="left-align white_text"><?php echo $home_title; ?></h2>
        <p class="white_text"><?php echo $home_description; ?></p>
        <button class="home_block_side_button btn light btn-large waves-effect waves-light" href="<?php echo $home_button_link; ?>"><?php echo $home_button_text; ?></button>
      </div>
    </div>

  </div>

</main>

<?php get_footer(); ?>
