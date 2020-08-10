<?php
require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

if (isset($_POST['Guardar_Datos'])) 

{
	// Declaración de variable
	$NombreSiglas = $_POST['siglas'];
	$NombreEmpresa= $_POST['NombreEmpresa'];
	$Opciones =$_POST['opciones'];
	$id=$_POST['id'];


	//Consulta de actualización de datos
	$consulta=$pdo->prepare("UPDATE empresas SET Tipo=:Tipo WHERE ID_Empresa=:id");
	$consulta->bindParam(":Tipo",$Opciones);
	$consulta->bindParam(":id",$id);


    //Verifica si ha insertado los datos
	if ($consulta->execute()) 
	{
									//Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Empresa Actualizado con exito';
		$_SESSION['message2'] = 'success';
		
	}
	else
	{
		$_SESSION['message'] = 'Empresa No Actualizdo';
		$_SESSION['message2'] = 'danger';
		
	}



    //Consulta para vericar si el alumno ya fue ingresado
	$consulta2=$pdo->prepare("SELECT ID_Empresa , Nombre  FROM empresas WHERE ID_Empresa = :ID_Empresa");
	$consulta2->bindParam(":ID_Empresa",$id);
	$consulta2->execute();
	
	//Variables para identificar si existe el correo o nombre
	$IdenSigla;
	$IdenNombre;

	if ($consulta2 ->rowCount()  >= 1) 
	{
		$fila = $consulta2->fetch();
		$IdenSigla = $fila['ID_Empresa'];
		$IdenNombre = $fila['Nombre'];
	}


	if ($IdenSigla != $NombreSiglas ) {
		

	 
	    $consulta3=$pdo->prepare("SELECT COUNT(ID_Empresa) AS 'existencia'  FROM empresas WHERE ID_Empresa = :ID_Empresa");
		$consulta3->bindParam(":ID_Empresa",$NombreSiglas);
		$consulta3->execute();

		$resulID;

		while ($fila3 = $consulta3->fetch()) 
		{
			$resulID = $fila3['existencia'];
		}

		if ($resulID >= 1) 
		{
			$_SESSION['message3'] = 'La sigla '. $NombreSiglas .' ya existe' ;
			$_SESSION['message4'] = 'danger';
			
			
		}else
		{
			//Consulta de actualización de datos
			$consulta4=$pdo->prepare("UPDATE empresas SET  ID_Empresa=:ID_Empresa  WHERE ID_Empresa=:id");
			$consulta4->bindParam(":ID_Empresa",$NombreSiglas);
			$consulta4->bindParam(":id",$id);
			$consulta4->execute();


			//Consulta de actualización de datos
			$consulta=$pdo->prepare("UPDATE empresas SET Tipo=:Tipo WHERE ID_Empresa=:id");
			$consulta->bindParam(":Tipo",$Opciones);
			$consulta->bindParam(":id",$id);


    //Verifica si ha insertado los datos
			if ($consulta->execute()) 
			{
									//Si todo fue correcto muestra el resultado con exito;
				$_SESSION['message'] = 'Empresa Actualizado con exito';
				$_SESSION['message2'] = 'success';

			}
			else
			{
				$_SESSION['message'] = 'Empresa No Actualizdo';
				$_SESSION['message2'] = 'danger';

	         }

			

		}


	}


	if ($IdenNombre != $NombreEmpresa ) 
	{
		
		$consulta5=$pdo->prepare("SELECT COUNT(Nombre) AS 'existencia2'  FROM empresas WHERE Nombre = :Nombre");
		$consulta5->bindParam(":Nombre",$NombreEmpresa);
		$consulta5->execute();

		$ResultNombre;

		while ($fila5 = $consulta5->fetch()) 
		{
			$ResultNombre = $fila5['existencia2'];
		}

		if ($ResultNombre >= 1) 
		{

			$_SESSION['message3'] = 'La empresa '. $NombreEmpresa .' ya existe' ;
			$_SESSION['message4'] = 'danger';

		}else
		{
		 	//Consulta de actualización de datos
			$consulta6=$pdo->prepare("UPDATE empresas SET  Nombre=:Nombre  WHERE ID_Empresa=:id");
			$consulta6->bindParam(":Nombre",$NombreEmpresa);
			$consulta6->bindParam(":id",$id);
			$consulta6->execute();


			//Consulta de actualización de datos
			$consulta=$pdo->prepare("UPDATE empresas SET Tipo=:Tipo WHERE ID_Empresa=:id");
			$consulta->bindParam(":Tipo",$Opciones);
			$consulta->bindParam(":id",$id);


    //Verifica si ha insertado los datos
			if ($consulta->execute()) 
			{
									//Si todo fue correcto muestra el resultado con exito;
				$_SESSION['message'] = 'Empresa Actualizado con exito';
				$_SESSION['message2'] = 'success';
				
			}
			else
			{
				$_SESSION['message'] = 'Empresa No Actualizdo';
				$_SESSION['message2'] = 'danger';
				
			}




			
		}

	}




header("Location: ../../SIT-CrearEmpresas.php");
}else
{
	$_SESSION['message'] = 'Datos No ingresados Form ActualizarEmpresa.php';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-CrearEmpresas.php");
}

?>