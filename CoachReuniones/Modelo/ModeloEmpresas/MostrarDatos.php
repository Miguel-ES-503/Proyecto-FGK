<?php
// Consulta De La BASE DE DATOS
$consulta=$pdo->prepare("SELECT * FROM empresas");
$consulta->execute();

if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch()) {

		echo "
		<tr class='table-light'>
		<th>".$fila['ID_Empresa']."</th>
		<th>".$fila['Nombre']."</th>
		<th>".$fila['Tipo']."</th>
		<td><a href='Vistas/VistasEmpresas/ActualizarEmpresas.php?id=".$fila['ID_Empresa']."' class='fas fa-pencil-alt btn btn-success'></a> </td>
		<td><a href='Vistas/VistasEmpresas/EliminarEmpresa.php?id=".$fila['ID_Empresa']."' class='fas fa-trash  btn btn-danger'></a> </td>
		</tr>";
	}//fin de while
}// in del if


?>