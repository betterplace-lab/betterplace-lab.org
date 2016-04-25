<?php defined('ABSPATH') or die();
/**
 * The default template for displaying content foreach entry in category labor & blog. 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
    <section class="post-content container">
        <div class="row"> 
              <div class="col-sm-3 col-md-offset-1">
                <?php 
                        if ( has_post_thumbnail() ) { ?>                       
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute('echo=0'); ?>">                            
                            <?php $options = get_option('bicbswp_theme_options');                            
                                switch ($options['featured_img_arch_size']) {                                    
                                   case 1:
                                       $thumbnail_size="thumbnail";
                                       break; 
                                   case 2: 
                                       $thumbnail_size="medium";
                                       break;
                                   case 3:
                                       $thumbnail_size="large";
                                       break; 
                                   default: 
                                       $thumbnail_size="medium";
                                }
                            ?>
                            <?php the_post_thumbnail($thumbnail_size); ?>                            
                        </a>
                         <?php  } ?>
                </div>
              <div class="entry-header col-sm-7">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <aside class="entry-details">      
                      <p class="meta">
                          <?php echo bootstrapwp_posted_on(); ?>
                      </p>                      
                       <?php                          
                        $options = get_option('bicbswp_theme_options');
                        if ($options['excerpts']) {
                            echo the_excerpt();
                        } else {
                            echo the_content('<span class="read-more">Weiterlesen</span>', 'bicbswp');
                        }
                        ?>
                   </aside>
                </div> 
        </div>
    </section>
</article>