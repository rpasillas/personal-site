<?php if( !is_singular('projects') ){ ?> 
<section class="footer-form">
	<div class="container">
		<div class="content">
			<h1>Send me a Message</h1>
			<?php echo do_shortcode('[contact-form-7 id="82" title="Contact"]'); ?>
		</div>
	</div>
</section>
<?php } ?>

<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>
