<?php
/**
 * Template Name: Site Map
 *
 * Description: Site Map
 *
 * @package WordPress
 * @subpackage REDI
 * @since REDI 1.0
 */
get_header();
?>
<div id="primary" class="content-area nav-space">
    <main id="main" class="site-main">
        <h1 class="outline">Main</h1>

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
            <div id="sitemap" class="container">
                <div>
                    <h3 class="font-weight-bold">Site Map</h3>
                </div>
                <hr>
                <div class="row">
                    <ul class="col-md-3 list-unstyled">
                        <h6>Pages:</h6>
                        <?php
                        $pages = get_pages();
                        foreach ( $pages as $page ) {
                            $child_nav = '';
                            if($page->post_parent == 0) {
                                foreach ( $pages as $child_page ) {
                                    if($page->ID == $child_page->post_parent) {
                                    $child_nav .= ' <li class="my-1 mb-2">
                                                        <a href="' . get_page_link( $child_page->ID ) . '" class="font-weight-normal">' . $child_page->post_title . '</a>
                                                    </li>';
                                    }
                                }
                        ?>
                        <?php if($child_nav) { ?>
                        <li>
                            <a href="<?php echo get_page_link( $page->ID ); ?> "
                                class="font-weight-normal"><?php echo $page->post_title; ?></a>
                            <ul>
                                <?php echo $child_nav; ?>
                            </ul>
                        </li>
                        <?php } else { ?>
                        <li>
                            <a href="<?php echo get_page_link( $page->ID ); ?> "
                                class="font-weight-normal"><?php echo $page->post_title; ?></a>
                        </li>
                        <?php } } } ?>
                    </ul>

                    <!-- News -->
                    <ul class="col-md-3 list-unstyled">
                        <h6>News & Events:</h6>
                        <?php
                            $posts = get_posts();
                            foreach ( $posts as $post ) {
                            ?>
                        <li>
                            <a href="<?php echo get_page_link( $post->ID ); ?> "
                                class="font-weight-normal"><?php echo $post->post_title; ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>

                    <!-- Custom Post Type -->
                    <ul class="col-md-3 list-unstyled d-none">
                        <h6>Custom Post Type:</h6>
                        <?php
                            $args = array(  
                                'post_type' => 'custom_post_type',
                                'post_status' => 'publish',
                                'orderby' => 'title',
                                'order' => 'ASC'
                            ); 

                            $post_type = new WP_Query($args);

                            while ( $post_type->have_posts() ) : $post_type->the_post();
                            ?>
                        <li>
                            <a href="<?php echo get_page_link( $post->ID ); ?> "
                                class=" font-weight-normal"><?php echo $post->post_title; ?></a>
                        </li>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </ul>

                </div>
            </div>
        </section>
    </main>
</div>
<?php
get_footer();