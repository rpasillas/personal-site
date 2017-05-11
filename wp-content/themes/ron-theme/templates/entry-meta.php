<div class="post-metas">
	<time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
	<span class="bullet-separator">&bull;</span>

	<?php 
		$categories = get_categories();

		$count = count( $categories );

		if( $count ){
			echo '<span class="categories">';
		}
		for( $i=0; $i<=$count; ++$i ){

			//wtf does it return an array of
			// [0], [2]
			if( $categories[$i]->term_id ){

				echo '<a href="' . get_category_link( $categories[$i]->term_id ) . '" class="category">' . $categories[$i]->name . '</a> ';

				// if( $i < $count ){
				// 	echo ' | ';
				// }
			}
		}

		if( $count ){
			echo '</span>';
		}
	?>
</div>