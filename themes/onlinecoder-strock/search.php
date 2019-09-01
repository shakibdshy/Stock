<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Strock
 */

get_header();
?>
	<div <?php if(has_post_thumbnail()) : ?>style="background-image: url(<?php the_post_thumbnail_url('large')?>)"<?php endif; ?> class="stock-breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'onlinecoder-strock' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				<?php if(function_exists('bcn_display')) bcn_display(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="stock-internal-area section-enable-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				<?php if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_navigation();

					else :

					get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
				<?php get_sidebar();?>
			</div>
		</div>
	</div>


<?php
get_footer();
