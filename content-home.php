<?php defined('ABSPATH') or die();
/**
 * The default template for displaying content foreach entry in index.php, archiv.php etc. 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
    <section class="post-content container">
        <div class="row">  
            <div class="col-left">
                <?php 
                        if ( has_post_thumbnail() ) { ?>  
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
                         <?php  } ?>
                 </div> 
                  <div class="col-right">
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                    <aside class="entry-details">                                                
                       <?php                          
                        $options = get_option('bicbswp_theme_options');
                        if ($options['excerpts']) {
                            echo the_excerpt();
                        } else {
                            echo the_content();
                        }
                        ?>  
                   </aside>
                </div> 
        </div>
    </section>
</article>