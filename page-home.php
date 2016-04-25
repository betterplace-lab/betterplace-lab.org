<?php defined('ABSPATH') or die();
/**
 * Template Name: Home Page
 */
?>
<?php get_header(); ?>
<main>
    <div class="content">
    <div class="new">
        <div class="container">
            <div class="row">
                <h1>Aktuelles im lab</h1>
            </div>
        </div>
    </div>       
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>                         
            <article class="post" id="post-<?php the_ID(); ?>">
                <?php echo the_content(); ?>
            </article>
    <?php endwhile;
        endif; ?>   
  </div>
<?php get_sidebar('page'); ?>
<?php get_sidebar('footer'); ?>
</main> 
    <div id="cd-nav" class="cd-nav">                           
        <nav>                                   
            <div class="cd-navigation-wrapper">
            <ul class="nav-extension-home">
                <li class="lab-log">
                <i class="icon-lab-logo"></i>
                <div class="top-callout">
                <!-- Top Callout from Theme Options -->    
                    <?php
                        $options = get_option('bicbswp_theme_options');

                        if ($options['top-callout'] != '') {
                            echo ($options['top-callout']);
                        }
                    ?>
                </div>
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
<a href="#cd-nav" class="cd-nav-trigger"><i class="icon-arrow"></i></a>

<?php get_footer(); ?>