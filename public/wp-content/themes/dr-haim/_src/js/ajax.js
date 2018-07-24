/*=========================================================================================
// INICIO AJAX JS
========================================================================================= */

jQuery(function($) {
    $(document).ready(function() {

/*=========================================================================================
//AJAX GLOBAL VARS
=========================================================================================*/

var SITE_URL = $('.mbr-header__link').attr('href');
var AJAX_URL = SITE_URL + '/wp-admin/admin-ajax.php';

// GET ESTADOS

// $(window).on('load', function(){
// 	var id = 6;

// 	$('.hv-exclusive__states[data-link="6"]').addClass('active'); //Marca o Ceará como o primeiro

// 	getEstados(id);
// });

// $('.hv-exclusive__states').on('click', function(event) {
// 	event.preventDefault();
//     var self = $(this);

//     $('.hv-exclusive__states').removeAttr('data-link-active').removeClass('active');
    
//     self.addClass('active');
//     self.attr('data-link-active', '');

//     var id = self.data('link');    
// 	getEstados(id);

// });

// function getEstados(id) {
//     $.ajax({
//         url: AJAX_URL,
//         type:'POST',
//         data: 'action=estados&term='+ id,

//         beforeSend: function() {
//             $('.hv-exclusive__load').html('<i class="fa fa-refresh fa-spin fa-lg fa-fw"></i>');
//         },

//         success: function(rsp){
//             centerScroll( $('.hv-exclusive__states.active') );
//             $('.hv-exclusive__load').html(rsp);
//         }
//     });
//    return false;
// }

/*=========================================================================================
//GET YOUTUBE VÍDEOS
=========================================================================================*/

// $('body').on('click', '.yt-more-videos', function() {

//     var $token   = $(this).attr('data-token'),
//         $itens   = $(this).attr('data-qtd'),
//         $title   = $(this).attr('data-title'),
//         $id      = $(this).attr('data-id'),
//         $caption = $(this).attr('data-caption'),
//         $like    = $(this).attr('data-like'),
//         $parent  = $(this).parent().parent().attr('id'),
//         data = {
//             'action' : 'youtube_pagination',
//             'token'  : $token,
//             'itens'  : $itens
//         }

//     console.log($parent);
//     YoutubeSearch(data, $parent);
// });

// function YoutubeSearch(data, div){
//     $('.yt-more-videos').addClass('loader').html('<i class="fa fa-refresh fa-spin" aria-hidden="true"></i>Carregando...').fadeIn(1000);
//     $.ajax({
//         url: AJAX_URL,
//         type:'POST',
//         data: data,
//         success: function(html){

//             $('.loader').fadeOut(1000);
//             $('.yt-more-videos').removeClass('loader').html('Ver mais').fadeIn(500);

//             $('#'+ div +' .wrap-token').remove();
//             $('#'+ div).append(html);
//             $('#'+ div +' .open-popup-video').attr('href', '#'+div+'_popup');

//             // $('#'+ div + ' .list-videos').append(html);
//             var bLazy = new Blazy();
//             bLazy.revalidate();

//             // var nexttoken = $('.nexttoken').attr('value');
//             // $('.yt-more-videos').attr('data-token', nexttoken);
//             // $('.nexttoken').remove();

//             $('.open-popup-video').magnificPopup({
//                 type: 'inline',
//                 removalDelay: 300,
//                 callbacks: {
//                     beforeOpen: function() {
//                       var video = this.st.el.attr('data-video'),
//                           html = '<div class="youtube__iframe"><iframe width="560" height="315" src="https://www.youtube.com/embed/'+ video +'?autoplay=1&rel=0" frameborder="0" allowfullscreen></iframe></div>';

//                       $(this.st.el.attr('href')).html(html).fadeIn(1000);
//                       this.st.mainClass = this.st.el.attr('data-effect');
//                     },
//                     close: function () {
//                       $(this.st.el.attr('href')).html('');
//                     }
//                 },
//                 midClick: true
//             });

//         }
//     });
//     return false;
// }

/*=========================================================================================
// CLOSE FUNCTION
=========================================================================================*/
    });
});