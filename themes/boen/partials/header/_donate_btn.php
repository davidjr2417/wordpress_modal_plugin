<?php // get donation page url -- this is set in the theme customizer settings
	$donate_url = '';
	if (get_theme_mod( 'donate-page' )) {
	  $donate_url = get_the_permalink(get_theme_mod( 'donate-page' ));
	} else {
	  $donate_url =get_theme_mod( 'donate-page-url' );
	}
?>

<a href="<?php echo $donate_url ?>" role="button" class="button--red--donate">Donate</a>