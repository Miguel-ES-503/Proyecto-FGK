<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
      require_once '../Conexion/conexion.php';
?>
<title>Sessiones One on One</title>

<?php
 date_default_timezone_set('America/El_Salvador');
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel="stylesheet" type="text/css" href="css/Sesiones-ONE.css">
<link rel="stylesheet" href="css/formulario_One_on_One.css">
<!-- CSS only -->

<div class="title">
     <a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Sesiones One on One</h2>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">

<!-- Ver Horarios Disponibles-->
<!-- Asistencia-->

<!-- Modal -->
<div class="row">
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    
  <nav class="nav flex-column" id="nav">
    <h2 class="title-1">Menu</h2><button class="nav-link" type='button' data-toggle='modal' data-target='#myModal3'>Crear Sesiones</button> 
    <button type="button" data-toggle="modal" data-target="#exampleModalLong" class="nav-link">Horarios Disponibles</button>
    <button type="button" class="nav-link" role="link" onclick="window.location='sessionesAsistencia.php'">Listado de asistencia</button>
    <button type="button" class="nav-link" role="link" onclick="window.location='sesionesfinalizadas.php'">Listado de asistencia</button>
</nav>
  </div>
    <div class="col-xs-4 col-sm-4 col-md-8 col-lg-8">
      <div class="tabla">
    <div align="right" id="btns">
    <a href="Reportes/ReporteSession.php"><button class="btn btn-danger"><img src="../img/pdf.png" width="30px" height="30px"><span class="text">Descargar</span></button></a>
  <a href="ReportesExcel/ReporteReuniones.php"><button class="btn btn-success"><img src="../img/excell.png" width="25px" height="30px"><span class="text">Descargar</span></button></a> 
  </div>
 <div class="panel-body" style="float: left;">
                    <div id="tablapdf">
                        <table class="table table-bordered-sm table-responsive w-100" id="datatable2">
                            <thead class="table-dark">
                                <tr>
                                    <th>Encargado</th>
                                    <th>Alumno</th>
                                    <th>Correo</th>
                                    <th>Sede</th>
                                    <th>Asistencia</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                        </table>
                        </div>
                    </div>
          </div>
  </div>
</div>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLongTitle">Lista de Horarios Disponibles</h5>
         <button type="button" class="close" data-dismiss="modal7" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="overflow-auto">
       <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Encargado</th>
      <th scope="col">Fecha</th>
      <th scope="col">Horario</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
      <?php
              $query = "SELECT * FROM one_on_one WHERE estado = 'Disponible' ";
              $stat = $dbh->prepare($query);
              $stat->execute();
              $result = $stat->fetchAll();
        foreach($result as $row)
                            {
                            echo "<tr>";
                            echo "<th scope='row'>".utf8_encode($row["titulo"])."</th>";
                            echo "<td>".$row["fecha"]."</td>";
                            echo "<td>".$row["hora_inicio"]." - ".$row["hora_fin"]."</td>";
                            echo "<td><form action='actualizarhorario.php' method='post'><button type='submit' class='btn btn-warning btn-borrar'"." name='Disponible7' value='"."$row[id]'"."><i class='fas fa-pen'></i></button></form></button>".
                            
                            "<form action='eliminarhorario.php' method='post'><button type='submit' class='btn btn-danger btn-borrar'"." name='Disponible2' value='"."$row[id]'"."><i class='fas fa-trash-alt'></i></button></form><td>";
                            echo "</tr>";
                            } ?>
</table>
 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Responder a pregunta -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" id="contenedor5">
            <div class="modal-header" id="contendor4" >
              <h5 class="modal-title text-dark" id="exampleModalLabel">Crear Sesiones One on One</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <br><br><br>
            <form id="formulario" class="h-75" action="<?php echo $_SERVER['PHP_SELF']; ?>" Method="POST" >
              <br>
            <ul class="items mx-auto ">
              <li class="active"></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
  <br><br>
  <fieldset class="username enable">
  <label for="exampleInputEmail1" class="text-dark">Seleccione el encargado de la sesión</label>
    <select name="titulo" id="" class="form-control float-right">
    <option value="Geo Albanés">Geo Albanés</option>
    <option value="Ónix Landaverde">Ónix Landaverde</option>
    </select>
    <br><br>
    <div class="icon right button "><i class="arrow"></i></div>
    <br>
  </fieldset>

  <fieldset class="email">
  <label for="exampleInputPassword1" class="text-dark">Ingrese la fecha de la sesión</label>
    <?php $today = date("Y-m-d");?>
    <input type="date" class="form-control mx-auto" name="fecha" min='<?php echo $today; ?>' />
    <div class="icon right button"><i class="arrow"></i></div>
  </fieldset>

  <fieldset class="password">
  <label for="exampleInputPassword1" class="text-dark">Hora de inicio de la se sesión: </label>
    <input type="time" name="TimeInit" class="form-control mx-auto" />
    <div class="icon right button"><i class="arrow"></i></div>
  </fieldset>

  <fieldset class="password2">
  <label for="exampleInputPassword1" class="text-dark">Hora de finalización de la sesión: </label>
    <input type="time"  name="TimeEnd"  class="form-control mx-auto" />
    <div class="icon right button"><i class="arrow"></i></div>
  </fieldset>

  <fieldset class="thanks">
  <button type="submit" class="btn btn-primary btn1 mx-auto text-center">Crear <i class="fas fa-paper-plane"></i></button>
  </fieldset>
    <br>
    <br>
</form>
<br><br>
<br>          </div>
        </div>
      </div>        
</div> <br> 


     <?php  
     @$timeInit = $_POST['TimeInit']; @$timeEnd = $_POST['TimeEnd'];
        if(isset($timeInit)){
          if ($timeInit < $timeEnd) {
            @$fecha = $_POST['fecha'];
            @$titulo = $_POST['titulo'];
            @$TimeStart = $_POST['TimeInit'];
            @$TimeE  = $_POST['TimeEnd'];
            $sql = "INSERT INTO one_on_one (titulo, fecha, hora_inicio, hora_fin, cupo, estado, estado_alumno) VALUES (?,?,?,?,?,?,?)";
            $stmt= $dbh->prepare($sql);
            $stmt->execute([utf8_decode($titulo), $fecha,$TimeStart,$TimeE,1,'Disponible','Disponible']);
            header("Location:sessionesOneonOne.php");
            echo "<p class='text-center text-success font-weight-bold'>Enviado correctamente</p>";
          }
          else{
            echo "<p class='text-danger text-center font-weight-bold' >Error al guardar, la hora de inicio debe ser menor a la hora de finalización</p>";
          }
        }
      ?>
  <div>       
    </div>

</div>


  <br> 
  
<script src="js/formulario.js"></script>
<script type="text/javascript" src="js/datatables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script>
      $("#OpenModal").click(function (e) { 
        e.preventDefault();
        $('#myModal').modal('show');
      });
    </script>

<!-- Horarios inscritos -->
<script type="text/javascript">
$(document).ready(function(){
      fill_datatable();
      fill_datatable2();    
      function fill_datatable(year = '')
      {
       var dataTable = $('#datatable2').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No hay sesiones One on One disponibles",
            "info": "Mostrando página  _PAGE_ de _PAGES_",
            "infoEmpty": "Registros no encontrados",
            "infoFiltered": "(filtrados  _MAX_  registros del total)",
            "search": "Buscar",
            "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior",
        "sProcessing":     "Procesando...",
        "sLoadingRecords": "Cargando...",
    },
        },
        "lengthMenu": [[5, 25, 50, -1], [50, "All"]],
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "searching" : true,
        "ajax" : {
         url:"fech2.php",
         type:"POST",
         data:{
          year:year
         }
        }
       });
      }
  });
  </script>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>