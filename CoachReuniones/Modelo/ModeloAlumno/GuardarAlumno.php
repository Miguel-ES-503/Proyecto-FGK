<?php

	//Conexión con la base de datos
require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];


error_reporting(0);
if ($varsesion == null || $varsesion = "") {
	header("Location: ../login.php");
	die();
}

if ($_POST['CarnetAlumno'] == '' ) {
	

	$_SESSION['message'] = 'No has ingresado ningún dato';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-CrearAlumno.php"); 
}
else if(isset($_POST['CarnetAlumno']))
{

	if (isset($_POST['Guardar_Datos'])) 
	{

	   //Declaración de varialbes
		$IDCarnet = $_POST['CarnetAlumno'];
		$NombreAlumno= $_POST['NombreAlumno'];
		$Carrera= $_POST['NombreCarrera'];
		$PromoClass = $_POST['NClass'];
		$IDempresa = $_POST['idempresa'];
		$Sexo = $_POST['Sexo'];
		$EstadoAlumno = $_POST['estadoAlumno'];
		$IDStatusAlunmno= $_POST['IDStatus'];
		$Sede = $_POST['sede'];
		$Correo= $_POST['correo'];
		$rol = $_POST['cargo'];
		$asistencia = $_POST['Asistencia'];
		
		$ImgDefault = "imgDefault.png";

	    //Consulta para vericar si el alumno ya fue ingresado
		$consulta2=$pdo->prepare("SELECT * FROM alumnos WHERE ID_Alumno = :ID_Alumno");
		$consulta2->bindParam(":ID_Alumno",$IDCarnet);
		$consulta2->execute();

		$consulta4=$pdo->prepare("SELECT * FROM alumnos WHERE correo = :correo");
		$consulta4->bindParam(":correo",$Correo);
		$consulta4->execute();


   //Verificar si ya existe el usuario
		$CaneteDelAlumno;
		$CorreoDelAlumno;

		if ($consulta2->rowCount() >=0)
		{
			$fila2=$consulta2->fetch();
			$CaneteDelAlumno = $fila2['ID_Alumno'];

		}


		if ($consulta4->rowCount() >=0)
		{
			$fila4=$consulta4->fetch();
			$CorreoDelAlumno = $fila4['correo'];

		}



		if ($CaneteDelAlumno == $IDCarnet ) 
		{
			$_SESSION['message'] = 'Alumno Registrado con carnet '.$IDCarnet;
			$_SESSION['message2'] = 'danger';
			header("Location: ../../SIT-CrearAlumno.php"); 	
		}
		else
		{

			if ($CorreoDelAlumno == $Correo) 
			{
				    $_SESSION['message'] = 'El Correo ya registrado.';
                 	$_SESSION['message2'] = 'danger';
                 	header("Location: ../../SIT-CrearAlumno.php"); 
			}else
			{
  
  				//Si todo fue correcto dejara pasar los datos de lo contrario no
  				//Prepara la  consulta para insertar un dato
				$consulta=$pdo->prepare("INSERT INTO alumnos(ID_Alumno,Nombre,Id_Carrera,Class,correo,ID_Empresa,Sexo,Estado,ID_Status,ID_Sede,SedeAsistencia) VALUES(:CarnetAlumno,:NombreAlumno,:NombreCarrera,:NClass,:correo,:idempresa,:Sexo,:estadoAlumno,:IDStatus,:sede,:Asistencia)");

				// Pasamos los parametros para la inserción de datos
                 	$consulta->bindParam(':CarnetAlumno',$IDCarnet);
                 	$consulta->bindParam(':NombreAlumno',$NombreAlumno);
                 	$consulta->bindParam(':NombreCarrera',$Carrera);
                 	$consulta->bindParam(':NClass',$PromoClass);
                 	$consulta->bindParam(':correo',$Correo);
                 	$consulta->bindParam(':idempresa',$IDempresa);
                 	$consulta->bindParam(':Sexo',$Sexo);
                 	$consulta->bindParam(':estadoAlumno',$EstadoAlumno);
                 	$consulta->bindParam(':IDStatus',$IDStatusAlunmno);
                 	$consulta->bindParam(':sede',$Sede);
                 	$consulta->bindParam(':Asistencia',$asistencia);
             

                 	if (!$consulta->execute()) // Si los datos no fueron correcto Nos dira en una alerta
                 	{
                 		$_SESSION['message'] = 'Fallo al crear Expediente';
                 		$_SESSION['message2'] = 'danger';
                 		header("Location: ../../SIT-CrearAlumno.php"); 
                 	}else
                 	{

                 		// Si los datos se ejecutaron correctamente nos crear el usuario
                 		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz1234567890";
                 		$password = "";
  						 //Reconstruimos la contraseña segun la longitud que se quiera
                 		for($i=0;$i <= 10 ;$i++) {
     					 //obtenemos un caracter aleatorio escogido de la cadena de caracteres
                 			$password .= substr($str,rand(0,62),1);
                 		}

				$Clave= password_hash($password, PASSWORD_DEFAULT);//Incriptamos la contraseña del usuario generado automaticamente

                 //Preparamaos la consulta de inserción
				$consulta3=$pdo->prepare("INSERT INTO usuarios(nombre,correo,contrasena,ID_Sede,cargo,SedeAsistencia,imagen) VALUES(:nombre,:correo,:contra,:sede,:cargo,:asi,:imagen)");

				$consulta3->bindParam(':nombre',$NombreAlumno);
				$consulta3->bindParam(':correo',$Correo);
				$consulta3->bindParam(':sede',$Sede);
				$consulta3->bindParam(':cargo',$rol);
				$consulta3->bindParam(':contra',$Clave);
				$consulta3->bindParam(':asi',$asistencia);
				$consulta3->bindParam(':imagen',$ImgDefault);
				

				$PrimerNombre = explode(" ", $NombreAlumno);
				//Enviamos el correo para  mandar la contraseña generado 
				$asunto = "Workeys Oportunidades";
				$header = "Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0]." queremos darte  la noticia que te han inscrito a una plataforma  llamada  Workeys Oportunidades la cual podrá acceder en la siguiente  URL  http://www.workeysoportunidades.org/";
				$Mensaje= "La cual podrás acceder  con tu correo  oficial de  Oportunidades y tu contraseña  es " .$password. " una  vez accediendo a la plataforma podrás cambiarla. Saludos Cordiales.";

				if (!$consulta3->execute()) 
				{
					$_SESSION['message'] = 'Usuario no creado';
					$_SESSION['message2'] = 'danger';
					header("Location: ../../SIT-CrearAlumno.php");

				}else
				{

					if ( mail($Correo,$asunto,$Mensaje,$header)) {
					//Si todo fue correcto muestra el resultado con exito;
						$_SESSION['message3'] = 'Correo Enviado';
						$_SESSION['message4'] = 'success';

					} else 
					{
						$_SESSION['message3'] = 'Correos No Enviado';
						$_SESSION['message4'] = 'danger';

					}

					$_SESSION['message'] = 'Alumno creado con exito';
					$_SESSION['message2'] = 'success';
					header("Location: ../../SIT-CrearAlumno.php");
				}




                 }// fin de else de Consutla1


			}



		}
		


	



	}// Fin del if  (isset($_POST['Guardar_Datos']))  
	else // Si no encontro ningun dato
	{
		$_SESSION['message'] = 'Datos No ingresados Form GuardarAlumno.php';
		$_SESSION['message2'] = 'danger';
		header("Location: ../../SIT-CrearAlumno.php"); 
	}

}	
?>


