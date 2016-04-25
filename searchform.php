<?php defined('ABSPATH') or die();
/*
 * The Search Form.
 */
?>
<form action="<?php bloginfo('url'); ?>/" method="GET" id="s">
	        <label class="sr-only" for="search"><?php echo __('Search', 'bicbswp') ?></label>
	        <button type="submit"><i class="icon-search-btn"></i></button>
	        <input type="text" class="form-control" id="search" name="s" oninvalid="this.setCustomValidity('Gib bitte einen Suchbegriff ein! / Please fill out a search term!')" required placeholder="<?php echo __('Search', 'bicbswp') ?>" value="<?php the_search_query(); ?>">
</form>