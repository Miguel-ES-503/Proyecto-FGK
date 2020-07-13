 window.onload=function(){
    $("table tbody tr").click(function(){
        // Tomar la captura la información  de la tabla 
        var IDCorreo= $(this).find("td:eq(0)").text(); 
        document.getElementById('correlElectronico').value=IDCorreo;
      
         
   
         
    });    
}