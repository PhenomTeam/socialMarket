$(document).ready(function () {
    var BannerSlider = $("#banner-slider");
    BannerSlider.owlCarousel({
        items:1,
        loop:true,
        //margin:10,
        //animateOut: 'slideOutLeft',
        //animateIn: 'slideInRight',
        lazyLoad:true,
        autoplay:true,
        autoplayTimeout: 2000,
        autoplayHoverPause:true
    });

});