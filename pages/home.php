<?php
/**
 * Template Name: Home
 *
 * Description: Home
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
            <div>
                <div class="hero-video view">
                    <video class="video-fluid img-fit" autoplay loop muted>
                        <source src="<?php echo get_template_directory_uri(); ?>/images/home_hero_video.mp4"
                            type="video/mp4" />
                    </video>
                    <div class="mask">
                        <div class="slider-caption">
                            <div class="text-white">
                                <h1 class="font-weight-normal">AN EXPERIENCE THAT IS ALWAYS IN STYLE AND ON POINT.</h1>
                                <!-- <p></p> -->
                                <a href="#about-the-source" class="btn custom-btn">LEARN MORE</a>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- #Main Slider -->

        <!-- Additional Content -->

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
        <section style="display:none">
            <div class="container-fluid py-default">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-5">
                        <div class="text-center mb-header">
                            <h2 class="text-center font-weight-bold">PORTFOLIO</h2>
                            <p>Explore our impressive portfolio of work and discover the one-of-a-kind luxury that expert styling advice and enriching lifestyle guidance from The Source has to offer.</p>
                        </div>
                    </div>
                </div>
                <div class="main-swiper">
                    <!-- Slider main container -->
                    <div class="swiper gka-theme-portfolio-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <?php 
                            $portfolio = gka_theme_get_gallery(7);
                            foreach ($portfolio as $key => $image) {
                            ?>
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="portfolio-item">
                                    <div class="image">
                                        <img src="<?php echo $image->path, $image->filename; ?>"
                                            alt="<?php echo $image->alttext; ?>" class="img-fluid w-100 img-fit">
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="controller">
                            <!-- If we need pagination -->
                            <div class="swiper-pagination-wrap">
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="btn-wrap">
                                <a href="<?php the_permalink(22); ?>" class="btn custom-btn">SEE MORE</a>
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

        <section class="bg-grey">
            <div class="container-fluid py-default">
                <div class="row justify-content-center">
                    <div class="col-md-11 col-lg-10">
                        <div class="text-center">
                            <h2 class="text-center font-weight-bold mb-header">NEWS</h2>
                        </div>
                        <div class="row">
                            <?php
                            $args = array(  
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'posts_per_page' => 3
                            ); 
        
                            $blog = new WP_Query($args);
                            while ( $blog->have_posts() ) : $blog->the_post(); ?>
                            <div class="col-md-4">
                                <div class="news-list-v1">
                                    <div class="image">
                                        <a href="<?php the_permalink()?>">
                                            <img src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? : get_template_directory_uri()."/images/placeholder.jpg"; ?>"
                                                alt="<?php the_title(); ?>" class="img-fluid img-fit w-100">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="<?php the_permalink()?>">
                                            <h5 class="font-weight-bold text-black"><?php the_title(); ?></h5>
                                        </a>
                                        <div class="desc">
                                            <?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
                                        </div>
                                        <div class="link">
                                            <a class="underline text-black" href="<?php the_permalink()?>"><u>READ
                                                    MORE</u></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                        <div class="text-center mt-4 mt-lg-5">
                            <a href="/news/" class="btn custom-btn">READ ALL</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
            <?php get_template_part( 'template-parts/contact-form' ); ?>
        </section>
        <!-- #Additional Content -->

    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();