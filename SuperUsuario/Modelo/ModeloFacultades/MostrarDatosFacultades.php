<?php
// Consulta De La BASE DE DATOS
$consulta=$pdo->prepare("SELECT * FROM facultades");
$consulta->execute();

if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch()) {

		echo "
		<tr class='table-light'>
		<th>".$fila['IDFacultates']."</th>
		<th>".utf8_encode($fila['Nombre'])."</th>
		<td><a href='Vistas/VistasFacultades/ActualizarFacultad.php?id=".urlencode($fila['IDFacultates'])."' class='fas fa-pencil-alt  btn btn-success'></a> </td>
		<td><a href='Vistas/VistasFacultades/EliminarFacultad.php?id=".$fila['IDFacultates']."' class='fas fa-trash  btn btn-danger'></a> </td>
		</tr>";
	}//fin de while
}// in del if


?>