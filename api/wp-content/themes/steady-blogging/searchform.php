<form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url() ); ?>" _lpchecked="1">
	<fieldset>
		<input type="text" name="s" id="s" value="<?php esc_attr_e('Search this site','steady-blogging'); ?>" onblur="<?php esc_attr_e('Search this site','steady-blogging'); ?>" onfocus="<?php esc_attr_e('Search this site','steady-blogging'); ?>" >
		<input type="submit" value="<?php esc_attr_e( 'Search', 'steady-blogging' ); ?>" />
	</fieldset>
</form>