<div class="wrap container" role="document">
	<div class="content row">
        <main class="main">

			<article <?php post_class(); ?>>

				<div class="left">
					<h1><?php the_title(); ?></h1>

					<?php 
					    $categories = wp_get_object_terms(get_the_ID(), ['taxonomy' => 'post_tag' ]);

					    $count = count( $categories );
					    $tag = '';

					    for( $i=0; $i<=$count; ++$i ){

					      if( $i == 0 ){
					        $tag .= $categories[$i]->name;        
					      }else if( $i == $count - 1 ){
					        $tag .= ' and ' . $categories[$i]->name;
					      }

					    }
				  	?>
					
					<p><?php echo get_post_meta( get_the_ID(), 'rp_proj_role', true ); ?> on a <?php echo $tag; ?> project via <?php echo get_post_meta( get_the_ID(), 'rp_proj_via', true ); ?>.</p>

					<ul class="check-list">
						<?php echo get_post_meta( get_the_ID(), 'rp_proj_tools', true ); ?>
					</ul>
				
				</div>
				<div class="right">
					<?php the_post_thumbnail(); ?>
				</div>

			</article>

		</main><!-- /.main -->
	</div><!-- /.content -->
</div><!-- /.wrap -->

<div class="wrap container project-secondary" role="document">
	<div class="content row">
        <div class="main">
        	<h2>Details of this Project</h2>
			<?php the_content(); ?>

			<?php 
				if (get_post_meta( get_the_ID(), 'rp_proj_link', true )){
					echo '<a href="' . get_post_meta( get_the_ID(), 'rp_proj_link', true ) .'" class="site-link" target="_blank">Visit the Site</a>';
				} 
			?>
        </div>
    </div>
</div>

<div class="wrap container project-footer" role="document">
	<div class="content row">
        <div class="main">
        	<div class="learn-more">
        		<span>Interested in learning more?</span>
        		<a href="#">Contact Me</a>
        	</div>

        	<div class="secondary-image">
        		<?php
				    $iid = get_post_meta( get_the_ID(), 'rp_proj__secondary_image_id', true );
				    $src = get_post_meta( get_the_ID(), 'rp_proj__secondary_image', true );
				    $srcset = wp_get_attachment_image_srcset( $iid, 'full');
				    $sizes = wp_get_attachment_image_sizes( $iid, 'full' );
				    $alt = get_post_meta( $iid, '_wp_attachment_image_alt', true);
				  ?>

				  <img src="<?php echo esc_url($src); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" alt="<?php echo esc_attr($alt); ?>">

        	</div>
        </div>
    </div>
</div>








