<?php
/**
 * Template Name: Services
 *
 * Description: Services
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
        <section>
            <div id="personal-styling" class="container py-default">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="text-center mb-header">
                            <h2 class="text-center font-weight-bold">PERSONAL STYLING</h2>
                            <p>Have you found yourself spending hours on the web, roaming around stores, chronically window shopping, or staring in your closet for too long? It's time to consider a specially curated styling endeavor. We're here to alleviate the stress that comes with the four simple words: "What Should I Wear?"</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-around">
                    <div class="col-md-6 col-lg-5">
                        <div class="page-list-1">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri()."/images/woman_shopping.jpg"; ?>" alt=""
                                    class="img-fluid w-100 img-fit">
                            </div>
                            <div class="content text-center">
                                <h4 class="font-weight-bold">Shopping</h4>
                                <p>Kick back, relax and leave the shopping to us! Our expert style advisors are well-equipped to find exactly what is uniquely suited to your needs.</p>
                                <a href="#contact-form" class="btn custom-btn">GET STARTED</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div class="page-list-1">
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri()."/images/wardrobe_closet.jpg"; ?>" alt=""
                                    class="img-fluid w-100 img-fit">
                            </div>
                            <div class="content text-center">
                                <h4 class="font-weight-bold">WARDROBE EDIT</h4>
                                <p>Make the most of your assets with our wardrobe editing support. We’ll help you determine your fashion goals and preferences so we can shape your wardrobe into a collection that’s authentically you. Stop staring and start wearing!</p>
                                <a href="#contact-form" class="btn custom-btn">GET STARTED</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-black text-white">
            <div class="container py-default">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="text-center mb-header">
                            <h2 class="text-center font-weight-bold">LIFESTYLE COORDINATION</h2>
                            <p>Feeling empowered in your newfound sense of style is just one form of success. Our lifestyle enhancement services are curated for a holistic feeling of health, comfort and beauty in your skin. </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 p-0">
                        <div class="page-list-2">
                            <div class="view">
                                <div class="image">
                                    <img src="<?php echo get_template_directory_uri()."/images/hair_beauty.jpg"; ?>"
                                        alt="" class="img-fluid w-100 img-fit">
                                </div>
                                <div class="mask d-flex align-items-end justify-content-center">
                                    <div class="content text-center">
                                        <h4 class="font-weight-bold">Hair and Beauty</h4>
                                        <p>From high drama evening makeup to understated elegance for a casual night out, we’ve got you covered for any event and every setting with our celebrity hair and beauty services.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="page-list-2">
                            <div class="view">
                                <div class="image">
                                    <img src="<?php echo get_template_directory_uri()."/images/mindandbody.jpg"; ?>"
                                        alt="" class="img-fluid w-100 img-fit">
                                </div>
                                <div class="mask d-flex align-items-end justify-content-center">
                                    <div class="content text-center">
                                        <h4 class="font-weight-bold">Mind and Body</h4>
                                        <p>Refocus your mind and cope with daily obstacles in a positive way with our professional coaching services. Develop a unique training program suited to your goals - from martial arts to yoga - with one of our select personal trainers. Meet with our qualified nutritionists to replenish your body. Specialising in sports, hormonal and dietary issues our nutritionists will create a healthy plan guided by your lifestyle and goals.</p>
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
            <?php get_template_part( 'template-parts/contact-form' ); ?>
        </section>
        <!-- #Additional Content -->

    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();