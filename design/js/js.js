$(window).scroll(function() {    
    if ($(window).scrollTop()) {
        $(".top-header").addClass("h-0");
        $(".c-navbar").addClass("h-60");
    } else {
        $(".top-header").removeClass("h-0");
        $(".c-navbar").removeClass("h-60");
    };
});

jQuery(window).load(function(){
    jQuery("#slide-index").owlCarousel({
        animationIn: 'none',
        loop:true,
        margin:0,
        dots: false,
        // autoplay: true,
        // autoplayTimeout: 5000,
        items: 1,
        animateIn: "fadeIn",
        animateOut: "fadeOut",
        nav:true,
        navText: ["<span class='wow bounceInLeft'></span>","<span class='wow bounceInRight'></span>"]
    });
    jQuery("#slide-index").on("translate.owl.carousel", function () {
        jQuery(this).find(".owl-item .text-desc .td span").removeClass("fadeInUp animated").css("opacity","0");
        jQuery(this).find(".owl-item .text-desc .td h2").removeClass("fadeInUp animated").css("opacity","0");
        jQuery(this).find(".owl-item .text-desc .td p").removeClass("fadeInUp animated").css("opacity","0");
        jQuery(this).find(".owl-item .img-desc").removeClass("fadeInRight animated").css("opacity","0");
    });          
    jQuery("#slide-index").on("translated.owl.carousel", function () {
        jQuery(this).find(".owl-item.active .text-desc .td span").addClass("fadeInUp animated").css("opacity","1");
        jQuery(this).find(".owl-item.active .text-desc .td h2").addClass("fadeInUp animated").css("opacity","1");
        jQuery(this).find(".owl-item.active .text-desc .td p").addClass("fadeInUp animated").css("opacity","1");
        jQuery(this).find(".owl-item.active .img-desc").addClass("fadeInRight animated").css("opacity","1");
    });
});


$(document).ready(function() {
    $('#list').click(function(event){
        event.preventDefault();
        $('#products .item-product').addClass('list-item');
    });
    $('#grid').click(function(event){
        event.preventDefault();
        $('#products .item-product').removeClass('list-item');
        $('#products .item-product').addClass('grid-item');
    });
});


$(".btn-glp").click(function () {
  if ($(this).hasClass("active")) {
    $(".btn-glp").removeClass("active");
  }
  else {
    $(".btn-glp").removeClass("active");
    $(this).addClass("active");
  }
});

$(document).ready(function() {
    // Cache selectors for faster performance.
    var $window = $(window),
        actionR = $('#actionR'),
        actionRAnchor = $('#actionRAnchor');

    // Run this on scroll events.
    $window.scroll(function() {
        var window_top = $window.scrollTop();
        var div_top = actionRAnchor.offset().top;
        if (window_top > div_top) {
            // Make the div sticky.
            actionR.addClass('stick');
            // actionRAnchor.height(actionR.height());
        }
        else {
            // Unstick the div.
            actionR.removeClass('stick');
            // actionRAnchor.height(0);
        }
    });
});