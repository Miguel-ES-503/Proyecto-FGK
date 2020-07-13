$(document).ready(function(){
    
    //e.preventDefault(); En el caso de que sea un boton no ejecuta la opcion de enviar pero si el ajax
    //Para validar los cambios del select 
    $LugarV  = 0;
    $CicloV =0;
    $("#idempresa").on("change", function (e) {
      $LugarV = $('#idempresa').val(); 
      Verifica();
    });

    
    $("#idCICLO").on("change", function (e) {
       
        $CicloV = $('#idCICLO').val();
        Verifica();
    });
    function Verifica()
    {
        //Verifica que se haya seleccionado un opcion del select
        if ($LugarV == 0) {
            alert('Debes seleccionar un lugar ');
            
        }
         else
         {
            if ($CicloV == 0) {
                alert('Debes seleccionar un ciclo ');
            }
            else{
               //alert($('#idempresa').val());
             var lugar = $("#idempresa").val(); // guarda el nombre seleccionado del select 
             var ciclo = $("#idCICLO").val();
             // crea un objeto JSON para enviarlo
             var dataToSend = JSON.parse('{"ciclo": "' + ciclo + '", "lugar": "' + lugar + '"}');
             procesoAjax(dataToSend);
            }
         }
    }

    function procesoAjax(dataToSend) {
        $.ajax(
            {
                url: "../../Modelo/ModeloReunion/CrearNombreReunion.php", // url que procesara la petición
                dataType: "json", // tipo de datos a enviar
                data: dataToSend, // datos a enviar (json)
                type: "get" // metodo de petición
            }
        )
            .done(function (data) {
                $dat = data["total"];
                $("#NombreReunion").val("Reunion " + (parseInt($dat) + 1));

                //console.log(dataToSend);
                //console.log(data);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText);
            });
    }
});


