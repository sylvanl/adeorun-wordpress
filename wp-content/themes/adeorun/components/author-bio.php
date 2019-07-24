 <div class="row collection">
    <div class="col s1">
      <p class="author_pic"><?php echo get_avatar( get_the_author_meta('<? php the_author_ID ?>') , 32 ); ?> </p>
    </div>
    <div class="col s11">
      <span class="title"><?php the_author_posts_link(); ?></span>
      <p><?php echo the_author_description(); ?></p>
    </div>
  </div>

  

