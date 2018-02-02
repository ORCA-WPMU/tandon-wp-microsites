export function main() {

      var $wrapper = $("#wrapper, #menu, header.banner, .event-details"),
             $this = $(this),
        $accordian = $('#accordion .card'),
           $header = $("header"),
          $headpad = $("#headpad"),
          $sidenav = $(".show-subnav"),
  $buttonhamburger = $("button.hamburger"),
           $window = $(window);


  $buttonhamburger.click(function() {

    toggleNav();

    toggleButtonActiveState();

  });



  // $('#sidebar-wrapper li a').on('click', function(){

  //   toggleButtonActiveState();

  //   toggleNav();


  // });



  function toggleButtonActiveState() {

    $buttonhamburger.toggleClass('is-active');

  }

  function toggleNav() {

    $wrapper.toggleClass('showNav');
          //$header.addClass("shrink");

    if (($(window).innerWidth() < 460)) {

      $header.toggleClass("shrink");

    }

    if ($header.offset().top < -50) {

      $header.toggleClass("shrink");

    }

    if ($('#menu').hasClass('open')) {

      $header.addClass("shrink");

    }

  }


  $sidenav.click(function() {

    toggleSubNav();

  });


  function toggleSubNav() {

    $(".sidebar-nav .subnav").toggleClass('show-submenu');

  }


  $(".sidebar-nav li a").on('click', function() {

        $('.active').removeClass('active');

        $(this).addClass('active');

  });




  function scrollIt() {

    $window.scroll(function () {

      var scroll = $window.scrollTop();

      $('.event-details').toggleClass('unstick', scroll >= $('#breaker').offset().top - 950);

      if ($header.offset().top < -50) {

          $wrapper.addClass("showNav");

          $buttonhamburger.addClass("is-active");

      } else {

          // ********************************** //
          // ****** hides menu on scroll ****** //
          // ********************************** //

          // $wrapper.removeClass("showNav");

          // $buttonhamburger.removeClass("is-active");

          // ********************************** //
          // ********************************** //
          // ********************************** //

          $('#subnav-collapse').collapse('hide');

      };

      if ($header.offset().top > 50) {

          $header.addClass("shrink");

      } else {

          $header.removeClass("shrink");

      };

      if ($('#menu').offset().top > 50) {

        $('#menu').addClass("open");

      } else {

        $('#menu').removeClass("open");

      }

    });

  }


  $('#subnav-collapse').on('show.bs.collapse', function () {

    $(".plus").addClass('open');

    toggleNav();

    toggleButtonActiveState();

  });


  $('#subnav-collapse').on('hide.bs.collapse', function () {

    $(".plus").removeClass('open');

  });


  $('#subnav-collapse').on('hidden.bs.collapse', function () {

    $(".sidebar-nav li a").removeClass('active');

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




  $('a.anchor, a.about-more, a.scroll-button').click(function(e){

    toggleNav();

    toggleButtonActiveState();

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


  // makes the parallax elements
  function parallaxIt() {

    // create variables

    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // on window scroll event
    $window.on('scroll resize', function() {

      scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    });

    // for each of content parallax element
    $('[data-type="content"]').each(function (index, e) {

      var $contentObj = $(this);
      var fgOffset = parseInt($contentObj.offset().top);
      var yPos;
      var speed = ($contentObj.data('speed') || 1 );

      $window.on('scroll resize', function (){

        yPos = fgOffset - scrollTop / speed;

        $contentObj.css('top', yPos);

      });

    });

    // for each of background parallax element
    $('[data-type="background"]').each(function(){

      var $backgroundObj = $(this);
      var bgOffset = parseInt($backgroundObj.offset().top);
      var yPos;
      var coords;
      var speed = ($backgroundObj.data('speed') || 0 );

      $window.on('scroll resize', function() {

        yPos = - ((scrollTop - bgOffset) / speed);

        coords = '40% '+ yPos + 'px';

        $backgroundObj.css({ backgroundPosition: coords });

      });

    });

    $window.trigger('scroll');

  };

  parallaxIt();

  scrollIt();

  toggleNavActive();

};
