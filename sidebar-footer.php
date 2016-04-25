<?php defined('ABSPATH') or die();
/**
 * The Sidebar for Footer.
 *
 */
?>
<footer>
    <div class="container">
        <div class="row"> 
            <div class="col-md-offset-1">   
                <div class="row-xs">
                    <div class="col-sm-3 col-xs-6"> 
                        <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar("footer-column-1");
                        }
                        ?>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar("footer-column-2");
                        }
                        ?>
                    </div>
                </div>
                <div class="row-xs">
                    <div class="col-sm-3 col-xs-6">
                        <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar("footer-column-3");
                        }
                        ?>
                    </div>
                     <div class="col-sm-3 col-xs-6">
                          <?php
                        if (function_exists('dynamic_sidebar')) {
                            dynamic_sidebar("footer-column-4");
                        }
                        ?>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</footer>