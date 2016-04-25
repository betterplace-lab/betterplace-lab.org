<?php defined('ABSPATH') or die();
/**
 * BIC Bootstrap Wordpress Theme Functions
 * Original from BootstrapWP
 * @author original by Rachel Baker, modified by Nina Taberski-Besserdich, modified by Eva Gothein
 * @package WordPress
 * @subpackage LAB Theme
 */

/**
 * Load Theme Options 
 *
 */
require_once ( get_template_directory() . '/includes/theme-options.php' );

/**
 * Load Shortcodes 
 *
 */
require_once ( get_template_directory() . '/includes/shortcodes.php' );

/**
 * Setup Theme Functions
 *
 */
if (!function_exists('bicbswp_theme_setup')):

    function bicbswp_theme_setup() {

        load_theme_textdomain('bicbswp', get_template_directory() . '/lang');

        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array('aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat'));

        register_nav_menus(array(
            'main-menu' => __('Main Menu', 'bicbswp'),
            'footer-menu-deals' => __('Footer Menu Deals', 'bicbswp'),
            'footer-menu-terms' => __('Footer Menu Terms', 'bicbswp'),
            'footer-menu-more' => __('Footer Menu More', 'bicbswp'),
            'header-menu' => __('Header Menu', 'bicbswp'),
        ));

        // Register Custom Navigation Walker
        require_once ( get_template_directory() .'/includes/menu-walker.php');
    }

endif;
add_action('after_setup_theme', 'bicbswp_theme_setup');


/**
 * Add Categorie to Body Class 
 *
 */
add_filter('body_class','add_category_to_single');
function add_category_to_single($classes, $class) {
    if (is_single() ) {
        global $post;
        foreach((get_the_category($post->ID)) as $category) {
            // add category slug to the $classes array
            $classes[] = $category->category_nicename;
        }
    }
    // return the $classes array
    return $classes;
}
/**
 * Init multi-post-thumbnails Plugin
 *
 */
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => 'Secondary Image',
            'id' => 'secondary-image',
            'post_type' => 'post'
        )
    );
}

/**
 * Delete excerpts from singel page 
 *
 */
/*add_filter( 'the_content', 'mfields_trim_teaser' );
if( !function_exists( 'mfields_trim_teaser' ) ) {
    function mfields_trim_teaser( $content ) {
        if ( is_single() && preg_match( '/<span id="more-(.*?)?">/', $content, $matches ) ) {
            $parts = explode( $matches[0], $content, 2 );
            if( isset( $parts[1] ) && !empty( $parts[1]  ) )
                $content = $parts[1];
        }
        return $content;
    }
}*/


/**
 * Define post thumbnail size.
 * Add two additional image sizes.
 *
 */
function bootstrapwp_images() {

    set_post_thumbnail_size(180, 180); 
    add_image_size('bootstrap-small', 300, 200); 
    add_image_size('bootstrap-medium', 400, 320); 
}

/**
 * Load CSS styles for theme.
 *
 */
function bootstrapwp_styles_loader() {

      wp_enqueue_style('lab-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'bootstrapwp_styles_loader');

/**
 * Load jQuery latest for theme from Google repository and avoid conflicts.
 *
 */
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-latest.min.js", false, null);
   wp_enqueue_script('jquery');
}


/**
 * Load JavaScript and jQuery files for theme.
 *
 */
function bootstrapwp_scripts_loader() {
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
      wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/library/js/lab-theme.js', array('jquery'), '1.0', true);
   
}
add_action('wp_enqueue_scripts', 'bootstrapwp_scripts_loader');



/**
 * Remove integrated gallery styles in the content area of standard gallery shortcode.  
 * style in css. 
 */
 
add_filter('gallery_style', create_function('$a', 'return "<div class=\'gallery\'>";'));




/**
 * Define theme's widget areas.
 *
 */
function bootstrapwp_widgets_init() {
    

    register_sidebar(
            array(
                'name' => __('Sidebar Links', 'bicbswp'),
                'id' => 'sidebar-newsletter',
                'before_widget' => '<aside><div id="%1$s" class="widget %2$s">',
                'after_widget' => "</div></aside>",
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
    );
    
    register_sidebar(
            array(
                'name' => __('Sidebar Rechts', 'bicbswp'),
                'id' => 'sidebar-page',
                'before_widget' => '<aside><div id="%1$s" class="widget %2$s">',
                'after_widget' => "</div></aside>",
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            )
    );
     
    register_sidebar(
            array(
                'name' => __('Home Left', 'bicbswp'),
                'id' => 'home-left',
                'description' => __('Left textbox on homepage', 'bicbswp'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2>',
                'after_title' => '</h2>'
            )
    );

    register_sidebar(
            array(
                'name' => __('Home Right', 'bicbswp'),
                'id' => 'home-right',
                'description' => __('Right textbox on homepage', 'bicbswp'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2>',
                'after_title' => '</h2>'
            )
    ); 


    register_sidebar(
            array(
                'name' => __('Footer Column 1', 'bicbswp'),
                'id' => 'footer-column-1',
                'description' => __('Footer Column 1', 'bicbswp'),
                'before_widget' => '<aside><div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div></aside>',
                'before_title' => '<h4>',
                'after_title' => '</h4>'
            )
    );


    register_sidebar(
            array(
                'name' => __('Footer Column 2', 'bicbswp'),
                'id' => 'footer-column-2',
                'description' => __('Footer Column 2', 'bicbswp'),
                'before_widget' => '<aside><div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div></aside>',
                'before_title' => '<h4>',
                'after_title' => '</h4>'
            )
    );


    register_sidebar(
            array(
                'name' => __('Footer Column 3', 'bicbswp'),
                'id' => 'footer-column-3',
                'description' => __('Footer Column 3', 'bicbswp'),
                'before_widget' => '<aside><div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div></aside>',
                'before_title' => '<h4>',
                'after_title' => '</h4>'
            )
    );
    
        register_sidebar(
            array(
                'name' => __('Footer Column 4', 'bicbswp'),
                'id' => 'footer-column-4',
                'description' => __('Footer Column 4', 'bicbswp'),
                'before_widget' => '<aside><div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div></aside>',
                'before_title' => '<h4>',
                'after_title' => '</h4>'
            )
    );
        
        
        
    // header widget sidebar
    register_sidebar(
            array(
                'name' => __('Header Widget Area', 'bicbswp'),
                'id' => 'header-widget-area',
                'description' => __('Header Widget Area', 'bicbswp'),
                'before_widget' => ' <span id="%1$s" class="widget %2$s">',
                'after_widget' => '</span>',
                'before_title' => '<h4>',
                'after_title' => '</h4>'
            )
    );

    // Blog Slogan
    register_sidebar(
            array(
                'name' => __('Blog Slogan', 'bicbswp'),
                'id' => 'topcallout',
                'description' => __('Blog Slogan', 'bicbswp'),
                'before_widget' => ' <span id="%1$s" class="widget %2$s">',
                'after_widget' => '</span>',
                'before_title' => '<h4>',
                'after_title' => '</h4>'
            )
    );
        
}

add_action('init', 'bootstrapwp_widgets_init');


/* Replaces the excerpt "more" text by a link */
function new_excerpt_more( $more ) {    
    return ' ... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'.__('Read More', 'bicbswp').'</a>';        
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


/* prevent scrolling when using more-tag */
function remove_more_link_scroll( $link ) {        
    
    $link = preg_replace( '|#more-[0-9]+|', '', $link );        return $link;
    
} 
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );


/* 
* Display diffrent excerpt length for category labor und home
*/
function abc_excerpt_length($length) {
  if (is_home()) {
    return 40;
  }
  if (in_category( array(1291,1309) )) {
    return 100;
  }
  return 40;
} 
add_filter('excerpt_length', 'abc_excerpt_length');


/**
 * different post number on home page & categories
 *
 */
function lab_post_number( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
    return;
    if ( is_home() || is_category(1291)  || is_category(1309)) {
    $query->set( 'posts_per_page', 50 );
    return;
    }
    if (is_search()) {
    $query->set( 'posts_per_page', 10 );
    return;
    }
}
add_action( 'pre_get_posts', 'lab_post_number', 1 );


/**
* show only posts from category id 14 on homepage
*/
function lab_include_category_homepage( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', '1298,1325' );
    }
}
add_action( 'pre_get_posts', 'lab_include_category_homepage' );

/**
* Pagination
*/
function pagination($pages = '', $range = 4){
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         { $pages = 1; }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagi\"><nav><ul class=\"pagination\">";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><span class=\"current\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive \">".$i."</a></li>";
             }
         }
          
         if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\">&rsaquo;</a></li>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
         echo "</ul></nav></div>\n";
     }
}

/**
 * Display template for comments and pingbacks.
 *
 */
if (!function_exists('bootstrapwp_comment')) :
    function bootstrapwp_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                ?>
                <li class="comment media" id="comment-<?php comment_ID(); ?>">
                    <div class="media-body">
                        <p>
                <?php _e('Pingback:', 'bicbswp'); ?> <?php comment_author_link(); ?>
                        </p>
                    </div>
                            <?php
                            break;
                        default :
                            // Proceed with normal comments.
                            global $post;
                            ?>

                <li class="comment media" id="li-comment-<?php comment_ID(); ?>">
                    <div class="media-body">
                    <p class="meta">
                                <?php
                                printf('<span class="fn">%1$s %2$s</span>', get_comment_author_link(),
                                        // If current post author is also comment author, make it known visually.
                                        ($comment->user_id === $post->post_author) ? '<span class="label"> ' . __( ) . '</span> ' : '');
                                ?>

                        <?php
                        printf('| <time datetime="%2$s">%3$s</time>', esc_url(get_comment_link($comment->comment_ID)), get_comment_time('c'), sprintf(
                                        __('%1$s', 'bicbswp'), get_comment_date(), get_comment_time()
                                )
                        );
                        ?>
                        </p>
                        

                            <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php
                    _e(
                            'Your comment is awaiting moderation.', 'bicbswp'
                    );
                    ?></p>
                            <?php endif; ?>

                        <?php comment_text(); ?>                        
                        <p class="reply">
                            <?php
                            comment_reply_link(array_merge($args, array(
                                'reply_text' => __('Reply <span>&darr;</span>', 'bicbswp'),
                                'depth' => $depth,
                                'max_depth' => $args['max_depth']
                                            )
                            ));
                            ?>
                        </p>
                    </div>
                <?php
                break;
        endswitch;
    }
endif;

/**
 * Customize Comment Form
 *
 */
function lab_fields($fields) {

$fields['author'] = '<p class="comment-form-author">' . '<label for="author" class="sr-only">' . __( 'Name*' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="author" name="author" placeholder="'. __( 'Name*' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' aria-required="true" required="required" /></p>';
                    
$fields['email'] = '<p class="comment-form-email"><label for="email" class="sr-only">' . __( 'Email*' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="email" name="email"  placeholder="'. __( 'Email*' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' aria-required="true" required="required" /></p><p class="text-right">*Pflichtfeld</p>';
                    
unset($fields['url']);
return $fields;
}
add_filter('comment_form_default_fields','lab_fields');
/**
 * Customize Comment Textarea
 *
 */
function lab_textarea($arg) {
    $arg['comment_field'] = '<p class="comment-form-comment"><label for="comment" class="sr-only">' . __( 'Kommentar' ) . '</label><textarea id="comment" name="comment"  placeholder="'. __( '*' ) . '" rows="8" aria-required="true" required="required"></textarea></p>';
    return $arg;
}

add_filter('comment_form_defaults', 'lab_textarea');




/**
 * Display template for post meta information.
 *
 */
if (!function_exists('bootstrapwp_posted_on')) :

    function bootstrapwp_posted_on() {    
    
	$options = get_option('bicbswp_theme_options');
	
        if($options['meta_data'] == true ){        
            printf(__('<time class="entry-date" datetime="%3$s">%4$s</time><span class="byline"> <span class="sep"> | '. __( 'from:', 'bicbswp' ) .' </span> <span class="author vcard">%7$s</span></span>', 'bicbswp'), esc_url(get_permalink()), esc_attr(get_the_time()), esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_attr(sprintf(__('View all posts by %s', 'bicbswp'), get_the_author())), esc_html(get_the_author())
        );
            
        }
    }

endif;
/**
 * Display number of Comments
 *
 */
function comment_count() { 
    global $post;$thePostID = $post->ID; 
    global $wpdb;
    $count = "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_type = ' ' AND comment_post_ID = $thePostID"; 
    $co_number = $wpdb->get_var($count);
    if ($co_number == 10000000) { } 
    else {echo $co_number;} 
}


/**
 * Display template for post cateories and tags
 *
 */
if (!function_exists('bicbswp_cats_tags')) :

    function bicbswp_cats_tags() {
       
            printf('<span class="cats_tags">');
            printf(the_category(', '));
            printf('</span>'); 
        
        if(has_tag()==true){
            printf('<span class="tags">');
            printf(the_tags(' '));
            printf('</span>'); 
        }
        
        printf('</span>');
    }

endif;


/**
 * Adds custom classes to the array of body classes.
 *
 */
/*
function labtheme_body_classes($classes)
  {
  if (is_home() || is_front_page()) {
  $classes[] = 'navigation-is-open';
  }
  return $classes;
  }
  add_filter('body_class', 'labtheme_body_classes'); 
*/

/**
 * Add post ID attribute to image attachment pages prev/next navigation.
 *
 */
function bootstrapwp_enhanced_image_navigation($url) {
    global $post;
    if (wp_attachment_is_image($post->ID)) {
        $url = $url . '#main';
    }
    return $url;
}

add_filter('attachment_link', 'bootstrapwp_enhanced_image_navigation');



/**
 * Latest Posts 
 *
 */
function get_latest_posts($limit = 5)
{
    $latest_posts = get_posts('numberposts=' . $limit);
    $output = '<ul>';
    foreach($latest_posts as $post)
    {
        $post_title = $post->post_title;
        $post_permalink = get_permalink($post->ID);
        $thumbnail = get_the_post_thumbnail(
            $post->ID,
            'thumbnail',
            array(
                'class' => '',
                'alt'   => $post_title,
                'title' => $post_title
            )
        );
        $output .= '<li><a href="' . $post_permalink . '" title="Artikel: ' . $post_title . '">';
        $output .= $thumbnail . '<span>' . $post_title . '</span></a></li>';
    }
    $output .= '</ul>';
    return $output;
}
/**
 * Related Posts (echo comments)
 *
 */
function get_related_posts($limit = 5) 
{
    global $post;
    $tags = get_the_tags();
    if($tags)

    {
        $tag_ids = array();
        foreach($tags as $tag)
        {
            $tag_ids[] = $tag->term_id;
        }
        $args = array(
            'numberposts' => $limit,
            'tag__in' => $tag_ids,
            'exclude' => $post->ID,
            'cat' => '1289'
        );
        $related_posts = get_posts($args);
        $output = '';
        foreach($related_posts as $tmp_post) 
        {
            setup_postdata($tmp_post);
            $title = get_the_title($tmp_post->ID);
            $thumbnail = get_the_post_thumbnail(
            $tmp_post->ID,
            'thumbnail',
            array(
                'class' => '',
                'alt'   => $title,
                'title' => $title
            )
        );
            $output .= '<li class="col-sm-15"><a href="'.get_permalink($tmp_post->ID).'" title="Artikel &bdquo;'.$title.'&ldquo; lesen">'. $thumbnail . $title . '</a></li>';
        }

        wp_reset_postdata();
    }

    $output = !empty($output) ? $output : '<li>'. __( 'No related posts', 'bicbswp' ) . '</li>';
    return '<h2 class="col-xs-12 related-post-hl">'. __( 'More blogs', 'bicbswp' ) .'</h2><ul class="related-posts">'.$output.'</ul>';

}