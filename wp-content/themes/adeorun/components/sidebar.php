<!-- sidebar -->
<aside class="sidebar" role="complementary">

	<p><?php the_field('description', 'options'); ?></p>
	<a class="waves-effect waves-light btn" href='<?php the_field('button-url', 'options') ?>'><?php the_field('button-text', 'options') ?></a>

	<!-- Facebook share button -->
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.3&appId=240618955988088&autoLogAppEvents=1"></script>
	<div class="fb-share-button" data-href="<?php get_the_permalink(); ?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>

	

</aside>
<!-- /sidebar -->
