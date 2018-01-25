export function main() {



      var $wrapper = $("#wrapper"),
             $this = $(this),
        $accordian = $('#accordion .card'),
           $header = $("header"),
          $headpad = $("#headpad"),
  $buttonhamburger = $("button.hamburger"),
           $window = $(window),
                $w = $window.width(),
           $winwid = parseInt($w) + 300,
              $wid = parseInt($w);



function screenClass() {

  if($(window).innerWidth() < 460) {

      $wrapper.addClass('small-screen').removeClass('big-screen');

  } else {

      $wrapper.addClass('big-screen').removeClass('small-screen');

  }

}


$("#menu-toggle").click(function(e) {

  e.preventDefault();

  setTimeout(function() {

    $wrapper.toggleClass("toggled");

    if ($wrapper.hasClass('toggled')) {

if (($(window).innerWidth() < 460)) {

      $wrapper.css({

        'min-width': $winwid,


      });

      $('header.banner').css({

        'position': 'relative',

        'height': '0'

      });

} else {

     $wrapper.css({

        'min-width': auto,


      });

      $('header.banner').css({

        'position': 'fixed',

        'height': '0'

      });

}

    } else {

      $wrapper.css({

        'min-width': 0,

        'display': 'initial'

      });

    };

  },

  200);

  $(".site-title").toggleClass("toggled");

  $headpad.toggleClass("padding");

});


screenClass();

$(window).bind('resize',function(){

  screenClass();

});


$window.scroll(function () {

  var scroll = $window.scrollTop();

  $('.event-details').toggleClass('unstick', scroll >= $('#breaker').offset().top - 950);

  if ($header.offset().top < -80) {

      $wrapper.addClass("toggled");

      $buttonhamburger.addClass("is-active");

  } else {

      $wrapper.removeClass("toggled");

      $wrapper.css({

        'min-width': $w,

        'display': 'block'

      });

      $buttonhamburger.removeClass("is-active");

  };

  if ($header.offset().top > 80) {

      $header.addClass("shrink");

  } else {

      $header.removeClass("shrink");

  };

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
