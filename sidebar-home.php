<?php defined('ABSPATH') or die();
/**
 * The Sidebar for Home. SIdebar can be filled in the widget area. 
 */
?>
<div class="sidebar sidebar-home">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 home-left">        
                <?php
                if (function_exists('dynamic_sidebar')) {
                    dynamic_sidebar("home-left");
                }
                ?>
            </div>
            <div class="col-sm-6 home-right">
                <?php
                if (function_exists('dynamic_sidebar')) {
                    dynamic_sidebar("home-right");
                }
                ?>
            </div>
        </div>
    </div>
</div>