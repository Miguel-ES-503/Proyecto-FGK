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

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<br>
<h1>Sesiones One on One</h1>
<br>
<a href="javascript:history.back();" class="btn float-left"  title="Regresar" style="margin-left:5%;"><i class="fas fa-chevron-circle-left display-4"></i></a>
<button type='button' class='btn btn-success btn-agregar' data-toggle='modal' data-target='#myModal3'><svg class="bi bi-bookmark-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.5 2a.5.5 0 0 0-.5.5v11.066l4-2.667 4 2.667V8.5a.5.5 0 0 1 1 0v6.934l-5-3.333-5 3.333V2.5A1.5 1.5 0 0 1 4.5 1h4a.5.5 0 0 1 0 1h-4zm9-1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V1.5a.5.5 0 0 1 .5-.5z"/>
  <path fill-rule="evenodd" d="M13 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
</svg> Crear Sesiones</button>

<!-- Ver Horarios Disponibles-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  <svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
  <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
</svg> Horarios Disponibles
</button>
<!-- Asistencia-->
<a href="sessionesAsistencia.php"><button type="button" class="btn btn-info"><i class="fas fa-list-ol"></i> Listado de asistencia</button></a>
<a href="sesionesfinalizadas.php"><button type="button" class="btn btn-warning" ><i class="fas fa-clipboard-list"></i> Sesiones Finalizadas</button></a>
<!-- Modal -->
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
      <th scope="col">Titulo</th>
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
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Crear Sesiones One on One</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" Method="POST" style="width:80%; margin:auto">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-dark">Ingrese el titulo de la sesión</label>
    <input type="text" name="titulo" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-dark">Ingrese la fecha de la sesión</label>
    <?php $today = date("Y-m-d");?>
    <input type="date" name="fecha" class="form-control" min='<?php echo $today; ?>' required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-dark">Hora de inicio de la se sesión: </label>
    <input type="time" name="TimeInit" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-dark">Hora de finalización de la sesión: </label>
    <input type="time" name="TimeEnd" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary btn1">Crear <i class="fas fa-paper-plane"></i></button>
  </form>
<br>
          </div>
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
  <div class="mx-auto" style="width:85%"> 
  <br>   
  <a href="Reportes/ReporteSession.php"><button class="btn btn-danger"><img src="../img/pdf.png" width="30px" height="30px"><span style="margin-left: 4px;font-size: 13px;">Descargar</span></button></a>
  <a href="ReportesExcel/ReporteReuniones.php"><button class="btn btn-success"><img src="../img/excell.png" width="25px" height="30px"><span style="margin-left: 4px;font-size: 13px;">Descargar</span></button></a>
  
<h3 class="text-left titulo-OneonOne text-white text-center" >Registros de sesiones One on One Pendientes</h3>
 <div class="panel-body">
                    <div id="tablapdf" class="sessiones overflow-auto">
                        <table class="table table-bordered-sm" id="datatable2" >
                            <thead class="table-dark">
                                <tr>
                                    <th>Titulo</th>
                                    <th>Alumno</th>
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

  <br> 
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
        "sLoadingRecords": "Cargando..."
    },
        },
        "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
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