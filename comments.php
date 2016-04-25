<?php defined('ABSPATH') or die();
/**
 * Template for displaying Comments.
 *
 * Display comments and comment form. 
 * The display of comments is handled by a callback to bootstrapwp_comment() in the functions.php file.
 */

if (post_password_required()) {
    return;
} ?>
<div id="comments" class="comments-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-offset-1"> 
                <?php comment_form(array('comment_notes_after' => '', 'comment_notes_before' => '', 'label_submit' => 'Abschicken' )); ?> 
                
            </div>
        </div>
    </div>

    <div <?php post_class(); ?>> 
         <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-offset-1">      
                    <?php if (have_comments()) : ?>
                        <ul class="comment-list">
                            <?php wp_list_comments(array('callback' => 'bootstrapwp_comment')); ?>
                        </ul>
                        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>    
                            <nav id="comment-nav-below" class="navigation" role="navigation">    
                                <div class="nav-previous">
                                    <?php previous_comments_link( _e('&larr; Older Comments', 'bicbswp')); ?>
                                </div>                
                                <div class="nav-next">
                                    <?php next_comments_link(_e('Newer Comments &rarr;', 'bicbswp')); ?>
                                </div>                
                            </nav>    
                        <?php endif;  ?>         

                    <?php elseif (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
                    
                            <p class="nocomments"><?php _e('Comments are closed.', 'bicbswp'); ?></p>                            
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm10 col-md-offset-1">
                    <?php echo get_related_posts(5); ?>
                </div>
            </div>
        </div>
    </div>
</div>