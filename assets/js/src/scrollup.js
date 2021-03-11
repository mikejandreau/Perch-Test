// main.js







// JQUERY USE STRICT SCRIPT WRAPPER
// scroll easing, scrollspy, fancybox, and isotope - comment what isn't needed, or add more
(function($) {
  "use strict"; // Start of use strict

  // MOBILE MENU TOGGLE
  // toggle the mobile menu button open and closed states
  var removeClass = true;
  $(".navbar-toggler").click(function () {
    $(".navbar-toggler").toggleClass('is-active');
    removeClass = false;
  });

  // ignore clicking the navbar
  $(".navbar").click(function() {
    removeClass = false;
  });

  // close nav if page is clicked
  $("html").click(function () {
    if (removeClass) {
      $(".navbar-toggler").removeClass('is-active');
      $('.navbar-collapse').collapse('hide');  
    }
    removeClass = true;
  });

  // closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $(".navbar-toggler").removeClass('is-active');
    $('.navbar-collapse').collapse('hide');
  });

  // // closes responsive menu when a navbar link is clicked
  // $('.js-scroll-trigger > a').click(function() {
  //   $(".navbar-toggler").removeClass('is-active');
  //   $('.navbar-collapse').collapse('hide');
  // });

  // disable mobile nav for laptop and desktop
  $(window).resize(function() {
    if( $(this).width() > 991 ) {
      $(".navbar-toggler").removeClass('is-active');
      $('.navbar-collapse').collapse('hide');  
    }
  });


  // // SCROLLUP BUTTON
  // // show scrollup button after scrolling 300px
  // scrollToTopButton = document.getElementById("scrollUpButton");
  // var showScrollToTop = function () {
  //   var y = window.scrollY;
  //   if (y >= 300) {
  //     scrollToTopButton.className = "scrollup show"
  //   } else {
  //     scrollToTopButton.className = "scrollup"
  //   }
  // };
  // window.addEventListener("scroll", showScrollToTop);

  $(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 300) {
      $("#scrollUpButton").addClass("show");
    } else {
      $("#scrollUpButton").removeClass("show");
    }
  });


// Smooth scrolling using jQuery easing
$('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if (target.length) {
      $('html, body').animate({
        scrollTop: (target.offset().top - 56) // match px to padding-top of body tag
      }, 1000, "easeInOutExpo");
      return false;
    }
  }
});


// Smooth scrolling using jQuery easing
$('.js-scroll-trigger>a[href*="#"]:not([href="#"])').click(function() {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if (target.length) {
      $('html, body').animate({
        scrollTop: (target.offset().top - 56) // match px to padding-top of body tag
      }, 1000, "easeInOutExpo");
      return false;
    }
  }
});



// Make sure scripts rendered
$(document).ready(function (){
  console.log('document is ready, aww yeah');
});



})(jQuery); // End of use strict

