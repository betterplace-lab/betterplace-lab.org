// Eva Inhaltselement durch Link oeffnen
$(window).load(function() {
var queryString = window.location.hash;
  $(queryString).find('.ka-content').show('');
  $('.autor-werk').each(function() {
  $('.autor-werk div.csc-default').removeClass('csc-default').addClass('white-popup-block mfp-hide').prepend( "<button title='Schließen' type='button' class='mfp-close'>×</button>");
  });
});

jQuery(function($) {
  // Falls die Konstante nicht gesetzt wurde...
  if(typeof tx_kiwiaccordion_effect == 'undefined') {
    tx_kiwiaccordion_effect = 'none';
  }
  // Elemente vorbereiten
  $('.ka-panel').each(function() {
    //Erste Überschrift suchen
    $header = $(':header:first', this);   
    //Fehler Behandlung wenn keine Ãœberschrift vorhanden ist
    if($header.length == 0) {
      $(this).addClass('ka-error').removeClass('ka-panel');
      console.error('This panel contains no header.', this);
    }
    else {
      //kleiner trick um <div class="csc-header"><h1>... abzufangen     
      if($header.parent().find('*').length == 1 && !$header.parent().is('.ka-panel')) {
        $header.parent().addClass('ka-handler');
      }
      else {
        $header.addClass('ka-handler');
      }
      
      //Inhalte umschließen für die Ansprache
      $('.ka-handler', this).siblings().wrapAll('<div class="ka-content"></div>');
      
      //prÃ¼fen ob ein Fehler aufgetreten ist
      if($('.ka-content .ka-handler', this).length > 0) {
        console.error('Handler may not be wrapped by more then one element.', this);
        $(this).addClass('ka-error').removeClass('ka-panel');
      }
    }
  });
  // Versteckte Inhalte nicht anzeigen
  $('.ka-panel.close .ka-content').hide();
  // FÃ¼r ein paar Effekte
  $('.ka-panel .ka-handler').hover(function() {
    $(this).parents('.ka-panel').addClass('hover');
  }, function() {
    $(this).parents('.ka-panel').removeClass('hover');
  });
  // Eventhandler
  $('.ka-handler').click(function(event, data) {
    $panel = $(this).parents('.ka-panel');
    $content = $panel.find('.ka-content');    
    if($panel.is('.close')) {
      $('.ka-panel.ka-opend').removeClass('ka-opend');
      //Dieses Panel aufklappen
      switch(tx_kiwiaccordion_effect) {
        case 'slide':
          $content.slideDown();
          break;
        case 'fade':
          $content.fadeIn();
          break;
        default:
          $content.show();        
      }
      $panel.removeClass('close').addClass('open');
      //Wenn nur ein offenes Panel erlaubt ist, andere Panels schlieÃŸen
      if(tx_kiwiaccordion_exclusive) {
        $('.ka-panel.open .ka-handler').trigger('click', {clicked: $('.ka-panel').index($panel)});
      }
    }
    else {
      if(!data) {
        data = { clicked: -1 };
      }
      if(data.clicked != $('.ka-panel').index($panel)) {
        //Diesen Panel zuklappen
        switch(tx_kiwiaccordion_effect) {
          case 'slide':
            $content.slideUp();
            break;
          case 'fade':
            $content.fadeOut();
            break;
          default:
            $content.hide();        
        }
        $panel.removeClass('open').addClass('close');
      }
    }
  }); 
});

//$( function () {
//  $('a.infobox').click( function (e) {
//    var linkTarget = $(this).attr('href');
//    //if(window.location.hash) {
////      var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
////      alert (hash);
////      // hash found
////  } 
//    $('<div>', {
//      class: 'modal'
//    })    
//    .load(linkTarget, {type: 911}, function () {
//      $(this).delay(300).fadeIn();
//    })
//    .appendTo('body') 
//    .hide(); 
//    e.preventDefault(); 
//  });
//});

//$('.open-popup-link').magnificPopup({
//  type:'inline',
//  midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
//});


$(function () {
  $('.infobox').magnificPopup({
    type: 'inline',
    preloader: false,
    focus: '#username',
    overflowY: 'auto',
    modal: true,
    closeOnContentClick: false, 
    closeOnBgClick: true,
    showCloseBtn: true,
    closeBtnInside: true,
    removalDelay: 300,
    mainClass: 'mfp-fade'
  });
  $(document).on('click', '.popup-modal-dismiss', function (e) {
    e.preventDefault();
    $.magnificPopup.close();
  });
});
//$(function () {
//$( '.infobox' ).magnificPopup({
//          type: 'ajax',
//          callbacks: {
//  parseAjax: function(mfpResponse) {
//    // mfpResponse.data is a "data" object from ajax "success" callback
//    // for simple HTML file, it will be just String
//    // You may modify it to change contents of the popup
//    // For example, to show just #some-element:
//    mfpResponse.data = $(mfpResponse.data).find('#content .csc-default');//    // mfpResponse.data must be a String or a DOM (jQuery) element//   // console.log('Ajax content loaded:', mfpResponse);
//  },
//  ajaxContentAdded: function() {
//    // Ajax content is loaded and appended to DOM
//    console.log(this.content);
//  }
//}
//      });
//});

//$( '.infobox' ).click(function() {
//  var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
//  $('.infobox').setAttribute("data-fragment", 'hash'); 
//});//
//

//$(function () {
//$( '.infobox' ).magnificPopup({
//         type: 'ajax',
//          fixedContentPos: false,
//          fixedBgPos: true,
//          overflowY: 'auto',
//          closeBtnInside: true,
//          preloader: false,
//          midClick: true,
//          removalDelay: 300,
//          //mainClass: 'my-mfp-zoom-in',
//          disableOn: 480,
//          callbacks: {
//            parseAjax: function( mfpResponse ) {
//                var mp = $.magnificPopup.instance,
//                t = $( mp.currItem.el[0] ),
//                fragment = ( t.data( 'fragment' ) );
//                 mfpResponse.data = $( mfpResponse.data ).find( fragment );
//                //console.log( 'Ajax content loaded:', mfpResponse );
//            }
//          }
//      });
//});


                $(function() {
                $('a[rel*="lightbox"]').magnificPopup({
                        type: 'image',
                        tLoading: 'Lade Bild...',
                        tClose: 'Schließen (Esc)',
                        image: {
                                titleSrc: function(item) {
                                        var title = item.el.attr('title');
                                        var description = item.el.attr('alt');
                                        return ((title)?title:'') + ((description)?'<small>'+ description +'</small>':'');
                                }
                        },
                        gallery: {
                                enabled: true,
                                navigateByImgClick: true,
                                preload: [0,1],
                                tCounter: '%curr% von %total%',
                                tPrev: 'Zurück (Linke Pfeiltaste)',
                                tNext: 'Vorwärts (Rechte Pfeiltaste)'
                        },
                });
        });
