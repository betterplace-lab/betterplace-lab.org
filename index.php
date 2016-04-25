<?php defined('ABSPATH') or die();
/**
 * Description: Default Index template to display loop of blog posts
 */
?>
<?php get_header(); ?>
<div class="container main"> 
    <div class="row main-content">
        <div class="col-lg-9 col-md-9 col-sm-9 col-9">            
            <div class="content">
                <?php
                if (have_posts()) : while (have_posts()) : the_post();

                        get_template_part('content', get_post_format());

                    endwhile;
                endif;
                if (function_exists("pagination")) {pagination($additional_loop->max_num_pages); }
                ?>
            </div>
        </div>

     </div>
    </div>
<?php
            if ((is_front_page()) && (is_paged() == false)) {
                $options = get_option('bicbswp_theme_options');
                if ($options['front_page'] != '') {
                    $page = get_post($options['front_page']);
                    echo apply_filters( 'the_content', get_post_field('post_content', $page) );                    
                }
                ?>
                <div class="container marketing">
                    <?php get_sidebar('home'); ?>
                </div>                
            <?php } ?>
<?php get_sidebar('page'); ?>
<?php get_sidebar('footer'); ?>

<?php get_footer(); ?>
