<?php
/**
 * Template Name: Portfolio
 *
 * Description: Portfolio
 *
 * @package WordPress
 * @subpackage REDI
 * @since REDI 1.0
 */
get_header(); 
?>
<div id="primary" class="content-area nav-space">
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

        <!-- Additional Content -->
        <section id="gallery">
            <div class="container-fluid py-default">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center">
                            <h2 class="text-center font-weight-bold mb-header">GALLERY</h2>
                        </div>
                        <div class="portfolio-gallery">
                            <ul class="nav nav-tabs" id="myTabMD" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="portfolio1-tab-md" data-toggle="tab"
                                        href="#portfolio1-md" role="tab" aria-controls="portfolio1-md"
                                        aria-selected="true">PERSONAL&nbsp;STYLING</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="portfolio2-tab-md" data-toggle="tab" href="#portfolio2-md"
                                        role="tab" aria-controls="portfolio2-md" aria-selected="false">LIFESTYLE&nbsp;COORDINATION</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContentMD">
                                <div class="tab-pane fade show active" id="portfolio1-md" role="tabpanel"
                                    aria-labelledby="portfolio1-tab-md">
                                    <div id="portfolio1" class="gallery-grid">
                                        <?php 
                                        $portfolio = gka_theme_get_gallery(8); 
                                        for ($i=0; $i < 8; $i++) {
                                        ?>
                                        <div class="p<?php echo $i; ?>">
                                            <a data-fancybox="portfolio1"
                                                href="<?php echo $portfolio[$i]->path, $portfolio[$i]->filename; ?>">
                                                <img src="<?php echo $portfolio[$i]->path, $portfolio[$i]->filename; ?>"
                                                    alt="<?php echo $portfolio[$i]->alttext; ?>"
                                                    class="img-fluid w-100 img-fit">
                                            </a>
                                        </div>
                                        <?php } ?>
                                        <div class="d-none">
                                            <?php for ($i=8; $i < sizeof($portfolio); $i++) { ?>
                                            <a data-fancybox="portfolio1"
                                                href="<?php echo $portfolio[$i]->path, $portfolio[$i]->filename; ?>">
                                                <img src="<?php echo $portfolio[$i]->path, $portfolio[$i]->filename; ?>"
                                                    alt="<?php echo $portfolio[$i]->alttext; ?>"
                                                    class="img-fluid w-100 img-fit">
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a data-fancybox="portfolio1"
                                            href="<?php echo $portfolio[8]->path, $portfolio[8]->filename; ?>"
                                            class="btn custom-btn">SEE MORE</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="portfolio2-md" role="tabpanel"
                                    aria-labelledby="portfolio2-tab-md">
                                    <div id="portfolio2" class="gallery-grid">
                                        <?php 
                                        $portfolio = gka_theme_get_gallery(9); 
                                        for ($i=0; $i < 8; $i++) {
                                        ?>
                                        <div class="p<?php echo $i; ?>">
                                            <a data-fancybox="portfolio2"
                                                href="<?php echo $portfolio[$i]->path, $portfolio[$i]->filename; ?>">
                                                <img src="<?php echo $portfolio[$i]->path, $portfolio[$i]->filename; ?>"
                                                    alt="<?php echo $portfolio[$i]->alttext; ?>"
                                                    class="img-fluid w-100 img-fit">
                                            </a>
                                        </div>
                                        <?php } ?>
                                        <div class="d-none">
                                            <?php for ($i=8; $i < sizeof($portfolio); $i++) { ?>
                                            <a data-fancybox="portfolio2"
                                                href="<?php echo $portfolio[$i]->path, $portfolio[$i]->filename; ?>">
                                                <img src="<?php echo $portfolio[$i]->path, $portfolio[$i]->filename; ?>"
                                                    alt="<?php echo $portfolio[$i]->alttext; ?>"
                                                    class="img-fluid w-100 img-fit">
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a data-fancybox="portfolio2"
                                            href="<?php echo $portfolio[8]->path, $portfolio[8]->filename; ?>"
                                            class="btn custom-btn">LOAD MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- #Additional Content -->

        <!-- Widget Area Before -->
        <?php
		if ( is_active_sidebar( 'gka_theme_widget_before' ) ) {
			dynamic_sidebar( 'gka_theme_widget_before' ); 
		}
		?>
        <!-- #Widget Area Before -->

        <!-- Additional Content -->

        <!-- #Additional Content -->

        <!-- Main Content -->
        <?php while ( have_posts() ) : the_post(); ?>
        <section class="main-section">
            <?php get_template_part( 'template-parts/content', 'page' ); ?>
        </section>
        <?php endwhile; ?>
        <!-- #Main Content -->

        <!-- Additional Content -->

        <!-- #Additional Content -->

        <!-- Widget Area After -->
        <?php
		if ( is_active_sidebar( 'gka_theme_widget_after' ) ) {
			dynamic_sidebar( 'gka_theme_widget_after' ); 
		}
		?>
        <!-- #Widget Area After -->

        <!-- Additional Content -->
        <section class="bg-grey">
            <div class="container-fluid py-default">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="text-center mb-header">
                            <h2 class="text-center font-weight-bold">OUR CLIENTS</h2>
                            <p>From the resort and tropical atmosphere of the Caribbean Islands to the chic and eclectic City boroughs, we’ve had the pleasure of working with a wonderfully diverse range of clients in international destinations. </p>
                        </div>
                    </div>
                </div>
                <div class="main-swiper">
                    <!-- Slider main container -->
                    <div class="swiper gka-theme-portfolio-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <?php 
                            $args = array(  
                                'post_type' => 'our-clients',
                                'post_status' => 'publish',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'posts_per_page' => 10
                            ); 
                            $clients = new WP_Query($args);
                            while ( $clients->have_posts() ) : $clients->the_post(); ?>
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="clients-item z-depth-1-half">
                                    <div class="view">
                                        <div class="image">
                                            <img src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? : get_template_directory_uri()."/images/placeholder.jpg"; ?>"
                                                alt="<?php the_title(); ?>" class="img-fluid img-fit w-100">
                                        </div>
                                        <div class="mask d-flex align-items-end">
                                            <div class="caption text-white">
                                                <h5><?php the_title(); ?></h5>
                                                <div class="title">Title</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>

                        <div class="controller">
                            <!-- If we need pagination -->
                            <div class="swiper-pagination-wrap">
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="btn-wrap">
                                <a href="" class="btn custom-btn">SEE MORE</a>
                            </div>
                            <div class="navigation">
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev">
                                    <img src="<?php echo get_template_directory_uri()."/images/icons/left.svg"; ?>"
                                        alt="Prev">
                                </div>
                                <div class="swiper-button-next">
                                    <img src="<?php echo get_template_directory_uri()."/images/icons/right.svg"; ?>"
                                        alt="Next">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <?php get_template_part( 'template-parts/testimonials' ); ?>
        </section>
        <section class="bg-grey">
            <?php get_template_part( 'template-parts/contact-form' ); ?>
        </section>
        <!-- #Additional Content -->

    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();

?>

<script>
</script>