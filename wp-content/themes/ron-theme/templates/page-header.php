<?php use Roots\Sage\Titles; ?>

<div class="page-header">
  <h1><?= Titles\title(); ?></h1>

	<?php if( is_post_type_archive('projects') ) { ?>
		<p>Works that I played a signicant role in. If you like what you see reach out to see if we can make your project happen.</p>
	<?php } ?>

</div>
