<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
require_once '../Conexion/conexion.php';
include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>
<title>Sessiones One on One</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.topnav {
  overflow: hidden;
  background-color: #ADADB2;
  max-width: 100%;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  border-width: 3px;
  font-weight: bold;

 
}
.submenu1{
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
  background-color: #9d120e;
  border-width: 3px;
  font-weight: bold;
  height: 68px;
  letter-spacing: 2px;



}
.icon{
  

}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon1 {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon1 {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
    font-size: 15px;
    height: 50px;
  }
  .titulomenu a{
    font-size: 15px;
  }
  .modal-content{
  background-color: white;
  border-color: black;
  border-radius: 30px;
  padding: 20px;
}
.modal-body{
  text-align: left;
}

.form-control{
  background-color: #ADADB2;
  color: black;
  border-radius: 20px;

}
.modal-header{
  border-color: #ADADB2;
  border:3px;
}
.modal-footer{
  border-color: #ADADB2;
  border:3px;
}

}
</style>
<?php
 date_default_timezone_set('America/El_Salvador');
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel="stylesheet" type="text/css" href="css/Sesiones-ONE.css">
<link rel="stylesheet" href="css/formulario_One_on_One.css">
<link rel="stylesheet" href="css/Competencia.css">

<style type="text/css">
  #regiration_form fieldset:not(:first-of-type) {
    display: none;
  }
    @media only screen and (max-width: 600px) {
  .panel-body {
    margin-left:25%;
  }
  .botones{
    margin-top:25%;
    margin-left:25%;
  }
  .nav{
    margin-left:20%;
  }
  
}
 
</style>
<!-- CSS only -->
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>


<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<div class="topnav" id="myTopnav">
  <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Sesiones one on one</a>
  <a href="" class="submenu1">Sesiones</a>
  
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<!-- Ver Horarios Disponibles-->
<!-- Asistencia-->

<!-- Modal -->
<div class="row">
  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 nav">
    
  <nav class="nav flex-column h-100" id="nav">
    <h2 class="title-1">Menu</h2>
    <button class="nav-link" id="sesion" type='button' data-toggle='modal' data-target='#myModal3'>Crear Sesiones</button> 
    <button type="button" id="sesion" data-toggle="modal" data-target="#exampleModalLong" class="nav-link">Horarios Disponibles</button>
    <button type="button" id="sesion" class="nav-link" role="link" onclick="window.location='sessionesAsistencia.php'">Listado de asistencia</button>
    <button type="button" id="sesion" class="nav-link" role="link" onclick="window.location='sesionesfinalizadas.php'">Sesiones finalizadas</button>
</nav>
  </div>
    <div class="col-xs-4 col-sm-4 col-md-8 col-lg-8">
      <div class="tabla">
    <div align="right" class="h-100 botones" id="btns">
    <a href="Reportes/ReporteSession.php"  target='blank'><button style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 150px;height: 38px;
     background-color: #9d120e;
     color:white;"><img src="../img/pdf.png" width="30px" height="30px"><span class="text">Descargar</span></button></a>
    <a href="ReportesExcel/ReporteReuniones.php"><button style="border-radius: 20px;
    border: 2px solid green;
    width: 150px;height: 38px;
     background-color: green;
     color:white;"><img src="../img/excell.png" width="25px" height="30px"><span class="text">Descargar</span></button></a> 
  </div>
 <div class="panel-body img-fluid " style=" width:85%">
                    <div id="tablapdf">
                    <br>
                    <table  id="example" class="table table-hover table-sm table-bordered table-fixed" >
        <thead class="table-secondary">
                                <tr>
                                    <th>Encargado</th>
                                    <th>Alumno</th>
                                    <th>Correo</th>
                                    <th>Universidad</th>
                                    <th>Sede</th>
                                    <th>Asistencia</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
          require_once 'Modelo/ModeloAlumno/MostrarDatosReunion1.php';
          ?>
          </tbody>
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
        <div class="overflow-auto" style="border-radius: 20px;">
       <table class="table" >
  <thead class="thead-dark">
    <tr style="border-radius: 20px;">
      <th scope="col" >Encargado</th>
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
      
      <div class="modal-footer">
        <button type="button" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 100px;height: 38px;
     background-color: #9d120e;
     color:white;" data-dismiss="modal">Close</button>
        <button type="button" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 150px;height: 38px;
     background-color: #9d120e;
     color:white;">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- Responder a pregunta -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
          <div class="modal-content h-100 w-100 pb-5" id="contenedor5">
            <div class="modal-header" id="contendor4" >
              <h5 class="modal-title text-dark" id="exampleModalLabel">Crear Sesiones One on One</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <br>
            <div class="progress w-75 mx-auto">
<div class="progress-bar progress-bar-striped " role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>
            <form id="regiration_form" class="float-left ml-3 p-3 w-100" action="<?php echo $_SERVER['PHP_SELF']; ?>" Method="POST" >
              <br>
  
  <fieldset class="username enable text-center">
  <label for="exampleInputEmail1" class="text-dark">Seleccione el encargado de la sesión</label>
    <select name="titulo" id="" class="form-control float-right">
    <option value="Geo Albanés">Geo Albanés</option>
    <option value="Ónix Landaverde">Ónix Landaverde</option>
    </select>
    <br><br><br>
    <button type="button" class="next btn btn-info text-center">Siguiente <i class="fas fa-arrow-circle-right"></i></button>
  </fieldset>

  <fieldset class="email enable">
  <label for="exampleInputPassword1" class="text-dark">Ingrese la fecha de la sesión</label>
    <?php $today = date("Y-m-d");?>
    <input type="date" class="form-control mx-auto" name="fecha" min='<?php echo $today; ?>' />
    <br>
    <button type="button" name="previous" class="previous btn btn-warning">Anterior <i class="fas fa-arrow-circle-left"></i></button>
    <button type="button" class="next btn btn-info">Siguiente <i class="fas fa-arrow-circle-right"></i></button>
  </fieldset>

  <fieldset class="password enable">
  <label for="exampleInputPassword1" class="text-dark">Hora de inicio de la sesión: </label>
    <input type="time" name="TimeInit" class="form-control mx-auto" />
    <br>
    <button type="button" name="previous" class="previous btn btn-warning">Anterior <i class="fas fa-arrow-circle-left"></i></button>
    <button type="button" class="next btn btn-info">Siguiente <i class="fas fa-arrow-circle-right"></i></button>
  </fieldset>

  <fieldset class="password2 enable">
  <label for="exampleInputPassword1" class="text-dark">Hora de finalización de la sesión: </label>
    <input type="time"  name="TimeEnd"  class="form-control mx-auto" />
    <br>
    <button type="button" name="previous" class="previous btn btn-warning">Anterior <i class="fas fa-arrow-circle-left"></i></button>
    <button type="button" class="next btn btn-info">Siguiente <i class="fas fa-arrow-circle-right"></i></button>
 </fieldset>

  <fieldset class="thanks enable">
  <label for="exampleInputPassword2" class="text-dark">Gracias por crear una sesion OneonOne </label>
  <br><br><br>
  <button type="button" name="previous" class="previous btn btn-warning">Anterior <i class="fas fa-arrow-circle-left"></i></button>
  <button type="submit" class="submit btn btn-success btn1 mx-auto text-center">Crear <i class="fas fa-paper-plane"></i></button>
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

    @$timeInit = $_POST['TimeInit']; 
    @$timeEnd = $_POST['TimeEnd'];
    @$fecha = $_POST['fecha'];
    @$titulo = $_POST['titulo'];
    @$TimeStart = $_POST['TimeInit'];
    @$TimeE  = $_POST['TimeEnd'];

                            
     if(isset($fecha) && isset($titulo) && isset($TimeStart) && isset($TimeE)){
        if(isset($timeInit)){
          if ($timeInit < $timeEnd) {

            $stmt2 = $dbh->query("SELECT * FROM one_on_one");
            
            while ($row = $stmt2->fetch()) { 
              $fecha1[] = ($row['fecha'])." ".$row['hora_inicio']." - ".$row['hora_fin'];
              $titulo1[] = utf8_encode($row['titulo']);
            }
            $fechavar[] = $fecha." ".$timeInit." - ".$timeEnd;
            $titulovar[] = $titulo;
            
           if(($fechavar != $fecha1) && ($titulovar != $titulo1)){
              $sql = "INSERT INTO one_on_one (titulo, fecha, hora_inicio, hora_fin, cupo, estado, estado_alumno) VALUES (?,?,?,?,?,?,?)";
              $stmt= $dbh->prepare($sql);
              $stmt->execute([utf8_decode($titulo), $fecha,$TimeStart,$TimeE,1,'Disponible','Disponible']);
              header("Location:sessionesOneonOne.php");
              echo "<p class='text-center text-success font-weight-bold'>Enviado correctamente</p>";
          }else{
              echo "<script>alert('Error, Ya hay una fecha existente para ese día')</script>";
          }
          
         }
         else{
           echo "<p class='text-danger text-center font-weight-bold' >Error al guardar, la hora de inicio debe ser menor a la hora de finalización</p>";
         }
        }
      }
      ?>

</div>
  <br> 
  <script>
$(document).ready(function(){
var current = 1,current_step,next_step,steps;
steps = $("fieldset").length;
$(".next").click(function(){
current_step = $(this).parent();
next_step = $(this).parent().next();
next_step.show();
current_step.hide();
setProgressBar(++current);
});
$(".previous").click(function(){
current_step = $(this).parent();
next_step = $(this).parent().prev();
next_step.show();
current_step.hide();
setProgressBar(--current);
});
setProgressBar(current);
// Change progress bar action
function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
.html(percent+"%");
}
});
</script>
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
        "lengthMenu": [[5, 25, 50, -1], [50, 75, "All"]],
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