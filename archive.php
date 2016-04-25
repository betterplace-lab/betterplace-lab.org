<?php defined('ABSPATH') or die();
/**
 * The template for displaying Archive pages.
 * 
 */
?>
<?php get_header(); ?>
  <div class="content">
    <?php
        if (have_posts()) : while (have_posts()) : the_post();
                get_template_part('content', get_post_format());
            endwhile;
        endif;
        if (function_exists("pagination")) {pagination($additional_loop->max_num_pages); }        
    ?>
    </div>           

            
<?php get_sidebar('page'); ?>
<?php get_sidebar('footer'); ?>

<?php get_footer(); ?>
