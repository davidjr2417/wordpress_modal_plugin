</div>
<!-- /container -->

<?php get_template_part( 'partials/footer/_modal'); ?>

<div class="container-fluid footer--section">
	<div class="container">
		<div class="row inverse" id="footer">
  		
  		<!-- FOOTER MENU-->
<footer class="row">
	<?php wp_nav_menu( array( 'menu' => 'footer-menu', 'container_class' => 'footer-menu' ) ); ?>
	<?php wp_nav_menu( array( 'menu' => 'site-info-menu', 'container_class' => 'site-info-menu' ) ); ?>
	<span class="footer-address"><?php echo get_theme_mod( 'org_address' ) ?></span>

</footer>

      		
      		<!-- <div class="col-sm-4 footer__social-media-item">
        		Facebook Placeholder
			</div>

			<div class="col-sm-4 footer__social-media-item">
				Tweets Placeholder
			</div>

			<div class="col-sm-4 footer__social-media-item">
				Videos Placeholder
			</div> -->

		</div><!-- /.row -->	
	</div><!-- /.container -->
</div><!-- /.container-fluid -->
	

<?php wp_footer(); ?>

</body>
</html>
