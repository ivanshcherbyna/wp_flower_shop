jQuery(document).ready(function($) {//activate selected image for by from ajax


    $(".upsell-image").click(function (e) {
        e.preventDefault();
        $('.wrap-opt-imgs a').removeClass('active');

        $(this).addClass('active');
    })
})
jQuery(document).ready(function($) {//get all params & call ajax.get method
            $(".single_add_to_cart_button.button.alt").click(function (e) {

            var product_id = $('.wrap-opt-imgs a.active').find('input[name="upsell-prouct-id"]').val();
            var id = parseInt(product_id);
            var quantity = '1';
            var url = $('.wrap-opt-imgs a.active').find('input[name="url-add-to-cart"]').val();
            var quan = parseInt(quantity); // hardcode 1 quantity
            var product_id = parseInt(product_id);

            if(!isNaN(product_id && url && quan)) {
                console.log('have product_id && url && quan');
                addToCart(id, url, quan);
            }else {
                $('form.cart').submit();
                return true; // because dont recieve form without this return if not option
            };

            return false;
        });


    function addToCart(id,url,quantity) {//get method ajax
        $.get(url + id +'&quantity=' + quantity, function()

        {
           // console.log('Well Done! Your upsell product in cart!');
        })
            .done(function(){ $('form.variations_form.cart').submit()}) //because dont recieve form without this .done (prop of GET)
    }

})
//AJAX UPDATE PRODUCTS VIEW BY CLICK ON SLIDER
jQuery(document).ready(function ($) { // get arguments & call ajax method
    $('.current-slide-button').on('click', function (e) {
        e.preventDefault();
        var currentSlug = $(this).attr('data');
        var url = $(this).next().attr('data');
        if(currentSlug!==null && url!==null) {
            $('.catalog-items-wrap').animate({opacity: "0.2" }, 100, "linear");

            $("body, html").animate({ //SCROLL DISPLAY TO NEX SHOW DIV CATALOG
                scrollTop: $('.catalog-items-wrap').offset().top - 0 // GET TOP OF OFFSET PARAMS OF ELEMENT
            }, 'slow');
            updateSlug(currentSlug, url);
        }
        else {
            console.log('Sorry... empty values!');
            return false;
        }
    })

});

function updateSlug(slug, url) { // AJAX METHOD
    $.get(url + '?current_product_tag=' + slug) // send request

        .done(function(data){
            //$(window).attr('location', url + '?current_product_tag=' + slug); // reload all page with arguments

            var $data = $(data); // STRING CONVERT TO OBJECT for use to get new element
            //data - is string at first
            //$data - is object now to use
            $('.catalog-items-wrap').html($data.find('.catalog-items-wrap').html()).animate({opacity: "1" }, 100, "linear", function () {
                $('.grid').masonry({ //STYLING BY MASONRY LIB AFTER SUCCESS AJAX
                    // options
                    itemSelector: '.grid-item',
                    columnWidth: '.grid-sizer',
                    // fitWidth: true,
                    // horizontalOrder: true
                    // itemSelector: '.grid-item',
                    // columnWidth: '.grid-sizer',
                    percentPosition: true

                });

            }); // Appened new html from object .find().html intop old div

        })


}



