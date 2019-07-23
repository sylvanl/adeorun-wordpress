<?php get_header(); ?>

	<main role="main">


						<!-- sidebar-->
							<?php get_template_part('components/sidebar'); ?>
						<!-- /sidebar-->

		<div class="container">

						<!-- post title -->
						<section>
							<h1 class="left-align"><?php the_title(); ?></h1>
							<p><?php the_excerpt(); ?></p>
						</section>
						<!-- /post title -->

						<!-- post & author details -->
						<section>
							<div class="post_details">
								<?php get_template_part('components/author-single'); ?>
								<p class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></p>
							</div>
						</section>
						<!-- /post & author details -->

						<!-- post thumbnail -->
						<section>

							<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_post_thumbnail(); // Fullsize image for the single post ?>
								</a>
							<?php endif; ?>

						</section>
						<!-- /post thumbnail -->


						<section>
						 <?php the_content(); // Dynamic Content ?>
					 </section>

						<!-- tags & categories-->
						<section>
							<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
							<p><?php _e( 'Categories: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>
						</section>


						<!-- author of the post-->
						<section>
							<?php get_template_part('components/author-bio'); ?>
						</section>


						<!-- comments of the post-->
						<section>
							<?php get_template_part('components/comments'); ?>
						</section>


			<!-- Show 3 lastest posts -->
						<section>

							<h3>A découvrir également</h3>

							<div class="row">
								<?php
								$args = array( 'numberposts' => "3", 'order'=> 'ASC', 'orderby' => 'title' );
								$postslist = get_posts( $args );
								foreach ($postslist as $post) :  setup_postdata($post); ?>
								<div class="col s4">
									<div class="card">
										<div class="card-image">
											<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php the_post_thumbnail(); // Fullsize image for the single post ?>
												</a>
											<?php endif; ?>

										</div>
										<div class="card-content">
											<span class="card-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); // Fullsize image for the single post ?> </a></span>
											<p class="author_pic"><?php echo get_avatar( get_the_author_meta('<? php the_author_ID ?>') , 32 ); ?> </p>
											<p class="author_name"><?php the_author_posts_link(); ?></p>
											<p class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></p>
										</div>
										<div class="card-action">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												Voir l'article
											</a>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>

						</section>


		</div>
	</main>



<?php get_footer(); ?>
