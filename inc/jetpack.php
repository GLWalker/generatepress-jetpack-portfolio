<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Generate
 */

function generate_prf_jetpack_setup() {

	/**
	 * Add theme support for Infinite Scroll.
	 * See: http://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'footer'         => 'page',
		'footer_widgets' => array( 'footer-1', ),
		'render'         => 'generate_prf_infinite_scroll_render',
	) );

	/**
	 * Add theme support for Portfolio Custom Post Type.
	 */
	add_theme_support( 'jetpack-portfolio' );

}
add_action( 'after_setup_theme', 'generate_prf_jetpack_setup' );

/**
 * Define the code that is used to render the posts added by Infinite Scroll.
 *
 * Includes the whole loop. Used to include the correct template part for the Portfolio CPT.
 */
function generate_prf_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();

		if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
			get_template_part( 'content', 'portfolio' );
		} else {
			get_template_part( 'content', get_post_format() );
		}
	}
}

/**
 * Load Jetpack scripts.
 */
function generate_prf_jetpack_scripts() {
	
	if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
	
		wp_enqueue_style( 'generate-prf-portfolio-style', get_stylesheet_directory_uri() . '/css/portfolio.css', false, '', 'all' );
		
		wp_enqueue_script( 'generate_prf-portfolio', get_stylesheet_directory_uri() . '/js/portfolio.js', array( 'jquery', 'masonry' ), GENERATE_VERSION . '-1', true );
	
	}
}

add_action( 'wp_enqueue_scripts', 'generate_prf_jetpack_scripts' );

/**
 * Disable default jetpack css and doing as a seperate function than below becuase I dont want the css in the footer! Anymore! EVER!!
 */
function generate_prf_jetpack_shortcode_disable() {
	global $post;
	
	if ( has_shortcode( $post->post_content, 'portfolio' ) ) {
		
		wp_deregister_style( 'jetpack-portfolio-style' );
		wp_dequeue_style( 'jetpack-portfolio-style' );
	}
}
add_action( 'wp_footer', 'generate_prf_jetpack_shortcode_disable' );

/**
 * Load css where a shortcode is used, and disable default jetpack css
 */
function generate_prf_jetpack_shortcode_scripts() {
	global $post;
	
	if ( has_shortcode( $post->post_content, 'portfolio' ) ) {
		
		wp_enqueue_style( 'generate-prf-portfolio-shortcode', get_stylesheet_directory_uri() . '/css/portfolio-shortcode.css', true, '', 'all' );
		
		wp_enqueue_script( 'generate_prf-portfolio-shortcode-script', get_stylesheet_directory_uri() . '/js/portfolio-shortcode.js', array(), GENERATE_VERSION . '-1', true );
		
	}
}
add_action( 'wp_enqueue_scripts', 'generate_prf_jetpack_shortcode_scripts' );