<?php 


require_once "../../../BaseDatos/conexion.php"; 
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

if (isset($_POST['EnviarDato'])) 
{
	$IDSolicitud = $_POST['id'];
	$Comentario = $_POST['comentario'];
	$Estado = $_POST['estado'];
	

	$consulta=$pdo->prepare("UPDATE solicituddesinscribir SET Comentario2=:Comentario2 , estado = :estado  WHERE id_solicitud=:id");
	$consulta->bindParam(":Comentario2",$Comentario);
	$consulta->bindParam(":estado",$Estado);
	$consulta->bindParam(":id",$IDSolicitud);

   //Consulta para actualizar la notificacion
		$consultaN=$pdo->prepare("UPDATE notificaciones SET EstadoSolicitud = :estado , Estado = :e WHERE idSolicitud=:id");
		$e = "Visto";
	$consultaN->bindParam(":e",$e);
	$consultaN->bindParam(":estado",$Estado);
	$consultaN->bindParam(":id",$IDSolicitud);
	$consultaN->execute();
    // Consulta para extrear la informacion del alumno
  $consulta3=$pdo->prepare("SELECT * FROM solicituddesinscribir WHERE id_solicitud = :id_solicitud ");
  $consulta3->bindParam(":id_solicitud",$IDSolicitud);
  $consulta3->execute();

$EstadoSolicitud;
    if ($consulta3->rowCount() >=0)
  {
        $fila=$consulta3->fetch();
        $EstadoSolicitud = $fila['estado'];     
  }


    if ($EstadoSolicitud == "Aprobado" ) 
    {
    	$_SESSION['message'] = 'Solicitud Ya aprobado';
    	$_SESSION['message2'] = 'danger';
    	header("Location: ../../DetallesDesincribirTaller.php?id=".urlencode($IDSolicitud));
    }else
    {
    	if ($consulta->execute()) 
		{

	    //Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Solicitud Actualizado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../DetallesDesincribirTaller.php?id=".urlencode($IDSolicitud));

		if ($Estado == "Aprobado" ) 
		{
			$IDAlumno = $_POST['idAlumno'];
			$IDTaller = $_POST['idTaller'];
			$consulta2=$pdo->prepare("DELETE FROM inscripciontalleres WHERE  ID_Alumno=:ID_Alumno AND ID_Taller = :ID_Taller ");
			$consulta2->bindParam(":ID_Alumno", $IDAlumno );
			$consulta2->bindParam(":ID_Taller", $IDTaller );
			
			
				  // Consulta para extrear la informacion del alumno
			$consulta4=$pdo->prepare("SELECT * FROM talleres WHERE ID_Taller = :ID_Taller ");
			$consulta4->bindParam(":ID_Taller",$IDTaller);
			$consulta4->execute();

			$CupoTaller;

			if ($consulta4->rowCount()>=1)
			{
				while ($fila4=$consulta4->fetch()) 
				{
					$CupoTaller = $fila4['Cupo'];

				}//fin de while
			}
            
            $Incremntar = $CupoTaller + 1;

			$consulta5=$pdo->prepare("UPDATE talleres SET Cupo=:Cupo   WHERE ID_Taller=:id");
			$consulta5->bindParam(":Cupo",$Incremntar);
			$consulta5->bindParam(":id",$IDTaller);
			$consulta5->execute();
			
			
			
			

			if ($consulta2->execute()) 
			{
				$_SESSION['message3'] = 'Alumno Borrado del taller ';
				$_SESSION['message4'] = 'success';
				header("Location: ../../DetallesDesincribirTaller.php?id=".urlencode($IDSolicitud));

			}else
			{
				$_SESSION['message3'] = 'Fallo al eliminar alumno del taller ';
				$_SESSION['message4'] = 'danger';
				header("Location: ../../DetallesDesincribirTaller.php?id=".urlencode($IDSolicitud));
			}

		}  	
		}else 
		{
			$_SESSION['message'] = 'Solicitud No Actualizdo';
			$_SESSION['message2'] = 'danger';
			header("Location: ../../DetallesDesincribirTaller.php?id=".urlencode($IDSolicitud));
		}


    }
   
    
    

  

} // if isset
else
{
	$_SESSION['message'] = 'Datos No ingresados VerficarSolicuitud.php';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../DetallesDesincribirTaller.php?id=".urlencode($IDSolicitud));
}







 ?>