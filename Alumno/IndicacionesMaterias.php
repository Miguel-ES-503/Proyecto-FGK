<?php require_once 'templates/head.php'; ?>
<title>Indicaciones transporte</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
<?php  
  
  //Manda  allamar plantillas
  require_once 'templates/header.php';

  //require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';


    //Carnet del alumno
    $stmt1 =$dbh->prepare("SELECT `ID_Alumno`  FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
    $stmt1->execute();
     while($fila = $stmt1->fetch()){
       $alumno=$fila["ID_Alumno"];
     }//Fin de while 



     // Expediente U
    $consulta=$pdo->prepare("SELECT idExpedienteU  FROM expedienteu WHERE ID_Alumno = ? AND estado = 'Activo'");
 
    $consulta->execute(array($alumno));
    $idExpedienteU;
     if ($consulta->rowCount()>=1)
     {
       while ($fila=$consulta->fetch())
       {   
         $idExpedienteU = $fila['idExpedienteU'];
       }
     }//fin de condicion


  
$CL="CL";
$n1="-";
$n2=mt_rand(1,9);
$n3=mt_rand(1,9);
$n4=mt_rand(1,9);
$n5=mt_rand(1,9);
$n6=mt_rand(1,9);

 //Generamos el id con el año y 4 numeros random
//codigo inscripcion ciclo
 $inscriC= $CL."".$n1."".$n2."".$n3."".$n4."".$n5."".$n6;
  $comp=1;



  while ($comp==1) {
      //Comprobamos que no exista otro igual
        $query=$pdo->prepare("SELECT COUNT(`idExpedienteU`) AS existe FROM `inscripcionciclos` WHERE `idExpedienteU`='".$inscriC."'");
        $query->execute();
        $existe;
        if ($query->rowCount() >0)
        {
          $r=$query->fetch();
          $existe = $r['existe'];
        }
        //Comprobamos que no exista
        if ($existe>=1) {
         $n1="-";
          $n2=mt_rand(1,9);
          $n3=mt_rand(1,9);
          $n4=mt_rand(1,9);
          $n5=mt_rand(1,9);
      $n6=mt_rand(1,9);
          // Si existe generamos otro id con el año y 4 numeros random
          $inscriC= $CL."".$n1."".$n2."".$n3."".$n4."".$n5."".$n6;
        }else {
          $comp=2;
        }
    }



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
                             
    <div class="container" style="">
          <h2 style="">Inscripcion de materias</h2>
          <br>
          <br>
          <br>
           <div class="row">
             
              <!--Primera columna-->
                  <div class="col-sm" style="">
                    <div class="col-sm-12 col-xs-12 col-md-12" id="requisitos">

                    <ul style="text-align: justify; color: black;" >
                           <h3 style="color: #BF3E3E;">Requisitos</h3>
                           <br>
                            <li>Ser becario activo del Programa Oportunidades.</li>
                            <li>Debera inscribir previamente su pensum</li>
                            

                               
                         </ul>
                        <br>
                    </div>
                   
                        
                      
                        <br>
                        <div class="col-sm-12 col-xs-12 col-md-12" id="archivos">

                        <ul style="text-align: justify; color: black; ">
                          <h4 style="color: #BF3E3E;">Archivos</h4>
                          <br>
                          
                           <li>Debera escanear el comprobante de inscipcion de materias que le proporciona su Universidad.</lil>
                           <li>Tambien sera necesario que en el mismo documento se encuentre su horario de clases.</lil>
                               
                        </ul>
                      <br>
                        </div>
                        

                   </div>

               <!-- Fin Primera columna-->

       <br>
                 <div class="col-sm" id="pasos" style="background-color: #c7c7c7">

                         <ol style="text-align: justify; color: black;" >
                            <h3 style="color: #BF3E3E;">Pasos:</h3>
                            <br>
                            <li>Llenar Formulario donde creara el listado de las asignaturas que tendra que cursar en su respectivo ciclo.</li>
                            <li>Finalmente debera agregar como comprobante de isncripción y su horario escaneado en un documento con formato pdf.</li>
                           
     
                         </ol>


                       
                         
                         <div class="alert" style="width: 80%; height:105px; text-align: justify; color: #BF3E3E; ">
                         <img src="../img/alert.svg" class="img-fluid">
                           <p>  <b>Nota:</b><i> No se recibiran solicitudes con documentación incompleta.</i></p>
                           <br>
                           
                         </div>
                      
         

     
                      
                       <ol>
                         <form style="text-align: justify;color: white;" name="form" action="Modelo/ModeloMaterias/GuardarInscriCiclo.php" method="post">

                           <label for="checkbox" class="agree" style="color:black;"><input type="checkbox"  class="checkbox" name="checkbox" id="checkbox" onclick= "enableSending();"/> <i>Acepto que he leido completamente la información y los requerimientos para la inscripcion de materias.</i></label>

                       
                        <!--ID Expediente U-->
                           <input type="hidden" name="expediente" value="<?php echo  $idExpedienteU;  ?>"> 
                        
                        <!--IDCicloInscripcion-->
                        <input type="hidden" name="inscriCiclo" value="<?php echo  $inscriC;  ?>"> 
                        


                           <!--input style="background: #1C1C1C;" type="button" onclick="location.href='SoliTransporte.php?id=<?php echo $solicitud; ?>'" class="submit btn btn-dark"  name = "submit" value="Iniciar proceso" disabled="disabled" -->

                          <center>
                          <input style="background: #1C1C1C;" type="submit"  class="submit btn btn-dark" id="Guardar_InscriCiclo"  name = "Guardar_InscriCiclo" value="Iniciar proceso" disabled="disabled" >                          </center
                         </form>
          

                       </ol>
                       <br>
      

  
              <!--Funcion que habilita y desabilita el boton de aceptacion terminos-->
                <script>
                   function enableSending() {
                   document.form.Guardar_InscriCiclo.disabled = !document.form.checkbox.checked;
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