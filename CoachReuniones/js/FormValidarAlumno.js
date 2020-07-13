$(document).ready(function(){
    $("#Guardar_Alumno").click(function(){
        //Declaración de variables
        var carnet =$("#CarnetAlumno").val();
        var correoOficial =$("#correo").val();
        //Variables Estructura de alerta
        var alertaInicio="<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Cuidado! </strong>";
        var alertaCierre="</div>";

        var Cargando = "<div class='spinner-border text-light' role='status'><span class='sr-only'>Cargando...</span></div>"
        
        //Expresión regular para validar los campos 
        var reg = /^([0-9]{4}([-]{1})([A-Z]{2}([-]{1})[A-Z]{2}([-]{1})[0-9]{4})$)/i; // Expresion Regular Nombre
        var tes = /(@oportunidades.org.sv{1})$/g;
        
        //Verificar los campos
        if(!carnet ==""){
            if(reg.test(carnet))
            {
                 if (tes.test(correoOficial))
                 {
                   

                 }else
                 {
                    document.getElementById("alerta").innerHTML = alertaInicio + " Ingrese el corro oficial oportunidades!" + alertaCierre; return false;
                 }
            
            } 
            else 
            { 
                document.getElementById("alerta").innerHTML = alertaInicio + " Carnet No Valido!" + alertaCierre; return false;

            }
        }
        else
        {
            document.getElementById("alerta").innerHTML = alertaInicio + "Carnet No ingresado!" + alertaCierre; return false;
            
        }

        

        
    });// Fin de Enviar Datos   
});//Fin Document


$(document).ready(function(){
    $("#SubirArchivo").click(function(){
        //Declaración de variables
        var file =$("#name").val();
       
     

        var Cargando2 = "<div class='spinner-border text-dark' role='status'><span class='sr-only'>Cargando...</span></div>"
   
        
        if (!file == "" )
        {
            document.getElementById("alerta2").innerHTML =Cargando2;
            return true;

        }
       
        

        
    });// Fin de Enviar Datos   
});//Fin Document