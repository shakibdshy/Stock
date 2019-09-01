<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Strock
 */

get_header();
?>

	<div class="stock-breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<h1>Blog</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="stock-internal-area section-enable-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<?php

get_footer();
