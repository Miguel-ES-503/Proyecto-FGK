<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Aprobar módulos</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel="stylesheet" type="text/css" href="css/Aprobar-Modulos.css">
<div class="title">
  <a href="javascript:history.back();" ><img src="../img/back.png" class="icon"></a>
    
    <h2 class="main-title" >Aprobar/Reprobar Módulos</h2>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center" id="main">
  <nav class="nav flex-column" id="nav">
    <h2 class="title-1">Menu</h2>
  <a class="nav-link" href="AprobarModulos.php">Módulo C1</a>
  <a class="nav-link" href="modulo2.php">Módulo C2</a>
  <a class="nav-link" href="modulo3.php">Módulo B1</a>
  <a class="nav-link" href="modulo4.php">Modulo B2</a>
   <a class="nav-link" href="modulo5.php">Módulo A1</a>
    <a class="nav-link" href="modulo6.php">Módulo A2</a>
</nav>
<br>
<div class="btn" >
  <a href="Reportes/ReporteModulo4.php" target="_blank" ><button class="btn btn-danger" id="button"><img src="../img/PDF.png">Descargar</button></a>

  <a href="ReportesExcel/ReporteModulo4.php" class="float-left"  ><button class="btn btn-success" id="button"><img src="../img/excell.png">Descargar</button></a>
</div>

<!-- Inicio de tabla de asistencia  -->
    <div class="card-body">
      <div class="table-responsive">  
        <form action="Aprobartodos.php" method="POST">
     <!--  <span class="float-left"> 
   <input type="submit" name="Aprobado" value="Aprobado" class="btn btn-primary btn-sm">  --> 
        <!--<input type="submit" name="Reprobado" value="Reprobado" class="btn btn-primary btn-sm">
        
      </span>-->
<table  id="tableUser2" class="main-table">
        <br>
          <thead class="table-secondary">
            <tr> 
              <th scope="col"><input type='checkbox' name='' class='case' value="" id="todos">Todos</th>
              <th scope="col">ID Alumno</th>
              <th scope="col">Alumno</th>
              <th scope="col">Class</th>
              <th scope="col">Universidad</th>
              <th scope="col">Aprobar</th>
              <th scope="col">Reprobar</th>
            </tr>
          </thead>
<tbody>
            <?php
  $consulta2=$pdo->prepare("SELECT alumnos.Nombre AS alumno , alumnos.Class, datos_modulos.id_alumno , datos_modulos.id, datos_modulos.id_modulo , empresas.Nombre FROM datos_modulos LEFT JOIN alumnos ON datos_modulos.id_alumno =  alumnos.ID_Alumno LEFT JOIN empresas ON empresas.ID_Empresa = alumnos.ID_Empresa WHERE datos_modulos.id_modulo = ?  AND datos_modulos.estado = 'Pendiente'  ");

             $consulta2->execute(array('MOD40000004'));
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
              <th><input type='hidden' name='idtaller' id='idtaller' value=>".$fila2['Class']."</th>
              <th>".utf8_encode($fila2['Nombre'])."</th>
              <td><a href='aprobarmodulo.php?id=".$fila2['id']."&id2=".$fila2['id_alumno']."' name='ida' class='btn btn-success'><i class='fas fa-user-check'></i></a> </td>

              <td><a href='aprobarmodulo2.php?id=".$fila2['id']."&id2=".$fila2['id_alumno']."' class='btn btn-danger'><i class='fas fa-user-times'></i></a> </td>";
            }
          ?>     
        </tbody> 
      </table>  
</form>
    </div>
  </div>

</div>
<script type="text/javascript">

  $("#todos").on("click", function() {
    $(".case").prop("checked", this.checked);
  });

            // if all checkbox are selected, check the selectall checkbox and viceversa  
            $(".case").on("click", function() {
              if ($(".case").length == $(".case:checked").length) {
                $("#todos").prop("checked", true);
              } else {
                $("#todos").prop("checked", false);
              }
            });
        </script>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>
