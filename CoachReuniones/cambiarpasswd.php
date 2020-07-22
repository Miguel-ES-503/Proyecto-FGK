<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Cambiar contraseña</title>
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
require_once '../Conexion/conexion.php';

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
  $id = $_POST['id'];
$stmt = $dbh->query("SELECT * FROM modulos WHERE id_modulo = '$id' ");
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

<form id="regiration_form"   action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset>
<h2>Paso 1: Insertar cambios</h2> <br><br>
<div class="form-group">
<label for="exampleInputEmail1" class="text-dark float-left">Módulo seleccionado: <?php while ($row = $stmt->fetch()) {
    echo utf8_encode($row['titulo']);
} ?> </label>
</div>
<br>
<div class="form-group">
    <label for="" class="text-dark float-left">Ingresar nueva contraseña:</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="pass1" aria-describedby="emailHelp" placeholder="password" required>
  
</div>
<div class="form-group">
<label for="" class="text-dark float-left">Confirmar nueva contraseña:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name = "pass2" placeholder="password" required>
</div>
<input type="button" name="data[password]" class="next btn btn-info" value="Siguiente" />
</fieldset>


<fieldset>
<h2> Paso 2: Verificación</h2>
<div class="form-group">
<label for="fName" class="float-left text-dark">Ingrese la contraseña de su usuario confirmar </label>
<input type="password" class="form-control" name="userpassword" id="fName" placeholder="user password" required>
</div>
<input type="button" name="previous" class="previous btn btn-info" value="Previo" />
<button type="submit" class="btn btn-success"  value= "<?php echo $id ?>" name='idsave' >Guardar cambios</button>
</fieldset>

</form>
</div>
<br><br>
</div>
<br><br>
</div> <br>
<?php
 $comparar = $_POST['idsave']; 
 $dato1 = $_POST['pass1'];
 $dato2 = $_POST['pass2'];
 $dato3 = $_POST['userpassword'];
$correo =  $_SESSION['Email'];

 $stmt = $dbh->query("SELECT * FROM usuarios WHERE correo = '$correo' ");
 while ($row = $stmt->fetch()) {
	  $passuser = $row['contrasena'];
 }

 if (isset($comparar)) {
	if ($dato1 == $dato2) {
		if (password_verify($dato3, $passuser)) {
    	try {
        $sql2 = "UPDATE modulos SET password = ? WHERE id_modulo =?";
		$dbh->prepare($sql2)->execute([$dato2, $comparar]);
		echo "<p class='p-1 mb-1 bg-success text-white text-center'>Contraseña actualizada.</p>";
        header("Location: activarmodulos.php");
   		} catch (PDOException $e) {
    		header("Location:activarmodulos.php");
          	echo $e->getMessage();
	  }
	}else{
		echo "<p class='p-1 mb-1 bg-danger text-white text-center'>Error, la contraseña de usuario en incorrecta.</p>";

	}
   }else{
       echo "<p class='p-1 mb-1 bg-danger text-white text-center'>Error, la contraseña no es igual a la confirmación </p>";
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

