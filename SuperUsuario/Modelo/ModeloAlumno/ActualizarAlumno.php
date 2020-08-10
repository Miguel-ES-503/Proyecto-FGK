<?php

require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

if (isset($_POST['Guardar_Datos']))
{
	 //Declaración de varialbes
	$IDCarnet = $_POST['CarnetAlumno'];
	$NombreAlumno = $_POST['NombreAlumno'];
	$Carrera= $_POST['NombreCarrera'];
	$PromoClass = $_POST['NClass'];
	$IDempresa = $_POST['idempresa'];
	$Sexo = $_POST['Sexo'];
	$EstadoAlumno = $_POST['estadoAlumno'];
	$IDStatusAlunmno= $_POST['IDStatus'];
	$Sede = $_POST['sede'];
	$Correo=  strtolower($_POST['correo']);
	$asistencia = $_POST['Asistencia'];
	$id=$_POST['id'];

	$TotalTaller = $_POST['cantidaTaller'];
	$StatusActual = $_POST['statusActual'];
	$Finaciamiento = $_POST['financiamiento'];

	//Consulta para vericar si el alumno ya fue ingresado
	$consulta2=$pdo->prepare("SELECT * FROM alumnos WHERE ID_Alumno = :ID_Alumno");
	$consulta2->bindParam(":ID_Alumno",$id);
	$consulta2->execute();

	$IDEstudiante;
	$NomAlumno;
	$correoAlumno;
	$SedeAlumno;
	$SedeAsisAlumno;
	$IdCorreo;

	if ($consulta2->rowCount() >=1)
	{
		$fila2=$consulta2->fetch();
		$IDEstudiante = $fila2['ID_Alumno'];
		$NomAlumno = $fila2['Nombre'];
		$correoAlumno = $fila2['correo'];
		$SedeAlumno =$fila2['ID_Sede'];
		$SedeAsisAlumno = $fila2['SedeAsistencia'];
		$IdCorreo = $fila2['correo'];

	}


	//Consulta para vericar si el alumno ya fue ingresado
	$consulta12=$pdo->prepare("SELECT * FROM usuarios WHERE correo = :correo");
	$consulta12->bindParam(":correo",$IdCorreo);
	$consulta12->execute();

	$IDCuenta;

	if ($consulta12->rowCount()) 
	{
	     $fila12 =$consulta12->fetch();
	     $IDCuenta = $fila12['IDUsuario'];
	}
   
   echo $buscadorIDMail;


	if ($NomAlumno !=  $NombreAlumno ) 
	{
	     	//Consulta de actualización de datos
		$consulta3=$pdo->prepare("UPDATE usuarios SET  nombre=:nombre   WHERE IDUsuario = :IDUsuario ");
		$consulta3->bindParam(":nombre",$NombreAlumno);
		$consulta3->bindParam(":IDUsuario",$IDCuenta);
		$consulta3->execute();


	}

	if ($SedeAlumno !=  $Sede ) 
	{
	     	//Consulta de actualización de datos
		$consulta4=$pdo->prepare("UPDATE usuarios SET  ID_Sede=:ID_Sede   WHERE IDUsuario = :IDUsuario ");
		$consulta4->bindParam(":ID_Sede",$Sede);
		$consulta4->bindParam(":IDUsuario",$IDCuenta);
		$consulta4->execute();

	}


	if ($SedeAsisAlumno !=  $asistencia ) 
	{
	     	//Consulta de actualización de datos
		$consulta4=$pdo->prepare("UPDATE usuarios SET  SedeAsistencia=:SedeAsistencia   WHERE IDUsuario = :IDUsuario ");
		$consulta4->bindParam(":SedeAsistencia",$asistencia);
		$consulta4->bindParam(":IDUsuario",$IDCuenta);
		$consulta4->execute();

	}

	if ($correoAlumno !=  $Correo ) 
	{ 

		$consulta5=$pdo->prepare("SELECT COUNT(`correo`) as existe FROM alumnos where `correo`='".$Correo."'");
		$consulta5->execute();


		while ($fila5=$consulta5->fetch())
			{	  $buscador = $fila5['existe'];
		if ( $buscador >=1) {

						//Si todo fue correcto muestra el resultado con exito;
			$_SESSION['message3'] = 'Correo ya existe';
			$_SESSION['message4'] = 'danger';
			header("Location: ../../LIS-Alumnos.php");
			break;

		}else
		{
					//Consulta de actualización de datos
			$consulta6=$pdo->prepare("UPDATE alumnos SET correo=:correo  WHERE ID_Alumno = :id ");
			$consulta6->bindParam(":correo",$Correo);
			$consulta6->bindParam(":id",$id);
			$consulta6->execute();

					// Si los datos se ejecutaron correctamente nos crear el usuario
			$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz1234567890";
			$password = "";
  						 //Reconstruimos la contraseña segun la longitud que se quiera
			for($i=0;$i <= 10 ;$i++) {
     					 //obtenemos un caracter aleatorio escogido de la cadena de caracteres
				$password .= substr($str,rand(0,62),1);
			}

				    $Clave= password_hash($password, PASSWORD_DEFAULT);//Incriptamos la contraseña del usuario generado automaticamente


	  				//Consulta de actualización de datos
				    $consulta7=$pdo->prepare("UPDATE usuarios SET correo=:correo, contrasena = :contrasena  WHERE IDUsuario = :IDUsuario ");
				    $consulta7->bindParam(":correo",$Correo);
				    $consulta7->bindParam(":contrasena",$Clave);
				    $consulta7->bindParam(":IDUsuario",$IDCuenta);
				    $consulta7->execute();

				    $PrimerNombre = explode(" ", $NombreAlumno);

	 $asunto = "Workeys Oportunidades";
	$header = "Este correo electrónico ha sido generado automáticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0]." queremos darte  la noticia que se ha actualizado tu contraseña la cuál podrá acceder en la siguiente  URL  http://portal.workeysoportunidades.org/";
	$Mensaje= "La cuál podrás acceder  con tu correo  oficial de  Oportunidades y tu contraseña  es" .$password. " una  vez accediendo a la plataforma podrás cambiarla.\n\n\n Saludos Cordiales.";


				    if ( mail($Correo,$asunto,$Mensaje,$header)) {
					//Si todo fue correcto muestra el resultado con exito;
				    	$_SESSION['message3'] = 'Correo Enviado';
				    	$_SESSION['message4'] = 'success';

				    } else 
				    {
				    	$_SESSION['message3'] = 'Corre No Enviado';
				    	$_SESSION['message4'] = 'danger';

				    }


				    header("Location: ../../LIS-Alumnos.php");
				    break;
				}
				
				

			}



		}


		if ($IDEstudiante != $IDCarnet ) 
		{   
			$consulta9=$pdo->prepare("SELECT COUNT(`ID_Alumno`) as existe2 FROM alumnos where `ID_Alumno`= ?");
			$consulta9->execute(array($IDCarnet));

			$buscador2;
			while ( $fila9 = $consulta9->fetch()) 
			{
				$buscador2 = $fila9['existe2'];
			}


			if ($buscador2 >= 1) 
			{
				$_SESSION['message3'] = 'Ya existe el carnet';
				$_SESSION['message4'] = 'danger';
				header("Location: ../../LIS-Alumnos.php");
			}else
			{
				$consulta10=$pdo->prepare("UPDATE alumnos SET  ID_Alumno=:ID_Alumno WHERE ID_Alumno = :id ");
				$consulta10->bindParam(":ID_Alumno",$IDCarnet);
				$consulta10->bindParam(":id",$id);
				$consulta10->execute();
			}  

		}




		


	//Consulta de actualización de datos
		$consulta=$pdo->prepare("UPDATE alumnos SET  Nombre=:Nombre , Class=:Class  , ID_Carrera=:ID_Carrera , ID_Empresa=:ID_Empresa , Sexo=:Sexo , Estado=:Estado , ID_Status=:ID_Status, SedeAsistencia=:SedeAsistencia , ID_Sede=:ID_Sede , TotalTalleres = :TotalTalleres , StatusActual =:StatusActual , FuenteFinacimiento = :FuenteFinacimiento WHERE ID_Alumno = :id ");

		$consulta->bindParam(":Nombre",$NombreAlumno);
		$consulta->bindParam(":Class",$PromoClass);
		$consulta->bindParam(":ID_Carrera",$Carrera);
		$consulta->bindParam(":ID_Empresa",$IDempresa);
		$consulta->bindParam(":Sexo",$Sexo);
		$consulta->bindParam(":Estado",$EstadoAlumno);
		$consulta->bindParam(":ID_Status",$IDStatusAlunmno);
		$consulta->bindParam(":SedeAsistencia",$asistencia);
		$consulta->bindParam(":ID_Sede",$Sede);
		
		$consulta->bindParam(":TotalTalleres",$TotalTaller);
		$consulta->bindParam(":StatusActual",$StatusActual);
		$consulta->bindParam(":FuenteFinacimiento",$Finaciamiento);

		$consulta->bindParam(":id",$id);


		//Verifica si ha insertado los datos
		if ($consulta->execute()) 
		{
				//Si todo fue correcto muestra el resultado con exito;
			$_SESSION['message'] = 'Alumno Actualizado con exito';
			$_SESSION['message2'] = 'success';
			header("Location: ../../LIS-Alumnos.php");
		}
		else
		{
			$_SESSION['message'] = 'Alumno No Actualizdo';
			$_SESSION['message2'] = 'danger';
			header("Location: ../../LIS-Alumnos.php");
		}





	}

	?>