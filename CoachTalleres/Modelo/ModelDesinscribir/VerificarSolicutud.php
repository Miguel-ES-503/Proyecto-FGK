<?php 


require_once "../../../BaseDatos/conexion.php"; 
session_start();  



if (isset($_POST['EnviarDato'])) 
{
	$IDSolicitud = $_POST['id'];
	$Comentario = $_POST['comentario'];
	$Estado = $_POST['estado'];
	
	$idNotificacion = $_POST['idnotificion'];

	$NombreAlu = $_POST['nombreAlu'];
	$Correo = $_POST['correo'];

	$consulta=$pdo->prepare("UPDATE solicituddesinscribir SET Comentario2=:Comentario2 , estado = :estado  WHERE id_solicitud=:id");
	$consulta->bindParam(":Comentario2",$Comentario);
	$consulta->bindParam(":estado",$Estado);
	$consulta->bindParam(":id",$IDSolicitud);


	
	

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
	


	if($EstadoSolicitud == "En espera")
	{
   	     // Consulta para extrear la informacion del alumno
		
		if($idNotificacion == null)
		{
			$consulta10=$pdo->prepare("SELECT Id FROM notificaciones WHERE idSolicitud = :idSolicitud ");
			$consulta10->bindParam(":idSolicitud",$IDSolicitud);
			$consulta10->execute();



			if ($consulta10->rowCount() >=0)
			{
				$fila10=$consulta10->fetch();
				$idNotificacion  = $fila10['Id'];     
			}

		}




		$consulta7=$pdo->prepare("SELECT Id_Remitente FROM notificaciones WHERE Id = :Idnoti ");
		$consulta7->bindParam(":Idnoti",$idNotificacion);
		$consulta7->execute();

		$encargado= $_SESSION['iduser'];
		$tipoSoli = "Desinscribirse";
		$IDRemitente;
		
		if ($consulta7->rowCount() >=0)
		{
			$fila7=$consulta7->fetch();
			$IDRemitente = $fila7['Id_Remitente'];
		}
		

		$consulta8=$pdo->prepare("INSERT INTO notificaciones (Id_Remitente,Id_Receptor,Tipo,idSolicitud,EstadoSolicitud ) VALUES(:Id_Remitente,:Id_Receptor,:Tipo ,:idSolicitud , :EstadoSolicitud)");
		$consulta8->bindParam(':Id_Remitente',$encargado);
		$consulta8->bindParam(':Id_Receptor',$IDRemitente);
		$consulta8->bindParam(':Tipo',$tipoSoli);
		$consulta8->bindParam(':idSolicitud',$IDSolicitud);
		$consulta8->bindParam(':EstadoSolicitud',$Estado);
		$consulta8->execute();
		
		
    //Eliminanos la solicitud
		$consulta11=$pdo->prepare("DELETE FROM notificaciones WHERE  Id=:Id");
		$consulta11->bindParam(":Id", $idNotificacion);
		$consulta11->execute();


		$PrimerNombre = explode(" ", $NombreAlu);
				//Enviamos el correo para  mandar la contraseña generado 
		$asunto = "Workeys Oportunidades / Solicitud de desinscribir de taller";
		$header = "Este correo electr&oacute;nico ha sido generado automaticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0];
		$Mensaje= "Accede al portal http://portal.workeysoportunidades.org/ para revisar tu solicitud.  \n\n\n\n Saludos Cordiales.";

		mail($Correo,$asunto,$Mensaje,$header);



	}


  // verficamos

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