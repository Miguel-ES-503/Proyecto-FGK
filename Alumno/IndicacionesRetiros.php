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
         <h2 class="main-title">Retiro materias</h2>
         <br>
     </div>
     <div>
         <div>

             <div class="container" style="background: white;">
                 <br>
                 <div class="row">
                     <!--Primera columna-->
                     <div class="col-sm" style="color: #343434;">
                         <ul style="text-align: justify; ">
                             <h3>Reglas para retiro:</h3>
                             <li>A continuación se muestran las asignaturas que usted ha inscrito en este ciclo, debera
                                 escoger cual es la que desea retirar. </li>
                             <li>Debera llenar el formulario de retiro que le aparecera con los datos que se le
                                 solicitan.</li>
                             <li>Posteriormente se enviara a su coach una notificación en la cual el o ella aceptara o
                                 denegara su solicitud de inscripción.</li>

                             <li>Debera crear una carta formal en donde describa el motivo que lo lleva a retirar la
                                 asignatura y cree un plan estrategico de como recuperarla, creando metas alcanzables en
                                 poco tiempo.</li>
                             <br>
                             <h3>Asignaturas Inscritas ciclo </h3>
                     </div>
                     <!-- Fin Primera columna-->
                 </div>
                 <!--Fin de row-->
                 <!--Tabla costos de trasnporte-->
                 <div class="table-responsive">
                     <span class="float-right">
                         <a href="pensum.php" class='btn btn-danger' 
                             style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 115px;height: 52px;
     background-color: #9d120e;
     color:white;"><img src="../img/add.png" width="25px" height="25px">
                             <p style="font-size: 10px;">Inscribir Materias</p>
                         </a>
                         <!--<button type='button' class='btn btn-danger' disabled><i class='fas fa-file-pdf' ></i></button>-->

                     </span>
                     <br> <br><br>

                     <table id="tableUser" class="table table-hover table-sm table-bordered table-fixed">
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


                            $stmt = $dbh->query("SELECT * FROM materias WHERE idExpedienteU = '$idExpedienteU' AND estadoM = 'Inscrita' ");
                            while ($row = $stmt->fetch()) {
                                echo "<tr>";
                                echo "<td>".$row['idMateria']."</td>";
                                echo "<td>".$row['nombreMateria']."</td>";
                                echo "<td><a class='btn btn-warning' href='retirar.php?id=".$row['idMateria']."&idAlumno=$alumno&materia=".$row['nombreMateria']."'
                                 >Retirar</a></td>";
                                echo "</tr>";
                            }
                               ?>
                         </tbody>
                     </table>
                     <br><br><br>
                 </div>
                 <!--Fin de container-->
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