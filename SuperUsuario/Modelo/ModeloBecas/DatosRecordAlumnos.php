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


	// Consulta De La BASE DE DATOS
	$consulta=$pdo->prepare("SELECT `ID_Alumno` , `Nombre` , `Class` , `ID_Sede` , Estado , TotalTalleres , SedeAsistencia FROM alumnos WHERE SedeAsistencia = ? AND (`Estado` = 'Activo' OR `Estado` = 'Graduado')");
	$consulta->execute(array($LugarFT));



	if ($consulta->rowCount()>=1)
	{	
		while ($fila=$consulta->fetch())
		{	 
				echo "
		<tr class='table-light'>
		<th>".$fila['ID_Alumno']."</th>
		<th>".$fila['Nombre']."</th>
		<th>".$fila['Class']."</th>
		<th>".$fila['ID_Sede']."</th>";

		$consulta3=$pdo->prepare("SELECT COUNT(`Asistencia`) AS 'Total_Interno' FROM inscripciontalleres IT INNER JOIN talleres T on IT.`ID_Taller` = T.`ID_Taller` LEFT JOIN alumnos A on IT.`ID_Alumno` = A.`ID_Alumno`  WHERE T.ID_Empresa = 'FGK' AND `Asistencia` = 'Asistio' AND A.ID_Alumno='".$fila['ID_Alumno']."'  GROUP BY A.ID_Alumno HAVING COUNT( Asistencia ) >= 1");
		$consulta3->execute();
		$fila2=$consulta3->fetch();

		$consulta2=$pdo->prepare("SELECT COUNT(`Asistencia`) AS 'Total_Externo' FROM inscripciontalleres IT INNER JOIN talleres T on IT.`ID_Taller` = T.`ID_Taller` LEFT JOIN alumnos A on IT.`ID_Alumno` = A.`ID_Alumno` LEFT JOIN empresas E on T.ID_Empresa = E.ID_Empresa WHERE `Asistencia` = 'Asistio' AND E.Tipo = 'Empresa Externa' AND A.ID_Alumno='".$fila['ID_Alumno']."'  GROUP BY A.ID_Alumno HAVING COUNT( Asistencia ) >= 1");
		$consulta2->execute();
		$fila3=$consulta2->fetch();


		$consulta4=$pdo->prepare("SELECT COUNT(`asistencia`) AS 'Reunion' FROM inscripcionreunion WHERE `asistencia` = 'Asistio' AND `id_alumno` = '".$fila['ID_Alumno']."' GROUP BY `id_alumno` HAVING COUNT( `asistencia` ) >= 1 ");
		$consulta4->execute();
		$fila4=$consulta4->fetch();

		$Result;
		if ($fila2['Total_Interno'] == null) 
		{
			$Result = 0;
		}else
		{
			$Result = $fila2['Total_Interno'];
		}

		$Result2;

		if ($fila3['Total_Externo'] == null) 
		{
			$Result2 = 0;
		}else
		{
			$Result2 = $fila3['Total_Externo'];
		}

		$result3;
		if ($fila4['Reunion'] == null) 
		{
			$result3 = 0;
		}else
		{
			$result3 = $fila4['Reunion'];
		}


		echo "<th>".$Result."</th>";
		echo "<th>".$Result2."</th>";
		echo "<th>".$result3."</th>";

        
        $Result4 = $Result +  $Result2 + $result3;
		
		echo "<th><b>".$Result4."</b></th>";
		echo "<th>".$fila['TotalTalleres']."</th>";
		echo "<th>".$fila['Estado']."</th>";


		

		 }
   }





	






?>