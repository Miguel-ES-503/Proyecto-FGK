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
  $consulta=$dbh->prepare("SELECT * FROM `solicitudcambio` WHERE `id_solicitud`='".$solicitud."'");
  $consulta->execute();
  $consulta1=$dbh->prepare("SELECT `ID_Status`, `Nombre` FROM `status`");
  $consulta1->execute();

  if ($consulta->rowCount()>0) {
    // code...
    $fila=$consulta->fetch();
    $IdSolicitud=$fila["id_solicitud"];
    $IdEstatus=$fila["id_status"];
    $Comentario=$fila["Comentario"];
    $Comprobante=$fila["Comprobante"];
    $Comentario2=$fila["Comentario2"];
    $Estado=$fila["Estado"];
    $fecFin=$fila["fechaFin"];

  }
  $extraeStatus=$dbh->prepare("SELECT `Nombre` FROM `status` WHERE `ID_Status`='".$IdEstatus."'");
  $extraeStatus->execute();
  if ($extraeStatus->rowCount()>0) {
    $fila=$extraeStatus->fetch();
    $NombreStatus=$fila["Nombre"];
  }


?>



<div class="container-fluid text-center">

  <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>

  <br>

    <h1 class="h1 text-light">Cambio de estado</h1>





<br>



      <div class="row">
        <div class="col">
          <br>
          <form class="form-group" action="Cambio.php" method="post" enctype="multipart/form-data">
            <select class="custom-select" name="status" id="select" disabled>
              <option selected value="<?php echo $IdEstatus; ?>"><?php echo $NombreStatus; ?></option>

              <?php
                while ($linea=$consulta1->fetch()) {
                  // code...
                  echo "<option value='".$linea["ID_Status"]."'>".$linea["Nombre"]."</option>";
                }
              ?>
            </select>

            <label for="fechaFin">Fecha de finalización</label>
            <input type="date" name="fechaFin" id="fec" class="form-control" value="<?php echo $fecFin; ?>" required disabled>
            <small>Cuando esta fecha se llegue a su fin su estado será cambiado a Estudiando.</small>

            <h3>Motivo:</h3>

            <textarea  class="form-control" id="motivo" name="motivo" rows="3" required disabled><?php echo $Comentario; ?></textarea>
            <br>
            <div id="arch">
              <h4>Comprobante</h4>
              <a class="btn btn-secondary"  href="../ComproCambio/<?php echo $Comprobante; ?>"><i class="fas fa-file-alt" style="font-size:3em;"></i></a>
            </div>

            <div class="custom-file" id="archivo">
              <input type="file" class="custom-file-input" accept=".pdf" id="customFileLang" name="archivo" required>
              <label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Comprobante</label>
              <small>El archvo no debe pesar más de 5MB</small>
            </div>

            <input type="text" name="alumno" value="<?php echo $alumno; ?>" hidden>
            <input type="text" name="solicitud" value="<?php echo $IdSolicitud; ?>" hidden>
            <input type="submit" class="btn btn-primary btn-block" id="btnEnviar" name="desinscribir" value="Enviar">
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
      $("#fec").prop('disabled', false);
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
