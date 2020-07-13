<?php
session_start();
include '../Conexion/conexion.php';
  if ($_GET["inscribir"]==1) {
    $verificar2="SELECT `Estado` FROM `alumnos` WHERE `ID_Alumno`='".$_GET['alumno']."'";
    $stmt5= $dbh->prepare($verificar2);
    $stmt5->execute();
    while ($fila3 = $stmt5->fetch()) {
      $estadoTalleres=$fila3["Estado"];
    }
    if ($estadoTalleres=='Activo') {
      // code...
      // code...
      $verificar="SELECT `Cupo` FROM `talleres` WHERE `ID_Taller`='".$_GET['taller']."'";
      $stmt4= $dbh->prepare($verificar);
      $stmt4->execute();

      $mesActual=date("m");

      $verificar3="SELECT COUNT(i.ID_Alumno) as cantidad FROM inscripciontalleres i JOIN talleres t ON t.ID_Taller=i.ID_Taller WHERE MONTH(t.Fecha)='".$mesActual."' AND i.ID_Alumno='".$_GET['alumno']."'";
      $stmt6= $dbh->prepare($verificar3);
      $stmt6->execute();

      $verificar4="SELECT COUNT(`ID_Taller`) AS inscrito FROM `inscripciontalleres` WHERE `ID_Taller`='".$_GET['taller']."' AND `ID_Alumno`='".$_GET['alumno']."'";
      $stmt7= $dbh->prepare($verificar4);
      $stmt7->execute();

      while ($fila2 = $stmt4->fetch()) {
        $total=$fila2["Cupo"];
      }

      while ($fila4 = $stmt6->fetch()) {
        $cantidad=$fila4["cantidad"];
      }

      while ($fila = $stmt7->fetch()) {
        $inscrito=$fila["inscrito"];
      }
      
      
    if($_GET["pagina"]=='AlumnoInscripcion'){
        if ($inscrito==0) {
        if ($cantidad<=3) {
          if ($total>=1) {
            $sql=$dbh->prepare("INSERT INTO inscripciontalleres VALUES (:ID_Alumno, :ID_Taller, 'En espera')");
            $sql->bindParam(':ID_Alumno',$_GET['alumno']);
            $sql->bindParam(':ID_Taller',$_GET['taller']);
            $sql->execute();

            $sql2 = "UPDATE talleres SET Cupo = Cupo-1 WHERE ID_Taller ='".$_GET['taller']."'";

            $stmt2 = $dbh->prepare($sql2);
            $stmt2->execute();
            header("Location: ".$_GET["pagina"].".php");
          }else {
            $_SESSION['message'] = 'Cupo lleno.';
            $_SESSION['message2'] = 'warning';
            header("Location: ".$_GET["pagina"].".php");
          }
        }else {
          $_SESSION['message'] = 'Tiene 3 talleres inscritos.';
          $_SESSION['message2'] = 'warning';
          header("Location: ".$_GET["pagina"].".php");
        }
      }else {
        $_SESSION['message'] = 'Ya está inscrito en este taller.';
        $_SESSION['message2'] = 'warning';
        header("Location: ".$_GET["pagina"].".php");
      }
      //Si viene de la pagina de talleres inscritos quitamos el limite de 3 talleres.
    }else if($_GET["pagina"]=='AlumnoInscritos'){
        if ($inscrito==0) {
          if ($total>=1) {
            $sql=$dbh->prepare("INSERT INTO inscripciontalleres VALUES (:ID_Alumno, :ID_Taller, 'En espera')");
            $sql->bindParam(':ID_Alumno',$_GET['alumno']);
            $sql->bindParam(':ID_Taller',$_GET['taller']);
            $sql->execute();

            $sql2 = "UPDATE talleres SET Cupo = Cupo-1 WHERE ID_Taller ='".$_GET['taller']."'";

            $stmt2 = $dbh->prepare($sql2);
            $stmt2->execute();
            header("Location: ".$_GET["pagina"].".php");
          }else {
            $_SESSION['message'] = 'Cupo lleno.';
            $_SESSION['message2'] = 'warning';
            header("Location: ".$_GET["pagina"].".php");
          }
      }else {
        $_SESSION['message'] = 'Ya está inscrito en este taller.';
        $_SESSION['message2'] = 'warning';
        header("Location: ".$_GET["pagina"].".php");
      }
    }


    }else {
      $_SESSION['message'] = 'No puede inscribir, usted ya se graduó.';
      $_SESSION['message2'] = 'warning';
      header("Location: ".$_GET["pagina"].".php");
    }




  }else if ($_GET["inscribir"]==0) {
    $command = "DELETE FROM inscripciontalleres WHERE ID_Alumno=:ID_Alumno AND ID_Taller=:ID_Taller";
    $stmt = $dbh ->prepare($command);
    $stmt->bindParam(':ID_Alumno',$_GET['alumno']);
    $stmt->bindParam(':ID_Taller',$_GET['taller']);
    $stmt->execute();
    $sql3 = "UPDATE talleres SET Cupo = Cupo+1 WHERE ID_Taller ='".$_GET['taller']."'";

    $stmt3 = $dbh->prepare($sql3);
    $stmt3->execute();
    header("Location: ".$_GET["pagina"].".php");
  }
?>
