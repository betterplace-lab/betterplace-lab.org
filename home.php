<?php defined('ABSPATH') or die();
/**
 * Description: Default Index template to display loop of blog posts
 */
?>

<?php get_header(); ?>
    <div id="lab-nav" class="lab-nav">                           
        <nav>                                   
            <div class="lab-navigation-wrapper">
            <ul class="nav-extension-home">
                <li class="lab-log">
                <i class="icon-lab-logo"></i>
                <?php get_sidebar('topcallout'); ?>
                </li>
                <li class="search"><?php  get_search_form() ?></li>
            </ul>
                <?php
                wp_nav_menu(array(
                    'menu' => '',
                    'theme_location' => 'main-menu',
                    'depth' => 2,
                    'container' => false,
                    'menu_class' => 'home-nav',
                    'fallback_cb' => 'wp_page_menu',
                    'walker' => new wp_bootstrap_navwalker())
                );
                ?>
            </div>
        </nav>
</div>    
<a href="#home-content" class="lab-nav-trigger"><i class="icon-arrow"></i></a>

<div class="content" id="home-content">
<div class="new">
    <div class="container">
        <div class="row">
            <h1>
            <?php _e("What we're working on", 'bicbswp'); ?>
              
            </h1>
        </div>
    </div>
</div>
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
                get_template_part('content-home', get_post_format());
            endwhile;
        endif;
        if (function_exists("pagination")) {pagination($additional_loop->max_num_pages); }
        ?>

</div>
<?php get_sidebar('home'); ?>
<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>   