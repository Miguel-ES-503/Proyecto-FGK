<?php
// Consulta De La BASE DE DATOS
$consulta=$pdo->prepare("SELECT * FROM empresas");
$consulta->execute();

if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch()) {

		echo "
		<tr class='table-light'>
		<th>".utf8_encode($fila['ID_Empresa'])."</th>
		<th>". utf8_encode($fila['Nombre']) ."</th>
		<th><b>".$fila['Tipo']."</b></th>
		<td><a href='Vistas/VistasEmpresas/ActualizarEmpresas.php?id=".urlencode($fila['ID_Empresa'])."' class='fas fa-pencil-alt btn btn-success'></a> </td>
		<td><a href='Vistas/VistasEmpresas/EliminarEmpresa.php?id=".urlencode($fila['ID_Empresa'])."' class='fas fa-trash  btn btn-danger'></a> </td>
		</tr>";
	}//fin de while
}// in del if


?>