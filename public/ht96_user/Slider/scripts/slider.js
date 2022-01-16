 
jQuery(function(){
            
    jQuery('#camera_wrap_5').camera({
        height: '520',
        loader: 'bar',
        pagination: true,
        thumbnails: true,
        hover: true,
        opacityOnGrid: false,
        time: 4000,
        thumbnails: true
    });
});

jQuery(function(){
            
    jQuery('#camera_wrap_4').camera({
        height: '320',
        loader: 'pie',
        pagination: true,
        thumbnails: true,
        hover: true,
        opacityOnGrid: false,
        time: 3000,
        thumbnails: true
    });
});





$(document).ready(function(){
    $('.responsive').slick({
    dots: false,
    infinite: true,
    speed: 500,
    autoplay:true,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow:'<button type="button" class="slick-prev a"><i class="fa fa-angle-left fa-4x icon1" aria-hidden="true"></i></button>',
      nextArrow:'<button type="button" class="slick-next a"><i class="fa fa-angle-right icon2 fa-4x" aria-hidden="true"></i></button>',
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 545,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
    
});


$(document).ready(function(){

    $('.responsive11').slick({
    dots: false,
    infinite: true,
    speed: 1000,
    autoplay:true,
    slidesToShow: 2,
    slidesToScroll: 2,
    prevArrow:'<button type="button" class="slick-prev a"><i class="fa fa-angle-left fa-4x icon1" aria-hidden="true"></i></button>',
      nextArrow:'<button type="button" class="slick-next a"><i class="fa fa-angle-right icon2 fa-4x" aria-hidden="true"></i></button>',
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 545,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
    
});

$(document).ready(function(){

    $('.responsive12').slick({
    dots: false,
    infinite: true,
    speed: 1000,
    autoplay:true,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow:'<button type="button" class="slick-prev a"><i class="fa fa-angle-left fa-4x icon1" aria-hidden="true"></i></button>',
      nextArrow:'<button type="button" class="slick-next a"><i class="fa fa-angle-right icon2 fa-4x" aria-hidden="true"></i></button>',
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 545,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
    
});

 $('.doitac').slick({
    dots: false,
    infinite: true,
    speed: 200,
    autoplay:true,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow:'<button type="button" class="slick-prev a"><i class="fa fa-angle-left fa-4x icon1" aria-hidden="true"></i></button>',
      nextArrow:'<button type="button" class="slick-next a"><i class="fa fa-angle-right icon2 fa-4x" aria-hidden="true"></i></button>',
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 545,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });



    
$(document).ready(function () {
        // append plus symbol to every list item that has children
        $('#mobile-nav .parent').append('<span class="open-menu fa fa-plus"></span>');    
        // fix non-scrolling overflow issue on mobile devices
        $('#mobile-nav > ul').wrap('<div class="overflow"></div>');
        $(window).on('load resize', function () {
              var vph = $(window).height() - 57; // 57px - height of #mobile-nav
              $('.overflow').css('max-height', vph);
        });
    
    // global variables
    var menu = $('.overflow > ul');
    var bg = $('html, body');
    
    // toggle background scrolling
    function bgScrolling() {
        // if menu has toggled class... *
        if (menu.hasClass('open')) {
            // * disable background scrolling
            bg.css({
                'overflow-y': 'hidden',
                'height': 'auto'
            });
        // if menu does not have toggled class... *
        } else {
            // * enable background scrolling
            bg.css({
                'overflow-y': 'visible',
                'height': '100%'
            });
        }
    }
    
    // menu button click events
    $('.menu-button').on('click', function (e) {
        e.preventDefault();
        // activate toggles
        menu.slideToggle(250);
        menu.toggleClass('open');
        $(this).children().toggleClass('fa-reorder fa-remove');
        bgScrolling();
    });
    
    // list item click events
    $('.open-menu').on('click', function (e) {
        e.preventDefault();
        $(this).prev('ul').slideToggle(250);
        $(this).toggleClass('rotate');
    });
});



$(document).ready(function() { 
      $('#toptop').fadeOut();          
               $(window).scroll(function() {
                  if($(window).scrollTop() != 0 && $(window).scrollTop() > 250) 
                    {
                         $('#toptop').fadeIn();               
                         $('.menu1').addClass("navbar-fixed-top");                      
                    } 
                  else 
                    {
                        $('#toptop').fadeOut();
                        $('.menu1').removeClass("navbar-fixed-top");
                        
                    }
               });  

      $('#toptop').click(function() {
                $('html, body').animate({scrollTop:0},500);
               });   
      $('.menu2').click(function() {
                $('html, body').animate({scrollTop:0},500);
               });     

});
