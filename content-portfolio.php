<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Generate-Prf
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article inside-portfolio">
		<?php do_action( 'generate_before_content'); ?>
		
		<?php if ( '' != get_the_post_thumbnail() ) : ?>
			<div class="portfolio-featured-image">
				<a href="<?php the_permalink(); ?>">
                	<span class="portfolio-thumbnail-overlay"><i class="fa fa-arrows-alt"></i>
</span>
					<?php the_post_thumbnail( 'portfolio-featured-image' ); ?>
				</a>
			</div><!-- .portfolio-thumbnail -->
		<?php endif; ?>

		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
        
        <?php if ( (generate_show_excerpt() != '') && (true == generate_show_excerpt()) ) : ?>
			<div class="entry-summary" itemprop="text">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php endif; ?>
        
        <?php do_action( 'generate_after_entry_content'); ?>
        
		<footer class="entry-meta">
			<?php generate_prf_entry_meta(); ?>
		</footer><!-- .entry-meta -->
		<?php do_action( 'generate_after_content'); ?>
        
		<?php edit_post_link( __( 'Edit', 'generate' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->