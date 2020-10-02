<?php
  require_once 'templates/head.php';
?>
<title>Reuniones</title>
<?php
  require_once 'templates/header.php';
  //require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';

  setlocale(LC_TIME, 'es_SV.UTF-8');
?> 
<div class="container-fluid text-center">
  <div class="title">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Inscribir Sesiones One on One</h2>
</div>
</div>

<div class="sesion w-50 mx-auto ">
    <!-- multistep form -->
    <?php  $id = $_POST['inscribir']; ?>
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <h2>Datos Adicionales</h2> <br> <br>
  <div class="form-group"> <br>
    <label for="formGroupExampleInput" class="float-left">Ingrese su número </label>
    <input type="tel" class="form-control" name="telefono" id="formGroupExampleInput" placeholder="xxxxxxxx" pattern='[0-9]{8}'>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2" class="float-left">Sugerir temas a tratar</label>
    <textarea name="temas" class="form-control" id="" cols="20" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-success" onclick="alert('¡Hola, su inscripción se realizon con éxito!')"   name="finalizar" value='<?php echo $id ?>' >Enviar</button>
</form>   
  <a href="inscribir_session.php"><button type="submit"class="btn btn-success"  name="finalizar" value='Eliminar'>Regresar</button></a>
</div>

<!-- /#wrapper -->

<?php
  require_once 'templates/footer.php';
?>
<?php
  require_once 'templates/head.php';
?>
<title>Reuniones</title>
<?php
  require_once 'templates/header.php';
  //require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';

  setlocale(LC_TIME, 'es_SV.UTF-8');
?>
<div class="container-fluid text-center">


<?php 
  //Extraemos el carnet del estudiante
  $stmt1 =$dbh->prepare("SELECT `ID_Alumno`, `SedeAsistencia`, `ID_Sede` FROM `alumnos` WHERE correo='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt1->execute();
  //id de la session
  $id = $_POST['inscribir'];
  //recorrer datos 
  while($fila = $stmt1->fetch()){
      $alumno=$fila["ID_Alumno"];
      $sedeA=$fila["SedeAsistencia"];
      $sedeB=$fila["ID_Sede"];
  }
      $date = date('n');
if($date == 1 or $date == 2  or $date == 3 or $date == 4 or $date == 5 or $date == 6){
	 $ciclo = "Ciclo 1";
}elseif($date == 7 or $date == 8 or $date == 9 or $date == 10 or $date == 11 or $date == 12){
	 $ciclo = "Ciclo 2";
}

if(isset($alumno)){
  $finalizar = $_POST['finalizar'];
  $telefono = $_POST['telefono'];
  $temas = $_POST['temas'];
   $sql = "UPDATE  `one_on_one` SET estado = 'Pendiente', cupo = 0, estado_alumno = 'Pendiente', id_alumno = :alumno, ciclo = :ciclo, ID_Sede = :ID_Sede, telefono = :telefono, temas = :temas WHERE id = :id and estado = 'Disponible' ";
    $query = $dbh->prepare($sql);
    $query->execute(array(":alumno"=>$alumno,":ciclo"=>$ciclo,":ID_Sede"=>$sedeB, ":telefono"=> $telefono,":temas"=> $temas, ":id"=>$finalizar));

$stmt2 =$dbh->prepare("SELECT `cupo` FROM `one_on_one` WHERE id= '$id'  ");
  $stmt2->execute();
 while($fila = $stmt2->fetch()){
      $cupo = $fila["cupo"];
  }
  // Ejecutamos
if ($cupo == 0 ){
	header("Location:inscribir_session.php");
	echo "<p class='text-danger text-center'>Error al inscribirse,el cupo ya esta lleno, porfavor seleccionar otro</p>";
}else
{
	echo "<p class='text-success'>Inscripción Guardada</p>";
}
}else{
		header("Location:inscribir_session.php");
	echo "<p class='text-danger'>Error de inscripción porfavor notificar el error, gracias<\p>";
}
?>
</div>
<!-- /#page-content-wrapper -->

</div>
</div>

</div>
<!-- /#wrapper -->
<script src="js/formulario2.js"></script>
<?php
  require_once 'templates/footer.php';
?>

