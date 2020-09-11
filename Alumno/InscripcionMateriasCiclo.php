<?php
  require_once 'templates/head.php';
?>
<title>Inscripcion materias</title>
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
        <h2 class="main-title">Inscripcion de materias</h2>

    </div>
    <br>






    <!--Información de solicitud-->
    <div class="row">








        <!--tabla con informacion de solicitud-->
        <div class="col text-center">
            <br><br><br>

            <!--CSS de las tablas -->
            <style type="text/css">
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
            </style>
            <!--Fin de CSS de las tablas -->


            <!--Tabla de buses de Ida -->
            <h3 class="card-header h3s bg-light w-75 mx-auto">Materias por cursar</h3>
            <div class='centerTable'>
                <table class="table-responsive mx-auto w-75">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Asignatura</th>
                            <th>Estado</th>

                            <th>Inscribir</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
        //consulta que muestra las materias
       /*$consulMaterias=$pdo->prepare("SELECT m.idMateria, m.`idExpedienteU` , m.`nombreMateria` , m.`Estado` , m.`estadoM` , im.estado 
       FROM materias m inner join inscripcionmateria  im on m.`idMateria` = im.`idMateria`
        where `idExpedienteU` = ? AND m.Estado = 'Activo' 
        AND(m.`estadoM` ='Inscrita' OR m.`estadoM` ='Reprobada' or m.`estadoM` ='Retirada')  
        AND (im.estado = 'Inscrita' or im.estado = 'Reprobada' or im.estado = 'Retirada')");*/

        $consulMaterias=$pdo->prepare("SELECT m.`idMateria`, m.nombreMateria, m.idExpedienteU, m.Estado, m.estadoM
        FROM materias m
        WHERE m.idExpedienteU=? And m.Estado ='Activo' and estadoM!='Aprobada'");

       $consulMaterias->execute(array($idExpedienteU));



        
        if ($consulMaterias->rowCount()>=1)
        {
           while ($fila2=$consulMaterias->fetch())
           { 


              if ($fila2['estadoM'] !='Inscrita') {

                echo "<tr>
                    <td >".$fila2['idMateria']."</td>
                    <td class='oscuro'>".$fila2['nombreMateria']."</td>
                    <td >".$fila2['Estado']."</td>
                    
                    <td>



                    <center>
                     <button type='button' id=".$fila2['idMateria']." class='btn btn-primary' data-toggle='modal' data-target='#ModalMateria' onclick='mandarId(id)' ><i class='fa fa-check'></i>
                     </button>
                    </center>
                    </td>
                  </tr>";     

        
         
              }else
                 {

                   echo "<tr>
                    <td >".$fila2['idMateria']."</td>
                    <td class='oscuro'>".$fila2['nombreMateria']."</td>
                    <td >".$fila2['estadoM']."</td>
                   
                    <td>
                    <center>
                    <a href='javascript:void(0)' data-toggle='modal' data-target='#modalFinal' class='btn btn-danger btn-icon-split'>
                    <i class='fa fa-ban'></i></a>
                    </center>
                    </td>
                  </tr>";     

       
                   } //fin de else

            
           }//fin de while
        }else{
              echo "<tr><td colspan='8'>No ha agregado ninguna Asignatura</td></tr>";
             }//fin de else-if
                                       

                                  
            ?>



                    </tbody>

                    <tfoot>

                    </tfoot>
                </table>


                <div class='f1-buttons'>
                    <button type='button' style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" data-toggle='modal' data-target='#comprobante'>Terminar proceso</button>
                </div>
                <br><br>
            </div>
            <!--Fin Tabla de buses de Ida -->






        </div>
    </div>
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
                    Para que su solicitud sea terminada con exito agregue los siguientes datos que se le solicitan.
                </div>


                <form action="Modelo/ModeloMaterias/SubirPdfCiclo.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="" for="ciclo">Ciclo:</label>
                        <input type="text" name="ciclo" placeholder="Ciclo 00-yyyy" class="ciclo form-control"
                            id="ciclo">
                    </div>

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
     color:white;" type="submit" name="comprobante_Ciclo" value="Guardar Cambios " id="comprobante_Ciclo">

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
                <h5 class="modal-title" id="exampleModalLabel">Inscripcion Materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="Modelo/ModeloMaterias/inscripcionM.php" method="POST" accept-charset="utf-8">
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
                            <label class="" for="matricula">Matricula:</label>
                            <input type="text" name="matricula" placeholder="" class="matricula form-control"
                                id="matricula">
                        </div>





                        <input type="hidden" name="expedienteu" value="<?php echo $idExpedienteU;?>">

                        <input type="hidden" name="idInscripcionCiclo" value="<?php echo $Id_InscripcionC;?>">

                    </div>

                    <input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit"
                        name="Inscribir_Materia" value="Inscribir Materia " id="Inscribir_Materia">
                </form>
            </div>
        </div>
    </div>

    <!-- FIN MODAL MATERIA -->
    <!--**********************-->
</div>


<!-- Modal de verificacion -->
<div class="modal fade" id="modalFinal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Desinscribir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h3>¿Seguro desea desinscribir la materia?</h3>






                <form method="POST" action="Modelo/ModeloMaterias/eliminarInscripcion.php">

                    <input type="text" id="materia" class="form-control" disable>
                    <input type="hidden" id="idmateria" class="form-control" name="idmateria">




                    <input type="hidden" name="idsoliTrans" value="<?php echo $_GET['id']; ?>">
                    <input type="hidden" name="alumno" value="<?php echo $alumno; ?>">

            </div>
            <div class="modal-footer">
                <input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit"
                    name="Desenscribir_Materia" value="Desenscribir Materia " id="Desenscribir_Materia">

                <!--button type="button" class="btn btn-secondary" data-dismiss="modal">Desinscribir</button-->


            </div>
            </form>
        </div>
    </div>
</div>














</div>




<br><br>



<script type="text/javascript">
window.onload = function() {
    $("table tbody tr").click(function() {
        // Tomar la captura la información  de la tabla 
        var idmateria = $(this).find("td:eq(0)").text();
        document.getElementById('idmateria').value = idmateria;

        var nombre = $(this).find("td:eq(1)").text();
        document.getElementById('materia').value = nombre;



    });
}
</script>

<?php
  require_once 'templates/footer.php';
?>