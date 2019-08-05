<?php 
    $telephone = get_field('contact-phone', 'option'); 
    $description = get_field('contact-description', 'option');
    $email = get_field('contact-email', 'option');
    $contact_button_text = get_field('contact-button-text', 'option');
    $contact_button_link = get_field('contact-button-link', 'option');

?>
<div class="row upbar valign-wrapper">
    <div class="col">
        <i class="fas fa-phone-alt"></i>
    </div>
    <div class="col">
        <p class="white-text"><?php echo $telephone; ?></p>
    </div>

    <div class="right col">
        <div class="col">
            <p class="white-text"><?php echo $description; ?></p>
        </div>
        
        <div class="col">
            <button class="home_block_side_button btn light btn-large waves-effect waves-light" href="<?php echo $contact_button_link; ?>"><?php echo $contact_button_text; ?></button>
        </div>
    </div>
</div>