$(document).ready(function () {
  $(".testmonial-carousel").owlCarousel({
    loop: true,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    center: true,
    smartSpeed: 600,
    responsive: {
      0: {
        items: 1,
        margin: 20,
        stagePadding: 40
      },
      768: {
        items: 2,
        margin: 30,
        stagePadding: 20
      },
      1024: {
        items: 3,
        margin: 25,
        stagePadding: 20
      },
      1200: {
        items: 3,
        margin: 35,
        stagePadding: 80
      },
      1600: {
        items: 3,
        margin: 50,
        stagePadding: 150
      }
    }
  });
});
