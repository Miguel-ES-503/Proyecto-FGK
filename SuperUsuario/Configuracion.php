<?php include("../BaseDatos/conexion.php"); //Realizamos la conexi贸n con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Configuración</title>
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
	<div class="title">
     <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Configuración</h2>
	<div class="title2" style="background-color: #9d120e">
	<a class="nav-link active" href="#">Datos Personal</a>
</div>
	

</div>
	<div class="container py-4 my-2">
		<div class="float-right"><?php include "Modularidad/Alerta.php"; ?></div>

		<div class="row">
			<div class="col-md-4 pr-md-5" style="background-color: #ADADB2;
border-radius: 20px;
padding: 40px; text-align: center;">
				<img class="w-100 rounded border"  src="../img/imgUser/<?php echo $_SESSION['Foto']?>"  style="width: 25px; height: 300px;" />
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
