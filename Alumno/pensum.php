<?php require_once 'templates/head.php'; ?>
<title>Pensum</title>
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


?>



<!--div principal-->
<div class="container-fluid text-center">
    <!--Navbar-->
    
    <div class="title">
	<a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Pensum</h2>
</div>
         <div class="alerta">
            <?php
            include "config/Alerta.php";
            ?>
          </div>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #2D2D2E">

        <!-- Navbar brand -->




        <!--///////////////////////////////////////////////-->
        <!--Para ver el nombre del archivo que sube-->
        <script type="text/javascript">
        $(document).ready(function() {
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
                    <a class="nav-link active" href="pensum.php">Pensum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="MateriasInscritas.php">Inscritas</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="MateriasAprobadas.php">Aprobadas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="MateriasReprobadas.php">Reprobadas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="MateriasRetiradas.php">Retiros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ConsolidadoMaterias.php">Consolidado</a>
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

                <h2 style="color: #BF3E3E;">Pensum</h2>

                <div class="row">

                    <!--Primera columna-->
                    <div class="col-sm" style="color: #343434;">


                        <span class="float-right">
                            <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#ModalMateria'
                                style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 100px;height: 50px;
     background-color: #9d120e;
     color:white;"><img src="../img/add.png" width="25px" height="25px"><br>
                                <p style="font-size: 10px;">Crear Materia</p>
                            </button>

                            <?php
                                    //consulta para seleccionar el comprobante de pensum
                                    $PDF=$pdo->prepare("SELECT pensum FROM `expedienteu` WHERE `idExpedienteU` = ? ");
                                    $PDF->execute(array($idExpedienteU));//ejecute consulta


                                    if ($PDF->rowCount()>=1) {
                                      //recorre las filas
                                      while ($filapdf=$PDF->fetch()) {
                                        //Validacion de boton finalizar
                                      //------------------------------

                                      //si comprobante es diferente a vacio
                                     /* if ($filapdf['pensum'] !=null) {

                                        echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#pensum' disabled style='height: 50px; '><img src='../img/paper.png' width='25px' height='25px'><br><p style='font-size: 10px; '>Subir pensum</p></button>";
                                      }else
                                      {

                                        echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#pensum' style='height: 50px;'><img src='../img/paper.png' width='25px' height='25px'><br><p style='font-size: 10px;'>Subir pensum</p></button>" ;
                                      } */
                 
                                    }//fin while
                                   }//fin de if
                           ?>







                            <!--<button type='button' class='btn btn-danger' disabled><i class='fas fa-file-pdf' ></i></button>-->

                        </span>
                        <br> <br><br>




                        <table id="tableUser" class="table table-hover table-sm table-bordered table-fixed">
                            <thead style="background-color: #2D2D2E; color: white; ">
                                <tr>
                                    <th scope="col">Codigo</th>

                                    <th scope="col">Asignatura</th>

                                    <th scope="col">Eliminar</th>
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
                            //Extraer Todas las materias 
                            //-------------------------------------------------------------------



                            $consulMaterias=$pdo->prepare("SELECT idMateria, nombreMateria  
                                                           FROM materias 
                                                           WHERE idExpedienteU = ? AND estado = 'Activo'");


                             $consulMaterias->execute(array($idExpedienteU));

                                     if ($consulMaterias->rowCount()>=1)
                                      {
                                        //muestra en la tabla
                                        while ($fila2=$consulMaterias->fetch())
                                          {   echo "
                                        <tr class='table-light'>
                                        <th>".$fila2['idMateria']."</th>
                                        
                                        <th>".$fila2['nombreMateria']."</th>
                                     
                                       
                                        
                                        <td>
                                        <center><a href='Modelo/ModeloMaterias/EliminarMaterias.php?id=".$fila2['idMateria']."' class='btn btn-danger'><i class='fas fa-trash'></i></a></center>
                                        </td>
                                        </tr>";

                                       

                                      }//fin while
                                    }//fin if

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



                </div>
                <!--Fin de row-->


            </div>
            <!--Fin de container-->

        </div>

    </div>
</div>
<br>
<br><br><br>
</div><!-- Fin de div principal-->

<!-- /#page-content-wrapper -->
<style type="text/css">
.modal-content {
    background-color: white;
    border-color: black;
    border-radius: 30px;
    padding: 20px;
}

.modal-body {
    text-align: left;
}

.form-control {
    background-color: #ADADB2;
    color: black;
    border-radius: 20px;

}

.modal-header {
    border-color: #ADADB2;
    border: 3px;
}
</style>




<!--MODALS-->
<div class="hidden">




    <!-- MODAL Materias -->
    <!--******-->

    <div class="modal fade " id="ModalMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Materia Pensum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="Modelo/ModeloMaterias/GuardarMaterias.php" method="POST" accept-charset="utf-8">
                        <div id="alerta5"></div>
                        <div class="col">




                            <div class="form-group">
                                <label class="sr-only" for="nombremateria">Nombre de materia</label>
                                <input type="text" name="nombremateria" placeholder="Nombre de materia"
                                    class="nombremateria form-control" id="nombremateria">
                            </div>
                            <input type="hidden" name="expedienteu" value="<?php echo $idExpedienteU;?>">


                        </div>

                        <center><input style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" type="submit" name="Guardar_Materia" value="Agregar Materia " id="Guardar_Materia"></center>
                    </form>

                </div>
            </div>
        </div>

        <!-- FIN MODAL Pensum -->
        <!--********-->


    </div>
    <!--fin contenedor modals pensum-->



    <!-- Modal Pensum carrera -->
    <div class="modal fade" id="pensum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <form action="Modelo/ModeloMaterias/subirPensum.php" method="post" enctype="multipart/form-data">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang"
                                name="archivo" required>
                            <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar
                                Comprobante</label>
                            <center><small>El archivo no debe pesar más de 5MB</small></center>
                        </div>
                        <br><br>
                        <div>

                            <?php 
            $stmt1 =$dbh->prepare("SELECT `ID_Alumno`  FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
                      
            $stmt1->execute();

            while($fila = $stmt1->fetch()){
              $alumno=$fila["ID_Alumno"];
                                
            }
            ?>


                            <!--idalumnos-->
                            <input type="hidden" name="alumno" value="<?php echo $alumno;?>">

                            <!--id expedente-->
                            <input type="hidden" name="expediente" value="<?php echo $idExpedienteU;?>">
                        </div>

                </div>
                <div class="modal-footer">


                    <input class="btn btn-primary btn-rounded" type="submit" name="actualizar" value="Cerrar "
                        data-dismiss="modal">
                    <input class="btn btn-primary btn-rounded" type="submit" name="actualizar" value="Guardar Cambios "
                        id="actualizar">

                </div>

                </form>
            </div>
        </div>
    </div>




</div>
<br>
<br>
<br>
<br>

<!-- /#wrapper -->





<?php

  require_once 'templates/footer.php';

?>