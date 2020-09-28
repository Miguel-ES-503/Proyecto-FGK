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

<style>
.table-Info{

	position: relative;
right: 40px;
}

</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!--Comiezo de estructura de trabajo -->
<link rel="stylesheet" type="text/css" href="css/configuraciones.css">
<div class="container-fluid text-center" >
    <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
	<div class="title">
	<a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Configuración</h2>
</div>

	<div class="container ">
		<br>
		<div class="float-right"><?php include "Modularidad/Alerta.php"; ?></div>

	<div class="row">
			<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 pr-md-5">
				<div class="Info-1">
					<h3 class="title1">Foto de Perfil</h3>
					
				<img class="img" src="../img/imgUser/<?php echo $_SESSION['Foto']?>">
				<div class="pt-4 mt-2">
					<section class="mb-4 pb-1">
						<form method="POST" action="Modelo/ModeloPassword/CambiarImg.php" enctype="multipart/form-data">
						<!--IMG A Subir -->
						<div class="custom-file">
							<div class="custom-file">
							<input type="file" name="imgusu" class="addimg" id="imgusu" accept="image/*" />
							</div>
							<br><br>
							<input type="submit" name="SubirImg" id="file"  class="btn btn-dark btn-block" value="Cambiar foto" />
						</div>
						</form>
					</section>
				</div>
			</div>
			</div>
			<div class="parte2 col-md-6 col-lg-6 col-xs-12 col-sm-12" style=" " >
			<h3 class="subtitulo1">Datos de la cuenta</h3>
				<div class="d-flex ">
					
					<div class="table-Info">
						<div class="correo">
						<p class="correo-title" style="color: black;font-weight: bold;">Correo Electrónico</p>
					</div>
					<div class="sede">
						<p class="sede-title" style="color: black;font-weight: bold;">Sede</p>
					</div>
					</div>
				</div>


<!--<div class="correo-info">
<p style="color: black;font-weight: bold"><?php echo $_SESSION['Email'] ?></p>
</div>
<div class="sede-info">
<p style="color: black;font-weight: bold;"><?php echo $_SESSION['Lugar'] ?></p>
</div>-->

					
					<div class="table-Info" style="margin-top: 0px;background-color: white;">
						<div class="correo">
						<p class="correo-title" style="color: black;font-weight: bold;"><?php echo $_SESSION['Email'] ?></p>
					</div>
					<div class="sede">
						<p class="sede-title" style="color: black;font-weight: bold;margin-left: -30px;"><?php echo $_SESSION['Lugar'] ?></p>
					</div>
					</div>

							

        <!--<div id="pass" class="alert alert-danger">
          Las contraseñas no coinciden.
        </div>-->
				<!-- Default form subscription -->
				<div class="change-pass">
				<form class="text-center border border-light p-5" action="Modelo/ModeloPassword/CambiarContra.php" method="POST">

			<h3 class="change-pass-title1" style="position: relative; left: 90px;">Cambiar Contraseña</h3>
					<input type="password" id="password" name="Contra1" class="form-control mb-4" placeholder="Nueva Contraseña">
					<!-- Email -->
					<input type="password" id="passwordVerifcado" name="ContraVerificado"  class="form-control mb-4" placeholder="Confirmar Nueva Contraseña">

					<!-- Sign in button -->

					<input type="submit" style="position: relative; right: 90px;" name="cambiarContra" id="Restablecer" class="btn btn-dark btn-block" value="Guardar Cambios"/>

				</form>
			</div>
				<!-- Default form subscription -->

				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- /#page-content-wrapper -->

</div>

</div>

</div>

<!-- /#wrapper -->


<?php

  require_once 'templates/footer.php';

?>
