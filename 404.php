<?php defined('ABSPATH') or die();

/*
* Display 404 page
 */
?>
<?php get_header(); ?>
<div class="content"> 
        <div class="container">      
           <div class="row">         
              <div class="col-xs-12">                    
                     <h1><?php _e('This is Embarrassing', 'bicbswp'); ?></h1>
                      <p class="lead">
                      <?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.',
                          'bicbswp' ); ?>
                      </p>
                     <div class="content-form">
                         <?php get_search_form(); ?>
                     </div> 
              </div>
          </div> 
          <div class="row">
            <div class="col-sm-4">
              <div class="padding-box offer">
                <h2><?php _e('All Pages', 'bicbswp'); ?></h2>
                 <?php wp_page_menu(); ?> 
              </div>
            </div>
            <div class="col-sm-4">
              <div class="padding-box offer">
                 <?php the_widget('WP_Widget_Recent_Posts'); ?>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="padding-box offer">
                 <h2><?php _e('Categories', 'bicbswp'); ?></h2>
                 <ul>
                     <?php wp_list_categories(
                     array(
                         'orderby' => 'count',
                         'order' => 'DESC',
                         'show_count' => 1,
                         'title_li' => '',
                         'number' => 100
                     )
                 ); ?>
                 </ul>
              </div>
            </div>
          </div> 
      </div>       
</div>
<?php get_sidebar('page'); ?>
<?php get_sidebar('footer'); ?>

<?php get_footer(); ?>