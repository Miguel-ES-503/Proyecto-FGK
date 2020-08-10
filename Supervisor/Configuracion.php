<?php include("../BaseDatos/conexion.php"); //Realizamos la conexi贸n con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Configuración</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
    <!--Plugin para poner el nombre cuando se selecciona un archivo-->
    <script src="../js/inputfile.js" type="text/javascript"></script>	
    <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
	<br>
	<h1 style="text-align: left;">Configuración</h1><hr>

	<div class="container py-4 my-2">
		<br>
		<div class="float-right"><?php include "Modularidad/Alerta.php"; ?></div>

		<div class="row">
			<div class="col-md-4 pr-md-5">
				<img class="w-100 rounded border"  src="../img/imgUser/<?php echo $_SESSION['Foto']?>"  style="width: 25%; height: 60%;" />
				<div class="pt-4 mt-2">
					<section class="mb-4 pb-1">
						<form method="POST" action="Modelo/ModeloPassword/CambiarImg.php" enctype="multipart/form-data">
						<!--IMG A Subir -->
						<div class="custom-file">
							<div class="custom-file">
							<input type="file" name="imgusu" id="imgusu" class="custom-file-input" accept="image/*" />
							<label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Archivo</label>
							</div>
							<br><br>
							<input type="submit" name="SubirImg" id="SubirImg" class="btn btn-dark btn-block" value="Cambiar Foto" />
						</div>
						</form>
					</section>
				</div>
			</div>
			<div class="col-md-8">
				<div class="d-flex align-items-center">

					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Correo Electrónico</th>
								<th scope="col">Sede</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-light">
								<td colspan="" rowspan="" headers=""><?php echo $_SESSION['Email'] ?></td>
								<td colspan="" rowspan="" headers=""><?php echo $_SESSION['Lugar'] ?></td>

							</tr>
						</tbody>
					</table>
				</div>
        
				<div id="pass"></div>

				<!-- Default form subscription -->
				<form class="text-center border border-light p-5" action="Modelo/ModeloPassword/CambiarContra.php" method="POST">

					<p class="h4 mb-4">Cambiar Contraseña</p>

					<p class="text-ligth">Ingrese una nueva Contraseña para poder acceder a la plataforma</p>
					<!-- Name -->
					<input type="password" id="password" name="Contra1" class="form-control mb-4" placeholder="Nueva Contraseña" required >
					<!-- Email -->
					<input type="password" id="passwordVerifcado" name="ContraVerificado"  class="form-control mb-4" placeholder="Ingrese Nuevamente Contraseña" required >

					<!-- Sign in button -->

					<input type="submit" name="cambiarContra" id="Restablecer" class="btn btn-dark btn-block" value="Cambiar Contraseña" />

				</form>
				<!-- Default form subscription -->


			</div>
		</div>
	</div>
	<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>
