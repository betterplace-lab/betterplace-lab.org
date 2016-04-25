// Fixierter Tabellenkopf
$(window).bind("resize",function(){
  var width = $(window).innerWidth();
  switch(true) {
    case(width < 876):
    $('.data-sheet thead').affix({
      offset: {
        top: 850
      }
    });
    break;
    case(width > 1008):
    $('.data-sheet thead').affix({
      offset: {
        top: 800
      }
    });
    break;
    default:
    $('.data-sheet thead').affix({
      offset: {
        top: 800
      }
    });
    }
});