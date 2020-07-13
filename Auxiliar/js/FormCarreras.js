$(document).ready(function(){
    $("#Guardar_Carrera").click(function(){

        //Declaración de variables
        var codigos =$("#Codigo").val();
        var nombreCarrera =$("#NomCarr").val();
        var faculta =$("#Faculta").val();
        var duracion =$("#duracion").val();
       
        //Variables Estructura de alerta
        var alertaInicio="<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Cuidado!</strong>";
        var alertaCierre="</div>"
        
       
        
        //Verificar los campos
        
            if (!nombreCarrera =="") {
                if (!faculta=="") {
                    if (!duracion=="") {

                    }else
                    {
                         document.getElementById("alerta5").innerHTML = alertaInicio + " Seleccione la duracción de la carrera!" + alertaCierre; return false;
                    }

                }else
                {
                     document.getElementById("alerta5").innerHTML = alertaInicio + " Seleccione la faculta!" + alertaCierre; return false;
                }

            }else
            {
                document.getElementById("alerta5").innerHTML = alertaInicio + " Nombre Carrera No ingresado!" + alertaCierre; return false;
            }
           
           
       
        

        
    });// Fin de Enviar Datos   
});//Fin Document