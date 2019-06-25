<?php get_template_part('components/blank-header'); ?>

<!-- header -->
<header class="header clear" role="banner">

	<!-- nav -->
	<nav>
		<div class="nav-wrapper row">
			<!-- logo -->
			<div class="col s2">
				<a href="<?php echo home_url(); ?>" class="brand-logo">
					<?php $logo = get_field('logo', 'options');
					if( !empty($logo) ): ?>
						<img class="responsive-img" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
					<?php endif; ?>
				</a>
			</div>
			<!-- /logo -->

			<!-- Recherche d'évenemnts -->
			<div class="input-field col s2 red-text">
				<input type="text" placeholder="Recher un évennement" id="autocomplete-input" class="autocomplete red-text" >
			</div>
			<!-- /Recherche d'évenemnts -->

			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<?php html5blank_nav(); ?>
			</ul>
		</div>
	</nav>
	<!-- /nav -->

</header>
<!-- /header -->