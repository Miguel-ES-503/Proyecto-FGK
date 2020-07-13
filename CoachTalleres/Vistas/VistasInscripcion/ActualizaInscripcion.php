<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM inscripcion WHERE IDinscripcion = :IDinscripcion");
	$consulta->bindParam(":IDinscripcion",$id);
	$consulta->execute();


	$idInscripcion = '';
	$sede = '';
	$Fecha = '';
	$Hora = '';
	$Estado = '';

	if ($consulta->rowCount() >=0)
	{
		$fila=$consulta->fetch();

		$idInscripcion = $fila['IDinscripcion'];
		$sede = $fila['ID_Sede'];
		$Fecha = $fila['Fecha'];
		$Hora = $fila['Hora'];
		$Estado = $fila['estado'];
		
	}


}// Fin del consulta del if   
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualizar Inscripcion | FGK</title>
	<link rel="stylesheet" href="../css/master.css">
	<link rel="shortcut icon" href="../img/WorkeysIcon.png" />
	<link rel="stylesheet" type="text/css" href="../../css/EstiloCrearCuentas.css">
	<link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!--Estilo css CrearCuentas-->
	<link rel="stylesheet" type="text/css" href="css/EstiloCrearCuentas.css">
</head>

<body class="container">


	<!-- Comienzo del MODAL DEL FORMULARIO -->

	<!-- Modal -->
	<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-right: 16px;" aria-modal="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Actualizar Inscripción</h5>
				</div>
			 <div class="modal-body">
        


        <form action="../../Modelo/ModeloInscripcion/ActualizarInscripcion.php" method="POST">
          <div class="form-group"  >
          	<input type="hidden" name="idInscripcion" value="<?php echo  $idInscripcion ?>" placeholder="">

            <div class="col">
              <div class="md-form">
                <input type="date" class="form-control" id="Fecha"  name="Fecha" placeholder="Ingrese la fecha de inscripción" value="<?php echo  $Fecha ?>">    
                <label for="materialRegisterFormFirstName" style="color: black">Fecha de inscripción</label>
              </div>

                 <div class="md-form">
                <input type="time" class="form-control" id="Hora" name="Hora"  placeholder="Ingrese la hora correspodiente" value="<?php echo  $Hora ?>">    
                <label for="materialRegisterFormFirstName" style="color: black">Hora de inscripción</label>
              </div>

                  <div class="md-form">
                <select type="text" id="estado" name="estado" class="form-control">
                  <option value="<?php echo  $Estado ?>"><?php echo  $Estado ?> </option>
                  <option value="Activo" >Activo</option>
                  <option value="Desactivado" >Desactivado</option>
                </select>
                <label for="materialRegisterFormFirstName" style="color: black">Estado</label>
              </div>


            </div>
            
            

          </div>
        

          <input type="submit" name="Inscripcion" value="Actualizar" class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0">
        </form>

      </div>
      <div class="modal-footer">
       <a href="../../SIT-ProcesoInscripcion.php">Regresar</a>

      </div>
            
				
				</div>
			</div>
		</div>
	</div>



</body>
</html>