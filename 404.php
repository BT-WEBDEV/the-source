<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package gka_theme
 */

get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<!-- Main Slider -->
		<section>
			<h1 class="outline">Slider</h1>
			<?php 
			$slider_id = get_field("gka_theme_slider", $post->ID);
			if($slider_id) {
				$slider = gka_theme_get_gallery($slider_id);
				if($slider) { 
					include get_template_directory() . '/template-parts/main-slider.php'; 
				} 
			}
			else {
				include get_template_directory() . '/template-parts/no-slider.php'; 
			}
        ?>
		</section>
		<!-- #Main Slider -->

		<!-- Main Content -->
		<section class="error-404 not-found flex-center">
			<div class="error-message text-center">
				<h1 class="page-title">
					The page you’re looking for can’t be found.
				</h1>
				<div>
					<?php // get_search_form(); ?>
					<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<label>
							<span class="screen-reader-text">Search for:</span>
							<input type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search">
						</label>
						<input type="submit" class="search-submit" value="Search">
					</form>
				</div>
				<div class="sitemap-link">
					<a href="">Or see our site map <i class="fa-solid fa-chevron-right"></i></a>
				</div>
			</div>
		</section>
		<!-- #Main Content -->

	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();