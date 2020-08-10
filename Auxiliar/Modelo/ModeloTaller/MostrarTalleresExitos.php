<?php

session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

$InicialDep = $varLugar [0]; // Extraemos la primera letra
$FinalDep = $varLugar [1]; // Extraemos la segunda letra

//Concatenamos
$FullTime = "FT";
$Sabatino = "SAT";

$LugarFT=$InicialDep . $FinalDep . $FullTime; //Ejemplo SSFT
$LugarSAT=$InicialDep . $FinalDep .$Sabatino; //Ejemplo SSSAT



$consulta=$pdo->prepare("SELECT  ID_Taller ,Titulo , Fecha , Hora, F.Nombre AS 'Tipo' ,ID_Sede , ID_Ciclo, E.Nombre AS Empresa ,Estado FROM talleres T INNER JOIN formatotalleres F on T.ID_Formato = F.ID_Formato LEFT JOIN empresas E on T.ID_Empresa = E.ID_Empresa WHERE ID_Sede =  ?  AND Estado = 'Finalizado' ");
$consulta->execute(array($LugarFT));


if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch())
		{		echo "
	<tr class='table-light'>
	<th>".$fila['ID_Taller']."</th>
	<th>".$fila['Titulo']."</th>
	<th>".$fila['Tipo']."</th>
	<th>".$fila['Fecha']."</th>
	<th>".$fila['ID_Ciclo']."</th>
	<th>".$fila['Empresa']."</th>
	<th>".$fila['Estado']."</th>
	<td><a href='DetallesTaller.php?id=".$fila['ID_Taller']."' class='fas fa-check  btn btn-success'></a> </td>
	</tr>";

}
}


?>