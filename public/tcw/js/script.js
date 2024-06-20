(function ($) {
  'use strict';

  // Sticky Menu
  // $(window).scroll(function () {
  //   if ($('.navigation').offset().top > 100) {
  //     $('.navigation').addClass('nav-bg');
  //   } else {
  //     $('.navigation').removeClass('nav-bg');
  //   }
  // });
  $('.slick-container').slick({
    infinite: true,
    slidesToShow: 3.5,
    slidesToScroll: 1,
    arrows: true,
    centerMode: false,
    touchThreshold:100,
    prevArrow: $('.prev'),
    nextArrow: $('.next'),
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true
        }
      },
      {
        breakpoint: 320,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
    ]
  });

})(jQuery);