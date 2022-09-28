<?php
/**
 * Template Name: About Us
 *
 * Description: About Us
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
        <section class="bg-black text-white">
            <div class="container py-default">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-header">
                            <h2 class="text-center font-weight-bold">FAQ</h2>
                            <p>Seeking fashion and lifestyle guidance comes with a great deal of enthusiasm and a touch of uncertainty, and we understand that. Below, you can reference some of the most commonly asked questions we receive. If your question is not covered, please drop us a line at mystyle@thesouce.ky. </p>
                        </div>
                    </div>
                </div>
                <div>
                    <!--Accordion wrapper-->
                    <div class="accordion md-accordion" id="faq" role="tablist" aria-multiselectable="true">

                        <!-- Accordion card -->
                        <?php 
                        $args = array(  
                            'post_type' => 'faq',
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'posts_per_page' => 20
                        ); 

                        $blog = new WP_Query($args);
                        $i = 0;
                        while ( $blog->have_posts() ) : $blog->the_post(); ?>
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header" role="tab" id="heading<?php echo $i; ?>">
                                <a data-toggle="collapse" data-parent="#faq" href="#collapse<?php echo $i; ?>"
                                    aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                    <h5 class="mb-0 font-weight-medium">
                                        <?php the_title(); ?> <i class="fas fa-angle-down rotate-icon"></i>
                                    </h5>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapse<?php echo $i; ?>" class="collapse <?php echo ($i==0) ? "show" : ""; ?>"
                                role="tabpanel" aria-labelledby="heading<?php echo $i; ?>" data-parent="#faq">
                                <div class="card-body">
                                   <?php the_content(); ?>
                                </div>
                            </div>

                        </div>
                        <!-- Accordion card -->
                        <?php $i++; endwhile; wp_reset_postdata(); ?>
                    </div>
                    <!-- Accordion wrapper -->
                </div>
            </div>
        </section>
        <section style="display:none">
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