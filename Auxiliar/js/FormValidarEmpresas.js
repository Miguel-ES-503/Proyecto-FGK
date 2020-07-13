$(document).ready(function(){
    $("#Guardar_Datos").click(function(){
        //Declaración de variables
       
        var NomEmpresa =$("#NombreEmpresa").val();
        var opc =$("#opciones").val();
        //Variables Estructura de alerta
        var alertaInicio="<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Cuidado!</strong>";
        var alertaCierre="</div>"
        
       
        
        //Verificar los campos
        
            if (!NomEmpresa=="") 
            {
                if (!opc=="") 
                {
                    
                }
                else
                {
                    document.getElementById("alerta3").innerHTML = alertaInicio + "Seleccione una opción!" + alertaCierre; return false;             
                }

            }else
            {   document.getElementById("alerta3").innerHTML = alertaInicio + "Nombre Empresa No ingresado!" + alertaCierre; return false;             
            }
        
        
        

        
    });// Fin de Enviar Datos   
});//Fin Document