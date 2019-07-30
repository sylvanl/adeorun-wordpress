<?php get_header(); ?>

	<main role="main">

						<!-- sidebar-->
							<div class="sidebar_article">
								<?php get_template_part('components/sidebar'); ?>
							</div>	
						<!-- /sidebar-->

		<div class="container">

						<!-- post title -->
						<div class="section">
							<h1 class="left-align"><?php the_title(); ?></h1>
							<p ><?php the_excerpt(); ?></p>
						</div>
						<!-- /post title -->

						<!-- post & author details -->
							<div class="post_details section">
								<?php get_template_part('components/author-single'); ?>
							</div>
						<!-- /post & author details -->

						<!-- post thumbnail -->
						<div class="section">
							<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_post_thumbnail(); // Fullsize image for the single post ?>
								</a>
							<?php endif; ?>
						</div>
						<!-- /post thumbnail -->


						<div class="article_content section">
						 	<?php the_content(); // Dynamic Content ?>
					 	</div>



						<!-- author of the post-->
						<div class="section">
							<?php get_template_part('components/author-bio'); ?>
						</div>

						<div class="divider"></div>

						<!-- comments of the post-->
						<div class="section">
							<?php get_template_part('components/comments'); ?>
						</div>
						

						<div class="divider"></div>


			<!-- Show 3 lastest posts -->
						<div class="section">

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
											<p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?> </a></p>
											<p class="author_name"><?php the_author_posts_link(); ?></p>
											<p class="date"><?php the_time('F j, Y'); ?></p>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>

						</section>


		</div>
	</main>



<?php get_footer(); ?>
