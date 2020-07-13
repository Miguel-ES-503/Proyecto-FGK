<?php
require_once "../../../BaseDatos/conexion.php";


if(isset($_POST['retirar']))
{	
	
//variables de campos soli transporte
//$Id_Solicitud=$_POST['idsol'];
$estado= "Retirada";
$expediente=$_POST['expediente'];
$idMateria=$_POST['idmaterias'];


  $consultaIC=$pdo->prepare("SELECT IM.Id_InscripcionC, IM.Id_InscripcionM , M.estadoM
                             FROM inscripcionmateria  IM INNER JOIN materias M
                             ON M.idMateria = IM.idMateria
                             WHERE M.idExpedienteU = :idExpedienteU AND IM.idMateria= :idMateria ");

       $consultaIC->bindParam(":idExpedienteU",$expediente );
       $consultaIC->bindParam(":idMateria",$idMateria);

       //$consultaIC->execute();
        $consultaIC->execute();
        $Id_InscripcionC;
        $Id_InscripcionM;


        if ($consultaIC->rowCount()>=1)
          {
          while ($fila=$consultaIC->fetch())
           {   
            $Id_InscripcionC = $fila['Id_InscripcionC'];
            $Id_InscripcionM = $fila['Id_InscripcionM'];
            $estadoM= $fila['estadoM'];
           }
         }

        

         $consulta2=$pdo->prepare("UPDATE inscripcionmateria SET estado= 'Retirada' WHERE Id_InscripcionM=:Id_InscripcionM AND idMateria=:idMateria AND Id_InscripcionC=:Id_InscripcionC AND estadoM=:estadoM)");

         $consulta2->bindParam(":Id_InscripcionM", $Id_InscripcionM);
          $consulta2->bindParam(":idMateria", $idMateria);
           $consulta2->bindParam(":Id_InscripcionC", $Id_InscripcionC);
           $consulta2->bindParam(":Id_InscripcionC", $estadoM);

           //$consulta2->execute();



           $consulta3=$pdo->prepare("UPDATE materias SET estadoM= 'Retirada' WHERE idExpedienteU=:idExpedienteU AND idMateria=:idMateria");
           $consulta3->bindParam(":idExpedienteU", $expediente);
            $consulta3->bindParam(":idMateria", $idMateria);
            //$consulta3->execute();


            if ($consulta2->execute()&&$consulta3->execute()) 
           {
                
                                                 
                       header("Location: ../../RetiroMateria.php");
                        echo "Funciona"; 
            }
                else
                {                               
                       header("Location: ../../RetiroMateria.php");
                        echo "No se puedo guardar el dato"; 

                }






}
else
{
        echo "dATOS NO RECIBIDO";
}















?>