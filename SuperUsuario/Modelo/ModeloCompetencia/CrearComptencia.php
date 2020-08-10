<?php 


require_once "../../../BaseDatos/conexion.php";
session_start();  


if (isset($_POST['CrearCompetencia'])) {
	

	
	$NombreCompetencia = utf8_decode($_POST['comptencia']);

	$consulta2=$pdo->prepare("SELECT * FROM competencias WHERE Nombre = ? ");
	$consulta2->execute(array($NombreCompetencia));
	$Identificacion;

if ($consulta2->rowCount()>=1)
{
	while ($fila=$consulta2->fetch()) {

		$Identificacion = $fila['Nombre'];

		
	}//fin de while
}// in del if

    if($Identificacion == $NombreCompetencia )
    {
    	$_SESSION['message'] = $NombreCompetencia .' en existencia';
	  	$_SESSION['message2'] = 'danger';
	  	header("Location: ../../SIT-Competencias.php"); 

    }
    else
    {

    	$string = $NombreCompetencia;
    	function initials($str) 
    	{
    		$ret = ''; foreach (explode(' ', $str) as $word) $ret .= strtoupper($word[0]); return $ret; 
    	} 

         $SiglaComptencia  = initials($string);


	//Prepara la  consulta para insertar un dato
     $consulta=$pdo->prepare("INSERT INTO competencias (IDComptenecia,Nombre) VALUES(:IDComptenecia,:Nombre)");
     $consulta->bindParam(':IDComptenecia',$SiglaComptencia);
     $consulta->bindParam(':Nombre',$NombreCompetencia);



	  if (!$consulta->execute()) // Si los datos no fueron correcto Nos dira en una alerta
	  {
	  	$_SESSION['message'] = 'Fallo al Guardar Competencia';
	  	$_SESSION['message2'] = 'danger';
	  	header("Location: ../../SIT-Competencias.php"); 
	  } else
	  {	
				    //Si todo fue correcto muestra el resultado con exito;
	  	$_SESSION['message'] = 'Competencia Guardado con exito';
	  	$_SESSION['message2'] = 'success';
	  	header("Location: ../../SIT-Competencias.php"); 
	  }


    }
    


	}
	else
	{
	    $_SESSION['message'] = 'Datos no entrando';
	  	$_SESSION['message2'] = 'danger';
	  	header("Location: ../../SIT-Competencias.php"); 
	}

	?>