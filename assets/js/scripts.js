jQuery(document).ready(function () {
    jQuery('.uap-banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        dots: true,
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                }
            }
        ]
    });
    jQuery('.uap-banner-slider').show();
});