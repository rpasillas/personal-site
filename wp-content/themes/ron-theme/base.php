<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap container" role="document">
      <div class="content row">
        <main class="main">
          
          
          <?php include Wrapper\template_path(); ?>
          


          <?php if( is_singular('post') ){ ?> 
          <div class="social-wrapper">
            <ul>
              <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( get_permalink() ); ?>" target="_blank" title="Share this article on the Facebook for everyone to ignore.">Fb</a></li>
              <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo rawurlencode( get_permalink() ); ?>&title=<?php echo rawurlencode( get_the_title() ); ?>" target="_blank" title="If you share this article on linkedIn it will help your career.">Li</a></li>
              <li><a href="https://twitter.com/intent/tweet?text=<?php echo rawurlencode( get_the_title() ); ?>&url=<?php echo rawurlencode( get_permalink() ); ?>" target="_blank" title="Share this article on the Twittersphere to blow up your retweets.">Tw</a></li>
            </ul>
          </div>
          <?php } ?>


        </main><!-- /.main -->
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
