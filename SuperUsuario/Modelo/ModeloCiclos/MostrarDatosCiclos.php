<?php

$consulta=$pdo->prepare("SELECT * FROM ciclos");
$consulta->execute();

if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch()) {

		echo "
		<tr class='table-light'>
		<th><b>".$fila['ID_Ciclo']."</b></th>
		<th>".$fila['Fechanicio']."</th>
		<th>".$fila['FechaFinal']."</th>
		<td><a href='Vistas/VistaCiclos/ActualizarCiclo.php?id=".$fila['ID_Ciclo']."' class='fas fa-pencil-alt  btn btn-success'></a> </td>
		
		</tr>";
	}//fin de while
}// in del if





?>