		<!-- footer -->
		<footer class="page-footer">
			<div class="divider"></div>			
			<div class="container">
				<div class="row">
					<div class="col s3">
						<?php dynamic_sidebar( 'widget-area-1' ); ?>
					</div>
					<div class="col s3">
						<?php dynamic_sidebar( 'widget-area-2' ); ?>
					</div>
					<div class="col s3">
						<?php dynamic_sidebar( 'widget-area-3' ); ?>
					</div>
					<div class="col s3">
						<?php dynamic_sidebar( 'widget-area-4' ); ?>
					</div>
				</div>
			</div>
			
			<div class="divider"></div>

			<!-- copyright et mentions légales -->
			<div class="footer-copyright container">
				<?php $texte_lien_copyright = get_field('texte_lien_copyright', 'options');
				$lien_copyright = get_field('lien_copyright', 'options');
				if( !empty($lien_copyright) && !empty($texte_lien_copyright) ): ?>
					<p class="caption-text"><a href="#!"><?php echo $texte_lien_copyright; ?></a></p>
				<?php elseif( !empty($texte_lien_copyright) ): ?>
					<p class="caption-text"><?php echo $texte_lien_copyright; ?></p>
				<?php else : ?>
					<p class="caption-text">© <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
				<?php endif; ?>

				<?php $texte_lien_mentions_legales = get_field('texte_lien_mentions_legales', 'options');
				$lien_mentions_legales = get_field('lien_mentions_legales', 'options');
				if( !empty($texte_lien_mentions_legales) && !empty($lien_mentions_legales) ): ?>
					<p class="right caption-text"><a href="<?php echo $lien_mentions_legales ?>"><?php echo $texte_lien_mentions_legales ?></a></p>
				<?php endif; ?>
			</div>
			<!-- /copyright et mentions légales -->

		</footer>
		<!-- /footer -->

	</div>
	<!-- /wrapper -->

	<?php wp_footer(); ?>
				
	<!-- Javascript -->
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


	<!-- analytics -->
	<script>
	(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
	(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
	l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
	ga('send', 'pageview');
	</script>

</body>
</html>