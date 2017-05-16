<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <h3><?php _e('That\'s a negative ghostrider.', 'sage'); ?></h3>
  </div>
  <?php get_search_form(); ?>
  <h4>Try searching again?</h4>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'search'); ?>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>
