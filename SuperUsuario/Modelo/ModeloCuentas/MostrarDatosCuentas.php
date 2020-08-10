<?php

// Consulta base de datos 

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




$consulta=$pdo->prepare("SELECT * FROM usuarios WHERE `SedeAsistencia` = ? AND `ID_Sede`= ? AND (`cargo` = 'SuperUsuario' or `cargo` = 'Administrador' OR `cargo` = 'SuperVisor' OR `cargo` = 'Coach Fase 3' OR `cargo` = 'Coach Fase 2' OR `cargo` = 'Auxiliar')");
$consulta->execute(array($LugarFT , $LugarFT ));

if ($consulta->rowCount()>=1)
{

	while ($fila=$consulta->fetch())
		{	

			$Lugar = $fila['SedeAsistencia'];	
			$SEDECorres;

			if( $Lugar == "SSFT" ){
				$SEDECorres = "San Salvador";
			}else
			{
				$SEDECorres = "Santa Ana";
			}


			echo "
	<tr class='table-light'>
	<th>".utf8_encode($fila['nombre'])."</th>
	<th>".$fila['correo']."</th>
	<th>".$SEDECorres."</th>
	<th>".$fila['cargo']."</th>
	<td><a href='Vistas/VistasCuentas/ActualizarCuenta.php?id=".$fila['IDUsuario']."' class='fas fa-pencil-alt  btn btn-success'></a> </td>
	<td><a href='Vistas/VistasCuentas/EliminarCuenta.php?id=".$fila['IDUsuario']."' class='fas fa-trash  btn btn-danger'> </a> </td>
	</tr>";

}
}

?>