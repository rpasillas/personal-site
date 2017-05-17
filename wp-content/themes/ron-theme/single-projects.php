<div class="wrap container" role="document">
	<div class="content row">
        <main class="main">

			<article <?php post_class(); ?>>
			
				<h1><?php the_title(); ?></h1>

				<?php 
					/**
					 * CATEGORIES : TAXONOMY
					 *
					 **/
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

				    if( get_post_meta( get_the_ID(), 'rp_proj_agency', true ) ){
				    	$credit_line = 'via ';
				    }else{
				    	$credit_line = 'for ';
				    }

				    /**
					 * CLIENTS : TAXONOMY
					 *
					 **/
				    $clients = wp_get_object_terms(get_the_ID(), ['taxonomy' => 'client_tax' ]);
				    $client = $clients[0]->name;

				    /**
					 * TOOLS : TAXONOMY
					 *
					 **/
				    $tools_array = wp_get_object_terms(get_the_ID(), ['taxonomy' => 'tools_tax' ]);

				    $count = count( $tools_array );
				    $tools = '';

				    for( $i=0; $i<=$count; ++$i ){
				        $tools .=  '<li>' . $tools_array[$i]->name . '</li>';        
				    }

				    /**
					 * PROJECT TYPES : TAXONOMY
					 *
					 **/
				    $proj_type_array = wp_get_object_terms(get_the_ID(), ['taxonomy' => 'project_type_tax' ]);

				    $count = count( $proj_type_array );
				    $proj_type = '';

				    for( $i=0; $i<=$count; ++$i ){
				        if( $i == 0 ){
					        $proj_type .= $proj_type_array[$i]->name;        
					      }else if( $i == $count - 1 ){
					        $proj_type .= ' and ' . $proj_type_array[$i]->name;
					      }      
				    }
			  	?>
				
				<p><?php echo get_post_meta( get_the_ID(), 'rp_proj_role', true ); ?> on a <?php echo $proj_type; ?> project <?php echo $credit_line . ' ' . $client; ?>.</p>
				
				<h3>At a Glance</h3>
				<ul class="check-list">
					<?php echo $tools; ?>
				</ul>
								

			</article>

		</main><!-- /.main -->
	</div><!-- /.content -->
</div><!-- /.wrap -->

<div class="wrap container project-secondary" role="document" style="background-image: url('<?php echo get_post_meta( get_the_ID(), 'rp_proj_bg_image', true ); ?>');">
	<div class="content row">
        <div class="main">
        	<h2>Details of this Project</h2>
			<?php the_content(); ?>

			<?php 
				if (get_post_meta( get_the_ID(), 'rp_proj_link', true )){
					echo '<a href="' . get_post_meta( get_the_ID(), 'rp_proj_link', true ) .'" class="site-link" target="_blank">Visit the Site</a>';
				} 
			?>

			<div class="project-images">
				<?php
				    $iid = get_post_meta( get_the_ID(), 'rp_proj_laptop_image_id', true );
				    $src = get_post_meta( get_the_ID(), 'rp_proj_laptop_image', true );
				    $srcset = wp_get_attachment_image_srcset( $iid, 'full');
				    $sizes = wp_get_attachment_image_sizes( $iid, 'full' );
				    $alt = (get_post_meta( $iid, '_wp_attachment_image_alt', true)) ? get_post_meta( $iid, '_wp_attachment_image_alt', true) : 'Project Image';
				?>
				  
				<div class="project-image image-laptop"><img src="<?php echo esc_url($src); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" alt="<?php echo esc_attr($alt); ?>"></div>
				
				<?php
				    $iid = get_post_meta( get_the_ID(), 'rp_proj_tablet_image_id', true );
				    $src = get_post_meta( get_the_ID(), 'rp_proj_tablet_image', true );
				    $srcset = wp_get_attachment_image_srcset( $iid, 'full');
				    $sizes = wp_get_attachment_image_sizes( $iid, 'full' );
				    $alt = (get_post_meta( $iid, '_wp_attachment_image_alt', true)) ? get_post_meta( $iid, '_wp_attachment_image_alt', true) : 'Project Image';
				?>
				  
				<div class="project-image image-tablet"><img src="<?php echo esc_url($src); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" alt="<?php echo esc_attr($alt); ?>"></div>

				<?php
				    $iid = get_post_meta( get_the_ID(), 'rp_proj_phone_image_id', true );
				    $src = get_post_meta( get_the_ID(), 'rp_proj_phone_image', true );
				    $srcset = wp_get_attachment_image_srcset( $iid, 'full');
				    $sizes = wp_get_attachment_image_sizes( $iid, 'full' );
				    $alt = (get_post_meta( $iid, '_wp_attachment_image_alt', true)) ? get_post_meta( $iid, '_wp_attachment_image_alt', true) : 'Project Image';
				?>
				  
				<div class="project-image image-phone"><img src="<?php echo esc_url($src); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" alt="<?php echo esc_attr($alt); ?>"></div>

			</div>
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
        </div>
    </div>
</div>








