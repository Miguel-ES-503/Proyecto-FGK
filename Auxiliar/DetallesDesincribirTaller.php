<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>


<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php 

if (isset($_GET['id'])) {
  
  $id=$_GET['id'];
  $idNotificacion = $_GET['idNotif'];

    // Consulta para extrear la informacion del alumno
  $consulta=$pdo->prepare("SELECT `id_solicitud`, a.Nombre , a.ID_Alumno ,a.correo , a.Class , a.ID_Sede, a.ID_Empresa ,T.Titulo , T.ID_Taller ,`comentario` , `comprobante`, SI.`estado` , SI.Comentario2 FROM solicituddesinscribir SI INNER JOIN alumnos a on SI.`id_alumno` = a.`id_alumno` LEFT JOIN talleres T on SI.`id_taller` = T.`id_taller` WHERE SI.`id_solicitud` = :id_solicitud ");
  $consulta->bindParam(":id_solicitud",$id);
  $consulta->execute();

 $IDAlumno;
 $IDTaller;
 $Nombre;
 $Sede;
 $Universidad;
 $class;
 $Titulo;
 $Comprobante;
 $Comentario;
 $Estado;
 $Comentario2;
 $correo;

  if ($consulta->rowCount() >=0)
  {
    $fila=$consulta->fetch();
    $IDAlumno = $fila['ID_Alumno'];
    $IDTaller = $fila['ID_Taller'];
    $Nombre = $fila['Nombre'];
    $Sede = $fila['ID_Sede'];
    $Universidad = $fila['ID_Empresa'];
    $class = $fila['Class'];
    $Titulo = $fila['Titulo'];
    $ciclo = $fila['ID_Ciclo'];
    $Comprobante = $fila['comprobante'];
    $Comentario = $fila['comentario'];
    $Estado = $fila['estado'];
    $Comentario2 = $fila['Comentario2'];
    $correo = $fila['correo'];
  
  }

}

 ?>
<title>Permiso taller</title>

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
		<a class="navbar-brand" href="#">Solicitud</a>

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
				<a class="nav-link active" href="PermisosDesincribirTaller.php">Regresar</a>
			</li>
		</ul>
		<!-- Links -->   
	</div>
	<!-- Collapsible content -->
</nav>
<!--/.Navbar-->
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<div class="float-right"><?php include 'Modularidad/AlertaCorreo.php'?></div>

<br>

<div class="text-justify border border-light p-5">
 

  <div class="card text-center">
    <div class="card-header">
    <h5 style="color: black;">Detalles de solicitud</h5>
    </div>
    <div class="card-body">



  <div class="row">
  <div class="col-sm-6 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
    
        <p class="mb-4"><b>Alumno: </b><?php echo$Nombre?><br><b>Sede:  </b><?php echo  $Sede ?> -- <b>Class: </b> <?php echo $class ?> <br> <b>Universidad: </b> <?php echo $Universidad ?>  </p>

        <hr>

        <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
              
               <input type="text"  class="form-control"  value="<?php echo $Titulo ?>" disabled >
              <label for="materialRegisterFormFirstName">Taller Asistir</label>
            </div>
          </div>

        </div>

        <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
             <textarea class="form-control" id="exampleFormControlTextarea3"  rows="3" disabled ><?php echo$Comentario?>
           </textarea>

           <label for="materialRegisterFormFirstName">Comentario</label>
         </div>
       </div>

     </div>
     <br>
      <div class="form-row">
          <div class="col">
            <!-- First name   Tema , fecha , la hora y el tipo de taller -->
            <div class="md-form">
                <?php 
                if ($Comprobante == null) {
                 echo " <a href='#' class='btn btn-success px-3 far fas fa-times'> </a><br>";
                }else
                {
                  echo " <a href='../ComproDesinscribir/$Comprobante' class='btn btn-success px-3 far fa-file-alt'> </a><br>";
                }
              ?>
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

        
        <p class="card-text"><b>Comentario:</b></p>
        <form action="Modelo/ModelDesinscribir/VerificarSolicutud.php" method="POST">
          <input type="hidden" name="id" value="<?php  echo $id; ?>" >
          <input type="hidden" name="idAlumno" value="<?php echo $IDAlumno; ?>">
          <input type="hidden" name="idTaller" value="<?php echo $IDTaller ?>">
           <input type="hidden" name="idnotificion" value="<?php echo$idNotificacion ?>">
           <input type="hidden" name="correo" value="<?php echo$correo ?>">
           <input type="hidden" name="nombreAlu" value="<?php echo$Nombre ?>" >
          <div class="form-group">
       <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" minlength="1" maxlength="300" name="comentario" placeholder="comentario maximo 300 palabras..." required><?php echo$Comentario2;?></textarea>
        </div>
        <select name="estado"  class="form-control" required >
          <option value="" disabled="" selected >Seleccione una opción</option>
          <option value="Aprobado">Aprobado</option>
          <option value="Rechazado">Rechazado</option>
        </select>
        <br>

        <?php if($Estado == "Aprobado"  || $Estado == "Rechazado" )
        {
          echo ' <input type="button" name="EnviarDato" value="Enviar" class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0  disabled">';
        }
        else
        {
         echo '<input type="submit" name="EnviarDato" value="Enviar" class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0 ">';
       } 
       ?>
       
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

