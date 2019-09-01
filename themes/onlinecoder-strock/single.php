<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Strock
 */

get_header();
?>
	<div <?php if(has_post_thumbnail()) : ?>style="background-image: url(<?php the_post_thumbnail_url('large')?>)"<?php endif; ?> class="stock-breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
				<h1>
					<?php the_title(); ?>
				</h1>
				<?php if(function_exists('bcn_display')) bcn_display(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="stock-internal-area">
		<div class="container">
			<div class="row">
				<?php if(get_post_type() == 'project' && is_active_sidebar('stock_project_sidebar')) : ?>
				<div class="col-md-4">
					<div class="project-widgets">
						<?php dynamic_sidebar('stock_project_sidebar'); ?>
					</div>
				</div>
				<?php endif;?>

				<div class="<?php if(get_post_type() == 'project') : ?><?php if(is_active_sidebar('stock_project_sidebar')) : ?>col-xl-8<?php else : ?>col-md-10 col-md-offset-2<?php endif; ?><?php else : ?>col-xl-8<?php endif; ?>">
				
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
				</div>
				<?php if(get_post_type() != 'project') {get_sidebar();} ?>
			</div>
		</div>
	</div>

<?php
get_footer();
