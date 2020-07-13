<?php

  require_once 'templates/head.php';

?>

<title>Solicitud estado laboral</title>

<?php

  require_once 'templates/header.php';

  require_once 'templates/MenuVertical.php';

  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';

  $extraeIdAlumno=$dbh->prepare("SELECT `ID_Alumno` FROM `alumnos` WHERE `correo`='".$_SESSION['Email']."'");
  $extraeIdAlumno->execute();
  if ($extraeIdAlumno->rowCount()>0) {
    // code...
    $fila2=$extraeIdAlumno->fetch();
    $alumno=$fila2['ID_Alumno'];
  }

  $noti=$_GET["idNotif"];
  $actualizar=$dbh->prepare("UPDATE `notificaciones` SET `Estado`='Visto' WHERE `Id`=:notificacion");
  $actualizar->bindParam(":notificacion",$noti);
  $actualizar->execute();

  $solicitud=$_GET["idSoli"];
  $consulta=$dbh->prepare("SELECT * FROM `solicituddesinscribir` WHERE `id_solicitud`='".$solicitud."'");
  $consulta->execute();

  if ($consulta->rowCount()>0) {
    // code...
    $fila=$consulta->fetch();
    $IdSolicitud=$fila["id_solicitud"];
    $IdAlumno=$fila["id_alumno"];
    $idTaller=$fila["id_taller"];
    $Comentario=$fila["comentario"];
    $Comprobante=$fila["comprobante"];
    $Comentario2=$fila["Comentario2"];
    $Estado=$fila["estado"];

  }
  $taller=$idTaller;
  $stmt1 =$dbh->prepare("SELECT `Titulo` FROM `talleres` WHERE `ID_Taller`='".$taller."'");
  // Ejecutamos
  $stmt1->execute();

  while($fila = $stmt1->fetch()){
      $titulo=$fila["Titulo"];
  }


?>



<div class="container-fluid text-center">

  <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>

  <br>

    <h1 class="h1 text-light">Solicitud de desinscribir.</h1>





<br>


<h1 class="h1 text-light"><?php echo $titulo; ?></h1>
<br>
<br>


    <h2 class="h2">¿Por qué desea desincribirse de este taller?</h2>
      <div class="row">
        <div class="col">


              <form class="form-group" action="Desinscribir.php" method="post" enctype="multipart/form-data">

                <h3>Motivo:</h3>

                <textarea class="form-control" id="motivo" name="motivo" rows="3" required disabled><?php echo $Comentario; ?></textarea>
                <div id="arch">
                  <h4>Comprobante</h4>
                  <a class="btn btn-secondary"  href="../ComproCambio/<?php echo $Comprobante; ?>"><i class="fas fa-file-alt" style="font-size:3em;"></i></a>
                </div>
            <div class="custom-file" id="archivo">
              <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo" required>
              <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Comprobante</label>
              <small>El archivo no debe persar más de 5MB</small>
            </div>
            <input type="text" name="alumno" value="<?php echo $alumno; ?>" hidden>
            <input type="text" name="taller" value="<?php echo $idTaller; ?>" hidden>
            <input type="text" name="solicitud" value="<?php echo $IdSolicitud; ?>" hidden>
            <input type="submit" class="btn btn-warning btn-block" name="desinscribir" id="btnEnviar" value="Enviar">
          </form>


        </div>
        <div class="col">
          <h3>Comentario de coach:</h3>
          <textarea rows="8" class="form-control" cols="80" disabled><?php echo $Comentario2; ?></textarea>
          <h4>Estado de la solicitud:</h4>
          <input type="text" class="form-control" value="<?php echo $Estado; ?>" disabled>
        </div>
    </div>
<br>
<?php if ($Estado=='Rechazado'): ?>
  <div class="row">
    <br>
  <br>
  <button type="button" class="btn btn-dark btn-block" id="btnModifica" name="button">Modificar solicitud</button>
  </div>
<?php endif; ?>

<script type="text/javascript">
  $(document).ready(function() {
    $("#archivo").hide();
    $("#btnEnviar").hide();
    $("#btnModifica").click(function() {
      $("#archivo").show();
      $("#btnEnviar").show();
      $("#arch").hide();
      $("#select").prop('disabled', false);
      $("#motivo").prop('disabled', false);
    });
  });
</script>



</div>

<!-- /#page-content-wrapper -->



</div>

</div>

<!-- /#wrapper -->



<?php

  require_once 'templates/footer.php';

?>
