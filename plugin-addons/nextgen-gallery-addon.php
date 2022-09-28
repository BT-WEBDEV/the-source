<!-- 
    NextGEN Gallery Add-On: Gallery's Active page
    Directory: /plugins/nextgen-gallery/products/photocrati_nextgen/modules/ngglegacy/admin/manage-images.php
-->
<!-- This is custom Addons GKA -->
<div id="active-pages-addon">
    Active Pages:
    <?php
    // args
    $args = array(
        'posts_per_page'    => -1,
        'post_type'     => array( 'post', 'page', 'packages' ),
        'meta_key'      => 'gka_theme_slider',
        'meta_value'    => $act_gid
    );
    // query
    $the_query = new WP_Query( $args );
    while ( $the_query->have_posts() ) : $the_query->the_post();
    ?>
    <?php the_title(); ?> - <?php the_ID(); ?>  ||  
    <?php endwhile; wp_reset_postdata(); ?>
</div>