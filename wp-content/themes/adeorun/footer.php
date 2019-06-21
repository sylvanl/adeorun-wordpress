			<!-- footer -->
			<footer class="page-footer">
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

				<!-- copyright et mentions légales -->
				<p class="footer-copyright container">
					<?php $texte_lien_copyright = get_field('texte_lien_copyright', 'options');
					$lien_copyright = get_field('lien_copyright', 'options');
					if( !empty($lien_copyright) && !empty($texte_lien_copyright) ): ?>
						<a class="grey-text text-lighten-4" href="#!"><?php echo $texte_lien_copyright; ?></a>
					<?php elseif( !empty($texte_lien_copyright) ):
						echo $texte_lien_copyright;
					else : ?>
						© <?php bloginfo('name'); ?> <?php echo date('Y'); ?>
					<?php endif; ?>

					<?php $texte_lien_mentions_legales = get_field('texte_lien_mentions_legales', 'options');
					$lien_mentions_legales = get_field('lien_mentions_legales', 'options');
					if( !empty($texte_lien_mentions_legales) && !empty($lien_mentions_legales) ): ?>
						<a class="grey-text text-lighten-4 right" href="<?php echo $lien_mentions_legales ?>"><?php echo $texte_lien_mentions_legales ?>s</a>	
					<?php endif; ?>
				</p>
				<!-- /copyright et mentions légales -->

			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

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
