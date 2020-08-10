<?php 
	
	require_once "../BaseDatos/conexion.php";
	session_start();


	if(isset($_POST['todoasis']))
	{	
		$idTaler = $_POST['idtaller'];

		$alumnos =$_POST["ActuaAlumno"];

		$asisAsitio = "Asistio" ;

		if($alumnos == null)
		{
			$alumnos = 0;
			header("Location: ListaTaller.php?id=".urlencode($idTaler));
		}


		for ($i=0;$i<count($alumnos);$i++)
		{

			$consulta2=$pdo->prepare("SELECT `TotalTalleres`FROM alumnos WHERE `ID_Alumno` = :ID_Alumno ");
			$consulta2->bindParam(":ID_Alumno",$alumnos[$i]);
			$consulta2->execute();

			$TotalTaller;
			if ($consulta2->rowCount() >=0)
			{
				$fila=$consulta2->fetch();
				$TotalTaller = $fila['TotalTalleres'];     
			}


		    $consulta3=$pdo->prepare("SELECT `Asistencia` FROM inscripciontalleres WHERE ID_Alumno = :ID_Alumno  AND ID_Taller =:ID_Taller ");
		    $consulta3->bindParam(":ID_Alumno",$alumnos[$i]);
		    $consulta3->bindParam(":ID_Taller",$idTaler);
		    $consulta3->execute();


		    $Asis;
		    if ($consulta3->rowCount() >=0)
		    {
		    	$fila2=$consulta3->fetch();
		    	$Asis = $fila2['Asistencia'];     
		    }



		    if($Asis == "En espera")
		    {
		    	$historico = 1 + $TotalTaller;
		    	$consulta4=$pdo->prepare("UPDATE alumnos SET   TotalTalleres=:TotalTalleres WHERE ID_Alumno=:idAlumno ");
		    	$consulta4->bindParam(":TotalTalleres",$historico);
		    	$consulta4->bindParam(":idAlumno",$alumnos[$i]);
		    	$consulta4->execute();
		    }else if($Asis == "Inasistencia")
		    {
		    	$historico = 1 + $TotalTaller;
		    	$consulta5=$pdo->prepare("UPDATE alumnos SET   TotalTalleres=:TotalTalleres WHERE ID_Alumno=:idAlumno ");
		    	$consulta5->bindParam(":TotalTalleres",$historico);
		    	$consulta5->bindParam(":idAlumno",$alumnos[$i]);
		    	$consulta5->execute();

		    }



                $consulta=$pdo->prepare("UPDATE inscripciontalleres  SET   Asistencia=:Asistencia   WHERE ID_Alumno =:ID_Alumno AND ID_Taller = :ID_Taller");
                $consulta->bindParam(":Asistencia",$asisAsitio);
                $consulta->bindParam(":ID_Alumno",$alumnos[$i]);
                $consulta->bindParam(":ID_Taller",$idTaler);

                //Verifica si ha insertado los datos
                if ($consulta->execute()) 
                {   

                	$_SESSION['message'] = 'Asistencia actualizada';
                	$_SESSION['message2'] = 'success';
                	header("Location: ListaTaller.php?id=".urlencode($idTaler));
                }
                else
                {
                	$_SESSION['message'] = 'Actualización Fallo';
                	$_SESSION['message2'] = 'danger';
                	header("Location: ListaTaller.php?id=".urlencode($idTaler));
                }




		}





	}else if(isset($_POST['todoinasis']))
	{
		$alumnos =$_POST["ActuaAlumno"];

		$asisAsitio = "Inasistencia";

		$idTaler = $_POST['idtaller'];
		
		if($alumnos == null)
		{
			$alumnos = 0;
			header("Location: ListaTaller.php?id=".urlencode($idTaler));
			
		}


		for ($i=0;$i<count($alumnos);$i++)
		{


			$consulta2=$pdo->prepare("SELECT `TotalTalleres`FROM alumnos WHERE `ID_Alumno` = :ID_Alumno ");
			$consulta2->bindParam(":ID_Alumno",$alumnos[$i]);
			$consulta2->execute();

			$TotalTaller;
			if ($consulta2->rowCount() >=0)
			{
				$fila=$consulta2->fetch();
				$TotalTaller = $fila['TotalTalleres'];     
			}


		    $consulta3=$pdo->prepare("SELECT `Asistencia` FROM inscripciontalleres WHERE ID_Alumno = :ID_Alumno  AND ID_Taller =:ID_Taller ");
		    $consulta3->bindParam(":ID_Alumno",$alumnos[$i]);
		    $consulta3->bindParam(":ID_Taller",$idTaler);
		    $consulta3->execute();


		    $Asis;
		    if ($consulta3->rowCount() >=0)
		    {
		    	$fila2=$consulta3->fetch();
		    	$Asis = $fila2['Asistencia'];     
		    }



		    if($Asis == "Asistió")
		    {
		    	$historico =  $TotalTaller - 1 ;
		    	$consulta4=$pdo->prepare("UPDATE alumnos SET   TotalTalleres=:TotalTalleres WHERE ID_Alumno=:idAlumno ");
		    	$consulta4->bindParam(":TotalTalleres",$historico);
		    	$consulta4->bindParam(":idAlumno",$alumnos[$i]);
		    	$consulta4->execute();
		    }



                $consulta=$pdo->prepare("UPDATE inscripciontalleres  SET   Asistencia=:Asistencia   WHERE ID_Alumno =:ID_Alumno AND ID_Taller = :ID_Taller");
                $consulta->bindParam(":Asistencia",$asisAsitio);
                $consulta->bindParam(":ID_Alumno",$alumnos[$i]);
                $consulta->bindParam(":ID_Taller",$idTaler);

                //Verifica si ha insertado los datos
                if ($consulta->execute()) 
                {   

                	$_SESSION['message'] = 'Asistencia actualizada';
                	$_SESSION['message2'] = 'success';
                	header("Location: ListaTaller.php?id=".urlencode($idTaler));
                }
                else
                {
                	$_SESSION['message'] = 'Actualización Fallo';
                	$_SESSION['message2'] = 'danger';
                	header("Location: ListaTaller.php?id=".urlencode($idTaler));
                }



		}
		
		
	}


 ?>