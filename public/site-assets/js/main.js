(function ($) {
  "use strict";


  /*--------------------------------------------------------------
    FullHeight
  --------------------------------------------------------------*/
  // function fullHeight() {
  //   $('.full-height').css("height", $(window).height());
  // }

  function dynamicCurrentMenuClass(selector) {
    let FileName = window.location.href.split("/").reverse()[0];

    selector.find("li").each(function () {
      let anchor = $(this).find("a");
      if ($(anchor).attr("href") == FileName) {
        $(this).addClass("current");
      }
    });
    // if any li has .current elmnt add class
    selector.children("li").each(function () {
      if ($(this).find(".current").length) {
        $(this).addClass("current");
      }
    });
    // if no file name return
    if ("" == FileName) {
      selector.find("li").eq(0).addClass("current");
    }
  }

  if ($(".main-menu__list").length) {
    // dynamic current class
    let mainNavUL = $(".main-menu__list");
    dynamicCurrentMenuClass(mainNavUL);
  }


  if ($(".main-menu__list").length && $(".mobile-nav__container").length) {
    let navContent = document.querySelector(".main-menu__list").outerHTML;
    let mobileNavContainer = document.querySelector(".mobile-nav__container");
    mobileNavContainer.innerHTML = navContent;
  }

  if ($(".mobile-nav__container .main-menu__list").length) {
    let dropdownAnchor = $(
      ".mobile-nav__container .main-menu__list .dropdown > a"
    );
    dropdownAnchor.each(function () {
      let self = $(this);
      let toggleBtn = document.createElement("BUTTON");
      toggleBtn.setAttribute("aria-label", "dropdown toggler");
      toggleBtn.innerHTML = "<i class='fa fa-angle-down'></i>";
      self.append(function () {
        return toggleBtn;
      });
      self.find("button").on("click", function (e) {
        e.preventDefault();
        let self = $(this);
        self.toggleClass("expanded");
        self.parent().toggleClass("expanded");
        self.parent().parent().children("ul").slideToggle();
      });
    });
  }

  if ($(".mobile-nav__toggler").length) {
    $(".mobile-nav__toggler").on("click", function (e) {
      e.preventDefault();
      $(".mobile-nav__wrapper").toggleClass("expanded");
      $("body").toggleClass("locked");
    });
  }

  if ($(".search-toggler").length) {
    $(".search-toggler").on("click", function (e) {
      e.preventDefault();
      $(".search-popup").toggleClass("active");
      $(".mobile-nav__wrapper").removeClass("expanded");
      $("body").toggleClass("locked");
    });
  }
})(jQuery);

$(".accordion__item--title").on("click", function () {
  const parentItem = $(this).closest(".accordion__item");
  const content = parentItem.find(".accordion__item--content");

  // Toggle this item
  parentItem.toggleClass("active");
  content.slideToggle("fast");

  // Close other items
  $(".accordion__item").not(parentItem).removeClass("active")
    .find(".accordion__item--content").slideUp("fast");
});


$('.partner__carousel').owlCarousel({
  loop: true,
  margin: 40,
  responsiveClass: true,
  autoplay: true,
  slideTransition: 'linear',
  autoplaySpeed: 6000,
  smartSpeed: 6000,
  dots: false,
  nav: false,
  autoWidth:true,
  responsive: {
    0: {
      items: 2,
    },
    600: {
      items: 4,
    },
    1000: {
      items: 10,
    },
  },
},
);

let dob = new Date();
dob.setFullYear(dob.getFullYear() - 2);
dob.setMonth(11);
dob.setDate(31);
$("input[name=birth_date]").attr("max", dob.toISOString().substring(0, 10));
