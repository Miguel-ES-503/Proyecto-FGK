<?php

require_once "../../../BaseDatos/conexion.php";

session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];
if (isset($_POST['Guardar_Carrera'])) 
{
	//Declaración de variables
	$CodCarrera = $_POST['Codigo'];
	$NomCarrera = utf8_decode($_POST['NomCarr']);
	$DurCarrera = utf8_decode($_POST['duracion']);
	$NomFaculta = utf8_decode($_POST['Faculta']);
	$IDcarrera = utf8_decode($_POST['id']);
	



	$consulta2=$pdo->prepare("SELECT * FROM carrera WHERE Id_Carrera = ?" );
	$consulta2->execute(array($IDcarrera));

	$NonbreCarrera;
	$CodigoCarrera;
	if ($consulta2->rowCount()>=1)
	{
		while ($fila2=$consulta2->fetch()) 
		{
			$NonbreCarrera =$fila2['nombre'];
			$CodigoCarrera =$fila2['Id_Carrera'];
		}
	}

   

   if($NonbreCarrera != $NomCarrera)
   {

   	  //Consulta de actualización de datos
	  $consulta5=$pdo->prepare("SELECT COUNT(`nombre`) as 'existencia' FROM carrera where `nombre` = ?");
	  $consulta5->execute(array($NomCarrera));
	  
	  $result; 
	  if ($consulta5 ->rowCount()  >= 1) 
	  {
	  	$fila3 = $consulta5->fetch();
	  	$result = $fila3['existencia'];

	  }

	    if($result >= 1)
	    {

		$_SESSION['message3'] = 'Nombre de la carrera ya existe';
		$_SESSION['message4'] = 'danger';
	    }
	    else
	    {
	    	 //Consulta de actualización de datos
	    	$consulta4=$pdo->prepare("UPDATE carrera SET nombre=:nombre WHERE Id_Carrera=:id ");
	    	$consulta4->bindParam(":nombre",$NomCarrera);
	    	$consulta4->bindParam(":id",$IDcarrera);
	    	$consulta4->execute();

	    	//Consulta de actualización de datos
	    	$consulta=$pdo->prepare("UPDATE carrera SET Id_Carrera=:Id_Carrera,Duracion=:Duracion,ID_Facultades=:ID_Facultades WHERE Id_Carrera=:id ");
	    	$consulta->bindParam(":Id_Carrera",$CodCarrera);
	    	$consulta->bindParam(":Duracion",$DurCarrera);
	    	$consulta->bindParam(":ID_Facultades",$NomFaculta);
	    	$consulta->bindParam(":id",$IDcarrera);

	//Verifica si ha insertado los datos
	    	if ($consulta->execute()) 
	    	{
		//Si todo fue correcto muestra el resultado con exito;
	    		$_SESSION['message'] = 'Carrera Actualizado con exito';
	    		$_SESSION['message2'] = 'success';
	    		header("Location: ../../SIT-CrearCarrera.php");
	    	}
	    	else
	    	{
	    		$_SESSION['message'] = 'Carrera No Actualizdo sigla en existencia';
	    		$_SESSION['message2'] = 'danger';
	    		header("Location: ../../SIT-CrearCarrera.php");
	    	}
	    }
	     

   }
	

	//Consulta de actualización de datos
	$consulta=$pdo->prepare("UPDATE carrera SET Id_Carrera=:Id_Carrera,Duracion=:Duracion,ID_Facultades=:ID_Facultades WHERE Id_Carrera=:id ");
	$consulta->bindParam(":Id_Carrera",$CodCarrera);
	$consulta->bindParam(":Duracion",$DurCarrera);
	$consulta->bindParam(":ID_Facultades",$NomFaculta);
	$consulta->bindParam(":id",$IDcarrera);

	//Verifica si ha insertado los datos
	if ($consulta->execute()) 
	{
		//Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Carrera Actualizado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../SIT-CrearCarrera.php");
	}
	else
	{
		$_SESSION['message'] = 'Carrera No Actualizdo sigla en existencia';
		$_SESSION['message2'] = 'danger';
		header("Location: ../../SIT-CrearCarrera.php");
	}

	}

else
{
	$_SESSION['message'] = 'Datos No ingresados Form ActualizarCarrera.php';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-CrearCarrera.php");
}	

?>