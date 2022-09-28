<div class="container-fluid py-default">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="text-center mb-header">
                <h2 class="text-center font-weight-bold">TESTIMONIALS</h2>
                <p>We’re proud to work with a diverse clientele, both locally and internationally. Our one-of-a-kind, revitalizing style and lifestyle services focus on empowering our trendsetting customers in every possible way. Here's what they have to say!</p>
            </div>
        </div>
    </div>
    <div class="main-swiper">
        <!-- Slider main container -->
        <div class="swiper gka-theme-testimonials-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php 
                $args = array(  
                    'post_type' => 'testimonials',
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => 10
                ); 
                $testimonials = new WP_Query($args);
                while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="testimonials z-depth-1-half">
                        <div class="content">
                           <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <div class="controller">
                <!-- If we need pagination -->
                <div class="swiper-pagination-wrap">
                    <div class="swiper-pagination static-pagination"></div>
                </div>
                <div class="btn-wrap">
                    <a href="" class="btn custom-btn">SEE MORE</a>
                </div>
                <div class="navigation">
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev">
                        <img src="<?php echo get_template_directory_uri()."/images/icons/left.svg"; ?>" alt="Prev">
                    </div>
                    <div class="swiper-button-next">
                        <img src="<?php echo get_template_directory_uri()."/images/icons/right.svg"; ?>" alt="Next">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>