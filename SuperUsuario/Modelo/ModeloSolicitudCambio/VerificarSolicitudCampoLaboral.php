<?php 


require_once "../../../BaseDatos/conexion.php"; 
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

if (isset($_POST['EnviarDato'])) 
{
	$IDSolicitud = $_POST['id']; // ide la notificaion del campo laboral
	$Comentario = $_POST['comentario'];
	$Estado = $_POST['estado'];
	$idNotificacion = $_POST['idnotificacion']; // id de la notificacion
	$correo = $_POST['correo'];
	$NombreAlu = $_POST['NombreAlumno'];
	
	$time = time();
	$tiempo = date("H:i:s", $time);
	$Fecha =date("Y-m-d ", $time);
	$tiempoFecha = $Fecha . $tiempo;


	$consulta=$pdo->prepare("UPDATE solicitudcambio SET Comentario2=:Comentario2 , Estado = :Estado , Fecha = :Fecha  WHERE id_solicitud = :id");
	$consulta->bindParam(":Comentario2",$Comentario);
	$consulta->bindParam(":Estado",$Estado);
	$consulta->bindParam(":Fecha",$tiempoFecha);
	

	$consulta->bindParam(":id",$IDSolicitud);


	  // Consulta para extrear la informacion del alumno
	$consulta3=$pdo->prepare("SELECT * FROM solicitudcambio WHERE id_solicitud = :id_solicitud ");
	$consulta3->bindParam(":id_solicitud",$IDSolicitud);
	$consulta3->execute();

	$EstadoSolicitud;
	if ($consulta3->rowCount() >=0)
	{
		$fila=$consulta3->fetch();
		$EstadoSolicitud = $fila['Estado'];     
	}
   


   //Verifica si la solicut esta en espera
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
		$tipoSoli = "Cambio de estado";
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
		$asunto = "Workeys Oportunidades / Solicitud de cambio de estado";
		$header = "Este correo  ha sido generado automaticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0];
		$Mensaje= "Accede al portal http://portal.workeysoportunidades.org/ para revisar tu solicitud.  \n \n \n Saludos Cordiales.";

		mail($correo,$asunto,$Mensaje,$header);

		

	}


  


  	//Verifica si ha insertado los datos
	if ($consulta->execute()) 
	{
				//Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Solicitud Actualizado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../DetallesSolicitudCampoLaboral.php?id=".urlencode($IDSolicitud));

       $IDALUMNO = $_POST['idAlumno'];
       $IDSTATUS = $_POST['idstatus'];

       if($Estado != "Rechazado")
       {
       	$consulta2=$pdo->prepare("UPDATE alumnos SET ID_Status=:ID_Status   WHERE ID_Alumno = :ID_Alumno");
       	$consulta2->bindParam(":ID_Status",$IDSTATUS);
       	$consulta2->bindParam(":ID_Alumno",$IDALUMNO);
       	$consulta2->execute();

       }
     




	}
	else
	{
		$_SESSION['message'] = 'Solicitud No Actualizdo';
		$_SESSION['message2'] = 'danger';
		header("Location: ../../DetallesSolicitudCampoLaboral.php?id=".urlencode($IDSolicitud));
	}


}
else
{
	$_SESSION['message'] = 'Datos No ingresados VerficarSolicuitud.php';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../DetallesSolicitudCampoLaboral.php?id=".urlencode($IDSolicitud));
}







 ?>