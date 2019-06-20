<div class="author">
  <p class="author_pic"><?php echo get_avatar( get_the_author_meta('<? php the_author_ID ?>') , 32 ); ?> </p>
  <p class="author_name"><?php the_author_posts_link(); ?></p>
</div>
