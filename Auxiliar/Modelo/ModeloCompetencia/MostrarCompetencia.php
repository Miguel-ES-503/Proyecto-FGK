<?php 

	
	// Consulta De La BASE DE DATOS
$consulta=$pdo->prepare("SELECT * FROM competencias");
$consulta->execute();

if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch()) {

		echo "
		<tr class='table-light'>
		<td><input type='checkbox' name='Competencia[]' value=".$fila['IDComptenecia']."></td>
		<th>".utf8_encode($fila['Nombre'])."</th>
		</tr>";
	}//fin de while
}// in del if

 ?>