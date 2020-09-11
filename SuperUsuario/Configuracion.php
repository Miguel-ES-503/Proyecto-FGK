<?php include("../BaseDatos/conexion.php"); //Realizamos la conexi贸n con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Configuración</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/configuracion.css">
<style>

.topnav {
  overflow: hidden;
  background-color: #ADADB2;
  max-width: 100%;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  border-width: 3px;
  font-weight: bold;

 
}
.submenu1{
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
  background-color: #9d120e;
  border-width: 3px;
  font-weight: bold;
  height: 68px;
  letter-spacing: 2px;



}
.icon{
  

}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon1 {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon1 {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
    font-size: 15px;
    height: 50px;
  }
  .titulomenu a{
    font-size: 15px;
  }
  #cuadro{
	min-width: 90px;
	min-height: 400px;
}
img > #foto{
	width: 50px;
	height: 250px;
}

}
</style>
<link rel="stylesheet" type="text/css" href="css/configuracion.css">
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
    <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>

  <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<div class="topnav" id="myTopnav">
  <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Configuración</a>
  <a href="" class="submenu1">Datos Personales</a>
  
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

	
	<div class="container py-4 my-2">
		<div class="float-right"><?php include "Modularidad/Alerta.php"; ?></div>

		<div class="row">
			<div class="col-md-4 pr-md-5" id="cuadro" style="background-color: #ADADB2;
border-radius: 20px;
padding: 40px; text-align: center;">
				<img class="w-100 rounded border" id="foto" src="../img/imgUser/<?php echo $_SESSION['Foto']?>" style="width: 10px; 
	height: 300px;"   />
				<div class="pt-4 mt-2" >
					<section class="mb-4 pb-1" >
						<form method="POST" action="Modelo/ModeloPassword/CambiarImg.php" enctype="multipart/form-data">
						<!--IMG A Subir -->
						<div class="custom-file">
							<div class="custom-file">
							<input type="file" name="imgusu" id="imgusu" class="custom-file-input" accept="image/*" class="file" required />
							<label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Archivo</label>
							</div>
							<br><br>
							<center><button name="SubirImg" id="SubirImg" class="btn btn-dark btn-block" value="Cambiar Foto" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">Cambiar foto</button></center>

						</div>
						</form>
					</section>
				</div>
			</div>
			<div class="col-md-8">
				<p class="h4 mb-4"> Datos de la cuenta</p>
				<div class="d-flex align-items-center">

					<table class="table" id="configuracion" style="border-radius: 20px; background-color: #ADADB2; border:none; ">
						<thead class="thead-light">
							<tr>
								<th style="background-color:#ADADB2;border-radius: 15px;color: black;font-size: 15px;font-weight: bold;" scope="col">Correo Electrónico</th>
								<th style="background-color:#ADADB2; border-radius: 15px;color: black; font-size: 15px;font-weight: bold;" scope="col">Sede</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-light" style="color: black">
								<td colspan="" rowspan="" headers=""><?php echo $_SESSION['Email'] ?></td>
								<td colspan="" rowspan="" headers=""><?php echo $_SESSION['Lugar'] ?></td>

							</tr>
						</tbody>
					</table>
				</div>
        
				<div id="pass"></div>

				<!-- Default form subscription -->
				<form class="text-center" action="Modelo/ModeloPassword/CambiarContra.php" method="POST" style="background:white; padding: 30px;" >

					<p class="h4 mb-4">Cambiar Contraseña</p>

					<p class="text-ligth">Ingrese una nueva Contraseña para poder acceder a la plataforma</p>
					<!-- Name -->
					<input type="password" id="password" name="Contra1" class="form-control mb-4" placeholder="Nueva Contraseña" required >
					<!-- Email -->
					<input type="password" id="passwordVerifcado" name="ContraVerificado"  class="form-control mb-4" placeholder="Ingrese Nuevamente Contraseña" required >

					<!-- Sign in button -->

					<center><button name="cambiarContra" id="Restablecer" class="btn btn-light btn-block" value="Cambiar Contraseña" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white; ">Cambiar Contraseña</button></center>

				</form>
				<!-- Default form subscription -->


			</div>
		</div>
	</div>
	<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>
