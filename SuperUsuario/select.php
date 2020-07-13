<?php 

require_once "../BaseDatos/conexion.php";
session_start();


if(isset($_POST['cambiar']))
{
	$alumnos =$_POST["ActuaAlumno"];

	$AlumnosStatus = $_POST['statusActual'];
	$finaciamiento = $_POST['financiamiento'];
	$status = $_POST['IDStatus'];
    $lugarAsis = $_POST['Asistencia'];

	
	

	if($AlumnosStatus !=""){	

		for ($i=0;$i<count($alumnos);$i++)
		{
			$consulta=$pdo->prepare("UPDATE alumnos SET  StatusActual=:StatusActual   WHERE ID_Alumno = :ID_Alumno ");
			$consulta->bindParam(":StatusActual",$AlumnosStatus);
			$consulta->bindParam(":ID_Alumno",$alumnos[$i]);
			$consulta->execute();

			if(!$consulta->execute())
			{
				$_SESSION['message'] = 'Fallo al actualizar datos';
				$_SESSION['message2'] = 'danger';
				
			}else
			{
				$_SESSION['message'] = 'Datos actualizados';
				$_SESSION['message2'] = 'success';
				
			}

		}
	}

	if($finaciamiento !="" )
	{

		for ($i=0;$i<count($alumnos);$i++)
		{
			$consulta2=$pdo->prepare("UPDATE alumnos SET  FuenteFinacimiento=:FuenteFinacimiento   WHERE ID_Alumno = :ID_Alumno ");
			$consulta2->bindParam(":FuenteFinacimiento",$finaciamiento);
			$consulta2->bindParam(":ID_Alumno",$alumnos[$i]);
			$consulta2->execute();

			if(!$consulta2->execute())
			{
				$_SESSION['message'] = 'Fallo al actualizar datos';
				$_SESSION['message2'] = 'danger';
				
			}else
			{
				$_SESSION['message'] = 'Datos actualizados';
				$_SESSION['message2'] = 'success';
				
			}

		}
	}



	if($status !="")
	{

		for ($i=0;$i<count($alumnos);$i++)
		{
			$consulta3=$pdo->prepare("UPDATE alumnos SET  ID_Status=:ID_Status   WHERE ID_Alumno = :ID_Alumno ");
			$consulta3->bindParam(":ID_Status",$status);
			$consulta3->bindParam(":ID_Alumno",$alumnos[$i]);
			$consulta3->execute();

			if(!$consulta3->execute())
			{
				$_SESSION['message'] = 'Fallo al actualizar datos';
				$_SESSION['message2'] = 'danger';
				
			}else
			{
				$_SESSION['message'] = 'Datos actualizados';
				$_SESSION['message2'] = 'success';
				
			}

		}




	}


	if($lugarAsis !="")
	{

		for ($i=0;$i<count($alumnos);$i++)
		{
			$consulta5=$pdo->prepare("UPDATE alumnos SET  SedeAsistencia=:SedeAsistencia   WHERE ID_Alumno = :ID_Alumno ");
			$consulta5->bindParam(":SedeAsistencia",$lugarAsis);
			$consulta5->bindParam(":ID_Alumno",$alumnos[$i]);
			$consulta5->execute();

			$consulta4=$pdo->prepare("SELECT `correo` FROM alumnos WHERE ID_Alumno = ?");
			$consulta4->execute(array($alumnos[$i]));

			while ($fila=$consulta4->fetch())
			{	 
				
$consulta6=$pdo->prepare("UPDATE usuarios SET  ID_Sede=:ID_Sede , SedeAsistencia = :SedeAsistencia   WHERE correo = :correo ");
				$consulta6->bindParam(":ID_Sede",$lugarAsis);
				$consulta6->bindParam(":SedeAsistencia",$lugarAsis);
				$consulta6->bindParam(":correo", $fila['correo']);
				$consulta6->execute();


			}

		}



		if(!$consulta6->execute())
		{
			$_SESSION['message'] = 'Fallo al actualizar datos';
			$_SESSION['message2'] = 'danger';

		}else
		{
			$_SESSION['message'] = 'Datos actualizados';
			$_SESSION['message2'] = 'success';

		}

	}





	
		header("Location: LIS-Alumnos.php");
	








}
else 
{
	echo "Datos no llegnado";
}	

?>