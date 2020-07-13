<?php 


$consulta=$pdo->prepare("SELECT * FROM competencias");
$consulta->execute();

if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch()) {

		echo "
		<tr class='table-light'>
		<th>".$fila['IDComptenecia']."</th>
		<th>".$fila['Nombre']."</th>
		<th><a href='Vistas/VistaCompetencia/ActualizarComptencia.php?id=".$fila['IDComptenecia']."' class='fas fa-pencil-alt  btn btn-success'></a></th>
		<th><a href='Vistas/VistaCompetencia/EliminarComptencia.php?id=".$fila['IDComptenecia']."' class='fas fa-trash  btn btn-danger'></a></th>
		</tr>";
	}//fin de while
}// in del if



 ?>

 