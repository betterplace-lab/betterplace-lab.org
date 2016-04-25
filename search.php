<?php defined('ABSPATH') or die();
/**
 * Description: Search Results
 */
?>

<?php get_header(); ?>
<div class="content"> 
     <?php if (have_posts()) : ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
            <h1><?php printf(__('Searchresults', 'bicbswp'), '<span>' . get_search_query() . '</span>'); ?></h1>
            </div>
        </div>
        </div>
        <?php else: ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
            <h1><?php _e('No Results Found', 'bicbswp'); ?></h1>
         </div>
        </div>
        </div>
        <?php endif; ?>                
       <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', get_post_format()); ?>
        <?php
        endwhile; 
        else: ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
            <section class="post-content container">
                <div class="row">
                <p class="lead">
                    <?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps you should try again with a different search term.', 'bicbswp'); ?>
                </p>
                 <div class="content-form">
                    <?php get_search_form(); ?>
                </div>
                
                </div>
                </section>
        </article>      
    <?php endif; ?>
    <?php if (function_exists("pagination")) {pagination($additional_loop->max_num_pages); }  ?>
</div>

<?php get_sidebar('page'); ?>
<?php get_sidebar('footer'); ?>

<?php get_footer(); ?>

