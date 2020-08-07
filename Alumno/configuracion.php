<?php
  require_once 'templates/head.php';
?>
<title>Configuración</title>
<?php
  require_once 'templates/header.php';
  
  require_once 'templates/MenuHorizontal.php';
  require '../Conexion/conexion.php';

  foreach ($dbh->query("SELECT imagen FROM usuarios WHERE correo = '".$_SESSION['Email']."' ") as $Foto) {
  	$FotoAlumno = $Foto['imagen'];
  }

  ?>


<!--Comiezo de estructura de trabajo -->
<link rel="stylesheet" type="text/css" href="CSS/configuracion.css">
<div class="container-fluid text-center" >
    <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
	<div class="title">
    <a href="../Alumno/index.php"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Configuración</h2>
</div>
<div class="principal">
	<div class="container py-4 my-2">
		<br>
		<div>
		    <?php
		        include "config/Alerta.php";
		    ?>

		</div>

	
			<div class="col-md-4 pr-md-5">
				<div class="Info-1">
					<h3 class="title1">Foto de Perfil</h3>
					
				<img class="img" src="../img/imgUser/<?php echo $FotoAlumno?>">
				<div class="pt-4 mt-2">
					<section class="mb-4 pb-1">
						<form method="POST" action="config/CambiarImg.php" enctype="multipart/form-data">
						<!--IMG A Subir -->
						<div class="custom-file">
							<div class="custom-file">
							<input type="file" name="imgusu" id="imgusu" accept="image/*" />
							</div>
							<br><br>
							<input type="submit" name="SubirImg" id="file"  class="btn btn-dark btn-block" value="Cambiar foto" />
						</div>
						</form>
					</section>
				</div>
			</div>
			</div>
			<div class="parte2" style="position: absolute; bottom: 150px; right: 80px;" >
				<div class="d-flex align-items-center">
					<h3 class="subtitulo1">Datos de la cuenta</h3>
					<div class="table-Info">
						<div class="correo">
						<p class="correo-title">Correo Electrónico</p>
					</div>
					<div class="sede">
						<p class="sede-title">Sede</p>
					</div>
					</div>
				</div>

<div class="correo-info">
<p ><?php echo $_SESSION['Email'] ?></p>
</div>
<div class="sede-info">
<p><?php echo $_SESSION['Lugar'] ?></p>
</div>
							

        <div id="pass" class="alert alert-danger">
          Las contraseñas no coinciden.
        </div>
				<!-- Default form subscription -->
				<div class="change-pass">
				<form class="text-center border border-light p-5" action="config/CambiarContra.php" method="POST">

			<h3 class="change-pass-title1">Cambiar Contraseña</h3>
					<input type="password" id="password" name="Contra1" class="form-control mb-4" placeholder="Nueva Contraseña">
					<!-- Email -->
					<input type="password" id="passwordVerifcado" name="ContraVerificado"  class="form-control mb-4" placeholder="Confirmar Nueva Contraseña">

					<!-- Sign in button -->

					<input type="submit" name="cambiarContra" id="Restablecer" class="btn btn-dark btn-block" value="Guardar Cambios"/>

				</form>
			</div>
				<!-- Default form subscription -->


			</div>
		</div>
	</div>
	</div>
	<!-- /#page-content-wrapper -->
<br>
</div>

</div>

</div>

<!-- /#wrapper -->


<?php

  require_once 'templates/footer.php';

?>
