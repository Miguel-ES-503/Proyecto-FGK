<?php require_once 'templates/head.php'; ?>
<title>Aprobadas</title>
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
<div class="title">
	<a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Pensum</h2>
</div>
    <!--Navbar-->
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

                <br>
                <br>

                <div class="row">

                    <!--Primera columna-->
                    <div class="col-sm" style="color: #343434;">




                        <style type="text/css">
                        .card {
                            background: red;
                        }

                        table {
                            border-collapse: separate;
                            border-spacing: 6px;
                            background: bottom left repeat-x;
                            color: #fff;


                        }

                        tr,
                        th {
                            background: white;
                            color: #585858;
                            text-align: center;


                        }

                        td {
                            width: 150px;
                            background: #D8D8D8;
                            border-radius: 3px;
                            color: #000;
                        }

                        .oscuro {
                            background: #A4A4A4;

                        }



                        h3 {
                            color: #be0032;
                        }

                        h4 {
                            color: white;
                        }

                        div.centerTable {
                            text-align: center;
                        }

                        h5,
                        p {
                            text-align: center;
                        }



                        div.centerTable table {
                            margin: 0 auto;
                            text-align: left;
                            width: 100%;
                        }

                        .alert {
                            height: 50px;
                        }
                        </style>


                        <div class='centerTable '>
                            <table id="makeEditable" class="thead-dark">
                                <h3 class="card-header h3s bg-light">Lista de materias Inscritas</h3>

                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Asignatura</th>
                                        <th>Matricula</th>
                                        <th>Ciclo</th>
                                        <th>Nota</th>
                                        <th>Estado</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
        //consulta que muestra las materias
       $consulMaterias=$pdo->prepare("SELECT IM.nota,IM.idMateria,IM.matricula, M.nombreMateria, IM.estado, IC.cicloU, M.idExpedienteU
       from materias M
       INNER JOIN inscripcionmateria IM
      ON IM.idMateria= M.idMateria

       INNER JOIN inscripcionciclos IC
      ON IC.Id_InscripcionC=IM.Id_InscripcionC

      WHERE M.idExpedienteU = ? AND IM.estado = 'Inscrita'");

       $consulMaterias->execute(array($idExpedienteU));



        
        if ($consulMaterias->rowCount()>=1)
        {
          while ($fila2=$consulMaterias->fetch())
          { 


             if ($fila2['estadoM'] !='Inscrita') {

               echo "<tr>
                    <td >".$fila2['idMateria']."</td>
                    <td class='oscuro'>".$fila2['nombreMateria']."</td>
                    <td >".$fila2['matricula']."</td>
                     <td >".$fila2['cicloU']."</td>
                       <td >".$fila2['nota']."</td>
                    <td >".$fila2['estado']."</td>
                  </tr>";     

        
         
             }else
                 {

                   echo "<tr>
                    <td >".$fila2['idMateria']."</td>
                    <td class='oscuro'>".$fila2['nombreMateria']."</td>
                    <td >".$fila2['nota']."</td>
                    <td >".$fila2['estadoM']."</td>
                   
                    


                    
                  </tr>";     

       
                  } //fin de else



           
                            
               }//fin de while
            }else{
              echo "<tr><td colspan='6'>No hay ninguna asignatura aprobada.</td></tr>";
            }//fin de else-if
                                       

                                  
            ?>



                                </tbody>

                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                        <br>
                        <br>
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

</div>

<!-- /#wrapper -->
<?php

  require_once 'templates/footer.php';

?>