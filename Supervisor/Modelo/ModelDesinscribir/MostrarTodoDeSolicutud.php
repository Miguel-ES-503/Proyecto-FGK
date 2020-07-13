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


$consulta=$pdo->prepare("SELECT id_solicitud, a.Nombre nombreAlumno, a.Class AS clase, a.ID_Sede AS sede, a.ID_Empresa AS Universidad, sd.estado AS estadoSoli FROM solicituddesinscribir sd JOIN alumnos a on sd.id_alumno=a.ID_Alumno INNER JOIN talleres t ON sd.id_taller=t.ID_Taller WHERE sd.estado='Aprobado' OR sd.estado='Rechazado' AND a.SedeAsistencia= ?  OR a.SedeAsistencia= ? ");
$consulta->execute(array($LugarFT , $LugarSAT ));

if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch()) {

		echo "
		<tr class='table-light'>
		<th>".$fila['id_solicitud']."</th>
		<th>".$fila['nombreAlumno']."</th>
		<th>".$fila['clase']."</th>
		<th>".$fila['sede']."</th>
		<th>".$fila['Universidad']."</th>
		<th>".$fila['estadoSoli']."</th>
		<td><a href='DetallesDesincribirTaller2.php?id=".$fila['id_solicitud']."' class='btn btn-success'>Ver Detalles </a> </td>
		
		</tr>";
	}//fin de while
}// i



 ?>