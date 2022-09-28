<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gka_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="GKA Theme | GKA Web Department" />
	<meta name="Owner" content="GKA Theme" />
	<meta name="Copyright" content="Copyright &copy; GKA Theme" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<!-- Plugins -->
	<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;700&family=Poppins:wght@300;400;500;700&display=swap"
		rel="stylesheet">
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png"
		sizes="300x300">
</head>

<body <?php body_class(); ?>>
	<h1 class="outline">Header</h1>
	<a class="skip-main" href="#primary">Skip to main content</a>
	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<nav
				class="navbar fixed-top navbar-expand-md custom-navbar <?php echo (!get_field("gka_theme_slider", $post->ID)) ? "nav-black" : ""; ?>">
				<h1 class="outline">Main Navigation</h1>
				<div class="container">

					<!-- Navbar brand -->
					<a class="d-md-none" href="/">
						<div class="text-center mobile_logo">
							<div class="slogan">
								<?php echo file_get_contents(get_template_directory_uri()."/images/TheSourceLogoSlogan.svg"); ?>
							</div>
							<div class="text">
								<?php echo file_get_contents(get_template_directory_uri()."/images/TheSourceLogoText.svg"); ?>
							</div>
						</div>
					</a>

					<!-- Collapse button -->
					<button class="navbar-toggler third-button" type="button" data-toggle="collapse"
						data-target="#main-nav" aria-controls="main-nav" aria-expanded="false"
						aria-label="Toggle navigation">
						<div class="animated-icon3"><span></span><span></span><span></span></div>
					</button>

					<!-- Main navigation -->
					<div id="main-nav" class="collapse navbar-collapse">
						<ul class="navbar-nav mx-auto">
							<?php 
							$primary_nav = wp_get_nav_menu_items(3); 
							
							foreach ($primary_nav as $key => $item) {
								$dropdownmenu = '';
								if ($item->menu_item_parent == "0") {
									foreach ($primary_nav as $subitem) {
										if($item->ID == $subitem->menu_item_parent) {
											$active = ($post->ID == $subitem->object_id) ? "active" : "";
											$dropdownmenu .= '<a class="dropdown-item ' . $active . '" href="' . $subitem->url . '">' . $subitem->title . '</a>';
										}
									}
							if($dropdownmenu) { ?>
							<li
								class="nav-item dropdown <?php echo ($post->ID == $item->object_id) ? "active" : ""; ?>">
								<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="false"><?php echo $item->title; ?></a>
								<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
									<?php echo $dropdownmenu ?>
								</div>
							</li>

							<?php } else { ?>
							<li class="nav-item <?php echo ($post->ID == $item->object_id) ? "active" : ""; ?>">
								<a class="nav-link" href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
							</li>
							<?php } } 
							if($key == intdiv(sizeof($primary_nav), 2) - 1) {
							?>
							<!-- Navbar brand -->
							<a class="navbar-brand" href="/">
								<div class="text-center logo">
									<div class="slogan">
										<?php echo file_get_contents(get_template_directory_uri()."/images/TheSourceLogoSlogan.svg"); ?>
									</div>
									<div class="text">
										<?php echo file_get_contents(get_template_directory_uri()."/images/TheSourceLogoText.svg"); ?>
									</div>
								</div>
							</a>
							<?php } } ?>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<div id="content" class="site-content">