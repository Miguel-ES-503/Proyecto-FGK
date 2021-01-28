<?php

//extraer datos de la inscripcion
$incripcionCiclo= $_GET['id'];

?>
<?php require_once 'templates/head.php'; ?>
<title>Historial Notas</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets1/css1/style.css">
<link rel="stylesheet" href="CSS/modificarMateria.css">
<?php  
  
  //Manda  allamar plantillas
  require_once 'templates/header.php';
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

         //extraer inscripción de alumno
         $consulta2=$pdo->prepare("SELECT * FROM inscripcionciclos WHERE Id_InscripcionC=?");
         $consulta2->execute(array($incripcionCiclo));

        //extraer notas de la inscripcion del alumno
        $consulta3=$pdo->prepare("SELECT * FROM inscripcionmateria INNER JOIN materias on inscripcionmateria.idMateria = materias.idMateria 
        WHERE Id_InscripcionC =? ORDER BY nota DESC ");
        $consulta3->execute(array($incripcionCiclo));

        //extraer materias disponibles para inscribir
        $consulta5=$pdo->prepare("SELECT * FROM materias WHERE idExpedienteU = ?  ");
        $consulta5->execute(array($idExpedienteU));   
         
?>



<!--div principal-->
<div class="container-fluid text-center">
    <!--Navbar-->

    <div class="title">
        <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
        <h2 class="main-title">Modificar Inscripción</h2>
    </div>
    <div class="alerta">
        <?php
    include "config/Alerta.php";
      ?>
    </div>
    <!--///////////////////////////////////////////////-->
    <!--Para ver el nombre del archivo que sube-->
    <script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init()
    });
    </script>

    <!--Fin de funcion-->
    <!--///////////////////////////////////////////////-->
    <div>
        <div>
            <div class="container" style="background: white; "><br>

                <div class="row">

                    <!--Primera columna-->
                    <div class="col-sm" style="color: #343434;">
                        <!-- incluir estilo -->
                        <?php include "CSS/modificarInscripcion.php";?>

                        <div class='centerTable '>
                            <table id="makeEditable">
                                <thead class="table table-striped table-bordered">
                                    <tr>
                                        <th style="color: red;">CODIGO</th>
                                        <th style="color: red;">CICLO</th>
                                        <th style="color: red;">COMPROBANTE DE INSCRIPCIÓN</th>
                                        <th style="color: red;">COMPROBANTE DE NOTAS</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php    
    if ($consulta2->rowCount()>=1)
        {
          while ($fila2=$consulta2->fetch())
          { 
            $pdfCiclo = $fila2['comprobante'];
            $pdfnotas = $fila2['pdfnotas'];
            $idciclo =  $fila2['Id_InscripcionC'];
            $ciclo = $fila2['cicloU'];
                      
              echo "<tr>
                      <td >".$fila2['Id_InscripcionC']."</td>
                      <td class='oscuro'>".$fila2['cicloU']." 
                      <button class='btn btn-warning ' type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal2'><i class=\"fas fa-edit\"></i></button></td> 
                      </td>
                      <td>
                      <a href='../pdfCicloInscripcion/$pdfCiclo' target='_blank' class='btn btn-danger '>
                      <img src='../img/PDF.png' width='25px' height='25px '/></a> 
                      <button class='btn btn-warning ' type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'><i class=\"fas fa-edit\"></i></button></td> 
                      
                      <td><a href='../pdfNotas/$pdfnotas' target='_blank' class='btn btn-danger '>
                      <img src='../img/PDF.png' width='25px' height='25px' /></a> 
                      <button class='btn btn-warning ' comprobante type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal3'><i class=\"fas fa-edit\"></i></button></td> 
                      </td> 
                 </tr>";     
              }//fin de while
           }else{
             echo "<tr><td colspan='6'>No ha agregado ninguna Asignatura</td></tr>";
           }//fin de else-if
                                 
           ?>
                                </tbody>

                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                        <br>
                        <br>

                        <h1 class="text-center" style="font-family: 'Anton', sans-serif;">Materias Inscritas</h1>
                        <br>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal33">
                            Agregar Materias
                        </button>
                        <div class='centerTable '>
                            <table id="makeEditable">
                                <thead class="table table-striped table-bordered">
                                    <tr>
                                        <th style="color: red;">CODIGO</th>
                                        <th style="color: red;">MATERIA</th>
                                        <th style="color: red;">NOTA</th>
                                        <th style="color: red;">MATRICULA</th>
                                        <th style="color: red;">ESTADO</th>
                                        <th style="color: red;">OPCIONES</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php    
    if ($consulta3->rowCount()>=1)
        {
          while ($fila2=$consulta3->fetch())
          { 

            $materia1 = $fila2['nombreMateria'];
              echo "<tr>                    
                      <td class='oscuro'>".$fila2['idMateria']." </td>
                      <td >".$fila2['nombreMateria']."</td>
                      <td>".$fila2['nota']."
                      <td>".$fila2['matricula']."</td>
                      ";
                      if($fila2['estado']== 'Aprobada'){
                        echo "<td class='bg-success text-white'>".$fila2['estado']."</td> ";
                      }elseif($fila2['estado']== 'Inscrita'){
                        echo "<td class='bg-info text-white'>".$fila2['estado']."</td> ";
                      }elseif($fila2['estado']== 'Retirada'){
                        echo "<td class='bg-warning text-white'>".$fila2['estado']."</td> ";
                      }else{
                        echo "<td class='bg-danger text-white'>".$fila2['estado']."</td> ";
                      }
                      echo " 
                      <td>
                       <button type='button' id=".$fila2['idMateria']." class='btn ' data-toggle='modal'
                        data-target='#ModalMateria' onclick='mandarId(id)' ><i class='fa fa-pen'></i>

                        <a href='Modelo/ModeloMaterias/eliminarMateria.php?idciclo=$idciclo&alumno=$idExpedienteU&id=".$fila2['idMateria']."'>
                        <button class='btn text-dark '  type='button'  data-toggle='modal' data-target='#exampleModal4'>
                        <i class=\"fas fa-trash\"></i></button></a>
                        </td> 
                      </td>
                 </tr>";   
              }//fin de while
           }else{
             echo "<tr><td colspan='6'>No ha agregado ninguna Asignatura</td></tr>";
           }//fin de else-if
                                 
           ?>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                        <br>
                        <br>
                    </div>
                    <!-- Fin Primera columna-->
                    <br>
                </div>
                <!--Fin de row-->

                <a class="btn btn-success" href="expedienteU.php" rel="noopener noreferrer">Guardar Cambios</a>
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


<!-- Modal para modificar comprobante de inscripcion -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar comprobante de inscripcion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="alert alert-danger h-100" role="alert">
                    Para que su solicitud sea terminada con exito agregue su comprobante de notas.
                </div>
                <br />
                <form action="Modelo/ModeloMaterias/comprobanteInscripcion.php" method="post"
                    enctype="multipart/form-data">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo"
                            required>
                        <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar
                            Comprobante</label>
                        <center><small>El archivo no debe pesar más de 5MB</small></center>
                    </div>
                    <br><br>
                    <div>
                        <!--idalumnos-->
                        <input type="hidden" name="alumno" value="<?php echo $alumno;?>">
                        <!--id expedente-->
                        <input type="hidden" name="expediente" value="<?php echo $idExpedienteU;?>">
                        <!-- ciclo -->
                        <input type="hidden" name="ciclo" value="<?php echo $ciclo;?>">
                        <!-- comprobante cicloU -->
                        <input type="hidden" name="comprobante" value="<?php echo $pdfCiclo;?>">
                        <!-- id ciclo -->
                        <input type="hidden" name="idInscripcionCiclo" value="<?php echo $idciclo;?>">

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

<!-- Modal para modificar comprobante de notas -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Ciclo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="Modelo/ModeloMaterias/actualizarCicloInscripcion.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $incripcionCiclo; ?>">
                    <input type="hidden" name="idalumno" value="<?php echo $idExpedienteU; ?>">
                    <input type="hidden" name="idalumno2" value="<?php echo $alumno; ?>">
                    <div class="form-group">
                        <label class="" for="ciclo">Ciclo:</label>
                        <select name="ciclo" id="ciclo" class="ciclo form-control">
                            <!-- año 2015 -->
                            <option disabled>2015</option>
                            <option value="Ciclo 01-2015">Ciclo 01-2015</option>
                            <option value="Ciclo 02-2015">Ciclo 02-2015</option>
                            <option value="Ciclo 03-2015">Ciclo 03-2015</option>
                            <!-- año 2016 -->
                            <option disabled>2016</option>
                            <option value="Ciclo 01-2016">Ciclo 01-2016</option>
                            <option value="Ciclo 02-2016">Ciclo 02-2016</option>
                            <option value="Ciclo 03-2016" title="Interciclo">Ciclo 03-2016</option>
                            <!-- año 2017 -->
                            <option disabled>2017</option>
                            <option value="Ciclo 01-2017">Ciclo 01-2017</option>
                            <option value="Ciclo 02-2017">Ciclo 02-2017</option>
                            <option value="Ciclo 03-2017" title="Interciclo">Ciclo 03-2017</option>
                            <!-- año 2018 -->
                            <option disabled>2018</option>
                            <option value="Ciclo 01-2018">Ciclo 01-2018</option>
                            <option value="Ciclo 02-2018">Ciclo 02-2018</option>
                            <option value="Ciclo 03-2018" title="Interciclo">Ciclo 03-2018</option>
                            <!-- año 2019 -->
                            <option disabled>2019</option>
                            <option value="Ciclo 01-2019">Ciclo 01-2019</option>
                            <option value="Ciclo 02-2019">Ciclo 02-2019</option>
                            <option value="Ciclo 03-2019" title="Interciclo">Ciclo 03-2019</option>
                            <!-- año 2020 -->
                            <option disabled>2020</option>
                            <option value='Ciclo 01-2020'>Ciclo 01-2020</option>
                            <option value='Ciclo 02-2020'>Ciclo 02-2020</option>
                            <option value='Ciclo 03-2020' title="Interciclo">Ciclo 03-2020</option>
                            <!-- año 2021 -->
                            <option disabled>2021</option>
                            <option value='Ciclo 01-2021'>Ciclo 01-2021</option>
                            <option value='Ciclo 02-2021'>Ciclo 02-2021</option>
                            <option value='Ciclo 03-2021' title="Interciclo">Ciclo 03-2021</option>";

                            <!-- año 2022 -->
                            <!-- <option disabled>2022</option>
                            <option value='Ciclo 01-2022'>Ciclo 01-2022</option>
                            <option value='Ciclo 02-2022'>Ciclo 02-2022</option>
                            <option value='Ciclo 03-2022' title="Interciclo">Ciclo 03-2022</option>"; -->

                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL Materias -->
<!--**************-->
<div class="modal fade " id="ModalMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar nota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="Modelo/ModeloMaterias/ActualizarNota2.php" method="POST" accept-charset="utf-8">
                    <div id="alerta5"></div>
                    <div class="col">

                        <script type="text/javascript">
                        function mandarId(id) {
                            var prueba = id;
                            var prueba2 = id;

                            document.getElementById("mate").innerHTML = prueba2;
                            document.getElementById("Materia").value = prueba;

                        }
                        </script>
                        <div class="form-group">
                            <label class="" for="Materia">Codigo de materia:</label>
                            <input type="text" name="materia" id="Materia" class="Materia form-control">
                        </div>



                        <div class="form-group">
                            <label id="mate" style="margin-left:1%" for="matricula" hidden="hidden"></label>
                        </div>

                        <div class="form-group">
                            <label class="" for="nota">Nota:</label>
                            <input type="text" name="nota" placeholder="0.00" class="nota form-control" id="nota">
                        </div>

                        <div class="form-group ">
                            <label for="inputCity">Estado materia:</label>
                            <select id="estado" name="estado" class="form-control" required>
                                <option selected>Seleccione una opción...</option>
                                <option value="Aprobada">Aprobada</option>
                                <option value="Reprobada">Reprobada</option>
                                <option value="Retirada">Retirada</option>
                            </select>
                        </div>

                        <input type="hidden" name="expedienteu" value="<?php echo $idExpedienteU;?>">
                        <input type="hidden" name="idInscripcionCiclo" value="<?php echo $idciclo;?>">

                    </div>

                    <input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit"
                        name="Actualizar_Notas" value="Actualizar Nota" id="Actualizar_Notas">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL MATERIA -->



<!-- Modal Pensum carrera -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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


                <div class="alert alert-danger h-100" role="alert">
                    Para que su solicitud sea terminada con exito agregue su comprobante de notas.
                </div>
                <br />

                <form action="Modelo/ModeloMaterias/subirpdfNotas.php" method="post" enctype="multipart/form-data">



                    <div class="custom-file">
                        <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo"
                            required>
                        <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar
                            Comprobante</label>
                        <center><small>El archivo no debe pesar más de 5MB</small></center>
                    </div>
                    <br><br>
                    <div>
                        <!--idalumnos-->
                        <input type="hidden" name="alumno" value="<?php echo $alumno;?>">
                        <!--id expedente-->
                        <input type="hidden" name="expediente" value="<?php echo $idExpedienteU;?>">
                        <!-- id incripcion ciclo -->
                        <input type="hidden" name="idInscripcionCiclo" value="<?php echo $idciclo;?>">
                    </div>
            </div>
            <div class="modal-footer">

                <input style="border-radius: 20px; border: 2px solid #9d120e; width: 100px;height: 38px; background-color: #9d120e;
     color:white;" type="submit" name="actualizar" value="Cerrar " data-dismiss="modal">
                <input style="border-radius: 20px; border: 2px solid #9d120e; width: 200px;height: 38px; background-color: #9d120e;
     color:white;" type="submit" name="pdfNotas" value="Guardar Cambios " id="pdfNotas">

            </div>

            </form>
        </div>
    </div>
</div>
<!-- Agregar materias -->
<!-- Modal -->
<div class="modal fade" id="exampleModal33" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar materias a inscripción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="Modelo/ModeloMaterias/agregarMateria.php" method="post">
                    <input type="hidden" name="idInscripcion" value="<?php  echo $incripcionCiclo;?>">
                    <input type="hidden" name="idalumno" value="<?php  echo $idExpedienteU;?>">
                    <div class="searchable">
                        <input type="text" name='idMateria' placeholder="Buscar materia"
                            onkeyup="filterFunction(this,event)">
                        <ul>
                            <?php
                            while ($row = $consulta5->fetch()) {
                                if($row['estadoM'] != 'Aprobada' ){
                                    echo "<li>".$row['nombreMateria']."</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="./JS/selector.js"></script>
<?php  require_once 'templates/footer.php';?>