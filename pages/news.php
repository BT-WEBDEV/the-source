<?php
/**
 * Template Name: News
 *
 * Description: News
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
		<section>
			<div class="container-fluid py-default">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-5">
						<div class="text-center mb-header">
							<h2 class="text-center font-weight-bold">LATEST NEWS</h2>
							<p>Stay on top of the latest industry trends and style tips by exploring our list of thoughtful news articles! We promise to guide you every step of the way in this personalized styling journey, and these articles are a great way to discover even more fashion and health insights from The Source.</p>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="row mx-0 news-list-2-container">
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
							<div class="col-md-12 col-lg-6 news-list-2-wrap">
								<div class="news-list-2">
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
										<div class="date">
											<?php echo get_the_date('M d, Y'); ?>
										</div>
										<div class="desc">
											<?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
											<a class="underline text-black" href="<?php the_permalink()?>"><u>READ
													MORE</u></a>
										</div>
									</div>
								</div>
							</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
				<div class="text-center mt-5">
					<a href="" class="btn custom-btn">LOAD MORE</a>
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