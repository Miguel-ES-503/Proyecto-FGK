<?php

session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];



$InicialDep = $varLugar [0]; // Extraemos la primera letra
$FinalDep = $varLugar [1]; // Extraemos la segunda letra

//Concatenamos
$FullTime = "FT";
$Sabatino = "SAT";

$LugarFT=$InicialDep . $FinalDep . $FullTime; //Ejemplo SSFT
$LugarSAT=$InicialDep . $FinalDep .$Sabatino; //Ejemplo SSSAT

$stmt1 =$dbh->prepare("SELECT `ID_Alumno` , a.`Nombre` , `Class` ,  e.ID_Empresa ,  e.Nombre AS 'Universidad' , `ID_Sede` , s.Nombre AS 'Status' , StatusActual FROM alumnos a inner join status s on a.`ID_Status` = s.`ID_Status` LEFT JOIN empresas e on a.ID_Empresa = e.ID_Empresa WHERE SedeAsistencia = ? OR SedeAsistencia =  ?   ");
// Ejecutamos
$stmt1->execute(array($LugarFT,$LugarSAT));

$fechaActual=date("Y-m-d");
//Extraemos el ciclo
$stmt2 =$dbh->prepare("SELECT `ID_Ciclo` FROM `ciclos` WHERE `Fechanicio`<='".$fechaActual."' AND `FechaFinal`>='".$fechaActual."'");
// Ejecutamos
$stmt2->execute();

while($fila2 = $stmt2->fetch()){
	$cicloActual=$fila2["ID_Ciclo"];
}



//Total de talleres externaos
  $consulta5=$dbh->prepare("SELECT COUNT(ID_Taller) AS TotalExterna FROM talleres tal inner join empresas emp on tal.ID_Empresa = emp.ID_Empresa WHERE emp.Tipo = 'Empresa Externa' AND `ID_Ciclo`='".$cicloActual."'");
  $consulta5->execute();
  $TotalEmpresasExterna;

  if ($consulta5->rowCount() >=0)
  {
  	$fila5=$consulta5->fetch();
  	$TotalEmpresasExterna = $fila5['TotalExterna'];
  }




//Ejecutamos la consulta

while($fila = $stmt1->fetch()){

  $id=$fila["ID_Alumno"];
  $IDEmpresaAlumno = $fila['ID_Empresa'];



    //Total de reuniones en la universidad correspodiente.
  $consulta4=$dbh->prepare("SELECT COUNT(`ID_Reunion`) AS TotalReunion FROM reuniones WHERE  ID_Empresa = ? AND `ID_Ciclo`='".$cicloActual."'");
  $consulta4->execute(array($IDEmpresaAlumno));
  $TotalReuniones =0;

  if ($consulta4->rowCount() >=0)
  {
  	$fila4=$consulta4->fetch();
  	$TotalReuniones = $fila4['TotalReunion'];
  }


  //Horas sociales
	$consulta6=$dbh->prepare("SELECT * FROM hsociales where ID_Alumno = :IdAlumno AND `ID_Ciclo`='".$cicloActual."' AND `estado`='Aprobado'");
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



//Inicio de consulta de  consulta para obtener la asistencia del alumno

	//Talleres internos asistitdos
	$consulta7=$dbh->prepare("SELECT COUNT(ID_Alumno) as 'TotalTallerAlumno' FROM inscripciontalleres INSCT INNER JOIN talleres TAL ON INSCT.ID_Taller = TAL.ID_Taller WHERE TAL.ID_Empresa = 'FGK' AND ID_Alumno = ? AND `Asistencia` = 'Asistio' AND TAL.ID_Ciclo='".$cicloActual."'");
	$consulta7->execute(array($id));
	$TotalTalleresAlumno ='';

	if ($consulta7->rowCount() >=0)
	{
		$fila7=$consulta7->fetch();
		$TotalTalleresAlumno = $fila7['TotalTallerAlumno'];
	}


	//Reuniones universidad asistidos
	$consulta8=$dbh->prepare("SELECT COUNT(ID_Alumno) AS TotalReunionAlumno FROM inscripcionreunion inre JOIN reuniones re ON re.ID_Reunion=inre.id_reunion where ID_Alumno = ?  AND  Asistencia = 'Asistio' AND re.ID_Ciclo='".$cicloActual."'");
	$consulta8->execute(array($id));
	$TotalReunionAlumno =0;

	if ($consulta8->rowCount() >=0)
	{
		$fila8=$consulta8->fetch();
		$TotalReunionAlumno = $fila8['TotalReunionAlumno'];
	}


		//talleres externos asistidos
	$consulta9=$dbh->prepare("SELECT COUNT(ID_Alumno) as 'TotalReuniAlu' FROM inscripciontalleres INCT inner JOIN talleres TAL on INCT.ID_Taller = TAL.ID_Taller LEFT JOIN empresas EMP ON TAL.ID_Empresa = EMP.ID_Empresa WHERE ID_Alumno = ? AND EMP.Tipo = 'Empresa Externa' AND Asistencia = 'Asistio' AND TAL.ID_Ciclo='".$cicloActual."'");
	$consulta9->execute(array($id));
	$TotalExternaTallerAlumno ='';

	if ($consulta9->rowCount() >=0)
	{
		$fila9=$consulta9->fetch();
		$TotalExternaTallerAlumno = $fila9['TotalReuniAlu'];
	}


	  //Extraemos si su estado es graduado o activo y así lo le quitamos los talleres.
	$consulta16=$dbh->prepare("SELECT `Estado` FROM `alumnos` WHERE `ID_Alumno`='".$id."'");
	$consulta16->execute();
	$estadoTalleres='';
	if ($consulta16->rowCount() >=0)
	{
		$linea3=$consulta16->fetch();
		$estadoTalleres = $linea3['Estado'];
	}
	if ($estadoTalleres=='Graduado') {
		$TotalTalleresAlumno=15;
	}

//Sacar el promedio de beca del alumno
	$PorcentajeTallerAlumno = ( ($TotalTalleresAlumno * 40) / 15 );
	$PorecentajeReunionAlumno = (($TotalReunionAlumno * 20) / $TotalReuniones );
	$PorcetnajeTalleresExterna = (($TotalExternaTallerAlumno * 20) /  $TotalEmpresasExterna);
	$porcentajeHoras=(($HorasSociales*20)/40);
	//Antes de sacar promedio verificamos que ninguno sea de nulo o NaN para que no de problemas el promedio final.
	if(is_nan($PorcentajeTallerAlumno)){
      $PorcentajeTallerAlumno=0;
      }
      if($TotalReuniones==0){
          $PorecentajeReunionAlumno=20;
      }else if(is_nan($PorecentajeReunionAlumno)){
          $PorecentajeReunionAlumno=0;
      }
      if($TotalEmpresasExterna==0){
          $PorcetnajeTalleresExterna=20;
      }else if(is_nan($PorcetnajeTalleresExterna)){
          $PorcetnajeTalleresExterna=0;
      }
      if(is_nan($porcentajeHoras)){
          $porcentajeHoras=0;
      }
	$Promedio = ($PorcentajeTallerAlumno +  $PorecentajeReunionAlumno + $PorcetnajeTalleresExterna + $porcentajeHoras);

	$EstadoBeca='';

	if ($Promedio >= 75 ){

		$EstadoBeca = 'Aprobado';
	}
	else if ($Promedio < 75)
	{
		$EstadoBeca = 'Reprobado';
	}else if (is_nan($Promedio)) {
		$Promedio=0;
		$EstadoBeca='Reprobado';
	}

	


 $resultol =  $TotalTalleresAlumno +  $TotalExternaTallerAlumno + $TotalReunionAlumno;
        


	

  $consulta15=$dbh->prepare("SELECT s.Nombre AS nombreEstado FROM alumnos a JOIN status s ON a.ID_Status=s.ID_Status WHERE `ID_Alumno`='".$id."'");
  $consulta15->execute();
  $estadoLaboral='';
  if ($consulta15->rowCount() >=0)
  {
  	$linea2=$consulta15->fetch();
  	$estadoLaboral = $linea2['nombreEstado'];
  }

   if ($estadoLaboral=='Estudiando-Pasantias' || $estadoLaboral=='Estudiando y Trabajando' || $estadoLaboral=='Pasantias' || $estadoLaboral=='Trabajando' || $estadoLaboral=='Pausa de estudio') 
   {
   		$Promedio = 100;
   		$EstadoBeca = "Aprobado";
   		$TotalTalleresAlumno = "-";
   		$TotalExternaTallerAlumno = "-";
   		$TotalReunionAlumno = "-";
   		$resultol = "-";
   		$HorasSociales = "-";

   }



   if ($EstadoBeca == "Reprobado") {
   	$EstadoBecaFinal = 'Reprobado';
   }
   else
   {
   	$EstadoBecaFinal = 'Aprobado';
   }



   if($Promedio >= 100 )
   {
   	$Promedio = 100;
   }

   if($Promedio >= 75)
   {
   	$PorcentajeColor = round($Promedio,2);
   }
   else if($Promedio >= 50 && $Promedio < 74  )
   {
   	$PorcentajeColor = round($Promedio,2);
   }
   else
   {
   	$PorcentajeColor = round($Promedio,2);
   }


   if($TotalTalleresAlumno >= 0 && $TotalTalleresAlumno  < 8)
   {
   		$TotalInterno = '<p style="color: red; text-align: center;">'.$TotalTalleresAlumno.'  </p>';
   }else if($TotalTalleresAlumno >= 8 && $TotalTalleresAlumno  < 14)
   {
   	     $TotalInterno = '<p style="color: orange; text-align: center;">'.$TotalTalleresAlumno.'  </p>';
   }
   else
   {
   	    $TotalInterno = '<p style="color: green; text-align: center;"><b>'.$TotalTalleresAlumno.'</b> </p>';
   }






		echo "
		<tr class='table-light'>
		<td>".$fila['ID_Alumno']."</td>
		<td>".$fila['Nombre']."</td>
		<td>".$fila['Class']."</td>
		<td>".$fila['ID_Sede']."</td>
		<td class= 'colorcito' >".utf8_encode($fila['Universidad'])."</td>
		<td>".$fila['Status']."</td>
		<td>".$fila['StatusActual']."</td>
		<td>".$TotalInterno."</td>
		<td>".$TotalExternaTallerAlumno."/".$TotalEmpresasExterna."</td>
		<td>".$TotalReunionAlumno."/".$TotalReuniones."</td>
		<td>".$resultol."</td>
		<td >".$HorasSociales."</td>
		<td >".$PorcentajeColor ." </td>
		<td>".$EstadoBecaFinal."</td>
	
		</tr>";
     





}

	
	?>