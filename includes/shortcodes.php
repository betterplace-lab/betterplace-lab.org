<?php defined('ABSPATH') or die();

/**
 * Theme Options Page
 *
 * @author Nina Taberski-Besserdich
 * @package WordPress
 * @subpackage BIC Bootstrap Wordpress Theme
 */

/*-----------------------------------------------------------------------------------*/
/* Shortcodes
/*-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/* Helper for Shortcodes
/*-----------------------------------------------------------------------------------*/

// User shorcodes in sidebars
add_filter('widget_text', 'do_shortcode');

// Replace WP autop formatting
if (!function_exists( "bic_rm_wpautop")) {
     function bic_rm_wpautop($content) {
          $content = do_shortcode( shortcode_unautop( $content ) );
          $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
          //$content = str_replace("</p>", "<br />", $content);
          return $content;
     }
} 




//move wpautop filter to AFTER shortcode is processed
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );

/*-----------------------------------------------------------------------------------*/
/* Shortcodes for header
/*-----------------------------------------------------------------------------------*/

// Header
function bic_shortcode_header($atts, $content = null ) {
  $a = shortcode_atts( array(
   'color' => '',
   ), $atts );
   return '<div class="header-box header-txt ' . esc_attr($a['color']) . '"> <div class="container">' . bic_rm_wpautop($content) . '</div></div>';
}
add_shortcode( 'header', 'bic_shortcode_header' );

/*-----------------------------------------------------------------------------------*/
/* Shortcodes for container
/*-----------------------------------------------------------------------------------*/

// Header
function bic_shortcode_container($atts, $content = null ) {
   return '<article><div class="container">' . bic_rm_wpautop($content) . '</div></article>';
}
add_shortcode( 'container', 'bic_shortcode_container' );

/*-----------------------------------------------------------------------------------*/
/* Shortcodes for row
/*-----------------------------------------------------------------------------------*/

// row
function lab_shortcode_row ($atts, $content = null ) {
   $a = shortcode_atts( array(
   'color' => '',
   ), $atts );
   return '<div class="row ' . esc_attr($a['color']) . '">' . bic_rm_wpautop($content) . '</div>';
}
add_shortcode( 'row', 'lab_shortcode_row' );

/*-----------------------------------------------------------------------------------*/
/* Shortcodes for icons
/*-----------------------------------------------------------------------------------*/

// Icons
function lab_shortcode_icon($atts) {
  $a = shortcode_atts( array(
   'type' => 'twitter',
   ), $atts );
   return '<i class="icon-' . esc_attr($a['type']) . '"></i>';
}
add_shortcode( 'icon', 'lab_shortcode_icon' );

/*-----------------------------------------------------------------------------------*/
/* Shortcodes for Columns with Backgrounds
/*-----------------------------------------------------------------------------------*/

// Two Columns
function lab_shortcode_columns_background($atts, $content = null ) {
  $a = shortcode_atts( array(
   'box' => 'offer',
   ), $atts );
   return '<div class="padding-box ' . esc_attr($a['box']) . '">' . bic_rm_wpautop($content) . '</div>';
}
add_shortcode( 'offer', 'lab_shortcode_columns_background' );

/*-----------------------------------------------------------------------------------*/
/* Shortcodes for Columns
/*-----------------------------------------------------------------------------------*/

// Two Columns
function lab_shortcode_two_columns_one($atts, $content = null ) {
   return '<div class="col-sm-6">' . bic_rm_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one', 'lab_shortcode_two_columns_one' );


// Three Columns
function bic_shortcode_three_columns_one($atts, $content = null) {
   return '<div class="col-sm-4">' . bic_rm_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one', 'bic_shortcode_three_columns_one' );


function bic_shortcode_three_columns_two($atts, $content = null) {
   return '<div class="col-sm-8">' . bic_rm_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two', 'bic_shortcode_three_columns_two' );


// Four Columns
function bic_shortcode_four_columns_one($atts, $content = null) {
   return '<div class="col-sm-3 col-ms-4 col-xs-6">' . bic_rm_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one', 'bic_shortcode_four_columns_one' );

function bic_shortcode_four_columns_two($atts, $content = null) {
   return '<div class="col-sm-6">' . bic_rm_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two', 'bic_shortcode_four_columns_two' );

function bic_shortcode_four_columns_three($atts, $content = null) {
   return '<div class="col-sm-9">' . bic_rm_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three', 'bic_shortcode_four_columns_three' );


// five Columns
function bic_shortcode_five_columns($atts, $content = null) {
   return '<div class="col-sm-15">' . bic_rm_wpautop($content) . '</div>';
}
add_shortcode( 'five_columns', 'bic_shortcode_five_columns' );


/*-----------------------------------------------------------------------------------*/
/* Divide Text Shortcode 
/*-----------------------------------------------------------------------------------*/

function bic_shortcode_divider($atts, $content = null) {
   return '<div class="divider"></div>';
}
add_shortcode( 'divider', 'bic_shortcode_divider' );

/*-----------------------------------------------------------------------------------*/
/* Shortcodes for center Block
/*-----------------------------------------------------------------------------------*/

// Center Block
function lab_shortcode_center($atts, $content = null ) {
   return '<div class="center-block"></div>';
}
add_shortcode( 'center', 'lab_shortcode_center' );

/*-----------------------------------------------------------------------------------*/
/* Shortcodes for Buttons 
/*-----------------------------------------------------------------------------------*/

function bic_shortcode_button($atts, $content = null) {

    extract(shortcode_atts(array(
        'type' => 'standard',
        'link'	=> '#',
        'target' => '_self',
        'size'	=> '',
    ), $atts));

	$type = ($type) ? ' btn-'.$type  : '';
	$size = ($size) ? ' btn-'.$size  : '';
        $output = '<a class="btn ' .$type.$size. '" href="' .$link. '" target="'.$target.'"><span>' .do_shortcode($content). '</span></a>';
    return $output;

    
}
add_shortcode( 'button', 'bic_shortcode_button' );