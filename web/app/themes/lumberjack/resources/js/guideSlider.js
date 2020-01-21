import $ from 'jquery';
import slick from 'slick-carousel';

$('.guide-slider__wrap').slick({
    lazyLoad: 'ondemand',
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    autoplay: true,
    cssEase: 'ease',
    responsive: [
        {
            breakpoint: 1023,
            settings: {
                arrows: false,
                centerMode: false,
                slidesToShow: 1
            }
    }
    ]
});
