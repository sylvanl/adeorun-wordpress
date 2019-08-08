<?php get_header(); ?>

	<main role="main">

		<div class="container">

						<!-- post title -->
						<div class="row">
							<div class="col s8 offset-s2">
								<div class="section">
									<h1 class="left-align"><?php the_title(); ?></h1>
									<p class="grey-text"><?php the_excerpt(); ?></p>
								</div>
								<div class="post_details section">
									<?php get_template_part('components/author-single'); ?>
								</div>
							</div>
						</div>
						<!-- /post title -->

						<!-- post & author details -->

						<!-- /post & author details -->

						<!-- post thumbnail -->
						<div class=" row section">
							<div class="col s12 center-align thumbnail">
							<?php if ( has_post_thumbnail()) : ?>
								<?php the_post_thumbnail(); ?>
							<?php endif; ?>
							</div>
						</div>
						<!-- /post thumbnail -->

						<div class="row section">

						<!-- sidebar-->
							<div class="sidebar_article col s2 sticky">
								<?php get_template_part('components/sidebar'); ?>
							</div>	
						<!-- /sidebar-->

							<div class="article_content col s8">
								<?php the_content(); // Dynamic Content ?>

								<div class="section">
									<?php get_template_part('components/author-bio'); ?>
								</div>
							</div>
						 </div>



						<!-- author of the post-->

						<div class="row">
							<div class="col s8 offset-s2">
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
								$args = array( 'numberposts' => "3", 'order'=> 'ASC', 'orderby' => 'title', 'post__not_in' => array($post->ID) );
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
											<p><a class="second-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?> </a></p>

											<div class="section">
												<p class="author_name caption-text"><?php the_author_posts_link(); ?></p>
												<p class="date caption-text grey-text"><?php the_time('F j, Y'); ?></p>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						 </div> 
				<!-- /Show 3 lastest posts -->
					</div>

		</div>
	</main>



<?php get_footer(); ?>
