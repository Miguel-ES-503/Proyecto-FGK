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


  
    $consulta2=$pdo->prepare("SELECT alumnos.Nombre AS alumno , alumnos.Class, alumnos.Sexo, alumnos.ID_Sede, datos_modulos.id_alumno , datos_modulos.id, datos_modulos.id_modulo , empresas.Nombre FROM datos_modulos LEFT JOIN alumnos ON datos_modulos.id_alumno =  alumnos.ID_Alumno LEFT JOIN empresas ON empresas.ID_Empresa = alumnos.ID_Empresa WHERE datos_modulos.id_modulo = ?  AND datos_modulos.estado = 'Pendiente'  ");
  
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
                <td><input type='checkbox' name='ActuaAlumno[]' class='case' value=".$fila2['id_alumno']."></td>
                <th>".$fila2['id_alumno']."</th>
                <th>".$fila2['alumno']."</th>
                <th>".$fila2['Sexo']."</th>
                <th><input type='hidden' name='idtaller' id='idtaller' value=>".$fila2['Class']."</th>
                <th>".$fila2['ID_Sede']."</th>
                <th>".utf8_encode($fila2['Nombre'])."</th>
                <td><a href='AprobacionModulos/aprobarmodulo3.php?id=".$fila2['id']."&id2=".$fila2['id_alumno']."' name='ida' class='btn'><i class='fas fa-check-circle fa-2x'></i></a> </td>
  
                <td><a href='ReprobarModulos/reprobarmodulo3.php?id=".$fila2['id']."&id2=".$fila2['id_alumno']."'  class='btn'><i class='fas fa-times-circle fa-2x'></i></a> </td>";
              }
            
           
?>