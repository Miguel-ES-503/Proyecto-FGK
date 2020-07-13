<?php require_once 'templates/head.php'; ?>
<title>Indicaciones transporte</title>
 <link rel="stylesheet" href="assets1/css1/style.css">
<?php  
  
  //Manda  allamar plantillas
  require_once 'templates/header.php';

  require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';

 ?>

<!--div principal-->
<div class="container-fluid text-center"><br>
  <!--Navbar-->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Creación de empresa</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link active" href="CrearSoliTransporte.php?id=<?php echo $_GET['id']; ?>">Costos diarios</a>
      </li>
       <li class="nav-item">
        <a class="nav-link active" href="SIT-CrearEmpresas.php">Comprobante</a>
      </li>
      
     
    </ul>
    <!-- Links -->   
  </div>
  <!-- Collapsible content -->
</nav>
<!--/.Navbar-->
  
  <div>

    <div>

                             
        <div class="container" style="background: white; "><br>

          <h2 style="color: #BF3E3E;">Solicitud Transporte</h2>
          
           <div class="row">
             
              <!--Primera columna-->
                  <div class="col-sm" style="color: #343434;">


                          <span class="float-right">  
                              <button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#ModalCosto"><i class="fas fa-file"></i>  Solicitar</button>

                          </span>
                           <br> <br><br>
                        
                     
                      
                       <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
                           <thead class="table-dark">
                               <tr>  
                                   <th scope="col">Codigo</th>
                                 
                                   <th scope="col">Ciclo Universidad</th>
                                   <th scope="col">Motivo</th>
                                   <th scope="col">Opción</th>
                                   </tr>
                               </tr>
                           </thead>
                                    
                           <tbody>

                                <?php 
                                      // Consulta que muestra las solicitudes que haga el usuario
                                      //dependiendo del usuario asi se l mostrara los datos
                                      $consulta=$pdo->prepare("SELECT idSoliTrans, cicloU, observacion1 FROM solitransporte WHERE ID_Alumno = ? AND estado = 'Proceso'");
                                      $iduser = $_GET['id'];

                                      

                                      $consulta->execute(array($iduser));

                                      if ($consulta->rowCount()>=1)
                                      {
                                        while ($fila=$consulta->fetch())
                                          {   echo "
                                        <tr class='table-light'>
                                        <th>".$fila['idSoliTrans']."</th>
                                        <th>".$fila['cicloU']."</th>
                                        <th>".$fila['observacion1']."</th>
                                        
                                        
                                        <td><center><a href='Modelo/ModeloTransporte/EliminarSoliTrans.php?id=".$fila['idSoliTrans']."&id2=". $_GET['id']."' class='fas fa-trash  btn btn-danger'></a></center></td>
                                        </tr>";



                                      }
                                    }

                                 ?>




                             
                             

                           </tbody>        
                        </table>

                          <br><br><br> 

                            

                          <br> 
                         
                         
                          <br>


                   </div>

               <!-- Fin Primera columna-->

       


                 
         

     
                      
                      
          

                       <br>
      


             
    
           </div> <!--Fin de row-->


         </div><!--Fin de container-->

       </div> 

     </div>
  </div> 
  <br>
  <br>
</div><!-- Fin de div principal-->

<!-- /#page-content-wrapper -->



                  <!--MODALS-->
                      <div class="hidden" >




                     
                  <!--MODALS-->
                      <div class="hidden" >




                      <!-- MODAL PENSUM -->
                      <!--**************-->

                      <div class="modal fade " id="ModalCosto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content" >
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Solicitud</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <form action="Modelo/ModeloTransporte/GuardarSoliTrans.php" method="POST" accept-charset="utf-8">
                          <div id="alerta5"></div>
                          <div class="col">

                            <div class="form-group">
                                <label class="sr-only" for="ciclou">Ciclo Universidad</label>
                                <input type="text" name="ciclou" placeholder="Ciclo Universidad" class="ciclou form-control"  id="ciclou">
                            </div>


                            <div class="form-group">
                                     <label class="sr-only" for="Comentario">Comentario</label>
                                     <textarea name="Comentario" placeholder="Motivo por el cual solicita el Transporte" 
                                      class="Comentario form-control" id="Comentario"></textarea>
                            </div>
                            
                              
                          
                               <?php echo $obtenerCiclo; ?>

                                    <?php
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

                                     ?>      



                            <input type="hidden" name="iduser" value="<?php echo $_GET['id'];  ?>"> 

                            <input type="hidden" name="solicitud" value="<?php echo  $_GET['idSoliTrans'];  ?>"> 

                             <input type="hidden" name="ciclo" value="<?php echo  $obtenerCiclo;  ?>">






                            

                          </div>

                          <input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0"    type="submit" name="Guardar_SoliTrans" value="Solicitar" id="Guardar_SoliTrans">
                        </form>       
                          
                      </div>
                    </div>
                  </div>

                <!-- FIN MODAL PENSUM -->
                 <!--**********************-->   
                        

                </div> 
             <!--fin contenedor modals costo-->


                </div> 
             <!--fin contenedor modals costo-->





</div>

</div>

<!-- /#wrapper -->





 <?php

  require_once 'templates/footer.php';

?>