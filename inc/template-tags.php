<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Generate-Prf
 */

if ( ! function_exists( 'generate_prf_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since 1.2.5
 */
function generate_prf_entry_meta() 
{
	
	$categories = apply_filters( 'generate_show_categories', true );
	$tags = apply_filters( 'generate_show_tags', true );
	$comments = apply_filters( 'generate_show_comments', true );
	
	if ( 'jetpack-portfolio' == get_post_type() ) {
		
	//   get_the_term_list( $post->ID, 'jetpack-portfolio-type', '<span class="entry-meta portfolio-entry-meta">', _x(', ', 'Used between list items, there is a space after the comma.', 'generate_prf' ), '</span>' );

		$categories_list = get_the_term_list( $post->ID, 'jetpack-portfolio-type', '', __( ', ', 'generate_prf' ) );
		
		if ( $categories_list) {
			printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Categories', 'Used before category names.', 'generate' ),
				$categories_list
			);
		}
		
		//get_the_term_list( $post->ID, 'jetpack-portfolio-type', '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>', _x(', ', 'Used between list items, there is a space after the comma.', 'generate_prf' ), '</span>' );
		
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_term_list( $post->ID, 'jetpack-portfolio-tag', '', __( ', ', 'generate_prf' ) );

		if ( $tags_list) {
			printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Tags', 'Used before tag names.', 'generate_prf' ),
				$tags_list
			);
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) && $comments ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'generate' ), __( '1 Comment', 'generate' ), __( '% Comments', 'generate' ) );
		echo '</span>';
	}
}
endif;