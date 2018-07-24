// /*=========================================================================================
// // INICIO MAIN JS
// ========================================================================================= */

jQuery(function($) {
  $(document).ready(function() {

    // Menu fixar apos scroll
    $(window).scroll(function() {
        if ($(document).scrollTop() > 200) {
          $(".mbr-header").css("position", "fixed");
          $(".mbr-header").css("background", "rgba(120, 137, 67, .9)");
          $(".mbr-header").addClass("animated fadeInDown mbr-blur");
        } else {
          $(".mbr-header").css("position", "absolute");
          $(".mbr-header").css("background", "transparent");
          $(".mbr-header").removeClass("animated fadeInDown mbr-blur");
        }
      });

      $(".mbr-menu-button").click(function() {
        if($(".mbr-header").hasClass("mbr-header--opened")) {
          $(".mbr-header").removeClass("mbr-header--opened")
        } else {
        $(".mbr-header").addClass("mbr-header--opened");
        }
      });
    //   $(".mbr-typed").typed({
    //     strings: ["^1000to the biggest student organised fest in Kanpur", "to the biggest student organised fest in UP", "to the biggest student organised fest in <span style='color: #ffee00'>India</span> ^800."],
    //             typeSpeed: 10,
    //             stringstops: [41, 41, 41],
    //             backDelay: 600,
    //             showCursor: true,
    //             loop: false,
    //             contentType: 'html', // or text
    //             // defaults to false for infinite loop
    //             loopCount: false,
    // });

    //Efeito Parallax

    $('.mbr-pallax').each(function(){
        var $obj = $(this);

        $(window).scroll(function() {
            var yPos = -($(window).scrollTop() / $obj.data('speed')); 
            var bgpos = '50% '+ yPos + 'px';
            $obj.css('background-position', bgpos );

        }); 
    });


    $('.mbr-help__box').click(function() {
        $(this).find('p').toggle();
    });


    //Abrir e Fechar Botao - Responsivo

    $( "#buttonModal" ).click(function() {
      $( "#menuModal" ).fadeIn(500);
    });

    $( "#closeModal" ).click(function() {
      $( "#menuModal" ).fadeOut(500);
    });

    $("#menu-principal .menu-item a").click(function() {
      $( "#menuModal" ).fadeOut(500);
    });


    // Open Modal

    $('.open-popup').magnificPopup({
      type:'inline',
      mainClass: 'mfp-fade',
      midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });

    // Modal - Help

    $(".mbr-profile__contact, .mbr-profile__number").click(function(){
      var ddd = $(this).data("ddd");
      var tel = $(this).data("tel");
      var usernamembr = $(this).data("name");

      console.log(usernamembr);
      $(".tel-ddd").html(ddd);
      $(".tel-full").html(tel);
      $("#with-ddd").prop("href", "tel:"+ddd+tel);
      $("#without-ddd").prop("href", "tel:"+tel);
      $("#whatsapp").prop("href", "https://api.whatsapp.com/send?phone=55"+ddd+tel+"&text=Oi "+usernamembr+", eu vi você no site MassagemBR e gostaria de saber mais sobre as terapias que você oferece! Qual seria o melhor horário para combinarmos?");
    });

    // $(".mbr-help__box").click(function() {
    //   console.log('Oi!');
    // });


// /*=========================================================================================
// // ALTURA
// ========================================================================================= */

// function equalizeHeights(selector) {
//   var heights = new Array();

//   // Loop to get all element heights
//   $(selector).each(function() {

//     // Need to let sizes be whatever they want so no overflow on resize
//     $(this).css('min-height', '0');
//     $(this).css('max-height', 'none');
//     $(this).css('height', 'auto');

//     // Then add size (no units) to array
//     heights.push($(this).height());
//   });

//   // Find max height of all elements
//   var max = Math.max.apply( Math, heights );

//   // Set all heights to max height
//   $(selector).each(function() {
//     $(this).css('height', max + 'px');
//   });
// }


// $(window).on('load resize', function(){
//     // equalizeHeights('.card__hold');
//     // equalizeHeights('.relacionados__item .card__tit');
//     // equalizeHeights('.malls__icones');
// });


// //     $("#slider").animate({
// //         "animation:" : " animateBg forwards 2s ease-in"
         
// //     },2000);

// //     $(window).scroll(function() {
// //       if ($(this).scrollTop() > 100){  
// //           $('.ae-menu__toggle').addClass("mobile-sticky");
// //         }
// //         else{
// //           $('.ae-menu__toggle').removeClass("mobile-sticky");
// //         }
// //       });
// // /*=========================================================================================
// // // MENU TOOGLE
// // =========================================================================================*/

// //  //menu-toggle
// //    $(".ae-menu__toggle").click(function(event){
// //     event.preventDefault();
// //     if ($(this).hasClass('on')){
// //         $(this).removeClass('on');
// //             $(".ae-header__menu").stop().fadeOut();
// //     }else{
// //         $(this).addClass('on');
// //             $(".ae-header__menu").stop().fadeIn();
// //         }
// //     });

// //     $(".slider__btnMobile").click(function(event){
// //         event.preventDefault();
// //             $(this).addClass('.slider__btnMobileOn');
              
// //     });

// //     $('.btn-resp-rdp').on('click', function(e){
// //       e.preventDefault();      

// //       if ( $(this).text() == "Exibir Menu") {
// //         $(this).text("Ocultar Menu");
// //       } else {
// //         $(this).text("Exibir Menu");
// //       }
      
// //       $(".ae-footer__menu").slideToggle(); 
// //     });



// //     // set carousel
// //     var win = $(window);
// //     var cardsHotel = $('#clientes'); 
// //     var item = $('.ae-carousel-solution__item');
// //     var cardsSolucao = $('#solution'); 

// //     function initOwlEffect( ef){
// //       ef.addClass('hvr-grow');
// //     }
// //     function initOwl( el ) {
// //       el.addClass('owl-carousel');  

// //       el.owlCarousel({
// //         items: 1,
// //         nav: false,
// //         dots: true,
// //         navText: false, 
// //         margin: 5,
// //         autoWidth: false,
// //       });
// //     }

// //     function destroyOwl( el ) {
// //       el.removeClass('owl-carousel');
// //       el.trigger('destroy.owl.carousel');
// //     }
// //     function destroyOwlEffect(ef){
// //       ef.removeClass('hvr-grow');
// //       ef.trigger('hvr-grow');
// //     }

// //     function hasSmallScreen(){
// //       return ( win.width() < 568 ) ? initOwl(cardsHotel) : destroyOwl(cardsHotel);
// //     }
// //     function hasSmallScreenEf(){
// //       return ( win.width() >= 768 ) ? initOwlEffect(item) : destroyOwlEffect(item);
// //     }
// //     win.on('resize load', hasSmallScreen);
// //     win.on('resize load', hasSmallScreenEf);





    
// //     function initOwlC( ele ) {
// //       ele.addClass('owl-carousel');  

// //       ele.owlCarousel({
// //         items: 1,
// //         nav: false,
// //         dots: true,
// //         navText: false, 
// //         margin: 5,
// //         autoWidth: false,
// //       });
// //     }

// //     function destroyOwlC( ele ) {
// //       ele.removeClass('owl-carousel');
// //       ele.trigger('destroy.owl.carousel');
// //     }

// //     function hasSmallScreenC(){
// //       return ( win.width() < 568 ) ? initOwlC(cardsSolucao) : destroyOwlC(cardsSolucao);
// //     }
    
// //     win.on('resize load', hasSmallScreenC); 







// //     $(".menu__nav").mouseenter(function(){
// //         $(".menu-item").addClass(".sub-menu");
// //     });

// //     var botao = $('#rodape-button');

// //     botao.click(function(){
// //         if(botao.hasClass('on')){
// //           $('.rodape__content').fadeOut(500);
// //           botao.removeClass('on');      
// //           botao.html('Exibir menu');
// //         } else {      
// //           $('.rodape__content').fadeIn(500);
// //           botao.addClass('on');
// //           botao.html('Esconder menu');    
// //         }  
// //     });

// // /*=========================================================================================
// // // FIXED MENU
// // =========================================================================================*/

// // var $win = $(window);
// // var homeTarget = $('.newsletter');
// // var menu = $('.barra-top');
// // var heightMenu = menu.height();

// // function menuFixo(sizeScroll, target){
// //     if (sizeScroll >= target) {
// //       menu.addClass('is-fixed animated fadeInUp').removeClass('');
// //     } else {
// //       menu.removeClass('fadeInUp is-fixed').addClass('');
// //     }
// // }

// // // Menu Scroll
// // $win.on("scroll", function(){
// //     var scrollBottom = $(document).height() - $win.height() - $win.scrollTop();
// //     var heightHomeTarget = $win.height() - homeTarget.height();
// //     var target = ( heightHomeTarget - heightMenu ) + homeTarget.height();
    
// //     menuFixo(scrollBottom, target);
// // });

// // //  var $win = $(window);
// // //  var homeTarget = ( $('body').hasClass('home') ) ? $('.topo') : $('.page');
// // //  var barraTop = $('.fixed-bottom');
// // //  var finalTop = $('#final-top');

// // //  var newslleter = finalTop.offset().top;
 
// // //  function barraTopFixo(target){
// // //     if ($win.scrollTop() > target && $win.scrollTop() <= newslleter) {      
// // //       barraTop.addClass('animated fadeInUp').removeClass('fadeOutDown');
// // //     } else {
// // //       barraTop.removeClass("fadeInUp").addClass("fadeOutDown");
// // //       barraTop.css({'position': 'relative', 'opacity':1 }).removeClass('animated');

// // //       // if ( barraTop.hasClass('fadeOutDown') ) {
// // //       //   setTimeout(function(){
                     
// // //       //   }, 300);          
// // //       // }
// // //     }
// // //   }

// // // // Menu Scroll
// // // $win.on("scroll", function(){  
// // //   console.log('Window', $win.scrollTop());
// // //   console.log(homeTarget.offset().top);     
// // //   console.log(newslleter);

// // //   barraTopFixo(homeTarget.offset().top);
// // // });


// // // AJAX CONTENT
// // ajaxContent($('.filtro-simples__link.active'));
// // $('#ajax-content').addClass('ajax-load');

// // $("[data-ajax='gal']").click( function(e) {  
// //     $("[data-ajax='gal']").removeClass('active');
// //     $(this).addClass('active');
    
// //     e.preventDefault();
// //     ajaxContent(this);    

// //     $('#ajax-content').addClass('ajax-load');
// // });

// // function ajaxContent(link) {
// //   $link = $(link).attr('href');
// //   $target = $(link).data('ancora');

// //   $("#ajax-content").load($link + ' #' + $target, function() {
// //       $(this).removeClass('ajax-load');     
// //   });
// // }

// /*=========================================================================================
// // OWL
// ========================================================================================= */

// // $("#banner").owlCarousel({
// //   items: 1,
// //   nav: false,
// //   dots: true,
// //   loop: true,
// //   margin: 0,
// //   autoplay:true,
// //   autoplayTimeout:8000,
// //   autoplayHoverPause:true,
// //   //navText: false,
// //   responsive: {
// //     0: {
// //       items: 1
// //     },
// //     600: {
// //       items: 1,
// //       nav: true
// //     },
// //     1000: {
// //       items: 1,
// //       nav: true
// //     }
// //   }

// // });
// // $("#numeros").owlCarousel({
// //   items: 1,
// //   nav: false,
// //   dots: true,
// //   loop: true,
// //   margin: 0,
// //   autoplay:true,
// //   autoplayTimeout:8000,
// //   autoplayHoverPause:true,
// //   //navText: false,
// //   responsive: {
// //     0: {
// //       items: 1
// //     },
// //     600: {
// //       items: 3,
// //       nav: true
// //     },
// //     1000: {
// //       items: 5,
// //       nav: false,
// //       loop:false
// //     }
// //   }

// // });






// // //  $("#solution").owlCarousel({
// // //    items: 1,
// // //    nav: true,
// // //    dots: true,
// // //    loop: true,
// // //    margin: 0,
// // //    autoplay:true,
// // //    autoplayTimeout:2500,
// // //    autoplayHoverPause:true,
// // //    navText: false,
// // //    responsive: {
// // //      0: {
// // //        items: 1,
// // //        dots: true,
// // //        nav: false
// // //      },
// // //      600: {
// // //        items: 3,
// // //        dots: false,
// // //        nav: false
// // //      },
// // //      1000: {
// // //        items: 4,
// // //        dots: false,
// // //        nav: false
// // //      }
// // //    }

// // //  });

// // $("#client").owlCarousel({
// //   items: 1,
// //   nav: true,
// //   dots: true,
// //   loop: true,
// //   margin: 0,
// //   autoplay:false,
// //   autoplayTimeout:2500,
// //   autoplayHoverPause:true,
// //   //navText: false,
// //   responsive: {
// //     0: {
// //       items: 1,
// //       nav: false
// //     },
// //     600: {
// //       items: 4,
// //       dots: false
// //     },
// //     1000: {
// //       items: 6,
// //       dots: false
// //     }
// //   }

// // });


// // /*=========================================================================================
// // // YOUTUBE VIDEO
// // =========================================================================================*/

// // $('.open-popup-video').magnificPopup({
// //     //para ativar para todos os links de um bloco, use delegate
// //     //delegate: 'a',
// //     type: 'inline',
// //     removalDelay: 300, //delay removal by X to allow out-animation
// //     callbacks: {
// //         beforeOpen: function() {
// //           var video = this.st.el.attr('data-video'),
// //               html = '<div class="youtube__iframe"><iframe width="560" height="315" src="https://www.youtube.com/embed/'+ video +'?autoplay=1&rel=0" frameborder="0" allowfullscreen></iframe></div>';

// //           $(this.st.el.attr('href')).html(html).fadeIn(1000);
// //           this.st.mainClass = this.st.el.attr('data-effect');
// //         },
// //         close: function () {
// //           $(this.st.el.attr('href')).html('');
// //         }
// //     },
// //     midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
// // });

// // /*=========================================================================================
// // // LABEL UP LOGIN
// // =========================================================================================*/

// // function filterLabel(){
// //   var $label = $('#loginform .input, .form__input .input, #form-cadastro .input');

// //   $label.filter(function(e, item){
// //     if ( $(item).val() != '') {
// //         labelUp( $(item).parent().find('label') );
// //     }
// //   });

// //   $label.on('click focus', function(el){
// //     var label = $(this).parent().find('label');
// //     labelUp(label);
// //   });

// //   $label.on('focusout', function(el){
// //     var $input = $(this);
// //     var pai = $input.parent();
// //     var label = $input .parent().find('label');

// //     if ( $input.val() == '' ){
// //         removeStyle(label);                
// //     }
// //   });
// // }

// // function labelUp(target){
// //   target.css({
// //       'font-size': '10px',
// //       'top': '4px',
// //   });
// // }

// // function focusLabel(target, color){
// //   target.css({
// //       'border-color': color,
// //   });
// // }

// // function removeStyle(target){
// //   target.removeAttr('style');
// // }

// // filterLabel();

// // function msgError(el, msg){
// //     focusLabel( el.parent(), '#e74c3c');
// //     $('<span class="msg">' + msg + '</span>').appendTo( el.parent() );
// // }


// // /*=========================================================================================
// // // LAZY
// // =========================================================================================*/

// // var bLazy = new Blazy({
// //     offset: 0, // Loads images 100px before they're visible
// //     error: function(ele){
// //         var original = ele.getAttribute('data-src');
// //         ele.src = original;
// //     }
// // });

// // function init() {
// //   var imgDefer = document.getElementsByClassName('img-defer');
// //   for (var i=0; i<imgDefer.length; i++) {
// //     if(imgDefer[i].getAttribute('data-src')) {
// //       imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
// //     }
// //   }
// // }

// // window.onload = init;

// /*=========================================================================================
// // EQUAL HEIGHT
// =========================================================================================*/
// // function equalizeHeights(selector) {
// //   var heights = new Array();

// //   // Loop to get all element heights
// //   $(selector).each(function() {

// //     // Need to let sizes be whatever they want so no overflow on resize
// //     $(this).css('min-height', '0');
// //     $(this).css('max-height', 'none');
// //     $(this).css('height', 'auto');

// //     // Then add size (no units) to array
// //     heights.push($(this).height());
// //   });

// //   // Find max height of all elements
// //   var max = Math.max.apply( Math, heights );

// //   // Set all heights to max height
// //   $(selector).each(function() {
// //     $(this).css('height', max + 'px');
// //   });
// // }

// // $(window).on('load resize', function(){
// //     equalizeHeights('.news__content');
// // });

// // // GALERIA EMPREENDIMENTOS
// // var $gal = $('.open-galeria');
// //   // console.log($gal);
// // $gal.on('click', function(e){
// //   e.preventDefault();

// //   $(this).parent().find('.status-obra__galeria a:eq(0)').trigger('click');  
// // });

// // $gal.each(function(event) {
// //     $(this).parent().find('.status-obra__galeria').magnificPopup({ 
// //         delegate: 'a',
// //         type: 'image',
// //         gallery: {
// //           enabled:true
// //         }
// //     });
// // });

// // $('.open-modal').magnificPopup({  
// //   removalDelay: 500,
// //   callbacks: {
// //     beforeOpen: function() {
// //        this.st.mainClass = this.st.el.attr('data-effect');
// //     },
// //     close: function() { 
// //       resetForm(); 
// //     }
// //   },
// //   midClick: true
// // });

// // function resetForm(){
// //     var form = $('.wpcf7-form');
// //     var input = form.find('input');
// //     var msg = form.find('.wpcf7-response-output');

// //     form.removeClass('invalid sucess');
// //     input.removeClass('wpcf7-not-valid');
// //     msg.hide();
// // }


/*=========================================================================================
// CLOSE FUNCTION
=========================================================================================*/
    });

});