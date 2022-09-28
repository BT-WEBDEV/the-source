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
 * @package gka_theme
 */

get_header();
?>
<main id="primary" class="site-main">

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

    <section>
        <div class="container">
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

                /*
                * Include the Post-Type-specific template for the content.
                * If you want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                */
                get_template_part( 'template-parts/content', get_post_type() );

            endwhile;

            the_posts_navigation();

            else :

            get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
        </div>
    </section>

</main><!-- #main -->

<?php
// get_sidebar();
get_footer();