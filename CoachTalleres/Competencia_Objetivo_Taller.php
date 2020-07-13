<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>


<?php
	

if (isset($_GET['id'])) {

	$id=$_GET['id'];
//Total de larreles oportunidades
$consulta=$pdo->prepare("SELECT COUNT(ID_Taller) AS Total FROM objetivostaller WHERE ID_Taller = ?");
$consulta->execute(array($id));
$TotalObjetivo ='';

if ($consulta->rowCount() >=0) 
{
	$fila=$consulta->fetch();
	$TotalObjetivo = $fila['Total'];
}


$consulta2=$pdo->prepare("SELECT * FROM objetivostaller WHERE ID_Taller = ?");
$consulta2->execute(array($id));
$DetalleObjetivo ='';

if ($consulta2->rowCount() >=0) 
{
	$fila2=$consulta2->fetch();
	$DetalleObjetivo = $fila2['Objetivo'];
}


$consulta3=$pdo->prepare("SELECT IDTaller_Competencia , ID_Taller , COM.Nombre FROM tallercompetencia TC INNER JOIN competencias COM ON TC.IDComptenecia = COM.IDComptenecia WHERE ID_Taller = :ID_Taller ");
$consulta3->bindParam(":ID_Taller",$id);
$consulta3->execute();


  

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
		<a class="navbar-brand" href="#">Objetivo y Competencia</a>

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
				<a class="nav-link active" href='ListaTaller.php?id=<?php echo $id ?>' >Regresar</a>
			</li>
		</ul>
		<!-- Links -->   
	</div>
	<!-- Collapsible content -->
</nav>
<!--/.Navbar-->

<br>


<div class="float-right">
	<?php include 'Modularidad/Alerta.php'?>
</div>


<div class="card">
	<h5 class="card-header h5" style="color:black;">Detalles del taller
	</h5> 
	<div class="card-body">
	
		<?php if ($TotalObjetivo == 0) {
			echo "<form action='Modelo/ModeloObjetivo/GuardarObjetivo.php' method='POST'>";
		}
		else
		{
			echo "<form action='Modelo/ModeloObjetivo/ActualizarObjetivo.php' method='POST'>";	
		}
		?>
		<div class="form-group">
	<textarea class="form-control" name="comentario" id="exampleFormControlTextarea3" rows="7" placeholder="Escriba el objetivo del taller... 300 carácteres máximo" minlength="1" maxlength="300" required><?php echo $DetalleObjetivo; ?></textarea>
		</div>
		<input type="hidden" name="idTaller"  value="<?php echo $id ?>"> >
		<span class="float-right">
			<?php if ($TotalObjetivo == 0) {
				echo "<input type='submit' name='EnviarComenterio' class='btn btn-primary' value='Agregar Comentario'>";
			}
			else
			{
				echo "<input type='submit' name='EnviarComenterio' class='btn btn-primary' value='Actualizar Comentario'>";
			}
			?>				
		</form>
	</div>
</div>


<br><br>

<div class="card">
	<h5 class="card-header" style="color: black;">Competencia del taller

		<span class="float-right">	
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
				<i class="fas fa-clipboard-check"></i> Agregar
			</button>
		
		</span>
	</h5>	
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table  id="tableUser2" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="table-secondary">
					<tr>  
						<th scope="col">Competencia del Taller</th>
						<th scope="col">Eliminar</th>
						
					</tr>
				</thead>
				<tfoot class="table-secondary">
					<tr>
						<th scope="col">Competencia del Taller</th>
						<th scope="col">Eliminar</th>
					</tr>
				</tfoot>
				<tbody>
					

					<?php


					if ($consulta3->rowCount()>=1)
					{
						while ($fila3=$consulta3->fetch())
							{		echo "
						<tr class='table-light'>
						<th>".utf8_encode($fila3['Nombre'])."</th>
	<th><a href='Modelo/ModeloCompetencia/EliminarComptenciaPorTaller.php?id=".$fila3['IDTaller_Competencia']."&id2=".$fila3['ID_Taller']."' ' class='fas fa-trash  btn btn-danger'></a></th>
						</tr>";

					}
				}


				?>



				</tbody>        
			</table>  

		</div> <!--Fin de la caja responsivo de la tabla-->

	</div>
</div>
<br><br>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:black">Agregar Competencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="table-responsive">
      	<form action="Modelo/ModeloCompetencia/GuardarComptenciaPorTaller.php" method="POST">
      	<input type="hidden" name="idTaller2"  value="<?php echo $id ?>"> 
      	<table  class="table">
      		<thead class="thead-dark">
      			<tr>
      				<th>Seleccionar</th>
      				<th>Competencia</th>
      			</tr>
      		</thead>
      		<tbody>
      			<tr>
      			  <?php include 'Modelo/ModeloCompetencia/MostrarCompetencia.php'; ?>
      			</tr>

      		</tbody>
      	</table>
        </div>
      </div>
      <div class="modal-footer">
      	<input type="submit" name="EnviarDatos" value="Agregar" class="btn btn-primary">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

