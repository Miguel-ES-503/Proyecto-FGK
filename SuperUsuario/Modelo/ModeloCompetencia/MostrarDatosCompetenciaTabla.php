<?php 


$consulta=$pdo->prepare("SELECT * FROM competencias");
$consulta->execute();

if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch()) {

		echo "
		<tr class='table-light'>
		<th>".utf8_encode($fila['IDComptenecia'])."</th>
		<th>".utf8_encode($fila['Nombre'])."</th>
		<th><a href='Vistas/VistaCompetencia/ActualizarComptencia.php?id=".urlencode($fila['IDComptenecia'])."' class='fas fa-pencil-alt  btn btn-success'></a></th>
		<th><a href='Vistas/VistaCompetencia/EliminarComptencia.php?id=".urlencode($fila['IDComptenecia'])."' class='fas fa-trash  btn btn-danger'></a></th>
		</tr>";
	}//fin de while
}// in del if



 ?>

 