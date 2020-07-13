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

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<br>
<h1>Aprobar/Reprobar módulos</h1>
<br>
<a href="javascript:history.back();" class="btn float-left"  title="Regresar" style="margin-left:5%;"><i class="fas fa-chevron-circle-left display-4"></i></a> 
<br><br><br><br>
<ul class="nav nav-tabs w-75 mx-auto">
  <li class="nav-item">
    <a class="nav-link " href="AprobarModulos.php">Módulo C1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="modulo2.php">Módulo C2</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="modulo3.php">Módulo B1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="modulo4.php">Módulo B2</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="modulo5.php">Módulo A1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active " href="modulo6.php">Módulo A2</a>
  </li>
</ul>
<br> 

<a href="Reportes/ReporteModulo6.php" class="float-left" style="margin-left: 12.5%;" target="blank"><button class="btn btn-danger"><i class="fas fa-download"></i> PDF</button></a>
 <a href="ReportesExcel/ReporteModulo6.php" class="float-left" ><button class="btn btn-success"><i class="fas fa-file-excel"></i> EXCEL</button></a>
<br><br>
<!-- Inicio de tabla de asistencia  -->
    <div class="card-body w-75 mx-auto ">
      <div class="table-responsive">
        <form action="Aprobartodos6.php" method="POST">
      <span class="float-left"> 
  <!--  <input type="submit" name="Aprobado" value="Aprobado" class="btn btn-primary btn-sm">  --> 
        <input type="submit" name="Reprobado" value="Reprobado" class="btn btn-primary btn-sm">
        
      </span>
<table  id="tableUser2" class="table table-hover table-sm table-bordered table-fixed" >
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

             $consulta2->execute(array('MOD60000006'));
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

