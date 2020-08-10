$(document).ready(function () {
  //Ocultamos lod div que serviran de mensaje
  $("#redes").hide();
  $("#pass").hide();
  $("#phone").hide();
  //El span que dice "foto de perfil"
  $("#ocultar7").hide();
  if ($("#Cargo").val() == "Estudiante") {

  }
  else {
    //En el caso que no sea Estudiante ocultamos todos los input de redes sociales
    $("#ocultar").hide();
    $("#ocultar1").hide();
    $("#ocultar2").hide();
    $("#ocultar3").hide();
    $("#ocultar4").hide();

    $("#ocultar6").hide();
    $("#ocultar7").show();
  }

  $("#Restablecer").click(function () {
    if ($("#Cargo").val() == "Estudiante") {

      //nos servirar para llevar el conteo
      var cont = 0;
      var cel = true;
      if ($('#facebook').val().length != 0) {
        cont++;
      }
      if ($('#instagram').val().length != 0) {
        cont++;
      }
      if ($('#twitter').val().length != 0) {
        cont++;
      }
      if ($('#linkedin').val().length != 0) {
        cont++;
      }
      if($('#celular').val().length != 8 ) 
      {
          cel = false;
      }
      if (!cel) {
        $("#phone").show();
        setTimeout(function () {
          $("#phone").fadeOut(1500);
        }, 2000);
        return false;
      }
      //Validamos que haya ingresado almenos 2 redes sociales
      if (cont < 2) {
        $("#redes").show();
        setTimeout(function () {
          $("#redes").fadeOut(1500);
        }, 2000);
        return false;
      }
    }
    //Declaración de variables
    var PasswordIngresaodo = $("#password").val();
    var PasswordVerificar = $("#passwordVerifcado").val();
    //Verificar los campos
    if (PasswordIngresaodo != PasswordVerificar) {
      $("#pass").show();
      setTimeout(function () {
        $("#pass").fadeOut(1500);
      }, 2000);
      return false;
    }
  });// Fin de Enviar Datos
});//Fin Document
