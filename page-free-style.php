<?php defined('ABSPATH') or die();
/**
 * Template Name: Page Free Style
 * Description: Page template
 */
?>
<?php get_header(); ?> 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
<div class="content" id="post-<?php the_ID(); ?>">
        <?php echo the_content(); ?>
</div>
<?php endwhile;
    endif; ?>   

<?php get_sidebar('page'); ?>
<?php get_sidebar('footer'); ?>

<?php get_footer(); ?>
