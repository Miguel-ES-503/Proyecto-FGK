<?php

require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

if (isset($_POST['Guardar_Carrera']))
{
	//Declaración de variables
	$CodCarrera = $_POST['Codigo'];
	$NomCarrera =  utf8_decode($_POST['NomCarr']);
	$DurCarrera =  utf8_decode($_POST['duracion']);
	$NomFaculta = utf8_decode($_POST['Faculta']);
	

	$consulta=$pdo->prepare("SELECT * FROM carrera WHERE nombre = ?" );
	$consulta->execute(array($NomCarrera));

	$NonbreCarrera;
	if ($consulta->rowCount()>=1)
	{
		while ($fila=$consulta->fetch()) 
		{
			$NonbreCarrera =$fila['nombre'];
		}
	}
	

	if ($NonbreCarrera == $NomCarrera ) 
	{
		$_SESSION['message'] = 'Ya existe la carrera con el nombre ' .$NomCarrera;
		$_SESSION['message2'] = 'danger';
		header("Location: ../../SIT-CrearCarrera.php");
	}
	else
	{

		$string = $NomCarrera;
		function initials($str) 
		{
			$ret = ''; foreach (explode(' ', $str) as $word) $ret .= strtoupper($word[0]); return $ret; 
		} 
    	    $SiglaCarrera  = initials($string);


    	    $consulta3=$pdo->prepare("INSERT INTO carrera (Id_Carrera,nombre,Duracion,ID_Facultades) VALUES ('".$SiglaCarrera."','".$NomCarrera."','".$DurCarrera."',:id )");
    	    $consulta3->bindParam(':id',$NomFaculta);

    	    if (!$consulta3->execute()) 
    	    {
    	    	$_SESSION['message'] = 'Fallo al Guardar Carrera';
    	    	$_SESSION['message2'] = 'danger';
    	    	header("Location: ../../SIT-CrearCarrera.php");
    	    }
    	    else
    	    {			 	
    	    	$_SESSION['message'] = 'Carrera Creada con exito';
    	    	$_SESSION['message2'] = 'success';
    	    	header("Location: ../../SIT-CrearCarrera.php");
    	    }

    	}
    	


    }else
    {
    	$_SESSION['message'] = 'Datos No ingresados Form GuardarDatosCarreras.php';
    	$_SESSION['message2'] = 'danger';
    	header("Location: ../../SIT-CrearCarrera.php");
    }


