<article <?php post_class(); ?>>


  <?php
    $iid = get_post_meta( get_the_ID(), 'rp_proj__poster_image_id', true );
    $src = get_post_meta( get_the_ID(), 'rp_proj__poster_image', true );
    $srcset = wp_get_attachment_image_srcset( $iid, 'full');
    $sizes = wp_get_attachment_image_sizes( $iid, 'full' );
    $alt = get_post_meta( $iid, '_wp_attachment_image_alt', true);
  ?>
  
  <a class="image-wrap" href="<?php esc_url(the_permalink()); ?>">
    <img src="<?php echo esc_url($src); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" alt="<?php echo esc_attr($alt); ?>">
  </a>

  <h2 class="entry-title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
  

  <?php 
    $categories = wp_get_object_terms(get_the_ID(), array('taxonomy' => 'project_tax' ));

    $count = count( $categories );

    echo '<span class="category">';
    echo 'A ';

    for( $i=0; $i<=$count; ++$i ){

      if( $i == 0 ){
        echo $categories[$i]->name;        
      }else if( $i == $count - 1 ){
        echo ' & ' . $categories[$i]->name;
      }

    }
    echo ' project.';
    echo '</span> ';

  ?>

</article>



