
<div id="comments" class="comments">


<?php if ( get_comments_number()!=0 ) : ?>

	<h3><?php comments_number(); ?></h3>

	<ul class="commentlist">
		<?php
			//Gather comments for a specific page/post
			$comments = get_comments(array(
				'status' => 'approve' //Change this to the type of comments to be displayed
			));

			//Display the list of comments
			wp_list_comments(array(
				'per_page' => 10, //Allow comment pagination
				'reverse_top_level' => false //Show the oldest comments at the top of the list
			), $comments);
		?>
	</ul>

<?php endif; ?>


<?php
$args = array(
    'fields' => apply_filters(
        'comment_form_default_fields', array(
            'author' =>'  <div class="row">
		<div class="input-field col s4">' . '<p class="comment-form-author">' . '<label for="author">' . __( 'Nom *' ) . '</label> ' . '<input id="author" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
                ( $req ? '<span class="required">*</span>' : '' )  .
                '</p>' . '</div>'
                ,
            'email'  => '	<div class="input-field col s4">'.'<p class="comment-form-email">' .   '<label for="email">' . __( 'Adresse mail *' ) . '</label> ' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' />'  .
                ( $req ? '<span class="required">*</span>' : '' )
                 .
                '</p>'. '</div>',

            'url'    => '<div class="input-field col s4">' . '<p class="comment-form-url">' . '<label for="url">' . __( 'Site web', 'domainreference' ) .
             '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' . '</label>' . '</p>' . '</div>' . '</div>'
        )
    ),
    'comment_field' => '<div class="input-field col s12">' .
        '<label for="comment">' . __( 'Votre commentaire:' ) . '</label>' .
        '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true class="materialize-textarea"></textarea>' .
        '</div>',
    'comment_notes_after' => '',
    'title_reply' => '<div class="crunchify-text"> <h5>Laisser un commentaire</h5></div>'
);
?>


		<?php comment_form($args); ?>

		</div>
