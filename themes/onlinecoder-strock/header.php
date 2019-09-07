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

	<?php
	
	$header_iconic_boxes = prefix_get_option('header_iconic_boxes');

	wp_head(); ?>
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
						<?php if(!empty($header_iconic_boxes)) : ?>
							<?php foreach ($header_iconic_boxes as $box) : ?>
							<?php if(!empty($box['link'])) : ?><a href="mailto:contact@stock.com"<?php else : ?><div <?php endif; ?>class="stock-content-box">
							
								<i class="<?php echo $box['icon']; ?>"></i>
								<?php echo $box['title']; ?>
								<h3><?php echo $box['big_title']; ?></h3>

							<?php if(!empty($box['link'])) : ?></a><?php else : ?></div> <?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>

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