export function main() {


  $('main .woocommerce').addClass('orient');
  //$('.orient-div .row').removeClass('row');

  //sidebar vas
  // $('.card').mouseenter(function(e) {
  //     e.preventDefault();
  //     $(this).find('.card-img-overlay').removeClass("d-none");
  // });
  // $('.card').mouseleave(function(e) {
  //     e.preventDefault();
  //     $(this).find('.card-img-overlay').addClass("d-none");
  // });

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

  // $('.anchor').click(function(e){

  //     e.preventDefault();

  //     //in case search shelf is open

  //     var id = $(this).attr("href");

  //     var offset = $(id).offset();

  //     $("html, body").animate({

  //       scrollTop: offset.top - 80,

  //     }, 300);

  // });



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




// $('a.read-more').click(function(){
//   var $this = $(this);


//   //$this.parent().prev('.showmore').slideToggle('fast');
//   $this.parents().prev(".readmore").toggleClass("reveal-text");
//   $this.parents().prevAll(".elipsis").toggleClass("d-none");
//   $this.toggleClass('reveal');
//   if($this.hasClass('reveal')){
//       $this.text('Read Less');
//   } else {
//       $this.text('Read More');
//   }

// });



// $('.carousel').carousel()
//   pause: hover,
//   ride: false,
// };



// $('#readmore').on('hidden.bs.collapse', function () {
//   // do something…
// })

  // $('#myBlock').vide('./video/waves.mp4', {

  //   volume: 1,
  //   playbackRate: 1,
  //   muted: true,
  //   loop: true,
  //   autoplay: true,
  //   position: '50% 50%', // Similar to the CSS `background-position` property.
  //   posterType: 'none', // Poster image type. "detect" — auto-detection; "none" — no poster; "jpg", "png", "gif",... - extensions.
  //   resizing: true, // Auto-resizing, read: https://github.com/VodkaBears/Vide#resizing
  //   bgColor: 'transparent', // Allow custom background-color for Vide div,
  //   className: 'bkgVideo' // Add custom CSS class to Vide div

  // });

  // $( ".add_to_cart_button:contains('Select options')" ).addClass( "options" );

  $('.nav.nav-tabs a:first').tab('show')

  $('button.hamburger').on('click', function(){

    $(this).toggleClass('is-active');

  });


  $('#sidebar-wrapper li a').on('click', function(){

    $('button.hamburger').toggleClass('is-active');

  });

  // $('a.read-more').click(function(){
  //   var $this = $(this);


  //   $this.parent().prev('.showmore').slideToggle('slow');
  //   $this.parents().prevAll(".elipsis").toggleClass("d-none");
  //   $this.toggleClass('reveal');
  //   if($this.hasClass('reveal')){
  //       $this.text('Read Less');
  //   } else {
  //       $this.text('Read More');
  //   }
  // });

// var text = $('.text-overflow'),
//      btn = $('.btn-overflow'),
//        h = text[0].scrollHeight; 

// if(h > 120) {
//   btn.addClass('less');
//   btn.css('display', 'block');
// }

// btn.on(this, "click", function(e)
// {
//   //e.stopPropagation();

//   if (btn.hasClass('less')) {
//       btn.removeClass('less');
//       btn.addClass('more');
//       btn.text('Show less');

//       text.animate({'height': h});
//   } else {
//       btn.addClass('less');
//       btn.removeClass('more');
//       btn.text('Show more');
//       text.animate({'height': '120px'});
//   }
// });

$(window).scroll(function (event) {

    var scroll = $(window).scrollTop();

    $('.event-details').toggleClass('passed', scroll >= $('#about-us').offset().top

    );

});

$(window).scroll();

  $('a.how-help, .scroll a, ul.main-menu a').click(function(e){

      e.preventDefault();

      //in case search shelf is open

      var id = $(this).attr("href");

      var offset = $(id).offset();

      $("html, body").animate({

        scrollTop: offset.top - 40,

      }, 300);

  });

  $('a.scroll-button').click(function(e){

      e.preventDefault();

      //in case search shelf is open

      var id = $(this).attr("href");

      var offset = $(id).offset();

      $("html, body").animate({

        scrollTop: offset.top - 40,

      }, 300);

  });

};
