<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404">

				<div class="container">
					<h1>404 - Page introuvable</h1>
					<p class="sub_heading center-align">Il semblerait que la page que vous demandez n'est pas disponible</p>

					<div style="text-align: center;">
						<a class="waves-effect waves-light btn" href="<?php echo home_url(); ?>">Retour à l'accueil</a>
					</div>
				</div>
			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
