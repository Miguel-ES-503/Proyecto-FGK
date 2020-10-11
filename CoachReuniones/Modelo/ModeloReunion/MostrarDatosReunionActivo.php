<?php

session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

$InicialDep = $varLugar [0]; // Extraemos la primera letra
$FinalDep = $varLugar [1]; // Extraemos la segunda letra
$FullTime = "FT";
$LugarFT=$InicialDep . $FinalDep . $FullTime; //Ejemplo SSFT


$consulta=$pdo->prepare("SELECT `ID_Reunion` , `Titulo` , `Fecha` , `ID_Ciclo`, `Estado` , `ID_Sede` , `Lugar` FROM reuniones r  WHERE `Estado` = 'Activo' AND`ID_Sede` = ?  ");
$consulta->execute(array($LugarFT));


if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch())
		{		echo "
	<tr class='table-light'>
	<th scope='row'>".$fila['ID_Reunion']."</th>
	<th>".$fila['Titulo']."</th>
	<th>".$fila['Fecha']."</th>
	<th>".$fila['Lugar']."</th>
	<th>".$fila['ID_Ciclo']."</th>
	<th>".$fila['Estado']."</th>
	<td><a href='Vistas/VistaReunion/ActualizarReunion.php?id=".$fila['ID_Reunion']."' class='fas fa-pencil-alt  btn btn-success'></a> </td>
	<td><a href='ListaReunion.php?id=".$fila['ID_Reunion']."' class='fas fa-archive  btn btn-success'></a> </td>
	</tr>";

}
}


?>