 <?php require_once 'templates/head.php'; ?>
<title>Indicaciones transporte</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
<?php  
  
  //Manda  allamar plantillas
  require_once 'templates/header.php';

  //require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';

 ?>

<!--div principal-->
<div class="container-fluid text-center">
<div class="title">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Requerimiento de inscripcion</h2>
  <br>
</div> 
  <div>
    <div>
                             
        <div class="container" style="background: white;">
          
          <br>
          <br>
          <br>
           <div class="row">
             
              <!--Primera columna-->
                  <div class="col-sm" style="color: #343434;">
                   
                         <ul style="text-align: justify; " >
                           <h3>Requisitos</h3>
                            <li>Ser becario activo del Programa Oportunidades.</li>
                            <li>Debera inscribir previamente su pensum</li>
                           
                          
                         </ul>
                        <br>

                        <ul style="text-align: justify;">
                          <h4 style="color:black;">Documentos</h4>
                          
                           <li>Debera escanear el comprobante de inscipcion de materias que le proporciona su Universidad.</lil>

                           <li>Tambien sera necesario que en el mismo documento se encuentre su horario de clases.</lil>
                        
                               
                        </ul>

                   </div>

               <!-- Fin Primera columna-->

       


                 <div class="col-sm"  style="color: #343434;">

                         <ol style="text-align: justify;" >
                            <h3>Pasos:</h3>
                            <li>Llenar Formulario donde creara el listado de las asignaturas que tendra que cursar en su respectivo ciclo.</li>
                         
                            <li>Finalmente debera agregar como comprobante de isncripción y su horario escaneado en un documento con formato pdf.</li>
     
                         </ol>


                       <center>
                         <div class="alert alert-danger " role="alert" style="width: 80%; height:105px; text-align: justify; background: #B62020; color: white; ">
                           <h4 style="color:white;">Nota:</h4>
                           <b >No se recibiran solicitudes con documentación incompleta</b>
                           <br>
                         </div>
                      </center>
         

     
                      
                       <ol>
                         <form style="text-align: justify;" name="form" action="CrearSoliTransporte.php?id=<?php echo $alumno; ?>" method="post">

                           <label for="checkbox" class="agree"><input type="checkbox"  class="checkbox" name="checkbox" id="checkbox" onclick= "enableSending();"/> Acepto que he leido completamente la información y los requerimientos de la solicitud de transporte.</label>


                           <input type="button" onclick="location.href='InscripcionMateriasCiclo.php?id=<?php echo $alumno; ?>'" class="submit btn btn-dark"  name = "submit" value="Iniciar proceso" disabled="disabled" >

                         </form>
          

                       </ol>
                       <br>
      


              <!--Funcion que habilita y desabilita el boton de aceptacion terminos-->
                <script>
                   function enableSending() {
                   document.form.submit.disabled = !document.form.checkbox.checked;
                   }

                </script>

             </div> <!--Fin segunda columna-->

    
           </div> <!--Fin de row-->


         </div><!--Fin de container-->

       </div> 

     </div>
  </div> 
  <br>
  <br>
</div><!-- Fin de div principal-->

<!-- /#page-content-wrapper -->



</div>

</div>

<!-- /#wrapper -->





 <?php

  require_once 'templates/footer.php';

?>