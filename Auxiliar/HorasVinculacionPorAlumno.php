<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php 

if ($_GET['id']) {
  
  $id=$_GET['id'];

$consulta=$pdo->prepare("SELECT `ID_HSociales`,ALU.ID_Alumno ,ALU.Nombre , ALU.Class , ALU.ID_Sede ,ALU.ID_Empresa , HS.`estado` FROM hsociales HS INNER JOIN alumnos ALU on HS.`ID_Alumno` = ALU.`ID_Alumno` WHERE HS.`estado` = 'En espera' AND ALU.ID_Alumno = ? ");
$consulta->execute(array($id));


$consulta2=$pdo->prepare("SELECT  correo FROM `alumnos` where  ID_Alumno = ? ");
$consulta2->execute(array($id));

$idcorreo;
  while ($fila2=$consulta2->fetch()) 
  {
    $idcorreo = $fila2['correo'];
  }


}
else
{
  echo "Datos no llegando";
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
				<a class="nav-link active" href="AlumnoInicio.php?id=<?php echo$idcorreo ?>" >Regresar</a>
			</li>
		</ul>
		<!-- Links -->   
	</div>
	<!-- Collapsible content -->
</nav>
<!--/.Navbar-->



<br>

<div class="card">
  <div class="card-header">
    <b>Solicitudes</b>
   
  </div>
  <div class="card-body">
  	<div class="table-responsive">
  		<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed " >
  			<thead class="table-secondary">
  				<tr>  
  					<th scope="col">ID Solicitud</th>
  					<th scope="col">Alumno</th>
  					<th scope="col">Class</th>
  					<th scope="col">Sede</th>
  					<th scope="col">Universidad</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Ver</th>
  				</tr>
  			</thead>
  			<tfoot class="table-secondary">
  				<tr>
  				<th scope="col">ID Solicitud</th>
  					<th scope="col">Alumno</th>
  					<th scope="col">Class</th>
  					<th scope="col">Sede</th>
  					<th scope="col">Universidad</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Ver</th>
  				</tr>
  			</tfoot>

  			<tbody>
       
       <?php  

       if ($consulta->rowCount()>=1)
       {
        while ($fila=$consulta->fetch()) {

          echo "
          <tr class='table-light'>
          <th>".$fila['ID_HSociales']."</th>
          <th>".$fila['Nombre']."</th>
          <th>".$fila['Class']."</th>
          <th>".$fila['ID_Sede']."</th>
          <th>".$fila['ID_Empresa']."</th>
          <th>".$fila['estado']."</th>
          <td><a href='HorasSocialesAlumno.php?id=".$fila['ID_HSociales']."' class='btn btn-success'>Ver Detalles </a> </td>

          </tr>";
  }//fin de while
}// i

       ?>


			</tbody>        
		</table>  

	</div> <!--Fin de la caja responsivo de la tabla-->
  </div>
</div>









<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

