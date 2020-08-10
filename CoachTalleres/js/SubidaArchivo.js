var Cargando2 = "<div class='spinner-border text-dark' role='status'><span class='sr-only'>Cargando...</span></div>"

$(document).ready(function(){
    $("#comprobatePDF").click(function(){
        //Declaración de variables
        var file =$("#archivo").val();   
        if (!file == "" )
        {
            document.getElementById("alerta2").innerHTML =Cargando2;
            return true;
        }
    });// Fin de Enviar Datos   
});//Fin Document



$(document).ready(function(){
    $("#SubidaExcel").click(function(){
        //Declaración de variables
        var file2 =$("#nameExcel").val();   
        
        if (!file2 == "" )
        {
            document.getElementById("alerta3").innerHTML =Cargando2;
            return true;
        }
    });// Fin de Enviar Datos   
});//Fin Document


$(document).ready(function(){
    $("#crear").click(function(){
        //Declaración de variables
        var file3 =$("#archivo2").val();   
        
        if (!file3 == "" )
        {
            document.getElementById("alerta4").innerHTML =Cargando2;
            return true;
        }
    });// Fin de Enviar Datos   
});//Fin Document




$(document).ready(function(){
    $("#importarExcel").click(function(){
        //Declaración de variables
        var file4 =$("#name2").val();   
        
        if (!file4 == "" )
        {
            document.getElementById("alerta5").innerHTML =Cargando2;
            return true;
        }
    });// Fin de Enviar Datos   
});//Fin Document



$(document).ready(function(){
    $("#notas").click(function(){
        //Declaración de variables
        var file5 =$("#archivo").val();   
        
        if (!file5 == "" )
        {
            document.getElementById("alerta6").innerHTML =Cargando2;
            return true;
        }
    });// Fin de Enviar Datos   
});//Fin Document