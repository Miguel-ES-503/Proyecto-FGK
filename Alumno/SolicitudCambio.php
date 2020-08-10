<?php

  require_once 'templates/head.php';

?>

<title>Cambiar estado laboral</title>



<?php

  require_once 'templates/header.php';


  require_once 'templates/MenuHorizontal.php';

  require '../Conexion/conexion.php';

  $alumno=$_GET["id"];
  $consulta1=$dbh->prepare("SELECT `ID_Status`, `Nombre` FROM `status`");
  $consulta1->execute();

?>



<div class="container-fluid text-center" style="background-color: white;  ">
<div class="title">
    <a href="../Alumno/AlumnoInicio.php"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Campo Laboral</h2>

</div>

  <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>

  <h3 style="text-align: center;font-weight:bold;font-size: 25px; flaot: right;">Detalles de trabajo</h3>
 




<center>
<br>
<div class="border2 ">
<form  action="Cambio.php" method="post" class="form-group" enctype="multipart/form-data" >
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="form-group">
  <label for="CambioEstado" style="color: black;">Cambio de estado</label>
            <select class="custom-select" name="status" required>
              <option selected>Selecciona el estatus que desea obtener...</option>

              <?php
                while ($linea=$consulta1->fetch()) {
                  // code...
                  echo "<option value='".$linea["ID_Status"]."'>".$linea["Nombre"]."</option>";
                }
              ?>
            </select>
  </div>

</div>


</div>
  
  
  <div class="form-group">
  <label for="fechaFin" style="color: black;">Fecha de finalización</label>
            <input type="date" name="fechaFin" class="form-control" required>
            <small>Cuando esta fecha se llegue a su fin su estado será cambiado a Estudiando.</small>
  </div>
  

          <div class="form-group">
          <label for="motivo" style="color: black;">Motivo</label>

            <textarea class="form-control" id="motivo" name="motivo" rows="3" required style="background-color:  #c7c7c7;"></textarea>
          </div>

            

          <div class="form-group">
          <div class="custom-file">
          <input type="file" class="custom-file-input"  accept=".pdf" id="customFileLang" name="archivo" required >
          <label class="custom-file-label" for="customFileLang"  data-browse="Buscar">Seleccionar Comprobante</label>
          <small>El archvo no debe pesar más de 5MB</small>
        </div>
          </div>
        
       
        <input type="text" name="alumno" value="<?php echo $alumno; ?>" hidden>
        <center><input type="submit" class="btn btn-danger " name="desinscribir" value="Enviar" style="background-color: #BE0032;">
              </center>
              <br>
      
  </form>

</div>
              </center>
              <br>
             


</div>
</div>

<!-- /#page-content-wrapper -->








<!-- /#wrapper -->



<?php

  require_once 'templates/footer.php';

?>
</html>