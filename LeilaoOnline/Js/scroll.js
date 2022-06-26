$(window).on("scroll", function () {
      $("#scrollToTop").addClass("active");
      setTimeout(function() {
        var theta = ($(window).scrollTop() - (window.outerHeight + (window.outerHeight/2))) / 500;
        $('#scrollToTop').css({ transform: 'rotate(' + theta + 'rad)' });
      })
    
  });