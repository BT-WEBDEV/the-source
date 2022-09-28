$(document).ready(function () {
    // Swiper
    var gkaThemeSlider = new Swiper('.gka-theme-swiper-container', {
        autoplay: {
            delay: 7000,
        },
        // loop: true,
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1200: {
                allowTouchMove: false,
            }
        }
    });

    // Portfolio
    var gkaThemePortfolio = new Swiper('.gka-theme-portfolio-container', {
        // Default parameters
        slidesPerView: 1.3,
        spaceBetween: 20,
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
            dynamicMainBullets: 4
        },
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 2.4,
                // If we need pagination
                pagination: {
                    dynamicMainBullets: 6
                },
            },
            1200: {
                slidesPerView: 3.8,
                allowTouchMove: false,
                // If we need pagination
                pagination: {
                    dynamicMainBullets: 10
                },
            }
        }
    });

    // Testimonials
    var gkaThemeTestimonials = new Swiper('.gka-theme-testimonials-container', {
        // Default parameters
        slidesPerView: 1.2,
        spaceBetween: 20,
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1200: {
                slidesPerView: 1.2,
                allowTouchMove: false,
            }
        }
    });

}); /* Document Ready End */