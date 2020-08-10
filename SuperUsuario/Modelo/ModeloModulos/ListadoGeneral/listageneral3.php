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

//$Lugar2="SSSAT";
//<td><input type='checkbox' name='ActuaAlumno[]' class='case' value=".$fila['ID_Alumno']."></td>

	// Consulta De La BASE DE DATOS


    $consulta2=$pdo->prepare("SELECT alumnos.Nombre AS alumno , alumnos.Class, alumnos.Sexo, alumnos.EstadoCerti, datos_modulos.id_alumno , datos_modulos.id, datos_modulos.id_modulo , datos_modulos.estado, empresas.Nombre FROM datos_modulos LEFT JOIN alumnos ON datos_modulos.id_alumno =  alumnos.ID_Alumno LEFT JOIN empresas ON empresas.ID_Empresa = alumnos.ID_Empresa WHERE datos_modulos.id_modulo = ? AND (datos_modulos.estado = 'Aprobado' OR datos_modulos.estado = 'Reprobado') ");
  
               $consulta2->execute(array('MOD30000003'));
                while ($fila2=$consulta2->fetch())
                  {   
  
                    $asiste;
                  if($fila2['estado'] == "Pendiente")
                  {
                    $asiste = "Aprobado";
                  }else
                  {
                    $asiste = $fila2['Reprobado'];
                  } 
                    echo "
                <tr class='table-light'>
                <th>".$fila2['id_alumno']."</th>
                <th>".$fila2['alumno']."</th>
                <th>".$fila2['Sexo']."</th>
                <th><input type='hidden' name='idtaller' id='idtaller' value=>".$fila2['Class']."</th>
                <th>".utf8_encode($fila2['Nombre'])."</th>
                <th>".$fila2['estado']."</th>
                <th>".$fila2['EstadoCerti']."</th>";

  
              }
            
           
?>