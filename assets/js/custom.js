/* Ambons HTML5 Template  */

/************ TABLE OF CONTENTS ***************
01. Owl carousel slider
02. Sticky header
03. Prealoader
04. Language switcher
05. PrettyPhoto
06. BrandCarousel
07. Testimonial carousel
08. ScrollToTop 
09. Cart Touch Spin
10. PriceFilter
11. Cart touch spin
12. Fancybox activator
13. ContactFormValidation
14. Scoll to target
15. PrettyPhoto

**********************************************/

"use strict";

const ROOT_URL = "http://localhost:82/dashboard/rapidrescue/";

//Hide Loading Box (Preloader)
function handlePreloader() {
  if ($(".loader-wrap").length) {
    $(".loader-wrap").delay(1000).fadeOut(500);
  }
}

if ($(".preloader-close").length) {
  $(".preloader-close").on("click", function () {
    $(".loader-wrap").delay(200).fadeOut(500);
  });
}

//Submenu Dropdown Toggle
if ($(".main-header li.dropdown ul").length) {
  $(".main-header .navigation li.dropdown").append(
    '<div class="dropdown-btn"><span class="fa fa-angle-right"></span></div>'
  );
}

//Mobile Nav Hide Show
if ($(".mobile-menu").length) {
  $(".mobile-menu .menu-box").mCustomScrollbar();

  var mobileMenuContent = $(".main-header .nav-outer .main-menu").html();
  $(".mobile-menu .menu-box .menu-outer").append(mobileMenuContent);
  $(".sticky-header .main-menu").append(mobileMenuContent);

  //Dropdown Button
  $(".mobile-menu li.dropdown .dropdown-btn").on("click", function () {
    $(this).toggleClass("open");
    $(this).prev("ul").slideToggle(500);
  });

  //Dropdown Button
  $(".mobile-menu li.dropdown .dropdown-btn").on("click", function () {
    $(this).prev(".megamenu").slideToggle(900);
  });

  //Menu Toggle Btn
  $(".mobile-nav-toggler").on("click", function () {
    $("body").addClass("mobile-menu-visible");
  });

  //Menu Toggle Btn
  $(".mobile-menu .menu-backdrop,.mobile-menu .close-btn").on(
    "click",
    function () {
      $("body").removeClass("mobile-menu-visible");
    }
  );
}

// Scroll to a Specific Div
if ($(".scroll-to-target").length) {
  $(".scroll-to-target").on("click", function () {
    var target = $(this).attr("data-target");
    // animate
    $("html, body").animate(
      {
        scrollTop: $(target).offset().top,
      },
      1000
    );
  });
}

//Parallax Scene for Icons
if ($(".parallax-scene-1").length) {
  var scene = $(".parallax-scene-1").get(0);
  var parallaxInstance = new Parallax(scene);
}
if ($(".parallax-scene-2").length) {
  var scene = $(".parallax-scene-2").get(0);
  var parallaxInstance = new Parallax(scene);
}
if ($(".parallax-scene-3").length) {
  var scene = $(".parallax-scene-3").get(0);
  var parallaxInstance = new Parallax(scene);
}
if ($(".parallax-scene-4").length) {
  var scene = $(".parallax-scene-4").get(0);
  var parallaxInstance = new Parallax(scene);
}
if ($(".parallax-scene-5").length) {
  var scene = $(".parallax-scene-5").get(0);
  var parallaxInstance = new Parallax(scene);
}

//Add One Page nav
if ($(".scroll-nav").length) {
  $(".scroll-nav").onePageNav();
}

// Cart Touch Spin
if ($(".quantity-spinner").length) {
  $("input.quantity-spinner").TouchSpin({
    verticalbuttons: true,
  });
}

//Update Header Style and Scroll to Top
function headerStyle() {
  if ($(".main-header").length) {
    var windowpos = $(window).scrollTop();
    var siteHeader = $(".main-header");
    var scrollLink = $(".scroll-top");
    if (windowpos >= 350) {
      siteHeader.addClass("fixed-header");
      scrollLink.fadeIn(300);
    } else {
      siteHeader.removeClass("fixed-header");
      scrollLink.fadeOut(300);
    }
  }
}
headerStyle();

// Isotop Layout
function isotopeBlock() {
  if ($(".isotope-block").length) {
    var $grid = $(".isotope-block").isotope();
  }
}

isotopeBlock();

//Bottom Parallax
function bottomParallax() {
  if ($(".bottom-parallax").length) {
    var windowpos = $(window).scrollTop();
    var siteFooter = $(".footer-area").height();
    var sitebodyHeight = $(".boxed_wrapper").height();
    var finalHeight = sitebodyHeight - siteFooter - 1000;
    if (windowpos >= finalHeight) {
      $("body").addClass("parallax-visible");
    } else {
      $("body").removeClass("parallax-visible");
    }
  }
}

function beforeAfterTwentyTwenty() {
  if ($(".before-after-twentytwenty").length) {
    $(".before-after-twentytwenty").each(function () {
      var Self = $(this);
      var objName = Self.attr("id");
      $("#" + objName).twentytwenty();

      // hack for bs tab
      $(document).on("shown.bs.tab", 'a[data-toggle="tab"]', function (e) {
        var paneTarget = $(e.target).attr("data-target");
        var $thePane = $(".tab-pane" + paneTarget);
        var twentyTwentyContainer = "#" + objName;
        var twentyTwentyHeight = $thePane.find(twentyTwentyContainer).height();
        if (0 === twentyTwentyHeight) {
          $thePane.find(twentyTwentyContainer).trigger("resize");
        }
      });
    });
  }
}

//Fact counter
function CounterNumberChanger() {
  var timer = $(".timer");
  if (timer.length) {
    timer.appear(function () {
      timer.countTo();
    });
  }
}

// ===Project===
function projectMasonaryLayout() {
  if ($(".masonary-layout").length) {
    $(".masonary-layout").isotope({
      layoutMode: "masonry",
    });
  }
  if ($(".post-filter").length) {
    $(".post-filter li")
      .children(".filter-text")
      .on("click", function () {
        var Self = $(this);
        var selector = Self.parent().attr("data-filter");
        $(".post-filter li").removeClass("active");
        Self.parent().addClass("active");
        $(".filter-layout").isotope({
          filter: selector,
          animationOptions: {
            duration: 500,
            easing: "linear",
            queue: false,
          },
        });
        return false;
      });
  }

  if ($(".post-filter.has-dynamic-filters-counter").length) {
    // var allItem = $('.single-filter-item').length;
    var activeFilterItem = $(".post-filter.has-dynamic-filters-counter").find(
      "li"
    );
    activeFilterItem.each(function () {
      var filterElement = $(this).data("filter");
      var count = $(".filter-layout").find(filterElement).length;
      $(this)
        .children(".filter-text")
        .append('<span class="count">' + count + "</span>");
    });
  }
}

// ===Image Hover Script===
function onHoverthreeDmovement() {
  var tiltBlock = $(".js-tilt");
  if (tiltBlock.length) {
    $(".js-tilt").tilt({
      maxTilt: 20,
      perspective: 700,
      glare: true,
      maxGlare: 0,
    });
  }
}

// Tab Box
function tabBox() {
  if ($(".tabs-box").length) {
    $(".tabs-box .tab-buttons .tab-btn").on("click", function (e) {
      e.preventDefault();
      var target = $($(this).attr("data-tab"));

      if ($(target).is(":visible")) {
        return false;
      } else {
        target
          .parents(".tabs-box")
          .find(".tab-buttons")
          .find(".tab-btn")
          .removeClass("active-btn");
        $(this).addClass("active-btn");
        target
          .parents(".tabs-box")
          .find(".tabs-content")
          .find(".tab")
          .fadeOut(0);
        target
          .parents(".tabs-box")
          .find(".tabs-content")
          .find(".tab")
          .removeClass("active-tab");
        $(target).fadeIn(300);
        $(target).addClass("active-tab");
      }
    });
  }
}

// page direction
function directionswitch() {
  if ($(".page_direction").length) {
    $(".direction_switch button").on("click", function () {
      $(".boxed_wrapper").toggleClass(function () {
        return $(this).is(".rtl, .ltr") ? "rtl ltr" : "rtl";
      });
    });
  }
}

// Color switcher
function swithcerMenu() {
  if ($(".switch_menu").length) {
    $(".switch_btn button").on("click", function () {
      $(".switch_menu").toggle(500);
    });

    $("#styleOptions").styleSwitcher({
      hasPreview: true,
      fullPath: "assets/css/color/",
      cookie: {
        expires: 30,
        isManagingLoad: true,
      },
    });
  }
}

// Date picker
function datepicker() {
  if ($("#datepicker").length) {
    $("#datepicker").datepicker();
  }
}

// Price Filter
function priceFilter() {
  if ($(".price-ranger").length) {
    $(".price-ranger #slider-range").slider({
      range: true,
      min: 10,
      max: 200,
      values: [11, 99],
      slide: function (event, ui) {
        $(".price-ranger .ranger-min-max-block .min").val("$" + ui.values[0]);
        $(".price-ranger .ranger-min-max-block .max").val("$" + ui.values[1]);
      },
    });
    $(".price-ranger .ranger-min-max-block .min").val(
      "$" + $(".price-ranger #slider-range").slider("values", 0)
    );
    $(".price-ranger .ranger-min-max-block .max").val(
      "$" + $(".price-ranger #slider-range").slider("values", 1)
    );
  }
}

//===Language switcher===
function languageSwitcher() {
  if ($("#polyglot-language-options").length) {
    $("#polyglotLanguageSwitcher").polyglotLanguageSwitcher({
      effect: "slide",
      animSpeed: 500,
      testMode: true,
      onChange: function (evt) {
        alert("The selected language is: " + evt.selectedItem);
      },
    });
  }
}

/////////////////////////////
//Universal Code for All Owl Carousel Sliders
/////////////////////////////

if ($(".theme_carousel").length) {
  $(".theme_carousel").each(function (index) {
    var $owlAttr = {},
      $extraAttr = $(this).data("options");
    $.extend($owlAttr, $extraAttr);

    $(this).owlCarousel($owlAttr);
  });
}

if ($(".thm-owl__carousel--custom-nav").length) {
  $(".thm-owl__carousel--custom-nav").each(function () {
    let elm = $(this);
    let owlNavPrev = elm.data("owl-nav-prev");
    let owlNavNext = elm.data("owl-nav-next");
    $(owlNavPrev).on("click", function (e) {
      elm.trigger("prev.owl.carousel");
      e.preventDefault();
    });

    $(owlNavNext).on("click", function (e) {
      elm.trigger("next.owl.carousel");
      e.preventDefault();
    });
  });
}

// Main Slider Carousel
if ($(".banner-carousel").length) {
  $(".banner-carousel").owlCarousel({
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    loop: true,
    margin: 0,
    dots: true,
    nav: true,
    singleItem: true,
    smartSpeed: 500,
    autoplay: true,
    autoplayTimeout: 9000,
    navText: [
      '<span class="icon-right-arrow"></span>',
      '<span class="icon-right-arrow right"></span>',
    ],
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1024: {
        items: 1,
      },
    },
  });
}

//  Partner Carousel
if ($(".partner-carousel").length) {
  $(".partner-carousel").owlCarousel({
    loop: true,
    margin: 20,
    dots: false,
    nav: false,
    stagePadding: 0,
    singleItem: true,
    smartSpeed: 500,
    autoplay: true,
    autoplayTimeout: 6000,
    navText: [
      '<span class="flaticon-next left"></span>',
      '<span class="flaticon-next right"></span>',
    ],
    responsive: {
      0: {
        items: 1,
      },
      500: {
        items: 2,
      },
      768: {
        items: 2,
      },
      992: {
        items: 3,
      },
      1200: {
        items: 4,
      },
      1300: {
        items: 5,
      },
    },
  });
}

// Vegas Slider
if ($(".slider-bg-slide").length) {
  $(".slider-bg-slide").each(function () {
    var Self = $(this);
    var bgSlideOptions = Self.data("options");
    var bannerTwoSlides = Self.vegas(bgSlideOptions);
  });
}

//Accordion Box
if ($(".accordion-box").length) {
  $(".accordion-box").on("click", ".acc-btn", function () {
    var outerBox = $(this).parents(".accordion-box");
    var target = $(this).parents(".accordion");

    if ($(this).hasClass("active") !== true) {
      $(outerBox).find(".accordion .acc-btn").removeClass("active");
    }

    if ($(this).next(".acc-content").is(":visible")) {
      return false;
    } else {
      $(this).addClass("active");
      $(outerBox).children(".accordion").removeClass("active-block");
      $(outerBox).find(".accordion").children(".acc-content").slideUp(300);
      target.addClass("active-block");
      $(this).next(".acc-content").slideDown(300);
    }
  });
}

if ($(".dial").length) {
  $(".dial").appear(
    function () {
      var elm = $(this);
      var color = elm.attr("data-fgColor");
      var perc = elm.attr("value");
      elm.knob({
        value: 0,
        min: 0,
        max: 100,
        skin: "tron",
        readOnly: true,
        thickness: 0.05,
        dynamicDraw: true,
        displayInput: false,
      });
      $({
        value: 0,
      }).animate(
        {
          value: perc,
        },
        {
          duration: 2000,
          easing: "swing",
          progress: function () {
            elm.val(Math.ceil(this.value)).trigger("change");
          },
        }
      );
      $(this).append(function () {});
    },
    {
      accY: 20,
    }
  );
}

//Progress Bar / Levels
if ($(".progress-levels .progress-box .bar-fill").length) {
  $(".progress-box .bar-fill").each(
    function () {
      $(".progress-box .bar-fill").appear(function () {
        var progressWidth = $(this).attr("data-percent");
        $(this).css("width", progressWidth + "%");
      });
    },
    {
      accY: 0,
    }
  );
}

//Fact Counter + Text Count
if ($(".count-box").length) {
  $(".count-box").appear(
    function () {
      var $t = $(this),
        n = $t.find(".count-text").attr("data-stop"),
        r = parseInt($t.find(".count-text").attr("data-speed"), 10);

      if (!$t.hasClass("counted")) {
        $t.addClass("counted");
        $({
          countNum: $t.find(".count-text").text(),
        }).animate(
          {
            countNum: n,
          },
          {
            duration: r,
            easing: "linear",
            step: function () {
              $t.find(".count-text").text(Math.floor(this.countNum));
            },
            complete: function () {
              $t.find(".count-text").text(this.countNum);
            },
          }
        );
      }
    },
    {
      accY: 0,
    }
  );
}

//====== Magnific Popup
$(".video-popup").magnificPopup({
  type: "iframe",
  // other options
});

//LightBox / Fancybox
if ($(".lightbox-image").length) {
  $(".lightbox-image").fancybox({
    openEffect: "fade",
    closeEffect: "fade",

    youtube: {
      controls: 0,
      showinfo: 0,
    },

    helpers: {
      media: {},
    },
  });
}

if ($(".paroller").length) {
  $(".paroller").paroller({
    factor: -0.1, // multiplier for scrolling speed and offset, +- values for direction control
    factorLg: -0.1, // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control
    type: "foreground", // background, foreground
    direction: "vertical", // vertical, horizontal
  });
}

if ($(".paroller-2").length) {
  $(".paroller-2").paroller({
    factor: 0.05, // multiplier for scrolling speed and offset, +- values for direction control
    factorLg: 0.05, // multiplier for scrolling speed and offset if window width is less than 1200px, +- values for direction control
    type: "foreground", // background, foreground
    direction: "horizontal", // vertical, horizontal
  });
}

// Elements Animation
if ($(".wow").length) {
  var wow = new WOW({
    boxClass: "wow", // animated element css class (default is wow)
    animateClass: "animated", // animation css class (default is animated)
    offset: 0, // distance to the element when triggering the animation (default is 0)
    mobile: false, // trigger animations on mobile devices (default is true)
    live: true, // act on asynchronously loaded content (default is true)
  });
  wow.init();
}

// AOS Animation
if ($("[data-aos]").length) {
  AOS.init({
    duration: "1000",
    disable: "false",
    easing: "ease",
    mirror: true,
  });
}

//Contact Form Validation
if ($("#contact-form").length) {
  $("#contact-form").validate({
    submitHandler: function (form) {
      var form_btn = $(form).find('button[type="submit"]');
      var form_result_div = "#form-result";
      $(form_result_div).remove();
      form_btn.before(
        '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
      );
      var form_btn_old_msg = form_btn.html();
      form_btn.html(form_btn.prop("disabled", true).data("loading-text"));

      // Perform the AJAX request
      $.ajax({
        url: "logic/contactform-logic.php", // Path to the logic PHP file
        type: "POST",
        data: $(form).serialize(), // Serialize the form data
        dataType: "json", // Expect JSON response
        success: function (data) {
          // Reset form fields if submission is successful
          if (data.status === "true") {
            $(form).find(".form-control").val(""); // Clear form fields
            form.reset(); // Clear all form fields
          }

          // Enable the button and restore its original text
          form_btn.prop("disabled", false).html(form_btn_old_msg);

          // Display success or error message
          $(form_result_div).html(data.message).fadeIn("slow");
          setTimeout(function () {
            $(form_result_div).fadeOut("slow");
          }, 6000);
        },
        error: function () {
          // Handle error
          $(form_result_div)
            .html("Something went wrong. Please try again.")
            .fadeIn("slow");
          setTimeout(function () {
            $(form_result_div).fadeOut("slow");
          }, 6000);
          form_btn.prop("disabled", false).html(form_btn_old_msg);
        },
      });
    },
  });
}

//Search Popup
if ($("#search-popup").length) {
  //Show Popup
  $(".search-toggler").on("click", function () {
    $("#search-popup").addClass("popup-visible");
  });
  $(document).keydown(function (e) {
    if (e.keyCode === 27) {
      $("#search-popup").removeClass("popup-visible");
    }
  });
  //Hide Popup
  $(".close-search,.search-popup .overlay-layer").on("click", function () {
    $("#search-popup").removeClass("popup-visible");
  });
}

$("select:not(.ignore)").niceSelect();

// Dom Ready Function
jQuery(document).on("ready", function () {
  (function ($) {
    // add your functions
    tabBox();
    directionswitch();
    swithcerMenu();
    CounterNumberChanger();
    onHoverthreeDmovement();
    datepicker();
    beforeAfterTwentyTwenty();
    priceFilter();
    languageSwitcher();
  })(jQuery);
});

jQuery(window).on("scroll", function () {
  (function ($) {
    headerStyle();
    bottomParallax();
  })(jQuery);
});

// Instance Of Fuction while Window Load event
jQuery(window).on("load", function () {
  (function ($) {
    handlePreloader();
    projectMasonaryLayout();
    isotopeBlock();
  })(jQuery);
});

// Handle Login Form
if ($("#loginForm").length) {
  $("#loginForm").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      url: ROOT_URL + "logic/login-logic.php", // Ensure this path is correct
      type: "POST",
      data: $(this).serialize(),
      success: function (response) {
        console.log(response);
        // Handle login success or error response here
        if (response == "admin") {
          window.location.href = ROOT_URL + "admin/index.php"; // Redirect to admin dashboard
        } else if (response == "user") {
          window.location.href = ROOT_URL + "user/index.php"; // Redirect to user dashboard
        } else if (response == "driver") {
          window.location.href = ROOT_URL + "driver/index.php"; // Redirect to driver dashboard
        } else {
          alert("login failed!"); // Display error message
        }
      },
      error: function (xhr, status, error) {
        // Handle errors if any
        alert("An error occurred: " + xhr.responseText);
      },
    });
  });
}

//Handle Register Form

if ($("#registerForm").length) {
  $("#registerForm").on("submit", function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Collect form data
    var formData = $(this).serialize();

    // Make AJAX request
    $.ajax({
      type: "POST",
      url: ROOT_URL + "logic/register-logic.php",
      data: formData,
      success: function (response) {
        if (response.success) {
          alert(response.message);
          window.location.href = ROOT_URL + "login.php?role=user"; // Change to your login page URL
        } else {
          alert(response.message);
        }
      },
      error: function (xhr, status, error) {
        alert("An error occurred: " + error); // Handle error response
      },
    });
  });
}

// Handle aside bar
if ($(".sidebar .nav-link").length) {
  $(".sidebar .nav-link").on("click", function (e) {
    var nextEl = $(this).next(); // Get the next sibling element
    var parentEl = $(this).parent(); // Get the parent element

    if (nextEl.length) {
      e.preventDefault();
      var myCollapse = new bootstrap.Collapse(nextEl[0]); // Use the DOM element

      if (nextEl.hasClass("show")) {
        myCollapse.hide();
      } else {
        myCollapse.show();
        // Find other submenus with class 'show'
        var openedSubmenu = parentEl.parent().find(".submenu.show");
        // If it exists, close all of them
        if (openedSubmenu.length) {
          new bootstrap.Collapse(openedSubmenu[0]); // Use the DOM element
        }
      }
    }
  });
}

// Handle Delete User
if ($(".delete-user").length) {
  $(".delete-user").on("click", function (e) {
    e.preventDefault(); // Prevent the default anchor behavior
    const id = $(this).data("id");
    if (confirm("Are you sure you want to delete this user?")) {
      $.ajax({
        url: ROOT_URL + "admin/logic/delete-user-logic.php", // Update with your script path
        type: "POST",
        data: { id: id },
        dataType: "json",
        success: function (response) {
          if (response.error) {
            $("#responseMessage").html(
              `<div class="alert alert-danger">${response.message}</div>`
            );
            setTimeout(function () {
              $("#responseMessage").html(""); // Clear the error message after 3 seconds
            }, 3000);
          } else {
            $("#responseMessage").html(
              `<div class="alert alert-success">${response.message}</div>`
            );
            location.reload();
          }
        },
        error: function (xhr, status, error) {
          $("#responseMessage").html(
            '<div class="alert alert-danger">Error: ' + error + "</div>"
          );
        },
      });
    }
  });
}

// Handle Add User
if ($("#add-user-form").length) {
  $("#add-user-form").on("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting the default way
    $("#responseMessage").html(
      '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
    );
    $.ajax({
      url: ROOT_URL + "admin/logic/add-user-logic.php", // URL of the PHP processing script
      type: "POST",
      data: $(this).serialize(), // Serialize the form data
      dataType: "json", // Expect a JSON response
      success: function (response) {
        if (response.error) {
          $("#responseMessage").html(
            `<div class="alert alert-danger">${response.message}</div>`
          );
          setTimeout(function () {
            $("#responseMessage").html(""); // Clear the error message after 3 seconds
          }, 3000);
        } else {
          $("#responseMessage").html(
            `<div class="alert alert-success">${response.message}</div>`
          );
          setTimeout(() => {
            window.location.href = ROOT_URL + "admin/manage-users.php";
          }, 1000);
        }
      },
      error: function (xhr, status, error) {
        // Handle error response
        $("#responseMessage").html(
          '<div class="alert alert-danger">Error: ' + error + "</div>"
        );
      },
    });
  });
}

// Handle Edit User
if ($("#editUserForm").length) {
  $("#editUserForm").on("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting the default way
    $("#responseMessage").html(
      '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
    );

    // Show loading spinner or disable the button during the request
    $("button[type=submit]").prop("disabled", true).text("Updating...");

    $.ajax({
      url: ROOT_URL + "admin/logic/edit-user-logic.php", // URL of the PHP processing script
      type: "POST",
      data: $(this).serialize(), // Serialize the form data
      dataType: "json", // Expect a JSON response
      success: function (response) {
        if (response.success) {
          $("#responseMessage").html(
            `<div class="alert alert-success">${response.message}</div>`
          );
          setTimeout(() => {
            window.location.href = ROOT_URL + "admin/manage-users.php";
          }, 1000);
        } else {
          $("#responseMessage").html(
            `<div class="alert alert-danger">${response.message}</div>`
          );
        }
      },
      error: function (xhr, status, error) {
        // Display detailed error information
        let errorMsg = xhr.responseJSON?.message || "An error occurred.";
        $("#responseMessage").html(
          `<div class="alert alert-danger">Error: ${errorMsg} (${xhr.status})</div>`
        );
      },
      complete: function () {
        // Enable the button again after request is complete
        $("button[type=submit]").prop("disabled", false).text("Update User");
      },
    });
  });
}

// Handle ADD Ambulance
if ($("#addambulanceForm").length) {
  $("#addambulanceForm").on("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting the default way
    $("#responseMessage").html(
      '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
    );
    $.ajax({
      url: ROOT_URL + "admin/logic/add-ambulance-logic.php", // URL of the PHP processing script
      type: "POST",
      data: $(this).serialize(), // Serialize the form data
      dataType: "json", // Expect a JSON response
      success: function (response) {
        if (response.error) {
          $("#responseMessage").html(
            `<div class="alert alert-danger">${response.message}</div>`
          );
          setTimeout(function () {
            $("#responseMessage").html(""); // Clear the error message after 3 seconds
          }, 3000);
        } else {
          $("#responseMessage").html(
            `<div class="alert alert-success">${response.message}</div>`
          );
          setTimeout(() => {
            window.location.href = ROOT_URL + "admin/manage-ambulance.php";
          }, 1000);
        }
      },
      error: function (xhr, status, error) {
        // Handle error response
        $("#responseMessage").html(
          '<div class="alert alert-danger">Error: ' + error + "</div>"
        );
      },
    });
  });
}

// Handle Update Ambulance
if ($("#editAmbulanceForm").length) {
  $("#editAmbulanceForm").on("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting the default way
    $("#responseMessage").html(
      '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
    );
    $.ajax({
      url: ROOT_URL + "admin/logic/edit-ambulance-logic.php", // URL of the PHP processing script
      type: "POST",
      data: $(this).serialize(), // Serialize the form data
      dataType: "json", // Expect a JSON response
      success: function (response) {
        if (response.error) {
          $("#responseMessage").html(
            `<div class="alert alert-danger">${response.message}</div>`
          );
          setTimeout(function () {
            $("#responseMessage").html(""); // Clear the error message after 3 seconds
          }, 3000);
        } else {
          $("#responseMessage").html(
            `<div class="alert alert-success">${response.message}</div>`
          );
          setTimeout(() => {
            window.location.href = ROOT_URL + "admin/manage-ambulance.php";
          }, 1000);
        }
      },
      error: function (xhr, status, error) {
        // Handle error response
        $("#responseMessage").html(
          '<div class="alert alert-danger">Error: ' +
            status +
            xhr +
            error +
            "</div>"
        );
      },
    });
  });
}

// Handle Delete Ambulance
if ($(".delete-ambulance").length) {
  $(".delete-ambulance").on("click", function (e) {
    e.preventDefault(); // Prevent the default anchor behavior
    const id = $(this).data("id");
    if (confirm("Are you sure you want to delete this Ambulance?")) {
      $.ajax({
        url: ROOT_URL + "admin/logic/delete-ambulance-logic.php", // Update with your script path
        type: "POST",
        data: { id: id },
        dataType: "json",
        success: function (response) {
          if (response.error) {
            $("#responseMessage").html(
              `<div class="alert alert-danger">${response.message}</div>`
            );
            setTimeout(function () {
              $("#responseMessage").html(""); // Clear the error message after 3 seconds
            }, 3000);
          } else {
            $("#responseMessage").html(
              `<div class="alert alert-success">${response.message}</div>`
            );
            location.reload();
          }
        },
        error: function (xhr, status, error) {
          $("#responseMessage").html(
            '<div class="alert alert-danger">Error: ' + error + "</div>"
          );
        },
      });
    }
  });
}

// Handle Admin Update Profile
if ($("#adminUpdateprofileForm").length) {
  $("#adminUpdateprofileForm").on("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting the default way
    $("#responseMessage").html(
      '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
    );
    $.ajax({
      url: ROOT_URL + "admin/logic/update-profile-logic.php", // URL of the PHP processing script
      type: "POST",
      data: $(this).serialize(), // Serialize the form data
      dataType: "json", // Expect a JSON response
      success: function (response) {
        if (response.error) {
          $("#responseMessage").html(
            `<div class="alert alert-danger">${response.message}</div>`
          );
          setTimeout(function () {
            $("#responseMessage").html(""); // Clear the error message after 3 seconds
          }, 2000);
        } else {
          $("#responseMessage").html(
            `<div class="alert alert-success">${response.message}</div>`
          );
        }
      },
      error: function (xhr, status, error) {
        // Handle error response
        $("#responseMessage").html(
          '<div class="alert alert-danger">Error: ' + error + "</div>"
        );
      },
    });
  });
}

// Handle User Update Profile
if ($("#userUpdateprofileForm").length) {
  $("#userUpdateprofileForm").on("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting the default way
    $("#responseMessage").html(
      '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
    );
    $.ajax({
      url: ROOT_URL + "user/logic/update-profile-logic.php", // URL of the PHP processing script
      type: "POST",
      data: $(this).serialize(), // Serialize the form data
      dataType: "json", // Expect a JSON responses
      success: function (response) {
        if (response.error) {
          $("#responseMessage").html(
            `<div class="alert alert-danger">${response.message}</div>`
          );
          setTimeout(function () {
            $("#responseMessage").html(""); // Clear the error message after 3 seconds
          }, 2000);
        } else {
          $("#responseMessage").html(
            `<div class="alert alert-success">${response.message}</div>`
          );
        }
      },
      error: function (xhr, status, error) {
        // Handle error response
        $("#responseMessage").html(
          '<div class="alert alert-danger">Error: ' + error + "</div>"
        );
      },
    });
  });
}

// Handle Delete Request
if ($(".delete-request").length) {
  $(".delete-request").on("click", function (e) {
    e.preventDefault(); // Prevent the default anchor behavior
    const id = $(this).data("id");
    if (confirm("Are you sure you want to delete this Ambulance?")) {
      $.ajax({
        url: ROOT_URL + "user/logic/delete-request-logic.php", // Update with your script path
        type: "POST",
        data: { id: id },
        dataType: "json",
        success: function (response) {
          if (response.error) {
            $("#responseMessage").html(
              `<div class="alert alert-danger">${response.message}</div>`
            );
            setTimeout(function () {
              $("#responseMessage").html(""); // Clear the error message after 3 seconds
            }, 3000);
          } else {
            $("#responseMessage").html(
              `<div class="alert alert-success">${response.message}</div>`
            );
            location.reload();
          }
        },
        error: function (xhr, status, error) {
          $("#responseMessage").html(
            '<div class="alert alert-danger">Error: ' + error + "</div>"
          );
        },
      });
    }
  });
}

// Handle ADD Ambulance
if ($("#add-emergency-request-form").length) {
  $("#add-emergency-request-form").on("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting the default way
    $("#responseMessage").html(
      '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
    );
    $.ajax({
      url: ROOT_URL + "user/logic/emergency-request-logic.php", // URL of the PHP processing script
      type: "POST",
      data: $(this).serialize(), // Serialize the form data
      dataType: "json", // Expect a JSON response
      success: function (response) {
        if (response.error) {
          $("#responseMessage").html(
            `<div class="alert alert-danger">${response.message}</div>`
          );
          setTimeout(function () {
            $("#responseMessage").html(""); // Clear the error message after 3 seconds
          }, 3000);
        } else {
          $("#responseMessage").html(
            `<div class="alert alert-success">${response.message}</div>`
          );
          setTimeout(() => {
            window.location.href = ROOT_URL + "user/manage-all-request.php";
          }, 1000);
        }
      },
      error: function (xhr, status, error) {
        // Handle error response
        $("#responseMessage").html(
          '<div class="alert alert-danger">Error: ' +
            status +
            xhr +
            error +
            "</div>"
        );
      },
    });
  });
}

// Handle ADD Emergency Requests from User
if ($("#add-emergency-request-form").length) {
  $("#add-emergency-request-form").on("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting the default way
    $("#responseMessage").html(
      '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
    );
    $.ajax({
      url: ROOT_URL + "user/logic/emergency-request-logic.php", // URL of the PHP processing script
      type: "POST",
      data: $(this).serialize(), // Serialize the form data
      dataType: "json", // Expect a JSON response
      success: function (response) {
        if (response.error) {
          $("#responseMessage").html(
            `<div class="alert alert-danger">${response.message}</div>`
          );
          setTimeout(function () {
            $("#responseMessage").html(""); // Clear the error message after 3 seconds
          }, 3000);
        } else {
          $("#responseMessage").html(
            `<div class="alert alert-success">${response.message}</div>`
          );
          setTimeout(() => {
            window.location.href = ROOT_URL + "user/manage-all-request.php";
          }, 1000);
        }
      },
      error: function (xhr, status, error) {
        // Handle error response
        $("#responseMessage").html(
          '<div class="alert alert-danger">Error: ' +
            status +
            xhr +
            error +
            "</div>"
        );
      },
    });
  });
}
