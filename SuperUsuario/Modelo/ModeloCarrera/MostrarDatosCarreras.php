<?php
// Consulta De La BASE DE DATOS
$consulta=$pdo->prepare("SELECT c.Id_Carrera, c.nombre, c.Duracion ,f.Nombre AS 'Facultad' From carrera c inner JOIN facultades f on c.ID_Facultades=f.IDFacultates" );
$consulta->execute();



if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch()) {

		echo "
		<tr class='table-light'>
		<th>".$fila['Id_Carrera']."</th>
		<th>".utf8_encode($fila['nombre'])."</th>
		<th>".utf8_encode($fila['Duracion'])."</th>
		<th><b>".utf8_encode($fila['Facultad'])."</b></th>
		<td><a href='Vistas/VistasCarreras/VistasActualizar.php?id=".urlencode($fila['Id_Carrera'])."' class='fas fa-pencil-alt  btn btn-success'></a> </td>
		<td><a href='Vistas/VistasCarreras/EliminarCarrera.php?id=".urlencode($fila['Id_Carrera'])."' class='fas fa-trash  btn btn-danger'></a> </td>
		</tr>";
	}//fin de while
}// in del if


?>