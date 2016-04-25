<?php
defined('ABSPATH') or die();
/**
 * Default Page Header
 */
?>
<!DOCTYPE html>
<!-- HTML5 -->
<html <?php language_attributes(); ?>>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">        
        <title><?php wp_title(); ?> <?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="viewport" content="width=device-width"><?php
        // Favicon
        $options = get_option('bicbswp_theme_options');
        if ($options['favicon'] != '') {
            echo '<link type="image/x-icon" href="' . $options['favicon'] . '" rel="Shortcut Icon">';
        }
        ?>        
        <?php
        $options = get_option('bicbswp_theme_options');

        if ($options['analytics'] != '') {

            echo ($options['analytics']);
        }
        ?>
    <?php wp_head(); ?>
    </head>
    
    <body <?php body_class(); ?>>        
        <header>
            <div id="top-header">
                <div class="container-md">
                    <div class="row">
                    <?php get_sidebar('header'); ?> 
                        <div class="brand">
                        <a href="<?php bloginfo('url'); ?>"><i class="icon-lab-logo_horizontal"></i></a>
                        </div> 

                        <ul class="header-menu-nav">                        
                        <li class="dropdown">
                             <a class="dropdown-toggle hidden-xs" data-toggle="dropdown" href="#"><?php _e('More from the betterplace lab', 'bicbswp'); ?><i class="icon-arrow"></i></a> 
                             <button type="button" class="navbar-toggle visible-xs" data-toggle="collapse" data-target=".dropdown-menu">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="burger"></span>
                                    <span class="burger"></span>
                                    <span class="burger"></span>
                                </button> 
                            <ul class="dropdown-menu dropdown-input-nav">
                                 <li><?php  get_search_form() ?></li>
                            </ul>                        
                            <?php
                            if (has_nav_menu('header-menu')) {
                                wp_nav_menu(array(
                                    'menu' => '',
                                    'theme_location' => 'header-menu',
                                    'depth' => 1,
                                    'container' => false,
                                    'menu_class' => 'dropdown-menu dropdown-menu-right dropdown-text-nav',
                                    'fallback_cb' => 'wp_page_menu',                           
                                    'walker' => new wp_bootstrap_navwalker())
                                );
                            }
                            ?>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
            <span class="color-stripe visible-xs"><i></i><i></i><i></i><i></i><i></i><i></i><i></i></span>
            <?php if (!is_front_page() || !is_home() && has_nav_menu('main-menu')) { ?>
                <div class="top-main-menu">  
                        <nav class="navbar">
                            <div class="collapse navbar-collapse navbar-ex1-collapse">                            
                                <div class="container-md">
                                <div class="nav-extension">
                                    <div><a href="<?php bloginfo('url'); ?>">Home</a></div>
                                    <div>
                                       <?php  get_search_form() ?>
                                    </div>
                                </div>
                                    <?php
                                    wp_nav_menu(array(
                                        'menu' => '',
                                        'theme_location' => 'main-menu',
                                        'depth' => 2,
                                        'container' => false,
                                        'menu_class' => 'nav navbar-nav',
                                        'fallback_cb' => 'wp_page_menu',
                                        'walker' => new wp_bootstrap_navwalker())
                                    );
                                    ?>
                                </div>
                            </div>
                        </nav>
                </div>
          <?php } ?>                                
        </header>
