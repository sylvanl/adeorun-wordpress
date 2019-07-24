 <div class="row collection">
    <div class="col s1">
      <p class="author_pic"><img class="circle responsive-img"><?php echo get_avatar( get_the_author_meta('<? php the_author_ID ?>') , 32 ); ?> </p>
    </div>
    <div class="col s11">
      <span class="title"><?php the_author_posts_link(); ?></span>
      <p class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></p>
    </div>
  </div>

