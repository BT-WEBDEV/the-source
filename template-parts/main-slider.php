<div class="gka-theme-slider">
    <!-- Swiper -->
    <div class="swiper gka-theme-swiper-container" aria-label="carousel">
        <div class="swiper-wrapper" aria-label="carousel">
            <?php foreach ($slider as $key => $image) { ?>
            <div class="swiper-slide" aria-label="carousel">
                <div class="view image">
                    <img src="<?php echo $image->path, $image->filename; ?>" alt="<?php echo $image->alttext; ?>"
                        class="img-fluid w-100 img-fit" aria-label="carousel">
                    <div class="mask">
                        <?php if($image->description || $image->title) { ?>
                        <div class="slider-caption">
                            <div class="text-white">
                                <h1 class="font-reem font-weight-normal"><?php echo $image->title; ?></h1>
                                <p><?php echo $image->description; ?></p>
                                <?php if($image->link) { ?>
                                <a href="<?php echo $image->link; ?>" class="btn custom-btn"><?php echo ($image->cta) ? : "Learn More"; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>