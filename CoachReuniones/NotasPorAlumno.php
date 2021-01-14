<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Notas del alumno</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos  


include_once "Modelo/ModeloAlumno/NotasAlumno.php";
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<title>Inicio</title>
<style>
@media only screen and (min-width: 320px) and (max-width: 767px) {

    .title h2 {
        font-size: 20px;
        margin-top: 8px;
        margin-left: 0em;

    }

    .icon {
        height: 18px;
        width: 18px;
        margin-top: 0px;
    }

    .title {
        width: 100%;

    }

}
</style>

<?php

  require_once '../Alumno/templates/header.php';



  //require_once '../Alumno/templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';

$id = $_GET['id'];
 $stmt1 =$dbh->prepare("SELECT `ID_Alumno` , A.Nombre , A.ID_Empresa AS 'idem' , E.Nombre AS 'Universidad', 
 A.Id_Carrera AS 'idUni' FROM alumnos A INNER JOIN empresas E ON A.ID_Empresa = E.ID_Empresa
  WHERE ID_Alumno='".$id."'");
// Ejecutamos
$stmt1->execute();

while($fila = $stmt1->fetch()){
    $alumno=$fila["ID_Alumno"];
    $Nombre_Alumno=$fila["Nombre"];
    $univerisdad = $fila["Universidad"];
    $iduniverisdad = $fila["idUni"];
     $IDempresa = $fila["idem"];
}
$id=$alumno;

//consulta para extraer el id universitario del alumno
$stmt14525646 = $dbh->prepare("SELECT idExpedienteU FROM expedienteu WHERE ID_Alumno= '".$id."'");
$stmt14525646->execute();
while($row = $stmt14525646->fetch()){
    $idExpedienteU = $row['idExpedienteU'];
}


//consulta para extraer las materias inscritas de los alumnos
$stmt9945246 = $dbh->prepare("SELECT * FROM materias WHERE idExpedienteU = :id AND Estado = 'Activo' ");
$stmt9945246->bindParam(":id",$idExpedienteU);
$stmt9945246->execute(); 
// fin de consulta para extraer las materias inscritas de los alumnos

//consulta para extraer las materias retiradas de los alumnos
$stmt99452462 = $dbh->prepare("SELECT * FROM materias WHERE idExpedienteU = :id AND estadoM = 'Retirada' ");
$stmt99452462->bindParam(":id",$idExpedienteU);
$stmt99452462->execute(); 
// fin de consulta para extraer las materias retiradas de los alumnos

//consulta para extraer las materias retiradas de los alumnos
$stmt99452463 = $dbh->prepare("SELECT * FROM materias WHERE idExpedienteU = :id AND estadoM = 'Reprobada' ");
$stmt99452463->bindParam(":id",$idExpedienteU);
$stmt99452463->execute(); 
// fin de consulta para extraer las materias retiradas de los alumnos

//consulta para extraer las materias retiradas de los alumnos
$stmt99452464 = $dbh->prepare("SELECT * FROM materias WHERE idExpedienteU = :id AND estadoM = 'Aprobada' ");
$stmt99452464->bindParam(":id",$idExpedienteU);
$stmt99452464->execute(); 
// fin de consulta para extraer las materias retiradas de los alumnos




  $FotoAlumno = '';

  $consulta2=$dbh->prepare("SELECT * FROM usuarios where correo = :IdAlumno");
  $consulta2->bindParam(":IdAlumno", $Correo);
  $consulta2->execute();

  if ($consulta2->rowCount() >=0)
  {
    $fila2=$consulta2->fetch();
    $FotoAlumno = $fila2['imagen'];
  }

    $consulta2=$dbh->prepare("SELECT * FROM usuarios where correo = :IdAlumno");
  $consulta2->bindParam(":IdAlumno", $Correo);
  $consulta2->execute();

  if ($consulta2->rowCount() >=0)
  {
    $fila2=$consulta2->fetch();
    $FotoAlumno = $fila2['imagen'];
  }


 $stmt2 =$dbh->prepare("SELECT idExpedienteU , A.Nombre AS 'Alumno', E.Nombre 'Universidad' ,
  C.nombre AS 'CARRERA' , F.Nombre 'Facultad',C.Duracion , cum , proyecEgreso , pensum , avancePensum,carnet, 
  EU.estado FROM expedienteu EU INNER JOIN alumnos A ON EU.ID_Alumno = A.ID_Alumno LEFT JOIN carrera C
   ON EU.Id_Carrera = C.Id_Carrera LEFT JOIN facultades F ON C.ID_Facultades = F.IDFacultates LEFT JOIN
    empresas E ON EU.ID_Empresa = E.ID_Empresa WHERE EU.ID_Alumno = ? ");
  // Ejecutamos
  $stmt2->execute(array($id));

   $stmt3 =$dbh->prepare("SELECT idExpedienteU , A.Nombre AS 'Alumno', E.Nombre 'Universidad' ,
    C.nombre AS 'CARRERA' , F.Nombre 'Facultad',C.Duracion , cum , proyecEgreso , pensum , avancePensum,carnet,
     EU.estado FROM expedienteu EU INNER JOIN alumnos A ON EU.ID_Alumno = A.ID_Alumno LEFT JOIN carrera C 
     ON EU.Id_Carrera = C.Id_Carrera LEFT JOIN facultades F ON C.ID_Facultades = F.IDFacultates LEFT JOIN
      empresas E ON EU.ID_Empresa = E.ID_Empresa WHERE EU.idExpedienteU = ? ");
  // Ejecutamos
  $stmt3->execute(array($idExpedienteU));


  if ($stmt3->rowCount() >=0)
  {
    $fila3=$stmt3->fetch();
    $Universi = $fila3['Universidad'];
    $Carrera = $fila3['CARRERA'];
    $cum = $fila3['cum'];
    $Egreso = $fila3['proyecEgreso'];
    $Pensum = $fila3['pensum'];
    $PorcPens = $fila3['avancePensum'];
    $EstadoCarrera = $fila3['estado'];
    $carnet = $fila3['carnet'];

  }


    $stmt4 =$dbh->prepare("SELECT COUNT(idMateria) AS 'Aprobado' FROM `materias` WHERE `idExpedienteU` = ? AND estadoM ='Aprobada'");
  // Ejecutamos
  $stmt4->execute(array($idExpedienteU));


  if ($stmt4->rowCount() >=0)
  {
    $fila4=$stmt4->fetch();
     $Aprobado = $fila4['Aprobado'];

  }



  $stmt5 =$dbh->prepare("SELECT COUNT(idMateria) AS 'Reprobado' FROM `materias` WHERE `idExpedienteU` = ? AND estadoM ='Reprobada'");
  // Ejecutamos
  $stmt5->execute(array($idExpedienteU));


  if ($stmt5->rowCount() >=0)
  {
    $fila5=$stmt5->fetch();
     $Reprobado = $fila5['Reprobado'];

  }



  $stmt6 =$dbh->prepare("SELECT COUNT(Id_InscripcionM) AS 'RETIRADAS' FROM inscripcionmateria IM INNER JOIN inscripcionciclos IC ON IM.Id_InscripcionC = IC.Id_InscripcionC WHERE IC.idExpedienteU = ? AND estado = 'Retirada' ");
  // Ejecutamos
  $stmt6->execute(array($idExpedienteU));


  if ($stmt6->rowCount() >=0)
  {
    $fila6=$stmt6->fetch();
     $Retirads = $fila6['RETIRADAS'];

  }


  $stmt7 =$dbh->prepare("SELECT COUNT(idMateria) AS 'Inscrita' FROM materias WHERE idExpedienteU = ? ");
  // Ejecutamos
  $stmt7->execute(array($idExpedienteU));


  if ($stmt7->rowCount() >=0)
  {
    $fila7=$stmt7->fetch();
     $Inscrita = $fila7['Inscrita'];

  }

   $PorcetaCarrera = (($Aprobado * 100) / $Inscrita);






  $stmt9 =$dbh->prepare("SELECT * FROM `inscripcionciclos` WHERE `idExpedienteU` = ?");
  $stmt9->execute(array($idExpedienteU));

  $stmt16584 = $dbh->prepare("SELECT * FROM `materias` WHERE  `idExpedienteU` = ? ORDER BY estadoM DESC");
  $stmt16584->execute(array($idExpedienteU));


?>
<div class="container-fluid text-center">

    <div class="row">
        <div class="title" style="margin-left: -9px;">
            <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
            <h2 class="main-title">Expediente Universidad</h2>

        </div>
    </div>
    <div class="row">
        <div class="text-center align-self-center " id="carnet" style="background-color:  #c7c7c7;">
            <br>
            <img src="../img/imgUser/<?php echo $FotoAlumno?>" alt="img de usuario" style="height: 170px;
      width: 170px; background-repeat: no-repeat;
      background-position: 50%;
      border-radius: 50%;
      background-size: 100% auto;">
            <h4 style="color: white; text-align: center; font-weight: bold;"><?php echo utf8_encode($univerisdad)  ?>
            </h4>


        </div>

        <div class="col text-center">
            <br><br><br>


            <h3 style="text-align: left; color: #555555; font-weight: bold;"><?php echo $Nombre_Alumno; ?> </h3>
            <h5 style="color: #555555; text-align: left;">Carnet Universidad: <?php echo $carnet; ?></h5>
            <table class="table table-responsive-lg float-left">
                <thead style="background-color: #2D2D2E;; color: white; ">
                    <tr>
                        <th scope="col">Universidad</th>
                        <th scope="col">Carrera</th>
                        <th scope="col">Facultad</th>
                        <th scope="col">Estado</th>
                        <!-- <th scope="col">Actualizar</th> -->
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (isset($carnet)) {
                      while($fila2 = $stmt2->fetch()){
                        echo " <tr class='table-dark' style='color: black;'>";
                          echo "<td scope=\"row\">".$fila2["Universidad"]."</td>";
                          echo utf8_encode("<td>".$fila2["CARRERA"]."</td>")  ;
                          echo utf8_encode("<td>".$fila2["Facultad"]."</td>") ;
                          echo "<td>".$fila2["estado"]."</td>";
                        //  echo "<td><a class=\"btn btn-warning\"  href=\"ActualizarexpedienteU.php?Universidad=$iduniverisdad&alumno=$alumno&id=$IDempresa\"><i class='fas fa-pen'></i></a></td>";
                          echo "</tr>";
                      }
                    }else {
                      echo " <tr class='table-dark' style='color: black;'>";
                          echo "<td scope=\"row\">Debe actualizar </td>";
                          echo utf8_encode("<td>Debe actualizar </td>")  ;
                          echo utf8_encode("<td>Debe actualizar </td>") ;
                          echo "<td>Debe actualizar</td>";
                        //  echo "<td><a class=\"btn btn-warning\" href=\"ActualizarexpedienteU.php?Universidad=$iduniverisdad&alumno=$alumno&id=$IDempresa\"><i class='fas fa-pen'></i></a></td>";
                          echo "</tr>";
                    }
    
    ?>
                </tbody>
            </table>


        </div>



    </div>

    <br>
    <div class="card text-center" style=" border-color: white;border-width: 3px;border-style: solid;">

        <h3 style="text-align: left; font-weight: bold;">Detalles del Estudio</h3>


        <div class="card-body" style="background-color: white; ">
            <div class="row">
                <table class="table table-responsive-lg float-left">
                    <thead style="background-color: #2D2D2E; color: white; ">
                        <tr>
                            <th scope="col">Universidad</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Cum</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Subir Pensum</th>
                            
                            <th scope="col">Ver Pensum</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class='table-dark' style="color: black;">
                            <th scope="col"> <?php echo $Universi ?> </th>
                            <th scope="col"> <?php echo utf8_encode($Carrera)?> </th>
                            <th scope="col"> <?php echo $cum?></th>
                            <th scope="col"> <?php echo $EstadoCarrera ?> </th>
                            <th scope="col"> <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#pensum'
                                style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 100px;height: 50px;
     background-color: #9d120e;
     color:white;"><img src="../img/add.png" width="25px" height="25px"><br>
                                <p style="font-size: 10px;">Subir pensum</p>
                            </button> </th>
                                                 <?php 
               if ($Pensum == null) {
                 echo "
                 <th><button type='button' class='btn btn-danger'  disabled> <img src='../img/PDF.png' width='25px' height='25px'></button></th>";
             
              }else
              {
                echo "<th><a href='../pdfPensum/$Pensum' target='_blank' class='btn btn-danger '><img src='../img/PDF.png' width='25px' height='25px>'</a> </th>";  
              }
              ?>

                        

                        </tr>
                    </tbody>
                </table>


                <br>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <div class="card text-white bg-success mb-3 text-center">
                                <div class="card-header">
                                    <h1>
                                        <span id="ContentPlaceHolder1_LbCAprobadas"><?php echo  $Aprobado;  ?></span>
                                    </h1>
                                </div>
                                <div class="card-footer">
                                    <small><button  type="button"  data-toggle="modal" data-target="#notas4" style="color: white; background-color: transparent; border-color: transparent; cursor: default;" >APROBADAS</button></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="card text-white bg-danger mb-3 text-center">
                                <div class="card-header">
                                    <h1>
                                        <span id="ContentPlaceHolder1_LbCReprobadas"><?php echo  $Reprobado;  ?></span>
                                    </h1>
                                </div>
                                <div class="card-footer">
                                    <small><button  type="button"  data-toggle="modal" data-target="#notas3" style="color: white; background-color: transparent; border-color: transparent; cursor: default;" >REPROBADAS</button></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="card text-white bg-warning mb-3 text-center">
                                <div class="card-header">
                                    <h1>
                                        <span id="ContentPlaceHolder1_LbCRetiradas"><?php echo  $Retirads;  ?></span>
                                    </h1>
                                </div>
                                <div class="card-footer">
                                    <small><button  type="button"  data-toggle="modal" data-target="#notas2" style="color: white; background-color: transparent; border-color: transparent; cursor: default;" >RETIRADAS</button></small>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-3 col-xs-6 text-center">
                            <div class="panel panel-udb text-white bg-primary">
                                <div class="card-header">
                                    <h1>
                                        <span id="ContentPlaceHolder1_LbCEquivalencia"><?php echo  $Inscrita;  ?></span>
                                    </h1>
                                </div>
                                <div class="card-footer">
                                    <small > <button  type="button"  data-toggle="modal" data-target="#notas" style="color: white; background-color: transparent; border-color: transparent; cursor: default;" >INSCRITAS</button></small>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                    <div class="card card-udb"
                        style="background-color: #c7c7c7; border-width: medium; border-color: #2D2D2E; border-radius: 3%;">
                        <div class="card-header">
                            <b>
                                <h1>
                                    <span
                                        id="ContentPlaceHolder1_LbCPorcentaje"><?php echo  number_format($PorcPens, 2, '.', '');  ?>%</span>
                                </h1>
                            </b>
                        </div>
                        <div class="card-footer">
                            <small style="font-weight: bold; color: black;">PORCENTAJE DE AVANCE</small>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <h3 style="text-align: left; font-weight: bold;">Inscripciones de Ciclos</h3>
            <table class="table table-responsive-lg float-left">
                <thead style="background-color: #2D2D2E; color: white; ">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Ciclo Universidad</th>
                        <th scope="col">Comprobante</th>
                        <th scope="col">Detalles</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                     // idExpedienteU
              
                     $numero =0;
                     $numero++;
                     $num =0;
                     $num ++;
                     $num88=1;
    $num2 =1;
    while($fila9 = $stmt9->fetch()){

        $pdfCiclo = $fila9['comprobante'];
        $prueba = $fila9["cicloU"];
        $ciclou = $fila9["Id_InscripcionC"];
        //consulta para obtener nota de materia
$stmt1658484 = $dbh->prepare("SELECT nota FROM `inscripcionmateria` WHERE  `Id_InscripcionC` = ?");
$stmt1658484->execute(array($ciclou));


      echo " <tr class='table-dark' style ='color: black;'>";
        echo "<td scope=\"row\">".$fila9["Id_InscripcionC"]."</td>";
        echo "<td>".$fila9["cicloU"]."</td>";
        $nota = $fila["n"];
        
        if ($pdfCiclo == null) {
            echo "
            <th><button type='button' class='btn btn-danger'  disabled> <img src='../img/PDF.png' width='25px' height='25px'></button></th>";
        
         }else
         {
           echo "<th><a href='../pdfCicloInscripcion/$pdfCiclo' target='_blank' class='btn btn-danger '><img src='../img/PDF.png' width='25px' height='25px>'</a> </th>";  
         }

        
        //echo "<td><a class=\"btn btn-danger\" href=\"../pdfInscripCiclos/?id=".$fila9["comprobante"]."\"><i class=\"fas fa-file-pdf\"></i></a></td>";
        echo "<td><button type='button' class='btn btn-info' data-toggle='modal' 
        data-target='#exampleModalCenter".($numero++)."'>
        <i class=\"fas fa-info-circle\"></i></button></td>";

        echo "</td>";
      echo "</tr>";
      $stmt123456 = $pdo->query("SELECT m.nombreMateria  FROM inscripcionmateria i INNER JOIN materias m
      ON m.idMateria = i.idMateria INNER JOIN inscripcionciclos n ON n.Id_InscripcionC = i.Id_InscripcionC 
      WHERE n.Id_InscripcionC = '$ciclou' ");
      
      echo " <div class='modal fade' id='exampleModalCenter".($num++)."' tabindex='-1' role='dialog'
      aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
       <div class='modal-dialog modal-dialog-centered modal-lg' role='document' >
         <div class='modal-content' >
           <div class='modal-header' >
             <h5 class='modal-title' id='exampleModalLongTitle'>Materias Inscritas: $prueba </h5>
             <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
             </button>
           </div>
           <div class='modal-body ' width='auto'>";

  //inicio de row
  echo "
  <div class='row'>

  <div class='col-sm-6' >";
        
  echo "<div class='card' style='width: 20rem; >";
  echo "<ul class='list-group list-group-flush'>";
                  echo "<li class='list-group-item'> &nbsp; &nbsp;"."Materia"."&nbsp;"."</li> ";
                      while ($row = $stmt123456->fetch()) {
                          echo " <li class='list-group-item'>"."<p class=''></p>".$row['nombreMateria']."&nbsp;"."</li> ";
                       }
                       echo "</ul>";
      echo "</div>";
  echo "</div>

 <div class='col-sm-3' >";
                  echo "<div class='card' style='width: 10rem; >
                 <ul class='list-group list-group-flush'>";
                   echo"   <li class='list-group-item'> &nbsp; &nbsp;"."Estado"."&nbsp;". "  </li> ";
                  while ($row2 = $stmt16584->fetch()) {
                      if ($row2["estadoM"] != null) {
                        echo " <li class='list-group-item'>".trim($row2["estadoM"])
                        ."<p class=''></p> "."</li> ";
                        
                      }
                  }
               echo "</ul>";
echo "</div>";

        echo "</div>";

        
        echo"  <div class='col-sm-3' >";
        echo "<div class='card' style='width: 10rem; >
                 <ul class='list-group list-group-flush'>";
                   echo"   <li class='list-group-item'> &nbsp; &nbsp;"."Nota"."&nbsp;". "  </li> ";
                  while ($row2 = $stmt1658484->fetch()) {
                        echo " <li class='list-group-item'>"."<p class=''></p> ".trim($row2["nota"])
                        ."&nbsp;"."</li> ";
                       
                  }
               echo "</ul>";
echo "</div>";
        echo "
      </div>";

        

 echo " </div>";


            // fin de modal-body
            echo "</div>";


         echo"
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
            </div>
          </div>
        </div>
      </div>";
    }
   

    
    ?>


                </tbody>
            </table>



        </div>


    </div>


    <br>
    <br>
</div>

<!-- /#page-content-wrapper -->


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

</div>

<!-- /#wrapper -->


<!-- Modal -->
<div class="modal fade" id="notas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Listado de materias inscritas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <ul>
      <?php 

        while ($row = $stmt9945246->fetch()) { 
            echo "<li>". utf8_encode(utf8_decode($row['nombreMateria']))."</li>";
        }

      ?>
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="notas2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Listado de materias retiradas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <ul>
      <?php 

        while ($row = $stmt99452462->fetch()) { 
            echo "<li>". utf8_encode(utf8_decode($row['nombreMateria']))."</li>";
        }

      ?>
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="notas3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Listado de materias reprobadas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <ul>
      <?php 

        while ($row = $stmt99452463->fetch()) { 
            echo "<li>". utf8_encode(utf8_decode($row['nombreMateria']))."</li>";
        }

      ?>
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="notas4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Listado de materias Aprobadas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <ul>
      <?php 

        while ($row = $stmt99452464->fetch()) { 
            echo "<li>". utf8_encode(utf8_decode($row['nombreMateria']))."</li>";
        }

      ?>
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<?php

  require_once '../Alumno/templates/footer.php';

?>