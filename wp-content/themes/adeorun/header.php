<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

		<script src="https://kit.fontawesome.com/b6a96d89d3.js"></script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

				<!-- nav -->
				<nav class="fixed">
					<div class="nav-wrapper row">
						<!-- logo -->
						<div class="col">
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
						<?php echo do_shortcode( '[ivory-search id="384" title="Default Search Form"]' ); ?>
						</div>
						<!-- /Recherche d'évenemnts -->
						<div class="right col">
							<div class="main-nav col">
								<?php html5blank_nav(); ?>
							</div>

							<div class="create_event col">
								<a class="waves-effect waves-light btn">Créer un événement</a>
							</div>
						</div>

					</div>
				</nav>
				<!-- /nav -->

			</header>
			<!-- /header -->