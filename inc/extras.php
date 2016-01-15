<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Generate-Prf
 */


/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function generate_prf_post_classes( $classes ) {

	if ( 'jetpack-portfolio' == get_post_type() ) {
		$tags_list = get_the_term_list( get_the_ID(), 'jetpack-portfolio-tag' );
	}
	// Adds a class of portfolio-entry to portfolio projects.
	//if ( !is_single() && 'jetpack-portfolio' == get_post_type() ) {
	//if ( is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' )  ) {
	if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
		$classes[] = 'grid-33 tablet-grid-50 mobile-grid-100';
	}

	return $classes;
}
add_filter( 'post_class', 'generate_prf_post_classes' );