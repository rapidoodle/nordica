(function (e) {
    "use strict";
    var n = window.tm_JS || {};
    n.navigation = function () {
      //added arrow
      var menuId= document.getElementById("primary-menu");
      if( menuId!='' ){
        e("ul#primary-menu>li,div#primary-menu>ul>li").has('ul').addClass("down-arrow");
        e("ul#primary-menu>li>ul li,div#primary-menu>ul>li>ul li").has('ul').addClass("right-arrow");
      }
    },
    n.navOffCanvas = function(){
        if (e("body").hasClass("rtl")) {
            e('#tm-nav-off-canvas').sidr({
            name: 'sidr-nav',
            displace: false,
            side: 'left'
            });
        } else {
            e('#tm-nav-off-canvas').sidr({
            name: 'sidr-nav',
            displace: false,
            side: 'right',
            });
        }
        e('.sidr-class-sidr-button-close').click(function () {
            e.sidr('close', 'sidr-nav');
        });
    }
    n.stickyHeader = function () {
        var header = document.getElementById("header");
        var sticky = header.offsetTop + e(header).outerHeight();
        var stickyAddedHeight = ( sticky + 30 );
        if (window.pageYOffset> stickyAddedHeight) {
          header.classList.add("sticky");
        } else {
          header.classList.remove("sticky");
        }
    },
    n.stickyScroll = function () {
        var header = document.getElementById("header");
        var sticky = header.offsetTop;
        var scrollUp = e("#scroll-top");
        var footerHeight = e("#colophon").outerHeight();
        if (window.pageYOffset > sticky) {
          scrollUp.css({"bottom":footerHeight+50}).addClass("show");
        } else {
          scrollUp.css({"bottom":-100}).removeClass("show");
        }
    },
    n.stickyScrollClick = function () {
        e('#scroll-top').on('click', function(event) {
          e("html, body").animate({
            scrollTop: 0
          }, 700);
          return false;
        });
    },
    n.mobileMenu = function () {
        e(document).on("click","#tm-menu-icon",function(){
            e(".tm-mobile-menu").addClass("show");
            e("#primary-nav-menu,#primary-menu").clone().appendTo(".tm-mobile-menu");
            e(".tm-mobile-menu ul li").has('ul').addClass("down-arrow");
            e("#tm-body-overlay").toggleClass("show");
            e('body').css("overflow-y","hidden");
        })
        e(document).on("click","#tm-social-menu-icon",function(){
            e(".tm-mobile-menu").addClass("show");
            e("#tm-address-with-social-icon").clone().appendTo(".tm-mobile-menu");
            e('.tm-mobile-menu #tm-address-with-social-icon .tm-social-icons').addClass('tm-social-icons-rounded  tm-social-icons-sm');
            e("#tm-body-overlay").toggleClass("show");
            e('body').css("overflow-y","hidden");
        })
        e("#tm-mobile-close,#tm-body-overlay").on("click",function(){
            e(".tm-mobile-menu").removeClass("show");
            e(".tm-mobile-menu #primary-nav-menu,.tm-mobile-menu #primary-menu").remove();
            e(".tm-mobile-menu #tm-address-with-social-icon").remove();
            e(".tm-mobile-menu ul li").has('ul').removeClass("down-arrow");
            e('body').css("overflow-y","scroll");
            e("#tm-body-overlay").toggleClass("show");
        })
    },
    n.DataBackground = function () {
        var pageSection = e(".data-bg");
        pageSection.each(function (indx) {
            if (e(this).attr("data-background")) {
                e(this).css("background-image", "url(" + e(this).data("background") + ")");
            }
        });
        e('.bg-image').each(function () {
            var src = e(this).children('img').attr('src');
            e(this).css('background-image', 'url(' + src + ')').children('img').hide();
        });
    },
    n.slider = function() {
        e(".tm-banner-slider-section").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            infinite: false,
            speed: 700,
            arrows: true,
            dots: true,
            fade: true,
            cssEase:'linear',
        });
        e(".wp-block-gallery.columns-1,.wp-block-gallery.columns-1 ul,.gallery.gallery-columns-1").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            infinite: false,
            speed: 700,
            arrows: true,
            dots: false,
            fade: true,
            cssEase:'linear',
        });
        e(".tm-testimonial-slider,.tm-jetpack-testimonial-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            infinite: true,
            speed: 700,
            arrows: false,
            dots: true,
            fade: true,
            cssEase:'linear',
        });
        e(".tm-blog-slider").slick({
            speed: 1000,
            autoplay: true,
            cssEase: 'linear',
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
            responsive: [
                    {
                      breakpoint: 750,
                      settings: {
                        slidesToShow: 2,
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        slidesToShow: 1,
                      }
                    }
            ]
        });
    }
    n.galleryMagnificPopUp = function () {
      e('.wp-block-gallery,.gallery').each(function () {
        e(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function (item) {
                    return item.el.attr('title');
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300,
                opener: function (element) {
                    return element.find('img');
                }
            }
        });
    });
    },
    n.video = function() {
        e("#video").on("click",function(){
            var videoUrl = e("#about-video").attr("src");
            e("#tm-video").addClass("show");
            e("body").css("overflow","hidden");
            e("#tm-body-overlay").addClass("show");
            e("#tm-video iframe").attr("src",videoUrl);
            e(this).addClass("tm-video-popup-active");
        });
        e("#video-close").on("click",function(){
            e("#tm-video").removeClass("show");
            e("body").css("overflow","initial");
            e("#tm-body-overlay").removeClass("show");
            e("#tm-video iframe").attr("src","");
            e("#video").removeClass("tm-video-popup-active");
        });
    },
  
    n.tmIsotope = function () {
        //imagesLoaded();
        var emasonry = e('.masonry').isotope({
            itemSelector: '.masonry-item',
            masonry: {
            }
        });
        // filter items on button click
        e('.filter-group').on( 'click', 'li span', function() {
            var filterValue = e(this).attr('data-filter');
            e('.filter').removeClass("active");
            e(this).addClass("active");
            emasonry.isotope({ filter: filterValue });
        });
    },
    e(window).on('load', function () { 
      e('#status').fadeOut(); 
      e('#preloader').delay(350).fadeOut('slow');  
      e('body').delay(350).css({ 'overflow': 'visible' });
   })
    e(document).ready(function () {
        var iframeTag = '<iframe src=""></iframe>';
        e("#tm-video .tm-video").append(iframeTag);
        n.navigation(),n.navOffCanvas(),n.mobileMenu(),n.DataBackground(),n.slider(),n.galleryMagnificPopUp(),n.tmIsotope(),n.video(),n.stickyScrollClick();
    }), e(window).scroll(function () {
        n.stickyHeader(),n.stickyScroll();
    }),e(window).resize(function(){
        n.tmIsotope();
    })
})(jQuery);