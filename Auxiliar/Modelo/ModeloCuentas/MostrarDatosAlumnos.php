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




$consulta=$pdo->prepare("SELECT * FROM usuarios WHERE SedeAsistencia = ? AND cargo = 'Estudiante'");
$consulta->execute(array($LugarFT));

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

			$Lugar2 = $fila['ID_Sede'];	
			$SEDECorres2;

			if( $Lugar2 == "SSFT" ){
				$SEDECorres2 = "San Salvador";
			}else
			{
				$SEDECorres2 = "Santa Ana";
			}


			echo "
	<tr class='table-light'>
	<th>".$fila['nombre']."</th>
	<th>".$fila['correo']."</th>
	<th>".$SEDECorres2."</th>
	<th>".$SEDECorres."</th>
	<th>".$fila['cargo']."</th>
	</tr>";

}
}

?>