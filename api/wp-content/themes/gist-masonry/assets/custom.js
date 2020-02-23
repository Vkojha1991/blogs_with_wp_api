jQuery('document').ready(function ($){
    if ( jQuery('.ct-carousel').length > 0 ) {
        $(".ct-carousel").slick({
            dots: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            autoplay: true,
            lazyLoad: 'ondemand',
            responsive: [
                {
                    breakpoint: 1023,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    }
});
jQuery(window).load(function($) {
    if ( jQuery('.gist-masonry-container').length > 0 ) {
        var $container = jQuery('.gist-masonry-container');
        // initialize
        $container.masonry({
            itemSelector: '.ct-col-2',
                columnWidth: '.ct-col-2',
                percentPosition: true
        });
    }
});