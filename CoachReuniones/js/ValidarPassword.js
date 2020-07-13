$(document).ready(function(){
    $("#Restablecer").click(function(){
        //Declaración de variables
        var Password1 =$("#password").val();
        var Password2 =$("#passwordVerifcado").val();
        //Variables Estructura de alerta
        var alertaInicio="<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Cuidado! </strong>";
        var alertaCierre="</div>"
        
        //Expresión regular para validar los campos 
       
        
        if (Password1 == Password2)
        {

        }else
        {
            document.getElementById("pass").innerHTML = alertaInicio + "Contraseña no Coincide" + alertaCierre; return false;


        }

        

        
    });// Fin de Enviar Datos   
});//Fin Document