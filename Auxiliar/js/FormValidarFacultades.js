$(document).ready(function(){
    $("#Guardar_Facultad").click(function(){
        //Declaración de variables
        var NombreFaculta =$("#NombreFac").val();
        //Variables Estructura de alerta
        var alertaInicio="<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Cuidado!</strong>";
        var alertaCierre="</div>"
        
       
        
        //Verificar los campos
        if(!NombreFaculta =="")
        {
        }
        else
        {
            document.getElementById("alerta6").innerHTML = alertaInicio + "Nombre Faculta No ingresado!" + alertaCierre; return false;
            
        }

        

        
    });// Fin de Enviar Datos   
});//Fin Document