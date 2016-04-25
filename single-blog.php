<?php defined('ABSPATH') or die();
/**
 * The template for displaying content in the single.php.
 * 
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
<div class="container">        
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">  
        <div class="row">
          <div class="col-sm-6 prev-post"><?php previous_post_link('<span>'.' %link'.'</span>', '%title', TRUE); ?></div>
          <div class="col-sm-6 next-post"><?php next_post_link('<span>'.' %link'.'</span>', '%title', TRUE); ?></div>
        </div>       
          <h1 class="post-hl"><?php the_title(); ?></h1>
          <aside class="entry-details">
            <p class="meta"><?php echo bootstrapwp_posted_on(); ?> <?php edit_post_link(__('Edit', 'bicbswp')); ?>
             </p>
        </aside>
        <section class="post-content"> 
        <figure>
        <?php 
                // only show if option set TODO                
                $options = get_option('bicbswp_theme_options');                
                    if($options['featured_single'] == true ){                                    
             if ( has_post_thumbnail() ) { ?>  
                              <?php $options = get_option('bicbswp_theme_options');                            
                                switch ($options['featured_img_sing_size']) {                                    
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
                                       $thumbnail_size="thumbnail";
                                }
                            ?>
                            <?php the_post_thumbnail($thumbnail_size); ?>  
                       <?php  }  
                    } ?>   
        <figcaption><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></figcaption>
        </figure>
     
      <?php echo the_content();?>
        </section>
        <?php
            // AUTHOR INFO     
        		if ( get_the_author_meta( 'description' ) ) :   ?> 
        		<div class="author-info">      
        					<h3><?php print( __( 'Posted by ', 'bicbswp' )); 
                        the_author_link(); ?> </h3>        					
        				</div>
        <?php endif; ?>        
        <div class="row">
          <div class="col-sm-6 prev-post"><?php previous_post_link('%link', '%title', TRUE); ?></div>
          <div class="col-sm-6 next-post"><?php next_post_link('%link', '%title', TRUE); ?></div>
        </div> 
      </div>
    </div>
  </div>
</article>
<?php comments_template(); ?>
