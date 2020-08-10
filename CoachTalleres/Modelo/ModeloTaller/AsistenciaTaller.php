<?php
	
	require_once "../../../BaseDatos/conexion.php";
	session_start();  
	$varsesion = $_SESSION['Email'];


if (isset($_GET['id']) && isset($_GET['id2'])) 
{
	$idTaller=$_GET['id'];
	$idAlumno=$_GET['id2'];

	$consulta2=$pdo->prepare("SELECT `TotalTalleres`FROM alumnos WHERE `ID_Alumno` = :ID_Alumno ");
	$consulta2->bindParam(":ID_Alumno",$idAlumno);
	$consulta2->execute();

	$TotalTaller;
	if ($consulta2->rowCount() >=0)
	{
		$fila=$consulta2->fetch();
		$TotalTaller = $fila['TotalTalleres'];     
	}
	

//Consulta de actualización de datos
	$consulta=$pdo->prepare("UPDATE inscripciontalleres SET   Asistencia=:Asistencia   WHERE ID_Alumno=:idAlumno AND ID_Taller=:IDTaller  ");
	$Asistencia = "Asistio";
	$consulta->bindParam(":Asistencia",$Asistencia);
	$consulta->bindParam(":idAlumno",$idAlumno);
	$consulta->bindParam(":IDTaller",$idTaller);

// Buscar la asistencia del alumno
	$consulta4=$pdo->prepare("SELECT `Asistencia`FROM inscripciontalleres WHERE `ID_Alumno` = :ID_Alumno AND ID_Taller=:IDTaller ");
	$consulta4->bindParam(":ID_Alumno",$idAlumno);
	$consulta4->bindParam(":IDTaller",$idTaller);
	$consulta4->execute();
//Guardamos la informacion e verificar
	$Verifica;
	if ($consulta4->rowCount() >=0)
	{
		$fila2=$consulta4->fetch();
		$Verifica = $fila2['Asistencia'];     
	}
	//Evaluamos si es disnto Asistio por lo tanto dejara pasar
	if($Verifica != "Asistio")
	{
			//Historico:
		$historico = 1 + $TotalTaller;
		$consulta3=$pdo->prepare("UPDATE alumnos SET   TotalTalleres=:TotalTalleres WHERE ID_Alumno=:idAlumno ");
		$consulta3->bindParam(":TotalTalleres",$historico);
		$consulta3->bindParam(":idAlumno",$idAlumno);
		$consulta3->execute();
    //Verifica si ha insertado los datos
		if ($consulta->execute()) 
		{
	//Si todo fue correcto muestra el resultado con exito;
			$_SESSION['message'] = 'Asistencia Cambiado Con Exito';
			$_SESSION['message2'] = 'success';

		}
		else
		{
			echo 'No se pudo actualizar';
		}

	}else
	{
		$_SESSION['message'] = 'Asistencia ya fue asignada';
		$_SESSION['message2'] = 'danger';
	}



	header("Location: ../../ListaTaller.php?id=".urlencode($idTaller));

 




}else 
{
	echo "Datos no llegando";
}
	

 ?>