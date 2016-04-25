<?php
/**
 * Plugin Name: Set featured image
 * Plugin URI:  http://wpengineer.com/2460/set-wordpress-featured-image-automatically/
 * Description: Set featureed image automaticly on save post/page
 * Version:     1.0.1
 * Author:      Frank Bültge
 * Author URI:  http://bueltge.de
 * License:     GPLv3
 */

// This file is not called by WordPress. We don't like that.
! defined( 'ABSPATH' ) and exit;

if ( ! function_exists( 'fb_set_featured_image' ) ) {
	
	add_action( 'save_post', 'fb_set_featured_image' );
	/**
	 * Set featured image on posts
	 * 
	 */
	function fb_set_featured_image() {
			
			if ( ! isset( $GLOBALS['post']->ID ) )
				return NULL;
				
			if ( has_post_thumbnail( get_the_ID() ) )
				return NULL;
			
			$args = array(
				'numberposts'    => 1,
				'order'          => 'ASC', // DESC for the last image
				'post_mime_type' => 'image',
				'post_parent'    => get_the_ID(),
				'post_status'    => NULL,
				'post_type'      => 'attachment'
			);
			
			$attached_image = get_children( $args );
			if ( $attached_image ) {
				foreach ( $attached_image as $attachment_id => $attachment )
					set_post_thumbnail( get_the_ID(), $attachment_id );
			}
			
	}
	
}

if ( ! function_exists( 'fb_add_thumb_column' ) ) {
	
	// posts columns
	add_filter( 'manage_posts_columns', 'fb_add_thumb_column' );
	add_action( 'manage_posts_custom_column', 'fb_add_thumb_value', 10, 2 );
	// pages columns
	add_filter( 'manage_pages_columns', 'fb_add_thumb_column' );
	add_action( 'manage_pages_custom_column', 'fb_add_thumb_value', 10, 2 );
	/**
	 * Add description for table head
	 * 
	 * @param   $cols  Array
	 * @return  $cols  Array
	 */
	function fb_add_thumb_column( $cols ) {
		
		$cols['thumbnail'] = __('Thumbnail');
		return $cols;
	}
	
	/**
	 * Add thumbnail, if exist
	 * 
	 * @param  $column_name  String
	 * @param  $post_id  Integer
	 */
	function fb_add_thumb_value( $column_name, $post_id ) {
			
		if ( 'thumbnail' !== $column_name )
			return;
		
		$width  = (int) 35;
		$height = (int) 35;
		
		$args = array(
			'numberposts'    => 1,
			'order'          => 'ASC', // DESC for the last image
			'post_mime_type' => 'image',
			'post_parent'    => get_the_ID(),
			'post_status'    => NULL,
			'post_type'      => 'attachment'
		);
		
		$attached_image = get_children( $args );
		
		if ( $attached_image ) {
			foreach ( $attached_image as $attachment_id => $attachment )
				echo wp_get_attachment_image( $attachment_id, array( $width, $height ), TRUE );
		} else {
			echo __( 'None' );
		}
		
	}

}