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

          <h2 style="color: #BF3E3E;">Retiro Materias</h2>
          
           <div class="row">
             
              <!--Primera columna-->
                  <div class="col-sm" style="color: #343434;">


                          <span class="float-right">  
                              <!--button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#ModalMateria"><i class="fas fa-book"></i>  Inscribir Materias</button-->

                              <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' > Subir comprobante</button>

                              <button type='button' class='btn btn-danger' disabled><i class='fas fa-file-pdf' ></i></button>

                              <!--button type='button' class='btn btn-danger' disabled><i class='fas fa-file-pdf' ></i></button-->

                          </span>
                           <br> <br><br>
                        
                     
                      
                      
                       <table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
                           <thead class="table-dark">
                               <tr>  
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Asignatura</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Retirar</th>
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
                            //Extraer Todas las materias  con estado inscritas
                            //-------------------------------------------------------------------



                          $MateriasInscritas=$pdo->prepare("SELECT IM.Id_InscripcionM, IM.idMateria, 
                                                                   M.nombreMateria, IM.estado
                                                            FROM inscripcionmateria IM
                                                            INNER JOIN materias M
                                                            ON IM.idMateria= M.idMateria
                                                            WHERE IM.estado= 'Inscrita' AND M.idExpedienteU= ?");


                              $MateriasInscritas->execute(array($idExpedienteU));

                                  if ($MateriasInscritas->rowCount()>=1)
                                  {
                                     while ($fila2=$MateriasInscritas->fetch())
                                        {   echo "
                                        <tr class='table-light'>
                                        <th>".$fila2['idMateria']."</th>
                                        
                                        <th>".$fila2['nombreMateria']."</th>

                                        <th>".$fila2['estado']."</th>
                                       
                                       
                                        
                                        <td>
                                        <center><button type='button' id=".$fila2['idMateria']." class=' fa fa-ban btn btn-danger' data-toggle='modal' data-target='#exampleModal2' onclick='mandarId(id)' >
                                       </button></center></td>
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




                  

<!-- Modal de retiro materia -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #FE2E2E; color: white;">
        <h5 class="modal-title " id="exampleModalLabel" >¿Seguro desea retirar la materia?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <!--Funcion para mandar el id-->
         <script type="text/javascript">

           function mandarId(id){
                var prueba = id;
                var prueba2= id;
                 //alert(id);

                document.getElementById("Materia").value=prueba;
                document.getElementById("codigoMateria").innerHTML=prueba2;

           }
        </script>

        
        <p style="text-align: justify; color: #2E2E2E;"><b>Nota:</b> Una vez retire la materia debera de dirigirse al boton subir comprobante en donde debera completar la información que se le solicita.</p>
        
        
        <form  method="POST" action="Modelo/ModeloMaterias/GuardarRetiros.php">

          <div class="form-group">
            <input type="hidden" name="idmaterias" id="Materia" value="">  
             <input type="hidden" name="expediente" value="<?php echo $idExpedienteU;?>">

            <h3 for="codigo">Codigo de materia:</label><h3 id="codigoMateria" for="codigo"> </h3> 
             

           </div>   
        
      </div>
      <div class="modal-footer">
        
        <button type="button"  data-dismiss="modal">Close</button>
        <input type="submit" name="retirar" value="Retirar" class="btn btn-danger">
        
      </div></form>
    </div>
  </div>
</div>










<!-- Modal de sbir comprobante de retiro -->
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
        <form action="Modelo/ModeloMaterias/comprobanteRetiro.php" method="post" enctype="multipart/form-data">

          <!--Select materia retirada-->
          <?php 
               // Consulta De La BASE DE DATOS
       $materiasRetiradas=$pdo->prepare("SELECT IM.Id_InscripcionM, IM.idMateria, 
                                         M.nombreMateria, IM.estado
                                        FROM inscripcionmateria IM
                                        INNER JOIN materias M
                                        ON IM.idMateria= M.idMateria
                                        WHERE IM.estado= 'Retirada' AND M.idExpedienteU= ?");
                                        
       $materiasRetiradas->execute(array($idExpedienteU));
       ?>


            <div class="form-group">
              <select id="materiaRetirada" name="materiaRetirada" class="form-control" required>
                  <option value="" disabled selected >Seleccione la materia que retiro</option>
                  <?php 

                    if ($materiasRetiradas->rowCount()>=1)
                     {
                        while ($fila22=$materiasRetiradas->fetch())
                        {   
                          echo "<option value=".$fila22['Id_InscripcionM'].">".$fila22['idMateria']."---".$fila22['nombreMateria'];"</option>";
                        }
                      }

                   ?>

                                          
               </select>
            </div><br>


           <div class="form-group">
                <textarea name="Comentario" placeholder="Comentario"  class="form-control" ></textarea>
     
                <center><small>Motivo de retiro</small></center>
          </div><br>


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


        <!--id del alumno-->
        <input type="text" name="idalumno" value="<?php echo $alumno;?>"> 

        <!--id expedienteU-->
        <input type="text" name="expediente1" value="<?php echo $idExpedienteU;?>">

        
      
        


      

        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" id="pdfRetiros" name="pdfRetiros" value="Guardar Cambios" class="btn btn-danger">
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