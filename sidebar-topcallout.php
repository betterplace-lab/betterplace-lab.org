<?php defined('ABSPATH') or die();
/**
 * The Sidebar for Home. SIdebar can be filled in the widget area. 
 */
?>

<div class="top-callout">        
    <?php
    if (function_exists('dynamic_sidebar')) {
        dynamic_sidebar("topcallout");
    }
    ?>
</div>
