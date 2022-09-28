<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package gka_theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<!-- Main Slider -->
	<section>
		<h1 class="outline">Slider</h1>
		<?php include get_template_directory() . '/template-parts/no-slider.php'; ?>
	</section>
	<!-- #Main Slider -->

	<section>
		<div class="search-result">
			<div class="container">
				<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<label>
						<span class="screen-reader-text">Search for:</span>
						<input type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s"
							id="s" placeholder="Search">
					</label>
					<input type="submit" class="search-submit" value="Search">
				</form>
			</div>
			<hr class="m-0">
			<div class="container">
				<div class="total-found">
					<?php 
					$allsearch = new WP_Query("s=$s"); 
					echo $allsearch->found_posts.' results found.'; 
					?>
				</div>
				<?php if ( have_posts() ) : ?>
				<div class="found">
					<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;
				?>
				</div>
				<?php
				the_posts_navigation();

				else :
				// get_template_part( 'template-parts/content', 'none' ); 
				?>
				<div class="nothing-found">
					Sorry, no matches were found.<br>
					Please try again with some different keywords.
				</div>
				<?php endif; ?>
			</div>
			<hr class="mt-0">
		</div>
	</section>
</main><!-- #main -->

<?php
get_footer();