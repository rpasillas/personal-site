<section class="wrap container" role="document">
      <div class="content row">
        <main class="main">

			<?php while (have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			<?php endwhile; ?>

		</main><!-- /.main -->
	</div><!-- /.content -->
</section><!-- /.wrap -->


<section class="wrap container latest-projects" role="document">
	<div class="content row">
		<div class="main">
			<?php 

				$projects = new WP_Query( ['post_type'=>'projects', 'posts_per_page' => 3 ] );
				
				if( $projects->have_posts() ): 

					echo '<h1>Latest Projects</h1>';

					echo '<div class="col-wrap">';

					while( $projects->have_posts() ) : $projects->the_post();

					get_template_part('templates/content', 'projects');

					endwhile;

					echo '</div>';
					
					wp_reset_postdata();
				endif;

			?>
		</div>	
	</div>
</section>

<section class="wrap container latest-posts" role="document">
	<div class="content row">
		<div class="main">
			<?php 

				$posts = new WP_Query( ['posts_per_page' => 3 ] );
				
				if( $posts->have_posts() ): 

					echo '<h1>Latest Posts</h1>';

					echo '<div class="col-wrap">';

					while( $posts->have_posts() ) : $posts->the_post();

					get_template_part('templates/content');

					endwhile;

					echo '</div>';

					wp_reset_postdata();
				endif;

			?>
		</div>	
	</div>
</section>