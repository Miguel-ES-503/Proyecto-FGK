<?php 

require_once "../BaseDatos/conexion.php";
session_start();


if(isset($_POST['Aprobado']))
{
	$Asis = "Asistio";
	$IDTaller ="MOD10000001";
	$alumnos =$_POST["ActuaAlumno"];

	if($alumnos == null)
	{
		$alumnos = 0;
		$alumnos2 = 0;
		header("Location: AprobarModulos.php?id=".urlencode($IDTaller));
	}

	for ($i=0;$i<count($alumnos);$i++)
	{

        $consulta=$pdo->prepare("UPDATE datos_modulos  SET   estado= 'Aprobado'   WHERE id_alumno =:id_alumno  AND id_modulo = :id_modulo");
        $consulta->bindParam(":id_alumno",$alumnos[$i]);
		$consulta->bindParam(":id_modulo",$IDTaller);
		// select alumnos a actualizar


		$data = $pdo->query("SELECT * FROM alumnos WHERE ID_Alumno = '$alumnos[$i]' ")->fetchAll();
		// and somewhere later:
		foreach ($data as $row) {
			  $modulosupdate = ($row['CantidadModulos']+1);
			}

        $consulta2=$pdo->prepare("UPDATE alumnos  SET   CantidadModulos = :cantidadmod   WHERE ID_Alumno =:id_alumno2 ");
		$consulta2->bindParam(":cantidadmod",$modulosupdate);
		$consulta2->bindParam(":id_alumno2",$alumnos[$i]);
		
			
                 //Verifica si ha insertado los datos
		if ($consulta->execute()) 
		{   
			if ($consulta2->execute()) {
			$_SESSION['message'] = 'Importacion De Datos exitoso';
			$_SESSION['message2'] = 'success';
			header("Location: AprobarModulos.php?id=".urlencode($IDTaller));			
			}

		}
		else
		{
			$_SESSION['message'] = 'No se pudo consultar la consulta';
			$_SESSION['message2'] = 'danger';
			header("Location: AprobarModulos.php?id=".urlencode($IDTaller));
		}

	}


}
else if(isset($_POST['Reprobado']))
{
    $Asis = "Reprobado";
	$IDTaller ="MOD10000001";
	$alumnos =$_POST["ActuaAlumno"];

	if($alumnos == null)
	{
		$alumnos = 0;
		header("Location: AprobarModulos.php?id=".urlencode($IDTaller));
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
			header("Location: AprobarModulos.php?id=".urlencode($IDTaller));
		}
		else
		{
			$_SESSION['message'] = 'No se pudo consultar la consulta';
			$_SESSION['message2'] = 'danger';
			header("Location: AprobarModulos.php?id=".urlencode($IDTaller));
		}

	}
}

 ?>