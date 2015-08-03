$(document).ready(function () {

// CAP SHOP SLIDER
    var CapSlider = $('#cap-shop-img');
    CapSlider.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1500,
        autoplayHoverPause: true
    });

// SHOE SHOP SLIDER
    var ShoeSlider = $('#shoe-shop-img');
    ShoeSlider.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1500,
        autoplayHoverPause: true
    });

// JACKET SHOP SLIDER
    var JacketSlider = $('#jacket-shop-img');
    JacketSlider.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1500,
        autoplayHoverPause: true
    });


});