<?php

  	// Consulta para extrear la informacion del alumno
      $consulta=$dbh->prepare("SELECT ID_Alumno, Class , correo , car.nombre as'carrera', uni.Nombre as 'universidad' , Sexo , Estado , ID_Sede , alu.Nombre , alu.ID_Empresa , StatusActual , FuenteFinacimiento , TotalTalleres FROM alumnos alu INNER JOIN carrera car on alu.ID_Carrera = car.Id_Carrera LEFT JOIN empresas uni on alu.ID_Empresa = uni.ID_Empresa WHERE ID_Alumno = :ID_Alumno");
      $consulta->bindParam(":ID_Alumno",$id);
      $consulta->execute();
  
  
      // extraemos el datos correspodiente del alumno
      $Nombre_Alumno = '' ;
      $Carnet = '';
      $Carrera = '';
      $Estado = ''; //Pediente
      $promocion = '';
      $ciclo = '';
      $univerisdad = '';
  
      $idUniversidad = '';
  
      $Correo = '';
  
      $StatusActualAlu = '';
      $finaciamiento = '';
  
      $HistoricoTaller;
  
  
      if ($consulta->rowCount() >=0)
      {
          $fila=$consulta->fetch();
  
          $Nombre_Alumno = $fila['Nombre'];
          $Carnet = $fila['ID_Alumno'];
          $Carrera = $fila['carrera'];
          $Estado =   $fila['Estado'];
          $promocion = $fila['Class'];
          $univerisdad = $fila['universidad'];
          $Correo = $fila['correo'];
          $idUniversidad = $fila['ID_Empresa'];
          $StatusActualAlu = $fila['StatusActual'];
          $finaciamiento = $fila['FuenteFinacimiento'];
          $HistoricoTaller =$fila['TotalTalleres'];
      }
  
  
      //Extraemos la foto del alumno
  
      $FotoAlumno = '';
      $IDusuario ='';
  
      $consulta2=$dbh->prepare("SELECT * FROM usuarios where correo = :IdAlumno");
      $consulta2->bindParam(":IdAlumno", $Correo);
      $consulta2->execute();
  
      if ($consulta2->rowCount() >=0)
      {
          $fila2=$consulta2->fetch();
          $FotoAlumno = $fila2['imagen'];
          $IDusuario = $fila2['IDUsuario'];
      }
  
      //Total de larreles oportunidades
      $consulta3=$dbh->prepare("SELECT COUNT(ID_Taller) AS Total FROM talleres WHERE ID_Empresa = 'FGK' AND `ID_Ciclo`='".$cicloActual."'");
      $consulta3->execute(array($id));
      $TotalTalleres ='';
  
      if ($consulta3->rowCount() >=0)
      {
          $fila3=$consulta3->fetch();
          $TotalTalleres = $fila3['Total'];
      }
  
  
      //Total de reuniones en la universidad correspodiente.
      $consulta4=$dbh->prepare("SELECT COUNT(`ID_Reunion`) AS TotalReunion FROM reuniones WHERE  ID_Empresa = ? AND `ID_Ciclo`='".$cicloActual."'");
      $consulta4->execute(array($idUniversidad));
      $TotalReuniones =0;
  
      if ($consulta4->rowCount() >=0)
      {
          $fila4=$consulta4->fetch();
          $TotalReuniones = $fila4['TotalReunion'];
      }
  
      //Total de talleres externaos
      $consulta5=$dbh->prepare("SELECT COUNT(ID_Taller) AS TotalExterna FROM talleres tal inner join empresas emp on tal.ID_Empresa = emp.ID_Empresa WHERE emp.Tipo = 'Empresa Externa' AND `ID_Ciclo`='".$cicloActual."'");
      $consulta5->execute();
      $TotalEmpresasExterna ='';
  
      if ($consulta5->rowCount() >=0)
      {
          $fila5=$consulta5->fetch();
          $TotalEmpresasExterna = $fila5['TotalExterna'];
      }
  
  
      //Horas sociales
      $consulta6=$dbh->prepare("SELECT * FROM hsociales where ID_Alumno = :IdAlumno  AND `estado`='Aprobado'");
      $consulta6->bindParam(":IdAlumno", $id);
      $consulta6->execute();
  
      $HorasSociales = 0;
  
      if ($consulta6->rowCount() >0)
      {
          $fila6=$consulta6->fetch();
  
          if ($fila6['CantidadH'] != null) {
              $HorasSociales = $fila6['CantidadH'];
          }else
          {
              $HorasSociales = 0;
          }
  
  
      }
  
  
      // FIN DEL LAS CONSULTAS DE DATOS
  
?>
