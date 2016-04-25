<?php defined('ABSPATH') or die();
/**
 * Default Post Template
 * Description: Post template Single
 */
get_header(); ?>
           <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
           	<?php if (in_category( array(1289,3) )) { ?>

           		<?php get_template_part('single-blog'); ?>
           	 <?php } ?> 
           	<?php if (in_category( array(1291,1309,1298) )) { ?>
           		<?php get_template_part('single-labor'); ?>
           	 <?php } ?> 	           
    <?php endwhile;
    endif; 
            ?>


   
<?php get_sidebar('page'); ?>
<?php get_sidebar('footer'); ?>

<?php get_footer(); ?>