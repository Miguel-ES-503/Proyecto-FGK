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


$consulta=$pdo->prepare("SELECT `id_solicitud` , Alu.Nombre ,Alu.Class , Alu.ID_Sede , Alu.ID_Empresa , Alu.SedeAsistencia , `Comentario` , `Comprobante` ,SC.Estado FROM solicitudcambio SC INNER JOIN status ST ON SC.`id_status` = ST.`id_status` LEFT JOIN alumnos Alu on SC.`id_alumno` = Alu.`id_alumno` WHERE SC.Estado = 'Aprobado' or SC.Estado ='Rechazado' and Alu.SedeAsistencia = ? or Alu.SedeAsistencia = ? ");
$consulta->execute(array($LugarFT , $Sabatino ));


if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch()) {

		echo "
		<tr class='table-light'>
		<th>".$fila['id_solicitud']."</th>
		<th>".$fila['Nombre']."</th>
		<th>".$fila['Class']."</th>
		<th>".$fila['ID_Sede']."</th>
		<th>".$fila['ID_Empresa']."</th>
		<th>".$fila['Estado']."</th>
		<td><a href='DetallesSolicitudCampoLaboral2.php?id=".$fila['id_solicitud']."' class='btn btn-success'>Ver Detalles </a> </td>
		
		</tr>";
	}//fin de while
}// i



 ?>