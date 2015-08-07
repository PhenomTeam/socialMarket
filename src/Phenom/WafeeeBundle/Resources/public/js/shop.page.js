$(document).ready(function () {
    var FashionShopSlider = $(".fashion-shop-img");
    FashionShopSlider.owlCarousel({
        items:4,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true
    });

    var BeautyShopSlider = $("#beauty-shop-img");
    BeautyShopSlider.owlCarousel({
        items:4,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:1500,
        autoplayHoverPause:true
    });

    var DevicesShopSlider = $("#device-shop-img");
    DevicesShopSlider.owlCarousel({
        items:4,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true
    });


    $('#cap-product').click(function() {



    });



});