<?php

//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Cambiar Estado de la Beca</title>
<?php
 session_start();  
 $varsesion = $_SESSION['Email'];
 $varLugar = $_SESSION['Lugar'];
 
 error_reporting(0);
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
require_once '../Conexion/conexion.php';
require_once '../BaseDatos/conexion.php';

?>
<style type="text/css">
  #regiration_form fieldset:not(:first-of-type) {
    display: none;
  }
</style>
<link rel="stylesheet" type="text/css" href="css/Activar-Modulo.css">
<div class="title">
     <a href="javascript:history.back();" title=""><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Cambiar contraseña</h2>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
  <br>
  <?php
  $id = $_GET['id'];


$stmt2 =$pdo->prepare("SELECT Nombre,StatusActual,correo FROM alumnos WHERE correo = '$id' ");
$stmt2->execute();
while($row = $stmt2->fetch()){
    $NombreA = $row["Nombre"];
	$EstadoBeca = $row["StatusActual"];
	$CorreoA= $row["correo"];
}
  ?>
<div class="row">
<div class="col-xs-6 col-sm-7 col-md-7 col-lg-4 h-75" id="nota">
  <strong >NOTA: </strong><p>Por cuestiones de seguridad, se le pedirá su contraseña para confirmar el cambio.</p>
</div>
<div class="col-xs-4 col-sm-4 col-md-6 col-lg-7">
<div class="container">
<br>
<div class="progress">
<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<form id="regiration_form"   action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<fieldset>
<h2>Paso 1: Insertar cambios</h2> <br><br>
<div class="form-group">
<label for="exampleInputEmail1" class="text-dark float-left">Alumno seleccionado: <?php 
    echo utf8_encode($NombreA);?> </label>
    <br>
</div>
<b><label for="exampleInputEmail1" class="text-dark float-left">Estado Actual de la Beca: <?php 
    echo $EstadoBeca;?> </label></b>
    <br>
<br>
<label for="materialRegisterFormFirstName" class="text-dark">Cambiar Estado de la Beca</label>
                             <select id="idEstado" name="idEstado" class="form-control" required>
                                 <?php
                                   echo '<option value="0" disabled selected >Seleccione la opción</option>';
                                //    foreach($pdo->query("SELECT Nombre FROM  status ") as $row)
                                //    {
									
								// 	 echo '<option value="'.$row['Nombre'].'">'.utf8_encode($row['Nombre']).'</option>';
									 
								//    }
								echo '<option value="Becado con Credito Declinado">Becado con Credito Declinado</option>';
								echo '<option value="Beca Cancelada">Beca Cancelada</option>';
								echo '<option value="Beca Denegada">Beca Denegada</option>';
								echo '<option value="Becado">Becado</option>';
								echo '<option value="Cambio Tipo Carrera No Graduad">Cambio Tipo Carrera No Graduad</option>';
								echo '<option value="Cambio Tipo Carrera Grad">Cambio Tipo Carrera Grad</option>';
								echo '<option value="Crédito Educativo">Crédito Educativo</option>';
								echo '<option value="Declinado">Declinado</option>';
								echo '<option value="Declinado-apoyo extraordinario">Declinado-apoyo extraordinario</option>';
								echo '<option value="Egresado">Egresado</option>';
								echo '<option value="Graduado">Graduado</option>';
								echo '<option value="Pausa">Pausa</option>';

								  
								   echo '</select>';
 								  echo "<input type='hidden' name='correo' value='".$CorreoA."'>";
								  
							  ?>
                             </select>
<br>
<br>
<input type="button" name="data[password]" class="next btn btn-info" value="Siguiente" />
<a href="LIS-Alumnos.php"><input type="button" name="previous" class="previous btn btn-danger" value="Cancelar" /></a>
</fieldset>


<fieldset>
<h2> Paso 2: Verificación</h2>
<div class="form-group">
<br>
<br>
<label for="fName" class="float-left text-dark">Ingrese la contraseña de su usuario confirmar el cambio </label><br>
<input type="password" class="form-control" name="userpassword" id="fName" placeholder="user password" required>
</div>
<input type="button" name="previous" class="previous btn btn-info" value="Previo" />
<button type="submit" class="btn btn-success"  value= "<?php echo $id ?>" name='idsave' >Guardar cambios</button>
<a href="LIS-Alumnos.php"><input type="button" name="previous" class="previous btn btn-danger" value="Regresar" /></a>
</fieldset>

</form>
</div>
<br><br>
</div>
<br><br>
</div> <br>
<?php
$comparar = $_POST['idsave']; 
$dato2 = $_POST['idEstado'];
$dato3 = $_POST['userpassword'];
$correo =  $_SESSION['Email'];
$correoEstudiante = $_POST['correo'];

 $stmt = $dbh->query("SELECT * FROM usuarios WHERE correo = '$correo' ");
 while ($row = $stmt->fetch()) {
	  $passuser = $row['contrasena'];
 }
 

 if (isset($comparar)) {
	
		if (password_verify($dato3, $passuser)) {
    	try{
        $sql2 = "UPDATE alumnos SET StatusActual = ? WHERE correo =?";
        if($pdo->prepare($sql2)->execute([$dato2, $correoEstudiante])){ 
		
			echo'<script type="text/javascript">
			window.location.href="LIS-Alumnos.php";
			</script>';
			
		$_SESSION['message'] = "Beca modificada Correctamente";
        $_SESSION['message2'] = 'success';
		}
	}catch (PDOException $e) {
		echo'<script type="text/javascript">
			window.location.href="LIS-Alumnos.php";
			</script>';
        $_SESSION['message'] = 'Fallo al modificar la Beca';
        $_SESSION['message2'] = 'danger';
	  }
	}else{
		echo'<script type="text/javascript">
			window.location.href="LIS-Alumnos.php";
			</script>';
			$_SESSION['message'] = 'Contraseña incorrecta';
			$_SESSION['message2'] = 'danger';
		echo "<p class='p-1 mb-1 bg-danger text-white text-center'>Error, la contraseña de usuario en incorrecta.</p>";

	
   }
   
}
?>
<!-- validar script -->
<script>
$(document).ready(function() {
	//variables
	var pass1 = $('[name=pass1]');
	var pass2 = $('[name=pass2]');
	var confirmacion = "Las contraseñas si coinciden";
	var negacion = "No coinciden las contraseñas";
	var vacio = "La contraseña no puede estar vacía";
	//oculto por defecto el elemento span
	var span = $('<span></span>').insertAfter(pass2);
	span.hide();
	//función que comprueba las dos contraseñas
	function coincidePassword(){
	var valor1 = pass1.val();
	var valor2 = pass2.val();
	//muestro el span
	span.show().removeClass();
	//condiciones dentro de la función
	if(valor1 != valor2){
	span.text(negacion).addClass('negacion p-1 mb-1 bg-danger text-white');	
	}
	if(valor1.length==0 || valor1==""){
	span.text(vacio).addClass('negacion p-1 mb-1 bg-danger text-white ');	
	}
	if(valor1.length!=0 && valor1==valor2){
	span.text(confirmacion).removeClass("negacion").addClass('confirmacion p-1 mb-1 bg-success text-white');
	}
	}
	//ejecuto la función al soltar la tecla
	pass2.keyup(function(){
	coincidePassword();
	});
});
</script>
<!-- formulario script -->
<script>
$(document).ready(function(){
var current = 1,current_step,next_step,steps;
steps = $("fieldset").length;
$(".next").click(function(){
current_step = $(this).parent();
next_step = $(this).parent().next();
next_step.show();
current_step.hide();
setProgressBar(++current);
});
$(".previous").click(function(){
current_step = $(this).parent();
next_step = $(this).parent().prev();
next_step.show();
current_step.hide();
setProgressBar(--current);
});
setProgressBar(current);
// Change progress bar action
function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
.html(percent+"%");
}
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<br><br><br><br><br><br>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>


