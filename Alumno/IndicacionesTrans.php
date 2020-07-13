<?php require_once 'templates/head.php'; ?>
<title>Indicaciones transporte</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
<?php  
  
  //Manda  allamar plantillas
  require_once 'templates/header.php';

  //require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';



  
/*$consulta6=$pdo->prepare("SELECT COUNT(ID_Slicitud) AS 'RES' FROM solitransporte WHERE ID_Alumno = ? AND estado = 'Proceso'  ");
$consulta6->execute(array($_GET['id']));

$resutComentario;

if ($consulta6->rowCount()>=1)
{
  while ($fila6=$consulta6->fetch())
  {   
   $resutComentario = $fila6['RES'];
 }
}*/


//------------------OBTENER CICLO ------------------------
//consulta para obtener el ciclo de la fundacion

  $fechaActual=date("Y-m-d");
  $consulta3=$pdo->prepare("SELECT ID_Ciclo FROM ciclos WHERE Fechanicio<= FechaFinal AND FechaFinal>= Fechanicio ");
  $consulta3->execute(array($fechaActual , $fechaActual));
 
   $obtenerCiclo;

   if ($consulta3->rowCount()>=0)
   {
     while ($fila3=$consulta3->fetch())
     {   
        $obtenerCiclo = $fila3['ID_Ciclo'];
     }
   }

//----------------------------------------------------------

//----------------------------------------------------------
  //Codigo de Solicitud transporte


   //creacion de codigo aleatorio para solicitud
    $ST="ST";
    $n1="-";
    $n2=mt_rand(1,9);
    $n3=mt_rand(1,9);
    $n4=mt_rand(1,9);
    $n5=mt_rand(1,9);
    $n6=mt_rand(1,9);

    //Generamos el id con el año y 4 numeros random
     $solicitud= $ST."".$n1."".$n2."".$n3."".$n4."".$n5."".$n6;
      $comp=1;


 while ($comp==1) {
                  //Comprobamos que no exista otro igual
                 $query=$pdo->prepare("SELECT COUNT(`idSoliTrans`) AS existe FROM `solitransporte` WHERE `idSoliTrans`='".$solicitud."'");
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
                        $solicitud=ST."".$n1."".$n2."".$n3."".$n4."".$n5."".$n6;
                    }else {
                         $comp=2;
                          }
                    }

//-------------------------------------------------------
?>

<!--div principal-->
<div class="container-fluid text-center"><br>
  
  <div>
    <div>
                             
        <div class="container" style="background: #585858;">
          <h2 style="color: white; background: #BF3E3E;">Requerimientos para solicitar transporte</h2>
          <br>
           <div class="row">
             
              <!--Primera columna-->
                  <div class="col-sm" style="color: #343434;">
                   
                         <ul style="text-align: justify; color: white;" >
                           <h3 style="color:#A4A4A4;">Requisitos</h3>
                            <li>Ser becario activo del Programa Oportunidades.</li>
                            <li>Cumplir todas sus obligaciones como becario.</li>
                            <li>Tambien aplica para becas externas con apoyo FGK:</li>

                                 <ul class="list-inline">
                                   <li>ESEN, KEISER, UGV, ECMH, ECCI</li>
                                 </ul>
                         </ul>
                        <br>

                        <ul style="text-align: justify; color: white; ">
                          <h4 style="color:#A4A4A4;">Archivos</h4>
                          
                           <li>Debera descargar el archivo socioeconomico que se encuentra a continuacion y cuando ya cuente con la informacion completa escanearlo.</lil>
                        
                               <ul>
                                 <span >  
                                 <br>
                                 <button style="background: #1C1C1C;" type="button" class="btn btn-dark px-3" onclick="location.href='../Alumno/pdf/socioeconomico.docx'"><i class="fas fa-download"></i> Socioeconomico</button>
                                 </span>
                               </ul>
                        </ul>

                   </div>

               <!-- Fin Primera columna-->

       


                 <div class="col-sm"  style="color: #343434;">

                         <ol style="text-align: justify; color: white;" >
                            <h3 style="color:#A4A4A4;">Pasos:</h3>
                            <li>Llenar Formulario donde creara el listado de las rutas de buses que toma y con su respectivo precio.</li>
                            <li>Crear horario de los dias que asiste a la Universidad.</li>
                            <li>Finalmente debera agregar como comprobante el archivo socioeconomico escaneado.</li>
     
                         </ol>


                       <center>
                         <div class="alert alert-danger " role="alert" style="width: 80%; height:105px; text-align: justify; background: #BF3E3E; color: white; ">
                           <h4 style="color:white;">Nota:</h4>
                           <b >No se recibiran solicitudes con documentación incompleta</b>
                           <br>
                         </div>
                      </center>
         

     
                      
                       <ol>
                         <form style="text-align: justify;color: white;" name="form" action="Modelo/ModeloTransporte/GuardarSoliTrans.php" method="post">

                           <label for="checkbox" class="agree"><input type="checkbox"  class="checkbox" name="checkbox" id="checkbox" onclick= "enableSending();"/> Acepto que he leido completamente la información y los requerimientos de la solicitud de transporte.</label>

              
                        <!--ID ALUMNO-->
                           <input type="hidden" name="iduser" value="<?php echo $_GET['id'];  ?>"> 
                        <!--ID SOLITRANS-->
                           <input type="hidden" name="solicitud" value="<?php echo  $solicitud;  ?>"> 
                        <!--ID CICLO FGK-->
                           <input type="hidden" name="ciclo" value="<?php echo  $obtenerCiclo;  ?>">


                           <!--input style="background: #1C1C1C;" type="button" onclick="location.href='SoliTransporte.php?id=<?php echo $solicitud; ?>'" class="submit btn btn-dark"  name = "submit" value="Iniciar proceso" disabled="disabled" -->


                           <input style="background: #1C1C1C;" type="submit"  class="submit btn btn-dark" id="Guardar_SoliTrans"  name = "Guardar_SoliTrans" value="Iniciar proceso" disabled="disabled" >

                         </form>
          

                       </ol>
                       <br>
      

  
              <!--Funcion que habilita y desabilita el boton de aceptacion terminos-->
                <script>
                   function enableSending() {
                   document.form.Guardar_SoliTrans.disabled = !document.form.checkbox.checked;
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