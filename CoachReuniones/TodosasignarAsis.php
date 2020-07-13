<?php 

require_once "../BaseDatos/conexion.php";
session_start();


if(isset($_POST['todoasis']))
{
	$Asis = "Asistio";
	$IDTaller = $_POST['idtaller'];
	$alumnos =$_POST["ActuaAlumno"];

	if($alumnos == null)
	{
		$alumnos = 0;
		header("Location: ListaReunion.php?id=".urlencode($IDTaller));
	}

	for ($i=0;$i<count($alumnos);$i++)
	{

		$consulta=$pdo->prepare("UPDATE inscripcionreunion  SET   asistencia=:asistencia   WHERE id_alumno =:id_alumno AND id_reunion = :id_reunion");
		$consulta->bindParam(":asistencia",$Asis);
		$consulta->bindParam(":id_alumno",$alumnos[$i]);
		$consulta->bindParam(":id_reunion",$IDTaller);

                 //Verifica si ha insertado los datos
		if ($consulta->execute()) 
		{   
			$_SESSION['message'] = 'Importacion De Datos exitoso';
			$_SESSION['message2'] = 'success';
			header("Location: ListaReunion.php?id=".urlencode($IDTaller));
		}
		else
		{
			$_SESSION['message'] = 'No se pudo consultar la consulta';
			$_SESSION['message2'] = 'danger';
			header("Location: ListaReunion.php?id=".urlencode($IDTaller));
		}

	}


}
else if(isset($_POST['todoinasis']))
{

	$Asis = "Inasistencia";
	$IDTaller = $_POST['idtaller'];
	$alumnos =$_POST["ActuaAlumno"];

	if($alumnos == null)
	{
		$alumnos = 0;	
		header("Location: ListaReunion.php?id=".urlencode($IDTaller));
	}

	for ($i=0;$i<count($alumnos);$i++)
	{

		$consulta=$pdo->prepare("UPDATE inscripcionreunion  SET   asistencia=:asistencia   WHERE id_alumno =:id_alumno AND id_reunion = :id_reunion");
		$consulta->bindParam(":asistencia",$Asis);
		$consulta->bindParam(":id_alumno",$alumnos[$i]);
		$consulta->bindParam(":id_reunion",$IDTaller);

                 //Verifica si ha insertado los datos
		if ($consulta->execute()) 
		{   

			$_SESSION['message'] = 'Importacion De Datos exitoso';
			$_SESSION['message2'] = 'success';
			header("Location: ListaReunion.php?id=".urlencode($IDTaller));
		}
		else
		{
			$_SESSION['message'] = 'No se pudo consultar la consulta';
			$_SESSION['message2'] = 'danger';
			header("Location: ListaReunion.php?id=".urlencode($IDTaller));
		}

	}
}

 ?>