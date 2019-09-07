<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Strock
 */

 $stock_social_link = prefix_get_option('social_link');

?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<?php if (is_active_sidebar('stock_footer')) : ?>
			<div class="row">
				<?php dynamic_sidebar('stock_footer'); ?>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-xl-12">
				<div class="stock-footer-bottom">
					<div class="row">
						<div class="col-xl-4">
							<?php esc_html_e('Copyright © 2017 FairDealLab - All Rights Reserved', 'Stock'); ?>
						</div>
						<div class="col-xl-4">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'footer_menu'
							));
							?>
						</div>
						<div class="col-xl-4">
							<?php if(!empty($stock_social_link)) : ?>
							<div class="social-icon">
								<?php foreach ($stock_social_link as $link) : ?>
								<a href="<?php echo $link['link']; ?>" target="_blank"><i class="<?php echo $link['icon']; ?>"></i></a>
								<?php endforeach; ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>