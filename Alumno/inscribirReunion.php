<?php
session_start();
include '../Conexion/conexion.php';
  if ($_POST["inscribir"]==1) {

    $verificar="SELECT `IDHorRunion`, `ID_Reunion`, `Canitdad` FROM `horariosreunion` WHERE `ID_Reunion`='".$_POST['reunion']."' AND `IDHorRunion`= '".$_POST['horario']."'";
    $query=$dbh->prepare($verificar);
    $query->execute();
    while ($fila = $query->fetch()) {
      $cupo=$fila["Canitdad"];
    }
    if ($cupo>0) {
      $sql=$dbh->prepare("INSERT INTO inscripcionreunion VALUES (:id_alumno, :id_reunion, :Horario, :telefono, 'En espera')");
      $sql->bindParam(':id_alumno',$_POST['alumno']);
      $sql->bindParam(':id_reunion',$_POST['reunion']);
      $sql->bindParam(':Horario',$_POST['horario']);
      $sql->bindParam(':telefono',$_POST['telefono']);
      $sql->execute();

      $sql2 = "UPDATE horariosreunion SET Canitdad = Canitdad-1 WHERE IDHorRunion ='".$_POST['horario']."'";

      $stmt2 = $dbh->prepare($sql2);
      $stmt2->execute();
      header("Location: HorariosReunion.php?id=".$_POST['reunion']."");
    }else {
      $_SESSION['message'] = 'Cupo lleno en este horario.';
      $_SESSION['message2'] = 'danger';
      header("Location: HorariosReunion.php?id=".$_POST['reunion']."");
    }



  }else if ($_POST["inscribir"]==0) {
    $command = "DELETE FROM inscripcionreunion WHERE id_alumno=:id_alumno AND id_reunion=:id_reunion";
    $stmt = $dbh ->prepare($command);
    $stmt->bindParam(':id_alumno',$_POST['alumno']);
    $stmt->bindParam(':id_reunion',$_POST['reunion']);
    $stmt->execute();
    $sql3 = "UPDATE horariosreunion SET Canitdad = Canitdad+1 WHERE IDHorRunion ='".$_POST['horario']."'";

    $stmt3 = $dbh->prepare($sql3);
    $stmt3->execute();
    header("Location: HorariosReunion.php?id=".$_POST['reunion']."");
  }
?>
