import $ from 'jquery';
import SmoothScroll from 'smooth-scroll';

require('./guideSlider');

let scroll = new SmoothScroll('a[href*="#');

if ($('video')) {
    $("video").prop("volume", 0.1);
}

$('.burger').click(function (e) {
    e.preventDefault();
    $(this).toggleClass('open');
    $('.mobile-menu').toggleClass('active');
});

$('.mobile-menu a').click(function (e) {
    $('.burger').removeClass('open');
    $('.mobile-menu').removeClass('active');
});
