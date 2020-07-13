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

$consulta=$pdo->prepare("SELECT `ID_HSociales`,ALU.Nombre , ALU.Class , ALU.ID_Sede , ALU.SedeAsistencia ,ALU.ID_Empresa , HS.`estado` , ID_Ciclo  FROM hsociales HS INNER JOIN alumnos ALU on HS.`ID_Alumno` = ALU.`ID_Alumno` WHERE HS.`estado` = 'Aprobado' OR HS.`estado` = 'Rechazado' AND ALU.SedeAsistencia = ? OR ALU.SedeAsistencia = ?");
$consulta->execute(array($LugarFT , $Sabatino ));

if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch()) {

		echo "
		<tr class='table-light'>
		<th>".$fila['ID_HSociales']."</th>
		<th>".$fila['Nombre']."</th>
		<th>".$fila['Class']."</th>
		<th>".$fila['ID_Sede']."</th>
		<th>".$fila['ID_Empresa']."</th>
		<th>".$fila['ID_Ciclo']."</th>
		<th>".$fila['estado']."</th>
		<td><a href='DetallesHorasSociales2.php?id=".$fila['ID_HSociales']."' class='btn btn-success'>Ver Detalles </a> </td>
		
		</tr>";
	}//fin de while
}// i



?>