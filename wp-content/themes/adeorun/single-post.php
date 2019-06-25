<?php get_header(); ?>

	<main role="main">
		<div class="container">

						<!-- post title -->
						<section>
							<h1>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h1>

							<p><?php the_excerpt(); ?></p>

						</section>
						<!-- /post title -->

						<!-- post & author details -->
						<section>

							<?php get_template_part('components/author'); ?>
							<div class="post_details">
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

						<!-- sidebar-->
						<section>
							<?php get_template_part('components/sidebar'); ?>
						</section>
						<!-- /sidebar-->


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
							<?php get_template_part('components/author'); ?>
						</section>


						<!-- comments of the post-->
						<section>
							<?php get_template_part('components/comments'); ?>
						</section>


			<!-- Show 3 lastest posts -->
						<section>

							<h3>A découvrir également</h3>
							<?php
							$args = array( 'numberposts' => "3", 'order'=> 'ASC', 'orderby' => 'title' );
							$postslist = get_posts( $args );
							foreach ($postslist as $post) :  setup_postdata($post); ?>
									<div>
										<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_post_thumbnail(); // Fullsize image for the single post ?>
											</a>
										<?php endif; ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_title(); // Fullsize image for the single post ?>
										</a>

										<div class="post_details">
												<p class="author_pic"><?php echo get_avatar( get_the_author_meta('<? php the_author_ID ?>') , 32 ); ?> </p>
												<p class="author_name"><?php the_author_posts_link(); ?></p>
												<p class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></p>
										</div>
									</div>
							<?php endforeach; ?>

						</section>


		</div>
	</main>



<?php get_footer(); ?>
