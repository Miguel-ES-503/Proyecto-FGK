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
<style>
.title{
background-color: #c7c7c7;
margin-top: -1px;
color: black;
height: 70px;
margin-left: -1.5%;
margin-bottom: 2%;
height: 55px;
width: 110%;


}
 .title2,.icon{
	float: left;
}
.main-title
{
text-align: left;
font-size: 35px;
margin-left: 30px;
margin-top: 1px;
font-weight: bold;
letter-spacing: 3px;
}
.title2
{

margin-left: 50px;
background-color: #BE0032;
width: 180px;
height: 54px;
margin-top: 1px;
}
.title2 > p 
{
margin-top: 15px;
color: white;
font-weight: bold;
}
.icon 
{

	width: 30px;
	margin-top: 12px;
  margin-left: 20px;
  margin-right: 20px;
	transform: rotate(180deg);
}
.border{





}
.border2{

  text-align: left;

  border-color: #aaaaaa;
  border-width: 5px;
   border-style: solid; 
    width: 400px;
    border-radius: 25px;
    padding: 14px;
  
}
</style>



<div class="container-fluid text-center" style="background-color: white; ">
<div class="title">
    <a href="../Alumno/AlumnoInicio.php"><img src="../img/proximo.svg" class="icon"></a>
	<h1 class="main-title" >Campo Laboral</h1>

</div>

  <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>


  <h2 style="text-align: center;font-weight:bold;font-size: 25px;">Detalles de trabajo</h2>
 




<center>

<div class="border2">

  <form  action="Cambio.php" method="post" enctype="multipart/form-data" >
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
            <label for="fechaFin" style="color: black;">Fecha de finalización</label>
            <input type="date" name="fechaFin" class="form-control" required>
            <small>Cuando esta fecha se llegue a su fin su estado será cambiado a Estudiando.</small>
            <br>

            <label for="motivo" style="color: black;">Motivo</label>

            <textarea class="form-control" id="motivo" name="motivo" rows="3" required style="background-color:  #c7c7c7;"></textarea>
            <br>
           
        <div class="custom-file">
          <input type="file" class="custom-file-input"  accept=".pdf" id="customFileLang" name="archivo" required >
          <label class="custom-file-label" for="customFileLang"  data-browse="Buscar">Seleccionar Comprobante</label>
          <small>El archvo no debe pesar más de 5MB</small>
        </div>
        <br>
        <input type="text" name="alumno" value="<?php echo $alumno; ?>" hidden>
        <center><input type="submit" class="btn btn-danger " name="desinscribir" value="Enviar" style="background-color: #BE0032;">
              </center>
              <br>
      
  </form>

</div>
              </center>
              <br>
             


</div>


<!-- /#page-content-wrapper -->



</div>




<!-- /#wrapper -->



<?php

  require_once 'templates/footer.php';

?>
