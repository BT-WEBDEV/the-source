<?php
/**
 * Template Name: Contact Us
 *
 * Description: Contact Us
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
					<img class="img-fit" src="<?php echo get_template_directory_uri(); ?>/images/fashion_sketches.jpg">
                    <div class="mask">
                        <div class="slider-caption">
                            <div class="text-white">
                                <h1 class="font-weight-normal">READY FOR A CHANGE?</h1>
                                <!-- <p></p> -->
                                <a href="#contact-us" class="btn custom-btn">Contact Us</a>
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

		<!-- #Additional Content -->

		<!-- Widget Area After -->
		<?php
		if ( is_active_sidebar( 'gka_theme_widget_after' ) ) {
			dynamic_sidebar( 'gka_theme_widget_after' ); 
		}
		?>
		<!-- #Widget Area After -->

		<!-- Additional Content -->
		<section>
			<div class="container py-default contact-info">
				<div class="row justify-content-center align-items-center">
					<div class="col-md-5 col-lg-4">
						<div>
							<h3 class="font-weight-bold mb-2 mb-lg-3">ADDRESS</h3>
							<p>
								<a target="_blank" href="https://www.google.com/maps/place/Canary+Wharf,+London,+UK/@51.5053467,-0.029885,15z/data=!3m1!4b1!4m5!3m4!1s0x487602ba7a12992f:0x4d821857a5e4a41!8m2!3d51.5054306!4d-0.0235333" class="text-black"> Canary Wharf, London, England </a>
							</p>
							<p>
								<a target="_blank" href="https://www.google.com/maps/place/Camana+Bay/@19.3219776,-81.3781115,15z/data=!4m5!3m4!1s0x0:0x2684b31630213fbc!8m2!3d19.3219776!4d-81.3781115" class="text-black"> Camana Bay, Grand Cayman, Cayman&nbsp;Island </a>
							</p>
						</div>
						<div class="mt-4 mt-lg-5">
							<h3 class="font-weight-bold mb-2 mb-lg-3">CONTACT</h3>
							<p>
								<a href="tel:447813719111" class="text-black">+44 7813 719111</a>
							</p>
							<p>
								<a href="tel:13453252766" class="text-black">+1 345 325 2766</a>
							</p>
						</div>
					</div>
					<div class="col-md-7 col-lg-8">
						<div>
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15060.352897579527!2d-81.3781115!3d19.3219776!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2684b31630213fbc!2sCamana%20Bay!5e0!3m2!1sen!2sus!4v1663272693160!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</section>
		<section class="bg-grey">
			<?php get_template_part( 'template-parts/contact-form' ); ?>
		</section>
		<!-- #Additional Content -->

	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();