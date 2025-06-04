jQuery(document).ready(function () {
  /* **** Scroll to top button feature *** */
  jQuery(window).scroll(function () {
    if(jQuery(window).scrollTop() > 300){
      jQuery('#myBtn').addClass('show');
    }else{
      jQuery('#myBtn').removeClass('show');
    }
  });
  jQuery(document).on('click', '#myBtn', function (e) {
    e.preventDefault();
    jQuery('html, body').animate({ scrollTop: 0 }, '5000');
  });
  /* **** Scroll to top button feature end *** */
  /** Toggle and accordian feature  */
  jQuery(document).on('click', 'button[data-bs-toggle="tab"]', function () {
    jQuery(this).parents(".serv-maintabs").siblings(".tab-content").children(".tab-pane ").removeClass("show active");
    jQuery(this).parents(".serv-maintabs").find("button.nav-link").removeClass("active");
    var dataTarget = jQuery(this).attr("data-bs-target");
    jQuery(this).addClass("active");
    jQuery(dataTarget).addClass("show active");
  });
  jQuery(document).on('click', 'button[role="tab"]', function () {
    jQuery(this).parents(".features-section").siblings(".banner-section").children(".tab-content").children(".tab-pane").removeClass("show active")
    jQuery(this).parents(".features-section").find("button.nav-link").removeClass("active");
    var dataTarget = jQuery(this).attr("data-bs-target");
    jQuery(this).addClass("active");
    jQuery(dataTarget).addClass("show active");
  });
  jQuery(document).on('click','.accordion-header',function(){
    var data_target = jQuery(this).find('button.accordion-button').attr('data-bs-target');
    jQuery(this).parent('.accordion-item').toggleClass('active');
    jQuery(this).find('button.accordion-button').toggleClass('collapsed');
    jQuery(data_target).toggleClass('show');
  });

  //remove cureency dropdown wrong in mobile.

  jQuery('#order-standard_cart .cart-body .sidebar-collapsed .panel.card.panel-default .panel-body.card-body form').last().remove();
    var datahtml = jQuery('#order-standard_cart .cart-body .sidebar-collapsed div.pull-right.form-inline').last().html()
    jQuery('#order-standard_cart .cart-body .sidebar-collapsed div.pull-right.form-inline').last().remove();
    jQuery('#order-standard_cart .cart-body .sidebar-collapsed .panel.card.panel-default .panel-body.card-body').last().html(datahtml);


});
/* **** Sticky Header **** */
window.onscroll = function () {
  wgsMakeHeaderSticky();
};
/* **** Toggle Menu **** */
jQuery(".bar-brand").on("click", function () {
  jQuery(".sidebar").addClass("expand-menu-open");
});

jQuery(".close-btn").on("click", function () {
  jQuery(".sidebar").removeClass("expand-menu-open");
});
/* **** End Toggle Menu **** */
/* **** Hero Slider **** */
if(jQuery(".hero-slider").length > 0){
  jQuery(".hero-slider").slick({
    arrows: true,
    dots: true,
    autoplay: false,
    autoplaySpeed: 1500,
    speed: 1500,
    rtl:rtlCloudxSlider,
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1600,
        settings: {
          arrows: true
        }
      },
      {
        breakpoint: 1440,
        settings: {
          arrows: true
        }
      },
      {
        breakpoint: 1200,
        settings: {
          arrows: false
        }
      },
      {
        breakpoint: 768,
        settings: {
          arrows: false
        }
      },
      {
        breakpoint: 360,
        settings: {
          arrows: false
        }
      }
    ]
  });
}
/* **** End  Hero Slider **** */

/* *** Sponcers Slider *** */
if(jQuery(".sponcer-slider").length > 0){
  jQuery('.sponcer-slider').slick({
    centerMode: false,
    centerPadding: '0',
    arrows: false,
    dots: false,
    autoplay: false,
    autoplaySpeed: 1000,
    speed: 1000,
    rtl:rtlCloudxSlider,
    infinite: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1600,
        settings: {
          slidesToShow: 5
        }
      },
      {
        breakpoint: 1440,
        settings: {
          slidesToShow: 4
        }
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 360,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
}
/* *** End Sponcers Slider *** */
/* *** Our Team Slider *** */
if(jQuery(".team-slider").length > 0){
  jQuery('.team-slider').slick({
    centerMode: false,
    centerPadding: '0',
    arrows: true,
    dots: false,
    autoplay: false,
    autoplaySpeed: 1000,
    speed: 1000,
    rtl:rtlCloudxSlider,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1600,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 1440,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1
        }
      },
      {
        breakpoint: 360,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
}
/* *** End Our Team Slider *** */

/* **** Dedicated Server Slider **** */
if(jQuery(".dedi-serv-slider").length > 0){
  jQuery(".dedi-serv-slider").slick({
    arrows: true,
    dots: false,
    autoplay: false,
    autoplaySpeed: 1500,
    speed: 1500,
    infinite: true,
    slidesToShow: 1,
    rtl:rtlCloudxSlider,
    slidesToScroll: 1
  });
}
/* **** End Dedicated Server Slider **** */

/* *** Server Features Slider *** */
if(jQuery(".server-features-slider").length > 0){
  jQuery('.server-features-slider').slick({
    centerMode: false,
    centerPadding: '0',
    arrows: true,
    dots: false,
    autoplay: false,
    autoplaySpeed: 1000,
    speed: 1000,
    infinite: false,
    rtl:rtlCloudxSlider,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1600,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 1440,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1
        }
      },
      {
        breakpoint: 360,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
}
/* *** End Server Features Slider *** */
/** Pricing Slider Start  */
if(jQuery("#pricing-section-slider").length > 0){
    jQuery("#pricing-section-slider").not('.slick-initialized').slick({
      dots: false,
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      autoplay: false,
      autoplaySpeed: false,
      variableWidth: false,
      rtl:rtlCloudxSlider,
      responsive: [
       {breakpoint: 1024,settings: {slidesToShow: 2,slidesToScroll: 2,}},
       {breakpoint: 800,settings: {slidesToShow: 1,slidesToScroll: 1}},
       {breakpoint: 600,settings: {slidesToShow: 1,slidesToScroll: 1}},
       {breakpoint: 480,settings: {slidesToShow: 1,slidesToScroll: 1}},
       {breakpoint: 280,settings: {slidesToShow: 1,slidesToScroll: 1}}
       ]
     }).on('afterChange', function(event, slick, currentSlide){
      setTimeout(function(){
        var lengthGetSlide = jQuery('#pricing-section-slider div.slick-slide[tabindex="0"]').length;
        jQuery('#pricing-section-slider div.slick-slide').removeClass("middleBoxSlider");
        if(lengthGetSlide == 3){
          jQuery('#pricing-section-slider div.slick-slide[tabindex="0"]').eq(1).addClass("middleBoxSlider");
        }else if(lengthGetSlide == 2){
          jQuery('#pricing-section-slider div.slick-slide[tabindex="0"]').eq(0).addClass("middleBoxSlider");
        }else if(lengthGetSlide == 1){
          jQuery('#pricing-section-slider div.slick-slide[tabindex="0"]').eq(0).prev('.slick-slide').addClass("middleBoxSlider");
        }
      },150);
    }).trigger('afterChange');
}
/** Pricing Slider End  */
/** Change biling cycle product price plan */
function wgsProductPlanBillingCycleChange(obj,billCy){
  jQuery('button.button-billing-cycle').removeClass("active");
  jQuery(obj).find('button.button-billing-cycle').addClass("active");
  jQuery('.pricing-min-main').addClass("w-hidden");
  jQuery('.pricing-min-main.'+billCy).removeClass("w-hidden");
  if(jQuery('.pricing-min-main.freeaccount').length > 0){
	  jQuery('.pricing-min-main.freeaccount').removeClass("w-hidden");
  }
  if(jQuery('.pricing-min-main.onetime').length > 0){
	  jQuery('.pricing-min-main.onetime').removeClass("w-hidden");	  
  }
}
/** End Change biling cycle product price plan */
function toggleCloudxTopNav(obj){
  obj.classList.toggle("open_nav_top");
  jQuery(obj).parent().parent().parent().toggleClass("menu_open_top");
}
/** Sticky header feature */
function wgsMakeHeaderSticky(){
  if(jQuery("header.sticky-header-enabled").length > 0){
    var headerBarPrimary = document.getElementById("header-top-sticky");
    var stickyHeaderData = headerBarPrimary.offsetTop;
    if(window.pageYOffset > stickyHeaderData){
      headerBarPrimary.classList.add("make-header-sticky");
      headerBarPrimary.nextElementSibling.style.marginTop = headerBarPrimary.offsetHeight+'px';
    }else{
      headerBarPrimary.classList.remove("make-header-sticky");
      headerBarPrimary.nextElementSibling.style.marginTop = '0px';
    }
  }
}

