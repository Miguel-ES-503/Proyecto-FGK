 <?php require_once 'templates/head.php'; ?>
<title>Indicaciones retiro</title>
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
	<h2 class="main-title" >Retiro materias</h2>
  <br>
</div> 
  <div>
    <div>
                   
        <div class="container" style="background: white;">
     


          <br>
           <div class="row">
             
              <!--Primera columna-->
                  <div class="col-sm" style="color: #343434;">

                   
                         <ul style="text-align: justify; " >
                           <h3>Reglas para retiro:</h3>
                            <li>A continuación se muestran las asignaturas que usted ha inscrito en este ciclo, debera escoger cual es la que desea retirar. </li>
                            <li>Debera llenar el formulario de retiro que le aparecera con los datos que se le solicitan.</li>
                            <li>Posteriormente se enviara a su coach una notificación en la cual el o ella aceptara  o denegara su solicitud de inscripción.</li>
                            
                            <li>Debera crear una carta formal en donde describa el motivo que lo lleva a retirar la asignatura y cree un plan estrategico de como recuperarla, creando metas alcanzables en poco tiempo.</li>
                            <br>

                      <!--ol>

                       
                         <div class="alert alert-danger " role="alert" style="width: 50%; height:75px; text-align: justify; background: #B62020; color: white; ">
                           <h4 style="color:white;">Nota:</h4>
                           <b >No se recibiran solicitudes con documentación incompleta.</b>
                          
                         </div>
                   

                      </ol-->
         
                            

                
                      
  <h3>Asignaturas Inscritas ciclo </h3>
                   </div>

               <!-- Fin Primera columna-->


              
    
           </div> <!--Fin de row-->
           






     
        <!--Tabla costos de trasnporte-->
                  <div class="table-responsive">

                    <span class="float-right">  
                      
                             


                              <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#ModalMateria' style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 115px;height: 52px;
     background-color: #9d120e;
     color:white;"><img src="../img/add.png" width="25px" height="25px"><p style="font-size: 10px;">Inscribir Materias</p></button>
                              <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' style="border-radius: 20px;
    border: 2px solid #196fb0;
    width: 115px;height: 52px;
     background-color: #196fb0;
     color:white;"><img src="../img/paper.png" width="25px" height="25px"><br><p style="font-size: 10px;">Subir Comprobante</p></button>


                               <!--<button type='button' class='btn btn-danger' disabled><i class='fas fa-file-pdf' ></i></button>-->

                          </span>
                           <br> <br><br>

                       <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
                           <thead style="background-color: #2D2D2E; color: white;">
                               <tr>  
                                   <th scope="col">Codigo</th>
                                   <th scope="col">Asignatura</th>
                                   <th scope="col">Retirar</th>
                                   </tr>
                               </tr>
                           </thead>
                                    
                           <tbody>
                              <?php 
                              // Consulta De La BASE DE DATOS
                              /* $consulta=$pdo->prepare("SELECT * FROM rutasbuses WHERE ID_Alumno = ? AND estado = 'Proceso'");
                               $iduser = $_GET['id'];
 
                               $totolTransporte = 0; //var que servira para calcular total

                                   $consulta->execute(array($iduser));

                                     if ($consulta->rowCount()>=1)
                                      {
                                        while ($fila=$consulta->fetch())
                                          {   echo "
                                        <tr class='table-light'>
                                        <th>".$fila['id']."</th>
                                        <th>".$fila['ruta']."</th>
                                        <th>".$fila['costo']."</th>
                                        <th>".$fila['cantidad']."</th>
                                        <th>$ ".$fila['total']."</th>
                                        <th>".$fila['observaciones']."</th>
                                        <td><center><a href='Modelo/ModeloRutas/EliminarRuta.php?id=".$fila['id']."&id2=". $_GET['id']."' class='fas fa-trash  btn btn-danger'></a></center></td>
                                        </tr>";

                                       //claculo precio
                                       $total = $costo * $cantidad;

                                       $totolTransporte = $fila['total'] +  $totolTransporte;

                                      }
                                    }*/

                               ?>

                           </tbody>        
                          </table> 


                                <br><br>


                                


                                <!--div class="f1-buttons">
                                     <input type="button" onclick="location.href='RetiroMateria.php?id=<?php echo $alumno; ?>'" class="submit btn btn-dark"  name = "submit" value="Iniciar proceso"  >
                                </div-->

                                <br>

                          



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