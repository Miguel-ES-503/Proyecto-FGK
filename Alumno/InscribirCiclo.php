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



    
<!--///////////////////////////////////////////////-->
<!--Para ver el nombre del archivo que sube-->
    <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
  <br><br>
  <!--Fin de funcion-->
  <!--///////////////////////////////////////////////-->





    

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
        <a class="nav-link active" href="IndicacionesMaterias.php">Materias</a>
     
     
    </ul>
    <!-- Links -->   
  </div>
  <!-- Collapsible content -->
</nav>
<!--/.Navbar-->
  
  <div>

    <div>

                             
        <div class="container" style="background: white; "><br>

          <h2 style="color: #BF3E3E;">Inscripción Materias</h2>
          
           <div class="row">
             
              <!--Primera columna-->
                  <div class="col-sm" style="color: #343434;">


                          <span class="float-right">  
                              <button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#ModalMateria"><i class="fas fa-book"></i>  Inscribir Materias</button>

                              <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'> Subir comprobante</button>

                              <button type='button' class='btn btn-danger' disabled><i class='fas fa-file-pdf' ></i></button>

                          </span>
                           <br> <br><br>
                        
                     
                      
                      
                       <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
                           <thead class="table-dark">
                               <tr>  
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Asignatura</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Selecionar</th>
                                   </tr>
                               </tr>
                           </thead>
                                    
                           <tbody>

                          
                            <?php 


       
                            //-------------------------------------------------------------------
                            //Extraer ID Alumno
                            //-------------------------------------------------------------------


                              $stmt1 =$dbh->prepare("SELECT `ID_Alumno`  
                                                     FROM `alumnos`
                                                     WHERE correo='".$_SESSION['Email']."'");
                      
                               $stmt1->execute();

                              while($fila = $stmt1->fetch()){
                                $alumno=$fila["ID_Alumno"];
                                
                               }//fin de while

                             //-------------------------------------------------------------------



                            //-------------------------------------------------------------------
                            //Extraer ID  Expediente U
                            //-------------------------------------------------------------------
                            // Consulta que muestra las solicitudes que haga el usuario
                            //dependiendo del usuario asi se l mostrara los datos
                              $consulta=$pdo->prepare("SELECT idExpedienteU  
                                                      FROM expedienteu 
                                                      WHERE ID_Alumno = ? AND estado = 'Activo'");
      
                              $consulta->execute(array($alumno));

                               $idExpedienteU;

                                      if ($consulta->rowCount()>=1)
                                      {
                                          while ($fila=$consulta->fetch())
                                          {   
                                            $idExpedienteU = $fila['idExpedienteU'];
                                          }
                                      }
                            //-------------------------------------------------------------------


                            //-------------------------------------------------------------------
                            //Extraer ID Inscripcion ciclo 
                            //-------------------------------------------------------------------

                            // Consulta que muestra el idciclo del expediente correspondiente
                            //dependiendo del expediente asi se l mostrara los datos
                              $consultaIC=$pdo->prepare("SELECT Id_InscripcionC  
                                                         FROM inscripcionciclos 
                                                         WHERE idExpedienteU = ? ");
      
                              $consultaIC->execute(array($idExpedienteU));

                               $Id_InscripcionC;

                                      if ($consultaIC->rowCount()>=1)
                                      {
                                          while ($fila=$consultaIC->fetch())
                                          {   
                                            $Id_InscripcionC = $fila['Id_InscripcionC'];
                                          }
                                      }

                            //-------------------------------------------------------------------



                            //-------------------------------------------------------------------
                            //Extraer Todas las materias 
                            //-------------------------------------------------------------------



                             $consulMaterias=$pdo->prepare("SELECT idMateria, nombreMateria, estado 
                                                            FROM materias 
                                                            WHERE idExpedienteU = ? AND estado = 'Activo'");


                              $consulMaterias->execute(array($idExpedienteU));

                                  if ($consulMaterias->rowCount()>=1)
                                  {
                                     while ($fila2=$consulMaterias->fetch())
                                        {   echo "
                                        <tr class='table-light'>
                                        <th>".$fila2['idMateria']."</th>
                                        
                                        <th>".$fila2['nombreMateria']."</th>

                                        <th>".$fila2['estado']."</th>
                                       
                                       
                                        
                                        <td>
                                        <center><a href='Modelo/ModeloMaterias/EliminarMaterias.php?id=".$fila2['idMateria']."' class='fas fa-trash  btn btn-danger'></a></center></td>
                                        </tr>";

                                      }//fin de while 
                                    }//fin de if

                               ?>
    

                           </tbody>        
                          </table>

                          <br><br><br> 

                            
                          <br> 
                         
                           <!--div class="f1-buttons">
                                    
                                   
                                    <button type="button" class="btn btn-next btn-dark">Enviar</button>
                          </div-->
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




                      <!-- MODAL Materias -->
                      <!--**************-->

                      <div class="modal fade " id="ModalMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content" >
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Inscripcion Ciclo</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

                              <form action="Modelo/ModeloMaterias/GuardarMaterias.php" method="POST" accept-charset="utf-8">
                          <div id="alerta5"></div>
                          <div class="col">


                            <div class="form-group">
                                <label class="sr-only" for="ciclo">Ciclo Pensum</label>
                                <input type="text" name="ciclo" placeholder="Ciclo" class="ciclo form-control" id="ciclo">
                                                    
                              </div>

                            <div class="form-group">
                                <label class="sr-only" for="nombremateria">Nombre de materia</label>
                                <input type="text" name="nombremateria" placeholder="Nombre de materia" class="nombremateria form-control"  id="nombremateria">
                            </div>


                             
                               <div class="form-group">
                                <label class="sr-only" for="matricula">Matricula</label>
                                <input type="text" name="matricula" placeholder="Matricula" class="matricula form-control" id="matricula">
                                                    
                              </div>
                            
                           

                            <input type="hidden" name="expedienteu" value="<?php echo $idExpedienteU;?>"> 
                            

                          </div>

                          <input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0"    type="submit" name="Guardar_Materia" value="Agregar Materia " id="Guardar_Materia">
                        </form>       
                          
                      </div>
                    </div>
                  </div>

                <!-- FIN MODAL COSTOS -->
                 <!--**********************-->   
                        

                </div> 
             <!--fin contenedor modals costo-->







             <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comprobante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <br><br>
        <form action="Modelo/ModeloMaterias/subirpdfMaterias.php" method="post" enctype="multipart/form-data">
          <div class="custom-file">
          <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo" required>
          <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Comprobante</label>
          <center><small>El archivo no debe pesar más de 5MB</small></center>
        </div>
        <br><br>
        <div>

          <?php
          //------------EXTRAER ID DEL ALUMNO--------------------------
          //-----------------------------------------------------------
            $extraeIdAlumno=$dbh->prepare("SELECT `ID_Alumno` 
                                           FROM `alumnos` 
                                           WHERE `correo`='".$_SESSION['Email']."'");
            $extraeIdAlumno->execute();
              if ($extraeIdAlumno->rowCount()>0) {
               // code...
                $fila2=$extraeIdAlumno->fetch();
                $alumno=$fila2['ID_Alumno'];
              }
      
          ?>

          <div class="form-group">
                <label class="sr-only" for="ciclou">Ciclo Pensum</label>
                <input type="text" name="ciclou" placeholder=" Escriba Ciclo universidad" class="ciclo form-control" id="ciclou">
                                                    
           </div>
        

        <!--id del alumno-->
        <input type="hidden" name="alumno" value="<?php echo $alumno;?>"> 

        <!--id expediente de universidad-->
        <input type="hidden" name="expediente" value="<?php echo $idExpedienteU;?>"> 

        <!--id de codigo inscripcion ciclo-->
        <input type="hidden" name="codigoIdCiclo" value="<?php echo $Id_InscripcionC;?>">


      

        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" id="pdfMaterias" name="pdfMaterias" value="Guardar Cambios" class="btn btn-secondary">
      </div>

      </form>
    </div>
  </div>
</div>










</div>

</div>

<!-- /#wrapper -->





 <?php

  require_once 'templates/footer.php';

?>