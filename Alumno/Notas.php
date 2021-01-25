<?php
  require_once 'templates/head.php';
?>
<title>Notas</title>
<?php
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


          //-------------------------------------------------------------------
       //Extraer ID Inscripcion ciclo 
       // Consulta que muestra el idciclo del expediente correspondiente
       //dependiendo del expediente asi se l mostrara los datos
       $consultaIC=$pdo->prepare("SELECT Id_InscripcionC FROM inscripcionciclos WHERE idExpedienteU = ? ");
       $consultaIC->execute(array($idExpedienteU));
       $Id_InscripcionC;
         if ($consultaIC->rowCount()>=1)
         {
            while ($fila=$consultaIC->fetch())
            {   
             $Id_InscripcionC = $fila['Id_InscripcionC'];
            }
         }


      



  

  setlocale(LC_TIME, 'es_SV.UTF-8');

  //Extraemos el carnet del estudiante
  $stmt1 =$dbh->prepare("SELECT `ID_Alumno`, `ID_Empresa` FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt1->execute();

  while($fila = $stmt1->fetch()){
      $alumno=$fila["ID_Alumno"];
      $universidad=$fila["ID_Empresa"];
  }

?>

<!--///////////////////////////////////////////////-->
<!--Para ver el nombre del archivo que sube-->
<script type="text/javascript">
$(document).ready(function() {
    bsCustomFileInput.init()
});
</script>

<!--Fin de funcion-->
<!--///////////////////////////////////////////////-->




<!--Estructura -->
<div class="container-fluid text-center">
    <div class="title" style="margin-left: -14px;">
        <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
        <h2 class="main-title">Agregar notas</h2>

    </div>







    <!--Información de solicitud-->
    <center>
        <div class="row">








            <!--tabla con informacion de solicitud-->
            <div class="col text-center">
                <br>

                <!--CSS de las tablas -->
                <style type="text/css">
                table {
                    border-collapse: separate;
                    border-spacing: 6px;
                    background: bottom left repeat-x;
                    color: #fff;
                    float: center;


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
                    color: #DE0B18;
                }

                h4 {
                    color: white;
                }

                div.centerTable {
                    text-align: center;
                }



                div.centerTable table {
                    margin: 0 auto;
                    text-align: left;
                    width: 100%;
                }

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

                #endprocess {
                    position: relative;
                    right: 600px;

                }

                @media screen and (max-width: 1080px) {

                    #endprocess {


                        position: none;
                        right: 140px;
                        top: 10px;

                    }
                }
                </style>
                <!--Fin de CSS de las tablas -->


                <!--Tabla de buses de Ida -->
                <h3 class="card-header h3s bg-light w-75 mx-auto">Notas</h3>
                <center>
                    <div class="centerTable">
                        <table class="table-responsive mx-auto w-75">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Asignatura</th>
                                    <th>Matricula</th>
                                    <th>Ciclo</th>
                                    <th>Nota</th>
                                    <th>Estado</th>

                                    <th>Actualizar</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
        //consulta que muestra las materias
       $consulMaterias=$pdo->prepare("SELECT IM.Id_InscripcionM, IM.nota,IM.idMateria,IM.matricula, M.nombreMateria,
       IM.estado, IC.cicloU, M.idExpedienteU from materias M
      INNER JOIN inscripcionmateria IM
      ON IM.idMateria= M.idMateria

      INNER JOIN inscripcionciclos IC
      ON IC.Id_InscripcionC=IM.Id_InscripcionC
  
      WHERE M.idExpedienteU = $idExpedienteU ");
      $consulMaterias->execute();
      
        if ($consulMaterias->rowCount()>=1)
        {
          while ($fila2=$consulMaterias->fetch())
          { 
                  echo "<tr>
               
                  <td >".$fila2['idMateria']."</td>
                  <td class='oscuro'>".$fila2['nombreMateria']."</td>
                  <td >".$fila2['matricula']."</td>
                   <td >".$fila2['cicloU']."</td>
                    <td >".$fila2['nota']."</td>
                  <td >".$fila2['estado']."</td>
                  
                  <td>
                  <center>
                   <button type='button' id=".$fila2['idMateria']." class='btn ' data-toggle='modal' data-target='#ModalMateria' onclick='mandarId(id)' ><i class='fa fa-pen'></i>
                   </button>
                  </center>
                  </td>
                </tr>";                
               }//fin de while
            }else{
              echo "<tr><td colspan='7'>No ha agregado ninguna Asignatura</td></tr>";
            }//fin de else-if
                                       

                                  
            ?>






                            </tbody>

                            <tfoot>

                            </tfoot>
                        </table>
                        <br>

                        <div class='f1-buttons'>
                            <button type='button' id="endprocess" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" data-toggle='modal' data-target='#comprobante'>Terminar proceso</button>
                        </div>
                        <br><br>
                    </div>
                </center>
                <!--Fin Tabla de buses de Ida -->






            </div>
        </div>
    </center>
</div>


<!-- Modal Pensum carrera -->
<div class="modal fade" id="comprobante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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


                <div class="alert alert-danger" role="alert">
                    Para que su solicitud sea terminada con exito agregue su comprobante de notas.
                </div>


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

                        <input type="hidden" name="idInscripcionCiclo" value="<?php echo $Id_InscripcionC;?>">
                    </div>

            </div>
            <div class="modal-footer">


                <input style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 100px;height: 38px;
     background-color: #9d120e;
     color:white;" type="submit" name="actualizar" value="Cerrar " data-dismiss="modal">
                <input style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" type="submit" name="pdfNotas" value="Guardar Cambios " id="pdfNotas">

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
                <form action="Modelo/ModeloMaterias/ActualizarNota.php" method="POST" accept-charset="utf-8">
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

                            </select>
                        </div>





                        <input type="hidden" name="expedienteu" value="<?php echo $idExpedienteU;?>">

                        <input type="hidden" name="idInscripcionCiclo" value="<?php echo $Id_InscripcionC;?>">
                        <input type="hidden" name="idInscripcionM" value="<?php echo $IdInsM;?>">

                    </div>

                    <input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit"
                        name="Actualizar_Notas" value="Actualizar Nota" id="Actualizar_Notas">
                </form>
            </div>
        </div>
    </div>

    <!-- FIN MODAL MATERIA -->
    <!--**********************-->
</div>








</div>




<br><br><br><br><br><br><br>

<?php
  require_once 'templates/footer.php';
?>