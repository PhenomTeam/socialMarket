//
//$(document).ready(function(){
//
//    $("#product0").hover(function() {
//        $(this).css("opacity", "0");
//        $("#panel0").css("opacity", "1" );
//    }, function() {
//        $("#panel0").css("opacity", "0" );
//        $(this).css("opacity", "1");
//    });
//});
//
//$(document).ready(function(){
//
//    $("#product1").hover(function() {
//
//        $(this).css("opacity", "0");
//        $("#panel1").css("opacity", "1" );
//    }, function() {
//        $("#panel1").css("opacity", "0" );
//        $(this).css("opacity", "1");
//    });
//});
//
//$(document).ready(function(){
//
//    $("#product2").hover(function() {
//
//        $(this).css("opacity", "0");
//        $("#panel2").css("opacity", "1" );
//    }, function() {
//        $("#panel2").css("opacity", "0" );
//        $(this).css("opacity", "1");
//    });
//});
//
//$(document).ready(function(){
//
//    $("#product3").hover(function() {
//
//        $(this).css("opacity", "0");
//        $("#panel3").css("opacity", "1" );
//    }, function() {
//        $("#panel3").css("opacity", "0" );
//        $(this).css("opacity", "1");
//    });
//});
//
//$(document).ready(function(){
//
//    $("#product4").hover(function() {
//
//        $(this).css("opacity", "0");
//        $("#panel4").css("opacity", "1" );
//    }, function() {
//        $("#panel4").css("opacity", "0" );
//        $(this).css("opacity", "1");
//    });
//});
//
//$(document).ready(function(){
//
//    $("#product5").hover(function() {
//        $("#panel5").css("opacity", "1" );
//        $(this).css("opacity", "0");
//    }, function() {
//        $("#panel5").css("opacity", "0" );
//        $(this).css("opacity", "1");
//    });
//});

$(document).ready(function () {
    var FashionShopSlider = $(".fashion-shop-img");
    FashionShopSlider.owlCarousel({
        items:3,
        loop:true,
        margin:0,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true
    });

    var BeautyShopSlider = $("#beauty-shop-img");
    BeautyShopSlider.owlCarousel({
        items:3,
        loop:true,
        margin:0,
        autoplay:true,
        autoplayTimeout:1500,
        autoplayHoverPause:true
    });

    var DevicesShopSlider = $("#device-shop-img");
    DevicesShopSlider.owlCarousel({
        items:3,
        loop:true,
        margin:0,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true
    });


    $('#cap-product').click(function() {



    });



});




