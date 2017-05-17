<article <?php post_class(); ?>>

  
  <a class="image-wrap" href="<?php esc_url(the_permalink()); ?>" style="background-image: url('<?php echo get_post_meta( get_the_ID(), 'rp_proj_bg_image', true ); ?>');">
    <?php the_post_thumbnail(); ?>
  </a>

  <h2 class="entry-title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
  

  <?php 
    /**
     * PROJECT TYPES : TAXONOMY
     *
     **/
      $proj_type_array = wp_get_object_terms(get_the_ID(), ['taxonomy' => 'project_type_tax' ]);

      $count = count( $proj_type_array );
      echo '<span class="project_type">';
      echo 'A ';

      for( $i=0; $i<=$count; ++$i ){
          if( $i == 0 ){
             echo $proj_type_array[$i]->name;        
          }else if( $i == $count - 1 ){
            echo ' & ' . $proj_type_array[$i]->name;
          }      
      }

      echo '</span> ';

    /**
     * PROJECT CATEGORIES : TAXONOMY
     *
     **/
    $categories = wp_get_object_terms(get_the_ID(), array('taxonomy' => 'project_tax' ));

    $count = count( $categories );

    echo '<span class="category">';    

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



