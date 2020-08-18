<?php
require_once "../../../BaseDatos/conexion.php";




//Guardar solicitud
if(isset($_POST['Inscribir_Materia']))
{ 
  
    	//consulta para poner estado inscrito
     $consulta2=$pdo->prepare("UPDATE `materias` SET `estadoM`= '' WHERE idExpedienteU = :idExpedienteU and idMateria = :idMateria");
    
     $consulta2->bindParam(':idMateria',$idMateria);
     $consulta2->bindParam(':idExpedienteU',$idExpedienteU);


      //consulta para insertar solicitud de transporte 
    $consulta=$pdo->prepare("INSERT INTO `inscripcionmateria`(`Id_InscripcionM`, `idMateria`, `Id_InscripcionC`, `nota`, `matricula`, `estado`) VALUES(:Id_InscripcionM,:idMateria,:Id_InscripcionC,0,:matricula,'Inscrita')");

    $consulta->bindParam(':Id_InscripcionM',$InscripcionMateria);
    $consulta->bindParam(':idMateria',$idMateria);
    $consulta->bindParam(':Id_InscripcionC',$Id_InscripcionC);
    $consulta->bindParam(':matricula',$Matricula);


    /*$consulta3=$pdo->prepare("UPDATE `inscripcionciclos` SET `cicloU`= :cicloU  WHERE `Id_InscripcionC` = :Id_InscripcionC ");
    $consulta3->bindParam(':cicloU',$CicloU);
    $consulta3->bindParam(':Id_InscripcionC',$Id_InscripcionC);*/


 
if ($consulta->execute() && $consulta2->execute()) 
	   {
	   	
       	header("Location: ../../InscripcionMateriasCiclo.php?id=".$Id_InscripcionC);
       echo "Funciona";
	   		
	   		
	    }
		else
		{			 	
		header("Location: ../../InscripcionMateriasCiclo.php?id=".$Id_InscripcionC);

		echo " No Funciona";
		}







}
else
{
  echo "DATOS NO RECIBIDO";
}






?>