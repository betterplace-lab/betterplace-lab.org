<?php defined('ABSPATH') or die();
/**
 * Template Name: Default Page
 * Description: Page template
 */
?>
<?php get_header(); ?> 
<div class="header-box header-img">
    <div class="container">
        <div class="row">
		<?php if (has_post_thumbnail()) {the_post_thumbnail('full');} ?>
		</div>
	</div>
</div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
<article>
	<div class="content" id="post-<?php the_ID(); ?>">
		<div class="container">
	        <div class="row">
		        <div class="col-md-10 col-md-offset-1">
					<h1><?php the_title(); ?></h1>
			        <?php echo the_content(); ?>
			    </div>
			</div>
		</div>
	</div>
</article>
<?php endwhile;
    endif; ?>   

<?php get_sidebar('page'); ?>
<?php get_sidebar('footer'); ?>

<?php get_footer(); ?>