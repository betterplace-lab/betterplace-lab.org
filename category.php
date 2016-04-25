<?php defined('ABSPATH') or die();
/**
 * The template for displaying diffrent categories (1:lab, 25: lab-en, 14: home, 5 blog, 20: blog-en)
 * 
 */
?>


<?php get_header(); ?>
	           
<?php if (in_category( array(1289,3) )) { ?>
  <div class="content">
    <?php
        if (have_posts()) : while (have_posts()) : the_post();
                get_template_part('content', get_post_format());
            endwhile;
        endif;
        if (function_exists("pagination")) {pagination($additional_loop->max_num_pages); }        
    ?>
    </div>  
<?php } elseif (in_category( array(1291,1309) )) { ?>
<div class="header-box header-txt">
    <div class="container">
            <h1> <?php single_cat_title(); ?></h1>
            <?php                       
            $category_description = category_description();
            if ($category_description) {
                echo apply_filters(
                        'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>'
                );
            }?>
    </div>
</div>
<div class="content">                
<?php
    if (have_posts()) : while (have_posts()) : the_post();
            get_template_part('content-labor', get_post_format());
        endwhile;
    endif;
    if (function_exists("pagination")) {pagination($additional_loop->max_num_pages); }
?>
</div>  

<?php } ?>
            
<?php get_sidebar('page'); ?>
<?php get_sidebar('footer'); ?>