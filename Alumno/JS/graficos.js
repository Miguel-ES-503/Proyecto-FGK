$(document).ready(function() {
      //$(".dial").knob();
      $('.grafic1').knob({
        'min':0,
        'max':15,
        'width':130,
        'height':250,
        'displayInput':true,
        'placeholder':"%",
        'fgColor':"#BE0032",
        'release':function(v) {$("p").text(v);},
        'readOnly':true
      });
    });