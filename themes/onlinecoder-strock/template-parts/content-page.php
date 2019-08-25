<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Strock
 */
	if(get_post_meta( get_the_ID(), 'my_post_options', true )){
		$page_meta = get_post_meta( get_the_ID(), 'my_post_options', true );
	}else {
		$page_meta = array();
	}
	
	if(array_key_exists('enable_title', $page_meta)){
		$enable_title = $page_meta['enable_title'];
	}else {
		$enable_title = true;
	}

	if(array_key_exists('custom_title', $page_meta)){
		$custom_title = $page_meta['custom_title'];
	}else {
		$custom_title = '';
	}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php if($enable_title == true) : ?>
	<header class="entry-header">
		<h1 class="entry-title">
			<?php if (!empty($custom_title)) {
				echo $custom_title;
			} else {
				the_title();
			}
			?>
		</h1>
		<?php if(function_exists('bnc_display')) bnc_display(); ?>
	</header><!-- .entry-header -->
	<?php endif;?>


	<?php onlinecoder_strock_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'onlinecoder-strock' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'onlinecoder-strock' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
