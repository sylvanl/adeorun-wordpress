<ul class="collection">
  <li class="collection-item avatar">
    <p class="author_pic"><?php echo get_avatar( get_the_author_meta('<? php the_author_ID ?>') , 32 ); ?> </p>
    <span class="title"><?php the_author_posts_link(); ?></span>
  </li>
</ul>
