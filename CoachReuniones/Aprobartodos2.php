<?php 

require_once "../BaseDatos/conexion.php";
session_start();


if(isset($_POST['Aprobado']))
{
	$Asis = "Asistio";
	$IDTaller ="MOD20000002";
	$alumnos =$_POST["ActuaAlumno"];

	if($alumnos == null)
	{
		$alumnos = 0;
		header("Location: modulo2.php?id=".urlencode($IDTaller));
	}

	for ($i=0;$i<count($alumnos);$i++)
	{

        $consulta=$pdo->prepare("UPDATE datos_modulos  SET   estado= 'Aprobado'   WHERE id_alumno =:id_alumno  AND id_modulo = :id_modulo");

        $consulta->bindParam(":id_alumno",$alumnos[$i]);
		$consulta->bindParam(":id_modulo",$IDTaller);


                 //Verifica si ha insertado los datos
		if ($consulta->execute()) 
		{   

			$_SESSION['message'] = 'Importacion De Datos exitoso';
			$_SESSION['message2'] = 'success';
			header("Location: modulo2.php?id=".urlencode($IDTaller));
		}
		else
		{
			$_SESSION['message'] = 'No se pudo consultar la consulta';
			$_SESSION['message2'] = 'danger';
			header("Location: modulo2.php?id=".urlencode($IDTaller));
		}

	}


}
else if(isset($_POST['Reprobado']))
{
    $Asis = "Reprobado";
	$IDTaller ="MOD20000002";
	$alumnos =$_POST["ActuaAlumno"];

	if($alumnos == null)
	{
		$alumnos = 0;
		header("Location: modulo2.php?id=".urlencode($IDTaller));
	}

	for ($i=0;$i<count($alumnos);$i++)
	{

        $consulta=$pdo->prepare("UPDATE datos_modulos  SET   estado= 'Reprobado'   WHERE id_alumno =:id_alumno  AND id_modulo = :id_modulo");

        $consulta->bindParam(":id_alumno",$alumnos[$i]);
		$consulta->bindParam(":id_modulo",$IDTaller);


                 //Verifica si ha insertado los datos
		if ($consulta->execute()) 
		{   

			$_SESSION['message'] = 'Importacion De Datos exitoso';
			$_SESSION['message2'] = 'success';
			header("Location: modulo2.php?id=".urlencode($IDTaller));
		}
		else
		{
			$_SESSION['message'] = 'No se pudo consultar la consulta';
			$_SESSION['message2'] = 'danger';
			header("Location: modulo2.php?id=".urlencode($IDTaller));
		}

	}
}

 ?>