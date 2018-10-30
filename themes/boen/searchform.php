<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text hidden"><?php _e("Search for:","boen"); ?></span>
		<input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:" />
	</label>
	<input type="submit" class="search-submit hidden" value="Search" />
</form>