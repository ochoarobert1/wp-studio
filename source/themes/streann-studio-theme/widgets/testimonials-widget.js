(() => {
  jQuery(".testimonials-widget-component").each(function (index) {
    if (
      jQuery(
        "." +
          jQuery(this).parent().parent().attr("class").split(" ").join(".") +
          " .slick"
      ).children().length > 1
    ) {
      jQuery(".slick-testimonials").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
      });
    }
  });
})();
