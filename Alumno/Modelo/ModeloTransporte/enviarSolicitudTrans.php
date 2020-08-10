<?php
require_once "../../../BaseDatos/conexion.php";


if(isset($_POST['Crarsoli']))
{	
	
//variables de campos soli transporte
$Id_Solicitud=$_POST['idsol'];
$estado= "En espera";
$totalSolicitado=$_POST['costototal'];

 $consulta2=$pdo->prepare("UPDATE `solitransporte` SET `totalSolicitado`= :totalSolicitado ,`estado`= :estado WHERE `idSoliTrans` = :idSoliTrans ");


        $consulta2->bindParam(":totalSolicitado",$totalSolicitado );
        $consulta2->bindParam(":estado",$estado );
        $consulta2->bindParam(":idSoliTrans",$Id_Solicitud);

        if ($consulta2->execute()) {

        header("Location: ../../inscripcionTransporte.php");

        }else
        {
        	echo "FAllo al actualizar en la base de datos";
        }

}
?>