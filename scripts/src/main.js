$(document).ready(function () {

    $('.third-button').on('click dblclick', function () {
        $('.animated-icon3').toggleClass('open');
        $('.custom-navbar').toggleClass('nav-open');
    });
    // Add Class When Scrolls
    var nav = $('.custom-navbar');
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 10) {
            nav.addClass('shrink');
        } else {
            nav.removeClass('shrink');
        }
    });
    if ($(window).scrollTop() >= 10) {
        nav.addClass('shrink');
    }

}); /* Document Ready End */