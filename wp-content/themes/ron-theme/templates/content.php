<article <?php post_class(); ?> data-template="content.php">
  
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>

  <div class="entry-summary">
    <p><?php echo get_the_excerpt(); //</p> is inside a read_more filter ?>
  </div>

 

</article>
