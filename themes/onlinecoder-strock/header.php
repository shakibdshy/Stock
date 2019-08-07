<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Strock
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<div class="header-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-3">
						<div class="site-logo">
							<h2><a href="<?php echo esc_url(home_url('/')) ?>"><?php bloginfo('name'); ?></a></h2>
						</div>
					</div>

					<div class="col-xl-9">
						<div class="header-right-content">
							<a href="mailto:contact@stock.com" class="stock-content-box">
								<i class="fas fa-envelope"></i>
								Send us an email
								<h3>contact@stock.com</h3>
							</a>
							<div class="stock-content-box">
								<i class="fas fa-phone"></i>
								Give us a Call
								<h3>+014-547-0354</h3>
							</div>
							<a href="mailto:contact@stock.com" class="stock-content-box">
								<i class="fas fa-map-marker"></i>
								Send us an email
								<h3>contact@stock.com</h3>
							</a>
							<a href="#" class="stock-cart"><i class="fas fa-shopping-cart"></i><span class="stock-cart-count">3</span></a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-12">
						<div class="mainmenu">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							));
							?>
						</div>
					</div>
				</div>
			</div>
		</div>