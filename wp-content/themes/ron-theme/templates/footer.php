<?php if( !is_singular('projects') ){ ?> 
<section class="footer-form">
	<div class="container">
		<div class="content">
			<h1>Let's Talk About Your Project</h1>
			<?php echo do_shortcode('[contact-form-7 id="82" title="Contact"]'); ?>
		</div>
	</div>
</section>
<?php } ?>

<footer class="content-info">
  <div class="container">
  	<div class="content">
	    <div class="col-1"><?php dynamic_sidebar('sidebar-footer-1'); ?></div>
	    
	    <div class="col-2"><?php dynamic_sidebar('sidebar-footer-3'); ?></div>
  	</div>
  	<div class="content">
  		<div class="col-full">Located in Temecula, CA | &copy; <?php echo date('Y'); ?> Ron Pasillas</div>
  	</div>
  </div>
</footer>
</div>
