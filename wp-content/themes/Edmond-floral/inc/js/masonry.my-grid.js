 

jQuery(document).ready(function ($) {
    $('.grid').masonry({
        // options
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        // fitWidth: true,
        //percentPosition: true,
        //horizontalOrder: true,
        // itemSelector: '.grid-item',
        // columnWidth: '.grid-sizer',
         percentPosition: true
    });

})