<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Strock
 */

get_header();
?>

	<div <?php if(has_post_thumbnail()) : ?>style="background-image: url(<?php the_post_thumbnail_url('large')?>)"<?php endif; ?> class="stock-breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'onlinecoder-strock' ); ?></h1>
					<?php if(function_exists('bcn_display')) bcn_display(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="stock-internal-area section-enable-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'onlinecoder-strock' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>
				</div>
				<div class="col-md-4">
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'onlinecoder-strock' ); ?></h2>
						<ul>
							<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
							?>
						</ul>
					</div><!-- .widget -->
				</div>
				<div class="col-md-4">
					<?php
					/* translators: %1$s: smiley */
						$onlinecoder_strock_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'onlinecoder-strock' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$onlinecoder_strock_archive_content" );

						the_widget( 'WP_Widget_Tag_Cloud' );
					?>
				</div>
			</div>
		</div>
	</div>


<?php
get_footer();
