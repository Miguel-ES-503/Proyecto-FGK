$(document).ready(function() {
    $(".desinscribir").hide();
    function inscribe(alumno, taller, inscribir) {
      $.post("inscribir.php",{alumno:alumno, taller:taller, inscribir:inscribir},function(data) {
        if (data==1) {
          $(".inscribir").hide();
          $(".desinscribir").show();
        }else if (data==2) {
          $(".inscribir").show();
          $(".desinscribir").hide();
        }
      });
    }
});
