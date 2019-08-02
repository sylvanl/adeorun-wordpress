<!-- sidebar -->
<aside class="sidebar" role="complementary">

	<div class="section">
		<p class="caption-text"><?php the_field('description', 'options'); ?></p>
		<button class="btn secondary btn-medium waves-effect waves-light" href='<?php the_field('button-url', 'options') ?>'><?php the_field('button-text', 'options') ?></button>
	</div>

	<div class="divider"></div>

	<!-- Facebook share button -->
	<div class="share_buttons section">

		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.3&appId=240618955988088&autoLogAppEvents=1"></script>
		<div class="fb-share-button" data-href="<?php get_the_permalink(); ?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="social-icon"><i class="fab fa-facebook-f"></i></a></div>

	<!-- Twitter share button -->
		<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="social-icon" data-show-count="false"><i class="fab fa-twitter"></i></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

	</div>

</aside>
<!-- /sidebar -->
