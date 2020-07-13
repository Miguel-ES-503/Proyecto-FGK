<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>


<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php 

if (isset($_GET['id'])) {
  
  $id=$_GET['id'];

    // Consulta para extrear la informacion del alumno
  $consulta=$pdo->prepare("SELECT `ID_HSociales`, ALU.ID_Alumno ,ALU.Nombre , ALU.ID_Sede, ALU.Class , ALU.ID_Empresa , HS.CantidadH , HS.FechaInicio, HS.FechaFinal , HS.Encargado ,HS.Descripcion, HS.Comprobante , HS.ID_Ciclo , HS.`estado` ,HS.comentario FROM hsociales HS INNER JOIN alumnos ALU on HS.`ID_Alumno` = ALU.`ID_Alumno` WHERE HS.`ID_HSociales` = :ID_HSociales  ");
  $consulta->bindParam(":ID_HSociales",$id);
  $consulta->execute();
  
  $IDAlumno;
  $Alumno;
  $Sede;
  $Class;
  $Universidad;
  $NombreProyecto;
  $Encargado;
  $FechaInico;
  $FechaFianl;
  $Cantidad;
  $ciclo;
  $Estado;
  $Comentario;

      
  if ($consulta->rowCount() >=0)
  {
    $fila=$consulta->fetch();
    $IDAlumno = $fila['ID_Alumno'];
    $Alumno = $fila['Nombre'];
    $Sede = $fila['ID_Sede'];
    $Class = $fila['Class'];
    $Universidad = $fila['ID_Empresa'];
    $NombreProyecto = $fila['Descripcion'];
    $Encargado = $fila['Encargado'];
    $FechaInico = $fila['FechaInicio'];
    $FechaFianl = $fila['FechaFinal'];
    $Cantidad = $fila['CantidadH'];
    $ciclo = $fila['ID_Ciclo'];
    $Estado = $fila['estado'];
    $comentario = $fila['comentario'];
  
  }

}

 ?>
<title>Lista de reuniones</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<br>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">

	<!--Navbar-->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Horas Sociales</a>

		<!-- Collapse button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
		aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- Collapsible content -->
	<div class="collapse navbar-collapse" id="basicExampleNav">

		<!-- Links -->
		<ul class="navbar-nav mr-auto">
			
			<li class="nav-item">
				<a class="nav-link active" href="HorasVinculacionPorAlumno.php?id=<?php echo$IDAlumno ?>">Regresar </a>
			</li>
		</ul>
		<!-- Links -->   
	</div>
	<!-- Collapsible content -->
</nav>
<!--/.Navbar-->
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>

<br>


<div class="text-justify border border-light p-5">
 

  <div class="card text-center">
    <div class="card-header">
    <h5 style="color: black;">Detalles de proyecto</h5>
    </div>
    <div class="card-body">



  <div class="row">
  <div class="col-sm-6 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
    
        <p class="mb-4"><b>Alumno: </b><?php echo$Alumno?><br><b>Sede:  </b><?php echo  $Sede ?> -- <b>Class: </b> <?php echo $Class ?> <br> <b>Universidad: </b> <?php echo $Universidad ?> -- <b>Ciclo:</b> <?php echo $ciclo ?></p>
        <hr>

        <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <input type="text"  value="<?php echo $id ?>" disabled  class="form-control"  >
              <label for="materialRegisterFormFirstName">Identificación</label>
            </div>
          </div>


          <div class="col">
            <!-- Last name -->
            <div class="md-form">
              <input type="text"  value="<?php echo $Encargado ?>" disabled  class="form-control"  >
              <label for="materialRegisterFormLastName">Cargo</label>
            </div>
          </div>
        </div>


        <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <input type="text"  value="<?php echo $FechaInico ?>" disabled  class="form-control"  >
              <label for="materialRegisterFormFirstName">Fecha de inicio</label>
            </div>
          </div>


          <div class="col">
            <!-- Last name -->
            <div class="md-form">
              <input type="text"  value="<?php echo $FechaFianl ?>" disabled  class="form-control"  >
              <label for="materialRegisterFormLastName">Fecha de Finalización</label>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" disabled><?php echo$NombreProyecto?></textarea>
              <label for="materialRegisterFormFirstName">Comentario</label>
            </div>
          </div>

        </div>

     
     <br>
      <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              <a href=""  class='btn btn-success px-3 far fa-file-alt'> </a><br>
              <label for="materialRegisterFormFirstName">comprobante</label>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <p class="mb-4"><b>Estado: </b> <?php echo $Estado?></p>

        <br>
        <p class="card-text"><b>Comentario:</b></p>
        <form action="Modelo/ModeloHorasSociales/VerficarSolicuitud.php" method="POST">
          <input type="hidden" name="id" value="<?php  echo $id ?>" >
          <div class="form-group">
       <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" minlength="1" maxlength="300" name="comentario" placeholder="comentario maximo 300 palabras..." required></textarea>
        </div>
        <br>
        <select name="estado"  class="form-control" required >
          <option value="" disabled="" selected >Seleccione una opción</option>
          <option value="Aprobado">Aprobado</option>
          <option value="Rechazado">Rechazado</option>
        </select>
        <br><br>
        <input type="submit" name="EnviarDato" value="Enviar" class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0 ">
      </form>
      <br><br>
    </div>
  </div>
</div>
</div>


    </div>
    <div class="card-footer text-muted">
      Solicitud
    </div>
  </div>





  
</div>

<br>






<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

