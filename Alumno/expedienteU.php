<?php

  require_once 'templates/head.php';

?>

<title>Inicio</title>

<?php

  require_once 'templates/header.php';

  //require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';

 $stmt1 =$dbh->prepare("SELECT `ID_Alumno` , A.Nombre , E.Nombre AS 'Universidad' FROM alumnos A INNER JOIN empresas E ON A.ID_Empresa = E.ID_Empresa WHERE correo='".$_SESSION['Email']."'");
// Ejecutamos
$stmt1->execute();

while($fila = $stmt1->fetch()){
    $alumno=$fila["ID_Alumno"];
    $Nombre_Alumno=$fila["Nombre"];
     $univerisdad = $fila["Universidad"];
}
$id=$alumno;




$idExpedienteU;


 
if ($_GET['id']==null) {

   $stmt10 =$dbh->prepare("SELECT MAX(`idExpedienteU`) AS UltimoRegistro FROM expedienteu WHERE `ID_Alumno` = ? ");
// Ejecutamos
    $stmt10->execute(array($id));

  while($fila10 = $stmt10->fetch()){
    $idExpedienteU=$fila10["UltimoRegistro"];
    
}

 }else
 {
   $idExpedienteU = $_GET['id'];
 }


  $FotoAlumno = '';

  $consulta2=$dbh->prepare("SELECT * FROM usuarios where correo = :IdAlumno");
  $consulta2->bindParam(":IdAlumno", $_SESSION['Email']);
  $consulta2->execute();

  if ($consulta2->rowCount() >=0)
  {
    $fila2=$consulta2->fetch();
    $FotoAlumno = $fila2['imagen'];

  }

    $consulta2=$dbh->prepare("SELECT * FROM usuarios where correo = :IdAlumno");
  $consulta2->bindParam(":IdAlumno", $_SESSION['Email']);
  $consulta2->execute();

  if ($consulta2->rowCount() >=0)
  {
    $fila2=$consulta2->fetch();
    $FotoAlumno = $fila2['imagen'];

  }


 $stmt2 =$dbh->prepare("SELECT idExpedienteU , A.Nombre AS 'Alumno', E.Nombre 'Universidad' , C.nombre AS 'CARRERA' , F.Nombre 'Facultad',C.Duracion , cum , proyecEgreso , pensum , avancePensum, EU.estado FROM expedienteu EU INNER JOIN alumnos A ON EU.ID_Alumno = A.ID_Alumno LEFT JOIN carrera C ON EU.Id_Carrera = C.Id_Carrera LEFT JOIN facultades F ON C.ID_Facultades = F.IDFacultates LEFT JOIN empresas E ON EU.ID_Empresa = E.ID_Empresa WHERE EU.ID_Alumno = ? ");
  // Ejecutamos
  $stmt2->execute(array($id));


   $stmt3 =$dbh->prepare("SELECT idExpedienteU , A.Nombre AS 'Alumno', E.Nombre 'Universidad' , C.nombre AS 'CARRERA' , F.Nombre 'Facultad',C.Duracion , cum , proyecEgreso , pensum , avancePensum, EU.estado FROM expedienteu EU INNER JOIN alumnos A ON EU.ID_Alumno = A.ID_Alumno LEFT JOIN carrera C ON EU.Id_Carrera = C.Id_Carrera LEFT JOIN facultades F ON C.ID_Facultades = F.IDFacultates LEFT JOIN empresas E ON EU.ID_Empresa = E.ID_Empresa WHERE EU.idExpedienteU = ? ");
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

  }


    $stmt4 =$dbh->prepare("SELECT COUNT(idMateria) AS 'Aprobado' FROM `materias` WHERE `idExpedienteU` = ? AND Estado ='Aprobado'");
  // Ejecutamos
  $stmt4->execute(array($idExpedienteU));


  if ($stmt4->rowCount() >=0)
  {
    $fila4=$stmt4->fetch();
     $Aprobado = $fila4['Aprobado'];

  }



  $stmt5 =$dbh->prepare("SELECT COUNT(Id_InscripcionM) AS 'Reprobado' FROM inscripcionmateria IM INNER JOIN inscripcionciclos IC ON IM.Id_InscripcionC = IC.Id_InscripcionC WHERE IC.idExpedienteU = ? AND estado = 'Reprobado' ");
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


?>
<div class="container-fluid text-center">
  <br><br>
  <div class="text-center">
  <div class="title">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Expediente Universidad</h2>
</div>
  </div>
  <div class="row">
    <div class="text-center align-self-center" id="carnet">
      <br>
      <img src="../img/imgUser/<?php echo $FotoAlumno?>" alt="img de usuario" style = "height: 150px;
      width: 150px; background-repeat: no-repeat;
      background-position: 50%;
      border-radius: 50%;
      background-size: 100% auto;" >
      <h6 style="color: white;"><?php echo utf8_encode($univerisdad)  ?></h6>
      <h4 style="text-align: center; color: white;"><?php echo $Nombre_Alumno; ?> </h4>
      <h4 style="color: white;">Carnet U ?</h4>

    </div>

    <div class="col text-center">
      <br><br><br>
      <h3 class="float-left">Estudios realizados</h3>
      <table class="table table-responsive-lg float-left">
        <thead  style="background-color: #2D2D2E; color: white; ">
          <tr>
            <th scope="col">Universidad</th>
            <th scope="col">Carrera</th>
            <th scope="col">Facultad</th>
            <th scope="col">Estado</th>
            <th scope="col">Detalles</th>
          
          </tr>
        </thead>
        <tbody>
         
                <?php


    while($fila2 = $stmt2->fetch()){
      echo " <tr class='table-light'>";
        echo "<td scope=\"row\">".$fila2["Universidad"]."</td>";
        echo utf8_encode("<td>".$fila2["CARRERA"]."</td>")  ;
          echo utf8_encode("<td>".$fila2["Facultad"]."</td>") ;
         echo "<td>".$fila2["estado"]."</td>";
        echo "<td><a class=\"btn btn-info\" href=\"expedienteU.php?id=".$fila2["idExpedienteU"]."\"><i class=\"fas fa-info-circle\"></i></a></td>";
      echo "</tr>";
    }
    ?>
     
        </tbody>
      </table>


    </div>



  </div>

<br>
<div class="card text-center" style=" border-color: white;
border-width: 3px;
   border-style: solid;">
  <div class="card-header" style="background-color: #2D2D2E; color: white;">
 <h4 class="float-left" style="color:white;">Detalles del Estudio</h4>
  </div>

  <div class="card-body" style="background-color: #c7c7c7; ">
          <div class="row">
            <table class="table table-responsive-lg float-left" >
        <thead  style="background-color: #2D2D2E; color: white; ">
          <tr>
            <th scope="col">Universidad</th>
            <th scope="col">Carrera</th>
            <th scope="col">Cum</th>
            <th scope="col">proyecto Egreso</th>
            <th scope="col">Estado</th>
            <th scope="col">Pensum</th>
            <th scope="col">Comprobante</th>
          
          </tr>
        </thead>
        <tbody>
         <tr class='table-light'>
            <th scope="col"> <?php echo $Universi ?> </th>
           <th scope="col"> <?php echo utf8_encode($Carrera)?> </th>
            <th scope="col"> <?php echo $cum?></th>
            <th scope="col"> <?php echo $Egreso ?> </th>
            <th scope="col"> <?php echo $EstadoCarrera ?> </th> <th scope="col"><a href="../pdfPensum/<?php echo $Pensum ?>" class="btn btn-danger"><img src="../img/PDF.png" width="25px" height="25px"></a> </th>   
    <th scope='col'><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' style="height: 50px;"><img src="../img/paper.png" width="25px" height="25px"><br><p style="font-size: 10px;">Subir pensum</p></button></th>

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
                                                <span id="ContentPlaceHolder1_LbCAprobadas"><?php echo  $Aprobado;  ?></span></h1>
                                        </div>
                                        <div class="card-footer">
                                            <small>APROBADAS</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                    <div class="card text-white bg-danger mb-3 text-center">
                                        <div class="card-header">
                                            <h1>
                                                <span id="ContentPlaceHolder1_LbCReprobadas"><?php echo  $Reprobado;  ?></span></h1>
                                        </div>
                                        <div class="card-footer">
                                            <small>REPROBADAS</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-6">
                                    <div class="card text-white bg-warning mb-3 text-center">
                                        <div class="card-header">
                                            <h1>
                                                <span id="ContentPlaceHolder1_LbCRetiradas"><?php echo  $Retirads;  ?></span></h1>
                                        </div>
                                        <div class="card-footer">
                                            <small>RETIRADAS</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-6 text-center">
                                    <div class="panel panel-udb text-white bg-primary" >
                                        <div class="card-header">
                                            <h1>
                                        <span id="ContentPlaceHolder1_LbCEquivalencia"><?php echo  $Inscrita;  ?></span></h1>
                                        </div>
                                        <div class="card-footer">
                                            <small>Inscrita</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                            <div class="card card-udb">
                                <div class="card-header">
                                    <b>
                                        <h1>
                   <span id="ContentPlaceHolder1_LbCPorcentaje"><?php echo  number_format($PorcPens, 2, '.', '');  ?>%</span></h1>
                                    </b>
                                </div>
                                <div class="card-footer">
                                    <small>PORCENTAJE DE AVANCE</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

         <h4 class="float-left">Inscripciones de Ciclos</h4>           
        <table class="table table-responsive-lg float-left">
        <thead  style="background-color: #2D2D2E; color: white; ">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Ciclo Universidad</th>
            <th scope="col">Comprobante</th>
            <th scope="col">Detalles</th>
          
          </tr>
        </thead>
        <tbody>
          
                      <?php
    while($fila9 = $stmt9->fetch()){
      echo " <tr class='table-light'>";
        echo "<td scope=\"row\">".$fila9["Id_InscripcionC"]."</td>";
        echo "<td>".$fila9["cicloU"]."</td>";
        echo "<td><a class=\"btn btn-danger\" href=\"../pdfInscripCiclos/?id=".$fila9["comprobante"]."\"><i class=\"fas fa-file-pdf\"></i></a></td>";
        echo "<td><a class=\"btn btn-info\" href=\"#/?id=".$fila9["Id_InscripcionC"]."\"><i class=\"fas fa-info-circle\"></i></a></td>";
      echo "</tr>";
    }
    ?>
   
     
        </tbody>
      </table>



  </div>

  <div class="card-footer text-muted"  style="background-color: #2D2D2E; color: white;border-color: #454d55;">
   
  </div>
</div>


  <br>
  <br>
</div>

<!-- /#page-content-wrapper -->


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
        <form action="Modelo/ModeloTransporte/comprobanteSoliT.php" method="post" enctype="multipart/form-data">
          <div class="custom-file">
          <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo" required>
          <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar pensum</label>
          <center><small>El archivo no debe pesar más de 5MB</small></center>
        </div>
        <br><br>
        <div>
     

        <!--idsolicitudTrans-->
        <input type="hidden" name="soli" value="<?php echo $_GET['id'];?>"> 

      

        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" id="subirComprobante" name="subirComprobante" value="Guargar Cambios" class="btn btn-secondary">
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
