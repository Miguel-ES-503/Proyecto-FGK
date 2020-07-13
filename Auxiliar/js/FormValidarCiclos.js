$(document).ready(function(){
    $("#Guardar_ciclos").click(function(){
        //Declaración de variables
        var IDciclo =$("#idciclo").val();
        var iniciCiclo = $("#fechaInicio").val();
        var finCiclo = $("#fechaFinal").val();
        //Variables Estructura de alerta
        var alertaInicio="<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Cuidado! </strong>";
        var alertaCierre="</div>"
        
        //Expresión regular para validar los campos 
        var reg = /^([0-2]{2}([-]{1})([0-9]){4})$/g; // Expresion Regular Nombre
        
        //Verificar los campos
        if(!IDciclo ==""){
            if (!iniciCiclo == "") 
            {
                if (!finCiclo =="") 
                {
                    if (reg.test(IDciclo)) 
                    {

                    }else
                    {
                        document.getElementById("alerta9").innerHTML = alertaInicio + "Formto Incorrecto. Es 00-0000" + alertaCierre; return false;
                    }

                }else
                {
                    document.getElementById("alerta9").innerHTML = alertaInicio + "Ingrese Final del ciclo" + alertaCierre; return false;
                }

            }else{
               document.getElementById("alerta9").innerHTML = alertaInicio + "Ingrese el ciclo de inicio" + alertaCierre; return false;

           }
 
       }
       else
       {
        document.getElementById("alerta9").innerHTML = alertaInicio + "ingrese el ciclo actual" + alertaCierre; return false;

    }

        

        
    });// Fin de Enviar Datos   
});//Fin Document