 <div class="row">
    <div class="col s1">
      <p class="author_pic"><img class="circle responsive-img"><?php echo get_avatar( get_the_author_meta('<? php the_author_ID ?>') , 32 ); ?> </p>
    </div>
    <div class="col s11">
      <span class="title black-text"><?php the_author_posts_link(); ?></span>
      <p class="date caption-text grey-text"><?php the_time('F j, Y'); ?></p>
    </div>
  </div>

