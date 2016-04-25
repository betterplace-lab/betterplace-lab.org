<?php defined('ABSPATH') or die();
/**
 *
 */
?>
<div class="sidebar">
<div class="container">
	<div class="row">
	    <div class="two-cols-offset">
		        <?php
		        if (function_exists('dynamic_sidebar')) {
		            dynamic_sidebar("sidebar-newsletter");
		        }
		        ?>
	    </div>
	    <div class="two-cols">
	        <?php
	        if (function_exists('dynamic_sidebar')) {
	            dynamic_sidebar("sidebar-page");
	        }
	        ?>
	    </div>
    </div>
</div>   
</div>