<?php
/**
 * Generate child theme functions and definitions
 *
 * @package Generate
 */
 
 /*
 * set portfolio image sizes
 */
//add_image_size( 'generate-portfolio-featured-image', 800, 9999 );

/**
 * Custom template tags for this child theme.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_stylesheet_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_stylesheet_directory() . '/inc/jetpack.php';

/**
 * Load plugin enhancement file to display admin notices.
 */
require get_stylesheet_directory() . '/inc/plugin-enhancements.php';
