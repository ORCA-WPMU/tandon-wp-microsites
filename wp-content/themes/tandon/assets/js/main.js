export function main() {



      var $wrapper = $("#wrapper, #menu, header.banner"),
             $this = $(this),
        $accordian = $('#accordion .card'),
           $header = $("header"),
          $headpad = $("#headpad"),
  $buttonhamburger = $("button.hamburger"),
           $window = $(window);


  $buttonhamburger.click(function() {

    toggleNav();

  });


  function toggleNav() {

    $wrapper.toggleClass('showNav');

    if (($(window).innerWidth() < 460)) {

      $header.toggleClass("shrink");

    }

    if ($header.offset().top < -80) {

      $header.toggleClass("shrink");

    }

    if ($('#menu').hasClass('open')) {

      $header.addClass("shrink");

    }

  }



  $window.scroll(function () {

      var scroll = $window.scrollTop();

      $('.event-details').toggleClass('unstick', scroll >= $('#breaker').offset().top - 950);

      if ($header.offset().top < -80) {

          $wrapper.addClass("showNav");

          $buttonhamburger.addClass("is-active");

      } else {

          $wrapper.removeClass("showNav");

          $buttonhamburger.removeClass("is-active");

      };

      if ($header.offset().top > 80) {

          $header.addClass("shrink");

      } else {

          $header.removeClass("shrink");

      };


    if ($('#menu').offset().top > 180) {
      $('#menu').addClass("open");


    } else {

      $('#menu').removeClass("open");

    }


  });



  $('table').addClass('table-responsive');



  $accordian.on('show.bs.collapse', function () {

    $this.addClass('is-active');

  });




  $accordian.on('hide.bs.collapse', function () {

    $this.removeClass('is-active');

  });



  $('#topAlert').on('closed.bs.alert', function () {

    $('.banner').removeClass('if_alert');

  });


  $("#menu-toggle").click(function(e) {

    e.preventDefault();

    $wrapper.toggleClass("toggled");

    $(".site-title").toggleClass("toggled");

    $headpad.toggleClass("padding");

  });



  $("#sidebar-wrapper li a").click(function(e) {

    $wrapper.toggleClass("toggled");

    $headpad.toggleClass("padding");

  });



  $('a.read-more').click(function(){

    var $this = $this;

    $(this).parents().prev(".readmore").toggleClass("reveal-text");

    $(this).parents().prevAll(".elipsis").toggleClass("d-none");

    $(this).toggleClass('reveal');

    if($(this).hasClass('reveal')){

      $(this).text('Read Less');

    } else {

      $(this).text('Read More');

    }

  });


  $('a.show-more').click(function(){

    var $this = $this;

    $(this).parents().prev(".showmore").toggleClass("reveal-posts");

    $(this).toggleClass('reveal');

    if($(this).hasClass('reveal')){

      $(this).html('<span>Show Less </span>');

      $(this).removeClass("fa-chevron-down");

      $(this).toggleClass("fa-chevron-up");

    } else {

      $(this).html('<span>Show More </span>');

      $(this).addClass("fa-chevron-down");

      $(this).removeClass("fa-chevron-up");

    }

  });



  $buttonhamburger.hover(function(e){

    e.preventDefault();

    $(this).toggleClass('menu-hover');

  });



  $buttonhamburger.on('click', function(){

    $(this).toggleClass('is-active');

  });



  $('#sidebar-wrapper li a').on('click', function(){

    $buttonhamburger.toggleClass('is-active');

  });



  $('a.anchor, a.about-more, a.scroll-button').click(function(e){

      var id = $(this).attr("href");

      var offset = $(id).offset();

      if($('a.about-more')){

        e.preventDefault();

        $("html, body").animate({

          scrollTop: offset.top - 41,

        }, 300);

      } else {

        $("html, body").animate({

          scrollTop: offset.top - 41,

        }, 300);

      }

  });

};
