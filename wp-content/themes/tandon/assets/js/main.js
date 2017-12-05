export function main() {


  $('main .woocommerce').addClass('orient');
  //$('.orient-div .row').removeClass('row');



  //sidebar vas
  $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
      $(".site-title").toggleClass("toggled");
      $("#headpad").toggleClass("padding");
  });

  $("#sidebar-wrapper li a").click(function(e) {
      $("#wrapper").toggleClass("toggled");
      $("#headpad").toggleClass("padding");
  });


$(window).scroll(function() {

  if ($("header").offset().top > 220) {

      $("header").addClass("shrink");

  } else {

      $("header").removeClass("shrink");

  }

});




$(window).scroll(function() {

  if ($("header").offset().top < -200) {

      $("#wrapper").addClass("toggled");

      $("button.hamburger").addClass("is-active");

  } else {

      $("#wrapper").removeClass("toggled");

      $("button.hamburger").removeClass("is-active");

  }

});


  $('.nav.nav-tabs a:first').tab('show')

  $('button.hamburger').on('click', function(){

    $(this).toggleClass('is-active');

  });


  $('#sidebar-wrapper li a').on('click', function(){

    $('button.hamburger').toggleClass('is-active');

  });

$(window).scroll(function (e) {

    var scroll = $(window).scrollTop();

    $('.event-details').toggleClass('passed', scroll >= $('#contact').offset().top

    );

});

$(window).scroll();

  $('a.anchor').click(function(e){

      e.preventDefault();

      //in case search shelf is open

      var id = $(this).attr("href");

      var offset = $(id).offset();

      $("html, body").animate({

        scrollTop: offset.top - 85,

      }, 300);

  });

};
