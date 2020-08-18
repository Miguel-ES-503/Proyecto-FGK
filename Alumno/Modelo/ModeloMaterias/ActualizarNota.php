<?php
require_once "../../../BaseDatos/conexion.php";


//Guardar solicitud
if(isset($_POST['Actualizar_Notas']))
{

    //Declaracion de variables
    $idMateria=$_POST['materia'];
    $nota=$_POST['nota'];
    $estado=$_POST['estado'];

    $idInscripcionCiclo=$_POST['idInscripcionCiclo'];
    $idInscripcionM=$_POST['idInscripcionM'];
    $idExpedienteU=$_POST['expedienteu'];


    	//consulta para poner estado inscrito
     $consulta2=$pdo->prepare("UPDATE `inscripcionmateria` SET `nota`= :nota , estado = :estado WHERE Id_InscripcionM = :Id_InscripcionM and idMateria = :idMateria and Id_InscripcionC= :Id_InscripcionC");
    
     $consulta2->bindParam(':Id_InscripcionM',$idInscripcionM);
     $consulta2->bindParam(':idMateria',$idMateria);
     $consulta2->bindParam(':nota',$nota);
     $consulta2->bindParam(':estado',$estado);
    $consulta2->bindParam(':Id_InscripcionC',$idInscripcionCiclo);


    $consulta3=$pdo->prepare("UPDATE `materias` SET `estadoM`= :estadoM WHERE idExpedienteU = :idExpedienteU and idMateria = :idMateria");
    
    $consulta3->bindParam(':idMateria',$idMateria);
    $consulta3->bindParam(':idExpedienteU',$idExpedienteU);
    $consulta3->bindParam(':estadoM',$estado);


   

    //if ($consulta2->execute() && $consulta3->execute()) 
    if ($consulta2->execute()) 
	   {  
       $consulta3->execute();
	   	
       	header("Location: ../../Notas.php?id=".$idInscripcionCiclo);
       echo "Funciona";
	   		
	   		
	    }
		else
		{			 	
		header("Location: ../../Notas.php?id=".$idInscripcionCiclo);

		echo " No Funciona";
		}







}
else
{
  echo "DATOS NO RECIBIDO";
}

     
       

    	 
        

          






 
    

?>